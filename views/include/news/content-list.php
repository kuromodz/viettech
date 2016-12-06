<div class="col-lg-3">
    <div class="item"> 
        <a  <?=linkId($data,$menuParent->name)?> >
            <img <?=srcImg($data)?> />
            <h4><?=$data->title?>
            	<span style="text-transform:italic;font-size:13px;color:#ddd"><?=$data->time?></span>
                <span><?=$data->des?></span>
            </h4>
        </a> 
    </div>
</div>
