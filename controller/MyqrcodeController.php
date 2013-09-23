 <?php
/**
*	La classe Controller servira de controleur général
*/
class MyqrcodeController extends Controller{


	function index(){
		$alertTab=func_get_args();
		$alert=$alertTab[0];

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
}	
?>
