<?php namespace App;

use GlideImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model{
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	public function CoverImage($w = 175, $h = 145){
	    $params = ['w' => $h, 'h' => $h];
	    
        $glide = GlideImage::load($this->photo)->modify($params);
        return "<img src='$glide'>";	    
	}

    
}