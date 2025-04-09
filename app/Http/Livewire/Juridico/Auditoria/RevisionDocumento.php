<?php

namespace App\Http\Livewire\Juridico\Auditoria;

use App\Models\HistoirialBajaModel;
use Livewire\Component;
use App\Models\HistorialDocumentacion;
use DB;

class RevisionDocumento extends Component
{
    public $documento;
    public $idColaborador;
    public $nombreCompleto;
    public $flatcheck = false;
    public $comentario;
    public $datos;
    private $auditoria;
    private $arrayDocuments = ['Identificacion', 'CURP', 'NSS', 'Comprobante_Domiclio', 'Acta_Naciminto', 'RFC', 'Caratula_Banco', 'Contrato_Digital', 'Solicitud_Empleo', 'Foto'];

    protected $listeners = ['documento', 'setColaborador'];

    public function documento($documentoRecep)
    {
        $this->nombreCompleto = $documentoRecep;
        switch ($documentoRecep) {
            case 'Identificacion':
                $this->documento = "Identificacion Oficial";
                break;
            case 'CURP':
                $this->documento = "CURP";
                break;
            case 'NSS':
                $this->documento = "NSS";
                break;
            case 'Comprobante_Domiclio':
                $this->documento = "Comprobante de Domicilio";
                break;
            case 'Acta_Naciminto':
                $this->documento = "Acta de Nacimiento";
                break;
            case 'RFC':
                $this->documento = "RFC";
                break;
            case 'Caratula_Banco':
                $this->documento = "Caratula de Banco";
                break;
            case 'Contrato_Digital':
                $this->documento = "Contrato en Formato Digital";
                break;
            case 'Solicitud_Empleo':
                $this->documento = "Solicitud de Empleo o CV";
                break;
            case 'Foto':
                $this->documento = "Fotografia de Colaborador";
                break;
        }
    }

    public function setColaborador($id)
    {
        $this->idColaborador = $id;
    }

    public function getColaborador()
    {
        $this->datos = DB::table('documentacion_auditoria')
            ->join('users', 'users.id', 'documentacion_auditoria.idJuridico')
            ->select('name', 'nombreDoc', 'statusDoc', 'Comentario', 'documentacion_auditoria.created_at', 'idDocumentacionColaborador')
            ->where('idDocumentacionColaborador', $this->idColaborador)
            ->orderBy('created_at', 'desc')->get();
    }

    public function changedMark()
    {
        if ($this->flatcheck == false) {
            $this->flatcheck == true;
        } else {
            $this->flatcheck == false;
        }
    }

    public function save($idJuridico)
    {
        $this->auditoria = DB::table('documentos')->select('Total_Auditados')->where('id_usuario', $this->idColaborador)->get();
        // if (in_array($this->nombreCompleto, $this->arrayDocuments)) {
        try {
            $saved = new HistorialDocumentacion();
            $saved->nombreDoc = $this->nombreCompleto;
            if ($this->flatcheck == true) {
                $saved->statusDoc = 'Correcto';
                $saved->Comentario = 'Sin comentarios y validado por juridico.';
            } else {
                $saved->statusDoc = 'Comentario';
                $saved->Comentario = $this->comentario;
            }
            $saved->idDocumentacionColaborador = $this->idColaborador;
            $saved->idJuridico = $idJuridico;
            $saved->save();

            $this->emit('updateStatusCheck', $this->idColaborador);
            $this->updateAuditoriaTotal();
        } catch (\Throwable $th) {
            throw $th;
        }
        // }
    }

    public function updateAuditoriaTotal()
    {
        $valorTotal = $this->auditoria[0]->Total_Auditados;

        if ($this->flatcheck == true) {
            if ($valorTotal < 10) {
                $valorTotal = $valorTotal + 1;
            }
        } else {
            if ($valorTotal != 0) {
                $valorTotal = $valorTotal - 1;
            }
        }
        DB::table('documentos')->where('id_usuario', $this->idColaborador)->update(['Total_Auditados' => $valorTotal]);
        $this->reset('comentario', 'flatcheck');
    }

    public function render()
    {
        $this->getColaborador();
        return view('livewire.juridico.auditoria.revision-documento', ['document' => $this->datos]);
    }
}
