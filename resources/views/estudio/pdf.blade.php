<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $estudio->nombre }}</title>

</head>
<body>
    <table style="width: 100%; height: 100%;">
        <tr>
        <td style="text-align: center; vertical-align: middle;">
            <h1 style="font-size: 24px; color: #333;">Plan de negocio: {{ $plan_de_negocio->nombre }}</h1>
            @if ($plan_de_negocio->imagenes_corporativas != null)
            <img src="{{ $plan_de_negocio->imagenes_corporativas->logotipo }}" alt="Logo de la página" style="width: 100px; height: auto;">
            @endif
            <h1 style="font-size: 20px; color: #333;">Estudio de mercado: {{ $estudio->nombre }}</h1>
        </td>
        </tr>
    </table>
</body>
</html>

<style>

</style>