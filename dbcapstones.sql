-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 04:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcapstones`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcapstone`
--

CREATE TABLE `tblcapstone` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `date_published` date NOT NULL,
  `abstract` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcapstone`
--

INSERT INTO `tblcapstone` (`id`, `title`, `author`, `date_published`, `abstract`) VALUES
(11, 'fqef', 'afwefwe', '2024-04-06', 'fewfw'),
(12, 'AS', 'GRW', '2024-04-02', 'GREG'),
(13, 'dfhjfyu ', ' fuk ft kfgy', '2024-04-19', 'kjdnzrng[urhtidfpg;nbxfpgojn[dfhmn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcapstone`
--
ALTER TABLE `tblcapstone`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcapstone`
--
ALTER TABLE `tblcapstone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
