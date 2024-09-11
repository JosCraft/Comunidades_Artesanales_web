<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VisitorController;

use App\Http\Controllers\Admin\GestionUsuarioController as GestionUsuario;

use App\Http\Controllers\User\UsuarioPerfilController as UsuarioPerfil;

use App\Http\Controller\CodeController;

use App\Mail\MyEmail;

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

Route::controller(VisitorController::class)->group(function(){
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/comunidades', 'comunidades')->name('comunidades');
    Route::get('/productos', 'productos')->name('productos');
    Route::get('/contacto', 'contacto')->name('contacto');
});



Route::controller(UsuarioPerfil::class)->group(function(){
    Route::get('/user','index')->name('user');
    Route::get('/user/edit','update')->name('user.edit');
    Route::put('/user','updateProfile')->name('user.update');
});



Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

Route::controller(GestionUsuario::class)->group(function(){
        Route::get('/admin/gestion_usuario','index')->name('admin.gestion_usuario');
        Route::post('/admin/gestion_usuario','store')->name('admin.gestion_usuario.store');
        Route::put('/admin/gestion_usuario/{id}','update')->name('admin.gestion_usuario.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para los roles


Route::middleware(['auth','user-role:Comunario'])->group(function()
{ // Rutas para el rol Comunario
    Route::get('/comunario', function(){
        return view('/Comunario/app');
    })->name('comunario');
});

Route::middleware(['auth','user-role:Comprador'])->group(function()
{ // Rutas para el rol Comprador
    Route::get('/comprador', function(){
        return view('/comprador/app');
    })->name('comprador');
});

Route::middleware(['auth','user-role:Delivery'])->group(function()
{ // Rutas para el rol Delivery
    Route::get('/delivery', function(){
        return view('/delivery/app');
    })->name('delivery');
});

Route::middleware(['auth','user-role:Admin'])->group(function()
{ // Rutas para el rol Admin
    Route::get('/admin', function(){
        return view('/admin/app');
    })->name('admin');
});

Route::get('/admin', function(){
    return view('/admin/app');
})->name('admin');

Route::post('/verificarCodigo', [App\Http\Controllers\CodeController::class, 'verificarCodigo'])->name('verificarCodigo'); //mandar datos
Route::get('/validarCodigo', [App\Http\Controllers\CodeController::class, 'validarCodigo'])->name('validarCodigo');//recibir datos

