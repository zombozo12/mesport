-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 05:52 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mesport`
--
CREATE DATABASE IF NOT EXISTS `db_mesport` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_mesport`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acc`
--

CREATE TABLE `tbl_acc` (
  `id` int(4) NOT NULL,
  `id_pemilik` int(4) NOT NULL,
  `id_booking` int(4) NOT NULL,
  `status` enum('Pending','Confirmed','Finished','Declined') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acc`
--

INSERT INTO `tbl_acc` (`id`, `id_pemilik`, `id_booking`, `status`) VALUES
(1, 2, 1, 'Confirmed'),
(2, 2, 2, 'Pending'),
(3, 2, 3, 'Pending'),
(4, 2, 4, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_lapangan` int(4) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `id_pengguna`, `id_lapangan`, `start`, `end`) VALUES
(1, 1, 1, '10:00', '12:00'),
(2, 2, 1, '10:00', '12:00'),
(3, 2, 1, '10:00', '10:00'),
(4, 2, 1, '10:00', '10:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapangan`
--

CREATE TABLE `tbl_lapangan` (
  `id` int(4) NOT NULL,
  `id_pemilik` int(4) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis` enum('Lapangan Futsal','Lapangan Basket','Lapangan Tenis') NOT NULL,
  `lokasi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` bigint(16) NOT NULL,
  `kategori` enum('Indoor','Outdoor') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lapangan`
--

INSERT INTO `tbl_lapangan` (`id`, `id_pemilik`, `nama`, `jenis`, `lokasi`, `deskripsi`, `harga`, `kategori`, `foto`) VALUES
(1, 2, 'Fortuna', 'Lapangan Futsal', 'ads', 'asd', 100000, 'Indoor', 'L0xm7ff98U.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(4) NOT NULL,
  `id_pengguna` int(4) NOT NULL,
  `id_booking` int(4) NOT NULL,
  `metode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`id`, `id_pengguna`, `id_booking`, `metode`) VALUES
(1, 2, 2, 'gopay');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemilik`
--

CREATE TABLE `tbl_pemilik` (
  `id` int(4) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `kontak` bigint(13) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemilik`
--

INSERT INTO `tbl_pemilik` (`id`, `nama`, `kontak`, `email`, `password`, `jenis_kelamin`, `foto`) VALUES
(1, 'sentot', 8649252153287, 'fredgfreghtrhtgrfgr@yahoo.com', 'e640f7e6fdb4274a7f065c59e52138de', 'L', ''),
(2, 'asd', 123, 'asd@asd.asd', '7815696ecbf1c96e6894b779456d330e', 'L', ''),
(3, 'pemilik', 808, 'pemilik@mail.com', '0cc175b9c0f1b6a831c399e269772661', 'L', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE `tbl_saldo` (
  `id` int(4) NOT NULL,
  `id_pengguna` int(4) DEFAULT NULL,
  `id_pemilik` int(4) DEFAULT NULL,
  `jumlah` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`id`, `id_pengguna`, `id_pemilik`, `jumlah`) VALUES
(12, 2, NULL, 1111110);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(4) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `kontak` bigint(13) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `nama`, `kontak`, `email`, `password`, `jenis_kelamin`, `foto`) VALUES
(1, 'asd', 0, 'asd@asd.asd', '7815696ecbf1c96e6894b779456d330e', 'L', ''),
(2, 'test01', 8080808, 'test01@mail.com', '0cc175b9c0f1b6a831c399e269772661', 'L', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lapangan` (`id_lapangan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_booking` (`id_booking`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_pemilik`
--
ALTER TABLE `tbl_pemilik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemilik` (`id_pemilik`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pemilik`
--
ALTER TABLE `tbl_pemilik`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_acc`
--
ALTER TABLE `tbl_acc`
  ADD CONSTRAINT `tbl_acc_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `tbl_booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_acc_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tbl_pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`id_lapangan`) REFERENCES `tbl_lapangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_booking_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lapangan`
--
ALTER TABLE `tbl_lapangan`
  ADD CONSTRAINT `tbl_lapangan_ibfk_1` FOREIGN KEY (`id_pemilik`) REFERENCES `tbl_pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD CONSTRAINT `tbl_pembayaran_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `tbl_booking` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pembayaran_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
  ADD CONSTRAINT `tbl_saldo_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_saldo_ibfk_2` FOREIGN KEY (`id_pemilik`) REFERENCES `tbl_pemilik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
