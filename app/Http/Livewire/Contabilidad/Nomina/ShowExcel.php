<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class ShowExcel extends Component
{
    protected $listeners = ['obtenerExceles'];
    public $complementario;

    public function mount()
    {
        $carpetaraiz = 'public/Nomina/';
        $this->complementario = Storage::disk('local')->files($carpetaraiz);
    }

    public function render()
    {
        return view('livewire.contabilidad.nomina.show-excel');
    }
}
