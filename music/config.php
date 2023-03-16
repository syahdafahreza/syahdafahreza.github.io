<?php
@ob_start();
session_start();
error_reporting(E_ALL);
	
	define('HOST', 'offline');
	
	#echo "--------".dirname(__FILE__);
	
	if(HOST == 'online')
	{
		define('DB_NAME', '');
		define('DB_USER', '');
		define('DB_PASSWORD', '');
		define('DB_HOST', 'localhost');
		define('HOME_URL',"");
		$temp	=	explode("admin",dirname(__FILE__));
		define("HOME_PATH",$temp[0]);
		define('DIR_PATH',HOME_PATH."/");
	}else{
		define('DB_NAME', 'audiotracker');
		define('DB_USER', 'root');
		define('DB_PASSWORD', '');
		define('DB_HOST', 'localhost');
		define('HOME_URL',"/music/");
		$temp	=	explode("admin",dirname(__FILE__));
		define("HOME_PATH",$temp[0]);
		define('DIR_PATH',HOME_PATH."/");
	}
	
	define("NO_REPLY_EMAIL","contact@learncodeweb.com");
	define("NO_REPLY_NAME","LearnCodeWeb");
	define("ADMIN_NAME","Zaid");
	define('AJAX_URL',HOME_URL."ajax/");
	
	include_once(DIR_PATH."includes/class.phpmailer.php");
	include_once(DIR_PATH."includes/Zebra_Pagination.php");
	include_once(DIR_PATH."includes/Database.php");
	
	$mail		= 	new	PHPMailer();
	$pagination = 	new Zebra_Pagination();	
	
	$dsn	= 	"mysql:dbname=".DB_NAME.";host=".DB_HOST."";
	$pdo	=	"";
	
	try {$pdo = new PDO($dsn, DB_USER, DB_PASSWORD);} catch (PDOException $e) {echo "Connection failed: " . $e->getMessage();}
	$db		=	new Database($pdo);
	
	//--------------------- Site constant -------------------//
	
	define('SITE_NAME','Web Portal');
	
	define("FILE_PATH",HOME_PATH.trim("uploads/ "," "));
	
	define("FILE_URL",HOME_URL."uploads/");	
		
	//--------------------- Table constant -------------------//
	
	define('TB_ADMIN','admins');
	define('TB_USER','userdata');