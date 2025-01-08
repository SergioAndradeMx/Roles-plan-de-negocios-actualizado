<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/editarDescripcionPuesto.js'])
</head>

<body>
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
            @include('descripciones.menu')
        </div>

        <!-- Contenido principal -->
        <main class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5   dark:bg-gray-800 flex-1 p-8">
            <!-- Formulario -->
            <form action="{{ route('plan_de_negocio.descripciones.update', [$plan_de_negocio, $descripcion]) }}"
                method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- TODO: Selector para ver cual se debe mostrar --}}

                <div>
                    <label for="nivel" class="block text-gray-50 font-semibold mb-1">Nivel Organigrama</label>
                    <select id="nivel" name="nivel" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="Estrategico" {{ $descripcion->nivel == 'Estrategico' ? 'selected' : '' }}>
                            Estratégico</option>
                        <option value="Tactico" {{ $descripcion->nivel == 'Tactico' ? 'selected' : '' }}>Táctico
                        </option>
                        <option value="Operativo" {{ $descripcion->nivel == 'Operativo' ? 'selected' : '' }}>Operativo
                        </option>
                    </select>
                </div>

                <div>
                    <label for="codigo" class="block text-gray-50 font-semibold mb-1">Código</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="codigo"
                        id="codigo" value="{{ $descripcion->codigo }}">
                </div>

                <div>
                    <label for="unidad_administrativa" class="block text-gray-50 font-semibold mb-1">Unidad
                        Administrativa</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm"
                        name="unidad_administrativa" id="unidad_administrativa"
                        value="{{ $descripcion->unidad_administrativa }}" required>
                </div>

                <div>
                    <label for="nombre_puesto" class="block text-gray-50 font-semibold mb-1">Nombre de Puesto</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="nombre_puesto"
                        id="nombre_puesto" value="{{ $descripcion->nombre_puesto }}" required>
                </div>

                <div>
                    <label for="descripcion_generica" class="block text-gray-50 font-semibold mb-1">Descripción
                        Genérica</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="descripcion_generica" id="descripcion_generica"
                        rows="3" required>{{ $descripcion->descripcion_generica }}</textarea>
                </div>

                <div>
                    <label for="descripcion_especifica" class="block text-gray-50 font-semibold mb-1">Descripción
                        Específica</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="descripcion_especifica" id="descripcion_especifica"
                        rows="3" required>{{ $descripcion->descripcion_especifica }}</textarea>
                </div>

                <div>
                    <label for="objetivos_puesto" class="block text-gray-50 font-semibold mb-1">Objetivos del
                        Puesto</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="objetivos_puesto" id="objetivos_puesto"
                        rows="3" required>{{ $descripcion->objetivos_puesto }}</textarea>
                </div>

                <div>
                    <label for="salario_minimo" class="block text-gray-50 font-semibold mb-1">Salario Mínimo</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="salario_minimo"
                        id="salario_minimo" value="{{ $descripcion->salario_minimo }}" required>
                </div>

                <div>
                    <label for="salario_maximo" class="block text-gray-50 font-semibold mb-1">Salario Máximo</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="salario_maximo"
                        id="salario_maximo" value="{{ $descripcion->salario_maximo }}" required>
                </div>

                <div>
                    <label for="jornada_laboral" class="block text-gray-50 font-semibold mb-1">Jornada Laboral</label>
                    <select class="w-full border-gray-300 rounded-md shadow-sm" name="jornada_laboral"
                        id="jornada_laboral" required>
                        <option value="Normal" {{ $descripcion->jornada_laboral == 'Normal' ? 'selected' : '' }}>Normal
                        </option>
                        <option value="Inglesa" {{ $descripcion->jornada_laboral == 'Inglesa' ? 'selected' : '' }}>
                            Inglesa</option>
                    </select>
                </div>

                <div>
                    <label for="numero_plaza" class="block text-gray-50 font-semibold mb-1">Número de Plaza</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="numero_plaza"
                        id="numero_plaza" value="{{ $descripcion->numero_plaza }}" required>
                </div>

                {{-- TODO: Selectores para reportar --}}
                <div id="reporta">
                    <label for="reporta_a" class="block text-gray-50 font-semibold mb-1">Reporta a</label>

                    {{-- TODO: Selector para estrategico --}}
                    <select class="w-full  border-gray-300 rounded-md shadow-sm" id="reporta_a2" name="reporta_a">
                        <option value=""></option>
                    </select>

                    {{-- TODO: Selector para tactico --}}
                    <select class="w-full border-gray-300 rounded-md shadow-sm" id="reporta_a1" name="reporta_a">
                        <option value="" disabled selected>Seleccione una opción</option>
                        @foreach ($estrategicos as $estrategico)
                            <option value="{{ $estrategico->id }}"
                                {{ $descripcion->reporta_a === $estrategico->id ? 'selected' : '' }}>
                                {{ $estrategico->unidad_administrativa }}
                            </option>
                        @endforeach
                    </select>

                    {{-- TODO: Selector para operativo --}}
                    <select class="w-full border-gray-300 rounded-md shadow-sm" id="reporta_adad" name="reporta_a">
                        <option value="" disabled selected>Seleccione una opción</option>
                        @foreach ($tactico as $tacticos)
                            <option value="{{ $tacticos->id }}"
                                {{ $descripcion->reporta_a === $tacticos->id ? 'selected' : '' }}>
                                {{ $tacticos->unidad_administrativa }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- TODO: FIN DE LOS SELECTORES REPORTAR --}}



                {{-- TODO: Selector de supervisa a  --}}
                <div class="mb-4 flex flex-col space-y-4" id="divSupervisa">

                    {{-- TODO: Div donde esta el checkbox --}}
                    <div class="mb-4 flex items-center">

                        {{-- TODO: Mensaje de supervisa_a --}}
                        <label for="supervisa_a"
                            class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">
                            Supervisa a:
                        </label>

                        {{-- TODO: div para los estrategicos --}}
                        <div class="relative w-3/4" id="supervisaSelectorEstrategico">
                            <!-- Botón -->
                            <button id="toggleButton" type="button"
                                class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                {{-- TODO: Aqui deben aparecer los nombre de los seleccionados. --}}
                                <span id="nombresSeleccionadosEstrategicos">
                                    @php
                                        $selectedOptions = [];
                                        foreach ($tactico as $tactico1) {
                                            if (in_array($tactico1->id, json_decode($descripcion->supervisa_a, true))) {
                                                $selectedOptions[] = $tactico1->unidad_administrativa;
                                            }
                                        }
                                        echo implode(', ', $selectedOptions);
                                    @endphp
                                </span>

                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">&#x25BC;</span>
                            </button>

                            <!-- Lista de Opciones -->
                            <div id="optionsContainer"
                                class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10 hidden">
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($tactico as $tactico1)
                                        <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            onclick="toggleOption('{{ $tactico1->id }}', '{{ addslashes($tactico1->unidad_administrativa) }}')">
                                            <input type="checkbox" id="option-{{ $tactico1->id }}"
                                                value="{{ $tactico1->id }}" class="mr-2"
                                                {{ in_array($tactico1->id, json_decode($descripcion->supervisa_a, true)) ? 'checked' : '' }}
                                                onclick="handleCheckboxClick(event, '{{ $tactico1->id }}' , '{{ addslashes($tactico1->unidad_administrativa) }}', this)">
                                            {{ $tactico1->unidad_administrativa }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        {{-- TODO: div para los tacticos --}}
                        <div class="relative w-3/4" id="supervisaSelectorTactico">
                            <!-- Botón -->
                            <button id="toggleButtonTacticos" type="button"
                                class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                {{-- TODO: Aqui deben aparecer los nombre de los seleccionados. --}}
                                <span id="nombresSeleccionadosTacticos">
                                    @php
                                        $selectedOptions = [];
                                        foreach ($operativo as $operativo1) {
                                            if (
                                                in_array($operativo1->id, json_decode($descripcion->supervisa_a, true))
                                            ) {
                                                $selectedOptions[] = $operativo1->unidad_administrativa;
                                            }
                                        }
                                        echo implode(', ', $selectedOptions);
                                    @endphp
                                </span>

                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">&#x25BC;</span>
                            </button>

                            <!-- Lista de Opciones -->
                            <div id="optionsContainerTacticos"
                                class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10 hidden">
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($operativo as $operativo1)
                                        <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            onclick="toggleOption('{{ $operativo1->id }}', '{{ addslashes($operativo1->unidad_administrativa) }}')">
                                            <input type="checkbox" id="option-{{ $operativo1->id }}"
                                                value="{{ $operativo1->unidad_administrativa }}" class="mr-2"
                                                {{ in_array($operativo1->id, json_decode($descripcion->supervisa_a, true)) ? 'checked' : '' }}
                                                onclick="handleCheckboxClick(event, '{{ $operativo1->id }}' , '{{ addslashes($operativo1->unidad_administrativa) }}', this)">
                                            {{ $operativo1->unidad_administrativa }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        {{-- TODO: div para los operativos --}}
                        <div class="relative w-3/4" id="supervisaSelectorOperativo">
                            {{-- Botón --}}
                            <button id="" type="button"
                                class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                {{-- TODO: Aqui deben aparecer los nombre de los seleccionados. --}}
                                <span id="nombresSeleccionadoOperativos">

                                </span>

                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">&#x25BC;</span>
                            </button>

                            {{-- Lista de Opciones  --}}
                            <div id="OptionContainerOperativos"
                                class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10 hidden">
                                <ul class="divide-y divide-gray-200">
                                </ul>
                            </div>
                        </div>
                    </div>


                    {{-- TODO: Campo oculto para enviar los valores seleccionados como array --}}
                    <div id="datosEnviados">
                        @foreach ($tactico as $tactico1)
                            @if (in_array($tactico1->id, json_decode($descripcion->supervisa_a, true)))
                                <input type="hidden" name="supervisa_a[]" value="{{ $tactico1->id }}">
                            @endif
                        @endforeach

                        {{-- TODO: For each para operativos --}}
                        @foreach ($operativo as $operativo1)
                            @if (in_array($operativo1->id, json_decode($descripcion->supervisa_a, true)))
                                <input type="hidden" name="supervisa_a[]" value="{{ $operativo1->id }}">
                            @endif
                        @endforeach
                    </div>


                    {{-- TODO: Tabla para mostrar los seleccionados de Estrategicos --}}
                    <div class="w-full mt-4" id="tablaEstrategicos">
                        <table class="w-full border-collapse border border-gray-300 bg-gray-100 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-300">
                                    <th class="border border-gray-400 px-4 py-2 text-left">Unidad Administrativa</th>
                                    <th class="border border-gray-400 px-4 py-2 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $selectedOptions = json_decode($descripcion->supervisa_a, true);
                                @endphp
                                @if (!empty($selectedOptions))
                                    @foreach ($tactico as $tactico1)
                                        @if (in_array($tactico1->id, $selectedOptions))
                                            <tr class="bg-white hover:bg-gray-50">
                                                <td class="border border-gray-300 px-4 py-2">
                                                    {{ $tactico1->unidad_administrativa }}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <button type="button" class="text-red-500 hover:text-red-700"
                                                        id="button{{ $tactico1->id }}"
                                                        onclick="removeOption('{{ $tactico1->id }}' , '{{ addslashes($tactico1->unidad_administrativa) }}')">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="2"
                                            class="border border-gray-300 px-4 py-2 text-gray-500 text-center">
                                            No hay datos
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>


                    {{-- TODO: Tabla para mostrar los seleccionados de TACTICOS --}}
                    <div class="w-full mt-4" id="tablaTacticos">
                        <table class="w-full border-collapse border border-gray-300 bg-gray-100 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-300">
                                    <th class="border border-gray-400 px-4 py-2 text-left">Unidad Administrativa</th>
                                    <th class="border border-gray-400 px-4 py-2 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $selectedOptions = json_decode($descripcion->supervisa_a, true);
                                @endphp
                                @foreach ($operativo as $operativo1)
                                    @if (in_array($operativo1->id, $selectedOptions))
                                        <tr class="bg-white hover:bg-gray-50">
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $operativo1->unidad_administrativa }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <button type="button" class="text-red-500 hover:text-red-700"
                                                    id="button{{ $operativo1->id }}"
                                                    onclick="removeOption('{{ $operativo1->id }}' , '{{ addslashes($operativo1->unidad_administrativa) }}')">
                                                    Eliminar
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    {{-- TODO: Tabla para mostrar los seleccionados de TACTICOS --}}
                    <div class="w-full mt-4" id="tablaOperativos">
                        <table class="w-full border-collapse border border-gray-300 bg-gray-100 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-300">
                                    <th class="border border-gray-400 px-4 py-2 text-left">Unidad Administrativa</th>
                                    <th class="border border-gray-400 px-4 py-2 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>


                </div>

                {{-- TODO: FIN DE LOS SELECTORES SUPERVISA A --}}

                <div>
                    <label for="comunicacion_interna" class="block text-gray-50 font-semibold mb-1">Comunicación
                        Interna</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm"
                        name="comunicacion_interna" id="comunicacion_interna"
                        value="{{ $descripcion->comunicacion_interna }}">
                </div>

                <div>
                    <label for="comunicacion_externa" class="block text-gray-50 font-semibold mb-1">Comunicación
                        Externa</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm"
                        name="comunicacion_externa" id="comunicacion_externa"
                        value="{{ $descripcion->comunicacion_externa }}">
                </div>

                <div>
                    <label for="estado_civil" class="block text-gray-50 font-semibold mb-1">Estado Civil</label>
                    <input type="text" class="w-full border-gray-300 rounded-md shadow-sm" name="estado_civil"
                        id="estado_civil" value="{{ $descripcion->estado_civil }}">
                </div>

                <div>
                    <label for="edad" class="block text-gray-50 font-semibold mb-1">Edad</label>
                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm" name="edad"
                        id="edad" value="{{ $descripcion->edad }}">
                </div>

                <div>
                    <label for="genero" class="block text-gray-50 font-semibold mb-1">Género</label>
                    <select class="w-full border-gray-300 rounded-md shadow-sm" name="genero" id="genero">
                        <option value="Hombre" {{ $descripcion->genero == 'Hombre' ? 'selected' : '' }}>Hombre
                        </option>
                        <option value="Mujer" {{ $descripcion->genero == 'Mujer' ? 'selected' : '' }}>Mujer
                        </option>
                    </select>
                </div>

                <div>
                    <label for="requisitos_generales" class="block text-gray-50 font-semibold mb-1">Requisitos
                        Generales</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="requisitos_generales" id="requisitos_generales"
                        rows="3">{{ $descripcion->requisitos_generales }}</textarea>
                </div>

                <div>
                    <label for="habilidades_fisicas" class="block text-gray-50 font-semibold mb-1">Habilidades
                        Físicas</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="habilidades_fisicas" id="habilidades_fisicas"
                        rows="3">{{ $descripcion->habilidades_fisicas }}</textarea>
                </div>

                <div>
                    <label for="habilidades_mentales" class="block text-gray-50 font-semibold mb-1">Habilidades
                        Mentales</label>
                    <textarea class="w-full border-gray-300 rounded-md shadow-sm" name="habilidades_mentales" id="habilidades_mentales"
                        rows="3">{{ $descripcion->habilidades_mentales }}</textarea>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-green-900 text-white px-4 py-2 rounded-md hover:bg-green-950">Guardar</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
