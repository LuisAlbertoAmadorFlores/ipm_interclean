<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialDocumentacion extends Model
{
    use HasFactory;
    protected $table="documentacion_auditoria";
    protected $primaryKey="idHistorialDoc";
    protected $fillable=['nombreDoc','statusDoc','Comentario','idDocumentacionColaborador','idJuridico'];
}
