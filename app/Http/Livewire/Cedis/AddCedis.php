<?php

namespace App\Http\Livewire\Cedis;

use Livewire\Component;
use App\Models\cedisModel;
use Illuminate\Support\Facades\DB;

class AddCedis extends Component
{
    public $Nombre;
    public $Region;
    public $Estado;
    public $Municipio;
    public $Responsable;
    public $Telefono;
    public $Mail;
    public $listaProyectos;

    public function proyectos(){
        $this->listaProyectos=DB::table('proyectos')->get();
    }

    public function render()
    {   $this->proyectos();
        return view('livewire.cedis.add-cedis');
    }
}
