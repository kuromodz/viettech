<div class="item_intro">
    <div class="col-lg-4 col-sm-6 br-into-item">
        <div class="intro">
            <div class="img-parent">
                <a <?=linkId($data,$menuParent->name); ?>>
                    <img class="img-responsive item-product-img" <?php srcImg($data); ?>>
                </a>
            </div>

            <h4 style="text-align:center;font-weight:bold;height:30px;">
                <a <?=linkId($data,$menuParent->name); ?>>
                    <?=$data->title?>
                </a>
            </h4>

            <div class="caption">
                <p class="align-center"><?=$data->des?></p>
            </div>
        </div>
    </div>
</div>