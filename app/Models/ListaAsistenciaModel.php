<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaAsistenciaModel extends Model
{
    use HasFactory;

    protected $table = "lista_asistencia";

    protected $primaryKey = "idlistaAsistencia";

    protected $fillable = ['idColaborador', 'Fecha_Laboral','Tipo','Hora_Entrada','Hora_Salida', 'idCoordinador'];
}