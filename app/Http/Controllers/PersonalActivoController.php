<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PersonalQuincenalExport;
use App\Exports\PersonalSemanalExport;


class PersonalActivoController extends Controller
{

    public function exportPersonal($id, $tipoPersonal)
    {
        if ($tipoPersonal == 'Quincenal') {
            $nombre = DB::table('proyectos')->select('Nombre_Corto_Proyecto')->where('idProyecto', $id)->get();
            $data = DB::table('colaborador')->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                ->where('complementos.Proyecto_Asignado', $id)
                ->where('Status', '0')
                ->where('Tipo_Pago', 'Quincenal')
                ->orderBy('Fecha_Ingreso', 'desc')
                ->get();
            return Excel::download(new PersonalQuincenalExport($data), "Personal_Quincenal_" . $nombre[0]->Nombre_Corto_Proyecto . "_" . Carbon::now() . ".xlsx");
            return redirect()->route('timbrado');
        } else {
            $nombre = DB::table('proyectos')->select('Nombre_Corto_Proyecto')->where('idProyecto', $id)->get();
            $data = DB::table('colaborador')->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
                ->where('complementos.Proyecto_Asignado', $id)
                ->where('Status', '0')
                ->where('Tipo_Pago', 'Semanal')
                ->orderBy('Fecha_Ingreso', 'desc')
                ->get();
            return Excel::download(new PersonalSemanalExport($data), "Personal_Semanal_" . $nombre[0]->Nombre_Corto_Proyecto . "_" . Carbon::now() . ".xlsx");
            return redirect()->route('timbrado');
        }
    }
}

