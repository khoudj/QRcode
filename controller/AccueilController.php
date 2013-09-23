 <?php
/**
*	La classe Controller servira de controleur général
*/
class AccueilController extends Controller{

	function index(){
		if(isset($_POST['login'])){
			$this->loadModel('User');
			$user = $this->User->find(array(
										'condition'=>'email="'.$_POST['login'].'" AND password="'.md5($_POST['password']).'"'
				));

			if(isset($user[0]->id) && isset($user[0]->name)){ 
				$_SESSION['user'] = array(
									'id'=>$user[0]->id,
									'name'=>$user[0]->name);
				$alert = array(
					'type'		=>'success',
					'title'		=>'Salut '.$user[0]->name,
					'message'	=>'Tu es bien connecté !'
					);
				$this->set(array('alert'=>$alert));
			}else{
				$alert = array(
					'type'		=>'danger',
					'title'		=>'Utilisateur inconnu',
					'message'	=>'Vous vous êtres trompé, entrez un email et un mot de passe correcte',
					'list'		=>array('votre email','Votre mot de passe')
					);
				$this->set(array('alert'=>$alert));
			}
		}
		
		$this->set(array(
			'pageAccueil'=>'active',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>''
			)
		);
		$this->render('index');
	}
	function disconnect(){

		if(isset($_SESSION['user'])){
			unset($_SESSION['user']);
		}
		$alert = array(
					'type'		=>'info',
					'title'		=>'Deconnexion',
					'message'	=>'Vous venez de vous déconnecter'
					);
				$this->set(array('alert'=>$alert));

		$this->set(array(
			'pageAccueil'=>'active',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'')
		);
		$this->render('index');
	}

}	
?>