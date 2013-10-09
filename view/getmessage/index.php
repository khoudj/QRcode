    <div class="jumbotron">
      <div class="container">
        <h2>Message enregistré par</h2>
        <p class="text-muted">
        	<ul>
        		<li>Nom : </li>
        		<li>Email : </li>
        		<li>Télephone : </li>
        	</ul>
        </p>
      </div>
    </div>
<?php 
	if(isset($_GET['msg'])) {
			$msg=$_GET['msg'];
		}else{
			$msg='Entre ton message';
		} 
	$msg=base64_encode($msg);

  if(isset($alert)){
    $alert = new Alerts($alert);
    $alert->alert();
  } 
?>
<div class="row">
	<div class="col-md-6">
		<h2>Message QR Code</h2>
		<p><img src="<?=BASE_URL.DS.'img'.DS?>qrcode.php?msg=<?=$msg?>" class="img-rounded" alt="Exemple de QR Code"/></p>
		</div>
	<div class="col-md-6">	
		<h2>Message texte</h2>
		<p><?=base64_decode($msg)?></p>	
	</div>
</div>


