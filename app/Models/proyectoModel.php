<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyectoModel extends Model
{
    use HasFactory;

    protected $table="proyectos";
    protected $primarykey="idProyecto";
    protected $fillable=['Nombre_Largo_Proyecto','Nombre_Corto_Proyecto','Coordinador','Total_Colaboradores','Total_Colaboradores_Activos'];
}
