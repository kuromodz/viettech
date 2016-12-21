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
    $checkUser = false;
    if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
        $email    = $_COOKIE['email'];
        $password = $_COOKIE['password'];
        $user     = $db->login($email, $password);
    }
    if (isset($user) && checkCookieUser($user, $email, $password)) {
        $checkUser = true;
    }
    switch ($do) {
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
                }else if($db->alone_data_where('data','thumbnail',$img)){
                    $check = true;
                }else if($db->alone_data_where('menu','img',$img)){
                    $check = true;
                }else if($db->alone_data_where('menu','thumbnail',$img)){
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
        case 'design':
            $result['text'] = 'Chưa nhập đầy đủ nội dung !';
            foreach ($_POST as $key => $data) {
                if (strlen($data)) {
                    $post[$key] = $data;
                }
            }
            if (count($post) == count($_POST)) {
                if ($db->insertData('data', $post)) {
                    $result['error'] = 0;
                    $result['text']  = 'Gửi yêu cầu thành công !';
                }
            }
            break;
        
        case 'updateUser':
            if ($checkUser) {
                if ($db->updateRow('data', $_POST, 'id', $user->id)) {
                    $result['error'] = 0;
                }
            }
            break;
        case 'delDataUser':
            if ($checkUser) {
                if (isset($_POST['id'])) {
                    $id   = $_POST['id'];
                    $data = $db->alone_data_where('data', 'id', $id);
                    if ($data->data_parent == $user->id) {
                        if ($db->del('data', 'id', $id)) {
                            $result['error'] = 0;
                        }
                    }
                } else {
                    if ($db->del('data', 'data_parent', $user->id)) {
                        $result['error'] = 0;
                    }
                }
            }
            break;
        case 'login':
            if (count($_POST)) {
                $user = $db->login($_POST['email'], $_POST['password']);
                if ($user) {
                    foreach ($user as $key => $data) {
                        $result[$key] = $data;
                    }
                    $result['error'] = 0;
                    $result['text']  = 'Đăng nhập thành công !';
                } else {
                    $result['text'] = 'Sai Email hoặc mật khẩu !';
                }
            } else {
                $result['text'] = 'Vui lòng nhập đầy đủ thông tin !';
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
        case 'cart':
            $menuShop = $db->alone_data_where('menu', 'file', 'shop');
            if ($menuShop) {
                
                foreach ($_POST as $key => $data) {
                    if ($data !== '' && !is_array($data)) {
                        $post[$key] = $data;
                    }
                }
                if (count($post) > 3 && count($_POST['cart'])) {
                    $post['time'] = timeNow();
                    
                    if ($checkUser) {
                        $postUser                = $post;
                        $postUser['data_parent'] = $user->id;
                        
                        $postChild = array();
                        foreach ($_POST['cart'] as $id => $cartData) {
                            $postUser['cart']  = $id;
                            $postUser['count'] = $_POST['count'][$id];
                            $db->insertData('data', $postUser);
                        }
                    }
                    $post['menu'] = $menuShop->id;
                    if ($db->insertData('data', $post)) {
                        $dataParent = $db->getLastId();
                        $postChild  = array();
                        foreach ($_POST['cart'] as $id => $cartData) {
                            $postChild['data_parent'] = $dataParent;
                            $postChild['cart']        = $id;
                            $postChild['count']       = $_POST['count'][$id];
                            if ($db->insertData('data', $postChild)) {
                                $result['text']  = 'Cám ơn quý khách đã đặt hàng ! Chúng tôi sẽ liên hệ lại sớm nhất !';
                                $result['error'] = 0;
                            } else {
                                var_dump($db->insertDataError('data', $postChild));
                            }
                        }
                        
                    } else {
                        var_dump($db->insertDataError('data', $post));
                        $result['text'] = 'Action.php Error 111 !';
                    }
                } else {
                    $result['text'] = 'Quý khách vui lòng điền đầy đủ thông tin !';
                }
            } else {
                $result['text'] = 'Chưa cấu hình Giỏ hàng !';
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

if (count($result)) {
    echo json_encode($result);
}
?>
