<?php

namespace App\Http\Livewire\Contactcenter\Atc;

use App\Models\atcModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificarDepartamento;

class Ticket extends Component
{
    public $departamento;
    public $problematica;
    public $comentario;
    public $folio;
    public $idCCenter;
    public $idColaborador;

    protected $listeners = ['sendIdforTicket'];

    protected $rules = ['departamento' => 'required', 'problematica' => 'required', 'comentario' => 'required'];

    public function mount($idCCenter)
    {
        $this->idCCenter = $idCCenter;
    }

    public function sendIdforTicket($idColaborador)
    {
        $this->idColaborador = $idColaborador;
        $this->emit('sendIdforTablet', $idColaborador);
    }

    public function save()
    {
        $this->validate();
        $this->getTicketConsecutivo();
        try {
            $ticket = new atcModel();
            $ticket->Ticket = $this->folio;
            $ticket->Problematica = $this->problematica;
            $ticket->Comentario = $this->comentario;
            $ticket->Involucrados = $this->departamento;
            $ticket->idContactCenter = $this->idCCenter;
            $ticket->idColaborador = $this->idColaborador;
            $ticket->Respuesta='Sin respuesta';
            $ticket->save();
            if ($ticket->id > 0) {
                session()->flash('status', 'Se ha creado correctamente el nuevo Ticket con Folio' . $this->folio);
                Mail::to('alvertokarlos@gmail.com')->send(new notificarDepartamento($this->departamento, $this->folio));
                $this->emit('updateTickets', $this->idColaborador);
                $this->reset('departamento', 'comentario', 'problematica');
            }
        } catch (\Throwable $th) {
            session()->flash('status', 'Error al crear nuevo ticket ' . $th->getMessage());
        }
    }

    public function getTicketConsecutivo()
    {
        //ATCS,ATCC,ATCJ,ATCOP
        $nuevoFolio = DB::table('atencion_colaborador')->select('id')->orderBy('id', 'desc')->first();
       
        if ($nuevoFolio != null) {
            $this->folio = intval($nuevoFolio->id) + 1;
        } else {
            $this->folio = 1;
        }
        switch ($this->departamento) {
            case 'TI':
                $this->folio = 'ATCS25' . $this->folio;
                break;
            case 'Juridico':
                $this->folio = 'ATCJ25' . $this->folio;
                break;
            case 'Contabilidad':
                $this->folio = 'ATCC25' . $this->folio;
                break;
            case 'Operaciones':
                $this->folio = 'ATCO25' . $this->folio;
                break;
        }
    }


    public function render()
    {
        return view('livewire.contactcenter.atc.ticket');
    }
}
