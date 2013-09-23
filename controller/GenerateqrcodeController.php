 <?php
/**
*	La classe Controller servira de controleur général
*/
class GenerateqrcodeController extends Controller{

	function index(){
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
		$this->render('index');
	}
}	
?>