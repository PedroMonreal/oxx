<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*class Product extends Model
{
    use HasFactory;
    
    // ESTO ES CLAVE: Indica a Eloquent que use la tabla 'productos'
    protected $table = 'productos'; 
    
    // Opcional: Para permitir la asignación masiva de campos
    protected $fillable = [
        'nombre',
        'marca',
        'precio',
        'categoria'
    ];
}  */

class Product extends Model
{
    use HasFactory;

    protected $table = 'productos';
    public $timestamps = false;
    
    //Casters para asegurar que 'precio' se devuelva como flotante (decimal)
    protected $casts = [
        'precio' => 'float',
    ];

    protected $fillable = [
        'nombre',
        'marca',
        'precio',
        'categoria'
    ];

}