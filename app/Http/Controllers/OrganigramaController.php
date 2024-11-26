<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organigrama;
use Illuminate\Support\Facades\Storage;

class OrganigramaController extends Controller
{
    // Mostrar la lista de organigramas
    public function index()
    {
        $organigramas = Organigrama::all();
        return view('organigramas.index', compact('organigramas'));
    }

    // Subir un nuevo organigrama
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:pdf',
        ]);

        // Almacenar el archivo y registrar el organigrama
        $path = $request->file('archivo')->store('organigramas');

        Organigrama::create([
            'nombre' => $request->nombre,
            'archivo' => $path,
        ]);

        return redirect()->route('organigramas.index')->with('success', 'Organigrama subido exitosamente.');
    }

    // Mostrar el formulario para editar un organigrama
    public function edit(Organigrama $organigrama)
    {
        return view('organigramas.edit', compact('organigrama'));
    }

    // Actualizar un organigrama existente
    public function update(Request $request, Organigrama $organigrama)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'nullable|file|mimes:pdf',
        ]);

        // Si el usuario sube un nuevo archivo, lo reemplazamos
        if ($request->hasFile('archivo')) {
            // Eliminar el archivo viejo
            Storage::delete($organigrama->archivo);

            // Almacenar el nuevo archivo
            $path = $request->file('archivo')->store('organigramas');
            $organigrama->archivo = $path;
        }

        // Actualizar el nombre
        $organigrama->nombre = $request->nombre;
        $organigrama->save();

        return redirect()->route('organigramas.index')->with('success', 'Organigrama actualizado exitosamente.');
    }

    // Eliminar un organigrama
    public function destroy(Organigrama $organigrama)
    {
        // Eliminar el archivo del servidor
        Storage::delete($organigrama->archivo);

        // Eliminar el organigrama de la base de datos
        $organigrama->delete();

        return redirect()->route('organigramas.index')->with('success', 'Organigrama eliminado exitosamente.');
    }

    // Descargar un organigrama
    public function download(Organigrama $organigrama)
    {
        // Descargar el archivo desde el almacenamiento
        return Storage::download($organigrama->archivo);
    }
}
