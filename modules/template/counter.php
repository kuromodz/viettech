<?php
include_once('config.php'); 

$db_host = 'localhost'; 
$db_user = dbUser;
$db_pass = dbPass;
$db_data = dbName;

if ($conn = @mysql_connect($db_host, $db_user, $db_pass)) {
    if (!@mysql_select_db($db_data)) {
        mysql_query('CREATE DATABASE `' . $db_data . '` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci');
        mysql_select_db($db_data);
        mysql_query('CREATE TABLE IF NOT EXISTS `counter` (
                `ip_address` varchar(15) NOT NULL,
                `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                KEY `ip_address` (`ip_address`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;');
    }
} else {
    die(mysql_error());
}
$time_now = time();
$time_out = 60; 
$ip_address = $_SERVER['REMOTE_ADDR']; 
if (!mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'")))
    mysql_query("INSERT INTO `vt_counter` VALUES ('$ip_address', NOW())");
$online = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now"));
$day = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 1) . " AND YEAR(`last_visit`) = " . date('Y')));
$yesterday = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 0) . " AND YEAR(`last_visit`) = " . date('Y')));
$week = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y')));
$lastweek = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE WEEKOFYEAR(`last_visit`) = " . (date('W') - 1). " AND YEAR(`last_visit`) = " . date('Y')));
$month = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y')));
$year = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter` WHERE YEAR(`last_visit`) = " . date('Y')));

// đếm tổng số người đã ghé thăm
$visit = mysql_num_rows(mysql_query("SELECT `ip_address` FROM `vt_counter`"));

?>
<!-- <center style="padding:10px;">
<script id="_waut77">var _wau = _wau || []; _wau.push(["classic", "q9ky3b3v5og7", "t77"]);
(function() {var s=document.createElement("script"); s.async=true;
s.src="http://widgets.amung.us/classic.js";
document.getElementsByTagName("head")[0].appendChild(s);
})();</script>
</center> -->
<p><i class="fa fa-user"></i> Đang online: <?=$online ?></p>
<p><i class="fa fa-user"></i> Hôm nay: <?=$day ?></p>
<p><i class="fa fa-user"></i> Hôm qua: <?=$yesterday ?></p>
<!-- <p><i class="fa fa-user"></i> Tuần này: <?=$week ?></p> -->
<!-- <p><i class="fa fa-user"></i> Tuần trước: <?=$lastweek ?></p> -->
<!-- <p><i class="fa fa-user"></i> Tháng này: <?=$month ?></p>
<p><i class="fa fa-user"></i> Năm nay: <?=$year ?></p> -->
<p><i class="fa fa-line-chart"></i> Tổng truy cập: <?=$visit ?></p>