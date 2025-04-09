<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use DB;

class ReportGeneralExport extends DefaultValueBinder implements FromView, WithTitle, ShouldAutoSize, WithCustomValueBinder
{

    use Exportable;
    protected $cedisnombre;
    protected $region;
    protected $tipoNomina;
    protected $f_inicial;
    protected $f_final;
    protected $Nomina_NoPagar = 0;
    protected $Nomina_SiPagar = 0;
    protected $Nomina_Region = 0;
    protected $data;

    public function __construct($region, $tipoNomina, $f_inicial, $f_final)
    {
        $this->region = $region;
        $this->tipoNomina = $tipoNomina;
        $this->f_inicial = $f_inicial;
        $this->f_final = $f_final;
    }

    public function bindValue(Cell $cell, $value)
    {
        if (is_numeric($value)) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }
        return parent::bindValue($cell, $value);
    }



    public function getData()
    {
        $this->data  = DB::select('call getNominasZona(?,?,?)', array($this->region, $this->f_inicial, $this->f_final));
        foreach ($this->data as $nomina) {
            if ($nomina->Procede_Pago == 'SI') {
                $this->Nomina_SiPagar = $this->Nomina_SiPagar + $this->obtenerValor($nomina->Saldo_Pagar);
            } else {
                $this->Nomina_NoPagar = $this->Nomina_NoPagar + $this->obtenerValor($nomina->Saldo_Pagar);
            }
        }
        $this->Nomina_Region = $this->Nomina_SiPagar + $this->Nomina_NoPagar;
    }

    public function obtenerValor($cantidad)
    {
        $RetornoCantidad = '';
        $arrayCantidad = explode(',', $cantidad);
        foreach ($arrayCantidad as $value) {
            $RetornoCantidad = $RetornoCantidad . $value;
        }
        return intval($RetornoCantidad);
    }

    public function title(): string
    {
        return $this->region;
    }

    public function view(): View
    {
        $this->getData();
        return view('exports.reporteGeneral', [
            'data' => $this->data,
            'totalNomina' => number_format($this->Nomina_Region, 2),
            'NominaNoPagar' => number_format($this->Nomina_NoPagar, 2),
            'NominaSiPagar' => number_format($this->Nomina_SiPagar, 2),
            'corte' => $this->f_final,
            'fechainicial' => $this->f_inicial
        ]);
    }
}
