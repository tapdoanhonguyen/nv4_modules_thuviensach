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

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_sach_request  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Sach', 'ID: ' . $id, $admin_info['userid']);
        nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}

$where = '';
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$nhaxuatban_id = $nv_Request->get_title( 'nhaxuatban_id', 'post,get', 0);
$tacgia_id = $nv_Request->get_title( 'tacgia_id', 'post,get', 0);
$danhmuc_id = $nv_Request->get_title( 'danhmuc_id', 'post,get', 0);
$thuvien_id = $nv_Request->get_title( 'thuvien_id', 'post,get', 0);
$status_ft = $nv_Request->get_title( 'status_search', 'post,get', -1 );

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_tu, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 0 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 0 );
    $ngay_tu = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_tu = 0;
}

if ( preg_match( '/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/', $ngay_den, $m ) )
{
    $_hour = $nv_Request->get_int( 'add_date_hour', 'post', 23 );
    $_min = $nv_Request->get_int( 'add_date_min', 'post', 59 );
    $ngay_den = mktime( $_hour, $_min, 0, $m[2], $m[1], $m[3] );
} else {
    $ngay_den = 0;
}

if ( $sea_flast != 9 ) {
    if ( $ngay_tu > 0 and $ngay_den > 0 )
    {

        $where .= ' AND time_add >= '. $ngay_tu . ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_tu > 0 )
    {
        $where .= ' AND time_add >= '. $ngay_tu;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    } else if ( $ngay_den > 0 )
    {
        $where .= ' AND time_add <= '. $ngay_den;
        $base_url .= '&ngay_tu=' . date( 'd-m-Y', $ngay_tu ) .'&ngay_den='.date( 'd-m-Y', $ngay_den );
    }

}

if ( !empty( $q ) ) {
    $where .= ' AND (name_sach LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}

if($nhaxuatban_id>0){
    $where .=' AND nhaxuatban_id='.$nhaxuatban_id;
    $base_url .='&nhaxuatban_id='.$nhaxuatban_id;
}

if($tacgia_id>0){
    $where .=' AND tacgia_id='.$tacgia_id;
    $base_url .='&tacgia_id='.$tacgia_id;
}

if($danhmuc_id>0){
    $where .=' AND danhmuc_id='.$danhmuc_id;
    $base_url .='&danhmuc_id='.$danhmuc_id;
}

if($thuvien_id>0){
    $where .=' AND thuvien_id='.$thuvien_id;
    $base_url .='&thuvien_id='.$thuvien_id;
}

if ( $status_ft>-1 ) {
    $where .= ' AND status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}
$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_sach_request')
->where('1=1'.$where);

$sth = $db->prepare($db->sql());

$sth->execute();
$num_items = $sth->fetchColumn();

$db->select('*')
->order('id DESC')
->limit($per_page)
->offset(($page - 1) * $per_page);
$sth = $db->prepare($db->sql());

$sth->execute();

$array_cat_list = [];
$array_cat_list[0] = 'Tất cả danh mục';

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
        'selected' => ($catid_i == $danhmuc_id) ? ' selected="selected"' : '',
        'title' => $title_i
        ];
    }
}

$xtpl = new XTemplate('sachrequest.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('Q', $q);
$xtpl->assign('nhaxuatban_id', $nhaxuatban_id);
$xtpl->assign('thuvien_id', $thuvien_id);

if($thuvien_id>0){
    $xtpl->assign('thuvien_id_name', get_info_thuvien($thuvien_id)['name_thuvien']);
}else{
    $xtpl->assign('thuvien_id_name', 'Tất cả thư viện');
}

if($nhaxuatban_id>0){
    $xtpl->assign('nhaxuatban_name', get_info_nhaxuatban($nhaxuatban_id)['name']);
}else{
    $xtpl->assign('nhaxuatban_name', 'Tất cả nhà xuất bản');
}

$xtpl->assign('tacgia_id', $tacgia_id);
if($tacgia_id>0){
    $xtpl->assign('tacgia_name', get_info_tacgia($tacgia_id)['name_tacgia']);
}else{
    $xtpl->assign('tacgia_name', 'Tất cả tác giả');
}
if ( $ngay_tu > 0 )
    $xtpl->assign( 'ngay_tu', date( 'd-m-Y', $ngay_tu ) );
if ( $ngay_den > 0 )
    $xtpl->assign( 'ngay_den', date( 'd-m-Y', $ngay_den ) );

$generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
if (!empty($generate_page)) {
    $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
    $xtpl->parse('main.generate_page');
}
$number = $page > 1 ? ($per_page * ($page - 1)) + 1 : 1;
$real_week = nv_get_week_from_time( NV_CURRENTTIME );
$week = $real_week[0];
$department = $real_week[1];
$this_department = $real_week[1];
$time_per_week = 86400 * 7;
$time_start_department = mktime( 0, 0, 0, 1, 1, $department );
$time_first_week = $time_start_department - ( 86400 * ( date( 'N', $time_start_department ) - 1 ) );

$tuannay = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 1 ) * $time_per_week + $time_per_week - 1 ),
    );
$tuantruoc = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 2 ) * $time_per_week + $time_per_week - 2 ),
    );
$tuankia = array(
    'from' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week ),
    'to' => nv_date( 'd-m-Y', $time_first_week + ( $week - 3 ) * $time_per_week + $time_per_week - 3 ),
    );

$thangnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of this month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of this month' ) ),
    );
$thangtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of last month' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of last month' ) ),
    );
$namnay = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january this year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december this year' ) ),
    );
$namtruoc = array(
    'from' => date( 'd-m-Y', strtotime( 'first day of january last year' ) ),
    'to' => date( 'd-m-Y', strtotime( 'last day of december last year' ) ),
    );
$xtpl->assign( 'TUANNAY', $tuannay );

$xtpl->assign( 'TUANTRUOC', $tuantruoc );

$xtpl->assign( 'TUANKIA', $tuankia );

$xtpl->assign( 'HOMNAY', date( 'd-m-Y', NV_CURRENTTIME ) );
$xtpl->assign( 'HOMQUA', date( 'd-m-Y', strtotime( 'yesterday' ) ) );
$xtpl->assign( 'THANGNAY', $thangnay );

$xtpl->assign( 'THANGTRUOC', $thangtruoc );

$xtpl->assign( 'NAMNAY', $namnay );

$xtpl->assign( 'NAMTRUOC', $namtruoc );

if ($sea_flast == '1' ) {
    $xtpl->assign( 'SELECT1', 'selected="selected"' );
}
if ($sea_flast == '2' ) {
    $xtpl->assign( 'SELECT2', 'selected="selected"' );
}
if ($sea_flast == '3' ) {
    $xtpl->assign( 'SELECT3', 'selected="selected"' );
}
if ($sea_flast == '4' ) {
    $xtpl->assign( 'SELECT4', 'selected="selected"' );
}
if ($sea_flast == '5' ) {
    $xtpl->assign( 'SELECT5', 'selected="selected"' );
}
if ($sea_flast == '6' ) {
    $xtpl->assign( 'SELECT6', 'selected="selected"' );
}
if ( $sea_flast == '7' ) {
    $xtpl->assign( 'SELECT7', 'selected="selected"' );
}
if ( $sea_flast == '8' ) {
    $xtpl->assign( 'SELECT8', 'selected="selected"' );
}
if ( $sea_flast == '9' ) {
    $xtpl->assign( 'SELECT9', 'selected="selected"' );
}
$status_filt = array();
$status_filt[] = array( 'id'=>-1, 'text'=>'Tất cả trạng thái' );
$status_filt[] = array( 'id'=>0, 'text'=>'Chờ duyệt' );
$status_filt[] = array( 'id'=>1, 'text'=>'Đã duyệt' );

foreach ($status_filt as $filt_stt ) {
    if ($filt_stt['id'] == $status_ft ) {
        $filt_stt['selected'] = 'selected';
    }
    $xtpl->assign( 'status_filt', $filt_stt );
    $xtpl->parse( 'main.status_filt' );
}
while ($view = $sth->fetch()) {
    $view['number'] = $number++;
    $view['link_delete'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
    $view['time_add'] = date( 'd/m/Y H:i', $view['time_add'] );
    $view['user_add']=get_info_user($view['user_add'])['last_name'].' '.get_info_user($view['user_add'])['first_name'];
    if ( empty( $view['user_edit'] ) ) {
        $view['user_edit'] = 'Chưa cập nhật';
        $view['time_edit'] = 'Chưa cập nhật';
    } else {
        $view['user_edit']=get_info_user($view['user_edit'])['last_name'].' '.get_info_user($view['user_edit'])['first_name'];
        $view['time_edit'] = date( 'd/m/Y H:i', $view['time_edit'] );
    }
    $view['nhaxuatban_id']=get_info_nhaxuatban($view['nhaxuatban_id'])['name'];
    $view['tacgia_id']=get_info_tacgia($view['tacgia_id'])['name_tacgia'];
    $view['danhmuc_id']=get_info_cat($view['danhmuc_id'])['name_cat'];
    $view['price']=number_format($view['price']);
    if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
        $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
    }else{
        $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
    }
    $view['thuvien_id']=get_info_thuvien($view['thuvien_id'])['name_thuvien'];
    $xtpl->assign('VIEW', $view);
    if($view['status']==0){
        $xtpl->parse('main.loop.duyet');
    }else{
        $xtpl->parse('main.loop.no_duyet');
    }
    $xtpl->parse('main.loop');
}
foreach ($cat_listsub as $data) {
    $xtpl->assign('cat_listsub', $data);
    $xtpl->parse('main.cat_listsub');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['sachrequest'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
