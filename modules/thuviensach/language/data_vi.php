<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2023 VINADES.,JSC. All rights reserved
 * @License: Not free read more http://nukeviet.vn/vi/store/modules/nvtools/
 * @Createdate Fri, 07 Apr 2023 23:57:36 GMT
 */

if (!defined('NV_ADMIN'))
    die('Stop!!!');

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_cat (id, parentid, name_cat, alias, image, description, time_add, user_add, time_edit, user_edit, lev, sort, weight) VALUES('136', '0', 'Chuyển đổi số', 'chuyen-doi-so', '', '', '1680797131', '1', '0', '0', '0', '1', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_cat (id, parentid, name_cat, alias, image, description, time_add, user_add, time_edit, user_edit, lev, sort, weight) VALUES('135', '0', 'Học tập và làm theo bác', 'hoc-tap-va-lam-theo-bac', '', '', '1680797118', '1', '0', '0', '0', '2', '2')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_cat (id, parentid, name_cat, alias, image, description, time_add, user_add, time_edit, user_edit, lev, sort, weight) VALUES('134', '0', 'Sách chính trị', 'sach-chinh-tri', '', '', '1680797090', '1', '0', '0', '0', '3', '3')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_cat (id, parentid, name_cat, alias, image, description, time_add, user_add, time_edit, user_edit, lev, sort, weight) VALUES('133', '0', 'Tư liệu Văn kiện Đảng', 'tu-lieu-van-kien-dang', '', '', '1680797081', '1', '0', '0', '0', '4', '4')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('1', '2', '168', '3', 'Test ok', '1667986119', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('2', '2', '168', '4', 'Gởi đánh giá số 2', '1667986158', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('3', '2', '168', '5', 'OK nha', '1667987817', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('4', '2', '168', '4', 'Tốt nha bạn', '1667988618', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('5', '1', '168', '4', 'sdfasd', '1667989008', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('6', '1', '168', '5', 'sdf', '1667989025', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('7', '2', '168', '2', 'Không tốt chút nào', '1667989335', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_comment (id, userid, sach_id, rate, content, time_add, status) VALUES('8', '2', '6', '5', 'Tốt', '1668045105', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_nhaxuatban (id, ma_nhaxuatban, name, time_add, user_add, time_edit, user_edit, status) VALUES('4', 'NXB00000004', 'Nhà xuất bản 1', '1680797154', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('510', 'SACH00000510', '4', '303', '136', 'Hướng dẫn chuyển đổi số trong ngành Du lịch (Chuyển đổi nhận thức và thống nhất hành động)', 'huong-dan-chuyen-doi-so-trong-nganh-du-lich-chuyen-doi-nhan-thuc-va-thong-nhat-hanh-dong', 'biadulich_a1303da74a.png', '0', '', '1680797385', '1', '1680836341', '20', '', '', '118', '/uploads/thuviensach/de-an-chuyen-doi-so-cao-bang.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('511', 'SACH00000510', '4', '303', '135', 'Sổ tay các văn bản lãnh đạo, chỉ đạo việc học tập và làm theo tư tưởng, đạo đức, phong cách Hồ Chí Minh trên địa bàn tỉnh Hà Giang', 'so-tay-cac-van-ban-lanh-dao-chi-dao-viec-hoc-tap-va-lam-theo-tu-tuong-dao-duc-phong-cach-ho-chi-minh-tren-dia-ban-tinh-ha-giang', 'bia_cuon_so_tay_cac_van_ban_chi_dao_lanh_dao_2023_dd68f992a6.jpg', '50000', '', '1680797539', '1', '1680840961', '20', '', '', '245', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('512', 'SACH00000512', '4', '303', '136', 'sfsfsgfsg test', 'nghi-test', 'biadulich_a1303da74a.png', '0', '', '1680844703', '20', '1680862440', '20', '', '2212', '5', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('513', 'SACH00000513', '4', '303', '136', 'tegđhtest111', 'nghi-test111', 'biadulich_a1303da74a.png', '0', '', '1680844755', '20', '1680862429', '20', '', '11', '6', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('514', 'SACH00000514', '4', '303', '136', 'test333fbfhfhfdh', 'nghi-test333', 'biadulich_a1303da74a.png', '4', '', '1680844838', '20', '1680862414', '20', '', '1', '5', '/uploads/thuviensach/de-an-chuyen-doi-so-cao-bang.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('516', 'SACH00000516', '4', '303', '136', 'dảw534yryryry', 'daw534yryryry', 'bia_cuon_so_tay_cac_van_ban_chi_dao_lanh_dao_2023_dd68f992a6.jpg', '0', '', '1680844997', '20', '1680862388', '20', '', 'ỷyyyyyyyy', '4', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('517', 'SACH00000517', '4', '303', '136', 'testgdrerhdfhfdhf', 'nghi-testgdrerhdfhfdhf', 'bia_cuon_so_tay_cac_van_ban_chi_dao_lanh_dao_2023_dd68f992a6.jpg', '8', '', '1680845046', '20', '1680862370', '20', '', 'gdgdg', '3', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_sach (id, ma_sach, nhaxuatban_id, tacgia_id, danhmuc_id, name_sach, alias, image, price, description, time_add, user_add, time_edit, user_edit, mo_ta_ngan_gon, nam_xuat_ban, number_view, pdf) VALUES('518', 'SACH00000518', '4', '303', '136', 'Điểm sáng phong trào Thi đua Quyết thắng', 'diem-sang-phong-trao-thi-dua-quyet-thang', 'bia_cuon_so_tay_cac_van_ban_chi_dao_lanh_dao_2023_dd68f992a6.jpg', '0', '', '1680845133', '20', '1680860395', '1', '', 'd', '8', '/uploads/thuviensach/van_kien_tap_xi_2018_2020_61e7d0d6b9.pdf')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('26', '26', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('27', '27', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('28', '28', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('29', '29', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('30', '30', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('31', '31', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('32', '32', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('33', '33', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('34', '34', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('35', '35', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('36', '36', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('37', '37', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('38', '38', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('39', '39', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('40', '40', '1', '0', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('41', '41', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('42', '42', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('43', '43', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('44', '44', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('45', '45', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('46', '46', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('47', '47', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('48', '48', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('49', '49', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('50', '50', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('51', '51', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('52', '52', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('53', '53', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('54', '54', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('55', '55', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('56', '56', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('57', '57', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('58', '58', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('59', '59', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('60', '60', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('61', '61', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('62', '62', '1', '2', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('63', '63', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('64', '64', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('65', '65', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('66', '66', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('67', '67', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('68', '68', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('69', '69', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('70', '70', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('71', '71', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('72', '72', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('73', '73', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('74', '74', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('75', '75', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('76', '76', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('77', '77', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('78', '78', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('79', '79', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('80', '80', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('81', '81', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('82', '82', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('83', '83', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('84', '84', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('85', '85', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('86', '86', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('87', '87', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('88', '88', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('89', '89', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('90', '90', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('91', '91', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('92', '92', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('93', '93', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('94', '94', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('95', '95', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('96', '96', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('97', '97', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('98', '98', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('99', '99', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('100', '100', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('101', '101', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('102', '102', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('103', '103', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('104', '104', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('105', '105', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('106', '106', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('107', '107', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('108', '108', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('109', '109', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('110', '110', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('111', '111', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('112', '112', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('113', '113', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('114', '114', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('115', '115', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('116', '116', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('117', '117', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('118', '118', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('119', '119', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('120', '120', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('121', '121', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('122', '122', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('123', '123', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('124', '124', '1', '4', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('125', '125', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('126', '126', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('127', '127', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('128', '128', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('129', '129', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('130', '130', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('131', '131', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('132', '132', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('133', '133', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('134', '134', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('135', '135', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('136', '136', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('137', '137', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('138', '138', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('139', '139', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('140', '140', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('141', '141', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('142', '142', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('143', '143', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('144', '144', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('145', '145', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('146', '146', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('147', '147', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('148', '148', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('149', '149', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('150', '150', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('151', '151', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('152', '153', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('153', '154', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('154', '155', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('155', '156', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('156', '157', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('157', '158', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('158', '159', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('159', '160', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('160', '161', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('161', '162', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('162', '163', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('163', '164', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('164', '165', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('165', '166', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('166', '167', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('167', '168', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('168', '169', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('169', '170', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('170', '171', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('171', '172', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('172', '173', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('173', '174', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('174', '175', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('175', '176', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('176', '177', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('177', '178', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('178', '179', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('179', '180', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('180', '181', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('181', '182', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('182', '183', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('183', '184', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('184', '185', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('185', '186', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('186', '187', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('187', '188', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('188', '189', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('189', '190', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('190', '191', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('191', '192', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('192', '193', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('193', '194', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('194', '195', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('195', '196', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('196', '197', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('197', '198', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('198', '199', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('199', '200', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('200', '201', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('201', '202', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('202', '203', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('203', '204', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('204', '205', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('205', '206', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('206', '207', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('207', '208', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('208', '209', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('209', '210', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('210', '211', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('211', '212', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('212', '213', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('213', '214', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('214', '215', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('215', '216', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('216', '217', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('217', '218', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('218', '219', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('219', '220', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('220', '221', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('221', '222', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('222', '223', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('223', '224', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('224', '225', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('225', '226', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('226', '227', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('227', '228', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('228', '229', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('229', '230', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('230', '231', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('231', '232', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('232', '233', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('233', '234', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('234', '235', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('235', '236', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('236', '237', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('237', '238', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('238', '239', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('239', '240', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('240', '241', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('241', '242', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('242', '243', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('243', '244', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('244', '245', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('245', '246', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('246', '247', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('247', '248', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('248', '249', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('249', '250', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('250', '251', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('251', '252', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('252', '253', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('253', '254', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('254', '255', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('255', '256', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('256', '257', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('257', '258', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('258', '259', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('259', '260', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('260', '261', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('261', '262', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('262', '263', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('263', '264', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('264', '265', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('265', '266', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('266', '267', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('267', '268', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('268', '269', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('269', '270', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('270', '271', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('271', '272', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('272', '273', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('273', '274', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('274', '275', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('275', '276', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('276', '277', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('277', '278', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('278', '279', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('279', '280', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('280', '281', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('281', '282', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('282', '283', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('283', '284', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('284', '285', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('285', '286', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('286', '287', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('287', '288', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('288', '289', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('289', '290', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('290', '291', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('291', '292', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('292', '293', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('293', '294', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('294', '295', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('295', '296', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('296', '297', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('297', '298', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('298', '299', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('299', '300', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('300', '301', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('301', '302', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('302', '303', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('303', '304', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('304', '305', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('305', '306', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('306', '307', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('307', '308', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('308', '309', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('309', '310', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('310', '311', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('311', '312', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('312', '313', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('313', '314', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('314', '315', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('315', '316', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('316', '317', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('317', '318', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('318', '319', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('319', '320', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('320', '321', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('321', '322', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('322', '323', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('323', '324', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('324', '325', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('325', '326', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('326', '327', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('327', '328', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('328', '329', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('329', '330', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('330', '331', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('331', '332', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('332', '333', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('333', '334', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('334', '335', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('335', '336', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('336', '337', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('337', '338', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('338', '339', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('339', '340', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('340', '341', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('341', '342', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('342', '343', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('343', '344', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('344', '345', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('345', '346', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('346', '347', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('347', '348', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('348', '349', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('349', '350', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('350', '351', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('351', '352', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('352', '353', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('353', '354', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('354', '355', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('355', '356', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('356', '357', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('357', '358', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('358', '359', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('359', '360', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('360', '361', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('361', '362', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('362', '363', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('363', '364', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('364', '365', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('365', '366', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('366', '367', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('367', '368', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('368', '369', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('369', '370', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('370', '371', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('371', '372', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('372', '373', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('373', '374', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('374', '375', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('375', '376', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('376', '377', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('377', '378', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('378', '379', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('379', '380', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('380', '381', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('381', '382', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('382', '383', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('383', '384', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('384', '385', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('385', '386', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('386', '387', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('387', '388', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('388', '389', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('389', '390', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('390', '391', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('391', '392', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('392', '393', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('393', '394', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('394', '395', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('395', '396', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('396', '397', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('397', '398', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('398', '399', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('399', '400', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('400', '401', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('401', '402', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('402', '403', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('403', '404', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('404', '405', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('405', '406', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('406', '407', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('407', '408', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('408', '409', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('409', '410', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('410', '411', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('411', '412', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('412', '413', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('413', '414', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('414', '415', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('415', '416', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('416', '417', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('417', '418', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('418', '419', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('419', '420', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('420', '421', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('421', '422', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('422', '423', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('423', '424', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('424', '425', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('425', '426', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('426', '427', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('427', '428', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('428', '429', '1', '2', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('429', '430', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('430', '431', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('431', '432', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('432', '433', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('433', '434', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('434', '435', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('435', '436', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('436', '437', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('437', '438', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('438', '439', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('439', '440', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('440', '441', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('441', '442', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('442', '443', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('443', '444', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('444', '445', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('445', '446', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('446', '447', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('447', '448', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('448', '449', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('449', '450', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('450', '451', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('451', '452', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('452', '453', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('453', '454', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('454', '455', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('455', '456', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('456', '457', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('457', '458', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('458', '459', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('459', '460', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('460', '461', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('461', '462', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('462', '463', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('463', '464', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('464', '465', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('465', '466', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('466', '467', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('467', '468', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('468', '469', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('469', '470', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('470', '471', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('471', '472', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('472', '473', '1', '0', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('473', '474', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('474', '475', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('475', '476', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('476', '477', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('477', '478', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('478', '479', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('479', '480', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('480', '481', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('481', '482', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('482', '483', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('483', '484', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('484', '485', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('485', '486', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('486', '487', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('487', '488', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('488', '489', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('489', '490', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('490', '491', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('491', '492', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('492', '493', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('493', '494', '1', '2', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('494', '495', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('495', '496', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('496', '497', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('497', '498', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('498', '499', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('499', '500', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('500', '501', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('501', '502', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('502', '507', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('503', '506', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('504', '505', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('505', '504', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('506', '503', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_soluongsach (id, sach_id, thuvien_id, number, note) VALUES('507', '510', '1', '1', '')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}

try {
    $db->query("INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_tacgia (id, ma_tacgia, name_tacgia, alias, time_add, user_add, time_edit, user_edit, status) VALUES('303', 'TG00000303', 'Tác giả 1', 'Tac-gia-1', '1680797143', '1', '0', '0', '1')");
} catch (PDOException $e) {
    trigger_error($e->getMessage());
}
