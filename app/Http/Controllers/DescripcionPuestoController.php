<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DescripcionPuesto;

class DescripcionPuestoController extends Controller
{
    /**
     * Mostrar la lista de descripciones de puesto.
     */
    public function index()
    {
        $descripciones = DescripcionPuesto::orderByRaw("FIELD(nivel, 'Estratégico', 'Táctico', 'Operativo')")->get();
        return view('descripciones.index', compact('descripciones'));
    }

    /**
     * Mostrar el formulario para crear una nueva descripción de puesto.
     */
    public function create()
    {
        return view('descripciones.create');
    }

    /**
     * Almacenar una nueva descripción de puesto.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nivel' => 'required|string',
            'unidad_administrativa' => 'required|string|max:255',
            'nombre_puesto' => 'required|string|max:255',
            'descripcion_generica' => 'required|string',
            'descripcion_especifica' => 'required|string',
            'objetivos_puesto' => 'required|string',
            'salario_minimo' => 'required|numeric',
            'salario_maximo' => 'required|numeric',
            'jornada_laboral' => 'required|string',
            'numero_plaza' => 'required|integer',
            'reporta_a' => 'nullable|string',
            'supervisa_a' => 'nullable|string',
            'comunicacion_interna' => 'nullable|string',
            'comunicacion_externa' => 'nullable|string',
            'estado_civil' => 'nullable|string',
            'edad' => 'nullable|integer',
            'genero' => 'nullable|string',
            'requisitos_generales' => 'nullable|string',
            'habilidades_fisicas' => 'nullable|string',
            'habilidades_mentales' => 'nullable|string',
        ]);

        // Autogenerar el código según el nivel
        $validatedData['codigo'] = $this->generateCodigo($request->nivel);

        DescripcionPuesto::create($validatedData);

        return redirect()->route('descripciones.index')->with('success', 'Descripción de puesto creada exitosamente.');
    }

    /**
     * Mostrar el formulario para editar una descripción de puesto existente.
     */
    public function edit($id)
    {
        $descripcion = DescripcionPuesto::findOrFail($id);
        return view('descripciones.edit', compact('descripcion'));
    }

    /**
     * Actualizar una descripción de puesto existente.
     */
    public function update(Request $request, $id)
    {
        $descripcion = DescripcionPuesto::findOrFail($id);

        $validatedData = $request->validate([
            'nivel' => 'required|string',
            'unidad_administrativa' => 'required|string|max:255',
            'nombre_puesto' => 'required|string|max:255',
            'descripcion_generica' => 'required|string',
            'descripcion_especifica' => 'required|string',
            'objetivos_puesto' => 'required|string',
            'salario_minimo' => 'required|numeric',
            'salario_maximo' => 'required|numeric',
            'jornada_laboral' => 'required|string',
            'numero_plaza' => 'required|integer',
            'reporta_a' => 'nullable|string',
            'supervisa_a' => 'nullable|string',
            'comunicacion_interna' => 'nullable|string',
            'comunicacion_externa' => 'nullable|string',
            'estado_civil' => 'nullable|string',
            'edad' => 'nullable|integer',
            'genero' => 'nullable|string',
            'requisitos_generales' => 'nullable|string',
            'habilidades_fisicas' => 'nullable|string',
            'habilidades_mentales' => 'nullable|string',
        ]);

        $descripcion->update($validatedData);

        return redirect()->route('descripciones.index')->with('success', 'Descripción de puesto actualizada exitosamente.');
    }

    /**
     * Eliminar una descripción de puesto.
     */
    public function destroy($id)
    {
        $descripcion = DescripcionPuesto::findOrFail($id);
        $descripcion->delete();

        return redirect()->route('descripciones.index')->with('success', 'Descripción de puesto eliminada exitosamente.');
    }

    /**
     * Generar el código automáticamente según el nivel.
     */
    private function generateCodigo($nivel)
    {
        $baseCode = match ($nivel) {
            'Estratégico' => '1.0',
            'Táctico' => '1.1',
            'Operativo' => '1.1.1',
        };

        // Contar registros existentes en este nivel
        $count = DescripcionPuesto::where('nivel', $nivel)->count();
        return $baseCode . ($count > 0 ? '.' . ($count + 1) : '');
    }
}
