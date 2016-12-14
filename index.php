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
  if (isset($menuPage->file) && file_exists('views/include/'.$menuPage->file.'.php')) {
    if(!isset($_GET['ajax'])){
      include('modules/template/asset.php');
      include('views/template/head.php');
      include('modules/template/template.php');
      include('modules/content.php');
      include('modules/template/script.php');
      include('views/template/footer.php');
      include('views/template/reload-script.php');
    }else{
      include('modules/template/template.php'); 
      include('modules/content.php');
      include('views/template/reload-script.php');
    }
  }else{
    header('Location: '.baseUrl.'admin/404/');
  }
  /*include_once ('modules/cache-bot.php');*/
?>