<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
	Endpoints para sistema de catálogo
*/

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');

Route::prefix('acervo')->group(function(){
	Route::get('/all', 'AcervoController@index')->name('items_acervo');
	Route::get('/', 'AcervoController@pag')->name('paginate_acervo');
	Route::get('/{item}', 'AcervoController@mostrar')->name('item_acervo');

	Route::get('/busca/{termo}', 'BuscaAcervoController@pag')->name('buscar_acervo');

	// Route::put('/{item}', 'AcervoController@editar')->name('editar_item');
	Route::post('/atualizar/{item}', 'AcervoController@atualizar')->name('editar_item');
	
	Route::post('/cadastrar', 'AcervoController@cadastrar')->name('cadastrar_item');

	Route::delete('/{item}', 'AcervoController@deletar')->name('deletar_item');
	});

Route::prefix('correntistas')->group(function(){
	Route::get('/', 'CorrentistasController@pag')->name('paginate_correntistas');
	Route::get('/{item}', 'CorrentistasController@mostrar')->name('correntista');
});