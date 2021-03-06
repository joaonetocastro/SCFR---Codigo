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
})->name('home');

Route::get('log-out', function () {
    Auth::logout();
    return redirect(route('home'));
})->name('log-out');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', function(){
	return "view do administrador";
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'UserController@index')->name('admin.users.index');
    Route::group(['prefix' => 'users'], function () {
        Route::get('switch/{id}', 'UserController@trocar')->name('admin.users.switch');
        Route::get('create', 'UserController@create')->name('admin.users.create');
        Route::post('save', 'UserController@save')->name('admin.users.save');
    });
    Route::get('user/profile', function () {});
});

Route::group(['prefix' => 'usuario'], function () {
    Route::get('/', 'UserController@control')->name('overview');
    Route::group(['prefix' => 'reunioes'], function () {
        Route::get('/', 'ReunioesController@index')->name('users.reunioes.index');
        Route::get('create', 'ReunioesController@create')->name('users.reunioes.create');
        Route::get('iniciar/{id}', 'ReunioesController@iniciar')->name('users.reunioes.iniciar');
        Route::get('iniciar/{reuniao_id}/{user_id}', 'ReunioesController@marcarPresenca')->name('users.reunioes.presenca');
        Route::get('encerrar/{reuniao_id}', 'ReunioesController@encerrar')->name('users.reunioes.encerrar');
        Route::post('save', 'ReunioesController@save')->name('users.reunioes.save');
        Route::get('participantes/{id}', 'ReunioesController@participantes')->name('users.reunioes.participantes');
        Route::post('participantes', 'ReunioesController@updateParticipantes')->name('users.reunioes.participantes.update');
        Route::get('delete/{id}', 'ReunioesController@delete')->name('users.reunioes.delete');
        // Uses Auth Middleware
    });
});
