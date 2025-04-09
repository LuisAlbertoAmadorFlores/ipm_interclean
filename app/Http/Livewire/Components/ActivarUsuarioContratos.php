<?php

namespace App\Http\Livewire\Components;

use App\Mail\accesoContrato;
use App\Models\ColaboradorModel;
use App\Models\ContratosModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ActivarUsuarioContratos extends Component
{
    public $idColaborador;
    public $Email;
    public $nombreCompleto;
    public $Myid;

    protected $listeners = ['buscarTarjetaColaborador'];

    public function mount($idColaborador, $Email, $Nombre, $Myid)
    {
        $this->idColaborador = $idColaborador;
        $this->Email = $Email;
        $this->nombreCompleto = $Nombre;
        $this->Myid = $Myid;
    }

    public function micontrato()
    {
        if ($this->existCuenta() == false) {
            try {
                $insertContrato = new ContratosModel();
                $insertContrato['idColaborador'] = $this->idColaborador;
                $insertContrato['idCallCenter'] = $this->Myid;
                $insertContrato['correo'] = $this->Email;
                $insertContrato['password'] = $this->calculateToken('12345678' . $this->idColaborador);
                $insertContrato['status'] = '0';
                $insertContrato['status_ine'] = '0';
                $insertContrato->save();
                if ($insertContrato->id > 0) {
                    $this->emit('ContratoAutorizado', 'Se ha generado correctamente el usuario');
                }
            } catch (\Throwable $th) {
                $this->emit('ContratoAutorizadoError', 'Se ha encontrado un error:' . $th->getMessage());
            }
        }else{
            $this->emit('ContratoAutorizadoError', 'La cuenta ya se encuentra activa.');
        }
    }

    public function existCuenta()
    {
        $exist = DB::table('contratos')->where('idColaborador', '=', $this->idColaborador)->get();
        if (count($exist) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function calculateToken($param)
    {
        $token = password_hash($param,PASSWORD_DEFAULT);
        return $token;
    }

    public function enviarAccesos()
    {
        Mail::to($this->Email)->send(new accesoContrato($this->idColaborador,$this->Email));
    }

    public function getInformation()
    {
        $this->nombreCompleto = ColaboradorModel::where('idColaborador', '=', $this->idColaborador);
    }

    public function render()
    {
        return view('livewire.components.activar-usuario-contratos');
    }
}
