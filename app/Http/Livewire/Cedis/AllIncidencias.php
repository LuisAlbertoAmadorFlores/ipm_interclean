<?php

namespace App\Http\Livewire\Cedis;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;


class AllIncidencias extends Component
{
    public $totalIncidencias;
    public $cedis;

    protected $listeners=['obtenerIncidencias'=>'asignaIDCedis'];

    public function asignaIDCedis($data){
        $this->cedis=$data[0]['data'];
       
    }

    public function incidencias()
    {
        $this->totalIncidencias = DB::table('cedis_incidente')->where('idCedis', '=', $this->cedis)->get();
           
    }

    public function downEvidencia($idCedis, $idArchivo)
    {
        
        $carpetaraiz = 'public/cedis/' . $idCedis;
        $existenciaImage = Storage::exists($carpetaraiz . '/Incidencias/Incidencia_Evidencia_' . $idArchivo.'jpg');
       
        if ($existenciaImage == true) {
            return Storage::download('public/cedis/' . $idCedis . '/Incidencias/Incidencia_Evidencia_' . $idArchivo.'.jpg', 'Incidencia_Evidencia_' . $idArchivo.'.jpg');
        } else {
            return Storage::download('public/cedis/' . $idCedis . '/Incidencias/Incidencia_Evidencia_' . $idArchivo.'.pdf', 'Incidencia_Evidencia_' . $idArchivo.'.pdf');
        }
    }

    public function render()
    {
        $this->incidencias();
        return view('livewire.cedis.all-incidencias',['totalIncidencias'=>$this->totalIncidencias]);
    }
}
