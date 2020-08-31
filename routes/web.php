<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// rutas de administrador
Route::group(['middleware' => 'admin'], function () {
    Route::resource('roles', 'RoleController')->names('role');
    Route::put('clientes/{cliente}_actualizado', 'ClientController@updateState')->name('client.updateState');
    Route::get('clientes/{cliente}/cambio_estado', 'ClientController@changeState')->name('client.changeState');
    Route::get('clientes/deshabilitados', 'ClientController@disable')->name('client.disable');
    Route::resource('clientes', 'ClientController', ['except' => ['create', 'store']])->names('client');
    Route::get('tienda/listado_de_productos', 'ProductController@productList')->name('product.whiteList');
    Route::get('tienda/listado_de_productos_deshabilitados', 'ProductController@disable')->name('product.blackList');
    Route::get('tienda/{product}/cambio_estado', 'ProductController@changeState')->name('product.changeState');
    Route::get('tienda/{product}/eliminar', 'ProductController@confirmDestroy')->name('product.confirmDestroy');
    Route::put('tienda/{product}_actualizado', 'ProductController@updateState')->name('product.updateState');
});
//rutas de usuario
Route::view('/', 'news')->name('news');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::resource('category', 'CategoryController')->names('category');
Route::resource('tienda', 'ProductController')
    ->names('product')
    ->parameters(['tienda' => 'product']);

Auth::routes(['verify' => true]);
