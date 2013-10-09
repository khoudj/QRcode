 <?php
/**
*	La classe Controller servira de controleur général
*/
class GenerateqrcodeController extends Controller{

	function index(){
			if(isset($_POST['msg'])){
				if($_POST['qrtype'] == 'qrtypeGen'){
					$alert = array(
							'type'		=>'info',
							'title'		=>'Votre message :',
							'message'	=>'<h5>'.$_POST['titre'].' : </h5>'."\n".'<p>'.$_POST['msg'].'</p>'
							);
						$this->set(array('alert'=>$alert));
				}elseif($_POST['qrtype'] == 'generate'){
					$alert = array(
						'type'		=>'info',
						'title'		=>'Génération de votre QR-Code :',
						'message'	=>'<h5>'.$_POST['titre'].' : </h5>'."\n".'<p>'.$_POST['msg'].'</p>'
						);
					$this->set(array('alert'=>$alert));
				}elseif($_POST['qrtype'] == 'save'){
					$alert = array(
						'type'		=>'success',
						'title'		=>'Enregistrement de votre QR-Code :',
						'message'	=>'<h5>'.$_POST['titre'].'</h5>'."\n".'<p>'.$_POST['msg'].'</p>'
						);
					$this->set(array('alert'=>$alert));
				}else{
					$alert = array(
						'type'		=>'danger',
						'title'		=>'Quelle est votre chois d\'action ?',
						'message'	=>'<p>Cochez le choix de votre action dans les checkbox :</p>'."\n".'<ul>'."\n".'<li>Générer</li>'."\n".'<li>Sauvegarder</li>'."\n".'</ul>'."\n"
						);
					$this->set(array('alert'=>$alert));
				}
			}
		// Nous ajoutons à $this->vars les variables à envoyer à la vue
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