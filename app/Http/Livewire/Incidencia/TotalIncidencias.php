<?php

namespace App\Http\Livewire\Incidencia;

use Livewire\Component;
use App\Models\IncidenciasModel;
use Illuminate\Support\Facades\Storage;

class TotalIncidencias extends Component
{
    public $idColaborador;
    public $allIncidenciasColaborador;
    protected $listeners = ['incidenciaRefresh' => 'updateIncidencias', 'buscarTarjetaColaborador' => 'mount'];

    public function mount($idColaborador)
    {
        if (is_numeric($idColaborador)) {
            $this->idColaborador = $idColaborador;
        } else {
            $this->idColaborador = $idColaborador[0]['idColaborador'];
        }
        $this->allIncidenciasColaborador = IncidenciasModel::all()->where('id_colaborador', $this->idColaborador);
    }

    public function updateIncidencias()
    {
        $this->allIncidenciasColaborador = IncidenciasModel::all()->where('id_colaborador', $this->idColaborador);
    }


    public function downEvidencia($idColaborador,$id){

        $path = 'public/Colaboradores/' . $idColaborador . '/Incidencias/';

        if (Storage::exists($path . 'Evidencia_' . $id . '.mp4')) {
            $extension = '.mp4';
        }
        if (Storage::exists($path . 'Evidencia_' . $id . '.mp3')) {
            $extension = '.mp3';
        }
        if (Storage::exists($path . 'Evidencia_' . $id . '.pdf')) {
            $extension = '.pdf';
        }
        if (Storage::exists($path . 'Evidencia_' . $id . '.jpg')) {
            $extension = '.jpg';
        }
        return Storage::download('public/Colaboradores/' . $idColaborador . '/Incidencias/Evidencia_' . $id .$extension, 'Incidencia_Evidencia_' . $id .$extension);
    }

    // public function downEvidencia($idColaborador,$id){
    //     return Storage::download('public/Colaboradores/'.$idColaborador.'/Incidencias/Evidencia_'.$id.'.pdf','Incidencia_Evidencia_'.$id);
    // }
    public function render()
    {
        return view('livewire.incidencia.total-incidencias', ['allIncidencias' => $this->allIncidenciasColaborador]);
    }
}
