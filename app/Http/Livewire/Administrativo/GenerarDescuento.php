<?php

namespace App\Http\Livewire\Administrativo;

use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\DescuentosModel;

class GenerarDescuento extends Component
{
    public $fechahoy;
    public $motivo;
    public $cantidad;
    public $parcialidad;
    public $idColaborador;
    public $idCoordinador;
    public $descripcion;

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
    }

    public function registrarDescuento()
    {

        $this->validate();
        switch ($this->motivo) {
            case 'Uniforme':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Uniforme',
                            'Costo_Total' => $this->cantidad,
                            'Costo_Restante' => $this->cantidad,
                            'Cantidad_Descontada' => $this->cantidad / $this->parcialidad,
                            'Parcialidades' => $this->parcialidad,
                            'Descripcion' => $this->descripcion,
                            'Tipo_Descuento' => 'Temporal',
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );
                    $this->reset('motivo', 'cantidad', 'parcialidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                    $this->emit('refresDescuento');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'Reparacion':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Reparacion',
                            'Costo_Total' => $this->cantidad,
                            'Costo_Restante' => $this->cantidad,
                            'Parcialidades' => $this->parcialidad,
                            'Cantidad_Descontada' => $this->cantidad / $this->parcialidad,
                            'Tipo_Descuento' => 'Temporal',
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'Retardo':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Retardo',
                            'Cantidad_Descontada' => $this->cantidad,
                            'Costo_Total' => $this->cantidad,
                            'Costo_Restante' => $this->cantidad,
                            'Tipo_Descuento' => 'Ocasional',
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                } catch (\Throwable $th) {
                    throw $th;
                }

                break;
            case 'MalServicio':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'MalServicio',
                            'Cantidad_Descontada' => $this->cantidad,
                            'Costo_Total' => $this->cantidad,
                            'Costo_Restante' => $this->cantidad,
                            'Tipo_Descuento' => 'Ocasional',
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                } catch (\Throwable $th) {
                    throw $th;
                }

                break;
            case 'Falta':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Falta',
                            'Cantidad_Descontada' => $this->cantidad,
                            'Tipo_Descuento' => 'Ocasional',
                            'Costo_Restante' => $this->cantidad,
                            'Costo_Total' => $this->cantidad,
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado', ['idColaborador' => $this->idColaborador]);
                } catch (\Throwable $th) {
                    throw $th;
                }

                break;
            case 'Infonavit':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Infonavit',
                            'Cantidad_Descontada' => $this->cantidad,
                            'Costo_Total' => $this->cantidad,
                            'Tipo_Descuento' => 'Permanente',
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                } catch (\Throwable $th) {
                    throw $th;
                }

                break;
            case 'Fonacot':
                try {
                    DescuentosModel::create(
                        [
                            'Motivo' => 'Fonacot',
                            'Cantidad_Descontada' => $this->cantidad,
                            'Costo_Total' => $this->cantidad,
                            'Tipo_Descuento' => 'Permanente',
                            'Descripcion' => $this->descripcion,
                            'idColaborador' => $this->idColaborador,
                            'idCoordinador' => $this->idCoordinador,
                            'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                        ]
                    );

                    $this->reset('motivo', 'cantidad', 'descripcion');
                    $this->emit('paselista', 'Descuento registrado');
                } catch (\Throwable $th) {
                    throw $th;
                }

                break;
        }
        $this->emit('descuentos', $this->idColaborador);
    }
    public function render()
    {
        $this->fechahoy = Carbon::now()->format('d-m-Y');
        return view('livewire.administrativo.generar-descuento');
    }
}
