<?php

namespace App\Http\Livewire\Colaborador;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\ComplementosModel;
use App\Models\ColaboradorModel;
use App\Models\DocumentosModel;
use DB;
use File;


class CrearColaborador extends Component
{
    public $title;
    public $colaborador;
    public $cedis;
    //tabla colaborador
    public $idNuevoColaboradorRegistrado;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $correo;
    public $edad;
    public $sexo;
    public $direccion;
    public $colonia;
    public $municipio;
    public $estado;
    public $codigo_postal;
    public $telefono;
    public $idUser;

    //tabla laboral
    public $idLaboral;
    public $Zona;
    public $proyecto;
    public $puesto;
    public $salario;
    public $bono;
    public $tipoPago;
    public $tipoPagoBono;
    public $RFC;
    public $NSS;
    public $CURP;
    public $SMN;
    public $emergencia_nombre;
    public $emergencia_telefono;
    public $emergencia_parentesco;
    public $codigo_postal_rfc;
    public $banco;
    public $clabe_interbancaria;
    public $numeroCuenta;
    public $numeroTarjeta;
    public $Estudios;
    public $Modalidad;
    public $Jornada;
    public $fecha_Ingreso;
    public $creditoInfonavit;
    public $Discapacidad;

    protected $rules = [
        'Zona' => 'required',
        'nombre' => 'required|min:2',
        'apellido_paterno' => 'required|min:2',
        'apellido_materno' => 'required|min:2',
        'edad' => 'required',
        'sexo' => 'required',
        'direccion' => 'required|min:8',
        'colonia' => 'required',
        'municipio' => 'required|min:5',
        'estado' => 'required',
        'codigo_postal' => 'required|min:5',
        'telefono' => 'required',
        'correo' => 'required|email',
        'proyecto' => 'required|min:1',
        'puesto' => 'required',
        'RFC' => 'required|min:12|max:13',
        'NSS' => 'required|min:11|max:11',
        'CURP' => 'required|min:18|max:18',
        'salario' => 'required|min:1',
        'bono' => 'required',
        'Estudios' => 'required',
        'Modalidad' => 'required',
        'Jornada' => 'required',
        'creditoInfonavit' => 'required',
        'Discapacidad' => 'required',
        'codigo_postal_rfc' => 'required',
        'emergencia_nombre' => 'required',
        'emergencia_telefono' => 'required',
        'emergencia_parentesco' => 'required',
        'tipoPago' => 'required',
        'tipoPagoBono'=>'required',
        'fecha_Ingreso' => 'required',
        'banco' => 'required',
        'clabe_interbancaria' => 'required',
        'numeroCuenta' => 'required',
        'numeroTarjeta' => 'required',
    ];

    protected $messages = [
        // 'nombre.required' => 'Nombre no puede quedar vacio.',
        // 'apellido_paterno.required' => 'Apellido Paterno no puede quedar vacio.',
        // 'apellido_materno.required' => 'Apellido Materno no puede quedar vacio.',
        // 'edad.required' => 'Edad no puede quedar vacio.',
        // 'sexo.required' => 'Sexo no puede quedar vacio.',
        // 'direccion.required' => 'Dirección no puede quedar vacio.',
        // 'colonia.required' => 'Colonia no puede quedar vacio.',
        // 'municipio.required' => 'Municipio no puede quedar vacio.',
        // 'estado.required' => 'Estado no puede quedar vacio.',
        // 'codigo_postal.required' => 'Codigo Postal no puede quedar vacio.',
        // 'telefono.required' => 'Telefono no puede quedar vacio.',
        // 'correo.required' => 'correo Electronico no puede quedar vacio.',
        // 'proyecto.required' => 'Proyecto no puede quedar vacio.',
        // 'puesto.required' => 'Puesto no puede quedar vacio.',
        // 'RFC.required' => 'RFC no puede quedar vacio.',
        // 'NSS.required' => 'NSS no puede quedar vacio.',
        // 'CURP.required' => 'CURP no puede quedar vacio.',
        // 'salario.required' => 'Salario no puede quedar vacio.',
        // 'Estudios.required' => 'Estudios no puede quedar vacio.',
        // 'Modalidad.required' => 'Modalidad no puede quedar vacio.',
        // 'Jornada.required' => 'Vigencia no puede quedar vacio.',
        // 'creditoInfonavit.required' => 'Credito Infonavit no puede quedar vacio.',
        // 'Discapacidad.required' => 'Discapacidad no puede quedar vacio.',
        'nombre.min' => 'Nombre muy corto, por favor rectifica.',
        'apellido_paterno.min' => 'Apellido Paterno muy corto, por favor rectifica.',
        'apellido_materno.min' => 'Apellido Materno muy corto, por favor rectifica.',
        'direccion.min' => 'Dirección muy corta, por favor rectifica.',
        'municipio.min' => 'Municipio muy corta, por favor rectifica.',
        'RFC.min' => 'Formato RFC incorrecto, faltan caracteres.',
        'RFC.max' => 'Formato RFC incorrecto, sobran caracteres.',
        'NSS.min' => 'Formato NSS incorrecto, faltan caracteres.',
        'NSS.max' => 'Formato NSS incorrecto, sobran caracteres.',
        'CURP.min' => 'Formato CURP incorrecto, faltan caracteres.',
        'CURP.max' => 'Formato CURP incorrecto, sobran caracteres.',
        'proyecto.min' => 'Nombre de proyecto corto, rectifica.'
    ];
    protected $listeners = ['insertCreate' => 'cleanValues'];

    public function datos()
    {
        $this->validate();
        try {
            if ($this->verficateRFC() === 0) {
                if ($this->verficateNSS() === 0) {
                    $this->guardarDatosPersonales();
                } else {
                    $this->emit('colaboradorExistente', 'Ya se tiene registro del NSS: ' . $this->NSS);
                }
            } else {
                $this->emit('colaboradorExistente', 'Ya se tiene registro del RFC: ' . $this->RFC);
            }
        } catch (\Throwable $th) {
            $this->emit('errorCreateColaborador', $th->getMessage());
        }
    }

    public function guardarDatosPersonales()
    {
        try {
            $colaborador = new ColaboradorModel();
            $colaborador->nombre = strtolower($this->nombre);
            $colaborador->apellido_paterno = strtolower($this->apellido_paterno);
            $colaborador->apellido_materno = strtolower($this->apellido_materno);
            $colaborador->edad = $this->edad;
            $colaborador->sexo = $this->sexo;
            $colaborador->direccion = strtolower($this->direccion);
            $colaborador->colonia = strtolower($this->colonia);
            $colaborador->municipio = strtolower($this->municipio);
            $colaborador->estado = $this->estado;
            $colaborador->codigo_postal = $this->codigo_postal;
            $colaborador->telefono = $this->telefono;
            $colaborador->email = $this->correo;
            $colaborador->CURP=$this->CURP;
            $colaborador->id_usuario = $this->idUser;
            $colaborador->save();
            $this->idNuevoColaboradorRegistrado = $colaborador->idColaborador;
            if ($this->idNuevoColaboradorRegistrado != 0) {
                $this->guardarDatosComplementos();
            }
        } catch (\Throwable $th) {
            if ($th->getCode() == "23000") {
                $this->emit('errorDatosPersonales', 'El correo ' . $this->correo . ' ya se encuentra registrado previamente.');
            } else {
                $this->emit('errorDatosPersonales', 'Error' . $th->getMessage());
            }
        }
    }

    public function guardarDatosComplementos()
    {
        try {
            $registrolaboral = new ComplementosModel();
            $registrolaboral->Zona = strtolower($this->Zona);
            $registrolaboral->Proyecto_Asignado = strtolower($this->proyecto);
            $registrolaboral->Puesto = strtolower($this->puesto);
            $registrolaboral->Salario = $this->salario;
            $registrolaboral->Bono = $this->bono;
            $registrolaboral->Tipo_Pago = $this->tipoPago;
            $registrolaboral->Tipo_Pago_Bono= $this->tipoPagoBono;
            $registrolaboral->RFC = strtoupper($this->RFC);
            $registrolaboral->NSS = strtoupper($this->NSS);
            $registrolaboral->CURP = strtoupper($this->CURP);
            $registrolaboral->SMN = strtoupper($this->SMN);
            $registrolaboral->Emergencia_Nombre = strtolower($this->emergencia_nombre);
            $registrolaboral->Emergencia_Telefono = strtolower($this->emergencia_telefono);
            $registrolaboral->Emergencia_Parentesco = strtolower($this->emergencia_parentesco);
            $registrolaboral->Codigo_Postal_RFC = $this->codigo_postal_rfc;
            $registrolaboral->Estudios = $this->Estudios;
            $registrolaboral->Modalidad = $this->Modalidad;
            $registrolaboral->Jornada = $this->Jornada;
            $registrolaboral->Fecha_Ingreso = $this->fecha_Ingreso;
            $registrolaboral->Credito_Infonavit_Fonacot = $this->creditoInfonavit;
            $registrolaboral->Discapacidad = $this->Discapacidad;
            $registrolaboral->Banco = $this->banco;
            $registrolaboral->Clave_Interbancaria = $this->clabe_interbancaria;
            $registrolaboral->Numero_Cuenta = $this->numeroCuenta;
            $registrolaboral->Numero_Tarjeta = $this->numeroTarjeta;
            $registrolaboral->id_colaborador = $this->idNuevoColaboradorRegistrado;
            $registrolaboral->save();
            $this->idLaboral = $registrolaboral->idComplementos;
            if ($registrolaboral->idComplementos > 0) {
                $this->initDocumentos();
                $this->createFolder($this->idNuevoColaboradorRegistrado);
                $this->cleanValues();
                $this->emit('Registro', 'Se ha registrado el nuevo colaborador.');
            }
        } catch (\Throwable $th) {
            $this->emit('errorDatosLaborales', $th->getMessage());
        }
    }

    public function cleanValues()
    {
        $this->reset(
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'correo',
            'edad',
            'sexo',
            'direccion',
            'colonia',
            'municipio',
            'estado',
            'codigo_postal',
            'telefono',
            'CURP',
            'SMN',
            'emergencia_nombre',
            'emergencia_telefono',
            'emergencia_parentesco',
            'codigo_postal_rfc',
            'banco',
            'clabe_interbancaria',
            'RFC',
            'NSS',
            'Modalidad',
            'Estudios',
            'proyecto',
            'puesto',
            'salario',
            'bono',
            'Jornada',
            'creditoInfonavit',
            'Discapacidad',
            'Zona',
            'tipoPago',
            'tipoPagoBono',
            'numeroCuenta',
            'numeroTarjeta',
            'fecha_Ingreso'
        );
    }


    public function createFolder($id)
    {

        $path = 'storage/Colaboradores/';
        // if (!File::exists($path)) {
        File::makeDirectory($path . '/' . $id, 0755, true, true);
        File::makeDirectory($path . '/' . $id . '/Otros', 0755, true, true);
        File::makeDirectory($path . '/' . $id . '/Incidencias', 0755, true, true);
        File::makeDirectory($path . '/' . $id . '/Baja', 0755, true, true);
        // }
    }

    public function initDocumentos()
    {
        $documento = new DocumentosModel();
        $documento->Identificacion = '0';
        $documento->CURP = '0';
        $documento->NSS = '0';
        $documento->Comprobante_Domiclio = '0';
        $documento->Acta_Naciminto = '0';
        $documento->RFC = '0';
        $documento->Solicitud_Empleo = '0';
        $documento->Caratula_Banco = '0';
        $documento->Contrato_Digital = '0';
        $documento->Foto = '0';
        $documento->Otro = '0';
        $documento->id_usuario = $this->idNuevoColaboradorRegistrado;
        $documento->save();
    }

    public function verificateExist()
    {
        $existColaborador = DB::table('colaborador')->where('Nombre', '=', $this->RFC)->get();
        return count($existColaborador->toArray());
    }

    public function verficateRFC()
    {
        $RRFC = DB::table('complementos')->where('RFC', '=', $this->RFC)->get();
        return count($RRFC->toArray());
    }
    public function verficateNSS()
    {
        $NNSS = DB::table('complementos')->where('NSS', '=', $this->NSS)->get();
        return count($NNSS->toArray());
    }
    public function verficateSMN()
    {
        $NNSS = DB::table('complementos')->where('SMN', '=', $this->SMN)->get();
        return count($NNSS->toArray());
    }
    public function verficateCUIP()
    {
        $NNSS = DB::table('complementos')->where('CUIP', '=', $this->CUIP)->get();
        return count($NNSS->toArray());
    }

    public function getProyectos()
    {
        $this->proyectos = DB::table('proyectos')->get();
        $this->cedis=DB::table('cedis')->orderBy('Nombre','asc')->get();
    }

    public function render()
    {
        $this->getProyectos();
        return view('livewire.colaborador.crear-colaborador');
    }
}
