<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'productos';

    // Campos que se pueden llenar desde formularios o seeds
    protected $fillable = [
        'nombre',
        'marca',
        'precio',
        'categoria',
    ];
}
