<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NominaModel extends Model
{
    use HasFactory;

    protected $table = "nomina";
    protected $primaryKey = "idnomina";
    protected $fillable = ['Saldo_Pagar', 'Descuentos','Pago_Extra','Procede_Pago', 'idContador', 'idColaborador', 'Bono','acumulado_diario', 'Fecha_Inicial', 'Fecha_Final','idCoordinador'];
}
