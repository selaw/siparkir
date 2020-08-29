-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 05:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE `jenis_kendaraan` (
  `id_jeniskendaraan` int(11) NOT NULL,
  `jenis_kendaraan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id_jeniskendaraan`, `jenis_kendaraan`) VALUES
(1, 'Roda 4'),
(2, 'Roda 2');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` varchar(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_peralatan` varchar(11) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `id_target`, `id_peralatan`, `lokasi`) VALUES
('LKS001', 1, 'PLR001', 'Wisata air panas semurup'),
('LKS002', 1, 'PLR001', 'Wisata air panas sungai medang'),
('LKS003', 1, 'PLR001', 'Wisata Aroma Peco Kayu Aro'),
('LKS004', 1, 'PLR001', 'Wisata Danau Kerinci '),
('LKS005', 1, 'PLR001', 'WIsata Air Terjun Kayo Aru'),
('LKS006', 1, 'PLR002', 'Pelataran Depati Parbo'),
('LKS007', 1, 'PLR003', 'Halaman UGD'),
('LKS008', 1, 'PLR003', 'Halaman Kantor RSU'),
('LKS009', 2, 'PLR004', 'Pasar Pekan Tamiai'),
('LKS010', 2, 'PLR004', 'Pasar Pekan Jujun'),
('LKS011', 2, 'PLR004', 'Pasar Pekan Senggarang Agung'),
('LKS012', 2, 'PLR004', 'Pasar Pekan Hiang'),
('LKS013', 2, 'PLR004', 'Pasar Pringsewu'),
('LKS014', 2, 'PLR004', 'Pasar Metro'),
('LKS015', 2, 'PLR004', 'Pasar Pekan Bedeng VIII'),
('LKS016', 2, 'PLR004', 'Pasar Pekan Tua'),
('LKS017', 2, 'PLR004', 'Pasar Pelompek'),
('LKS018', 2, 'PLR004', 'Jalan Raya Soekarno - Hatta'),
('LKS019', 2, 'PLR005', 'Wisata Air Terjun'),
('LKS020', 2, 'PLR004', 'Jalan Raya Dewisartika'),
('LKS021', 5, 'PLR008', 'Lab');

-- --------------------------------------------------------

--
-- Table structure for table `parkir`
--

CREATE TABLE `parkir` (
  `no_parkir` varchar(11) NOT NULL,
  `no_polisi` varchar(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jeniskendaraan` int(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `id_peralatan` varchar(11) NOT NULL,
  `id_lokasi` varchar(11) NOT NULL,
  `retribusi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkir`
--

INSERT INTO `parkir` (`no_parkir`, `no_polisi`, `tanggal`, `id_jeniskendaraan`, `id_target`, `id_peralatan`, `id_lokasi`, `retribusi`) VALUES
('PRK000001', 'BE 3201 FE', '2019-03-25 07:15:22', 2, 1, 'PLR008', 'LKS021', 3000),
('PRK000002', 'BE 8588 AD', '2019-03-25 07:16:20', 1, 2, 'PLR002', 'LKS019', 3000),
('PRK000003', 'BE 8525 AD', '2019-03-25 07:35:41', 1, 1, 'PLR003', 'LKS007', 4000),
('PRK000004', 'BE 8525 AD', '2019-03-28 12:27:23', 1, 2, 'PLR001', 'LKS004', 3000),
('PRK000005', 'BE 9444 LL', '2019-03-28 12:34:52', 2, 2, 'PLR004', 'LKS018', 2000),
('PRK000006', 'BE 50 K', '2019-04-01 06:19:53', 1, 2, 'PLR004', 'LKS020', 3000),
('PRK000007', 'DK 3813 H', '2019-04-01 07:33:39', 2, 1, 'PLR008', 'LKS021', 3000),
('PRK000008', 'BE 3271 FE', '2019-04-01 08:08:27', 1, 1, 'PLR001', 'LKS005', 4000),
('PRK000009', 'BE 3201 FE', '2019-04-01 08:21:22', 2, 1, 'PLR002', 'LKS010', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `peralatan`
--

CREATE TABLE `peralatan` (
  `id_peralatan` varchar(11) NOT NULL,
  `id_target` int(11) NOT NULL,
  `peralatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peralatan`
--

INSERT INTO `peralatan` (`id_peralatan`, `id_target`, `peralatan`) VALUES
('PLR001', 1, 'Objek Wisata'),
('PLR002', 1, 'Pelataran Depati Parbo'),
('PLR003', 1, 'RSUD Mumamdiyah Metro'),
('PLR004', 2, 'Tepi Jalan'),
('PLR005', 1, 'Objek Wisata Air Terjun'),
('PLR006', 1, 'Monumen Kota Metro'),
('PLR007', 2, 'Wisata Way Kambas'),
('PLR008', 5, 'Kampus'),
('PLR009', 1, 'Palu');

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `id_target` int(11) NOT NULL,
  `target` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id_target`, `target`) VALUES
(1, 'Khusus'),
(2, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(128) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_create` int(11) NOT NULL,
  `reset_password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `level`, `is_active`, `date_create`, `reset_password`) VALUES
(1, 'Pimpinan', 'aserarser@gmail.com', '$2y$10$khg.4XwfbjV93laoFIvPK.jVId/1tXxGiWfwjv0rKMNz7S57Palu.', 'Pimpinan', 1, 1552847014, '0'),
(2, 'Nanda Saputra Pradana', 'nsp.mailku@gmail.com', '$2y$10$P2SKxWm89G7hwphr4FU5q.b14vJemkQGnI0ehnJShNtWDwm2xK3Vi', 'Admin', 1, 1552847135, '0'),
(3, 'Administrator', 'admin@nanda.com', '$2y$10$oNWCluXqHfSRUzCvGnRJAeuNZsbMweUbtXSrjdlsvLqm.M7sA.LzO', 'Admin', 0, 1552854259, '0'),
(4, 'Petugas Parkir', 'petugas@siparkir.com', '$2y$10$oKwLgEnAYJ.mSzz.vR8fiuLvAJULI6qEJko2BPPAN8lKVgDHpGBFS', 'Petugas', 1, 1553245833, '0'),
(5, 'Al Agias B', 'agias@siparkir.com', '$2y$10$q3grCCkzbeWb.T.rYykzYusfEaUUIX4XCttWGXXigRhGRdhL1ufHi', 'Admin', 1, 1553515896, '0'),
(6, 'Hello Nanda', 'hello.naann@gmail.com', '$2y$10$1ae3C1NFoESDqGYFz9ZJvO20/1iw/Jno7L7fZx9yDmRLsf18a0gee', 'Admin', 1, 1554114413, '0'),
(7, 'I Putu Yuda Danan Jaya', 'aloysiusagias@gmail.com', '$2y$10$61myYl1T9I5NyYGTawqYS.ZtS36dE6ofWH3XTaEYEt3eV0wYxXmU2', 'Petugas', 1, 1554118298, '0'),
(8, 'apa', 'apasaja@gmail.com', '$2y$10$p5dJpUfrYsDiHNyKCfYJneai.FNY2FBpIPE9HcwzHYe6v8t82sAr2', 'Petugas', 1, 1554120428, '0'),
(9, 'Cah ganteng', 'cahganteng@gmail.com', '$2y$10$KZR4TZVAIl1Lxod9dlBIPeprZ1JRPU5FKm0OmTRXM4/yS0UwvNkuW', 'Petugas', 0, 1554121129, ''),
(10, 'Siapa hayo', 'yeyeye@gmail.com', '$2y$10$B8XJtP6vtKs8KgwISDtU0.Mek19oysYV/7XBhRxjYAlwhu0zuyxx2', 'Petugas', 0, 1554121156, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id_jeniskendaraan`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `parkir`
--
ALTER TABLE `parkir`
  ADD PRIMARY KEY (`no_parkir`);

--
-- Indexes for table `peralatan`
--
ALTER TABLE `peralatan`
  ADD PRIMARY KEY (`id_peralatan`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`id_target`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id_jeniskendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
