<?php

namespace App\Http\Livewire\Administrativo\Pagosextras;


use Livewire\Component;
use Illuminate\Support\Carbon;
use App\Models\pagosExtrasModel;
use Illuminate\Support\Facades\DB;

class Motivo extends Component
{
    public $fechacubrio;
    public $motivo;
    public $cantidad;
    public $aquiencubrio;
    public $idColaborador;
    public $idColaboradorCubierto;
    public $idCoordinador;
    public $descripcion;
    public $datos;
    public $allColaboradores;

    protected $rules = ['motivo' => 'required', 'cantidad' => 'required'];
    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona'];

    public function mount($idColaborador, $idCoordinador)
    {
        $this->idColaborador = $idColaborador;
        $this->idCoordinador = $idCoordinador;
    }

    public function buscarPersona($idColaborador)
    {
        $this->idColaborador = $idColaborador;
        $this->reset('motivo', 'cantidad');
    }

    public function registrarExtra()
    {
        $this->validate();
        switch ($this->motivo) {
            case 'cubrioTurno':
                try {
                    pagosExtrasModel::create(
                        [
                            'Motivo' => 'cubrioTurno',
                            'Pago_Total' => $this->cantidad,
                            'idColaboradorCubierto' => $this->idColaboradorCubierto,
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'fecha_cubierta'=>$this->fechacubrio,
                            'Fecha_Asignacion_Pago' => Carbon::now()->format('Y-m-d')
                        ]
                    );
                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('PagoExtra', 'Pago extra registrado para nomina');
                    $this->emit('refresPagos');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'adeudoPago':
                try {
                    pagosExtrasModel::create(
                        [
                            'Motivo' => 'adeudoPago',
                            'Pago_Total' => $this->cantidad,
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asignacion_Pago' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('PagoExtra', 'Pago extra registrado para nomina');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'SaldoFavorDescuento':
                try {
                    pagosExtrasModel::create(
                        [
                            'Motivo' => 'SaldoFavorDescuento',
                            'Pago_Total' => $this->cantidad,
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asignacion_Pago' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('PagoExtra', 'Pago extra registrado para nomina');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;
        }
        $this->emit('descuentos', $this->idColaborador);
    }

    public function getData()
    {
        $this->datos = DB::table('complementos')->where('id_colaborador', '=', $this->idColaborador)->select('Salario', 'Tipo_Pago')->get();
        $cedis = DB::table('complementos')->select('Zona')->where('id_colaborador', $this->idColaborador)->get();
        $this->allColaboradores = DB::table('cedis')->select('idColaborador', 'colaborador.Nombre as Nombre_Completo', 'Apellido_Paterno', 'Apellido_Materno')->join('complementos', 'complementos.Zona', 'cedis.id')
            ->join('colaborador', 'colaborador.idColaborador', 'complementos.id_colaborador')->where('cedis.id', $cedis[0]->Zona)->get();
    }

    public function render()
    {
        $this->getData();
        return view('livewire.administrativo.pagosextras.motivo');
    }
}
