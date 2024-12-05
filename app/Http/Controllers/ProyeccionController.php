<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyeccion;

class ProyeccionController extends Controller
{
    public function index()
    {
        $proyecciones = Proyeccion::all();
        $totalSueldos = $proyecciones->sum('total');

        return view('proyecciones.index', compact('proyecciones', 'totalSueldos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Opcional si tienes un formulario separado para crear nuevas proyecciones
        return view('proyecciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación de los datos recibidos
        $data = $request->validate([
            'puestos' => 'required|array|min:1',
            'numero_trabajadores' => 'required|array|min:1',
            'salario' => 'required|array|min:1',
            'puestos.*' => 'string|max:255',
            'numero_trabajadores.*' => 'integer|min:0',
            'salario.*' => 'numeric|min:0',
        ]);
    
        // Guardar o actualizar cada proyección
        foreach ($data['puestos'] as $index => $puesto) {
            Proyeccion::updateOrCreate(
                [
                    'puesto' => $puesto,
                    'numero_trabajadores' => $data['numero_trabajadores'][$index],
                    'salario' => $data['salario'][$index],
                ],
                [
                    'total' => $data['numero_trabajadores'][$index] * $data['salario'][$index],
                ]
            );
        }
    
        return redirect()->route('proyecciones.index')
                         ->with('success', 'Datos guardados correctamente.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyeccion = Proyeccion::findOrFail($id);

        return view('proyecciones.show', compact('proyeccion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyeccion = Proyeccion::findOrFail($id);

        return view('proyecciones.edit', compact('proyeccion'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $proyeccion = Proyeccion::findOrFail($id);

    $data = $request->validate([
        'puesto' => 'required|string|max:255',
        'numero_trabajadores' => 'required|integer|min:0',
        'salario' => 'required|numeric|min:0',
    ]);

    $data['total'] = $data['numero_trabajadores'] * $data['salario'];

    $proyeccion->update($data);

    return redirect()->route('proyeccion.anual')->with('success', 'Proyección actualizada correctamente.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $proyeccion = Proyeccion::findOrFail($id);
            $proyeccion->delete();
    
            return response()->json(['message' => 'Eliminado correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se pudo eliminar la proyección'], 500);
        }
    }
    



    /**
     * Display a listing of the resource.
     */
    public function resumen()
    {
        // Obtener todas las proyecciones y calcular los totales
        $proyecciones = Proyeccion::all();
        $totalSueldoMensual = $proyecciones->sum('total');
        $totalSueldoAnual = $totalSueldoMensual * 12;
        $totalSueldoCincoAnios = $totalSueldoMensual * 60;

        // Pasar los datos a la vista
        return view('proyecciones.resumen', compact('totalSueldoMensual', 'totalSueldoAnual', 'totalSueldoCincoAnios'));
    }
    public function proyeccionAnual()
{
    // Obtén los datos de proyecciones
    $proyecciones = Proyeccion::all();

    // Calcula la proyección anual para cada puesto
    $proyeccionAnual = $proyecciones->map(function ($proyeccion) {
        return [
            'puesto' => $proyeccion->puesto,
            'numero_trabajadores' => $proyeccion->numero_trabajadores,
            'salario_mensual' => $proyeccion->salario,
            'salario_anual' => $proyeccion->salario * 12,
            'total_anual' => $proyeccion->numero_trabajadores * $proyeccion->salario * 12,
        ];
    });

    // Retorna la vista con los datos procesados
    return view('proyecciones.anual', compact('proyeccionAnual'));
}
public function proyeccionCincoAnios()
{
    // Obtén los datos de proyecciones
    $proyecciones = Proyeccion::all();

    // Calcula la proyección a cinco años para cada puesto
    $proyeccionCincoAnios = $proyecciones->map(function ($proyeccion) {
        return [
            'puesto' => $proyeccion->puesto,
            'numero_trabajadores' => $proyeccion->numero_trabajadores,
            'salario_mensual' => $proyeccion->salario,
            'salario_anual' => $proyeccion->salario * 12,
            'total_cinco_anios' => $proyeccion->numero_trabajadores * $proyeccion->salario * 12 * 5,
        ];
    });

    // Retorna la vista con los datos procesados
    return view('proyecciones.cinco_anios', compact('proyeccionCincoAnios'));
}
}
