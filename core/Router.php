
<?php
/**
*	La classe Routeur servira à récupérer le controleur, l'action et les paramêtres de l'URL 
*	et les mettra dans les paramètres du request
*	Se sera une class globale qui ne sera pas instanciée. 
*	Ces paramêtres et méthodes seront donc static
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class Router{
	//	URL appelé par l'utilisateur
	public $url;
	/**
	*	Fonction parse récupère l'url et en extrait 
	*	 - le controleur à instancier
	*	 - la méthode à lancer
	*	 - les paramêtres à passer à la vue
	*	@param string $url URL à parser
	*	@param object $request l'objet $request instancié
	*/
	static function parse($url,$request){
		//	Nous supprimons les / en début et fin de chaîne
		$url = trim($url,'/');
		//	Nous créons le tableau avec explode()
		$params = explode('/',$url);
		//	Nous mettons la valeur du controleur dans  le paramêtre $controller de $request
		$request->controller = $params[0];
			//	si l'action n'existe pas, Nous mettons index dans  le paramêtre $action de $request, sinon la valeur de l'action
		$request->action = isset($params[1]) ? $params[1] : 'index';
		//	Nous injectons dans params du tableau r le reste des éléments à partir de l'entrée 2 (controller et action en moins)
		$request->params = array_slice($params, 2);
	}
}
?>