 <?php
/**
*	La classe Controller servira de controleur général
*/
class GenerateqrcodeController extends Controller{

	function index(){
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
				// si le qrcode est ni généré, ni sauvegardé, on envoie un flash d'erreur
				}else{
					// création du message flash d'erreur
					$alert = array(
						'type'		=>'danger',
						'title'		=>'Quelle est votre chois d\'action ?',
						'message'	=>'<p>Cochez le choix de votre action dans les checkbox :</p>'."\n".'<ul>'."\n".'<li>Générer</li>'."\n".'<li>Sauvegarder</li>'."\n".'</ul>'."\n"
						);
					// préparation des données pour la vue
					$this->set(array('alert'=>$alert));
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
	}
}	
?>