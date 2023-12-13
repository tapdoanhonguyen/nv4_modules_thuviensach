<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

if (!nv_function_exists('nv_chuyenmuc_info_new_2_list')) {
    /**
     * nv_block_config_thuviensach_chuyenmuc()
     *
     * @param string $module
     * @param array  $data_block
     * @param array  $lang_block
     * @return string
     */
    function nv_block_config_thuviensach_chuyenmuc_new_2_list($module, $data_block, $lang_block)
    {
        global $site_mods, $nv_Cache,$db_config;

        $html = '';
        $html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">Chọn chuyên mục:</label>';
        $html .= '<div class="col-sm-9">';
        $sql = 'SELECT id, name_cat FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_cat WHERE parentid = 0';

        $list = $nv_Cache->db($sql, 'id', $module);
        foreach ($list as $l) {
            $html .= '<label><input type="checkbox" name="config_catid[]" value="' . $l['id'] . '" ' . ((in_array((int) $l['id'], array_map('intval', $data_block['catid']), true)) ? ' checked="checked"' : '') . '</input>' . $l['name_cat'] . '</label><br />';

        }
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * nv_block_config_thuviensach_chuyenmuc_submit()
     *
     * @param string $module
     * @param array  $lang_block
     * @return array
     */
    function nv_block_config_thuviensach_chuyenmuc_new_2_list_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = [];
        $return['error'] = [];
        $return['config'] = [];
        $return['config']['catid'] = $nv_Request->get_array('config_catid', 'post', []);

        return $return;
    }

    /**
     * nv_chuyenmuc_info()
     *
     * @param array $block_config
     * @return string
     */
    function nv_chuyenmuc_info_new_2_list($block_config)
    {
        global $global_config, $site_mods, $nv_Cache, $module_name, $lang_module,$db_config,$db;

        $module = $block_config['module'];
        $module_data = $site_mods[$module]['module_data'];
        $module_file = $site_mods[$module]['module_file'];

        if ($module != $module_name) {
            $lang_temp = $lang_module;
            if (file_exists(NV_ROOTDIR . '/modules/' . $module_file . '/language/' . $global_config['site_lang'] . '.php')) {
                require NV_ROOTDIR . '/modules/' . $module_file . '/language/' . $global_config['site_lang'] . '.php';
            }
            $lang_module = $lang_module + $lang_temp;
            unset($lang_temp);
        }

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file . '/block.chuyenmuc_new_2_list.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file . '/block.chuyenmuc_new_2_list.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        //Danh sach cac bo phan
        $catid = implode(',', $block_config['catid']);



        $sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_sach WHERE danhmuc_id IN(' . $catid  . ') OR danhmuc_id IN(SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE parentid IN ( ' . $catid . ')) LIMIT 5';
        


        $array_sach = $nv_Cache->db($sql, 'id', $module);

        $xtpl = new XTemplate('block.chuyenmuc_new_2_list.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $module_file);

        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('TEMPLATE', $block_theme);
        $xtpl->assign('BLOCK_TITLE', $block_config['title']);
        $xtpl->assign('BLOCK_ICON', $block_config['icon']);
        if (!empty($array_sach)) {
            foreach ($array_sach as $key => $value) {
                $value['so_lan_muon'] = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach_sach WHERE muonsach_id IN(SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach WHERE status = 1 OR status = 2) AND sach_id = ' . $value['id'])->fetchColumn();
                $value['cat_info'] = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $value['danhmuc_id'])->fetch();
                $value['cat_name'] = $value['cat_info']['name_cat'];
                $value['cat_link'] = NV_BASE_SITEURL . $block_config['module'] . '/' . $value['cat_info']['alias'] . '-' . $value['cat_info']['id'];
                
                $value['link'] = NV_BASE_SITEURL . $block_config['module'] . '/' . $value['alias'];
                if(!empty($value['image']))
                {
                    $value['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/sach/' . $value['image'];
                }
                else {
                    $value['image'] = NV_BASE_SITEURL  . 'themes/default/images/' . $site_mods[$module]['module_upload'] . '/no_image.gif';
                    
                }
                $value['description'] = nv_clean60(strip_tags($value['description']), 160);
                $value['price'] = number_format($value['price']);
                
                $xtpl->assign('SACH', $value);
                $xtpl->parse('main.sach');
            }
        }

        $xtpl->parse('main');

        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat, $module_array_cat;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_chuyenmuc_info_new_2_list($block_config);
    }
}
