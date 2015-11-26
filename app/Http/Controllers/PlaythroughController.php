<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\Storage;
use Kodeine\Acl\Models\Eloquent\Permission;


class PlaythroughController extends Controller
{

     public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
        
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function add(){
        return view('playthrough.add',[
            'players' => User::get(['id', 'nickname', 'profile_photo'])
        ]);
    }

    public function store(Request $request){

         $this->validate($request, [
            'name' => 'required|max:255|unique:games',
            'description' => 'required',
            'bgg_id' => 'required',
        ]);
        
        $game = new Game;
        $game->name = $request->name;
        $game->description = $request->description;
        $game->bgg_id = $request->bgg_id;

        if( $request->has('scorable') ){
            $game->scorable = 1;
        }
        $game->save();


        $bgg = new \App\Bgg;
        $url = 'http:'.$bgg->getGameImage($request->input('bgg_id') );

        $uploadr = new \App\Uploadr;
        $path = $uploadr->uploadFromUrl($url, $game->id, 'game');

        $game->photo = $path;
        $game->save();

        return redirect()->route('game');
        
    }

}