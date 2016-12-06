<?php
  include_once ("../../config.php");
  include_once ("../../modules/control.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo baseUrl ?>/admin/" />
    <meta charset="utf-8">
    <title>Không tìm thấy trang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="404">
    <meta name="author" content="KuroModz">
    
    <link href="404/css/style.css" rel="stylesheet">
	<script type="text/javascript" src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="shortcut icon" href="404/img/favicon.ico">
</head>
<body class="background-navy">
    <header>
    	<div class="logo"><a href="<?=baseUrl?>"><img style="max-height:200px;" src="<?=baseUrl?>upload/<?php echo $infoPage->logo ?>" class="logo" alt="" /></a></div>
    	<div class="ribbon"><img src="404/img/ribbon.png" alt="" /></div>
    </header>
    <section data-error="404" class="error">
    	<div class="number">
            <div id="n1"></div>
            <div id="n2"></div>
            <div id="n3"></div>
        </div>
    </section>
    
    <footer>
    	<div class="container">
        	<ul class="social">
        		<li><a target="_blank" href="<?php echo $infoPage->facebook ?>"><img src="404/img/social-facebook.png" alt="" /></a></li>
        	</ul>
        	<form action="#" method="post" class="search">
        		<input type="text" class="field" name="query" />
        		<input type="submit" class="button" name="submit" value="" />
        	</form>
    	</div>
    </footer>
    
    <script src="404/js/style.js"></script>
</body>
</html>