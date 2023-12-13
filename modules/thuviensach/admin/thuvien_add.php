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
    $row['name_thuvien'] = $nv_Request->get_title('name_thuvien', 'post', '');
    $row['alias'] = $nv_Request->get_title('alias', 'post', '');
    $row['alias'] = (empty($row['alias'])) ? change_alias($row['title']) : change_alias($row['alias']);
    $row['provinceid'] = $nv_Request->get_int('provinceid', 'post', 0);
    $row['districtid'] = $nv_Request->get_int('districtid', 'post', 0);
    $row['description'] = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);
    $row['userid_quanly'] = $nv_Request->get_int('userid_quanly', 'post', 0);
    $row['dia_chi'] = $nv_Request->get_string('dia_chi', 'post', '');

    if (empty($row['name_thuvien'])) {
        $error[] = $lang_module['error_required_name_thuvien'];
    } elseif (empty($row['alias'])) {
        $error[] = $lang_module['error_required_alias'];
    } elseif (empty($row['provinceid'])) {
        $error[] = $lang_module['error_required_provinceid'];
    } elseif (empty($row['districtid'])) {
        $error[] = $lang_module['error_required_districtid'];
    } elseif (empty($row['userid_quanly'])) {
        $error[] = $lang_module['error_required_userid_quanly'];
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($row['alias']).' and id!='.$row['id'])->fetchColumn();
    if($check>0){
        $error[] = 'Liên kết tĩnh đã tồn tại';
    }
    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['time_add'] = NV_CURRENTTIME;
                $row['user_add'] = $admin_info['userid'];
                $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_thuvien"')->fetchColumn();
                $row['ma_thuvien'] = sprintf($config_setting['raw_thuvien'],$row['id_next']);
                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_thuvien (dia_chi,ma_thuvien,name_thuvien, alias, provinceid, districtid, description, userid_quanly, time_add, user_add) VALUES (:dia_chi,:ma_thuvien,:name_thuvien, :alias, :provinceid, :districtid, :description, :userid_quanly, :time_add, :user_add)');

                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindParam(':ma_thuvien', $row['ma_thuvien'], PDO::PARAM_STR);
                
            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_thuvien SET dia_chi = :dia_chi,name_thuvien = :name_thuvien, alias = :alias, provinceid = :provinceid, districtid = :districtid, description = :description, userid_quanly = :userid_quanly, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].' WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':dia_chi', $row['dia_chi'], PDO::PARAM_STR);
            $stmt->bindParam(':name_thuvien', $row['name_thuvien'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':provinceid', $row['provinceid'], PDO::PARAM_INT);
            $stmt->bindParam(':districtid', $row['districtid'], PDO::PARAM_INT);
            $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));
            $stmt->bindParam(':userid_quanly', $row['userid_quanly'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Thuvien', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Thuvien', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=thuvien');
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); 
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_thuvien WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=thuvien');
    }
} else {
    $row['id'] = 0;
    $row['name_thuvien'] = '';
    $row['dia_chi'] = '';
    $row['alias'] = '';
    $row['provinceid'] = 0;
    $row['districtid'] = 0;
    $row['description'] = '';
    $row['userid_quanly'] = 0;
}
if (defined('NV_EDITOR'))
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';

$row['description'] = nv_htmlspecialchars(nv_editor_br2nl($row['description']));
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['description'] = nv_aleditor('description', '100%', '300px', $row['description']);
} else {
    $row['description'] = '<textarea style="width:100%;height:300px" name="description">' . $row['description'] . '</textarea>';
}


if($row['userid_quanly']>0){
    $row['userid_quanly_name']=get_info_user($row['userid_quanly'])['last_name'].' '.get_info_user($row['userid_quanly'])['first_name'];
}else{
    $row['userid_quanly']='';
}

if($row['provinceid']>0){
    $row['provinceid_name']=get_info_province($row['provinceid'])['title'];
}else{
    $row['provinceid']='';
}

if($row['districtid']>0){
    $row['districtid_name']=get_info_district($row['districtid'])['title'];
}else{
    $row['districtid']='';
}

$xtpl = new XTemplate('thuvien_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
if($row['provinceid']>0){
    $xtpl->parse('main.district');
}else{
    $xtpl->parse('main.no_district');
}
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
    $page_title = $lang_module['thuvien_add'];
}else{
    $page_title = $lang_module['thuvien_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
