-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 08:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecocarbon_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_responses`
--

CREATE TABLE `activity_responses` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `activity_date` date NOT NULL,
  `rating1` varchar(50) NOT NULL,
  `rating2` varchar(50) NOT NULL,
  `rating3` varchar(50) NOT NULL,
  `rating4` varchar(50) NOT NULL,
  `rating5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_responses`
--

INSERT INTO `activity_responses` (`id`, `user_id`, `activity_date`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`) VALUES
(1, 1, '2024-03-01', '1', '1', '1', '1', '1'),
(2, 1, '2024-03-04', '2', '1', '1', '1', '1'),
(3, 1, '2024-03-05', '3', '1', '1', '1', '1'),
(4, 2, '2024-03-06', '4', '1', '1', '1', '1'),
(5, 1, '2024-03-08', '5', '1', '1', '1', '1'),
(6, 2, '2024-02-02', '2', '4', '1', '1', '1'),
(7, 1, '2024-02-03', '4', '4', '1', '1', '1'),
(8, 1, '2024-03-09', '5', '3', '2', '5', '3');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `userID` int(5) NOT NULL,
  `friendID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`userID`, `friendID`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `submittedanswer`
--

CREATE TABLE `submittedanswer` (
  `Date` date NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `userID` int(5) NOT NULL,
  `date` date DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`userID`, `date`, `category`, `value`) VALUES
(1, '2024-03-01', 'diet', 21.55),
(1, '2024-03-01', 'energy', 16.91);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `commute` varchar(50) NOT NULL,
  `energy` varchar(50) NOT NULL,
  `diet` varchar(50) NOT NULL,
  `admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `email`, `contactno`, `commute`, `energy`, `diet`, `admin`) VALUES
(1, 'Passport', '123', 'PassportPioneer@gmail.com', '123453232', '', '', '', 0),
(2, 'Journey', '123', 'JourneyQuester@gmail.com', '12789657', '', '', '', 0),
(3, 'Vagabond', '123', 'VagabondVentures@gmail.com', '125678542', '', '', '', 1),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_responses`
--
ALTER TABLE `activity_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_responses`
--
ALTER TABLE `activity_responses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


-- --------------------------------------------------------

--
-- Table structure for table `uploadcontent`
--

CREATE TABLE `uploadcontent` (
  `Image` varchar(250) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `URL` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `uploadcontent` (`Image`, `Title`, `Description`, `URL`) VALUES
('屏幕截图 2024-03-08 202801.png', 'test1', 'this is the first test and post the image file it\'s successfully?', ''),
('屏幕截图 2024-03-08 202801.png', 'test2', 'this is the second test and post the image file and the website address it\'s successfully?', 'https://www.w3schools.com/html/html_links.asp');

COMMIT;