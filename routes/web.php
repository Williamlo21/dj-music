<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('login', LoginController::class);
Route::resource('registro', RegistroController::class);

route::middleware('auth')->group( function(){

    Route::resource('home', HomeController::class);
    route::resource('logout', LogoutController::class);
    Route::resource('solicitud', SolicitudController::class);
    Route::get('solicitudes', [SolicitudController::class, 'indexDJ'])->name('solicitud.indexDJ');
    Route::get('aceptarSolicitud/{solicitud_id}', [SolicitudController::class, 'aceptarSolicitud'])->name('solicitud.aceptarSolicitud');
    Route::get('rechazarSolicitud/{solicitud_id}', [SolicitudController::class, 'rechazarSolicitud'])->name('solicitud.rechazarSolicitud');

});
