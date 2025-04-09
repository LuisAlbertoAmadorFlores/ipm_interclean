<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use DB;
use Illuminate\Support\Facades\Storage;

class Comprobantepago extends Component
{
    use WithFileUploads;
    public $cantidad;
    public $comprobante;
    public $idColaborador;
    public $nombre;
    public $region;
    public $fechafinal;
    public $fechainicial;
    public $extraccionData;

    public function mount($nombre)
    {
        $this->nombre = $nombre;
    }

    public function asignacionData(){
        $this->extraccionData=explode('_',$this->nombre);   
        $this->region=$this->extraccionData[1];
        $this->fechainicial=$this->extraccionData[2];
        $this->fechafinal=$this->extraccionData[4];
    }


    public function guardarComprobante()
    {
        $carpetaraiz = 'public/Nomina/Ticket_Pagos/';
        $extension=$this->comprobante->getClientOriginalExtension();
        $explode=explode('.',$this->nombre);
        if ($this->comprobante != null) {
            try {
                $this->comprobante->storeAs($carpetaraiz,$explode[0].'.'.$extension);
                Storage::move('public/Nomina/'.$this->nombre,'public/Nomina/Historial/Nomina_Pagada/'.$this->nombre);
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        $this->emit('Personales', 'Los datos se han actualizado correctamente.');
        return redirect()->route('nomina');
    }
   
    public function render()
    {$this->asignacionData();
        return view('livewire.contabilidad.nomina.comprobantepago');
    }
}
