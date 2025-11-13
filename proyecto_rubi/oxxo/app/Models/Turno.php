<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'turnos';

    // Nombre de la clave primaria personalizada
    protected $primaryKey = 'id_turno';

    // Indica que la clave primaria es incremental
    public $incrementing = true;

    // Tipo de dato de la clave primaria
    protected $keyType = 'int';

    public function getRouteKeyName()
{
    return 'id_turno';
}

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'hora_inicio',
        'hora_fin',
        'duracion_horas',
    ];
}

