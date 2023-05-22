<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Asesor') }}
            </h2>
            <a class="flex flex-nowrap md:rounded-md dark:md:bg-gray-700 md:p-2" href="{{ route('grupos_de_trabajo.create')}}">
                <span class="visible md:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </span>            
                <p class="hidden md:flex ">Nuevo grupo de trabajo</p>
            </a>
        </div>
    </x-slot>

    <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-4">
        <div class="w-full border-b-2 border-gray-800 mx-8">
            <p class="text-2xl font-bold text-center p-4">Tus grupos de trabajo</p>
        </div>
        @if (sizeof($grupos) == 0)
            <div class="dark:transparent w-full h-100 flex justify-center">
                <div class="m-10 px-6 py-8 text-2xl text-gray-900 dark:text-gray-400">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24" fill="none" stroke="#c0c0c0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                       
                         
                    </div>
                    <p class="text-center w-full">  
                        Agrega un nuevo grupo para añadir usuarios +
                    </p>
                </div>
            </div>
        @else
            @foreach ($grupos as $grupo)
                <a class="
                    w-full
                    rounded 
                    overflow-hidden 
                    shadow-lg
                    mx-4
                    mt-6
                    md:w-1/4
                    dark:bg-gray-700
                    hover:bg-gray-200
                    dark:hover:bg-gray-800"
                    href="{{ route('grupo.show', [$grupo]) }}"
                    >
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2 border-b border-gray-500 pb-2">{{ $grupo->nombre_grupo }}</div>
                        <p class="text-base">{{ $grupo->descripcion }}</p>
                        <p class="text-base text-right mt-6">{{ $grupo->created_at->format('d/m/Y') }}</p>
                    </div>
                </a>
            @endforeach
        @endif
    </div>
</x-app-layout>
