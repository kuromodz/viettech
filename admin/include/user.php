<?php
if(isset($id)){
?>
<form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <input type="hidden" name="table" value="data"/>
  <input type="hidden" name="id" value="<?=$id?>"/>
  <div class="col-md-6">
    <div class="form-group">
      <label for="titleUser">Tên:</label>
      <input id="titleUser" class="form-control" value="<?=$page->title?>" name="title"/>
    </div>
    <div class="form-group">
      <label for="user">User:</label>
      <input class="form-control" value="<?=$page->name?>" name="name"/>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input id="pwd" class="form-control" value="<?=$page->password?>" name="password"/>
    </div>
  </div>
  <div class="col-md-6">
    <label class="col-md-12">Được chỉnh sửa các danh mục: </label>
    <?php foreach($listMenuAdmin as $menu){ if($menu->file !=='search'){
      $checkedMenu = false;
      $listMenuCheck = explode(',', $page->type);
      if(in_array($menu->id,$listMenuCheck)){
        $checkedMenu = true;
      }
    ?>
    <div class="col-md-6">
      <div class="col-md-3">
        <div class="onoffswitch">
            <input type="hidden" name="type[<?=$menu->id?>]" value="0" />
            <input type="checkbox" <?=returnWhere('checked',$checkedMenu,true)?> name="type[<?=$menu->id?>]" class="onoffswitch-checkbox" id="switchhide<?=$menu->id ?>" value="1" />
            <label class="onoffswitch-label" for="switchhide<?=$menu->id ?>"></label>
        </div>
      </div>
      <div class="col-md-9">
        <?=$menu->title?>
      </div>
    </div>
    <?php }} ?>
  </div>
  
  <button type="submit" class="btn btn-success form-control"> <i class="fa fa-save"></i> Lưu (Alt + S)</button>
</form>
<?php
}else{
  $listData = $db->listData($menuPage->id);  
?>
<div class="box-header">
  <h3 class="box-title">
    <a <?=linkAddId($menuPage->id)?> >
      <i class="fa fa-plus"></i> Thêm thành viên
    </a>
  </h3>
</div>
<div class="box-body">
  <table class="table">
    <thead>
      <tr>
        <th>Tên</th>
        <th>User</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
    <?php
      foreach($listData as $key=>$data){
    ?>
      <tr align="center" data-id="<?=$data->id?>">
       <td>
          <a <?=linkId($data,$name)?>>
            <?=$data->title?>
          </a>
        </td>
       <td>
          <a <?=linkId($data,$name)?>>
            <?=$data->name?>
          </a>
        </td>
       <td class="action">
        <a <?=linkDelId($data->id); ?>><i class="fa fa-trash"></i></a>
       </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
<?php } ?>