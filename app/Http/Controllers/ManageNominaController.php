<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\NominaExport;
use App\Exports\RegionExport;
use GuzzleHttp\Psr7\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;


class ManageNominaController extends Controller
{
    public function getNomina($idProyecto, $region, $lugartrabajo, $tipoNomina, $fechainicial, $fechafinal)
    {
        $inicial = date('Y-m-d', strtotime($fechainicial));
        $final = date('Y-m-d', strtotime($fechafinal));
        $nombre = DB::table('proyectos')->select('Nombre_Corto_Proyecto')->where('idProyecto', $idProyecto)->get();
        $result = DB::table("colaborador")
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('lista_asistencia', 'colaborador.idColaborador', '=', 'lista_asistencia.idColaborador')
            ->join('cedis', 'complementos.Proyecto_Asignado', 'cedis.Proyecto')
            ->join('nomina', 'colaborador.idColaborador', 'nomina.idColaborador')
            ->where('Tipo_Pago', $tipoNomina)
            ->whereBetween('Fecha_Laboral', [$inicial, $final])
            ->where('Proyecto_Asignado', '=', $idProyecto)
            ->where('Region', '=', $region)
            ->where('id', '=', $lugartrabajo)
            ->select('colaborador.idColaborador', 'colaborador.Nombre', 'Apellido_Paterno', 'Apellido_Materno', 'Region', 'Modalidad', 'Fecha_Ingreso', 'Status', 'Tipo_Pago', 'Salario', 'Saldo_Pagar', 'Nomina.Bono', 'Numero_Tarjeta', 'Numero_Cuenta', 'Clave_Interbancaria', 'Banco', 'cedis.Nombre as Nombre_Region')
            ->distinct()
            ->orderBy('idColaborador', 'asc')
            ->get();
        return Excel::download(new NominaExport($result, $fechafinal, $fechainicial), "Nomina_" . $region . "_" . $fechainicial . "_al_" . $fechafinal . "_de_" . $nombre[0]->Nombre_Corto_Proyecto . "_" . Carbon::now() . ".xlsx");
    }

    public function getSheets($idProyecto, $region, $lugartrabajo, $tipoNomina, $fechainicial, $fechafinal)
    {
        return Excel::download(new RegionExport($idProyecto, $region, $lugartrabajo, $tipoNomina, $fechainicial, $fechafinal), "Nomina_" . $region . "_" . $fechainicial . "_al_" . $fechafinal . "_Generado_el_" . Carbon::now() . ".xlsx");
    }

    public function getExcel($nombre)
    {
        return Storage::download('public/Nomina/' . $nombre);
    }

    public function getComprobante($nombre)
    {
        $explode = explode('.', $nombre);
        return Storage::download('public/Nomina/Ticket_Pagos/' . $explode[0] . '.pdf');
    }
}
