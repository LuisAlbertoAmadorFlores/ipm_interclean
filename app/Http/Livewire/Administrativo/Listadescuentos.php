<?php

namespace App\Http\Livewire\Administrativo;

use Livewire\Component;
use DB;

class Listadescuentos extends Component
{
    public $resulDescuent;


    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona', 'descuentos' => 'buscarPersona'];

    public function buscarPersona($idColaborador)
    {
        $this->resulDescuent = DB::table('descuento')
            ->where('idColaborador', '=', $idColaborador)
            ->orderBy('Fecha_Asigancion_Descuento','desc')
            ->get();
    }


    public function cancelarDescuento($idDescuento, $idColaborador)
    {
        $affect = DB::table('descuento')->where('idDescuento', '=', $idDescuento)->update(['Status' => 'Cancelado']);
        $this->buscarPersona($idColaborador);
    }

    public function eliminarDescuento($idDescuento)
    {
        DB::table('descuento')->where('idColaborador', '=', $idDescuento)->update(['Status' => 'Cancelado']);
    }

    public function render()
    {
        return view('livewire.administrativo.listadescuentos', ['descuentos' => $this->resulDescuent]);
    }
}
