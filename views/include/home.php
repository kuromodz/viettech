<?php $listMenuChild = $db->listMenuChild($menuProduct->id);
	foreach($listMenuChild as $key=>$menuChild){
?>
<div class="col-md-<?=($key==0)?9:3?>">
	<div class="item">
		<a <?=linkIdList($menuChild,$menuProduct->name)?>>
			<img <?=srcImg($menuChild)?>>
			<div class="text-over"><?=$menuChild->title?></div>
		  	<div class="item-overlay top"></div>
	  	</a>
  	</div>
</div>
<?php } ?>