<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagosExtrasModel extends Model
{
    use HasFactory;
    protected $table = "pagos_extras";

    protected $primaryKey = 'idPago';

    protected $fillable = [
        'Motivo',
        'Pago_Total',
        'idColaboradorCubierto',
        'Descripcion',
        'Status',
        'Fecha_Asignacion_Pago',
        'idColaborador',
        'idCoordinador',
        'fecha_cubierta'
    ];
}
