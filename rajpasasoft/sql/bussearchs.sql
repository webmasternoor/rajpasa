-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 04:29 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajpasasoft`
--

-- --------------------------------------------------------

--
-- Table structure for table `busrajs`
--

CREATE TABLE `bussearchs` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL DEFAULT '0',
  `company_id` int(11) DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `departure_date` datetime DEFAULT NULL,
  `departure_time` varchar(500) DEFAULT NULL,
  `departure_place` varchar(500) DEFAULT NULL,
  `arrival_date` datetime DEFAULT NULL,
  `arrival_time` varchar(500) DEFAULT NULL,
  `arrival_place` varchar(500) DEFAULT NULL,
  `bus_type` varchar(500) DEFAULT NULL,
  `total_seat` varchar(500) DEFAULT NULL,
  `seat_fare` varchar(500) DEFAULT NULL,
  `facility` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `busrajs`
--

INSERT INTO `busrajs` (`id`, `bus_id`, `company_id`, `manager_id`, `departure_date`, `departure_time`, `departure_place`, `arrival_date`, `arrival_time`, `arrival_place`, `bus_type`, `total_seat`, `seat_fare`, `facility`, `name`, `created_at`, `updated_at`) VALUES
(33, 67, 1, 29, '0000-00-00 00:00:00', '', '1', '0000-00-00 00:00:00', '', '1', 'ac', '30', '', '', NULL, '2017-03-08 17:01:38', '2017-03-08 17:01:38'),
(34, 3231, 1, 29, '0000-00-00 00:00:00', '12', '2', '0000-00-00 00:00:00', '3', '5', 'ac', '32', '400', 'wifi', NULL, '2017-03-14 08:15:00', '2017-03-14 08:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `busrajs`
--
ALTER TABLE `busrajs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `busrajs`
--
ALTER TABLE `busrajs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
