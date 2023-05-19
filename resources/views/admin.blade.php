<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-center dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('ADMINISTRADOR') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-8 space-x-6">
        <!--     primera card -->
        <a href="{{ route('usuarios.index') }}" class="
            w-72
            h-80
            mb-6
            rounded-3xl 
            overflow-hidden
            border-8
            border-gray-300
            dark:border-none
            p-6
            dark:bg-gray-800
            dark:hover:bg-gray-700
            bg-white
            hover:bg-gray-100">
            <div class="content-center grid justify-items-center h-full pb-2">
                <div class="rounded-full p-6 dark:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#c5c5c5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                </div>
                <p class="pt-4 text-center text-gray-500 dark:text-gray-200 text-2xl leading-5 mt-1">Usuarios</p>
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm leading-5 mt-1 border-t-2 border-gray-400 pt-4 dark:border-t-2 dark:border-gray-500 pt-4">Ver a todos los usuarios agregar nuevos, editarlos y eliminarlos</p>
            </div>
        </a>

        <!--  segunda card -->
        <div href="#" class="
            w-72
            h-80
            mb-6
            rounded-3xl 
            overflow-hidden
            border-8
            border-gray-300
            dark:border-none
            p-6
            dark:bg-gray-800
            dark:hover:bg-gray-700
            bg-white
            hover:bg-gray-100">
            <div class="content-center grid justify-items-center h-full pb-2">
                <div class="rounded-full p-6 dark:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#c5c5c5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                </div>
                <p class="pt-4 text-center text-gray-500 dark:text-gray-200 text-2xl leading-5 mt-1">Planes de negocio</p>
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm leading-5 mt-1 border-t-2 border-gray-400 pt-4 dark:border-t-2 dark:border-gray-500 pt-4">Ver planes de negocio y estudios de mercado, editarlos y eliminarlos</p>
            </div>
        </div>

        <!--     tercera card -->
        <div href="#" class="
            w-72
            h-80
            mb-6
            rounded-3xl 
            overflow-hidden
            border-8
            border-gray-300
            dark:border-none
            p-6
            dark:bg-gray-800
            dark:hover:bg-gray-700
            bg-white
            hover:bg-gray-100">
            <div class="content-center grid justify-items-center h-full pb-2">
                <div class="rounded-full p-6 dark:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="#c5c5c5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </div>
                <p class="pt-4 text-center text-gray-500 dark:text-gray-200 text-2xl leading-5 mt-1">Extra</p>
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400 text-sm leading-5 mt-1 border-t-2 border-gray-400 pt-4 dark:border-t-2 dark:border-gray-500 pt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>

    </div>
</x-app-layout>
