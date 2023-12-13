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

if (!nv_function_exists('nv_timkiem_info')) {
    /**
     * nv_block_config_thuviensach_timkiem()
     *
     * @param string $module
     * @param array  $data_block
     * @param array  $lang_block
     * @return string
     */
    function nv_block_config_thuviensach_timkiem($module, $data_block, $lang_block)
    {
        global $site_mods, $nv_Cache,$db_config;

        $html = '';
        $html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">Chọn chuyên mục:</label>';
        $html .= '<div class="col-sm-9"><select name="config_catid" class="form-control">';
        $sql = 'SELECT id, name_cat FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_cat WHERE parentid = 0';

        $list = $nv_Cache->db($sql, 'id', $module);
        foreach ($list as $l) {
            $html .= '<option value="' . $l['id'] . '" ' . (($data_block['catid'] == $l['id']) ? ' selected="selected"' : '') . '>' . $l['name_cat'] . '</option>';
        }
        $html .= '</select></div>';
        $html .= '</div>';

        return $html;
    }

    /**
     * nv_block_config_thuviensach_timkiem_submit()
     *
     * @param string $module
     * @param array  $lang_block
     * @return array
     */
    function nv_block_config_thuviensach_timkiem_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = [];
        $return['error'] = [];
        $return['config'] = [];
        $return['config']['catid'] = $nv_Request->get_int('config_catid', 'post', 0);

        return $return;
    }

    /**
     * nv_timkiem_info()
     *
     * @param array $block_config
     * @return string
     */
    function nv_timkiem_info($block_config)
    {
        global $global_config, $site_mods, $nv_Cache, $module_name, $lang_module,$db_config,$db, $module_upload,$nv_Request;

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

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file . '/block.timkiem.tpl')) {
            $block_theme = $global_config['module_theme'];
        } elseif (file_exists(NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/modules/' . $module_file . '/block.timkiem.tpl')) {
            $block_theme = $global_config['site_theme'];
        } else {
            $block_theme = 'default';
        }

        //Danh sach cac bo phan

        $catid = $nv_Request->get_string( 'catid', 'get,post', 0 );
        $keyword = $nv_Request->get_string( 'keyword', 'get,post', '' );
        if($catid){
          $name_cat = $db->query('SELECT name_cat FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $catid)->fetchColumn();  
      }else{
        $name_cat = 'Danh mục';
    }


    $xtpl = new XTemplate('block.timkiem.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $module_file);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('TEMPLATE', $block_theme);
    $xtpl->assign('name_cat', $name_cat);
    $xtpl->assign('catid', $catid);
     $xtpl->assign('keyword', $keyword);
    $list_cat = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE parentid = 0')->fetchAll();



    if (!empty($list_cat)) {
        foreach ($list_cat as $key => $value) {

            $xtpl->assign('CAT', $value);
            $xtpl->parse('main.cat');
        }
    }

    $xtpl->assign('BLOCK', $block_config);
    $xtpl->parse('main');

    return $xtpl->text('main');
}
}

if (defined('NV_SYSTEM')) {
    global $site_mods, $module_name, $global_array_cat, $module_array_cat;
    $module = $block_config['module'];
    if (isset($site_mods[$module])) {
        $content = nv_timkiem_info($block_config);
    }
}
