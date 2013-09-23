<?php
//SESSION
session_start();

//	Nous définnissons le dossier racine
//  /Users/khoudj/Documents/workspace/tutoPHP/CMS_MVC/webroot
define('WEBROOT', dirname(__FILE__));
//  /Users/khoudj/Documents/workspace/tutoPHP/CMS_MVC/webroot
define('WEBROOTT', dirname(dirname(__FILE__)));
//	Nous définissons du dossier contenant l'application
//	/Users/khoudj/Documents/workspace/tutoPHP/CMS_MVC
define('ROOT',dirname(WEBROOT));
//	Nous définisson le séparateur pour les répertoires : windows "\" et mac & linux "/" 
//	/	
define('DS',DIRECTORY_SEPARATOR);
//	Nous définissons le chemin du core
//	/Users/khoudj/Documents/workspace/tutoPHP/CMS_MVC/CORE
define('CORE',ROOT.DS.'CORE');
//	Nous définissons l'URL de la racine
//	/tutoPHP/CMS_MVC
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME']))); 
	
//	Nous incluons le fixhier core/includes.php qui contient tous les includes nécessaires en nous servant des constantes définies
require CORE.DS.'includes.php';
//	Nous créons un instance de Dispatcher
new Dispatcher();
?>