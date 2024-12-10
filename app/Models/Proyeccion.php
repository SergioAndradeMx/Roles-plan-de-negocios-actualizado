<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    use HasFactory;

    // Especifica 
    protected $table = 'proyecciones';

   
    protected $fillable = [
        'puesto',
        'numero_trabajadores',
        'salario',
        'total',
        'año_1',     
        'año_2',    
        'año_3',      
        'año_4',      
        'año_5',     
    ];
}
