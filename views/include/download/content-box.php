<div class="col-md-12" style="padding:10px;">
    <div class="row">
    	<div class="col-md-4">
    		<img class="img-thumbnail" <?php srcImg($page); ?> />
    	</div>
    	<div class="col-md-8">
    		<h1 style="font-size:17px;font-weight:bold;text-align:center"><?=$title?></h1>
    		<p><?=$page->content?></p>
    	</div>
    	<a href="<?=$page->link?>" target="_blank"><i class="fa fa-download"></i> Tải về</a>
    </div>

</div>