<?php

namespace App\Http\Livewire\Colaborador\Qr;

use Livewire\Component;

class Obtenerqr extends Component
{
    public $qr = false;
    public $idColaborador;

    protected $listeners=['idColaborador'];

    public function idColaborador($idColaborador) {
        $this->idColaborador=$idColaborador;
    }   

    public function showWR()
    {
        if ($this->qr == true) {
            $this->qr = false;
        } else {
            $this->qr = true;
        }
    }

    public function render()
    {
        return view('livewire.colaborador.qr.obtenerqr');
    }
}
