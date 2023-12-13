<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_IS_MOD_THUVIENSACH'))
	die('Stop!!!');

if (!defined('NV_IS_USER')) {
    $page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
    $page_url .= '&nv_redirect=' . nv_redirect_encrypt(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=agency');
    echo '<script language="javascript">';
    echo 'alert("Vui lòng đăng nhập trước khi sử dụng chức năng này!");window.location = "'.nv_url_rewrite($page_url,true).'"';
    echo '</script>';
    die;
}

$page_title = $lang_module['danhsachyeuthich'];
$key_words = $module_info['keywords'];

$array_data = array();
$sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat ORDER BY sort ASC';
$result = $db->query($sql);
$sp = '&nbsp;&nbsp;&nbsp;&nbsp;';

$array_item=array();
while ($row = $result->fetch()) {
	$array_item[$row['id']] = [
	'parentid' => $row['parentid'],
	'key' => $row['id'],
	'title' => $row['name_cat'],
	'alias' => $row['alias'].'-'.$row['id']
	];
}


$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;

$per_page = 36;
$page = $nv_Request->get_int('page', 'post,get', 1);
$catid = $nv_Request->get_int('catid', 'post,get', 0);
$keyword = $nv_Request->get_string('keyword', 'post,get', '');

$where=' AND id IN (SELECT sach_id FROM '.$db_config['prefix'].'_'.$module_data.'_yeu_thich where userid='.$user_info['userid'].')';

if($catid>0){
	$where .=' AND danhmuc_id='.$catid;
	$base_url .='&catid='.$catid;
}
if ( !empty( $keyword ) ) {
	$where .= ' AND (name_sach LIKE "%" "'.$keyword. '" "%")';
	$base_url .= '&keyword=' . $keyword;
}

$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_sach')
->where('1=1'.$where);

$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();


$contents = nv_theme_thuviensach_danh_sach_yeu_thich($array_item,$sp,$base_url,$num_items,$per_page,$page,$sth,$catid,$keyword);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
