<?php
  	header('Content-Type: text/html; charset=utf-8');
	$folderName = 'viettech';
	$domain = $_SERVER['SERVER_NAME'];
	define('dbPrefix', 'vt_');
	
	//Cấu hình Host/localhost
	if($domain == 'localhost'){
		define('dbName', $folderName); 
		define('baseUrl', 'http://'.$domain.'/'.$folderName.'/');
		define('dbUser', 'root'); 
		define('dbPass', '');
	}else{
		define('dbUser', 'tuanvt_root');
		define('dbPass', 'Vertrig0');
		define('dbName', 'tuanvt_'.$folderName);
		define('baseUrl', 'http://'.$domain.'/'.$folderName.'/');
	}
	include_once ('modules/sql.php');
?>