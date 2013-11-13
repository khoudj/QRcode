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
	<h1 class="margin-off">Mes QR-CODE enregistrés</h1>
	<p class="text-right">
		<a href="<?=BASE_URL.DS?>myqrcode/?titleASC" title="Titre ordre alphabétique v"><span class="glyphicon glyphicon-sort-by-alphabet btn-lg margin-off padding-off"></span></a><span class="pipeOrder"></span>
		<a href="<?=BASE_URL.DS?>myqrcode/?titleDESC" title="Titre ordre alphabétique ^"><span class="glyphicon glyphicon-sort-by-alphabet-alt btn-lg margin-off padding-off"></span></a><span class="pipeOrder"></span>
		<a href="<?=BASE_URL.DS?>myqrcode/?createdASC" title="Date ordre V"><span class="glyphicon glyphicon-sort-by-attributes btn-lg margin-off padding-off"></span></a><span class="pipeOrder"></span>
		<a href="<?=BASE_URL.DS?>myqrcode/?createdDESC" title="Date ordre ^"><span class="glyphicon glyphicon-sort-by-attributes-alt btn-lg margin-off padding-off"></span></a>

	</p>
<form role="form" action="<?=BASE_URL.DS?>myqrcode" method="POST">
<?php 
	// Génération d'ID unique et de clé pour les valeurs POST sous forme de tableau
	$i=0;
	foreach($myqrcode as $value){
		$i++;
		?>
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h2 class="panel-title text-left col-md-6 blue"><?=$value->title?></h2>
			<h3 class="panel-title text-right grey"><?='Crée le '.DateFormat::format($value->created)?><? if($value->modified) echo '<span class="pipeDate">|</span>Modifié le '.DateFormat::format($value->modified); ?></h3>
		  </div>
		  <div class="panel-body">
		  	<div class="col-lg-6">
					<!-- QRCode Généré -->
					<img src="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" alt="QR CODE généré" /><br />
					<!-- Liens acction sur QRCode -->
				</div>
				<div class="col-lg-6">
					<div class="container">
						<h4>Message :</h4>
						<p class="blue"><?=nl2br($value->message)?></p>
						<hr />
					</div>
		 		</div>
		  </div>
		  <div class="panel-footer">
		  	<a class="btn btn-primary btn-small maringLeft1em" href="<?php echo BASE_URL.DS.'img'.DS.'qrcode.php?msg='.base64_encode($value->message); ?>" target="_blank" title="imprimer"><span class="glyphicon glyphicon-print btn-lg margin-off padding-off"></span> </a>
			<a class="btn btn-danger btn-small maringLeft1em" href="<?=BASE_URL.DS?>myqrcode/supprimerqrcode/<?=$value->id?>" title="Supprimer"><span class="glyphicon glyphicon-trash btn-lg margin-off padding-off"></span> </a>

		  </div>
		</div>
		<?php
	};
	?>
</form>
</div>
