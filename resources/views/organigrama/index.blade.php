<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Organigramas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado de Organigramas</h2>
        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Organigramas</h5>
                <a href="{{ route('organigrama.create') }}" class="btn btn-light btn-sm">Subir Nuevo Organigrama</a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($organigramas as $organigrama)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $organigrama->nombre }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('organigrama.download', $organigrama->id) }}" class="btn btn-success btn-sm">Descargar</a>
                                        <form action="{{ route('organigrama.destroy', $organigrama->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este organigrama?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay organigramas disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
