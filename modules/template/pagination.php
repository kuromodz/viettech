<?php
    $params = $_GET;
    $listUnset = array('name','idList','page','ajax');
    foreach($listUnset as $data){
        unset($params[$data]);
    }
    $params = http_build_query($params);
    $url = parse_url(pageUrl());
    $pageUrl = $url['path'].'?'.$params.'&page=';
    
    $pagination = ceil(count($allListData)/$config->limit);
    if(!isset($_GET["page"]) || $_GET["page"] == 0){
        $currentPage = 0;
    }else{
        $currentPage = $_GET["page"];
    }

    $next_page = $currentPage+1;
    if($pagination > 1){
?>
<div class="col-md-12">
    <center>
    <nav class="pagination">
        <ul class='page-numbers'>
            <?php for($i = 0; $i<$pagination; $i++){ ?> 
                <?php if($i == $currentPage){ ?>
                    <li><span class='page-numbers current'>
                    <?php if($i == 0){ ?> <i class="fa fa-home"></i> <?php  }else{ echo $i; }; ?>
                    </span></li>
                <?php }else{ ?>
                    <li>
                        <a class='page-numbers' href="<?=$pageUrl.$i?>" data-name="<?=$name?>" data-title="<?=$menuPage->title?> trang <?=$i?>" >
                            <?php if($i == 0){ ?> <i class="fa fa-home"></i> <?php  }else{ echo $i; }; ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if($currentPage < $pagination - 1){ ?>
            <li>
                <a class="next page-numbers" href="<?=$pageUrl.$next_page?>" data-name="<?=$name?>" data-title="<?=$menuPage->title?> trang <?=$next_page?>" >&rarr;
                </a>
            </li> 
            <?php } ?>
        </ul>
    </nav>
    </center>
</div>
<style>
.page-numbers.current{background:#000;color:#fff!important}
.pagination{text-align:center}
.pagination,.wp-prev-next{margin:1.5em 0}
.pagination ul{border:1px solid #b7b7b7;display:inline-block;white-space:nowrap;padding:0;clear:both}
.pagination li:first-child{border-left:none}
.pagination li{border-left:1px solid #b7b7b7;padding:0;margin:0;float:left;display:inline;overflow:hidden}
a:link,a:visited:link{-webkit-tap-highlight-color:rgba(0,0,0,0.3)}
a:-webkit-any-link{text-decoration:none!important}
.pagination a,.pagination span{margin:0;text-decoration:none;padding:0;line-height:1em;font-size:1em;font-weight:400;padding:.75em;min-width:1em;display:block}
</style>
<?php } ?>