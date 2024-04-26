<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
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

Route::group(['middleware' => ['auth']], function () {
    // Control panel.
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('clients', ClientController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::resource('providers', ProviderController::class);
});



// 
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ProductController;

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

// Route::get('/', function () {
    // return view('welcome');
// });
// 
// Auth::routes();
// 
// Route::group(['middleware'=>['auth']], function(){
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // products
    // Route::resource('products', ProductController::class);
// });
// 
// Route::get('/about', function () { 
    // return 'Acerca de nosotros'; 
// });
// 
// Route::get('/user/{id}', function ($id) { 
    // return 'ID de usuario: ' . $id; 
// });
// 
// Route::get('/contacto', function () { 
    // return 'Página de contacto'; 
// })->name('contacto');
// 
// Route::get('/usuario/{id}', function ($id) {
    // return 'ID de usuario: ' . $id;
// })->where('id', '[0-9]{3}');
// 
// Route::prefix('admin')->group(function () { 
    // Route::get('/', function () { 
    // return 'Panel de administración'; 
    // }); 
    // Route::get('/users', function () { 
    // return 'Lista de usuarios'; 
    // }); 
    // }); 
// 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// 
// Auth::routes();
// 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');