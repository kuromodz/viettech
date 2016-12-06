<?php
  $listData = $db->listData($menuPage->id);
  if(count($listData)){
?>
<div class='panel panel-default grid'>
  <table class='table'>
    <thead>
      <tr>
        <th>#</th>
        <th>Họ tên</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Nội dung tin nhắn</th>
        <th>Ngày gửi</th>
        <th><i class="fa fa-trash"></i></th>
      </tr>
    </thead>
    <tbody align="center">
    <?php foreach($listData as $key=>$data) {?>
        <tr>
          <td><?=$key+1 ?></td>
          <td><?=$purifier->purify($data->title)?></td>
          <td><?=$purifier->purify($data->phone)?></td>
          <td><?=$purifier->purify($data->email)?></td>
          <td><?=$purifier->purify($data->content)?></td>
          <td><?=$purifier->purify($data->time)?></td>
          
          <td>
            <a <?=linkDelId($data->id)?>><i class="fa fa-close"></i> Xóa</a>
          </td>

        </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>
<form role="form" method="POST" enctype="multipart/form-data">
  <div class="col-md-12">
    <label>Giới thiệu: </label>
    <textarea class="ckeditor" name="content"><?=$menuPage->content ?></textarea>
  </div>
  
  <div class="col-md-12">
    <button type="submit" value="info" class="btn btn-success form-control"> <i class="fa fa-save"></i> Lưu (Alt + S)</button>
  </div>
</form>