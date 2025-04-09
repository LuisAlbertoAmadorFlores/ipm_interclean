<?php

namespace App\Http\Livewire\Contabilidad;

use Carbon\Carbon;
use Livewire\Component;
use DB;

class Misbajasimss extends Component
{
    public $turnados;
    private $Myid;
    public $resolucion;

    protected $listeners = ["misresoluciones" => "render", 'finiquito' => 'render'];
    public function mount($id)
    {
        $this->Myid = $id;
    }

    public function misturnados()
    {
        $this->turnados = DB::table('bajas')
            ->join('colaborador', 'bajas.idColaborador', 'colaborador.idColaborador')
            ->join('complementos', 'bajas.idColaborador', 'complementos.id_colaborador')
            ->where('idTurno_Contabilidad', '=', $this->Myid)->get();
    }

    public function liberar($idColaborador)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Contabilidad' => NULL,
            ]);
        redirect()->route('bajasimss');
    }

    public function imss($idColaborador)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'Status_baja' => 'Aceptado',
                'Fecha_Aceptado' => Carbon::now()
            ]);
        $this->render();

        $this->emit('asigaTurnoCorrecto', 'Se ha aceptado el expediente.');
    }

    public function render()
    {
        $this->misturnados();
        return view('livewire.contabilidad.misbajasimss', ['misturnos' => $this->turnados]);
    }
}
