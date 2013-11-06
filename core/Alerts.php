<?php
/**
* Classe permettant de faire apparaître les messages flash
* d'erreurs ou d'info.
* Elle contient un paramêtre > $alert qui est un tableau :
*   $alert['type']    > type de message. Ceci servira à coloré la boite de dialogue
*                       et d'afficher l'icone correspondant
*   $alert['title']   > Contient le titre de l'alert 
*   $alert['message'] > Contient le message de l'alert 
*   $alert['list']    > Contient la liste des erreurs sous forme de tableau
*
* @author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class Alerts{

  public $alert;
  /**
  * Constructeur de la classe
  * permet de donner la valeur transmise à l'objet au paramètre $alert
  */
  public function __construct($tabAlert){
    $this->alert = $tabAlert;
  }

  /**
  * Classe principale
  * permet d'afficher l'alert en fonction des paramètres dans $alert
  */
	public function alert(){
    switch ($this->alert['type']){
      case 'success':
        $icone = 'thumbs-up';
        break;
      case 'success': 
        $icone = 'info-sign';
        break;
      case 'danger': 
        $icone = 'remove-sign';
        break;
      default:
         $icone = 'info-sign';
        break;
  }
    ?>
  <hr/>  
  <div class="container">
	 <div class="bs-example row">
      <div class="panel panel-<?=$this->alert['type']?>">
          <div class="panel-heading"><h3><span class="glyphicon glyphicon-<?=$icone?>"></span> <?=$this->alert['title']?></h3></div>
          <div class="panel-body">
            <p><?=$this->alert['message']?></p>
            <?php if(isset($this->alert['list'])): ?>
              <ul>
                <?php
                foreach($this->alert['list'] as $al){
                ?>
                  <li><?=$al?></li>
                <?php
                }
                ?>
              </ul>
              <?php endif; ?>
          </div>
      </div>
    </div>
   </div>
 	<?php
 }
}
?>
