<?php

use App\Http\Controllers\CulturaOrganizacionalController;
use App\Http\Controllers\EstructuraLegalController;
use App\Http\Controllers\FodaController;
use App\Http\Controllers\GeneralidadesController;
use App\Http\Controllers\ImagenCorporativaController;
use App\Http\Controllers\ModeloCanvasController;
use App\Http\Controllers\PlanDeNegocioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PublicidadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstudioController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\ConclusionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CapturarResultadoController;
use App\Http\Controllers\AdviserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioAGrupoController;
use App\Http\Controllers\GruposDeTrabajoController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PlanDeNegocioController::class, 'index'])->middleware(['auth', 'verified', 'disciple'])->name('dashboard');
Route::get('/asesor.dashboard', [AdviserController::class, 'index'])->middleware(['auth', 'verified', 'adviser'])->name('asesor.dashboard');
Route::get('/admin.dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['middleware' => 'disciple'], function() {
        Route::resources([
            'plan_de_negocio' => PlanDeNegocioController::class,
            'plan_de_negocio.generalidades' => GeneralidadesController::class,
            'plan_de_negocio.foda' => FodaController::class,
            'plan_de_negocio.modelo_canvas' => ModeloCanvasController::class,
            'plan_de_negocio.producto' => ProductoController::class,
            'plan_de_negocio.imagen_corporativa' => ImagenCorporativaController::class,
            'plan_de_negocio.cultura_organizacional' => CulturaOrganizacionalController::class,
            'plan_de_negocio.estructura_legal' => EstructuraLegalController::class,
            'plan_de_negocio.publicidad' => PublicidadController::class,
            'plan_de_negocio.estudio' => EstudioController::class,
            'plan_de_negocio.estudio.concepto' => ConceptoController::class,
            'plan_de_negocio.estudio.conclusion' => ConclusionController::class,
            'plan_de_negocio.estudio.encuesta' => PollController::class,
            'plan_de_negocio.estudio.encuesta.pregunta' => PreguntaController::class,
            'plan_de_negocio.estudio.encuesta.formulario' => FormularioController::class,
            'plan_de_negocio.estudio.capturar_resultado' => CapturarResultadoController::class,
        ]);
    });

    Route::group(['middleware' => 'admin'], function() {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::resources([
            'usuarios' => UserController::class,
            'admin_plan_de_negocio' => PlanDeNegocioController::class
        ]);

        Route::resource('admin_plan_de_negocio.generalidades', GeneralidadesController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.foda', FodaController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.modelo_canvas', ModeloCanvasController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.producto', ProductoController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.imagen_corporativa', ImagenCorporativaController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.cultura_organizacional', CulturaOrganizacionalController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);      
        Route::resource('admin_plan_de_negocio.estructura_legal', EstructuraLegalController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.publicidad', PublicidadController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);     
        Route::resource('admin_plan_de_negocio.estudio', EstudioController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.concepto', ConceptoController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.conclusion', ConclusionController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.encuesta', PollController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.encuesta.pregunta', PreguntaController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.encuesta.formulario', FormularioController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
        Route::resource('admin_plan_de_negocio.estudio.capturar_resultado', CapturarResultadoController::class)->parameters(['admin_plan_de_negocio' => 'plan_de_negocio']);
    });

    Route::group(['middleware' => 'adviser'], function() {
        Route::resource('grupos_de_trabajo', GruposDeTrabajoController::class)->except(['update', 'destroy', 'show', 'edit']);
        Route::get('/grupos_de_trabajo/show/{grupo}/{usuario?}', [GruposDeTrabajoController::class, 'show'])->name('grupo.show');
        Route::patch('/grupos_de_trabajo/{grupo}/{usuario}', [GruposDeTrabajoController::class, 'update'])->name('grupo.update');
        Route::patch('/grupos_de_trabajo/destroy/{grupo}/{usuario}', [GruposDeTrabajoController::class, 'destroy'])->name('grupo.destroy');
        Route::get('/grupos_de_trabajo/busqueda/{grupo}/{usuario?}/{agregados?}', [GruposDeTrabajoController::class, 'index'])->name('grupo.index');
    });
});

require __DIR__.'/auth.php';
