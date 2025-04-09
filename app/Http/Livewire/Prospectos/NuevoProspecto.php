<?php

namespace App\Http\Livewire\Prospectos;

use Livewire\Component;
use App\Models\Prospectos;

class NuevoProspecto extends Component
{
    public $Nombre;
    public $Apellido_Paterno;
    public $Apellido_Materno;
    public $edad;
    public $direccion;
    public $Colonia;
    public $Municipio;
    public $Estado;
    public $Codigo_Postal;
    public $Telefono;
    public $Email;
    public $idReclutador;

    protected $rules = [
        'Nombre' => 'required|min:3',
        'Apellido_Paterno' => 'required|min:3',
        'Apellido_Materno' => 'required|min:3',
        'edad' => 'required',
        'direccion' => 'required|min:8',
        'Colonia'=> 'required',
        'Municipio' => 'required|min:5',
        'Estado' => 'required',
        'Codigo_Postal' => 'required|min:5',
        'Telefono' => 'required|min:10',
        'Email' => 'required|email',
    ];

    protected $messages = [
        'Nombre.min' => 'Nombre muy corto, por favor rectifica.',
        'Apellido_Paterno.min' => 'Apellido Paterno muy corto, por favor rectifica.',
        'Apellido_Materno.min' => 'Apellido Materno muy corto, por favor rectifica.',
        'direccion.min' => 'Dirección muy corta, por favor rectifica.',
        'Municipio.min' => 'Municipio muy corta, por favor rectifica.',
        'Codigo_Postal' => 'El codigo postal debe tener 5 digitos',
        'Telefono' => 'El numero debe contener 10 digitos'
    ];

    public function mount($idReclutador)
    {
        $this->idReclutador = $idReclutador;
    }

    public function saveProspecto()
    {
        $this->validate();
        $prospecto = new Prospectos();
        $prospecto->Nombre = $this->Nombre;
        $prospecto->Apellido_Paterno = $this->Apellido_Paterno;
        $prospecto->Apellido_Materno = $this->Apellido_Materno;
        $prospecto->Edad = $this->edad;
        $prospecto->Direccion = $this->direccion;
        $prospecto->Municipio = $this->Municipio;
        $prospecto->Colonia= $this->Colonia;
        $prospecto->Estado = $this->Estado;
        $prospecto->Codigo_Postal = $this->Codigo_Postal;
        $prospecto->Telefono = $this->Telefono;
        $prospecto->Email = $this->Email;
        $prospecto->idReclutador = $this->idReclutador;
        $prospecto->save();
        if ($prospecto->id > 0) {
            $this->reset('Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'edad', 'direccion', 'Colonia','Municipio', 'Estado', 'Codigo_Postal', 'Telefono', 'Email');
            $this->emit('registroProspecto', 'Se ha registrado correctamente un nuevo prospecto.');
        }
    }

    public function render()
    {
        return view('livewire.prospectos.nuevo-prospecto');
    }
}
