<?php

namespace App\Http\Livewire\Juridico;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Tarjetajuridico extends Component
{
    public $idColaborador;
    public $foto;
    public $asigando;
    public $byIdColaborador;
    public $statusIdentificacion;
    public $comentarioIdentificacion;
    public $statusActa_Nacimiento;
    public $statusComprobanteDomicilio;
    public $statusNSS;
    public $statusRFC;
    public $statusCURP;
    public $statusFoto;
    public $statusCV;
    public $statusContrato;
    public $statusCaratulaBanco;
    public $contadorValidador = 0;


    protected $listeners = ['buscarTarjetaColaborador' => 'buscarPersona', 'updateStatusCheck' => 'buscarPersona'];

    public function buscarPersona($id)
    {
        $this->idColaborador = $id;
        $this->getColaborador($this->idColaborador);
        $this->foto = '/storage/Colaboradores/' . $this->idColaborador . '/Foto.png';
        $this->getDocumentsstatus();
    }

    public function getColaborador($id)
    {
        $this->byIdColaborador = DB::table('colaborador')
            ->select(
                'cedis.nombre as nombre_Cedis',
                'documentos.id_usuario',
                'colaborador.nombre',
                'Apellido_Paterno',
                'Apellido_Materno',
                'Status',
                'idColaborador',
                'Identificacion',
                'documentos.CURP',
                'documentos.NSS',
                'Comprobante_Domiclio',
                'Acta_Naciminto',
                'documentos.RFC',
                'Solicitud_Empleo',
                'Contrato_Digital',
                'Foto',
                'Caratula_Banco',
                'Region'
            )
            ->join('complementos', 'colaborador.idColaborador', 'complementos.id_colaborador')
            ->join('cedis', 'cedis.id', 'complementos.Zona')
            ->join('documentos', 'colaborador.idColaborador', 'documentos.id_usuario')
            ->join('proyectos', 'proyectos.idProyecto', 'complementos.Proyecto_Asignado')
            ->where('colaborador.idColaborador', '=', $id)->get();
    }

    public function getDocumentsstatus()
    {
        $identificacion = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Identificacion')
            ->orderBy('created_at', 'desc')
            ->get();
        if (count($identificacion) > 0) {
            $this->statusIdentificacion = $identificacion[0]->statusDoc;
        } else {
            $this->statusIdentificacion = 'Por revisar';
        }

        $CURP = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'CURP')
            ->orderBy('created_at', 'desc')
            ->get();
        if (count($CURP) > 0) {
            $this->statusCURP = $CURP[0]->statusDoc;
        } else {
            $this->statusCURP = 'Por revisar';
        }

        $NSS = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'NSS')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($NSS) > 0) {
            $this->statusNSS = $NSS[0]->statusDoc;
        } else {
            $this->statusNSS = 'Por revisar';
        }

        $Domicilio = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Comprobante_Domiclio')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($Domicilio) > 0) {
            $this->statusComprobanteDomicilio = $Domicilio[0]->statusDoc;
        } else {
            $this->statusComprobanteDomicilio = 'Por revisar';
        }

        $actaNacimiento = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Acta_Naciminto')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($actaNacimiento) > 0) {
            $this->statusActa_Nacimiento = $actaNacimiento[0]->statusDoc;
        } else {
            $this->statusActa_Nacimiento = 'Por revisar';
        }

        $rfc = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'RFC')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($rfc) > 0) {
            $this->statusRFC = $rfc[0]->statusDoc;
        } else {
            $this->statusRFC = 'Por revisar';
        }

        $solicitud = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Solicitud_Empleo')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($solicitud) > 0) {
            $this->statusCV = $solicitud[0]->statusDoc;
        } else {
            $this->statusCV = 'Por revisar';
        }

        $contrato = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Contrato_Digital')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($contrato) > 0) {
            $this->statusContrato = $contrato[0]->statusDoc;
        } else {
            $this->statusContrato = 'Por revisar';
        }

        $banco = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Caratula_Banco')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($banco) > 0) {
            $this->statusCaratulaBanco = $banco[0]->statusDoc;
        } else {
            $this->statusCaratulaBanco = 'Por revisar';
        }

        $foto = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Foto')
            ->orderBy('created_at', 'desc')
            ->get();

        if (count($foto) > 0) {
            $this->statusFoto = $foto[0]->statusDoc;
        } else {
            $this->statusFoto = 'Por revisar';
        }
    }

    public function render()
    {
        return view('livewire.juridico.tarjetajuridico', ['byColaborador' => $this->byIdColaborador, 'foto' => $this->foto]);
    }
}
