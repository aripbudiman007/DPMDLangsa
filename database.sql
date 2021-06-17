-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for dpmd_langsa
DROP DATABASE IF EXISTS `dpmd_langsa`;
CREATE DATABASE IF NOT EXISTS `dpmd_langsa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dpmd_langsa`;

-- Dumping structure for table dpmd_langsa.tb_berkas
DROP TABLE IF EXISTS `tb_berkas`;
CREATE TABLE IF NOT EXISTS `tb_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_berkas` varchar(255) DEFAULT NULL,
  `jenis_berkas` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dpmd_langsa.tb_berkas: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_berkas` DISABLE KEYS */;
REPLACE INTO `tb_berkas` (`id`, `nama_berkas`, `jenis_berkas`, `berkas`) VALUES
	(5, 'Berkas 2', '9', '720-2193-1-PB.pdf');
/*!40000 ALTER TABLE `tb_berkas` ENABLE KEYS */;

-- Dumping structure for table dpmd_langsa.tb_berkas_penduduk
DROP TABLE IF EXISTS `tb_berkas_penduduk`;
CREATE TABLE IF NOT EXISTS `tb_berkas_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `jenis_berkas` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dpmd_langsa.tb_berkas_penduduk: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_berkas_penduduk` DISABLE KEYS */;
REPLACE INTO `tb_berkas_penduduk` (`id`, `nik`, `berkas`, `jenis_berkas`) VALUES
	(1, '320170140150160', '941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png', '1'),
	(2, '320170140150160', '941px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png', '2'),
	(4, '1234567', '9951-beautiful-hd-pictures-stage.jpg', '1');
/*!40000 ALTER TABLE `tb_berkas_penduduk` ENABLE KEYS */;

-- Dumping structure for table dpmd_langsa.tb_jenis_berkas
DROP TABLE IF EXISTS `tb_jenis_berkas`;
CREATE TABLE IF NOT EXISTS `tb_jenis_berkas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_berkas` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table dpmd_langsa.tb_jenis_berkas: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_jenis_berkas` DISABLE KEYS */;
REPLACE INTO `tb_jenis_berkas` (`id`, `jenis_berkas`) VALUES
	(9, 'SK (Surat Keputusan)');
/*!40000 ALTER TABLE `tb_jenis_berkas` ENABLE KEYS */;

-- Dumping structure for table dpmd_langsa.tb_penduduk
DROP TABLE IF EXISTS `tb_penduduk`;
CREATE TABLE IF NOT EXISTS `tb_penduduk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(25) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index 2` (`nik`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table dpmd_langsa.tb_penduduk: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_penduduk` DISABLE KEYS */;
REPLACE INTO `tb_penduduk` (`id`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `status`) VALUES
	(2, '123456789', 'Budi', 'Laki-laki', 'Ciamis', '2021-06-01', 'Bandung', 'Pindah'),
	(3, '1234567', 'a', 'Laki-laki', 'a', '2021-06-17', 'a', 'Hidup');
/*!40000 ALTER TABLE `tb_penduduk` ENABLE KEYS */;

-- Dumping structure for table dpmd_langsa.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `level` int(15) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dpmd_langsa.tb_user: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
REPLACE INTO `tb_user` (`id`, `username`, `password`, `nik`, `level`, `status`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '123456', 1, 1),
	(3, 'budi', '21232f297a57a5a743894a0e4a801fc3', '123456789', 2, 1),
	(4, 'santoso', '21232f297a57a5a743894a0e4a801fc3', '1234567', 2, 1);
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
