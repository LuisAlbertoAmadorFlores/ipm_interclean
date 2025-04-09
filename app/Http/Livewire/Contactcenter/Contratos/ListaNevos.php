<?php

namespace App\Http\Livewire\Contactcenter\Contratos;

use App\Models\ColaboradorModel;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ListaNevos extends Component
{
    use WithPagination;
    private $personal;
    protected $paginationTheme = 'bootstrap';

    public function getColaboradores()
    {
        $fechaMaximaView = date("Y-m-d", strtotime(Carbon::now() . "- 60 days"));
        $this->personal = ColaboradorModel::join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
            ->select(
                'colaborador.Nombre as Nombre_Colaborador',
                'Apellido_Paterno',
                'Apellido_Materno',
                'id_colaborador',
                'colaborador.Status as status_documento',
                'Edad',
                'colaborador.Direccion as Direccion_Colaborador',
                'Colaborador.Municipio',
                'colaborador.Estado',
                'Codigo_Postal',
                'Estudios',
                'colaborador.Telefono',
                'colaborador.Email',
                'Emergencia_Nombre',
                'Emergencia_Parentesco',
                'Emergencia_Telefono',
                'complementos.CURP',
                'complementos.RFC',
                'complementos.NSS',
                'Fecha_Ingreso',
                'documentos.Contrato_Digital',
                'name',
            )
            ->join('documentos', 'documentos.id_usuario', 'colaborador.idColaborador')
            ->join('users', 'users.id', 'colaborador.id_usuario')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->where('colaborador.status','0')
            // ->whereBetween('complementos.Fecha_Ingreso', [$fechaMaximaView, Carbon::now()->format('Y-m-d')])
            ->orderBy('colaborador.idColaborador', 'desc')->paginate(13);
    }

    public function render()
    {
        $this->getColaboradores();
        return view('livewire.contactcenter.contratos.lista-nevos', ['personalNuevo' => $this->personal]);
    }
}
