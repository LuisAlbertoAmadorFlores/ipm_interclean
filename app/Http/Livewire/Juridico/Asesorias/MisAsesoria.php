<?php

namespace App\Http\Livewire\Juridico\Asesorias;

use Illuminate\Support\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MisAsesoria extends Component
{

    public $turnados;
    private $Myid;
    public $codigo;
    public $resolucion;
    public $historiaAsesorias;
 

    protected $listeners = ["misresoluciones" => "render",'updateAsesorias'=>'render'];

    public function mount($id)
    {
        $this->Myid = $id;
    }

    public function misturnados()
    {
        $this->turnados = DB::table('asesoria_juridico')
            ->join('colaborador', 'asesoria_juridico.idColaborador', 'colaborador.idColaborador')
            ->where('idTurno_Juridico', '=', $this->Myid)
            ->whereNull('Fecha_Regresado')
            ->get();
        $this->codigo = $this->generarCodigo(8);
    }

    public function liberar($idColaborador)
    {
        DB::table('asesoria_juridico')->where('idColaborador', '=', $idColaborador)
            ->update([
                'idTurno_Juridico' => NULL,
                'Status_Asesoria' => 'En espera'
            ]);
        redirect()->route('asesorias-juridico');
    }

    public function aceptar($idColaborador)
    {
        DB::table('asesoria_juridico')->where('idColaborador', '=', $idColaborador)
            ->update([
                'Status_Asesoria' => 'Aceptado',
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

    

    public function render()
    {
        $this->misturnados();
        return view('livewire.juridico.asesorias.mis-asesoria', ['misturnos' => $this->turnados]);
    }
}
