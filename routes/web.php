<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlotaController;
use App\Http\Controllers\MapaController;
use App\Http\Controllers\EspaciosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RutasController;
use App\Http\Controllers\SedeController;

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
    return view('landing.landing');
})->name('landing.landing');


Route::get('home', [HomeController::class, 'index'])->name('home.index');
Route::get('home/company', [HomeController::class, 'company'])->name('home.company');
Route::post('home/company/submit', [HomeController::class, 'submit'])->name('home.submit');

Route::get('flota', [FlotaController::class, 'index'])->name('flota.index');
Route::get('flota/comprarAviones', [FlotaController::class, 'comprarAviones'])->name('flota.comprarAviones');
Route::get('flota/comprarAviones/Airbus', [FlotaController::class, 'comprarAirbus'])->name('flota.comprarAirbus');
Route::get('flota/comprarAviones/Boeing', [FlotaController::class, 'comprarBoeing'])->name('flota.comprarBoeing');
Route::get('flota/comprarAviones/{id}', [FlotaController::class, 'comprar'])->name('flota.comprar');
Route::get('flota/comprarSegundaMano/{id}', [FlotaController::class, 'comprarSegundaMano'])->name('flota.comprarSegundaMano');
Route::get('flota/vender/{id}', [FlotaController::class, 'vender'])->name('flota.vender');
Route::get('flota/mantenimiento/{id}', [FlotaController::class, 'mantenimiento'])->name('flota.mantenimiento');

Route::get('espacios', [EspaciosController::class, 'index'])->name('espacios.index');
Route::get('espacios/comprarEspacios', [EspaciosController::class, 'aeropuertos'])->name('espacios.aeropuertos');
Route::post('espacios', [EspaciosController::class, 'comprar'])->name('espacios.comprar');
Route::get('espacios/vender/{id}', [EspaciosController::class, 'vender'])->name('espacios.vender');

Route::get('mapa', [MapaController::class, 'index'])->name('mapa.index');

Route::get('rutas', [RutasController::class, 'index'])->name('rutas.index');
Route::get('rutas/crearRuta', [RutasController::class, 'crearRuta'])->name('rutas.crearRuta');
Route::get('rutas/crearRuta/{id}', [RutasController::class, 'crearRutaAvion'])->name('rutas.crearRutaAvion');
Route::post('rutas/nuevaRuta', [RutasController::class, 'nuevaRuta'])->name('rutas.nuevaRuta');
Route::get('rutas/borrarRuta/{id}', [RutasController::class, 'borrarRuta'])->name('rutas.borrarRuta');
Route::post('rutas/modificar/{id}', [RutasController::class, 'modificarRuta'])->name('rutas.modificar');

Route::get('sede', [SedeController::class, 'index'])->name('sede.index');
Route::get('sede/comprarHangar', [SedeController::class, 'comprarHangar'])->name('sede.comprarHangar');
Route::get('sede/contratarIngenieros', [SedeController::class, 'contratarIngenieros'])->name('sede.contratarIngenieros');
Route::get('sede/ampliarHangar/{id}', [SedeController::class, 'ampliarHangar'])->name('sede.ampliarHangar');
Route::get('sede/quitarMantenimiento/{id}', [SedeController::class, 'quitarMantenimiento'])->name('sede.quitarMantenimiento');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
