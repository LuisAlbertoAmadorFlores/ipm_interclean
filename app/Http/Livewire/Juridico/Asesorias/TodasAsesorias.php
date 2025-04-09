<?php

namespace App\Http\Livewire\Juridico\Asesorias;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TodasAsesorias extends Component
{
    public $turnos;

    public function todosTurnados()
    {
        $this->turnos = DB::table('asesoria_juridico')
            ->join('colaborador', 'asesoria_juridico.idColaborador', 'colaborador.idColaborador')
            ->whereNull('idTurno_Juridico')
            ->get();
    }

    public function tomarColaborador($idColaborador, $juridico)
    {
        DB::table('asesoria_juridico')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Juridico' => $juridico,
                'Status_Asesoria' => 'Asignado',
                'Fecha_Asignado' => Carbon::now(),
            ]);
        redirect()->route('asesorias-juridico');
    }

    public function render()
    {
        $this->todosTurnados();
        return view('livewire.juridico.asesorias.todas-asesorias', ['todos' => $this->turnos]);
    }
}
