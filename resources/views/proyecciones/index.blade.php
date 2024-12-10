<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300">
    @include('layouts.navigation')
    <div class="text-center text-black dark:text-white my-4 sm:my-6">
        <h1 class="text-4xl font-semibold antialiased">Proyección de Sueldos</h1> 
    </div>

    <div class="container mx-auto my-4 px-4 sm:px-6 lg:px-8">
        <!-- Formulario de Proyecciones -->
        <form action="{{ route('proyecciones.store') }}" method="POST">
            @csrf
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded mb-4 border border-black dark:border-gray-600">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 border border-black dark:border-gray-600">
                            <th class="px-4 py-2 text-left border border-black dark:border-gray-600">Puesto</th>
                            <th class="px-4 py-2 text-left border border-black dark:border-gray-600">Número de Trabajadores</th>
                            <th class="px-4 py-2 text-left border border-black dark:border-gray-600">Salario</th>
                            <th class="px-4 py-2 text-left border border-black dark:border-gray-600">Total</th>
                            <th class="px-4 py-2 text-center border border-black dark:border-gray-600">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="proyecciones-body">
                        @foreach ($proyecciones as $proyeccion)
                        <tr data-id="{{ $proyeccion->id }}" class="border border-black dark:border-gray-600">
                            <td class="border px-4 py-2 border-black dark:border-gray-600">
                                <input type="text" name="puestos[]" value="{{ $proyeccion->puesto }}" class="border w-full px-2 dark:bg-gray-700 dark:text-white" required>
                            </td>
                            <td class="border px-4 py-2 border-black dark:border-gray-600">
                                <input type="number" name="numero_trabajadores[]" value="{{ $proyeccion->numero_trabajadores }}" class="border w-full px-2 dark:bg-gray-700 dark:text-white" min="0" oninput="validateInput(this); calculateTotal(this)" required>
                            </td>
                            <td class="border px-4 py-2 border-black dark:border-gray-600">
                                <input type="number" name="salario[]" value="{{ $proyeccion->salario }}" class="border w-full px-2 dark:bg-gray-700 dark:text-white" min="0" step="0.01" oninput="validateInput(this); calculateTotal(this)" required>
                            </td>
                            <td class="border px-4 py-2 total-cell border-black dark:border-gray-600">
                                <span>${{ number_format($proyeccion->total, 2) }}</span>
                            </td>
                            <td class="border px-4 py-2 text-center border-black dark:border-gray-600">
                                <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="deleteRow(this, {{ $proyeccion->id }})">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Botón para agregar nueva fila -->
            <div class="mb-4 text-center">
                <button type="button" id="add-row" class="bg-green-500 text-white px-4 py-2 rounded">Agregar Fila</button>
            </div>

            <!-- Total de Sueldos -->
            <div class="text-right mb-4">
                <strong>Total de Sueldos: <span id="grand-total">${{ number_format($totalSueldos, 2) }}</span></strong>
            </div>

            <!-- Botón Guardar -->
            <div class="text-center">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>

    <!-- Script para agregar nuevas filas, validar y calcular totales -->
    <script>
        function validateInput(input) {
            if (input.value < 0) {
                input.classList.add('border-red-500');
                alert('El valor no puede ser negativo');
                input.value = '';
            } else {
                input.classList.remove('border-red-500');
            }
        }

        function calculateTotal(element) {
            const row = element.closest('tr');
            const numeroTrabajadores = parseFloat(row.querySelector('input[name="numero_trabajadores[]"]').value) || 0;
            const salario = parseFloat(row.querySelector('input[name="salario[]"]').value) || 0;
            const totalCell = row.querySelector('.total-cell span');
            const total = numeroTrabajadores * salario;
            totalCell.textContent = `$${total.toFixed(2)}`;
            calculateGrandTotal();
        }

        function calculateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.total-cell span').forEach(cell => {
                grandTotal += parseFloat(cell.textContent.replace('$', '')) || 0;
            });
            document.getElementById('grand-total').textContent = `$${grandTotal.toFixed(2)}`;
        }

        document.getElementById('add-row').addEventListener('click', function() {
            const tbody = document.getElementById('proyecciones-body');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="border px-4 py-2 dark:border-gray-600">
                    <input type="text" name="puestos[]" class="border w-full px-2 dark:bg-gray-700 dark:text-white" required>
                </td>
                <td class="border px-4 py-2 dark:border-gray-600">
                    <input type="number" name="numero_trabajadores[]" class="border w-full px-2 dark:bg-gray-700 dark:text-white" min="0" oninput="validateInput(this); calculateTotal(this)" required>
                </td>
                <td class="border px-4 py-2 dark:border-gray-600">
                    <input type="number" name="salario[]" class="border w-full px-2 dark:bg-gray-700 dark:text-white" min="0" step="0.01" oninput="validateInput(this); calculateTotal(this)" required>
                </td>
                <td class="border px-4 py-2 total-cell dark:border-gray-600">
                    <span>$0.00</span>
                </td>
                <td class="border px-4 py-2 text-center dark:border-gray-600">
                    <button type="button" class="bg-red-500 text-white px-3 py-1 rounded" onclick="removeRow(this)">Eliminar</button>
                </td>
            `;
            tbody.appendChild(newRow);
            newRow.querySelector('input[name="puestos[]"]').focus();
        });

        function removeRow(button) {
            const row = button.closest('tr');
            row.remove();
            calculateGrandTotal();
        }

        function deleteRow(button, id) {
            if (confirm('¿Estás seguro de eliminar esta proyección?')) {
                fetch(`/proyecciones/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                }).then(response => {
                    if (response.ok) {
                        const row = button.closest('tr');
                        row.remove();
                        calculateGrandTotal();
                        alert('La proyección ha sido eliminada.');
                    } else {
                        alert('Error: No se pudo eliminar la proyección.');
                    }
                });
            }
        }
    </script>
</body>

</html>
