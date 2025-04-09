<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use App\Models\DescuentosModel;
use Livewire\Component;
use DB;
use App\Models\NominaModel;
use App\Models\pagosExtrasModel;
use Livewire\WithFileUploads;

class Persona extends Component
{
    use WithFileUploads;
    public $idColaborador;
    public $fechafinal;
    public $fechainicial;
    public $result;
    public $descuento;
    public $totalSalario;
    public $nomina;
    public $datos;
    public $sumaPago = 0;
    public $flatFaltaInjustificada = false;
    public $flatBono = false;
    public $evidenciaAsistencia;

    public $pagosextras;
    public $procedePago;

    public function mount($idColaborador, $fechaInicial, $fechafinal)
    {
        $this->idColaborador = $idColaborador;
        $this->fechafinal = $fechafinal;
        $this->fechainicial = $fechaInicial;
    }

    public function getDescuentos()
    {
        $this->descuento = DescuentosModel::where('idColaborador', $this->idColaborador)
            ->whereBetween('Fecha_Asigancion_Descuento', [$this->fechainicial, $this->fechafinal])
            ->where('Descripcion', '!=', 'Descuento generado por falta Injustificada')
            ->get()->sum('Cantidad_Descontada');
    }

    public function getPagosExtras()
    {
        $this->pagosextras = pagosExtrasModel::where('idColaborador', $this->idColaborador)->whereBetween('Fecha_Asignacion_Pago', [$this->fechainicial, $this->fechafinal])->get()->sum('Pago_Total');
    }

    public function getNombre()
    {
        $this->datos = DB::table('colaborador')->join('complementos', 'colaborador.idColaborador', 'complementos.id_colaborador',)->where('idColaborador', $this->idColaborador)->get();
    }

    public function laborado()
    {
        $this->result = DB::table('lista_asistencia')
            ->join('complementos', 'lista_asistencia.idColaborador', 'complementos.id_colaborador')
            ->whereBetween('Fecha_Laboral', [$this->fechainicial, $this->fechafinal])
            ->where('idColaborador', $this->idColaborador)
            ->orderby('Fecha_Laboral', 'asc')
            ->get();
        $this->emit('sendColaboradordata', $this->result);
        $this->getNombre();
        $this->getDescuentos();
        $this->getPagosExtras();
    }

    public function agregarNomina($sumaPago, $Descuento, $Bono, $pagosextras, $nomina, $coordinador)
    {
        try {
            $existencia = DB::table('nomina')->where('Fecha_Inicial', $this->fechainicial)->where('Fecha_Final', $this->fechafinal)
                ->where('idColaborador', $this->idColaborador)->exists();
            if ($existencia > 0) {
                $this->emit('Nomina_existe', 'Ya se tiene registro de nomina para este colaborador en el periodo "' . date('d-m-Y', strtotime($this->fechainicial)) . '" - "' .  date('d-m-Y', strtotime($this->fechafinal)) . '"');
            } else {
                if ($this->evidenciaAsistencia != null) {
                    NominaModel::create([
                        'Saldo_Pagar' => number_format($nomina),
                        'Descuentos' => $Descuento,
                        'Pago_Extra' => $pagosextras,
                        'Bono' => $Bono,
                        'acumulado_diario' => number_format($sumaPago),
                        'Procede_Pago' => $this->procedePago,
                        'Fecha_Inicial' => $this->fechainicial,
                        'Fecha_Final' => $this->fechafinal,
                        'idColaborador' => $this->idColaborador,
                        'idCoordinador' => $coordinador
                    ]);
                    $count = 0;
                    foreach ($this->evidenciaAsistencia as $documento) {
                        $documento->storeAs('public/Colaboradores/' . $this->idColaborador . '/Lista_Asistencia/', 'Pase_de_Lista_' . $this->fechainicial . '_' . $this->fechafinal . '_' . $count . '.jpg');
                        $count++;
                    }
                    $this->reset('evidenciaAsistencia');
                    $this->emit('Nomina_turnada', 'Se ha aprobado correctamente.');
                } else {
                    $this->emit('errorDocumentoLista', 'No se adjunto ninguna foto de pase de lista y  que respalde el sueldo.');
                }
            }
        } catch (\Throwable $th) {
            $this->emit('errorDesarrollo', 'Por favor reporta este error a Desarrollo-Sistemas o al Correo Electronico soporteTI@prosman.com.mx' . "   " . $th->getMessage());
        }
    }

    public function render()
    {
        $this->laborado();
        return view('livewire.contabilidad.nomina.persona', ['detalles' => $this->result, 'descuentos' => $this->descuento]);
    }
}
