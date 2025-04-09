<?php

namespace App\Http\Livewire\Sistemas;

use Livewire\Component;
use DB;

class ViewCuentas extends Component
{
    public $allAcounts;
    public $rol;
    

    public function autorizarCuenta($id)
    {   
        try {
            DB::table('users')->where('id', '=', $id)
                ->update([
                    'status' => '0',
                    'update_password'=>'1'
                ]);
            $this->emit('autorizacion', 'La cuenta ha sido autorizada.');
        } catch (\Throwable $th) {
            $this->emit('errorDatosLaborales', $th->getMessage());
        }
    }
    public function render()
    {
        $this->allAcounts = DB::table('users')->where('status', '=', '1')->orderBy('id', 'desc')->get();
        return view('livewire.sistemas.view-cuentas', ['acounts' => $this->allAcounts]);
    }
}
