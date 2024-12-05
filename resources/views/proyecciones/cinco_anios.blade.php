<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyección a 5 Años</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Proyección a 5 Años</h1>

        <!-- Tabla de Proyección a 5 Años -->
        <table class="table-auto w-full bg-white shadow rounded mb-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Puesto</th>
                    <th class="px-4 py-2">Núm. Trabajadores</th>
                    <th class="px-4 py-2">Salario Mensual</th>
                    <th class="px-4 py-2">Salario Anual</th>
                    <th class="px-4 py-2">Total 5 Años</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalGlobal = 0;
                @endphp

                @foreach($proyeccionCincoAnios as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['puesto'] }}</td>
                    <td class="border px-4 py-2">{{ $item['numero_trabajadores'] }}</td>
                    <td class="border px-4 py-2">${{ number_format($item['salario_mensual'], 2) }}</td>
                    <td class="border px-4 py-2">${{ number_format($item['salario_anual'], 2) }}</td>
                    <td class="border px-4 py-2">
                        ${{ number_format($item['total_cinco_anios'], 2) }}
                        @php
                            $totalGlobal += $item['total_cinco_anios'];
                        @endphp
                    </td>
                </tr>
                @endforeach

                <!-- Fila del Total Global -->
                <tr class="bg-gray-100 font-bold">
                    <td colspan="4" class="border px-4 py-2 text-right">Total General:</td>
                    <td class="border px-4 py-2">
                        ${{ number_format($totalGlobal, 2) }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
