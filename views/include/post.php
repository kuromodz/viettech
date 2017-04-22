<div class="card-block">
    <center><p class="text-danger">* Vui lòng nhập thông tin chính xác, sản phẩm của bạn sẽ được đăng sau khi kiểm duyệt !</p></center>
    <form class="contactAjax" action="post" enctype="multipart/form-data">
        <div class="file-field">
            <div class="btn btn-primary btn-sm">
                <span>Chọn hình ảnh <i class="fa fa-fw fa-picture-o fa-fw"></i></span>
                <input type="file" required name="img" accept="image/*">
            </div>
            <div class="file-path-wrapper">
               <input class="file-path validate" type="text" placeholder="Chọn hình sản phẩm">
            </div>
        </div>
        <br><br>
        <div class="clearfix"></div>
        <?php foreach ($listFp as $key => $f) { ?>
            <div class="md-form">
                <i class="fa fa-fw fa-<?=$f->icon?> prefix"></i>
                <input type="text" id="fTitle" required name="<?=$f->name?>" class="form-control">
                <label for="fTitle"><?=$f->title?></label>
            </div>
        <?php } ?>
        <div class="clearfix"></div>
        <div class="md-form">
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" required name="menuPost">
                        <option value="">Chọn danh mục</option>
                        <?php $listMenuChild = $db->listMenuChild($menuProduct->id);
                        foreach($listMenuChild as $menuChild){ ?>
                        <option value="<?=$menuChild->id?>"><?=$menuChild->title?></option>
                        <?php } ?>
                    </select>
                </div>
                <?php foreach($listSl as $sl){ $col = $sl->name; ?>
                <div class="col-md-4">
                    <select required name="<?=$col?>" class="form-control">
                        <?php if($col == 'district'){ ?>
                        <option value="">Quận Huyện</option>
                        <?php }else{ $listOp = $db->list_data($sl->name); foreach($listOp as $op){ ?>
                        <option value="<?=$op->id?>"><?=$op->name?></option>
                        <?php }} ?>
                    </select>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="md-form">
            <i class="fa fa-fw fa-pencil prefix"></i>
            <textarea type="text" required name="content" id="fContent" class="md-textarea"></textarea>
            <label for="fContent">Nội dung</label>
        </div>
        <center>
            <button class="btn btn-danger">Đăng tin</button>
            <div class="call">
                <br>
                <p>Vui lòng liên hệ <a class="text-info" href="tel:<?=$infoPage->phone?>"> <?=$infoPage->phone?></a> nếu bạn có bất kỳ thắc mắc gì !</p>
            </div>
        </center>
    </form>
</div>