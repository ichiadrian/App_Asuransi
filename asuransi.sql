-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 05:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asuransi`
--

-- --------------------------------------------------------

--
-- Table structure for table `klaim_polis`
--

CREATE TABLE `klaim_polis` (
  `idklaim` int(11) NOT NULL,
  `pemegang_polis` varchar(50) NOT NULL,
  `pengajuan_klaim` varchar(70) NOT NULL,
  `identitas` varchar(70) NOT NULL,
  `form_polis` varchar(70) NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_perubahan_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `penginput` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_baru`
--

CREATE TABLE `pengajuan_baru` (
  `idasuransi` int(11) UNSIGNED NOT NULL,
  `pemegang_polis` varchar(50) NOT NULL,
  `form_permohonan` varchar(70) NOT NULL,
  `identitas` varchar(70) NOT NULL,
  `bukti_transfer` varchar(70) NOT NULL,
  `buku_tabungan` varchar(70) NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_perubahan_status` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `penginput` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perpanjangan_polis`
--

CREATE TABLE `perpanjangan_polis` (
  `idperpanjang` int(11) UNSIGNED NOT NULL,
  `pemegang_polis` varchar(50) NOT NULL,
  `perpanjangan_polis` varchar(70) NOT NULL,
  `identitas` varchar(70) NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_perubahan_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `penginput` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_polis`
--

CREATE TABLE `status_polis` (
  `idstatus` int(10) UNSIGNED NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_polis`
--

INSERT INTO `status_polis` (`idstatus`, `nama_status`) VALUES
(1, 'pending'),
(2, 'approved'),
(3, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `role`) VALUES
(1, 'admin', '098f6bcd4621d373cade4e832627b4f6', 1),
(2, 'helpdesk', '098f6bcd4621d373cade4e832627b4f6', 2),
(3, 'agency', '098f6bcd4621d373cade4e832627b4f6', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `idrole` int(11) NOT NULL,
  `rolename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`idrole`, `rolename`) VALUES
(1, 'admin'),
(2, 'helpdesk'),
(3, 'agency');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klaim_polis`
--
ALTER TABLE `klaim_polis`
  ADD PRIMARY KEY (`idklaim`);

--
-- Indexes for table `pengajuan_baru`
--
ALTER TABLE `pengajuan_baru`
  ADD PRIMARY KEY (`idasuransi`);

--
-- Indexes for table `perpanjangan_polis`
--
ALTER TABLE `perpanjangan_polis`
  ADD PRIMARY KEY (`idperpanjang`);

--
-- Indexes for table `status_polis`
--
ALTER TABLE `status_polis`
  ADD PRIMARY KEY (`idstatus`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`idrole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klaim_polis`
--
ALTER TABLE `klaim_polis`
  MODIFY `idklaim` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajuan_baru`
--
ALTER TABLE `pengajuan_baru`
  MODIFY `idasuransi` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perpanjangan_polis`
--
ALTER TABLE `perpanjangan_polis`
  MODIFY `idperpanjang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_polis`
--
ALTER TABLE `status_polis`
  MODIFY `idstatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `idrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
