<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Barra de navegación -->
    @include('layouts.navigation')
    
    <!-- Encabezado -->
    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans">Descripción de Puesto</h1>
        <h2>Gestión de las unidades administrativas</h2>
    </div>
    
    <!-- Contenedor principal -->
    <div class="flex justify-center items-stretch 2xl:px-10  gap-20 xl:mx-2">
        <!-- Barra lateral -->
        <div class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5 p-6  dark:bg-gray-800">
        @include("descripciones.menu")
    </div>

        <!-- Contenido principal -->
        <main class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5 p-6  dark:bg-gray-800">
            <div class="bg-gray-800 shadow-md rounded-md " >
                <div class="bg-gray-800 text-white px-4 py-3 flex justify-between items-center">
                    <h4 class="text-lg font-semibold">Lista de Descripciones de Puesto</h4>
                    <a href="{{ route('plan_de_negocio.descripciones.create', $plan_de_negocio) }}" 
                    
                       class="bg-green-900 text-white px-3 py-1 rounded-md text-sm hover:bg-green-600">
                       Crear Descripción de Puesto
                    </a>
                </div>
                
                <div class="p-4">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead class="bg-blue-200 text-left">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Nivel Organigrama</th>
                                <th class="border border-gray-300 px-4 py-2">Código</th>
                                <th class="border border-gray-300 px-4 py-2">Unidad Administrativa</th>
                                <th class="border border-gray-300 px-4 py-2">Nombre de Puesto</th>
                                <th class="border border-gray-300 px-4 py-2">Editar</th>
                                <th class="border border-gray-300 px-4 py-2">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($descripciones as $descripcion)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $descripcion->nivel }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $descripcion->codigo }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $descripcion->unidad_administrativa }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $descripcion->nombre_puesto }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('plan_de_negocio.descripciones.edit', [$plan_de_negocio,$descripcion->id]) }}" 
                                       class="bg-orange-500 text-white px-3 py-1 rounded-md text-sm hover:bg-orange-600">
                                       Editar
                                    </a> 
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                  <form action="{{ route('plan_de_negocio.descripciones.destroy', [$plan_de_negocio,$descripcion->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 text-white px-3 py-1 rounded-md text-sm hover:bg-red-600">
                                                Eliminar
                                        </button>
                                    </form> 
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4">No hay descripciones disponibles.</td>
                            </tr>
                            @endforelse 
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
