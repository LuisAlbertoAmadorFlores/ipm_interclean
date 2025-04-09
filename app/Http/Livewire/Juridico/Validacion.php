<?php

namespace App\Http\Livewire\Juridico;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Validacion extends Component
{
    public $codigoConfirmacion;
    public $idRow;
    public $codigo;
    public $idColaborador;
    public $tipoSolicitud;

    protected $listeners = ['updatebajas' => 'render'];

    protected $rules = ['codigoConfirmacion' => 'required|min:8|max:8'];

    protected $messages = [
        'codigoConfirmacion.min' => 'No coincide el codigo, faltan caracteres.',
        'codigoConfirmacion.max' => 'No coincide el codigo, sobran caracteres.'
    ];

    public function mount($code, $idRow, $idColaborador, $type)
    {
        $this->codigo = $code;
        $this->idRow = $idRow;
        $this->idColaborador = $idColaborador;
        $this->tipoSolicitud = $type;
    }


    public function generarBaja()
    {
        $this->validate();
        if ($this->tipoSolicitud == 'Baja') {
            if ($this->codigoConfirmacion == $this->codigo) {
                try {
                    DB::table('bajas')->join('colaborador', 'colaborador.idColaborador', 'bajas.idColaborador')->where('idBajas', '=', $this->idRow)
                        ->update([
                            'Fecha_Baja' => Carbon::now(),
                            'Status' => '1'
                        ]);
                    redirect()->route('turnados');
                } catch (\Throwable $th) {
                    throw $th;
                }
            } else {
                $this->emit('errorturnado', 'El codigo no coincide por favor verifica.');
            }
        } else {
            DB::table('asesoria_juridico')->where('idAsesoria', $this->idRow)
                ->update([
                    'Status_Asesoria' => 'Regresado',
                    'Fecha_Regresado' => Carbon::now()
                ]);
            return redirect()->route('asesorias-juridico');
        }
    }

    public function render()
    {
        return view('livewire.juridico.validacion');
    }
}
