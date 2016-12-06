<?php
$boxHead = "?> ".html_entity_decode($config->boxHead)." <?php ";
    $contentHead = "?> ".html_entity_decode($config->contentHead)." <?php ";
    $contentFooter = "?> ".html_entity_decode($config->contentFooter)." <?php ";
  eval($boxHead);
  $db->breadcrumbMenu($menuPage);
  eval($contentHead);
?>
<div class="col-md-12">
  <?=$menuPage->content?>
</div>
<div class="col-md-6">
    <iframe frameborder="0" height="450" src="<?=$infoPage->map?>" style="border:0" width="100%"></iframe>
</div>
<div class="col-md-6">
  <center>
    <form class="contactAjax" action="contact">
        <p class="name">
          <input class="form-control" name="title" type="text" placeholder="Họ tên" id="name" />
        </p>
    
        <p class="email">
          <input class="form-control" name="email" type="text" id="email" placeholder="Email" />
        </p>
        <p class="text">
          <input class="form-control" name="phone" type="text" placeholder="Số điện thoại" />
        </p>
        <p class="text">
          <input class="form-control" name="address" type="text" placeholder="Địa chỉ của bạn" />
        </p>
        <p class="text">
          <textarea class="form-control md-textarea" name="content" placeholder="Nội dung tin nhắn"></textarea>
        </p>
        
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-send"></i> Gửi tin nhắn
        </button>
        
    </form>
    </center>
</div>
<?php eval($contentFooter); ?>