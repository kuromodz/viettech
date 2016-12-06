
<?php 
	$listData = $db->listData($menuPage->id);
	if(count($listData)){
	if(!isset($id)){ 
		$page = $listData[0];
	} 
?>
<div id="content_wrapper" class="product_layout product_detail_layout main clearfix">
    <div class="main">
        <div class="agency_result clearfix">
            <?php foreach($listData as $data){ ?>
                <div class="agency_item">
                    <h2><?=$data->title?></h2>
                    <p><span><i class="fa fa-map-marker"></i> Địa chỉ:</span> <?=$data->address?></p>

                    <p><span><i class="fa fa-phone"></i> Hotline:</span> <?=$data->phone?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>