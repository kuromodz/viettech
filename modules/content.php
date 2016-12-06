<?php
    $boxHead = '?> '.html_entity_decode($config->boxHead).' <?php ';
    $contentHead = '?> '.html_entity_decode($config->contentHead).' <?php ';
    $contentFooter = '?> '.html_entity_decode($config->contentFooter).' <?php ';

    $headHtml = '?> '.html_entity_decode($configMenu->headHtml).' <?php ';
    $footerHtml = '?> '.html_entity_decode($configMenu->footerHtml).' <?php ';
    $customHtml = '?> '.html_entity_decode($configMenu->customHtml).' <?php ';


    if(($configMenu->customTemplate == 1) || $configMenu->type=='custom' || ($configMenu->onlyContent == 1) || $configMenu->type == 'block' || $configMenu->file == 'home'){
        if($configMenu->type == 'custom' || $configMenu->customTemplate == 1){
            eval($customHtml);
        }else{
            eval($boxHead);
            $db->breadcrumbMenu($menuPage);
            eval($contentHead);

            if ($configMenu->onlyContent == 1) {
                echo $menuPage->content;
            }else if($configMenu->type == 'block'){
                include('views/include/'.$menuPage->file.'.php');
            }
            eval($contentFooter);
        }
        
    }else{
        eval($headHtml);
        $file = $menuPage->file;
        $thisIsProducts = false;
        if(isset($id)){
            eval($boxHead);
                $db->breadcrumb($page);
                $thisIsProducts = true;
            eval($contentHead);
            include('modules/template/box.php');
            eval($contentFooter);

            eval($boxHead);
                echo $menuPage->title.' khác'; 
                $listData = $db->listData($page->menu);
            eval($contentHead);
            include('modules/template/box.php');
            eval($contentFooter);
        }else{
            if(!isset($idList)){
                $idList = $menuPage->id;
                $page = $menuPage;
            }
            $listMenuChild = $db->listMenuChild($idList);
            if(count($listMenuChild)){ 
                $listData = $db->listData($idList);
                foreach($listMenuChild as $menuChild){
                    $listData = $db->allListDataChild($menuChild->id,0,$config->limit); 
                    eval($boxHead); 
                    $db->breadcrumbMenu($menuChild);  
                    eval($contentHead);
                    include('modules/template/box.php');
                    eval($contentFooter);
                } 
            }else{
                $listData = $db->allListDataChild($idList,$start,$config->limit);
                $allListData = $db->allListDataChild($idList);
                eval($boxHead);
                    $db->breadcrumbMenu($page); 
                eval($contentHead);
                include('modules/template/box.php');
                eval($contentFooter);
            }
        }
        eval($footerHtml);
    }
?>