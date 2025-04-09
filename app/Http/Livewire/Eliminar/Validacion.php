<?php

namespace App\Http\Livewire\Eliminar;

use Livewire\Component;
use App\Models\BajasModel;
use App\Models\AsesoriaModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DateTime;

class Validacion extends Component
{
    public $inputConfirmacion;
    public $codigo;
    public $idColaborador;
    public $idTurno_Coordinador;
    public $tipoSolicitud;
    public $comentario;
    public $fechaBaja;
    public $adeudo;

    protected $listeners = ['MessageAsesoria' => 'asiganComentario'];

    protected $rules = [
        'inputConfirmacion' => 'required|min:8'
    ];


    protected $messages = [
        'inputConfirmacion.min' => 'Faltan Caracteres.'
    ];

    public function mount($codigo, $idColaborador, $idCoordinador, $solicitud)
    {
        $this->codigo = $codigo;
        $this->idColaborador = $idColaborador;
        $this->idTurno_Coordinador = $idCoordinador;
        $this->tipoSolicitud = $solicitud;
    }

    public function asiganComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    public function turnarJuridico()
    {
        $this->validate();

        if ($this->inputConfirmacion == $this->codigo) {
            if ($this->tipoSolicitud == 'baja') {
                $fechaAlta = DB::table('complementos')->select('Fecha_Ingreso')->where('id_colaborador', $this->idColaborador)->get();
                $finiquito = $this->calcularFiniquito($fechaAlta[0]->Fecha_Ingreso, $this->fechaBaja, '278.80', $this->adeudo);
                try {
                    $baja = new BajasModel();
                    $baja->idColaborador = $this->idColaborador;
                    $baja->idTurno_Coordinador = $this->idTurno_Coordinador;
                    $baja->Fecha_Espera = Carbon::now();
                    $baja->Fecha_Turnado = Carbon::now();
                    $baja->save();
                    if ($baja->idBajas > 0) {
                        DB::table('colaborador')->join('bajas', 'colaborador.idColaborador', 'bajas.idColaborador')->where('colaborador.idColaborador', $this->idColaborador)
                            ->update([
                                'Status' => '2',
                                'Fecha_Cal_Finiquito' => $this->fechaBaja,
                                'Cantidad_adeudo' => $this->adeudo,
                                'Finiquito' => json_encode($finiquito)
                            ]);
                        return redirect()->route('deletePeople');
                    }
                } catch (\Throwable $th) {
                    dd(throw $th);
                }
            } else {
                try {
                    $asesoria = new AsesoriaModel();
                    $asesoria->idColaborador = $this->idColaborador;
                    $asesoria->idTurno_Coordinador = $this->idTurno_Coordinador;
                    $asesoria->Comentario = $this->comentario;
                    $asesoria->Fecha_Espera = Carbon::now();
                    $asesoria->Fecha_Turnado = Carbon::now();
                    $asesoria->save();
                    return redirect()->route('deletePeople');
                } catch (\Throwable $th) {
                    throw $th;
                }
            }


            $this->emit('turnado', 'Colaborador asigando a Juridico');
        } else {
            $this->emit('errorturnado', 'El codigo no coincide, rectifica.');
        }
    }

    public function calcularFiniquito($fechaIngreso, $fechaBaja, $salarioDiario, $adeudo)
    {
        // Constantes
        $diasAguinaldo = 15;
        $diasAnio = 365;
        $diasVacaciones = 12;
        $descuentoPorcentual = 0.9;
        $primaPorcentual = 0.25;

        // Convertir fechas a objetos DateTime
        $fechaIngreso = new DateTime($fechaIngreso);
        $fechaBaja = new DateTime($fechaBaja);

        // Calcular días laborados
        $diasLaborados = $fechaIngreso->diff($fechaBaja)->days;

        // Cálculo de prestaciones
        $aguinaldo = ($diasAguinaldo / $diasAnio) * $salarioDiario * $diasLaborados;
        $vacaciones = $diasVacaciones * ($salarioDiario / $diasAnio) * $diasLaborados * $descuentoPorcentual;
        $primaVacacional = $vacaciones * $primaPorcentual;

        // Cálculo del total del finiquito
        $totalFiniquito = ($aguinaldo + $vacaciones + $primaVacacional) - $adeudo;

        return [
            'diasLaborados' => $diasLaborados,
            'aguinaldo' => number_format($aguinaldo, 2),
            'vacaciones' => number_format($vacaciones, 2),
            'primaVacacional' => number_format($primaVacacional, 2),
            'totalFiniquito' => number_format($totalFiniquito, 2)
        ];
    }

    public function render()
    {
        return view('livewire.eliminar.validacion');
    }
}
