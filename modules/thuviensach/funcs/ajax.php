<?php

$mod = $nv_Request->get_string('mod', 'post,get', '');
if($mod=='load_comment'){
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	$per_page = $nv_Request->get_int( 'per_page', 'post,get', 0);
	$page = $nv_Request->get_int('page', 'post,get', 1);
	$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_comment&sach_id='.$sach_id.'&per_page='.$per_page;
	$db->sqlreset()
	->select('COUNT(*)')
	->from('' . $db_config['prefix'] . '_' . $module_data . '_comment')
	->where('sach_id='.$sach_id.' and status=1');
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$num_items = $sth->fetchColumn();

	$db->select('*')
	->order('id DESC')
	->limit($per_page)
	->offset(($page - 1) * $per_page);
	$sth = $db->prepare($db->sql());

	$sth->execute();
	$contents = nv_theme_thuviensach_detail_ajax($base_url,$num_items,$per_page,$page,$sth);
	echo $contents;die;
}
if($mod=='save_comment'){
	$rate = $nv_Request->get_int( 'rate', 'post,get', 0);
	$content = $nv_Request->get_string( 'content', 'post,get', '');
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	if (!defined('NV_IS_USER')) {
		$page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
		$page_url .= '&nv_redirect=' . nv_redirect_encrypt(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main');
		print_r(json_encode(array('status'=>'ERROR_LOGIN','mess'=>'Vui lòng đăng nhập trước khi sử dụng chức năng này','link'=>nv_url_rewrite($page_url,true))));die;
	}else{
		$db->query('INSERT INTO '.$db_config['prefix'] . '_' . $module_data . '_comment (userid,rate,content,time_add,sach_id,status) VALUES ('.$user_info['userid'].','.$rate.','.$db->quote($content).','.NV_CURRENTTIME.','.$sach_id.',1)');
	}
	print_r(json_encode(array('status'=>'OK','mess'=>'Thêm đánh giá thành công')));die;
}
if($mod=='remove_yeuthich'){
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	if (!defined('NV_IS_USER')) {
		$page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
		$page_url .= '&nv_redirect=' . nv_redirect_encrypt(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=agency');
		print_r(json_encode(array('status'=>'ERROR_LOGIN','mess'=>'Vui lòng đăng nhập trước khi sử dụng chức năng này','link'=>nv_url_rewrite($page_url,true))));die;
	}else{
		$db->query('DELETE FROM '.$db_config['prefix'].'_'.$module_data.'_yeu_thich where sach_id='.$sach_id.' and userid='.$user_info['userid']);
		print_r(json_encode(array('status'=>'OK','mess'=>'Xóa thành công')));die;
	}
}
if($mod=='them_yeuthich'){
	$sach_id = $nv_Request->get_int( 'id_sach', 'post,get', 0);
	
	if (!defined('NV_IS_USER')) {
		$page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
		$page_url .= '&nv_redirect=' . nv_redirect_encrypt(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=agency');
		$json[] = ['status'=>'KO', 'mess'=>'Vui lòng đăng nhập trước khi sử dụng chức năng này!'];
	}else{
		$check_yeu_thich = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_yeu_thich WHERE sach_id = ' . $sach_id . ' AND userid = ' . $user_info['userid'])->fetchColumn();

		if($check_yeu_thich == 0){
			$db->query('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_yeu_thich (sach_id,userid) VALUES (' . $sach_id . ',' . $user_info['userid'] . ')');
			$json[] = ['status'=>'OK', 'mess'=>'Thêm vào yêu thích thành công!'];

		}else{
			$json[] = ['status'=>'KO', 'mess'=>'Sản phẩm này đã được thêm vào yêu thích!'];
			
		}
		
		
	}
	print_r(json_encode($json[0]));die();
}
if($mod=='bo_yeuthich'){
	$sach_id = $nv_Request->get_int( 'id_sach', 'post,get', 0);
	if (!defined('NV_IS_USER')) {
		$page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
		$page_url .= '&nv_redirect=' . nv_redirect_encrypt(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=agency');
		$json[] = ['status'=>'KO', 'mess'=>'Vui lòng đăng nhập trước khi sử dụng chức năng này!'];
		
	}else{
		$db->query('DELETE FROM '.$db_config['prefix'].'_'.$module_data.'_yeu_thich where sach_id='.$sach_id.' and userid='.$user_info['userid']);
		$json[] = ['status'=>'OK', 'mess'=>'Xóa khỏi yêu thích thành công!'];
	}
	print_r(json_encode($json[0]));die();
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
	
	if($status == 1){
		$list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach where muonsach_id='.$muonsach_id)->fetchAll();

		$message = 'Bạn đã đăng ký mượn thành công:';
		foreach ($list_sach as $key => $value) {
			$info_thu_vien = $db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where id IN(SELECT thuvien_id FROM ' . $db_config['prefix'].'_'.$module_data.'_muonsach WHERE id = ' . $value['muonsach_id'] . ')')->fetch();
			
			$info_sach = $db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_sach where id='.$value['sach_id'])->fetch();

			$message .= '<div style="padding: 10px 0px;"><span>' . ($key+1) . '. </span>Tên sách:'  . $info_sach['name_sach'] . '</div>';
			if(count($list_sach) == ($key + 1)){

				$message .= 'Vui lòng đến địa chỉ:' . $info_thu_vien['dia_chi'] . ',' . get_info_province($info_thu_vien['provinceid'])['title'] . ',' . get_info_district($info_thu_vien['districtid'])['title'] . ' để mượn sách';
			}
			
		}
		$message .= "";


		$xtpl = new XTemplate('ajax_template.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);

		$xtpl->parse('main');
		$contents = $xtpl->text('main');

		
		$thong_tin_muon_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach where id='.$muonsach_id)->fetch();

		$subject = 'Thông báo mượn sách thành công';
		//$thong_tin_muon_sach['email'] = 'bnhthach@gmail.com';
		
		$send = nv_sendmail([$global_config['site_name'], $global_config['site_email']], $thong_tin_muon_sach['email'], $subject, $message);
	}
	$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_muonsach SET status='.$status.', time_edit='.NV_CURRENTTIME.',user_edit='.$user_info['userid'].' where id='.$muonsach_id);
	print_r(json_encode(array('status'=>'OK','mess'=>'Chuyển thành công')));die;
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
	$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_muonsach SET status=2, time_tra='.NV_CURRENTTIME.',user_tra='.$user_info['userid'].' where id='.$muonsach_id);
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
	$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
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
if($mod=='save_muon_sach'){
	$thuvien_id = $nv_Request->get_int( 'thuvien_id', 'post,get', 0);
	$userid = $nv_Request->get_int( 'userid', 'post,get', 0);
	$name = $nv_Request->get_string( 'name', 'post,get', '');
	$phone = $nv_Request->get_string( 'phone', 'post,get', '');
	$email = $nv_Request->get_string( 'email', 'post,get', '');
	$cmnd = $nv_Request->get_string( 'cmnd', 'post,get', '');
	if($name==''){
		print_r(json_encode(array('status'=>'ERROR','mess'=>'Vui lòng nhập họ và tên' , 'input'=>'name')));die;
	}else if($phone==''){
		print_r(json_encode(array('status'=>'ERROR','mess'=>'Vui lòng nhập số điện thoại' , 'input'=>'phone')));die;
	}else if($email==''){
		print_r(json_encode(array('status'=>'ERROR','mess'=>'Vui lòng nhập email' , 'input'=>'email')));die;
	}else if($cmnd==''){
		print_r(json_encode(array('status'=>'ERROR','mess'=>'Vui lòng nhập CMND' , 'input'=>'cmnd')));die;
	}else{
		$check_muonsach=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach where userid='.$userid.' and status<2')->fetchColumn();
		if($check_muonsach>0){
			print_r(json_encode(array('status'=>'ERROR_MUONSACH','mess'=>'Hiện bạn đang mượn sách không thể mượn thêm')));die;
		}else{
			$check=0;
			$error=array();
			foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
				if($value['status']>0){
					$number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id'])->fetchColumn();
					if($number<1){
						$check=1;
						$error[]='Số lượng sách thuộc sách '.get_info_sach($value['sach_id'])['name_sach'].' hiện không còn đủ để mượn';
					}
				}
			}
			if($check==0){
				$row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_muonsach"')->fetchColumn();
				$ma_muonsach = sprintf($config_setting['raw_muonsach'],$row['id_next']);
				$row['time_add'] = NV_CURRENTTIME;
				$stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_muonsach (ma_muonsach, thuvien_id, name, phone,email,cmnd,time_add,status,userid) VALUES (:ma_muonsach, :thuvien_id, :name,:phone,:email,:cmnd,:time_add,0,'.$userid.')');
				$stmt->bindParam(':ma_muonsach', $ma_muonsach, PDO::PARAM_STR);
				$stmt->bindParam(':thuvien_id', $thuvien_id, PDO::PARAM_INT);
				$stmt->bindValue(':name', $name, PDO::PARAM_STR);
				$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':cmnd', $cmnd, PDO::PARAM_STR);
				$stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
				$exc = $stmt->execute();
				if($exc){
					nv_insert_logs(NV_LANG_DATA, $module_name, 'Thêm mượn sách', ' ', 0);
					$row['id']=$row['id_next'];
					$cart_sach=array();
					foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
						if($value['status']==1){
							$db->query('INSERT INTO '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach (muonsach_id,sach_id) VALUES ('.$row['id'].','.$value['sach_id'].')');
							$number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id'])->fetchColumn();

							$number=$number-1;
							$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET number='.$number.' where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id']);
						}else{
							$cart_sach[]=$value;
						}
					}
					if(count($cart_sach)==0){
						$_SESSION['cart_sach']=array();
					}else{
						$_SESSION['cart_sach']['sach']=$cart_sach;
					}
				}
				print_r(json_encode(array('status'=>'OK','mess'=>'Gửi yêu cầu mượn sách thành công','link'=>nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=main',true))));die;
			}else{
				$mess=implode('<br>', $error);
				print_r(json_encode(array('status'=>'ERROR_MUONSACH','mess'=>$mess)));die;
			}
		}
	}
}
if($mod=='change_form_data'){
	$check=0;
	foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
		if($value['status']==1){
			$check=$check+1;
		}
	}
	if($check>0){
		print_r(json_encode(array('status'=>'OK','link'=>nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=muonsach',true))));die;
	}else{
		print_r(json_encode(array('status'=>'ERROR','mess'=>'Vui lòng chọn ít nhất 1 sách muốn mượn')));die;
	}
}
if($mod=='delete_cart'){
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	$sach_new=array();
	foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
		if($value['sach_id']!=$sach_id){
			$sach_new[]=$value;
		}
	}
	if(count($sach_new)>0){
		$_SESSION['cart_sach']['sach']=$sach_new;
	}else{
		$_SESSION['cart_sach']=array();
	}
	print_r(json_encode(array('status'=>'OK','mess'=>'Xóa thành công')));die;
}
if($mod=='update_muon_sach'){
	$check = $nv_Request->get_int( 'check', 'post,get', 0);
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	$sach_new=array();
	foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
		if($value['sach_id']==$sach_id){
			$value['status']=$check;
		}
		$sach_new[]=$value;
	}
	$_SESSION['cart_sach']['sach']=$sach_new;
	$number_sach=0;
	foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
		if($value['status']==1){
			$number_sach=$number_sach+1;
		}
	}
	print_r(json_encode(array('status'=>'OK','mess'=>'Cập nhật thành công','number_sach'=>$number_sach)));die;
}
if($mod=='update_muon_sach_full'){
	$check = $nv_Request->get_int( 'check', 'post,get', 0);
	$sach_new=array();
	foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
		$value['status']=$check;
		$sach_new[]=$value;
	}
	$_SESSION['cart_sach']['sach']=$sach_new;
	print_r(json_encode(array('status'=>'OK','mess'=>'Cập nhật thành công')));die;
}
if($mod=='muonsach'){
	$thuvien_id = $nv_Request->get_string( 'thuvien_id', 'post,get', 0);
	$sach_id = $nv_Request->get_string( 'sach_id', 'post,get', 0);
	if(count($_SESSION['cart_sach'])==0){
		$_SESSION['cart_sach']['thuvien_id']=$thuvien_id;
		$_SESSION['cart_sach']['sach'][]=array('sach_id'=>$sach_id,'status'=>1);
		print_r(json_encode(array('status'=>'OK','mess'=>'Thêm vào giỏ hàng thành công','link'=>nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cart',true))));die;
	}else{
		if($_SESSION['cart_sach']['thuvien_id']==$thuvien_id){
			$check=0;
			foreach ($_SESSION['cart_sach']['sach'] as $key => $value) {
				if($value['sach_id']==$sach_id){
					$check=1;
				}
			}
			if($check==0){
				$_SESSION['cart_sach']['sach'][]=array('sach_id'=>$sach_id,'status'=>1);
				print_r(json_encode(array('status'=>'OK','mess'=>'Thêm vào giỏ hàng thành công','link'=>nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cart',true))));die;
			}else{
				print_r(json_encode(array('status'=>'ERROR_GIO_HANG','mess'=>'Đã thêm sách này vào giỏ hàng rồi.','link'=>nv_url_rewrite(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cart',true))));die;
			}
		}else{
			print_r(json_encode(array('status'=>'ERROR','mess'=>'Không thể mượn cùng lúc 2 cuốn khác nhau của 2 thư viện khác nhau')));die;
		}
	}
}
if($mod=='change_thuvien'){
	$thuvien_id = $nv_Request->get_string( 'thuvien_id', 'post,get', 0);
	$sach_id = $nv_Request->get_string( 'sach_id', 'post,get', 0);
	$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$sach_id)->fetchColumn();
	if($check==0){
		$number=0;
	}else{
		$number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$sach_id)->fetchColumn();
	}
	print_r(json_encode(array('status'=>'OK','number_sach'=>$number)));die;
}
if ( $mod == 'get_thuvien' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$list_location = get_thuvien_select2( $q);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['id'], 'text'=>$result['name_thuvien']];
		}
	}
	print_r( json_encode( $json ) );
	die();
}
if($mod=='change_note_sach'){
	$note = $nv_Request->get_string( 'note', 'post,get', '');
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	$thuvien_id = $nv_Request->get_int( 'thuvien_id', 'post,get', 0);
	$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$sach_id.' and thuvien_id='.$thuvien_id)->fetchColumn();
	if($check==0){
		$db->query('INSERT INTO '.$db_config['prefix'].'_'.$module_data.'_soluongsach (sach_id,thuvien_id,note) VALUES ('.$sach_id.','.$thuvien_id.','.$db->quote($note).')');
	}else{
		$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET note='.$db->quote($note).' where sach_id='.$sach_id.' and thuvien_id='.$thuvien_id);
	}
	print_r(json_encode(array('status'=>'OK','mess'=>'Thêm và cập nhật thành công')));die;
}

if($mod=='change_number_sach'){
	$number = $nv_Request->get_int( 'number', 'post,get', 0);
	$sach_id = $nv_Request->get_int( 'sach_id', 'post,get', 0);
	$thuvien_id = $nv_Request->get_int( 'thuvien_id', 'post,get', 0);
	$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$sach_id.' and thuvien_id='.$thuvien_id)->fetchColumn();
	if($check==0){
		$db->query('INSERT INTO '.$db_config['prefix'].'_'.$module_data.'_soluongsach (sach_id,thuvien_id,number) VALUES ('.$sach_id.','.$thuvien_id.','.$number.')');
	}else{
		$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET number='.$number.' where sach_id='.$sach_id.' and thuvien_id='.$thuvien_id);
	}
	print_r(json_encode(array('status'=>'OK','mess'=>'Thêm và cập nhật thành công')));die;
}
if ( $mod == 'get_user_thuvien' ) {
	$q = $nv_Request->get_string( 'q', 'post,get', '' );
	$id = $nv_Request->get_string( 'id', 'post,get', 0);

	$list_location = get_user_thuvien_select2( $q, $id);
	if(count($list_location)>0){
		foreach ( $list_location as $result ) {
			$json[] = ['id'=>$result['userid'], 'text'=>$result['first_name'].' '.$result['last_name']];
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

