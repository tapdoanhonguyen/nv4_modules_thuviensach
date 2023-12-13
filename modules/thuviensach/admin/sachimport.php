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

$page_title = $lang_module['sachimport'];
$error=array();
$success=array();
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
          "ma_sach"=>trim($sheet->getCellByColumnAndRow(1, $i)->getValue()),
          "name_sach"=>trim($sheet->getCellByColumnAndRow(2, $i)->getValue()),
          "alias"=>change_alias(trim($sheet->getCellByColumnAndRow(2, $i)->getValue())),
          "ma_nhaxuatban"=>trim($sheet->getCellByColumnAndRow(3, $i)->getValue()),
          "ma_tacgia"=>trim($sheet->getCellByColumnAndRow(4, $i)->getValue()),
          "danhmuc_id"=>trim($sheet->getCellByColumnAndRow(5, $i)->getValue()),
          "price"=>trim($sheet->getCellByColumnAndRow(6, $i)->getValue()),
          "noi_xuat_ban"=>trim($sheet->getCellByColumnAndRow(7, $i)->getValue()),
          "nam_xuat_ban"=>trim($sheet->getCellByColumnAndRow(8, $i)->getValue()),
          "description"=>trim($sheet->getCellByColumnAndRow(9, $i)->getValue())
        );
      }
      foreach($data_bds as $key => $row){
        $check_ma_nhaxuatban=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_nhaxuatban where ma_nhaxuatban='.$db->quote($row['ma_nhaxuatban']))->fetchColumn();
        if($check_ma_nhaxuatban==0){
          $error[]='Mã nhà xuất bản thuộc dòng '.$key.' trong file excel không tồn tại. Vui lòng kiểm tra lại';
        }else{
          $row['nhaxuatban_id']=$db->query('SELECT id FROM '.$db_config['prefix'].'_'.$module_data.'_nhaxuatban where ma_nhaxuatban='.$db->quote($row['ma_nhaxuatban']))->fetchColumn();
          $check_ma_tacgia=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where ma_tacgia='.$db->quote($row['ma_tacgia']))->fetchColumn();
          if($check_ma_tacgia==0){
            $error[]='Mã tác giả thuộc dòng '.$key.' trong file excel không tồn tại. Vui lòng kiểm tra lại';
          }else{
            $row['tacgia_id']=$db->query('SELECT id FROM '.$db_config['prefix'].'_'.$module_data.'_tacgia where ma_tacgia='.$db->quote($row['ma_tacgia']))->fetchColumn();
            $check_danhmuc=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_cat where id='.$row['danhmuc_id'])->fetchColumn();
            if($check_danhmuc==0){
              $error[]='ID Danh mục thuộc dòng '.$key.' trong file excel không tồn tại. Vui lòng kiểm tra lại';
            }else{
              $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where ma_sach='.$db->quote($row['ma_sach']))->fetchColumn();
              if($check==0){
                $row['time_add'] = NV_CURRENTTIME ;
                $row['user_add'] = $admin_info['userid'];
                $row['id_next']=$db->query('SELECT AUTO_INCREMENT FROM  INFORMATION_SCHEMA.TABLES  WHERE TABLE_SCHEMA  = "'.$db_config['dbsystem'].'" AND TABLE_NAME   = "' . $db_config['prefix'] . '_' . $module_data . '_sach"')->fetchColumn();
                $row['ma_sach'] = sprintf($config_setting['raw_sach'],$row['id_next']);
                $row['image']="";
                $check=$db->query('SELECT count(*) FROM '.$db_config['prefix'].'_'.$module_data.'_sach where alias='.$db->quote($row['alias']))->fetchColumn();
                if($check>0){
                  $error[] = 'Tên sách thuộc dòng '.$key.' trong file excel đã tồn tại';
                }else{
                  $stmt = $db->prepare('INSERT INTO ' . $db_config['prefix'] . '_' . $module_data . '_sach (noi_xuat_ban,nam_xuat_ban,ma_sach,nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add) VALUES (:noi_xuat_ban,:nam_xuat_ban,:ma_sach,:nhaxuatban_id, :tacgia_id, :danhmuc_id, :name_sach, :alias, :image, :price, :description, :time_add, :user_add)');
                  $stmt->bindParam(':noi_xuat_ban', $row['noi_xuat_ban'], PDO::PARAM_INT);
                  $stmt->bindParam(':nam_xuat_ban', $row['nam_xuat_ban'], PDO::PARAM_STR);
                  $stmt->bindParam(':time_add', $row['time_add'], PDO::PARAM_INT);
                  $stmt->bindParam(':user_add', $row['user_add'], PDO::PARAM_INT);
                  $stmt->bindParam(':ma_sach', $row['ma_sach'], PDO::PARAM_STR);
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
                    nv_insert_logs(NV_LANG_DATA, $module_name, 'Add sach', 'ID: ' . $row['id_next'], $admin_info['userid']);
                    $success[]='Thêm thành công dữ liệu dòng '.$key.' trong file excel';
                  }
                }
              }else{
                $row['id']=$db->query('SELECT id FROM '.$db_config['prefix'].'_'.$module_data.'_sach where ma_sach='.$db->quote($row['ma_sach']))->fetchColumn();
                $stmt = $db->prepare('UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_sach SET nam_xuat_ban = :nam_xuat_ban,noi_xuat_ban = :noi_xuat_ban,nhaxuatban_id = :nhaxuatban_id, tacgia_id = :tacgia_id, danhmuc_id = :danhmuc_id, name_sach = :name_sach, alias = :alias, price = :price, description = :description, time_edit='.NV_CURRENTTIME.',user_edit='.$admin_info['userid'].' WHERE id=' . $row['id']);
                $stmt->bindParam(':nam_xuat_ban', $row['nam_xuat_ban'], PDO::PARAM_STR);
                $stmt->bindParam(':noi_xuat_ban', $row['noi_xuat_ban'], PDO::PARAM_INT);
                $stmt->bindParam(':nhaxuatban_id', $row['nhaxuatban_id'], PDO::PARAM_INT);
                $stmt->bindParam(':tacgia_id', $row['tacgia_id'], PDO::PARAM_INT);
                $stmt->bindParam(':danhmuc_id', $row['danhmuc_id'], PDO::PARAM_INT);
                $stmt->bindParam(':name_sach', $row['name_sach'], PDO::PARAM_STR);
                $stmt->bindParam(':alias', $row['alias'], PDO::PARAM_STR);
                $stmt->bindParam(':price', $row['price'], PDO::PARAM_STR);
                $stmt->bindParam(':description', $row['description'], PDO::PARAM_STR, strlen($row['description']));
                $exc = $stmt->execute();
                if ($exc) {
                  $nv_Cache->delMod($module_name);
                  nv_insert_logs(NV_LANG_DATA, $module_name, 'Edit sach', 'ID: ' . $row['id'], $admin_info['userid']);
                  $success[]='Cập nhật thành công dữ liệu dòng '.$key.' trong file excel';
                }
              }
            }
          }
        }
      }
    }
  }
}

$xtpl = new XTemplate('sachimport.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('NV_LANG_VARIABLE', NV_LANG_VARIABLE);
$xtpl->assign('NV_LANG_DATA', NV_LANG_DATA);
$xtpl->assign('NV_BASE_ADMINURL', NV_BASE_ADMINURL);
$xtpl->assign('NV_NAME_VARIABLE', NV_NAME_VARIABLE);
$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
$xtpl->assign('MODULE_NAME', $module_name);
$xtpl->assign('OP', $op);

if (!empty($error)) {
  $xtpl->assign('ERROR', implode('<br />', $error));
  $xtpl->parse('main.error');
}

if (!empty($success)) {
  $xtpl->assign('SUCCESS', implode('<br />', $success));
  $xtpl->parse('main.success');
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';
