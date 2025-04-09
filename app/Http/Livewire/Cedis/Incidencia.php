<?php

namespace App\Http\Livewire\Cedis;

use App\Models\IncidenteCedisModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class Incidencia extends Component
{
    use WithFileUploads;
    //incidencias
    public $fecha;
    public $colaborador;
    public $evidencia;
    public $descripcion;
    public $categoria;
    public $asigando;
    public $cedis;
    public $idColaborador;

    protected $rules =
    [   
        'fecha' => 'required',
        'descripcion' => 'required',
        'categoria' => 'required'
    ];

    protected $listeners = ['incidenciaCedis' => 'asignaIDCedis'];

    public function asignaIDCedis($data)
    {
        $this->cedis = $data[0]['data'];
    }

    public function saveIncidencia($asigando)
    {
        $this->validate();
        

        try {
            $carpetaraiz = 'public/cedis';
            $incidencia = new IncidenteCedisModel();
            $incidencia->Fecha_Incidencia = $this->fecha;
            $incidencia->Descripcion = $this->descripcion;
            $incidencia->Categoria = $this->categoria;
            $incidencia->idColaborador = $this->colaborador;
            $incidencia->idCedis = $this->cedis;
            $incidencia->Asignado_by = $asigando;
            $incidencia->save();
            if ($incidencia->idIncidencias > 0) {
                try {
                    $carpetaColaborador = $carpetaraiz . '/' . $this->cedis . '/Incidencias';
                    if (isset($this->evidencia)) {
                        $extension = $this->evidencia->getClientOriginalExtension();
                        $this->evidencia->storeAs($carpetaColaborador, 'Incidencia_Evidencia_' . $incidencia->idIncidencias . '.' . $extension);
                    }
                    $this->reset('fecha', 'colaborador', 'evidencia', 'descripcion', 'categoria');
                    $this->emit('incidenciaCreada', 'Se creo correctamente la incidencia.');
                } catch (\Throwable $th) {
                    $this->emit('errorDocumentos', $th->getMessage());
                }
            }
        } catch (\Throwable $th) {
            $this->emit('errorDocumentos', $th->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.cedis.incidencia');
    }
}
