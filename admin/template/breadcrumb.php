<div id="infoPage" data-title="<?=$title?>" data-name="<?=$name?>" data-table="<?=(isset($id))?'data':'menu'?>" data-idList="<?php if(isset($idList)){echo $idList;}?>" data-id="<?php if(isset($id)){echo $id;}?>" ></div>
    <section id='sidebar'>
        <ul id='dock' class="navAjax sortAjax" data-active='active'>
            <?php $key=1; foreach($listMenuAdmin as $menu){ if($menu->file !=='search' && $menu->file !=='config'){
                $listData = $db->listData($menu->id);
            ?>
            <li data-name="<?=$menu->name?>" class="launcher <?=returnWhere('active',$menu->id,$menuPage->id) ?>">
              <i class="<?=returnIcon($menu->file) ?>"></i> 
              <a title="Bấm Alt + <?=$key?>" shortcut='alt+<?=$key?>' <?=linkMenu($menu); ?> >
                    <?php if($menu->file == 'shop'){ echo 'Đơn hàng'; }else{ echo $menu->title ;}?>
                  <span class="spanAlert"><?php if(count($listData)){echo count($listData);}?></span>
              </a>
            </li>
            <?php $key++;}} ?>
        </ul>
    </section>
<div>
<?php
	$allListMenuParent = array_reverse($db->allListMenuParent($idMenu));
	if(isset($idList) || $menuPage->menu_parent == '0' && !isset($id)){
		unset($allListMenuParent[count($allListMenuParent) - 1]);
	}
?>
<section id='tools'>
    <ul class='breadcrumb' id='breadcrumb'>
        <?php foreach($allListMenuParent as $menu) { if($menu){?>
        	<li>
                <a <?php if($menu->menu_parent == '0' || $menu->menu_parent == '-1'){echo linkMenu($menu);
                    }else{ echo linkIdList($menu,$name);} ?> >
                    <?=$menu->title;?>        
                </a>
        	</li>
        <?php }} ?>
        <li class='title'><?=$title;?></li>
    </ul>
</section>
<!-- Content -->
<div id='content'>