<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BajasModel extends Model
{
    use HasFactory;
    protected $table="bajas";
    protected $primaryKey = "idBajas";
    protected $fillable = [
        'idColaborador',
        'idTurno_Coordinador',
        'idTurno_Juridico',
        'Status_baja',
        'Fecha_Aceptado',
        'Fecha_Rechazado',
        'Fecha_Asignado',
        'Fecha_Turnado',
        'Fecha_Espera',
        'Fecha_Baja',
        'Fecha_Cal_Finiquito',
        'Respuesta'
    ];
}
