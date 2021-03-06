 <?php
/**
*	La classe Controller servira de controleur général
*
*	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class GetMessageController extends Controller{


	function index(){
		// si une alert est envoyée en argument, on la récupère
		if(func_get_args()){
			$alertTab=func_get_args();
			$alert=$alertTab[0];	
		}else{
		// sinon ont crée une alert vide
			$alert=array();
		}


		$this->loadModel('Myqrcode');
		$myqrcode = $this->Myqrcode->find(array(
			'condition'=>'user = "'.$_SESSION['user']['id'].'"')
		);
		// Nous définissons le menu actif
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
}	
?>
