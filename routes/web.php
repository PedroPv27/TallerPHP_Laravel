<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\ReservaController;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// ruta de autenticacion
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ruta del controlador client(ejemplo)
Route::get('/client', [ClientController::class, 'index']);
Route::get('/client/update', [ClientController::class, 'update']);
Route::post('/client', [ClientController::class, 'save']);

// ruta del controlador Cliente
Route::get('/cliente', [ClienteController::class, 'index'])->middleware("auth");
Route::get('/cliente/listar', [ClienteController::class, 'listar'])->middleware("auth");
Route::get('/cliente/crear', [ClienteController::class, 'create'])->middleware("auth");
Route::post('/cliente/guardar', [ClienteController::class, 'save'])->middleware("auth");
Route::get('/cliente/editar/{id}', [ClienteController::class, 'edit'])->middleware("auth");
Route::post('/cliente/actualizar', [ClienteController::class, 'update'])->middleware("auth");
Route::get('/cliente/cambiar/estado/{id}/{estado}', [ClienteController::class, 'updateState'])->middleware("auth");

// ruta del controlador Mesa
Route::get('/mesa', [MesaController::class, 'index'])->middleware("auth");
Route::get('/mesa/listar', [MesaController::class, 'listar'])->middleware("auth");
Route::get('/mesa/crear', [MesaController::class, 'create'])->middleware("auth");
Route::post('/mesa/guardar', [MesaController::class, 'save'])->middleware("auth");
Route::get('/mesa/editar/{id}', [MesaController::class, 'edit'])->middleware("auth");
Route::post('/mesa/actualizar', [MesaController::class, 'update'])->middleware("auth");
Route::get('/mesa/cambiar/estado/{id}/{estado}', [MesaController::class, 'updateState'])->middleware("auth");

// ruta del controlador Reserva
Route::get('/reserva', [ReservaController::class, 'index'])->middleware("auth");
Route::get('/reserva/listar', [ReservaController::class, 'listar'])->middleware("auth");
Route::get('/reserva/crear', [ReservaController::class, 'create'])->middleware("auth");
Route::post('/reserva/guardar', [ReservaController::class, 'save'])->middleware("auth");
Route::get('/reserva/editar/{id}', [ReservaController::class, 'edit'])->middleware("auth");
Route::post('/reserva/actualizar', [ReservaController::class, 'update'])->middleware("auth");
Route::get('/reserva/cambiar/estado/{id}/{estado}', [ReservaController::class, 'updateState'])->middleware("auth");
Route::get('/reserva/cambiar/estadoAprobacion/{id}/{estado_aprobacion}', [ReservaController::class, 'updateState_estadoAprobacion'])->middleware("auth");
Route::get('/reserva/detalle/{id}', [ReservaController::class, 'show'])->middleware("auth");
