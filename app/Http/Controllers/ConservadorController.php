<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan_de_negocio;
use App\Models\EstudioFinanciero;
use App\Models\CostosFijosAnuales;
use App\Models\CostosVariablesAnualesConservador;
use App\Models\IngresosAnualesConservador;

class ConservadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Plan_de_negocio $plan_de_negocio)
    {
        $estudio = EstudioFinanciero::where('plan_de_negocio_id', $plan_de_negocio->id)->first();
        // TODO: Obtengo todos los costosFijosAnuales que pertenecen al estudio financiero correspondiente.
        $costosFijosAnuales = $estudio->costos_fijos_anuales()
            ->orderBy('Id_costo_fijo')
            ->orderBy('mes')
            ->get();

        // TODO: Obtengo los costos variables anuales.
        $costosVariablesAnuales = $estudio->costos_variables_anuales()
            ->orderBy('Id_costo_variable')
            ->orderBy('mes')
            ->get();

        $ingresosAnuales = $estudio->ingresos_anuales()
            ->orderBy('Id_ingresos')
            ->orderBy('mes')
            ->get();

        // TODO: Agrupo todos los costos fijos.
        $costosFijosAgrupados = [];
        foreach ($costosFijosAnuales as $costoFijo) {
            $nombreCostoFijo = $costoFijo->costo_fijo->nombre;
            $id = $costoFijo->costo_fijo->id;
            $mes = $costoFijo->mes;
            $montoConservador = $costoFijo->monto_conservador;
            $costosFijosAgrupados[$id][$nombreCostoFijo][$mes] = $montoConservador;
        }

        // TODO: Organizo los costos Variables.
        $costosVariablesAgrupados = [];
        foreach ($costosVariablesAnuales as $costoVariable) {
            $nombreCostoVariable = $costoVariable->costo_variable->nombre;
            $id = $costoVariable->costo_variable->id;
            $mes = $costoVariable->mes;
            $montoConservador = $costoVariable->monto_conservador;
            $costosVariablesAgrupados[$id][$nombreCostoVariable][$mes] = $montoConservador;
        }


        // TODO: Organizo los ingresos.
        $IngresosAgrupados = [];
        foreach ($ingresosAnuales as $ingreso) {
            $nombreIngreso = $ingreso->ingreso->nombre;
            $id = $ingreso->ingreso->id;
            $mes = $ingreso->mes;
            $montoConservador = $ingreso->monto_conservador;
            $IngresosAgrupados[$id][$nombreIngreso][$mes] = $montoConservador;
        }
        // dd($IngresosAgrupados);
        return view('plan_financiero.conservadorAnual', [
            'plan_de_negocio' => $plan_de_negocio,
            'costos_fijos' => $estudio->costosFijos,
            'costosFijosAgrupados' => $costosFijosAgrupados,
            'costos_variables' => $estudio->costosVariables,
            'costosVariablesAgrupados' => $costosVariablesAgrupados,
            'ingresos' => $estudio->ingresos,
            'ingresos_anual' => $IngresosAgrupados
        ]);
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
        $estudio = EstudioFinanciero::where('plan_de_negocio_id', $plan_de_negocio->id)->first();
        // * Eliminación de costosFijosAnuales
        $estudio->costos_fijos_anuales()->delete();
        // * Eliminación de CostosVariables
        $estudio->costos_variables_anuales()->delete();
        // * Eliminación de Ingresos Anuales
        $estudio->ingresos_anuales()->delete();
        // }
        // Obtiene todos los costos fijos.
        $costos_fijos_anuales = $request->input('costos_Fijos');
        // Obtener todos los costos variables
        $costos_Variables_anuales = $request->input('costos_variables');
        // Obtener todos los Ingresos.
        $ingresos_anuales = $request->input('ingresos');

        // TODO: Inserta datos Costos Fijos
        foreach ($costos_fijos_anuales as $fila) {
            for ($j = 0; $j < count($fila) - 1; $j++) {
                CostosFijosAnuales::create([
                    'Id_estudio_financiero' => $estudio->id,
                    'Id_costo_fijo' => $fila[0],
                    'mes' => ($j + 1),
                    'monto_conservador' => $fila[$j + 1]
                ]);
            }
        }
        // TODO: El insert de costos variables.
        foreach ($costos_Variables_anuales as $fila) {
            for ($i = 0; $i < count($fila) - 1; $i++) {
                CostosVariablesAnualesConservador::create([
                    'Id_estudio_financiero' => $estudio->id,
                    'Id_costo_variable' => $fila[0],
                    'mes' => ($i + 1),
                    'monto_conservador' => $fila[$i + 1]
                ]);
            }
        }
        // TODO: El insert de Ingresos.
        foreach ($ingresos_anuales as $fila) {
            for ($i = 0; $i < count($fila) - 1; $i++) {
                IngresosAnualesConservador::create([
                    'Id_estudio_financiero' => $estudio->id,
                    'Id_ingresos' => $fila[0],
                    'mes' => ($i + 1),
                    'monto_conservador' => $fila[$i + 1]
                ]);
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
