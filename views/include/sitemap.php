<div class="panel">
    <div class="panel-heading panel-title">Sơ đồ Website</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div style="font-size:17px;">
                    <ul>
                        <?php foreach($listMenu as $menu){ if($menu->file !== 'config'){ $listMenuChild = $db->listMenuChild($menu->id); ?>
                        <li>
                            <a <?=linkMenu($menu); ?>><i class="<?php returnIcon($menu->file) ?>"></i> <?php echo $menu->title; ?></a>
                            <?php if(count($listMenuChild)){ ?>
                                <ul>
                                    <?php $db->loopMenuSite($listMenuChild,$menu->name); ?>
                                </ul>
                            <?php } ?>
                        </li>
                        <?php }} ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    ul{
        margin-left:40px;
    }
</style>