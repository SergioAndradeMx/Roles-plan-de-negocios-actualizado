<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama.</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-600">
    <!-- Barra de Navegación -->
    @include('layouts.navigation')

    <div class="text-center text-black dark:text-white my-4 sm:my-6 ml-4 sm:ml-8 md:ml-16 lg:ml-32">
        <h1 class="text-3xl md:text-4xl font-bold mx-auto">Organigrama</h1>
    </div>
    <!-- Contenedor Principal -->
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Barra Lateral -->
        <div class="w-full lg:w-1/6 bg-slate-500 rounded-lg shadow-md dark:bg-gray-900 p-2">
            @include('descripciones.menu')
        </div>

        <!-- Contenido Principal -->
        <div class="container mx-auto sm:px-6 lg:px-8">
            <main class="w-full bg-slate-500 rounded-lg shadow-md dark:bg-gray-900 p-2">
                <!-- Cuadro con Mensaje -->
                <div class="flex items-center justify-center mb-8">
                    <div
                        class="w-full max-w-screen-md h-auto flex flex-col items-center justify-center border-2 border-dashed border-black bg-sky-300 dark:bg-gray-700 rounded-lg p-6">
                        <p class="text-black dark:text-white text-center px-4 mb-4 font-bold">
                            Para crear el Organigrama se enviará a una página externa.
                        </p>
                        <a href="https://edit.org/edit" target="_blank"
                            class="px-4 py-2 bg-orange-700 text-black dark:text font-bold rounded hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Enviar a la página
                        </a>

                    </div>
                </div>


                <!-- Botón para Subir Organigrama -->
                <div class="mb-4 text-center">
                    <p class="text-lg font-bold text-black dark:text-white mb-2">
                        Solo se aceptan archivos PDF.
                    </p>

                </div>

                <div class="mb-4 flex justify-center">
                    <button
                        class="px-4 py-2 bg-green-600 text-black font-bold dark:text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400"
                        data-bs-toggle="modal" data-bs-target="#uploadModal">
                        Subir Organigrama
                    </button>
                </div>
                <!-- Tabla de Organigramas -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-slate-500 dark:bg-slate-800 text-left">
                            <tr>
                                <th class="px-4 py-2 text-left text-black dark:text-white border border-black">
                                    Nombre del Organigrama
                                </th>
                                <th class="px-4 py-2 text-center text-black dark:text-white border border-black">
                                    Descargar
                                </th>
                                <th class="px-4 py-2 text-center text-black dark:text-white border border-black">
                                    Editar
                                </th>
                                <th class="px-4 py-2 text-center text-black dark:text-white border border-black">
                                    Eliminar
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organigramas as $organigrama)
                                <tr class="odd:bg-slate-100 even:bg-slate-300 dark:odd:bg-gray-600 dark:even:bg-gray-500 text-black dark:text-white">
                                    <td class="px-4 py-2 text-black font-semibold  dark:text-white border border-black">
                                        {{ $organigrama->nombre }}
                                    </td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <a href="{{ route('organigramas.download', $organigrama) }}"
                                            class="px-3 py-1 bg-blue-600 text-black dark:text-white  font-bold rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                            Descargar
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <a href="{{ route('plan_de_negocio.organigramas.edit', [$plan_de_negocio, $organigrama]) }}"
                                            class="px-3 py-1 bg-yellow-600 text-black font-bold dark:text-white rounded hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-300">
                                            Editar
                                        </a>
                                    </td>
                                    <td class="px-4 py-2 text-center border border-black">
                                        <form
                                            action="{{ route('plan_de_negocio.organigramas.destroy', [$plan_de_negocio, $organigrama]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-black font-bold dark:text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400">
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
                <h5 class="text-xl font-semibold mb-4 text-black dark:text-white">Subir Organigrama</h5>
                <form action="{{ route('plan_de_negocio.organigramas.store', [$plan_de_negocio]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="block text-black dark:text-white mb-2">Nombre del
                            Organigrama</label>
                        <input type="text"
                            class="w-full border border-black  p-2 rounded  bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-4">
                        <label for="archivo" class="block text-black dark:text-white mb-2">Archivo</label>
                        <input type="file"
                            class="w-full border border-black  p-2 rounded bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200"
                            id="archivo" name="archivo" required>
                    </div>
                    <div class="flex justify-between">
                        <button type="button"
                            class="px-4 py-2 bg-gray-500 text-black dark:text-white font-bold hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300"
                            onclick="document.getElementById('uploadModal').classList.add('hidden')">Cancelar</button>
                        <button type="submit"
                            class="px-4 py-2 bg-green-700 text-black dark:text-white font-bold hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Subir</button>
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
