<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');




$sach['sach_add'] = $lang_module['sach_add'];
$submenu['sach']= array( 'title' => $lang_module['sach'], 'submenu' => $sach );



$nhaxuatban['nhaxuatban_add'] = $lang_module['nhaxuatban_add'];
$submenu['nhaxuatban']= array( 'title' => $lang_module['nhaxuatban'], 'submenu' => $nhaxuatban );



$tacgia['tacgia_add'] = $lang_module['tacgia_add'];
$submenu['tacgia']= array( 'title' => $lang_module['tacgia'], 'submenu' => $tacgia );



$cat['cat_add'] = $lang_module['cat_add'];
$submenu['cat']= array( 'title' => $lang_module['cat'], 'submenu' => $cat );

$submenu['thongke'] = 'Thống kê';
$submenu['config'] = $lang_module['config'];