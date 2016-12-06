<?php
	$listSlide = $db->list_data_where_where('data','data_parent',$id,'type','slide');
	$listData = $db->list_data_where_where('data','data_parent',$id,'type','');
?>
<div class="contentProduct">
	<?php if(count($listSlide)){ ?>
	<div class="col-md-6">
		<ul class="bxslider">
			<?php foreach($listSlide as $data){ ?>
			<li><img style="max-height:210px;width:100%;" <?=srcImg($data)?> /></li>
			<?php } ?>
		</ul>
		<div id="bx-pager">
			<?php foreach($listSlide as $key=>$data){ ?>
			  <a data-slide-index="<?=$key?>" href=""><img style="height:70px;" <?=srcImg($data)?> /></a>
			<?php } ?>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.bxslider').bxSlider({auto:true,pagerCustom: '#bx-pager',});
			})
		</script>
	</div>
	<?php } ?>
	<div class="col-md-6">
		<?php foreach($configMenu->listF as $f){ $dataCol = $f->col;?> 
		    <p>
		    	<strong><?=$f->title?>:</strong> 
		    	<span class="<?php if($f->type == 'price'){echo 'addDot'; } ?>"><?=$page->$dataCol?></span>
		    </p>
        <?php } ?>
        
        <div class="fb-like" data-href="<?=pageUrl(); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
	</div>
	
	<div class="col-md-12" style="margin-top:20px;">
		<div class="content">
            <?=$page->content?>
        </div>
	</div>
	<?=showComment()?>
</div>