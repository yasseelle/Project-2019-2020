-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:40 PM
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
-- Database: `find_job_now`
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

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `ID` int(20) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `prenome` varchar(80) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `discription` longtext NOT NULL,
  `ville` varchar(80) NOT NULL,
  `prix` double NOT NULL,
  `date_creation` date NOT NULL,
  `categorie` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `active` varchar(80) NOT NULL,
  `job_image` longtext NOT NULL,
  `REPORT` int(11) NOT NULL,
  `EMAIL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work`
--

INSERT INTO `work` (`ID`, `nom`, `prenome`, `titre`, `discription`, `ville`, `prix`, `date_creation`, `categorie`, `phone`, `active`, `job_image`, `REPORT`, `EMAIL`) VALUES
(1, 'ilyass', 'jabbari', 'plumber plumber plumber plumber plumber plumber ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'ifrane', 60, '2020-03-20', 'plumber', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 2, ''),
(2, 'jabbari', 'ilyass', 'house building house buildinghouse building', 'em Ipsum is simply dummy text of the printin', 'azrou', 2500, '2020-03-20', 'building', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(4, 'ayman', 'alami', 'driver driverdriver driverdriver driverdriver driv', 'driver with drive license duration more than 5 years', 'tanger', 7000, '2020-03-20', 'driving', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(5, 'karima', 'alami', 'babysitter', 'i need a babysitter for my little girl < 24 yo', 'fes', 3500, '2020-03-20', 'babysitter', '0', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(6, 'ilyass', 'jabbari', 'sell a car', 'sell a car 5 places 4 ports\ndhsjjdhid dhuddjsu eheuue', 'mekness', 20000, '2020-03-20', 'cars', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(7, 'salma', 'imane', 'house cleaning', 'i need w woman for house cleaning', 'casablance', 300, '2020-03-20', 'house cleaning', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(8, 'karima', 'filali', 'Ù…ØªØ±Ø¬Ù…', 'Ø§Ø­ØªØ§Ø¬ Ø§Ù„Ù‰ ØªØ±Ø¬Ù…Ø© Ø§Ø­Ø¯ Ø§Ù„ÙƒØªØ¨  Ø§Ø­ØªØ§Ø¬ Ø§Ù„Ù‰ ØªØ±Ø¬Ù…Ø© Ø§Ø­Ø¯ Ø§Ù„ÙƒØªØ¨Ø§Ø­ØªØ§Ø¬ Ø§Ù„Ù‰ ØªØ±Ø¬Ù…Ø© Ø§Ø­Ø¯ Ø§Ù„ÙƒØªØ¨  Ø§Ø­ØªØ§Ø¬ Ø§Ù„Ù‰ ØªØ±Ø¬Ù…Ø© Ø§Ø­Ø¯ Ø§Ù„ÙƒØªØ¨', 'ØªØ·ÙˆØ§Ù…', 10000, '2020-03-21', 'ØªØ±Ø¬Ù…Ø©', '+212676744819', 'waiting For you', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, ''),
(9, 'hamid', 'jamal', 'voiture rant', ' voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant  voiture rant ', 'fes', 300, '2020-03-22', 'voiture', '+212676744819', 'waiting For YOU', 'http://192.168.1.100:8080/Find_a_job_now/img/job_icon.png', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
