-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 03:05 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL,
  `no_hp_admin` varchar(20) NOT NULL,
  `password_admin` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_admin`, `alamat_admin`, `no_hp_admin`, `password_admin`, `create_at`, `update_at`) VALUES
(1, 'admin', 'admin', 'Bandung', '0897xxxx', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'gigis', 'gigis', 'Bandung', '085xxxx', '4F7FA19F093ECB6B08401A81D9F1BE8C', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(80) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `kelas`, `jurusan`, `no_hp`, `alamat`, `email`, `create_at`, `update_at`, `password`) VALUES
(17140056, 'MO.Salah', '17.8A.33', 'Tehnik Informatika', '089xxxxxxx', 'Mesir', 'MO.Salah@gmail.com', '2018-06-01 12:50:10', '0000-00-00 00:00:00', 'f2e8acb9a0ca72e1eb0fd74511de04e9'),
(17140098, 'Gigis Lestari', '17.8A.33', 'Tehnik Informatika', '0852xxxxxx', 'Bandung', 'lestari@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '4f7fa19f093ecb6b08401a81d9f1be8c'),
(17180001, 'Jürgen Klopp', '16.8C.33', 'Tehnik Informatika', '0897654xxx', 'Jerman', 'JürgenKlopp@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '927f96b301bbd612786e02a2dbae534e'),
(17180002, 'Loris Karius', '16.8B.33', 'Sistem Informasi', '089xxxxxxx', 'Jerman', 'LorisKarius@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e48e0c6aaab873091c173172c4076bc5'),
(17180003, 'Roberto Firmino', '16.8A.33', 'Manajemen Informatika', '087xxxxxxxx', 'Brasil', 'RobertoFirmino@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0aa0872c47a3356a872d504092b17aa9'),
(17180004, 'Philippe Coutinho', '17.8C.33', 'Komputer Akutansi', '087665xxxx', 'Brasil', 'PhilippeCoutinho@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'eefbb43fbf9b1fc736145f8000527f1b'),
(17180005, 'Virgil van Dijk', '17.8B.33', 'Tehnik Informatika', '0987xxxxxx', 'Belanda', 'VirgilvanDijk@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'e400131a818033b0ba03813e6f25b428'),
(17180006, 'Sadio Mané', '17.8A.33', 'Sistem Informasi', '0856xxxxx', 'Senegal', 'SadioMané@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'de404feed2a594e0d6ae52cc9335899a');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `absen` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `absen`, `tugas`, `uts`, `uas`, `create_at`, `update_at`) VALUES
(1, 17140056, 70, 80, 90, 70, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 17140088, 70, 50, 56, 70, '2018-05-31 07:05:36', '0000-00-00 00:00:00'),
(4, 17180001, 100, 70, 60, 80, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 17180002, 70, 90, 90, 90, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 17180003, 90, 100, 70, 80, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 17180003, 100, 90, 90, 90, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 17180004, 90, 60, 80, 70, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 17180005, 80, 80, 80, 80, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 17180006, 90, 70, 70, 90, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 17140098, 100, 100, 90, 90, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
