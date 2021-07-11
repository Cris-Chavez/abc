<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ContainerController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class );
Route::resource('provider', ProviderController::class );
Route::resource('destination', DestinationController::class);
Route::get('product/catalogue', [App\Http\Controllers\ProductController::class, 'catalogue'])->name('product.catalogue');
Route::get('product/search', [App\Http\Controllers\ProductController::class, 'search'])->name('product.search');
Route::resource('product', ProductController::class);
Route::get('price/get', [PriceController::class, 'getPrices'])->name('price.getPrices');
Route::resource('price', PriceController::class);
Route::get('container/getProvider', [App\Http\Controllers\ContainerController::class, 'getProvider'])->name('container.getProviders');
Route::resource('container', ContainerController::class);
