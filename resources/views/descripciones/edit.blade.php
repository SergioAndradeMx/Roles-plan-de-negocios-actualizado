<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Descripción de Puesto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <main class="relative rounded-lg border-none card  h-full bg-white 2xl:p-5   dark:bg-gray-800 flex-1 p-8"
            x-data="{ selectedSelector: '{{ $descripcion->nivel }}' }">
            <!-- Formulario -->
            <form action="{{ route('plan_de_negocio.descripciones.update', [$plan_de_negocio, $descripcion]) }}"
                method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="nivel" class="block text-gray-50 font-semibold mb-1">Nivel Organigrama</label>
                    <select @change="selectedSelector = $event.target.value"
                        class="w-full border-gray-300 rounded-md shadow-sm" name="nivel" id="nivel" required>
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
                <label for="reporta_a" class="block text-gray-50 font-semibold mb-1">Reporta a</label>
                <select class="w-full border-gray-300 rounded-md shadow-sm" x-show="selectedSelector === 'Estrategico'"
                    x-bind:name="selectedSelector === 'estrategico' ? 'reporta_a' : null" id="reporta_a">
                    <option value=""></option>
                </select>

                <select class="w-full border-gray-300 rounded-md shadow-sm" x-show="selectedSelector === 'Tactico'"
                    x-bind:name="selectedSelector === 'tactico' ? 'reporta_a' : null" id="reporta_a">
                    @foreach ($estrategicos as $estrategico)
                        <option value="{{ $estrategico->id }}"
                            {{ $descripcion->reporta_a == $estrategico->id ? 'selected' : '' }}>
                            {{ $estrategico->unidad_administrativa }}
                        </option>
                    @endforeach
                </select>

                <select class="w-full border-gray-300 rounded-md shadow-sm" x-show="selectedSelector === 'Operativo'"
                    x-bind:name="selectedSelector === 'operativo' ? 'reporta_a' : null" id="reporta_a">
                    @foreach ($tactico as $tacticos)
                        <option value="{{ $tacticos->id }}"
                            {{ $descripcion->reporta_a == $tacticos->id ? 'selected' : '' }}>
                            {{ $tacticos->unidad_administrativa }}
                        </option>
                    @endforeach
                </select>

                {{-- estrategico  --}}
                <div x-show="selectedSelector === 'Estrategico'" class="mb-4 flex flex-col space-y-4"
                    x-data="{
                        open: false,
                        selectedOptions: @json($descripcion->supervisa_a),
                        < !--Asumiendo que $valoresGuardados es un arreglo de IDs de los elementos ya seleccionados-- >
                        toggleOption(value, text) {
                            if (this.selectedOptions.some(option => option.value === value)) {
                                this.selectedOptions = this.selectedOptions.filter(option => option.value !== value);
                            } else {
                                this.selectedOptions.push({ value, text });
                            }
                        },
                        isSelected(value) {
                            return this.selectedOptions.some(option => option.value === value);
                        },
                        clearSelection() {
                            this.selectedOptions = [];
                        }
                    }" x-effect="if (selectedSelector === 'Estrategico') { clearSelection(); }">

                    <div class="mb-4 flex items-center">
                        <label for="supervisa_a"
                            class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">
                            Supervisa a:
                        </label>
                        <div class="relative w-3/4">
                            <button @click="open = !open" type="button"
                                class="w-full bg-gray-200 border border-gray-300 rounded-lg shadow-sm px-4 py-2 text-left focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <span
                                    x-text="selectedOptions.length > 0 ? selectedOptions.map(option => option.text).join(', ') : 'Seleccione...'"></span>
                                <span
                                    class="absolute inset-y-0 right-0 flex items-center pr-2 text-gray-500">&#x25BC;</span>
                            </button>
                            <div x-show="open" @click.outside="open = false"
                                class="absolute mt-1 w-full bg-white shadow-lg rounded-md border border-gray-300 z-10">
                                <ul class="max-h-60 overflow-auto py-1 text-sm text-gray-700">
                                    @foreach ($tactico as $tactico1)
                                        <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            @click="toggleOption('{{ $tactico1->id }}', '{{ addslashes($tactico1->unidad_administrativa) }}')">
                                            <span class="mr-2">
                                                <input type="checkbox" :checked="isSelected('{{ $tactico1->id }}')"
                                                    class="form-checkbox">
                                            </span>
                                            <span>{{ $tactico1->unidad_administrativa }}</span>
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



                {{-- tactico --}}
                <div x-show="selectedSelector === 'Tactico'" class="mb-4 flex flex-col space-y-4"
                    x-data="{
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
                        },
                        clearSelection() {
                            this.selectedOptions = [];
                        }
                    }" x-effect="if (selectedSelector === 'Tactico') { clearSelection(); }">
                    <div class="mb-4 flex items-center">
                        <label for="supervisa_a"
                            class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">
                            Supervisa a:
                        </label>
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
                                    @foreach ($operativo as $operativo1)
                                        <li class="flex items-center px-4 py-2 hover:bg-gray-100 cursor-pointer"
                                            @click="toggleOption('{{ $operativo1->id }}', '{{ $operativo1->unidad_administrativa }}')">
                                            <span class="mr-2">
                                                <input type="checkbox" :checked="isSelected('{{ $operativo1->id }}')"
                                                    class="form-checkbox">
                                            </span>
                                            <span>{{ $operativo1->unidad_administrativa }}</span>
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

                {{-- final de tactico --}}
                {{-- operativo --}}
                <div x-show="selectedSelector === 'Operativo'" class="mb-4 flex flex-col space-y-4"
                    x-data="{
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
                        },
                        clearSelection() {
                            this.selectedOptions = [];
                        }
                    }" x-effect="if (selectedSelector === 'Tactico') { clearSelection(); }">
                    <div class="mb-4 flex items-center">
                        <label for="supervisa_a"
                            class="w-1/4 bg-gray-200 rounded-lg px-4 py-2 text-gray-950 font-semibold">
                            Supervisa a:
                        </label>
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

                {{-- final de operativo --}}
                <!-- Styled Table to Display Selected Options -->
                <div class="mb-4">
                    <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-gray-100 rounded-t-lg">
                            <tr>
                                <th class="p-2 text-left text-gray-950">Opciones Seleccionadas</th>
                                <th class="p-2 text-left text-gray-950">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="selectedOperativosTableBody" class="divide-y divide-gray-200 bg-white">
                            <!-- Selected options will be dynamically added here -->
                        </tbody>
                    </table>
                </div>

                <!-- JavaScript to Handle Dropdown and Table -->
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        const dropdown = document.getElementById('dropdownOperativos');
                        const tableBody = document.getElementById('selectedOperativosTableBody');
                        const selectedOptions = new Set();

                        // Fetch data to populate dropdown with Operativos
                        const currentSupervisados = @json($descripcion->supervisa_a ?? []); // Los datos actuales seleccionados
                        fetch('/api/supervisa-a?nivel={{ $descripcion->nivel }}')
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Error al obtener los datos');
                                }
                                return response.json();
                            })
                            .then(data => {
                                dropdown.innerHTML = '<option value="" disabled>Selecciona a los que supervisa</option>';
                                data.forEach(item => {
                                    const option = document.createElement('option');
                                    option.value = item.id; // ID del registro
                                    option.textContent = item.unidad_administrativa; // Nombre o descripción

                                    // Marcar como seleccionado si ya está en los supervisados actuales
                                    if (currentSupervisados.includes(item.id)) {
                                        option.selected = true;
                                        addToTable(item.id, item.unidad_administrativa);
                                    }

                                    dropdown.appendChild(option);
                                });
                            })
                            .catch(error => console.error('Error al cargar los datos:', error));

                        dropdown.addEventListener('change', () => {
                            const value = dropdown.value;
                            const text = dropdown.options[dropdown.selectedIndex].text;

                            if (!selectedOptions.has(value)) {
                                selectedOptions.add(value);
                                addToTable(value, text);
                            }

                            dropdown.selectedIndex = 0; // Reset dropdown selection
                        });

                        function addToTable(value, text) {
                            const row = document.createElement('tr');
                            const optionCell = document.createElement('td');
                            optionCell.className = 'p-2 text-gray-950';
                            optionCell.textContent = text;

                            const actionCell = document.createElement('td');
                            actionCell.className = 'p-2';

                            const removeButton = document.createElement('button');
                            removeButton.textContent = 'Eliminar';
                            removeButton.className = 'px-2 py-1 bg-red-500 text-white rounded hover:bg-red-700';
                            removeButton.addEventListener('click', () => {
                                selectedOptions.delete(value);
                                tableBody.removeChild(row);
                            });

                            actionCell.appendChild(removeButton);
                            row.appendChild(optionCell);
                            row.appendChild(actionCell);
                            tableBody.appendChild(row);
                        }
                    });
                </script>


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
