<?php
class Alerts{

  public $alert;

  public function __construct($tabAlert){
    $this->alert = $tabAlert;
  }

	public function alert(){
    ?>
  <hr/>  
  <div class="container">
	 <div class="bs-example row">
      <div class="panel panel-<?=$this->alert['type']?>">
          <div class="panel-heading"><h3><span class="glyphicon glyphicon-info-sign"></span> <?=$this->alert['title']?></h3></div>
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