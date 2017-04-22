<div class="col-md-6 product">
    <a <?=linkId($data,$menuProduct->name)?>>
    	<div class="row">
			<div class="col-md-4">
			    <div class="thumbnail">
			        <img <?=srcImg($data)?> class="img-thumbnail">
			    </div>
			</div>
			<div class="col-md-8">
			    <div class="caption">
			        <h4><?=$data->title?></h4>
			        <p>
			        	<i class="fa fa-money"></i> Giá: <span class="priceDot"><?=checkLength($data->price)?></span>
			        </p>
			        <p><i class="fa fa-user"></i> Người đăng: <?=$data->user?></p>
			        <p><i class="fa fa-map-marker"></i> Địa chỉ: <?=$data->address?></p>
			        <p><i class="fa fa-clock-o"></i> Ngày đăng: <?=$data->time?></p>
			    </div>
			</div>
		</div>
    </a>
</div>