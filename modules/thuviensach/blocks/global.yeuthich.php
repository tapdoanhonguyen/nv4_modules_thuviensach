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

if (!nv_function_exists('nv_yeuthich_info')) {
    /**
     * nv_block_config_thuviensach_yeuthich()
     *
     * @param string $module
     * @param array  $data_block
     * @param array  $lang_block
     * @return string
     */
    function nv_block_config_thuviensach_yeuthich($module, $data_block, $lang_block)
    {
        global $site_mods, $nv_Cache,$db_config;

        $html = '';


        return $html;
    }

    /**
     * nv_block_config_thuviensach_yeuthich_submit()
     *
     * @param string $module
     * @param array  $lang_block
     * @return array
     */
    function nv_block_config_thuviensach_yeuthich_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = [];
        $return['error'] = [];
        $return['config'] = [];
        $return['config']['catid'] = $nv_Request->get_int('config_catid', 'post', 0);

        return $return;
    }

    /**
     * nv_yeuthich_info()
     *
     * @param array $block_config
     * @return string
     */
    function nv_yeuthich_info($block_config)
    {
        global $global_config, $site_mods, $nv_Cache, $module_name, $lang_module,$db_config,$db, $module_upload,$nv_Request,$user_info;

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

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file . '/block.yeuthich.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file . '/block.yeuthich.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        //Danh sach cac bo phan



        $xtpl = new XTemplate('block.yeuthich.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $module_file);
        $xtpl->assign('LANG', $lang_module);
        $xtpl->assign('TEMPLATE', $block_theme);

        if($user_info['userid']){

            $so_sach_yeu_thich = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_yeu_thich WHERE userid = ' . $user_info['userid'])->fetchColumn();
            
            $xtpl->assign('so_sach_yeu_thich', $so_sach_yeu_thich);
            $xtpl->assign('BLOCK', $block_config);
             $xtpl->assign('link_yeu_thich', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $block_config['module'] . '&amp;' . NV_OP_VARIABLE . '=danh-sach-yeu-thich');
            $xtpl->parse('main.da_dang_nhap');
        }else{

            $so_sach_yeu_thich = 0;
            $xtpl->assign('so_sach_yeu_thich', $so_sach_yeu_thich);
            $xtpl->assign('BLOCK', $block_config);
            $xtpl->parse('main.chua_dang_nhap');
        }
        



       
        $xtpl->assign('so_sach_yeu_thich', $so_sach_yeu_thich);
        $xtpl->assign('BLOCK', $block_config);
        $xtpl->parse('main');

        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat, $module_array_cat;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_yeuthich_info($block_config);
    }
}
