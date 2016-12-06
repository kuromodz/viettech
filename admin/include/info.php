<?php
  $listData = $db->list_data_order('page','type','ASC');
  $listFile = $db->list_data_where('file','hide','0');
?>

<form role="form" method="POST" enctype="multipart/form-data">

<div class="row">
  <?php foreach($listData as $data){ ?>
  <div class="col-md-6">
    <label for="input<?=$data->id?>"><?=$data->title?></label>
    <?php switch ($data->type) {
      case 'img':
        ?>
        <img class="img-thumbnail" onclick="$('#input<?=$data->id ?>').click();" style="height:100px;margin-bottom:10px;" id="input<?=$data->name ?>" src="../upload/<?=$data->content?>">        
        <input accept="image/*" name="<?=$data->name ?>" type="file" id="input<?=$data->id ?>" onchange="readIMG(this,'<?='input'.$data->name ?>');"/>
        <p class="help-block"><?=$data->content ?></p>
     
        <?php
        break;
      
      default:
        ?>
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