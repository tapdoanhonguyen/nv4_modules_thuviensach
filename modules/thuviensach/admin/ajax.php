<?php
$mod = $nv_Request->get_string('mod', 'post,get', '');

if ( $mod == 'get_sach_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_sach_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả sách'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_sach']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_userid_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_user_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả người đánh giá'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['userid'], 'text'=>$result['last_name'].' '.$result['first_name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if($mod=='change_sach_duyet_khong_duyet'){
	$muonsach_id = $nv_Request->get_int( 'muonsach_id', 'post,get', 0);
	$status = $nv_Request->get_int( 'status', 'post,get', 0);
	if($status==3){
		$thuvien_id=$db->query('SELECT thuvien_id FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach where id='.$muonsach_id)->fetchColumn();
		$list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach where muonsach_id='.$muonsach_id)->fetchAll();
		foreach ($list_sach as $key => $value) {
			$number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id'])->fetchColumn();
			$number=$number+1;
			$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET number='.$number.' where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id']);
		}
	}
	$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_muonsach SET status='.$status.', time_tra='.NV_CURRENTTIME.',user_tra='.$admin_info['userid'].' where id='.$muonsach_id);
	print_r(json_encode(array('status'=>'OK','mess'=>'Xác nhận thành công')));die;
}
if($mod=='tra_sach'){
	$muonsach_id = $nv_Request->get_int( 'muonsach_id', 'post,get', 0);
	$thuvien_id=$db->query('SELECT thuvien_id FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach where id='.$muonsach_id)->fetchColumn();
	$list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach where muonsach_id='.$muonsach_id)->fetchAll();
	foreach ($list_sach as $key => $value) {
		$number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id'])->fetchColumn();
		$number=$number+1;
		$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET number='.$number.' where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id']);
	}
	$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_muonsach SET status=2, time_edit='.NV_CURRENTTIME.',user_edit='.$admin_info['userid'].' where id='.$muonsach_id);
	print_r(json_encode(array('status'=>'OK','mess'=>'Xác nhận thành công')));die;
}
if($mod=='show_muonsach'){
	$muonsach_id = $nv_Request->get_int( 'muonsach_id', 'post,get', 0);
	$info=get_info_muonsach($muonsach_id);
	$info['thuvien_id']=get_info_thuvien($info['thuvien_id'])['name_thuvien'];
	$list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach where muonsach_id='.$muonsach_id)->fetchAll();
	$xtpl = new XTemplate('show_muonsach.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	$xtpl->assign('info', $info);
	$stt=1;
	foreach ($list_sach as $key => $value) {
		$value['stt']=$stt++;
		$value['info_sach']=get_info_sach($value['sach_id']);
		$value['info_sach']['tacgia_name']=get_info_tacgia($value['info_sach']['tacgia_id'])['name_tacgia'];
		$value['info_sach']['nhaxuatban_name']=get_info_nhaxuatban($value['info_sach']['nhaxuatban_id'])['name'];
		if (!empty($value['info_sach']['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $value['info_sach']['image'])) {
			$value['info_sach']['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $value['info_sach']['image'];
		}else{
			$value['info_sach']['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
		}
		$xtpl->assign('LOOP', $value);
		$xtpl->parse('main.sach');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r(json_encode(array('status'=>'OK','html'=>$contents)));die;
}
if($mod=='show_number_ajax'){
	$sach_id = $nv_Request->get_string( 'sach_id', 'post,get', 0);
	$thuvien_id = $nv_Request->get_string( 'thuvien_id', 'post,get', 0);
	$name_sach=get_info_sach($sach_id)['name_sach'];
	$where = '';
	$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=show_number_ajax&sach_id='.$sach_id;
	if($thuvien_id>0){
		$where .=' AND t1.id='.$thuvien_id;
		$base_url .='&thuvien_id='.$thuvien_id;
	}
	$per_page = 20;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . $db_config['prefix'] . '_' . $module_data . '_thuvien t1')
	->where('1=1'.$where);

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('id,name_thuvien')
	->order('(SELECT number from ' . $db_config['prefix'] . '_' . $module_data . '_soluongsach where sach_id='.$sach_id.' and thuvien_id=t1.id) DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();

	$xtpl = new XTemplate('soluongsach.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	$xtpl->assign('name_sach', $name_sach);
	$xtpl->assign('sach_id', $sach_id);
	$xtpl->assign('thuvien_id', $thuvien_id);
	if($thuvien_id>0){
		$xtpl->assign('thuvien_id_name', get_info_thuvien($thuvien_id)['name_thuvien']);
	}else{
		$xtpl->assign('thuvien_id_name', 'Tất cả thư viện');
	}
	$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'body_number_sach');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
	while ($view = $sth->fetch()) {
		$view['stt'] = $number++;
		$view['number']=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$sach_id.' and thuvien_id='.$view['id'])->fetchColumn();
		$view['number']=number_format($view['number']);
		$xtpl->assign('VIEW', $view);
		$xtpl->parse('main.loop');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	echo $contents;die;
}
if($mod=='show_number'){
	$sach_id = $nv_Request->get_string( 'sach_id', 'post,get', 0);
	$thuvien_id = $nv_Request->get_string( 'thuvien_id', 'post,get', 0);
	$name_sach=get_info_sach($sach_id)['name_sach'];
	$where = '';
	$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op.'&mod=show_number_ajax&sach_id='.$sach_id;
	if($thuvien_id>0){
		$where .=' AND t1.id='.$thuvien_id;
		$base_url .='&thuvien_id='.$thuvien_id;
	}
	$per_page = 20;
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . $db_config['prefix'] . '_' . $module_data . '_thuvien t1')
	->where('1=1'.$where);

	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('id,name_thuvien')
	->order('(SELECT number from ' . $db_config['prefix'] . '_' . $module_data . '_soluongsach where sach_id='.$sach_id.' and thuvien_id=t1.id) DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();

	$xtpl = new XTemplate('soluongsach.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign('LANG', $lang_module);
	$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
	$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
	$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('MODULE_NAME', $module_name);
	$xtpl->assign('MODULE_UPLOAD', $module_upload);
	$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
	$xtpl->assign('OP', $op);
	$xtpl->assign('name_sach', $name_sach);
	$xtpl->assign('sach_id', $sach_id);
	$xtpl->assign('thuvien_id', $thuvien_id);
	if($thuvien_id>0){
		$xtpl->assign('thuvien_id_name', get_info_thuvien($thuvien_id)['name_thuvien']);
	}else{
		$xtpl->assign('thuvien_id_name', 'Tất cả thư viện');
	}
	$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page, 'true', 'false', 'nv_urldecode_ajax', 'body_number_sach');
	if (!empty($generate_page)) {
		$xtpl->assign('NV_GENERATE_PAGE', $generate_page);
		$xtpl->parse('main.generate_page');
	}
	$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
	while ($view = $sth->fetch()) {
		$view['stt'] = $number++;
		$view['number']=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$sach_id.' and thuvien_id='.$view['id'])->fetchColumn();
		$view['number']=number_format($view['number']);
		$xtpl->assign('VIEW', $view);
		$xtpl->parse('main.loop');
	}
	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	print_r(json_encode(array('status'=>'OK','html'=>$contents)));die;
}
if($mod=='duyet_sach'){
	$id = $nv_Request->get_string( 'id', 'post,get', 0);
	$info=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_sach_request where id='.$id)->fetch();
	$row['nhaxuatban_id'] = $info['nhaxuatban_id'];
	$row['tacgia_id'] = $info['tacgia_id'];
	$row['danhmuc_id'] = $info['danhmuc_id'];
	$row['name_sach'] = $info['name_sach'];
	$row['alias'] = change_alias($row['name_sach']);
	$row['image'] = $info['image'];
	$row['price'] = $info['price'];
	$row['description'] = $info['description'];
	$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($row['alias']))->fetchColumn();
	if($check==0){
		$row['time_add'] = NV_CURRENTTIME ;
		$row['user_add'] = $admin_info['userid'];
		$row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_sach"')->fetchColumn();
		$row['ma_sach'] = sprintf($config_setting['raw_sach'],$row['id_next']);
		$stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_sach (ma_sach,nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add) VALUES (:ma_sach,:nhaxuatban_id, :tacgia_id, :danhmuc_id, :name_sach, :alias, :image, :price, :description, :time_add, :user_add)');

		$stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
		$stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
		$stmt->bindParam(':ma_sach', $row['ma_sach'], PDO::PARAM_STR);
		$stmt->bindParam(':nhaxuatban_id', $row['nhaxuatban_id'], PDO::PARAM_INT);
		$stmt->bindParam(':tacgia_id', $row['tacgia_id'], PDO::PARAM_INT);
		$stmt->bindParam(':danhmuc_id', $row['danhmuc_id'], PDO::PARAM_INT);
		$stmt->bindParam(':name_sach', $row['name_sach'], PDO::PARAM_STR);
		$stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
		$stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
		$stmt->bindParam(':price', $row['price'], PDO::PARAM_STR);
		$stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));

		$exc = $stmt->execute();
		if ($exc) {
			$nv_Cache->delMod($module_name);
			nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Sach', ' ', $admin_info['userid']);
		}
	}
	$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_sach_request SET status=1, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' where id='.$id);
	print_r(json_encode(array('status'=>'OK','mess'=>'Duyệt thành công')));die;
}

if ( $mod == 'get_thuvien_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_thuvien_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả thư viện'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_thuvien']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_user_thuvien' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$id = $nv_Request->get_string( 'id', 'post,get', 0);
	$list_location = get_user_thuvien_select2( $q, $id);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['userid'], 'text'=>$result['last_name'].' '.$result['first_name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_user' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_user_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['userid'], 'text'=>$result['first_name'].' '.$result['last_name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_user_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_user_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['userid'], 'text'=>$result['first_name'].' '.$result['last_name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}



if ( $mod == 'get_nhaxuatban' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_nhaxuatban_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_province_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_province_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả tỉnh thành'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['provinceid'], 'text'=>$result['title']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_district_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$provinceid = $nv_Request->get_string( 'provinceid', 'post,get', 0);
	$list_location = get_district_select2($q,$provinceid);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả quận huyện'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['districtid'], 'text'=>$result['title']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}


if ( $mod == 'get_province' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_province_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['provinceid'], 'text'=>$result['title']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_district' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$provinceid = $nv_Request->get_string( 'provinceid', 'post,get', 0);
	$list_location = get_district_select2($q,$provinceid);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['districtid'], 'text'=>$result['title']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_nhaxuatban_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_nhaxuatban_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả nhà xuất bản'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

if ( $mod == 'get_tacgia' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tacgia_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tacgia']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if ( $mod == 'get_tinh_thanh' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_province_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['provinceid'], 'text'=>$result['title']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}


if ( $mod == 'get_tacgia_search' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_tacgia_select2( $q);
	if(count($list_location)>0){
		$json[] = ['id'=>0, 'text'=>'Tất cả tác giả'];
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_tacgia']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}

