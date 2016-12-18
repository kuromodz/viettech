<div class="col-lg-3 col-sm-4 col-xs-6 item text-center">
    <a  <?=linkId($data,$menuParent->name)?> >
        <img class="preview" <?=srcImg($data)?> />
        <h4><?=$data->title?></h4>
        <h4><?=$data->price?> VNĐ</h4>
        <?php include('modules/template/cart.php'); ?>
    </a> 
</div>
