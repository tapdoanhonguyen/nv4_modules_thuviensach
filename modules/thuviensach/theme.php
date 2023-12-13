<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_IS_MOD_THUVIENSACH'))
    die('Stop!!!');
/**
 * nv_theme_thuviensach_viewcat()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_viewcat($base_url,$num_items,$per_page,$page,$sth,$list_cat_con)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload,$db,$db_config,$module_data,$module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    while ($view = $sth->fetch()) {
        $view['alias']=NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
        if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
            $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
        }else{
            $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
        }
        $view['name_sach'] = nv_clean60(strip_tags($view['name_sach']), 40);
        
        $view['cat_title'] = $db->query('SELECT name_cat FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetchColumn();
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }
    foreach ($list_cat_con as $key => $value) {
        $value['alias']= NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$value['alias'].'-'.$value['id'];
        $xtpl->assign('LOOP_CAT', $value);
        $list_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_sach where danhmuc_id='.$value['id'].' order by time_add DESC limit 10')->fetchAll();
        
        foreach ($list_sach as $key_sach => $view) {
            $view['alias']=NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
            if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
                $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
            }else{
                $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
            }
            $view['so_lan_muon'] = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach_sach WHERE muonsach_id IN(SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach WHERE status = 1 OR status = 2) AND sach_id = ' . $view['id'])->fetchColumn();
            
            $view['cat_title'] = $db->query('SELECT name_cat FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetchColumn();
            $xtpl->assign('VIEW', $view);
            $xtpl->parse('main.cat.sach');
        }
        $xtpl->parse('main.cat');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}
/**
 * nv_theme_thuviensach_main()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_main($base_url,$num_items,$per_page,$page,$sth)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload,$module_name, $db, $db_config, $module_data,$user_info;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);

    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    while ($view = $sth->fetch()) {
        if($user_info['userid']){
            $check_yeu_thich = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_yeu_thich WHERE sach_id = ' . $view['id'] . ' AND userid = ' . $user_info['userid'])->fetchColumn();
        }else{
            $check_yeu_thich = 0;
        }
        $view['name_sach'] = nv_clean60(strip_tags($view['name_sach']), 40);
        $view['cat_info'] = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetch();
        $view['cat_name'] = $view['cat_info']['name_cat'];
        $view['cat_link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.  $view['cat_info']['alias'] . '-' . $view['cat_info']['id'];
        $view['alias']= NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
        if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
            $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
        }else{
            $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
        }
        $view['price'] = number_format($view['price']);
        if($check_yeu_thich == 0){
            $view['checked'] = '';
        }else{
            $view['checked'] = 'checked';
        }
        $view['so_lan_muon'] = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach_sach WHERE muonsach_id IN(SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach WHERE status = 1 OR status = 2) AND sach_id = ' . $view['id'])->fetchColumn();
        $view['cat_title'] = $db->query('SELECT name_cat FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetchColumn();
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_thuviensach_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_detail($info_sach,$base_url,$num_items,$per_page,$page,$sth,$number_avg)
{
    global $module_info, $lang_module, $lang_global, $op,$user_info,$db_config,$db, $module_data;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('THEME', $module_info['template']);

    $xtpl->assign('INFO', $info_sach);


    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page, 'true',  'false', 'nv_urldecode_ajax', 'comment');
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_thuviensach_detail()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_detail_ajax($base_url,$num_items,$per_page,$page,$sth)
{
    global $module_info, $lang_module, $lang_global, $op,$user_info,$db_config,$db;

    $xtpl = new XTemplate('comment_ajax.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('INFO', $info_sach);
    $xtpl->assign('num_items', $num_items);
    
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page, 'true',  'false', 'nv_urldecode_ajax', 'comment');
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    while ($view = $sth->fetch()) {
        $info=$db->query('SELECT * FROM '.$db_config['prefix'].'_users where userid='.$view['userid'])->fetch();
        if(empty($info['photo'])){
            $photo=NV_BASE_SITEURL.'themes/thuviensach/images/no_user.jpg';
        }else{
            $photo=NV_BASE_SITEURL.$info['photo'];
        }
        $name_user=$info['last_name'].' '.$info['first_name'];
        $time_add=nv_date('d-m-Y H:i',$view['time_add']);
        $xtpl->assign('VIEW', $view);
        $xtpl->assign('time_add', $time_add);
        $xtpl->assign('photo', $photo);
        $xtpl->assign('name_user', $name_user);
        $xtpl->assign('content', $view['content']);
        for($i=5;$i>=1;$i--){
            if($i==$view['rate']){
                $xtpl->assign('checked', 'checked');
            }else{
                $xtpl->assign('checked', '');
            }
            $xtpl->assign('key', $i);
            $xtpl->parse('main.comment.star');
        }
        $xtpl->parse('main.comment');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_thuviensach_cart()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_cart($cart_sach)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    if(!empty($cart_sach['sach'])){
        $xtpl->assign('number_sach', count($cart_sach['sach']));
        $check_sach=0;
        foreach ($cart_sach['sach'] as $key => $value) {
            $info=get_info_sach($value['sach_id']);
            $info['nhaxuatban_name']=get_info_nhaxuatban($info['nhaxuatban_id'])['name'];
            $info['tacgia_name']=get_info_tacgia($info['tacgia_id'])['name_tacgia'];
            if (!empty($info['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $info['image'])) {
                $info['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $info['image'];
            }else{
                $info['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
            }
            if($value['status']==1){
                $info['checked']='checked';
                $check_sach=$check_sach+1;
            }else{
                $info['checked']='';
            }
            $xtpl->assign('INFO', $info);
            $xtpl->parse('main.search');
        }
        if($check_sach==count($cart_sach['sach'])){
            $xtpl->assign('checked', 'checked');
        }else{
            $xtpl->assign('checked', '');
        }
        $xtpl->parse('main.muon_sach');
    }else{
        $xtpl->parse('main.no_search');
    }

    $xtpl->parse('main');
    return $xtpl->text('main');
}



/**
 * nv_theme_thuviensach_sachtacgia()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_sachtacgia($info_tacgia,$base_url,$num_items,$per_page,$page,$sth)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload,$module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('info_tacgia', $info_tacgia);
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    while ($view = $sth->fetch()) {
        $view['alias']=NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
        if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
            $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
        }else{
            $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
        }
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_thuviensach_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_muonsach($cart_sach,$info_user)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload,$module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('INFO_USER', $info_user);
    $thuvien_id=$cart_sach['thuvien_id'];
    $info_thuvien=get_info_thuvien($thuvien_id);
    $info_thuvien['ten_tinhthanh']=get_info_province($info_thuvien['provinceid'])['title'];
    $info_thuvien['ten_quanhuyen']=get_info_district($info_thuvien['districtid'])['title'];
    $xtpl->assign('INFO_THUVIEN', $info_thuvien);
    $check_sach=0;
    foreach ($cart_sach['sach'] as $key => $value) {
        if($value['status']==1){
            $info=get_info_sach($value['sach_id']);
            $info['nhaxuatban_name']=get_info_nhaxuatban($info['nhaxuatban_id'])['name'];
            $info['tacgia_name']=get_info_tacgia($info['tacgia_id'])['name_tacgia'];
            if (!empty($info['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $info['image'])) {
                $info['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $info['image'];
            }else{
                $info['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
            }
            if($value['status']==1){
                $info['checked']='checked';
                $check_sach=$check_sach+1;
            }else{
                $info['checked']='';
            }
            $xtpl->assign('INFO', $info);
            $xtpl->parse('main.sach');
        }
    }    
    $xtpl->parse('main');
    return $xtpl->text('main');
}

/**
 * nv_theme_thuviensach_danh_sach_yeu_thich()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_danh_sach_yeu_thich($array_item,$sp,$base_url,$num_items,$per_page,$page,$sth,$catid,$keyword)
{
    global $module_info, $lang_module, $lang_global, $op,$array_submenu,$db,$db_config,$module_data,$module_upload,$module_name;

    $xtpl = new XTemplate('danhsachyeuthich.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('Q', $keyword);
    $xtpl->assign('OP', $op);
    $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
    $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);

    foreach ($array_item as $key => $item1) {
        $parentid = (isset($item1['parentid'])) ? $item1['parentid'] : 0;
        if (empty($parentid)) {
            if($item1['key']==$catid){
                $item1['selected']='selected';
            }else{
                $item1['selected']='';
            }
            $xtpl->assign('item', $item1);
            $xtpl->parse('main.item');
            $array_submenu = [];
            nv_menu_get_submenu($key, '', $array_item, $sp);
            foreach ($array_submenu as $item2) {
                if($item2['key']==$catid){
                    $item2['selected']='selected';
                }else{
                    $item2['selected']='';
                }
                $xtpl->assign('item', $item2);
                $xtpl->parse('main.item');
            }
        }
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    if($num_items>0){
        while ($view = $sth->fetch()) {

            $view['cat_info'] = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetch();
            $view['cat_name'] = $view['cat_info']['name_cat'];
            $view['cat_link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.  $view['cat_info']['alias'] . '-' . $view['cat_info']['id'];
            $view['alias']= NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
            if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
                $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
            }else{
                $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
            }
            $view['price'] = number_format($view['price']);
            $xtpl->assign('VIEW', $view);
            $xtpl->parse('main.loop');
        }
    }else{
        $xtpl->parse('main.no_loop');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}



/**
 * nv_theme_thuviensach_search()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_search($array_item,$sp,$base_url,$num_items,$per_page,$page,$sth,$catid,$keyword)
{
    global $module_info, $lang_module, $lang_global, $op,$array_submenu,$db,$db_config,$module_data,$module_upload,$module_name,$user_info;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('Q', $keyword);
    $xtpl->assign('OP', $op);
    $xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
    $xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
    $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
    $xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
    $xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
    $xtpl->assign('MODULE_NAME', $module_name);
    $xtpl->assign('NV_ASSETS_DIR', NV_ASSETS_DIR);

    foreach ($array_item as $key => $item1) {
        $parentid = (isset($item1['parentid'])) ? $item1['parentid'] : 0;
        if (empty($parentid)) {
            if($item1['key']==$catid){
                $item1['selected']='selected';
            }else{
                $item1['selected']='';
            }
            $xtpl->assign('item', $item1);
            $xtpl->parse('main.item');
            $array_submenu = [];
            nv_menu_get_submenu($key, '', $array_item, $sp);
            foreach ($array_submenu as $item2) {
                if($item2['key']==$catid){
                    $item2['selected']='selected';
                }else{
                    $item2['selected']='';
                }
                $xtpl->assign('item', $item2);
                $xtpl->parse('main.item');
            }
        }
    }
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }

    if($num_items>0){
        while ($view = $sth->fetch()) {
            if($user_info['userid']){
                $check_yeu_thich = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_yeu_thich WHERE sach_id = ' . $view['id'] . ' AND userid = ' . $user_info['userid'])->fetchColumn();
            }else{
                $check_yeu_thich = 0;
            }
            if($check_yeu_thich>0){
                $view['checked']='checked';
            }else{
                $view['checked']='';
            }
            $view['cat_info'] = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_cat WHERE id = ' . $view['danhmuc_id'])->fetch();
            $view['cat_name'] = $view['cat_info']['name_cat'];
            $view['cat_link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.  $view['cat_info']['alias'] . '-' . $view['cat_info']['id'];
            $view['alias']= NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
            if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
                $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
            }else{
                $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
            }
            $view['price'] = number_format($view['price']);
            $xtpl->assign('VIEW', $view);
            $xtpl->parse('main.loop');
        }
    }else{
        $xtpl->parse('main.no_loop');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}



/**
 * nv_theme_thuviensach_sachthuvien()
 * 
 * @param mixed $array_data
 * @return
 */
function nv_theme_thuviensach_sachthuvien($info_thuvien,$base_url,$num_items,$per_page,$page,$sth)
{
    global $module_info, $lang_module, $lang_global, $op,$module_upload,$module_name;

    $xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_info['module_theme']);
    $xtpl->assign('LANG', $lang_module);
    $xtpl->assign('GLANG', $lang_global);
    $xtpl->assign('info_thuvien', $info_thuvien);
    $generate_page = nv_generate_page($base_url, $num_items, $per_page, $page);
    if (!empty($generate_page)) {
        $xtpl->assign('NV_GENERATE_PAGE', $generate_page);
        $xtpl->parse('main.generate_page');
    }
    while ($view = $sth->fetch()) {
        $view['alias']=NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '='.$view['alias'];
        if (!empty($view['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/sach/' . $view['image'])) {
            $view['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/sach/' . $view['image'];
        }else{
            $view['image'] = NV_BASE_SITEURL  . 'themes/default/images/'.$module_upload.'/no_image.gif';
        }
        $view['so_lan_muon'] = $db->query('SELECT COUNT(*) FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach_sach WHERE muonsach_id IN(SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_muonsach WHERE status = 1 OR status = 2) AND sach_id = ' . $view['id'])->fetchColumn();
        $xtpl->assign('VIEW', $view);
        $xtpl->parse('main.loop');
    }
    $xtpl->parse('main');
    return $xtpl->text('main');
}