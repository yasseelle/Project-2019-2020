-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 11:37 PM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(80) NOT NULL,
  `LASTNAME` varchar(80) NOT NULL,
  `EMAIL` varchar(200) NOT NULL,
  `USER_IMAGE` varchar(1020) NOT NULL,
  `USERNAME` varchar(80) NOT NULL,
  `PAYS` varchar(80) NOT NULL,
  `PHONE_NUMBER` varchar(80) NOT NULL,
  `PASSWORD` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `LASTNAME`, `EMAIL`, `USER_IMAGE`, `USERNAME`, `PAYS`, `PHONE_NUMBER`, `PASSWORD`) VALUES
(6, 'ilyass', 'jabbari', 'yasseelle8@gmail.com', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 'user1', 'France', '+212676744819', '$2y$10$qchUFOQvRyiHe3VBli7AZ.9TP7nseyqxE1Or9uQnlE33gISyxp5K.'),
(14, 'ilyass', 'jabbari', 'yasseelle6@gmail.com', 'http://192.168.1.100:8080/Find_a_job_now/img/cropped5642154651283199113.jpg', 'user1', 'maroc', '+212676744819', '$2y$10$tUGbn0DXMeSU0NPAiTckO.y9IRt4zSxLaNhvlK33XZdHC/AXLDx8W'),
(15, 'ilyass', 'jabbari', 'yasseelle10@gmail.com', 'http://192.168.1.100:8080/Find_a_job_now/img/profile.jpg', 'user2', 'maroc', '+212676744819', '$2y$10$uZ1ifsJX0q36FMpmIW2sDeU6KIHbRB9cYiPP4GxudKRhUTusts66q'),
(16, 'theBlackJeb', 'ilyass', 'ilyasse.essayli.7@gmail.com', '', 'user3', 'maroc', '+212676744819', '$2y$10$iM1QCJkzvaCXlpPv0PkgcuiEHQJlEDaJT2sBIEmcxMMj8zvgFAIOO'),
(18, 'alami', 'farid', 'ilyass_i@hotmail.fr', 'http://192.168.1.100:8080/Find_a_job_now/img/proiledefault.png', 'farid123', 'maroc', '0642777358', '$2y$10$CpeCxorqth8iuiQzEtaR/O/KglUTuuK1MBPMBJDfMAuFq4vL4t59i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
