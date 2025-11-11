-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_simplecrud
CREATE DATABASE IF NOT EXISTS `db_simplecrud` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `db_simplecrud`;

-- Dumping structure for table db_simplecrud.tb_mahasiswa
CREATE TABLE IF NOT EXISTS `tb_sepatu` (
  `id_sepatu` int(11) NOT NULL AUTO_INCREMENT,
  `kode_sepatu` char(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `nama_sepatu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `jenis_sepatu` char(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `merk_sepatu` mediumint(3) NOT NULL,
  `harga` number(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id_sepatu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_mahasiswa: ~0 rows (approximately)

-- Dumping structure for table db_simplecrud.tb_prodi
CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `kode_jenis` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sepatu` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`kode_jenis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_prodi: ~9 rows (approximately)
INSERT INTO `tb_jenis` (`kode_jenis`, `jenis_sepatu`) VALUES
	('001', 'Sneakers'),
	('002', 'Running Shoes'),
	('003', 'Boots'),
	('004', 'Casual'),
	('005', 'Skateboard'),
	('006', 'Training Shoes'),
	('007', 'Slip-on'),
	('008', 'Work Boots'),
	('009', 'Hiking Boots');

-- Dumping structure for table db_simplecrud.tb_provinsi
CREATE TABLE IF NOT EXISTS `tb_merk` (
  `id_merk` smallint(3) NOT NULL AUTO_INCREMENT,
  `merk_sepatu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_simplecrud.tb_provinsi: ~6 rows (approximately)
INSERT INTO `tb_merk` (`id_merk`, `merk_sepatu`) VALUES
	(1, 'Nike'),
	(2, 'Adidas'),
	(3, 'Puma'),
	(4, 'Convers'),
	(5, 'Vans'),
	(6, 'Reebok');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
