<div class="col-lg-6">
    <div class="row">
        <div class="col-lg-5 mb-r">
            <div class="view overlay hm-white-slight">
                <img <?=srcImg($data)?> class="img-fluid">
                <a <?=linkId($data,$name)?> >
                    <div class="mask">
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-7 mb-r">
            <h4><?=$data->title?></h4>
            <p><?=$data->des?></p>
            <div class="orange-text">
                <?php for($i = 0; $i<rand(4,5);$i++){ ?>
                    <i class="fa fa-star"> </i>
                <?php } ?>
            </div>
            <p class="text-muted"><?=$data->time?></p>
        </div>
    </div>
</div>