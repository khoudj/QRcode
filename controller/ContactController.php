 <?php
/**
*	La classe Controller servira de controleur général
*/
class ContactController extends Controller{

	function index(){

		// Nous ajoutons à $this->vars les variables à envoyer à la vue
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'active',
			'pageQrcode'=>'',
			'pageProfil'=>'')
		);
		$this->render('index');
	}
}	
?>