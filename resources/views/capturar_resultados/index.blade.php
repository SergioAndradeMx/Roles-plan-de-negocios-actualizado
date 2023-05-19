<x-app-layout class="flex flex-nowrap">

    <x-second-sidebar :plan_de_negocio="$plan_de_negocio" :estudio="$estudio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div>
            <div class="mx-20 flex items-center justify-center">
                <h1 class="dark:text-gray-100 mt-6 text-2xl">Capturar resultados</h1>
            </div>
        </div>

        <div class="mx-20 flex flex-wrap mb-8 space-y-6 grid justify-items-center">
            <div class="py-6 w-full">
                <div class="bg-gray-800 overflow-hidden sm:rounded-lg w-full">
                    <div class="py-2 px-10 bg-gray-800 w-full">
                        <div class="mb-6">
                            @if (sizeof($estudio->conceptos) == 0)
                                    <p class="text-center text-gray-300 pt-5">Sin registros, agrégalos en el área de conceptos</p>
                            @endif

                            @foreach ($estudio->conceptos as $concepto)
                                <form action="{{ route('plan_de_negocio.estudio.capturar_resultado.update',[$plan_de_negocio, $estudio, $concepto]) }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div x-data="{view: true, edit: false}" class="flex flex-col md:flex-row items-center my-8">
                                        <div class="basis-2/4 mr-4">
                                            <label for="{{ $concepto->concepto }}" class="text-gray-200 text-lg">{{ $concepto->concepto }}</label>
                                        </div>
                                        <textarea name="conclusion" placeholder="Agregar conclusión" rows="4" id="{{ $concepto->concepto }}" x-bind:disabled="view"
                                            class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{
                                                $concepto->conclusion == "" ? "": $concepto->conclusion
                                            }}</textarea>
                                        <div class="mx-4" x-show="view">
                                            <a @click=" view= false, edit= true"  class="text-white text-base bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-3 py-2.5 text-center ml-10 mr-2 md:mr-0">Editar</a>
                                        </div>
                                        <div class="mx-4" x-show="edit">
                                            <button class="mb-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base px-4 py-2.5 my-1 text-center">Guardar</button>
                                            <a @click=" view= true, edit= false"  class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-base px-4 py-2.5 my-1 text-center">Cancelar</a>
                                        </div>
                                    </div>
                                    <hr class="my-8 h-px bg-gray-700 border-0">
                                </form>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>