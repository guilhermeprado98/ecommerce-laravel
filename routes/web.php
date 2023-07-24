<?php

use App\Http\Controllers\Admin\AfiliadosController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProdutorController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);

Route::get('products/{id}', [FrontendController::class, 'productview']);

Auth::routes();
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('update-cart', [CartController::class, 'updatecart']);
Route::middleware(['auth'])->group(function () {
    Route::get('cart', [CartController::class, 'viewcart']);
    Route::get('checkout', [CheckoutController::class, 'index']);
    Route::post('place-order', [CheckoutController::class, 'placeorder']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\FrontendController@index');

    Route::get('categories', 'Admin\CategoryController@index');
    Route::get('add-category', 'Admin\CategoryController@add');
    Route::post('insert-category', 'Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);

    Route::get('products', [ProductController::class, 'index']);

    Route::get('data', 'Admin\ProductController@getData')->name('products.data');

    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-products', [ProductController::class, 'insert']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

    Route::get('orders', [OrderController::class, 'index']);

    Route::get('afiliados', [AfiliadosController::class, 'index']);
    Route::get('add-afiliados', [AfiliadosController::class, 'add']);
    Route::post('insert_afiliado', 'Admin\AfiliadosController@insert_afiliado');

    Route::get('produtores', [ProdutorController::class, 'index']);
    Route::get('add-produtores', [ProdutorController::class, 'add']);
    Route::post('insert_produtores', 'Admin\ProdutorController@insert_produtores');
});
