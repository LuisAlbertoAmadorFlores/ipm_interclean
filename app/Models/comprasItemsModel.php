<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comprasItemsModel extends Model
{
    use HasFactory;
    protected $table="compras_items";
    protected $primaryKey='idcompras_items';
    protected $fillable=["idcompras","codigo_asociativo","Nombre","Unidades","Precio","URL"];
}
