-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for chainventory
CREATE DATABASE IF NOT EXISTS `chainventory` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `chainventory`;

-- Dumping structure for table chainventory.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chainventory.barang: ~49 rows (approximately)
INSERT INTO `barang` (`id`, `kode_brg`, `nama_brg`, `kategori`, `merk`, `jumlah`) VALUES
	(1, '001/SOIL/UNP/2/24', 'Millipore ', 'Alat Ukur', 'Millipore Cooperation', 15),
	(2, '002/SOIL/UNP/2/24', 'Spektrofotometer', 'Alat Ukur', 'Konika Minolta', 4),
	(3, '003/SOIL/UNP/2/24', 'Leaf Area Meter', 'Alat Ukur', 'CID,INC', 4),
	(4, '004/SOIL/UNP/2/24', 'Jangka Sorong Plastik', 'Alat Ukur', 'Lokal', 2),
	(5, '005/SOIL/UNP/2/24', 'Jangka Sorong Besi', 'Alat Ukur', 'Mitutuyo', 6),
	(6, '006/SOIL/UNP/2/24', 'Pompa Vakum', 'Pompa', 'Gast', 11),
	(7, '007/SOIL/UNP/2/24', 'Mikroskop Monokuler', 'Mikroskop', 'Olympus', 14),
	(8, '008/SOIL/UNP/2/24', 'Mikroskop Binokuler', 'Mikroskop', 'Olympus', 4),
	(9, '009/SOIL/UNP/2/24', 'Centrifuge', 'Centrifuge', '-', 1),
	(10, '010/SOIL/UNP/2/24', 'Hygrometer', 'Hygrometer', '-', 20),
	(11, '011/SOIL/UNP/2/24', 'SPAD 502', 'SPAD', '-', 3),
	(12, '012/SOIL/UNP/2/24', 'Germinator Kabinet', 'Germinator', '-', 1),
	(13, '013/SOIL/UNP/2/24', 'Desikator', 'Desikator', 'Duran', 2),
	(14, '014/SOIL/UNP/2/24', 'Oven', 'Oven', 'Memmert', 1),
	(15, '015/SOIL/UNP/2/24', 'Neraca Analitik', 'Neraca', '-', 1),
	(16, '016/SOIL/UNP/2/24', 'Gelas Ukur 500ml', 'Gelas', 'Iwaki', 3),
	(17, '017/SOIL/UNP/2/24', 'Gelas Ukur 250ml', 'Gelas', 'Iwaki', 3),
	(18, '018/SOIL/UNP/2/24', 'Labu Ukur 500ml', 'Labu', 'Iwaki', 6),
	(19, '019/SOIL/UNP/2/24', 'Labu Ukur 250ml', 'Labu', 'Iwaki', 6),
	(20, '020/SOIL/UNP/2/24', 'Labu Ukur 100ml', 'Labu', 'Iwaki', 10),
	(21, '021/SOIL/UNP/2/24', 'Labu Ukur 50ml', 'Labu', 'Iwaki', 20),
	(22, '022/SOIL/UNP/2/24', 'Beaker Glass 1000ml', 'Beaker', 'Schot Duran', 20),
	(23, '023/SOIL/UNP/2/24', 'Beaker Glass 600ml', 'Beaker', 'Schot Duran', 20),
	(24, '024/SOIL/UNP/2/24', 'Beaker Glass 250ml', 'Beaker', 'Schot Duran', 20),
	(25, '025/SOIL/UNP/2/24', 'Beaker Glass 100ml', 'Beaker', 'Schot Duran', 20),
	(26, '026/SOIL/UNP/2/24', 'Petri Dish', 'Petri', 'Lokal', 50),
	(27, '027/SOIL/UNP/2/24', 'Tabung Reaksi Kecil', 'Tabung', 'Iwaki', 350),
	(28, '028/SOIL/UNP/2/24', 'Bagan Warna Daun', 'Bagan', '-', 20),
	(29, '029/SOIL/UNP/2/24', 'Hand Sprayer', 'Hand', '-', 6),
	(30, '030/SOIL/UNP/2/24', 'Floating Hidroponik', 'Floating', 'Lokal', 12),
	(31, '031/SOIL/UNP/2/24', 'NFT Hidroponik ', 'NFT', 'Lokal', 6),
	(32, '032/SOIL/UNP/2/24', 'Pipet', 'Pipet', 'Lokal', 10),
	(33, '033/SOIL/UNP/2/24', 'Botol Semprot', 'Botol', 'Lokal', 3),
	(34, '034/SOIL/UNP/2/24', 'Respirometer', 'Respirometer', '-', 10),
	(35, '035/SOIL/UNP/2/24', 'Mikro Pipet', 'Mikro', '-', 3),
	(36, '036/SOIL/UNP/2/24', 'Mikroskop Monokuler', 'Mikroskop', 'Lokal', 4),
	(37, '037/SOIL/UNP/2/24', 'Mikroskop Monokuler', 'Mikroskop', 'Nippon Kogaku', 8),
	(38, '038/SOIL/UNP/2/24', 'Mikroskop Binokuler', 'Mikroskop', 'Nikon', 14),
	(39, '039/SOIL/UNP/2/24', 'Lemari Alat', 'Lemari', 'Lokal', 3),
	(40, '040/SOIL/UNP/2/24', 'Rak Besi', 'Rak', 'Lokal', 3),
	(41, '041/SOIL/UNP/2/24', 'Meja Praktikum Besar', 'Meja', 'Lokal', 5),
	(42, '042/SOIL/UNP/2/24', 'Meja Kerja', 'Meja', 'Grand Furniture', 2),
	(43, '043/SOIL/UNP/2/24', 'Papan Tulis', 'Papan', 'Lokal', 1),
	(44, '044/SOIL/UNP/2/24', 'Kursi Lipat Merah', 'Kursi', 'Chitose', 30),
	(45, '045/SOIL/UNP/2/24', 'Kursi Kayu Praktikum', 'Kursi', 'Lokal', 30),
	(46, '046/SOIL/UNP/2/24', 'Rak Kayu', 'Rak', 'Lokal', 1),
	(47, '046/SOIL/UNP/2/24	', 'Osciloscope', 'Alat Ukur', '-', 1),
	(49, '048/SOIL/UNP/2/24', 'Osciloscope', 'Alat Ukur', '-', 12),
	(50, '048/SOIL/UNP/2/26', 'Kertas HVS', 'ATK', '-', 1);

-- Dumping structure for table chainventory.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `tgl_skembali` datetime NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_login` int NOT NULL,
  `denda` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chainventory.peminjaman: ~1 rows (approximately)
INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `no_identitas`, `tgl_skembali`, `kode_brg`, `jumlah`, `keperluan`, `status`, `id_login`, `denda`) VALUES
	(32, '2024-08-10 13:35:24', NULL, '2026791902', '2024-08-12 20:00:00', '001/SOIL/UNP/2/24', 1, 'KBM', 'Belum Kembali', 1, NULL);

-- Dumping structure for table chainventory.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `kontak` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table chainventory.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `no_identitas`, `nama`, `jabatan`, `username`, `password`, `role`, `kontak`) VALUES
	(6, '10501058', 'Chaca', 'Admin', 'chaca@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL),
	(7, '2026791901', 'Nuraini Azizah, S.Kom.', 'Coach', 'nurainiazizah@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'User', '081208389331'),
	(8, '2026791902', 'Sinsin', 'Student', 'sinsin@gmail.com', 'e6f3cfb6829ce910217031e37ffde567', 'User', '089782787822');

SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
