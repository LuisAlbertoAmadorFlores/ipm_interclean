<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atcModel extends Model
{
    use HasFactory;
    protected $table = "atencion_colaborador";

    protected $fillable = ['id', 'Ticket', 'Problematica', 'Comentario', 'idContactCenter', 'idColaborador', 'Involucrados', 'Respuesta'];
}
