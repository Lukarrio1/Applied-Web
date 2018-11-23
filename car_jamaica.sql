-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 07:26 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_jamaica`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `user_id` int(100) NOT NULL,
  `logged_in` text NOT NULL,
  `logged_out` text NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`user_id`, `logged_in`, `logged_out`, `session`) VALUES
(1, '1542826439', '1542826444', 1),
(1, '1542826485', '1542826488', 2),
(1, '1542826866', '1542826871', 3),
(1, '1542834346', '1542834350', 4),
(1, '1542894354', '1542894533', 5),
(1, '1542894648', '1542894651', 6),
(2, '1542909025', '', 7),
(1, '1542909850', '', 8),
(1, '1542910105', '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(1) NOT NULL,
  `User_name` varchar(20) NOT NULL,
  `User_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `User_name`, `User_password`) VALUES
(1, 'Admin', '38f078a81a2b033d197497af5b77f95b50bfcfb8');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL,
  `Brand` text NOT NULL,
  `about` text NOT NULL,
  `photo` text NOT NULL,
  `feature` decimal(50,0) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `Brand`, `about`, `photo`, `feature`, `user`) VALUES
(1, 'Mark X', 'Tayota', 'Hello there i  am a mark x just so know', '15bf4aad897054.jpg', '3', 'Jason Ennis');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `reset_key` varchar(100) NOT NULL,
  `Created_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=hp8;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `Name`, `Email`, `Password`, `reset_key`, `Created_at`) VALUES
(1, 'Jason Ennis', 'tomennis1997@gmail.com', 'f91bbef09088574f07dd28717f631af0d85b6c77', '7806753730d283ba517a3763d1d4dfac199f7473', 'Nov 21, 2018 01:36am'),
(2, 'terry binns', 'terry@gmail.com', 'f91bbef09088574f07dd28717f631af0d85b6c77', '98baa062f3ae2968a557587db2510719ad2ad237', 'Nov 22, 2018 06:50pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`session`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
