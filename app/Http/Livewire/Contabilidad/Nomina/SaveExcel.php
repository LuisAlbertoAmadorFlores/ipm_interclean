<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Livewire\Component;
use Livewire\WithFileUploads;
use File;

class SaveExcel extends Component
{
    use WithFileUploads;
    public $excelSend;
    public function sendExcel()
    {   
        File::makeDirectory('storage/Nomina', 0755, true, true);
        if ($this->excelSend != null) {
            $this->excelSend->storeAs('public/Nomina/', $this->excelSend->getClientOriginalName());
            $this->emit('excelAcept', 'Se ha cargado correctamente el excel');
            $this->reset('excelSend');
        } else {
            $this->emit('excelError', 'Por favor agrega un excel.');
        }
    }

    public function render()
    {
        return view('livewire.contabilidad.nomina.save-excel');
    }
}
