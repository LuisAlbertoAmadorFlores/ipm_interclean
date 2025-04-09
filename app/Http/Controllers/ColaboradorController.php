<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use DB;

class ColaboradorController extends Controller
{
    public $carpeta;
    public $documento;
    public $documentoView;
    public $reemplazo;
    public $complementario;
    
    public function descargarEvidencia($idColaborador, $idEvidencia)
    {
        $path = 'public/Colaboradores/' . $idColaborador . '/Incidencias/';

        if (Storage::exists($path . 'Evidencia_' . $idEvidencia . '.mp4')) {
            $extension = '.mp4';
        }
        if (Storage::exists($path . 'Evidencia_' . $idEvidencia . '.mp3')) {
            $extension = '.mp3';
        }
        if (Storage::exists($path . 'Evidencia_' . $idEvidencia . '.pdf')) {
            $extension = '.pdf';
        }
        if (Storage::exists($path . 'Evidencia_' . $idEvidencia . '.jpg')) {
            $extension = '.jpg';
        }
        
        return Storage::download('public/Colaboradores/' . $idColaborador . '/Incidencias/Evidencia_' . $idEvidencia .$extension, 'Incidencia_Evidencia_' . $idEvidencia .$extension);
    }
    
    public function generatePDF($idColaborador)
    {
        $carpetaraiz = 'public/Colaboradores/' . $idColaborador;
        //Obtiene todos los datos de la persona uniendo las tablas colaborador y laboral
        $all  = DB::table('colaborador')
            ->join('complementos', 'colaborador.idColaborador', '=', 'complementos.id_colaborador')
            ->join('proyectos','proyectos.idProyecto','complementos.Proyecto_Asignado')
            
            ->where('complementos.id_colaborador', '=', $idColaborador)->get();

        //Obtiene todas las incidencias de una persona
        $allIncidencia = DB::table('incidencias')->where('id_colaborador', '=', $idColaborador)->get();


        $documentos = DB::table('documentos')->where('id_usuario', '=', $idColaborador)->get();

        //Recoge todos los archivos guardados como complementos desde la carpeta
        $carpetaOtros = 'public/Colaboradores/' . $idColaborador . '/Otros';
        $this->complementario = Storage::disk('local')->files($carpetaOtros);

        //Busca en la carpeta del colaborador su Foto
        $existenciaFoto = Storage::exists($carpetaraiz . '/Foto.jpg');
        if ($existenciaFoto == true) {
            $this->documentoView = 'storage/Colaboradores/' . $idColaborador . '/Foto.jpg';
        } else {
            $this->documentoView = 'img/logo_negativo.png';
        }
       
        //Regresa la vista blade en formato PDF y pasa las variables "Toda la informacion","Todas las incidencias","Foto","Todos los documentos","Todos los documentos complementarios"
         $pdf = Pdf::loadView('livewire.colaborador.pdf', ['all' => $all, 'incidencias' => $allIncidencia, 'Foto' => $this->documentoView, 'documentos' => $documentos, 'complementarios' => $this->complementario]);
         return $pdf->stream();
        // // return $pdf->download('ficha_tecnica.pdf');
    }
}
