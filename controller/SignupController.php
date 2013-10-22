 <?php
/**
*	La classe Controller servira de controleur général
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class SignupController extends Controller{

	function index(){
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
			$this->set(array('alert'=>$alert));
		}
		//die(print_r($_POST));

		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'active',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'',
			'pageProfil'=>'',
			'pageProfil'=>'')
		);
		$this->render('index');
	}
}
?>