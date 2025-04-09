<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoirialBajaModel extends Model
{
    use HasFactory;

    protected $table="historial_baja";

    protected $primaryKey = "idHistorialBaja";

    protected $fillable=[
        'idColaborador',
        'idJuridico',
        'Comentario',
        'idBaja'
    ];
}
