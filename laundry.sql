-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2020 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `final_orders`
--

CREATE TABLE `final_orders` (
  `laundry_no` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total` int(10) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `hostel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`, `role`, `hostel`) VALUES
('P128', '123456', 'student', 'pg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hostel` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `full_name`, `password`, `hostel`, `email_id`, `date`, `role`) VALUES
('P101', 'anita kaur', '123456', 'Pg', 'anita@gmail.com', '2020-03-31', 'student'),
('P128', 'roohi', '123456', 'Pg', 'roohi@gmail.com', '2020-03-29', 'student'),
('P138', 'kritika aggarwal', '123456', '1', 'Kritikaaggarwal1621@gmail.com', '0000-00-00', 'admin'),
('P91', 'siddhi', '123456', '1', 'siddhi@ymsil.com', '0000-00-00', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `white slip`
--

CREATE TABLE `white slip` (
  `upper_hood` int(2) NOT NULL DEFAULT 0,
  `bedsheets` int(2) NOT NULL DEFAULT 0,
  `pants` int(2) NOT NULL DEFAULT 0,
  `pillow_cover` int(2) NOT NULL DEFAULT 0,
  `laundry_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `hostel` varchar(8) NOT NULL,
  `total_clothes` int(3) NOT NULL,
  `towel` int(2) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `white slip`
--

INSERT INTO `white slip` (`upper_hood`, `bedsheets`, `pants`, `pillow_cover`, `laundry_no`, `name`, `date`, `hostel`, `total_clothes`, `towel`, `status`) VALUES
(2, 2, 2, 3, 'P101', 'anita kaur', '2020-04-13 20:18:03', 'Pg', 11, 2, 'finlised'),
(1, 2, 3, 0, 'P128', 'roohi', '23/3/2020', 'pg', 7, 1, 'finlised'),
(3, 0, 2, 0, 'P91', 'siddhi', '2020-04-21 23:47:54', '1', 5, 0, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `final_orders`
--
ALTER TABLE `final_orders`
  ADD PRIMARY KEY (`laundry_no`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `white slip`
--
ALTER TABLE `white slip`
  ADD PRIMARY KEY (`laundry_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
