<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/proyecciondesueldo.js'])

</head>

<body class="bg-gray-600">
    @include('layouts.navigation')
    <div class="text-center text-white my-4 sm:my-6 ml-4 sm:ml-8 md:ml-16 lg:ml-32">
        <h1 class="text-3xl md:text-4xl font-bold mx-auto">Proyección de Sueldos.</h1>
    </div>
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Barra lateral -->
        <div class="w-full lg:w-1/6  rounded-lg shadow-md bg-gray-900 p-2">
            @include('descripciones.menu')
        </div>

        <div class="container mx-auto sm:px-6 lg:px-8">

            <div class="overflow-x-auto">
                <table class="w-full bg-gray-900 shadow rounded mb-4 border border-black">
                    <thead>
                        <tr class="bg-gray-900 text-left">
                            <th class="px-4 py-2 text-left border border-black text-white">Puesto</th>
                            <th class="px-4 py-2 text-left border border-black text-white">Número de
                                Trabajadores
                            </th>
                            <th class="px-4 py-2 text-left border border-black text-white">Salario</th>
                            <th class="px-4 py-2 text-left border border-black text-white">Total</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($arraydatos as $value)
                            <tr idactual="{{ $value[4] }}"  class="border  font-semibold odd:bg-gray-600 even:bg-gray-500 text-white">
                                <td valorid="{{ $value[0] }}"
                                class="border border-black px-4 py-2">{{ $value[1] }}
                                </td>
                                <td class="border border-black px-4 py-2">{{ $value[2] }}
                                </td>
                                <td class="border border-black px-4 py-2">
                                    <input type="number" value="{{ $value[3] }}"
                                        class="bg-slate-800 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 w-full">
                                </td>
                                <td class="border px-4 border-black py-2">
                                    {{ sprintf('%.2f', $value[2] * $value[3]) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td id="totaldesueldos" class="text-right text-white font-bold px-4 py-2" colspan="4">
                                Total de Sueldos: {{ number_format($totaldelossueldos, 2, '.', '') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- Botón Guardar -->
            <div class="text-center">
                <button informacion="{{ $haydatosanules }}" ruta="{{ $ruta }}" id="botonguardar" type="button"
                    class="bg-green-800 font-bold hover:bg-green-600 text-white px-6 py-2 rounded w-full sm:w-auto">
                    Guardar
                </button>
            </div>
        </div>
</body>

</html>