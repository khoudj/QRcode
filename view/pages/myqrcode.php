    <div class="jumbotron">
      <div class="container">
        <h2>Mes QR Code</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
        <form role="form" action="<?=BASE_URL.DS.'pages'.DS?>generateqrcode/" method="GET">
		  <div class="form-group">
		    <label for="msg">Génère ton propre QRCode</label>
		    <textarea class="form-control" id="msg" name="msg" rows="3" maxlength="250"></textarea>
		  </div>
		  <div class="input-group">
		    <button type="submit" class="btn btn-success">Générer QRCode</button>
		  </div>
		 </form>
      </div>
    </div>
<div class="container">
	<h1>Mes QR-CODE enregistrés</h1>
<form role="form" action="<?=BASE_URL.DS.'pages'.DS?>myqrcode/" method="POST">
<?php 
	foreach($myqrcode as $value){
		?>
		<div class="row">
			    <div class="col-lg-6">
					<img src="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" alt="1" />
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<label for="updateTitle">Modifications du titre</label>
		    			<input type="text" class="form-control" id="updateTitle" name="updateTitle" value="<?=$value->title?>" maxlength="50"/>
				 		<label for="updateMessage">Modifications du message</label>
		    			<textarea class="form-control" id="updateMessage" name="updateMessage" rows="3" maxlength="250"><?=$value->message?></textarea>
			 		</div>
			 		<p><a class="btn btn-primary btn-small" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank">Ouvrir dans une page navigateur»</a></p>
			 		<p><a class="btn btn-danger btn-small" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank">Supprimer [X]</a></p>
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
