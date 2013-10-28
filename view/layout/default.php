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
          <a class="navbar-brand" href="<?=BASE_URL.DS.'accueil'.DS?>"><span class="glyphicon glyphicon-qrcode"></span> PLAN Qrcode</a>
        </div>
 
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?=$pageAccueil?>"><a href="<?=BASE_URL.DS?>accueil"><span class="glyphicon glyphicon-home btn-sm"></span>Accueil</a></li>
            <li class="<?=$pageContact?>"><a href="<?=BASE_URL.DS?>contact"><span class="glyphicon glyphicon-envelope btn-sm"></span>Contact</a></li>
            <?php if(isset($_SESSION['user']['name'])): ?>
                  
            <li class="<?=$pageGenererQRCode?>"><a href="<?=BASE_URL.DS?>generateqrcode"><span class="glyphicon glyphicon-flash btn-sm"></span>Générer son QRCode</a></li>
            <li class="<?=$pageQrcode?>"><a href="<?=BASE_URL.DS?>myqrcode"><span class="glyphicon glyphicon-list btn-sm"></span>Mes QRCode</a></li>
            
          </ul>        
                  <ul class="nav navbar-nav navbar-right">
                    <li class="<?=$pageProfil?>">
                      <a href="<?=BASE_URL.DS?>profil"><span class="glyphicon glyphicon-user btn-sm"></span>[ <b> <?=$_SESSION['user']['name']?></b> ] </a>
                    </li>
                    <li><a href="<?=BASE_URL.DS.'accueil'.DS.'disconnect'?>">Déconnexion<span class="glyphicon glyphicon-log-out btn-sm"></span></a></li>
                  </ul>
            
            <?php else: ?>
            <li class="<?=$pageInscription?>"><a href="<?=BASE_URL.DS?>signup"><span class="glyphicon glyphicon-pencil btn-sm"></span>Inscription</a></li>
            </ul>
            <form class="navbar-form navbar-right" method="POST" action='<?=BASE_URL.DS?>accueil'>
              <div class="form-group">
                <input type="text" placeholder="Email" class="form-control" value='laurent@ufr.fr' name='login'>
              </div>
              <div class="form-group">
                <input type="password" placeholder="Password" class="form-control"  value='' name='password'>
              </div>
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-out btn-lg padding-off"></span></button>
              </form>
              <?php endif;?>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

        <?php echo $content_for_layout; ?>
      </div>
      <hr>
      <footer>
        <div class="well">
            <h3 class="line"><span class="glyphicon glyphicon-qrcode btn-lg padding-off"></span> PLAN Qrcode</h3><span class="pipe"></span>
            <a href="http://www.khoudj.com" target="_blank" class="navbar-link"><span class="glyphicon glyphicon-wrench"></span> Laurent Khoudja</a><span class="pipe">|</span>
            <a href="http://stgi.univ-fcomte.fr/" target="_blank" class="navbar-link"><span class="glyphicon glyphicon-home"></span>  UFR STGI</a><span class="pipe">|</span>
            <a href="http://psm-serv.pu-pm.univ-fcomte.fr/" target="_blank" class="navbar-link"><span class="glyphicon glyphicon-link"></span> Master 2 PSM Année 2013-14 </a><span class="pipe">|</span>
            <a href="http://lifc.univ-fcomte.fr/page_personnelle/accueil/44" target="_blank" class="navbar-link"><span class="glyphicon glyphicon-pencil"></span> Unité d'enseignement A. Mostéfaoui</a> 
        </div>
      </footer>
    </div> <!-- /container -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  </body>
</html>
