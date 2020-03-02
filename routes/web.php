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
//Route::get('/home2', 'HomeController@index2')->name('home2');
Route::resource('home2', 'ReportePerfilController');

$router->get('import', 'ImportController@import')->name('import');

Route::resource('importar', 'ImportController');

Route::get('mensaje', 'StorageController@index')->name('mensaje');
Route::get('error', 'StorageController@error')->name('error');

Route::post('storage', 'ImportController@save')->name('storage');
Route::resource('report', 'ControllerReport');

Route::get('reportH',array('as'=>'reportH','uses'=>'ControllerReport@ConteoHoras'));

Route::get('reportsexo',array('as'=>'reportsexo','uses'=>'ConceptoController@sexo_ver'));
Route::resource('concepto','ConceptoController');

Route::get('reports',array('as'=>'reports','uses'=>'ControllerReport@mostrandoFecha'));

Route::get('prueba', 'ControllerReport@prueba')->name('prueba');



/////rutas adonay
Route::get('volall', 'ConVoluntarios@index2')->name('index2');
Route::post('valcodigo', 'ConVoluntarios@valkodigo')->name('valcodigo');
Route::resource('voluntarios', 'ConVoluntarios');
Route::resource('orientador', 'OrientadorController');
Route::resource('turnos', 'TurnosController');
Route::resource('carrera', 'CarreraController');
Route::resource('instituto', 'instituciones');
Route::Delete('supr/{id}', 'ConVoluntarios@destroy')->name('borrar');