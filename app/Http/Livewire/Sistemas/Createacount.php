<?php

namespace App\Http\Livewire\Sistemas;

use Livewire\Component;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Createacount extends Component
{
    public $nombre;
    public $correo;
    public $rol;
    public $password = '12345678';

    public function datos()
    {
        try {
            $createUser = new User();
            $createUser->name = $this->nombre;
            $createUser->email = $this->correo;
            $createUser->rol = $this->rol;
            $createUser->password = Hash::make($this->password);
            $createUser->save();
            $this->emit('successdocument', 'Usuario creado correctamente.');
            $this->reset('nombre','correo','rol');
        } catch (\Throwable $th) {
            if ($th->getCode() == '23000') {
                $this->emit('errorCreateColaborador', 'El correo ya se encuentra registrado');
            } else {
                $this->emit('errorCreateColaborador', $th->getMessage());
            }
        }
    }

    public function render()
    {
        return view('livewire.sistemas.createacount');
    }
}
