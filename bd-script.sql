-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for clinic
DROP DATABASE IF EXISTS `clinic`;
CREATE DATABASE IF NOT EXISTS `clinic` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `clinic`;

-- Dumping structure for table clinic.clinicrecords
DROP TABLE IF EXISTS `clinicrecords`;
CREATE TABLE IF NOT EXISTS `clinicrecords` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '0',
  `birthdate` date NOT NULL,
  `sex` char(1) NOT NULL DEFAULT '',
  `height` int unsigned NOT NULL DEFAULT '0',
  `weight` float unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table clinic.clinicrecords: ~10 rows (approximately)
REPLACE INTO `clinicrecords` (`id`, `name`, `birthdate`, `sex`, `height`, `weight`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Maria free', '1981-02-12', 'M', 189, 81, '2023-03-19 23:33:38', '2023-03-20 01:17:50', NULL),
	(3, 'Antonio Cardona e', '1977-03-02', 'M', 145, 56, '2023-03-20 00:01:36', '2023-03-20 00:01:36', NULL),
	(4, 'dasdas', '1988-01-31', 'M', 213, 22, '2023-03-20 00:03:01', '2023-03-20 00:03:01', NULL),
	(5, 'asdas da sd', '1977-01-03', 'M', 111, 22, '2023-03-20 00:03:52', '2023-03-20 00:03:52', NULL),
	(7, 'pedro perez', '1965-07-14', 'F', 199, 87.9, '2023-03-20 00:54:17', '2023-03-20 00:54:17', NULL),
	(8, 'andreas ', '2010-02-16', 'M', 166, 77.9, '2023-03-20 01:07:57', '2023-03-20 04:32:04', NULL),
	(9, 'breter', '1999-02-12', 'M', 145, 56, '2023-03-20 01:10:06', '2023-03-20 02:38:53', NULL),
	(10, 'nrnrnrer  as', '1966-08-22', 'M', 177, 54, '2023-03-20 01:11:42', '2023-03-20 01:11:42', NULL),
	(11, 'porte ss', '1955-01-12', 'F', 178, 200, '2023-03-20 01:13:13', '2023-03-20 01:13:13', NULL),
	(12, 'nestor', '1957-06-23', 'M', 165, 45, '2023-03-20 01:15:44', '2023-03-20 01:15:44', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
