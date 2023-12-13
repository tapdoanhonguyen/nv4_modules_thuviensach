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
// $list_cat = $db->query('SELECT * FROM ' . $db_config['prefix'].'_'.$module_data.'_cat ' )->fetchAll();
// foreach ($list_cat as $key => $value) {
//     $db->query('UPDATE ' . $db_config['prefix'].'_'.$module_data.'_cat SET alias = "' . strtolower($value['alias']) . '" WHERE id = ' . $value['id']);
// }
$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
$row['parentid'] = $nv_Request->get_int('parentid', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['name_cat'] = $nv_Request->get_title('name_cat', 'post', '');
    $row['parentid'] = $nv_Request->get_title('parentid', 'post', 0);
    $row['alias'] = $nv_Request->get_title('alias', 'post', '');
    $row['alias'] = (empty($row['alias'])) ? change_alias($row['title']) : change_alias($row['alias']);
    $row['alias'] = strtolower($row['alias']);
    $row['image'] = $nv_Request->get_title('image', 'post', '');
    if (is_file(NV_DOCUMENT_ROOT . $row['image']))     {
        $row['image'] = substr($row['image'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/cat/'));
    } else {
        $row['image'] = '';
    }
    $row['description'] = $nv_Request->get_textarea('description', '', NV_ALLOWED_HTML_TAGS);

    if (empty($row['name_cat'])) {
        $error[] = $lang_module['error_required_name_cat'];
    } elseif (empty($row['alias'])) {
        $error[] = $lang_module['error_required_alias'];
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_cat where alias='.$db->quote($row['alias']).' and id!='.$row['id'])->fetchColumn();
    if($check>0){
        $error[] = 'Liên kết tĩnh đã tồn tại';
    }
    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['time_add'] = NV_CURRENTTIME;
                $row['user_add'] = $admin_info['userid'];

                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_cat (parentid, name_cat, alias, image, description, time_add, user_add,lev,sort,weight) VALUES (:parentid, :name_cat, :alias, :image, :description, :time_add, :user_add,0,0,0)');

                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_cat SET name_cat = :name_cat, alias = :alias, image = :image, description = :description,time_edit='.NV_CURRENTTIME.',user_edit='.$admin_info['userid'].',parentid=:parentid WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':name_cat', $row['name_cat'], PDO::PARAM_STR);
            $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));
            $stmt->bindParam(':parentid', $row['parentid'], PDO::PARAM_INT);

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Cat', ' ', $admin_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Cat', 'ID: ' . $row['id'], $admin_info['userid']);
                }
                nv_fix_cat_order();
                if($row['parentid']==0){
                    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cat');
                }else{
                    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cat&parentid='.$row['parentid']);
                }
            }
        } catch(PDOException $e) {
            trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id=' . $row['id'])->fetch();
    if (empty($row)) {
        if($row['parentid']==0){
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cat');
        }else{
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cat&parentid='.$row['parentid']);
        }
    }
} else {
    $row['id'] = 0;
    $row['name_cat'] = '';
    $row['alias'] = '';
    $row['image'] = '';
    $row['description'] = '';
}
if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/cat/' . $row['image'])) {
    $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/cat/' . $row['image'];
}

$row['description'] = nv_htmlspecialchars(nv_br2nl($row['description']));
$array_cat_list = [];
$array_cat_list[0] = $lang_module['cat_sub_sl'];

foreach ($global_array_cat as $catid_i => $array_value) {
    $lev_i = $array_value['lev'];
    $xtitle_i = '';
    if ($lev_i > 0) {
        $xtitle_i .= '&nbsp;&nbsp;&nbsp;|';
        for ($i = 1; $i <= $lev_i; ++$i) {
            $xtitle_i .= '---';
        }
        $xtitle_i .= '>&nbsp;';
    }
    $xtitle_i .= $array_value['name_cat'];
    $array_cat_list[$catid_i] = $xtitle_i;
}

if (!empty($array_cat_list)) {
    $cat_listsub = [];
    foreach ($array_cat_list as $catid_i => $title_i) {
        $cat_listsub[] = [
        'value' => $catid_i,
        'selected' => ($catid_i == $row['parentid']) ? ' selected="selected"' : '',
        'title' => $title_i
        ];
    }
}
$xtpl = new XTemplate('cat_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
foreach ($cat_listsub as $data) {
    $xtpl->assign('cat_listsub', $data);
    $xtpl->parse('main.cat_listsub');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
if($row['id']==0){
    $page_title = $lang_module['cat_add'];
}else{
    $page_title = $lang_module['cat_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
