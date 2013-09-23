<?php
	
	/**
	*	$content             : le contenu une fois le QR Code décodé
	*	filename             : le nom de l’image générée
	*	errorCorrectionLevel : le taux de correction du QR Code. Plus il est haut, plus le QR Code pourra être détérioré (L – M – Q – H)
	*	matrixPointSize      : il s’agit de la taille de votre QR Code
	*/

	$content= '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css';
	$filename = 'qrcode.png';
	$errorCorrectionLevel = 'H';
	$matrixPointSize = 7;
	 
	QRcode::png($content, $filename,
	            $errorCorrectionLevel, $matrixPointSize, 2);
	 


?>
