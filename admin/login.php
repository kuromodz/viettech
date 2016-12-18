<?php
  session_start();
  include_once ("../config.php");
  include_once ("../modules/control.php");
  if(!isset($_GET["location"])) $_GET["location"] = baseUrl.'admin/';
  if(isset($_POST["password"])){
    if($_POST["password"] == $password){
      setcookie('password', $_POST["password"], time() + 36000000000);
      header("Location: ".$_GET["location"]);
    }
  }else if(isset($_COOKIE["password"]) && $_COOKIE["password"] == $password){
    header("Location: ".$_GET["location"]);
  }
?>
<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Đăng nhập</title>
    <meta content='lab2023' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../upload/<?php echo $infoPage->logo ?>" rel="icon" type="image/ico" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    
  </head>
  <body class='login'>
    <div class='wrapper'>
      <div class='row'>
        <div class='col-lg-12'>
          <div class='brand text-center'>
            <h1><img height="150" src="assets/images/logo.png"></h1>
          </div>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-12'>
          <form method="POST">
            <div class='form-group'>
              <input class='form-control' name="password" placeholder='Password' type='password'>
            </div>
          <!--   <center>
              <div class="g-recaptcha" style="width:100%;" data-sitekey="6Ld6BiATAAAAAKsBWb8Z0ujMp3oBTpWaKVMztG0G"></div>
            </center> -->
            <br/>
            <div class='text-center'>
              <button class="btn btn-default" type="submit"> Đăng nhập</button>
              <a href="http://viettechcorp.vn" target="_blank">Quên mật khẩu ?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js/file.js" type="text/javascript"></script>
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
  </body>
</html>