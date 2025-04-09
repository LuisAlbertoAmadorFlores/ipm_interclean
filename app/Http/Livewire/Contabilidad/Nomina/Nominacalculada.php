<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Storage;

class Nominacalculada extends Component
{

    public $idColaborador;
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
    public $excelSend;
    protected $listeners = ['newSalario' => 'render'];

    protected $rules = [
        'fechainicial' => 'required'
    ];

    protected $messages = [
        'fechainicial.required' => 'Por favor seleciona las fechas'
    ];

    public function mount( $region)
    {
       
        $this->fechainicial = date('Y-m-d');
        $this->fechafinal = date('Y-m-d');
        $this->regiones = explode(',', $region);
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

    public function calculo($idColaborador)
    {
        $this->idColaborador = $idColaborador;
        $this->detalles = DB::table('lista_asistencia')->where('idColaborador', $idColaborador)->whereBetween('Fecha_Laboral', [$this->fechainicial, $this->fechafinal])->get();;
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

    public function limpiardata()
    {
        $this->reset('data', 'fechainicial', 'fechafinal', 'tipoNomina', 'proyecto', 'detalles', 'proyectos', 'idProyecto', 'zonas', 'region', 'cedis', 'lugartrabajo');
        $this->flatBloquedoSearch = false;
    }


    public function obtenerRegistros()
    {
        $this->validate();
        $inicial = date('Y-m-d', strtotime($this->fechainicial));
        $final = date('Y-m-d', strtotime($this->fechafinal));
        $this->data = DB::select('call calculo_prenomina(?, ?, ?, ?, ?) ', array($this->region, $this->tipoNomina, $inicial, $final, $this->lugartrabajo));
        $datos=[];
        $datos['fecha_inicial']=$this->fechainicial;
        $datos['fecha_final']=$this->fechafinal;
        $datos['region']=$this->region;
        $this->emit('obtenerExceles',['datos'=>$datos]);
    }
    public function descargarEvidencia($idColaborador, $id)
    {
        return Storage::download('public/Colaboradores/' . $idColaborador . '/comprobantes_nomina/comprobante_' . date('d-m-Y', strtotime($id)) . '.pdf', 'comprobante_' . $id);
    }
    public function render()
    {
        $this->getProyects();
        $this->getZona();
        $this->getCedis();
        return view('livewire.contabilidad.nomina.nominacalculada', ['listaPersonal' => $this->data]);
    }
}
