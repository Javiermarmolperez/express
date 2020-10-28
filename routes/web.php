<?php

use App\Http\Controllers\FtpController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboardAdmin.dashboard');
});
Route::get('/tiendas', function () {
    return view('tiendas.index');
});
Route::get('/pedidos', function () {
    return view('pedidos.index');
});
Route::get('/users', function () {
    return view('users.index');
});
Route::get('/ftp', function () {
    return view('ftp.index');
});
Route::get('/ftp/{ftp}', function () {
    return view('ftp.pdf');
});

Route::get('/ ftp/{ftp}', 'FtpController@show')->name('ftp.show');


Route::resource('/tiendas',TiendaController::class);
Route::resource('/users',UsersController::class);
Route::resource('/pedidos',PedidosController::class);
Route::resource('/ftp',FtpController::class);
