<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdviserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos_de_trabajo = DB::table('grupos_de_trabajos')->get();
        //dd($grupos_de_trabajo);

        return view('asesor', compact('grupos_de_trabajo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
