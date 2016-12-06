<?php
$listData = $db->listData($menuPage->id);
if(count($listData)){
  $listF = array(
    array('title'=>'Tên','name'=>'title','type'=>'text'),
    array('title'=>'Email','name'=>'email','type'=>'text'),
    array('title'=>'Số điện thoại','name'=>'phone','type'=>'text'),
    array('title'=>'Mật khẩu','name'=>'password','type'=>'password'),
    );
  $listF = convertToObject($listF);
?>
<div class="box-header">
  <h3 class="box-title">
    <button class="btn btn-success selectAll" data-target="table > tbody > tr" type="button"><i class="fa fa-check-square-o"></i> Chọn tất cả</button>
    <button class="btn btn-danger delAll"  data-target="table >tbody > tr.selected" type="button"><i class="fa fa-trash"></i> Xóa đã chọn</button>
  </h3>
</div>
<div class="box-body">
  <table class="table">
    <thead>
      <tr>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Mật khẩu</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($listData as $key=>$data){
    ?>
    <tr align="center" data-id="<?= $data->id ?>">
     <td><?= $data->title ?></td>
     <td><?= $data->phone ?></td>
     <td><?= $data->email ?></td>
     <td><?= $data->password ?></td>
     <td class="action">
      <a <?=linkDelId($data->id,$name); ?>><i class="fa fa-trash"></i></a>
     </td>
    </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php }else{ ?>
<h3>Chưa có <?=$title?> !</h3>
<?php } ?>