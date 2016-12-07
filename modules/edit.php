<?php 
  $idFile = 'include/'.$menuPage->file.'.php';
  /*Nếu không tồn tại idFile thì cấu hình chi tiết sản phẩm theo mặc định*/
?>
<?php if(isset($id)){ ?>
<form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
  <?php if (!file_exists($idFile)) { ?>  
    <div class="col-md-6">
        <input type="hidden" name="table" value="data"/>
        <input type="hidden" name="id" value="<?=$id?>"/>
        <div class="form-group">
          <label class="control-label col-md-3">Tiêu đề</label>
          <div class="col-md-9">
            <input class="form-control" value="<?=$page->title?>" name="title"/>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Mô tả</label>
          <div class="col-md-9">
            <input class="form-control" value="<?=$page->des?>" name="des"/>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Keywords</label>
          <div class="col-md-9">
            <input class="form-control" value="<?=$page->keywords?>" data-role="tagsinput" name="keywords"/>
            <script src="plugins/tag/bootstrap-tagsinput.js"></script>
          </div>
        </div>

        <?php foreach($configMenu->listF as $data){ $dataCol = $data->col; ?>
        <div class="form-group">
            <?php switch ($data->type) {
              case 'content':
                ?>
                <label class="control-label col-md-3"><?=$data->title?></label>
                <div class="col-md-12">
                  <textarea class="ckeditor" name="<?=$dataCol?>"><?=$page->$dataCol ?></textarea>
                </div>
                <?php
                break;
              case 'file':
                ?>
                <label class="control-label col-md-3"><?=$data->title?></label>
                <div class="col-md-9">
                  <input name="<?=$dataCol?>" type="file" >
                  <a target="_blank" href="../upload/<?=$page->$dataCol?>"><?=$page->$dataCol?></a>
                </div>
                <?php
                break;
              default:
                ?>
                <label class="control-label col-md-3"><?=$data->title?></label>
                <div class="col-md-9">
                  <input class="form-control <?=$data->type?>" value="<?=$page->$dataCol?>" name="<?=$dataCol?>" />
                </div>
                <?php
                break;
            }?>
        </div>
        <?php } ?>
        
        <?php $listMenuParent = $db->listMenuChild($menuPage->id); if(count($listMenuParent)){ ?>
        <div class="form-group">
          <label class="control-label col-md-3">Danh mục: </label>
          <div class="col-md-9">
            <select class="form-control" name="menu">
             <?php foreach ($listMenuParent as $menu) { ?>
                <option value="<?=$menu->id ?>" <?=returnWhere('selected',$page->menu,$menu->id) ?> ><?=$menu->title ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <?php } ?>

        <?php foreach($configMenu->listCheck as $check){ $dataCol = $check->col;?> 
        <div class="form-group">
          <label class="control-label col-md-3" for="switch<?=$check->col?>"><?=$check->title?>:</label>
          <div class="col-md-9">
            <div class="onoffswitch">
              <input type="hidden" name="<?=$check->col?>" value="0" />
              <input type="checkbox" <?=returnWhere('checked',$page->$dataCol,1) ?> name="<?=$check->col?>" class="onoffswitch-checkbox" id="switch<?=$check->col?>" value="1" />
              <label class="onoffswitch-label" for="switch<?=$check->col?>"></label>
              <p class="hidden"><?=$page->$dataCol?></p>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label col-md-3">Hình ảnh</label>
        <div class="col-md-9">
          <img height="100" onclick="$('#input<?=$id ?>').click();" id="image<?=$id ?>" src="../upload/<?=$page->img?>">
          <input accept="image/*" name="img" type="file" id="input<?=$id ?>" onchange="readIMG(this,'<?='image'.$id ?>');">
        </div>
      </div>
      <?php if($configMenu->slide){ 
        $listSlide = $db->list_data_where_where('data','data_parent',$id,'type','slide');
        ?>
        <label>Hình slide <?=$title?>: </label>
        <input type="file" name="slideData[]" multiple="" accept="image/*" />
        <br>
        <button class="btn btn-success selectAll" data-target="#tableSlide > tbody > tr" type="button"><i class="fa fa-check-square-o"></i> Chọn tất cả</button>  
        <button class="btn btn-danger delAll"  data-target="#tableSlide >tbody > tr.selected" type="button"><i class="fa fa-trash"></i> Xóa đã chọn</button>
        <div class="box">
            <div class="box-body">
              <table id="tableSlide" class="table slide">
                <thead>
                  <tr>
                    <th width="10px">#</th>
                    <th width="100px"><i class="fa fa-picture-o"></i> Hình</th>
                    <th>Tiêu đề</th>
                    <th width="100px"><i class="fa fa-trash"></i> Xóa</th>
                  </tr>
                </thead>
                <tbody class="sortAjax">
                <?php
                  foreach($listSlide as $key=>$data){
                ?>
                <tr align="center" data-name="data" data-id="<?=$data->id ?>">
                  <td><?=$key+1; ?></td>
                  <td><img style="height:50px;" src="../upload/<?=$data->img ?>" class="img-responsive"></td>
                  <td><input class="form-control" type="text" name="listRow[data][<?=$data->id?>][title]" value="<?=$data->title?>" /></td>
                  <td class="action">
                    <a <?=linkDelId($data->id,$name); ?>><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
      <?php } ?>
    </div>
    <?php if($configMenu->tab){$listData = $db->list_data_where_where('data','data_parent',$id,'type',''); ?>
    <div class="col-md-12">
        <div>
          <a <?=linkAddIdData($id); ?>><i class="fa fa-plus"></i> Thêm tab con</a>
          <br>
          <ul class="nav nav-tabs">
            <?php foreach($listData as $key=>$data){ ?>
              <li class="<?=returnWhere('active',$key,0) ?>"><a data-toggle="tab" href="#tab<?=$data->id?>"><?=$data->title ?></a></li>
            <?php } ?>
          </ul>
          <br>
          <div class="tab-content">
            <?php foreach($listData as $key=>$data){ $listDataChild = $db->listDataChild($data->id);?>
              <div id="tab<?=$data->id?>" class="tab-pane fade <?=returnWhere('in active',$key,0) ?>">
                <a <?=linkDelId($data->id); ?>><i class="fa fa-trash"></i> Xóa</a>
                <br>
                  <label>Tiêu đề:</label>
                  <input type="text" value="<?=$data->title ?>" name="listRow[data][<?=$data->id ?>][title]" class="form-control" /><br>
                  <label>Nội dung:</label>
                  <textarea name="listRow[data][<?=$data->id ?>][content]" class="ckeditor"><?=$data->content?></textarea><br>
                </div>
           <?php } ?>
          </div>
        </div>
    </div>
    <?php }else{ ?>
    <div class="col-md-12">
      <label>Nội dung:</label>
      <textarea class="ckeditor" name="content"><?=$page->content ?></textarea>
    </div>
    <?php } ?>
  <?php }else{ include($idFile); } ?>
  <div class="col-md-12">
    <button type="submit" value="info" class="btn btn-success form-control"> <i class="fa fa-save"></i> Lưu (Alt + S)</button>
  </div>
</form>
<?php }else{ 
    $colList = ($configMenu->showList)?8:12;
    if(!isset($idList)){
      $idList = $menuPage->id; 
      $page = $menuPage;
    }
    $listData = $db->listData($idList); 
    $listMenuChild = $db->listMenuChild($idList);
?>
<form role="form" method="POST" class="form-horizontal" enctype="multipart/form-data">


  <?php if($configMenu->showList){ ?>
  <div class="col-md-4">
    <div class="panel panel-default grid">
      <div class="panel-heading">
        <span ><i class="fa fa-cog"></i> Quản lí danh mục</span>
      </div>
      <div class="panel-body">
        <div class="form-horizontal">
          <?php if($page->menu_parent !== '0'){ ?>
          <div class="form-group">
            <label class="control-label col-md-4">Tiêu đề: </label>
            <input type="hidden" name="table" value="menu"/>
            <input type="hidden" name="id" value="<?=$idList ?>"/>
            <div class="col-md-8">
              <input type="text" value="<?=$page->title ?>" name="title" class="form-control" />
            </div>
          </div>
          <?php if($configMenu->showImage){ ?>
          <div class="form-group">
            <label class="control-label col-md-4">Hình ảnh</label>
            <div class="col-md-8">
              <input type="file" name="img" class="form-control" />
            </div>
          </div>
          <center class="form-group">
            <img style="max-height:50px" src="../upload/<?=$page->img ?>" />
          </center>
          <?php } ?>
          <?php }else{$listData = $db->allListDataChild($idList,0,'','pos','ASC');} ?>
          <div class="col-md-12"> 
            <a <?=linkAddMenu($menuPage->id,$name); ?>>
              <i class="fa fa-plus"></i> Thêm danh mục con
            </a>
            <ul class="tree">
              <li class="root">
                <ul class="tree sortAjax">
                  <?php 
                    if($configMenu->multiMenu){
                      if(!isset($idList)) $idList = $menuPage->id;
                      $db->loopMenuMulti($name,$idList); 
                    }else{
                      $db->loopMenu($db->listMenuChild($menuPage->id),$name,$idList); 
                    }
                  ?>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="col-md-<?=$colList?>">
      <div class="box">
        <?php if(($configMenu->showList == '1' && $idList !== $menuPage->id ) || ($configMenu->showList !== '1') && ($configMenu->onlyContent !== '1')){
        ?>
          <div class="box-header">
            <h3 class="box-title">
              <?php if(!count($listMenuChild)){ ?>
              <a <?=linkAddId($idList,$name) ?> >
                <i class="fa fa-plus"></i> Thêm <?=$title ?> (<?=count($listData); ?>) 
              </a>
              <?php } ?>

              <?php if(count($listData)){ ?>
              <button class="btn btn-success selectAll" data-target=".tableData<?=$idList?> > tbody > tr" type="button"><i class="fa fa-check-square-o"></i> Chọn tất cả</button>
              <button class="btn btn-danger delAll"  data-target=".tableData<?=$idList?> >tbody > tr.selected" type="button"><i class="fa fa-trash"></i> Xóa đã chọn</button>
              <?php } ?>
            </h3>
          </div>
        <?php } ?>
        <?php if(count($listData)){ ?>
          <div class="box-body">
            <table <?=returnWhere('id="tableData" ',$configMenu->orderProduct,0)?> class="table tableData<?=$idList?>">
              <thead>
                <tr>
                  <th width="10px">#</th>
                  <th width="100px"><i class="fa fa-picture-o"></i></th>
                  <th><i class="fa fa-info"></i> Tiêu đề</th>
                  <?php if($configMenu->listCheck){ foreach($configMenu->listCheck as $check){ ?>
                  <th><?=$check->title?></th>
                  <?php }} ?>
                  <th><i class="fa fa-list"></i></th>
                  <th width="100px"><i class="fa fa-hand-pointer-o"></i></th>
                </tr>
              </thead>
              <tbody <?=returnWhere(' class="sortAjax"',$configMenu->orderProduct,1)?> >
              <?php
                foreach($listData as $key=>$data){ $menuParent = $db->alone_data_where('menu','id',$data->menu);
              ?>
              <tr align="center" data-id="<?=$data->id ?>">
                <td><?=$key+1; ?></td>
                <td><a <?=linkId($data,$name); ?>><img style="height:50px;" src="../upload/<?=$data->img ?>" class="img-responsive"></a></td>
                <td>
                  <input type="text" value="<?=$data->title; ?>" name="listRow[data][<?=$data->id ?>][title]" class="form-control" />
                  <p class="hidden"><?=$data->title?></p>
                </td>
                <?php if($configMenu->listCheck){ foreach($configMenu->listCheck as $check){$checkName = $check->col; ?>
                <td>
                  <div class="onoffswitch">
                    <input type="hidden" name="listRow[data][<?=$data->id ?>][<?=$checkName?>]" value="0" />
                    <input type="checkbox" <?=returnWhere('checked',$data->$checkName,1) ?> name="listRow[data][<?=$data->id ?>][<?=$checkName?>]" class="onoffswitch-checkbox" id="switch<?=$checkName.$data->id ?>" value="1" />
                    <label class="onoffswitch-label" for="switch<?=$checkName.$data->id ?>"></label>
                    <p class="hidden"><?=$data->$checkName ?></p>
                  </div>
                </td>
                <?php }} ?>
                <td><a <?=linkIdList($menuParent,$name); ?> ><?=$menuParent->title?></a></td>
                <td class="action">
                  <a <?=linkId($data, $name); ?> class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <a <?=linkDelId($data->id,$name); ?>><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } ?>

      </div>
  </div>
  <div class="col-md-12">
    <button type="submit" class="btn btn-success form-control" >
      <i class="fa fa-save"></i> Lưu (Alt + S)
    </button>
  </div>
  <?php if($menuPage->id == $page->id){ ?>
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
    <?php if($configMenu->showImageMenu){ ?>
    <div class="col-md-6">
      <input type="hidden" name="table" value="menu"/>
      <input type="hidden" name="id" value="<?=$menuPage->id?>"/>
      <label>Ảnh <?=$menuPage->title?></label>
      <img height="100" width="100%" onclick="$('#input<?=$menuPage->id ?>').click();" id="image<?=$menuPage->id ?>" src="../upload/<?=$menuPage->img?>">
      <br><br>
      <input accept="image/*" name="img" type="file" id="input<?=$menuPage->id ?>" onchange="readIMG(this,'<?='image'.$menuPage->id ?>');">
    </div>
    <?php } ?>

    <?php if($configMenu->onlyContent == '1'){ ?>
      <div class="col-md-12" style="margin-top:20px;">
        <ul class="nav nav-tabs">
          <?php foreach($configMenu->listF as $key=>$data){ ?>
            <li class="<?=returnWhere('active',$key,0) ?>"><a data-toggle="tab" href="#tab<?=$data->id?>"><?=$data->title ?></a></li>
          <?php } ?>
        </ul>
        <br>
        <div class="tab-content">
          <?php foreach($configMenu->listF as $key=>$data){ $dataCol = $data->col; $listDataChild = $db->listDataChild($data->id);?>
            <div id="tab<?=$data->id?>" class="tab-pane fade <?=returnWhere('in active',$key,0) ?>">
              <textarea name="<?=$dataCol?>" class="ckeditor"><?=$page->$dataCol?></textarea><br>
            </div>
         <?php } ?>
        </div>
      </div>
    <?php } ?>

  <?php } ?>
</form>


<?php } ?>