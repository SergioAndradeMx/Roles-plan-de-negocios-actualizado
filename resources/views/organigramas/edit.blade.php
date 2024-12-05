<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organigrama</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navigation')
    <div class="container mx-auto mt-8">
        <div class="text-center text-black my-2 sm:my-4">
            <h1 class="text-4xl antialiased font-sans">Editar Organigrama</h1>
        </div>
        <div class="flex justify-center items-stretch 2xl:px-10 gap-20 xl:mx-2">
            <!-- Barra lateral -->
            <div class="relative rounded-lg border-none card h-full bg-white 2xl:p-5 p-6 dark:bg-gray-800">
                @include('descripciones.menu')
            </div>
            <!-- Contenido principal -->
            <div class="w-3/4 ml-6">
                <div class="bg-slate-800 shadow rounded-lg p-6">
                    <!-- Formulario para editar organigrama -->
                    <form action="{{ route('plan_de_negocio.organigramas.update', ['plan_de_negocio' => $plan_de_negocio, 'organigrama' => $organigrama]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Usamos PUT para la actualización -->

                        <!-- Campo para nombre del organigrama -->
                        <div class="mb-4">
                            <label for="nombre" class="block text-sm font-medium text-gray-50 mb-2">Nombre del Organigrama</label>
                            <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $organigrama->nombre) }}" class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <div class="mb-4">
                            <label for="archivo" class="block text-sm font-medium text-gray-50 mb-2">Archivo (opcional)</label>
                            <input type="file" id="archivo" name="archivo" class="block w-full text-gray-50 border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <p class="mt-2 text-sm text-gray-50">Deja en blanco si no deseas cambiar el archivo.</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Actualizar Organigrama</button>
                            <a href="{{ route('plan_de_negocio.organigramas.index', $plan_de_negocio) }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

