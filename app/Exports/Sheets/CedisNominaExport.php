<?php

namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\ColaboradorModel;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use DB;

class CedisNominaExport extends DefaultValueBinder implements FromView,WithTitle,ShouldAutoSize,WithCustomValueBinder
{
    use Exportable;
    protected $cedisnombre;
    protected $region;
    protected $tipoNomina;
    protected $f_inicial;
    protected $f_final;
    protected $data;

    public function __construct($region, $nombrecedis, $tipoNomina, $f_inicial, $f_final)
    {
        $this->cedisnombre = $nombrecedis;
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

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    public function getData()
    {
        $this->data  = DB::select('call getNomina(?,?,?)',array($this->cedisnombre,$this->f_inicial,$this->f_final));
    }

    public function title(): string
    {
        return $this->cedisnombre;
    }

    public function view(): View
    {   
        $this->getData();
        return view('exports.nomina', [
            'data' => $this->data,
            'corte' => $this->f_final,
            'fechainicial' => $this->f_inicial
        ]);
    }
}
