<?php

namespace App\Http\Livewire\Administrativo\Pagosextras;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Storage;

class Otrospagos extends Component
{
    public $idColaborador;
    public $idCoordinador;
    public $allSearchColaborador;
    public $byIdColaborador;
    public $estado;
    public $foto;
    public $contador;

    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function mount($idColaborador, $idCoordinador)
    {
        $this->idColaborador = $idColaborador;
        $this->idCoordinador = $idCoordinador;
    }

    public function buscarPersona($idColaborador)
    {
        $this->idColaborador = $idColaborador;
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador;
        $otros = $carpetaraiz . '/Otros/';
        $this->byIdColaborador = DB::table('colaborador')
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('proyectos', 'proyectos.idProyecto', 'complementos.Proyecto_Asignado')
            ->where('colaborador.idColaborador', '=', $this->idColaborador)
            ->where('complementos.id_colaborador', '=', $this->idColaborador)->get();
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');
        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            if ($this->byIdColaborador[0]->Sexo == "H") {
                $this->foto = 'img/Men.svg';
            } else {
                $this->foto = 'img/Women.svg';
            }
        }
        $this->emit('idColaborador', $this->idColaborador);
    }

    public function render()
    {
        return view('livewire.administrativo.pagosextras.otrospagos',['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto]);
    }
}
