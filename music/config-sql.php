<?php
@ob_start();
session_start();
error_reporting(E_ALL);
	
	define('HOST', 'offline');
	
	#echo "--------".dirname(__FILE__);
	
	if(HOST == 'online')
	{
		$serverName	=	'';
		
		$connectionInfo = array( "Database"=>"");
		$connSQL = sqlsrv_connect( $serverName, $connectionInfo);
		
		if(!$connSQL){
			echo "Connection could not be established.\n";
		    die( print_r( sqlsrv_errors(), true));
		}
		
		define('HOME_URL',"");
		$temp	=	explode("admin",dirname(__FILE__));
		define("HOME_PATH",$temp[0]);
		define('DIR_PATH',HOME_PATH."/");
	}else{
		$serverName	=	'';
		
		$connectionInfo = array( "Database"=>"", "UID"=>"", "PWD"=>"");
		$connSQL = sqlsrv_connect( $serverName, $connectionInfo);
		
		if(!$connSQL){
			echo "Connection could not be established.\n";
		    die( print_r( sqlsrv_errors(), true));
		}
		
		define('HOME_URL',"http://localhost/audio-player/");
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
	
	$mail		= 	new	PHPMailer();
	$pagination = 	new Zebra_Pagination();
	
			
	//--------------------- Site constant -------------------//
	
	define('SITE_NAME','Web Portal');
	
	define("FILE_PATH",HOME_PATH.trim("uploads/ "," "));
	
	define("FILE_URL",HOME_URL."uploads/");	
		
	//--------------------- Table constant -------------------//
	
	define('TB_ADMIN','admins');
	define('TB_USER','userdata');