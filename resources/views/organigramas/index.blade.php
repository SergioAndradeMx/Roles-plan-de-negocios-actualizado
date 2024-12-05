<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama</title>
    <!-- Vincula tu CSS de Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.navigation')

    <!-- Encabezado -->
    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans">Organigrama</h1>
    </div>

    <!-- Contenedor principal -->
    <div class="flex justify-center items-stretch 2xl:px-10  gap-20 xl:mx-2">
        <!-- Barra lateral -->
        <div class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5 p-6  dark:bg-gray-800">
            @include('descripciones.menu')
        </div>
        <!-- Contenido Principal -->
        <div class="w-3/4 ml-6">
            <!-- Cuadro con mensaje -->
            <div class="p-4 border-2 border-dashed border-gray-400 bg-gray-100 mb-4 rounded">
                <p class="text-gray-700">Para crear el Organigrama se enviará a una página externa.</p>
                <a href="https://edit.org/edit" target="_blank"
                    class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Enviar a la
                    página</a>
            </div>

            <!-- Botón para Subir Organigrama -->
            <button class="mb-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700" data-bs-toggle="modal"
                data-bs-target="#uploadModal">Subir Organigrama</button>

            <!-- Tabla de Organigramas -->

            <div class="overflow-x-auto">
                <main class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5 p-6  dark:bg-gray-800">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 text-left">Nombre del Organigrama</th>
                                <th class="px-4 py-2 text-center">Descargar</th>
                                <th class="px-4 py-2 text-center">Editar</th>
                                <th class="px-4 py-2 text-center">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organigramas as $organigrama)
                                <tr class="border-b border-gray-300">
                                    <td class="px-4 py-2">{{ $organigrama->nombre }}</td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('organigramas.download', $organigrama) }}"
                                            class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">Descargar</a>
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('plan_de_negocio.organigramas.edit', [$plan_de_negocio, $organigrama]) }}"
                                            class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Editar</a>

                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <form
                                            action="{{ route('plan_de_negocio.organigramas.destroy', [$plan_de_negocio, $organigrama]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </main>
            </div>

        </div>
    </div>
    </div>

    <!-- Modal para Subir Organigrama -->
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" id="uploadModal"
        style="display: none;">
        <div class="bg-white p-6 rounded shadow-lg">
            <h5 class="text-xl font-semibold mb-4">Subir Organigrama</h5>
            <form action="{{ route('plan_de_negocio.organigramas.store', [$plan_de_negocio]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 mb-2">Nombre del Organigrama</label>
                    <input type="text" class="w-full border border-gray-300 p-2 rounded" id="nombre"
                        name="nombre" required>
                </div>
                <div class="mb-4">
                    <label for="archivo" class="block text-gray-700 mb-2">Archivo</label>
                    <input type="file" class="w-full border border-gray-300 p-2 rounded" id="archivo"
                        name="archivo" required>
                </div>
                <div class="flex justify-between">
                    <button type="button" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600"
                        onclick="document.getElementById('uploadModal').style.display='none'">Cancelar</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Subir</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para abrir y cerrar el modal -->
    <script>
        document.querySelectorAll('[data-bs-toggle="modal"]').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('uploadModal').style.display = 'flex';
            });
        });
    </script>
</body>

</html>
