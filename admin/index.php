<?php
  session_start();
  include_once ("../config.php");

  if(isset($_GET["name"])){
    $name = $_GET["name"];

    if(isset($_GET["id"])){
      $id = $_GET["id"];
    }

    if(isset($_GET["idList"])){
      $idList = $_GET["idList"];
    }

  }else{
    $menuHome = $db->alone_data_where("menu","file",'home');
    $name = $menuHome->name;
  }
  if(isset($_GET["page"]) && $_GET["page"] !== 1 && $_GET["page"] !== 0){
    $start = $config->limit * $_GET["page"];
  }else{
    $start = 0;
  }
 
  include_once ("../modules/control.php");
  if((!$menuPage) || (!isset($menuPage)) || (isset($page) && (!$page)) || ($menuPage->file == '404')){
    $menuPage = $menu404;
  }
  $filePath = "include/".$menuPage->file.".php";

  if(isset($configMenu) && $configMenu && ($configMenu->type == '')){
    $filePath = "../modules/edit.php";
  }

  $author = false;
  if(isset($_COOKIE['password']) && isset($_COOKIE['user'])){
    $userP = $_COOKIE['user'];
    $pass = $_COOKIE['password'];
  }

  if(isset($userP) && isset($pass)){
    if($pass == $password && $userP == 'admin'){
      $author = 'admin';  
    }else{
      $author = $db->alone_data_where_where('data','password',$pass,'name',$userP);
      if($author){
        if(!in_array($menuPage->id, explode(',', $author->type))){
          $filePath = '../modules/block-user.php';
        }
      }
    }
  }

  if($author){
    if(!isset($_GET["ajax"])){
      include_once ("template/head.php");
      include_once ("template/breadcrumb.php");
      include_once ("template/success.php");
      include_once ($filePath);
      include_once ("template/footer.php");
    }else{
      include_once ("template/breadcrumb.php");
      include_once ("template/success.php");
      include_once ($filePath); 
    }
  }else{
    header("Location: ".baseUrl.'admin/login.php?location='.($_SERVER['REQUEST_URI']));
  }
?>