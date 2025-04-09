<?php

namespace App\Http\Livewire\Juridico\Asesorias;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Asesoria extends Component
{
    public $idAsesoria;
    public $respuestLegal;

    public function mount($idAsesoria){
        $this->idAsesoria=$idAsesoria;
    }

    public function respuesta()
    {   
        DB::table('asesoria_juridico')->where('idAsesoria', '=', $this->idAsesoria)
            ->update([
                'Respuesta' => $this->respuestLegal
            ]);
        $this->emit('asigaTurnoCorrecto', 'Colaborador regresado a coordinador.');
        return redirect()->route('asesorias-juridico');
    }

    public function render()
    {
        return view('livewire.juridico.asesorias.asesoria');
    }
}
