<?php

namespace App\Http\Livewire\Cedis;

use Illuminate\Support\Facades\DB;
use Livewire\Component;


class TodosCedis extends Component
{
    public $result;
    protected $listeners = ['sendCedisData' => "buscar","clearData"];

    public function clearData(){
        $this->reset('result');
    }

    public function buscar($nombre)
    {   
        $this->result = DB::table('cedis')->where('Region', '=', $nombre)->get();
    }

    public function render()
    {
        return view('livewire.cedis.todos-cedis');
    }
}
