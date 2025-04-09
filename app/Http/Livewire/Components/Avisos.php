<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Avisos extends Component
{
    public $rol;

    public function mount($rol)
    {
        $this->rol = $rol;
    }
    public function render()
    {
        return view('livewire.components.avisos');
    }
}
