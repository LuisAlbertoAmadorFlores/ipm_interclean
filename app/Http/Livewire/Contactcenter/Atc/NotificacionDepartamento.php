<?php

namespace App\Http\Livewire\Contactcenter\Atc;

use App\Mail\notificarDepartamento;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class NotificacionDepartamento extends Component
{
    private $ticket;
    public function mount($ticket)
    {
        $this->ticket = $ticket;
    }

    public function enviarNotificacion()
    {
        $result = DB::table('atencion_colaborador')->where('Ticket', $this->ticket)->get();
        dd($result);
        Mail::to('alvertokarlos@gmail.com')->send(new notificarDepartamento('TI', 'ATCS2501'));
    }

    public function render()
    {
        return view('livewire.contactcenter.atc.notificacion-departamento');
    }
}
