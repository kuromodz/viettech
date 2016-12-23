<?php
  $listData = $db->list_data_order('page','type','ASC');
  $listFile = $db->list_data_where('file','hide','0');
?>

<form role="form" method="POST" enctype="multipart/form-data">
<div class="row">
  <?php foreach($listData as $data){ ?>
  <div class="col-md-6">
    <?php switch ($data->type) {
      case 'img':
        ?>

        <label class="btn btn-info btn-sm" for="input<?=$data->id?>">
          <i class="fa fa-upload"></i>
          Up ảnh <?=$data->title?>
        </label>
        <div class="clearfix"></div>
        <img class="img-thumbnail" onclick="$('#input<?=$data->id ?>').click();" style="max-height:100px;" id="input<?=$data->name ?>" src="../upload/<?=$data->content?>">        
        <input class="hidden" accept="image/*" name="info[<?=$data->name ?>]" type="file" id="input<?=$data->id ?>" onchange="readIMG(this,'<?='input'.$data->name ?>');"/>
        <?php
        break;
      
      default:
        ?>
        <label for="input<?=$data->id?>"><?=$data->title?></label>
        <input type="<?=$data->type?>" name="<?=$data->name?>" class="form-control" id="input<?=$data->id?>" value="<?=$data->content?>" placeholder="Nhập nội dung"/>
        <?php
        break;
    } ?>
    <div>
        
    </div>
  </div>
  <?php } ?>
</div>
<div class="row">
  <div class="col-md-12">
    <button type="submit" value="info" class="btn btn-success form-control"> <i class="fa fa-save"></i> Lưu (Alt + S)</button>
  </div>
</div>
</form>