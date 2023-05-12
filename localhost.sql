-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 12, 2023 at 11:18 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reactsipinjam`
--
CREATE DATABASE IF NOT EXISTS `db_reactsipinjam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_reactsipinjam`;

-- --------------------------------------------------------

--
-- Table structure for table `t_alat`
--

CREATE TABLE `t_alat` (
  `id_alat` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_alat`
--

INSERT INTO `t_alat` (`id_alat`, `nama`, `qty`) VALUES
('B001', 'Gitar', 10);

-- --------------------------------------------------------

--
-- Table structure for table `t_dosen`
--

CREATE TABLE `t_dosen` (
  `nip` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_dosen`
--

INSERT INTO `t_dosen` (`nip`, `nama`, `email`, `jurusan`, `gender`) VALUES
('198904052018031001', 'Moch. Kholil, S. Kom, MT', 'moch.kholil@akb.ac.id', '2', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `t_mhs`
--

CREATE TABLE `t_mhs` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jurusan` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_mhs`
--

INSERT INTO `t_mhs` (`nim`, `nama`, `email`, `jurusan`, `gender`) VALUES
('0705048902', 'Moch. Kholil', 'moch.kholil89@gmail.com', '1', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `t_ruang`
--

CREATE TABLE `t_ruang` (
  `id_ruang` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `t_ruang`
--

INSERT INTO `t_ruang` (`id_ruang`, `nama`) VALUES
('A401', 'Ruang Dosen ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_alat`
--
ALTER TABLE `t_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indexes for table `t_dosen`
--
ALTER TABLE `t_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `t_mhs`
--
ALTER TABLE `t_mhs`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
