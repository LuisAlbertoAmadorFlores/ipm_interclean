<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\Component;
use DB;
use Illuminate\Support\Facades\Storage;


class Tarjetacolaborador extends Component
{
    public $idColaborador;
    public $allSearchColaborador;
    public $byIdColaborador;
    public $estado;
    public $foto;

    public $contador;

    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function mount($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function buscarPersona($idColaborador)
    {

        $this->idColaborador = $idColaborador;
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador;
        $otros = $carpetaraiz . '/Otros/';

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
                'name',
                'Fecha_Ingreso'
            )
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('proyectos', 'proyectos.idProyecto', 'complementos.Proyecto_Asignado')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->join('users','colaborador.id_usuario','users.id')
            ->where('colaborador.idColaborador', '=', $this->idColaborador)
            ->where('complementos.id_colaborador', '=', $this->idColaborador)->get();

        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');

        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            if ($this->byIdColaborador[0]->Sexo == "H") {
                $this->foto = 'img/Hombre.jpg';
            } else {
                $this->foto = 'img/Mujer.svg';
            }
        }
        $this->emit('idColaborador', $this->idColaborador);
    }

    public function render()
    {
        return view('livewire.colaborador.tarjetacolaborador', ['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto]);
    }
}
