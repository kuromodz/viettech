<div class="col-md-12">
    <div class="row br-news-list">
        <div class="col-xs-4 col-sm-2 col-md-2 br-news-list-img">
            <img style="max-width:120px;max-height:100px;" <?php srcImg($data); ?>>
        </div>
        <div class="col-xs-8 col-sm-10 col-md-10 br-news-list-content">
            <h3 class="media-heading"><b><?=$data->title?></b></h3>
            <p class="br-date"><span class="glyphicon glyphicon-time"></span> <?=$data->time?></p>
            <p><?=$data->content?></p>
            <a href="<?=$data->link?>" target="_blank"><i class="fa fa-download"></i> Tải về</a>
        </div>
    </div>
</div>


