<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-600">
    <!-- Barra de navegación -->
    @include('layouts.navigation')

    <!-- Encabezado -->
    <div class="text-center text-black dark:text-white my-4 sm:my-6">
        <h1 class="text-4xl font-semibold antialiased">Descripción de Puesto</h1>
        <h2 class="text-lg text-black dark:text-white">Gestión de las unidades administrativas</h2>
    </div>

    <!-- Contenedor principal -->
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Barra lateral -->
        <div class="w-full lg:w-1/6 bg-slate-500 rounded-lg shadow-md dark:bg-gray-900 p-2">
            @include('descripciones.menu')
        </div>

        <!-- Contenido principal -->
        <div class="container mx-auto sm:px-6 lg:px-8">
            <main class="w-full bg-slate-500 rounded-lg shadow-md dark:bg-gray-900 p-2">
                <div
                    class="bg-gray-400 p-4 rounded-md shadow-md mb-4 flex justify-between items-center text-black dark:text-white dark:bg-gray-800 border border-black">
                    <h3 class="text-lg font-bold">Lista de Descripciones de Puesto.</h3>
                    <a href="{{ route('plan_de_negocio.descripciones.create', $plan_de_negocio) }}"
                        class="bg-green-700 px-3 py-2 rounded-md text-sm font-bold hover:bg-green-500 transition text-black dark:text-white">
                        Crear Descripción de Puesto
                    </a>

                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full border-collapse">
                        <thead class="bg-slate-500 dark:bg-slate-800 text-left">
                            <tr>
                                <th class="px-4 py-2 border border-black  text-black dark:text-white">
                                    Nivel Organigrama.</th>
                                <th class="px-4 py-2 border border-black  text-black dark:text-white">
                                    Código.</th>
                                <th class="px-4 py-2 border border-black  text-black dark:text-white">
                                    Unidad Administrativa.
                                </th>
                                <th class="px-4 py-2 border border-black  text-black dark:text-white">
                                    Nombre de Puesto.</th>
                                <th class="px-4 py-2 border border-black text-black dark:text-white"
                                    style="text-align: center; vertical-align: middle;">
                                    Editar.
                                </th>
                                <th class="px-4 py-2 border border-black  text-black dark:text-white"
                                    style="text-align: center; vertical-align: middle;">
                                    Eliminar.
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @forelse($descripciones as $descripcion)
                                <tr
                                    class="odd:bg-slate-100 even:bg-slate-300 dark:odd:bg-gray-600 dark:even:bg-gray-500 text-black dark:text-white">
                                    <td class="px-4 py-2 border border-black font-semibold">
                                        {{ $descripcion->nivel }}
                                    </td>
                                    <td class="px-4 py-2 border border-black font-semibold">
                                        {{ $descripcion->codigo }}
                                    </td>
                                    <td class="px-4 py-2 border border-black  font-semibold">
                                        {{ $descripcion->unidad_administrativa }}
                                    </td>
                                    <td class="px-4 py-2 border border-black  font-semibold">
                                        {{ $descripcion->nombre_puesto }}
                                    </td>
                                    <td class="px-4 py-2 border border-black "
                                        style="text-align: center; vertical-align: middle;">
                                        <a href="{{ route('plan_de_negocio.descripciones.edit', [$plan_de_negocio, $descripcion->id]) }}"
                                            class="bg-orange-700 text-black dark:text-white px-3 py-1 rounded-md text-sm font-bold hover:bg-orange-500 transition">
                                            Editar
                                        </a>

                                    </td>
                                    <td class="px-4 py-2 border border-black"
                                        style="text-align: center; vertical-align: middle;">
                                        <form
                                            action="{{ route('plan_de_negocio.descripciones.destroy', [$plan_de_negocio, $descripcion->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-700 text-black dark:text-white px-3 py-1 rounded-md text-sm font-bold hover:bg-red-500 transition">
                                                Eliminar
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-gray-500 py-4">No hay descripciones
                                        disponibles.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
