<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @copyright (C) 2009-2022 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN'))
    die('Stop!!!');
if ($nv_Request->isset_request('get_alias_title', 'post')) {
    $alias = $nv_Request->get_title('get_alias_title', 'post', '');
    $alias = change_alias($alias);
    die($alias);
}


$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['name_tacgia'] = $nv_Request->get_title('name_tacgia', 'post', '');
    $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_tacgia"')->fetchColumn();
    $row['ma_tacgia'] = sprintf($config_setting['raw_tacgia'],$row['id_next']);
    $row['alias'] = $nv_Request->get_title('alias', 'post', '');
    $row['alias'] = (empty($row['alias'])) ? change_alias($row['name_tacgia']) : change_alias($row['alias']);
    if (empty($row['name_tacgia'])) {
        $error[] = $lang_module['error_required_name_tacgia'];
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where alias='.$db->quote($row['alias']).' and id!='.$row['id'])->fetchColumn();
    if($check>0){
        $error[] = 'Liên kết tĩnh đã tồn tại';
    }
    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['time_add'] = NV_CURRENTTIME ;
                $row['user_add'] = $admin_info['userid'];


                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_tacgia (name_tacgia, time_add, user_add, status,ma_tacgia,alias) VALUES (:name_tacgia, :time_add, :user_add,:status,:ma_tacgia,:alias)');

                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindValue(':status', 1, PDO::PARAM_INT);
                $stmt->bindParam(':ma_tacgia', $row['ma_tacgia'], PDO::PARAM_STR);
                
            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_tacgia SET name_tacgia = :name_tacgia, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].',alias=:alias WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':name_tacgia', $row['name_tacgia'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add tacgia', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit tacgia', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=tacgia');
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_tacgia WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=tacgia');
    }
} else {
    $row['id'] = 0;
    $row['name'] = '';
}

$xtpl = new XTemplate('tacgia_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}
if (empty($row['id'])) {
    $xtpl->parse('main.auto_get_alias');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

if($row['id']==0){
    $page_title = $lang_module['tacgia_add'];
}else{
    $page_title = $lang_module['tacgia_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
