<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN'))
    die('Stop!!!');

define('NV_IS_FILE_ADMIN', true);

$allow_func = array('main', 'config','nhaxuatban','nhaxuatban_add','tacgia','tacgia_add','cat','cat_add','sach','sach_add','ajax','thuvien_add','thongke');
require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';
