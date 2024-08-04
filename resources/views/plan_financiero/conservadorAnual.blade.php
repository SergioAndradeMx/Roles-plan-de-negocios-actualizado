<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/proyeccionAnual.js'])
    <title>Proyección anual conservador</title>
</head>

<body>
    @include('layouts.navigation')

    <div>
        <button class="bg-slate-300 text-black hover:bg-green-400 m-2 rounded-sm">
            <a href="{{route('plan_de_negocio.estadisticas.index', $plan_de_negocio)}}" class="flex gap-3 p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                </svg>
                <span class="">Regresar</span>
            </a>
        </button>
    </div>

    <div class="flex items-center flex-col text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans ">Plan financiero</h1>
        <h2>Proyección anual conservador</h2>
    </div>

    <div class="container mx-auto card">
        <h2 class="text-center text-2xl dark:text-white my-5">Proyección anual conservador</h2>
        <hr class="my-2 h-0.5 border-t-0 w-full bg-neutral-100 dark:bg-white m-0 p-0" />
        <div class="px-2 pb-2 mx-2 mb-2 bg-white">
            <h3 class="text-center py-2 2xl:text-2xl text-lg font-normal">Proyección anual conservador</h3>
            <table class="w-full table-auto" id="miTabla" dato='{{ $plan_de_negocio->id }}'>
                <thead>
                    <tr>
                        <td colspan="13" class="text-center bg-fuchsia-300 text-black">
                            Costos fijos
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="border text-right pr-2 border-gray-500 dark:bg-gray-800  text-white" width="15%" colspan="2">Mes 1</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 2</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 3</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 4</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 5</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 6</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 7</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 8</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 9</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 10</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 11</th>
                        <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 12</th>
                    </tr>
                </thead>
                <tbody id="tdbodyFijos">
                    @if (count($costosFijosAgrupados) > 0)
                        {{-- TODO: Aqui va para mostrar la proyeccion anual COSTO FIJO --}}
                        @foreach ($costosFijosAgrupados as $id => $costoFijo)
                            @foreach ($costoFijo as $name => $data)
                                <tr>
                                    <td class="border " data-id="{{ $id }}">{{ $name }}</td>
                                    @foreach ($data as $mes => $value)
                                        <td class="border ">
                                            <input type="text" class="w-full border rounded-sm text-xs text-right px-0"
                                                value="{{ $value }}">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        {{-- TODO: Costos Fijos anuales. --}}
                        @foreach ($costos_fijos as $costo_fijo)
                            <tr>
                                <td class="border" data-id="{{ $costo_fijo->id }}">{{ $costo_fijo->nombre }}
                                </td>
                                @for ($i = 1; $i <= 12; $i++)
                                    <td class="border "><input type="text"
                                            class="w-full border rounded-sm text-xs text-right px-0"
                                            value="{{ $costo_fijo->cantidad }}">
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <thead>
                    {{-- TODO: El total por cada Mes. --}}
                    <tr id="costosFjo">
                        <th class="border text-center text-xs border-gray-500 dark:bg-gray-400  text-black" width="7.5%">
                            Total costos fijos: </th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <td colspan="13" class="text-center bg-orange-300 text-black">
                            Costos variables
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class="border text-right pr-2 border-gray-500 dark:bg-gray-800  text-white" width="15%" colspan="2">Mes 1</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 2</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 3</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 4</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 5</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 6</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 7</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 8</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 9</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 10</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 11</th>
                        <th class="border border-gray-500  dark:bg-gray-800  text-white" width="7.5%">Mes 12</th>
                    </tr>
                </thead>
                <tbody id="tdbodyVariables">
                    @if (count($costosVariablesAgrupados) > 0)
                        {{-- TODO: Aqui va para mostrar la proyeccion anual COSTO VARIABLE --}}
                        @foreach ($costosVariablesAgrupados as $id => $costoFijo)
                            @foreach ($costoFijo as $name => $data)
                                <tr>
                                    <td class="border " data-id="{{ $id }}">{{ $name }}
                                    </td>
                                    @foreach ($data as $mes => $value)
                                        <td class="border ">
                                            <input type="text" class="w-full border rounded-sm text-xs px-0 text-right"
                                                value="{{ $value }}">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        {{-- TODO: Costos Variables anuales. --}}
                        @foreach ($costos_variables as $costos_variable)
                            <tr>
                                <td class="border " data-id="{{ $costos_variable->id }}">
                                    {{ $costos_variable->nombre }}</td>
                                @for ($i = 1; $i <= 12; $i++)
                                    <td class="border "><input type="text"
                                            class="w-full border rounded-sm text-xs px-0 text-right"
                                            value="{{ $costos_variable->escenario_conservador }}">
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <thead>
                    {{-- TODO: El total por cada Mes. --}}
                    <tr id="costosVariable">
                        <th class="border text-center text-xs border-gray-500 dark:bg-gray-400  text-black" width="7.5%">
                            Total costos variables: </th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                        <th class="border text-xs text-right  border-gray-500 dark:bg-gray-400  text-black" width="7.5"></th>
                    </tr>
                    <thead>
                        <tr>
                            <td colspan="13" class="text-center bg-amber-300 text-black">
                                Ingresos
                            </td>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <th class="border text-right pr-2 border-gray-500 dark:bg-gray-800  text-white" width="15%" colspan="2">Mes 1</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 2</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 3</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 4</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 5</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 6</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 7</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 8</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 9</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 10</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 11</th>
                            <th class="border border-gray-500 dark:bg-gray-800  text-white" width="7.5%">Mes 12</th>
                        </tr>
                    </thead>
                <tbody id="tdbodyIngresos">
                    @if (count($ingresos_anual) > 0)
                        {{-- TODO: Aqui va para mostrar la proyeccion anual INGRESOS. --}}
                        @foreach ($ingresos_anual as $id => $ingreso)
                            @foreach ($ingreso as $name => $data)
                                <tr>
                                    <td class="border " data-id="{{ $id }}">{{ $name }}
                                    </td>
                                    @foreach ($data as $mes => $value)
                                        <td class="border ">
                                            <input type="text" class="w-full border rounded-sm text-xs px-0 text-right"
                                                value="{{ $value }}">
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        @endforeach
                    @else
                        {{-- TODO: Ingresos anuales. --}}
                        @foreach ($ingresos as $ingreso)
                            <tr>
                                <td class="border " data-id="{{ $ingreso->id }}">
                                    {{ $ingreso->nombre }}</td>
                                @for ($i = 1; $i <= 12; $i++)
                                    <td class="border "><input type="text"
                                            class="w-full border rounded-sm text-xs px-0 text-right"
                                            value="{{ $ingreso->escenario_conservador }}">
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <thead>
                    {{-- TODO: El total por cada Mes. --}}
                    <tr id="ingresos">
                        <th class="border text-center text-xs border-gray-500 dark:bg-gray-400  text-black" width="7.5%">
                            Total ingresos: </th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-gray-400  text-black" width="7.5%"></th>
                    </tr>
                </thead>
                <thead>
                    {{-- TODO: El total por cada Mes. --}}
                    <tr id="utilidades">
                        <th class="border text-center text-xs border-gray-500 dark:bg-red-300  text-black" width="7.5%">
                            Total utilidades: </th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                        <th class="border text-xs text-right border-gray-500 dark:bg-red-300  text-black" width="7.5%"></th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="flex  justify-center">
            <button id="miBoton"
                class="w-1/2  bg-green-500 hover:bg-green-700 text-white font-bold py-1 mb-5 rounded">
                Guardar cambios
            </button>
        </div>
    </div>
</body>

</html>
