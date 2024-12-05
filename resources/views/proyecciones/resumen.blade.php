<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Resumen de Sueldos</h1>

        <!-- Tabla de Totales -->
        <table class="table-auto w-full bg-white shadow rounded mb-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Descripción</th>
                    <th class="px-4 py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">Total de Sueldos Mensuales</td>
                    <td class="border px-4 py-2">${{ number_format($totalSueldoMensual, 2) }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Total de Sueldos Anuales</td>
                    <td class="border px-4 py-2">${{ number_format($totalSueldoAnual, 2) }}</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">Total de Sueldos en 5 Años</td>
                    <td class="border px-4 py-2">${{ number_format($totalSueldoCincoAnios, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Botones de Proyección -->
        <div class="flex justify-between mt-4">
            <a href="{{ route('proyeccion.anual') }}" class="bg-blue-500 text-white px-6 py-3 rounded w-1/3 text-center">Proyección Anual</a>
            <a href="{{ route('proyeccion.cinco-anos') }}" class="bg-green-500 text-white px-6 py-3 rounded w-1/3 text-center">Proyección 5 Años</a>
        </div>
    </div> 
</body>
</html>
