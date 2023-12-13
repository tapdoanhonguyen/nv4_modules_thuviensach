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



$mod = $nv_Request->get_string( 'mod', 'get,post', '' );
//select 2

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];
if (!empty($info_sach['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $info_sach['image'])) {
	$info_sach['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $info_sach['image'];
}else{
	$info_sach['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
}
$info_sach['name_tacgia']=get_info_tacgia($info_sach['tacgia_id'])['name_tacgia'];
$info_sach['alias_tacgia']=get_info_tacgia($info_sach['tacgia_id'])['alias'];
$info_sach['alias_tacgia']=NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$info_sach['alias_tacgia'] . '-' . $info_sach['tacgia_id'];
$info_sach['price']=number_format($info_sach['price']);

$page_title=$info_sach['name_sach'];
$per_page = 10;
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=ajax&mod=load_comment&sach_id='.$info_sach['id'].'&per_page='.$per_page;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_comment')
->where('sach_id='.$info_sach['id'].' and status=1');
$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();
$number_avg=$db->query('SELECT avg(rate) FROM '.$db_config['prefix'].'_'.$module_data.'_comment where sach_id='.$info_sach['id'])->fetchColumn();
$number_avg=round($number_avg,1);
$contents = nv_theme_thuviensach_detail($info_sach,$base_url,$num_items,$per_page,$page,$sth,$number_avg);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
