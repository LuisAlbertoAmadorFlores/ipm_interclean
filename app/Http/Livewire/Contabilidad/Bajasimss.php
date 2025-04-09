<?php

namespace App\Http\Livewire\Contabilidad;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Bajasimss extends Component
{
    public $turnos;

    public function todosTurnados()
    {
        $this->turnos = DB::table('bajas')
            ->join('colaborador', 'bajas.idColaborador', 'colaborador.idColaborador')
            ->whereNull('idTurno_Contabilidad')
            ->where('colaborador.status','=','1')
            ->get();
    }

    public function tomarColaborador($idColaborador, $contabilidad)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Contabilidad' => $contabilidad,
            ]);
        redirect()->route('bajasimss');
    }
    public function render()
    {
        $this->todosTurnados();
        return view('livewire.contabilidad.bajasimss', ['todos' => $this->turnos]);
    }
}
