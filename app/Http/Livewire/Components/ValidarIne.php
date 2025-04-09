<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ValidarIne extends Component
{
    public $estatusIne;
    public $email;
    public $validada;

    protected $listeners = ['inevalida'];

    public function mount($email)
    {
        $this->email = $email;
        $this->validada = DB::table('contratos')->select('status_ine')->where('correo', '=', $this->email)->get();
    }

    public function inevalida()
    {
        $this->validada = DB::table('contratos')->select('status_ine')->where('correo', '=', $this->email)->get();
    }

    public function saveEstatus()
    {
        if ($this->estatusIne == 'aceptado') {
            try {
                DB::table('contratos')->where('correo', '=', $this->email)->update(['status_ine' => '1']);
                $this->emit('inevalidada', $this->email);
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            try {
                DB::table('contratos')->where('correo', '=', $this->email)->update(['status_ine' => '2']);
                $this->emit('inerechazada', $this->email);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public function render()
    {
        return view('livewire.components.validar-ine');
    }
}
