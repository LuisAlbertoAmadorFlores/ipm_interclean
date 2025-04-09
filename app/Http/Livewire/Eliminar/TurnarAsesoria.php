<?php

namespace App\Http\Livewire\Eliminar;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TurnarAsesoria extends Component
{
    public $idColaborador;
    public $nombreCompleto;
    public $comentario;
    public $codigo;
    public $flat = false;
    public $historiaAsesorias;
    public $activa;
    protected $listeners = ['buscarTarjetaColaborador' => 'setIdColaborador'];

    protected $rules = [
        'comentario' => 'required'
    ];

    public function mount($idColaborador, $nombre)
    {
        $this->idColaborador = $idColaborador;
        $this->nombreCompleto = $nombre;
        $this->codigo =  $this->code(8);
    }

    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function code($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) $key .= $pattern[mt_rand(0, $max)];
        return $key;
    }

    public function sendMessage()
    {
        $this->validate();
        $this->emit('MessageAsesoria', $this->comentario);
        $this->flat = true;
    }

    public function getHistoryAsesorias()
    {
        $this->historiaAsesorias = DB::table('asesoria_juridico')
            ->select('asesoria_juridico.created_at', 'name', 'Comentario', 'Respuesta', 'Fecha_Regresado')
            ->join('users', 'users.id', 'asesoria_juridico.idTurno_Juridico')
            ->where('idColaborador', $this->idColaborador)->get();
    }

    public function getAsesoriaActiva()
    {
        $this->activa = DB::table('asesoria_juridico')
            ->where('idColaborador', $this->idColaborador)
            ->where('Fecha_Regresado', null)->get();
    }

    public function render()
    {
        $this->getAsesoriaActiva();
        $this->getHistoryAsesorias();
        return view('livewire.eliminar.turnar-asesoria');
    }
}
