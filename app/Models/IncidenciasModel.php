<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciasModel extends Model
{
    use HasFactory;

    protected $table="incidencias";

    protected $primaryKey = "idIncidencias";

    protected $fillable=[
        'Fecha_Incidencia',
        'Tipo_Incidencia',
        'Evidencia',
        'Descripcion',
        'id_colaborador',
        'Asignado_by'
    ];
}
