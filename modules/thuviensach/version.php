<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_MAINFILE'))
    die('Stop!!!');

$module_version = array(
    'name' => 'Thuviensach',
    'modfuncs' => 'main,detail,search,sach,ajax,sachadd,sachrequest,viewcat,cart,sachtacgia,muonsach,danhsachmuon,doisach,viewcat_thuvien,danhsachyeuthich,lichsumuonsach,lichsudoisach,sitemap',
    'change_alias' => 'main,detail,search,sach,ajax,sachadd,sachrequest,viewcat,cart,sachtacgia,muonsach,danhsachmuon,doisach,viewcat_thuvien,danhsachyeuthich,lichsumuonsach,lichsudoisach,sitemap',
    'submenu' => 'main,detail,search,sach,sachrequest,danhsachmuon,doisach,danhsachyeuthich,lichsumuonsach,lichsudoisach,sitemap',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '4.3.03',
    'date' => 'Thu, 27 Oct 2022 01:18:43 GMT',
    'author' => 'VINADES.,JSC (contact@vinades.vn)',
    'uploads_dir' => array(
        $module_name,
        $module_name.'/excel/',
        $module_name.'/cat/',
        $module_name.'/sach/'
    ),
    'note' => ''
);
