<?php

namespace App\Http\Livewire\Contactcenter\Atc;

use App\Mail\notificarDepartamento;
use Livewire\Component;
use App\Models\atcModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;

class TableTickets extends Component
{
    use WithPagination;
    public $idColaborador;
    private $tickets;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['sendIdforTicket' => 'buscarPersona', 'updateTickets' => 'buscarPersona'];


    public function mount($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function buscarPersona($id)
    {
        $this->idColaborador = $id;
        $this->getTickets($id);
    }

    public function getTickets($id)
    {
        $this->tickets = atcModel::where('idColaborador', '=', $id)->orderBy('ticket', 'desc')->paginate(6);
    }

    public function render()
    {
        $this->getTickets($this->idColaborador);
        return view('livewire.contactcenter.atc.table-tickets', ['Alltickets' => $this->tickets]);
    }
}
