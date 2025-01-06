<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama.</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Barra de Navegación -->
    @include('layouts.navigation')


    <div class="text-center text-black dark:text-white my-4 sm:my-6">
        <h1 class="text-3xl md:text-4xl font-bold">Organigrama</h1>
    </div>

    <!-- Contenedor Principal -->
    <div class="flex flex-col xl:flex-row justify-center items-stretch gap-6 xl:px-4 mt-10">
        <!-- Barra Lateral -->
        <aside class="w-full xl:w-1/4 rounded-lg p-6">
            @include('descripciones.menu')
        </aside>

        <!-- Contenido Principal -->
        <main class="w-full xl:w-3/4 rounded-lg p-6">
            <!-- Cuadro con Mensaje -->
            <div class="flex items-center justify-center mb-8">
                <div class="w-full max-w-screen-md h-auto flex flex-col items-center justify-center border-2 border-dashed border-gray-400 bg-gray-100 dark:bg-gray-700 rounded-lg p-6">
                    <p class="text-gray-700 dark:text-gray-300 text-center px-4 mb-4">
                        Para crear el Organigrama se enviará a una página externa.
                    </p>
                    <a href="https://edit.org/edit" target="_blank"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Enviar a la página
                    </a>
                </div>
            </div>
            

            <!-- Botón para Subir Organigrama -->
            <div class="mb-4 flex justify-end">
                <button
                    class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                    data-bs-toggle="modal" data-bs-target="#uploadModal">
                    Subir Organigrama
                </button>
            </div>

            <!-- Tabla de Organigramas -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-left text-gray-700 dark:text-gray-300">Nombre del Organigrama</th>
                            <th class="px-4 py-2 text-center text-gray-700 dark:text-gray-300">Descargar</th>
                            <th class="px-4 py-2 text-center text-gray-700 dark:text-gray-300">Editar</th>
                            <th class="px-4 py-2 text-center text-gray-700 dark:text-gray-300">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organigramas as $organigrama)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-2 text-gray-900 dark:text-gray-200">{{ $organigrama->nombre }}</td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('organigramas.download', $organigrama) }}"
                                        class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        Descargar
                                    </a>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <a href="{{ route('plan_de_negocio.organigramas.edit', [$plan_de_negocio, $organigrama]) }}"
                                        class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                        Editar
                                    </a>
                                </td>
                                <td class="px-4 py-2 text-center">
                                    <form
                                        action="{{ route('plan_de_negocio.organigramas.destroy', [$plan_de_negocio, $organigrama]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Modal para Subir Organigrama -->
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50 hidden" id="uploadModal">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow-lg max-w-md w-full">
            <h5 class="text-xl font-semibold mb-4 text-gray-900 dark:text-white">Subir Organigrama</h5>
            <form action="{{ route('plan_de_negocio.organigramas.store', [$plan_de_negocio]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 dark:text-gray-300 mb-2">Nombre del
                        Organigrama</label>
                    <input type="text"
                        class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        id="nombre" name="nombre" required>
                </div>
                <div class="mb-4">
                    <label for="archivo" class="block text-gray-700 dark:text-gray-300 mb-2">Archivo</label>
                    <input type="file"
                        class="w-full border border-gray-300 dark:border-gray-600 p-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                        id="archivo" name="archivo" required>
                </div>
                <div class="flex justify-between">
                    <button type="button"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300"
                        onclick="document.getElementById('uploadModal').classList.add('hidden')">Cancelar</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">Subir</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para abrir y cerrar el modal -->
    <script>
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('uploadModal').classList.remove('hidden');
            });
        });
    </script>
</body>

</html>
