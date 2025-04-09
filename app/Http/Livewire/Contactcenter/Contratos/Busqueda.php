<?php

namespace App\Http\Livewire\Contactcenter\Contratos;

use Livewire\Component;

class Busqueda extends Component
{
    public $search;

    public function buscar()
    {
        if ($this->search != '') {
            $this->emit('busquedaContratos', $this->search);
        } else {
            $this->emit('errorBusquedaInput');
        }
    }

    public function render()
    {
        return view('livewire.contactcenter.contratos.busqueda');
    }
}
