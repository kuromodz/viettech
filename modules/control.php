<?php
	$menuPage = $db->alone_data_where('menu','file','home');
	if( isset($name) ) {
		$menuPage = $db->alone_data_where('menu','name',$name);
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
					$sql.= '"None");';
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
						switch ($table) {
							case 'menu':
								$allListMenuChild = array();
								$allListMenuChild = $db->allListMenuChild($value,$allListMenuChild);
								$allListDataChild = $db->allListDataChild($value);
								foreach($allListMenuChild as $menu){
									if($menu->id !== 0 && $menu->id !== '0' && $menu->id !== ''){
										$sql.='DELETE FROM `'.dbPrefix.'menu` WHERE `menu_parent` = "'.$menu->id.'"; ';
										$sql.='DELETE FROM `'.dbPrefix.'data` WHERE `menu` = "'.$menu->id.'"; ';
									}
								}
								$sql.='DELETE FROM `'.dbPrefix.'data` WHERE `data_parent` = -1 '; 
								foreach($allListDataChild as $data){
									$sql.=' OR `data_parent` = '.$data->id;
								}
								$sql.=' ; ';
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
			if(isset($id)){
				$_POST['id'] = $id;
				$_POST['table'] = 'data';
			}else{
				if(isset($idList)){
					$_POST['id'] = $idList;	
				}else{
					$_POST['id'] = $menuPage->id;
				}
				$_POST['table'] = 'menu';
			}
			$target_dir = '../upload/';
			switch ($file) {
				case 'lang':
					/*echo 'sdfsdf';*/
					break;
				case 'config':
					if(isset($_POST['listMenu']) && count($_POST['listMenu'])){
						$sql = '';
						foreach($_POST['listMenu'] as $key=>$menu){
							$menu['name'] = renameTitle($menu['title']);
							$db->updateRow('menu',$menu,'id',$key);
						}
					}
				break;

				case 'info':
					$check = $array = [];
					$dataPage = $db->list_data('page');
					foreach($dataPage as $data){
						$check[$data->name] = $data->content;
					}
					foreach($_POST as $key=>$post){
						if(isset($check[$key])){
							$array[$key] = $post;
						}
					}
					if(isset($_FILES)){
						foreach($_FILES as $key=>$f){
							if(($f['name']) !== '' ){
								$vlFile = explode('.',$f['name']);
								$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
								$array[$key] = $vl;
								move_uploaded_file($f['tmp_name'],$target_dir.$vl);
							}
						}
					}
					if($db->updateTable('page',$array,'content','name')){
						$success = 'Lưu thành công !';
					}
					break;
				case 'post':
				case 'design':
					$array = array();
					foreach ($_POST as $key=>$post) {
						$array[$key] = $post;
					}
					if(count($array)){
						if($db->insertData('data',$array)){
							$success = 'Gửi yêu cầu thành công !';
						}
					}
					break;
			}
			
			if(isset($_FILES['img'])){
				$f = $_FILES['img'];
				$vlFile = explode('.',$f['name']);
				if(count($vlFile) > 1){
					$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
					if(move_uploaded_file($f['tmp_name'], $target_dir.$vl)){
						$_POST['img'] = $vl;
					}
				}
			}

			if(isset($_FILES['file'])){
				$f = $_FILES['file'];
				$vlFile = explode('.',$f['name']);
				if(count($vlFile) > 1){
					$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
					if(move_uploaded_file($f['tmp_name'], $target_dir.$vl)){
						$_POST['file'] = $vl;
					}
				}
				
			}
			if(isset($_POST['table'])){
				if($db->updateRow($_POST['table'],$_POST,'id',$_POST['id'])){
					$success = 'Lưu thành công !';
				}
			}
			if(isset($_POST['listRow']) && isset($_POST['tableRow'])){
				if(is_array($_POST['tableRow'])){
					foreach($_POST['tableRow'] as $table=>$vl){
						if(isset($_POST['listRow'][$table])){
							foreach($_POST['listRow'][$table] as $key=>$data){
								if($db->updateRow($table,$data,'id',$key)){
									$success = 'Lưu thành công !';
								}
							}	
						}
					}
				}else{
					foreach($_POST['listRow'] as $key=>$data){
						if($db->updateRow($_POST['tableRow'],$data,'id',$key)){
							$success = 'Lưu thành công !';
						}
					}

				}
			}
			if(isset($_POST['listData'])){
				foreach($_POST['listData'] as $key=>$data){
					$db->updateRow('data',$data,'id',$key);
				}
			}
			if(isset($_FILES['listData'])){
				foreach($_FILES['listData']['name'] as $key=>$f){
					if($f !== '' ){
						$vlFile = explode('.',$f);
						if(count($vlFile) > 1){
							$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
							if(move_uploaded_file($_FILES['listData']['tmp_name'][$key], $target_dir.$vl)){
								$data['img'] = $vl;
								$db->updateRow('data',$data,'id',$key);
							}
						}
					}
				}
			}
			if(isset($_FILES['fileUpload'])){
				foreach($_FILES['fileUpload']['name'] as $key=>$vl){
					if($vl !== ''){
						$vlFile = explode('.',$vl);
						$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
						if(move_uploaded_file($_FILES['fileUpload']['tmp_name'][$key], $target_dir.$vl)){
							$data = array($key=>$vl);
							$db->updateRow('data',$data,'id',$_POST['id']);
						}
					}					
				}
			}
			if(isset($_POST['images'][0]) && count($_POST['images'])){
				foreach($_POST['images'] as $images){ 
					$type = $images;
					if(isset($_FILES[$type])){
						foreach($_FILES[$type]['name'] as $key=>$vl){
							if($vl !== ''){
								$vlFile = explode('.',$vl);
								$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
								if(move_uploaded_file($_FILES[$type]['tmp_name'][$key], $target_dir.$vl)){
									$db->insertImage($_POST['id'],$type,$vl);
								}
							}					
						}
					}
				}
			}
			if(isset($_FILES['slideData'])){
				foreach($_FILES['slideData']['name'] as $key=>$vl){
					if($vl !== ''){
						$vlFile = explode('.',$vl);
						$vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
						if(move_uploaded_file($_FILES['slideData']['tmp_name'][$key], $target_dir.$vl)){
							$db->insertImageData($_POST['id'],'slide',$vl);
						}
					}					
				}
			}
			if(isset($_FILES['fileData'])){
				foreach($_FILES['fileData']['name'] as $key=>$vl){
				  if($vl !== ''){
				    $vlFile = explode('.',$vl);
				    $vl = renameTitle($vlFile[0]).$timeNow.'.'.$vlFile[1];
				    if(move_uploaded_file($_FILES['fileData']['tmp_name'][$key], $target_dir.$vl)){
				      $db->insertImageData($_POST['id'],'file',$vl);
				    }
				  }         
				}
			}

		}
		
		$menuPage = $db->alone_data_where('menu','name',$name);

		if (isset($id)) {
			$page = $db->alone_data_where('data','id',$id);
			$update['view'] = $page->view + 1;
			$db->updateRow('data',$update,'id',$id);
			$idMenu = $page->menu;
		}else if(isset($idList)){
			$page = $db->alone_data_where('menu','id',$idList);
			$idMenu = $page->id;
		}else{
			$idMenu = $menuPage->id;
		}
	}

	$password = $db->alone_data_where('page','name','password');
	$password = $password->content;

	$listMenu = $db->list_data_where_where_order('menu','menu_parent',0,'hide',0,'pos','ASC');
	$listMenuAdmin = $db->list_data_where_order('menu','menu_parent',0,'pos','ASC');
	$allListMenu = $db->allListMenu();
	$listPage = $db->list_data('page');

	$listConfig = $db->list_data('config');
	$config = new stdClass();
	foreach ($listConfig as $vl) {
		$key = $vl->name;
		if(strlen($key)){
			$config->$key = $vl->value;
		}
	}
	$infoPage = new stdClass();
	foreach ($listPage as $vl) {
		$key = $vl->name;
		if(strlen($key)){
			$infoPage->$key = $vl->content;
		}
	}

	if(isset($menuPage)){
		$title = $infoPage->title;
		$image = $infoPage->logo;
		$des = $infoPage->des;
		$keywords = $infoPage->keywords;
		
		if(isset($page) || isset($id)){
			$title = $page->title;
			$image = $page->img;
			$des = $page->des;
			if(isset($page->keywords) && strlen($page->keywords) > 0){
				$keywords = $page->keywords;
			}
			if(isset($id) && $page->price !== '0' && $page->price !== ''){
				$des = $page->price.' - '.$des;
			}
		}else{
			if($menuPage->file !== 'home'){
				$title = $menuPage->title;
				$image = $menuPage->img;
				$des = $menuPage->des;
				$keywords = $menuPage->keywords;
			}
		}
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
	
	if(isset($menuPage)){
		$configMenu = $db->alone_data_where('file','file',$menuPage->file);
		if($configMenu){
			$listAdd = $db->list_data_where_where('config','type','add','file','idList');
			foreach($listAdd as $configAdd){
				$nameAdd = $configAdd->name;
				$configMenu->$nameAdd = $db->list_data_where_where_order('file_data','parent',$configMenu->id,'group',$nameAdd,'pos','ASC');
			}
		}
	}
?>