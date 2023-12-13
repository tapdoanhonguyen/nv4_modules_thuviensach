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

$page_title = $module_info['site_title'];
$key_words = $module_info['keywords'];

$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;

$per_page = 36;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_sach');

$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();


$contents = nv_theme_thuviensach_main($base_url,$num_items,$per_page,$page,$sth);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
