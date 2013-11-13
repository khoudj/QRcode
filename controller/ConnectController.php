 <?php
/**
*	La classe ConnectController servira pour connecter un user
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class ConnectController extends Controller{
	/**
	*	Fonction lancée par défaut
	*	Vérifie si le login existent dans POST
	*		si oui > nous chargons le model user pour tester les log du user
	*			si le user existe, nous testons ses log
	*				si log ok > nous créons la session > alert connexion ok
	*				si non > nous envoyons une alert
	*			sinon le user n'existe pas, nous envoyons un alert user inconnu
	*	Nous rendons la vue
	*/
	function index(){
		// Vérifie si le login existent dans POST
		if(isset($_POST['login'])){
			// si oui > nous chargons le model user pour tester les log du user
			$this->loadModel('User');
			// si le user existe, nous testons ses log
			$user = $this->User->find(array(
										'condition'=>'email="'.$_POST['login'].'" AND password="'.md5($_POST['password']).'"'
				));
			// si log ok > nous créons la session
			if(isset($user[0]->id) && isset($user[0]->name)){ 
				$_SESSION['user'] = array(
									'id'=>$user[0]->id,
									'name'=>$user[0]->name);
				// alert connexion ok
				$alert = array(
					'type'		=>'success',
					'title'		=>'Salut '.$user[0]->name,
					'message'	=>'Tu es bien connecté !'
					);
				$this->set(array('alert'=>$alert));
			}else{
				// si non > nous envoyons une alert user inconnu
				$alert = array(
					'type'		=>'danger',
					'title'		=>'Utilisateur inconnu',
					'message'	=>'Vous vous êtres trompé, entrez un email et un mot de passe correcte',
					'list'		=>array('votre email','Votre mot de passe')
					);
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
			'pageProfil'=>''
			)
		);
		// rendu de la vue index
		$this->render('index');
	}
}