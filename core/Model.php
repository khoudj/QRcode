<?php
/**
*	La classe Model servira de modèle général
*/
class Model{
	static $connection = array();

	public $conf = 'default';
	public $table = false;
	public $db;

	/**
	*	Constructeur de Model
	*/
	public function __construct(){
		// connexion à la base
		// Variable de Config
		$conf = (Conf::$databases[$this->conf]);
		// Nous testons si la base à déjà été chargée
		if(isset(Model::$connection[$this->conf])){
			$this->db = Model::$connection[$this->conf];
			return true;
		}

		try{
			// création de la connexion
			$pdo = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['database'],
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
			// Nous stoquons la connection dans la variable static de connection
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
		// Nous initialisons qlq varialbles
		if($this->table ===false){
			$this->table = strtolower(get_class($this)).'s';
		}
	}
	public function find($req){
		$sql = 'SELECT * FROM '.$this->table.' as '.get_class($this).' ';
		if(isset($req['condition'])){
			$sql .= 'WHERE '.$req['condition'];
		}
		$pre = $this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}
	public function add($req){
		$sql = "INSERT INTO qrcode.users (id, name, email, password) VALUES (NULL, '".$_POST['name']."', '".$_POST['email']."', '".md5($_POST['password'])."')";
		$pre = $this->db->prepare($sql);
		$pre->execute();
	}
	public function del($id){
		$sql = "DELETE FROM qrcode.myqrcodes WHERE myqrcodes.id = '".$id."'";
		$pre = $this->db->prepare($sql);
		$pre->execute();
	}

	
}