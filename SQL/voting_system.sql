-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

USE voting_system;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `FullName` VARCHAR(30) NOT NULL,
  `Username` VARCHAR(30) NOT NULL,
  `Password` VARCHAR(30) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`FullName`, `Username`, `Password`) VALUES
('krisna', 'krisna@Gmail.com', 'krisna');

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--
-- Alter Table structure for table `kandidat`

ALTER TABLE `kandidat`
ADD COLUMN `PartyName` VARCHAR(40) NOT NULL AFTER `FullName`;

DROP TABLE IF EXISTS kandidat;
CREATE TABLE `kandidat` (
  `id_nomine` INT(10) NOT NULL,
  `Nim` INT(20) NOT NULL,
  `FullName` VARCHAR(40) NOT NULL,
  `PartyName` VARCHAR(40) NOT NULL,
  `visi` VARCHAR(255) NOT NULL,
  `misi` VARCHAR(255) NOT NULL,
  `Image` VARCHAR(100) NOT NULL,
  `Votes` INT(100) NOT NULL,
  `Status` VARCHAR(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandidat`
--
SELECT * FROM kandidat;
INSERT INTO `kandidat` (`id_nomine`, `Nim`, `FullName`, `visi`, `misi`, `Image`, `Votes`, `Status`) VALUES
(1, 2221021, 'Dedi Setiadi', 'senannng', 'sss', 'WhatsApp Image 2023-12-27 at 20.14.57.jpeg', 2, 'ON'),
(2, 2221020, 'anwar', 'wawan', 'wawan', 'WhatsApp Image 2023-12-27 at 20.14.57 (1).jpeg', 1, 'ON'),
(3, 2221022, 'Krisna Hadi Kusumah', 'makmur', 'maakmur', 'WhatsApp Image 2023-12-27 at 20.14.57 (2).jpeg', 4, 'ON');


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Nim` INT(20) NOT NULL,
  `FullName` VARCHAR(40) NOT NULL,
  `Kelas` VARCHAR(11) NOT NULL,
  `Semester` INT(5) NOT NULL,
  `Jenis_Kelamin` CHAR(10) NOT NULL,
  `Email` VARCHAR(30) NOT NULL,
  `Tanggal_Lahir` DATE NOT NULL,
  `Password` VARCHAR(30) NOT NULL,
  `Status` VARCHAR(11) NOT NULL,
  `Voted` VARCHAR(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Nim`, `FullName`, `Kelas`, `Semester`, `Jenis_Kelamin`, `Email`, `Tanggal_Lahir`, `Password`, `Status`, `Voted`) VALUES
(22224343, 'gerin', 'TI 2', 3, 'laki-laki', 'gerin@gmail.com', '2002-01-06', 'gerin', 'ON', 'NO'),
(222101022, 'dodi', 'TI 2', 3, 'laki-laki', 'dodi@gmail.com', '2004-01-04', 'dodi', 'OFF', 'NO'),
(222101025, 'anwar', 'TI 2', 3, 'laki-laki', 'anwar@gmail.com', '2004-01-04', 'anwar', 'ON', 'YES'),
(222101092, 'wawan', 'TI 2', 3, 'laki-laki', 'wawan@gmail.com', '2000-01-02', 'wawan', 'ON', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_nomine`),
  ADD UNIQUE KEY `FullName` (`FullName`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Nim`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `FullName` (`FullName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_nomine` INT(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Nim` INT(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222101093;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
