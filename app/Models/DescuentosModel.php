<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescuentosModel extends Model
{
    use HasFactory;

    protected $table = "descuento";

    protected $primaryKey = 'idDescuento';

    protected $fillable = [
        'Motivo',
        'Costo_Total',
        'Costo_Restante',
        'Parcialidades',
        'Tipo_Descuento',
        'Descripcion',
        'Status',
        'Cantidad_Descontada',
        'Fecha_Asigancion_Descuento',
        'idColaborador',
        'idCoordinador',
    ];
}
