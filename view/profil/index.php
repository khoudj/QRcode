<?php
//die(print_r(get_defined_vars()));
?>

   <div class="jumbotron">
      <div class="container">
        <h2>Mon profil</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
      </div>
    </div>
        <?php
  if(isset($alert)){
    $alert = new Alerts($alert);
    $alert->alert();
    } 
  ?>

<div class="row">
	<div class="col-md-6">
		<h2>Manage ton profil</h2>

      	<form action="<?=BASE_URL.DS?>profil" method="POST" id="formProfil">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" placeholder="Ton prénom" name="name"  value="<?=$user['name']?>" pattern="{50}" required />
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="email" class="form-control" placeholder="email@fai.com" name="email" value="<?=$user['email']?>" required />
          </div>
          <br />
           <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            <input type="tel" class="form-control" placeholder="06..." name="phone"  value="<?=$user['phone']?>" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" required/>
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-list-alt"></span></span>
            <textarea class="form-control profil" placeholder="Ton profil ..." name="profil" required><?=$user['profil']?></textarea>
          </div>
           <br />
        <div class="input-group">
            <label for="modifCompte">MODIFIER </label> <input type="radio" name="action" id="modifCompte" value="modif" checked="checked" />
            <label for="supprimerCompte">SUPPRIMER </label> <input type="radio" name="action" id="supprimerCompte" value="del" /> >>
            <button type="submit" class="btn btn-danger">votre compte</button>
        </div>
        </form>
	</div>
	<div class="col-md-6">
	    <h2>Tu peux modifier ou supprimer ton compte</h2>
          <p>Informations obligatoires</p>
            <ul>
              <li>Ton prénom</li>
              <li>Ton email</li>
              <li>Ton numéro de téléphone</li>
              <li>Ton profil</li>
            </ul>
    </div>
</div>
