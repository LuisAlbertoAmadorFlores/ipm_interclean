<?php

namespace App\Http\Livewire\Juridico\Bajas;

use Livewire\Component;
use App\Models\BajasModel;
use DB;

class FichaBaja extends Component
{
    public $finiquito;
    public $idBaja;
    public $idColaborador;
    public $colaborador;
    public $dataSend = [];
    public $codigo;
    private $key = '';
    private $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';

    protected $listeners = ['sendIdBaja', 'updateFiniqutoEstatus'];

    public function sendIdBaja($idBaja)
    {
        $this->idBaja = $idBaja;
        $this->colaborador = BajasModel::join('colaborador', 'colaborador.idColaborador', 'bajas.idColaborador')->where('idBajas', $idBaja)->get();
        $this->generarCodigo(8);
    }

    public function generarCodigo($longitud)
    {
        $max = strlen($this->pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) $this->key .= $this->pattern[mt_rand(0, $max)];
        $this->codigo = $this->key;
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

    public function updateFiniqutoEstatus(){

    }
    

    public function render()
    {
        return view('livewire.juridico.bajas.ficha-baja', ['colaborador' => $this->colaborador]);
    }
}
