<?php

namespace App\Http\Livewire\Components;

use App\Mail\VerificacionCorreoColaborador;
use App\Models\ColaboradorModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ValidacionCorreo extends Component
{
    public $data;
    public $codigo;

    protected $listeners = ['idColaboradorValidacion'];

    public function idColaboradorValidacion($data)
    {
        $this->data = $data;
        $this->codigo = $this->code(8);
    }

    public function enviarCorreo()
    {
        try {
            Mail::to($this->data[0]['Email'])->send(new VerificacionCorreoColaborador($this->data[0]['Nombre_Colaborador'].' '.$this->data[0]['Apellido_Paterno'].' '.$this->data[0]['Apellido_Materno'], $this->codigo));
            $this->emit('Correocorrecto', 'Correo de Validacion Enviado');
        } catch (\Throwable $th) {
            $this->emit('CorreoIncorrecto', $th->getMessage());
            throw $th;
        }
    }

    public function code($longitud)
    {
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
        $max = strlen($pattern) - 1;
        for ($i = 0; $i < $longitud; $i++) $key .= $pattern[mt_rand(0, $max)];
        return $key;
    }

    public function render()
    {
        return view('livewire.components.validacion-correo');
    }
}
