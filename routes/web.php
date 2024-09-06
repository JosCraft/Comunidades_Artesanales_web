<?php

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
