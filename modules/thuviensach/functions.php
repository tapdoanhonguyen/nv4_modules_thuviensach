<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_SYSTEM'))
	die('Stop!!!');

define('NV_IS_MOD_THUVIENSACH', true);
require_once NV_ROOTDIR . '/modules/' . $module_file . '/global.functions.php';
if(count($array_op)>0){
	$array=explode('-',$array_op[0]);
	$catid=array_pop($array);
	$alias=implode('-',$array);

	if(is_numeric($catid)!=1){
		$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_cat where id='.$db->quote($catid).' and alias='.$db->quote($alias))->fetchColumn();
	}else{
		$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_cat where id='.$catid.' and alias='.$db->quote($alias))->fetchColumn();
	}
	if($check>0){
		$op='viewcat';
	}else{
		$alias=$array_op[0];
		$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($alias))->fetchColumn();
		if($check>0){
			$op='detail';
			$info_sach=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($alias))->fetch();
			$number_view=$db->query('SELECT number_view FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($alias))->fetchColumn();
			$number_view=$number_view+1;
			$db->query('UPDATE '.$db_config['prefix'].'_'.$module_data.'_sach SET number_view='.$number_view.' where alias='.$db->quote($alias));
		}else{
			$array=explode('-',$array_op[0]);
			$catid=array_pop($array);
			$alias=implode('-',$array);
			if(is_numeric($catid)!=1){
				$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where id='.$db->quote($catid).' and alias='.$db->quote($alias))->fetchColumn();
			}else{
				$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where id='.$catid.' and alias='.$db->quote($alias))->fetchColumn();
			}
			if($check>0){
				$op='sachtacgia';
				$info_tacgia=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where id='.$catid.' and alias='.$db->quote($alias))->fetch();
			}else{
				$array=explode('-',$array_op[0]);
				$thuvien_id=array_shift($array);
				$alias=implode('-',$array);
				if(is_numeric($thuvien_id)!=1){
					$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where id='.$db->quote($thuvien_id).' and alias='.$db->quote($alias))->fetchColumn();
				}else{
					$check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where id='.$thuvien_id.' and alias='.$db->quote($alias))->fetchColumn();
				}
				if($check>0){
					$op='viewcat_thuvien';
					$info_thuvien=$db->query('SELECT * FROM '.$db_config['prefix'].'_'.$module_data.'_thuvien where id='.$thuvien_id.' and alias='.$db->quote($alias))->fetch();
				}
			}
		}
	}
}
function thong_tin_danh_gia($id_sach)
{
	global $db, $module_data, $global_config,$db_config;

	$mang = [];
	$mang['danh_gia_trung_binh'] = round($db->query('SELECT avg(rate) FROM '.$db_config['prefix'].'_'.$module_data.'_comment where sach_id='.$id_sach)->fetchColumn(),1);

	return $mang;
}