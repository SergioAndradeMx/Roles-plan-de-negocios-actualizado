<x-app-layout class="flex flex-nowrap">

    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>
    <div class="w-full h-screen overflow-auto">
        <div class="mx-20 flex items-center justify-center">
            <h1 class="dark:text-gray-100 my-6 text-2xl">Actualizando la estructura legal</h1>
        </div>

        @if ($plan_de_negocio->estructura_legal->tipo_persona == 'Física')
            @php $persona = 'Física'; @endphp
        @else
            @php $persona = 'Moral'; @endphp
        @endif

        @php
            $input_contitucion = $plan_de_negocio->estructura_legal->constitucion_legal;
            $input_regimen = $plan_de_negocio->estructura_legal->regimen_fiscal;
        @endphp

        @php $user_route = ''; @endphp

        @if ( auth()->user()->rol == 'admin')
            @php $user_route = 'admin_'; @endphp
        @elseif ( auth()->user()->rol == 'asesor')
            @php $user_route = 'asesor_'; @endphp
        @endif

        <div class="mx-20 flex flex-col items-center justify-center">
            <form method="POST" action="{{ route($user_route.'plan_de_negocio.estructura_legal.update', [$plan_de_negocio, $estructura_legal]) }}">
                @method('PATCH')
                @csrf
                <div x-data="{ options: ['Física', 'Moral'], selected: @js($persona) }">
                    <label class="text-white">Tipo de persona
                        <select x-model="selected" name="tipo_persona" class="text-gray-800 ml-4 rounded-md"
                        x-on:change="$let = document.querySelectorAll('input'); $let.forEach(element => element.checked = false);">
                            <template x-for="option in options" :key="option">
                                <option
                                    x-bind:value="option" 
                                    x-text="option"
                                    x-bind:selected="option === selected"
                                ></option>
                            </template>
                        </select>
                    </label>
                    
                    <!--Tabla-->
                    <!--Persona fisica-->
                    <div class="flex my-9 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Constitución legal
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Régimen fiscal
                                    </th>
                                </tr>
                            </thead>
                            <tbody x-show="selected == 'Física'">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary" 
                                            type="radio" required
                                            name="constitucion_legal"
                                            id="const_fisica_1"
                                            value="Constitución - Persona Física 1"
                                            />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="const_fisica_1"
                                            >Const fisica 1</label>
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="actividad_empresarial"
                                            value="Actividad Empresarial" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="actividad_empresarial"
                                            >Actividad empresarial</label>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="servicios_profesionales"
                                            value="Servicios Profesionales" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="servicios_profesionales"
                                            >Servicios profesionales</label>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="arrendamiento"
                                            value="Arrendamiento" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="arrendamiento"
                                            >Arrendamiento</label>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="incorporacion_fiscal"
                                            value="Incorporacion Fiscal" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="incorporacion_fiscal"
                                            >Incorporación fiscal</label>
                                    </td>
                                </tr>
                            </tbody>

                            <!--Persona moral-->
                            <tbody x-show="selected == 'Moral'">
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary" 
                                            type="radio" required
                                            name="constitucion_legal"
                                            id="conts_moral_1"
                                            value="Constitución - Persona Moral 1"
                                            />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="conts_moral_1"
                                            >Const moral 1</label>
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="acumlacion_ingresos"
                                            value="Acumulacion de Ingresos" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="acumlacion_ingresos"
                                            >Acumulación de ingresos</label>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        
                                    </td>
                                    <td scope="row" class="px-10 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <input class="relative float-left -ml-[1.5rem] mr-1 mt-0.5 h-5 w-5 appearance-none rounded-full border-2 border-solid border-neutral-300 before:pointer-events-none before:absolute before:h-4 before:w-4 before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] after:absolute after:z-[1] after:block after:h-4 after:w-4 after:rounded-full after:content-[''] checked:border-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:left-1/2 checked:after:top-1/2 checked:after:h-[0.625rem] checked:after:w-[0.625rem] checked:after:rounded-full checked:after:border-primary checked:after:bg-primary checked:after:content-[''] checked:after:[transform:translate(-50%,-50%)] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:border-primary checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:border-neutral-600 dark:checked:border-primary dark:checked:after:border-primary dark:checked:after:bg-primary dark:checked:focus:border-primary"
                                            type="radio" required
                                            name="regimen_fiscal"
                                            id="regimen_general"
                                            value="Régimen General" />
                                        <label class="mt-px inline-block pl-[0.15rem] hover:cursor-pointer" for="regimen_general"
                                            >Régimen general</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-center items-center">
                    <a href="{{ route($user_route.'plan_de_negocio.estructura_legal.index', [$plan_de_negocio]) }}" class="rounded bg-red-500 m-6 px-4 py-2 hover:bg-red-700 dark:text-white">Cancelar</a>
                    {{-- <input  type="submit" value="Crear"> --}}
                    <button class="rounded bg-green-600 m-6 px-4 py-2 hover:bg-green-800 dark:text-white">Actualizar</button>
                </div>
            <form>
        </div>

        <script>
            let all_inputs = document.querySelectorAll('input[type="radio"]');
            all_inputs.forEach(element => {
                if (element.value === "<?php echo $input_contitucion; ?>" || element.value === "<?php echo $input_regimen; ?>"){
                    element.checked = true;
                }
            });
        </script>

</x-app-layout>