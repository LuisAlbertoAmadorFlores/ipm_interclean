<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColaboradorModel extends Model
{
    use HasFactory;

    protected $table ='colaborador';

    protected $primaryKey='idColaborador';
    protected $fillable = [
        'Nombre',
        'Apellido_Paterno',
        'Apellido_Materno',
        'Edad',
        'Sexo',
        'Direccion',
        'Colonia',
        'Municipio',
        'Estado',
        'Codigo_Postal',
        'Telefono',
        'Email',
        'Status',
        'id_usuario'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
