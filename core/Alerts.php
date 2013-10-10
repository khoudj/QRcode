<?php
class Alerts{

  public $alert;

  public function __construct($tabAlert){
    $this->alert = $tabAlert;
  }

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
 	<?php
 }
}
?>
