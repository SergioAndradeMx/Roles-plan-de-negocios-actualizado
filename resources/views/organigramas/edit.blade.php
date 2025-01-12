<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organigrama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-600">
    <!-- Barra de navegación -->
    @include('layouts.navigation')

    <div class="text-center text-white my-4 sm:my-6 ml-4 sm:ml-8 md:ml-16 lg:ml-32">
        <h1 class="text-3xl md:text-4xl font-bold mx-auto">Editar Organigram.</h1>
    </div>

    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Barra Lateral -->
        <div class="w-full lg:w-1/6  rounded-lg shadow-md bg-gray-900 p-2">
            @include('descripciones.menu')
        </div>
        <!-- Contenido Principal -->
        <div class="container mx-auto sm:px-6 lg:px-8">
            <main class="w-full rounded-lg shadow-md bg-gray-900 p-2">
                <form
                    action="{{ route('plan_de_negocio.organigramas.update', ['plan_de_negocio' => $plan_de_negocio, 'organigrama' => $organigrama]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nombre del Organigrama -->
                    <div class="mb-6">
                        <label for="nombre" class="block text-sm  text-white font-bold mb-2">Nombre del
                            Organigrama</label>
                        <input type="text" id="nombre" name="nombre"
                            value="{{ old('nombre', $organigrama->nombre) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <!-- Archivo del Organigrama -->
                    <div class="mb-6">
                        <label for="archivo" class="block text-sm  text-white font-bold mb-2">Archivo
                            (opcional)</label>
                        <input type="file" id="archivo" name="archivo"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 bg-white placeholder-gray-400">
                        <p class="mt-2 text-sm  text-white font-bold ">Deja en blanco si no deseas cambiar el archivo.
                        </p>
                    </div>
                    <!-- Botones -->
                    <div class="flex justify-center flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700  text-white font-bold  py-2 px-4 rounded-lg shadow">
                            Actualizar Organigrama
                        </button>
                        <a href="{{ route('plan_de_negocio.organigramas.index', $plan_de_negocio) }}"
                            class="w-full sm:w-auto bg-gray-600 hover:bg-gray-700  text-white font-bold py-2 px-4 rounded-lg shadow text-center">
                            Cancelar
                        </a>
                    </div>
                </form>
            </main>
        </div>
    </div>

</body>

</html>
