-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2016 at 05:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alus_stack`
--

-- --------------------------------------------------------

--
-- Table structure for table `alus_g`
--

CREATE TABLE IF NOT EXISTS `alus_g` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alus_g`
--

INSERT INTO `alus_g` (`id`, `name`, `description`) VALUES
(1, 'admin', 'test'),
(2, 'asd', 'sasdas'),
(6, 'Staff', ''),
(78, 'Maul', 'maul');

-- --------------------------------------------------------

--
-- Table structure for table `alus_gd`
--

CREATE TABLE IF NOT EXISTS `alus_gd` (
`agd_id` int(11) NOT NULL,
  `ag_id` int(11) DEFAULT NULL,
  `enabled` int(1) DEFAULT NULL,
  `table_name` varchar(50) DEFAULT NULL,
  `table_is_filter` int(1) DEFAULT NULL,
  `table_where` varchar(50) DEFAULT NULL,
  `table_filter` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alus_gd`
--

INSERT INTO `alus_gd` (`agd_id`, `ag_id`, `enabled`, `table_name`, `table_is_filter`, `table_where`, `table_filter`) VALUES
(1, 1, 1, 'Test Maul', NULL, NULL, '+1++2++3++5++7+'),
(2, 2, 1, 'tesst', NULL, NULL, '+24+'),
(4, 14, 1, 'teest', NULL, NULL, '+1+'),
(5, 15, 1, 'teest', NULL, NULL, NULL),
(6, 28, 1, 'teest', NULL, NULL, NULL),
(7, 17, 1, 'teest', NULL, NULL, NULL),
(8, 16, 1, 'teest', NULL, NULL, NULL),
(9, 27, 1, 'teest', NULL, NULL, NULL),
(10, 30, 1, 'teest', NULL, NULL, NULL),
(11, 29, 1, 'teest', NULL, NULL, NULL),
(12, 21, 1, 'Ma', NULL, NULL, '+2++10+'),
(13, 20, 1, 'teest', NULL, NULL, NULL),
(14, 22, 1, 'teest', NULL, NULL, NULL),
(15, 31, 1, 'teest', NULL, NULL, NULL),
(17, 24, 1, 'teest', NULL, NULL, '+49++50++51+'),
(18, 25, 1, 'teest', NULL, NULL, NULL),
(19, 26, 1, 'teest', NULL, NULL, '+5+'),
(20, 18, 1, 'teest', NULL, NULL, '+3+'),
(21, 23, 1, 'teest', NULL, NULL, '+234+'),
(22, 33, 1, 'teest', NULL, NULL, NULL),
(23, 34, 1, 'teest', NULL, NULL, NULL),
(25, 88, 1, 'Tables', NULL, NULL, '+1++5++49++50+'),
(26, 89, 1, 'Tables', NULL, NULL, '+5+'),
(27, 86, 1, 'maulanaaaaa', NULL, NULL, '+1+');

-- --------------------------------------------------------

--
-- Table structure for table `alus_la`
--

CREATE TABLE IF NOT EXISTS `alus_la` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alus_mg`
--

CREATE TABLE IF NOT EXISTS `alus_mg` (
`menu_id` int(5) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_nama` varchar(255) NOT NULL,
  `menu_uri` varchar(255) NOT NULL,
  `menu_target` varchar(255) DEFAULT NULL,
  `menu_icon` varchar(25) DEFAULT NULL,
  `order_num` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alus_mg`
--

INSERT INTO `alus_mg` (`menu_id`, `menu_parent`, `menu_nama`, `menu_uri`, `menu_target`, `menu_icon`, `order_num`) VALUES
(11, 0, 'Menus', 'menus', '', 'fa fa-bars fa-fw', 1),
(12, 0, 'Group', 'group', '', 'fa fa-users fa-fw', 2),
(13, 0, 'Users', 'users', '', 'fa fa-user fa-fw', 3),
(14, 0, 'Themes', 'theme', '', 'fa fa-archive fa-fw', 99);

-- --------------------------------------------------------

--
-- Table structure for table `alus_mga`
--

CREATE TABLE IF NOT EXISTS `alus_mga` (
`id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `can_view` int(1) DEFAULT NULL,
  `can_edit` int(1) NOT NULL DEFAULT '0',
  `can_add` int(1) NOT NULL DEFAULT '0',
  `can_delete` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2113 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alus_mga`
--

INSERT INTO `alus_mga` (`id`, `id_group`, `id_menu`, `can_view`, `can_edit`, `can_add`, `can_delete`) VALUES
(2078, 2, 11, 0, 0, 0, 0),
(2079, 2, 12, 0, 0, 0, 0),
(2080, 2, 13, 1, 0, 0, 0),
(2109, 1, 11, 1, 1, 1, 1),
(2110, 1, 12, 1, 1, 1, 1),
(2111, 1, 13, 1, 1, 1, 1),
(2112, 1, 14, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alus_u`
--

CREATE TABLE IF NOT EXISTS `alus_u` (
`id` int(11) unsigned NOT NULL,
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
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alus_u`
--

INSERT INTO `alus_u` (`id`, `username`, `job_title`, `abc`, `ip_address`, `ghi`, `def`, `mno`, `jkl`, `stu`, `pqr`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(29, 'gudangbuah', 'Warehouseman', 'gudang.buah@tbm.com', '127.0.0.1', '$2y$08$ePDGpmqzwYhYHZem.zW.aOkPIpLx3NMdvm/ZjYJ0vOAY84bTh6oDW', NULL, NULL, NULL, 1465981465, 'pQqXXyh6CeJGP4BTI.0QWe', 1436208963, 1465359260, 0, 'udang', 'hewan', 'tukang udang', '0000'),
(30, 'gudangbibit', 'Warehouseman', 'gudang.bibit@tbm.com', '127.0.0.1', '$2y$08$CPz5gxt7Vv5wTL0Q5z0OE.L8dALGqugipiPhzKv.y.B/Da6zbffZ6', NULL, 'e1c63a0651f609427770dcf082e5d97494220544', '2kzJn4S7Q9x3FJut48LbJ.ee777acfa8577dbc09', 1465981495, '3cCymOOxPi2fWNCjioww6.', 1436209008, 1451479367, 0, 'gudang', 'bibit', NULL, ''),
(32, 'gudangalat', 'x', 'gudang.alat@tbm.com', '127.0.0.1', '$2y$08$lPHgDVrbcBVtpEt6WvXd2eYjbpSxQcbLCZ6DIWFH2cygxfDlhMjPO', NULL, '2b78c8fb005a1899862c745f49a6ca4c7c3f6c00', 'yU7LZOdPdbGUcSMcdQ2l4e92c5fc6489d4c6f98b', 1465981515, 'JhgcjFjWuYAdSDpd4fGjAu', 1436209139, 1443502995, 0, 'gudang', 'aset', NULL, ''),
(33, 'outlet.buah', '', 'outlet.buah@tbm.com', '127.0.0.1', '$2y$08$1gkgI3jE.H6YubG1/tTC7uyEntn7VjeBADakhfR4t1NWzkTYru2Lm', NULL, NULL, 'QpQ3HGgp0NFOX-rbu.hlw.dab81105f3b283dae3', 1465981543, 'h8djR/9BgungIAWel6xv1u', 1436209602, 1450085946, 1, 'Outlet', 'Buah', NULL, ''),
(34, 'outlet.bibit', '', 'outlet.bibit@tbm.com', '127.0.0.1', '$2y$08$Muun10hNUBt9FUoD1A1X.u6RKQFeHd39NdB6vy9lGLADVi2Nzhqte', NULL, NULL, NULL, NULL, 'rC2IB7rfOPH4HyJZyXKnDO', 1436209656, 1453612330, 1, 'outlet', 'bibit', NULL, 'outlet.bibit'),
(36, 'koko', '', 'koko@as.com', '::1', '$2y$08$60vEdgO9NsadkI2D7k.yYO0S7mot5zL9wAzahiCOMXTAexFWbHLGC', 'F4EIGF.qLFQxqhQ8eih99O', NULL, NULL, NULL, NULL, 1466672265, NULL, 1, 'asd', 'asd', NULL, '123'),
(37, 'kokos', 'asd', 'koko@as1.com', '::1', '$2y$08$60vEdgO9NsadkI2D7k.yYO0S7mot5zL9wAzahiCOMXTAexFWbHLGC', 'OY2l2v9rkkk55Nc6kd.pZTEd.', NULL, NULL, NULL, NULL, 1466672288, 1466672588, 1, 'asd', 'asd', NULL, '12'),
(38, 'popo', 'asdasd', 'popo@as.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', NULL, NULL, NULL, NULL, NULL, 1466672364, NULL, 1, 'kopo', 'pop', NULL, '00'),
(39, 'pppp', 'asdas', 'popo@as1.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', NULL, NULL, NULL, NULL, NULL, 1466672381, 1466672494, 1, 'pppoop', 'popo', NULL, '0'),
(40, 'pppl', 'asd', 'admin@hp.com', '::1', '$2y$08$3nLHIacd0NmtKKdR28FTcepqr4t9akCR/cDebRIOrWYIOuTr173iS', NULL, NULL, NULL, NULL, NULL, 1466672426, NULL, 1, 'asdasd', 'asd', NULL, '0'),
(41, '1', '1', 'satu@gmail.cm', '::1', '$2y$08$LrBch3l.QvlN54zsMJ7UQ.7XBqOM3GlRCfnNBCdA3WGsx60afvvdy', 'B3LRXAo/hib4lnS1VNyXPO', NULL, NULL, NULL, NULL, 1466672699, 1466672742, 1, 'satu', '', NULL, '1'),
(42, 'dua', '2', 'dua@gmail.com', '::1', '$2y$08$ZQ6QtsbqFm4MeX1orT7w7eEQLXm47cH28vOP5KS3PKqOYHgiM.lDC', 'AdL.3VpT3W5PNhQuQOU3SO', NULL, NULL, NULL, NULL, 1466672721, 1466673008, 1, 'dua', '', NULL, '2'),
(43, 'tiga', '3', 'tiga@gmail.com', '::1', '0', 'XciwjlJwUQpRa8ZUF3clCO', NULL, NULL, NULL, NULL, 1466673247, NULL, 1, 'tiga', '', NULL, '0'),
(44, 'empat', '4', 'empat@gmail.com', '::1', '0', '7q1.J4sjCabToEUN/87yr.', NULL, NULL, NULL, NULL, 1466673304, NULL, 1, 'empat', 'as', NULL, '0'),
(45, 'lima', '5', 'lima@gmail.com', '::1', '0', 'msYFlwY4D.Vj0kXheaotVe', NULL, NULL, NULL, NULL, 1466673373, NULL, 1, 'lima', 's', NULL, '0'),
(46, 'enam', '6', 'enam@gmail.com', '::1', '$2y$08$AboMfG8ZhihSMz5NKj4Mte9iVOcsdopXug3rJmOPk4.wDtH1qKA16', 'hX/UN', NULL, NULL, NULL, NULL, 1466673541, NULL, 1, 'enam', '', NULL, '0'),
(47, 'tujuh', '7', '', '::1', '$2y$08$oIkZ22MqUFnJsvXpsEbWp.teEQp8NL7HoH3ofXgMZDPKqau4y0Jya', '.lpkA', NULL, NULL, NULL, NULL, 1466674148, NULL, 1, 'tujuh', 'tujuh', NULL, '7'),
(48, 'delapan', '8', 'cok+KyjMulmhMgb5JIc7lPy4BWtt2mi/xsmbS0uWO6J8', '::1', '$2y$08$ysjVNvr86P295VbFVmk46uBaQ/0euKGONu1zsKSYipidjld9sa2qK', 'VZcI2', NULL, NULL, NULL, NULL, 1466674250, NULL, 1, 'delapan', '', NULL, '98'),
(49, '', NULL, 'ZyfYPhOjNNnVxfLZpW31hkI=', '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'sembilan', '9', 'cCfZPQquO/fyz/7RoC+4ikAH', '::1', '$2y$08$FJEVZgQsLYAXJZKNf1Q55OYWmynMcqyC0mcj/Bk7aG4ydjyxVV/rq', 'YlMpC', NULL, NULL, 1467009145, NULL, 1466675415, 1467009158, 1, '12345678', 'sembillan', 'Aasd', '9'),
(51, 'Administrator', 'Admin', 'YibZNg2CO/3fwf2eqiz7', '::1', '$2y$08$Qv7eMwsjybApOzhBqWNyhOFMTJl/w.oG/gauyX5RfISDURMfTVCn.', 'x948KQefk5ChQosg', NULL, NULL, NULL, NULL, 1466741692, 1467602723, 1, 'Maulana', 'Rahman', 'cc', '085718816971');

-- --------------------------------------------------------

--
-- Table structure for table `alus_ug`
--

CREATE TABLE IF NOT EXISTS `alus_ug` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alus_ug`
--

INSERT INTO `alus_ug` (`id`, `user_id`, `group_id`) VALUES
(49, 29, 1),
(50, 29, 2),
(30, 36, 1),
(31, 37, 1),
(32, 38, 1),
(33, 39, 1),
(34, 40, 1),
(35, 41, 1),
(5, 42, 1),
(37, 43, 1),
(38, 44, 1),
(39, 45, 1),
(40, 46, 1),
(41, 47, 1),
(42, 48, 1),
(54, 50, 1),
(53, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(1) NOT NULL,
  `base_color` text,
  `base_menu` text,
  `base_modal` text,
  `base_close_modal` text,
  `base_text_modal_header` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `base_color`, `base_menu`, `base_modal`, `base_close_modal`, `base_text_modal_header`) VALUES
(1, 'linear-gradient(to bottom, rgba(40,45,51,1) 0%, rgba(40,45,51,1) 15%, rgba(41,46,52,1) 83%, rgba(40,45,51,1) 89%, rgba(55,67,84,1) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', 'linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)', 'white', 'white');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alus_g`
--
ALTER TABLE `alus_g`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alus_gd`
--
ALTER TABLE `alus_gd`
 ADD PRIMARY KEY (`agd_id`);

--
-- Indexes for table `alus_la`
--
ALTER TABLE `alus_la`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alus_mg`
--
ALTER TABLE `alus_mg`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `alus_mga`
--
ALTER TABLE `alus_mga`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alus_u`
--
ALTER TABLE `alus_u`
 ADD PRIMARY KEY (`id`), ADD KEY `sys_users_idx1` (`id`) USING BTREE, ADD KEY `sys_users_idx2` (`id`) USING BTREE;

--
-- Indexes for table `alus_ug`
--
ALTER TABLE `alus_ug`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alus_g`
--
ALTER TABLE `alus_g`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `alus_gd`
--
ALTER TABLE `alus_gd`
MODIFY `agd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `alus_la`
--
ALTER TABLE `alus_la`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `alus_mg`
--
ALTER TABLE `alus_mg`
MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `alus_mga`
--
ALTER TABLE `alus_mga`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2113;
--
-- AUTO_INCREMENT for table `alus_u`
--
ALTER TABLE `alus_u`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `alus_ug`
--
ALTER TABLE `alus_ug`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alus_ug`
--
ALTER TABLE `alus_ug`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `alus_g` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `alus_u` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
