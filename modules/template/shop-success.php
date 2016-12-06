<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once ("../../config.php");
include_once ("../../modules/sql.php");
$db = new DB();

?>

<h4 class="text-success text-center"> <i class="fa fa-check"></i> Đặt hàng thành công !</h4>
<p><i class="fa fa-info"></i> Tên khách hàng: <?php echo $_POST['title'] ?></p>
<p><i class="fa fa-phone"></i> Số điện thoại: <?php echo $_POST['phone'] ?></p>
<p><i class="fa fa-envelope"></i> Email: <?php echo $_POST['email'] ?></p>
<p><i class="fa fa-map-marker"></i> Địa chỉ: <?php echo $_POST['address'] ?></p>
<p><i class="fa fa-envelope"></i> Tin nhắn: <?php echo $_POST['content'] ?></p>
<hr>
<span class="text-center"><b>Danh sách đơn hàng</b></span>
<hr>

<table class="table">
  <thead>
    <tr>
      <th>Hình</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Số lượng</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($_POST["cart"] as $key=>$id){ $sp = $db->alone_data_where('data','id',$key);
    $menuParent = $db->menuParent($sp->menu);
  ?>
  <tr align="center">
   <td>
      <a <?=linkId($sp,$menuParent->name); ?>>
        <img style="height:50px;" <?php srcImg($sp); ?>/>
      </a>
   </td>
   <td><a <?=linkId($sp,$menuParent->name); ?>><?php echo $sp->title ?></a></td>
   <td><?php echo $sp->price ?></td>
   <td><?php echo $_POST['count'][$key]; ?></td>
  </tr>
  
  <?php } ?>
  </tbody>
</table>
<h3><b>Tổng tiền: <?php echo $_POST['price'] ?></b></h3>