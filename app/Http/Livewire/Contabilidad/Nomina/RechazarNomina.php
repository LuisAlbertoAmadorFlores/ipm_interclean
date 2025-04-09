<?php

namespace App\Http\Livewire\Contabilidad\Nomina;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use File;

class RechazarNomina extends Component
{
    use WithFileUploads;
    public $nombre;
    protected $path = 'storage/Nomina/Historial/Nomina_Rechazada/';
    public $comentario;
    public $idContabilidad;

    public function mount($nombre, $idContabilidad)
    {
        $this->nombre = $nombre;
        $this->idContabilidad = $idContabilidad;
    }

    public function rechazar()
    {
        $nombre = explode('.', $this->nombre);
        $NombreContador = DB::table('users')->select('name')->where('id', $this->idContabilidad)->get();
        $file = $this->path . $nombre[0] . ".ipm";

        Storage::move('public/Nomina/' . $this->nombre, 'public/Nomina/Historial/Nomina_Rechazada/' . $this->nombre);
        try {
            $fp = fopen($file, "w");
            fwrite($fp, "Contador: " . $NombreContador[0]->name);
            fwrite($fp, "\nFecha de Revision: " . Carbon::now()->format('d-m-Y h:m:s'));
            fwrite($fp, "\n" . $this->comentario);
            fclose($fp);
            $this->emit('NominaRechazada', 'Nomina se ha rechazado correctamente.');
            return redirect()->route('nomina');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.contabilidad.nomina.rechazar-nomina');
    }
}
