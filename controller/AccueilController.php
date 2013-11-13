 <?php
/**
*	La classe AccueilController hérite du controleur général
*	Controlleur envoyé par défaut dans le layout principal
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class AccueilController extends Controller{
	/**
	*	Méthode de point d'entrée de l'application web
	*	CONNEXION :
	*		Si le login est détécté en POST
	*		Nous chargeons le Model USER
	*		Nous cherchons si le user existe avec sont login (email) et son mot de pass
	*		CONNEXION OK
	*			Si il existe, nous créons une session avec son SESSION['user'] qui contient son nom et son id
	*			Nous créons une alert flash pour prévenir l'utilisateur qu'il est logué
	*		CONNEXION FAIL
	*			Si la connexion échoue, nous créons une alert flash pour prévenir l'utilisateur qu'il y a eu une erreur
	*/
	function index(){
		// CONNEXION Si le login est détécté en POST
		if(isset($_POST['login'])){
			// Nous chargeons le Model USER
			$this->loadModel('User');
			// Nous cherchons si le user existe avec sont login (email) et son mot de pass
			$user = $this->User->find(array(
										'condition'=>'email="'.$_POST['login'].'" AND password="'.md5($_POST['password']).'"'
				));
			// Utilisateur connecté
			if(isset($user[0]->id) && isset($user[0]->name)){ 
				// Si il existe, nous créons une session avec son SESSION['user'] qui contient son nom et son id
				$_SESSION['user'] = array(
									'id'=>$user[0]->id,
									'name'=>$user[0]->name);
				// Nous créons une alert flash pour prévenir l'utilisateur qu'il est logué
				$alert = array(
					'type'		=>'success',
					'title'		=>'Salut '.$user[0]->name,
					'message'	=>'Tu es bien connecté !'
					);
				// nous envoyons à la vue l'alert
				$this->set(array('alert'=>$alert));
			}else{
				// CONNEXION FAIL
				// Si la connexion échoue, nous créons une alert flash pour prévenir l'utilisateur qu'il y a eu une erreur
				$alert = array(
					'type'		=>'danger',
					'title'		=>'Utilisateur inconnu',
					'message'	=>'Vous vous êtres trompé, entrez un email et un mot de passe correcte',
					'list'		=>array('votre email','Votre mot de passe')
					);
				// nous envoyons à la vue l'alert
				$this->set(array('alert'=>$alert));
			}
		}
		// Nous définissons le menu actif
		$this->set(array(
			'pageAccueil'=>'active',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'',
			'pageProfil'=>'')
		);
		// rendu de la vue view/accueil/index.php
		$this->render('index');
	}
	/**
	*	Méthode pour se déconnecter
	*	Si l'utilisateur est enregistré en SESSION 
	*		Nous effaçons la SESSION utilisateur
	*	Nous créons une alert flash pour l'informer qu'il est déconnecté
	*	Nous rendons la vue
	*/
	function disconnect(){
		// Si l'utilisateur est enregistré en SESSION 
		if(isset($_SESSION['user'])){
			// Nous effaçons la SESSION utilisateur
			unset($_SESSION['user']);
		}
		// Nous créons une alert flash pour l'informer qu'il est déconnecté
		$alert = array(
					'type'		=>'info',
					'title'		=>'Deconnexion',
					'message'	=>'Vous venez de vous déconnecter'
					);
		// nous envoyons à la vue l'alert
		$this->set(array('alert'=>$alert));
		// Nous définissons le menu actif
		$this->set(array(
			'pageAccueil'=>'active',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'')
		);
		// rendu de la vue view/accueil/index.php
		$this->render('index');
	}

}	
?>