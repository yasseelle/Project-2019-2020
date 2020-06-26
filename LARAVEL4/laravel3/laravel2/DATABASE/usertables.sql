-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 12:49 PM
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
-- Table structure for table `usertables`
--

CREATE TABLE `usertables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(340) NOT NULL,
  `lastname` varchar(340) NOT NULL,
  `email` varchar(340) NOT NULL,
  `password` longtext NOT NULL,
  `user_profile_img` varchar(340) NOT NULL,
  `role` varchar(340) NOT NULL,
  `phone_number` varchar(340) NOT NULL,
  `cuntry` varchar(340) NOT NULL,
  `city` varchar(340) NOT NULL,
  `birth_day` varchar(340) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertables`
--

INSERT INTO `usertables` (`id`, `name`, `lastname`, `email`, `password`, `user_profile_img`, `role`, `phone_number`, `cuntry`, `city`, `birth_day`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'jabbari', 'ilyass', 'jabbari.ilyass.me@gmail.com', '$2y$10$6pA1p96GpSF.76FPzM5N5eoUlp3CjXjVNMXLIUnLAzwzCsl/gQUaC', '', 'user', '0642777358', 'morocco', 'japan', '2009-12-31', '2020-04-04 18:49:52', '2020-04-04 18:49:52', NULL),
(5, 'sohail', 'ILYASS', 'yasseelle8@gmail.com', '$2y$10$/wmqRNnUeMihjNjkZveIFeiU9sRw7dh8EFYyvk5wK8PZ6bPZq/BdW', '', 'user', '0676744819', 'morocco', 'IFRANE', '1951-12-31', '2020-04-04 18:51:46', '2020-04-17 02:18:28', NULL),
(6, 'sas', 'ILYASS', 'yasseelle6@gmail.com', '$2y$10$gYTnBHjA//RGSSfh3oIB3.Dx0BeI1K8gyzMMw0r7zclMS3DcTUM3m', '', 'user', '0676744819', 'morocco', 'IFRANE', '2015-12-03', '2020-04-04 19:09:26', '2020-04-17 04:03:41', '2020-04-17 05:03:41'),
(7, 'salim', 'ILYASS', 'yasseelle5@gmail.com', '$2y$10$TAyKfjOxFE.RDhc1B76GIuv5mwlLFBP5JELuQG5txRQ5F9nalTBbS', '', 'admin', '0676744819', 'morocco', 'IFRANE', '2015-12-28', '2020-04-04 20:33:30', '2020-04-04 20:33:30', NULL),
(8, 'alami', 'karim', 'yasseelle3@gmail.com', '$2y$10$KxtW0Kd.qUpftLe1RTmlJulDukgTN3CHTVvIYhB2XGg6cgozy23Ja', '', 'user', '0642777358', 'morocco', 'IFRANE', '2015-12-15', '2020-04-21 18:46:22', '2020-04-21 18:46:22', NULL),
(9, 'alami', 'karim', 'yasseelle2@gmail.com', '$2y$10$.UKjLSqMXTU4AcXeVHXsEOY5l4hz8GWrL2GQUUij2/LYTR7ZTbz1q', '', 'user', '0642777358', 'morocco', 'IFRANE', '2015-12-15', '2020-04-21 18:49:41', '2020-04-21 18:49:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usertables`
--
ALTER TABLE `usertables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usertables_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertables`
--
ALTER TABLE `usertables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
