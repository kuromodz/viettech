<?php
session_start();
include_once('../config.php');
include_once('sql.php');
$db     = new DB();
$result = array(
    'error' => 1
);
if (isset($_GET['do'])) {
    $do = $_GET['do'];
    switch ($do) {
        case 'getListDistrict':
            if(isset($_GET['province'])){
                $listDistrict =$db->list_data_where('district','province',$_GET['province']);
                foreach($listDistrict as $data){
                    ?>
                    <option value="<?=$data->id?>"><?=$data->name?></option>
                    <?php
                }
                die();
            }
        break;
    }
}

if (count($result)) {
    echo json_encode($result);
}
?>
