<x-app-layout class="flex flex-nowrap">

    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>
    
    <div class="w-full">
        <div class="flex items-center justify-center">
            <h1 class="dark:text-gray-100 py-6 text-2xl">Ingrese el producto/servicio nuevo</h1>
        </div>

        <form method="POST" action="{{ route('plan_de_negocio.producto.store', [$plan_de_negocio]) }}">
            @csrf
            <div class="md:w-full py-4">
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="nombre" class="dark:text-white">Nombre del producto</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="nombre" id="nombre" value="{{old('nombre')}}" class="md:w-1/2">
                </div>
                
                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="precio_de_costo" class="dark:text-white">Precio de costo</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="precio_de_costo" id="precio_de_costo" value="{{old('precio_de_costo')}}" class="md:w-1/2">
                </div>

                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="precio_de_venta" class="dark:text-white">Precio de venta</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="precio_de_venta" id="precio_de_venta" value="{{old('precio_de_venta')}}" class="md:w-1/2">
                </div>

                <div class="flex flex-wrap justify-center items-center my-2 md:flex-nowrap md:space-x-2 md:mb-4">
                    <label class="text-white md:w-1/4" for="descripcion" class="dark:text-white">Descripción</label>
                    <input class="rounded bg-gray-300 md:w-1/3" type="text" name="descripcion" id="descripcion" value="{{old('descripcion')}}" class="md:w-1/2">
                </div>

                <div class="flex justify-center items-center"> 
                    <a href="{{ route('plan_de_negocio.producto.index', [$plan_de_negocio]) }}" class="rounded bg-red-500 m-6 px-4 py-2 hover:bg-red-700 dark:text-white">Cancelar</a>
                    {{-- <input  type="submit" value="Crear"> --}}
                    <button class="rounded bg-blue-500 m-6 px-4 py-2 hover:bg-blue-700 dark:text-white">Crear</button> 
                </div>
            </div>
        </form>

    </div>

</x-app-layout>