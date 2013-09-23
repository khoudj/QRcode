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
      <div class="alert alert-block alert-<?=$this->alert['type']?>">
        <h4><?=$this->alert['title']?></h4>
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
 	<?php
 }
}
?>