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
  `activity_date` date NOT NULL,
  `rating1` varchar(50) NOT NULL,
  `rating2` varchar(50) NOT NULL,
  `rating3` varchar(50) NOT NULL,
  `rating4` varchar(50) NOT NULL,
  `rating5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_responses`
--

INSERT INTO `activity_responses` (`activity_date`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`) VALUES
('2024-03-08', '1', '1', '1', '1', '1'),
('2024-03-08', '2', '1', '1', '1', '1'),
('2024-03-08', '3', '1', '1', '1', '1'),
('2024-03-08', '4', '1', '1', '1', '1'),
('2024-03-08', '5', '1', '1', '1', '1'),
('2024-02-02', '2', '4', '1', '1', '1'),
('2024-02-03', '4', '4', '1', '1', '1'),
('2024-03-09', '4', '3', '2', '5', '3');

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
  `userID` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(11) NOT NULL,
  `admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `pwd`, `gender`, `email`, `contactno`, `admin`) VALUES
(1, 'Passport', '123', 'male', 'PassportPioneer@gmail.com', 123453232, 0),
(2, 'Journey', '123', 'female', 'JourneyQuester@gmail.com', 12789657, 0),
(3, 'Vagabond', '123', 'female', 'VagabondVentures@gmail.com', 125678542, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
