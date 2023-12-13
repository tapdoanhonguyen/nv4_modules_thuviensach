<?php

/**
 * @Project NUKEVIET 4.x
 * @author Thạch Cảnh Bình <bnhthach@gmail.com>
 * @Copyright (C) 2022 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Thu, 27 Oct 2022 01:18:43 GMT
 */

if (!defined('NV_IS_FILE_ADMIN'))
  die('Stop!!!');

$page_title = $lang_module['tacgiaimport'];
if(isset($_POST['import']))
{
  $allowedExts = array("xlsx");
  $temp = explode(".", $_FILES["excel"]["name"]);
  $extension = end($temp);
  if (($_FILES["excel"]["size"] < 200000000000) && in_array($extension, $allowedExts)) {
    if ($_FILES["excel"]["error"] > 0)
      echo "Return Code: " . $_FILES["excel"]["error"] . "<br>";
    else{
      $filename = NV_ROOTDIR . '/' . NV_UPLOADS_DIR . '/' . $module_upload . '/excel';

      if  (!file_exists($filename)) {
        mkdir(NV_UPLOADS_DIR . '/' . $module_upload .  '/excel', 0777);
      } 


      if (file_exists($filename . '/' . $_FILES["excel"]["name"])){
        unlink($filename .'/'. $_FILES["excel"]["name"]);
      }

      move_uploaded_file($_FILES["excel"]["tmp_name"],$filename .'/'. $_FILES["excel"]["name"]); 

      $file = $filename .'/'. $_FILES["excel"]["name"]; 

      require_once NV_ROOTDIR . '/modules/'. $module_file .'/Classes/PHPExcel.php';

      $objFile = PHPExcel_IOFactory::identify($file);
      $objData = PHPExcel_IOFactory::createReader($objFile);
      $objData->setReadDataOnly(true);
      $objPHPExcel = $objData->load($file);
      $sheet  = $objPHPExcel->setActiveSheetIndex(0);
      $Totalrow = $sheet->getHighestRow();
      $LastColumn = $sheet->getHighestColumn();
      $TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
      $data_bds = [];
      $row = array();
      for ($i = 2; $i <= $Totalrow; $i++)
      {
        $data_bds[$i]=array(
          "stt"=> $sheet->getCellByColumnAndRow(0, $i)->getValue(),
          "ma_tacgia"=>trim($sheet->getCellByColumnAndRow(1, $i)->getValue()),
          "name"=>trim($sheet->getCellByColumnAndRow(2, $i)->getValue())
          );
      }
      foreach($data_bds as $key => $row){
        $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where ma_tacgia='.$db->quote($row['ma_tacgia']))->fetchColumn();
        if($check==0){
          $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_tacgia"')->fetchColumn();
          $row['ma_tacgia'] = sprintf($config_setting['raw_tacgia'],$row['id_next']);
          $row['time_add'] = NV_CURRENTTIME ;
          $row['user_add'] = $admin_info['userid'];
          $row['alias'] = change_alias($row['name']);

          $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_tacgia (name_tacgia, time_add, user_add, status,ma_tacgia,alias) VALUES (:name_tacgia, :time_add, :user_add,:status,:ma_tacgia,:alias)');

          $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
          $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
          $stmt->bindValue(':status', 1, PDO::PARAM_INT);
          $stmt->bindParam(':ma_tacgia', $row['ma_tacgia'], PDO::PARAM_STR);
          $stmt->bindParam(':name_tacgia', $row['name'], PDO::PARAM_STR);
          $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);

          $exc = $stmt->execute();
          if ($exc) {
            $nv_Cache->delMod($module_name);
            if (empty($row['id'])) {
              nv_insert_logs(NV_LANG_DATA, $module_name, 'Add tacgia', 'ID: ' . $row['id_next'], $admin_info['userid']);
            }
          }
        }else{
          $row['id']=$db->query('SELECT id FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where ma_tacgia='.$db->quote($row['ma_tacgia']))->fetchColumn();
          $row['alias'] = change_alias($row['name']);

          $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_tacgia SET name_tacgia = :name_tacgia, time_edit='.NV_CURRENTTIME.', user_edit='.$admin_info['userid'].',alias=:alias WHERE id=' . $row['id']);
          $stmt->bindParam(':name_tacgia', $row['name'], PDO::PARAM_STR);
          $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);

          $exc = $stmt->execute();
          if ($exc) {
            $nv_Cache->delMod($module_name);
            nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit tacgia', 'ID: ' . $row['id'], $admin_info['userid']);
            
          }
        }
      }
      nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=tacgia');
    }
  }
}

$xtpl = new XTemplate('tacgiaimport.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
