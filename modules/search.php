<?php
	$query = $_GET;
	$checkS = $checkMenu = false;
	$allListData = $listData = $params = null;
	unset($query["name"]);
	$sql = "SELECT * FROM `".dbPrefix."data` WHERE 1 ";
	if(isset($query["title"]) && strlen($query["title"]) > 1){
		$qTitle = $query["title"];
		/*$qTitle = str_replace('-', ' ', renameTitle($qTitle));*/
		$sql .= "AND ( `title` LIKE '%".$qTitle."%' OR `des` LIKE '%".$qTitle."%' )";
		$checkS = true;
		$params = "title=".$qTitle;
		unset($query["title"]);
	}
	if(count($query)){
		$listCols = $db->listCols('data');
		foreach($listCols as $col){
			foreach($query as $key=>$q){;
				if($key == $col->Field && $q !== '' && $q !== '0'){
					switch ($col->Field) {
						case 'province':
						case 'district':
							if($q !== '00' && $q !== '000'){
								$sql.= " AND `".$col->Field."` = '".$q."' ";
							}
							break;
						case 'price':
							$bw = explode('-', $q);
							if(count($bw) == 2){
								$sql.=" AND `price` > ".$bw[0]."000000 AND `price` < ".$bw[1]."000000 ";
							}else{
								$sql.=" AND `price` ".$q."000000 ";
							}
							break;
						case 'count':
							if($q == '1'){
								$sql.=" AND (`count` <> '' OR `count` <> '0' ) ";
							}else{
								$sql.=" AND (`count` = '' OR `count` = '0' ) ";
							}
							break;
						case 'tag':
							$sql.= " AND `".$col->Field."` LIKE '%".$q."%' ";
							break;

						default:
							$sql.= " AND `".$col->Field."` = '".$q."' ";
							break;
					}
					if($key == 'menu'){
						$checkMenu = true;
					}
					$checkS = true;
					$params.= "&".$key."=".$q;
				}

			}
		}
	}
	if($checkS){
		/*if(!$checkMenu){
			foreach($allListMenu as $menu){
				$sql.= " AND `menu` <> '".$menu->id."' ";
			}
		}*/
		$sql .= " AND `data_parent` = '0' ";
		$allListData = $db->loadallrows_sql($sql);
		if(count($allListData)){
			$sql.= " LIMIT ".$start.",".$config->limit;
			$listData = $db->loadallrows_sql($sql);
		}
	}
?>