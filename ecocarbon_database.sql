-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 07:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pwd` varchar(30) NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` int(11) NOT NULL,
  `admin` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `pwd`, `gender`, `email`, `contactno`, `admin`) VALUES
(1, 'Passport', '123', 'male', 'PassportPioneer@gmail.com', 123453232, 0),
(2, 'Journey', '123', 'female', 'JourneyQuester@gmail.com', 12789657, 0),
(3, 'Vagabond', '123', 'female', 'VagabondVentures@gmail.com', 125678542, 1);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `userID` int(5) NOT NULL,
  `friendID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`userID`, `friendID`) VALUES
(1,2);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `userID` int(5) NOT NULL,
  `date` DATE,
  `category` varchar(30) NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`userID`, `date`, `category`, `value`) VALUES
(1, '2024-3-1', 'diet', 21.55),
(1, '2024-3-1', 'energy', 16.91);

COMMIT;

