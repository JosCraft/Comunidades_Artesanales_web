<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VisitorController;

use App\Http\Controllers\Admin\GestionUsuarioController as GestionUsuario;

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

Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('productos.show');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');

Route::controller(GestionUsuario::class)->group(function(){
        Route::get('/admin/gestion_usuario','index')->name('admin.gestion_usuario');
        Route::post('/admin/gestion_usuario','store')->name('admin.gestion_usuario.store');
        Route::put('/admin/gestion_usuario/{id}','update')->name('admin.gestion_usuario.update');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','user-role:Comunario'])->group(function()
{
    Route::get('/comunario', function(){
        return view('/Comunario/app');
    })->name('comunario');
});

Route::middleware(['auth','user-role:Comprador'])->group(function()
{
    Route::get('/comprador', function(){
        return view('/comprador/app');
    })->name('comprador');
});

Route::middleware(['auth','user-role:Delivery'])->group(function()
{
    Route::get('/delivery', function(){
        return view('/delivery/app');
    })->name('delivery');
});

Route::middleware(['auth','user-role:Admin'])->group(function()
{
    Route::get('/admin', function(){
        return view('/admin/app');
    })->name('admin');
});
