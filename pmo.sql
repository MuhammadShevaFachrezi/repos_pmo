-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 01:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_penugasan`
--

CREATE TABLE `data_penugasan` (
  `nomor` int(11) NOT NULL,
  `kode_penugasan` varchar(255) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `pemberi_kerja` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `tanggal_penugasan` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program_kerja`
--

CREATE TABLE `program_kerja` (
  `no_kerja` int(11) NOT NULL,
  `tanggal_awal` varchar(255) NOT NULL,
  `tanggal_akhir` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `nama_projek` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_timesheet`
--

CREATE TABLE `tbl_timesheet` (
  `no_timesheet` int(11) NOT NULL,
  `tanggal` varchar(256) NOT NULL,
  `pekerjaan` varchar(256) NOT NULL,
  `kegiatan` varchar(256) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `nama_pegawai` varchar(256) NOT NULL,
  `pic` varchar(256) NOT NULL,
  `durasi` int(255) NOT NULL,
  `progress` int(100) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_timesheet`
--

INSERT INTO `tbl_timesheet` (`no_timesheet`, `tanggal`, `pekerjaan`, `kegiatan`, `id_pegawai`, `nama_pegawai`, `pic`, `durasi`, `progress`, `status`) VALUES
(8, '20 Januari 2021', 'Mahasiswa', 'Membuat daftar kerja', 1, 'Budi', 'ABCD', 23, 20, ''),
(12, '27 Januari 2021', 'Programmer CI', 'Membuat daftar kerja', 3, 'Toni', 'GHIJ', 70, 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `wbs`
--

CREATE TABLE `wbs` (
  `wbs_code` int(11) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal_awal` varchar(255) NOT NULL,
  `tanggal_akhir` varchar(255) NOT NULL,
  `durasi` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_penugasan`
--
ALTER TABLE `data_penugasan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `program_kerja`
--
ALTER TABLE `program_kerja`
  ADD PRIMARY KEY (`no_kerja`);

--
-- Indexes for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  ADD PRIMARY KEY (`no_timesheet`);

--
-- Indexes for table `wbs`
--
ALTER TABLE `wbs`
  ADD PRIMARY KEY (`wbs_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_penugasan`
--
ALTER TABLE `data_penugasan`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_kerja`
--
ALTER TABLE `program_kerja`
  MODIFY `no_kerja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_timesheet`
--
ALTER TABLE `tbl_timesheet`
  MODIFY `no_timesheet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wbs`
--
ALTER TABLE `wbs`
  MODIFY `wbs_code` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
