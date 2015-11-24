<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Bgg;
use App\Uploadr;

Route::get('/', function () {
    return view('app');
});

/* Game */
Route::get('game', ['uses' => 'GameController@index', 'as' => 'game']);
Route::get('game/add', ['uses' => 'GameController@add', 'as' => 'game.add']);
Route::post('game/add', ['uses' => 'GameController@store', 'as' => 'game.store']);

/* Player */
Route::get('player', ['uses' => 'PlayerController@index', 'as' => 'player']);
Route::get('player/add', ['uses' => 'PlayerController@add', 'as' => 'player.add']);
Route::post('player/add', ['uses' => 'PlayerController@store', 'as' => 'player.store']);
Route::get('player/edit/{id}', ['uses' => 'PlayerController@edit', 'as' => 'player.edit']);
Route::post('player/edit/{id}', ['uses' => 'PlayerController@update', 'as' => 'player.update']);

Route::get('player/register', ['uses' => 'PlayerController@register', 'as' => 'player.register']);

/* Admin */
Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin']);
Route::get('admin/roles', ['uses' => 'AdminController@roles', 'as' => 'admin.roles']);
Route::get('admin/roles/create', ['uses' => 'AdminController@createRole', 'as' => 'admin.roles.create']);
Route::post('admin/roles/create', ['uses' => 'AdminController@storeRole', 'as' => 'admin.roles.store']);

/*	Register and Login */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::get('api/game/{id}', ['as' => 'api.game', function($id){
	$bgg = new \App\Bgg;
	return response()->json( $bgg->getBoardGame($id), 200, [], JSON_PRETTY_PRINT );
}]);

Route::get('api/search/{text}', ['as' => 'api.search', function($text = null){
	$bgg = new \App\Bgg;
	return response()->json( $bgg->search($text), 200, [], JSON_PRETTY_PRINT );
}]);