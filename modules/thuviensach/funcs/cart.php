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

$page_title = $lang_module['cart'];
$key_words = $module_info['keywords'];

$contents = nv_theme_thuviensach_cart($_SESSION['cart_sach']);

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
