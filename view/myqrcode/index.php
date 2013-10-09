    <div class="jumbotron">
      <div class="container">
        <h2>Mes QR Code</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
      </div>
    </div>
 <?php  if(isset($alert)){
    $alert = new Alerts($alert);
    $alert->alert();
  } 
  ?>

<div class="container">
	<h1>Mes QR-CODE enregistrés</h1>
<form role="form" action="<?=BASE_URL.DS?>myqrcode" method="POST">
<?php 
	// Génération d'ID unique et de clé pour les valeurs POST sous forme de tableau
	$i=0;
	foreach($myqrcode as $value){
		$i++;
		?>
		<div class="row">
			    <div class="col-lg-6">
					<!-- QRCode Généré -->
					<img src="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" alt="QR CODE généré" /><br />
					<!-- Liens acction sur QRCode -->
					<a class="btn btn-success btn-small" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank">Ouvrir»</a>
					<a class="btn btn-primary btn-small" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank">Imprimer»</a>
					<a class="btn btn-danger btn-small" href="<?=BASE_URL.DS?>myqrcode/supprimerqrcode/<?=$value->id?>">Supprimer [X]</a>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="updateTitle<?=$i?>">Modifications du titre</label>
		    			<input type="text" class="form-control" id="updateTitle<?=$i?>" name="updateTitle[<?=$i?>]" value="<?=$value->title?>" maxlength="50"/>
				 		<label for="updateMessage<?=$i?>">Modifications du message</label>
		    			<textarea class="form-control" id="updateMessage<?=$i?>" name="updateMessage[<?=$i?>]" rows="3" maxlength="250"><?=$value->message?></textarea>
			 		</div>
			 		<p><a class="btn btn-primary btn-small" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank">Modifier»</a></p>
		 		</div>
		</div>
		<hr/>
		<?php
	};
	/*
	<form role="form" action="<?=BASE_URL.DS.'pages'.DS?>generateqrcode/" method="GET">
	  <div class="form-group">
	    <label for="message">Email address</label>
	    <textarea class="form-control" id="msg" name="msg"rows="3"></textarea>
	  </div>
		  <div class="input-group">
	    <button type="submit" class="btn btn-success">Générer QRCode</button>
	  </div>
	</forme>
	*/
	?>
</form>
</div>
