<?php
	//header('Content-type: image/png');
	require "../vendor/phpqrcode/phpqrcode.php";
	$content = isset($_GET['msg']) ? base64_decode($_GET['msg']) : 'Entre ton message';
	$errorCorrectionLevel = 'H';
	$matrixPointSize = 7;
	QRcode::png($content."\n".'www.planqrcode.com' , false ,$errorCorrectionLevel, $matrixPointSize, 2);
?>	 