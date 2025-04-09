<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\BajasModel;

class GuardarFiniquito extends Component
{
    public $finiquito;
    public $idColaborador;
    public $idBaja;
    public $codigo;
    public $colaborador;
    public $dataSend = [];

    protected $listeners = ['updateFiniquto'];

    public function mount($idColaborador)
    {
        $this->idColaborador = $idColaborador;
    }

    public function guardarFiniquito()
    {
        $this->dataSend['idColaborador'] = $this->idColaborador;
        $this->dataSend['finiquito'] = $this->finiquito;
        $this->emit('finiquito', $this->dataSend);
    }

    public function updateFiniquto($data)
    {
        BajasModel::where('idColaborador', '=', $data['idColaborador'])
            ->update([
                'Finiquito_Negociado' => $data['finiquito']
            ]);
        $this->emit('finiquitoregistrado');
    }

    public function render()
    {
        return view('livewire.components.guardar-finiquito');
    }
}
