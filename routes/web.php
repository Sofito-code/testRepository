<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\RolesAndPermissions\Models\Role;
use App\RolesAndPermissions\Models\Permission;
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
//rutas de usuario
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify'=> true]);
// rutas de administrador
Route::get('/tablero', 'HomeController@index')->name('home')->middleware('verified');
Route::group(['middleware' => 'admin'], function () {
    //Route::resource('roles', 'RoleController')->names('role');
    Route::get('clientes_deshabilitados','ClientController@disable')->name('client.disable');
    Route::resource('clientes', 'ClientController')->names('client');    
});