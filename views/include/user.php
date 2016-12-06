<?php
if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){ 
  $email = $_COOKIE["email"]; $password = $_COOKIE["password"];
  $user = $db->login($email,$password);
} 
if(isset($user) && $user && $user->email == $email && $user->password == $password){
  $listF = array(
    array('title'=>'Email','name'=>'email','type'=>'text','change'=>0),
    array('title'=>'Mật khẩu','name'=>'password','type'=>'password'),
    array('title'=>'Tên','name'=>'title','type'=>'text'),
    array('title'=>'Điện thoại','name'=>'phone','type'=>'text'),
    );
  $listF = convertToObject($listF);
?>
<div class="panel">
    <div class="panel-heading panel-title">Thông tin <?= $title; ?></div>
    <div class="panel-body">
        <div class="row">
        <form class="form-horizontal contactAjax" action="updateUser" method="POST" role="form">
            <div class="col-md-12">
            <?php foreach($listF as $data){ if(!isset($data->change)){ $name = $data->name; ?>
            <div class="form-group">
              <label class="control-label col-sm-3" for="<?= $data->name; ?>"><?= $data->title; ?>:</label>
              <div class="col-sm-9">

                <input name="<?= $data->name; ?>" type="<?= $data->type; ?>" class="form-control" id="<?= $data->name; ?>" placeholder="Nhập <?= $data->title; ?>" value="<?= $user->$name ?>">

              </div>
            </div>
            <?php }else{ ?>
            <div class="form-group">
              <label class="control-label col-sm-3"><?= $data->title; ?>:</label>
              <div class="col-sm-9">
               <label class="control-label"><b><?php $name = $data->name; echo $user->$name; ?></b></label>
              </div>
            </div>
            <?php }} ?>
            </div>
            <div class="col-md-12">
                <?php $listData = $db->listDataChild($user->id);  if(count($listData)){ ?>
                <h1>Danh sách đơn hàng</h1>
                <table class="table">
                  <thead>
                    <tr>
                      <th>Hình</th>
                      <th>Tên sản phẩm</th>
                      <th>Giá</th>
                      <th>Số lượng</th>
                      <th>Thời gian</th>
                      <th><button type="button" class="btn btn-danger" onclick="delDataUser();"><i class="fa fa-trash"></i> Xóa tất cả</button></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    foreach($listData as $key=>$data){ $sp = $db->alone_data_where('data','id',$data->cart);
                    $menuParent = $db->menuParent($sp->menu);
                  ?>
                  <tr align="center" id="data<?=$data->id?>">
                   <td>
                      <a <?=linkId($sp,$menuParent->name); ?>>
                        <img style="height:50px;" <?php srcImg($sp); ?>/>
                      </a>
                   </td>
                   <td><a <?=linkId($sp,$menuParent->name); ?>><?= $sp->title ?></a></td>
                   <td><?= $sp->price ?></td>
                   <td><?= $data->count ?></td>
                   <td><?= $data->time ?></td>
                   <td>
                    <button type="button" class="btn btn-danger" onclick="delDataUser(<?= $data->id; ?>);"><i class="fa fa-trash"></i></button>
                   </td>
                  </tr>
                  
                  <?php } ?>
                  </tbody>
                </table>
                <?php }else{ ?>
                    <span class="text-danger text-center">Bạn chưa có đơn hàng nào !</span>
                <?php } ?>
            </div>
            <center><button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button></center>

        </form>
        </div>
    </div>
</div>
<?php } ?>

