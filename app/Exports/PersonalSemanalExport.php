<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PersonalSemanalExport implements FromView, ShouldAutoSize
{
    protected $productos;

    public function __construct($productos_factura = null)
    {
        $this->productos = $productos_factura;
    }

    public function view(): View
    {
        $data = $this->productos;
        return view("exports.semanal", compact("data"));
    }
}
