<!-- resources/views/organigramas/edit.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Organigrama</title>
    <!-- Puedes incluir tu archivo CSS o las librerías de Bootstrap aquí -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <!-- Navegación -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Menú</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="{{ route('descripciones.index') }}">Descripción de Puesto</a></li>
                    <li class="list-group-item"><a href="{{ route('organigramas.index') }}">Organigrama</a></li>
                    <li class="list-group-item"><a href="#">Proyección de Sueldo</a></li>
                    <li class="list-group-item"><a href="#">Proyecciones Sueldo</a></li>
                </ul>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="col-md-9">
            <h1>Editar Organigrama</h1>

            <!-- Formulario para editar organigrama -->
            <form action="{{ route('organigramas.update', $organigrama) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Usamos PUT para la actualización -->

                <!-- Campo para nombre del organigrama -->
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Organigrama</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $organigrama->nombre) }}" required>
                </div>

                <!-- Campo para el archivo (opcional) -->
                <div class="mb-3">
                    <label for="archivo" class="form-label">Archivo (opcional)</label>
                    <input type="file" class="form-control" id="archivo" name="archivo">
                    <small class="form-text text-muted">Deja en blanco si no deseas cambiar el archivo.</small>
                </div>

                <!-- Botones para actualizar o cancelar -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Actualizar Organigrama</button>
                    <a href="{{ route('organigramas.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Librerías JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-EJ/JZZG3djzjHODiFw3p0vK9In+q9hO3HlMlG3g8cUgFgo38jxjOUsfgz0umfM5A" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-KyZXEJfJ6f9v6BvYu5yXY5nKk5kg+FeGRQhb4ZTt27nC4bKhShfXYNoJrpuG+lxu" crossorigin="anonymous"></script>

</body>
</html>

