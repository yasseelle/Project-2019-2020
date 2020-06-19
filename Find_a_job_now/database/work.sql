-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 11:08 PM
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
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
