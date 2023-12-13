<?php

/**
 * @Project TMS 4.x
 * @Author TMS <TMS@thuongmaiso.vn>
 * @Copyright (C) 2020 TMS. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Tue, 31 Mar 2020 02:34:09 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');

$page_title = $lang_module['config'];
$saveconfig = $nv_Request->get_int( 'saveconfig', 'post', 0 );

if( ! empty( $saveconfig ) )
{
    $config_setting = array();  
    $config_setting['raw_nhaxuatban'] = $nv_Request->get_string('raw_nhaxuatban', 'post', '');
    $config_setting['raw_tacgia'] = $nv_Request->get_string('raw_tacgia', 'post', '');
    $config_setting['raw_sach'] = $nv_Request->get_string('raw_sach', 'post', '');
    $config_setting['raw_thuvien'] = $nv_Request->get_string('raw_thuvien', 'post', '');
    $config_setting['raw_muonsach'] = $nv_Request->get_string('raw_muonsach', 'post', '');

    
    
    
    $sth = $db_slave->prepare( 'UPDATE ' . $db_config['prefix'] . '_' . $module_data  . '_config SET config_value = :config_value WHERE config_name = :config_name');
    foreach( $config_setting as $config_name => $config_value )
    {
        $sth->bindParam( ':config_name', $config_name, PDO::PARAM_STR );
        $sth->bindParam( ':config_value', $config_value, PDO::PARAM_STR );
        $sth->execute();

    }
    $sth->closeCursor();


    $nv_Cache->delMod( $module_name );
    Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op . '&rand=' . nv_genpass() );

    die();

}
$xtpl = new XTemplate('config.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);
$xtpl->assign('DATA', $config_setting);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
