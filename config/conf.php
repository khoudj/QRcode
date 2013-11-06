<?php
/**
*	Classe de configuration, définissant :
*	- Le mode débug > voir model.php > function __construct()
*	- La connexion à la base de donnée
*
* 	@author : Laurent Khoudja - laurentkh@gmail.com - M2 PSM - UFR STGI
*/
class Conf{
	// Débug > pour avoir certaines infos
	// affichage des erreurs de connexion
	static $debug = true;
	// Paramètre de connexion à la base
	static $databases = array(
			'default' => array(
				'host'		=> 'localhost',
				'database'	=> 'qrcode',
				'login'		=> 'khoudj',
				'password'	=> 'khoudj',
				)
		);
};
?>