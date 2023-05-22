<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Planes de negocio') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-4">
        @if(sizeof($planes) == 0)
            <div class="dark:transparent w-full h-100 flex justify-center">
                <div class="m-10 px-6 py-8 text-2xl text-gray-900 dark:text-gray-400">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#c0c0c0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 21H4a2 2 0 0 1-2-2V5c0-1.1.9-2 2-2h5l2 3h9a2 2 0 0 1 2 2v2M21.12 15.88l-4.24 4.24M16.88 15.88l4.24 4.24"/></svg>                    </div>
                    <p class="text-center w-full">  
                        Usuario sin planes de negocio
                    </p>
                </div>
            </div>
        @else
            @foreach ($planes as $plan_de_negocio)
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
                    href="{{ route('admin_plan_de_negocio.generalidades.index', [$plan_de_negocio]) }}"
                    >
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 border-b border-gray-500 pb-2">{{ $plan_de_negocio->nombre }}</div>
                        <p class="text-base">{{ $plan_de_negocio->descripcion }}</p>
                        <p class="text-base text-right mt-6">{{ $plan_de_negocio->created_at->format('d/m/Y') }}</p>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</x-app-layout>