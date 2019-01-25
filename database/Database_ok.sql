-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.25-0ubuntu0.18.04.2 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for spk_penjadwalan
DROP DATABASE IF EXISTS `spk_penjadwalan`;
CREATE DATABASE IF NOT EXISTS `spk_penjadwalan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `spk_penjadwalan`;

-- Dumping structure for table spk_penjadwalan.alternatif_periode
DROP TABLE IF EXISTS `alternatif_periode`;
CREATE TABLE IF NOT EXISTS `alternatif_periode` (
  `ialternatif_periode` int(11) NOT NULL AUTO_INCREMENT,
  `ikriteria_periode` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `yTahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`ialternatif_periode`),
  KEY `ikriteria_periode` (`ikriteria_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table spk_penjadwalan.alternatif_periode: ~1 rows (approximately)
/*!40000 ALTER TABLE `alternatif_periode` DISABLE KEYS */;
INSERT INTO `alternatif_periode` (`ialternatif_periode`, `ikriteria_periode`, `bulan`, `yTahun`) VALUES
	(1, 0, 1, '2010'),
	(2, 1, 1, '2011');
/*!40000 ALTER TABLE `alternatif_periode` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.alternativ
DROP TABLE IF EXISTS `alternativ`;
CREATE TABLE IF NOT EXISTS `alternativ` (
  `ialternativ` int(11) NOT NULL AUTO_INCREMENT,
  `ialternatif_periode` int(11) NOT NULL DEFAULT '0',
  `imaster_produk` int(11) DEFAULT NULL,
  `fnilai_akhir` float DEFAULT NULL,
  `irangking` int(11) DEFAULT NULL,
  `iset` int(11) DEFAULT NULL,
  PRIMARY KEY (`ialternativ`),
  KEY `ialternatif_periode` (`ialternatif_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.alternativ: ~8 rows (approximately)
/*!40000 ALTER TABLE `alternativ` DISABLE KEYS */;
INSERT INTO `alternativ` (`ialternativ`, `ialternatif_periode`, `imaster_produk`, `fnilai_akhir`, `irangking`, `iset`) VALUES
	(1, 1, 1, 0, 0, 0),
	(2, 1, 2, 0, 0, 0),
	(3, 1, 3, 0, 0, 0),
	(4, 1, 5, 0, 0, 0),
	(5, 1, 6, 0, 0, 0),
	(9, 2, 1, 43.18, 4, 0),
	(10, 2, 2, 63.39, 2, 0),
	(11, 2, 3, 77.535, 1, 0),
	(12, 2, 5, 45.589, 3, 0),
	(13, 1, 11, 0, 0, 0);
/*!40000 ALTER TABLE `alternativ` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.alternativ_detail
DROP TABLE IF EXISTS `alternativ_detail`;
CREATE TABLE IF NOT EXISTS `alternativ_detail` (
  `ialternativ_detail` int(11) NOT NULL AUTO_INCREMENT,
  `ialternativ` int(11) DEFAULT NULL,
  `ialternatif_periode` int(11) DEFAULT NULL,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `ikriteria_nilai` int(11) DEFAULT NULL,
  `fnilai_awal` float DEFAULT NULL,
  `fnilai_normal` float DEFAULT NULL,
  `fnilai_bobot` float DEFAULT NULL,
  PRIMARY KEY (`ialternativ_detail`),
  KEY `ialternativ` (`ialternativ`),
  KEY `imaster_kriteria` (`imaster_kriteria`),
  KEY `ikriteria_nilai` (`ikriteria_nilai`),
  KEY `ialternatif_periode` (`ialternatif_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.alternativ_detail: ~32 rows (approximately)
/*!40000 ALTER TABLE `alternativ_detail` DISABLE KEYS */;
INSERT INTO `alternativ_detail` (`ialternativ_detail`, `ialternativ`, `ialternatif_periode`, `imaster_kriteria`, `ikriteria_nilai`, `fnilai_awal`, `fnilai_normal`, `fnilai_bobot`) VALUES
	(1, 1, 1, 1, 0, 10, 0, 0),
	(2, 1, 1, 2, 0, 16, 0, 0),
	(3, 1, 1, 3, 0, 46, 0, 0),
	(4, 1, 1, 4, 0, 30, 0, 0),
	(5, 2, 1, 1, 0, 83, 0, 0),
	(6, 2, 1, 2, 0, 88, 0, 0),
	(7, 2, 1, 3, 0, 50, 0, 0),
	(8, 2, 1, 4, 0, 10, 0, 0),
	(9, 3, 1, 1, 0, 92, 0, 0),
	(10, 3, 1, 2, 0, 25, 0, 0),
	(11, 3, 1, 3, 0, 20, 0, 0),
	(12, 3, 1, 4, 0, 20, 0, 0),
	(13, 4, 1, 1, 0, 23, 0, 0),
	(14, 4, 1, 2, 0, 39, 0, 0),
	(15, 4, 1, 3, 0, 42, 0, 0),
	(16, 4, 1, 4, 0, 20, 0, 0),
	(17, 5, 1, 1, 0, 91, 0, 0),
	(18, 5, 1, 2, 0, 67, 0, 0),
	(19, 5, 1, 3, 0, 64, 0, 0),
	(20, 5, 1, 4, 0, 10, 0, 0),
	(33, 9, 2, 1, 29, 10, 0.109, 2.769),
	(34, 9, 2, 2, 30, 16, 0.182, 3.713),
	(35, 9, 2, 3, 31, 46, 0.435, 13.398),
	(36, 9, 2, 4, 32, 30, 1, 23.3),
	(37, 10, 2, 1, 29, 83, 0.902, 22.911),
	(38, 10, 2, 2, 30, 88, 1, 20.4),
	(39, 10, 2, 3, 31, 50, 0.4, 12.32),
	(40, 10, 2, 4, 32, 10, 0.333, 7.759),
	(41, 11, 2, 1, 29, 92, 1, 25.4),
	(42, 11, 2, 2, 30, 25, 0.284, 5.794),
	(43, 11, 2, 3, 31, 20, 1, 30.8),
	(44, 11, 2, 4, 32, 20, 0.667, 15.541),
	(45, 12, 2, 1, 29, 23, 0.25, 6.35),
	(46, 12, 2, 2, 30, 39, 0.443, 9.037),
	(47, 12, 2, 3, 31, 42, 0.476, 14.661),
	(48, 12, 2, 4, 32, 20, 0.667, 15.541),
	(49, 13, 1, 1, 0, 91, 0, 0),
	(50, 13, 1, 2, 0, 85, 0, 0),
	(51, 13, 1, 3, 0, 30, 0, 0),
	(52, 13, 1, 4, 0, 10, 0, 0);
/*!40000 ALTER TABLE `alternativ_detail` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.history_transaksi
DROP TABLE IF EXISTS `history_transaksi`;
CREATE TABLE IF NOT EXISTS `history_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ckode_produk` varchar(255) DEFAULT NULL,
  `level_stock_fg` float DEFAULT NULL,
  `leadtime_shiptment` float DEFAULT '0',
  `kesediaan_bb` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.history_transaksi: ~250 rows (approximately)
/*!40000 ALTER TABLE `history_transaksi` DISABLE KEYS */;
INSERT INTO `history_transaksi` (`id`, `ckode_produk`, `level_stock_fg`, `leadtime_shiptment`, `kesediaan_bb`) VALUES
	(1, '105181', 46, 16, 10),
	(2, '105242', 50, 88, 83),
	(3, '105587', 20, 25, 92),
	(4, '105600', 32, 15, 79),
	(5, '105686', 42, 39, 23),
	(6, '105792', 64, 67, 91),
	(7, '101343', 18, 93, 28),
	(8, '100643', 54, 52, 76),
	(9, '100711', 86, 94, 8),
	(10, '100018', 28, 38, 94),
	(11, '100025', 30, 85, 91),
	(12, '100032', 8, 34, 23),
	(13, '100049', 93, 56, 49),
	(14, '100063', 37, 62, 26),
	(15, '100070', 99, 72, 18),
	(16, '100087', 24, 13, 60),
	(17, '100094', 57, 46, 8),
	(18, '100117', 95, 52, 8),
	(19, '100124', 1, 34, 82),
	(20, '100131', 13, 62, 12),
	(21, '100148', 3, 80, 27),
	(22, '100155', 39, 46, 66),
	(23, '100162', 97, 83, 47),
	(24, '100179', 29, 60, 89),
	(25, '100186', 13, 69, 90),
	(26, '100193', 90, 87, 90),
	(27, '100209', 76, 16, 38),
	(28, '100216', 73, 75, 67),
	(29, '100223', 97, 28, 92),
	(30, '100230', 44, 92, 17),
	(31, '100247', 66, 9, 97),
	(32, '100254', 66, 2, 40),
	(33, '100261', 45, 69, 49),
	(34, '100278', 45, 3, 99),
	(35, '100285', 10, 61, 8),
	(36, '100292', 70, 55, 58),
	(37, '100308', 96, 6, 51),
	(38, '100315', 23, 43, 49),
	(39, '100346', 28, 2, 64),
	(40, '100377', 93, 28, 92),
	(41, '100384', 70, 36, 29),
	(42, '100391', 66, 43, 84),
	(43, '100407', 50, 72, 41),
	(44, '100414', 89, 53, 23),
	(45, '100421', 40, 19, 27),
	(46, '100438', 89, 17, 19),
	(47, '100445', 14, 11, 1),
	(48, '100483', 71, 95, 57),
	(49, '100490', 71, 29, 88),
	(50, '100506', 40, 92, 42),
	(51, '100513', 68, 92, 22),
	(52, '100520', 13, 83, 3),
	(53, '100537', 9, 84, 58),
	(54, '100544', 20, 76, 67),
	(55, '100605', 58, 88, 97),
	(56, '100612', 25, 67, 74),
	(57, '100629', 27, 46, 62),
	(58, '100636', 22, 97, 45),
	(59, '100650', 9, 90, 94),
	(60, '100674', 81, 40, 26),
	(61, '100681', 55, 54, 31),
	(62, '100698', 8, 19, 76),
	(63, '100704', 23, 20, 47),
	(64, '100728', 17, 61, 96),
	(65, '100735', 11, 17, 17),
	(66, '100742', 14, 1, 42),
	(67, '100759', 99, 6, 11),
	(68, '100766', 28, 83, 97),
	(69, '100773', 24, 14, 12),
	(70, '100780', 45, 49, 26),
	(71, '100810', 31, 16, 54),
	(72, '100827', 46, 14, 40),
	(73, '100834', 39, 97, 50),
	(74, '100841', 96, 89, 82),
	(75, '100858', 27, 19, 3),
	(76, '100865', 30, 9, 84),
	(77, '100872', 8, 36, 78),
	(78, '100889', 43, 55, 12),
	(79, '100896', 99, 19, 60),
	(80, '101008', 42, 69, 34),
	(81, '101145', 4, 43, 54),
	(82, '101176', 33, 24, 69),
	(83, '101183', 56, 67, 29),
	(84, '101312', 39, 38, 13),
	(85, '101497', 34, 72, 93),
	(86, '101534', 39, 11, 39),
	(87, '101541', 35, 16, 34),
	(88, '101596', 66, 69, 98),
	(89, '101640', 99, 15, 92),
	(90, '101695', 36, 28, 3),
	(91, '101701', 55, 47, 11),
	(92, '101718', 19, 30, 73),
	(93, '101725', 72, 8, 66),
	(94, '101749', 36, 96, 72),
	(95, '101756', 69, 10, 32),
	(96, '101763', 23, 92, 23),
	(97, '101688', 52, 78, 72),
	(98, '101947', 26, 14, 10),
	(99, '101954', 27, 73, 70),
	(100, '101961', 38, 92, 40),
	(101, '101978', 34, 29, 82),
	(102, '101985', 22, 77, 88),
	(103, '101992', 88, 37, 25),
	(104, '102005', 8, 44, 60),
	(105, '102012', 69, 81, 27),
	(106, '102036', 12, 70, 28),
	(107, '102081', 14, 34, 27),
	(108, '102098', 26, 60, 88),
	(109, '102104', 46, 23, 39),
	(110, '102111', 31, 24, 67),
	(111, '102128', 90, 81, 63),
	(112, '102135', 16, 56, 77),
	(113, '102166', 9, 85, 80),
	(114, '102265', 10, 42, 66),
	(115, '102302', 16, 82, 84),
	(116, '102340', 61, 56, 52),
	(117, '102395', 21, 82, 7),
	(118, '102401', 76, 16, 35),
	(119, '102425', 12, 10, 26),
	(120, '102432', 4, 31, 49),
	(121, '102463', 42, 57, 58),
	(122, '102470', 1, 45, 69),
	(123, '102487', 41, 53, 45),
	(124, '102494', 39, 89, 89),
	(125, '102500', 60, 95, 96),
	(126, '102586', 67, 11, 93),
	(127, '102661', 94, 59, 11),
	(128, '102678', 40, 62, 32),
	(129, '102685', 72, 74, 46),
	(130, '102524', 84, 51, 63),
	(131, '102593', 70, 18, 25),
	(132, '102753', 97, 29, 15),
	(133, '102784', 7, 22, 52),
	(134, '102869', 1, 61, 35),
	(135, '102876', 54, 31, 31),
	(136, '102883', 78, 81, 80),
	(137, '102999', 13, 3, 98),
	(138, '103057', 66, 75, 53),
	(139, '103064', 76, 83, 20),
	(140, '103071', 48, 15, 24),
	(141, '103088', 46, 81, 14),
	(142, '103095', 76, 25, 96),
	(143, '103118', 21, 82, 6),
	(144, '103125', 62, 48, 69),
	(145, '103149', 96, 31, 6),
	(146, '103156', 33, 73, 52),
	(147, '103170', 89, 28, 71),
	(148, '103248', 92, 75, 86),
	(149, '103309', 95, 68, 65),
	(150, '103316', 70, 89, 30),
	(151, '103323', 88, 67, 15),
	(152, '103392', 17, 84, 48),
	(153, '103408', 38, 91, 60),
	(154, '103415', 55, 28, 55),
	(155, '103439', 14, 5, 54),
	(156, '103545', 85, 44, 55),
	(157, '103552', 13, 56, 3),
	(158, '103569', 54, 50, 55),
	(159, '103613', 10, 73, 76),
	(160, '103620', 16, 60, 26),
	(161, '103705', 8, 83, 67),
	(162, '103743', 2, 70, 11),
	(163, '103750', 45, 90, 70),
	(164, '103767', 31, 68, 25),
	(165, '103774', 50, 83, 85),
	(166, '103781', 91, 45, 40),
	(167, '103811', 68, 32, 4),
	(168, '103842', 95, 91, 44),
	(169, '103859', 19, 98, 49),
	(170, '103903', 51, 93, 43),
	(171, '103910', 24, 33, 51),
	(172, '103934', 27, 95, 5),
	(173, '103965', 43, 93, 44),
	(174, '103972', 5, 80, 62),
	(175, '103989', 56, 80, 55),
	(176, '103996', 78, 55, 96),
	(177, '104009', 44, 4, 99),
	(178, '104016', 13, 17, 30),
	(179, '104023', 89, 30, 93),
	(180, '104030', 63, 31, 33),
	(181, '104047', 51, 9, 56),
	(182, '104054', 66, 97, 15),
	(183, '104061', 32, 98, 31),
	(184, '104078', 82, 35, 94),
	(185, '104085', 51, 26, 3),
	(186, '104092', 82, 29, 44),
	(187, '104108', 71, 39, 89),
	(188, '104115', 24, 26, 67),
	(189, '104122', 92, 88, 70),
	(190, '104139', 55, 22, 95),
	(191, '104146', 3, 79, 84),
	(192, '104153', 61, 28, 24),
	(193, '104160', 78, 37, 63),
	(194, '104177', 58, 50, 43),
	(195, '104184', 95, 67, 57),
	(196, '104191', 51, 38, 28),
	(197, '104207', 37, 69, 27),
	(198, '104214', 56, 32, 9),
	(199, '104221', 97, 66, 10),
	(200, '104238', 38, 70, 63),
	(201, '104245', 21, 2, 69),
	(202, '104252', 44, 4, 5),
	(203, '104269', 96, 79, 75),
	(204, '104276', 91, 61, 60),
	(205, '104283', 19, 69, 83),
	(206, '104290', 61, 1, 89),
	(207, '104306', 74, 49, 88),
	(208, '104313', 28, 54, 92),
	(209, '104320', 62, 5, 80),
	(210, '104337', 84, 61, 22),
	(211, '104344', 98, 75, 49),
	(212, '104351', 90, 50, 92),
	(213, '104368', 62, 29, 63),
	(214, '104375', 89, 83, 12),
	(215, '104382', 36, 36, 13),
	(216, '104399', 42, 50, 96),
	(217, '104405', 17, 79, 19),
	(218, '104412', 49, 65, 80),
	(219, '104429', 45, 8, 16),
	(220, '104436', 9, 23, 29),
	(221, '104443', 31, 24, 47),
	(222, '104450', 60, 41, 91),
	(223, '104467', 18, 55, 59),
	(224, '104474', 92, 7, 86),
	(225, '104481', 94, 86, 83),
	(226, '104498', 30, 90, 11),
	(227, '104504', 13, 55, 74),
	(228, '104511', 42, 93, 44),
	(229, '104528', 57, 81, 32),
	(230, '104535', 30, 29, 78),
	(231, '104542', 58, 8, 77),
	(232, '104559', 21, 13, 25),
	(233, '104566', 40, 19, 12),
	(234, '104573', 72, 30, 13),
	(235, '104580', 31, 46, 64),
	(236, '104597', 24, 1, 12),
	(237, '104603', 48, 47, 16),
	(238, '104610', 33, 48, 57),
	(239, '104627', 36, 66, 69),
	(240, '104634', 24, 91, 80),
	(241, '104641', 21, 8, 24),
	(242, '104658', 42, 34, 8),
	(243, '104665', 16, 41, 49),
	(244, '104672', 32, 34, 75),
	(245, '104689', 60, 16, 30),
	(246, '104696', 16, 90, 9),
	(247, '104702', 36, 42, 84),
	(248, '104719', 11, 93, 19),
	(249, '104726', 11, 65, 58),
	(250, '104733', 40, 85, 16);
/*!40000 ALTER TABLE `history_transaksi` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_nilai
DROP TABLE IF EXISTS `kriteria_nilai`;
CREATE TABLE IF NOT EXISTS `kriteria_nilai` (
  `ikriteria_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `imaster_kriteria` int(11) NOT NULL,
  `ikriteria_periode` int(11) DEFAULT NULL,
  `fawal` float DEFAULT NULL,
  `fjumlah` float DEFAULT NULL,
  `fvaktor` float DEFAULT NULL,
  `ftmax` float DEFAULT NULL,
  `fbobot` float DEFAULT NULL COMMENT 'Satuan Persentase',
  PRIMARY KEY (`ikriteria_nilai`),
  KEY `imaster_kriteria_periode` (`ikriteria_periode`),
  KEY `imaster_kriteria` (`imaster_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table spk_penjadwalan.kriteria_nilai: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria_nilai` DISABLE KEYS */;
INSERT INTO `kriteria_nilai` (`ikriteria_nilai`, `imaster_kriteria`, `ikriteria_periode`, `fawal`, `fjumlah`, `fvaktor`, `ftmax`, `fbobot`) VALUES
	(29, 1, 1, 5, 1.017, 0.254, 1.27, 25.4),
	(30, 2, 1, 6, 0.817, 0.204, 1.224, 20.4),
	(31, 3, 1, 2, 1.233, 0.308, 0.616, 30.8),
	(32, 4, 1, 2.5, 0.933, 0.233, 0.583, 23.3);
/*!40000 ALTER TABLE `kriteria_nilai` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_nilai_detail
DROP TABLE IF EXISTS `kriteria_nilai_detail`;
CREATE TABLE IF NOT EXISTS `kriteria_nilai_detail` (
  `ikriteria_nilai_detail` int(11) NOT NULL AUTO_INCREMENT,
  `ikriteria_periode` int(11) NOT NULL DEFAULT '0',
  `imaster_kriteria_x` int(11) NOT NULL COMMENT 'x - untuk kriteria samping',
  `imaster_kriteria_y` int(11) DEFAULT NULL COMMENT 'y - untuk kriteria bawah',
  `fnilai_awal` float DEFAULT NULL,
  `fnilai_normalisasi` float DEFAULT NULL,
  PRIMARY KEY (`ikriteria_nilai_detail`),
  KEY `imaster_kriteria_periode` (`ikriteria_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.kriteria_nilai_detail: ~16 rows (approximately)
/*!40000 ALTER TABLE `kriteria_nilai_detail` DISABLE KEYS */;
INSERT INTO `kriteria_nilai_detail` (`ikriteria_nilai_detail`, `ikriteria_periode`, `imaster_kriteria_x`, `imaster_kriteria_y`, `fnilai_awal`, `fnilai_normalisasi`) VALUES
	(113, 1, 1, 1, 1, 0.2),
	(114, 1, 1, 2, 1, 0.167),
	(115, 1, 1, 3, 0.5, 0.25),
	(116, 1, 1, 4, 1, 0.4),
	(117, 1, 2, 1, 1, 0.2),
	(118, 1, 2, 2, 1, 0.167),
	(119, 1, 2, 3, 0.5, 0.25),
	(120, 1, 2, 4, 0.5, 0.2),
	(121, 1, 3, 1, 2, 0.4),
	(122, 1, 3, 2, 2, 0.333),
	(123, 1, 3, 3, 1, 0.5),
	(124, 1, 3, 4, 0, 0),
	(125, 1, 4, 1, 1, 0.2),
	(126, 1, 4, 2, 2, 0.333),
	(127, 1, 4, 3, 0, 0),
	(128, 1, 4, 4, 1, 0.4);
/*!40000 ALTER TABLE `kriteria_nilai_detail` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_periode
DROP TABLE IF EXISTS `kriteria_periode`;
CREATE TABLE IF NOT EXISTS `kriteria_periode` (
  `ikriteria_periode` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` int(11) DEFAULT NULL,
  `yTahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`ikriteria_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table spk_penjadwalan.kriteria_periode: ~1 rows (approximately)
/*!40000 ALTER TABLE `kriteria_periode` DISABLE KEYS */;
INSERT INTO `kriteria_periode` (`ikriteria_periode`, `bulan`, `yTahun`) VALUES
	(1, 1, '2010');
/*!40000 ALTER TABLE `kriteria_periode` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.master_kriteria
DROP TABLE IF EXISTS `master_kriteria`;
CREATE TABLE IF NOT EXISTS `master_kriteria` (
  `imaster_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `cKode` char(50) DEFAULT NULL,
  `vNama_kriteria` varchar(50) DEFAULT NULL,
  `vAtribut` enum('Benefit','Cost') DEFAULT NULL,
  `fawal` char(50) DEFAULT '-',
  PRIMARY KEY (`imaster_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_penjadwalan.master_kriteria: ~4 rows (approximately)
/*!40000 ALTER TABLE `master_kriteria` DISABLE KEYS */;
INSERT INTO `master_kriteria` (`imaster_kriteria`, `cKode`, `vNama_kriteria`, `vAtribut`, `fawal`) VALUES
	(1, 'C1', 'Kesediaan BB', 'Benefit', NULL),
	(2, 'C2', 'Leadtime Shiptment', 'Benefit', NULL),
	(3, 'C3', 'Level Stock FG', 'Cost', NULL),
	(4, 'C4', 'Jenis Produk', 'Benefit', NULL);
/*!40000 ALTER TABLE `master_kriteria` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.master_produk
DROP TABLE IF EXISTS `master_produk`;
CREATE TABLE IF NOT EXISTS `master_produk` (
  `imaster_produk` int(11) NOT NULL AUTO_INCREMENT,
  `ckode_produk` varchar(255) DEFAULT NULL,
  `vnama_produk` varchar(255) DEFAULT NULL,
  `jenis_produk` int(11) DEFAULT NULL,
  `iLounching` int(1) DEFAULT '0',
  PRIMARY KEY (`imaster_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.master_produk: ~250 rows (approximately)
/*!40000 ALTER TABLE `master_produk` DISABLE KEYS */;
INSERT INTO `master_produk` (`imaster_produk`, `ckode_produk`, `vnama_produk`, `jenis_produk`, `iLounching`) VALUES
	(1, '105181', 'EFISOL LOZ. VIT. C 50 EXPORT  ', 3, 0),
	(2, '105242', 'WFI 10 ML                     ', 1, 0),
	(3, '105587', 'HYOSCINE N-BUTYL BROMIDE 10 MG', 2, 0),
	(4, '105600', 'LACTO B GEMTECH               ', 1, 1),
	(5, '105686', 'NOVESTROL 125 MG INJ          ', 2, 0),
	(6, '105792', 'NISLEV I.V. PI                ', 1, 0),
	(7, '101343', 'SALAH INPUT BY USER           ', 1, 0),
	(8, '100643', 'COOLING 5 REFILL              ', 2, 0),
	(9, '100711', 'AQUADEST                      ', 1, 0),
	(10, '100018', 'COOLING-5 SOLUTION UNUSED     ', 2, 0),
	(11, '100025', 'POLYSILANE SUSP180ML          ', 1, 0),
	(12, '100032', 'POLYSILANE KAPSUL             ', 2, 0),
	(13, '100049', 'POLYSILANE TABLET             ', 1, 0),
	(14, '100063', 'NOPRENIA 1 UNUSED             ', 2, 0),
	(15, '100070', 'NOPRENIA 2 UNUSED             ', 2, 0),
	(16, '100087', 'NOPRENIA 3 UNUSED             ', 2, 0),
	(17, '100094', 'Q-TEN                         ', 2, 0),
	(18, '100117', 'POLYSILANE SUSPENSI 100ML     ', 1, 0),
	(19, '100124', 'POLYSILANE 180 ML FB          ', 1, 0),
	(20, '100131', 'CAVITAL SYR 100 UNUSED        ', 1, 0),
	(21, '100148', 'KOLDEX SYRUP 60 UNUSED        ', 1, 0),
	(22, '100155', 'PRORIS SUSPENSI 60 UNUSED     ', 2, 0),
	(23, '100162', 'PRORIS FORTE 50 UNUSED        ', 1, 0),
	(24, '100179', 'RHINATHIOL ADULT SYR UNUSED   ', 2, 0),
	(25, '100186', 'RHINATHIOL INFANT SYR UNUSED  ', 2, 0),
	(26, '100193', 'RHINATHIOL PROM. 100 UNUSED   ', 2, 0),
	(27, '100209', 'TUSSIGON SYRUP 60 UNUSED      ', 2, 0),
	(28, '100216', 'TUSSIGON SYRUP 100 UNUSED     ', 2, 0),
	(29, '100223', 'HAIR STABILE TONIC 120 UNUSED ', 2, 0),
	(30, '100230', 'SALBUVEN UNUSED               ', 2, 0),
	(31, '100247', 'SALBUVEN MILD UNUSED          ', 1, 0),
	(32, '100254', 'ANTIPRESTIN 10 UNUSED         ', 1, 0),
	(33, '100261', 'ANTIPRESTIN 20 UNUSED         ', 1, 0),
	(34, '100278', 'NEOGOBION CAPS (EXPORT) UNUSED', 1, 0),
	(35, '100285', 'PRORIS KAPLET UNUSED          ', 2, 0),
	(36, '100292', 'CLAROS 250 TABLET PACK-PI     ', 1, 0),
	(37, '100308', 'NOPRENIA 1 REPACK             ', 1, 0),
	(38, '100315', 'NOPRENIA 3 REPACK             ', 2, 0),
	(39, '100346', 'NOPRENIA 2 REPACK             ', 2, 0),
	(40, '100377', 'RHINATHIOL PROM. SYR-PI       ', 1, 0),
	(41, '100384', 'RHINATHIOL INFANT SYR-PI      ', 1, 0),
	(42, '100391', 'RHINATHIOL ADULT SYR-PI       ', 2, 0),
	(43, '100407', 'NEOGOBION SINGAPURA-PI        ', 2, 0),
	(44, '100414', 'PRORIS SUSP. 60 ML - PI       ', 1, 0),
	(45, '100421', 'PRORIS 200 KAPLET-PI          ', 2, 0),
	(46, '100438', 'CETOROS 1 G/5 ML INJEKSI-PI   ', 1, 0),
	(47, '100445', 'PRORIS FORTE 50 ML - PI       ', 2, 0),
	(48, '100483', 'TUSSIGON SYRUP 60ML-TOL       ', 2, 0),
	(49, '100490', 'TUSSIGON SYR 100 ML-TOL       ', 1, 0),
	(50, '100506', 'NOPRENIA 2 - REWORK           ', 2, 0),
	(51, '100513', 'CAVITAL SYRUP 100ML - TOL     ', 1, 0),
	(52, '100520', 'FLUOXETIN KAP HANGL PACK-TOL  ', 2, 0),
	(53, '100537', 'NEOGOBION SINGAPURA PACK-PI   ', 1, 0),
	(54, '100544', 'ANTIPRESTIN 10 PACK-PI        ', 2, 0),
	(55, '100605', 'SALBUVEN MILD KHUNACO-EXP-PI  ', 1, 0),
	(56, '100612', 'RECHOL 10 MYANMAR-PI          ', 2, 0),
	(57, '100629', 'RECHOL 5 MYANMAR-PI           ', 1, 0),
	(58, '100636', 'ANTIPRESTIN 20FB PACK-PI      ', 1, 0),
	(59, '100650', 'NORMOTIL MYANMAR-PI           ', 2, 0),
	(60, '100674', 'BIOSTATIC 150 PACK-PI         ', 2, 0),
	(61, '100681', 'NEOGOBION @28 EXP PACK-PI     ', 1, 0),
	(62, '100698', 'APPELIN B12 SYRUP 100 EXP-PI  ', 1, 0),
	(63, '100704', 'INOPRILAT 5 MG-PI             ', 2, 0),
	(64, '100728', 'TUSSIGON SYRUP 60 ML TB PTN   ', 1, 0),
	(65, '100735', 'VALIANT KAPSUL PACK-PI        ', 2, 0),
	(66, '100742', 'APPELIN B12 SYRUP 30 EXP-PI   ', 1, 0),
	(67, '100759', 'SALBUVEN TAB MYANMAR-PI       ', 2, 0),
	(68, '100766', 'TUSSIGON SYR 100ML TB PTN-TOL ', 1, 0),
	(69, '100773', 'QUINOBIOTIC 250-PI            ', 1, 0),
	(70, '100780', 'QUINOBIOTIC 500-PI            ', 1, 0),
	(71, '100810', 'CLINOVIR 400                  ', 1, 0),
	(72, '100827', 'NEOGOBION @28 EXP-PI          ', 1, 0),
	(73, '100834', 'PYREX TABLET-PI               ', 1, 0),
	(74, '100841', 'PROSIX 5 MG TABLET            ', 2, 0),
	(75, '100858', 'NICOX TABLET 100 MG           ', 1, 0),
	(76, '100865', 'CAVITAL SYRUP 60ML - TOL      ', 1, 0),
	(77, '100872', 'EVER SLIM-PI                  ', 2, 0),
	(78, '100889', 'CETOROS 400 KAPSUL-PI         ', 1, 0),
	(79, '100896', 'KAPSUL-AMS                    ', 2, 0),
	(80, '101008', 'CEROPID INJEKSI UNUSED        ', 2, 0),
	(81, '101145', 'THIAMPHENICOL 500 MG CAPSUL   ', 2, 0),
	(82, '101176', 'ARDIVIT KAPLET LOKAL FB 1     ', 1, 0),
	(83, '101183', 'NEUROFORT SUGAR COAT. TABLET  ', 1, 0),
	(84, '101312', 'NEUROFORT MYANMAR F.C         ', 2, 0),
	(85, '101497', 'COOLING 5 CHERRY FLAVOR       ', 1, 0),
	(86, '101534', 'OPTIMA SUPPORT FOR SLIM       ', 1, 0),
	(87, '101541', 'NEOGOBION 100 SING (PACK)-PI  ', 1, 0),
	(88, '101596', 'MENEST 1,25 MG                ', 2, 0),
	(89, '101640', 'POLYSILANE KAPSUL-PI          ', 1, 0),
	(90, '101695', 'AMOXYCILLIN 500               ', 2, 0),
	(91, '101701', 'NEOGOBION @28 EXP-NPL         ', 1, 0),
	(92, '101718', 'NEOGOBION @100 EXP-NPL        ', 2, 0),
	(93, '101725', 'MECLOVEL SYRUP                ', 1, 0),
	(94, '101749', 'FILE KOSONG                   ', 1, 0),
	(95, '101756', 'NODEVEX 0,5 MG TAB            ', 2, 0),
	(96, '101763', 'MECLOVEL TABLET               ', 1, 0),
	(97, '101688', 'RYVEL DROPS UNUSED            ', 1, 0),
	(98, '101947', 'CIVELL 500 EXP. MACAU         ', 2, 0),
	(99, '101954', 'CEFRIEX EXPORT                ', 2, 0),
	(100, '101961', 'COOLING 5 EXP. MACAU          ', 2, 0),
	(101, '101978', 'PROLACTA MOTHER EXP(SINGAPORE)', 1, 0),
	(102, '101985', 'PROLACTA BABY EXPORT          ', 1, 0),
	(103, '101992', 'ENERTEN 30 MG (Q-TEN EXPORT)  ', 1, 0),
	(104, '102005', 'NOVALES 10 MG EXPORT          ', 2, 0),
	(105, '102012', 'NOVALES 20 MG EXPORT          ', 2, 0),
	(106, '102036', 'PROXALYOC 20 MG               ', 2, 0),
	(107, '102081', 'ALLYLESTRENOL 5 MG TABLET     ', 1, 0),
	(108, '102098', 'DICOM DAY AND NIGHT 3 TAB     ', 1, 0),
	(109, '102104', 'VELMIN 250 MG KAPLET          ', 2, 0),
	(110, '102111', 'KOLDEX SP SYRUP               ', 1, 0),
	(111, '102128', 'KOLDEX BP TABLET              ', 1, 0),
	(112, '102135', 'NUTRAFOR MAN                  ', 2, 0),
	(113, '102166', 'ALOVELL EKSPORT               ', 2, 0),
	(114, '102265', 'SANOSIN 100 ML                ', 2, 0),
	(115, '102302', 'OMEPRAZOLE BTL                ', 2, 0),
	(116, '102340', 'OMEPRAZOLE BOTOL              ', 2, 0),
	(117, '102395', 'DOBUTEL 25 MG                 ', 2, 0),
	(118, '102401', 'Q-TEN PLUS SOFTGEL IMPORT     ', 1, 0),
	(119, '102425', 'CALOMA BOTOL 30 EXPORT        ', 1, 0),
	(120, '102432', 'EPOCALDI BTL 30 EXPORT        ', 2, 0),
	(121, '102463', 'Q-TEN 30 BLISTER EXPORT       ', 2, 0),
	(122, '102470', 'RYVEL 10 MG 3*10 EXPORT       ', 1, 0),
	(123, '102487', 'FOLERIN EXPORT                ', 2, 0),
	(124, '102494', 'NEUROFORT F.C HONGKONG EXPORT ', 1, 0),
	(125, '102500', 'SIMVASTATIN 10 MG EXPORT      ', 2, 0),
	(126, '102586', 'RYVEL 10 MG 50*10 EXPORT      ', 2, 0),
	(127, '102661', 'NOVELL-FOLLIMON               ', 2, 0),
	(128, '102678', 'NOVELL-IVF-C                  ', 2, 0),
	(129, '102685', 'NOVELL-IVF-M                  ', 1, 0),
	(130, '102524', 'PIROXICAM 10 MG TABLET        ', 2, 0),
	(131, '102593', 'PRAVASTATIN 10 GENERIK TAB    ', 1, 0),
	(132, '102753', 'VIVOTIF IMPORT                ', 1, 0),
	(133, '102784', 'PIROXICAM 20 MG GENERIK       ', 1, 0),
	(134, '102869', 'LOZAP 25 MG TABLET            ', 1, 0),
	(135, '102876', 'CIRCURE CAPSULE               ', 1, 0),
	(136, '102883', 'KOLDEX SA TABLET EXPORT       ', 1, 0),
	(137, '102999', 'LANVELL EXPORT                ', 1, 0),
	(138, '103057', 'WFI EXPORT                    ', 2, 0),
	(139, '103064', 'PYRAMOL-DAFRA                 ', 1, 0),
	(140, '103071', 'PYRELAN-DAFRA                 ', 2, 0),
	(141, '103088', 'CETRAMON-DAFRA                ', 1, 0),
	(142, '103095', 'ITRAX-DAFRA                   ', 2, 0),
	(143, '103118', 'MAVELLINE 25 TABLET ASKES     ', 1, 0),
	(144, '103125', 'MAVELLINE 50 TABLET ASKES     ', 2, 0),
	(145, '103149', 'ZYFORT YEMEN                  ', 2, 0),
	(146, '103156', 'ASAM TRANEXAMAT 500 KAPLET    ', 1, 0),
	(147, '103170', 'AMIFER SYRUP 200 ML ORANGE    ', 1, 0),
	(148, '103248', 'METOCLOPRAMIDE 5 MG TAB OGB   ', 2, 0),
	(149, '103309', 'AZTRIN 250 MG KAPSUL EXPORT   ', 1, 0),
	(150, '103316', 'ESTAZOLAM 1 MG TAB GENERIK    ', 1, 0),
	(151, '103323', 'ESTAZOLAM 2 MG TABLET GENERIK ', 2, 0),
	(152, '103392', 'PIRATROF 1 G INJ EXP NIGER    ', 2, 0),
	(153, '103408', 'PIRATROF 3 G INJ EXPORT YAMAN ', 1, 0),
	(154, '103415', 'SENIOR LADY BALANCE EXPORT    ', 1, 0),
	(155, '103439', 'CIPROFLOXACIN 500 BLISTER     ', 1, 0),
	(156, '103545', 'RANITIDIN 150 MG TABLET OGB   ', 1, 0),
	(157, '103552', 'NATRIUM DIKLOFENAK 50 MG OGB  ', 2, 0),
	(158, '103569', 'MECONEURO 500 MCG EXP. YAMAN  ', 2, 0),
	(159, '103613', 'ONDAVELL 8 INJ NAMDONG EXP    ', 2, 0),
	(160, '103620', 'VELAZOL 500 MG (@ 5*10)       ', 2, 0),
	(161, '103705', 'SIMVASTATIN 10 MG BLISTER     ', 1, 0),
	(162, '103743', 'ENALAPRIL MALEAT 5MG TB       ', 1, 0),
	(163, '103750', 'NUTRAFANT INFANT MILK IMPORT  ', 2, 0),
	(164, '103767', 'HERAX 400 MG TB HANGLUNG      ', 2, 0),
	(165, '103774', 'MOX-G 125                     ', 2, 0),
	(166, '103781', 'MOX-G 250                     ', 1, 0),
	(167, '103811', 'HAEMOSTOP 500 MG INJ          ', 1, 0),
	(168, '103842', 'NORMOTIL NIGERIA              ', 2, 0),
	(169, '103859', 'SCAR-X CREAM IMPORT           ', 1, 0),
	(170, '103903', 'LITHOTRIP SG  PAKISTAN        ', 1, 0),
	(171, '103910', 'LIPICHOL CAP PAKISTAN         ', 2, 0),
	(172, '103934', 'NUTRAFOR BALANCE EXPORT       ', 1, 0),
	(173, '103965', 'MILOZ 5MG INJ EXPORT INGGRIS  ', 1, 0),
	(174, '103972', 'MILOZ 5MG INJ EXPORT SPANYOL  ', 2, 0),
	(175, '103989', 'MILOZ 5MG INJ EXPORT BELGIA   ', 2, 0),
	(176, '103996', 'MILOZ 5MG INJ EXPORT PORTUGAL ', 2, 0),
	(177, '104009', 'MILOZ 5MG INJ EXPORT TURKI    ', 1, 0),
	(178, '104016', 'MILOZ 15MG INJ EXPORT INGGRIS ', 2, 0),
	(179, '104023', 'MILOZ 15MG INJ EXPORT SPANYOL ', 1, 0),
	(180, '104030', 'MILOZ 15MG INJ EXPORT BELGIA  ', 2, 0),
	(181, '104047', 'MILOZ 15MG INJ EXPORT PORTUGAL', 1, 0),
	(182, '104054', 'MILOZ 15MG INJ EXPORT TURKI   ', 2, 0),
	(183, '104061', 'ALOVELL 10 TAB EXP INGGRIS    ', 1, 0),
	(184, '104078', 'ALOVELL 10 TAB EXP SPANYOL    ', 1, 0),
	(185, '104085', 'ALOVELL 10 TAB EXP BELGIA     ', 2, 0),
	(186, '104092', 'ALOVELL 10 TAB EXP PORTUGAL   ', 2, 0),
	(187, '104108', 'ALOVELL 10 TAB EXP TURKI      ', 2, 0),
	(188, '104115', 'HERAX 200 TAB EXP INGGRIS     ', 1, 0),
	(189, '104122', 'HERAX 200 TAB EXP SPANYOL     ', 2, 0),
	(190, '104139', 'HERAX 200 TAB EXP BELGIA      ', 2, 0),
	(191, '104146', 'HERAX 200 TAB EXP PORTUGAL    ', 1, 0),
	(192, '104153', 'HERAX 200 TAB EXP TURKI       ', 2, 0),
	(193, '104160', 'ONDAVELL 4 INJ EXP INGGRIS    ', 1, 0),
	(194, '104177', 'ONDAVELL 4 INJ EXP SPANYOL    ', 2, 0),
	(195, '104184', 'ONDAVELL 4 INJ EXP BELGIA     ', 1, 0),
	(196, '104191', 'ONDAVELL 4 INJ EXP PORTUGAL   ', 2, 0),
	(197, '104207', 'ONDAVELL 4 INJ EXP TURKI      ', 1, 0),
	(198, '104214', 'ONDAVELL 8 INJ EXP INGGRIS    ', 1, 0),
	(199, '104221', 'ONDAVELL 8 INJ EXP SPANYOL    ', 1, 0),
	(200, '104238', 'ONDAVELL 8 INJ EXP BELGIA     ', 1, 0),
	(201, '104245', 'ONDAVELL 8 INJ EXP PORTUGAL   ', 2, 0),
	(202, '104252', 'ONDAVELL 8 INJ EXP TURKI      ', 2, 0),
	(203, '104269', 'ONDAVELL 4MG TAB EXP INGGRIS  ', 2, 0),
	(204, '104276', 'ONDAVELL 4MG TAB EXP SPANYOL  ', 2, 0),
	(205, '104283', 'ONDAVELL 4MG TAB EXP BELGIA   ', 2, 0),
	(206, '104290', 'ONDAVELL 4MG TAB EXP PORTUGAL ', 2, 0),
	(207, '104306', 'ONDAVELL 4MG TAB EXP TURKI    ', 1, 0),
	(208, '104313', 'NOVALES 10 TAB EXP INGGRIS    ', 2, 0),
	(209, '104320', 'NOVALES 10 TAB EXP SPANYOL    ', 2, 0),
	(210, '104337', 'ONDAVELL 8MG TAB EXP INGGRIS  ', 1, 0),
	(211, '104344', 'NOVALES 10 TAB EXP BELGIA     ', 2, 0),
	(212, '104351', 'NOVALES 10 TAB EXP PORTUGAL   ', 1, 0),
	(213, '104368', 'ONDAVELL 8MG TAB EXP SPANYOL  ', 2, 0),
	(214, '104375', 'NOVALES 10 TAB EXP TURKI      ', 2, 0),
	(215, '104382', 'ONDAVELL 8MG TAB EXP BELGIA   ', 2, 0),
	(216, '104399', 'NOVALES 20 TAB EXP INGGRIS    ', 1, 0),
	(217, '104405', 'ONDAVELL 8MG TAB EXP PORTUGAL ', 1, 0),
	(218, '104412', 'NOVALES 20 TAB EXP SPANYOL    ', 2, 0),
	(219, '104429', 'ONDAVELL 8MG TAB EXP TURKI    ', 2, 0),
	(220, '104436', 'NOVALES 20 TAB EXP BELGIA     ', 1, 0),
	(221, '104443', 'NOVALES 20 TAB EXP PORTUGAL   ', 2, 0),
	(222, '104450', 'NOVALES 20 TAB EXP TURKI      ', 2, 0),
	(223, '104467', 'NOTRIXUM 2,5 INJ EXP INGGRIS  ', 1, 0),
	(224, '104474', 'NOTRIXUM 2,5 INJ EXP SPANYOL  ', 1, 0),
	(225, '104481', 'NOTRIXUM 2,5 INJ EXP BELGIA   ', 1, 0),
	(226, '104498', 'NOTRIXUM 2,5 INJ EXP PORTUGAL ', 2, 0),
	(227, '104504', 'NOTRIXUM 2,5 INJ EXP TURKI    ', 1, 0),
	(228, '104511', 'NOTRIXUM 5 INJ EXP INGGRIS    ', 1, 0),
	(229, '104528', 'NOTRIXUM 5 INJ EXP SPANYOL    ', 2, 0),
	(230, '104535', 'NOTRIXUM 5 INJ EXP BELGIA     ', 2, 0),
	(231, '104542', 'NOTRIXUM 5 INJ EXP PORTUGAL   ', 2, 0),
	(232, '104559', 'NOTRIXUM 5 INJ EXP TURKI      ', 1, 0),
	(233, '104566', 'RYVEL 10 TAB EXP INGGRIS      ', 1, 0),
	(234, '104573', 'RYVEL 10 TAB EXP SPANYOL      ', 2, 0),
	(235, '104580', 'RYVEL 10 TAB EXP BELGIA       ', 1, 0),
	(236, '104597', 'RYVEL 10 TAB EXP PORTUGAL     ', 2, 0),
	(237, '104603', 'RYVEL 10 TAB EXP TURKI        ', 2, 0),
	(238, '104610', 'CLINDAMYCIN 150 KAP EXP ING   ', 2, 0),
	(239, '104627', 'CLINDAMYCIN 150 KAP EXP SPA   ', 2, 0),
	(240, '104634', 'CLINDAMYCIN 150 KAP EXP BEL   ', 2, 0),
	(241, '104641', 'CLINDAMYCIN 150 KAP EXP POR   ', 2, 0),
	(242, '104658', 'CLINDAMYCIN 150 KAP EXP TUR   ', 2, 0),
	(243, '104665', 'CLINDAMYCIN 300 EXP INGGRIS   ', 2, 0),
	(244, '104672', 'CLINDAMYCIN 300 EXP SPANYOL   ', 1, 0),
	(245, '104689', 'CLINDAMYCIN 300 EXP BELGIA    ', 1, 0),
	(246, '104696', 'CLINDAMYCIN 300 EXP PORTUGAL  ', 2, 0),
	(247, '104702', 'CLINDAMYCIN 300 EXP TURKI     ', 2, 0),
	(248, '104719', 'SIMVASTATIN 10 TB EXP INGGRIS ', 1, 0),
	(249, '104726', 'SIMVASTATIN 10 TB EXP SPANYOL ', 2, 0),
	(250, '104733', 'SIMVASTATIN 10 TB EXP BELGIA  ', 1, 0);
/*!40000 ALTER TABLE `master_produk` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.master_subkriteria
DROP TABLE IF EXISTS `master_subkriteria`;
CREATE TABLE IF NOT EXISTS `master_subkriteria` (
  `imaster_subkriteria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `vnama` varchar(50) DEFAULT NULL,
  `fnilai_range1` float DEFAULT NULL,
  `fnilai_range2` float DEFAULT NULL,
  `fnilai` float DEFAULT NULL,
  PRIMARY KEY (`imaster_subkriteria`),
  KEY `imaster_kriteria` (`imaster_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_penjadwalan.master_subkriteria: ~3 rows (approximately)
/*!40000 ALTER TABLE `master_subkriteria` DISABLE KEYS */;
INSERT INTO `master_subkriteria` (`imaster_subkriteria`, `imaster_kriteria`, `vnama`, `fnilai_range1`, `fnilai_range2`, `fnilai`) VALUES
	(1, 4, 'Local', 1, 1, 10),
	(2, 4, 'Non Local', 2, 2, 20),
	(3, 4, 'Export', 3, 3, 30);
/*!40000 ALTER TABLE `master_subkriteria` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.random_index
DROP TABLE IF EXISTS `random_index`;
CREATE TABLE IF NOT EXISTS `random_index` (
  `index` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table spk_penjadwalan.random_index: ~13 rows (approximately)
/*!40000 ALTER TABLE `random_index` DISABLE KEYS */;
INSERT INTO `random_index` (`index`, `nilai`) VALUES
	(1, 0),
	(2, 0),
	(3, 0.58),
	(4, 0.9),
	(5, 1.12),
	(9, 1.45),
	(10, 1.49),
	(8, 1.41),
	(6, 1.24),
	(7, 1.32),
	(11, 1.51),
	(12, 1.48),
	(13, 1.56);
/*!40000 ALTER TABLE `random_index` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telpon` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_penjadwalan.tb_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`id_user`, `nama_user`, `user`, `pass`, `alamat`, `telpon`) VALUES
	(1, 'ACHMAD ARIES PIRNANDO', 'ariespirnando.it', '1234', 'JAKARTA', '-'),
	(2, 'Eka Yuni', 'Eka', '1234', 'JAKARTA', '-');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
