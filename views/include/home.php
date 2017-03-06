
<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div id="content">
        <div class="content-top">
        <?php foreach($listMenu as $menu){ if($menu->file == 'product'){
        	$listData = $db->allListDataChild($menu->id);
        	?>
            <div class=" box productcarousel">
                <div class="box-heading">
                    <h4><span><?=$menu->title?></span></h4>
                </div>
                <div class="box-content">
                    <div class="row box-product">
                    	<?php foreach($listData as $data){ ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="product-block">
                                <div class="image">
                                    <a class="img" data-name="workstation" data-id="1207" data-title="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" href="workstation/cau-hinh-dual-xeon-e5-2665-nvidia-quadro-2000-sama-falcon-tan-idcooling-214x-1207.html">
                                        <img src="http://maytinhhoangthanh.com/upload/14980680_1259374284135651_6840081773341052160_n-16-11-2016-21-47-55.jpg" alt="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" title="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" style="opacity: 1;">
                                    </a>
                                    <div class="faceback hidden-xs hidden-sm" style="opacity: 1;">
                                        <a class="img back" data-name="workstation" data-id="1207" data-title="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" href="workstation/cau-hinh-dual-xeon-e5-2665-nvidia-quadro-2000-sama-falcon-tan-idcooling-214x-1207.html">
                                            <img src="http://maytinhhoangthanh.com/upload/14980680_1259374284135651_6840081773341052160_n-16-11-2016-21-47-55.jpg" alt="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" title="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-meta">
                                    <h3 class="name"><a data-name="workstation" data-id="1207" data-title="Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X" href="workstation/cau-hinh-dual-xeon-e5-2665-nvidia-quadro-2000-sama-falcon-tan-idcooling-214x-1207.html">Cấu Hình Dual Xeon E5 2665/Nvidia Quadro 2000/SAMA Falcon/Tản IDCOOLING 214X</a></h3>
                                    <div class="price">Giá: 25.500.000 VNĐ <span class="cart">
                                                <input class="button" type="button" onclick="addCart(1207,'a[data-id=1207] img')">
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php }} ?>

        </div>


    </div>
</section>