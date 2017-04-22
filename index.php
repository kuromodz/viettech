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
  if(!$menuPage) $menuPage = $menu404;
  
  //kiểm tra tính năng thành viên
  if(isset($menuUser)){
    if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
      $user = $db->alone_data_where_where('user','email',$_COOKIE['email'],'password',$_COOKIE['password']);
      if(!$user){
        unset($user);
      }
    }
  }
  
  if(!isset($_GET['ajax'])){
    include('modules/template/asset.php');
    if(!isset($user)){
      include('modules/template/modal.php');
    }

    include('views/template/head.php');
    include('modules/template/infopage.php');
    include('modules/content.php');
    include('views/template/footer.php');
    include('modules/template/template.php');
  }else{
    include('modules/template/infopage.php'); 
    include('modules/content.php');
  }
  include('views/template/reload-script.php');

  /*include_once ('modules/cache-bot.php');*/
?>