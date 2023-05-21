@props([
    'plan_de_negocio' => ''
])
<div class="">
    <!--Verificar si el usuario autenticado es admin-->
    @php ($admin = '')
    @if ( auth()->user()->rol == 'admin')
        @php ($admin = 'admin_')
    @endif
    <div class="
        hidden
        w-50
        min-h-screen
        p-4
        md:flex
        dark:bg-gray-800
        dark:text-gray-100"
        >
    
        <aside class="h-full space-y-2 text-base font-normal">
            <div class="flex flex-nowrap space-x-2">
                <a href="{{ route('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M7.28 7.72a.75.75 0 010 1.06l-2.47 2.47H21a.75.75 0 010 1.5H4.81l2.47 2.47a.75.75 0 11-1.06 1.06l-3.75-3.75a.75.75 0 010-1.06l3.75-3.75a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>          
                </a>
                <span>
                    @if ($admin == 'admin_')
                        <p class="bg-red-800 p-1">ERES ADMINISTRADOR</p>
                    @else
                        CIIE
                    @endif
                </span>
            </div>
            
            <!--DROPDOWN-->
            <div class="flex flex-col divide-y divide-gray-600">
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) { return this.close() }
                            this.$refs.button.focus()
                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return
                            this.open = false
                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative"
                    >
                    <!-- Button -->
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="flex w-full justify-center items-center gap-2 p-4 my-1 rounded-md
                        hover:bg-gray-200 hover:dark:bg-gray-700"
                        >
                        Generalidades

                        <!-- Heroicon: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        class="left-0 mt-2 rounded-md m-2"
                        >
                        <a href="{{ route($admin.'plan_de_negocio.generalidades.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Información general de la empresa
                        </a>

                        <a href="{{ route($admin.'plan_de_negocio.foda.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Análisis foda
                        </a>

                        <a href="{{ route($admin.'plan_de_negocio.modelo_canvas.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Modelo canvas
                        </a>

                        <a href="{{ route($admin.'plan_de_negocio.producto.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Producto y/o Servicio
                        </a>
                    </div>
                </div>
                <!--segundo dropdown-->
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) { return this.close() }
                            this.$refs.button.focus()
                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return
                            this.open = false
                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative"
                    >
                    <!-- Button -->
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="flex w-full justify-center items-center gap-2 p-4 my-1 rounded-md
                        hover:bg-gray-200 hover:dark:bg-gray-700"
                        >
                        Administración de recursos

                        <!-- Heroicon: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        class="left-0 mt-2 rounded-md m-2"
                        >
                        <a href="{{ route($admin.'plan_de_negocio.cultura_organizacional.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Cultura organizacional
                        </a>

                        <a href="{{ route($admin.'plan_de_negocio.estructura_legal.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Estructura legal
                        </a>
                    </div>
                </div>

                <!--tercer dropdown-->
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) { return this.close() }
                            this.$refs.button.focus()
                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return
                            this.open = false
                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative"
                    >
                    <!-- Button -->
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        class="flex w-full justify-center items-center gap-2 p-4 my-1 rounded-md
                        hover:bg-gray-200 hover:dark:bg-gray-700"
                        >
                        Imagen corporativa y marketing

                        <!-- Heroicon: chevron-down -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Panel -->
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        class="left-0 mt-2 rounded-md m-2"
                        >
                        <a href="{{ route($admin.'plan_de_negocio.imagen_corporativa.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Imagen de la empresa
                        </a>

                        <a href="{{ route($admin.'plan_de_negocio.publicidad.index',[$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left text-sm hover:bg-gray-200 hover:dark:bg-gray-700 disabled:text-gray-500">
                            Publicidad, promoción y mercadotecnia
                        </a>
                    </div>
                </div>
            </div>
            <!---->
            <!--ESTUDIOS DE MERCADO-->
            <div
                class="relative"
                >
                <!-- Button -->
                <a href="{{ route($admin.'plan_de_negocio.estudio.index', [$plan_de_negocio]) }}" class="flex items-center gap-2 w-full rounded-md px-4 py-2.5 text-left hover:bg-gray-200 hover:dark:bg-gray-600 dark:bg-gray-700 disabled:text-gray-500 flex justify-center">
                    <p>Estudios de mercado</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#b8b8b8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18l6-6-6-6"/></svg>
                </a>
            </div>
        </aside>
    </div>
</div>
