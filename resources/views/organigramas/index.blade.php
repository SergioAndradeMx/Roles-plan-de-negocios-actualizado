<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organigrama</title>
    <!-- Vincula tu CSS de Bootstrap o tu archivo CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <!-- Navegación Lateral -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Menú</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{ route('descripciones.index') }}">Descripción de Puesto</a></li>
                        <li class="list-group-item active">Organigrama</li>
                        <li class="list-group-item"><a href="#">Proyección de Sueldo</a></li>
                        <li class="list-group-item"><a href="#">Proyecciones Sueldo</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contenido Principal -->
            <div class="col-md-9">
                <h1>Organigrama</h1>

                <!-- Cuadro con mensaje -->
                <div class="alert alert-secondary" style="border: 2px dashed gray; background-color: rgba(128, 128, 128, 0.1);">
                    Para crear el Organigrama se enviará a una página externa.
                    <br>
                    <a href="https://edit.org/edit" target="_blank" class="btn btn-primary mt-2">Enviar a la página</a>
                </div>

                <!-- Botón para Subir Organigrama -->
                <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#uploadModal">Subir Organigrama</button>

                <!-- Tabla de Organigramas -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre del Organigrama</th>
                            <th>Descargar</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($organigramas as $organigrama)
                        <tr>
                            <td>{{ $organigrama->nombre }}</td>
                            <td><a href="{{ route('organigramas.download', $organigrama) }}" class="btn btn-info">Descargar</a></td>
                            <td><a href="{{ route('organigramas.edit', $organigrama) }}" class="btn btn-warning">Editar</a></td>
                            <td>
                                <form action="{{ route('organigramas.destroy', $organigrama) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para Subir Organigrama -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('organigramas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="uploadModalLabel">Subir Organigrama</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Organigrama</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Archivo</label>
                            <input type="file" class="form-control" id="archivo" name="archivo" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Vincular el JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
