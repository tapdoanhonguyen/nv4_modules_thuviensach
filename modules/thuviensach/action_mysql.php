<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 07 Apr 2023 23:57:36 GMT
 */

if (!defined('NV_IS_FILE_MODULES'))
    die('Stop!!!');

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_cat";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_comment";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_config";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_doi_sach";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_doi_sach_detail";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_muonsach";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_muonsach_sach";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_nhaxuatban";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_sach";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_sach_request";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_soluongsach";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_tacgia";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_thuvien";
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $module_data . "_yeu_thich";

$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_cat(
  id int(11) NOT NULL AUTO_INCREMENT,
  parentid int(11) NOT NULL,
  name_cat varchar(255) NOT NULL COMMENT 'Tên chuyên mục',
  alias varchar(255) NOT NULL COMMENT 'Liên kết tĩnh',
  image varchar(255) NOT NULL COMMENT 'Hình minh họa',
  description text NOT NULL COMMENT 'Mô tả',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  lev int(11) NOT NULL,
  sort int(11) NOT NULL,
  weight int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_comment(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  sach_id int(11) NOT NULL,
  rate int(11) NOT NULL,
  content text NOT NULL,
  time_add int(11) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_config(
  id int(11) NOT NULL AUTO_INCREMENT,
  config_name text NOT NULL,
  config_value text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_doi_sach(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_sach int(11) NOT NULL,
  sdt varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  ho_va_ten varchar(255) NOT NULL,
  cmnd varchar(255) NOT NULL,
  time_add int(11) NOT NULL,
  status int(11) NOT NULL,
  id_thu_vien int(11) NOT NULL,
  tinh_trang varchar(255) NOT NULL,
  userid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_doi_sach_detail(
  id int(11) NOT NULL AUTO_INCREMENT,
  id_doi_sach int(11) NOT NULL,
  ten_sach varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_muonsach(
  id int(11) NOT NULL AUTO_INCREMENT,
  ma_muonsach varchar(255) NOT NULL COMMENT 'Mã mượn sách',
  userid int(11) NOT NULL,
  thuvien_id int(11) NOT NULL,
  name varchar(255) NOT NULL COMMENT 'Tên khách hàng',
  phone varchar(255) NOT NULL COMMENT 'Số điện thoại khách hàng',
  email varchar(255) NOT NULL COMMENT 'Email khách hàng',
  cmnd varchar(255) NOT NULL COMMENT 'CMND',
  time_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  time_tra int(11) DEFAULT NULL,
  user_tra int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_muonsach_sach(
  id int(11) NOT NULL AUTO_INCREMENT,
  muonsach_id int(11) NOT NULL,
  sach_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_nhaxuatban(
  id int(11) NOT NULL AUTO_INCREMENT,
  ma_nhaxuatban varchar(255) NOT NULL,
  name varchar(255) NOT NULL COMMENT 'Tên nhà xuất bản',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_sach(
  id int(11) NOT NULL AUTO_INCREMENT,
  ma_sach varchar(255) NOT NULL COMMENT 'Mã sách',
  nhaxuatban_id int(11) NOT NULL COMMENT 'Nhà xuất bản',
  tacgia_id int(11) NOT NULL COMMENT 'Tác giả',
  danhmuc_id int(11) NOT NULL COMMENT 'Danh mục',
  name_sach varchar(255) NOT NULL COMMENT 'Tên sách',
  alias varchar(255) NOT NULL COMMENT 'Liên kết tĩnh',
  image varchar(255) NOT NULL,
  price double NOT NULL COMMENT 'Giá bìa',
  description text NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  mo_ta_ngan_gon varchar(255) NOT NULL,
  nam_xuat_ban varchar(255) NOT NULL,
  number_view int(11) DEFAULT 0,
  pdf text DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_sach_request(
  id int(11) NOT NULL AUTO_INCREMENT,
  thuvien_id int(11) NOT NULL,
  nhaxuatban_id int(11) NOT NULL,
  tacgia_id int(11) NOT NULL,
  danhmuc_id int(11) NOT NULL,
  name_sach varchar(255) NOT NULL,
  image varchar(255) NOT NULL,
  price double NOT NULL,
  description text NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_soluongsach(
  id int(11) NOT NULL AUTO_INCREMENT,
  sach_id int(11) NOT NULL COMMENT 'Sách',
  thuvien_id int(11) NOT NULL COMMENT 'Thư viện',
  number double DEFAULT 0 COMMENT 'Số lượng',
  note text DEFAULT NULL COMMENT 'Ghi chú',
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_tacgia(
  id int(11) NOT NULL AUTO_INCREMENT,
  ma_tacgia varchar(255) NOT NULL,
  name_tacgia varchar(255) NOT NULL COMMENT 'Tên tác giả',
  alias varchar(255) NOT NULL,
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_thuvien(
  id int(11) NOT NULL AUTO_INCREMENT,
  ma_thuvien varchar(255) NOT NULL,
  name_thuvien varchar(255) NOT NULL COMMENT 'Tên thư viện',
  alias varchar(255) NOT NULL COMMENT 'Liên kết tĩnh',
  provinceid int(11) NOT NULL COMMENT 'Tỉnh thành',
  districtid int(11) NOT NULL COMMENT 'Quận huyện',
  description text NOT NULL COMMENT 'Mô tả',
  userid_quanly int(11) NOT NULL COMMENT 'Người quản lý',
  time_add int(11) NOT NULL,
  user_add int(11) NOT NULL,
  time_edit int(11) DEFAULT NULL,
  user_edit int(11) DEFAULT NULL,
  dia_chi text NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $module_data . "_yeu_thich(
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  sach_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('1', 'raw_nhaxuatban', 'NXB%08s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('2', 'raw_tacgia', 'TG%08s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('3', 'raw_sach', 'SACH%08s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('4', 'raw_thuvien', 'THUVIEN%08s')";
$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_config (id, config_name, config_value) VALUES('5', 'raw_muonsach', 'MUONSACH%08s')";
