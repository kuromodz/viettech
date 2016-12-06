<div class="buttonCart">
	<?php $showMuaNgay = false; if($showMuaNgay){ ?>
    <a onclick="addCart(<?=$data->id ?>,'[data-id=<?=$data->id?>] img')" <?=linkMenu($menuShop); ?> >
      <i class="fa fa-money"></i> Mua ngay
    </a>
    <br>
    <?php } ?>
    <a onclick="addCart(<?=$data->id ?>,'[data-id=<?=$data->id?>] img')">
      <i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng
    </a>
</div>