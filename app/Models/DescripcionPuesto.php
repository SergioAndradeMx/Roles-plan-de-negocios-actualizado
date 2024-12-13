<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescripcionPuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_de_negocio_id',
        'nivel',
        'codigo',
        'unidad_administrativa',
        'nombre_puesto',
        'descripcion_generica',
        'descripcion_especifica',
        'objetivos_puesto',
        'salario_minimo',
        'salario_maximo',
        'jornada_laboral',
        'numero_plaza',
        'reporta_a',
        'supervisa_a',
        'comunicacion_interna',
        'comunicacion_externa',
        'estado_civil',
        'edad',
        'genero',
        'requisitos_generales',
        'habilidades_fisicas',
        'habilidades_mentales',
    ];

    // protected $casts = [
    //     'reporta_a' => 'array',
    //     'supervisa_a' => 'array',
    // ];
}
