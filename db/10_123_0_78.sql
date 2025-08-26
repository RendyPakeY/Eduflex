-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.78:3306
-- Generation Time: Aug 25, 2025 at 01:38 PM
-- Server version: 8.0.16
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rensap10_eduflex`
--
CREATE DATABASE IF NOT EXISTS `rensap10_eduflex` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rensap10_eduflex`;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(12) NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `pengarang`) VALUES
(1, 'Introduction to Programming', 'John Smith'),
(2, 'Advanced Mathematics', 'Jane Taylor'),
(3, 'Siksa Neraka', '-'),
(4, 'Database Management Systems', 'William Brown');

-- --------------------------------------------------------

--
-- Table structure for table `Coba`
--

CREATE TABLE `Coba` (
  `id` int(11) NOT NULL,
  `Banyak` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci TABLESPACE `rensap10_eduflex`;

-- --------------------------------------------------------

--
-- Table structure for table `kantin`
--

CREATE TABLE `kantin` (
  `menu_id` int(20) NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `keterangan` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `kantin`
--

INSERT INTO `kantin` (`menu_id`, `nama_menu`, `harga`, `keterangan`) VALUES
(1, 'Nasi Goreng', 15000, 'membeli'),
(2, 'Mie Goreng', 12000, 'membeli'),
(3, 'Ayam Penyet', 20000, 'membeli'),
(4, 'saldo', 5000, 'menambah'),
(5, 'saldo', 10000, 'menambah'),
(6, 'saldo', 20000, 'menambah'),
(7, 'saldo', 30000, 'menambah'),
(8, 'saldo', 50000, 'menambah'),
(9, 'saldo', 100000, 'menambah'),
(10, 'saldo', 5000, 'menukar'),
(11, 'saldo', 10000, 'menukar'),
(12, 'saldo', 20000, 'menukar'),
(13, 'saldo', 30000, 'menukar'),
(14, 'saldo', 50000, 'menukar'),
(15, 'saldo', 100000, 'menukar');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `kehadiran_id` int(20) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`kehadiran_id`, `user_id`, `tanggal`) VALUES
(1, 1, '2024-10-01'),
(2, 2, '2024-11-02'),
(3, 3, '2024-12-03'),
(4, 4, '2024-11-04'),
(5, 1, '2025-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(20) NOT NULL,
  `kelas` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk1` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk2` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk3` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk4` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk5` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk6` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk7` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `elk8` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `re1` int(11) NOT NULL,
  `re2` int(11) NOT NULL,
  `re3` int(11) NOT NULL,
  `re4` int(11) NOT NULL,
  `re5` int(11) NOT NULL,
  `re6` int(11) NOT NULL,
  `re7` int(11) NOT NULL,
  `re8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas`, `elk1`, `elk2`, `elk3`, `elk4`, `elk5`, `elk6`, `elk7`, `elk8`, `re1`, `re2`, `re3`, `re4`, `re5`, `re6`, `re7`, `re8`) VALUES
(2, 'XI TAV 2', 'Pintu kelas', 'Lampu', 'Lampu Speaker', '-', 'Kipas angin', 'Stopkontak 1', 'Stopkontak 2', '', 0, 0, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `Jenis kendaraan` varchar(30) NOT NULL,
  `Tahun kendaraan` int(4) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci TABLESPACE `rensap10_eduflex`;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `peminjaman_id` int(20) NOT NULL,
  `buku_id` int(12) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `harus_kembali` date DEFAULT NULL,
  `denda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`peminjaman_id`, `buku_id`, `user_id`, `tanggal_pinjam`, `harus_kembali`, `denda`) VALUES
(2, 2, 2, '2024-11-02', '2024-11-12', 0),
(38, 2, 1, '2025-02-15', '2025-02-22', 0),
(40, 1, 1, '2025-06-17', '2025-06-24', 0),
(41, 1, 1, '2025-06-18', '2025-06-25', 0),
(42, 3, 1, '2025-06-18', '2025-06-25', 0),
(43, 3, 1, '2025-06-18', '2025-06-25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(20) NOT NULL,
  `user_id` int(12) DEFAULT NULL,
  `menu_id` int(3) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `user_id`, `menu_id`, `tanggal`) VALUES
(1, 1, 2, '2024-12-02'),
(2, 1, 1, '2024-12-02'),
(3, 1, 4, '2024-12-02'),
(4, 1, 3, '2024-12-02'),
(5, 1, 1, '2024-12-04'),
(6, 1, 1, '2024-12-04'),
(7, 1, 1, '2024-12-05'),
(8, 1, 1, '2024-12-05'),
(9, 1, 1, '2024-12-05'),
(10, 1, 1, '2024-12-05'),
(11, 1, 1, '2024-12-05'),
(12, 1, 1, '2024-12-05'),
(13, 1, 5, '2024-12-05'),
(14, 1, 4, '2024-12-05'),
(15, 1, 10, '2024-12-06'),
(16, 1, 11, '2024-12-06'),
(17, 1, 11, '2024-12-06'),
(18, 1, 11, '2024-12-06'),
(19, 1, 11, '2024-12-06'),
(20, 1, 11, '2024-12-07'),
(21, 1, 5, '2025-02-06'),
(22, 1, 1, '2025-02-08'),
(23, 1, 3, '2025-02-08'),
(24, 1, 3, '2025-02-08'),
(25, 1, 3, '2025-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(12) NOT NULL,
  `username` varchar(500) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rfid` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `saldo` int(10) DEFAULT '0',
  `akses` int(1) DEFAULT NULL,
  `foto` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci TABLESPACE `rensap10_eduflex`;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama`, `kelas`, `rfid`, `saldo`, `akses`, `foto`) VALUES
(1, 'admin', '123', 'Rendy Khaerul Rizal', 'XI TAV 2', '7a30432', 10000, 1, '1.jpg'),
(2, 'guru', '123', 'M Aditya Ramdany', 'XI TAV 2', 'RFID002', 100000, 6, '2.jpg'),
(3, 'siswa', '123', 'Irawan Anugrah', 'XI TAV 2', 'RFID003', 10000, 2, '3.jpg'),
(4, 'petugas', '123', 'Siregar Mustofa', 'XI TAV 3', 'RFID004', 20000, 3, '4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `idx_buku_judul` (`judul`),
  ADD KEY `idx_buku_pengarang` (`pengarang`);

--
-- Indexes for table `Coba`
--
ALTER TABLE `Coba`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `kantin`
--
ALTER TABLE `kantin`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`kehadiran_id`),
  ADD KEY `idx_kehadiran_user_id` (`user_id`),
  ADD KEY `idx_kehadiran_tanggal` (`tanggal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `idx_kelas_kelas` (`kelas`) USING BTREE;

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD UNIQUE KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`peminjaman_id`),
  ADD KEY `idx_peminjaman_buku_id` (`buku_id`),
  ADD KEY `idx_peminjaman_user_id` (`user_id`),
  ADD KEY `idx_peminjaman_tanggal_pinjam` (`tanggal_pinjam`),
  ADD KEY `idx_peminjaman_harus_kembali` (`harus_kembali`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx_user_nama` (`nama`),
  ADD KEY `idx_user_kelas` (`kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Coba`
--
ALTER TABLE `Coba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kantin`
--
ALTER TABLE `kantin`
  MODIFY `menu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `kehadiran_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `peminjaman_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `user` (`kelas`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `kantin` (`menu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
