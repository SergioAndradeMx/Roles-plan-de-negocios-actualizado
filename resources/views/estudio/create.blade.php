<x-app-layout>
    @php $user_route = ''; @endphp

    @if ( auth()->user()->rol == 'admin')
        @php $user_route = 'admin_'; @endphp
    @elseif ( auth()->user()->rol == 'asesor')
        @php $user_route = 'asesor_'; @endphp
    @endif

    <form method="POST" action="{{ route($user_route.'plan_de_negocio.estudio.store', [$plan_de_negocio]) }}">
        @csrf
        <div class="md:w-full py-4">
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                <label class="text-white md:w-1/4" for="nombre" class="dark:text-white">Nombre del estudio</label>
                <input class="rounded bg-gray-300 md:w-1/2" required type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="md:w-1/2">
            </div>
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                <label class="text-white md:w-1/4" for="objetivo" class="dark:text-white">Objetivo del estudio de mercado</label>
                <textarea name="objetivo" id="objetivo"
                    class="rounded bg-gray-300 md:w-1/2 md:h-40" required
                >{{old('objetivo')}}</textarea>
            </div>
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                <label class="text-white md:w-1/4" for="objetivos_especificos" class="dark:text-white">Objetivo específicos del estudio de mercado</label>
                <textarea name="objetivos_especificos" id="objetivos_especificos"
                    class="rounded bg-gray-300 md:w-1/2 md:h-40" required
                >{{old('objetivos_especificos')}}</textarea>
            </div>
            <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                <label class="text-white md:w-1/4" for="especificacion" class="dark:text-white">Especificación del estudio de mercado</label>
                <textarea name="especificacion" id="especificacion"
                    class="rounded bg-gray-300 md:w-1/2 md:h-40" required
                >{{old('especificacion')}}</textarea>
            </div>

            <div class="flex justify-center items-center"> 
                <a href="{{ route($user_route.'plan_de_negocio.estudio.index', [$plan_de_negocio]) }}" class="rounded bg-red-500 m-6 px-4 py-2 hover:bg-red-700 dark:text-white">Cancelar</a>
                {{-- <input  type="submit" value="Crear"> --}}
                <button class="rounded bg-blue-500 m-6 px-4 py-2 hover:bg-blue-700 dark:text-white">Crear</button> 
            </div>
        </div>
    </form>
</x-app-layout>