<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Proyección de Sueldos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('layouts.navigation')

    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans">Plan</h1>
    </div>
    <div class="flex justify-center items-stretch 2xl:px-10 gap-20 xl:mx-2">
        <!-- Contenedor principal -->
        <div class="container mx-auto max-w-4xl p-6">
            <h1 class="text-3xl font-bold mb-4">Proyección de Sueldos</h1>
    
            <!-- Formulario de Proyecciones -->
            <form action="{{ route('proyecciones.store') }}" method="POST">
                @csrf
                <table class="table-auto w-full bg-white shadow rounded mb-4 overflow-x-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Puesto</th>
                            <th class="px-4 py-2">Número de Trabajadores</th>
                            <th class="px-4 py-2">Salario</th>
                            <th class="px-4 py-2">Total</th>
                            <th class="px-4 py-2">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="proyecciones-body">
                        @foreach ($proyecciones as $proyeccion)
                        <tr data-id="{{ $proyeccion->id }}">
                            <td class="border px-4 py-2">
                                <input type="text" name="puestos[]" value="{{ $proyeccion->puesto }}" class="border w-full px-2" required>
                            </td>
                            <td class="border px-4 py-2">
                                <input type="number" name="numero_trabajadores[]" value="{{ $proyeccion->numero_trabajadores }}" class="border w-full px-2" min="0" oninput="validateInput(this); calculateTotal(this)" required>
                            </td>
                            <td class="border px-4 py-2">
                                <input type="number" name="salario[]" value="{{ $proyeccion->salario }}" class="border w-full px-2" min="0" step="0.01" oninput="validateInput(this); calculateTotal(this)" required>
                            </td>
                            <td class="border px-4 py-2 total-cell">
                                <span>${{ number_format($proyeccion->total, 2) }}</span>
                            </td>
                            <td class="border px-4 py-2 text-center">
                                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="deleteRow(this, {{ $proyeccion->id }})">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Botón para agregar nueva fila -->
                <div class="mb-4 text-center">
                    <button type="button" id="add-row" class="bg-green-500 text-white px-6 py-2 rounded">Agregar Fila</button>
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
                <td class="border px-4 py-2">
                    <input type="text" name="puestos[]" class="border w-full px-2" required>
                </td>
                <td class="border px-4 py-2">
                    <input type="number" name="numero_trabajadores[]" class="border w-full px-2" min="0" oninput="validateInput(this); calculateTotal(this)" required>
                </td>
                <td class="border px-4 py-2">
                    <input type="number" name="salario[]" class="border w-full px-2" min="0" step="0.01" oninput="validateInput(this); calculateTotal(this)" required>
                </td>
                <td class="border px-4 py-2 total-cell">
                    <span>$0.00</span>
                </td>
                <td class="border px-4 py-2 text-center">
                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="removeRow(this)">Eliminar</button>
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
            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
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
                            Swal.fire('Eliminado', 'La proyección ha sido eliminada.', 'success');
                        } else {
                            Swal.fire('Error', 'No se pudo eliminar la fila.', 'error');
                        }
                    });
                }
            });
        }
    </script>
</body>

</html>