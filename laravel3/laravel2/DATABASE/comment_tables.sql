-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 12:34 AM
-- Server version: 10.3.16-MariaDB
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
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_tables`
--

CREATE TABLE `comment_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `USERID` varchar(1020) NOT NULL,
  `COMMENT` text NOT NULL,
  `NEWID` int(11) NOT NULL,
  `created_by_name` varchar(1020) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment_tables`
--

INSERT INTO `comment_tables` (`id`, `USERID`, `COMMENT`, `NEWID`, `created_by_name`) VALUES
(3, '', '7', -396006292, 'o i\'où fsdfs sfgf\r\n\r\nsdfgsdfg\r\n\r\ndfsgsdfgdf?\0\0*'),
(4, '', '7', -194677900, ' for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post test for comenting of this post?\0\0*'),
(5, '', '7', -512876433, 'ther new comment ds an other new comment ds an other new comment ds\r\nan other new comment ds an other new comment ds an other new comment ds an other new comment ds?\0\0*'),
(6, '', '7', -194677900, ' for this one?\0\0$'),
(7, '', '7', -512859104, 'this one?\0\0%'),
(8, '', '7', -378263693, ' work?\0\0*'),
(9, '', '7', -378244320, 'working?\0\0*'),
(10, '', '6', -429298079, 'l try?\0\0*'),
(11, '', '7', -1288167325, 'omment?\0\0*');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_tables`
--
ALTER TABLE `comment_tables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_tables`
--
ALTER TABLE `comment_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
