<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-600">
    <!-- Barra de navegación -->
    @include('layouts.navigation')

    <!-- Encabezado -->
    <div class="text-center text-white my-4 sm:my-6 ml-4 sm:ml-8 md:ml-16 lg:ml-32">
        <h1 class="text-3xl md:text-4xl font-bold mx-auto">Crear Descripción de Puesto</h1>
    </div>

    <!-- Contenedor principal -->
    <div class="flex flex-col lg:flex-row justify-center items-start gap-6 xl:px-10 p-4">
        <!-- Contenido principal -->
        <!-- Barra lateral -->
        <div class="w-full lg:w-1/6 bg-gray-900 rounded-lg shadow-md  p-2">
            @include('descripciones.menu')
        </div>
        <div class="container mx-auto sm:px-6 lg:px-8">
            <main class="w-full  rounded-lg shadow-md bg-gray-900 p-2">
                <!-- Formulario -->
                <form action="{{ route('plan_de_negocio.descripciones.store', $plan_de_negocio) }}" method="POST">
                    @csrf

                    <div class="mb-4 flex flex-col sm:flex-row gap-4  justify-center">
                        <div class="flex  w-full sm:w-auto">
                            <label for="nivel"
                                class="border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none font-bold">
                                Nivel Organigrama:</label>
                            <select
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 w-full sm:w-auto rounded-l-none"
                                name="nivel" id="nivel" required>
                                <option value="Operativo">Operativo</option>
                                <option value="Estrategico">Estratégico</option>
                                <option value="Tactico">Táctico</option>

                            </select>
                        </div>

                        <script>
                            document.getElementById('nivel').addEventListener('change', function() {
                                const selectedValue = this.value.toLowerCase();
                                const routes = {
                                    estrategico: "{{ route('plan_de_negocio.descripciones.create', $plan_de_negocio) }}",
                                    tactico: "{{ route('plan_de_negocio.tactico.index', $plan_de_negocio) }}",
                                    operativo: "{{ route('plan_de_negocio.operativo.index', $plan_de_negocio) }}"
                                };

                                // Verifica si hay una ruta para el valor seleccionado y redirige
                                if (routes[selectedValue]) {
                                    window.location.href = routes[selectedValue];
                                }
                            });
                        </script>


                        <!-- Código -->
                        <div class="flex w-full sm:w-auto">
                            <label for="codigo"
                                class="border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none font-bold">
                                Código:
                            </label>
                            <input type="text"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 w-full sm:w-auto rounded-l-none"
                                name="codigo" id="codigo" value="{{ old('codigo') }}" required>
                        </div>

                        <!-- Mensaje de código duplicado -->
                        @if (session('codigoDuplicado'))
                            <div
                                class="text-red-700 bg-red-100 border border-red-400 p-2 rounded-lg  w-full sm:w-auto text-sm ">
                                <strong>¡Error!</strong> El código ingresado ya existe. Por favor, ingresa un código
                                diferente.
                            </div>
                        @endif
                    </div>
                    <!-- div 2 -->
                    <div class="mb-4 flex flex-col sm:flex-row gap-4 ">
                        <!-- Unidad Administrativa -->
                        <div class="flex w-full sm:w-1/2">
                            <label for="unidad_administrativa"
                                class="border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none font-bold">
                                Unidad Administrativa:
                            </label>
                            <input type="text"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 w-full sm:w-auto rounded-l-none"
                                name="unidad_administrativa" id="unidad_administrativa"
                                value="{{ old('unidad_administrativa') }}" required>
                        </div>


                        <!-- Nombre de Puesto -->
                        <div class="flex w-full sm:w-1/2">
                            <label for="nombre_puesto"
                                class="border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none font-bold">
                                Nombre de Puesto:
                            </label>
                            <input type="text"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 w-full sm:w-auto rounded-l-none"
                                name="nombre_puesto" id="nombre_puesto" value="{{ old('nombre_puesto') }}" required>
                        </div>

                    </div>
                    <!-- Descripción Genérica-->
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="descripcion_generica"
                            class="block sm:w-1/6 border-gray-300 font-bold bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 text-gray-950">Descripción
                            Genérica:</label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500 "
                            name="descripcion_generica" id="descripcion_generica" rows="3" required>{{ old('descripcion_generica') }}</textarea>
                    </div>
                    <!-- Descripción Específica -->
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="descripcion_especifica"
                            class="block sm:w-1/6 border-gray-300 font-bold bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 text-gray-950">
                            Descripción Específica:
                        </label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="descripcion_especifica" id="descripcion_especifica" rows="3" required>{{ old('descripcion_especifica') }}</textarea>
                    </div>

                    <!-- Objetivos del Puesto -->
                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="objetivos_puesto"
                            class="block sm:w-1/6 border-gray-300 font-bold bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 text-gray-950">
                            Objetivos del Puesto:
                        </label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="objetivos_puesto" id="objetivos_puesto" rows="3" required>{{ old('objetivos_puesto') }}</textarea>
                    </div>

                    <!-- div 3 -->
                    <div class="mb-4 flex flex-wrap gap-2 justify-center">
                        <!-- Salario Mínimo -->
                        <div class="flex w-full sm:w-1/4">
                            <label for="salario_minimo"
                                class="block border-gray-300 font-bold bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none">
                                Salario Mínimo:
                            </label>
                            <input type="number"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-l-none"
                                name="salario_minimo" id="salario_minimo" value="{{ old('salario_minimo') }}"
                                step="0.01" required>
                        </div>
                        <!-- Salario Máximo -->
                        <div class="flex w-full sm:w-1/3">
                            <label for="salario_maximo"
                                class="block border-gray-300 font-bold bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none">
                                Salario Máximo:
                            </label>
                            <input type="number"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-l-none"
                                name="salario_maximo" id="salario_maximo" value="{{ old('salario_maximo') }}"
                                step="0.01" required>
                        </div>
                        <!-- Número de Plaza -->
                        <div class="flex w-full sm:w-1/3">
                            <label for="numero_plaza"
                                class="block border-gray-300 font-bold bg-gray-200 rounded-lg p-2 text-gray-950 w-full sm:w-auto rounded-r-none">
                                Número de Plaza:
                            </label>
                            <input type="number"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-l-none"
                                name="numero_plaza" id="numero_plaza" value="{{ old('numero_plaza') }}" required>
                        </div>
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <!-- Etiqueta -->
                        <label for="jornada_laboral"
                            class="block w-full sm:w-1/6 border-gray-300 font-bold bg-gray-200 p-2 text-gray-950  sm:text-left rounded-t sm:rounded-l-lg rounded-r-none">
                            Jornada Laboral:
                        </label>
                        <!-- Select -->
                        <select
                            class="block w-full sm:flex-grow border-gray-300 shadow-sm  focus:border-blue-500 focus:ring-blue-500 rounded-b sm:rounded-r-lg "
                            name="jornada_laboral" id="jornada_laboral" required>>
                            <option value="Normal">Normal</option>
                            <option value="Inglesa">Inglesa</option>
                        </select>
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="reporta_a"
                            class="block w-full sm:w-1/6 border-gray-300 bg-gray-200 p-2 font-bold text-gray-950  sm:text-left rounded-t sm:rounded-l-lg rounded-r-none">
                            Reporta a:</label>
                        <select name="reporta_a" id="reporta_a"
                            class="block w-full sm:flex-grow border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-b sm:rounded-r-lg ">
                            @foreach ($descripcionesEstrategicos as $unidad)
                                <option value="{{ $unidad->id }}">{{ $unidad->unidad_administrativa }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="supervisa_a"
                            class="block w-full sm:w-1/6 border-gray-300 bg-gray-200 p-2 font-bold text-gray-950  sm:text-left rounded-t sm:rounded-l-lg rounded-r-none">Supervisa
                            a:</label>
                        <input disabled type="text"
                            class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:rounded-l-none rounded-t-lg "
                            name="supervisa_a" id="supervisa_a">
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="comunicacion_interna"
                            class="block sm:w-1/6 border-gray-300  bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 font-bold text-gray-950">Comunicación
                            Interna: </label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500 "
                            name="comunicacion_interna" id="comunicacion_interna" rows="2" required>{{ old('comunicacion_interna') }} </textarea>
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="comunicacion_externa"
                            class="block sm:w-1/6 border-gray-300  bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 font-bold text-gray-950">Comunicación
                            Externa:</label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500 "
                            name="comunicacion_externa" id="comunicacion_externa" rows="2" required>{{ old('comunicacion_externa') }}</textarea>
                    </div>
                    {{-- DIV 4 --}}
                    <div class="mb-4 flex flex-wrap gap-2 justify-center">
                        <div class="flex w-full sm:w-1/4">
                            <label for="estado_civil"
                                class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950  sm:w-auto font-bold rounded-r-none">Estado
                                Civil:</label>
                            <input type="text"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500  rounded-l-none"
                                name="estado_civil" value="{{ old('estado_civil') }}" id="estado_civil" required>
                        </div>
                        <div class="flex w-full sm:w-1/3">
                            <label for="edad"
                                class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950  sm:w-auto  font-bold rounded-r-none">Edad:</label>
                            <input type="number"
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-l-none"
                                name="edad" id="edad" value="{{ old('edad') }}" required>
                        </div>
                        <div class="flex w-full sm:w-1/3">
                            <label for="genero"
                                class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950  sm:w-auto font-bold rounded-r-none">Género:</label>
                            <select
                                class="block flex-grow border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 rounded-l-none"
                                name="genero" id="genero">
                                <option value="Hombre">Hombre</option>
                                <option value="Mujer">Mujer</option>
                            </select>
                        </div>

                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="requisitos_generales"
                            class="block sm:w-1/6 border-gray-300  bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 font-bold text-gray-950">Requisitos
                            Generales:</label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm  focus:border-blue-500 focus:ring-blue-500 "
                            name="requisitos_generales" id="requisitos_generales" rows="3" required>{{ old('requisitos_generales') }} </textarea>
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="habilidades_fisicas"
                            class="block sm:w-1/6 border-gray-300  bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 font-bold text-gray-950">Habilidades
                            Físicas:</label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm  focus:border-blue-500 focus:ring-blue-500 "
                            name="habilidades_fisicas" id="habilidades_fisicas" rows="3" required>{{ old('habilidades_fisicas') }}</textarea>
                    </div>

                    <div class="mb-4 flex flex-col sm:flex-row">
                        <label for="habilidades_mentales"
                            class="block sm:w-1/6 border-gray-300  bg-gray-200 rounded-t-lg sm:rounded-l-lg sm:rounded-none p-2 font-bold text-gray-950">Habilidades
                            Mentales:</label>
                        <textarea
                            class="block w-full sm:w-5/6 border-gray-300 rounded-b-lg sm:rounded-r-lg sm:rounded-none shadow-sm focus:border-blue-500 focus:ring-blue-500 "
                            name="habilidades_mentales" id="habilidades_mentales" rows="3" required>{{ old('habilidades_mentales') }}</textarea>
                    </div>

                    <!-- Botón para guardar -->
                    <div class="flex justify-center">
                        <button type="submit"
                            class="bg-green-700 px-3 py-2 rounded-md text-sm font-bold hover:bg-green-500 transition text-white">
                            Guardar
                        </button>
                    </div>
                </form>
            </main>
        </div>
</body>

</html>
