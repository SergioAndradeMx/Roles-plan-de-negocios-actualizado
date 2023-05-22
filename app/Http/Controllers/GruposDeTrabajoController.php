<?php

namespace App\Http\Controllers;

use App\Models\GruposDeTrabajo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class GruposDeTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GruposDeTrabajo $gruposDeTrabajo)
    {
        $grupo = GruposDeTrabajo::find(request('grupo'));
        $array_usuarios = json_decode($grupo->integrantes);

        if(request('search')){
            $usuarios = DB::table('users')->where('email', 'like', '%' . request('search') . '%')->get();

            //dd($agregar_usuario);

            return view('asesor.grupos_de_trabajo.index', compact('grupo', 'usuarios', 'array_usuarios'));
        }else{
            return view('asesor.grupos_de_trabajo.index', compact('grupo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asesor.grupos_de_trabajo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_grupo' => 'required',
            'descripcion' => 'required',
        ]);

        $user = Auth::user();

        $user->grupos_de_trabajo()->create($validated);
        $user->save();

        return redirect()->route('asesor.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(GruposDeTrabajo $gruposDeTrabajo)
    {
        $grupo = GruposDeTrabajo::find(request('grupo'));
        $array_usuarios = json_decode($grupo->integrantes);

        $users = User::whereIn('id', $array_usuarios)->get();
        
        return view('asesor.grupos_de_trabajo.show', compact('grupo','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GruposDeTrabajo $gruposDeTrabajo)
    {
        dd("si");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GruposDeTrabajo $gruposDeTrabajo, string $usuario)
    {
        $grupo = GruposDeTrabajo::find(request('grupo'));
        $usuario = (int)(request('usuario'));

        $array_usuarios = json_decode($grupo->integrantes);

        if(!in_array($usuario, $array_usuarios)){
            array_push($array_usuarios, $usuario);

            $users = User::whereIn('id', $array_usuarios)->get();

            //dd($users);

            $array_usuarios = json_encode($array_usuarios);            
            $grupo->integrantes = $array_usuarios;
            
            $grupo->save();
        }
        
        return redirect()->route('grupo.show', [
            "grupo" => $grupo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GruposDeTrabajo $gruposDeTrabajo, User $user)
    {
        $grupo = GruposDeTrabajo::find(request('grupo'));
        $usuario = (int)request('usuario');

        $array_usuarios = json_decode($grupo->integrantes);

        $array_usuarios = array_diff($array_usuarios, array($usuario));
        $array_usuarios = array_values($array_usuarios);
        $array_usuarios = json_encode($array_usuarios);

        $grupo->integrantes = $array_usuarios;

        $grupo->save();
        return back();
        
    }
}
