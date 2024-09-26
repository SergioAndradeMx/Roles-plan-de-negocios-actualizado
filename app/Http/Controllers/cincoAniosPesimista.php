<?php

namespace App\Http\Controllers;

use App\Models\CostoFijo;
use App\Models\CostosVariable;
use App\Models\EstudioFinanciero;
use App\Models\Ingreso;
use App\Models\Plan_de_negocio;
use Illuminate\Http\Request;

class cincoAniosPesimista extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Plan_de_negocio $plan_de_negocio)
    {
        // Buscamos a cual estudio pertenece.
        $estudio = EstudioFinanciero::where('plan_de_negocio_id', $plan_de_negocio->id)->first();
        // Arreglos que me van a servir para crear la estructura de datos cuando no exista datos de cinco años.
        $arrayFijos = [];
        $arrayVariables = [];
        $arrayIngresos = [];
        // * Condición que valida que existan ingresos, costos variables e fijos de cinco años.
        if ((count($estudio->ingresos_pesimista_cincoAnios)) > 0 && true) {
            // * Envía a la vista
            return view('plan_financiero.pesimistaCincoAnios', [
                'arrayFijo' => $arrayFijos,
                'arrayVariable' => $arrayVariables,
                'arrayIngresos' => $arrayIngresos,
                // ! Falta crear la migración y modelo
                'costosFijos' => $estudio,
                'costosVariables' => $estudio,
                // Este ya se creo.
                'ingresos' => $estudio->ingresos_pesimista_cincoAnios,
                'plan_de_negocio' => $plan_de_negocio
            ]);
        } else {
            // Validamos que existan ingresos, costos fijos y variables anuales para que se agregue.
            if ((count($estudio->ingresos_pesimistas) > 0) && (count($estudio->variables_pesimistas) > 0) && (count($estudio->costos_fijos_anuales)) > 0) {
                // TODO: Pedir los datos ordenados.
                // * Obtengo los costos Fijos.
                $costosFijosAnuales = $estudio->costos_fijos_anuales()
                    ->orderBy('Id_costo_fijo')
                    ->orderBy('mes')
                    ->get();
                    dd($costosFijosAnuales);
                // * Obtengo los Costos Variables Pesimistas
                $costosVariablesAnuales = $estudio->variables_pesimistas()
                    ->orderBy('Id_costo_variable')
                    ->orderBy('mes')
                    ->get();
                // * Obtengo los Ingresos Pesimistas
                $ingresosAnuales = $estudio->ingresos_pesimistas()
                    ->orderBy('Id_ingresos')
                    ->orderBy('mes')
                    ->get();

                // TODO: Calcular el total de costo fijo anual
                // Variable para sumar todo los años.
                $montoTotal = 0;
                foreach ($costosFijosAnuales as  $value) {
                    // Suma todos los valores
                    $montoTotal += $value->monto_conservador;
                    // Cuando llegue a 12 lo almacenara
                    if ($value->mes == 12) {
                        // Busco el costo fijo.
                        $cFijo = CostoFijo::find($value->Id_costo_fijo);
                        // Lo agrego al arreglo.
                        $arrayFijos[$value->Id_costo_fijo][$cFijo->nombre] = $montoTotal;
                        // Regreso el valor por a cero para que no se acumulen
                        $montoTotal = 0;
                    }
                }

                // TODO: Calcular el total de costo variable anual
                foreach ($costosVariablesAnuales as $value) {
                    $montoTotal += $value->monto_pesimista;
                    // Cuando llegue a 12 lo almacenara
                    if ($value->mes == 12) {
                        // Busco el costo variable
                        $cVariable = CostosVariable::find($value->Id_costo_variable);
                        // Lo agrego al arreglo.
                        $arrayVariables[$value->Id_costo_variable][$cVariable->nombre] = $montoTotal;
                        // Regreso el valor por a cero para que no se acumulen
                        $montoTotal = 0;
                    }
                }

                // TODO: Calcular el total de ingresos.
                foreach ($ingresosAnuales as  $value) {
                    $montoTotal += $value->monto_pesimista;
                    if ($value->mes == 12) {
                        // Busco el ingreso correcto
                        $ingreso = Ingreso::find($value->Id_ingresos);
                        // Lo agrego al arreglo.
                        $arrayIngresos[$value->Id_ingresos][$ingreso->nombre] = $montoTotal;
                        // Regreso el valor por a cero para que no se acumulen
                        $montoTotal = 0;
                    }
                }
                // * Envía a la vista
                return view('plan_financiero.pesimistaCincoAnios', [
                    'arrayFijo' => $arrayFijos,
                    'arrayVariable' => $arrayVariables,
                    'arrayIngresos' => $arrayIngresos,
                    // No se envían esos valores a la vista
                    'costosFijos' => [],
                    'costosVariables' => [],
                    'ingresos' => [],
                    'plan_de_negocio' => $plan_de_negocio
                ]);
            } else {
                return back()->with('mensaje', 'Ingrese primero los pesimistas anuales');
            }
        }
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
