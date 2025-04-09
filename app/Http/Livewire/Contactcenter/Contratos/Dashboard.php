<?php

namespace App\Http\Livewire\Contactcenter\Contratos;

use App\Models\ColaboradorModel;
use Livewire\Component;

class Dashboard extends Component
{
    public $informacion;
    protected $listeners = ['sendIdColaborador'];

    public function sendIdColaborador($id)
    {
        $this->informacion = ColaboradorModel::join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
            ->select(
                'colaborador.Nombre as Nombre_Colaborador',
                'Apellido_Paterno',
                'Apellido_Materno',
                'idColaborador',
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
                'cedis.Nombre as Nombre_Cedis',
                'cedis.Region as Region_Cedis',
                'name'
            )
            ->join('users', 'users.id', 'colaborador.id_usuario')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->where('idColaborador', '=', $id)->get();
            $this->emit('idColaboradorValidacion',$this->informacion);
    }

    public function render()
    {
        return view('livewire.contactcenter.contratos.dashboard', ['persona' => $this->informacion]);
    }
}
