
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PLAN Qrcode - scanne et assure ...</title>
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png"> -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png"> -->
    <!--   <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png"> -->
    <!--                 <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png"> -->
    <!--                                <link rel="shortcut icon" href="../assets/ico/favicon.png"> -->
</head>
 <body>
<?php
  /**
  * $content             : le contenu une fois le QR Code décodé
  * filename             : le nom de l’image générée
  * errorCorrectionLevel : le taux de correction du QR Code. Plus il est haut, plus le QR Code pourra être détérioré (L – M – Q – H)
  * matrixPointSize      : il s’agit de la taille de votre QR Code
  */
  require "../core/phpqrcode/qrlib.php";
  $content= '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css';
  $filename = 'qrcode.png';
  $errorCorrectionLevel = 'H';
  $matrixPointSize = 7;
   
  QRcode::png($content, $filename,
              $errorCorrectionLevel, $matrixPointSize, 2);
              ?>
  </body>
</html>
