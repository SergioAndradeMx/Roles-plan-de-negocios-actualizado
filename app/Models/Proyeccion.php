<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla si es diferente al plural del nombre del modelo
    protected $table = 'proyecciones';

    // Asegúrate de que las columnas que se pueden llenar estén en $fillable
    protected $fillable = ['puesto', 'numero_trabajadores', 'salario', 'total'];
}
