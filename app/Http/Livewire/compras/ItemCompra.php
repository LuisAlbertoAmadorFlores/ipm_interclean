<?php

namespace App\Http\Livewire\Compras;

use App\Models\comprasItemsModel;
use Carbon\Carbon;
use Livewire\Component;

class ItemCompra extends Component
{

    public $nombre;
    public $unidades;
    public $precio;
    public $url;
    public $codigo;

    protected $rules = ['nombre' => 'required', 'nombre' => 'max:254', 'unidades' => 'required', 'precio' => 'required'];
    
    public function mount($codigo){
        $this->codigo=$codigo;
    }

    public function agregarItem()
    {
        $this->validate();
        try {
            $createitem = new comprasItemsModel();
            $createitem->codigo_asociativo = strtoupper($this->codigo);
            $createitem->Nombre = $this->nombre;
            $createitem->Unidades = $this->unidades;
            $createitem->Precio = $this->precio;
            $createitem->URL = $this->url;
            $createitem->created_at = Carbon::now();
            $createitem->updated_at = Carbon::now();
            $createitem->save();
            if ($createitem->idcompras_items != 0) {
                $this->emit('itemAgredado', 'Se ha agregado correctamente el item');
                $this->emit('itemadd',$this->codigo);
                $this->reset('nombre', 'unidades', 'precio', 'url');
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.compras.item-compra');
    }
}
