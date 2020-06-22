-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 07:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_progweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `nim_anggota` int(11) NOT NULL,
  `password_anggota` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `nim_anggota`, `password_anggota`) VALUES
(1, 'Rindho Ananta Samat', 71180310, '6077d7849549ba181451ff583c8e79af1c343d98');

-- --------------------------------------------------------

--
-- Table structure for table `anggota_keahlian`
--

CREATE TABLE `anggota_keahlian` (
  `id_ak` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_keahlian` varchar(20) NOT NULL,
  `persentase_keahlian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_pengalaman`
--

CREATE TABLE `anggota_pengalaman` (
  `id_ap` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_pengalaman` varchar(20) NOT NULL,
  `dari_tahun_pengalaman` year(4) NOT NULL,
  `sampai_tahun_pengalaman` year(4) NOT NULL,
  `tempat_pengalaman` varchar(30) NOT NULL,
  `teks_pengalaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `anggota_sosial`
--

CREATE TABLE `anggota_sosial` (
  `id_as` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_sosial` varchar(20) NOT NULL,
  `url_sosial` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota_sosial`
--

INSERT INTO `anggota_sosial` (`id_as`, `id_anggota`, `nama_sosial`, `url_sosial`) VALUES
(3, 1, 'facebook', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `judul_biodata` varchar(30) DEFAULT NULL,
  `isi_biodata` text NOT NULL,
  `tipe_biodata` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `judul_biodata`, `isi_biodata`, `tipe_biodata`) VALUES
(1, 'Judul A', 'sub Judul', 'judul'),
(2, NULL, 'SWAFOTO.jpeg', 'foto'),
(3, NULL, 'INI ADALAH PARAGRAF', 'panjang'),
(4, 'test', 'woi', 'pendek');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `judul_galeri` varchar(30) NOT NULL,
  `path_galeri` text NOT NULL,
  `kategori_galeri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `teks_kontak` text NOT NULL,
  `alamat_kontak` text NOT NULL,
  `nomor_kontak` varchar(15) NOT NULL,
  `email_kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `teks_kontak`, `alamat_kontak`, `nomor_kontak`, `email_kontak`) VALUES
(1, 'There are many variations of passages of Lorem Ipsum available, but the et majori have suffered alteration in some form, by injected humour, Domised words which don\'t look even slightly believable. If you are going to use a pas of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 'Freedom Way, Jersey City, NJ 07305, USA', '', 'backpiper.com@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama_depan_pesan` varchar(20) NOT NULL,
  `nama_belakang_pesan` varchar(20) NOT NULL,
  `email_pesan` text NOT NULL,
  `subjek_pesan` varchar(20) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `anggota_keahlian`
--
ALTER TABLE `anggota_keahlian`
  ADD PRIMARY KEY (`id_ak`),
  ADD KEY `rl_anggota_ak` (`id_anggota`),
  ADD KEY `rl_keahlian_ak` (`nama_keahlian`);

--
-- Indexes for table `anggota_pengalaman`
--
ALTER TABLE `anggota_pengalaman`
  ADD PRIMARY KEY (`id_ap`),
  ADD KEY `rl_anggota_ap` (`id_anggota`),
  ADD KEY `rl_pengalaman_ap` (`nama_pengalaman`);

--
-- Indexes for table `anggota_sosial`
--
ALTER TABLE `anggota_sosial`
  ADD PRIMARY KEY (`id_as`),
  ADD KEY `rl_anggota_as` (`id_anggota`),
  ADD KEY `rl_sosial_as` (`nama_sosial`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota_keahlian`
--
ALTER TABLE `anggota_keahlian`
  MODIFY `id_ak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota_pengalaman`
--
ALTER TABLE `anggota_pengalaman`
  MODIFY `id_ap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anggota_sosial`
--
ALTER TABLE `anggota_sosial`
  MODIFY `id_as` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota_keahlian`
--
ALTER TABLE `anggota_keahlian`
  ADD CONSTRAINT `rl_anggota_ak` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota_pengalaman`
--
ALTER TABLE `anggota_pengalaman`
  ADD CONSTRAINT `rl_anggota_ap` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anggota_sosial`
--
ALTER TABLE `anggota_sosial`
  ADD CONSTRAINT `rl_anggota_as` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
