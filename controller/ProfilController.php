 <?php
/**
*	La classe Controller servira de controleur général
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class ProfilController extends Controller{

	function index(){
		$this->loadModel('User');
		$this->loadModel('Myqrcode');
		// Si le user n'est pas connecté
		if(!isset($_SESSION['user']['id'])){
				// création de l'alert
				$alert = array(
					'type'		=>'danger',
					'title'		=>'Vous devez être logué',
					'message'	=>'Créez votre compte'
					);
				// envoie de l'alert à la vue
 				$this->set(array('alert'=>$alert));
 				// renvoir la la vue spécial pour s'inscrire
 				$this->renderSignup();
		}else if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['profil'])){
			// si modification
			if(isset($_POST['action']) && $_POST['action']=='modif'){
				// Flash Alert modif
				$alert = array(
					'type'		=>'success',
					'title'		=>'Profil modifié',
					'message'	=>'Votre profil a été modifié',
					'list'		=>array('Prénom : '.$_POST['name'],
										'email : '.$_POST['email'],
										'Téléphone : '.$_POST['phone'],
										'Profil : '.$_POST['profil'])
					);
				// ajout de l'id pour update
				$_POST['id']=$_SESSION['user']['id'];
				// Débug
				//die(print_r($_POST));

				// Mise à jour
				$this->User->save($_POST);

				// Affchage du profil
								// un id est en session, nous récupérons sont user
				$user = $this->User->find(array('condition'=>'id = "'.$_SESSION['user']['id'].'"'));
				// cast et Simplification du tableau $user
				$user=(array)$user[0];
				// Suppression du password pour plus de sécurité
				unset($user['password']);
				// Modification du prénom en session
				$_SESSION['user']['name']=$user['name'];
				// envoi des variables à la vue
				$this->set(array('alert'=>$alert));
				$this->set(array('user'=>$user));
				// Nous ajoutons à $this->vars les variables à envoyer à la vue
				$this->set(array(
					'pageAccueil'=>'',
					'pageInscription'=>'',
					'pageGenererQRCode'=>'',
					'pageContact'=>'',
					'pageQrcode'=>'',
					'pageProfil'=>'active')
				);
				$this->render('index');

			}
			// si suppression
			else if(isset($_POST['action']) && $_POST['action']=='del'){
				
				// Flash Alert suppression
				$alert = array(
					'type'		=>'success',
					'title'		=>'Profil modifié',
					'message'	=>'Votre profil a été supprimé',
					);

				// Suppression du user
				$this->User->delUser($_SESSION['user']['id']);
				
				// Suppression des QRCODE du user
				// load du model Myqrcode
				$this->loadModel('Myqrcode');
				// définition de la table
				$this->Myqrcode->table='myqrcodes';
				// suppression des qrcodes du user
				$this->Myqrcode->delUserQRcodes($_SESSION['user']['id']);

				// Suppression de la session
				unset($_SESSION['user']);
				// envoie de l'alert à la vue
 				$this->set(array('alert'=>$alert));
 				// renvoir la la vue spécial pour s'inscrire
 				$this->renderSignup();
			}
			// si affichage
		}
		else{
				// un id est en session, nous récupérons sont user
				$user = $this->User->find(array('condition'=>'id = "'.$_SESSION['user']['id'].'"'));
				// cast et Simplification du tableau $user
				$user=(array)$user[0];
				// Suppression du password pour plus de sécurité
				unset($user['password']);
				// débug
				//die(print_r($user));

				$this->set(array('user'=>$user));
				// Nous ajoutons à $this->vars les variables à envoyer à la vue
				$this->set(array(
					'pageAccueil'=>'',
					'pageInscription'=>'',
					'pageGenererQRCode'=>'',
					'pageContact'=>'',
					'pageQrcode'=>'',
					'pageProfil'=>'active')
				);
				$this->render('index');
		}
	}
}
?>