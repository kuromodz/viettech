<?php $listData = $db->listData($menuPage->id); if(count($listData)){?>
<div class="panel">
    <div class="panel-heading panel-title"><?=$title ?></div>
    <div class="panel-body">
        <div class="row">
        	<div class="col-md-12">
                <?php if(isset($id)){ $data = $page; }else{ $data = $listData[0];} ?>
                <iframe width="100%" height="450" src="<?=convertLinkYoutube($data->link); ?>"></iframe>
            </div>
            <div class="col-md-12">
                <?=$data->content?>
            </div>
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading panel-title"><?= $menuPage->title; ?></div>
                    <div class="panel-body">
                        <div class="row">
                        <?php foreach($listData as $data){ ?>
                            <div class="col-md-4">
                                <a <?=linkId($data,$name); ?>>
                                    <img class="img-thumbnail img-responsive" <?php srcImg($data); ?> />
                                </a>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>