<?php

namespace App\Http\Livewire\Contactcenter\Atc;

use App\Models\atcModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Tarjeta extends Component
{
    use WithPagination;
    public $idColaborador;
    public $asigando;
    public $byIdColaborador;
    private $tickets;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function buscarPersona($id)
    {
        $this->idColaborador = $id;
        $this->emit('sendIdforTicket',$id);
        $this->getColaborador($this->idColaborador);
    }

    public function getColaborador($id)
    {
        $this->byIdColaborador = DB::table('colaborador')
            ->select(
                'cedis.nombre as Nombre_Cedis',
                'colaborador.nombre as Nombre_Colaborador',
                'Apellido_Paterno',
                'Apellido_Materno',
                'Status',
                'colaborador.idColaborador',
                'Region'
            )
            ->join('complementos', 'colaborador.idColaborador', 'complementos.id_colaborador')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->where('idColaborador', '=', $id)->get();
    }


    public function render()
    {
        return view('livewire.contactcenter.atc.tarjeta', ['byColaborador' => $this->byIdColaborador]);
    }
}
