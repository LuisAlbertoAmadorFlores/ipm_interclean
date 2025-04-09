<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class NominaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = DB::table('nomina')
            ->join('colaborador', 'colaborador.idColaborador', 'nomina.idColaborador')
            ->join('complementos', 'complementos.id_colaborador', 'nomina.idColaborador')
            ->get();
        
            return view('exports.nomina', [
            'data' => $data
        ]);
    }
}
