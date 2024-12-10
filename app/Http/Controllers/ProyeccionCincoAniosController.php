<?php

namespace App\Http\Controllers;

use App\Models\Proyeccion;
use Illuminate\Http\Request;

class ProyeccionCincoAniosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperamos las proyecciones de la base de datos
        $proyecciones = Proyeccion::all();
    
        // Pasamos la variable 'proyecciones' a la vista
        return view('proyecciones.cinco_anios', compact('proyecciones'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retornamos una vista para crear una nueva proyección
        return view('proyecciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos del formulario
        $validated = $request->validate([
            'puesto' => 'required|string',
            'numero_trabajadores' => 'required|integer',
            'salario_mensual' => 'required|numeric',
            'año_1' => 'required|numeric',
            'año_2' => 'required|numeric',
            'año_3' => 'required|numeric',
            'año_4' => 'required|numeric',
            'año_5' => 'required|numeric',
        ]);

        // Calculamos el total para los 5 años
        $total = $validated['salario_mensual'] * 12 * 5;

        // Creamos la nueva proyección en la base de datos
        Proyeccion::create([
            'puesto' => $validated['puesto'],
            'numero_trabajadores' => $validated['numero_trabajadores'],
            'salario' => $validated['salario_mensual'],
            'total' => $total,
            'año_1' => $validated['año_1'],
            'año_2' => $validated['año_2'],
            'año_3' => $validated['año_3'],
            'año_4' => $validated['año_4'],
            'año_5' => $validated['año_5'],
        ]);

        // Redirigimos a la vista principal con un mensaje de éxito
        return redirect()->route('proyecciones.cinco_anios')->with('success', 'Proyección de 5 años creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Obtenemos la proyección por ID
        $proyeccion = Proyeccion::findOrFail($id);

        // Retornamos la vista con los detalles de la proyección
        return view('proyecciones.show', compact('proyeccion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Obtenemos la proyección por ID
        $proyeccion = Proyeccion::findOrFail($id);

        // Retornamos la vista para editar la proyección
        return view('proyecciones.edit', compact('proyeccion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validamos los datos recibidos del formulario
        $validated = $request->validate([
            'puesto' => 'required|string',
            'numero_trabajadores' => 'required|integer',
            'salario_mensual' => 'required|numeric',
            'año_1' => 'required|numeric',
            'año_2' => 'required|numeric',
            'año_3' => 'required|numeric',
            'año_4' => 'required|numeric',
            'año_5' => 'required|numeric',
        ]);

        // Calculamos el total para los 5 años
        $total = $validated['salario_mensual'] * 12 * 5;

        // Actualizamos la proyección existente
        $proyeccion = Proyeccion::findOrFail($id);
        $proyeccion->update([
            'puesto' => $validated['puesto'],
            'numero_trabajadores' => $validated['numero_trabajadores'],
            'salario' => $validated['salario_mensual'],
            'total' => $total,
            'año_1' => $validated['año_1'],
            'año_2' => $validated['año_2'],
            'año_3' => $validated['año_3'],
            'año_4' => $validated['año_4'],
            'año_5' => $validated['año_5'],
        ]);

        // Redirigimos a la vista principal con un mensaje de éxito
        return redirect()->route('proyecciones.cinco_anios')->with('success', 'Proyección de 5 años actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminamos la proyección de la base de datos
        $proyeccion = Proyeccion::findOrFail($id);
        $proyeccion->delete();

        // Redirigimos a la vista principal con un mensaje de éxito
        return redirect()->route('proyecciones.cinco_anios')->with('success', 'Proyección de 5 años eliminada con éxito.');
    }
}
