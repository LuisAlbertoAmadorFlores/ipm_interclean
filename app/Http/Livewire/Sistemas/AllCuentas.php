<?php

namespace App\Http\Livewire\Sistemas;

use Livewire\Component;
use DB;
class AllCuentas extends Component
{
    public $allAcounts;
    public $rol;
    public function mount()
    {
        $this->allAcounts = DB::table('users')->whereNot('id', '=', '1')->get();
    }

    public function deshabilitarCuenta($id)
    {

        try {
            DB::table('users')->where('id', '=', $id)
                ->update([
                    'status' => '0',
                    'rol' => $this->rol
                ]);
            $this->emit('Autorizacion', 'La cuenta ha sido autorizada.');
        } catch (\Throwable $th) {
            $this->emit('errorDatosLaborales', $th->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.sistemas.all-cuentas',['acounts' => $this->allAcounts]);
    }
}
