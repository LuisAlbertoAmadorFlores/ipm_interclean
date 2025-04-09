<?php

namespace App\Http\Livewire\Incidencia;

use Livewire\Component;
use App\Models\IncidenciasModel;
use Illuminate\Support\Facades\Storage;
use DB;

class Tarjetaincidencia extends Component
{
    public $idColaborador;
    public $allIncidenciasColaborador;
    public $byIdColaborador;
    public $foto;

    //incidencias
    public $asigando;
    public $byNombre;


    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function mount($byID, $Nombre)
    {
        $this->asigando = $byID;
        $this->byNombre = $Nombre;
    }

    public function buscarPersona($id)
    {
        $this->idColaborador = $id;
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador;
        $this->getColaborador($this->idColaborador);
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');
        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            $this->foto = 'img/tarjeta.png';
        }
        $this->allIncidenciasColaborador = DB::table('incidencias')->where('id_colaborador', $this->idColaborador)->get();

        $this->emit('refreshListIncidencias');
    }

    public function getColaborador($id)
    {
        $this->byIdColaborador = DB::table('colaborador')
            ->select(
                'colaborador.Nombre as Nombre_Colaborador',
                'Apellido_Paterno',
                'Apellido_Materno',
                'id_colaborador',
                'colaborador.Status',
                'Nombre_Corto_Proyecto',
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
                'SMN',
                'RFC',
                'NSS',
                'Descuento_Nomina',
                'Discapacidad',
                'Credito_Infonavit_Fonacot',
                'Zona',
                'Puesto',
                'Salario',
                'Bono',
                'Banco',
                'Clave_Interbancaria',
                'Numero_Cuenta',
                'Numero_Tarjeta',
                'idColaborador',
                'cedis.Nombre as Nombre_Cedis',
                'Cedis.Region',
                'Sexo',
                'name'
            )
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('proyectos', 'proyectos.idProyecto', 'complementos.Proyecto_Asignado')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->join('users', 'colaborador.id_usuario', 'users.id')
            ->where('complementos.id_colaborador', '=', $id)->get();
    }

    public function render()
    {
        return view('livewire.incidencia.tarjetaincidencia', ['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto, 'allIncidencias' => $this->allIncidenciasColaborador]);
    }
}
