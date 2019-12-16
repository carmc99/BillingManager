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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role_or_permission:estandar|ver_facturas']], function () {
    Route::resource('facturas', 'Frontend\FacturaController');
    Route::get('download/{filename}', 'Frontend\FacturaController@getFactura');
    Route::get('downloadR/{filename}', 'Frontend\ReciboController@getFile');
    Route::resource('recibos', 'Frontend\ReciboController');
    Route::resource('usuario', 'Frontend\UserController');
});

Route::group(['middleware' => ['role_or_permission:Administrador']], function () {
    Route::resource('admin', 'Backend\DashboardController');
    Route::resource('adminfacturas', 'Backend\FacturaController');
    Route::resource('usuarios', 'Backend\UserController');
    Route::resource('estadisticas', 'Backend\StatsController');
    Route::resource('empresas','Backend\EmpresaController');
    Route::get('downloadFactura/{filename}', 'Backend\FacturaController@getFile');
    Route::get('downloadRecibo/{filename}', 'Backend\ReciboController@getFile');
    Route::resource('adminrecibos', 'Backend\ReciboController');
    #Route::post('adminfacturas/{id}/', 'Backend\ReciboController@store');

    // Estadisticas
    Route::get('/stats', 'Backend\Stats\HomeChartController@index');
    Route::get('/usersStats', 'Backend\Stats\UserChartController@index');
    Route::get('/recibosStats', 'Backend\Stats\ReciboChartController@index');
    Route::get('/facturasStats', 'Backend\Stats\FacturaChartController@index');
    Route::get('/empresasStats', 'Backend\Stats\EmpresaChartController@index');

});


