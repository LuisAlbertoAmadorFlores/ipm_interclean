<?php

namespace App\Http\Livewire\Juridico;

use Carbon\Carbon;
use DB;
use App\Models\HistoirialBajaModel;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Resolucion extends Component
{
    use WithFileUploads;
    public $resolucion;
    public $idJuridico;
    public $idBaja;
    public $evidencia;
    public $idColaborador;
    public $total;
    public $result;

    protected $rules = ['resolucion' => 'required|min:10', 'evidencia' => 'required'];
    protected $messages = [
        'resolucion.min' => 'El texto es muy corto, detalla mas tu analisis por favor.',
        'evidencia.required' => 'Falta evidencia'
    ];

    public function mount($idJuridico, $idColaborador, $idBaja)
    {
        $this->idColaborador = $idColaborador;
        $this->idJuridico = $idJuridico;
        $this->idBaja = $idBaja;
    }

    public function comentario()
    {
        $this->validate();
        $carpetaraiz = 'public/Colaboradores';
        $carpetaColaborador = $carpetaraiz . '/' . $this->idColaborador . '/Baja/Historial';
        $comentario = new HistoirialBajaModel();
        $comentario->idColaborador = $this->idColaborador;
        $comentario->idJuridico = $this->idJuridico;
        $comentario->Comentario = $this->resolucion;
        $comentario->idBaja = $this->idBaja;
        $comentario->save();
        if ($comentario->idHistorialBaja != '0') {
            $this->evidencia->storeAs($carpetaColaborador, 'Evidencia_' . $comentario->idHistorialBaja . '_.pdf');
            $this->emit('asigaTurnoCorrecto', 'Se agrego correctamente el comentario.');
        }
        $this->reset('resolucion', 'evidencia');
    }

    public function historial()
    {
        $this->result = DB::table('historial_baja')
            ->join('users', 'historial_baja.idJuridico', 'users.id')
            ->where('idColaborador', '=', $this->idColaborador)->get();
        $this->totalcomentarios();
    }

    public function totalcomentarios()
    {
        $this->total = DB::table('historial_baja')->where('idColaborador', '=', $this->idColaborador)->count();
    }

    public function descargarEvidencia($id)
    {
        return Storage::download('public/Colaboradores/' . $this->idColaborador . '/Baja/Historial/Evidencia_' . $id . '_.pdf', 'Evidencia_' . $id);
    }

    public function render()
    {
        $this->historial();
        return view('livewire.juridico.resolucion', ['persona' => $this->result,'total'=>$this->total]);
    }
}
