<body class="hidden-sn dark-skin animated">
    <header>
        <ul id="slide-out" class="side-nav fixed custom-scrollbar">
            <li>
                <div class="logo-wrapper waves-light sn-avatar-wrapper">
                    <a <?=linkMenu($menuHome)?> >
                        <!-- <img src="upload/<?=$infoPage->logo?>" class="rounded-circle" alt="<?=$infoPage->title?>"> -->
                    </a>
                </div>
            </li>
            <li>
                <ul class="social">
                    <li>
                        <a target="_blank" href="<?=$infoPage->facebook?>">
                            <i class="fa fa-facebook"> </i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="skype:<?=$infoPage->skype?>"><i class="fa fa-skype"> </i></a>
                    </li>
                    <li>
                        <a target="_blank" href="<?=$infoPage->googlePlus?>">
                            <i class="fa fa-google-plus"> </i>
                        </a>
                    </li>
                    <li>
                        <a href="tel:<?=$infoPage->phone?>">
                            <i class="fa fa-phone"> </i>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <?php foreach($listMenu as $menu){
                        $listMenuChild = $db->listMenuChild($menu->id); ?>
                    <li>
                        <?php if(count($listMenuChild)){ ?>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="<?=$menu->ico?>"></i> <?=$menu->title?><i class="fa fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <?php foreach($listMenuChild as $menuChild){ ?>
                                <li>
                                    <a <?=linkIdList($menuChild,$menu->name)?> class="waves-effect">
                                    <i class="fa fa-angle-right"></i> <?=$menuChild->title?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php }else{ ?>
                        <a <?=linkMenu($menu)?> >
                            <i class="<?=$menu->ico?>"></i> <?=$menu->title?>
                        </a>
                        <?php } ?>
                    </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
        <nav class="navbar navbar-fixed-top double-nav">
            <div class="float-xs-left" style="padding-right:20px;">
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
            </div>
            <ul class="nav navbar-nav navAjax hidden-sm-down" data-active="active" data-e="li" data-animations="fadeIn fadeIn fadeIn fadeIn" data-hover="dropdown">
                <?php foreach($listMenu as $menu){
                $listMenuChild = $db->listMenuChild($menu->id);?>
                <li data-name="<?=$menu->name?>" class="nav-item <?php if(count($listMenuChild)) echo 'dropdown';?>">
                    <a class="nav-link" <?=linkMenu($menu)?> >
                    
                    <i class="<?=$menu->ico?>"></i> <?=$menu->title?>

                    <?php if(count($listMenuChild)){?>
                    	<i class="fa fa-angle-down"></i>
                    <?php } ?>
                    </a>
                    <?php if(count($listMenuChild)){?>
	                    <ul class="dropdown-menu">
	                    	<?php foreach($listMenuChild as $menuChild){ ?>
	                    		<li>
	                    			<a <?=linkIdList($menuChild,$menu->name)?> >
	                    				- <?=$menuChild->title?>	
	                    			</a>
	                    		</li>
	                    	<?php } ?>
				       </ul>
                    <?php } ?>
                </li>
                <?php } ?>
                <li data-name="<?=$menuSearch->name?>"></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
                <li class="nav-item">
                    <a href="javascript:$('.searchAjax input').focus();" class="nav-link"><i class="fa fa-search"></i></a>
                </li>
                <li class="nav-item">
                    <form class="form-inline searchAjax">
                        <input class="form-control" type="text" name="title" placeholder="Tên, sđt, địa chỉ, cty...">
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container-fuild" style="margin-top:60px;">
        <div class="row contentAjax">
	