-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2024 at 05:19 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chainventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int UNSIGNED NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_brg`, `nama_brg`, `kategori`, `merk`, `jumlah`) VALUES
(1, '001/SOIL/UNP/2/24', 'Millipore ', 'Alat Ukur', 'Millipore Cooperation', 15),
(2, '002/SOIL/UNP/2/24', 'Spektrofotometer', 'Alat Ukur', 'Konika Minolta', 5),
(3, '003/SOIL/UNP/2/24', 'Leaf Area Meter', 'Alat Ukur', 'CID,INC', 4),
(4, '004/SOIL/UNP/2/24', 'Jangka Sorong Plastik', 'Alat Ukur', 'Lokal', 2),
(5, '005/SOIL/UNP/2/24', 'Jangka Sorong Besi', 'Alat Ukur', 'Mitutuyo', 6),
(6, '006/SOIL/UNP/2/24', 'Pompa Vakum', 'Pompa', 'Gast', 11),
(7, '007/SOIL/UNP/2/24', 'Mikroskop Monokuler', 'Mikroskop', 'Olympus', 14),
(8, '008/SOIL/UNP/2/24', 'Mikroskop Binokuler', 'Mikroskop', 'Olympus', 4),
(9, '009/SOIL/UNP/2/24', 'Centrifuge', 'Centrifuge', '-', 5),
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
(44, '044/SOIL/UNP/2/24', 'Kursi Lipat Merah', 'Kursi', 'Chitose', 30),
(45, '045/SOIL/UNP/2/24', 'Kursi Kayu Praktikum', 'Kursi', 'Lokal', 30),
(46, '046/SOIL/UNP/2/24', 'Rak Kayu', 'Rak', 'Lokal', 1),
(51, '047/SOIL/UNP/2/24', 'Meja kayu', 'meja', 'lokal', 5);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int UNSIGNED NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `tgl_skembali` datetime NOT NULL,
  `kode_brg` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `id_login` int NOT NULL,
  `denda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `no_identitas`, `tgl_skembali`, `kode_brg`, `jumlah`, `keperluan`, `status`, `id_login`, `denda`) VALUES
(32, '2024-08-10 13:35:24', '2024-10-28 15:32:02', '2026791902', '2024-08-12 20:00:00', '001/SOIL/UNP/2/24', 1, 'KBM', 'Kembali', 1, NULL),
(33, '2024-10-28 08:35:29', '2024-10-28 16:23:22', '2026791902', '2024-10-30 00:00:00', '001/SOIL/UNP/2/24', 1, '', 'Kembali', 1, NULL),
(34, '2024-10-28 08:42:55', '2024-10-28 16:23:27', '2026791901', '2024-10-29 00:00:00', '001/SOIL/UNP/2/24', 1, '-', 'Kembali', 1, NULL),
(37, '2024-10-28 09:22:25', '2024-10-28 16:22:48', '2026791902', '2024-10-28 00:00:00', '001/SOIL/UNP/2/24', 5, '-', 'Kembali', 1, NULL),
(38, '2024-10-29 05:11:43', '2024-10-29 12:12:37', '2026791902', '2024-10-30 00:00:00', '010/SOIL/UNP/2/24', 3, '-', 'Kembali', 1, NULL),
(39, '2024-10-29 07:02:16', '2024-10-30 07:54:49', '2026791904', '2024-10-29 00:00:00', '001/SOIL/UNP/2/24', 1, 'pahandi', 'Kembali', 1, NULL),
(40, '2024-10-29 07:13:47', '2024-10-30 07:54:45', '2026791909', '2024-10-29 00:00:00', '001/SOIL/UNP/2/24', 1, 'dsuruh', 'Kembali', 1, NULL),
(41, '2024-10-30 01:07:43', '2024-10-30 08:10:54', '2026791905', '2024-10-31 00:00:00', '005/SOIL/UNP/2/24', 2, '-', 'Kembali', 1, NULL);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `TGL_JML_KEMBALI` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
UPDATE barang SET jumlah = jumlah + OLD.jumlah
WHERE kode_brg= OLD.kode_brg;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_BATAL_PINJAM` AFTER DELETE ON `peminjaman` FOR EACH ROW BEGIN
UPDATE barang SET jumlah = jumlah = OLD.jumlah
WHERE kode_brg= OLD.kode_brg;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TG_JML_PINJAM` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
UPDATE barang SET jumlah=jumlah-new.jumlah WHERE kode_brg=NEW.kode_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int UNSIGNED NOT NULL,
  `no_identitas` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `kontak` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `no_identitas`, `nama`, `jabatan`, `username`, `password`, `role`, `kontak`) VALUES
(6, '10501058', 'Chaca', 'Admin', 'chaca@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', NULL),
(15, '2026791904', 'vidya', 'Student', 'vidya@gmail.com', '755947307cbdc71c19147398057fb27f', 'User', '-'),
(18, '2026791905', 'angel', 'Coach', 'angel@gmail.com', 'cc0e08e3dc53952056ddd7ba9de5d6e7', 'User', '-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
