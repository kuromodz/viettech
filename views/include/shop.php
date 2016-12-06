<?php
$check = false;
$user = array();
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){ 
  $email = $_COOKIE["email"]; $password = $_COOKIE["password"];
  $user = $db->login($email,$password);
} 
if(($user) && checkCookieUser($user,$email,$password)){
	$check = true;
}
?>
<div class="col-md-12">
	<div id="resultCart">
	<?php if(isset($_COOKIE["cart"]) && $_COOKIE["cart"] !== ''){ ?>
		<form method="post" action="cart" class="contactAjax" baseUrl="<?=baseUrl ?>">
		<div class="table-responsive">          
		  <table class="table listCart">
		    <thead>
		      <tr>
		        <th>Hình</th>
		        <th>Tiêu đề</th>
		        <th>Giá</th>
		        <th width="100px">Số lượng</th>
		        <th>Xóa</th>
		      </tr>
		    </thead>
		    <tbody>
			<?php
			$cartCookie = explode(',', $_COOKIE["cart"]);
			$listCart = array_count_values($cartCookie); 
			$total = 0;
			foreach($listCart as $id=>$count){ $data = $db->alone_data_where('data','id',$id); if($data){ 
				$menuParent = $db->menuParent($data->menu); 
				$total += $data->price * $count;
			?>
			    <tr class="dataCart" id="data<?=$id; ?>">
			        <td>
			        	<a <?=linkId($data,$menuParent->name); ?>>
			        	<img class="img-responsive" style="height:50px;" <?php srcImg($data); ?> />
			        	</a>
			        </td>
			        <td><a <?=linkId($data,$menuParent->name); ?>><?=$data->title ?></a></td>
			        <td width="100px" class="price"><?=checkLength( $data->price,'Liên hệ'); ?></td>
			        <td width="70px">
			        	<input class="form-control count" type="text" onchange="changeTotal()" value="<?=$count ?>" name="count[<?=$data->id ?>]" />
			        	<input type="hidden" value="<?=$data->id ?>" name="cart[<?=$data->id ?>]" />
			        </td>
			        <td width="50px">
			        	<button type="button" class="btn btn-danger btn-sm confirm" onclick="clearCart(<?=$id ?>);">
			        		<i class="fa fa-trash"></i>
			        	</button>
			        </td>
			    </tr>
		      <?php } } ?>
		    </tbody>
		  </table>
		  <h4>
		  	<b id="total">Tổng: <?=$total ?></b>
		  	<button type="button" class="btn btn-danger confirm pull-right" onclick="clearCart();$('#linkCart').click();">
		  		<i class="fa fa-trash"></i> Xóa giỏ hàng
		  	</button>
		  </h4>
			<hr>
			<center><h3>ĐẶT HÀNG TRỰC TUYẾN</h3>	</center>
			<p><b>Họ và tên:</b> <?=$infoPage->name; ?></p>
			<p><b>Số điện thoại:</b> <?=$infoPage->phone; ?></p>
			<p><b>Địa chỉ:</b> <?=$infoPage->address; ?></p>
			<p><b>Số tài khoản ngân hàng:</b><br><?=$infoPage->bank; ?></p>
			<hr>
			<center><h3>GIAO HÀNG TẬN NƠI</h3>	</center>

		  <div class="form-group">
		      <input type="hidden" name="price" value="<?=$total ?>" >
		      <label for="name">Tên của bạn:</label>
		      <input type="text" name="title" class="cookie form-control" value="<?=showCookieUser($user,$check,'title'); ?>" placeholder="Nhập tên">
		  </div>
		  <div class="form-group">
		      <label for="mail">Số điện thoại:</label>
		      <input type="text" name="phone" class="cookie form-control" value="<?=showCookieUser($user,$check,'phone'); ?>" placeholder="Nhập số điện thoại">
		  </div>
		  <div class="form-group">
		      <label for="mail">Email:</label>
		      <input type="text" name="email" class="cookie form-control" value="<?=showCookieUser($user,$check,'email'); ?>" placeholder="Nhập Email">
		  </div>
		  <div class="form-group">
		      <label for="add">Địa chỉ:</label>
		      <input type="text" name="address" class="cookie form-control" value="<?=showCookieUser($user,$check,'address'); ?>" placeholder="Nhập dịa chỉ">
		  </div>
		  <div class="form-group">
		      <label for="content">Tin nhắn:</label>
		      <textarea type="text" name="content" class="form-control" rows="4" placeholder="Nhập nội dung tin nhắn"></textarea>
		  </div>

		  <div class="form-group">
		        <button type="submit" class="btn btn-success form-control">
		          	<i class="fa fa-shopping-cart"></i> Mua hàng
		        </button>
		  </div>
		  </div>
		  
		</form>
		
	<?php }else{ $menuP = $db->alone_data_where('menu','file','product');?>
		<h5><b>Bạn chưa chọn sản phẩm</b> - <a <?=linkMenu($menuP); ?>>Xem sản phẩm</a></h5>
	<?php } ?>

	</div>
</div>