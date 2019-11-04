<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role_or_permission:estandar|ver_facturas']], function () {
    Route::resource('factura', 'Frontend\FacturaController');
    Route::get('down/{filename}', 'Frontend\FacturaController@getFactura');
});

Route::group(['middleware' => ['role_or_permission:Administrador']], function () {
    Route::resource('admin', 'Backend\DashboardController');
    Route::resource('adminfacturas', 'Backend\FacturaController');
    Route::resource('usuarios', 'Backend\UserController');
    Route::resource('estadisticas', 'Backend\StatsController');
    Route::resource('empresas','Backend\EmpresaController');
    Route::get('download/{filename}', 'Backend\FacturaController@getFile');
});
