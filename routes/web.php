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
/*
Route::get('/', function () {
	return redirect(route('ordini.index'));
});
*/
Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'OrdiniController@index')->name('index');
Route::get('next/{id}','OrdiniController@next')->name('next');
Route::get('cerca','OrdiniController@cerca')->name('cerca');
Route::post('cerca_POST','OrdiniController@Cerca_POST')->name('cerca_POST');

Route::get('add_cliente','HomeController@CreaCliente')->name('add_cliente');
Route::post('Crea','HomeController@Crea')->name('Crea');


//route Crud
Route::resource('ordini', 'OrdiniController');


Auth::routes();