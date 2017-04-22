</div>
</div>    
    <footer class="page-footer center-on-small-only">
        <div class="container">
            <div class="col-md-4">
                <h4><b>Thông tin công ty</b></h4>
                <p><?=$infoPage->title?></p>
                <p><i class="fa fa-map-marker fa-fw"></i> Địa chỉ: <?=$infoPage->address?></p>
                <p><i class="fa fa-phone fa-fw"></i> Số điện thoại: <?=$infoPage->phone?></p>
                <p><i class="fa fa-envelope fa-fw"></i> Email: <?=$infoPage->gmail?></p>
            </div>
            <div class="col-md-4">
                <h4><b>Thống kê truy cập</b></h4>
                <?php include('modules/template/counter.php'); ?>
            </div>
            <div class="col-md-4">
                <h4><b>Fanpage</b></h4>
                <?php include('modules/template/fanpage.php'); ?>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2016 Copyright <a href="http://viettechcorp.vn"> ViettechCorp.vn </a>
            </div>
        </div>
    </footer>

    <link href="views/template/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="views/template/css/mdb.css" rel="stylesheet"/>
    <link href="views/template/css/style.css" rel="stylesheet"/>

    <script type="text/javascript" src="views/template/js/tether.min.js"></script>
    <script type="text/javascript" src="views/template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="views/template/js/mdb.min.js"></script>
    <script>
        $(function(){
            $(".button-collapse").sideNav();
            var el = document.querySelector('.custom-scrollbar');
            Ps.initialize(el);
        })
    </script>
</body>
</html>