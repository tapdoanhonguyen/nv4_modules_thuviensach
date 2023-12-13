<?php
$config_setting = getConfig($module_data);
global $global_array_cat;
$global_array_cat = [];
$sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat ORDER BY sort ASC';
$result = $db_slave->query($sql);
while ($row = $result->fetch()) {
	$global_array_cat[$row['id']] = $row;
}


/**
 * nv_menu_get_submenu()
 *
 * @param int    $id
 * @param string $alias_selected
 * @param array  $array_item
 * @param string $sp_i
 */
function nv_menu_get_submenu($id, $alias_selected, $array_item, $sp_i)
{
	global $array_submenu,$sp;

	foreach ($array_item as $item2) {
		if (isset($item2['parentid']) and $item2['parentid'] == $id) {
			$item2['title'] = $sp_i . $item2['title'];
			$item2['selected'] = ($item2['alias'] == $alias_selected) ? ' selected="selected"' : '';
			$array_submenu[] = $item2;
			nv_menu_get_submenu($item2['key'], $alias_selected, $array_item, $sp_i . $sp);
			
		}
	}
}
function get_province_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_location_province where (title like '%".$q."%') and status=1")->fetchAll();
	return $list;
}

function get_info_province($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_location_province where provinceid=".$id)->fetch();
	return $list;
}

function get_info_district($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_location_district where districtid=".$id)->fetch();
	return $list;
}

function get_district_select2($q,$provinceid){
	global $db,$db_config,$module_data;
	if($provinceid>0){
		$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_location_district where (title like '%".$q."%') and provinceid=".$provinceid." and status=1")->fetchAll();
	}else{
		$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_location_district where (title like '%".$q."%') and status=1")->fetchAll();
	}
	return $list;
}

function get_user_thuvien_select2($q,$id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .NV_USERS_GLOBALTABLE." where (first_name like '%".$q."%' OR last_name like '%".$q."%' OR concat(first_name,' ',last_name) like '%".$q."%') and userid NOT IN (SELECT userid_quanly FROM ".$db_config['prefix']."_".$module_data."_thuvien where id!=".$id.")")->fetchAll();
	return $list;
}
function get_user_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .NV_USERS_GLOBALTABLE." where (first_name like '%".$q."%' OR last_name like '%".$q."%' OR concat(first_name,' ',last_name) like '%".$q."%')")->fetchAll();
	return $list;
}

function get_sach_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_sach where (name_sach like '%".$q."%')")->fetchAll();
	return $list;
}
function get_nhaxuatban_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_nhaxuatban where (name like '%".$q."%') and status=1")->fetchAll();
	return $list;
}
function get_thuvien_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_thuvien where (name_thuvien like '%".$q."%')")->fetchAll();
	return $list;
}

function get_info_thuvien($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_thuvien where id=".$id)->fetch();
	return $list;
}

function get_info_muonsach($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_muonsach where id=".$id)->fetch();
	return $list;
}


function get_info_sach($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_sach where id=".$id)->fetch();
	return $list;
}

function get_info_nhaxuatban($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_nhaxuatban where id=".$id)->fetch();
	return $list;
}
function get_tacgia_select2($q){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tacgia where (name_tacgia like '%".$q."%') and status=1")->fetchAll();
	return $list;
}
function get_info_tacgia($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_tacgia where id=".$id)->fetch();
	return $list;
}
function get_info_cat($id){
	global $db,$db_config,$module_data;
	$list=$db->query("SELECT * FROM " .$db_config['prefix'] . "_" . $module_data . "_cat where id=".$id)->fetch();
	return $list;
}
function nv_fix_cat_order($parentid = 0, $order = 0, $lev = 0)
{
	global $db, $module_data,$db_config;

	$sql = 'SELECT id, parentid FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE parentid=' . $parentid . ' ORDER BY weight ASC';
	$result = $db->query($sql);
	$array_cat_order = [];
	while ($row = $result->fetch()) {
		$array_cat_order[] = $row['id'];
	}
	$result->closeCursor();
	$weight = 0;
	if ($parentid > 0) {
		++$lev;
	} else {
		$lev = 0;
	}
	foreach ($array_cat_order as $catid_i) {
		++$order;
		++$weight;
		$sql = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_cat SET weight=' . $weight . ', sort=' . $order . ', lev=' . $lev . ' WHERE id=' . (int) $catid_i;
		$db->query($sql);
		$order = nv_fix_cat_order($catid_i, $order, $lev);
	}

	return $order;
}
function convert_vi_to_en($str) {
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
	$str = preg_replace("/(đ)/", "d", $str);
	$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
	$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
	$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
	$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
	$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
	$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
	$str = preg_replace("/(Đ)/", "D", $str);
	return $str;
}
function super_unique($array,$key)
{
	$temp_array = [];
	foreach ($array as $key2 => &$v) {
		$temp_array[$v[$key]][$key2] =& $v;
	}
	$data_loi=array();
	foreach( $temp_array as $value){
		if(count($value)>1){
			$data_loi=$value;
		}
	}

	return $data_loi;
}
function getConfig( $module )
{
	global $nv_Cache, $site_mods,$db_config;
	
	$list = $nv_Cache->db( 'SELECT config_name, config_value FROM ' . $db_config['prefix'] . '_' . $module . '_config', '', $module );
	$Config = array();
	foreach( $list as $values )
	{
		$Config[$values['config_name']] = $values['config_value'];
	}
	unset( $list ); 
	
	return $Config;
}
function get_info_user($userid){
	global $db, $module_data, $global_config, $db,$db_config;

	$list = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_users WHERE userid = ' . $userid )->fetch();
	return $list;
}
function ag_weekday($agtoday) {
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$weekday = date('l', $agtoday);

	$weekday = strtolower($weekday);
	switch($weekday) {
		case 'monday':
		$weekday = 2;
		break;
		case 'tuesday':
		$weekday = 3;
		break;
		case 'wednesday':
		$weekday = 4;
		break;
		case 'thursday':
		$weekday = 5;
		
		break;
		case 'friday':
		$weekday = 6;

		break;
		case 'saturday':
		$weekday = 7;

		break;
		default:
		$weekday = 8;

		break;
	}

	return $weekday;
}

$agtoday=	ag_weekday(NV_CURRENTTIME);

function nv_get_week_from_time($time)
{
	$week = 1;
	$year = date('Y', $time);
	$real_week = array($week, $year);
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
	
	$addYear = true;
	$num_week_loop = nv_get_max_week_of_year($year) - 1;
	
	for ($i = 0; $i <= $num_week_loop; $i++) {
		$week_begin = $time_first_week + $i * $time_per_week;
		$week_next = $week_begin + $time_per_week;
		
		if ($week_begin <= $time and $week_next > $time) {
			$real_week[0] = $i + 1;
			$addYear = false;
			break;
		}
	}
	if ($addYear) {
		$real_week[1] = $real_week[1] + 1;
	}
	
	return $real_week;
}

/**
 * nv_get_max_week_of_year()
 * 
 * @param mixed $year
 * @return
 */
function nv_get_max_week_of_year($year)
{
	$time_per_week = 86400 * 7;
	$time_start_year = mktime(0, 0, 0, 1, 1, $year);
	$time_first_week = $time_start_year - (86400 * (date('N', $time_start_year) - 1));
	
	if (date('Y', $time_first_week + ($time_per_week * 53) - 1) == $year) {
		return 53;
	} else {
		return 52;
	}
}
