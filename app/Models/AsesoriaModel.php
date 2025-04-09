<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesoriaModel extends Model
{
    use HasFactory;
    protected $table = 'asesoria_juridico';
    protected $primaryKey = 'idAsesoria';
    protected $fillable = ['idColaborador', 'idTurno_Coordinador', 'idTurno_Juridico', 'Status_Asesoria', 'Fecha_Aceptado', 'Fecha_Regresado', 'Fecha_Asignado', 'Fecha_Turnado', 'Fecha_Espera', 'Comentario', 'Respuesta'];
}
