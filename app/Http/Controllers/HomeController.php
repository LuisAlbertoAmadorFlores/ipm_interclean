<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public $totalRegisters;
    public $totalH;
    public $totalM;
    public $totalAH;
    public $totalAM;
    public $totalActivo;
    public $totalBajas;
    public $BajasProceso;
    public $BajaRealizada;
    public $totalIncidencias;
    public $IncidenciaAdmin;
    public $IncidenciaOper;
    public $incidenciasData;
    private $year = [];
    private $contratos = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getTotalRegisters()
    {
        $this->totalRegisters = DB::table('documentos')->count();
    }

    public function getTotalHM()
    {
        $this->totalH = DB::table('colaborador')->where('Sexo', 'H')->count();
        $this->totalM = DB::table('colaborador')->where('Sexo', 'M')->count();
    }

    public function getPersonalActivo()
    {
        $this->totalActivo = DB::table('colaborador')->where('Status', '0')->count();
        $this->totalAH = DB::table('colaborador')->where('Status', '0')->where('Sexo', 'H')->count();
        $this->totalAM = DB::table('colaborador')->where('Status', '0')->where('Sexo', 'M')->count();
    }

    public function getBajas()
    {
        $this->totalBajas = DB::table('colaborador')->where('Status', '!=', '0')->count();
        $this->BajaRealizada = DB::table('colaborador')->where('Status', '1')->count();
        $this->BajasProceso = DB::table('colaborador')->where('Status', '2')->count();
    }


    public function getIncidencias()
    {
        $this->totalIncidencias = DB::table('incidencias')->count();
        $this->IncidenciaAdmin = DB::table('incidencias')->where('Categoria', 'Administrativa')->count();
        $this->IncidenciaOper = DB::table('incidencias')->where('Categoria', 'Operativa')->count();
    }

    public function getIncidenciasMes()
    {
        $octubre = DB::select("SELECT count(*) as enero from incidencias where monthname(incidencias.Fecha_Incidencia) ='Junuary'");
        array_push($this->year, $octubre[0]->enero);
        $octubre = DB::select("SELECT count(*) as febrero from incidencias where monthname(incidencias.Fecha_Incidencia) ='February'");
        array_push($this->year, $octubre[0]->febrero);
        $octubre = DB::select("SELECT count(*) as marzo from incidencias where monthname(incidencias.Fecha_Incidencia) ='March'");
        array_push($this->year, $octubre[0]->marzo);
        $octubre = DB::select("SELECT count(*) as abril from incidencias where monthname(incidencias.Fecha_Incidencia) ='April'");
        array_push($this->year, $octubre[0]->abril);
        $octubre = DB::select("SELECT count(*) as mayo from incidencias where monthname(incidencias.Fecha_Incidencia) ='May'");
        array_push($this->year, $octubre[0]->mayo);
        $octubre = DB::select("SELECT count(*) as junio from incidencias where monthname(incidencias.Fecha_Incidencia) ='June'");
        array_push($this->year, $octubre[0]->junio);
        $octubre = DB::select("SELECT count(*) as julio from incidencias where monthname(incidencias.Fecha_Incidencia) ='Jul'");
        array_push($this->year, $octubre[0]->julio);
        $octubre = DB::select("SELECT count(*) as agosto from incidencias where monthname(incidencias.Fecha_Incidencia) ='August'");
        array_push($this->year, $octubre[0]->agosto);
        $octubre = DB::select("SELECT count(*) as septiembre from incidencias where monthname(incidencias.Fecha_Incidencia) ='September'");
        array_push($this->year, $octubre[0]->septiembre);
        $octubre = DB::select("SELECT count(*) as octubre from incidencias where monthname(incidencias.Fecha_Incidencia) ='October'");
        array_push($this->year, $octubre[0]->octubre);
        $octubre = DB::select("SELECT count(*) as noviembre from incidencias where monthname(incidencias.Fecha_Incidencia) ='November'");
        array_push($this->year, $octubre[0]->noviembre);
        $octubre = DB::select("SELECT count(*) as diciembre from incidencias where monthname(incidencias.Fecha_Incidencia) ='December'");
        array_push($this->year, $octubre[0]->diciembre);
    }

    public function getContratos()
    {
        $this->contratos['conContrato'] = DB::table('colaborador')->join('documentos', 'documentos.id_usuario', 'colaborador.idColaborador')
            ->Where('status', '0')->where('Contrato_Digital', '1')->count();
        $this->contratos['sinContrato'] = DB::table('colaborador')->join('documentos', 'documentos.id_usuario', 'colaborador.idColaborador')
            ->Where('status', '0')->where('Contrato_Digital', '0')->count();
    }

    public function index()
    {
        $this->getTotalRegisters();
        $this->getTotalHM();
        $this->getPersonalActivo();
        $this->getBajas();
        $this->getIncidencias();
        $this->getIncidenciasMes();
        $this->getContratos();
        return view('home', [
            'totalRegisters' => $this->totalRegisters,
            'Hombre' => $this->totalH,
            'Mujer' => $this->totalM,
            'activo' => $this->totalActivo,
            'TotalAH' => $this->totalAH,
            'TotalAM' => $this->totalAM,
            'totalBajas' => $this->totalBajas,
            'bajarealizada' => $this->BajaRealizada,
            'bajapendiente' => $this->BajasProceso,
            'totalincidencias' => $this->totalIncidencias,
            'incidenciaAdmin' => $this->IncidenciaAdmin,
            'incidenciaOpera' => $this->IncidenciaOper,
            'dataYear' => $this->year,
            'contratos' => $this->contratos
        ]);
    }
}
