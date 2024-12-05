<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body >
 <!-- Barra de navegación -->
    @include('layouts.navigation')
 <!-- Encabezado -->
    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans">Editar Descripción de Puesto</h1>
    </div>
  <!-- Contenedor principal -->
    <div class="flex justify-center items-stretch 2xl:px-10  gap-20 xl:mx-2">
     <!-- Barra lateral -->
        <div class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5 p-6  dark:bg-gray-800">
        @include("descripciones.menu")
    </div>

        <!-- Contenido principal -->
        <main class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5   dark:bg-gray-800 flex-1 p-8"> 
            <!-- Formulario -->
            <form action="{{ route('plan_de_negocio.descripciones.update', [$plan_de_negocio, $descripcion]) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div>
                    <label for="nivel" class="block text-gray-50 font-semibold mb-1">Nivel Organigrama</label>
                    <select class="w-full border-gray-300 rounded-md shadow-sm" name="nivel" id="nivel" required>
                        <option value="Estratégico" {{ $descripcion->nivel == 'Estratégico' ? 'selected' : '' }}>Estratégico</option>
                        <option value="Táctico" {{ $descripcion->nivel == 'Táctico' ? 'selected' : '' }}>Táctico</option>
                        <option value="Operativo" {{ $descripcion->nivel == 'Operativo' ? 'selected' : '' }}>Operativo</option>
                    </select>
                </div>
                
                <div>
                    <label for="codigo" class="block text-gray-50 font-semibold mb-1">Código</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="codigo" id="codigo" value="{{ $descripcion->codigo }}">
                </div>

                <div>
                    <label for="unidad_administrativa" class="block text-gray-50 font-semibold mb-1">Unidad Administrativa</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="unidad_administrativa" id="unidad_administrativa" value="{{ $descripcion->unidad_administrativa }}" required>
                </div>

                <div>
                    <label for="nombre_puesto" class="block text-gray-50 font-semibold mb-1">Nombre de Puesto</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="nombre_puesto" id="nombre_puesto" value="{{ $descripcion->nombre_puesto }}" required>
                </div>

                <div>
                    <label for="descripcion_generica" class="block text-gray-50 font-semibold mb-1">Descripción Genérica</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="descripcion_generica" id="descripcion_generica" rows="3" required>{{ $descripcion->descripcion_generica }}</textarea>
                </div>

                <div>
                    <label for="descripcion_especifica" class="block text-gray-50 font-semibold mb-1">Descripción Específica</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="descripcion_especifica" id="descripcion_especifica" rows="3" required>{{ $descripcion->descripcion_especifica }}</textarea>
                </div>

                <div>
                    <label for="objetivos_puesto" class="block text-gray-50 font-semibold mb-1">Objetivos del Puesto</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="objetivos_puesto" id="objetivos_puesto" rows="3" required>{{ $descripcion->objetivos_puesto }}</textarea>
                </div>

                <div>
                    <label for="salario_minimo" class="block text-gray-50 font-semibold mb-1">Salario Mínimo</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="salario_minimo" id="salario_minimo" value="{{ $descripcion->salario_minimo }}" required>
                </div>

                <div>
                    <label for="salario_maximo" class="block text-gray-50 font-semibold mb-1">Salario Máximo</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="salario_maximo" id="salario_maximo" value="{{ $descripcion->salario_maximo }}" required>
                </div>

                <div>
                    <label for="jornada_laboral" class="block text-gray-50 font-semibold mb-1">Jornada Laboral</label>
                    <select class="w-full border-gray-300 rounded-md shadow-sm" name="jornada_laboral" id="jornada_laboral" required>
                        <option value="Normal" {{ $descripcion->jornada_laboral == 'Normal' ? 'selected' : '' }}>Normal</option>
                        <option value="Inglesa" {{ $descripcion->jornada_laboral == 'Inglesa' ? 'selected' : '' }}>Inglesa</option>
                    </select>
                </div>

                <div>
                    <label for="numero_plaza" class="block text-gray-50 font-semibold mb-1">Número de Plaza</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="numero_plaza" id="numero_plaza" value="{{ $descripcion->numero_plaza }}" required>
                </div>

                <div>
                    <label for="reporta_a" class="block text-gray-50 font-semibold mb-1">Reporta a</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="reporta_a" id="reporta_a" value="{{ $descripcion->reporta_a }}">
                </div>

                <div>
                    <label for="supervisa_a" class="block text-gray-50 font-semibold mb-1">Supervisa a</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="supervisa_a" id="supervisa_a" value="{{ $descripcion->supervisa_a }}">
                </div>

                <div>
                    <label for="comunicacion_interna" class="block text-gray-50 font-semibold mb-1">Comunicación Interna</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="comunicacion_interna" id="comunicacion_interna" value="{{ $descripcion->comunicacion_interna }}">
                </div>

                <div>
                    <label for="comunicacion_externa" class="block text-gray-50 font-semibold mb-1">Comunicación Externa</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="comunicacion_externa" id="comunicacion_externa" value="{{ $descripcion->comunicacion_externa }}">
                </div>

                <div>
                    <label for="estado_civil" class="block text-gray-50 font-semibold mb-1">Estado Civil</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="estado_civil" id="estado_civil" value="{{ $descripcion->estado_civil }}">
                </div>

                <div>
                    <label for="edad" class="block text-gray-50 font-semibold mb-1">Edad</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="edad" id="edad" value="{{ $descripcion->edad }}">
                </div>

                <div>
                    <label for="genero" class="block text-gray-50 font-semibold mb-1">Género</label>
                    <select class="w-full border-gray-300 rounded-md shadow-sm" name="genero" id="genero">
                        <option value="Hombre" {{ $descripcion->genero == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                        <option value="Mujer" {{ $descripcion->genero == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                    </select>
                </div>

                <div>
                    <label for="requisitos_generales" class="block text-gray-50 font-semibold mb-1">Requisitos Generales</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="requisitos_generales" id="requisitos_generales" rows="3">{{ $descripcion->requisitos_generales }}</textarea>
                </div>

                <div>
                    <label for="habilidades_fisicas" class="block text-gray-50 font-semibold mb-1">Habilidades Físicas</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="habilidades_fisicas" id="habilidades_fisicas" rows="3">{{ $descripcion->habilidades_fisicas }}</textarea>
                </div>

                <div>
                    <label for="habilidades_mentales" class="block text-gray-50 font-semibold mb-1">Habilidades Mentales</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="habilidades_mentales" id="habilidades_mentales" rows="3">{{ $descripcion->habilidades_mentales }}</textarea>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-950">Guardar</button>
                </div>
            </form>
        </main>
    </div>
</body>
</html>
