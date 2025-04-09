<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prospectos extends Model
{
    use HasFactory;


    protected $table = "prospectos";

    protected $fillable = [
        'Nombre',
        'Apellido_Paterno',
        'Apellido_Materno',
        'Edad',
        'Direccion',
        'Municipio',
        'Estado',
        'Codigo_Postal',
        'Telefono',
        'Email',
        'idReclutador'
    ];
}
