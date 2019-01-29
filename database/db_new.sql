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
CREATE DATABASE IF NOT EXISTS `spk_penjadwalan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `spk_penjadwalan`;

-- Dumping structure for table spk_penjadwalan.alternatif_periode
CREATE TABLE IF NOT EXISTS `alternatif_periode` (
  `ialternatif_periode` int(11) NOT NULL AUTO_INCREMENT,
  `ikriteria_periode` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `yTahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`ialternatif_periode`),
  KEY `ikriteria_periode` (`ikriteria_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table spk_penjadwalan.alternatif_periode: ~1 rows (approximately)
/*!40000 ALTER TABLE `alternatif_periode` DISABLE KEYS */;
INSERT INTO `alternatif_periode` (`ialternatif_periode`, `ikriteria_periode`, `bulan`, `yTahun`) VALUES
	(1, 1, 1, '2010');
/*!40000 ALTER TABLE `alternatif_periode` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.alternativ
CREATE TABLE IF NOT EXISTS `alternativ` (
  `ialternativ` int(11) NOT NULL AUTO_INCREMENT,
  `ialternatif_periode` int(11) NOT NULL DEFAULT '0',
  `imaster_produk` int(11) DEFAULT NULL,
  `fnilai_akhir` float DEFAULT NULL,
  `irangking` int(11) DEFAULT NULL,
  `iset` int(11) DEFAULT NULL,
  PRIMARY KEY (`ialternativ`),
  KEY `ialternatif_periode` (`ialternatif_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.alternativ: ~13 rows (approximately)
/*!40000 ALTER TABLE `alternativ` DISABLE KEYS */;
INSERT INTO `alternativ` (`ialternativ`, `ialternatif_periode`, `imaster_produk`, `fnilai_akhir`, `irangking`, `iset`) VALUES
	(110, 1, 12, 0.741, 9, 0),
	(111, 1, 41, 0.614, 14, 0),
	(112, 1, 43, 0.96, 4, 0),
	(113, 1, 51, 0.735, 11, 0),
	(114, 1, 52, 0.968, 2, 0),
	(115, 1, 60, 0.847, 7, 0),
	(116, 1, 61, 0.655, 12, 0),
	(117, 1, 63, 0.847, 8, 0),
	(118, 1, 73, 0.614, 15, 0),
	(119, 1, 101, 0.646, 13, 0),
	(120, 1, 176, 0.741, 10, 0),
	(121, 1, 203, 0.96, 5, 0),
	(122, 1, 226, 0.968, 3, 0),
	(123, 1, 243, 0.879, 6, 0),
	(124, 1, 246, 1, 1, 0);
/*!40000 ALTER TABLE `alternativ` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.alternativ_detail
CREATE TABLE IF NOT EXISTS `alternativ_detail` (
  `ialternativ_detail` int(11) NOT NULL AUTO_INCREMENT,
  `ialternativ` int(11) DEFAULT NULL,
  `ialternatif_periode` int(11) DEFAULT NULL,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `ikriteria_nilai` int(11) DEFAULT NULL,
  `fnilai_awal` float DEFAULT NULL,
  `fnilai_awal2` float DEFAULT NULL,
  `fnilai_normal` float DEFAULT NULL,
  `fnilai_bobot` float DEFAULT NULL,
  PRIMARY KEY (`ialternativ_detail`),
  KEY `ialternativ` (`ialternativ`),
  KEY `imaster_kriteria` (`imaster_kriteria`),
  KEY `ikriteria_nilai` (`ikriteria_nilai`),
  KEY `ialternatif_periode` (`ialternatif_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=473 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.alternativ_detail: ~60 rows (approximately)
/*!40000 ALTER TABLE `alternativ_detail` DISABLE KEYS */;
INSERT INTO `alternativ_detail` (`ialternativ_detail`, `ialternativ`, `ialternatif_periode`, `imaster_kriteria`, `ikriteria_nilai`, `fnilai_awal`, `fnilai_awal2`, `fnilai_normal`, `fnilai_bobot`) VALUES
	(413, 110, 1, 1, 45, 3, 3, 1, 0.096),
	(414, 110, 1, 2, 46, 1, 34, 0.25, 0.04),
	(415, 110, 1, 3, 47, 2, 1, 0.5, 0.139),
	(416, 110, 1, 4, 48, 2, 2, 1, 0.466),
	(417, 111, 1, 1, 45, 2, 2, 0.667, 0.064),
	(418, 111, 1, 2, 46, 1, 55, 0.25, 0.04),
	(419, 111, 1, 3, 47, 1, 1.9, 1, 0.277),
	(420, 111, 1, 4, 48, 1, 1, 0.5, 0.233),
	(421, 112, 1, 1, 45, 3, 3, 1, 0.096),
	(422, 112, 1, 2, 46, 3, 72, 0.75, 0.121),
	(423, 112, 1, 3, 47, 1, 1.5, 1, 0.277),
	(424, 112, 1, 4, 48, 2, 2, 1, 0.466),
	(425, 113, 1, 1, 45, 2, 2, 0.667, 0.064),
	(426, 113, 1, 2, 46, 4, 92, 1, 0.161),
	(427, 113, 1, 3, 47, 1, 1.5, 1, 0.277),
	(428, 113, 1, 4, 48, 1, 1, 0.5, 0.233),
	(429, 114, 1, 1, 45, 2, 2, 0.667, 0.064),
	(430, 114, 1, 2, 46, 4, 83, 1, 0.161),
	(431, 114, 1, 3, 47, 1, 1.5, 1, 0.277),
	(432, 114, 1, 4, 48, 2, 2, 1, 0.466),
	(433, 115, 1, 1, 45, 2, 2, 0.667, 0.064),
	(434, 115, 1, 2, 46, 1, 40, 0.25, 0.04),
	(435, 115, 1, 3, 47, 1, 1.5, 1, 0.277),
	(436, 115, 1, 4, 48, 2, 2, 1, 0.466),
	(437, 116, 1, 1, 45, 2, 2, 0.667, 0.064),
	(438, 116, 1, 2, 46, 2, 61, 0.5, 0.081),
	(439, 116, 1, 3, 47, 1, 1.5, 1, 0.277),
	(440, 116, 1, 4, 48, 1, 1, 0.5, 0.233),
	(441, 117, 1, 1, 45, 2, 2, 0.667, 0.064),
	(442, 117, 1, 2, 46, 1, 20, 0.25, 0.04),
	(443, 117, 1, 3, 47, 1, 1.5, 1, 0.277),
	(444, 117, 1, 4, 48, 2, 2, 1, 0.466),
	(445, 118, 1, 1, 45, 2, 2, 0.667, 0.064),
	(446, 118, 1, 2, 46, 1, 17, 0.25, 0.04),
	(447, 118, 1, 3, 47, 1, 1.5, 1, 0.277),
	(448, 118, 1, 4, 48, 1, 1, 0.5, 0.233),
	(449, 119, 1, 1, 45, 3, 3, 1, 0.096),
	(450, 119, 1, 2, 46, 1, 42, 0.25, 0.04),
	(451, 119, 1, 3, 47, 1, 1.9, 1, 0.277),
	(452, 119, 1, 4, 48, 1, 1, 0.5, 0.233),
	(453, 120, 1, 1, 45, 3, 3, 1, 0.096),
	(454, 120, 1, 2, 46, 1, 55, 0.25, 0.04),
	(455, 120, 1, 3, 47, 2, 0.7, 0.5, 0.139),
	(456, 120, 1, 4, 48, 2, 2, 1, 0.466),
	(457, 121, 1, 1, 45, 3, 3, 1, 0.096),
	(458, 121, 1, 2, 46, 3, 79, 0.75, 0.121),
	(459, 121, 1, 3, 47, 1, 1.9, 1, 0.277),
	(460, 121, 1, 4, 48, 2, 2, 1, 0.466),
	(461, 122, 1, 1, 45, 2, 2, 0.667, 0.064),
	(462, 122, 1, 2, 46, 4, 90, 1, 0.161),
	(463, 122, 1, 3, 47, 1, 1.9, 1, 0.277),
	(464, 122, 1, 4, 48, 2, 2, 1, 0.466),
	(465, 123, 1, 1, 45, 3, 3, 1, 0.096),
	(466, 123, 1, 2, 46, 1, 41, 0.25, 0.04),
	(467, 123, 1, 3, 47, 1, 1.9, 1, 0.277),
	(468, 123, 1, 4, 48, 2, 2, 1, 0.466),
	(469, 124, 1, 1, 45, 3, 3, 1, 0.096),
	(470, 124, 1, 2, 46, 4, 90, 1, 0.161),
	(471, 124, 1, 3, 47, 1, 1.9, 1, 0.277),
	(472, 124, 1, 4, 48, 2, 2, 1, 0.466);
/*!40000 ALTER TABLE `alternativ_detail` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.history_transaksi
CREATE TABLE IF NOT EXISTS `history_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ckode_produk` varchar(255) DEFAULT NULL,
  `kesediaan_bb` float DEFAULT '0',
  `leadtime_shipment` float DEFAULT '0',
  `level_stock_fg` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.history_transaksi: ~15 rows (approximately)
/*!40000 ALTER TABLE `history_transaksi` DISABLE KEYS */;
INSERT INTO `history_transaksi` (`id`, `ckode_produk`, `kesediaan_bb`, `leadtime_shipment`, `level_stock_fg`) VALUES
	(1, '100032', 3, 34, 1),
	(2, '100407', 3, 72, 1.5),
	(3, '100513', 2, 92, 1.5),
	(4, '100520', 2, 83, 1.5),
	(5, '104696', 3, 90, 1.9),
	(6, '101978', 3, 42, 1.9),
	(7, '104665', 3, 41, 1.9),
	(8, '104498', 2, 90, 1.9),
	(9, '100384', 2, 55, 1.9),
	(10, '104269', 3, 79, 1.9),
	(11, '103996', 3, 55, 0.7),
	(12, '100674', 2, 40, 1.5),
	(13, '100704', 2, 20, 1.5),
	(14, '100681', 2, 61, 1.5),
	(15, '100834', 2, 17, 1.5),
	(16, '105181', 1, 55, 0.6),
	(17, '105242', 1, 15, 1),
	(18, '105587', 3, 62, 1.5),
	(19, '105686', 1, 55, 1.2),
	(20, '105792', 2, 66, 1),
	(21, '100643', 3, 77, 0.6),
	(22, '100711', 1, 84, 1.5),
	(23, '100018', 2, 35, 0.8),
	(24, '100049', 2, 65, 1.9),
	(25, '100063', 2, 55, 20);
/*!40000 ALTER TABLE `history_transaksi` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_nilai
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table spk_penjadwalan.kriteria_nilai: ~4 rows (approximately)
/*!40000 ALTER TABLE `kriteria_nilai` DISABLE KEYS */;
INSERT INTO `kriteria_nilai` (`ikriteria_nilai`, `imaster_kriteria`, `ikriteria_periode`, `fawal`, `fjumlah`, `fvaktor`, `ftmax`, `fbobot`) VALUES
	(45, 1, 1, 10, 0.384, 0.096, 0.96, 0.096),
	(46, 2, 1, 6.5, 0.644, 0.161, 1.047, 0.161),
	(47, 3, 1, 3.833, 1.109, 0.277, 1.062, 0.277),
	(48, 4, 1, 2.083, 1.864, 0.466, 0.971, 0.466);
/*!40000 ALTER TABLE `kriteria_nilai` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_nilai_detail
CREATE TABLE IF NOT EXISTS `kriteria_nilai_detail` (
  `ikriteria_nilai_detail` int(11) NOT NULL AUTO_INCREMENT,
  `ikriteria_periode` int(11) NOT NULL DEFAULT '0',
  `imaster_kriteria_x` int(11) NOT NULL COMMENT 'x - untuk kriteria samping',
  `imaster_kriteria_y` int(11) DEFAULT NULL COMMENT 'y - untuk kriteria bawah',
  `fnilai_awal` float DEFAULT NULL,
  `fnilai_normalisasi` float DEFAULT NULL,
  PRIMARY KEY (`ikriteria_nilai_detail`),
  KEY `imaster_kriteria_periode` (`ikriteria_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table spk_penjadwalan.kriteria_nilai_detail: ~16 rows (approximately)
/*!40000 ALTER TABLE `kriteria_nilai_detail` DISABLE KEYS */;
INSERT INTO `kriteria_nilai_detail` (`ikriteria_nilai_detail`, `ikriteria_periode`, `imaster_kriteria_x`, `imaster_kriteria_y`, `fnilai_awal`, `fnilai_normalisasi`) VALUES
	(177, 1, 1, 1, 1, 0.1),
	(178, 1, 1, 2, 0.5, 0.077),
	(179, 1, 1, 3, 0.333, 0.087),
	(180, 1, 1, 4, 0.25, 0.12),
	(181, 1, 2, 1, 2, 0.2),
	(182, 1, 2, 2, 1, 0.154),
	(183, 1, 2, 3, 0.5, 0.13),
	(184, 1, 2, 4, 0.333, 0.16),
	(185, 1, 3, 1, 3, 0.3),
	(186, 1, 3, 2, 2, 0.308),
	(187, 1, 3, 3, 1, 0.261),
	(188, 1, 3, 4, 0.5, 0.24),
	(189, 1, 4, 1, 4, 0.4),
	(190, 1, 4, 2, 3, 0.462),
	(191, 1, 4, 3, 2, 0.522),
	(192, 1, 4, 4, 1, 0.48);
/*!40000 ALTER TABLE `kriteria_nilai_detail` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.kriteria_periode
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
	(2, 'C2', 'Leadtime Shipment', 'Benefit', NULL),
	(3, 'C3', 'Level Stock FG', 'Cost', NULL),
	(4, 'C4', 'Jenis Produk', 'Benefit', NULL);
/*!40000 ALTER TABLE `master_kriteria` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.master_produk
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
CREATE TABLE IF NOT EXISTS `master_subkriteria` (
  `imaster_subkriteria` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `imaster_kriteria` int(11) DEFAULT NULL,
  `vnama` varchar(50) DEFAULT NULL,
  `fnilai_range1` float DEFAULT NULL,
  `fnilai_range2` float DEFAULT NULL,
  `fnilai` float DEFAULT NULL,
  PRIMARY KEY (`imaster_subkriteria`),
  KEY `imaster_kriteria` (`imaster_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table spk_penjadwalan.master_subkriteria: ~12 rows (approximately)
/*!40000 ALTER TABLE `master_subkriteria` DISABLE KEYS */;
INSERT INTO `master_subkriteria` (`imaster_subkriteria`, `imaster_kriteria`, `vnama`, `fnilai_range1`, `fnilai_range2`, `fnilai`) VALUES
	(1, 4, 'Local', 1, 1, 1),
	(2, 4, 'Non Local', 2, 2, 2),
	(3, 4, 'Export', 3, 3, 3),
	(4, 3, '< 0,5 bulan ', 0, 0.49, 3),
	(5, 3, '0,5 bulan -  1 bulan', 0.5, 1, 2),
	(6, 1, 'Print PO', 2, 2, 2),
	(7, 1, 'Ready', 3, 3, 3),
	(8, 1, 'Open PO', 1, 1, 1),
	(9, 2, '90 hari – 81 hari', 81, 100, 4),
	(10, 2, '80 hari – 71 hari', 71, 80, 3),
	(11, 2, '70 hari – 60 hari', 60, 70, 2),
	(12, 2, '< 59 hari', -99999, 59, 1),
	(13, 3, '>1 Bulan', 1.01, 9999, 1);
/*!40000 ALTER TABLE `master_subkriteria` ENABLE KEYS */;

-- Dumping structure for table spk_penjadwalan.random_index
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
