<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Playthrough extends Model{

    protected $fillable = ['game_id', 'notes', 'played', 'duration'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'played'];

    public function getDurationAttribute($value){
        return Carbon::parse($value);
    }

    public function participants(){
    	return $this->hasMany('App\Participant');
    }

    public function players(){
        return $this->belongsToMany('App\User', 'participants')->orderBy('score', 'desc')->select('nickname', 'score');
    }

    public function game(){
    	return $this->hasOne('App\Game', 'id', 'game_id')->select(['id', 'name', 'photo', 'description']);
    }

    public function times(){
        return $this->hasMany('App\Time');
    }


}