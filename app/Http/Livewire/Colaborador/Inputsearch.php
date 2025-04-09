<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\Component;

class Inputsearch extends Component
{
    public $dato;
    public $proyecto;

    protected $rules = [
        'dato' => 'required|min:1|',
    ];
    protected $messages = [
        'dato.required' => 'Por favor ingresa un Id o Nombre.',
        'email.email' => 'The Email Address format is not valid.',
    ];
    
    public function mount($id,$proyecto)
    {
        $this->dato = $id;
        $this->proyecto=$proyecto;
    }

    public function sendDato()
    {
        $this->validate();
        $this->emit('idBuscar', $this->dato,$this->proyecto);
    }

    public function render()
    {
        return view('livewire.colaborador.inputsearch');
    }
}
