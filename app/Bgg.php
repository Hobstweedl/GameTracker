<?php namespace App;

use Illuminate\Support\Facades\Storage;

class Bgg {

	const GAME = 'http://www.boardgamegeek.com/xmlapi2/thing?id=';
	const SEARCH = 'http://www.boardgamegeek.com/xmlapi2/search?query=';

    protected function getXML($url){
    	$document = file_get_contents($url);
    	return new \SimpleXmlElement($document);
    }

    public function getGameImage($id){
    	$xml = self::getXML(self::GAME.$id);
		$parse = $xml->item;
		return  (string) $parse->image;
    }

	public function getBoardGame($id, $simple = false){
		$output = [];
		if($simple == true){

		}
		$xml = self::getXML(self::GAME.$id);
		$parse = $xml->item;

		$output['id'] = (int) $parse->attributes()['id'];
		$output['thumbnail'] = (string) $parse->thumbnail;
		$output['image'] = (string) $parse->image;
		$output['name'] = (string) $parse->name->attributes()['value'];
		$output['description'] = (string) $parse->description;

		return $output;
	}

	public function search($text){
		$output = [];
		$url = urlencode($text);
		$xml = self::getXML(self::SEARCH.$url);
		$total = (int) $xml->attributes()['total'];

		foreach($xml->item as $item){
			$output[] = [
				'id' => (int) $item->attributes()['id'],
				'name' => (string) $item->name->attributes()['value'],
			];
		}
		$return['results']  = $output;
		return $return;
	}


	public function output(){
		return  self::getGameImage('161970') ;
	}
}