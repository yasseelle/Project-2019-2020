-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:41 PM
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
-- Database: `pristige_wallpaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `wallpaper`
--

CREATE TABLE `wallpaper` (
  `ID` int(11) NOT NULL,
  `wallpaper_link` mediumtext NOT NULL,
  `wallpaper_date` date NOT NULL,
  `wallpaper_down_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallpaper`
--

INSERT INTO `wallpaper` (`ID`, `wallpaper_link`, `wallpaper_date`, `wallpaper_down_num`) VALUES
(1, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1.jpg', '2020-06-04', 0),
(2, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2.jpg', '2020-06-04', 0),
(3, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3.jpg', '2020-06-04', 0),
(4, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4.jpg', '2020-06-04', 0),
(5, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5.jpg', '2020-06-04', 0),
(6, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6.jpg', '2020-06-04', 0),
(7, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_space.jpg', '2020-06-06', 0),
(8, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_space.jpg', '2020-06-06', 0),
(9, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3_space.jpg', '2020-06-06', 0),
(10, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_space.jpg', '2020-06-06', 0),
(11, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_space.jpg', '2020-06-06', 0),
(12, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_space.jpg', '2020-06-06', 0),
(13, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image7_space.jpg', '2020-06-06', 0),
(14, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image8_space.jpg', '2020-06-06', 0),
(15, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image9_space.jpg', '2020-06-06', 0),
(16, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_cities.jpg', '2020-06-06', 0),
(17, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_cities.jpg', '2020-06-06', 0),
(18, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3_cities.jpg', '2020-06-06', 0),
(19, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_cities.jpg', '2020-06-06', 0),
(20, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_cities.jpg', '2020-06-06', 0),
(21, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_cities.jpg', '2020-06-06', 0),
(22, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image7_cities.jpg', '2020-06-06', 0),
(23, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_nature.jpg', '2020-06-06', 0),
(24, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_nature.jpg', '2020-06-06', 0),
(25, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3_nature.jpg', '2020-06-06', 0),
(26, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_nature.jpg', '2020-06-06', 0),
(27, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_nature.jpg', '2020-06-06', 0),
(28, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_nature.jpg', '2020-06-06', 0),
(29, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image7_nature.jpg', '2020-06-06', 0),
(30, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image8_nature.jpg', '2020-06-06', 0),
(31, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image9_nature.jpg', '2020-06-06', 0),
(32, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_abstract.jpg', '2020-06-06', 0),
(33, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_abstract.jpg', '2020-06-06', 0),
(34, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3_abstract.jpg', '2020-06-06', 0),
(35, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_abstract.jpg', '2020-06-06', 0),
(36, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_abstract.jpg', '2020-06-06', 0),
(37, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_abstract.jpg', '2020-06-06', 0),
(38, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image7_abstract.jpg', '2020-06-06', 0),
(39, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image8_abstract.jpg', '2020-06-06', 0),
(40, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image9_abstract.jpg', '2020-06-06', 0),
(42, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_anime.jpg', '2020-06-06', 0),
(43, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_anime.jpg', '2020-06-06', 0),
(45, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_anime.jpg', '2020-06-06', 0),
(46, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_anime.jpg', '2020-06-06', 0),
(47, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_anime.jpg', '2020-06-06', 0),
(49, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image8_anime.jpg', '2020-06-06', 0),
(50, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image9_anime.jpg', '2020-06-06', 0),
(51, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image10_anime.jpg', '2020-06-06', 0),
(52, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image11_anime.jpg', '2020-06-06', 0),
(53, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image12_anime.jpg', '2020-06-06', 0),
(54, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image13_anime.jpg', '2020-06-06', 0),
(57, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image16_anime.jpg', '2020-06-06', 0),
(58, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image17_anime.jpg', '2020-06-06', 0),
(59, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image18_anime.jpg', '2020-06-06', 0),
(61, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image20_anime.jpg', '2020-06-06', 0),
(62, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image21_anime.jpg', '2020-06-06', 0),
(66, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image25_anime.jpg', '2020-06-06', 0),
(69, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image28_anime.jpg', '2020-06-06', 0),
(70, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image29_anime.jpg', '2020-06-06', 0),
(71, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image30_anime.jpg', '2020-06-06', 0),
(72, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image31_anime.jpg', '2020-06-06', 0),
(73, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image32_anime.jpg', '2020-06-06', 0),
(75, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image34_anime.jpg', '2020-06-06', 0),
(76, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image35_anime.jpg', '2020-06-06', 0),
(77, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image1_animals.jpg', '2020-06-06', 0),
(78, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image2_animals.jpg', '2020-06-06', 0),
(79, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image3_animals.jpg', '2020-06-06', 0),
(80, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image4_animals.jpg', '2020-06-06', 0),
(81, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image5_animals.jpg', '2020-06-06', 0),
(82, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image6_animals.jpg', '2020-06-06', 0),
(83, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image7_animals.jpg', '2020-06-06', 0),
(84, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image8_animals.jpg', '2020-06-06', 0),
(85, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image9_animals.jpg', '2020-06-06', 0),
(86, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image10_animals.jpg', '2020-06-06', 0),
(87, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image11_animals.jpg', '2020-06-06', 0),
(88, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image12_animals.jpg', '2020-06-06', 0),
(90, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image14_animals.jpg', '2020-06-06', 0),
(91, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image15_animals.jpg', '2020-06-06', 0),
(92, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image16_animals.jpg', '2020-06-06', 0),
(94, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image18_animals.jpg', '2020-06-06', 0),
(95, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image19_animals.jpg', '2020-06-06', 0),
(97, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image21_animals.jpg', '2020-06-06', 0),
(98, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image22_animals.jpg', '2020-06-06', 0),
(99, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image23_animals.jpg', '2020-06-06', 0),
(100, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image24_animals.jpg', '2020-06-06', 0),
(101, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image25_animals.jpg', '2020-06-06', 0),
(102, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image26_animals.jpg', '2020-06-06', 0),
(103, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image27_animals.jpg', '2020-06-06', 0),
(104, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image28_animals.jpg', '2020-06-06', 0),
(105, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image29_animals.jpg', '2020-06-06', 0),
(106, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image30_animals.jpg', '2020-06-06', 0),
(107, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image36_anime.jpg', '2020-06-06', 0),
(108, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image37_anime.jpg', '2020-06-06', 0),
(109, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image38_anime.jpg', '2020-06-06', 0),
(110, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image39_anime.jpg', '2020-06-06', 0),
(111, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image40_anime.jpg', '2020-06-06', 0),
(112, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image41_anime.jpg', '2020-06-06', 0),
(113, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image42_anime.jpg', '2020-06-06', 0),
(114, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image43_anime.jpg', '2020-06-06', 0),
(115, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image44_anime.jpg', '2020-06-06', 0),
(116, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image45_anime.jpg', '2020-06-06', 0),
(117, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image46_anime.jpg', '2020-06-06', 0),
(118, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image47_anime.jpg', '2020-06-06', 0),
(119, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image48_anime.jpg', '2020-06-06', 0),
(120, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image49_anime.jpg', '2020-06-06', 0),
(121, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image50_anime.jpg', '2020-06-06', 0),
(122, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image51_anime.jpg', '2020-06-06', 0),
(123, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image52_anime.jpg', '2020-06-06', 0),
(124, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image53_anime.jpg', '2020-06-06', 0),
(125, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image54_anime.jpg', '2020-06-06', 0),
(126, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image55_anime.jpg', '2020-06-06', 0),
(127, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image56_anime.jpg', '2020-06-06', 0),
(128, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image57_anime.jpg', '2020-06-06', 0),
(129, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image58_anime.jpg', '2020-06-06', 0),
(130, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image59_anime.jpg', '2020-06-06', 0),
(131, 'http://192.168.1.100:8080/Pristige_wallpaper/img/prestige_4k_wallpaper_image60_anime.jpg', '2020-06-06', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
