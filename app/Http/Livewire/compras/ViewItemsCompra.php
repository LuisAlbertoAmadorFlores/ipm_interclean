<?php

namespace App\Http\Livewire\Compras;

use App\Models\comprasModel;
use Carbon\Carbon;
use Livewire\Component;
use DB;

class ViewItemsCompra extends Component
{
    public $data;
    public $codigo;
    public $total;
    public $descripcion;

    protected $listeners = ['itemadd'];

    public function mount($codigo)
    {
        $this->codigo = $codigo;
    }

    public function itemadd($codigo)
    {
        $this->codigo = $codigo;
        $this->updateOrden();
    }

    public function delete($id)
    {
        DB::table('compras_items')->where('idcompras_items', $id)->delete();
    }

    public function updateOrden()
    {
        $this->data = DB::table('compras_items')->where('codigo_asociativo', $this->codigo)->get();
    }

    public function guardar($gasto, $id)
    {
        try {
            $insert = new comprasModel();
            $insert->Solicitante = $id;
            $insert->Codigo_Asociativo= strtoupper($this->codigo);
            $insert->Status = 'Activo';
            $insert->Total_Gasto = $gasto;
            $insert->Comentario=$this->descripcion;
            $insert->created_at=Carbon::now();
            $insert->updated_at=Carbon::now();
            $insert->save();
            if ($insert->idcompras != 0) {
                $this->emit('RegistroCompra','Orden de compra generada.');
                return redirect('allMyOrder');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.compras.view-items-compra');
    }
}
