<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-white">

    @include('layouts.navigation')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Resumen de Sueldos</h1>

        <!-- Contenedor de la Tabla y Botones en un grid de 3 columnas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Columna 1: Tabla de Totales -->
            <div class="col-span-1">
                <div class="overflow-x-auto">
                    <table
                        class="min-w-full bg-white shadow-lg rounded-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 border-b dark:bg-gray-700 dark:border-gray-600">
                                <th class="px-4 py-2 text-left text-gray-700 font-medium dark:text-gray-300">Descripción
                                </th>
                                <th class="px-4 py-2 text-left text-gray-700 font-medium dark:text-gray-300">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b hover:bg-gray-50 transition dark:hover:bg-gray-600">
                                <td class="border px-4 py-2 dark:border-gray-700">Total de Sueldos Mensuales</td>
                                <td class="border px-4 py-2 text-right dark:border-gray-700">
                                    ${{ number_format($total, 2) }}</td>
                            </tr>
                            <tr class="border-b hover:bg-gray-50 transition dark:hover:bg-gray-600">
                                <td class="border px-4 py-2 dark:border-gray-700">Total de Sueldos Anuales</td>
                                <td class="border px-4 py-2 text-right dark:border-gray-700">
                                    ${{ number_format($total * 12, 2) }}</td>
                            </tr>
                            <tr class="border-b hover:bg-gray-50 transition dark:hover:bg-gray-600">
                                <td class="border px-4 py-2 dark:border-gray-700">Total de Sueldos en 5 Años</td>
                                <td class="border px-4 py-2 text-right dark:border-gray-700">
                                    ${{ number_format(($total*12)*5, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Columna 2: Botón Proyección Anual -->
            <!-- Columna 2: Botón Proyección Anual -->
            <!-- Columna 2: Botón Proyección Anual -->
            <div class="col-span-1 flex justify-center items-center">
                <a href="{{route('plan_de_negocio.proyeccionsueldoanual.index', $plan_de_negocio)}}"
                    class="bg-blue-500 text-white px-8 py-12 rounded-lg hover:bg-blue-600 transition border border-blue-500 hover:border-blue-600 w-full text-center text-xl dark:bg-blue-700 dark:border-blue-600 dark:hover:bg-blue-800">Proyección
                    Anual</a>
            </div>

            <!-- Columna 3: Botón Proyección 5 Años -->
            <div class="col-span-1 flex justify-center items-center">
                <a 
                    class="bg-green-500 text-white px-8 py-12 rounded-lg hover:bg-green-600 transition border border-green-500 hover:border-green-600 w-full text-center text-xl dark:bg-green-700 dark:border-green-600 dark:hover:bg-green-800">Proyección
                    5 Años</a>
            </div>


        </div>
    </div>
</body>

</html>
