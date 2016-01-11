<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Playthrough extends Model{

    protected $fillable = ['game_id', 'notes', 'played'];

    public function participants(){
    	return $this->hasMany('App\Participant');
    }

    public function players(){
        return $this->belongsToMany('App\Player', 'participants')->orderBy('score', 'desc')->select();
    }

    public function game(){
    	return $this->hasOne('App\Game', 'id', 'game_id')->select(['id', 'name', 'photo', 'description']);
    }

}