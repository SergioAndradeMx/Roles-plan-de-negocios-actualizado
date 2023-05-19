<x-app-layout class="flex flex-nowrap">

    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div>
            <div class="mx-20 flex items-center justify-center">
                <h1 class="dark:text-gray-100 mt-6 text-2xl">Estudios de mercado</h1>
            </div>

            <div class="flex justify-center">
                <a class="float-right my-6 mb-4 inline-flex items-center px-4 py-2 mr-3 text-md font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white"
                    href="{{ route('plan_de_negocio.estudio.create', [$plan_de_negocio])}}">
                    <span class="visible md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </span>            
                    <p class="hidden md:flex ">Nuevo estudio de mercado</p>
                </a>
            </div>
        </div>
    
        <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-4">
            @foreach ($plan_de_negocio->estudios as $estudio)
                <a class="
                    w-full
                    rounded 
                    overflow-hidden 
                    shadow-lg
                    mx-2
                    my-2
                    md:w-1/4
                    dark:bg-gray-700
                    hover:bg-gray-200
                    dark:hover:bg-gray-800"
                    href="{{ route('plan_de_negocio.estudio.show', [$plan_de_negocio, $estudio]) }}"
                    >
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 border-b border-gray-500 pb-2">{{ $estudio->nombre }}</div>
                        <p class="text-base">{{ $estudio->objetivo }}</p>
                        <p class="text-base text-right mt-6">{{ $plan_de_negocio->created_at->format('d/m/Y') }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
