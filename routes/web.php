<?php

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


Route::get('/', 'App\Http\Controllers\ProductsController@index')->name('products.AllProducts');
Route::get('/products/create', 'App\Http\Controllers\ProductsController@CreateProduct')->name('products.CreateProduct');
Route::post('/products/store', 'App\Http\Controllers\ProductsController@Store')->name('products.Store');
Route::get('/products/destroy/{id}', 'App\Http\Controllers\ProductsController@Destory')->name('products.Destory');


 