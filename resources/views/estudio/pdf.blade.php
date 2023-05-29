<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <div>
        <p>Plan de negocio: {{ $plan_de_negocio->nombre }}<p>
        <img width="150px" src="{{ $plan_de_negocio->imagenes_corporativas->logotipo }}">
        <p>{{ $estudio->nombre }}<p>
    </div>
    <div class="flex my-2 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre del producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio de costo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio de venta
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Descripción
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudio->encuestas as $encuesta)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $encuesta->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $encuesta->precio_de_costo }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $encuesta->precio_de_venta }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $encuesta->descripcion }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>