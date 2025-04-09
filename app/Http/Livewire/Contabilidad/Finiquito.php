<?php

namespace App\Http\Livewire\Contabilidad;

use Livewire\Component;
use DB;

class Finiquito extends Component
{
    public $finiquito;
    public $idbaja;

    protected $rules = ['finiquito' => 'required'];
    public function mount($idBajas)
    {
        $this->idbaja = $idBajas;
    }

    public function asignarFiniquito()
    {
        DB::table('bajas')->where('idBajas', $this->idbaja)->update(
            ['Finiquito' => $this->finiquito]
        );
        $this->emit('registroProspecto', 'Finiquito asignado');
        redirect()->route('bajasimss');
    }

    public function render()
    {
        return view('livewire.contabilidad.finiquito');
    }
}
