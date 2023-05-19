<x-app-layout class="flex flex-nowrap">

    <x-second-sidebar :plan_de_negocio="$plan_de_negocio" :estudio="$estudio"></x-sidebar>

    <div class="w-full h-screen overflow-auto">
        <div>
            <div class="mx-20 flex items-center justify-center">
                <h1 class="dark:text-gray-100 mt-6 text-2xl">Conceptos del estudio</h1>
            </div>

            <div class="flex justify-center">
                <a class="float-right my-6 mb-4 inline-flex items-center px-4 py-2 mr-3 text-md font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-white"
                    href="{{ route('plan_de_negocio.estudio.concepto.create', [$plan_de_negocio, $estudio]) }}">
                    <span class="visible md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                    </span>            
                    <p class="hidden md:flex ">Nuevo concepto</p>
                </a>
            </div>
        </div>

        <div class="mx-20 flex flex-wrap mb-8 space-y-6 grid justify-items-center">
            <div class="py-2 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden sm:rounded-lg">
                        <div class="p-6 dark:bg-gray-900">
                            <div class="mb-6 grid divide-y divide-gray-700 grid-flow-row auto-rows-min md:auto-rows-max dark:bg-gray-800 rounded-xl pl-10 pr-6 pb-4 pt-8">
                                @if (sizeof($estudio->conceptos) == 0)
                                    <p class="text-center text-gray-300 pr-4 pb-4">Aún no tienes conceptos agregados</p>
                                @endif

                                @if ($estudio->conceptos != null)
                                    @foreach ($estudio->conceptos as $concepto)
                                        <div x-data="{ view: true, edit: false }" class="mb-6 mr-6">
                                            <form
                                                action="{{ route('plan_de_negocio.estudio.concepto.update', [$plan_de_negocio, $estudio, $concepto]) }}"
                                                method="post">
                                                @csrf
                                                @method('patch')
                                                <div class="flex items-center justify-between my-4">
                                                    <div x-show="view" class="mr-12 text-md mt-4">
                                                        <p class="text-lg dark:text-gray-300">{{ $concepto->concepto }}</p>
                                                    </div>
                                                    <div x-show="edit" class="w-full">
                                                        <input type="text" name="concepto"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                                            value="{{ $concepto->concepto }}">
                                                        <div class="flex flex space-x-4 mt-6">
                                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Actualizar</button>
                                                                <a @click="edit= false, view= true" class="cursor-pointer text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                    Cancelar
                                                                </a>
                                                        </div>
                                                    </div>
                                                    <div x-show="view">
                                                        <a @click=" edit= true, view= false" class="hover:bg-gray-100 hover:text-sky-700 dark:text-sky-400 ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>