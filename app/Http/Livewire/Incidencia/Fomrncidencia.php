<?php

namespace App\Http\Livewire\Incidencia;

use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\IncidenciasModel;
use Illuminate\Support\Facades\Storage;

class Fomrncidencia extends Component
{
    use WithFileUploads;
    //incidencias
    public $fecha;
    public $tipo;
    public $evidencia;
    public $descripcion;
    public $categoria;
    public $asigando;
    public $idColaborador;

    protected $rules =
    [
        'fecha' => 'required',
        'tipo' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required'
    ];
    protected $listeners = ['buscarTarjetaColaborador' => 'mount'];

    public function mount($idColaborador)
    {
        if (is_numeric($idColaborador)) {
            $this->idColaborador = $idColaborador;
        } else {
            $this->idColaborador = $idColaborador[0]['idColaborador'];
        }
    }

    public function saveIncidencia($asigando)
    {
        $this->validate();
        try {
            $carpetaraiz = 'public/Colaboradores';
            $incidencia = new IncidenciasModel();
            $incidencia->Fecha_Incidencia = $this->fecha;
            $incidencia->Tipo_Incidencia = $this->tipo;
            $incidencia->Descripcion = $this->descripcion;
            $incidencia->Categoria = $this->categoria;
            $incidencia->id_colaborador = $this->idColaborador;
            $incidencia->Asignado_by = $asigando;
            $incidencia->save();
            if ($incidencia->idIncidencias > 0) {
                try {
                    $extension=$this->evidencia->extension();
                    $carpetaColaborador = $carpetaraiz . '/' . $this->idColaborador . '/Incidencias';
                    $this->evidencia->storeAs($carpetaColaborador, 'Evidencia_' . $incidencia->idIncidencias . '.'.$extension);
                    $this->reset('fecha', 'tipo', 'evidencia', 'descripcion', 'categoria');
                    $this->emit('incidenciaCreada', 'Se creo correctamente la incidencia.');
                    $this->emit('incidenciaRefresh', $this->idColaborador);
                } catch (\Throwable $th) {
                    $this->emit('errorDocumentos', $th->getMessage());
                }
               
            }
        } catch (\Throwable $th) {
            if ($th->getCode() == "0") {
                $this->emit('errorDocumentos', $th->getMessage());
            } else {
                $this->emit('errorDocumentos', $th->getMessage());
            }
        }
    }
    public function render()
    {
        return view('livewire.incidencia.fomrncidencia');
    }
}
