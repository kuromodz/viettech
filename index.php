<?php
  /*include_once ('modules/cache-top.php');*/
  include('config.php');
  if(isset($_GET['name'])){
    $name = $_GET['name'];
    if(isset($_GET['id'])){
      $id = $_GET['id'];
    }
    if(isset($_GET['idList'])){
      $idList = $_GET['idList'];
    }   
  }else{
    $menuHome = $db->alone_data_where('menu','file','home');
    $name = $menuHome->name;
  }
  include('modules/control.php');
  if(isset($_GET['page']) && $_GET['page'] !== 1 && $_GET['page'] !== 0){
    $start = $config->limit * $_GET['page'];
  }else{
    $start = 0;
  }
  if(isset($_COOKIE['cart']) && $_COOKIE['cart'] !== ''){
    $listCart = explode(',', $_COOKIE['cart']);
    $totalCart = count($listCart);
  }
  
  if(!isset($_GET['ajax'])){
    include('modules/template/asset.php');
    include('views/template/head.php');
    include('modules/template/infopage.php');
    include('modules/content.php');
    include('views/template/footer.php');
    include('modules/template/template.php');
    include('views/template/reload-script.php');
  }else{
    include('modules/template/infopage.php'); 
    include('modules/content.php');
    include('views/template/reload-script.php');
  }

  /*include_once ('modules/cache-bot.php');*/
?>