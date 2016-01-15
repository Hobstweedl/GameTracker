<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Time extends Model{

    use SoftDeletes;

    protected $fillable = ['playthrough_id', 'action'];

    public function playthrough(){
    	return $this->belongsTo('App\Playthrough');
    }

    public function game(){
    	return $this->hasManyThrough('App\Game', 'App\Playthrough');
    }

    public function scopeActive($query){
        return $query->whereNotIn('playthrough_id', function($q){
        	$q->select('playthrough_id')->from('times')->where('action', '=', 'finish');
        })->distinct('playthrough_id')->get(['playthrough_id']);
    }

    public function scopeFinished($query){
        return $query->whereIn('playthrough_id', function($q){
        	$q->select('playthrough_id')->from('times')->where('action', '=', 'finish');
        })->distinct('playthrough_id')->get(['playthrough_id']);
    }



}