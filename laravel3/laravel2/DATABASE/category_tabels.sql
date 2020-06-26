-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 12:27 AM
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
-- Table structure for table `category_tabels`
--

CREATE TABLE `category_tabels` (
  `id` int(11) NOT NULL,
  `category_name` varchar(1020) NOT NULL,
  `category_discription` text NOT NULL,
  `category_image` varchar(1020) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_tabels`
--

INSERT INTO `category_tabels` (`id`, `category_name`, `category_discription`, `category_image`) VALUES
(-2147483643, 'spor', 'tال', 'رياضة هي مجهود جسدي عادي أو مهارة تُمَارَس بموجب قواعد مُتفق عليها بهدف الترفيه أو المنافَسة أو المُتعة أو التميز أو تطوير المهارات أو تقوية الثقة بالنفس أو الجسد . واختلاف الأهداف من حيث اجتماعها أو انفرادها يميز الرياضات ، بالإضافة إلى ما يضيفه اللاعبون أو الفِرَق من تأثيرٍ على رياضاتهم.^?<P'),
(-2147483642, 'tech', 'nology3 me', 'thods, and processes used to achieve goals. People can use technology to: Produce goods or services. Carry out goals, such as scientific investigation or sending a spaceship to the moon. Solve problems, such as disease or famine^?I?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_tabels`
--
ALTER TABLE `category_tabels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_tabels`
--
ALTER TABLE `category_tabels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
