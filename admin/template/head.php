<!DOCTYPE html>
<html class='no-js' lang='en' ng-app="myApp">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <base href="<?php echo baseUrl?>admin/" data-url="<?=baseUrl?>" />
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title>Edit: <?=$title?></title>
    <meta content='Viettech' name='author'>
    <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../upload/<?php echo $infoPage->logo ?>" rel="icon" type="image/ico" />
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet">
    <link href="plugins/nprogress/nprogress.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="plugins/datatables/buttons.dataTables.min.css">

    
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css" />
    
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>

</head>
<body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
        <a class='navbar-brand' href='.'><i class='fa fa-user'></i> Quản lý nội dung</a>
        <ul class="nav navbar-nav pull-right">
            <li>
                <a class="hidden" title="Bấm Alt + F1" shortcut='alt+f1' <?=linkMenu($menuConfig); ?> ></a>
            </li>
            <li>
                <form class="navbar-form searchAjax">
                    <button type="button" onclick="sitemap(this)" class="btn btn-primary">
                        <i class="fa fa-sitemap"></i> Cập nhật sitemap
                    </button>
                    <input class="form-control" placeholder="Tìm kiếm..." type="text" name="title"> 
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </li>
            <li><a title="Alt + H" shortcut="alt+h" onclick="window.open('<?=baseUrl?>');"><i class="fa fa-home"></i> Xem trang chủ</a></li>
            <li><a title="Alt + V" onclick="viewPage()" shortcut="alt+v"><i class="fa fa-eye"></i> Xem trang hiện tại</a></li>
            <li><a href="logout.php" ><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
        </ul>
    </div>
    <div id='wrapper' class="contentAjax">