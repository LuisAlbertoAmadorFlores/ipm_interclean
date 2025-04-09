<?php

namespace App\Exports;

use App\Exports\Sheets\CedisNominaExport;
use App\Exports\Sheets\ReportGeneralExport;
use App\Exports\Sheets\ZonaExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class RegionExport implements WithMultipleSheets
{
    use Exportable;
    public $idProyecto, $region, $lugartrabajo, $tipoNomina, $fechainicial, $fechafinal;

    public function __construct($idProyecto, $region, $lugartrabajo, $tipoNomina, $fechainicial, $fechafinal)
    {
        $this->$idProyecto = $idProyecto;
        $this->region = $region;
        $this->lugartrabajo = $lugartrabajo;
        $this->tipoNomina = $tipoNomina;
        $this->fechainicial = $fechainicial;
        $this->fechafinal = $fechafinal;
    }

    public function getCedisByRegion()
    {
        $allCedis = DB::table('cedis')->select('Nombre')->where('Region', $this->region)->distinct()->get();
        return $allCedis;
    }

    public function sheets(): array
    {
        $data = $this->getCedisByRegion();
        $sheets = [];
        $sheets[] = new ReportGeneralExport($this->region, $this->tipoNomina, $this->fechainicial, $this->fechafinal);
        foreach ($data as $cedis) {
            $sheets[] = new CedisNominaExport($this->region, $cedis->Nombre, $this->tipoNomina, $this->fechainicial, $this->fechafinal);
        }
        return $sheets;
    }
}
