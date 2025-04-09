<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenteCedisModel extends Model
{
    use HasFactory;
    protected $table="cedis_incidente";

    protected $primaryKey = "idIncidencias";

    protected $casts = [
        'idColaborador' => 'string',
    ];

    protected $fillable=[
        'Fecha_Incidencia',
        'Tipo_Incidencia',
        'Evidencia',
        'Descripcion',
        'idColaborador',
        'idCedis',
        'Asignado_by'
    ];
}
