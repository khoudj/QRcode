<?php
/**
*	Cette classe Dispatcher servira à récupérer l'URL pour savoir quoi en faire
*/
class Dispatcher{
	//	Objet contenant la request
	var $request;
	/**
	*	Constructeur du Dispatcher
	*/
	public function __construct(){
		$this->request = new Request();
		//	Nous lançons la méthode static parse() du Router. 
		Router::parse($this->request->url,$this->request);
		//	Nous utilisons la méthode leadController() pour instancier le controleur passé à $request
		$controller = $this->loadController();
		//  Nous devons ensuite appeler la methode du controleur en lui envoyant tous les paramêtres
        //  call_user_func_array(fonction, param_array)
        //  fonction    > tableau contenant le l'objet et sa méthode
        //  $params     > tableau contenant les paramêtre à passer à la methode de l'objet
        //	Avant nous devons tester si la méthode demandée dans $this->request->action
        //	existe grâce la la fonction get_class_methods()
        if(!in_array($this->request->action, get_class_methods($controller))){
        	$this->error('Le controleur '.$this->request->controller.' n\'a pas de méthode '.$this->request->action);
        }
		call_user_func_array(array($controller,$this->request->action), $this->request->params);
		//	Nous appelons la fonction render pour faire un rendu automatique
		$controller->render($this->request->action);
	}

	/**
	*	La méthode loadController() instancie le controleur passé à $request
	*	Avant de lancer l'instanciation, nous devons formater le nom du controleur :
	*	NomController
	*/
	public function loadController(){
		//	Nous devons formater le nom du controller
		//	Nous mettons une majuscule à la première lettre du nom du controleur
		$name = ucfirst($this->request->controller).'Controller';
		//	Nous créons le chemin pour inclure le fichier du controleur
		$file = ROOT.DS.'controller'.DS.$name.'.php';
		//	Nous l'incluons
		require $file;
		//	Nous retournons une instance de ce controleur
		return new $name($this->request);
	}

	/**
	*	La méthode error() instancie un controller qui fera rendre une vue 404
	*/
	public function error($message){
		header('HTTP/1.0 404 Not Found');
		$controller = new Controller($this->request);
		$controller->set('message',$message);
		$controller->render('/errors/404');
		die();

	}
}
	
?>