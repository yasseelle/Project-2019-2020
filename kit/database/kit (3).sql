-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:36 PM
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
-- Database: `kit`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `ID` int(11) NOT NULL,
  `NOM_CATEGORIE` varchar(26) NOT NULL,
  `IMAGE_CATEGORY` varchar(340) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`ID`, `NOM_CATEGORIE`, `IMAGE_CATEGORY`) VALUES
(18, 's1', '1234.jpg'),
(19, 'shirt', 'logan.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `COMMENT` longtext NOT NULL,
  `CREATETIME` datetime NOT NULL,
  `RATE` int(11) NOT NULL,
  `PRODID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `USERID`, `COMMENT`, `CREATETIME`, `RATE`, `PRODID`) VALUES
(14, 8, 'nice', '2020-03-08 06:12:21', 3, 33),
(15, 8, 'nice product', '2020-03-08 06:14:23', 5, 10),
(16, 9, 'NICE ONE', '2020-03-08 06:16:02', 2, 33),
(17, 9, 'cool', '2020-03-08 06:18:56', 1, 33),
(18, 9, 'nice one  d', '2020-03-08 06:33:17', 3, 34),
(19, 11, 'merci', '2020-06-09 09:32:42', 4, 10),
(20, 11, ':(', '2020-06-09 09:33:17', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(340) NOT NULL,
  `TITRE` varchar(466) NOT NULL,
  `DESCRIPTION` longtext NOT NULL,
  `QTE` int(11) NOT NULL,
  `SIZE` varchar(14) NOT NULL,
  `PRICE` double NOT NULL,
  `CATEGORY` varchar(26) NOT NULL,
  `COLOR` varchar(26) NOT NULL,
  `IMAGE2` varchar(340) NOT NULL,
  `IMAGE3` varchar(340) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `IMAGE`, `TITRE`, `DESCRIPTION`, `QTE`, `SIZE`, `PRICE`, `CATEGORY`, `COLOR`, `IMAGE2`, `IMAGE3`) VALUES
(10, 'Citroen Elyse.png', 'dacia ', 'heloloo                sldkfgsdfg         sdfkjgsdfgfsddddddddddddddddddddddddddddddddddddddddddd\r\n\r\n\r\nfsddddddddddddddddddd\r\n\r\nsfdddddddddddddddd\r\n\r\n\r\n\r\n\r\nfsddddddddddddddddddddddddgdsfgdsfgdfgdf\r\nsfdgdsfgdsfg', 5, 'S', 5781, 'ford', 'black', 'ar.png', 'ar.png'),
(11, 'ff.png', 'cetrwin', 'nice car and familli', 5, 'S', 5781, 'ford', 'black', 'ar.png', 'ar.png'),
(13, 'Citroen Elyse.png', 'forrd', 'nice car and familli', 5, 'S', 5781, 'impermÃ©able', 'black', 'ar.png', 'ar.png'),
(14, 'Citroen Elyse.png', 'car', 'nice car and familli', 5, 'S', 5781, 'impermÃ©able', 'black', 'ar.png', 'ar.png'),
(27, 'hyundai1.jpg', 'ilyas', 'fdsgsfdgsdfdfsg', 676, 'L', 14, 'short', 'BLACK', 'fordfiesta.jpg', 'ff1.jpg'),
(28, 'b.png', 'so2', 'emgrlsdfgkfsk', 676, 'M', 521, 'tee-shirt', 'greenn', '800px-English_language.svg.png', 'ar.png'),
(33, 'background.png', 'prod2', 'sssssssssssssssssdqfqzefQDFQS', 1, 'xl', 0, 's1', 'greenn + blue + red', 'lechamonix1.png', 'profile.png'),
(34, 'max-asabin-ktk-po.jpg', 'prod3', 'prod3 prod3 prod3 prod3 prod3 prod3', 52, 'xl + s + m ', 541, 'shirt', 'greenn + blue + red', 'images.jpg', 'lechamonix1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(66) NOT NULL,
  `LASTNAME` varchar(66) NOT NULL,
  `EMAIL` varchar(93) NOT NULL,
  `DATENAISS` date NOT NULL,
  `ROLE` varchar(66) NOT NULL,
  `SEXE` varchar(66) NOT NULL,
  `USERNAME` varchar(66) NOT NULL,
  `QUESTION` varchar(66) NOT NULL,
  `REPONSE` varchar(66) NOT NULL,
  `PASSWORDU` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAME`, `LASTNAME`, `EMAIL`, `DATENAISS`, `ROLE`, `SEXE`, `USERNAME`, `QUESTION`, `REPONSE`, `PASSWORDU`) VALUES
(8, 'JABBARI', 'ilyass', 'yasseelle8@gmail.com', '2020-03-24', 'USER', 'm', 'TheBlackJeb', '0', 'najma', '$2y$10$.RCbp6MP.UDbhKw//dcs3Onv32zY/3YCNWoG7Elkb7MF6goMGCU1q'),
(9, 'salim', 'alami', 'yasseelle6@gmail.com', '2020-03-30', 'ADMIN', 'm', 'TheBlackJeb01', '0', 'najma', '$2y$10$.nSy6cCCm5NsN3r8oevMyOYWYgiV08wlhcoTm91M/oejMv1JDkc8K'),
(10, 'JABBARI', 'ilyass', 'yasseelle4@gmail.com', '2020-04-14', 'USER', 'm', 'testjeb1', '0', 'IFRANE', '$2y$10$47n0zkS80nrzZVJgY4QvveBuCH85K9OxARB9Ial.qcAdxtTpwhjl.'),
(11, 'jabbari', 'ilyass', 'yasseelle9@gmail.com', '2020-06-09', 'USER', 'm', 'TheBlackJeb', '0', 'najma', '$2y$10$ydb59emrceTBo4BbA5CB6udPJmwuBJ/0Uyb6vEGS/t.wqQF4a85N6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user` (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
