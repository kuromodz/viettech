<?php
	$errorPage = false;
	$listPage = $db->list_data('page');
	$infoPage = new stdClass();
	foreach ($listPage as $vl) {
		$key = $vl->name;
		if(strlen($key)){
			$infoPage->$key = $vl->content;
		}
	}
	$author = false;
	if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){
		if($_COOKIE['password'] == $infoPage->password && $_COOKIE['user'] == 'admin'){
		  $author = 'admin';
		}else{
		  $author = $db->alone_data_where_where('data','password',$_COOKIE['password'],'name',$_COOKIE['user']);
		}
	}
	if( isset($name) ) {
		$menuPage = $db->alone_data_where('menu','name',$name);
		if($menuPage){
			$configMenu = $db->alone_data_where('file','file',$menuPage->file);
			if($configMenu){
				$listAdd = $db->list_data_where_where('config','type','add','file','idList');
				foreach($listAdd as $configAdd){
					$nameAdd = $configAdd->name;
					$configMenu->$nameAdd = $db->list_data_where_where_order('file_data','parent',$configMenu->id,'group',$nameAdd,'pos','ASC');
				}
			}
			$GLOBALS['configMenu'] = $configMenu;
			$file = $menuPage->file;
			if(isset($_POST['action'])){
				$table = $_POST['table'];
				$action = $_POST['action'];
				unset($_POST['table']);
				unset($_POST['action']);
				switch ($action) {
					case 'add':
						$sql = 'INSERT INTO `'.dbPrefix.$table.'`(';
							foreach($_POST as $key=>$get){
								$sql.= '`'.$key.'`,';
							}
						$sql.= '`title`) VALUES (';
							foreach($_POST as $key=>$get){
								$sql.= '"'.$get.'",';
							}
						$sql.= '"Đang cập nhật");';
						if($db->execute_sql($sql)){
							$success = 'Thêm thành công !';
						}else{
							echo $sql;
						}
						break;
					
					case 'del':
						$value = $_POST['value'];
						if($value !== '' && $value !== 0 && $value !== '0'){
							$sql = 'DELETE FROM `'.dbPrefix.$table.'` WHERE `id` = "'.$value.'"; ';
							$data = $db->alone_data_where($table,'id',$value);
							if(isset($data->img)) delImg($data->img);
							switch ($table) {
								case 'menu':
									if($value !== '0' && $value !== 0 && $value !== ''){
										$allListMenuChild = array();
										$allListMenuChild = $db->allListMenuChild($value,$allListMenuChild);
										$allListDataChild = $db->allListDataChild($value);
										foreach($allListMenuChild as $menu){
											if($menu->id !== 0 && $menu->menu_parent !== 0 && $menu->menu_parent !== '0' && $menu->menu_parent !== ''){
												$sql.='DELETE FROM `'.dbPrefix.'menu` WHERE `menu_parent` = "'.$menu->id.'"; ';
												$sql.='DELETE FROM `'.dbPrefix.'data` WHERE `menu` = "'.$menu->id.'"; ';
											}
										}
										$sql.='DELETE FROM `'.dbPrefix.'data` WHERE `data_parent` = -1 '; 
										foreach($allListDataChild as $data){
											$sql.=' OR `data_parent` = '.$data->id;
										}
										$sql.=' ; ';
									}
									break;
								case 'data':
									$sql.='DELETE FROM `'.dbPrefix.'data` WHERE `data_parent` = "'.$value.'"; ';
									break;
							}
						}
						if($db->execute_sql($sql)){
							$success = 'Xóa thành công !';
						}else{
							echo $sql;
						}
						break;
				}
			}else if(count($_POST)){
				$timeNow = '-'.renameTitle(timeNow());
				$target_dir = '../upload/';
				$_POST['id'] = (isset($idList))?$idList:$menuPage->id;
				$_POST['table'] = 'menu';
				if(isset($id)){
					$_POST['id'] = $id;
					$_POST['table'] = 'data';
				}
				if($file == 'info'){
					$array = [];
					$dataPage = $db->list_data('page');
				}
				if($file == 'user'){
					if(isset($_POST['type'])){
						$listMenuChecked = array();
						foreach($_POST['type'] as $key=>$type){
							if($type == 1){
								$listMenuChecked[] = $key;
							}
						}
						$_POST['type'] = implode(',', $listMenuChecked);
					}
				}
				if(isset($_FILES)){
					foreach ($_FILES as $keyAction => $arFile) {
						switch ($keyAction) {
							case 'slideData':
								foreach($arFile['name'] as $key=>$vl){
									$fileName = $arFile['name'][$key];
									$tmpName = $arFile['tmp_name'][$key];
									$uploadFile = uploadFile($fileName,$tmpName);
									if($uploadFile['success']){
										$post = array(
											'data_parent'=>$_POST['id'],
											'type'=>'slide',
											'img'=>$uploadFile['img'],
										);
										$db->insertImage('data',$post);
									}					
								}
								break;
							case 'listImageType':
								foreach($arFile['name'] as $type=>$listFile){
									foreach ($arFile['name'][$type] as $key => $vl) {
										$fileName = $arFile['name'][$type][$key];
										$tmpName = $arFile['tmp_name'][$type][$key];
										$uploadFile = uploadFile($fileName,$tmpName);
										if($uploadFile['success']){
											$post = array(
												'menu'=>$_POST['id'],
												'type'=>$type,
												'img'=>$uploadFile['img'],
											);
											$db->insertImage('data',$post);
										}
									}
								}
								break;
							case 'info':
								foreach ($arFile['name'] as $key => $vl) {
									$fileName = $arFile['name'][$key];
									$tmpName = $arFile['tmp_name'][$key];
									$uploadFile = uploadFile($fileName,$tmpName);
									if($uploadFile['success']){
										$data = $db->alone_data_where('page','name',$key);
										delFileCol($data,'content');
										$array[$key] = $uploadFile['img'];
									}
								}
								break;
							case 'importFile':
								if($arFile['tmp_name'] !== '' && $_POST['table'] == 'menu'){
									libxml_use_internal_errors(true);
									include 'phpexcel/Classes/PHPExcel.php';
									$inputFileName = $arFile['tmp_name'];
									$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
									$idMenu = $_POST['id'];

									if($objPHPExcel){
										$listCols = [];
										$listData = [];
										foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
										    $highestRow         = $worksheet->getHighestRow();
										    $highestColumn      = $worksheet->getHighestColumn();
										    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
										    for ($col = 0; $col < $highestColumnIndex; ++ $col) {
									            $cell = $worksheet->getCellByColumnAndRow($col, 2);
									            $listCols[] = $cell->getValue();
									        }
										    for ($row = 3; $row <= $highestRow; ++ $row) {
										    	$listItem = [];
										        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
										            $cell = $worksheet->getCellByColumnAndRow($col, $row);
										            $listItem[$listCols[$col]] = $cell->getValue();
										    	}
											    $listData[] = $listItem;
										    }
										}
										//insertdata to $_POST['id']
										foreach($listData as $data){
											$data['menu'] = $idMenu;
											if(!$data['title']) $data['title'] = 'Đang cập nhật !';
											if( isset($data['img']) && $data['img'] !== ''){
												$imgData = $data['img'];
												$mime_type = substr($imgData,11,strpos($imgData,';base64')-11);
												$fileName = $data['img'] = renameTitle($data['title']).$timeNow.'.'.$mime_type;
												$pathFile = $target_dir.$fileName;
												$thumbFile= $target_dir.'thumb-'.$fileName;
												$b64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imgData));
												if(file_put_contents($pathFile, $b64)){
													resizeImage($pathFile,$thumbFile,$configMenu->maxWidth,$configMenu->maxHeight);
												}
											}
											$db->insertData('data',$data);
										}
									}
								}
								break;

							default:
								$uploadFile = uploadFile($arFile['name'],$arFile['tmp_name'],$arFile['type']);
								if($uploadFile['success']){
									$data = $db->alone_data_where($_POST['table'],'id',$_POST['id']);
									delImg($data->$keyAction);
									$_POST[$keyAction] = $uploadFile['img'];
								}
								break;
						}
					}
				}
				if(isset($dataPage)){
					foreach($dataPage as $data){
						if(isset($_POST[$data->name])) $array[$data->name] = $_POST[$data->name];
					}
					if($db->updateTable('page',$array,'content','name')){
						$success = 'Lưu thành công !';
					}

				}
				if(isset($_POST['listRow'])){
					$listRow = $_POST['listRow'];
					foreach ($listRow as $table => $row) {
						foreach ($row as $rowId => $data ) {
							if(isset($data['title']) && (!isset($data['name']) || $data['name'] == '' )){
								$data['name'] = renameTitle($data['title']);
							}
							$db->updateRow($table,$data,'id',$rowId);
						}
					}
				}
				if(isset($_POST['table'])){
					$table = $_POST['table'];
					$value = $_POST['id'];
					if($db->updateRow($table,$_POST,'id',$value)){
						$success = 'Lưu thành công !';
					}
				}
				clearCache();
			}
			
			$menuPage = $db->alone_data_where('menu','name',$name);
			$idMenu = $menuPage->id;

			if (isset($id)) {
				$page = $db->alone_data_where('data','id',$id);
				if($page){
					$update["view"] = $page->view + 1;
					$db->updateRow("data",$update,'id',$id);
					$idMenu = $page->menu;
					if($page->data_parent !== '0') $errorPage = true;
				}else{
					$errorPage = true;
				}
			}else if(isset($idList)){
				$page = $db->alone_data_where('menu','id',$idList);
				if($page){
					$idMenu = $page->id;
					if(!($page->menu_parent !== '0')) $errorPage = true;
				}else{
					$errorPage = true;
				}
			}
		}
	}

	$password = $db->alone_data_where('page','name','password');
	$password = $password->content;

	$listMenu = $db->list_data_where_where_order('menu','menu_parent',0,'hide',0,'pos','ASC');
	$listMenuAdmin = $db->list_data_where_order('menu','menu_parent',0,'pos','ASC');
	$allListMenu = $db->allListMenu();
	$listConfig = $db->list_data('config');
	$config = new stdClass();
	foreach ($listConfig as $vl) {
		$key = $vl->name;
		if(strlen($key)){
			$config->$key = $vl->value;
		}
	}

	$title = $infoPage->title;
	$image = $infoPage->logo;
	$des = $infoPage->des;
	$keywords = $infoPage->keywords;
	
	if( (isset($page) || isset($id)) && $page ){
		$title = $page->title;
		$image = $page->img;
		if($des == '') $des = $page->des;
		if(isset($page->keywords) && strlen($page->keywords) > 0) $keywords = $page->keywords;
		if(isset($id) && $page->price !== '0' && $page->price !== '') $des = $page->price.' - '.$des;
	}else if( (isset($menuPage)) && ($menuPage) && ($menuPage->file !== 'home')){
		$title = $menuPage->title;
		$image = $menuPage->img;
		if($des == '') $des = $menuPage->des;
		$keywords = $menuPage->keywords;
	}
	if(isset($name) && $menuPage->file !== 'search'){
		if(!checkObject($listMenu,'name',$name)) $errorPage = true;
	}
	foreach($allListMenu as $menu){
		$nameMenu = 'menu'.ucfirst($menu->file);
		$$nameMenu = $db->alone_data_where('menu','file',$menu->file);
	}
	$listImageHome = $db->list_data_where_order('file_data','type','listImg','pos','ASC');
	if(count($listImageHome)){
		$list = new stdClass;
		foreach($listImageHome as $listImage){
			if($listImage->name){
				$listName = $listImage->name;
				$list->$listName = $db->list_data_where_where_order('data','menu',$menuHome->id,'type',$listName,'pos','ASC');
			}
		}
	}
?>