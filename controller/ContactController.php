 <?php
/**
*	La classe ContactController servira de controleur pour le contact du site
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class ContactController extends Controller{
	/**
	*	Fonction qui définit les variables de la page 
	*	et rend la vue
	*/
	function index(){

		// Nous définissons le menu actif
		$this->set(array(
			'pageAccueil'=>'',
			'pageInscription'=>'',
			'pageGenererQRCode'=>'',
			'pageContact'=>'active',
			'pageQrcode'=>'',
			'pageProfil'=>'')
		);
		// redu de la vue
		$this->render('index');
	}
}	
?>