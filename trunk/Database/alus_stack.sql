/*
Navicat MySQL Data Transfer

Source Server         : phpmyadmin
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : alus_stack

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-07-14 11:15:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for alus_g
-- ----------------------------
DROP TABLE IF EXISTS `alus_g`;
CREATE TABLE `alus_g` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_g
-- ----------------------------
INSERT INTO `alus_g` VALUES ('1', 'admin', 'test');
INSERT INTO `alus_g` VALUES ('2', 'asd', 'sasdas');
INSERT INTO `alus_g` VALUES ('6', 'Staff', '');
INSERT INTO `alus_g` VALUES ('78', 'Maul', 'maul');

-- ----------------------------
-- Table structure for alus_gd
-- ----------------------------
DROP TABLE IF EXISTS `alus_gd`;
CREATE TABLE `alus_gd` (
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
-- Records of alus_gd
-- ----------------------------
INSERT INTO `alus_gd` VALUES ('1', '1', '1', 'Test Maul', null, null, '+1++2++3++5++7+');
INSERT INTO `alus_gd` VALUES ('2', '2', '1', 'tesst', null, null, '+24+');
INSERT INTO `alus_gd` VALUES ('4', '14', '1', 'teest', null, null, '+1+');
INSERT INTO `alus_gd` VALUES ('5', '15', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('6', '28', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('7', '17', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('8', '16', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('9', '27', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('10', '30', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('11', '29', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('12', '21', '1', 'Ma', null, null, '+2++10+');
INSERT INTO `alus_gd` VALUES ('13', '20', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('14', '22', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('15', '31', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('17', '24', '1', 'teest', null, null, '+49++50++51+');
INSERT INTO `alus_gd` VALUES ('18', '25', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('19', '26', '1', 'teest', null, null, '+5+');
INSERT INTO `alus_gd` VALUES ('20', '18', '1', 'teest', null, null, '+3+');
INSERT INTO `alus_gd` VALUES ('21', '23', '1', 'teest', null, null, '+234+');
INSERT INTO `alus_gd` VALUES ('22', '33', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('23', '34', '1', 'teest', null, null, null);
INSERT INTO `alus_gd` VALUES ('25', '88', '1', 'Tables', null, null, '+1++5++49++50+');
INSERT INTO `alus_gd` VALUES ('26', '89', '1', 'Tables', null, null, '+5+');
INSERT INTO `alus_gd` VALUES ('27', '86', '1', 'maulanaaaaa', null, null, '+1+');

-- ----------------------------
-- Table structure for alus_la
-- ----------------------------
DROP TABLE IF EXISTS `alus_la`;
CREATE TABLE `alus_la` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_la
-- ----------------------------

-- ----------------------------
-- Table structure for alus_mg
-- ----------------------------
DROP TABLE IF EXISTS `alus_mg`;
CREATE TABLE `alus_mg` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_parent` int(11) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_uri` varchar(255) NOT NULL,
  `menu_target` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(25) DEFAULT NULL,
  `order_num` int(5) DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_mg
-- ----------------------------
INSERT INTO `alus_mg` VALUES ('11', '0', 'Menus', 'menus', '', 'fa fa-bars fa-fw', '1');
INSERT INTO `alus_mg` VALUES ('12', '0', 'Group', 'group', '', 'fa fa-users fa-fw', '2');
INSERT INTO `alus_mg` VALUES ('13', '0', 'Users', 'users', '', 'fa fa-user fa-fw', '3');
INSERT INTO `alus_mg` VALUES ('14', '0', 'Themes', 'theme', '', 'fa fa-archive fa-fw', '99');

-- ----------------------------
-- Table structure for alus_mga
-- ----------------------------
DROP TABLE IF EXISTS `alus_mga`;
CREATE TABLE `alus_mga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `can_view` int(1) DEFAULT NULL,
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_add` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_mga
-- ----------------------------
INSERT INTO `alus_mga` VALUES ('2078', '2', '11', '0', '0', '0', '0');
INSERT INTO `alus_mga` VALUES ('2079', '2', '12', '0', '0', '0', '0');
INSERT INTO `alus_mga` VALUES ('2080', '2', '13', '1', '0', '0', '0');
INSERT INTO `alus_mga` VALUES ('2109', '1', '11', '1', '1', '1', '1');
INSERT INTO `alus_mga` VALUES ('2110', '1', '12', '1', '1', '1', '1');
INSERT INTO `alus_mga` VALUES ('2111', '1', '13', '1', '1', '1', '1');
INSERT INTO `alus_mga` VALUES ('2112', '1', '14', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for alus_u
-- ----------------------------
DROP TABLE IF EXISTS `alus_u`;
CREATE TABLE `alus_u` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `abc` varchar(100) NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `ghi` varchar(255) NOT NULL,
  `def` varchar(255) DEFAULT NULL,
  `mno` varchar(40) DEFAULT NULL,
  `jkl` varchar(40) DEFAULT NULL,
  `stu` int(11) unsigned DEFAULT NULL,
  `pqr` varchar(40) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_u
-- ----------------------------
INSERT INTO `alus_u` VALUES ('29', 'gudangbuah', 'Warehouseman', 'gudang.buah@tbm.com', '127.0.0.1', '$2y$08$ePDGpmqzwYhYHZem.zW.aOkPIpLx3NMdvm/ZjYJ0vOAY84bTh6oDW', null, null, null, '1465981465', 'pQqXXyh6CeJGP4BTI.0QWe', '1436208963', '1465359260', '0', 'udang', 'hewan', 'tukang udang', '0000');
INSERT INTO `alus_u` VALUES ('30', 'gudangbibit', 'Warehouseman', 'gudang.bibit@tbm.com', '127.0.0.1', '$2y$08$CPz5gxt7Vv5wTL0Q5z0OE.L8dALGqugipiPhzKv.y.B/Da6zbffZ6', null, 'e1c63a0651f609427770dcf082e5d97494220544', '2kzJn4S7Q9x3FJut48LbJ.ee777acfa8577dbc09', '1465981495', '3cCymOOxPi2fWNCjioww6.', '1436209008', '1451479367', '0', 'gudang', 'bibit', null, '');
INSERT INTO `alus_u` VALUES ('32', 'gudangalat', 'x', 'gudang.alat@tbm.com', '127.0.0.1', '$2y$08$lPHgDVrbcBVtpEt6WvXd2eYjbpSxQcbLCZ6DIWFH2cygxfDlhMjPO', null, '2b78c8fb005a1899862c745f49a6ca4c7c3f6c00', 'yU7LZOdPdbGUcSMcdQ2l4e92c5fc6489d4c6f98b', '1465981515', 'JhgcjFjWuYAdSDpd4fGjAu', '1436209139', '1443502995', '0', 'gudang', 'aset', null, '');
INSERT INTO `alus_u` VALUES ('33', 'outlet.buah', '', 'outlet.buah@tbm.com', '127.0.0.1', '$2y$08$1gkgI3jE.H6YubG1/tTC7uyEntn7VjeBADakhfR4t1NWzkTYru2Lm', null, null, 'QpQ3HGgp0NFOX-rbu.hlw.dab81105f3b283dae3', '1465981543', 'h8djR/9BgungIAWel6xv1u', '1436209602', '1450085946', '1', 'Outlet', 'Buah', null, '');
INSERT INTO `alus_u` VALUES ('34', 'outlet.bibit', '', 'outlet.bibit@tbm.com', '127.0.0.1', '$2y$08$Muun10hNUBt9FUoD1A1X.u6RKQFeHd39NdB6vy9lGLADVi2Nzhqte', null, null, null, null, 'rC2IB7rfOPH4HyJZyXKnDO', '1436209656', '1453612330', '1', 'outlet', 'bibit', null, 'outlet.bibit');
INSERT INTO `alus_u` VALUES ('36', 'koko', '', 'koko@as.com', '::1', '$2y$08$60vEdgO9NsadkI2D7k.yYO0S7mot5zL9wAzahiCOMXTAexFWbHLGC', 'F4EIGF.qLFQxqhQ8eih99O', null, null, null, null, '1466672265', null, '1', 'asd', 'asd', null, '123');
INSERT INTO `alus_u` VALUES ('37', 'kokos', 'asd', 'koko@as1.com', '::1', '$2y$08$60vEdgO9NsadkI2D7k.yYO0S7mot5zL9wAzahiCOMXTAexFWbHLGC', 'OY2l2v9rkkk55Nc6kd.pZTEd.', null, null, null, null, '1466672288', '1466672588', '1', 'asd', 'asd', null, '12');
INSERT INTO `alus_u` VALUES ('38', 'popo', 'asdasd', 'popo@as.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', null, null, null, null, null, '1466672364', null, '1', 'kopo', 'pop', null, '00');
INSERT INTO `alus_u` VALUES ('39', 'pppp', 'asdas', 'popo@as1.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', null, null, null, null, null, '1466672381', '1466672494', '1', 'pppoop', 'popo', null, '0');
INSERT INTO `alus_u` VALUES ('40', 'pppl', 'asd', 'admin@hp.com', '::1', '$2y$08$3nLHIacd0NmtKKdR28FTcepqr4t9akCR/cDebRIOrWYIOuTr173iS', null, null, null, null, null, '1466672426', null, '1', 'asdasd', 'asd', null, '0');
INSERT INTO `alus_u` VALUES ('41', '1', '1', 'satu@gmail.cm', '::1', '$2y$08$LrBch3l.QvlN54zsMJ7UQ.7XBqOM3GlRCfnNBCdA3WGsx60afvvdy', 'B3LRXAo/hib4lnS1VNyXPO', null, null, null, null, '1466672699', '1466672742', '1', 'satu', '', null, '1');
INSERT INTO `alus_u` VALUES ('42', 'dua', '2', 'dua@gmail.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', 'AdL.3VpT3W5PNhQuQOU3SO', null, null, null, null, '1466672721', '1466673008', '1', 'dua', '', null, '2');
INSERT INTO `alus_u` VALUES ('43', 'tiga', '3', 'tiga@gmail.com', '::1', '0', 'XciwjlJwUQpRa8ZUF3clCO', null, null, null, null, '1466673247', null, '1', 'tiga', '', null, '0');
INSERT INTO `alus_u` VALUES ('44', 'empat', '4', 'empat@gmail.com', '::1', '0', '7q1.J4sjCabToEUN/87yr.', null, null, null, null, '1466673304', null, '1', 'empat', 'as', null, '0');
INSERT INTO `alus_u` VALUES ('45', 'lima', '5', 'lima@gmail.com', '::1', '0', 'msYFlwY4D.Vj0kXheaotVe', null, null, null, null, '1466673373', null, '1', 'lima', 's', null, '0');
INSERT INTO `alus_u` VALUES ('46', 'enam', '6', 'enam@gmail.com', '::1', '$2y$08$AboMfG8ZhihSMz5NKj4Mte9iVOcsdopXug3rJmOPk4.wDtH1qKA16', 'hX/UN', null, null, null, null, '1466673541', null, '1', 'enam', '', null, '0');
INSERT INTO `alus_u` VALUES ('47', 'tujuh', '7', '', '::1', '$2y$08$oIkZ22MqUFnJsvXpsEbWp.teEQp8NL7HoH3ofXgMZDPKqau4y0Jya', '.lpkA', null, null, null, null, '1466674148', null, '1', 'tujuh', 'tujuh', null, '7');
INSERT INTO `alus_u` VALUES ('48', 'delapan', '8', 'cok+KyjMulmhMgb5JIc7lPy4BWtt2mi/xsmbS0uWO6J8', '::1', '$2y$08$ysjVNvr86P295VbFVmk46uBaQ/0euKGONu1zsKSYipidjld9sa2qK', 'VZcI2', null, null, null, null, '1466674250', null, '1', 'delapan', '', null, '98');
INSERT INTO `alus_u` VALUES ('49', '', null, 'ZyfYPhOjNNnVxfLZpW31hkI=', '', '', null, null, null, null, null, '0', null, null, null, null, null, null);
INSERT INTO `alus_u` VALUES ('50', 'sembilan', '9', 'cCfZPQquO/fyz/7RoC+4ikAH', '::1', '$2y$08$FJEVZgQsLYAXJZKNf1Q55OYWmynMcqyC0mcj/Bk7aG4ydjyxVV/rq', 'YlMpC', null, null, '1467009145', null, '1466675415', '1467009158', '1', '12345678', 'sembillan', 'Aasd', '9');
INSERT INTO `alus_u` VALUES ('51', 'Administrator', 'Admin', 'YibZNg2CO/3fwf2eqiz7', '::1', '$2y$08$Qv7eMwsjybApOzhBqWNyhOFMTJl/w.oG/gauyX5RfISDURMfTVCn.', 'x948KQefk5ChQosg', null, null, null, null, '1466741692', '1467602723', '1', 'Maulana', 'Rahman', 'cc', '085718816971');

-- ----------------------------
-- Table structure for alus_ug
-- ----------------------------
DROP TABLE IF EXISTS `alus_ug`;
CREATE TABLE `alus_ug` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `alus_g` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `alus_u` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_ug
-- ----------------------------
INSERT INTO `alus_ug` VALUES ('49', '29', '1');
INSERT INTO `alus_ug` VALUES ('50', '29', '2');
INSERT INTO `alus_ug` VALUES ('30', '36', '1');
INSERT INTO `alus_ug` VALUES ('31', '37', '1');
INSERT INTO `alus_ug` VALUES ('32', '38', '1');
INSERT INTO `alus_ug` VALUES ('33', '39', '1');
INSERT INTO `alus_ug` VALUES ('34', '40', '1');
INSERT INTO `alus_ug` VALUES ('35', '41', '1');
INSERT INTO `alus_ug` VALUES ('5', '42', '1');
INSERT INTO `alus_ug` VALUES ('37', '43', '1');
INSERT INTO `alus_ug` VALUES ('38', '44', '1');
INSERT INTO `alus_ug` VALUES ('39', '45', '1');
INSERT INTO `alus_ug` VALUES ('40', '46', '1');
INSERT INTO `alus_ug` VALUES ('41', '47', '1');
INSERT INTO `alus_ug` VALUES ('42', '48', '1');
INSERT INTO `alus_ug` VALUES ('54', '50', '1');
INSERT INTO `alus_ug` VALUES ('53', '51', '1');

-- ----------------------------
-- Table structure for themes
-- ----------------------------
DROP TABLE IF EXISTS `themes`;
CREATE TABLE `themes` (
  `id` int(1) NOT NULL,
  `base_color` text,
  `base_menu` text,
  `base_modal` text,
  `base_close_modal` text,
  `base_text_modal_header` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of themes
-- ----------------------------
INSERT INTO `themes` VALUES ('1', 'linear-gradient(to bottom, rgba(40,45,51,1) 0%, rgba(40,45,51,1) 15%, rgba(41,46,52,1) 83%, rgba(40,45,51,1) 89%, rgba(55,67,84,1) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', 'white', 'white');
