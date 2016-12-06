<?php
	$listData = $db->listData($menuPage->id);
?>
<div class="col-md-12">
  <div class='panel panel-default grid'>
    <table class='table'>
      <thead>
        <tr>
          <th>#</th>
          <th>Tiêu đề</th>
          <th>Mô tả</th>
          <th>Nội dung</th>
          <th>Hình ảnh</th>
          <th>Giá</th>
          <th>Diện tích</th>
          <th>Hướng</th>
          <th>Phòng ngủ</th>
          <th>Phòng tắm</th>
          <th><i class="fa fa-trash"></i></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($listData as $key=>$data) { ?>
        	<tr>
  	        <td><?php echo $key+1 ?></td>
  	        <td><?php echo $data->title ?></td>
  	        <td><?php echo $data->des ?></td>
  	        <td><?php echo $data->content ?></td>
  	        <td><?php echo $data->img ?></td>
  	        <td><?php echo $data->price ?></td>
  	        <td><?php echo $data->area ?></td>
            <td><?php echo $data->way ?></td>
  	        <td><?php echo $data->bedRoom ?></td>
  	        <td><?php echo $data->toilet ?></td>
  	        <td><a data-action="del" data-table="data" data-value="<?php echo $data->id ?>" href="?name=<?php echo $name ?>" class="btn btn-danger ajax">
                <i class="fa fa-close"></i> Xóa
              </a></td>
        	</tr>
      <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <div class="col-md-6">
    <label for="inputDes">Mô tả: </label>
    <input id="inputDes" class="form-control" type="text" name="des" value="<?=$menuPage->des?>"/>
  </div>
  <div class="col-md-6">
    <label for="inputKeywords">Keywords: </label>
    <input id="inputKeywords" class="form-control" type="text" name="keywords" value="<?=$menuPage->keywords?>"/>
  </div>
  <div class="col-md-12">
    <label>Nội dung: </label>
    <textarea name="content" class="ckeditor"><?=$menuPage->content?></textarea>
  </div>  
  <div class="col-md-12">
    <button type="submit" value="info" class="btn btn-success form-control"> <i class="fa fa-save"></i> Lưu (Alt + S)</button>
  </div>
</form>