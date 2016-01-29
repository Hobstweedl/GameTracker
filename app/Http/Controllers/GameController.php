<?php

namespace App\Http\Controllers;

use App\Uploadr;
use App\Game;
use App\Bgg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\Storage;
use Kodeine\Acl\Models\Eloquent\Permission;


class GameController extends Controller
{

     public function __construct(){
        //$this->middleware('auth');
    }

    public function index(){
        $games = Game::with('playthroughs')->get();

        return view('game.index', ['games' => $games]);
    }
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function add(){
        return view('game.add');
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

    public function show($id){

        $game = Game::find($id);
        $bgg = new \App\Bgg;
        $api = $bgg->getBoardGame($game->bgg_id);
        return view('game.show', [
            'game' => $game,
            'details' => $api
        ]);

    }
}