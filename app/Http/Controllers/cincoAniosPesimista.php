<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\CostoFijo;
use Illuminate\Http\Request;
use App\Models\CostosVariable;
use App\Models\Plan_de_negocio;
use App\Models\EstudioFinanciero;
use App\Models\costosFijosCincoAnios;
use App\Models\costosVariablesCincoAniosPesimistas;
use App\Models\ingresosCincoAniosPesimista;

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
        $arrayCincoFijos = [];
        $arrayAnualFijos = [];
        $arrayVariables = [];
        $arrayIngresos = [];
        $montoTotal = 0;
        $titulo = "Proyección cinco años Pesimista";

        $url = route('plan_de_negocio.proyeccionPesimistaCincoAnios.store', $plan_de_negocio);

        if (count($estudio->fijos_cincoAnios) > 0) {
            // TODO: Estructurando los datos fijos
            $fijosOrdenados = $estudio->fijos_cincoAnios()->orderBy('Id_costo_fijo')->orderBy('anio')->get();

            foreach ($fijosOrdenados as $value) {
                $fijo = CostoFijo::find($value->Id_costo_fijo);
                $arrayCincoFijos[$value->Id_costo_fijo][$fijo->nombre][$value->anio] = [$value->id, $value->monto_conservador];
            }
        } else {
            // * Obtengo los costos Fijos.
            $costosFijosAnuales = $estudio->costos_fijos_anuales()
                ->orderBy('Id_costo_fijo')
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
        }

        // * Condición que valida que existan ingresos, costos variables e fijos de cinco años.
        if (count($estudio->variables_pesimista_cincoAnios) > 0 && count($estudio->ingresos_pesimista_cincoAnios) > 0) {
            // TODO: Estructurando los datos variables
            $variablesOrdenados = $estudio->variables_pesimista_cincoAnios()->orderBy('Id_costo_variable')->orderBy('anio')->get();
            foreach ($variablesOrdenados as  $value) {
                $variable = CostosVariable::find($value->Id_costo_variable);
                $arrayVariables[$value->Id_costo_variable][$variable->nombre][$value->anio] = [$value->id, $value->monto_pesimista];
            }

            // TODO: Estructurando los datos ingresos
            $ingresosOrdenados = $estudio->ingresos_pesimista_cincoAnios()->orderBy('Id_ingresos')->orderBy('anio')->get();
            foreach ($ingresosOrdenados as  $value) {
                $ingreso = Ingreso::find($value->Id_ingresos);
                $arrayIngreso[$value->Id_ingresos][$ingreso->nombre][$value->anio] = [$value->id, $value->monto_pesimista];
            }

            // * Envía a la vista
            return view('plan_financiero.proyeccionCincoAnios', [
                'arrayFijo' => $arrayAnualFijos,
                'arrayVariable' => [],
                'arrayIngresos' => [],
                'costosFijos' => $arrayCincoFijos,
                'costosVariables' => $arrayVariables,
                'ingresos' => $arrayIngreso,
                'plan_de_negocio' => $plan_de_negocio,
                'ruta' => $url,
                'titulo' => $titulo
            ]);
            // Validamos que existan ingresos, costos fijos y variables anuales para que se agregue.
        } else if ((count($estudio->ingresos_pesimistas) > 0) && (count($estudio->variables_pesimistas) > 0) && (count($estudio->costos_fijos_anuales)) > 0) {
            // TODO: Pedir los datos ordenados.
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
            return view('plan_financiero.proyeccionCincoAnios', [
                'arrayFijo' => $arrayAnualFijos,
                'arrayVariable' => [],
                'arrayIngresos' => [],
                'costosFijos' => $arrayCincoFijos,
                'costosVariables' => $arrayVariables,
                'ingresos' => $arrayIngresos,
                'plan_de_negocio' => $plan_de_negocio,
                'ruta' => $url,
                'titulo' => $titulo
            ]);
        } else {
            return back()->with('mensaje', 'Ingrese primero los pesimistas anuales');
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
    public function store(Request $request, Plan_de_negocio $plan_de_negocio)
    {
        // Busco el estudio.
        $estudio = EstudioFinanciero::where('plan_de_negocio_id', $plan_de_negocio->id)->first();
        $estructuraConvertida = json_decode($request->getContent(), true);
        $costosFijos = $estructuraConvertida[0];
        $costosVariables = $estructuraConvertida[1];
        $ingresos = $estructuraConvertida[2];

        // TODO: Almacenando o actualizando los costos fijos
        foreach ($costosFijos as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                costosFijosCincoAnios::updateOrCreate(
                    ['id' => $value[$i][0]],
                    [
                        'Id_estudio_financiero' => $estudio->id,
                        'Id_costo_fijo' => $key,
                        'anio' => $i + 1,
                        'monto_conservador' => $value[$i][1]
                    ]
                );
            }
        }

        // TODO: Almacenamos o actualizamos los costos variables pesimistas
        foreach ($costosVariables as $key => $value) {
            for ($i = 0; $i < count($value); $i++) {
                costosVariablesCincoAniosPesimistas::updateOrCreate(
                    ['id' => $value[$i][0]],
                    [
                        'Id_estudio_financiero' => $estudio->id,
                        'Id_costo_variable' => $key,
                        'anio' => $i + 1,
                        'monto_pesimista' => $value[$i][1]
                    ]
                );
            }

            // TODO: Almacenamos o actualizamos los ingresos
            foreach ($ingresos as $key => $value) {
                for ($i = 0; $i < count($value); $i++) {
                    ingresosCincoAniosPesimista::updateOrCreate(
                        ['id' => $value[$i][0]],
                        [
                            'Id_estudio_financiero' => $estudio->id,
                            'Id_ingresos' => $key,
                            'anio' => $i + 1,
                            'monto_pesimista' => $value[$i][1]
                        ]
                    );
                }
            }
        }
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
