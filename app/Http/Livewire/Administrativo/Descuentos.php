<?php

namespace App\Http\Livewire\Administrativo;

use Carbon\Carbon;
use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Models\DescuentosModel;


class Descuentos extends Component
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
            ->where('colaborador.idColaborador', '=', $this->idColaborador)
            ->where('complementos.id_colaborador', '=', $this->idColaborador)->get();
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');
        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            $this->foto = 'img/tarjeta.png';
        }
        $this->emit('idColaborador', $this->idColaborador);
    }

    

    public function render()
    {
        return view('livewire.administrativo.descuentos', ['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto]);
    }
}
