<?php

namespace App\Http\Controllers;

use App\Models\GruposDeTrabajo;
use Illuminate\Http\Request;

class GruposDeTrabajoController extends Controller
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
    public function create()
    {
        dd("Aquí se crea el grupo de trabajo");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GruposDeTrabajo $gruposDeTrabajo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GruposDeTrabajo $gruposDeTrabajo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GruposDeTrabajo $gruposDeTrabajo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GruposDeTrabajo $gruposDeTrabajo)
    {
        //
    }
}
