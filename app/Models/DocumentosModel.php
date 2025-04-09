<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentosModel extends Model
{
    use HasFactory;

    protected $table="documentos";
    protected $fillable=[
        'id',
        'Identificacion',
        'CURP',
        'NSS',
        'Comprobante_Domiclio',
        'Acta_Naciminto',
        'RFC',
        'Solicitud_Empleo',
        'Llamada_Contratacion',
        'Contrato_Digital',
        'Foto',
        'Otro',
        'id_usuario'
    ];
}
