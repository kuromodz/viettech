<div class="col-md-12">
	<h1 style="font-size:17px;font-weight:bold;text-align:center"><?=$title?></h1>
	<?php $listData = $db->listDataChild($id); ?>
	<div class="row">
		<?php foreach($listData as $data){ ?>
		<div class="col-md-2">
			<a class="fancybox" rel="group" ><img class="img-responsive" style="width:100%;" <?php srcImg($data); ?> /></a>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
			afterShow: function() {
	            $(".fancybox").css('display','block');
            },
            afterClose:function() {
	            $(".fancybox").css('display','block');
            },
		});
		
	});
</script>