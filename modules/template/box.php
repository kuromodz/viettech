<?php
	$listHtml = "?> ".html_entity_decode($configMenu->listHtml)." <?php ";
	$boxHtml = "?> ".html_entity_decode($configMenu->boxHtml)." <?php ";

if($thisIsProducts){
	$thisIsProducts = false;
	eval($boxHtml);
}else{ 
	if(count($listData)){
		foreach($listData as $key=>$data){  
    		if( (isset($id) && $id !== $data->id) || (!isset($id)) ){
				$menuParent = $db->menuParent($data->menu);
				eval($listHtml);
			}
		}
	}else{ ?>
	    <center class="wow zoomIn">
	        <p class="text-white"><b><i class="fa fa-spin fa-spinner"></i> Đang cập nhật</b></p>
	    </center>
<?php 
	} 
} 
if(isset($allListData) && (count($allListData) > $config->limit)){ include('modules/template/pagination.php');} 
?>