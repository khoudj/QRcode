<?php
/**
*	La classe Request servira à récupérer l'URL pour savoir quoi en faire
*/
class Request{
	//	URL appelé par l'utilisateur
	public $url;
	/**
	*	Constructeur du Request
	*/
	public function __construct(){
		$this->url = $_SERVER['PATH_INFO'];
	}
}	
?>