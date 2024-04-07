-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 10:27 AM
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
(1, 1, '2024-03-06', '4', '1', '1', '1', '1'),
(2, 2, '2024-03-11', '2', '4', '5', '2', '1'),
(3, 2, '2024-03-13', '5', '4', '2', '1', '3'),
(4, 4, '2024-03-13', '5', '2', '3', '4', '1'),
(5, 4, '2024-04-07', '3', '4', '5', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `userID` int(5) NOT NULL,
  `friendID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `userID`, `friendID`) VALUES
(1, 1, 4),
(2, 4, 1),
(3, 4, 2),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `last` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `last`) VALUES
(1, 4, 1, 'Transportation : 3/5 \nEnergy Usage : 4/5 \nDiet : 5/5 \nWaste Management : 2/5 \nMisc : 1/5', 1),
(2, 1, 4, 'Transportation : 4/5 \nEnergy Usage : 1/5 \nDiet : 1/5 \nWaste Management : 1/5 \nMisc : 1/5', 0),
(3, 4, 2, 'Hi!', 0),
(4, 2, 4, 'Hello to you too!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `uploadcontent`
--

CREATE TABLE `uploadcontent` (
  `id` int(11) NOT NULL,
  `Image` varchar(1024) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `Category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploadcontent`
--

INSERT INTO `uploadcontent` (`id`, `Image`, `Title`, `Description`, `URL`, `Category`) VALUES
(1, 'uploadimage/transportion.png', 'What contribution does transportation mode make to', 'Transportation is a significant contributor to greenhouse gas emissions, primarily through the burning of fossil fuels. Eco-friendly transportation options, such as electric vehicles (EVs) and public transportation systems, help to reduce carbon emissions, thereby mitigating climate change.', '', 'transportation'),
(2, 'uploadimage/transportionbus.jpg', 'Public Transportation', 'Although some buses and other public transportation have raised concerns in the past, using these modes of transportation still may help out the environment. Public transportation typically follows the same model as carpooling. It could be beneficial to leave your car home sometimes and take the bus. ', '', 'transportation'),
(3, 'uploadimage/CO2 .png', 'Why eco-Energy ?', 'Still in 2012, the main source of electric energy is produced by burning fossil fuels.There is a movement encouraging their replacement with less polluting alternatives such as with renewable energy sources.', '', 'energy'),
(4, 'uploadimage/Diet.jpg', 'Diet for earth', 'Plant-based diets rely on locally-sourced and seasonal produce, which can have a lower environmental impact.', '', 'diet');

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
(1, 'Passport', '123', 'PassportPioneer@gmail.com', '123453232', '', '', '', 1),
(2, 'Journey', '123', 'JourneyQuester@gmail.com', '12789657', '', '', '', 0),
(3, 'Vagabond', '123', 'VagabondVentures@gmail.com', '125678542', '', '', '', 0),
(4, 'undercover', '123', 'dikaunlee@gmail.com', '67141424214', 'personal', 'electricity', 'vegetarian', 1),
(5, 'user', 'justin', 'justinleeontheclock@gmail.com', '0123456789', 'personal', 'electricity', 'mixed', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_responses`
--
ALTER TABLE `activity_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadcontent`
--
ALTER TABLE `uploadcontent`
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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `uploadcontent`
--
ALTER TABLE `uploadcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
