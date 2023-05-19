<x-app-layout class="flex flex-nowrap">

    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div class="flex items-center justify-center">
            <h1 class="dark:text-gray-100 py-6 text-2xl">Información general del negocio</h1>
        </div>
 
        @if (request()->get('seccion') == null)
            @php $seccion='Antecedentes'; @endphp
        @else
            @php ($seccion = request()->get('seccion')) @endphp
        @endif

        <div class="mx-20 flex flex-wrap mb-8 space-y-6 grid justify-items-center" x-data="{seccion: @js($seccion) }">
            <!-- Navegacion de las generalidades -->
            <div class="md:justify-strech md:grid-flow-col md:grid sm:flex sm:flex-row w-full rounded-xl bg-gray-800 p-2 mb-6">
                <div>
                    <input id="1" class="peer hidden" name="option" type="radio" value="Antecedentes" x-model="seccion">
                    <label for="1" class="text-white block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-gray-600 peer-checked:font-bold peer-checked:text-white">
                        Antecedentes</label>  
                </div>
                    
                <div>
                    <input id="2" class="peer hidden" name="option" type="radio" value="Producto"  x-model="seccion">
                    <label for="2" class="text-white block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-gray-600 peer-checked:font-bold peer-checked:text-white">
                        Producto y/o servicio</label>
                </div>
                    
                <div>
                    <input id="3" class="peer hidden" name="option" type="radio" value="Aspectos" x-model="seccion">
                    <label for="3" class="text-white block cursor-pointer select-none rounded-xl p-2 text-center peer-checked:bg-gray-600 peer-checked:font-bold peer-checked:text-white">
                        Aspectos innovadores</label>
                </div>
            </div>

            <!--Seccion de las generalidades-->
            @php $registro = $plan_de_negocio->generalidades; @endphp

            <div id="Antecedentes" class="w-[calc(100%-6rem)]" x-show="seccion == $el.id">
                <!--Antecedentes-->
                @if ($registro)
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.update', [$plan_de_negocio, $plan_de_negocio->generalidades]) }}">
                        @method('PATCH')
                @else
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.store', [$plan_de_negocio]) }}">
                @endif
                    @csrf
                    <header class="flex w-full items-center justify-between p-4 dark:bg-gray-800 rounded-t-lg">
                        <span class="dark:text-gray-50">Antecedentes</span>
                        <div class="flex inline-flex">
                            <input x-show="show" type="submit" value="Guardar" class="cursor-pointer mr-4 text-white flex items-center space-x-2 rounded p-2 dark:bg-green-800 dark:hover:bg-green-900">
                            <div @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="cursor-pointer text-white flex items-center space-x-2 rounded p-2 dark:bg-gray-600 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                            </div>
                        </div>
                    </header>
                    <div class="flex w-full dark:bg-gray-700 rounded-b-lg">
                        <div class="h-fit w-full space-y-1 divide-y-2 p-4">
                            @if($registro) <div x-show="!show" class="text-gray-50">{{ $plan_de_negocio->generalidades->antecedentes }}</div>
                                <textarea x-show="show" name="antecedentes" id="antecedentes" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"
                                >{{ $plan_de_negocio->generalidades->antecedentes }}</textarea> 
                            @else
                            <textarea x-show="show" name="antecedentes" id="antecedentes" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"></textarea> 
                            @endif
                        </div>
                    </div>
                </form> 
                @if ($registro && $registro->antecedentes) 
                <form method="post" action="{{ route('plan_de_negocio.generalidades.destroy', [$plan_de_negocio, $plan_de_negocio->generalidades->antecedentes]) }}">
                    @method('delete')
                    @csrf
                    <div class="grid justify-items-center m-6">
                        <button name="action" value="antecedentes" type="submit" onclick="return confirm('¿Seguro que quieres borrar este registro?');" class="inline-flex items-center px-2.5 py-2.5 bg-red-700 hover:bg-red-800 text-white text-md font-medium rounded-md ml-2">
                            Eliminar <svg class = "ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </div>
                </form>@endif
            </div>

            <div id="Producto" class="w-[calc(100%-6rem)]" x-show="seccion == $el.id">
                <!--Descripcion de producto/servicio-->
                @if ($registro)
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.update', [$plan_de_negocio, $plan_de_negocio->generalidades]) }}">
                    @method('PATCH')
                @else
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.store', [$plan_de_negocio]) }}">
                @endif
                    @csrf
                    <header class="flex w-full items-center justify-between p-4 dark:bg-gray-800 rounded-t-lg">
                        <span class="dark:text-gray-50">Descripción general del producto y/o servicio</span>
                        <div class="flex inline-flex">
                            <input x-show="show" type="submit" value="Guardar" class="cursor-pointer mr-4 text-white flex items-center space-x-2 rounded p-2 dark:bg-green-800 dark:hover:bg-green-900">
                            <div @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="cursor-pointer text-white flex items-center space-x-2 rounded p-2 dark:bg-gray-600 dark:hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                            </div>
                        </div>
                    </header>
                    <div class="flex w-full dark:bg-gray-700 rounded-b-lg">
                        <div class="h-fit w-full space-y-1 divide-y-2 p-4">
                            @if ($registro)<div x-show="!show" class="text-gray-50">{{ $plan_de_negocio->generalidades->descripcion_producto }}</div>
                                <textarea x-show="show" name="descripcion_producto" id="descripcion_producto" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"
                                >{{ $plan_de_negocio->generalidades->descripcion_producto }}</textarea>
                            @else
                                <textarea x-show="show" name="descripcion_producto" id="descripcion_producto" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"></textarea> 
                            @endif
                        </div>
                    </div>
                </form> 
                @if ($registro && $registro->descripcion_producto) 
                <form method="post" action="{{ route('plan_de_negocio.generalidades.destroy', [$plan_de_negocio, $plan_de_negocio->generalidades]) }}">
                    @method('delete')
                    @csrf
                    <div class="grid justify-items-center m-6">
                        <button name="action" value="producto" type="submit" onclick="return confirm('¿Seguro que quieres borrar este registro?');" class="inline-flex items-center px-2.5 py-2.5 bg-red-700 hover:bg-red-800 text-white text-md font-medium rounded-md ml-2">
                            Eliminar <svg class = "ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </div>
                </form>@endif
            </div>

            <div id="Aspectos" class="w-[calc(100%-6rem)]" x-show="seccion == $el.id">
                <!--Aspectos innovadores-->
                @if ($registro)
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.update', [$plan_de_negocio, $plan_de_negocio->generalidades]) }}">
                        @method('PATCH')
                @else
                    <form method="POST" x-data="{ show: false }" class="w-full" action="{{ route('plan_de_negocio.generalidades.store', [$plan_de_negocio]) }}">
                @endif
                    @csrf
                    <header class="flex w-full items-center justify-between p-4 dark:bg-gray-800 rounded-t-lg">
                        <span class="dark:text-gray-50">Aspectos innovadores</span>
                        <div class="flex inline-flex">
                            <input x-show="show" type="submit" value="Guardar" class="cursor-pointer mr-4 text-white flex items-center space-x-2 rounded p-2 dark:bg-green-800 dark:hover:bg-green-900">
                            <div @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }" class="cursor-pointer text-white flex items-center space-x-2 rounded p-2 dark:bg-gray-600 dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                            </div>
                        </div>
                    </header>
                    <div class="flex w-full dark:bg-gray-700 rounded-b-lg">
                        <div class="h-fit w-full space-y-1 divide-y-2 p-4">
                            @if ($registro)
                                <div x-show="!show" class="text-gray-50">{{ $plan_de_negocio->generalidades->aspectos_innovadores }}</div>
                                <textarea x-show="show" name="aspectos_innovadores" id="aspectos_innovadores" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"
                                >{{ $plan_de_negocio->generalidades->aspectos_innovadores }}</textarea>
                            @else
                                <textarea x-show="show" name="aspectos_innovadores" id="aspectos_innovadores" class="rounded bg-gray-300 caret-black focus:border-blue-700 dark:focus:border-blue-700 w-full"></textarea>
                            @endif
                        </div>
                    </div>
                </form> 
                @if ($registro && $registro->aspectos_innovadores) 
                <form method="post" action="{{ route('plan_de_negocio.generalidades.destroy', [$plan_de_negocio, $plan_de_negocio->generalidades]) }}">
                    @method('delete')
                    @csrf
                    <div class="grid justify-items-center m-6">
                        <button name="action" value="aspectos" type="submit" onclick="return confirm('¿Seguro que quieres borrar este registro?');" class="inline-flex items-center px-2.5 py-2.5 bg-red-700 hover:bg-red-800 text-white text-md font-medium rounded-md ml-2">
                            Eliminar <svg class = "ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                        </button>
                    </div>
                </form>@endif
            </div>
        </div>
    </div>
</x-app-layout>