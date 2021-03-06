
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>PLAN Qrcode - scanne et assure ...</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?=BASE_URL.DS.'css'.DS?>style.css">
</head>
 <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=BASE_URL.DS.'pages'.DS?>">PLAN Qrcode</a>
        </div>
 
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?=$pageAccueil?>"><a href="<?=BASE_URL.DS.'pages'.DS?>">Accueil</a></li>
            <li class="<?=$pageContact?>"><a href="<?=BASE_URL.DS.'pages'.DS?>contact/">Contact</a></li>
            <?php 
                if(isset($_SESSION['user']['name'])){
                  ?>
                  
            <li class="<?=$pageGenererQRCode?>"><a href="<?=BASE_URL.DS.'pages'.DS?>generateqrcode/">Générer son QRCode</a></li>
            <li class="<?=$pageQrcode?>"><a href="<?=BASE_URL.DS.'pages'.DS?>myqrcode/">Mes QRCode</a></li>
            
          </ul>        
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Salut <b><?=$_SESSION['user']['name']?></b></a></li>
                    <li><a href="<?=BASE_URL.DS.'pages'.DS.'disconnect'?>">&raquo;  Déconnexion</a></li>
                  </ul>
            
            <?php

                }else{ ?>
            <li class="<?=$pageInscription?>"><a href="<?=BASE_URL.DS.'pages'.DS?>signup">Inscription</a></li>
            </ul>
            <form class="navbar-form navbar-right" method="POST" action='<?=BASE_URL.DS.'pages'.DS?>'>
              <div class="form-group">
                <input type="text" placeholder="Email" class="form-control" value='laurent@ufr.fr' name='login'>
              </div>
              <div class="form-group">
                <input type="password" placeholder="Password" class="form-control"  value='' name='password'>
              </div>
              <button type="submit" class="btn btn-success">go</button>
              </form>
              <?php
              }
              ?>
        
          
          

        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>PLAN.Qrcode</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
        <p><a class="btn btn-primary btn-small">Comment ça marche &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <?php echo $content_for_layout; ?>
      </div>
      <hr>
      <footer>
        <p>&copy; Khoudj - 2013</p>
      </footer>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
