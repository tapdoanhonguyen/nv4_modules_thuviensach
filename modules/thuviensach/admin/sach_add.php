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
// $list_sach = $db->query('SELECT * FROM ' . $db_config['prefix'].'_'.$module_data.'_sach ' )->fetchAll();
// foreach ($list_sach as $key => $value) {
//     $db->query('UPDATE ' . $db_config['prefix'].'_'.$module_data.'_sach SET alias = "' . strtolower($value['alias']) . '" WHERE id = ' . $value['id']);
// }
$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
 $row['pdf'] = $nv_Request->get_string('pdf', 'post', '');
 $row['nhaxuatban_id'] = $nv_Request->get_int('nhaxuatban_id', 'post', 0);
 $row['tacgia_id'] = $nv_Request->get_int('tacgia_id', 'post', 0);
 $row['danhmuc_id'] = $nv_Request->get_int('danhmuc_id', 'post', 0);
 $row['name_sach'] = $nv_Request->get_title('name_sach', 'post', '');
 $row['alias'] = $nv_Request->get_title('alias', 'post', '');
 $row['alias'] = (empty($row['alias'])) ? change_alias($row['title']) : change_alias($row['alias']);
 $row['alias'] = strtolower($row['alias']);
 $row['image'] = $nv_Request->get_title('image', 'post', '');
 if (is_file(NV_DOCUMENT_ROOT . $row['image']))     {
    $row['image'] = substr($row['image'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/'));
} else {
    $row['image'] = '';
}
$row['price'] = $nv_Request->get_title('price', 'post', '');
if($row['price']==''){
    $row['price']=0;
}else{
    $row['price']=str_replace(',', '', $row['price']);
}
$row['description'] = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);


$row['nam_xuat_ban'] = $nv_Request->get_string('nam_xuat_ban', 'post', '');
$row['mo_ta_ngan_gon'] = $nv_Request->get_string('mo_ta_ngan_gon', 'post', '');

if (empty($row['nhaxuatban_id'])) {
    $error[] = $lang_module['error_required_nhaxuatban_id'];
} elseif (empty($row['tacgia_id'])) {
    $error[] = $lang_module['error_required_tacgia_id'];
} elseif (empty($row['danhmuc_id'])) {
    $error[] = $lang_module['error_required_danhmuc_id'];
} elseif (empty($row['name_sach'])) {
    $error[] = $lang_module['error_required_name_sach'];
} elseif (empty($row['alias'])) {
    $error[] = $lang_module['error_required_alias'];
} 
$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($row['alias']).' and id!='.$row['id'])->fetchColumn();
if($check>0){
    $error[] = 'Liên kết tĩnh đã tồn tại';
}
if (empty($error)) {
    try {
        if (empty($row['id'])) {
            $row['time_add'] = NV_CURRENTTIME ;
            $row['user_add'] = $admin_info['userid'];
            $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_sach"')->fetchColumn();
            $row['ma_sach'] = sprintf($config_setting['raw_sach'],$row['id_next']);
            $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_sach (pdf,nam_xuat_ban,mo_ta_ngan_gon,ma_sach,nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add) VALUES (:pdf,:nam_xuat_ban,:mo_ta_ngan_gon,:ma_sach,:nhaxuatban_id, :tacgia_id, :danhmuc_id, :name_sach, :alias, :image, :price, :description, :time_add, :user_add)');

            $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
            $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
            $stmt->bindParam(':ma_sach', $row['ma_sach'], PDO::PARAM_STR);

        } else {
            $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_sach SET pdf = :pdf,nam_xuat_ban = :nam_xuat_ban,mo_ta_ngan_gon = :mo_ta_ngan_gon,nhaxuatban_id = :nhaxuatban_id, tacgia_id = :tacgia_id, danhmuc_id = :danhmuc_id, name_sach = :name_sach, alias = :alias, image = :image, price = :price, description = :description, time_edit='.NV_CURRENTTIME.',user_edit='.$admin_info['userid'].' WHERE id=' . $row['id']);
        }
        $stmt->bindParam(':pdf', $row['pdf'], PDO::PARAM_STR);
        $stmt->bindParam(':mo_ta_ngan_gon', $row['mo_ta_ngan_gon'], PDO::PARAM_STR);
        $stmt->bindParam(':nam_xuat_ban', $row['nam_xuat_ban'], PDO::PARAM_STR);

        $stmt->bindParam(':nhaxuatban_id', $row['nhaxuatban_id'], PDO::PARAM_INT);
        $stmt->bindParam(':tacgia_id', $row['tacgia_id'], PDO::PARAM_INT);
        $stmt->bindParam(':danhmuc_id', $row['danhmuc_id'], PDO::PARAM_INT);
        $stmt->bindParam(':name_sach', $row['name_sach'], PDO::PARAM_STR);
        $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
        $stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $row['price'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));

        $exc = $stmt->execute();
        if ($exc) {
            $nv_Cache->delMod($module_name);
            if (empty($row['id'])) {
                nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Sach', ' ', $admin_info['userid']);
            } else {
                nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Sach', 'ID: ' . $row['id'], $admin_info['userid']);
            }
            nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=sach');
        }
    } catch(PDOException $e) {
        trigger_error($e->getMessage());
            die($e->getMessage()); //Remove this line after checks finished
        }
    }
} elseif ($row['id'] > 0) {
    $row = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_sach WHERE id=' . $row['id'])->fetch();
    $row['price']=number_format($row['price']);
    if (empty($row)) {
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=sach');
    }
} else {
    $row['id'] = 0;
    $row['nhaxuatban_id'] = 0;
    $row['tacgia_id'] = 0;
    $row['danhmuc_id'] = 0;
    $row['name_sach'] = '';
    $row['alias'] = '';
    $row['image'] = '';
    $row['price'] = '';
    $row['pdf'] = '';
    $row['description'] = '';
    $row['mo_ta_ngan_gon'] = '';
    $row['nam_xuat_ban'] = '';
}
if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $row['image'])) {
    $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $row['image'];
}
if (defined('NV_EDITOR'))
    require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';

$row['description'] = nv_htmlspecialchars(nv_editor_br2nl($row['description']));
if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
    $row['description'] = nv_aleditor('description', '100%', '300px', $row['description']);
} else {
    $row['description'] = '<textarea style="width:100%;height:300px" name="description">' . $row['description'] . '</textarea>';
}
$array_cat_list = [];
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
            'selected' => ($catid_i == $row['danhmuc_id']) ? ' selected="selected"' : '',
            'title' => $title_i
        ];
    }
}
if($row['nhaxuatban_id']>0){
    $row['nhaxuatban_name']=get_info_nhaxuatban($row['nhaxuatban_id'])['name'];
}else{
    $row['nhaxuatban_id']='';
}
if($row['tacgia_id']>0){
    $row['tacgia_name']=get_info_tacgia($row['tacgia_id'])['name_tacgia'];
}else{
    $row['tacgia_id']='';
}
$xtpl = new XTemplate('sach_add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
    $page_title = $lang_module['sach_add'];
}else{
    $page_title = $lang_module['sach_edit'];
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
