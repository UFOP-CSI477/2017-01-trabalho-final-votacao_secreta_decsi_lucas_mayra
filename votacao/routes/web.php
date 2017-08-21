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

Route::resource('/home', 'ReuniaosController');
Route::resource('/users', 'UsersController');
Route::resource('/salas', 'SalasController');
Route::resource('/reuniaos', 'ReuniaosController');
Route::resource('/participas', 'ParticipasController');
Route::resource('/pautas', 'PautasController');
Route::resource('/resultados', 'ResultadosController');

Route::get('/pautas/index/{reuniao}', 'PautasController@index');
Route::get('/pautas/create/{reuniao}', 'PautasController@create');
Route::get('/resultados/create/{pauta}', 'ResultadosController@create');

Route::post('/pautas/status/{{ $pauta->id }}', 'PautasController@status');
Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
