<?php

namespace App\Http\Livewire\Administrativo;

use Livewire\Component;
use App\Models\ListaAsistenciaModel;
use App\Models\DescuentosModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;
use Livewire\WithFileUploads;

class CrearLista extends Component
{
    use WithFileUploads;
    public $descanzo;
   
    public $hoy;
    public $fechainicial;
    public $colaborador;
    public $exists;
    public $region;
    public $misRegiones;
    public $foto;
    public $sabado;
    public $idColaborador;
    public $idCoordinador;
    public $Nombre;
    public $proyectos;
    public $proyecto;
    public $asistencia;
    public $documento;
    public $fechahoy;
    public $path = 'storage/Asistencia';
    public $regiones;
    public $cedis;
    public $mysRegio;
    public $mysRegiones;
    public $data;

    //Entradas y Salidas
    public $Entrada;
    public $Salida;

    protected $rules = ['Entrada' => 'required', 'Salida' => 'required', 'Nombre' => 'required'];
    protected $messages = ['Entrada.required' => 'Ingresa hora', 'Salida.required' => 'Ingresa hora'];

    public function mount($proyecto, $region)
    {
        $this->proyecto = $proyecto;
        $this->mysRegiones = $region;
    }

    public function getLista()
    {
        $this->mysRegio = explode(',', $this->mysRegiones);
        $this->fechahoy = date('d-m-Y', strtotime(Carbon::today()->toDateString() . '- 1 days'));

        //Obtiene las regiones
        $this->regiones = DB::select('SELECT distinct(Region) FROM nxgcommx_intranet_lala.cedis');
        $this->cedis = DB::select('SELECT id,Nombre,Region,Estado FROM nxgcommx_intranet_lala.cedis');;

        if ($this->proyecto == 0) {
            $this->data = DB::table("colaborador")
                ->select('colaborador.idColaborador', 'colaborador.Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Proyecto_Asignado', 'Status', 'Zona', 'Region')
                ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                ->join('cedis', 'cedis.id', 'complementos.Zona')
                ->where('Status', '0')
                ->orWhere('Status', '3')
                ->get();
        } else {
            $this->data = DB::table("colaborador")
                ->select('colaborador.idColaborador', 'Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Proyecto_Asignado', 'Status', 'Zona', 'Region')
                ->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                ->where('Proyecto_Asignado', $this->proyecto)
                ->where('Status', '0')
                ->orWhere('Status', '3')
                ->get();
        }
        $this->crearArchivoLista(json_encode($this->data));
    }

    public function crearArchivoLista($listasimple)
    {
        $this->fechahoy = date('d-m-Y', strtotime(Carbon::today()->toDateString() . '- 1 days'));
        if (!file_exists($this->path . '/' . $this->fechahoy)) {
            File::makeDirectory($this->path . '/' . $this->fechahoy, 0755, true, true);
        } else {
            if (!file_exists($this->path . '/' . $this->fechahoy . '/' . "Lista.json")) {
                $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                fwrite($fh, $listasimple);
                fclose($fh);
            }
        }
        $this->proyectos = DB::table('proyectos')->get();
        $this->mountJson();
    }

    public function mountJson()
    {
        if (file_exists($this->path . '/' . $this->fechahoy . '/' . "Lista.json")) {
            $data = file_get_contents($this->path . '/' . $this->fechahoy . '/' . "Lista.json");
            $this->data = json_decode($data, true);
        }
    }

    public function pasarLista($idColaborador)
    {
        $this->reset('asistencia');
        foreach ($this->data as $colaborador) {
            if ($colaborador['idColaborador'] == $idColaborador) {
                $colaborador = DB::table('colaborador')->where('idColaborador', $idColaborador)->first();
                $this->Nombre = $colaborador->Nombre . ' ' . $colaborador->Apellido_Paterno . ' ' . $colaborador->Apellido_Materno;
                $this->idColaborador = $colaborador->idColaborador;
                $this->foto();
            }
        }
        $this->Entrada = '14:00';
        $this->Salida = '22:00';
    }

    public function foto()
    {
        $carpetaraiz = 'public/Colaboradores/' . $this->idColaborador;
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');
        if ($existenciaFoto == true) {
            $this->foto = 'storage/Colaboradores/' . $this->idColaborador . '/Foto.jpg';
        } else {
            $this->foto = 'img/tarjeta.png';
        }
    }

    public function autorizar($idColaborador, $idCoordinador)
    {
        $this->idCoordinador = $idCoordinador;
        $this->fechahoy = date('d-m-Y', strtotime(Carbon::today()->toDateString() . '- 1 days'));
        $datajson = json_decode(file_get_contents($this->path . '/' . $this->fechahoy . '/' . "Lista.json"));
        foreach ($datajson as $colaborador) {
            if ($colaborador->idColaborador == $idColaborador) {
                if ($this->asistencia == 'laborado') {
                    $colaborador->Autorizo_Coordinador = $idCoordinador;
                    $colaborador->Fecha_Pase_Lista = Carbon::now()->format('Y-m-d h:m:s');
                    $colaborador->Asistencia = $this->asistencia;
                    $colaborador->Hora_Entrada = $this->Entrada;
                    $colaborador->Hora_Salida = $this->Salida;
                    $colaborador->Status = 'OK';
                } else {
                    $colaborador->Autorizo_Coordinador = $idCoordinador;
                    $colaborador->Fecha_Pase_Lista = Carbon::now()->format('Y-m-d h:m:s');
                    $colaborador->Asistencia = $this->asistencia;
                    $colaborador->Status = 'OK';
                }
            }
        }

        switch ($this->asistencia) {
            case 'laborado':
                try {
                    $this->validate();
                    ListaAsistenciaModel::create(
                        [
                            'idColaborador' => $idColaborador,
                            'Fecha_Laboral' => date('Y-m-d', strtotime($this->fechahoy)),
                            'Hora_Entrada' => $this->Entrada,
                            'Hora_Salida' => $this->Salida,
                            'Tipo' => 'laborado',
                            'idCoordinador' => $idCoordinador,
                        ]
                    );
                    $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                    fwrite($fh, json_encode($datajson));
                    fclose($fh);
                    $this->reset('asistencia', 'foto', 'Nombre', 'idColaborador', 'Entrada', 'Salida', 'documento', 'sabado');
                    $this->emit('paselista', 'Se ha guardado correctamente la lista');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'faltaJustificada':
                if ($this->documento != null) {
                    try {
                        ListaAsistenciaModel::create(
                            [
                                'idColaborador' => $idColaborador,
                                'Fecha_Laboral' => date('Y-m-d', strtotime($this->fechahoy)),
                                'Tipo' => 'faltaJustificada',
                                'idCoordinador' => $idCoordinador,
                            ]
                        );
                        $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                        fwrite($fh, json_encode($datajson));
                        fclose($fh);

                        $this->descuento('faltaJustificada');
                        $extensionFile = $this->documento->getClientOriginalExtension();
                        $this->documento->storeAs('public/Asistencia/' . $this->fechahoy . '/Justificantes', 'Justificante_Colaborador_' . $this->idColaborador . '_.' . $extensionFile);
                        $this->reset('asistencia', 'foto', 'Nombre', 'idColaborador', 'documento', 'sabado');
                        $this->emit('paselista', 'Se ha guardado correctamente la lista');
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                } else {
                    $this->emit('errorAdjuntoJustificante', 'Falta agregar documento que justifique la falta.');
                }

                break;

            case 'faltaInjustificada':
                try {

                    ListaAsistenciaModel::create(
                        [
                            'idColaborador' => $idColaborador,
                            'Fecha_Laboral' => date('Y-m-d', strtotime($this->fechahoy)),
                            'Tipo' => 'faltaInjustificada',
                            'idCoordinador' => $idCoordinador,
                        ]
                    );
                    $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                    fwrite($fh, json_encode($datajson));
                    fclose($fh);

                    $this->descuento('faltaInjustificada');
                    $this->reset('asistencia', 'foto', 'Nombre', 'idColaborador', 'documento', 'sabado');
                    $this->emit('paselista', 'Se ha guardado correctamente la lista');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'descanso':
                try {
                    ListaAsistenciaModel::create(
                        [
                            'idColaborador' => $idColaborador,
                            'Fecha_Laboral' => date('Y-m-d', strtotime($this->fechahoy)),
                            'Tipo' => 'Descanso',
                            'idCoordinador' => $idCoordinador,
                        ]
                    );
                    $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                    fwrite($fh, json_encode($datajson));
                    fclose($fh);
                    $this->reset('asistencia', 'foto', 'Nombre', 'idColaborador', 'documento');
                    $this->emit('paselista', 'Se ha guardado correctamente como dia de descanzo');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;

            case 'festivo':
                try {
                    ListaAsistenciaModel::create(
                        [
                            'idColaborador' => $idColaborador,
                            'Fecha_Laboral' => date('Y-m-d', strtotime($this->fechahoy)),
                            'Tipo' => 'festivo',
                            'idCoordinador' => $idCoordinador,
                        ]
                    );
                    $fh = fopen($this->path . '/' . $this->fechahoy . '/' . "Lista.json", 'w');
                    fwrite($fh, json_encode($datajson));
                    fclose($fh);
                    $this->reset('asistencia', 'foto', 'Nombre', 'idColaborador', 'documento');
                    $this->emit('paselista', 'Se ha guardado correctamente como dia de descanzo');
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;
            default:
                break;
        }
    }

    public function descuento()
    {
        $salarioDiario = $this->getSalarioDiario($this->idColaborador);
        if ($this->asistencia == "faltaInjustificada") {
            $falta = "Descuento generado por falta Injustificada";
            $salarioDiario = $salarioDiario * 2;
        } else {
            $falta = "Descuento generado por falta Justificada";
        }

        try {
            DescuentosModel::create(
                [
                    'Motivo' => 'Falta',
                    'Cantidad_Descontada' => number_format($salarioDiario, 2),
                    'Tipo_Descuento' => 'Ocasional',
                    'Costo_Restante' => number_format($salarioDiario, 2),
                    'Costo_Total' => number_format($salarioDiario, 2),
                    'Descripcion' => $falta,
                    'idColaborador' => $this->idColaborador,
                    'idCoordinador' => $this->idCoordinador,
                    'Fecha_Asigancion_Descuento' => Carbon::now()->format('Y-m-d')
                ]
            );
        } catch (\Throwable $th) {
            $this->emit('errorDesarrollo', 'Por favor reporta esto a Desarrollo \n' . $th);
        }
    }

    public function getSalarioDiario($idColaborador)
    {
        $salario = DB::table('colaborador')->select('Salario', 'Tipo_Pago')->join('complementos', 'colaborador.idColaborador', 'complementos.id_colaborador')->where('idColaborador', $idColaborador)->get();
        if ($salario[0]->Tipo_Pago == 'Quincenal') {
            $salarioDiario = $salario[0]->Salario / 30;
        } else {
            $salarioDiario = $salario[0]->Salario / 4 / 7;
        }
        return $salarioDiario;
    }

    public function render()
    {
        $this->getLista();
        return view('livewire.administrativo.crear-lista', ['listaPersonal' => $this->data, 'showRegion' => $this->misRegiones]);
    }
}
