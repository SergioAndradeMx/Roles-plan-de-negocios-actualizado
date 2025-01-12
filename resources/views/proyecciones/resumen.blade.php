<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-600">

    @include('layouts.navigation')

    <div class="text-center text-white my-4 sm:my-6 ml-4 sm:ml-8 md:ml-16 lg:ml-32">
        <h1 class="text-3xl md:text-4xl font-bold mx-auto">Resumen de Sueldos.</h1>
    </div>

    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Barra lateral -->
        <div class="w-full lg:w-1/6  rounded-lg shadow-md bg-gray-900 p-2">
            @include('descripciones.menu')
        </div>

        <div class="container mx-auto my-4 px-4 sm:px-6 lg:px-8">
            <!-- Contenedor de la Tabla y Botones -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Columna 1: Tabla de Totales -->
                <div class="col-span-1">
                    <div class="overflow-x-auto">
                        <table class="w-full bg-gray-800 shadow rounded mb-4 border border-black">
                            <thead>
                                <tr class="border border-black bg-gray-900">
                                    <th class="px-4 py-2 text-left border border-black text-white font-medium">
                                        Descripción
                                    </th>
                                    <th class="px-4 py-2 text-right border border-black text-white font-medium">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b transition bg-gray-600">
                                    <td class="border px-4 py-2 border-black text-white font-medium">Total de Sueldos Mensuales:</td>
                                    <td class="border px-4 py-2 text-right border-black text-white font-medium ">
                                        ${{ number_format($total, 2) }}</td>
                                </tr>
                                <tr class="border-b bg-gray-500 transition  text-white font-medium">
                                    <td class="border px-4 py-2 border-black">Total de Sueldos Anuales:</td>
                                    <td class="border px-4 py-2 text-right border-black text-white font-medium">
                                        ${{ number_format($total * 12, 2) }}</td>
                                </tr>
                                <tr class="border-b transition bg-gray-600">
                                    <td class="border px-4 py-2 border-black text-white font-medium">Total de Sueldos en 5 Años:</td>
                                    <td class="border px-4 py-2 text-right border-black text-white font-medium">
                                        ${{ number_format($total * 12 * 5, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Columna 2: Botón Proyección Anual -->
                <div class="col-span-1 flex justify-center items-center">
                    <a href="{{ route('plan_de_negocio.proyeccionsueldoanual.index', $plan_de_negocio) }}"
                        class=" text-white px-8 py-12 rounded-lg transition border  hover:border-blue-600 w-full text-center text-xl bg-blue-700 border-blue-600 hover:bg-blue-800">
                        Proyección Anual
                    </a>
                </div>

                <!-- Columna 3: Botón Proyección 5 Años -->
                <div class="col-span-1 flex justify-center items-center">
                    <a href="{{ route('plan_de_negocio.proyeccionsueldocincoanios.index', $plan_de_negocio) }}"
                        class=" text-white px-8 py-12 rounded-lg  transition border  hover:border-green-600 w-full text-center text-xl bg-green-700 border-green-600 hover:bg-green-800">
                        Proyección 5 Años
                    </a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
