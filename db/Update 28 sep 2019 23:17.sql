-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2019 at 11:18 PM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.1.32-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smk`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` tinyint(1) NOT NULL,
  `application` varchar(225) NOT NULL,
  `abbreviation` varchar(225) NOT NULL,
  `info` varchar(225) NOT NULL,
  `copyright` varchar(225) NOT NULL,
  `version` varchar(225) NOT NULL,
  `logo` varchar(225) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `application`, `abbreviation`, `info`, `copyright`, `version`, `logo`, `created`, `updated`, `updated_by`) VALUES
(1, 'SMK N 1 BUKATEJA', 'SKANSIKA', 'This application is a medium for buying and selling', 'SMK Negeri 1 Bukateja', 'v.01.0', '842952104.png', '2019-08-29 06:56:36', '2019-09-17 01:13:23', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `created`, `created_by`, `updated`, `updated_by`) VALUES
('1071565342', 'X TKJ 2', '2019-09-11 20:43:20', 'Super Admin', '0000-00-00 00:00:00', ''),
('1218884590', 'X TKR 2', '2019-09-17 22:22:28', 'Super Admin', '0000-00-00 00:00:00', ''),
('124951618', 'X TKJ 1', '2019-09-11 20:43:15', 'Super Admin', '0000-00-00 00:00:00', ''),
('1514836432', 'X TKR 3', '2019-09-17 22:22:36', 'Super Admin', '0000-00-00 00:00:00', ''),
('157266210', 'X TKR 4', '2019-09-17 22:22:41', 'Super Admin', '0000-00-00 00:00:00', ''),
('1586309113', 'X TKR 5', '2019-09-17 22:22:48', 'Super Admin', '0000-00-00 00:00:00', ''),
('1611842670', 'X TKJ 3', '2019-09-12 02:41:07', 'Super Admin', '2019-09-12 06:32:10', 'Super Admin'),
('1627631355', 'X BB 1', '2019-09-17 22:25:16', 'Super Admin', '0000-00-00 00:00:00', ''),
('1639858970', 'X MM 1', '2019-09-17 22:24:52', 'Super Admin', '0000-00-00 00:00:00', ''),
('1892834177', 'X TKJ 5', '2019-09-12 02:41:21', 'Super Admin', '0000-00-00 00:00:00', ''),
('1919633112', 'X TGB 1', '2019-09-17 22:25:37', 'Super Admin', '0000-00-00 00:00:00', ''),
('1980773608', 'X TKJ 4', '2019-09-12 02:41:12', 'Super Admin', '0000-00-00 00:00:00', ''),
('401582689', 'X TGB 3', '2019-09-17 22:25:59', 'Super Admin', '0000-00-00 00:00:00', ''),
('72602164', 'X TKR  1', '2019-09-17 22:22:21', 'Super Admin', '0000-00-00 00:00:00', ''),
('850914603', 'X MM 2', '2019-09-17 22:25:04', 'Super Admin', '0000-00-00 00:00:00', ''),
('912407370', 'X BB 2', '2019-09-17 22:25:24', 'Super Admin', '0000-00-00 00:00:00', ''),
('953478360', 'X TGB 2', '2019-09-17 22:25:50', 'Super Admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT 'System',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `name`, `created_by`, `created`, `updated`, `updated_by`, `is_active`) VALUES
(1, 'Super Admin', 'System', '0000-00-00 00:00:00', '2019-09-03 03:53:24', '', 1),
(2, 'Admin', 'System', '2019-08-21 06:02:16', '2019-08-27 23:47:42', '', 1),
(3, 'User', 'System', '2019-08-21 05:35:09', '2019-09-12 06:06:11', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` varchar(100) NOT NULL,
  `parent` varchar(100) DEFAULT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent`, `type`, `name`, `controller`, `icon`, `url`, `created`, `created_by`, `updated`, `updated_by`, `is_active`) VALUES
('001', '', 1, 'Dashboard', 'dashboard', ' fa fa-th', 'dashboard', '2019-08-28 00:19:22', 'Super Admin', '2019-09-03 04:02:21', 'Super Admin', 1),
('01', '', 2, 'Super Admin', '', 'fa fa-user-md', '', '2019-08-27 03:40:46', 'Super Admin', '2019-08-27 03:44:33', 'Super Admin', 1),
('02', '', 1, 'User Manager', 'user', 'fa fa-user', 'user', '2019-08-27 03:46:15', 'Super Admin', '2019-09-11 07:29:51', 'Super Admin', 1),
('03', '', 1, 'Access', '', 'fa fa-universal-access', '', '2019-08-27 03:49:37', 'Super Admin', '2019-08-27 03:49:37', '', 1),
('03.01', '03', 1, 'Group', 'group', 'fa fa-users', 'group', '2019-08-27 03:51:01', 'Super Admin', '2019-08-27 03:51:01', '', 1),
('03.02', '03', 1, 'Permission', 'permission', 'fa fa-lock', 'permission', '2019-08-27 03:57:17', 'Super Admin', '2019-08-27 03:57:17', '', 1),
('04', '', 1, 'Settings', '', 'fa fa-cogs', '', '2019-08-27 04:49:45', 'Super Admin', '2019-08-27 04:49:45', '', 1),
('04.01', '04', 1, 'Menu', 'menu', 'fa fa-server', 'menu', '2019-09-01 19:30:19', 'Super Admin', '2019-09-02 08:51:52', 'Super Admin', 1),
('04.02', '04', 1, 'About App', 'about', 'fa fa-info', 'about', '2019-08-27 04:58:11', 'Super Admin', '2019-08-27 04:58:11', '', 1),
('05', '', 2, 'Student', '', 'fa fa-graduation-cap', '', '2019-09-05 03:08:15', 'Super Admin', '2019-09-11 23:44:41', 'Super Admin', 1),
('06', '', 1, 'Student Manager', 'student', 'fa fa-user-circle', 'student', '2019-09-05 03:09:53', 'Super Admin', '2019-09-11 23:47:26', 'Super Admin', 1),
('07', '', 1, 'Class', 'classs', 'fa fa-users', 'classs', '2019-09-11 23:54:21', 'Super Admin', '2019-09-12 02:19:44', 'Super Admin', 1),
('08', '', 1, 'School Year', 'year', 'fa fa-calendar-o', 'year', '2019-09-12 04:13:47', 'Super Admin', '2019-09-12 16:13:47', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` int(10) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `id_group` int(10) NOT NULL,
  `_create` varchar(1) NOT NULL DEFAULT '0',
  `_read` tinyint(1) NOT NULL,
  `_update` tinyint(1) NOT NULL,
  `_delet` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `id_menu`, `id_group`, `_create`, `_read`, `_update`, `_delet`, `created`, `updated`, `is_active`) VALUES
(318, '001', 2, '1', 1, 1, 1, '2019-09-12 23:46:52', '2019-09-12 23:46:52', 0),
(319, '05', 2, '1', 1, 1, 1, '2019-09-12 23:46:52', '2019-09-12 23:46:52', 0),
(320, '06', 2, '1', 1, 1, 1, '2019-09-12 23:46:52', '2019-09-12 23:46:52', 0),
(321, '07', 2, '0', 1, 0, 0, '2019-09-12 23:46:52', '2019-09-12 23:46:52', 0),
(322, '001', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(323, '01', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(324, '02', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(325, '03', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(326, '03.01', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(327, '03.02', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(328, '04', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(329, '04.01', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(330, '04.02', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(331, '05', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(332, '06', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(333, '07', 1, '1', 1, 1, 1, '2019-09-17 23:41:55', '2019-09-17 23:41:55', 0),
(334, '08', 1, '1', 1, 1, 1, '2019-09-17 23:41:56', '2019-09-17 23:41:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` varchar(70) NOT NULL,
  `name` varchar(225) NOT NULL,
  `img1` varchar(225) NOT NULL,
  `img2` varchar(225) NOT NULL,
  `img3` varchar(225) NOT NULL,
  `harga` varchar(225) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(30) NOT NULL,
  `nis` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `tgl_lahir` varchar(225) NOT NULL,
  `class` varchar(225) NOT NULL,
  `period` varchar(225) NOT NULL,
  `ijasah` varchar(225) NOT NULL,
  `created_by` varchar(225) NOT NULL,
  `updated_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `nis`, `name`, `tgl_lahir`, `class`, `period`, `ijasah`, `created_by`, `updated_by`) VALUES
('1180353482', 21313123, 'indah permai', '11/11/2011', '124951618', '1905180110', 'indah_permai1818090919191919.pdf', 'Super Admin', 'Super Admin'),
('1750519718', 123456, 'onyip', '11/11/2011', '850914603', '708534124', '', 'Super Admin', ''),
('2091613381568767812', 121313, 'onyip', '11/12/2001', '124951618', '1905180110', '', 'Super Admin', ''),
('2095027237', 111111, 'paijo rohmat', '11/11/2011', '124951618', '1905180110', 'paijo_rohmat2626090919191919.pdf', 'Super Admin', ''),
('289233853', 231231, 'mas taken', '11/02/2001', '124951618', '1905180110', 'mas_taken1818090919191919.pdf', 'Super Admin', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `s_year`
--

CREATE TABLE `s_year` (
  `id` varchar(10) NOT NULL,
  `year` varchar(9) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_year`
--

INSERT INTO `s_year` (`id`, `year`, `created`, `created_by`, `updated`, `updated_by`) VALUES
('1905180110', '2018/2019', '2019-09-13 23:54:57', 'Super Admin', '2019-09-13 23:54:57', ''),
('708534124', '2019/2020', '2019-09-12 23:40:19', 'Super Admin', '2019-09-12 23:40:59', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `id_group` int(10) NOT NULL DEFAULT '3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `created`, `updated`, `is_active`, `id_group`) VALUES
('1053140371', 'kolawa', 'msoi', '$2y$10$bRmzdpprDZ7kd9fEPJdqDO4VD5/C8AIMD/BGUXelZiZ7vZH7G4soO', '2019-09-05 02:06:15', '2019-09-05 02:08:59', 0, 2),
('1140029943', 'Super Admin', 'superuser', '$2y$10$nMvGgHDzEuzYlL2U/wa6Dut0Exo8aq1UqpUJ0nx3AoPsZBi/gUIVq', '2019-08-26 02:33:14', '2019-08-28 02:40:22', 1, 1),
('1253269115', 'abadabad', 'abad', '$2y$10$s8kfQs5qxtQyywxeTzCY9e4cEDGb5q81647RUDaBzuQojTmd7Wv.u', '2019-09-28 15:47:38', '2019-09-28 15:47:38', 1, 3),
('1562632149', 'sda', 'sdac', '$2y$10$E3XxfxXBs0ySwNuYOwrIZ.7bEchpxQbrlyGBJqW2fTIDKIxJHjUE6', '2019-09-11 03:24:25', '2019-09-11 03:24:25', 1, 3),
('167498779', 'luar', 'luar', '$2y$10$/OopZ63P30SYOaLu4xJzvebnJcG0MDZeqpNGXVSKtD1hCmRA1WkBm', '2019-09-18 02:20:28', '2019-09-18 02:20:28', 0, 3),
('2067316134', 'koala', 'koala', '$2y$10$UAkLhv93L5/hQy1b/6Nxlumv9C85dJn9IkAZm1IuJ2HCYEcjTqRXK', '2019-09-05 02:06:41', '2019-09-05 02:09:06', 0, 2),
('2100117545', 'Admin User', 'admin', '$2y$10$ij1dASwU/vb/33kKk6YUi.O5AgsKFExQa/Cy3skA943lqr6lFs0FS', '2019-08-26 04:26:43', '2019-09-11 23:56:06', 1, 2),
('262611771', 'sdfdfs', 'sadad', '$2y$10$phJvpXMPKXFVynF7fZzwaObAVDr9jrB555lFAyl4jH8C8x8wu5wwy', '2019-09-10 20:55:55', '2019-09-11 08:55:55', 1, 3),
('36479392', 'roni', 'roni', '$2y$10$GpBkP/ZIPq6t7uM/SO.k4.rOnd.6ewG5FeNnin360oDfi.RtRUrlC', '2019-09-03 20:31:40', '2019-09-11 03:48:51', 1, 3),
('398093056', 'dddd', 'efwfew', '$2y$10$LO0TmrJy0u1BnddNJ2ZGQOTFldynP355MhDlWIBRjzqixJOkV9xA6', '2019-09-10 21:03:26', '2019-09-11 09:03:26', 1, 3),
('446534374', 'cavcsasc', 'rfsdfs', '$2y$10$pmecdaQ4Riw44TNXj55GDuAxn2yI9Yq7Xb7iOCcvxBtEw0MG7XJA2', '2019-09-10 02:24:44', '2019-09-10 14:24:44', 1, 3),
('470507575', 'abdul', 'abdul', '$2y$10$Dmafi4ZF7NBFeYPky8w2Bu2GhUrdTxrtUKcDbU1C7tzg.3MJH1HIO', '2019-09-03 20:31:29', '2019-09-05 23:44:18', 1, 3),
('475965087', 'hssyse', 'drydydr', '$2y$10$ZYtiibLtucUJerseZtUv5uxa9xzaYMybaTo0vF72TzWw.cHKjui6a', '2019-09-06 04:31:23', '2019-09-06 04:31:23', 1, 2),
('524057053', 'ssvdvs', 'aads', '$2y$10$2G1iqciTZzTyNmXPSf/P6OQJCs0ESpS799JbDz48OYns2kciCI/zq', '2019-09-11 03:50:31', '2019-09-11 03:50:31', 1, 3),
('566510267', 'Og Dang', 'ogdang', '$2y$10$RXQ2ZBFKGKXNfSyB3P8AGO8CtySSM9Xb.gpmJHXgvqjBCaoQRKtze', '2019-08-25 21:56:11', '2019-09-05 08:27:53', 1, 2),
('592721966', 'painem', 'apaaja', '$2y$10$cnQTEbu6Ts/L7F313WcOju9Xe.sLdl4Ym3ij/HaJDJfFywZIovi8u', '2019-09-05 00:08:24', '2019-09-05 02:09:31', 0, 2),
('90269817', 'Paijo', 'paijo', '$2y$10$d/BjH1O/MveYaacQmj9BIuXSuMXb3F75ZQNBqW1wqzoI6rppxrLQu', '2019-08-25 23:13:08', '2019-09-03 02:50:42', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s_year`
--
ALTER TABLE `s_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_3` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
