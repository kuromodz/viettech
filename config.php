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

	$listSl = (object) array(
	    (object) array('title'=>'Tỉnh thành','name'=>'province'),
	    (object) array('title'=>'Quận huyện','name'=>'district'),
	);
	$listFp = (object) array(
	    (object) array('title'=>'Họ tên','name'=>'titlePost','icon'=>'user'),
	    (object) array('title'=>'Số điện thoại','name'=>'phone','icon'=>'phone'),
	    (object) array('title'=>'Tên sản phẩm','name'=>'title','icon'=>'tag'),
	    (object) array('title'=>'Mô tả sản phẩm','name'=>'des','icon'=>'info'),
	    (object) array('title'=>'Giá','name'=>'price','icon'=>'money'),
	    (object) array('title'=>'Địa chỉ','name'=>'address','icon'=>'map-marker'),
	);
?>