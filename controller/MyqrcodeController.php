 <?php
/**
*	La classe Controller servira de controleur général
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class MyqrcodeController extends Controller{
	function index(){

		// Création de l'ordre de classement par defaut
		$order = ' ORDER BY created DESC';
		// si une alert est envoyée en argument, on la récupère
		if(func_get_args()){
			$alertTab=func_get_args();
			$alert=$alertTab[0];	
		}else{
		// sinon ont crée une alert vide
			$alert=array();
		}
		// Si le classement est envoyé en GET :
		if(isset($_GET['titleASC'])) $order = ' ORDER BY title ASC';
		else if(isset($_GET['titleDESC'])) $order = ' ORDER BY title DESC';
		else if(isset($_GET['createdASC'])) $order = ' ORDER BY created ASC';
		else if(isset($_GET['createdDESC'])) $order = ' ORDER BY created DESC';
			//die("<h1><p><p><p>".$order."</p></p></p></h1>");
 		

		// chargement du medèle Myqrcode
		$this->loadModel('Myqrcode');
		$myqrcode = $this->Myqrcode->find(array(
			'condition'=>'user = "'.$_SESSION['user']['id'].'"',
			'order'=>$order)
		);
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'',
			'pageQrcode'=>'active',
			'pageProfil'=>'')
		);
		$this->set('myqrcode',$myqrcode);

		if(count($alert)!=0){
			$this->set(array('alert'=>$alert));
		}
		$this->render('index');
		
	}

	function supprimerqrcode($id){
		
		$this->loadModel('Myqrcode');
		$this->Myqrcode->del($id);

		$alert= array(
					'type'		=>'info',
					'title'		=>'QR Code supprimé',
					'message'	=>'Votre QR Code a bien été supprimé'
					);
		$this->index($alert);
		
	}
	/**
	* Modification d'un titre/message de QRCode
	* vérifier que la personne est bien connectée en session
	*	 		si non > alert > connectez vous > fin
	*	 si personne connectée
	*	 vérifier que le message corresponndant à l'id lui appartient
	*			si non > alert > le message ne vous appatient pas > fin
	*		si oui 
	*				Vérifier les infos en Post
	*	 				si info pas bonne > alert > info pas bonne > fin
	*				si info ok > mise à jour > Alert > MAJ ok
	*	 	Affichage liste QRCode
	*/
	function modifierqrcode($id){

		// vérifier que la personne est bien connectée en session
		// 		si non > alert > connectez vous > fin
		// si personne connectée
		// vérifier que le message corresponndant à l'id lui appartient
		// 		si non > alert > le message ne vous appatient pas > fin
		//	si oui 
		//			Vérifier les infos en Post
		// 				si info pas bonne > alert > info pas bonne > fin
		//			si info ok > mise à jour > Alert > MAJ ok
		// 	Affichage liste QRCode
		//
		die('modifier'.$id);

					// si le formulaire est envoyé :
			if(isset($_POST['msg'])){
				// nous testons si le qrcode est seulement à générer
				if($_POST['qrtype'] == 'generate'){
					// création du message flash de récap
					$alert = array(
						'type'		=>'info',
						'title'		=>'Génération de votre QR-Code :',
						'message'	=>'<h5>'.$_POST['titre'].' : </h5>'."\n".'<p>'.$_POST['msg'].'</p>'."\n".'<p>Si le message te convient, enregistre le ;)</p>'
						);
					// préparation des données pour la vue
					$this->set(array('alert'=>$alert));
				// ou le qr code est à sauvegarder
				}elseif($_POST['qrtype'] == 'save'){
					// appelle du model Myqrcode
					$this->loadModel('Myqrcode');
					// enregistrement du qrcode
					$myqrcode = $this->Myqrcode->save(array('title'		=>$_POST['titre'],
															'message'	=>$_POST['msg'],
															'user'		=>$_SESSION['user']['id'],
															'created'	=>date("Y-m-j H:i:s"),
															'nbview'	=>0
															));
					// création du message flash de récap
					$alert = array(
						'type'		=>'success',
						'title'		=>'Enregistrement de votre QR-Code :',
						'message'	=>'<h5>'.$_POST['titre'].'</h5>'."\n".'<p>'.$_POST['msg'].'</p>'
						);
					// préparation des données pour la vue
					$this->set(array('alert'=>$alert));
					// ID du QRCode  : $this->Myqrcode->id;
				// si le qrcode est ni généré, ni sauvegardé, on envoie un flash d'erreur
				}else{
					// création du message flash d'erreur
					$alert = array(
						'type'		=>'danger',
						'title'		=>'Quelle est votre chois d\'action ?',
						'message'	=>'<p>Cochez le choix de votre action dans les checkbox :</p>'."\n".'<ul>'."\n".'<li>Générer</li>'."\n".'<li>Sauvegarder</li>'."\n".'</ul>'."\n"
						);
					// préparation des données pour la vue
					$this->Myqset(array('alert'=>$alert));
				}
			}
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		// envoi des variables pour la gestions des menus actifs
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'active',
			'pageContact'=>'',
			'pageQrcode'=>'',
			'pageProfil'=>'')
		);
		// Nous faisons un rendu de la vue index
		$this->render('index');



		/////////////////////////
		
		$this->loadModel('Myqrcode');
		$this->Myqrcode->save($id);

		$alert= array(
					'type'		=>'info',
					'title'		=>'QR Code supprimé',
					'message'	=>'Votre QR Code a bien été supprimé'
					);
		$this->index($alert);
		
	}
}	
?>
