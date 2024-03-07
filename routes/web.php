<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'Welcome'])
 ->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/product/{product}', [ProductController::class, 'show'])
 ->name('product.show');

 Route::get('/addToCart/{product}',
 [ProductController::class, 'addToCart'])->name('cart.add');


Route::get('/cart', [CartController::class, 'show'])
->name('cart.show');

Route::get('/cart/{operation}/{product}', [CartController::class, 'operate'])
->name('cart.operate');
 

Route::get('/user/logout', [UserController::class, 'logout'])
->name('user.logout');

Route::get('/user', [UserController::class, 'edit'])
->name('user.edit');


Route::patch('/user', [UserController::class, 'update'])
->name('user.update');

/*
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
->name('product.edit');


Route::patch('/product/{product}', [ProductController::class, 'update'])
->name('product.update');
*/

/*asignar el middleware role.editor, en web.php, con objeto de que el acceso a las rutas de edición y actualización de productos sólo se permita a quienes tienen el rol de editor del grupo administradores (es decir, que emplee el middleware role.editor).*/
Route::middleware(['role.editor'])->group(function () {
    Route::get('/product/edit/{product}', [ProductController::class, 'edit'])
    ->name('product.edit');
    
    
    Route::patch('/product/{product}', [ProductController::class, 'update'])
    ->name('product.update');
});






