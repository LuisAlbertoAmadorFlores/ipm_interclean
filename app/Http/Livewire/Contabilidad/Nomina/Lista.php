<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use DB;

class Lista extends Component
{
    public $data;
    public $fechainicial;
    public $fechafinal;
    public $hoy;
    public $dia1;
    public $tipoNomina;
    public $proyecto;
    public $detalles;
    public $proyectos;
    public $idProyecto;
    public $zonas;
    public $region;
    public $cedis;
    public $lugartrabajo;
    public $flatBloquedoSearch = false;
    public $regiones;
    public $nominasPagadas;
    public $nominasRechazadas;

    protected $listeners = ['newSalario' => 'render'];

    protected $rules = [
        'fechainicial' => 'required',
        'fechafinal' => 'required'
    ];

    protected $messages = [
        'fechainicial.required' => 'Por favor seleciona una fecha',
        'fechafinal.required' => 'Por favor selecciona una fecha'
    ];

    public function mount($proyecto, $region)
    {
        $this->proyecto = $proyecto;
        $this->fechainicial = date('Y-m-d');
        $this->fechafinal = date('Y-m-d');
        $this->regiones = explode(',', $region);
    }

    public function calculo($idColaborador)
    {
        $this->detalles = DB::table('lista_asistencia')->where('idColaborador', $idColaborador)->whereBetween('Fecha_Laboral', [$this->fechainicial, $this->fechafinal])->get();;
    }

    public function obtenerRegistros()
    {
        $this->validate();
        $inicial = date('Y-m-d', strtotime($this->fechainicial));
        $final = date('Y-m-d', strtotime($this->fechafinal));
        try {
            $this->data = DB::select('call calculo_prenomina(?, ?, ?, ?, ?) ', array($this->region, $this->tipoNomina, $inicial, $final, $this->lugartrabajo));
        } catch (\Throwable $th) {
            dd($th);
        }
        $this->flatBloquedoSearch = true;
    }

    public function rangeDate()
    {

        if ($this->tipoNomina == 'Semanal') {
            $inicial = date('Y-m-d', strtotime($this->fechainicial . "+ 6days"));
            $final = date('Y-m-d', strtotime($this->fechafinal));
            if ($inicial != $final) {
                $this->emit('Fechas', 'Las fechas ingresadas tienen discrepancia para una Nomina ' . $this->tipoNomina);
            } else {
                $this->obtenerRegistros();
            }
        }
        if ($this->tipoNomina == 'Quincenal') {
            $inicial = date('Y-m-d', strtotime($this->fechainicial . " + 14days"));
            $final = date('Y-m-d', strtotime($this->fechafinal));
            if ($inicial != $final) {
                $this->emit('Fechas', 'Las fechas ingresadas tienen discrepancia para una Nomina ' . $this->tipoNomina);
            } else {
                $this->obtenerRegistros();
            }
        }
    }

    public function getStatusNominas()
    {
        $carpetaraiz = 'public/Nomina/Historial/Nomina_Pagada';
        $this->nominasPagadas = Storage::disk('local')->files($carpetaraiz);
        $this->nominasRechazadas= Storage::disk('local')->files('public/Nomina/Historial/Nomina_Rechazada');
    }


    public function limpiardata()
    {
        $this->reset('data', 'fechainicial', 'fechafinal', 'tipoNomina', 'proyecto', 'detalles', 'proyectos', 'idProyecto', 'zonas', 'region', 'cedis', 'lugartrabajo');
        $this->flatBloquedoSearch = false;
    }

    public function getProyects()
    {
        $this->proyectos = DB::table('proyectos')->get();
        $this->reset('zonas');
    }

    public function getZona()
    {
        $this->zonas = DB::table('cedis')->select('Region')->where('Proyecto', $this->idProyecto)->distinct('Region')->get();
    }

    public function getCedis()
    {
        $this->cedis = DB::table('cedis')->select('id', 'Nombre')->where('Region', $this->region)->where('Proyecto', $this->idProyecto)->get();
    }

    public function render()
    {
        $this->getProyects();
        $this->getZona();
        $this->getCedis();
        $this->getStatusNominas();
        return view('livewire.contabilidad.nomina.lista', ['listaPersonal' => $this->data]);
    }
}
