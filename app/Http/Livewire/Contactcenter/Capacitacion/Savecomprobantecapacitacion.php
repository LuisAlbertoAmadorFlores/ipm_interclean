<?php

namespace App\Http\Livewire\Contactcenter\Capacitacion;

use Livewire\Component;
use Livewire\WithFileUploads;

class Savecomprobantecapacitacion extends Component
{
    use WithFileUploads;

    public $comprobante;
    public $idColaborador;

    protected $listeners=['sendIdColaboradorCap'];

    public function sendIdColaboradorCap($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function save()
    {
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador . '/Otros/';
        if ($this->comprobante != null) {
            try {
                $this->comprobante->storeAs($carpetaraiz, 'Capacitación PROSMAN APP.pdf');
                $this->reset('comprobante');
                $this->emit('cargaExitosa', 'Documento cargado con exito.');
            } catch (\Throwable $th) {
                $this->emit('errorDocumentos', $th->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.contactcenter.capacitacion.savecomprobantecapacitacion');
    }
}
