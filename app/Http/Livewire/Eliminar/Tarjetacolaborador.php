<?php

namespace App\Http\Livewire\Eliminar;

use Livewire\Component;
use App\Models\BajasModel;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class Tarjetacolaborador extends Component
{
    public $idColaborador;
    public $allSearchColaborador;
    public $byIdColaborador;
    public $deleteColaborador;
    public $foto;
    public $existBaja;



    protected $clave;

    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function mount($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function buscarPersona($id)
    {
        $this->idColaborador = $id;
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador;
        // $this->byIdColaborador = DB::table('colaborador')
        //     ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
        //     ->join('proyectos','proyectos.idProyecto','complementos.Proyecto_Asignado')
        //     ->where('colaborador.idColaborador', '=', $this->idColaborador)->get();
        $this->byIdColaborador = DB::table('colaborador')->select(
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
            ->where('colaborador.idColaborador', '=', $this->idColaborador)->get();
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');


        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            $this->foto = 'img/tarjeta.png';
        }
        $this->clave = $this->generarCodigo(8);
        $this->byIdColaborador['codigo'] = $this->clave;
    }

    public function changerState(Request $request, $idDelete)
    {
        // $this->byIdColaborador = DB::table('colaborador')
        //     ->join('laboral', 'colaborador.id', '=', 'laboral.id_colaborador')
        //     ->where('colaborador.id', '=', $idDelete)->get();

        // if ($this->byIdColaborador[0]->Status === '0') {
        //     $colaborador = ColaboradorModel::find($idDelete);
        //     $colaborador->Status = '1';
        //     $colaborador->save();
        // } elseif ($this->byIdColaborador[0]->Status === '1') {
        //     $colaborador = ColaboradorModel::find($idDelete);
        //     $colaborador->Status = '0';
        //     $colaborador->save();
        // }
        // $this->emit('updateStatus', 'Se realizo el cambio de Vigencia forma completa');
    }

    public   function generarCodigo($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) $key .= $pattern[mt_rand(0, $max)];
        return $key;
    }


    public function render()
    {
        return view('livewire.eliminar.tarjetacolaborador', ['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto, 'existeEliminacion' => $this->existBaja]);
    }
}
