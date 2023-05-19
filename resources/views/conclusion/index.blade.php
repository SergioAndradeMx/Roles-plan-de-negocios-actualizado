<x-app-layout class="flex flex-nowrap">

    <x-second-sidebar :plan_de_negocio="$plan_de_negocio" :estudio="$estudio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div>
            <div class="mx-20 flex items-center justify-center">
                <h1 class="dark:text-gray-100 mt-6 text-2xl">Conclusion del estudio de mercado</h1>
            </div>

            <div class="flex justify-center">
                <a href="#" id="btn_editar">
                    <button class="float-right my-6 mb-4 inline-flex items-center px-4 py-2 mr-3 text-md font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white" name="check" id="check" value="1" onclick="javascript:showContent()">
                        Editar
                    </button>
                </a>
                <a href="{{ route('plan_de_negocio.estudio.conclusion.create',[$plan_de_negocio, $estudio]) }}" id="btn_crear" style="display: none">
                    <button class="float-right my-6 mb-4 inline-flex items-center px-4 py-2 mr-3 text-md font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white" name="check" id="check" value="1">
                        Crear conclusion
                    </button>
                </a>
            </div>
        </div>

        <div class="mx-20 flex flex-wrap mb-8 space-y-6 grid justify-items-center">
            <div class="py-8 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden sm:rounded-lg">
                        <div class="p-6 dark:bg-gray-800 bg-red-800">
                            
                            <div id="conclusion_txt" class="text-base">
                                @if ($estudio->conclusion == null)

                                    <p class="text-center text-gray-200 text-base">Aún no tienes una conclusion</p>
                                        <script type="text/javascript">
                                            btn_edit = document.getElementById("btn_editar").style.display = 'none';
                                            btn_crear = document.getElementById("btn_crear").style.display = 'block';
                                        </script>

                                    @else

                                    <p class="text-gray-200">{{ $estudio->conclusion->conclusion }}</p>
                                        <script type="text/javascript">
                                            btn_edit = document.getElementById("btn_editar").style.display = 'block';
                                            btn_crear = document.getElementById("btn_crear").style.display = 'none';
                                        </script>
                                @endif
                            </div>

                            <div id="edit" style="display: none;" class="">
                                @if ($estudio->conclusion != null)
                                    <form method="POST" action="{{ route('plan_de_negocio.estudio.conclusion.update', [$plan_de_negocio, $estudio, $estudio->conclusion]) }}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="mb-6">
                                            <label for="conclusion" class="block mb-2 text-lg text-center font-medium text-gray-200">Actualizar conclusión</label>
                                            <textarea name="conclusion" id="conclusion" rows="8" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                                            placeholder="Ingrese la conclusión del estudio a la que se llegó tras hacer las investigaciones">@if ($estudio->conclusion == null)Aun no tienes una conclusion @else{{ $estudio->conclusion['conclusion'] }}@endif</textarea>
                                            @error('objetivo')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                
                                        <button type="submit" class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base w-full sm:w-auto px-5 py-2.5 text-center">Actualizar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <script type="text/javascript">
        function showContent() {
            form_edit = document.getElementById("edit");
            conclusion_txt = document.getElementById("conclusion_txt");
            if (form_edit.style.display == 'none') {
                form_edit.style.display='block';
                conclusion_txt.style.display='none';
            }
            else {
                form_edit.style.display='none';
                conclusion_txt.style.display='block';
            }
        }
    </script>
</x-app-layout>