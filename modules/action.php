<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once('../config.php');
include_once('sql.php');
$db     = new DB();
$result = array(
    'error' => 1
);
if (isset($_GET['do'])) {
    $do        = $_GET['do'];
    $post      = array();
    $checkAdmin = false;
    if (isset($_COOKIE['password'])) {
        $listPage = $db->list_data('page');
        $infoPage = new stdClass();
        foreach ($listPage as $vl) {
            $key = $vl->name;
            if(strlen($key)){
                $infoPage->$key = $vl->content;
            }
        }
        if($infoPage->password == $_COOKIE['password']) $checkAdmin = true;
    }
    $listPass = array('post','contact','register','login');
    if(in_array($do,$listPass)) $checkAdmin = true;
    if($checkAdmin){
        switch ($do) {
            case 'post':
                $countF = count((array)$listF);
                if(isset($_POST['listImg']) && (count($_POST) > $countF) ){
                    $listImg = $post = [];
                    foreach($_POST['listImg'] as $key=>$img){
                        $img = $purifier->purify($img);
                        if($img !== '') $listImg[$key] = $img;
                    }
                    if(count($listImg)){
                        unset($_POST['listImg']);
                        $listPass = array('content','link');
                        foreach($_POST as $key=>$p){
                            $pCheck = $purifier->purify($p);
                            if( ($pCheck == '') && (!in_array($key,$listPass)) ){
                                $result['text'] = 'Dữ liệu nhập vào không hợp lệ !';
                                break;
                            }else{
                                $post[$key] = $pCheck;
                            }
                        }
                        if(count($post) >= $countF){
                            $menuPost = $db->alone_data_where('menu','file','post');
                            $post['menu'] = $menuPost->id;
                            if($db->insertData('data',$post)){
                                echo 'ok';
                                //xu li up anh
                                /*var_dump($listImg);*/
                            }
                        }
                    }
                }else{
                    $result['text'] = 'Dữ liệu gửi không đủ yêu cầu !';
                }
                break;
            case 'export':
                if(isset($_GET['menu'])){
                    $menu = $db->alone_data_where('menu','id',$_GET['menu']);
                    if($menu){
                        $sql = "SELECT * FROM `".dbPrefix."data` WHERE `menu` = '$menu->id' ";
                        if(isset($_POST['data']) && count($_POST['data'])){
                            $sql.='AND ';
                            $listId = $_POST['data'];
                            foreach ($listId as $key=>$idData) {
                                if($idData !== ''){
                                    $sql.=' `id` = '.$idData;
                                    if($key < count($listId)-1){
                                        $sql.=' OR';    
                                    }
                                }
                            }
                        }
                        $listData = $db->loadallrows_sql($sql);
                        if(isset($listData) && count($listData)){
                            include('template/export.php');
                            exit;
                        }else{
                            $result['text'] = 'Không có dữ liệu !';
                        }
                    }else{
                        $result['text'] = 'Không tồn tại menu !';
                    }

                }
                break;
            case 'resize':
                $folder = 'upload';
                if(isset($_GET['folder'])) $folder = $_GET['folder'];
                $files = glob('../'.$folder.'/*.{jpg,JPG,jpeg,JPEG,png,PNG}',GLOB_BRACE);
                foreach($files as $file){
                    resizeImage($file,$file,650,650);
                }
                break;
            case 'clean':
                $files = glob('../upload/*');
                foreach($files as $file){
                  if(is_file($file)){
                    $check = false;
                    $img = str_replace('../upload/','',$file);
                    if($db->alone_data_where('data','img',$img)){
                        $check = true;
                    }else if($db->alone_data_where('menu','img',$img)){
                        $check = true;
                    }else{
                        if($db->alone_data_where('page','content',$img)) $check = true;
                    }
                    if(!$check){
                        unlink($file);
                    }
                  }
                    
                }
                break;
            case 'register':
                require_once('recaptchalib.php');
                $resp = recaptcha_check_answer('6LdyfQsUAAAAAG3LgRecDNeT1mgmERMI51QwfxMz', $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
                
                if (!$resp->is_valid) {
                    $result['text'] = 'Sai mã capcha!';
                } else {
                    unset($_POST['recaptcha_challenge_field']);
                    unset($_POST['recaptcha_response_field']);
                    foreach ($_POST as $key => $data) {
                        if (strlen($data)) {
                            $post[$key] = $data;
                        }
                    }
                    
                    if (count($post) == count($_POST)) {
                        $menuUser = $db->alone_data_where('menu', 'file', 'user');
                        if ($post['password'] == $post['passwordCheck']) {
                            $listUser = $db->listData($menuUser->id);
                            $check    = 0;
                            foreach ($listUser as $data) {
                                if ($data->email == $post['email']) {
                                    $result['text'] = 'Thành viên đã tồn tại';
                                    $check          = 1;
                                    break;
                                }
                            }
                            if ($check == 0) {
                                unset($post['passwordCheck']);
                                if ($db->insertData('data', $post)) {
                                    $rs = array(
                                        'email',
                                        'password'
                                    );
                                    foreach ($rs as $data) {
                                        $result[$data] = $post[$data];
                                    }
                                    
                                    $result['error'] = 0;
                                    $result['text']  = 'Đăng ký thành công !';
                                } else {
                                    var_dump($db->insertDataError('data', $post));
                                }
                            }
                        } else {
                            $result['text'] = 'Mật khẩu nhập lại không chính xác !';
                        }
                    } else {
                        $result['text'] = 'Vui lòng nhập đầy đủ thông tin !';
                    }
                }
                break;
            case 'sort':
                if (count($_POST['data']) && isset($_POST['type'])) {
                    $type = $_POST['type'];
                    $sql  = '';
                    
                    switch ($type) {
                        case 'id':
                            $table = 'data';
                            $where = 'id';
                            break;
                        case 'idList':
                            $table = 'menu';
                            $where = 'id';
                            break;
                        
                        default:
                            $table = 'menu';
                            $where = 'name';
                            break;
                    }
                    foreach ($_POST['data'] as $key => $data) {
                        $sql .= 'UPDATE `' . dbPrefix . $table.'` SET `pos` = "'.$key.'" WHERE `'.$where.'` = "'.$data.'";';
                    }
                    
                    if ($db->execute_sql($sql)) {
                        $result['error'] = 0;
                        $result['text']  = 'Thay đổi thành công !';
                    } else {
                        $result['error'] = 1;
                        $result['text']  = $sql;
                    }
                    
                    
                }
                break;
            case 'delAll':
                if (isset($_POST['data']) && isset($_POST['table'])) {
                    $table = $_POST['table'];
                    $sql = '';
                    foreach ($_POST['data'] as $value) {
                        $sql .= 'DELETE FROM `' . dbPrefix . $table.'` WHERE `id` = '.$value.' ;';
                        delFile($db->alone_data_where($table,'id',$value));
                    }
                    if ($db->execute_sql($sql)) {
                        $result['error'] = 0;
                        $result['text']  = 'Thay đổi thành công !';
                    } else {
                        $result['error'] = 1;
                        $result['text']  = $sql;
                    }
                }
                break;
            case 'contact':
                $returnSend = false;
                $PF = $_POST;

                foreach ($PF as $data) {
                    if (strlen($data) > 5) {
                        $post[] = $data;
                    }
                }
                
                if(isset($_POST['recaptcha_challenge_field'])){
                    require_once('recaptchalib.php');
                    $resp = recaptcha_check_answer('6LdyfQsUAAAAAG3LgRecDNeT1mgmERMI51QwfxMz', $_SERVER['REMOTE_ADDR'], $_POST['recaptcha_challenge_field'], $_POST['recaptcha_response_field']);
                    
                    if (!$resp->is_valid) {
                        $result['text'] = 'Sai mã capcha!';
                    } else {
                        unset($PF['recaptcha_challenge_field']);
                        unset($PF['recaptcha_response_field']);
                        $returnSend = true;    
                    }
                }else{
                    if (count($post)) {
                        $returnSend = true;
                    } else {
                        $result['text'] = 'Vui lòng nhập đầy đủ nội dung !';
                    }
                }
                if($returnSend){
                    require 'phpmailer/class.phpmailer.php';
                    require 'phpmailer/PHPMailerAutoload.php';
                    
                    $gmail           = $db->alone_data_where('page', 'name', 'gmail');
                    $mail            = new PHPMailer;
                    $mail->CharSet   = 'UTF-8';
                    $mail->SMTPDebug = false; // Enable verbose debug output
                    $mail->isSMTP(); // Set mailer to use SMTP
                    $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                    $mail->SMTPAuth   = true; // Enable SMTP authentication
                    $mail->Username   = 'viettech.customer@gmail.com'; // SMTP username
                    $mail->Password   = '@viettechcorp'; // SMTP password
                    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
                    $mail->Port       = 587;
                    $mail->From       = ' viettech.customer@gmail.com';
                    $mail->FromName   = 'Hệ thống liên hệ'; //Title 
                    $mail->addAddress($gmail->content, $gmail->content);
                    $mail->isHTML(true);
                    
                    $mail->Subject = 'Liên hệ mới từ trang ' . $_SERVER['SERVER_NAME'] . ' - ' . timeNow(); // name subject
                    $content       = '';
                    foreach ($PF as $p) {
                        if ($p !== '') {
                            $content .= $p . '<br>';
                        }
                    }
                    $mail->Body = $content;
                    if (!$mail->send()) {
                        $result['text'] = $mail->ErrorInfo;
                    } else {
                        $menuContact = $db->alone_data_where('menu','file','contact');
                        if($menuContact){
                            $PF['menu'] = $menuContact->id;
                            $db->insertData('data',$PF);
                        }
                        $result['error'] = 0;
                        $result['text']  = 'Cám ơn đã gửi thông tin! Chúng tôi sẽ liên hệ lại trong thời gian sớm nhất!';
                    }
                }

                break;
        }
    }
}

if (count($result)) {
    echo json_encode($result);
}
?>
