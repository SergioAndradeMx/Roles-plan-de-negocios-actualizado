<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyección Anual</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Proyección Anual</h1>
 <!-- Barra lateral -->
 <div class="w-full lg:w-1/4 bg-white rounded-lg shadow-md dark:bg-gray-800 p-4">
    @include('descripciones.menu')
</div>
        <!-- Tabla de Proyección Anual -->
        <table class="table-auto w-full bg-white shadow rounded mb-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Puesto</th>
                    <th class="px-4 py-2">Núm. Trabajadores</th>
                    <th class="px-4 py-2">Salario Mensual</th>
                    <th class="px-4 py-2">Salario Anual</th>
                    <th class="px-4 py-2">Total Anual</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalAnualGlobal = 0;
                @endphp

                {{-- @foreach($proyeccionAnual as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['puesto'] }}</td>
                    <td class="border px-4 py-2">{{ $item['numero_trabajadores'] }}</td>
                    <td class="border px-4 py-2">${{ number_format($item['salario_mensual'], 2) }}</td>
                    <td class="border px-4 py-2">${{ number_format($item['salario_anual'], 2) }}</td>
                    <td class="border px-4 py-2">
                        ${{ number_format($item['total_anual'], 2) }}
                        @php
                            $totalAnualGlobal += $item['total_anual'];
                        @endphp
                    </td>
                </tr>
                @endforeach --}}

                <!-- Fila del Total Anual Global -->
                <tr class="bg-gray-100 font-bold">
                    <td colspan="4" class="border px-4 py-2 text-right">Total General Anual:</td>
                    <td class="border px-4 py-2">
                        {{-- ${{ number_format($totalAnualGlobal, 2) }} --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
