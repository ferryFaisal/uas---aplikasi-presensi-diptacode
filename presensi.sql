-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 05:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(10) NOT NULL,
  `tgl_presensi` datetime NOT NULL,
  `makul` varchar(50) NOT NULL,
  `kelas` char(2) NOT NULL,
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status_presensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `tgl_presensi`, `makul`, `kelas`, `nim`, `nama`, `status_presensi`) VALUES
(1, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016001', 'User 1', 'Hadir'),
(2, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016002', 'User 2', 'Hadir'),
(3, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016003', 'User 3', 'Hadir'),
(4, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016004', 'User 4', 'Hadir'),
(5, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016005', 'User 5', 'Hadir'),
(6, '2022-11-23 00:00:00', 'WebProg', '5A', '3202016006', 'User 6', 'Hadir'),
(7, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016001', 'User 1', 'Hadir'),
(8, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016002', 'User 2', 'Hadir'),
(9, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016003', 'User 3', 'Izin'),
(10, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016004', 'User 4', 'Sakit'),
(11, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016005', 'User 5', 'Hadir'),
(12, '2022-12-01 00:00:00', 'WebProg', '5A', '3202016006', 'User 6', 'Alpa'),
(13, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016032', 'Dina Berliana Br Sitohang', 'Hadir'),
(14, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016033', 'Vebri Sulitian', 'Hadir'),
(15, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016035', 'Rangga Dwi Pangestu', 'Hadir'),
(16, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016037', 'Berliana Putri Ceasadela', 'Hadir'),
(17, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016039', 'Mihandha Gustiani', 'Hadir'),
(18, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016050', 'Yopi Sulistyo', 'Hadir'),
(19, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016054', 'Mellanie Prasticia Yositaputri', 'Hadir'),
(20, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016056', 'Singgih Adipta Prayoga', 'Hadir'),
(21, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016059', 'Ibnu Yazzid Almanfaluthi', 'Hadir'),
(22, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016065', 'Renaldi', 'Hadir'),
(23, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016068', 'Irfanda Anugrah', 'Hadir'),
(24, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016069', 'Dani Faturrahman', 'Hadir'),
(25, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016070', 'Agapitus Ryan Permana', 'Hadir'),
(26, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016071', 'Dela Pebriyani', 'Hadir'),
(27, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016072', 'Nia Rahayu Istiani', 'Hadir'),
(28, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016073', 'Sahanan', 'Hadir'),
(29, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016084', 'Dewi Alauwiyah', 'Hadir'),
(30, '2022-11-24 00:00:00', 'WebProgLab', '5B', '320201609', 'Fadhilah Muhammad', 'Hadir'),
(31, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016090', 'Dwi Febrianto Halim', 'Hadir'),
(32, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016092', 'Melati', 'Hadir'),
(33, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016093', 'Melda Syafitri', 'Hadir'),
(34, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016096', 'Citra Aulia Putri', 'Hadir'),
(35, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016097', 'Renaldi', 'Hadir'),
(36, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016099', 'Hany Nur Alya', 'Hadir'),
(37, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016100', 'Mayestiko Abimanyu', 'Hadir'),
(38, '2022-11-24 00:00:00', 'WebProgLab', '5B', '3202016102', 'Syahrul Febriansyah', 'Hadir'),
(39, '2022-11-22 00:00:00', 'WebProg', '', '3202016001', 'User 1', 'Hadir'),
(40, '2022-11-22 00:00:00', 'WebProg', '', '3202016002', 'User 2', 'Hadir'),
(41, '2022-11-22 00:00:00', 'WebProg', '', '3202016003', 'User 3', 'Hadir'),
(42, '2022-11-22 00:00:00', 'WebProg', '', '3202016004', 'User 4', 'Hadir'),
(43, '2022-11-22 00:00:00', 'WebProg', '', '3202016005', 'User 5', 'Hadir'),
(44, '2022-11-22 00:00:00', 'WebProg', '', '3202016006', 'User 6', 'Hadir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
