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

$url = array();

$cacheFile = NV_LANG_DATA . '_sitemap_' . NV_CACHE_PREFIX . '.cache';
$cacheTTL = 7200;

if (($cache = $nv_Cache->getItem($module_name, $cacheFile, $cacheTTL)) != false) {
    $url = unserialize($cache);
} else {

    $sql = 'SELECT alias, time_add FROM ' . $db_config['prefix'] . '_' . $module_data . '_sach';
    $result = $db->query($sql);
    while (list($alias, $publtime) = $result->fetch(3)) {
        
        $url[] = array(
            'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $alias,
            'publtime' => $publtime
        );
    }
    

    $cache = serialize($url);
    $nv_Cache->setItem($module_name, $cacheFile, $cache, $cacheTTL);
}

nv_xmlSitemap_generate($url);
die();
