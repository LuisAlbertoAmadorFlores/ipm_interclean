<?php

namespace App\Http\Livewire\Compras;

use App\Models\comprasModel;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaOrdernesCompra extends Component
{
    use WithPagination;
    public $busqueda;
    private $resul;
    public $estatus;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['busquedaOrdenCompra'];

    public function mount()
    {
        // $this->resul = DB::table('compras')->join('users', 'compras.Solicitante', 'users.id')->get();
        $this->resul = comprasModel::join('users', 'compras.Solicitante', 'users.id')->paginate(6);
    }

    public function busquedaOrdenCompra($dato)
    {
        if ($dato) {
            $this->resul = comprasModel::join('users', 'compras.Solicitante', 'users.id')
                ->where('Departamento', 'like', '%' . $dato . '%')
                ->orWhere('Codigo_Asociativo', 'like', '%' . $dato . '%')
                ->orderBy('compras.created_at', 'asc')->paginate(5);
        } else {
            $this->resul = comprasModel::join('users', 'compras.Solicitante', 'users.id')->paginate(5);
        }
    }

    public function render()
    {
        return view('livewire.compras.tabla-ordernes-compra',['misordenes' => $this->resul]);
    }
}
