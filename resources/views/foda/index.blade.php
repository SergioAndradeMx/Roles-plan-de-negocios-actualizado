<x-app-layout class="flex flex-nowrap">
    <x-sidebar :plan_de_negocio="$plan_de_negocio"></x-sidebar>
    <div class="w-full">
        <div class="flex items-center justify-center">
            <h1 class="dark:text-gray-100 py-6 text-slate-700 font-bold text-2xl">Foda de la empresa</h1>
        </div>

        <div class="mx-20 bg-white p-6 dark:bg-gray-900 grid gap-x-10 gap-y-10 grid-cols-2 grid-rows-2 dark:text-gray-300">
            
            <div class="border divide-y divide-gray-500 rounded-md border-neutral-200 dark:border-none">
                <div class="flex items-stretch justify-center bg-gray-200 dark:bg-gray-700 space-x-2 rounded-t-md">
                    <x-foda.insert tipo="Fortalezas"></x-foda.insert>
                </div>
                <div class="flex flex-col divide-y divide-gray-400 bg-slate-200 dark:bg-gray-800 rounded-b-md">
                    @if(count($foda_data['fortalezas'])>0)                        
                        @foreach($foda_data['fortalezas'] as $fortaleza)
                        <div x-data="{ open: false }" class="flex items-center py-4 px-6 space-x-2">
                            <div>
                                <span :class="!open ? '' : 'hidden'">{{ $fortaleza->descripcion }}</span>
                            </div>
                            <div class="flex">
                                <button :class="!open ? '' : 'hidden'" type="button" @click="open = !open">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M16.7574 2.99666L14.7574 4.99666H5V18.9967H19V9.2393L21 7.2393V19.9967C21 20.5489 20.5523 20.9967 20 20.9967H4C3.44772 20.9967 3 20.5489 3 19.9967V3.99666C3 3.44438 3.44772 2.99666 4 2.99666H16.7574ZM20.4853 2.09717L21.8995 3.51138L12.7071 12.7038L11.2954 12.7062L11.2929 11.2896L20.4853 2.09717Z" />
                                    </svg>
                                </button>
                                <x-foda.update x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$fortaleza"></x-foda.update>
                                <x-foda.delete x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$fortaleza"></x-foda.delete>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="mx-auto pl-2 py-5"></div>
                    @endif
                </div>
            </div>

            <div class="border divide-y divide-gray-500 rounded-md border-neutral-200 dark:border-none">
                <div class="flex items-stretch justify-center bg-gray-200 dark:bg-gray-700 space-x-2 rounded-t-md">
                    <x-foda.insert tipo="Debilidades"></x-foda.insert>
                </div>
                <div class="flex flex-col divide-y divide-gray-500 bg-slate-200 dark:bg-gray-800 rounded-b-md">
                    @if(count($foda_data['debilidades']) > 0)
                        @foreach($foda_data['debilidades'] as $debilidad)
                            <div x-data="{ open: false }" class="flex items-center py-4 px-6 space-x-2">
                                <div>
                                    <span :class="!open ? '' : 'hidden'">{{ $debilidad->descripcion }}</span>
                                </div>
                                <div class="flex">
                                    <button :class="!open ? '' : 'hidden'" type="button" @click="open = !open">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M16.7574 2.99666L14.7574 4.99666H5V18.9967H19V9.2393L21 7.2393V19.9967C21 20.5489 20.5523 20.9967 20 20.9967H4C3.44772 20.9967 3 20.5489 3 19.9967V3.99666C3 3.44438 3.44772 2.99666 4 2.99666H16.7574ZM20.4853 2.09717L21.8995 3.51138L12.7071 12.7038L11.2954 12.7062L11.2929 11.2896L20.4853 2.09717Z" />
                                        </svg>
                                    </button>
                                    <x-foda.update x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$debilidad"></x-foda.update>
                                    <x-foda.delete x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$debilidad"></x-foda.delete>
                                </div>     
                            </div>
                        @endforeach
                    @else
                        <div class="mx-auto pl-2 py-5"></div>
                    @endif
                </div>
            </div>

            <div class="border divide-y divide-gray-500 rounded-md border-neutral-200 dark:border-none">
                <div class="flex items-stretch justify-center bg-gray-200 dark:bg-gray-700 space-x-2 rounded-t-md">
                    <x-foda.insert tipo="Amenazas"></x-foda.insert>
                </div>
                <div class="flex flex-col divide-y divide-gray-500 bg-slate-200 dark:bg-gray-800 rounded-b-md">
                    @if(count($foda_data['amenazas'])>0)
                        @foreach($foda_data['amenazas'] as $amenaza)
                            <div x-data="{ open: false }" class="flex items-center py-4 px-6 space-x-2">
                                <div>
                                    <span :class="!open ? '' : 'hidden'">{{ $amenaza->descripcion }}</span>
                                </div>
                                <div class="flex">
                                    <button :class="!open ? '' : 'hidden'" type="button" @click="open = !open">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M16.7574 2.99666L14.7574 4.99666H5V18.9967H19V9.2393L21 7.2393V19.9967C21 20.5489 20.5523 20.9967 20 20.9967H4C3.44772 20.9967 3 20.5489 3 19.9967V3.99666C3 3.44438 3.44772 2.99666 4 2.99666H16.7574ZM20.4853 2.09717L21.8995 3.51138L12.7071 12.7038L11.2954 12.7062L11.2929 11.2896L20.4853 2.09717Z" />
                                        </svg>
                                    </button>
                                    <x-foda.update x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$amenaza"></x-foda.update>
                                    <x-foda.delete x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$amenaza"></x-foda.delete>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mx-auto pl-2 py-5"></div>
                    @endif
                </div>
                
            </div>

            <div class="border divide-y divide-gray-500 rounded-md border-neutral-200 dark:border-none">
                <div class="flex items-stretch justify-center bg-gray-200 dark:bg-gray-700 space-x-2 rounded-t-md">
                    <x-foda.insert tipo="Oportunidades"></x-foda.insert>
                </div>
                <div class="flex flex-col divide-y divide-gray-500 bg-slate-200 dark:bg-gray-800 rounded-b-md">
                    @if(count($foda_data['oportunidades'])>0)
                        @foreach($foda_data['oportunidades'] as $oportunidad)
                            <div x-data="{ open: false }" class="flex items-center py-4 px-6 space-x-2">
                                <div>
                                    <span :class="!open ? '' : 'hidden'">{{ $oportunidad->descripcion }}</span>
                                </div>
                                <div class="flex">
                                    <button :class="!open ? '' : 'hidden'" type="button" @click="open = !open">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M16.7574 2.99666L14.7574 4.99666H5V18.9967H19V9.2393L21 7.2393V19.9967C21 20.5489 20.5523 20.9967 20 20.9967H4C3.44772 20.9967 3 20.5489 3 19.9967V3.99666C3 3.44438 3.44772 2.99666 4 2.99666H16.7574ZM20.4853 2.09717L21.8995 3.51138L12.7071 12.7038L11.2954 12.7062L11.2929 11.2896L20.4853 2.09717Z" />
                                        </svg>
                                    </button>
                                    <x-foda.update x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$oportunidad"></x-foda.update>
                                    <x-foda.delete x-show="open" :plan_de_negocio="$plan_de_negocio" :foda="$oportunidad"></x-foda.delete>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mx-auto pl-2 py-5"></div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>