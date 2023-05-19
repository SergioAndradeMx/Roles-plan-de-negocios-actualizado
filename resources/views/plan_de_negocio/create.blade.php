<x-app-layout>
    <form method="POST" action="{{ route('plan_de_negocio.store') }}">
        @csrf
        <div class="md:w-full py-4">
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                <label class="text-white md:w-1/4" for="nombre" class="dark:text-white">Nombre del negocio</label>
                <input class="rounded bg-gray-300 md:w-1/2" type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="md:w-1/2">
            </div>
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-2">
                <label class="text-white md:w-1/4" for="descripcion" class="dark:text-white">Descripción del plan de negocio</label>
                <textarea name="descripcion" id="descripcion"
                    class="rounded bg-gray-300 md:w-1/2 md:h-40"
                >{{old('descripcion')}}</textarea>
            </div>
            <div class="flex justify-center items-center">
                {{-- <input  type="submit" value="Crear"> --}}
                <button class="rounded bg-blue-500 px-4 py-2 hover:bg-blue-700 dark:text-white">Crear</button>
            </div>
        </div>
    </form>
</x-app-layout>