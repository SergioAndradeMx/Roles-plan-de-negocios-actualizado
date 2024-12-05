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

        <!-- Mensajes de éxito -->
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla de Proyección Anual -->
        <table class="table-auto w-full bg-white shadow rounded mb-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Puesto</th>
                    <th class="px-4 py-2">Núm. Trabajadores</th>
                    <th class="px-4 py-2">Salario Mensual</th>
                    <th class="px-4 py-2">Salario Anual</th>
                    <th class="px-4 py-2">Total Anual</th>
                    <th class="px-4 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proyeccionAnual as $item)
                <tr>
                    <form action="{{ route('proyeccion.update', $item['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td class="border px-4 py-2">{{ $item['puesto'] }}</td>
                        <td class="border px-4 py-2">
                            <input type="number" name="numero_trabajadores" value="{{ $item['numero_trabajadores'] }}" class="w-full p-2 border rounded">
                        </td>
                        <td class="border px-4 py-2">
                            <input type="number" step="0.01" name="salario" value="{{ $item['salario_mensual'] }}" class="w-full p-2 border rounded">
                        </td>
                        <td class="border px-4 py-2">${{ number_format($item['salario_anual'], 2) }}</td>
                        <td class="border px-4 py-2">${{ number_format($item['total_anual'], 2) }}</td>
                        <td class="border px-4 py-2">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Guardar
                            </button>
                        </td>
                    </form>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="bg-gray-100 font-bold">
                    <td colspan="4" class="px-4 py-2 text-right">Total General:</td>
                    <td class="px-4 py-2">${{ number_format($totalGeneral, 2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
