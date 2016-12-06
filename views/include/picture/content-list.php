
<div class="col-md-12" style="margin-bottom:15px;">
    <div class="row br-news-list">
        <div class="col-xs-4 col-sm-2 col-md-2 br-news-list-img">
            <a <?=linkId($data,$menuParent->name); ?>>
                <img style="width: 100%;max-height:100px;" class="img-responsive" <?php srcImg($data); ?>>
            </a>
        </div>
        <div class="col-xs-8 col-sm-10 col-md-10 br-news-list-content">
            <h4 class="media-heading">
            <a <?=linkId($data,$menuParent->name); ?>><?=$data->title?></a>
            </h4>
            <p class="br-date"><span class="glyphicon glyphicon-time"></span> <?=$data->time?></p>
            <p><?=$data->des?></p>
        </div>
    </div>
</div>


