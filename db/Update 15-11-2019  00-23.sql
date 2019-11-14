-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.41-MariaDB-0ubuntu0.18.04.1 - Ubuntu 18.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table smk.about
CREATE TABLE IF NOT EXISTS `about` (
  `id` tinyint(1) NOT NULL,
  `application` varchar(225) NOT NULL,
  `abbreviation` varchar(225) NOT NULL,
  `info` varchar(225) NOT NULL,
  `copyright` varchar(225) NOT NULL,
  `version` varchar(225) NOT NULL,
  `logo` varchar(225) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.about: ~1 rows (approximately)
DELETE FROM `about`;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` (`id`, `application`, `abbreviation`, `info`, `copyright`, `version`, `logo`, `created`, `updated`, `updated_by`) VALUES
	(1, 'SMK N 1 BUKATEJA', 'SKANSIKA', 'This application is an application to set the subject of a diploma document, the purpose of making this application is to secure a diploma document as an archive of importance', 'SMK Negeri 1 Bukateja', '01.0.04', '730980530.jpg', '2019-08-29 13:56:36', '2019-11-03 20:27:33', 'Super Admin');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;

-- Dumping structure for table smk.announcement
CREATE TABLE IF NOT EXISTS `announcement` (
  `id` varchar(75) NOT NULL,
  `title` varchar(255) NOT NULL,
  `announcement` longtext NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL,
  `updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.announcement: ~2 rows (approximately)
DELETE FROM `announcement`;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` (`id`, `title`, `announcement`, `created`, `created_by`, `updated`, `updated_by`, `is_active`) VALUES
	('5d9b50199a9f31570459673191007094753', 'Peresmian Mikrotik Akademi dengan PT. Integrasi Data Nusantara (IDN Networkers)', '<p>Peresmian Mikrotik Akademy SMK Negeri 1 Bukateja Alhamdulillah berjalan lancar, Pada Hari Jumat, 7 Desember 2018, secara resmi Mikrotik Akademi SMK Negeri 1 Bukateja diresmikan oleh Kepala Sekolah berkerja sama dengan koordinator Mikrotik Akademy Indonesia PT. Integrasi Data Nusantara (IDN Networkers) yang dalam hal ini diwakili oleh Trainer Mikrotik Indonesia Oky Tria Saputra, MTCINE.</p>\r\n\r\n<p>Salah satu rangkaian acara Peresmian Mikrotik Akademi adalah diberikannya Bantuan Router Mikrotik 20 perangkat, Serah Terima MoU Mikrotik dengan Sekolah, dan pemberian sertifikat trainer kepada Guru TKJ SMK Negeri 1 Bukateja Khafidz NH, S.Pd, S.Kom,dan acara dilanjutkan  dengan IHT dengan tema Mengenal Mikrotik Akademi Sertifikasi Internasional untuk Teknisi Jaringan oleh Trainer Mikrotik Oky Tria Saputra, MTCINE.</p>\r\n\r\n<p>Acara IHT berlangsung sangat meriah dihadiri oleh perwakilan siswa TKJ SMK Negeri 1 Bukateja berjumlah 75 Siswa dan Guru IT (TKJ, MM dan KKPI). Dalam hal ini Trainer Mikrotik Oky Tria S, <s><em><strong>MTCINE</strong></em></s> menyampaikan pentingnya sertifikasi dalam bidang IT selain kemampuan kompetensi sebagai salah satu  bukti tentang kompetensi yng dimiliki adalah dengan kepemiikan sertifikasi, Banyak sertfikasi dalam bidang IT, Salah Satunya sertifikasi Mikrotik yang diakui di dalam negeri  dan internasional sehingga siswa SMK yang telah mengantongi sertifikasi Mikrotik dapat digunakan juga untuk bekerja di luar negeri.</p>\r\n\r\n<p>Dengan adanya Mikrotik Akademi, maka sekolah telah bekerja sama dengan Mikrotik Latvia Negara di Eropa untuk melaksanakan Ujian Sertifikasi Internasional Mikrotik untuk level MTCNA di sekolah, jadi  ini menjadi keuntungan siswa TKJ SMK Negeri 1 Bukateja untuk mengambil sertifikasi internasional di sekolah dengan ujian online berbahasa inggris langsung dari Mikrotik. Mudah-mudahan dengan peresmian ini menjadikan siswa-siswi SMK Negeri 1 Bukateja khususnya kompetensi keahlian Teknik Komputer Jaringan menjadi lebih semangat untuk meraih cita-citanya</p>\r\n', '2019-10-07 21:47:53', 'Super Admin', '2019-11-14 23:41:58', 'Super Admin', 1),
	('5d9c44632cc071570522211191008031011', 'Kami akan membantu Anda', '<h3>&nbsp;</h3>\r\n\r\n<p><img alt="" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3DEN7?ver=017a&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Bagikan dengan keluarga Anda</p>\r\n\r\n<p>Office 365 Home cocok untuk keluarga. Bagikan langganan Anda hingga dengan lima anggota keluarga lainnya.</p>\r\n\r\n<p><img alt="Icon_BuiltInAccessibility" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3C42D?ver=8b02&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Aksesibilitas bawaan mempermudah akses Anda</p>\r\n\r\n<p>Office 365 sangat mendukung aksesibilitas bagi semua orang dengan peralatan yang akan membantu Anda melakukan yang terbaik.</p>\r\n\r\n<p><img alt="" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3C9f6?ver=6555&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Selesaikan lebih banyak hal bersama-sama</p>\r\n\r\n<p>Lakukan penulisan bersama di Word, PowerPoint, dan OneNote, lalu bagikan dari dokumen Anda cukup dengan sekali klik.</p>\r\n\r\n<p><img alt="" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3BR24?ver=b3b6&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Selalu diperbarui</p>\r\n\r\n<p>Dengan langganan aktif Office 365, Anda mendapatkan aplikasi, fitur, dan layanan Office terbaru.</p>\r\n\r\n<p><img alt="Icon_TechSupport" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3BR28?ver=4ed2&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Akses ke dukungan teknis dari para pakar</p>\r\n\r\n<p>Membutuhkan bantuan? Setiap pelanggan Office 365 mendapatkan akses ke dukungan teknis dari pakar Microsoft yang terlatih.</p>\r\n\r\n<p><img alt="" src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3BR2b?ver=ec06&amp;q=90&amp;h=40&amp;b=%23FFFFFFFF&amp;aim=true" /></p>\r\n\r\n<p>Lindungi konten digital Anda</p>\r\n\r\n<p>Office 365 menyediakan perlindungan di seluruh perangkat, pencadangan yang mudah, serta autentikasi dua faktor.</p>\r\n', '2019-10-08 15:10:11', 'Super Admin', '2019-11-14 23:51:17', '', 1);
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;

-- Dumping structure for table smk.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.class: ~17 rows (approximately)
DELETE FROM `class`;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` (`id`, `name`, `created`, `created_by`, `updated`, `updated_by`) VALUES
	('1071565342', 'X TKJ 2', '2019-09-12 03:43:20', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1218884590', 'X TKR 2', '2019-09-18 05:22:28', 'Super Admin', '0000-00-00 00:00:00', ''),
	('124951618', 'X TKJ 1', '2019-09-12 03:43:15', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1514836432', 'X TKR 3', '2019-09-18 05:22:36', 'Super Admin', '0000-00-00 00:00:00', ''),
	('157266210', 'X TKR 4', '2019-09-18 05:22:41', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1586309113', 'X TKR 5', '2019-09-18 05:22:48', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1611842670', 'X TKJ 3', '2019-09-12 09:41:07', 'Super Admin', '2019-09-12 13:32:10', 'Super Admin'),
	('1627631355', 'X BB 1', '2019-09-18 05:25:16', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1639858970', 'X MM 1', '2019-09-18 05:24:52', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1892834177', 'X TKJ 5', '2019-09-12 09:41:21', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1919633112', 'X TGB 1', '2019-09-18 05:25:37', 'Super Admin', '0000-00-00 00:00:00', ''),
	('1980773608', 'X TKJ 4', '2019-09-12 09:41:12', 'Super Admin', '0000-00-00 00:00:00', ''),
	('401582689', 'X TGB 3', '2019-09-18 05:25:59', 'Super Admin', '0000-00-00 00:00:00', ''),
	('72602164', 'X TKR  1', '2019-09-18 05:22:21', 'Super Admin', '0000-00-00 00:00:00', ''),
	('850914603', 'X MM 2', '2019-09-18 05:25:04', 'Super Admin', '0000-00-00 00:00:00', ''),
	('912407370', 'X BB 2', '2019-09-18 05:25:24', 'Super Admin', '0000-00-00 00:00:00', ''),
	('953478360', 'X TGB 2', '2019-09-18 05:25:50', 'Super Admin', '0000-00-00 00:00:00', '');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

-- Dumping structure for table smk.group_user
CREATE TABLE IF NOT EXISTS `group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL DEFAULT 'System',
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.group_user: ~3 rows (approximately)
DELETE FROM `group_user`;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
INSERT INTO `group_user` (`id`, `name`, `created_by`, `created`, `updated`, `updated_by`, `is_active`) VALUES
	(1, 'Super Admin', 'System', '0000-00-00 00:00:00', '2019-09-03 10:53:24', '', 1),
	(2, 'Admin', 'System', '2019-08-21 13:02:16', '2019-08-28 06:47:42', '', 1),
	(3, 'User', 'System', '2019-08-21 12:35:09', '2019-09-12 13:06:11', '', 1);
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;

-- Dumping structure for table smk.menu
CREATE TABLE IF NOT EXISTS `menu` (
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
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.menu: ~13 rows (approximately)
DELETE FROM `menu`;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `parent`, `type`, `name`, `controller`, `icon`, `url`, `created`, `created_by`, `updated`, `updated_by`, `is_active`) VALUES
	('001', '', 1, 'Dashboard', 'dashboard', ' fa fa-th', 'dashboard', '2019-08-28 07:19:22', 'Super Admin', '2019-09-03 11:02:21', 'Super Admin', 1),
	('01', '', 2, 'Super Admin', '', 'fa fa-user-md', '', '2019-08-27 10:40:46', 'Super Admin', '2019-08-27 10:44:33', 'Super Admin', 1),
	('02', '', 1, 'User Manager', 'user', 'fa fa-user', 'user', '2019-08-27 10:46:15', 'Super Admin', '2019-09-11 14:29:51', 'Super Admin', 1),
	('03', '', 1, 'Access', '', 'fa fa-universal-access', '', '2019-08-27 10:49:37', 'Super Admin', '2019-08-27 10:49:37', '', 1),
	('03.01', '03', 1, 'Group', 'group', 'fa fa-users', 'group', '2019-08-27 10:51:01', 'Super Admin', '2019-08-27 10:51:01', '', 1),
	('03.02', '03', 1, 'Permission', 'permission', 'fa fa-lock', 'permission', '2019-08-27 10:57:17', 'Super Admin', '2019-08-27 10:57:17', '', 1),
	('04', '', 1, 'Settings', '', 'fa fa-cogs', '', '2019-08-27 11:49:45', 'Super Admin', '2019-08-27 11:49:45', '', 1),
	('04.01', '04', 1, 'Menu', 'menu', 'fa fa-server', 'menu', '2019-09-02 02:30:19', 'Super Admin', '2019-09-02 15:51:52', 'Super Admin', 1),
	('04.02', '04', 1, 'Announcement', 'announcement', 'fa fa-bullhorn', 'announcement', '2019-10-06 22:42:03', 'Super Admin', '2019-10-06 22:42:03', '', 1),
	('04.03', '04', 1, 'About App', 'about', 'fa fa-info', 'about', '2019-08-27 11:58:11', 'Super Admin', '2019-10-06 22:39:19', 'Super Admin', 1),
	('05', '', 2, 'Student', '', 'fa fa-graduation-cap', '', '2019-09-05 10:08:15', 'Super Admin', '2019-09-12 06:44:41', 'Super Admin', 1),
	('06', '', 1, 'Student Manager', 'student', 'fa fa-user-circle', 'student', '2019-09-05 10:09:53', 'Super Admin', '2019-09-12 06:47:26', 'Super Admin', 1),
	('07', '', 1, 'Class', 'classs', 'fa fa-users', 'classs', '2019-09-12 06:54:21', 'Super Admin', '2019-09-12 09:19:44', 'Super Admin', 1),
	('08', '', 1, 'School Year', 'year', 'fa fa-calendar-o', 'year', '2019-09-12 11:13:47', 'Super Admin', '2019-09-12 23:13:47', '', 1);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table smk.permission
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_menu` varchar(50) NOT NULL,
  `id_group` int(10) NOT NULL,
  `_create` varchar(1) NOT NULL DEFAULT '0',
  `_read` tinyint(1) NOT NULL,
  `_update` tinyint(1) NOT NULL,
  `_delet` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=350 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.permission: ~18 rows (approximately)
DELETE FROM `permission`;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`id`, `id_menu`, `id_group`, `_create`, `_read`, `_update`, `_delet`, `created`, `updated`, `is_active`) VALUES
	(318, '001', 2, '1', 1, 1, 1, '2019-09-13 06:46:52', '2019-09-13 06:46:52', 0),
	(319, '05', 2, '1', 1, 1, 1, '2019-09-13 06:46:52', '2019-09-13 06:46:52', 0),
	(320, '06', 2, '1', 1, 1, 1, '2019-09-13 06:46:52', '2019-09-13 06:46:52', 0),
	(321, '07', 2, '0', 1, 0, 0, '2019-09-13 06:46:52', '2019-09-13 06:46:52', 0),
	(335, '001', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(336, '01', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(337, '02', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(338, '03', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(339, '03.01', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(340, '03.02', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(341, '04', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(342, '04.01', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(343, '04.02', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(344, '04.03', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(345, '05', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(346, '06', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(347, '07', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(348, '08', 1, '1', 1, 1, 1, '2019-10-06 22:42:35', '2019-10-06 22:42:35', 0),
	(349, '02', 3, '0', 0, 1, 0, '2019-11-03 09:39:55', '2019-11-03 09:39:55', 0);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;

-- Dumping structure for table smk.product
CREATE TABLE IF NOT EXISTS `product` (
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
  `updated_by` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.product: ~0 rows (approximately)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table smk.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` varchar(30) NOT NULL,
  `nis` int(10) NOT NULL,
  `name` varchar(225) NOT NULL,
  `tgl_lahir` varchar(225) NOT NULL,
  `class` varchar(225) NOT NULL,
  `period` varchar(225) NOT NULL,
  `ijasah` varchar(225) DEFAULT NULL,
  `created_by` varchar(225) NOT NULL,
  `updated_by` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.student: ~36 rows (approximately)
DELETE FROM `student`;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `nis`, `name`, `tgl_lahir`, `class`, `period`, `ijasah`, `created_by`, `updated_by`) VALUES
	('10135729281570459848', 5326, 'ANUGRAH NANDA PRATAMA', '07/03/2000', '124951618', '1905180110', 'ANUGRAH_NANDA_PRATAMA0303111119191919.pdf', 'Super Admin', 'Super Admin'),
	('10546822671570459849', 5354, 'SEPTIANA ASIH', '9/4/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('10797851901570459849', 5350, 'RIKE AVISYA PUTRI SAHARANI', '6/5/2002', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('11886066811570459848', 5339, 'HENY WIDYA ASTUTI', '7/25/2003', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('12091194971570459848', 5327, 'ARI SULISTIYANI', '6/26/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('12115998771570459849', 5344, 'MIFTAKHUL FAUZAN', '4/21/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('12137176391570459849', 5356, 'TOTO WIRANTO', '11/3/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('12342858161570459849', 5342, 'LAELATUL KOMARIYAH', '4/22/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('12870789961570459847', 5325, 'ANISATUN ALIFAH', '2/27/2010', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('13220763851570459848', 5338, 'HENDRA SAFRIANTO', '10/31/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('1414837861570459849', 5351, 'SAFIRA NUR ZAKIROH', '4/17/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('14734069441570459849', 5355, 'SUSI AMELIA', '9/28/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('15091333291570459849', 5341, 'KHOLISOTUL AFIDAH', '7/4/2002', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('15133877261570459848', 5333, 'FATIKHATUL MANGUNAH', '1/4/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('15787899801570459849', 5352, 'SAFRI YULIANI', '6/27/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('15911649371570459849', 5348, 'PRIKA HESTININGRUM', '4/13/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('16486407211570459849', 5347, 'NUR KHOMARIYAH', '3/1/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('16860531351570459849', 5357, 'WELLYANTO PRIA ADITAMA', '8/11/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('18588374801570459847', 5323, 'AMALIA USY SAROFI', '07/01/2001', '124951618', '1905180110', 'AMALIA_USY_SAROFI0303111119191919.pdf', 'Super Admin', 'Super Admin'),
	('19531149531570459849', 5343, 'LENI APRILIANI', '4/21/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('19810774401570459848', 5335, 'FIJIL ALAMTORO', '4/15/2002', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('20257367481570459848', 5329, 'DESTI LESIA NURRAHMADANI', '9/15/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('20437878421570459848', 5334, 'FATIMAH RAHAYU', '2/4/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('20979008181570459848', 5336, 'FIKA NURWAHYUNI', '9/1/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('3679765041570459848', 5340, 'HILMY HAIDAR', '3/17/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('4861291841570459848', 5328, 'ASIH EKA NURJANAH', '1/18/2002', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('519261581570459849', 5358, 'ZAENIL KHAFITA', '8/2/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('5419440231570459849', 5353, 'SELFI RAUDATUN SANGADAH', '7/29/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('6530961101570459849', 5345, 'NADIEFA ASHARI HARLIYANTI', '8/23/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('6895355681570459848', 5337, 'GANDITA RAHADANI YOLANTIKA', '2/19/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('7858410761570459848', 5330, 'DIMAS EKO SAPUTRO', '7/1/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('8590943321570459849', 5349, 'RENI WULANDARI', '7/30/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('8644943421570459848', 5332, 'FAIZ AL QORNI', '11/11/1999', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('8953474071570459848', 5331, 'ERLIA', '12/20/2000', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('9980413301570459847', 5324, 'ANA ANDIKA SAPUTRI', '11/4/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL),
	('9996259671570459849', 5346, 'NENTISA TRI YANUARIZKI', '1/22/2001', '124951618', '1905180110', NULL, 'Super Admin', NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table smk.s_year
CREATE TABLE IF NOT EXISTS `s_year` (
  `id` varchar(10) NOT NULL,
  `year` varchar(9) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(225) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.s_year: ~2 rows (approximately)
DELETE FROM `s_year`;
/*!40000 ALTER TABLE `s_year` DISABLE KEYS */;
INSERT INTO `s_year` (`id`, `year`, `created`, `created_by`, `updated`, `updated_by`) VALUES
	('1905180110', '2018/2019', '2019-09-14 06:54:57', 'Super Admin', '2019-09-14 06:54:57', ''),
	('708534124', '2019/2020', '2019-09-13 06:40:19', 'Super Admin', '2019-09-13 06:40:59', 'Super Admin');
/*!40000 ALTER TABLE `s_year` ENABLE KEYS */;

-- Dumping structure for table smk.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `id_group` int(10) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_3` (`username`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table smk.user: ~22 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `name`, `username`, `password`, `created`, `updated`, `is_active`, `id_group`) VALUES
	('1053140371', 'kolawa', 'msoi', '$2y$10$bRmzdpprDZ7kd9fEPJdqDO4VD5/C8AIMD/BGUXelZiZ7vZH7G4soO', '2019-09-05 09:06:15', '2019-09-05 09:08:59', 0, 2),
	('1053477331', 'User', 'user', '$2y$10$NHTKBpwCw.oPAtJwTBp0weetTtO08ul9/F2kyojiSNCZrzgZULJfW', '2019-10-18 10:10:57', '2019-10-18 10:10:57', 1, 3),
	('1140029943', 'Super Admin', 'superuser', '$2y$10$nMvGgHDzEuzYlL2U/wa6Dut0Exo8aq1UqpUJ0nx3AoPsZBi/gUIVq', '2019-08-26 09:33:14', '2019-08-28 09:40:22', 1, 1),
	('1253269115', 'abadabad', 'abad', '$2y$10$s8kfQs5qxtQyywxeTzCY9e4cEDGb5q81647RUDaBzuQojTmd7Wv.u', '2019-09-28 22:47:38', '2019-09-28 22:47:38', 1, 3),
	('1462828675', 'AMALIA USY SAROFI', '5323', '$2y$10$6BBYnzNIEfHpKRR.hmHXoOvXR1VB0P/gmZO4GSGujTZzd86FseVKO', '2019-11-03 21:12:15', '2019-11-15 00:16:19', 1, 3),
	('1562632149', 'sda', 'sdac', '$2y$10$E3XxfxXBs0ySwNuYOwrIZ.7bEchpxQbrlyGBJqW2fTIDKIxJHjUE6', '2019-09-11 10:24:25', '2019-09-11 10:24:25', 1, 3),
	('1633156091', 'scascas', 'acca', '$2y$10$z7S3/LSnhFqgVRLbnM0YCeVgY6R8oo9f0B7AYskqIK/obhEl/5ixy', '2019-10-13 08:04:05', '2019-10-13 08:04:05', 0, 3),
	('1655642910', 'SEPTIANA ASIH', '5354', '$2y$10$4CaeaI8hSQlTu.UlaOUJr.RVakgLA2fwCTBc1kMZfH0CNmTvcQhne', '2019-11-03 12:36:13', '2019-11-03 12:36:14', 0, 3),
	('167498779', 'luar', 'luar', '$2y$10$/OopZ63P30SYOaLu4xJzvebnJcG0MDZeqpNGXVSKtD1hCmRA1WkBm', '2019-09-18 09:20:28', '2019-09-18 09:20:28', 0, 3),
	('1717411315', 'vvsvv', 'adadada', '$2y$10$afcxQH.6gDBsG4hJyXfyUeJanYV8ZvUkENgLA.k0vB2dTDRCX4Aha', '2019-10-13 08:10:05', '2019-10-13 08:10:05', 0, 3),
	('2067316134', 'koala', 'koala', '$2y$10$UAkLhv93L5/hQy1b/6Nxlumv9C85dJn9IkAZm1IuJ2HCYEcjTqRXK', '2019-09-05 09:06:41', '2019-09-05 09:09:06', 0, 2),
	('2100117545', 'Admin User', 'admin', '$2y$10$ij1dASwU/vb/33kKk6YUi.O5AgsKFExQa/Cy3skA943lqr6lFs0FS', '2019-08-26 11:26:43', '2019-09-12 06:56:06', 1, 2),
	('262611771', 'sdfdfs', 'sadad', '$2y$10$phJvpXMPKXFVynF7fZzwaObAVDr9jrB555lFAyl4jH8C8x8wu5wwy', '2019-09-11 03:55:55', '2019-09-11 15:55:55', 1, 3),
	('36479392', 'roni', 'roni', '$2y$10$GpBkP/ZIPq6t7uM/SO.k4.rOnd.6ewG5FeNnin360oDfi.RtRUrlC', '2019-09-04 03:31:40', '2019-09-11 10:48:51', 1, 3),
	('398093056', 'dddd', 'efwfew', '$2y$10$LO0TmrJy0u1BnddNJ2ZGQOTFldynP355MhDlWIBRjzqixJOkV9xA6', '2019-09-11 04:03:26', '2019-09-11 16:03:26', 1, 3),
	('446534374', 'cavcsasc', 'rfsdfs', '$2y$10$pmecdaQ4Riw44TNXj55GDuAxn2yI9Yq7Xb7iOCcvxBtEw0MG7XJA2', '2019-09-10 09:24:44', '2019-09-10 21:24:44', 1, 3),
	('470507575', 'abdul', 'abdul', '$2y$10$Dmafi4ZF7NBFeYPky8w2Bu2GhUrdTxrtUKcDbU1C7tzg.3MJH1HIO', '2019-09-04 03:31:29', '2019-09-06 06:44:18', 1, 3),
	('475965087', 'hssyse', 'drydydr', '$2y$10$ZYtiibLtucUJerseZtUv5uxa9xzaYMybaTo0vF72TzWw.cHKjui6a', '2019-09-06 11:31:23', '2019-09-06 11:31:23', 1, 2),
	('485761757', 'vvsvv', 'vevvv', '$2y$10$Pq1jJT5jJtriNNfvL8QHb.ze8EXBilgXw9O9fHRskrki9jsIBrvdy', '2019-10-13 08:08:59', '2019-10-13 08:08:59', 0, 3),
	('524057053', 'ssvdvs', 'aads', '$2y$10$2G1iqciTZzTyNmXPSf/P6OQJCs0ESpS799JbDz48OYns2kciCI/zq', '2019-09-11 10:50:31', '2019-09-11 10:50:31', 1, 3),
	('566510267', 'Og Dang', 'ogdang', '$2y$10$RXQ2ZBFKGKXNfSyB3P8AGO8CtySSM9Xb.gpmJHXgvqjBCaoQRKtze', '2019-08-26 04:56:11', '2019-09-05 15:27:53', 1, 2),
	('592721966', 'painem', 'apaaja', '$2y$10$cnQTEbu6Ts/L7F313WcOju9Xe.sLdl4Ym3ij/HaJDJfFywZIovi8u', '2019-09-05 07:08:24', '2019-09-05 09:09:31', 0, 2),
	('90269817', 'Paijo', 'paijo', '$2y$10$d/BjH1O/MveYaacQmj9BIuXSuMXb3F75ZQNBqW1wqzoI6rppxrLQu', '2019-08-26 06:13:08', '2019-09-03 09:50:42', 0, 3);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
