-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 07:30 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `triverus`
--

-- --------------------------------------------------------

--
-- Table structure for table `part`
--

CREATE TABLE `part` (
  `partid` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `partnumber` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `note` longtext NOT NULL,
  `Active` text NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `part`
--

INSERT INTO `part` (`partid`, `type`, `partnumber`, `description`, `note`, `Active`) VALUES
(1, 0, 'C5-11-16', 'LATCH, SEALED LEVER', 'latch', 'yes'),
(2, 0, '0060872', 'PLATE, DOOR, ENGINE PANEL, ENGINE BOX, MCRRS', 'waterjet part', 'yes'),
(3, 0, 'Z-137425', 'HINGE, BUTT, GUDEN, SS (8000301225), MODIFIED', 'hinge', 'yes'),
(4, 1, '0060871', 'ASSEMBLY, DOOR, ENGINE PANEL, ENGINE BOX, MCRRS', 'Assembly', 'yes'),
(5, 2, '0055585', 'WELDMENT, HEAT EXCHANGER MOUNT BRACKET', 'Note:', 'yes'),
(6, 0, '0060836', 'PLATE, ACCESS, HEAT EXCHANGER COMPARTMENT', 'Note:', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `part`
--
ALTER TABLE `part`
  ADD PRIMARY KEY (`partid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `part`
--
ALTER TABLE `part`
  MODIFY `partid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
