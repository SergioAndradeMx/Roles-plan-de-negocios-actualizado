<?php

namespace App\Http\Controllers;

use App\Models\Organigrama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganigramaController extends Controller
{
    public function index()
    {
        $organigramas = Organigrama::all();
        return view('organigrama.index', compact('organigramas'));
    }

    public function create()
    {
        return view('organigrama.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'archivo' => 'required|mimes:pdf|max:2048',
        ]);

        // Guardar archivo en storage
        $path = $request->file('archivo')->store('organigramas');

        // Guardar en la base de datos
        Organigrama::create([
            'nombre' => $request->nombre,
            'archivo' => $path,
        ]);

        return redirect()->route('organigrama.index')->with('success', 'Organigrama subido exitosamente.');
    }

    public function download($id)
    {
        $organigrama = Organigrama::findOrFail($id);

        return Storage::download($organigrama->archivo);
    }

    public function destroy($id)
    {
        $organigrama = Organigrama::findOrFail($id);

        // Eliminar archivo del almacenamiento
        Storage::delete($organigrama->archivo);

        // Eliminar registro de la base de datos
        $organigrama->delete();

        return redirect()->route('organigrama.index')->with('success', 'Organigrama eliminado exitosamente.');
    }
}
