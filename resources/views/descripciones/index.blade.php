<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción de Puesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Cuadro de navegación -->
            <nav class="col-md-2 bg-light sidebar py-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('descripciones.index') }}">Descripción de Puesto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('organigramas.index') }}">Organigrama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Proyección de Sueldo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Proyecciones Sueldo</a>
                    </li>
                </ul>
            </nav>

            <!-- Contenido principal -->
            <main class="col-md-10">
                <h1 class="mt-4">Descripción de Puesto</h1>
                
                <!-- Botón Crear Descripción de Puesto -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('descripciones.create') }}" class="btn btn-primary">Crear Descripción de Puesto</a>
                </div>

                <!-- Tabla -->
                <div class="card">
                    <div class="card-header bg-primary text-white">Descripciones de Puestos</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nivel Organigrama</th>
                                    <th>Código</th>
                                    <th>Unidad Administrativa</th>
                                    <th>Nombre de Puesto</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($descripciones as $descripcion)
                                <tr>
                                    <td>{{ $descripcion->nivel }}</td>
                                    <td>{{ $descripcion->codigo }}</td>
                                    <td>{{ $descripcion->unidad_administrativa }}</td>
                                    <td>{{ $descripcion->nombre_puesto }}</td>
                                    <td>
                                        <a href="{{ route('descripciones.edit', $descripcion) }}" class="btn btn-warning btn-sm">Editar</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('descripciones.destroy', $descripcion) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay descripciones disponibles.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
