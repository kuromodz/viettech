<div class="col-md-12">
	<div class="row">
		<div class="col-md-5">
			<ul class="bxslider">
				<li><img <?=srcImg($page)?>></li>
				<?php $listSlide = $db->list_data_where_where('data','data_parent',$id,'type','slide');
				foreach($listSlide as $data){ ?>
				<li><img <?=srcImg($data)?>></li>
				<?php } ?>
			</ul>
			<div id="bx-pager">
			  <a data-slide-index="0" href=""><img class="img-thumbnail" <?=srcImg($page)?> /></a>
			  <?php foreach($listSlide as $key=>$data){ ?>
			  <a data-slide-index="<?=$key+1?>" href=""><img class="img-thumbnail" <?=srcImg($data)?> /></a>
			  <?php } ?>
			</div>
			<script type="text/javascript">
				$(function(){
					$('.bxslider').bxSlider({
					  pagerCustom: '#bx-pager'
					});
				})
			</script>
		</div>
		<div class="col-md-7">
			<h4 class="post-title"><?=$page->title?></h4>
			<p><i class="fa fa-info fa-fw"></i> Mô tả: <?=$page->des?></p>

			<p><i class="fa fa-money fa-fw"></i> Giá: <span class="priceDot"><?=checkLength($page->price)?></span></p>
			<p><i class="fa fa-map-marker fa-fw"></i> Địa chỉ: <?=$page->address?></p>
			<p><i class="fa fa-clock-o fa-fw"></i> Ngày đăng: <?=$page->time?></p>
			
			<?php include('modules/template/addthis.php'); ?>
		</div>
		<div class="col-md-12">
			<?=$page->content?>
		</div>
	</div>
</div>