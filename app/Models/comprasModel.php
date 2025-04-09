<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprasModel extends Model
{
    use HasFactory;
    protected $table="compras";
    protected $primaryKey='idcompras';
    protected $fillable=["Solicitante","Atendido_by","Status","Comentario","Fecha_Adquisicion","Codigo_Asociativo"];
}
