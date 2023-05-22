<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Planes de negocio') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-4">
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
                href="{{ route('asesor_plan_de_negocio.generalidades.index', [$plan_de_negocio]) }}"
                >
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 border-b border-gray-500 pb-2">{{ $plan_de_negocio->nombre }}</div>
                    <p class="text-base">{{ $plan_de_negocio->descripcion }}</p>
                    <p class="text-base text-right mt-6">{{ $plan_de_negocio->created_at->format('d/m/Y') }}</p>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>