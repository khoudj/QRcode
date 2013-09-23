   <div class="jumbotron">
      <div class="container">
        <h2>Inscris-toi !</h2>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
      </div>
    </div>

<div class="row">
	<div class="col-md-6">
		<h2>Tenté ? alors inscris-toi !</h2>
    <?php
  if(isset($alert)){
    $alert = new Alerts($alert);
    $alert->alert();
  } 
?>
      	<form action="<?=BASE_URL.DS.'pages'.DS?>signup" method="POST" id="formSignup">
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" placeholder="Ton prénom" name="name"  pattern="{50}" required />
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            <input type="email" class="form-control" placeholder="email@fai.com" name="email" required />
          </div>
          <br />
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
            <input type="password" class="form-control" placeholder="Pass" name="password" pattern="[a-zA-Z0-9\-\_]{8,15}" required />
          </div>
           <br />
          <div class="input-group">
            <span class="input-group-addon"><span class="glyphicon glyphicon-circle-arrow-right"></span></span>
            <input type="password" class="form-control" placeholder="Pass" name="password2" required />
          </div>
           <br />
          <div class="input-group">
            <button type="submit" class="btn btn-success">go</button>
          </div>
        </form>
	</div>
	<div class="col-md-6">
	    <h2>N'oublie rien ;)</h2>
          <p>Afin de profiter plainement du service, vous pouvez vous inscrire en notant : </p>
            <ul>
              <li>Ton prénom</li>
              <li>Ton email</li>
              <li>Pass : 8 caracères mini, 15 maxi, non accentués, des chiffres ainsi que  - et _</li>
            </ul>
    </div>
</div>
