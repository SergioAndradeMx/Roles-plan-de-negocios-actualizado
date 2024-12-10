<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyección a 5 Años</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    @include('layouts.navigation')

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-3xl font-bold mb-6 text-center">Proyección a 5 Años</h1>

        <!-- Contenedor responsivo para la tabla -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="px-4 py-2 text-left font-medium text-gray-700 dark:text-gray-300">Puesto</th>
                        <th class="px-4 py-2 text-center font-medium text-gray-700 dark:text-gray-300">Núm. Trabajadores</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Salario Mensual</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Año 1</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Año 2</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Año 3</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Año 4</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Año 5</th>
                        <th class="px-4 py-2 text-right font-medium text-gray-700 dark:text-gray-300">Total 5 Años</th>
                    </tr>
                </thead>
                <tbody class="dark:bg-gray-800 dark:text-gray-300">
                    @php
                        $totalGlobal = 0;
                    @endphp

                    @foreach($proyeccionCincoAnios as $item)
                        @php
                            $salarioAnual = $item['salario_mensual'] * 12;
                            $totalItem = $salarioAnual * 5;
                            $totalGlobal += $totalItem;
                        @endphp
                        <tr class="border-b hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                            <td class="border px-4 py-2" contenteditable="true">{{ $item['puesto'] }}</td>
                            <td class="border px-4 py-2 text-center" contenteditable="true">{{ number_format($item['numero_trabajadores'], 0) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($item['salario_mensual'], 2) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($salarioAnual, 2) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($salarioAnual, 2) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($salarioAnual, 2) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($salarioAnual, 2) }}</td>
                            <td class="border px-4 py-2 text-right" contenteditable="true">${{ number_format($salarioAnual, 2) }}</td>
                            <td class="border px-4 py-2 text-right font-bold">${{ number_format($totalItem, 2) }}</td>
                        </tr>
                    @endforeach

                    <!-- Fila del Total Global -->
                    <tr class="bg-gray-100 dark:bg-gray-700 font-bold">
                        <td colspan="8" class="border px-4 py-2 text-right">Total General:</td>
                        <td class="border px-4 py-2 text-right">${{ number_format($totalGlobal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button id="guardar-btn" class="bg-blue-500 text-white p-2 rounded mt-4">Guardar Cambios</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const celdasEditables = document.querySelectorAll('td[contenteditable="true"]');
    
            celdasEditables.forEach(celda => {
                if (celda.cellIndex === 2 || celda.cellIndex >= 3) {
                    celda.addEventListener('focus', function () {
                        this.textContent = this.textContent.replace(/[^0-9.-]+/g, "");
                    });
    
                    celda.addEventListener('input', function () {
                        let valor = this.textContent;
                        valor = valor.replace(/[^0-9.]/g, "");
                        const partes = valor.split('.');
                        if (partes.length > 2) {
                            valor = partes[0] + '.' + partes.slice(1).join('');
                        }
                        this.textContent = valor;
                    });
    
                    celda.addEventListener('blur', function () {
                        const valor = parseFloat(this.textContent.replace(/[^0-9.-]+/g, "")) || 0;
                        this.textContent = `$${valor.toFixed(2)}`;
                    });
                } else if (celda.cellIndex === 1) {
                    celda.addEventListener('input', function () {
                        this.textContent = this.textContent.replace(/[^0-9]/g, "");
                    });
                }
            });

            document.getElementById('guardar-btn').addEventListener('click', function () {
                let filas = document.querySelectorAll('table tbody tr');
                let datos = [];
    
                filas.forEach(function (fila) {
                    let puesto = fila.querySelector('td:nth-child(1)').textContent.trim();
                    let numero_trabajadores = fila.querySelector('td:nth-child(2)').textContent.trim();
                    let salario_mensual = fila.querySelector('td:nth-child(3)').textContent.trim().replace(/[^0-9.-]+/g, "");
    
                    datos.push({
                        puesto: puesto,
                        numero_trabajadores: numero_trabajadores,
                        salario_mensual: salario_mensual
                    });
                });
    
                fetch('/proyecciones/actualizar', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ datos: datos })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Datos actualizados correctamente.');
                    } else {
                        alert('Error al guardar los datos.');
                    }
                });
            });
        });
    </script>
</body>
</html>
