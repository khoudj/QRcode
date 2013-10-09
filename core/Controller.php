<?php
/**
*	La classe Controller servira de controleur général
*/
class Controller{
	// objet contenant la request
	public $request;
	// Layout pour rendre la vue
	public $layout 	= 'default';
	// Tableau de variables pour faire passer à la vue
	private $vars 	= array();
	// Layout pour rendre la vue
	private $rendered = false;

	/**
	*	Constructeur de la classes qui permet de récupérer l'objet $request
	*	et la stocker dans $this->request
	*	@param object $request
	*/
	public function __construct($request){
		$this->request = $request;
	}

	/**
	*	Fonction render() permet de faire un rendu dans la vue.
	*	$filname contient le nom du fichier de la vue à inclure
	*	@param string $filname
	*/
	public function render($view){
		//	Nous testons si la vue à déjà été rendue
		//	si oui, nous arrétons la pour ne pas la rendre deux foix
		if($this->rendered){ 
			return false;
		}
		// extraction des variables avant l'envoie à la vue
		extract($this->vars);
		// Nous testons pour savoir si il y a un / en début de chaine qui correspond à une erreur 404
		if(strpos($view,'/')===0){
			// Nous pouvons rendre un fichier spécialement mis quand le dossier vue comme un fichier 404
			$view = ROOT.DS.'view'.$view.'.php';
		}else{
			// Nous rendons une vues "standard"
			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$view.'.php';
		}
		ob_start();
		require $view; 
		$content_for_layout=ob_get_clean();
		require ROOT.DS.'view'.DS.'layout'.DS.$this->layout.'.php';
		$this->rendered = true;
	}

		/**
	*	Fonction render() permet de faire un rendu dans la vue.
	*	$filname contient le nom du fichier de la vue à inclure
	*	@param string $filname
	*/
	public function printqrcode($view){

		// extraction des variables avant l'envoie à la vue
		extract($this->vars);
		// 
		require ROOT.DS.'view'.DS.'layout'.DS.'printqrcode.php';

	}
	
	/**
	*	Fonction set() permet de pousser les variables à envoyer à la vue dans $this->vars
	*	@param string ou array $key 
	*	@param string ou null $value
	*/
	public function set($key,$value=null){
		// Si $key est un tableau, nous l'ajoutons
		if(is_array($key)){
			$this->vars += $key;
		}else{
			// sinon, nous ajoutons à vars la clé/valeur
			$this->vars[$key] = $value;
		}
	}
	/**
	*	Fonction loadModel() permet charger le model $name 
	*	@param string $name 
	*/
	public function loadModel($name){
		// Nous créons le chemin pour le fichier du model
		$file = ROOT.DS.'model'.DS.$name.'.php';
		// Nous incluons le fichier du model
		require_once($file);
		// Nous testons si $name a déjà été instancier précédamment pour éviter de l'instancier plusieurs fois
		if(!isset($this->$name)){
			// Nous instancions la class du model $name
			$this->$name = new $name;
		}
		
	}
}
?>