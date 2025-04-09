<?php

namespace App\Http\Livewire\Juridico;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AllDocumentos extends Component
{
    public $carpeta;
    public $documento;
    public $documentoView;
    public $complementario;
    

    protected $listeners = ['buscarTarjetaColaborador' => 'mount'];

    public function mount($id)
    {   
        $this->reset('documento','documentoView');
        $this->carpeta = $id;
        $carpetaraiz = 'public/Colaboradores/' . $this->carpeta . '/Otros';
        $this->complementario = Storage::disk('local')->files($carpetaraiz);
    }

    public function buscarDocumentos()
    {
        $carpetaraiz = 'public/Colaboradores/' . $this->carpeta;
        switch ($this->documento) {
            case 'Foto':
                $existenciaFoto = Storage::exists($carpetaraiz . '/' . $this->documento  . '.jpg');
                if ($existenciaFoto == true) {
                    $this->documentoView = 'storage/Colaboradores/' . $this->carpeta . '/Foto.jpg';
                } else {
                    $this->documentoView = 0;
                }
                break;
            default:
                $existenciaDocumento = Storage::exists($carpetaraiz . '/' . $this->documento  . '.pdf');

                if ($existenciaDocumento == false) {
                    $otros = Storage::exists($carpetaraiz . '/Otros/' . $this->documento  . '.pdf');
                    if ($otros == true) {
                        $this->documentoView = 'storage/Colaboradores/' . $this->carpeta . '/Otros/' . $this->documento . '.pdf';
                    } else {
                        $this->documentoView = 0;
                    }
                } else {
                    if ($existenciaDocumento == true) {
                        $this->documentoView = 'storage/Colaboradores/' . $this->carpeta . '/' . $this->documento . '.pdf';
                    } else {
                        $this->documentoView = 0;
                    }
                }
                break;
        }
        $this->emit('documento',$this->documento);
        $this->emit('setColaborador',$this->carpeta);
    }

    public function render()
    {
        return view('livewire.juridico.all-documentos', ['documento' => $this->documentoView, 'complementarios' => $this->complementario]);
    }
}
