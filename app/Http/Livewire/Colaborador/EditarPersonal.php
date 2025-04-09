<?php

namespace App\Http\Livewire\Colaborador;

use Livewire\Component;
use DB;

class EditarPersonal extends Component
{
    public $data;
    public $idColaborador;
    public $title = 'Actualizar Colaborador';
    //tabla colaborador
    public $idInsert;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
   
    public $correo;
    public $edad;
    public $direccion;
    public $municipio;
    public $estado;
    public $codigo_postal;
    public $telefono;
    public $idUser;
    public $contador;
    public $AllEstados = [
        "0" => "Selecciona un Estado",
        "1" => "Aguascalientes",
        "2" => "Baja California",
        "3" => "Baja California Sur",
        "4" => "Campeche",
        "5" => "Chiapas",
        "6" => "Chihuahua",
        "7" => "CDMX",
        "8" => "Coahuila",
        "9" => "Colima",
        "10" => "Durango",
        "11" => "Estado de Mexico",
        "12" => "Guanajuato",
        "13" => "Guerrero",
        "14" => "Hidalgo",
        "15" => "Jalisco",
        "16" => "Michoacan",
        "17" => "Morelos",
        "18" => "Nayarit",
        "19" => "Nuevo Leon",
        "20" => "Oaxaca",
        "21" => "Puebla",
        "22" => "Queretaro",
        "23" => "Quintana Roo",
        "24" => "San Luis Potosi",
        "25" => "Sinaloa",
        "26" => "Sonora",
        "27" => "Tabasco",
        "28" => "Tamaulipas",
        "29" => "Tlaxcala",
        "30" => "Veracruz",
        "31" => "Yuacatan",
        "32" => "Zacatecas"
    ];

    public function mount($id)
    {
        $this->data = DB::table('colaborador')->where('idColaborador', $id)->get();
        $this->nombre = $this->data[0]->Nombre;
        $this->apellido_paterno = $this->data[0]->Apellido_Paterno;
        $this->apellido_materno = $this->data[0]->Apellido_Materno;
        $this->edad = $this->data[0]->Edad;
        $this->direccion = $this->data[0]->Direccion;
        $this->municipio = $this->data[0]->Municipio;
        $this->estado = $this->data[0]->Estado;
        $this->codigo_postal = $this->data[0]->Codigo_Postal;
        $this->telefono = $this->data[0]->Telefono;
        $this->correo = $this->data[0]->Email;
        $this->idColaborador = $this->data[0]->idColaborador;
    }

    public function savedata()
    {
        DB::table('colaborador')->where('idColaborador', $this->idColaborador)
            ->update([
                'Nombre' => $this->nombre,
                'Apellido_Paterno' => $this->apellido_paterno,
                'Apellido_Materno' => $this->apellido_materno,
                'Edad' => $this->edad,
                'Direccion' => $this->direccion,
                'Municipio' => $this->municipio,
                'Estado' => $this->estado,
                'Codigo_Postal' => $this->codigo_postal,
                'Telefono' => $this->telefono,
                'Email' => $this->correo,
            ]);
        $this->emit('Personales', 'Los datos se han actualizado correctamente.');
        return redirect()->route('consultaColaborador');
    }

    public function render()
    {
        return view('livewire.colaborador.editar-personal', ['Colaborador' => $this->data]);
    }
}
