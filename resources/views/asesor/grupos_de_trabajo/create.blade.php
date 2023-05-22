<x-app-layout class="flex flex-nowrap">
    
    <div class="w-full">
        <div class="flex items-center justify-center">
            <h1 class="dark:text-gray-100 py-6 text-2xl">Ingrese el nuevo grupo de trabajo</h1>
        </div>

        <form method="POST" action="{{ route('grupos_de_trabajo.store') }}">
            @csrf
            <div class="md:w-full py-4">
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="nombre_grupo" class="dark:text-white">Nombre del grupo</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="nombre_grupo" id="nombre_grupo" value="{{old('nombre_grupo')}}" class="md:w-1/2">
                </div>
                
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="descripcion" class="dark:text-white">Descripción del grupo</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" class="md:w-1/2">
                </div>

                <div class="flex justify-center items-center"> 
                    <a href="{{ route('asesor.dashboard') }}" class="rounded bg-red-500 m-6 px-4 py-2 hover:bg-red-700 dark:text-white">Cancelar</a>
                    {{-- <input  type="submit" value="Crear"> --}}
                    <button class="rounded bg-blue-500 m-6 px-4 py-2 hover:bg-blue-700 dark:text-white">Crear</button> 
                </div>
            </div>
        </form>

    </div>

</x-app-layout>