<?php

namespace App\Http\Livewire\Administrativo\Pagosextras;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Listapagos extends Component
{
    public $resulPagos;
    public $idColaborador;
    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona', 'descuentos' => 'buscarPersona'];

    public function buscarPersona($idColaborador)
    {
        $this->idColaborador=$idColaborador;
        $this->resulPagos = DB::table('pagos_extras')
            ->where('idColaborador', $idColaborador)
            ->orderBy('idPago', 'desc')
            ->get();
    }

    public function cancelarPago($idPago)
    {
        DB::table('pagos_extras')->where('idPago', $idPago)->update(['Status' => 'Cancelado']);
        $this->buscarPersona($this->idColaborador);
    }

    public function render()
    {
        return view('livewire.administrativo.pagosextras.listapagos', ['pagos' => $this->resulPagos]);
    }
}
