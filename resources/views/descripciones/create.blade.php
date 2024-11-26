<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Descripción de Puesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Cuadro de navegación -->
            <nav class="col-md-2 bg-light sidebar py-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('descripciones.index') }}">Descripción de Puesto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Organigrama</a>
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
                <h1 class="mt-4">Crear Descripción de Puesto</h1>
                
                <!-- Formulario -->
                <form action="{{ route('descripciones.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nivel" class="form-label">Nivel Organigrama</label>
                        <select class="form-select" name="nivel" id="nivel" required>
                            <option value="Estratégico">Estratégico</option>
                            <option value="Táctico">Táctico</option>
                            <option value="Operativo">Operativo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="codigo" class="form-label">Código</label>
                        <input type="text" class="form-control" name="codigo" id="codigo" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="unidad_administrativa" class="form-label">Unidad Administrativa</label>
                        <input type="text" class="form-control" name="unidad_administrativa" id="unidad_administrativa" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombre_puesto" class="form-label">Nombre de Puesto</label>
                        <input type="text" class="form-control" name="nombre_puesto" id="nombre_puesto" required>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion_generica" class="form-label">Descripción Genérica</label>
                        <textarea class="form-control" name="descripcion_generica" id="descripcion_generica" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion_especifica" class="form-label">Descripción Específica</label>
                        <textarea class="form-control" name="descripcion_especifica" id="descripcion_especifica" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="objetivos_puesto" class="form-label">Objetivos del Puesto</label>
                        <textarea class="form-control" name="objetivos_puesto" id="objetivos_puesto" rows="3" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="salario_minimo" class="form-label">Salario Mínimo</label>
                        <input type="number" class="form-control" name="salario_minimo" id="salario_minimo" required>
                    </div>

                    <div class="mb-3">
                        <label for="salario_maximo" class="form-label">Salario Máximo</label>
                        <input type="number" class="form-control" name="salario_maximo" id="salario_maximo" required>
                    </div>

                    <div class="mb-3">
                        <label for="jornada_laboral" class="form-label">Jornada Laboral</label>
                        <select class="form-select" name="jornada_laboral" id="jornada_laboral" required>
                            <option value="Normal">Normal</option>
                            <option value="Inglesa">Inglesa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="numero_plaza" class="form-label">Número de Plaza</label>
                        <input type="number" class="form-control" name="numero_plaza" id="numero_plaza" required>
                    </div>

                    <div class="mb-3">
                        <label for="reporta_a" class="form-label">Reporta a</label>
                        <input type="text" class="form-control" name="reporta_a" id="reporta_a">
                    </div>

                    <div class="mb-3">
                        <label for="supervisa_a" class="form-label">Supervisa a</label>
                        <input type="text" class="form-control" name="supervisa_a" id="supervisa_a">
                    </div>

                    <div class="mb-3">
                        <label for="comunicacion_interna" class="form-label">Comunicación Interna</label>
                        <input type="text" class="form-control" name="comunicacion_interna" id="comunicacion_interna">
                    </div>

                    <div class="mb-3">
                        <label for="comunicacion_externa" class="form-label">Comunicación Externa</label>
                        <input type="text" class="form-control" name="comunicacion_externa" id="comunicacion_externa">
                    </div>

                    <div class="mb-3">
                        <label for="estado_civil" class="form-label">Estado Civil</label>
                        <input type="text" class="form-control" name="estado_civil" id="estado_civil">
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad">
                    </div>

                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" name="genero" id="genero">
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="requisitos_generales" class="form-label">Requisitos Generales</label>
                        <textarea class="form-control" name="requisitos_generales" id="requisitos_generales" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="habilidades_fisicas" class="form-label">Habilidades Físicas</label>
                        <textarea class="form-control" name="habilidades_fisicas" id="habilidades_fisicas" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="habilidades_mentales" class="form-label">Habilidades Mentales</label>
                        <textarea class="form-control" name="habilidades_mentales" id="habilidades_mentales" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
