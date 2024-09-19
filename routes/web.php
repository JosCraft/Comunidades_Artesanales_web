<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VisitorController;

use App\Http\Controllers\Admin\GestionUsuarioController as GestionUsuario;
use App\Http\Controllers\Admin\GestionUsuarioRoleController as GestionUsuarioRole;
use App\Http\Controllers\Admin\GestionProductosController as GestionProductos;
use App\Http\Controllers\Admin\GestionComunidadController as GestionComunidad;
use App\Http\Controllers\Admin\GestionComunarioController as GestionComunario;


use App\Http\Controllers\HaceController as HaceController;

use App\Http\Controllers\User\UsuarioPerfilController as UsuarioPerfil;


use App\Http\Controller\CodeController;

use App\Mail\MyEmail;


use App\Http\Controllers\Frontend\PageController;
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





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para los roles


Route::middleware(['auth','user-role:Comunario'])->group(function()
{ // Rutas para el rol Comunario
    Route::get('/comunario', function(){
        return view('/Comunario/app');
    })->name('comunario');
});

Route::get('/comunario', function(){
    return view('/comunario/app');
})->name('comunario');




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


Route::controller(GestionUsuario::class)->group(function(){
    Route::get('/admin/gestion_usuario','index')->name('admin.gestion_usuario');
    Route::get('/admin/gestion_usuario/create','create_user')->name('admin.gestion_usuario.create');
    Route::post('/admin/gestion_usuario','store')->name('admin.gestion_usuario.store');
    Route::get('/admin/gestion_usuario/edit/{id}','edit')->name('admin.gestion_usuario.edit');
    Route::put('/admin/gestion_usuario/{id}','update')->name('admin.gestion_usuario.update');
    Route::delete('/admin/gestion_usuario/{id}','destroy')->name('admin.gestion_usuario.destroy');
});

Route::controller(GestionUsuarioRole::class)->group(function(){
    Route::get('/admin/gestion_usuario_role','index')->name('admin.gestion_usuario_role');
    Route::get('/admin/gestion_usuario_role/create/{id}','create_user_role')->name('admin.gestion_usuario_role.create');
    Route::post('/admin/gestion_usuario_role/{role}/{user}','store')->name('admin.gestion_usuario_role.store');
    Route::put('/admin/gestion_usuario_role/{user}/{role}','update')->name('admin.gestion_usuario_role.update');
    Route::delete('/admin/gestion_usuario_role/destryo/{role}/{user}','destroy')->name('admin.gestion_usuario_role.destroy');
});

Route::controller(GestionProductos::class)->group(function(){
    Route::get('/admin/gestion_productos','index')->name('admin.gestion_productos');
    Route::get('/admin/gestion_productos/create','create_producto')->name('admin.gestion_productos.create');
    Route::post('/admin/gestion_productos','store')->name('admin.gestion_productos.store');
    Route::get('/admin/gestion_productos/edit/{id}','edit')->name('admin.gestion_productos.edit');
    Route::put('/admin/gestion_productos/{id}','update')->name('admin.gestion_productos.update');
    Route::delete('/admin/gestion_productos/{id}','destroy')->name('admin.gestion_productos.destroy');
});

Route::controller(GestionComunidad::class)->group(function(){
    Route::get('/admin/gestion_comunidad','index')->name('admin.gestion_comunidad');
    Route::get('/admin/gestion_comunidad/create','create_comunidad')->name('admin.gestion_comunidad.create');
    Route::post('/admin/gestion_comunidad','store')->name('admin.gestion_comunidad.store');
    Route::get('/admin/gestion_comunidad/edit/{id}','edit')->name('admin.gestion_comunidad.edit');
    Route::put('/admin/gestion_comunidad/{id}','update')->name('admin.gestion_comunidad.update');
    Route::delete('/admin/gestion_comunidad/{id}','destroy')->name('admin.gestion_comunidad.destroy');
});

Route::controller(GestionComunario::class)->group(function(){
    Route::get('/admin/gestion_comunario','index')->name('admin.gestion_comunario');
    Route::get('/admin/gestion_comunario/create','create_comunario')->name('admin.gestion_comunario.create');
    Route::post('/admin/gestion_comunario','store')->name('admin.gestion_comunario.store');
    Route::get('/admin/gestion_comunario/edit/{id}','edit')->name('admin.gestion_comunario.edit');
    Route::put('/admin/gestion_comunario/{id}','update')->name('admin.gestion_comunario.update');
    Route::delete('/admin/gestion_comunario/{id}','destroy')->name('admin.gestion_comunario.destroy');
});




Route::post('/verificarCodigo', [App\Http\Controllers\CodeController::class, 'verificarCodigo'])->name('verificarCodigo'); //mandar datos
Route::get('/validarCodigo', [App\Http\Controllers\CodeController::class, 'validarCodigo'])->name('validarCodigo');//recibir datos



/***************** RUTAS GISEL */

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact/save', [AjaxController::class, 'contactsave'])->name('contact.save');
Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/men/{slug?}', [PageController::class, 'product'])->name('menproduct');
Route::get('/women/{slug?}', [PageController::class, 'product'])->name('womenproduct');
Route::get('/children/{slug?}', [PageController::class, 'product'])->name('childrenproduct');
Route::get('/sales', [PageController::class, 'saleproduct'])->name('sale-product');
Route::get('/product/{slug}', [PageController::class, 'productdetail'])->name('productdetail');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cartadd');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cartremove');
Route::post('/cart/couponcheck', [CartController::class, 'couponcheck'])->name('coupon.check');
Route::post('/cart/newQty', [CartController::class, 'newQty'])->name('cartnewQty');
Route::get('/cart/form', [CartController::class, 'cartform'])->name('cart.form');
Route::post('/cart/save', [CartController::class, 'cartSave'])->name('cart.save');


/***************** */


/* Rutas para que el comunario agregue un nuevo producto o  quite */
Route::controller(HaceController::class)->group(function(){
    Route::post('/comunario/producto/{id}', 'addProduct')->name('comunario.producto.add');
    Route::delete('/comunario/producto/{comunario}/{producto}', 'removeProduct')->name('comunario.producto.remove');
});
