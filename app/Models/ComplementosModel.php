<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplementosModel extends Model
{
    use HasFactory;

    protected $table = 'complementos';

    protected $primaryKey = 'idComplementos';

    protected $fillable = [
        'id',
        'Proyecto',
        'Puesto',
        'Salario',
        'Bono',
        'RFC',
        'NSS',
        'CURP',
        'Estudios',
        'Modalidad',
        'Vigencia',
        'Descuento_Nomina',
        'Credito_Infonavit_Fonacot',
        'Empleado_Activo',
        'Discapacidad',
        'Covid',
        'id_colaborador'
    ];
}
