<?php

namespace App\Http\Livewire\Documentos;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Detalles extends Component

{
    public $statusIdentificacion;
    public $comentarioIdentificacion;
    public $statusActa_Nacimiento;
    public $comentarioActa;
    public $statusComprobanteDomicilio;
    public $comentarioComprobante;
    public $statusNSS;
    public $comentarioNSS;
    public $statusRFC;
    public $comentarioRFC;
    public $statusCURP;
    public $comentarioCURP;
    public $statusFoto;
    public $comentarioFoto;
    public $statusCV;
    public $comentarioCV;
    public $statusContrato;
    public $comentarioContrato;
    public $statusCaratulaBanco;
    public $comentarioBanco;
    private $nombreCompleto;
    private $idColaborador;

    protected $listeners = ['detallesDocumentos'];

    public function detallesDocumentos($id)
    {
        $this->idColaborador = $id;
    }

    public function getDocumentsstatus()
    {

        $this->nombreCompleto=DB::table('colaborador')->where('idColaborador', $this->idColaborador)->get();

        $identificacion = DB::table('documentacion_auditoria')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->where('nombreDoc', 'Identificacion')
            ->orderBy('created_at', 'desc')
            ->get();
        if (count($identificacion) > 0) {
            $this->statusIdentificacion = $identificacion[0]->statusDoc;
            $this->comentarioIdentificacion = $identificacion[0]->Comentario;
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
            $this->comentarioCURP = $CURP[0]->Comentario;
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
            $this->comentarioNSS = $NSS[0]->Comentario;
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
            $this->comentarioComprobante = $Domicilio[0]->Comentario;
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
            $this->comentarioActa = $actaNacimiento[0]->Comentario;
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
            $this->comentarioRFC = $rfc[0]->Comentario;
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
            $this->comentarioCV = $solicitud[0]->Comentario;
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
            $this->comentarioContrato = $contrato[0]->Comentario;
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
            $this->comentarioBanco = $banco[0]->Comentario;
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
            $this->comentarioFoto = $foto[0]->Comentario;
        } else {
            $this->statusFoto = 'Por revisar';
        }
    }

    public function render()
    {
        $this->getDocumentsstatus();
        return view('livewire.documentos.detalles',['nombre'=>$this->nombreCompleto]);
    }
}
