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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'VerificaUserAdmin@verificaLogin')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('campus')->group(function () {
  Route::get('/', 'CampusController@listar');
  Route::get('/novo', 'CampusController@detalhes');
  Route::post('/novo', 'CampusController@createOrUpdate');

  Route::get('/{campus}/detalhes', 'CampusController@detalhes');
});

Route::prefix('coordenacao')->group(function () {
  Route::get('/', 'CoordenacaoController@listar');
  Route::get('/novo', 'CoordenacaoController@detalhes');
  Route::post('/novo', 'CoordenacaoController@createOrUpdate');

  Route::get('/{coordenacao}/detalhes', 'CoordenacaoController@detalhes');
});

Route::prefix('usuarios')->group(function () {
  Route::get('/', 'UsuarioController@listar');
  Route::get('/novo', 'UsuarioController@detalhes');
  Route::post('/novo', 'UsuarioController@createOrUpdate');

  Route::get('/{usuario}/detalhes', 'UsuarioController@detalhes');
});

Route::get('/versao', 'VersaoController@index');

Route::prefix('rede')->group(function () {
  Route::get('/', 'RedeController@index');

  Route::get('/novo', 'RedeController@novo');

  Route::post('/novo', 'RedeController@createOrUpdate');

  Route::get('/{rede}/detalhes', 'RedeController@detalhes');

});

Route::prefix('switch')->group(function () {
  
  Route::get('/', 'SwitchController@listar');
  Route::get('/novo', 'SwitchController@detalhes');
  Route::post('/novo', 'SwitchController@createOrUpdate');
  Route::get('/{switch}/detalhes', 'SwitchController@detalhes');

});


// Route::get('/rede', 'RedeController@index');

// Route::post('/rede', 'RedeController@createOrUpdate');

