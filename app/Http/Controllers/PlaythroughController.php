<?php

namespace App\Http\Controllers;

use App\User;
use App\Game;
use Input;
use App\Participant;
use App\Playthrough;
use Illuminate\Http\Request;
use App\Http\Requests\storePlaythroughRequest;
use App\Http\Controllers\Controller;
use Kodeine\Acl\Models\Eloquent\Role;
use Illuminate\Support\Facades\Storage;
use Kodeine\Acl\Models\Eloquent\Permission;
use Carbon\Carbon;


class PlaythroughController extends Controller
{

     public function __construct(){
        //$this->middleware('auth', ['only' => ['add', 'store']]);
    }

    public function index(){
        
        $plays = Playthrough::orderBy('played', 'desc')->take(15)->get();
        return view('playthrough.index',[
            'plays' => $plays
        ]);
        
    }

    public function add(){
        return view('playthrough.add',[
            'players' => User::get(['id', 'nickname', 'profile_photo']),
            'games' => Game::get(['id', 'name', 'photo'])
        ]);
    }

    public function store(storePlaythroughRequest $request){
        print_r( $request->all() );
        $game = $request->get('game');
        $users = $request->get('players');
        $winners = $request->get('winners');
        $userArr = explode(',', $users);
        $winnerArr = explode(',', $winners);

        $date = Carbon::createFromFormat('m/d/Y', $request->get('daterange'));
        $time = Carbon::createFromFormat('g:i', $request->get('timerange'));

        $playthrough = Playthrough::create([
            'game_id' => $game,
            'played' => $date,
            'duration' => $time,
            'notes' => $request->get('notes')
        ]);

        foreach($userArr as $user){

            if( in_array($user, $winnerArr) ){
                $w = 1;
            } else{
                $w = 0;
            }

            Participant::create([
                'playthrough_id' => $playthrough->id,
                'game_id' => $game,
                'user_id' => $user,
                'score' => $request->input('person-'.$user),
                'winner' => $w
            ]);
        }
        
        return redirect()->route('playthrough');
    } 

    public function edit($id){
        $scores = [];
        $playthrough = Playthrough::find($id);
        foreach($playthrough->participants as $participant){
            $scores[$participant->user_id] = $participant->score;
        }

        return view('playthrough.edit',[
            'players' => User::get(['id', 'nickname', 'profile_photo']),
            'games' => Game::get(['id', 'name', 'photo']),
            'playthrough' => $playthrough,
            'p_id' => $id,
            'player_scores' => $scores
        ]);
    }


}