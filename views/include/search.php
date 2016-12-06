<?php
include('modules/search.php');
if(count($listData)){
	foreach($listData as $key=>$data){
		$menuParent = $db->menuParent($data->menu);
		if($menuParent && strlen($menuParent->name)){
			include('views/include/contentList.php');
		}
	} 
	include('modules/template/pagination.php'); 
} 
?>