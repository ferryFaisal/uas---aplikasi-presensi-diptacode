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
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `kelas`) VALUES
('3202016004', 'User 4', '5A'),
('3202016005', 'User 5', '5A'),
('3202016006', 'User 6', '5A'),
('3202016032', 'Dina Berliana Br Sitohang', '5B'),
('3202016033', 'Vebri Sulitian', '5B'),
('3202016035', 'Rangga Dwi Pangestu', '5B'),
('3202016037', 'Berliana Putri Ceasadela', '5B'),
('3202016039', 'Mihandha Gustiani', '5B'),
('3202016050', 'Yopi Sulistyo', '5B'),
('3202016054', 'Mellanie Prasticia Yositaputri', '5B'),
('3202016056', 'Singgih Adipta Prayoga', '5B'),
('3202016059', 'Ibnu Yazzid Almanfaluthi', '5B'),
('3202016065', 'Renaldi', '5B'),
('3202016068', 'Irfanda Anugrah', '5B'),
('3202016069', 'Dani Faturrahman', '5B'),
('3202016070', 'Agapitus Ryan Permana', '5B'),
('3202016071', 'Dela Pebriyani', '5B'),
('3202016072', 'Nia Rahayu Istiani', '5B'),
('3202016073', 'Sahanan', '5B'),
('3202016084', 'Dewi Alauwiyah', '5B'),
('3202016089', 'Fadhilah Muhammad', '5B'),
('3202016090', 'Dwi Febrianto Halim', '5B'),
('3202016092', 'Melati', '5B'),
('3202016093', 'Melda Syafitri', '5B'),
('3202016096', 'Citra Aulia Putri', '5B'),
('3202016097', 'Renaldi', '5B'),
('3202016099', 'Hany Nur Alya', '5B'),
('3202016100', 'Mayestiko Abimanyu', '5B'),
('3202016102', 'Syahrul Febriansyah', '5B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
