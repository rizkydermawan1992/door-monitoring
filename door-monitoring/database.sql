-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 04:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensor`
--

-- --------------------------------------------------------

--
-- Table structure for table `penerima_notif`
--

CREATE TABLE `penerima_notif` (
  `id` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerima_notif`
--

INSERT INTO `penerima_notif` (`id`, `nama`, `email`) VALUES
(1, 'Rizky Dermawan', 'rizkydermawan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_door`
--

CREATE TABLE `tabel_door` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `door_state` int(11) NOT NULL,
  `msg_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabel_door`
--

INSERT INTO `tabel_door` (`id`, `waktu`, `door_state`, `msg_state`) VALUES
(1, '2021-02-17 07:19:57', 0, 0);

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `penerima_notif`
--
ALTER TABLE `penerima_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_door`
--
ALTER TABLE `tabel_door`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penerima_notif`
--
ALTER TABLE `penerima_notif`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_door`
--
ALTER TABLE `tabel_door`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
