<?php

namespace App\Http\Livewire\Prospectos;

use Livewire\Component;
use App\Models\Prospectos;
use DB;

class AllProspectos extends Component
{
    public $idColaborador;
    public $allSearchColaborador;
    public $dato;
    public $reclutador;

    protected $listeners = ['idBuscar' => 'buscarPersona'];

    public function mount($idColaborador)
    {
        $this->dato = $idColaborador;
    }

    public function buscarPersona($id)
    {
        if (is_numeric($id) === true) {
            $this->allSearchColaborador = Prospectos::all()->where('id', $id);
        } else {
            $this->allSearchColaborador  =   DB::table('prospectos')->where('Nombre', 'LIKE', '%' . $id . '%')->orWhere('Estado', 'LIKE', '%' . $id . '%')->join('users', 'prospectos.idReclutador', '=', 'users.id')->get();
        }
    }

    public function render()
    {
        return view('livewire.prospectos.all-prospectos', ['listColaborador' => $this->allSearchColaborador]);
    }
}
