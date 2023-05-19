<x-app-layout class="flex flex-nowrap">

    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>
    <div class="w-full">
        <div class="flex items-center justify-center">
            <h1 class="dark:text-gray-100 py-6 text-2xl mr-5">
                Actualiza los datos del producto/servicio
            </h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
        </div>

        <form method="POST" action="{{ route('plan_de_negocio.producto.update', [$plan_de_negocio, $producto]) }}">
            @method('PATCH')
            @csrf
            <div class="md:w-full py-4">
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="nombre" class="dark:text-white">Nombre del producto</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="nombre" id="nombre" value="{{ $producto->nombre }}" class="md:w-1/2">
                </div>
                
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="precio_de_costo" class="dark:text-white">Precio de costo</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="precio_de_costo" id="precio_de_costo" value="{{ $producto->precio_de_costo }}" class="md:w-1/2">
                </div>

                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="precio_de_venta" class="dark:text-white">Precio de venta</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="precio_de_venta" id="precio_de_venta" value="{{ $producto->precio_de_venta }}" class="md:w-1/2">
                </div>

                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="descripcion" class="dark:text-white">Descripcion</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="descripcion" id="descripcion" value="{{ $producto->descripcion }}" class="md:w-1/2">
                </div>

                <div class="flex justify-center items-center">
                    <a href="{{ route('plan_de_negocio.producto.index', [$plan_de_negocio]) }}" class="rounded bg-red-500 m-6 px-4 py-2 hover:bg-red-700 dark:text-white">Cancelar</a>
                    {{-- <input  type="submit" value="Crear"> --}}
                    <button class="rounded bg-green-600 m-6 px-4 py-2 hover:bg-green-800 dark:text-white">Actualizar</button>
                </div>
            </div>
        </form>

    </div>

</x-app-layout>