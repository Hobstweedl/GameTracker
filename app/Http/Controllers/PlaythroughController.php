<?php

namespace App\Http\Controllers;

use App\User;
use App\Game;
use App\Participant;
use App\Playthrough;
use App\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\Storage;
use Kodeine\Acl\Models\Eloquent\Permission;
use Carbon\Carbon;


class PlaythroughController extends Controller
{

     public function __construct(){
        $this->middleware('auth', ['only' => ['log', 'storeLog', 'storeHistorical', 'historical']]);
    }

    public function index(){

        $p = Playthrough::get();
        foreach($p as $pl){
            print_r($pl->times);
            echo '<br>';
        }

        /*
        $active = Playthrough::where('where group by has no end');
        $paused = Playthrough::orderBy('id', 'desc')->take(20)->get();
        $plays = Playthrough::orderBy('id', 'desc')->take(20)->get();
        return view('playthrough.index',[
            'plays' => Playthrough::orderBy('id', 'desc')->take(20)->get()
        ]);
        */ 
        
    }
    
    public function log(){
        return view('playthrough.log',[
            'players' => User::get(['id', 'nickname', 'profile_photo']),
            'games' => Game::get(['id', 'name', 'photo'])
        ]);

    }

    public function storeLog(Request $request){
        $game = $request->get('game');
        $users = $request->get('players');
        print_r($game);
        echo '<br><br>';
        $userArr = explode(',', $users);
        print_r($userArr);
        $playthrough = Playthrough::create([
            'game_id' => $game
        ]);

        $time = Time::create([
            'playthrough_id' => $playthrough->id,
            'action' => 'start'
        ]);

        foreach($userArr as $user){
            Participant::create([
                'playthrough_id' => $playthrough->id,
                'game_id' => $game,
                'user_id' => $user
            ]);
        }
        
        return redirect()->route('playthrough');
    }


    public function historical(){
        return view('playthrough.historical',[
            'players' => User::get(['id', 'nickname', 'profile_photo']),
            'games' => Game::get(['id', 'name', 'photo'])
        ]);
    }

    public function storeHistorical(Request $request){
        $game = $request->get('game');
        $users = $request->get('players');
        $userArr = explode(',', $users);
        $date = Carbon::createFromFormat('m/d/Y', $request->get('daterange'));

        $playthrough = Playthrough::create([
            'game_id' => $game,
            'played' => $date,
            'notes' => $request->get('notes')
        ]);

        foreach($userArr as $user){
            Participant::create([
                'playthrough_id' => $playthrough->id,
                'game_id' => $game,
                'user_id' => $user
            ]);
        }
        
        print_r( $request->all() );
    }


}