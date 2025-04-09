<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cedisModel extends Model
{
    use HasFactory;

    protected $table="cedis";
    protected $fillable=["Proyecto","Region","Nombre","Estado","Municipio","Responsable","Telefono","Correo"];



}
