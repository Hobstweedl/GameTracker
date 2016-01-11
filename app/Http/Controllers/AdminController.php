<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Game;
use App\Bgg;
use App\Uploadr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;


class AdminController extends Controller
{

     public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $roles = Role::get();
        $players = User::get();
        return view('admin.index', ['roles' => $roles, 'players' => $players]);
    }
    
    public function roles(){
        return view('admin.roles');
    }

    public function createRole(){
        return view('admin.roleCreate');
    }

    public function storeRole(Request $request){
        $role = new Role();
        $role->name = $request->input('name');
        $role->slug = $request->input('slug');
        $role->description = $request->input('description');
        $role->save();

        return redirect()->back();

    }

    public function indexGames(){
        $games = Game::get();
        $bgg = new \App\Bgg;
        $uploadr = new \App\Uploadr;

        foreach($games as $game){

            $url = 'http:'.$bgg->getGameImage($game->bgg_id );
            $path = $uploadr->uploadFromUrl($url, $game->id, 'game');
            $game->photo = $path;
            $game->save();
        }

        return redirect()->back();
    }

}