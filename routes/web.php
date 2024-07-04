<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompetenciaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlotaController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\EspaciosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\SedeController;
use App\Models\Bugreport;
use Illuminate\Http\Request;

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

// Rutas del landing y rutas generales
Route::get('/', function () {
    return view('landing.landing');
})->name('landing.landing');
Route::get('/sobreMi', function () {
    return view('landing.sobreMi');
})->name('landing.sobreMi');
Route::get('/terminosCondiciones', function () {
    return view('landing.terminosCondiciones');
})->name('landing.terminosCondiciones');
Route::get('/politicaPrivacidad', function () {
    return view('landing.politicaPrivacidad');
})->name('landing.politicaPrivacidad');
Route::get('/donar', function () {
    return view('landing.donar');
})->name('landing.donar');
Route::get('/tutorial', function () {
    return view('landing.tutorial');
})->name('landing.tutorial');

// Bugreport
Route::post('/bugreport', function (Request $request) {
    Bugreport::create([
        'user_id' => auth()->id(),
        'bug' => $request->informe,
    ]);

    return back();
})->name('bugreport');

// Rutas home
Route::get('home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home.index');
Route::get('home/company', [HomeController::class, 'company'])->middleware(['auth', 'verified'])->name('home.company');
Route::post('home/company/submit', [HomeController::class, 'submit'])->name('home.submit');

// Rutas Flota
Route::get('flota', [FlotaController::class, 'index'])->middleware(['auth', 'verified'])->name('flota.index');
Route::get('flota/comprarAviones', [FlotaController::class, 'comprarAviones'])->middleware(['auth', 'verified'])->name('flota.comprarAviones');
Route::get('flota/comprarAviones/Airbus', [FlotaController::class, 'comprarAirbus'])->middleware(['auth', 'verified'])->name('flota.comprarAirbus');
Route::get('flota/comprarAviones/Boeing', [FlotaController::class, 'comprarBoeing'])->middleware(['auth', 'verified'])->name('flota.comprarBoeing');
Route::get('flota/comprarAviones/Embraer', [FlotaController::class, 'comprarEmbraer'])->middleware(['auth', 'verified'])->name('flota.comprarEmbraer');
Route::get('flota/comprarAviones/Bombardier', [FlotaController::class, 'comprarBombardier'])->middleware(['auth', 'verified'])->name('flota.comprarBombardier');
Route::get('flota/comprarAviones/{id}', [FlotaController::class, 'comprar'])->middleware(['auth', 'verified'])->name('flota.comprar');
Route::get('flota/comprarSegundaMano/{id}', [FlotaController::class, 'comprarSegundaMano'])->middleware(['auth', 'verified'])->name('flota.comprarSegundaMano');
Route::get('flota/vender/{id}', [FlotaController::class, 'vender'])->middleware(['auth', 'verified'])->name('flota.vender');
Route::get('flota/mantenimiento/{id}', [FlotaController::class, 'mantenimiento'])->middleware(['auth', 'verified'])->name('flota.mantenimiento');
Route::get('flota/activarRuta/{id}', [FlotaController::class, 'activarRuta'])->middleware(['auth', 'verified'])->name('flota.activarRuta');

// Rutas Espacios
Route::get('espacios', [EspaciosController::class, 'index'])->middleware(['auth', 'verified'])->name('espacios.index');
Route::get('espacios/comprarEspacios', [EspaciosController::class, 'aeropuertos'])->middleware(['auth', 'verified'])->name('espacios.aeropuertos');
Route::post('espacios', [EspaciosController::class, 'comprar'])->middleware(['auth', 'verified'])->name('espacios.comprar');
Route::get('espacios/vender/{id}', [EspaciosController::class, 'vender'])->middleware(['auth', 'verified'])->name('espacios.vender');

// Ruta mapa
Route::get('mapa', [MapaController::class, 'index'])->middleware(['auth', 'verified'])->name('mapa.index');

// Rutas Rutas
Route::get('rutas', [RutasController::class, 'index'])->middleware(['auth', 'verified'])->name('rutas.index');
Route::get('rutas/crearRuta/{id}', [RutasController::class, 'crearRutaAvion'])->middleware(['auth', 'verified'])->name('rutas.crearRutaAvion');
Route::post('rutas/nuevaRuta', [RutasController::class, 'nuevaRuta'])->middleware(['auth', 'verified'])->name('rutas.nuevaRuta');
Route::get('rutas/borrarRuta/{id}', [RutasController::class, 'borrarRuta'])->middleware(['auth', 'verified'])->name('rutas.borrarRuta');
Route::post('rutas/modificar/{id}', [RutasController::class, 'modificarRuta'])->middleware(['auth', 'verified'])->name('rutas.modificar');

// Rutas Sede
Route::get('sede', [SedeController::class, 'index'])->middleware(['auth', 'verified'])->name('sede.index');
Route::get('sede/comprarHangar', [SedeController::class, 'comprarHangar'])->middleware(['auth', 'verified'])->name('sede.comprarHangar');
Route::get('sede/contratarIngenieros', [SedeController::class, 'contratarIngenieros'])->middleware(['auth', 'verified'])->name('sede.contratarIngenieros');
Route::get('sede/ampliarHangar/{id}', [SedeController::class, 'ampliarHangar'])->middleware(['auth', 'verified'])->name('sede.ampliarHangar');
Route::get('sede/quitarMantenimiento/{id}', [SedeController::class, 'quitarMantenimiento'])->middleware(['auth', 'verified'])->name('sede.quitarMantenimiento');
Route::post('sede/modificarNombre', [SedeController::class, 'modificarNombre'])->middleware(['auth', 'verified'])->name('sede.modificarNombre');

// Rutas Competencia
Route::get('competencia', [CompetenciaController::class, 'index'])->middleware(['auth', 'verified'])->name('competencia.index');
Route::post('competencia/demandaRuta', [CompetenciaController::class, 'demandaRuta'])->middleware(['auth', 'verified'])->name('competencia.demandaRuta');
Route::post('competencia/rutas', [CompetenciaController::class, 'rutasCompetencia'])->middleware(['auth', 'verified'])->name('competencia.rutas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rutas admin
Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin.index');
Route::get('/admin/bugreports', [AdminController::class, 'bugreports'])->middleware(['auth', 'verified', 'admin'])->name('admin.bugreports');
Route::post('/admin/modificar', [AdminController::class, 'modificar'])->middleware(['auth', 'verified', 'admin'])->name('admin.modificar');
Route::get('/admin/borrar/{id}', [AdminController::class, 'borrar'])->middleware(['auth', 'verified', 'admin'])->name('admin.borrar');

// Rutas de control del idioma
Route::post('/lang', [LanguageController::class, 'change'])->name('language.change');

require __DIR__.'/auth.php';
