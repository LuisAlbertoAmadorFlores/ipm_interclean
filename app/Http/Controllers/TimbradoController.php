<?php

namespace App\Http\Controllers;

use App\Exports\TimbradoExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TimbradoController extends Controller
{
    public function exporttimbrado($id)
    {
        $nombre = DB::table('proyectos')->select('Nombre_Corto_Proyecto')->where('idProyecto', $id)->get();
        $data = DB::table('colaborador')->join('complementos', 'complementos.id_colaborador', 'colaborador.idColaborador')
            ->where('complementos.Proyecto_Asignado', $id)
            ->where('Status', '0')
            ->orderBy('Fecha_Ingreso', 'desc')
            ->get();
        return Excel::download(new TimbradoExport($data), "Timbrado_" . $nombre[0]->Nombre_Corto_Proyecto . "_" . Carbon::now() . ".xlsx");
        return redirect()->route('timbrado');
    }
}
