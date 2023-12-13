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

// Change status
if ($nv_Request->isset_request('change_status', 'post, get')) {
    $id = $nv_Request->get_int('id', 'post, get', 0);
    $content = 'NO_' . $id;

    $query = 'SELECT status FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach WHERE id=' . $id;
    $row = $db->query($query)->fetch();
    if (isset($row['status']))     {
        $status = ($row['status']) ? 0 : 1;
        $query = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_muonsach SET status=' . intval($status) . ', time_edit='.NV_CURRENTTIME.', user_edit='.$user_info['userid'].' WHERE id=' . $id;
        $db->query($query);
        $content = 'OK_' . $id;
    }
    $nv_Cache->delMod($module_name);
    include NV_ROOTDIR . '/includes/header.php';
    echo $content;
    include NV_ROOTDIR . '/includes/footer.php';
}

if ($nv_Request->isset_request('delete_id', 'get') and $nv_Request->isset_request('delete_checkss', 'get')) {
    $id = $nv_Request->get_int('delete_id', 'get');
    $delete_checkss = $nv_Request->get_string('delete_checkss', 'get');
    if ($id > 0 and $delete_checkss == md5($id . NV_CACHE_PREFIX . $client_info['session_id'])) {
        $list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach_sach where muonsach_id='.$id)->fetchAll();
        $thuvien_id=$db->query('SELECT thuvien_id FROM '.$db_config['prefix'].'_'.$module_data.'_muonsach where id='.$id)->fetchColumn();

        foreach ($list_sach as $key => $value) {
            $number=$db->query('SELECT number FROM '.$db_config['prefix'].'_'.$module_data.'_soluongsach where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id'])->fetchColumn();
            $number=$numebr+1;
            $db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_soluongsach SET number='.$number.' where thuvien_id='.$thuvien_id.' and sach_id='.$value['sach_id']);
        }
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach_sach WHERE muonsach_id = ' . $db->quote($id));
        $db->query('DELETE FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach  WHERE id = ' . $db->quote($id));
        $nv_Cache->delMod($module_name);
        nv_insert_logs(NV_LANG_DATA, $module_name, 'Delete Muonsach', 'ID: ' . $id, $user_info['userid']);
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $op);
    }
}


$where = '';
$base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op;
$q = $nv_Request->get_title( 'q', 'post,get' );
$sea_flast = $nv_Request->get_int( 'sea_flast', 'post,get' );
$ngay_den = $nv_Request->get_title( 'ngay_den', 'post,get' );
$ngay_tu = $nv_Request->get_title( 'ngay_tu', 'post,get' );
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
if ( $status_ft>-1 ) {
    $where .= ' AND status ='.$status_ft;
    $base_url .= '&status_search=' . $status_ft;
}
if ( !empty( $q ) ) {
    $where .= ' AND (name LIKE "%" "'.$q. '" "%" OR ma_muonsach LIKE "%" "'.$q. '" "%" OR phone LIKE "%" "'.$q. '" "%" OR email LIKE "%" "'.$q. '" "%" OR cmnd LIKE "%" "'.$q. '" "%")';
    $base_url .= '&q=' . $q;
}
if($thuvien_id>0){
    $where .=' AND thuvien_id='.$thuvien_id;
    $base_url .='&thuvien_id='.$thuvien_id;
}
$per_page = 20;
$page = $nv_Request->get_int('page', 'post,get', 1);
$db->sqlreset()
->select('COUNT(*)')
->from('' . $db_config['prefix'] . '_' . $module_data . '_muonsach')
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

$xtpl = new XTemplate('danhsachmuon.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
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
$status_filt[] = array( 'id'=>0, 'text'=>'Chưa duyệt' );
$status_filt[] = array( 'id'=>1, 'text'=>'Đang mượn' );
$status_filt[] = array( 'id'=>2, 'text'=>'Đã trả' );
$status_filt[] = array( 'id'=>3, 'text'=>'Không đồng ý cho mượn' );

foreach ($status_filt as $filt_stt ) {
    if ($filt_stt['id'] == $status_ft ) {
        $filt_stt['selected'] = 'selected';
    }
    $xtpl->assign( 'status_filt', $filt_stt );
    $xtpl->parse( 'main.status_filt' );
}
while ($view = $sth->fetch()) {
    $view['number'] = $number++;
    $xtpl->assign('CHECK', $view['status'] == 1 ? 'checked' : '');
    $view['link_edit'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;id=' . $view['id'];
    $view['link_delete'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op . '&amp;delete_id=' . $view['id'] . '&amp;delete_checkss=' . md5($view['id'] . NV_CACHE_PREFIX . $client_info['session_id']);
    $view['time_add'] = date( 'd/m/Y H:i', $view['time_add'] );
    if ( empty( $view['user_edit'] ) ) {
        $view['user_edit'] = 'Chưa duyệt';
        $view['time_edit'] = 'Chưa duyệt';
    } else {
        $view['user_edit']=get_info_user($view['user_edit'])['last_name'].' '.get_info_user($view['user_edit'])['first_name'];
        $view['time_edit'] = date( 'd/m/Y H:i', $view['time_edit'] );
    }
    $view['thuvien_id']=get_info_thuvien($view['thuvien_id'])['name_thuvien'];
    if($view['status']>0){
        if($view['status']==1){
            $view['status_name']='Đang mượn';
        }else if($view['status']==3){
            $view['status_name']='Không đồng ý cho mượn';
        }else{
            $view['user_tra']=get_info_user($view['user_tra'])['last_name'].' '.get_info_user($view['user_tra'])['first_name'];
            $view['time_tra'] = nv_date('H:i d/m/Y', $view['time_tra'] );
            $view['status_name']='Đã trả <br> ('.$view['time_tra'].' - '.$view['user_tra'].')';
        }
    }
    $view['userid']=get_info_user($view['userid'])['last_name'].' '.get_info_user($view['userid'])['first_name'];

    $xtpl->assign('VIEW', $view);
    if($view['status']==0){
        $xtpl->parse('main.loop.duyet');
        $xtpl->parse('main.loop.delete');
    }else{
        if($view['status']==1){
            $xtpl->parse('main.loop.no_duyet.tra_sach');
        }
        $xtpl->parse('main.loop.no_duyet');
    }
    $xtpl->parse('main.loop');
}

$xtpl->parse('main');
$contents = $xtpl->text('main');

$page_title = $lang_module['danhsachmuon'];

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
