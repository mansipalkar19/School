-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 07:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `computer_name` varchar(255) DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `last_login_ip`, `last_login`, `computer_name`, `last_logout`) VALUES
(1, 'Mansi Ashok Palkar', 'bemansi@gmail.com', '17344ba61bc9e6a193ad14d1bfd443bc', '::1', '2022-06-16 22:53:30', 'DESKTOP-PNF5BF9', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(5) NOT NULL,
  `schoolname` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_on` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `schoolname`, `location`, `created_on`, `created_by`) VALUES
(1, 'ABC', 'MUMBAI', '2022-06-16 03:47:25', '1'),
(2, 'EFG', 'MUMBA', '2022-06-16 03:48:24', '1'),
(3, 'NAT', 'PAREL', '2022-06-16 03:48:49', '1'),
(4, 'DEF', 'Mumbai', '2022-06-16 09:56:45', '1'),
(5, 'GHI', 'DELHI', '2022-06-16 09:56:54', '1'),
(6, 'JKL', 'DELHI', '2022-06-16 09:57:03', '1'),
(7, 'PEST ', 'THANE', '2022-06-16 09:58:46', '1'),
(8, 'SARASWATI ', 'NAHUR', '2022-06-16 09:59:05', '1'),
(9, 'VASANT VIHAR', 'GODBUNDER', '2022-06-16 09:59:44', '1'),
(10, 'ST.JOHN', 'THANE', '2022-06-16 10:00:00', '1'),
(11, 'ST.XAVIER', 'KURLA', '2022-06-16 10:00:19', '1'),
(12, 'DON BOSCO', 'SION', '2022-06-16 10:00:31', '1'),
(13, 'NALANADA', 'MULUND', '2022-06-16 10:01:00', '1'),
(14, 'LITTLE FLOWER', 'THANE', '2022-06-16 10:01:24', '1'),
(15, 'KELKAR', 'MULUND', '2022-06-16 10:01:41', '1'),
(16, 'SOMAIYA', 'GHATKOPAR', '2022-06-16 10:01:58', '1'),
(17, 'MCC', 'MULUND', '2022-06-16 10:02:10', '1'),
(18, 'KC ', 'THANE', '2022-06-16 10:02:29', '1'),
(19, 'KHALSA', 'MATUNGA', '2022-06-16 10:02:45', '1'),
(20, 'K.B ', 'THANE', '2022-06-16 10:03:43', '1'),
(21, 'D.A.V', 'THANE', '2022-06-16 10:35:28', '1'),
(22, 'ORCHIDS', 'THANE', '2022-06-16 10:35:45', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
