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
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
    $respuesta = Http::get("https://api.country.is/");
    if(Cookie::get('manualChange') != true){
        if ($respuesta->successful()) {
            $codigoPais = strtolower($respuesta->json()["country"]);
            Session::put('locale', $codigoPais);
        } else {
            Session::put('locale', "en");
        }
    }

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
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home.index');
    Route::get('home/company', [HomeController::class, 'company'])->name('home.company');
    Route::post('home/company/submit', [HomeController::class, 'submit'])->name('home.submit');
});

// Ruta mapa
Route::get('mapa', [MapaController::class, 'index'])->middleware(['auth', 'verified'])->name('mapa.index');

// Rutas Flota
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('flota', [FlotaController::class, 'index'])->name('flota.index');
    Route::get('flota/comprarAviones', [FlotaController::class, 'comprarAviones'])->name('flota.comprarAviones');
    Route::get('flota/comprarAviones/Airbus', [FlotaController::class, 'comprarAirbus'])->name('flota.comprarAirbus');
    Route::get('flota/comprarAviones/Boeing', [FlotaController::class, 'comprarBoeing'])->name('flota.comprarBoeing');
    Route::get('flota/comprarAviones/Embraer', [FlotaController::class, 'comprarEmbraer'])->name('flota.comprarEmbraer');
    Route::get('flota/comprarAviones/Bombardier', [FlotaController::class, 'comprarBombardier'])->name('flota.comprarBombardier');
    Route::get('flota/comprarAviones/{id}', [FlotaController::class, 'comprar'])->name('flota.comprar');
    Route::get('flota/comprarSegundaMano/{id}', [FlotaController::class, 'comprarSegundaMano'])->name('flota.comprarSegundaMano');
    Route::get('flota/vender/{id}', [FlotaController::class, 'vender'])->name('flota.vender');
    Route::get('flota/mantenimiento/{id}', [FlotaController::class, 'mantenimiento'])->name('flota.mantenimiento');
    Route::get('flota/activarRuta/{id}', [FlotaController::class, 'activarRuta'])->name('flota.activarRuta');
});

// Rutas Espacios
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('espacios', [EspaciosController::class, 'index'])->name('espacios.index');
    Route::get('espacios/comprarEspacios', [EspaciosController::class, 'aeropuertos'])->name('espacios.aeropuertos');
    Route::post('espacios', [EspaciosController::class, 'comprar'])->name('espacios.comprar');
    Route::get('espacios/vender/{id}', [EspaciosController::class, 'vender'])->name('espacios.vender');
});

// Rutas Rutas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('rutas', [RutasController::class, 'index'])->name('rutas.index');
    Route::get('rutas/crearRuta/{id}', [RutasController::class, 'crearRutaAvion'])->name('rutas.crearRutaAvion');
    Route::post('rutas/nuevaRuta', [RutasController::class, 'nuevaRuta'])->name('rutas.nuevaRuta');
    Route::get('rutas/borrarRuta/{id}', [RutasController::class, 'borrarRuta'])->name('rutas.borrarRuta');
    Route::post('rutas/modificar/{id}', [RutasController::class, 'modificarRuta'])->name('rutas.modificar');
});

// Rutas Sede
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('sede', [SedeController::class, 'index'])->name('sede.index');
    Route::get('sede/comprarHangar', [SedeController::class, 'comprarHangar'])->name('sede.comprarHangar');
    Route::get('sede/contratarIngenieros', [SedeController::class, 'contratarIngenieros'])->name('sede.contratarIngenieros');
    Route::get('sede/ampliarHangar/{id}', [SedeController::class, 'ampliarHangar'])->name('sede.ampliarHangar');
    Route::get('sede/quitarMantenimiento/{id}', [SedeController::class, 'quitarMantenimiento'])->name('sede.quitarMantenimiento');
    Route::post('sede/modificarNombre', [SedeController::class, 'modificarNombre'])->name('sede.modificarNombre');
});

// Rutas Competencia
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('competencia', [CompetenciaController::class, 'index'])->name('competencia.index');
    Route::get('competencia/rankings', [CompetenciaController::class, 'rankings'])->name('competencia.rankings');
    Route::post('competencia/demandaRuta', [CompetenciaController::class, 'demandaRuta'])->name('competencia.demandaRuta');
    Route::post('competencia/rutas', [CompetenciaController::class, 'rutasCompetencia'])->name('competencia.rutas');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rutas admin
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/bugreports', [AdminController::class, 'bugreports'])->name('admin.bugreports');
    Route::post('/admin/modificar', [AdminController::class, 'modificar'])->name('admin.modificar');
    Route::get('/admin/borrar/{id}', [AdminController::class, 'borrar'])->name('admin.borrar');
});

// Rutas de control del idioma
Route::post('/lang', [LanguageController::class, 'change'])->name('language.change');
Route::get('/lang/{lang}', [LanguageController::class, 'changeLink'])->name('language.changeLink');

require __DIR__.'/auth.php';
