<?php

namespace App\Http\Livewire\Juridico;
use DB;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\BajasModel;
use Livewire\WithPagination;

class TodosTurnos extends Component
{
    use WithPagination;
    private $turnos;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['updateAllColaboradores'];

    public function updateAllColaboradores($data)
    {
        BajasModel::where('idColaborador', '=', $data['idColaborador'])
            ->update([
                'idTurno_Juridico' => $data['Myid'],
                'Status_baja' => 'Asignado',
                'Fecha_Asignado' => Carbon::now(),
            ]);
        $this->emit('aceptcolaborador');
    }

    public function todosTurnados()
    {
        $this->turnos = BajasModel::join('colaborador', 'bajas.idColaborador', 'colaborador.idColaborador')
            ->whereNull('idTurno_Juridico')
            ->orderBy('colaborador.idColaborador','asc')
            ->paginate(10);
    }

    public function tomarColaborador($idColaborador, $juridico)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Juridico' => $juridico,
                'Status_baja' => 'Asignado',
                'Fecha_Asignado'=>Carbon::now(),
            ]);
        redirect()->route('turnados');
    }

    public function render()
    {
        $this->todosTurnados();
        return view('livewire.juridico.todos-turnos', ['todos' => $this->turnos]);
    }
}
