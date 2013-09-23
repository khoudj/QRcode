 <?php
/**
*	La classe Controller servira de controleur général
*/
class PagesController extends Controller{

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


	function generateqrcode(){
			if(isset($_GET['msg'])){
			$alert = array(
					'type'		=>'info',
					'title'		=>'Votre message :',
					'message'	=>'<h5>'.$_GET['titre'].' : </h5><p>'.$_GET['msg'].'</p>'
					);
				$this->set(array('alert'=>$alert));
			}
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'active',
			'pageContact'=>'',
			'pageQrcode'=>'')
		);
		// Nous faisons un rendu de la vue index
		$this->render('generateqrcode');
	}

	function contact(){

		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'active',
			'pageQrcode'=>'')
		);
		$this->render('contact');
	}

	function signup(){
		$this->loadModel('User');
		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2']) ){
			if($_POST['password'] != $_POST['password2']){
				$alert = array(
					'type'		=>'danger',
					'title'		=>'Erreurs dans vos données',
					'message'	=>'Vous avez fait des erreurs dans les données que vous avez renseignées :',
					'list'		=> array('Vous avez mal recopié votre mot de passe.')
					);
			}else{
				$alert = array(
					'type'		=>'success',
					'title'		=>'Bienvenu parmis nous '.$_POST['name'],
					'message'	=>'Vous êtes maintenant inscrit, vous pouvez vous connecter avec vos identifiant et profiter de notre service',
					);
				$user = $this->User->add($_POST);
			}
		}
		//die(print_r($_POST));
		$this->set(array('alert'=>$alert));
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'active',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'')
		);
		$this->render('signup');
	}

	function myqrcode(){

		$this->loadModel('Myqrcode');
		$myqrcode = $this->Myqrcode->find(array(
			'condition'=>'user = "'.$_SESSION['user']['id'].'"')
		);
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'active')
		);
		$this->set('myqrcode',$myqrcode);
		$this->render('myqrcode');
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


	function exemple(){

		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'active')
		);
		$this->set('myqrcode',$myqrcode);
		$this->render('exemple');
	}
}	
?>