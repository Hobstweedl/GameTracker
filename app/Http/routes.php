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
use App\Playthrough;
use Kodeine\Acl\Models\Eloquent\Permission;

Route::get('/', function () {
    return view('app');
});

/*Route::get('perm', function(){
	$permission = new Permission();
	$permUser = $permission->create([ 
	    'name'        => 'game',
	    'slug'        => [          // pass an array of permissions.
	        'create'     => true,
	        'view'       => true,
	        'update'     => true,
	        'delete'     => true
	    ],
	    'description' => 'manage game permissions'
	]);
});
*/

/* Game */
Route::get('game', ['uses' => 'GameController@index', 'as' => 'game']);
Route::get('game/add', ['uses' => 'GameController@add', 'as' => 'game.add']);
Route::post('game/add', ['uses' => 'GameController@store', 'as' => 'game.store']);
Route::get('game/{id}', ['uses' => 'GameController@show', 'as' => 'game.show']);

/* Player */
Route::get('player', ['uses' => 'PlayerController@index', 'as' => 'player']);
Route::get('player/add', ['uses' => 'PlayerController@add', 'as' => 'player.add']);
Route::post('player/add', ['uses' => 'PlayerController@store', 'as' => 'player.store']);
Route::get('player/edit/{id}', ['uses' => 'PlayerController@edit', 'as' => 'player.edit']);
Route::post('player/edit/{id}', ['uses' => 'PlayerController@update', 'as' => 'player.update']);
Route::get('player/{id}', ['uses' => 'PlayerController@show', 'as' => 'player.show']);

Route::get('playthrough', ['uses' => 'PlaythroughController@index', 'as' => 'playthrough']);
Route::get('playthrough/add', ['uses' => 'PlaythroughController@add', 'as' => 'playthrough.add']);
Route::post('playthrough/add', ['uses' => 'PlaythroughController@store', 'as' => 'playthrough.store']);
Route::get('playthrough/edit/{id}', ['uses' => 'PlaythroughController@edit', 'as' => 'playthrough.edit']);


/* Admin */
Route::get('admin', ['uses' => 'AdminController@index', 'as' => 'admin']);

Route::get('admin/roles', ['uses' => 'AdminController@roles', 'as' => 'admin.roles']);
Route::get('admin/roles/create', ['uses' => 'AdminController@createRole', 'as' => 'admin.roles.create']);
Route::post('admin/roles/create', ['uses' => 'AdminController@storeRole', 'as' => 'admin.roles.store']);
Route::post('admin/roles/update', ['uses' => 'AdminController@updateRole', 'as' => 'admin.roles.update']);

Route::get('admin/permissions', ['uses' => 'AdminController@permissions', 'as' => 'admin.permissions']);
Route::get('admin/permissions/create', ['uses' => 'AdminController@createPermission', 'as' => 'admin.permissions.create']);
Route::post('admin/permissions/update', ['uses' => 'AdminController@updatePermission', 'as' => 'admin.permissions.update']);

Route::get('admin/users', ['uses' => 'AdminController@users', 'as' => 'admin.users']);
Route::get('admin/user/edit/{id}', ['uses' => 'AdminController@user', 'as' => 'admin.user.edit']);
Route::get('admin/game/index', ['uses' => 'AdminController@indexGames', 'as' => 'admin.game.index']);

/*	Register and Login */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

Route::get('api/game/{id}', ['as' => 'api.game', function($id){
	$bgg = new \App\Bgg;
	$bgg->getBoardGame($id);
	//return response()->json( $bgg->getBoardGame($id), 200, [], JSON_PRETTY_PRINT );
}]);

Route::get('api/search/{text}', ['as' => 'api.search', function($text = null){
	$bgg = new \App\Bgg;
	return response()->json( $bgg->search($text), 200, [], JSON_PRETTY_PRINT );
}]);

Route::get('api/playthrough/players/{id}', ['as' => 'api.players', function($id){
	
	$st = "";
	$players = Playthrough::find($id)->participants;
	foreach($players as $k => $p){
		if($k > 0){
			$st .= ',';
		}
		$st .= "$p->user_id";
	}
	return $st;
}]);

Route::get('api/playthrough/winners/{id}', ['as' => 'api.winners', function($id){
	
	$st = "";
	$players = Playthrough::find($id)->participants()->where('winner', '=', 1)->get(['user_id']);
	foreach($players as $k => $p){
		if($k > 0){
			$st .= ',';
		}
		$st .= "$p->user_id";
	}
	return $st;
}]);
