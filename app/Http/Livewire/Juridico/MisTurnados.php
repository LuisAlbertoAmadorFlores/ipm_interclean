<?php

namespace App\Http\Livewire\Juridico;

use Carbon\Carbon;
use Livewire\Component;
use DB;
use App\Models\BajasModel;
use Livewire\WithPagination;


class MisTurnados extends Component
{
    use WithPagination;
    private $turnados;
    private $Myid;
    public $codigo;
    public $resolucion;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = ["misresoluciones" => "render"];
    public function mount($id)
    {
        $this->Myid = $id;
    }

    public function sendMysBajas()
    {

        $this->turnados = BajasModel::join('colaborador', 'bajas.idColaborador', 'colaborador.idColaborador')
            ->where('idTurno_Juridico', '=', $this->Myid)
            ->whereNull('Fecha_Baja')
            ->orderBy('colaborador.idColaborador', 'asc')
            ->paginate(10,['*'],'misturnador');
    }


    public function misturnados()
    {
        $this->turnados = DB::table('bajas')
            ->join('colaborador', 'bajas.idColaborador', 'colaborador.idColaborador')
            ->where('idTurno_Juridico', '=', $this->Myid)
            ->whereNull('Fecha_Baja')
            ->get();
        $this->codigo = $this->generarCodigo(8);
    }

    public function liberar($idColaborador)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Juridico' => NULL,
                'Status_baja' => 'En espera'
            ]);
        redirect()->route('turnados');
    }

    public function aceptar($idColaborador)
    {
        DB::table('bajas')->where('idColaborador', '=', $idColaborador)
            ->update([
                'Status_baja' => 'Aceptado',
                'Fecha_Aceptado' => Carbon::now()
            ]);
        $this->render();

        $this->emit('asigaTurnoCorrecto', 'Se ha aceptado el expediente.');
    }

    public function generarCodigo($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) $key .= $pattern[mt_rand(0, $max)];
        return $key;
    }

    public function rechazar($idColaborador)
    {

        DB::table('colaborador')->where('idColaborador', '=', $idColaborador)
            ->update([
                'Status' => '0'
            ]);

        $this->emit('asigaTurnoCorrecto', 'Se ha aceptado el expediente.');
    }

    public function render()
    {
        $this->sendMysBajas();
        return view('livewire.juridico.mis-turnados', ['misturnos' => $this->turnados]);
    }
}
