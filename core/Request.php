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
		if(isset($_SERVER['PATH_INFO'])){
			$this->url = $_SERVER['PATH_INFO'];
		}else{
			$this->url = 'accueil';
		}
	}
}	
?>