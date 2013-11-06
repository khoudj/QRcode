<?php
/**
*	La classe Model servira de modèle général
* 	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class Model{
	//	Contient les informations pour la connexion
	static $connection = array();
	//	Contient la configuration
	public $conf = 'default';
	//	Contient le nom de la table
	public $table = false;
	//	Contient la connexion à la base
	public $db;

	/**
	*	Constructeur de Model
	*/
	public function __construct(){
		// connection à la base
		// Variable de Config
		$conf = (Conf::$databases[$this->conf]);
		// Nous testons si la base a déjà été chargée
		if(isset(Model::$connection[$this->conf])){
			$this->db = Model::$connection[$this->conf];
			return true;
		}

		try{
			// création de la connexion grâce à PDO
			$pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'],
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
			// Nous stoquons la connexion dans la variable static de connexion
			Model::$connection[$this->conf] = $pdo;
			$this->db = $pdo;
		}catch(PDOException $e){
			// Mode débug, Nous affichons l'erreur
			if(Conf::$debug){
				die($e->getMessage());
			}else{
				// Sinon nous affichons un message générique
				die('erreur de connexion a la base');
			}

		}
		// Nous initialisons le nom de la table en rajoutant un s à la fin
		if($this->table ===false){
			$this->table = strtolower(get_class($this)).'s';
		}
	}
	/**
	*	Fonction du Read du CRUD 'Create Read Update Delete'
	*	reçoit les paramètre de la requête, la créer et renvoie la réponse de la base
	*
	*
	*/
	public function find($req){
		$sql = 'SELECT * FROM '.$this->table.' as '.get_class($this).' ';
		if(isset($req['condition'])){
			$sql .= 'WHERE '.$req['condition'];
		}
		if(isset($req['order'])){
			$sql .= $req['order'];
		}
		$pre = $this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	/**
	*	Fonction du Create et Update du CRUD 
	*	Permet de sauver des données contenues dans le tableau $data.
	*	- Si id est défini dans le tableau $data, la fonction fera un UPDATE
	*	- Si id n'est pas défini dans le tableau $data, la fonction fera un INSERT
	*	@param : array $data
	*/
	function save($data){
		//Nous testons si id est présent dans $data et qu'il n'est pas vide
		if(isset($data['id']) && !empty($data['id'])){
			// suppression de action
			unset($data['action']);
			// id existe, nous ferons un UPDATE sur la table défini à l'instanciation de l'objet
			$sql = "UPDATE ".$this->table." SET ";
			//die($this->table);
			// nous faisons une boucle pour mettre à jour les champs
			foreach ($data as $key => $value) {
				// Inutile de mettre à jour l'id
				if($key!='id'){
					$sql .= "$key='$value',";
				}
			}
			// Nous devons supprimer la dernière ","
			$sql = substr($sql,0,-1);
			// Nous spécifions la condition
			$sql .= " WHERE id=".$data['id'];
		}else{
			// id n'existe pas, nous ferons un INSERT
			$sql = "INSERT INTO ".$this->table." (";
			// id est présent dans $data mais il est vide, il faut donc le supprimer
			unset($data['id']);
			// suppression du password2
			unset($data['password2']);
			// Nous partourons le tableau de data en boucle pour préciser les champs
			foreach ($data as $key => $value) {
				$sql .= "$key,";
			}
			// Nous devons supprimer la dernière  ","
			$sql = substr($sql,0,-1);

			$sql .= ") VALUES("; 
			// Nous partourons le tableau de data en boucle pour préciser les valeurs
			foreach ($data as $key => $value) {
				if($key=='password'){ 
					$sql .= "'".md5($value)."',";
				}else{
					$sql .= "'$value',";
				}
			}
			// Nous devons supprimer la dernière  ","
			$sql = substr($sql,0,-1);
			// Nous spécifions la condition
			$sql .= ")";
		}
		// debug
		//die($sql);
		// Nous lançons la requête 
		$pre = $this->db->prepare($sql);
		$pre->execute();
		// Nous récupérons l'id en fonction de la requête
		if(!isset($data['id'])){
			// si c'est une nouvelle entrée, nous récupérons l'id créé
			$this->id = $this->db->lastInsertId();
		}else{
			// si c'est une mise à jour, nous récupérons l'id envoyé dans $data ($_POST['id'])
			$this->id = $data['id'];
		}
	}
	/**
	*	Fonction du Delete du CRUD pour les Utilisateurs
	*	Supprime l'élément correspondant à l'id dans la table
	*/
	public function delUser($id){

		$sql = "DELETE FROM users WHERE id = '".$id."'";
		$pre = $this->db->prepare($sql);
		//die($sql);
		$pre->execute();
	}
	/**
	*	Fonction du Delete du CRUD pour les QRCcodes des Utilisateurs
	*	Supprime l'élément correspondant à l'id dans la table
	*/
	public function delUserQRcodes($id){

		$sql = "DELETE FROM myqrcodes WHERE user= '".$id."'";
		$pre = $this->db->prepare($sql);
		//die($sql);
		$pre->execute();
	}
	/**
	*	Fonction du Delete du CRUD pour un QRCode
	*	Supprime l'élément correspondant à l'id dans la table
	*/
	public function delOneQRcode($id){

		$sql = "DELETE FROM myqrcodes WHERE id = '".$id."'";
		$pre = $this->db->prepare($sql);
		//die($sql);
		$pre->execute();
	}
}
