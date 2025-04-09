<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\Component;
use App\Models\ColaboradorModel;
use Illuminate\Support\Facades\DB;

class Tablacolaboradores extends Component
{
    public $idColaborador;
    public $allSearchColaborador;
    public $dato;

    protected $listeners = ['idBuscar' => 'buscarPersona', 'changedID' => 'mount'];

    public function mount($idColaborador)
    {
        $this->dato = $idColaborador;
    }

    public function buscarPersona($id, $proyecto)
    {
        if ($proyecto == 0) {
            if (is_numeric($id) == true) {
                $this->allSearchColaborador = ColaboradorModel::where('idColaborador', '=', $id)
                    ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                    ->join('documentos','documentos.id_usuario','colaborador.idColaborador')
                    ->where('Status', '!=', '1')->get();
            } else {
                $this->allSearchColaborador  =   DB::table('colaborador')
                    ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                    ->join('documentos','documentos.id_usuario','colaborador.idColaborador')
                    ->where('Nombre', 'LIKE', '%' . $id . '%')
                    ->where('Status', '!=', '1')->get();
            }
        } else {
            if (is_numeric($id) == true) {
                $this->allSearchColaborador = ColaboradorModel::where('idColaborador', '=', $id)
                    ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                    ->join('documentos','documentos.id_usuario','colaborador.idColaborador')
                    ->where('Proyecto_Asignado', '=', $proyecto)
                    ->where('Status', '!=', '1')->get();
            } else {
                $this->allSearchColaborador  =   DB::table('colaborador')
                    ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                    ->join('documentos','documentos.id_usuario','colaborador.idColaborador')
                    ->where('Nombre', 'LIKE', '%' . $id . '%')
                    ->where('Proyecto_Asignado', '=', $proyecto)
                    ->where('Status', '!=', '1')->get();
            }
        }
    }

    public function render()
    {
        return view('livewire.colaborador.tablacolaboradores', ['listColaborador' => $this->allSearchColaborador]);
    }
}
