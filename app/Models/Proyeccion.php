<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    use HasFactory;

    // Especifica 
    protected $table = 'proyeccion_de_sueldo';

   
    protected $fillable = [
        'plan_de_negocio_id',
        'descripcion_de_puesto_id',
        'sueldo',
        'total'
    ];
}
