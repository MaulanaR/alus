/*
Navicat MySQL Data Transfer

Source Server         : phpmyadmin
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : alus_stack

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2016-08-12 17:31:46
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_g
-- ----------------------------
INSERT INTO `alus_g` VALUES ('1', 'admin', 'test');
INSERT INTO `alus_g` VALUES ('82', 'dua', 'dua');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_mg
-- ----------------------------
INSERT INTO `alus_mg` VALUES ('11', '0', 'Menus', 'menus', '', 'fa fa-cubes fa-fw', '1');
INSERT INTO `alus_mg` VALUES ('12', '0', 'Group', 'group', '', 'fa fa-diamond fa-fw', '2');
INSERT INTO `alus_mg` VALUES ('13', '0', 'User', 'users', '', 'fa fa-user-secret fa-fw', '3');
INSERT INTO `alus_mg` VALUES ('14', '0', 'Themes', 'themes', '', 'fa fa-laptop fa-fw', '99');
INSERT INTO `alus_mg` VALUES ('25', '0', 'encrypt', 'enc', '', 'fa fa-warning fa-fw', '1');

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
  `psv` datetime DEFAULT NULL,
  `pev` datetime DEFAULT NULL,
  `psed` datetime DEFAULT NULL,
  `peed` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2348 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_mga
-- ----------------------------
INSERT INTO `alus_mga` VALUES ('2253', '82', '11', '1', '1', '1', '0', null, null, null, null);
INSERT INTO `alus_mga` VALUES ('2254', '82', '12', '1', '1', '1', '0', null, null, null, null);
INSERT INTO `alus_mga` VALUES ('2255', '82', '13', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `alus_mga` VALUES ('2256', '82', '14', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `alus_mga` VALUES ('2257', '82', '25', '0', '0', '0', '0', null, null, null, null);
INSERT INTO `alus_mga` VALUES ('2343', '1', '11', '1', '1', '1', '1', '2016-08-08 12:05:00', '2016-08-08 12:05:00', '2016-08-08 12:06:00', '2016-08-08 12:06:00');
INSERT INTO `alus_mga` VALUES ('2344', '1', '12', '1', '1', '1', '1', '2016-08-08 12:05:00', '2016-08-09 12:05:00', '2016-08-08 12:06:00', '2016-08-09 12:06:00');
INSERT INTO `alus_mga` VALUES ('2345', '1', '13', '1', '1', '1', '1', '2016-08-08 12:05:00', '2016-08-09 13:50:00', '2016-08-08 12:06:00', '2016-08-09 13:50:00');
INSERT INTO `alus_mga` VALUES ('2346', '1', '14', '1', '1', '0', '1', '2016-08-08 12:05:00', '2016-08-08 12:06:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00');
INSERT INTO `alus_mga` VALUES ('2347', '1', '25', '1', '1', '1', '1', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '1970-01-01 01:00:00');

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
  `ht` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sys_users_idx1` (`id`) USING BTREE,
  KEY `sys_users_idx2` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_u
-- ----------------------------
INSERT INTO `alus_u` VALUES ('64', 'admins', 'admins', 'MTIzNDU2Nzg5MDEyMzQ1Nvqvv5U+5Kixew57njDPeg==', '::1', '$2y$08$.sbsuXatbF/d4/RvUy77GeeX/Nw48XoXXS/3Xurj7O/ujoQu3KGzK', 'xEfWFClsAdO4BnNm', null, null, null, null, '1469523580', '1470649200', '1', 'admin', 'master', null, '11', '0');
INSERT INTO `alus_u` VALUES ('65', 'test', 'test', 'MTIzNDU2Nzg5MDEyMzQ1Nu+uoYgQxa24fwk70zzN', '::1', '$2y$08$arl2m5l8HIyvdodqYRqDpOEHW/4hhd1.WPmfHq.aDVrpIM/LfHXLG', 'FfzX8RJ0USwRhey2', null, null, '1469609410', null, '1469609395', '1469609454', '0', 'test', 'tes', null, '12', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of alus_ug
-- ----------------------------
INSERT INTO `alus_ug` VALUES ('96', '64', '1');
INSERT INTO `alus_ug` VALUES ('93', '65', '1');

-- ----------------------------
-- Table structure for themes
-- ----------------------------
DROP TABLE IF EXISTS `themes`;
CREATE TABLE `themes` (
  `id` int(1) NOT NULL,
  `base_color` varchar(255) DEFAULT NULL,
  `base_menu` varchar(255) DEFAULT NULL,
  `base_modal` varchar(255) DEFAULT NULL,
  `base_close_modal` varchar(255) DEFAULT NULL,
  `base_text_modal_header` varchar(255) DEFAULT NULL,
  `base_color_head_datatables` varchar(255) DEFAULT NULL,
  `base_color_text_datatables` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of themes
-- ----------------------------
INSERT INTO `themes` VALUES ('1', 'linear-gradient(to bottom, rgba(40,45,51,1) 0%, rgba(40,45,51,1) 15%, rgba(41,46,52,1) 83%, rgba(40,45,51,1) 89%, rgba(55,67,84,1) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', '#FFFFFF', '#FFFFFF', '#384556', '#FFFFFF');
