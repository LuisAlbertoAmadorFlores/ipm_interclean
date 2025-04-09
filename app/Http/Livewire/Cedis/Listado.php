<?php

namespace App\Http\Livewire\Cedis;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Listado extends Component
{

    public $region;
    public $flat=true;

    protected $rules=['region'=>'required'];

    public function limpiar(){
         $this->emit('clearData');
         $this->flat=true;
    }

    public function buscar()
    {   $this->validate();
        $this->emit('sendCedisData',['nombre'=>$this->region]);
        $this->reset('region');
        $this->flat=false;
    }

    public function render()
    {
        return view('livewire.cedis.listado');
    }
}
