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


$key_words = $module_info['keywords'];

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $array_op[0];

$info_thuvien['ten_tinhthanh']=get_info_province($info_thuvien['provinceid'])['title'];
$info_thuvien['ten_quanhuyen']=get_info_district($info_thuvien['districtid'])['title'];

$per_page = 36;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_sach')
->where('id IN (SELECT sach_id FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$info_thuvien['id'].')');

$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();


$contents = nv_theme_thuviensach_sachthuvien($info_thuvien,$base_url,$num_items,$per_page,$page,$sth);
$page_title=$info_thuvien['name_thuvien'];
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
