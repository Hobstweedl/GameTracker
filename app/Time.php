<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Time extends Model{

    use SoftDeletes;

    protected $fillable = ['playthrough_id', 'action'];

        public function times(){
    	return $this->hasMany('App\Time');
    }

}