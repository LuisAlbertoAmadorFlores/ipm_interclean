<?php

namespace App\Http\Livewire\Contabilidad\Timbrado;

use Livewire\Component;
use DB;

class Proyectos extends Component
{
    public $proyecto;
    public $flat = true;
    public $seleccion;
    public $resultados;
    public $timbrado;
    public $personal;
    public $region;
    public $theregion;
    protected $rules = ['proyecto' => 'required'];

    public function getProyectos()
    {
        $this->resultados = DB::table('proyectos')->get();
    }

    public function buscarPlantilla()
    {   
        $this->validate();
        $this->timbrado = DB::table('complementos')->where('Proyecto_Asignado', $this->proyecto)->count();
        $this->seleccion = $this->proyecto;
        $this->flat=false;
    }

    public function render()
    {
        $this->getProyectos();
        return view('livewire.contabilidad.timbrado.Proyectos');
    }
}
