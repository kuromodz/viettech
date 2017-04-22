<?php
if(isset($user)){
  $listF = array(
    array('title'=>'Email','name'=>'email','type'=>'text','change'=>0),
    array('title'=>'Mật khẩu','name'=>'password','type'=>'password'),
    array('title'=>'Tên','name'=>'title','type'=>'text'),
    array('title'=>'Điện thoại','name'=>'phone','type'=>'text'),
    );
  $listF = convertToObject($listF);
?>
<div class="row">
  <div class="col-md-4">
      <ul class="nav nav-tabs md-pills pills-primary flex-column" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#changeInfo" role="tab"><i class="fa fa-fw fa-user"></i> Thông tin cá nhân</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#changePassword" role="tab"><i class="fa fa-fw fa-key"></i> Thay đổi mật khẩu</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#editPost" role="tab"><i class="fa fa-fw fa-edit"></i> Quản lý tin đăng</a>
          </li>
      </ul>
  </div>
  <div class="col-md-8">
      <div class="tab-content vertical">
          <div class="tab-pane fade in show active" id="changeInfo" role="tabpanel">
              <form enctype="multipart/form-data" class="contactAjax" action="changeInfo">
                <div class="card" style="margin-top:20px;">
                    <div class="card-block">
                        <div class="md-form">
                            <i class="fa fa-fw fa-info prefix"></i>
                            <input placeholder="Họ tên" required type="text" id="form1" class="form-control" name="title" value="<?=$user->title?>">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-fw fa-envelope prefix"></i>
                            <input disabled readonly type="text" value="<?=$user->email?>" class="form-control">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-fw fa-phone prefix"></i>
                            <input required placeholder="Số điện thoại" type="text" name="phone" value="<?=$user->phone?>" class="form-control" value="<?=$user->phone?>">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-fw fa-map-marker prefix"></i>
                            <input placeholder="Địa chỉ" type="text" class="form-control" name="address" value="<?=$user->address?>">
                        </div>
                        <div class="md-form">
                            <center>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-save"></i> Lưu</button>
                            </center>
                        </div>
                    </div>
                </div>
              </form>
          </div>
          <!--/.Panel 1-->
          <!--Panel 2-->
          <div class="tab-pane fade" id="changePassword" role="tabpanel">
              <form enctype="multipart/form-data" class="contactAjax" action="changePassword">
                <div class="card" style="margin-top:20px;">
                    <div class="card-block">
                        <div class="md-form">
                            <i class="fa fa-fw fa-key prefix"></i>
                            <input placeholder="Mật khẩu cũ" name="password" type="password" class="form-control">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-fw fa-key prefix"></i>
                            <input placeholder="Mật khẩu mới" name="passwordNew" type="password" class="form-control">
                        </div>
                        <div class="md-form">
                            <i class="fa fa-fw fa-key prefix"></i>
                            <input placeholder="Nhập lại mật khẩu mới" name="passwordNewRepeat" type="password" class="form-control">
                        </div>
                        <div class="md-form">
                            <center>
                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-save"></i> Lưu</button>
                            </center>
                        </div>
                    </div>
                </div>
              </form>
          </div>
          <!--/.Panel 2-->
          <!--Panel 3-->
          <div class="tab-pane fade" id="editPost" role="tabpanel">
              <i class="fa fa-spin fa-spinner"></i> Đang cập nhật...
          </div>
          <!--/.Panel 3-->
      </div>
  </div>
</div>
<?php } ?>