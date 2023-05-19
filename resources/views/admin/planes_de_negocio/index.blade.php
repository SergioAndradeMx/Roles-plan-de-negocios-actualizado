<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between dark:text-gray-100">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('PLANES DE NEGOCIO') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-wrap mx-auto justify-center px-auto dark:text-gray-100 m-8">
    <div class="flex my-2 relative overflow-x-auto shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nombre del plan de negocio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Descripción
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de creación
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Acción
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (sizeof($planes)==0)
                        <tr class="row-span-4 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th colspan = "5" scope="row" class="text-center bh-red px-6 py-8 text-lg text-gray-900 whitespace-nowrap dark:text-gray-400">
                                <div class="">

                                </div>
                            </th>
                        </tr>
                    @else
                        @foreach ($planes as $plan)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $plan->nombre }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $plan->descripcion }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $plan->created_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="inline-flex">
                                        <a href="#" class="inline-flex items-center px-1.5 py-1.5 bg-gray-500 hover:bg-gray-400 dark:bg-gray-700 dark:hover:bg-gray-600 text-white text-sm font-medium rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                                        </a>

                                        <form method="post" action="{{ route('admin_plan_de_negocio.destroy', [$plan->id]) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                onclick="return confirm('El plan de negocio se eliminará igual para el usuario ¿Continuar?');"
                                                class="inline-flex
                                                    items-center 
                                                    px-1.5
                                                    py-1.5
                                                    dark:bg-red-800
                                                    dark:hover:bg-red-700
                                                    text-white
                                                    text-sm
                                                    font-medium
                                                    bg-red-700
                                                    hover:bg-red-600
                                                    rounded-md ml-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

    </div>

    <div class="m-6 grid justify-items-center">
        <div class="w-1/4">
        </div>
    </div>
</x-app-layout>
