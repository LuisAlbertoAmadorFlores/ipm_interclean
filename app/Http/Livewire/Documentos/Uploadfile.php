<?php

namespace App\Http\Livewire\Documentos;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Uploadfile extends Component
{
    public $idColaborador;
    public $allSearchColaborador;
    public $byIdColaborador;
    public $estadistica;

    
    public $statusIdentificacion;
    public $statusActa_Nacimiento;
    public $statusComprobanteDomicilio;
    public $statusNSS;
    public $statusRFC;
    public $statusCURP;
    public $statusFoto;
    public $statusCV;
    public $statusContrato;
    public $statusCaratulaBanco;

    public $totalRegistros;
    public $totalValidados;
    public $totalINE;
    public $totalActa;
    public $totalDomicilio;
    public $totalNSS;
    public $totalRFC;
    public $totalCURP;
    public $totalFoto;
    public $totalCV;
    public $totalContrato;
    public $totalCaratula;

    public function mount()
    {
        $this->byIdColaborador = DB::table('colaborador')
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('documentos', 'colaborador.idColaborador', '=', 'documentos.id_usuario')
            // ->where('Status', '0')
            ->orderBy('colaborador.idColaborador', 'desc')->get();
    }

    public function estadisticaDocumentos()
    {
        $this->totalRegistros = DB::table('documentos')->count();
        $this->totalValidados = DB::table('documentos')->where('Total_Auditados', '10')->count();
        $this->totalINE = DB::table('documentos')->where('Identificacion', '1')->count();
        $this->totalCURP = DB::table('documentos')->where('CURP', '1')->count();
        $this->totalNSS = DB::table('documentos')->where('NSS', '1')->count();
        $this->totalDomicilio = DB::table('documentos')->where('Comprobante_Domiclio', '1')->count();
        $this->totalActa = DB::table('documentos')->where('Acta_Naciminto', '1')->count();
        $this->totalRFC = DB::table('documentos')->where('RFC', '1')->count();
        $this->totalCV = DB::table('documentos')->where('Solicitud_Empleo', '1')->count();
        $this->totalCaratula = DB::table('documentos')->where('Caratula_Banco', '1')->count();
        $this->totalContrato = DB::table('documentos')->where('Contrato_Digital', '1')->count();
        $this->totalFoto = DB::table('documentos')->where('Foto', '1')->count();
    }

    public function render()
    {
        $this->estadisticaDocumentos();
        return view('livewire.documentos.uploadfile', ['listColaborador' => $this->byIdColaborador, 'grafica' => $this->estadistica]);
    }
}
