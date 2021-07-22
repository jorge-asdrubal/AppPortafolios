<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HabilidadController;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\TipoProyectoController;
use App\Http\Controllers\UserController;
use App\Models\Portafolio;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('principal');
    });

    // Rutas del inicio
    Route::get('/principal', [PortafolioController::class, 'principal'])->name('principal');

    // Rutas de portafolio
    Route::get('/portafolio/{id}', [PortafolioController::class, 'index'])->name('portafolio');
    Route::get('/sobre/mi/{id}', [PortafolioController::class, 'sobre_mi'])->name('sobre_mi');
    Route::get('/contactame/{id}', [PortafolioController::class, 'contactame'])->name('contactame');
    
    // Rutas de registrar usuarios
    Route::get('/registrar', [UserController::class, 'show_form_register'])->name('registrar_usuario');
    Route::post('/registrar/guardar', [UserController::class, 'store'])->name('guardar_usuarios');

    // Rutas de autenticacion
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('iniciar_sesion');

    // Rutas de restablecer contraseña
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    //Rutas de proyecto
    Route::get('/proyectos', [ProyectoController::class, 'index'])->name('listar_proyectos');
    Route::get('/proyectos/crear', [ProyectoController::class, 'show_form_create'])->name('crear_proyecto');
    Route::get('/proyectos/editar/{id}', [ProyectoController::class, 'show_form_edit'])->name('editar_proyecto');
    Route::post('/proyectos/guardar', [ProyectoController::class, 'guardar_proyecto'])->name('guardar_proyecto');
    // Rutas de tipos de proyecto
    Route::get('/tipos_proyectos', [TipoProyectoController::class, 'index'])->name('listar_tipos_proyectos');
    Route::get('/tipos_proyectos/crear', [TipoProyectoController::class, 'show_form_create'])->name('crear_tipo_proyecto');
    Route::get('/tipos_proyectos/editar/{id}', [TipoProyectoController::class, 'show_form_edit'])->name('editar_tipo_proyecto');
    Route::post('/tipos_proyectos/guardar', [TipoProyectoController::class, 'guardar_tipo_proyecto'])->name('guardar_tipo_proyecto');
    
    // Rutas de habilidades
    Route::get('/habilidades', [HabilidadController::class, 'index'])->name('listar_habilidades');
    Route::get('/habilidades/crear', [HabilidadController::class, 'show_form_create'])->name('crear_habilidad');
    Route::get('/habilidades/editar/{id}', [HabilidadController::class, 'show_form_edit'])->name('editar_habilidad');
    Route::post('/habilidades/guardar', [HabilidadController::class, 'guardar_habilidad'])->name('guardar_habilidad');

    // Rutas de publicar portafolio
    Route::get('/porfatolio/administrar', [PortafolioController::class, 'show_form_portafolio'])->name('administrar_portafolio');
    Route::post('/porfatolio/administrar/guardar', [PortafolioController::class, 'guardar_portafolio'])->name('guardar_portafolio');

    //Rutas de persona
    Route::get('/persona', [UserController::class, 'show_form_persona'])->name('administrar_persona');
    Route::post('/persona/guardar', [UserController::class, 'update'])->name('guardar_persona');
});