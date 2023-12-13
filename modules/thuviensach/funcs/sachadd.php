<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @copyright (C) 2009-2022 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
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
}else{  
    $check_quan_ly=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where userid_quanly='.$user_info['userid'])->fetchColumn();
    if($check_quan_ly>0){
        $thuvien_id=$db->query('SELECT id FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where userid_quanly='.$user_info['userid'])->fetchColumn();
    }else{
        $page_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=users';
        echo '<script language="javascript">';
        echo 'alert("Bạn không có quyền truy cập chức năng này!");window.location = "'.nv_url_rewrite($page_url,true).'"';
        echo '</script>';
        die;
    }
}

$row = array();
$error = array();
$row['id'] = $nv_Request->get_int('id', 'post,get', 0);
if ($nv_Request->isset_request('submit', 'post')) {
    $row['nhaxuatban_id'] = $nv_Request->get_int('nhaxuatban_id', 'post', 0);
    $row['tacgia_id'] = $nv_Request->get_int('tacgia_id', 'post', 0);
    $row['danhmuc_id'] = $nv_Request->get_int('danhmuc_id', 'post', 0);
    $row['name_sach'] = $nv_Request->get_title('name_sach', 'post', '');
    $row['alias'] = change_alias($row['name_sach']);
    $row['image'] = $nv_Request->get_title('image', 'post', '');
    if($_FILES['upload_fileupload_image']["tmp_name"]){
        $row['image']=NV_BASE_SITEURL.NV_UPLOADS_DIR . '/' . $module_upload . '/sach/sach_'.change_alias($row['name_sach']).'.png';
        move_uploaded_file($_FILES['upload_fileupload_image']["tmp_name"],NV_ROOTDIR .$row['image']);
    }
    $row['image'] = substr($row['image'], strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/'));
    $row['price'] = $nv_Request->get_title('price', 'post', '');
    $row['price']=str_replace(',', '', $row['price']);
    $row['description'] = $nv_Request->get_editor('description', '', NV_ALLOWED_HTML_TAGS);

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
    } elseif (empty($row['price'])) {
        $error[] = $lang_module['error_required_price'];
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($row['alias']))->fetchColumn();
    if($check>0){
        $error[] = 'Sách này đã tồn tại';
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach_request where name_sach='.$db->quote($row['name_sach']))->fetchColumn();
    if($check>0){
        $error[] = 'Sách này đã được yêu cầu';
    }
    if (empty($error)) {
        try {
            if (empty($row['id'])) {
                $row['time_add'] = NV_CURRENTTIME ;
                $row['user_add'] = $user_info['userid'];
                $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_sach_request (thuvien_id,nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, image, price, description, time_add, user_add,status) VALUES (:thuvien_id,:nhaxuatban_id, :tacgia_id, :danhmuc_id, :name_sach, :image, :price, :description, :time_add, :user_add,0)');

                $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                $stmt->bindParam(':thuvien_id', $thuvien_id, PDO::PARAM_STR);
                
            } else {
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_sach_request SET nhaxuatban_id = :nhaxuatban_id, tacgia_id = :tacgia_id, danhmuc_id = :danhmuc_id, name_sach = :name_sach, alias = :alias, image = :image, price = :price, description = :description WHERE id=' . $row['id']);
            }
            $stmt->bindParam(':nhaxuatban_id', $row['nhaxuatban_id'], PDO::PARAM_INT);
            $stmt->bindParam(':tacgia_id', $row['tacgia_id'], PDO::PARAM_INT);
            $stmt->bindParam(':danhmuc_id', $row['danhmuc_id'], PDO::PARAM_INT);
            $stmt->bindParam(':name_sach', $row['name_sach'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $row['image'], PDO::PARAM_STR);
            $stmt->bindParam(':price', $row['price'], PDO::PARAM_STR);
            $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));

            $exc = $stmt->execute();
            if ($exc) {
                $nv_Cache->delMod($module_name);
                if (empty($row['id'])) {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add Sach', ' ', $user_info['userid']);
                } else {
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit Sach', 'ID: ' . $row['id'], $user_info['userid']);
                }
                nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=sachrequest');
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
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=sachrequest');
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
    $row['description'] = '';
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
$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('MODULE_UPLOAD', $module_upload);
$xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);
$xtpl->assign('OP', $op);
$xtpl->assign('ROW', $row);
$xtpl->assign('currentpath', NV_UPLOADS_DIR .'/'.$module_name. '/sach');

if (!empty($error)) {
    $xtpl->assign('ERROR', implode('<br />', $error));
    $xtpl->parse('main.error');
}

foreach ($cat_listsub as $data) {
    $xtpl->assign('cat_listsub', $data);
    $xtpl->parse('main.cat_listsub');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');
$page_title = $lang_module['sach_add'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
