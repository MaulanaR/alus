/*
Navicat MySQL Data Transfer

Source Server         : phpmyadmin
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : alus_stack

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-06-13 13:50:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alus_groups
-- ----------------------------
DROP TABLE IF EXISTS `alus_groups`;
CREATE TABLE `alus_groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_groups
-- ----------------------------
INSERT INTO `alus_groups` VALUES ('1', 'admin', 'testings');
INSERT INTO `alus_groups` VALUES ('2', 'sasd', 's');
INSERT INTO `alus_groups` VALUES ('6', 'Staff', '');
INSERT INTO `alus_groups` VALUES ('9', 'Kasir Depan', '');
INSERT INTO `alus_groups` VALUES ('10', 'Kasir Buah', 'Kasir Buah');
INSERT INTO `alus_groups` VALUES ('11', 'Kasir Bibit', '');
INSERT INTO `alus_groups` VALUES ('12', 'Kasir Wahana', 'Kasir Wahana');
INSERT INTO `alus_groups` VALUES ('13', 'Gudang Buah', 'Gudang Buah');
INSERT INTO `alus_groups` VALUES ('14', 'Gudang Bibit', 'Gudang Bibit');
INSERT INTO `alus_groups` VALUES ('16', 'Outlet Buah', 'Outlet Buah');
INSERT INTO `alus_groups` VALUES ('17', 'Outlet Bibit', 'Outlet Bibit');
INSERT INTO `alus_groups` VALUES ('18', 'Outlet  Merchandise', 'Outlet Merchandise');
INSERT INTO `alus_groups` VALUES ('19', 'Spv Kasir Buah', '');
INSERT INTO `alus_groups` VALUES ('21', 'HRD', 'Human Resource Departmen');
INSERT INTO `alus_groups` VALUES ('22', 'Kasir Information Hall', 'Kasir Tour Family');
INSERT INTO `alus_groups` VALUES ('23', 'Spv Kasir Wahana', '');
INSERT INTO `alus_groups` VALUES ('24', 'Spv Kasir Bibit', '');
INSERT INTO `alus_groups` VALUES ('25', 'Kasir Souvenir', 'Jualan Souvenir');
INSERT INTO `alus_groups` VALUES ('26', 'Kasir Mix', 'Julan lebih dari jenis produk');
INSERT INTO `alus_groups` VALUES ('27', 'Finance', 'Finance');
INSERT INTO `alus_groups` VALUES ('28', 'Sales', 'sales');
INSERT INTO `alus_groups` VALUES ('30', 'PUW', 'PUW');
INSERT INTO `alus_groups` VALUES ('31', 'PUA', 'PUA');
INSERT INTO `alus_groups` VALUES ('32', 'Group Kasir', '');
INSERT INTO `alus_groups` VALUES ('33', 'Gudang Logistik', 'Gudang Logistik');
INSERT INTO `alus_groups` VALUES ('34', 'Purchasing', 'Purchasing , Cost Control');
INSERT INTO `alus_groups` VALUES ('36', 'Klinik', 'Pelayanan klinik');
INSERT INTO `alus_groups` VALUES ('37', 'Perpustakaan', 'Pelayanan perpustakaan');
INSERT INTO `alus_groups` VALUES ('38', 'IT', 'Bagian IT');
INSERT INTO `alus_groups` VALUES ('39', 'Markom', 'Marketing dan komunikasi');
INSERT INTO `alus_groups` VALUES ('40', 'Agro', 'Bagian agro atau produksi');
INSERT INTO `alus_groups` VALUES ('41', 'Umum & sarana', 'Bagian GA');
INSERT INTO `alus_groups` VALUES ('43', 'Outlet Loket A', 'Outlet Loket A');
INSERT INTO `alus_groups` VALUES ('44', 'Outlet Loket D', 'Outlet Loket D');
INSERT INTO `alus_groups` VALUES ('45', 'Outlet Bursa Buah', 'Outlet Bursa Buah');
INSERT INTO `alus_groups` VALUES ('46', 'Outlet Loket B', 'Outlet Loket B');
INSERT INTO `alus_groups` VALUES ('47', 'Outlet Loket C', 'Outlet Loket C');
INSERT INTO `alus_groups` VALUES ('48', 'Outlet Loket E Informasi', 'Outlet Loket E Informasi');
INSERT INTO `alus_groups` VALUES ('49', 'Outlet Garden Center', 'Outlet Garden Center');
INSERT INTO `alus_groups` VALUES ('50', 'Outlet Bazar Parkir', 'Outlet Bazar Parkir');
INSERT INTO `alus_groups` VALUES ('51', 'Gudang ATK', '');
INSERT INTO `alus_groups` VALUES ('52', 'Outlet Bazar Catur', 'Outlet Bazar Catur');
INSERT INTO `alus_groups` VALUES ('53', 'Gudang BO', '');
INSERT INTO `alus_groups` VALUES ('54', 'Outlet Belimbing', 'Outlet Belimbing');
INSERT INTO `alus_groups` VALUES ('55', 'Outlet Buah Danau', 'Outlet Buah Danau');
INSERT INTO `alus_groups` VALUES ('56', 'Outlet Family Garden', 'Outlet Family Garden');
INSERT INTO `alus_groups` VALUES ('57', 'Outlet GKS Info', 'Outlet GKS Info');
INSERT INTO `alus_groups` VALUES ('58', 'Outlet Kid Fan Valley', 'Outlet Kid Fan Valley');
INSERT INTO `alus_groups` VALUES ('59', 'Outlet Maskot', 'Outlet Maskot');
INSERT INTO `alus_groups` VALUES ('60', 'Outlet Melon', 'Outlet Melon');
INSERT INTO `alus_groups` VALUES ('61', 'Outlet Menara Pandang', 'Outlet Menara Pandang');
INSERT INTO `alus_groups` VALUES ('62', 'Outlet Polygon', 'Outlet Polygon');
INSERT INTO `alus_groups` VALUES ('63', 'Kasir Polygon', 'khusus polygon');
INSERT INTO `alus_groups` VALUES ('64', 'Outlet Pongo', 'Outlet Pongo');
INSERT INTO `alus_groups` VALUES ('65', 'Outlet Shelter Danau', 'Outlet Shelter Danau');
INSERT INTO `alus_groups` VALUES ('66', 'Outlet Souvenir Danau', 'Outlet Souvenir Danau');
INSERT INTO `alus_groups` VALUES ('67', 'Outlet Souvenir GKS', 'Outlet Souvenir GKS');
INSERT INTO `alus_groups` VALUES ('68', 'Outlet TCD', 'Outlet TCD');
INSERT INTO `alus_groups` VALUES ('69', 'Outlet Water Kingdom', 'Outlet Water Kingdom');
INSERT INTO `alus_groups` VALUES ('71', 'Group Outlet Bazar Bendera', 'Group Outlet Bazar Bendera');
INSERT INTO `alus_groups` VALUES ('72', 'Supervisor Finance', 'Role Supervisor Finance');
INSERT INTO `alus_groups` VALUES ('73', 'Asst. Spv Finance', '');
INSERT INTO `alus_groups` VALUES ('74', 'Outlet Tirta 6', '');
INSERT INTO `alus_groups` VALUES ('75', 'SPV Purchasing', 'SPV Purchasing');
INSERT INTO `alus_groups` VALUES ('76', 'Gudang Entertain', 'Gudang Entertain');
INSERT INTO `alus_groups` VALUES ('77', 'Wristband', 'allow menu cuma wristband, cek transfer receive dll');
INSERT INTO `alus_groups` VALUES ('78', 'Maul', 'maul');

-- ----------------------------
-- Table structure for alus_group_dataset
-- ----------------------------
DROP TABLE IF EXISTS `alus_group_dataset`;
CREATE TABLE `alus_group_dataset` (
  `agd_id` int(11) NOT NULL AUTO_INCREMENT,
  `ag_id` int(11) DEFAULT NULL,
  `enabled` int(1) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `table_is_filter` int(1) DEFAULT NULL,
  `table_where` varchar(50) DEFAULT NULL,
  `table_filter` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`agd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alus_group_dataset
-- ----------------------------
INSERT INTO `alus_group_dataset` VALUES ('1', '1', '1', 'Test Maul', null, null, '+1++2++3++5++7+');
INSERT INTO `alus_group_dataset` VALUES ('2', '2', '1', 'tesst', null, null, '+24+');
INSERT INTO `alus_group_dataset` VALUES ('4', '14', '1', 'teest', null, null, '+1+');
INSERT INTO `alus_group_dataset` VALUES ('5', '15', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('6', '28', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('7', '17', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('8', '16', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('9', '27', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('10', '30', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('11', '29', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('12', '21', '1', 'Ma', null, null, '+2++10+');
INSERT INTO `alus_group_dataset` VALUES ('13', '20', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('14', '22', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('15', '31', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('17', '24', '1', 'teest', null, null, '+49++50++51+');
INSERT INTO `alus_group_dataset` VALUES ('18', '25', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('19', '26', '1', 'teest', null, null, '+5+');
INSERT INTO `alus_group_dataset` VALUES ('20', '18', '1', 'teest', null, null, '+3+');
INSERT INTO `alus_group_dataset` VALUES ('21', '23', '1', 'teest', null, null, '+234+');
INSERT INTO `alus_group_dataset` VALUES ('22', '33', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('23', '34', '1', 'teest', null, null, null);
INSERT INTO `alus_group_dataset` VALUES ('25', '88', '1', 'Tables', null, null, '+1++5++49++50+');
INSERT INTO `alus_group_dataset` VALUES ('26', '89', '1', 'Tables', null, null, '+5+');
INSERT INTO `alus_group_dataset` VALUES ('27', '86', '1', 'maulanaaaaa', null, null, '+1+');

-- ----------------------------
-- Table structure for alus_menu_group
-- ----------------------------
DROP TABLE IF EXISTS `alus_menu_group`;
CREATE TABLE `alus_menu_group` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_parent` int(11) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_uri` varchar(255) NOT NULL,
  `menu_target` varchar(255) DEFAULT NULL,
  `order_num` int(5) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_menu_group
-- ----------------------------
INSERT INTO `alus_menu_group` VALUES ('11', '0', 'Menus', 'menus', '', '1');
INSERT INTO `alus_menu_group` VALUES ('12', '0', 'Group', 'group', null, '2');
INSERT INTO `alus_menu_group` VALUES ('13', '0', 'Users', 'users', '', '3');

-- ----------------------------
-- Table structure for alus_menu_group_akses
-- ----------------------------
DROP TABLE IF EXISTS `alus_menu_group_akses`;
CREATE TABLE `alus_menu_group_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `can_view` int(1) DEFAULT NULL,
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_add` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1948 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_menu_group_akses
-- ----------------------------
INSERT INTO `alus_menu_group_akses` VALUES ('1878', '2', '1', '1', '1', '1', '1');
INSERT INTO `alus_menu_group_akses` VALUES ('1879', '2', '8', '1', '1', '1', '1');
INSERT INTO `alus_menu_group_akses` VALUES ('1880', '2', '11', '1', '1', '1', '0');
INSERT INTO `alus_menu_group_akses` VALUES ('1945', '1', '11', '1', '1', '1', '1');
INSERT INTO `alus_menu_group_akses` VALUES ('1946', '1', '12', '1', '1', '1', '1');
INSERT INTO `alus_menu_group_akses` VALUES ('1947', '1', '13', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for alus_users
-- ----------------------------
DROP TABLE IF EXISTS `alus_users`;
CREATE TABLE `alus_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sys_users_idx1` (`id`) USING BTREE,
  KEY `sys_users_idx2` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=451 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_users
-- ----------------------------
INSERT INTO `alus_users` VALUES ('1', 'administrator', 'Admin', 'admin@admin.com', '127.0.0.1', '$2y$08$YmjyLVD2Wp/WwErOFVUCvuPhmTo8rhTGvl6/SONWUb/RpYsZJUKhi', '', '', null, null, '8q99xZciw5j4ABrnynr/k.', '1268889823', '1465800330', '1', 'Maulana', 'Rahman', 'ADMIN', '085718816971');
INSERT INTO `alus_users` VALUES ('29', 'gudangbuah', 'Warehouseman', 'gudang.buah@tbm.com', '127.0.0.1', '$2y$08$DGd5AzK45VOibMcATr6DIerqzdztCvXlLOWCSRycQS8NMGbqgs9nq', null, null, null, null, 'pQqXXyh6CeJGP4BTI.0QWe', '1436208963', '1465359260', '1', 'Gudang', 'Buah', 'Ass', 'gudangbuah');
INSERT INTO `alus_users` VALUES ('30', 'gudangbibit', 'Warehouseman', 'gudang.bibit@tbm.com', '127.0.0.1', '$2y$08$CPz5gxt7Vv5wTL0Q5z0OE.L8dALGqugipiPhzKv.y.B/Da6zbffZ6', null, 'e1c63a0651f609427770dcf082e5d97494220544', null, null, '3cCymOOxPi2fWNCjioww6.', '1436209008', '1451479367', '0', 'gudang', 'bibit', null, '');
INSERT INTO `alus_users` VALUES ('32', 'gudangalat', 'x', 'gudang.alat@tbm.com', '127.0.0.1', '$2y$08$lPHgDVrbcBVtpEt6WvXd2eYjbpSxQcbLCZ6DIWFH2cygxfDlhMjPO', null, '2b78c8fb005a1899862c745f49a6ca4c7c3f6c00', null, null, 'JhgcjFjWuYAdSDpd4fGjAu', '1436209139', '1443502995', '0', 'gudang', 'aset', null, '');
INSERT INTO `alus_users` VALUES ('33', 'outlet.buah', '', 'outlet.buah@tbm.com', '127.0.0.1', '$2y$08$1gkgI3jE.H6YubG1/tTC7uyEntn7VjeBADakhfR4t1NWzkTYru2Lm', null, null, null, null, 'h8djR/9BgungIAWel6xv1u', '1436209602', '1450085946', '1', 'Outlet', 'Buah', null, '');
INSERT INTO `alus_users` VALUES ('34', 'outlet.bibit', '', 'outlet.bibit@tbm.com', '127.0.0.1', '$2y$08$Muun10hNUBt9FUoD1A1X.u6RKQFeHd39NdB6vy9lGLADVi2Nzhqte', null, null, null, null, 'rC2IB7rfOPH4HyJZyXKnDO', '1436209656', '1453612330', '1', 'outlet', 'bibit', null, 'outlet.bibit');
INSERT INTO `alus_users` VALUES ('35', 'supervisor.kasirbuah', '', 'supervisor.kasirbuah@tbm.com', '127.0.0.1', '$2y$08$u3blPw4WPo0b/zrPQ.tZsOWuMi21h7pr4kEhOtY3SBb7q4GTUnqOu', null, 'c0453caf5beb0b82b4dece5579ae15924dc6419f', null, null, null, '1436209721', null, '0', 'supervisor', 'kasir buah', null, '');
INSERT INTO `alus_users` VALUES ('36', 'supervisor.kasirdepan', '', 'supervisor.kasirdepan@tbm.com', '127.0.0.1', '$2y$08$T9EyEZkiTEJ.Zvgtk68dfOHb4z9qIoqGp3RCj2VsLEylR0wWA2QLS', null, '1d672e413bad5af1059b1d8397a5e56cfe93022e', null, null, 'N4hNIL97iJ3TYTAoc32Tvu', '1436209764', '1443406510', '0', 'Supervisor', 'Kasir Depan', null, '');
INSERT INTO `alus_users` VALUES ('450', 'maulana', 'Web', 'maulana17061997@gmail.com', '::1', '$2y$08$Amc1iLW4lzrEU3cN75bSWuaAZ1GG0hMdV5XeRM1mkPwM0UsY8.xiu', null, null, null, null, null, '1465538298', null, '1', 'Maulana', 'Rahman', 'sa', '085718816971');

-- ----------------------------
-- Table structure for alus_users_groups
-- ----------------------------
DROP TABLE IF EXISTS `alus_users_groups`;
CREATE TABLE `alus_users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `alus_groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `alus_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_users_groups
-- ----------------------------
INSERT INTO `alus_users_groups` VALUES ('16', '1', '1');
INSERT INTO `alus_users_groups` VALUES ('17', '29', '1');
INSERT INTO `alus_users_groups` VALUES ('18', '450', '40');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------
