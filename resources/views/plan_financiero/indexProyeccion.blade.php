<!DOCTYPE html>
<html lang = "es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/menuIzquierdo'])
    <title>Proyecciones</title>
</head>

<body class="">
    {{--TODO: Navar de navegacion --}}
    @include('layouts.navigation')

    {{--TODO:  Cabeza de la pagina --}}
    <div class="text-center text-black my-2 sm:my-4">
        <h1 class="text-4xl antialiased font-sans ">Plan Financiero</h1>
        <h2>Ingresos</h2>
    </div>

    {{-- TODO: Contenedor del menu, estadisticas y navegacion de years and month --}}
    <div class="flex justify-center items-stretch 2xl:px-10  gap-2 xl:mx-2">
        {{-- TODO: Menu para navegar --}}
        <div class="relative rounded-lg border-none card  h-full bg-white 2xl:p-10 p-6  dark:bg-gray-800">
            @include('plan_financiero.menuIzquierdo')
        </div>

        {{-- TODO: contenedor estadisticas  --}}
        <div class="flex-col  text-white  space-y-8">
            {{-- TODO: Los gastos --}}
            <div class="card grid gap-2.5 grid-cols-2 p-3">
                <div>
                    <p class="pl-2">Costos Fijos Mensuales Totales (CFMT):</p>
                </div>
                <div class="bg-blue-400">
                    <p class=" text-center">
                        ${{ $costos_fijos }}
                    </p>
                </div>
                <div>
                    <p class="pl-2 text-sm">Costos Variables Mesuales Totales (CVMT):</p>
                </div>
                <div class="bg-blue-400">
                    <p class="text-center">${{ $costos_variable }}</p>
                </div>
                <div>
                    <p class="pl-2">Costos Totales (CT):</p>
                </div>
                <div class="bg-blue-400">
                    <p class="text-center">${{ $costos_fijos + $costos_variable }}</p>
                </div>
            </div>

            {{-- TODO: Ingresos mensuales --}}
            <div class="card grid gap-y-2.5 grid-cols-2 p-3">
                <div>
                    <p class="pl-2">Ingresos Mensuales Totales (IMT):</p>
                </div>
                <div class="bg-blue-400">
                    <p class=" text-center">${{ $ingresos }}</p>
                </div>
            </div>

            {{-- TODO: Ganancias mensuales y anuales --}}
            <div class="card grid gap-2.5 grid-cols-2 p-3">
                <div>
                    <p class="pl-2">Utilidades Totales Mensuales (UTM):</p>
                </div>
                <div class="bg-blue-400">
                    <p class=" text-center">${{ $ingresos - ($costos_fijos + $costos_variable) }}</p>
                </div>
                <div>
                    <p class="pl-2">Utilidades Totales Anual (UTM12):</p>
                </div>
                <div class="bg-blue-400">
                    <p class=" text-center">${{ ($ingresos - ($costos_fijos + $costos_variable)) * 12 }}</p>
                </div>
            </div>
        </div>

        {{-- TODO: Contenedor botones de navegacion --}}
        <div class="grid grid-cols-2 gap-2">
            <a href="{{ route('plan_de_negocio.proyeccionConservador.index', $plan_de_negocio) }}" class="flex items-center justify-center rounded-lg font-bold bg-gray-400 hover:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-black ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                </svg>
                <p class="text-base p-2">Proyección anual Conservador</p>
            </a>
            <a href="{{ route('plan_de_negocio.proyeccionOptimista.index', $plan_de_negocio) }}" class="flex items-center justify-center rounded-lg font-bold bg-gray-400 hover:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-black ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                </svg>
                <p class="text-base p-2">Proyección anual Optimista</p>
            </a>
            <a href="{{ route('plan_de_negocio.proyeccionPesimista.index', $plan_de_negocio) }}"class="flex items-center justify-center rounded-lg font-bold bg-gray-400 hover:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-black ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                </svg>
                <p class="text-base p-2">Proyección anual Pesimista</p>
            </a>
            <a href="{{ route('plan_de_negocio.proyeccionPesimista.index', $plan_de_negocio) }}"class="flex items-center justify-center rounded-lg font-bold bg-gray-400 hover:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="text-black ">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z" />
                </svg>
                <p class="text-base p-2">Proyección cinco años Pesimista</p>
            </a>
        </div>
    </div>
</body>
</html>
