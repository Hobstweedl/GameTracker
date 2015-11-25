<?php namespace App;

use Image;
use File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Uploadr {

	public $path, $size;
	public function __construct(){
		$this->path = storage_path('app/images');
		$this->size = 400;
	}

	public function uploadFromUrl($url, $name, $path = null, $w = 400, $h = 400, $ext = 'png' ){
		$p = '';
		$storagePath = $this->path;

		if($path !== null){
			$p .= $path.DIRECTORY_SEPARATOR;
			$storagePath .= DIRECTORY_SEPARATOR.$path;
		}

		if (!File::isDirectory($storagePath)){
		    File::makeDirectory($storagePath, 0777, true);
		}
		$p .= $name.'.'.$ext;
		$img = Image::make( $url )->resize($w, $h, function ($constraint) {
		    $constraint->aspectRatio();
		})->save( $this->path.DIRECTORY_SEPARATOR.$p);
		
		return $p;
	}
	
	public function upload(UploadedFile $file, $w, $h, $path = null, $name = null, $x = null, $y = null  ){
		$parts = pathinfo($file->getClientOriginalName() );
		$p = '';
		$storagePath = $this->path;

		if($path !== null){
			$p .= $path.DIRECTORY_SEPARATOR;
			$storagePath .= DIRECTORY_SEPARATOR.$path;
		}

		if($name !== null){
			$p .= $name.'.'.$parts['extension'];
		} else{
			$p .= $parts['basename'];
		}
		
		if (!File::isDirectory($storagePath)){
			echo 'Make Directory '.$storagePath.'<br>';
		    File::makeDirectory($storagePath, 0777, true);
		}
		$img = Image::make( $file )->crop($w, $h, $x, $y)->
		resize(400, null, function($c){
                $c->aspectRatio();
        })->save( $this->path.DIRECTORY_SEPARATOR.$p);
        
		
		return $p;

	}
}