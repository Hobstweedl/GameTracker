<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model{

    protected $fillable = ['playthrough_id', 'user_id', 'game_id', 'score'];

    public function participants(){
    	return $this->hasMany('App\Participant');
    }

    public function player(){
        return $this->hasOne('App\Player');
    }

    public function game(){
    	return $this->hasOne('App\Game');
    }
}