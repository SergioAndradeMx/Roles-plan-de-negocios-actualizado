<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Plan_de_negocio;
use App\Models\Estudio;
use App\Models\Poll;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Plan_de_negocio $plan_de_negocio, Estudio $estudio, Poll $encuestum)
    {
        return view('pregunta.create',compact('plan_de_negocio', 'estudio', 'encuestum'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Plan_de_negocio $plan_de_negocio, Estudio $estudio, Poll $encuestum)
    {
        $titulo = $request->validate([
            'pregunta' => 'required',
        ]);

        $respuestas = $request->validate([
            'respuestas.*.respuesta' => 'required',
        ]);

        $pregunta = $encuestum->preguntas()->create($titulo);
        $pregunta->respuestas()->createMany($respuestas['respuestas']);

        $user_route = auth()->user()->rol;
        if($user_route == 'admin' || $user_route == 'asesor'){
            $user_route = $user_route.'_';
        }

        return redirect()->route($user_route.'plan_de_negocio.estudio.encuesta.index', ['plan_de_negocio' => $plan_de_negocio, 'estudio' => $estudio]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pregunta $pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pregunta $pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pregunta $pregunta)
    {
        //
    }
}
