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



$where = '';
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
$nhaxuatban_id = $nv_Request->get_title( 'nhaxuatban_id', 'post,get', 0);
$tacgia_id = $nv_Request->get_title( 'tacgia_id', 'post,get', 0);
$danhmuc_id = $nv_Request->get_title( 'danhmuc_id', 'post,get', 0);

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
    $where .= ' AND (name_sach LIKE "%" "'.$q. '" "%" OR ma_sach LIKE "%" "'.$q. '" "%")';
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



$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_sach')
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

$xtpl = new XTemplate('sach.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$xtpl->assign('Q', $q);
$xtpl->assign('nhaxuatban_id', $nhaxuatban_id);
$xtpl->assign('thuvien_id', $thuvien_id);


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

$info_thu_vien = $db->query('SELECT * FROM ' . $db_config['prefix'].'_'.$module_data.'_thuvien WHERE id = ' . $thuvien_id)->fetch();


while ($view = $sth->fetch()) {
    $view['number'] = $number++;
    $view['nhaxuatban_id']=get_info_nhaxuatban($view['nhaxuatban_id'])['name'];
    $view['tacgia_id']=get_info_tacgia($view['tacgia_id'])['name_tacgia'];
    $view['danhmuc_id']=get_info_cat($view['danhmuc_id'])['name_cat'];
    $view['price']=number_format($view['price']);
    if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
        $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
    }else{
        $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
    }
    $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$view['id'].' and thuvien_id='.$thuvien_id)->fetchColumn();
    if($check==0){
        $view['soluong']=0;
        $view['note']='';
    }else{
        $info=$db->query('SELECT number,note FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where sach_id='.$view['id'].' and thuvien_id='.$thuvien_id)->fetch();
        $view['soluong']=number_format($info['number']);
        $view['note']=$info['note'];
    }
    $xtpl->assign('VIEW', $view);
    $xtpl->parse('main.loop');
}
foreach ($cat_listsub as $data) {
    $xtpl->assign('cat_listsub', $data);
    $xtpl->parse('main.cat_listsub');
}
$xtpl->assign('info_thu_vien', $info_thu_vien);
$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['sach'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
