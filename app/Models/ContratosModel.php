<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratosModel extends Model
{
    use HasFactory;

    protected $table='contratos';
    protected $primaryKey = 'id';
    protected $fillable=['idColaborador','idCallCenter','correo','password','status','status_ine'];
}
