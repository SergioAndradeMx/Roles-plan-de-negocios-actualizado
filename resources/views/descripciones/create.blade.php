<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <!-- Barra de navegación -->
    @include('layouts.navigation')

    <!-- Encabezado -->
    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans">Crear Descripción de Puesto</h1>
    </div>

    <!-- Contenedor principal -->
    <div class="flex justify-center items-stretch  my-2 sm:my-4 2xl:px-10 gap-20 xl:mx-2 ">
        <!-- Contenido principal -->
        <!-- Barra lateral -->
        <div class="relative rounded-lg border-none card h-full bg-white 2xl:p-5 p-6 dark:bg-gray-800">
            @include('descripciones.menu')
        </div>

        <main class=" rounded-lg border-none card h-full bg-white 2xl:p-5 dark:bg-gray-800 flex-1 p-8"
            x-data="{ selectedSelector: 'estrategico' }">
            <!-- Formulario -->
            <form action="{{ route('plan_de_negocio.descripciones.store', $plan_de_negocio) }}" method="POST">
                @csrf

                <div class="mb-4 flex gap-4">
                    <div class="flex">
                        <label for="nivel"
                            class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Nivel
                            Organigrama</label>
                        <select
                            class="block border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="nivel" id="nivel" required>
                            <option value="estrategico">Estratégico</option>
                            <option value="tactico">Táctico</option>
                            <option value="operativo">Operativo</option>
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


                    <div class="flex">
                        <label for="codigo"
                            class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Código:</label>
                        <input type="text"
                            class="block border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="codigo" id="codigo" value="{{ old('codigo') }}">

                        @if (session('codigoDuplicado'))
                            <div class="mt-2 text-yellow-600 bg-yellow-100 border border-yellow-400 p-2 rounded">
                                {{ session('codigoDuplicado') }}
                            </div>
                        @endif

                    </div>
                </div>
                <div class="mb-4 flex">
                    <label for="unidad_administrativa"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Unidad
                        Administrativa:</label>
                    <input type="text"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="unidad_administrativa" id="unidad_administrativa" required>
                </div>

                <div class="mb-4 flex">
                    <label for="nombre_puesto"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Nombre de
                        Puesto:</label>
                    <input type="text"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="nombre_puesto" id="nombre_puesto" required>
                </div>

                <div class="mb-4 flex">
                    <label for="descripcion_generica"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Descripción
                        Genérica:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="descripcion_generica" id="descripcion_generica" rows="3" required></textarea>
                </div>

                <div class="mb-4 flex">
                    <label for="descripcion_especifica"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Descripción
                        Específica:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="descripcion_especifica" id="descripcion_especifica" rows="3" required></textarea>
                </div>

                <div class="mb-4 flex">
                    <label for="objetivos_puesto"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Objetivos del
                        Puesto:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="objetivos_puesto" id="objetivos_puesto" rows="3" required></textarea>
                </div>

                <div class="mb-4 flex gap-4">
                    <div class="flex items-center w-1/2">
                        <label for="salario_minimo"
                            class="block w-1/3 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Salario
                            Mínimo:</label>
                        <input type="number"
                            class="block w-2/3 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="salario_minimo" id="salario_minimo" step="0.01" required>
                    </div>
                    <div class="flex items-center w-1/2">
                        <label for="salario_maximo"
                            class="block w-1/3 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Salario
                            Máximo:</label>
                        <input type="number"
                            class="block w-2/3 border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="salario_maximo" id="salario_maximo" step="0.01" required>
                    </div>
                </div>


                <div class="mb-4 flex">
                    <label for="jornada_laboral"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Jornada
                        Laboral:</label>
                    <select
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="jornada_laboral" id="jornada_laboral" required>
                        <option value="Normal">Normal</option>
                        <option value="Inglesa">Inglesa</option>
                    </select>
                </div>

                <div class="mb-4 flex">
                    <label for="numero_plaza"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Número de
                        Plaza:</label>
                    <input type="number"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="numero_plaza" id="numero_plaza" required>
                </div>

                {{-- <div class="mb-4 flex">
                    <label for="reporta_a" class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Reporta a:</label>
                    <input type="text" class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" name="reporta_a" id="reporta_a">
                </div> --}}

                <div class="mb-4 flex">
                    <label for="reporta_a"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Reporta a:</label>
                    <select name="reporta_a" id="reporta_a"
                        class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        {{-- @foreach ($unidadesAdministrativas as $unidad)
                            <option value="{{ $unidad }}">{{ $unidad }}</option>
                        @endforeach --}}
                    </select>
                </div>

                {{-- ejemplo  --}}
                <div class="mb-4 flex flex-col space-y-4" x-data="{
                    open: false,
                    selectedOptions: [],
                    toggleOption(value, text) {
                        if (this.selectedOptions.some(option => option.value === value)) {
                            this.selectedOptions = this.selectedOptions.filter(option => option.value !== value);
                        } else {
                            this.selectedOptions.push({ value, text });
                        }
                    },
                    isSelected(value) {
                        return this.selectedOptions.some(option => option.value === value);
                    }
                }">
                    <div class="mb-4 flex items-center">
                        <label for="supervisa_a"
                            class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">
                            Supervisa a:
                        </label>
                        <div class="relative w-3/4">
                            <button @click="open = !open" type="button"
                                class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <span
                                    x-text="selectedOptions.length > 0 ? selectedOptions.map(option => option.text).join(', ') : 'Seleccione...'">
                                </span>
                                <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">
                                    &#x25BC;
                                </span>
                            </button>
                            <div x-show="open" @click.outside="open = false"
                                class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10">
                                <ul class="max-h-60 overflow-auto py-1 text-sm text-gray-700">
                                    @foreach ($tacticos as $tactico)
                                        <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            @click="toggleOption('{{ $tactico->id }}', '{{ $tactico->unidad_administrativa }}')">
                                            <span class="mr-2">
                                                <input type="checkbox" :checked="isSelected('{{ $tactico->id }}')"
                                                    class="form-checkbox">
                                            </span>
                                            <span>{{ $tactico->unidad_administrativa }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Campo oculto para enviar los valores seleccionados como array -->
                    <template x-for="option in selectedOptions" :key="option.value">
                        <input type="hidden" name="supervisa_a[]" :value="option.value">
                    </template>

                    <!-- Tabla para mostrar los seleccionados con fondo -->
                    <div class="w-full mt-4">
                        <table class="w-full border-collapse border border-gray-300 bg-gray-100 rounded-lg shadow-md">
                            <thead>
                                <tr class="bg-gray-300">
                                    <th class="border border-gray-400 px-4 py-2 text-left">Unidad Administrativa</th>
                                    <th class="border border-gray-400 px-4 py-2 text-left">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template x-for="option in selectedOptions" :key="option.value">
                                    <tr class="bg-white hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2" x-text="option.text"></td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <button type="button" class="text-red-500 hover:text-red-700"
                                                @click="toggleOption(option.value, option.text)">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                </template>
                                <tr x-show="selectedOptions.length === 0">
                                    <td colspan="2"
                                        class="border border-gray-300 px-4 py-2 text-gray-500 text-center">
                                        No hay opciones seleccionadas.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- <div>
                    <!-- Selectores Condicionales -->
                    <select class="w-full border-gray-300 rounded-md shadow-sm"
                        x-show="selectedSelector === 'tactico'"
                        name="supervisa_a" id="supervisa_a">
                        @foreach ($tacticos as $tactico)
                            <option value="{{ $tactico->id }}">
                                {{ $tactico->unidad_administrativa }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Contenedor del Label y Select con el Nuevo Diseño -->
                    <div class="mb-4 flex flex-col space-y-4" x-data="{
                        open: false,
                        selectedOptions: [],
                        toggleOption(value, text) {
                            if (this.selectedOptions.some(option => option.value === value)) {
                                this.selectedOptions = this.selectedOptions.filter(option => option.value !== value);
                            } else {
                                this.selectedOptions.push({ value, text });
                            }
                        },
                        isSelected(value) {
                            return this.selectedOptions.some(option => option.value === value);
                        }
                    }">
                        <div class="mb-4 flex flex-col space-y-4">
                            <div class="mb-4 flex items-center">
                                <label for="supervisa_a"
                                    class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">Supervisa
                                    a:</label>
                                <div class="relative w-3/4">
                                    <button @click="open = !open" type="button"
                                        class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <span
                                            x-text="selectedOptions.length > 0 ? selectedOptions.map(option => option.text).join(', ') : 'Seleccione...'"></span>
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">
                                            &#x25BC;
                                        </span>
                                    </button>
                                    <div x-show="open" @click.outside="open = false"
                                        class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10">
                                        <ul class="max-h-60 overflow-auto py-1 text-sm text-gray-700">
                                            @foreach ($tacticos as $tactico)
                                                <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                                    @click="if (selectedOptions.some(option => option.value === '{{ $tactico->id }}')) { selectedOptions = selectedOptions.filter(option => option.value !== '{{ $tactico->id }}'); } else { selectedOptions.push({ value: '{{ $tactico->id }}', text: '{{ $tactico->unidad_administrativa }}' }); }">
                                                    <span class="mr-2">
                                                        <input type="checkbox"
                                                            :checked="selectedOptions.some(option => option
                                                                .value === '{{ $tactico->id }}')"
                                                            class="form-checkbox">
                                                    </span>
                                                    <span>{{ $tactico->unidad_administrativa }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Tabla para mostrar los seleccionados con fondo -->
                            <div class="w-full mt-4">
                                <table
                                    class="w-full border-collapse border border-gray-300 bg-gray-100 rounded-lg shadow-md">
                                    <thead>
                                        <tr class="bg-gray-300">
                                            <th class="border border-gray-400 px-4 py-2 text-left">Unidad
                                                Administrativa</th>
                                            <th class="border border-gray-400 px-4 py-2 text-left">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template x-for="option in selectedOptions" :key="option.value">
                                            <tr class="bg-white hover:bg-gray-50">
                                                <td class="border border-gray-300 px-4 py-2" x-text="option.text">
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <button type="button" class="text-red-500 hover:text-red-700"
                                                        @click="toggleOption(option.value, option.text)">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                        </template>
                                        <tr x-show="selectedOptions.length === 0">
                                            <td colspan="2"
                                                class="border border-gray-300 px-4 py-2 text-gray-500 text-center">
                                                No hay opciones seleccionadas.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}

                {{-- final --}}

                <div class="mb-4 flex">
                    <label for="comunicacion_interna"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Comunicación
                        Interna:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="comunicacion_interna" id="comunicacion_interna" rows="2"></textarea>
                </div>

                <div class="mb-4 flex">
                    <label for="comunicacion_externa"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Comunicación
                        Externa:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="comunicacion_externa" id="comunicacion_externa" rows="2"></textarea>
                </div>


                <div class="mb-4 flex gap-4">
                    <div class="flex">
                        <label for="estado_civil"
                            class="block border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Estado
                            Civil:</label>
                        <input type="text"
                            class="block border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="estado_civil" id="estado_civil">
                    </div>
                    <div class="flex">
                        <label for="edad"
                            class=" border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Edad:</label>
                        <input type="number"
                            class="block  border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="edad" id="edad">
                    </div>
                    <div class="flex">
                        <label for="genero"
                            class=" border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Género:</label>
                        <select
                            class="block  border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            name="genero" id="genero">
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <label for="requisitos_generales"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Requisitos
                        Generales:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="requisitos_generales" id="requisitos_generales" rows="3"></textarea>
                </div>

                <div class="mb-4 flex">
                    <label for="habilidades_fisicas"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Habilidades
                        Físicas:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="habilidades_fisicas" id="habilidades_fisicas" rows="3"></textarea>
                </div>

                <div class="mb-4 flex">
                    <label for="habilidades_mentales"
                        class="block w-1/6 border-gray-300 bg-gray-200 rounded-lg p-2 text-gray-950">Habilidades
                        Mentales:</label>
                    <textarea class="block w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        name="habilidades_mentales" id="habilidades_mentales" rows="3"></textarea>
                </div>

                <!-- Botón para guardar -->
                <div class="mt-6">
                    <button type="submit"
                        class="bg-green-900 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-950">Guardar</button>
                </div>
            </form>
        </main>
    </div>
</body>

</html>
