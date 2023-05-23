@props([
    'plan_de_negocio' => '',
    'foda' => '',
])

@php $user_route = ''; @endphp

@if ( auth()->user()->rol == 'admin')
    @php $user_route = 'admin_'; @endphp
@elseif ( auth()->user()->rol == 'asesor')
    @php $user_route = 'asesor_'; @endphp
@endif

<div class="w-full flex dark:text-gray-900" :class="open ? '' : 'hidden'">

    <form method="POST" action="{{ route($user_route.'plan_de_negocio.foda.update',[$plan_de_negocio,$foda]) }}">
        @csrf
        @method('patch')

        <div class="flex w-full justify-start items-center space-x-2">
            <div>
                <input class="hidden" type="hidden" name="tipo" value="{{ $foda->tipo }}">
                <input type="text" name="descripcion" :value="open && '{{ $foda->descripcion }}'">
            </div>
            <div>
                <button class="justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                        <path d="M18 19H19V6.82843L17.1716 5H16V9H7V5H5V19H6V12H18V19ZM4 3H18L20.7071 5.70711C20.8946 5.89464 21 6.149 21 6.41421V20C21 20.5523 20.5523 21 20 21H4C3.44772 21 3 20.5523 3 20V4C3 3.44772 3.44772 3 4 3ZM8 14V19H16V14H8Z" />
                    </svg>
                </button>
                <button class="self-center" @click="open = !open" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="currentColor">
                        <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z" />
                    </svg>
                </button>
            </div>
        </div>
        
    </form>
</div>