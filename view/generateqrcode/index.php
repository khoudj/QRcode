    <div class="jumbotron">
      <div class="container">
        <h2>Génère ton propore QR CODE</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
      </div>
    </div>
<?php 
	if(isset($_POST['msg'])) {
			$titre=$_POST['titre'];
			$msg=$_POST['msg'];
		}else{
			$titre='';
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
		<h2>QR-CODE généré</h2>
		<p><img src="<?=BASE_URL.DS.'img'.DS?>qrcode.php?msg=<?=$msg?>" class="img-rounded" alt="Exemple de QR Code"/></p>
		</div>
	<div class="col-md-6">	
		<h2>Génère ton QRCode</h2>
		<p>Génère ton QRCode, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, ullam, harum ratione suscipit nostrum blanditiis impedit modi eaque ad consequuntur at in temporibus error! Placeat doloremque ex ullam exercitationem mollitia.</p>	
		<form role="form" action="<?=BASE_URL.DS?>generateqrcode/" method="POST">
		  <div class="form-group">
			<label for="titre">Ton titre</label>
		  	<input type="text" class="form-control" placeholder="ton titre" name="titre" id="titre" required value='<?=$titre?>'/>
		    <label for="msg">Ton message</label>
		    <textarea class="form-control" id="msg" name="msg" rows="3" maxlength="250" required><?php echo base64_decode($msg); ?></textarea>
		  </div>
		  <p>Génère ou enregistre ton QR CODE</p>
	  	  <div class="input-group">
			      <label for="qrtypeGen">Générer </label> <input type="radio" name="qrtype" id="qrtypeGen" value="generate" checked="checked" />
			      <label for="qrtypeSauv">Sauvegarder </label> <input type="radio" name="qrtype" id="qrtypeSauv" value="save" /> >>
            <button type="submit" class="btn btn-success">un QRCode</button>
          </div>
		</form>
	</div>
</div>


