-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 09:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajpasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bustickets`
--

CREATE TABLE `bustickets` (
  `bus_id` int(11) NOT NULL,
  `company_id` varchar(100) DEFAULT NULL,
  `departure_time` varchar(100) DEFAULT NULL,
  `arrival_time` varchar(100) DEFAULT NULL,
  `departure_place` varchar(100) DEFAULT NULL,
  `arrival_place` varchar(100) DEFAULT NULL,
  `bus_type` varchar(100) DEFAULT NULL,
  `total_seat` varchar(100) DEFAULT NULL,
  `available_seat` varchar(100) DEFAULT NULL,
  `seat_fare` varchar(100) DEFAULT NULL,
  `facility` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bustickets`
--
ALTER TABLE `bustickets`
  ADD PRIMARY KEY (`bus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bustickets`
--
ALTER TABLE `bustickets`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
