<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Documentos extends Component
{
    use WithFileUploads;
    public $carpeta;
    public $documento;
    public $documentoView;
    public $reemplazo;
    public $complementario;

    protected $listeners = ['idColaborador' => 'mount'];

    public function mount($id)
    {
        $this->carpeta = $id;
        $carpetaraiz = 'public/Colaboradores/' . $this->carpeta . '/Otros';
        $this->complementario = Storage::disk('local')->files($carpetaraiz);
    }

    public function buscarDocumento()
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
    }

    public function updateDocument()
    {
        $carpetaraiz = 'public/Colaboradores';
        $carpetaColaborador = $carpetaraiz . '/' . $this->carpeta;

        switch ($this->documento) {
            case 'Foto':
                Storage::putFileAs($carpetaColaborador, $this->reemplazo, $this->documento . '.png');
                break;
            default:
                Storage::putFileAs($carpetaColaborador, $this->reemplazo, $this->documento . '.pdf');
                break;
        }
        $this->reset('documento', 'reemplazo');
        $this->documentoView = 0;
        $this->emit('updateDocumento', 'Se ha actualizado correctamente el documento');
    }



    public function render()
    {
        return view('livewire.colaborador.documentos', ['documento' => $this->documentoView, 'complementarios' => $this->complementario]);
    }
}
