<x-app-layout class="flex flex-nowrap">

    <x-second-sidebar :plan_de_negocio="$plan_de_negocio" :estudio="$estudio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div>
            <div class="mx-20 flex items-center justify-center">
                <h1 class="dark:text-gray-100 mt-6 text-2xl">Encuestas del estudio de mercado</h1>
            </div>

            <div class="flex justify-center">
                <a class="float-right my-6 mb-4 inline-flex items-center px-4 py-2 mr-3 text-md font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white"
                    href="{{ route('plan_de_negocio.estudio.encuesta.create', [$plan_de_negocio, $estudio]) }}">
                    <span class="visible md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </span>            
                    <p class="hidden md:flex ">Nueva encuesta</p>
                </a>
            </div>
        </div>

        <div class="mx-20 flex flex-wrap mb-8 space-y-6 grid">
            <div class="pb-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-gray-800 rounded-xl overflow-hidden my-8">
                        <div class="bg-gray-800">
                            <div class="mb-6">
                            @if (sizeof($estudio->encuestas) == 0)
                                    <p class="text-center text-gray-300 pt-7 pb-2">No tienes encuestas guardadas</p>
                            @endif

                                @foreach ($estudio->encuestas as $encuesta)
                                    <div class="p-6 mb-3 max-w-auto bg-gray-800 rounded-lg shadow-md">
                                        <h6 class="mb-4 pb-2 border-b-4 border-gray-700 font-bold tracking-tight text-gray-200 text-xl">{{ $encuesta->titulo }}</h6>
                                        <p class="mb-3 font-normal text-gray-200 text-lg">{{ $encuesta->descripcion }}</p>
                                        <div class="flex justify-center space-x-4">
                                            <a href="{{ route('plan_de_negocio.estudio.encuesta.show', [$plan_de_negocio, $estudio, $encuesta]) }}" class="inline-flex items-center py-2 px-3 text-md font-bold text-center text-white bg-blue-800 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                Ver mas
                                                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </a>
                                            <form class="eliminar" action="{{ route('plan_de_negocio.estudio.encuesta.destroy',[$plan_de_negocio, $estudio, $encuesta])  }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('¿Seguro que quieres borrar esta encuesta?')" href="{{ route('plan_de_negocio.estudio.encuesta.destroy', [$plan_de_negocio, $estudio, $encuesta]) }}" class="inline-flex items-center py-2 px-3 text-md font-bold text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    Eliminar
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d8d8d8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>