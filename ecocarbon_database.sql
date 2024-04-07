-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-04-07 09:25:58
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `ecocarbon_database`
--

-- --------------------------------------------------------

--
-- 表的结构 `activity_responses`
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
-- 转存表中的数据 `activity_responses`
--

INSERT INTO `activity_responses` (`id`, `user_id`, `activity_date`, `rating1`, `rating2`, `rating3`, `rating4`, `rating5`) VALUES
(4, 2, '2024-03-06', '4', '1', '1', '1', '1'),
(6, 2, '2024-02-02', '2', '4', '1', '1', '1'),
(10, 11, '2024-03-10', '1', '1', '1', '1', '1'),
(11, 11, '2024-03-11', '2', '4', '5', '2', '1');

-- --------------------------------------------------------

--
-- 表的结构 `friends`
--

CREATE TABLE `friends` (
  `userID` int(5) NOT NULL,
  `friendID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `friends`
--

INSERT INTO `friends` (`userID`, `friendID`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `submittedanswer`
--

CREATE TABLE `submittedanswer` (
  `Date` date NOT NULL,
  `Answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `updates`
--

CREATE TABLE `updates` (
  `userID` int(5) NOT NULL,
  `date` date DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `updates`
--

INSERT INTO `updates` (`userID`, `date`, `category`, `value`) VALUES
(1, '2024-03-01', 'diet', 21.55),
(1, '2024-03-01', 'energy', 16.91);

-- --------------------------------------------------------

--
-- 表的结构 `uploadcontent`
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
-- 转存表中的数据 `uploadcontent`
--

INSERT INTO `uploadcontent` (`id`, `Image`, `Title`, `Description`, `URL`, `Category`) VALUES
(1, '屏幕截图 2024-03-08 202801.png', 'test1', 'this is the first test and post the image file it\'s successfully?', '', ''),
(3, 'uploadimage/Default.jpg', 'test 3 update', 'this one is upload and after i willl update-----update already will display it or not?', '', ''),
(4, 'uploadimage/MIUI02.jpg', 'title', 'this is just test for this add education content can run or not？1', 'https://www.youtube.com/', 'all'),
(6, 'uploadimage/MIUI03.jpg', 'title update again', 'this is just test for this add education content can run or not？3', 'https://www.youtube.com/', ''),
(7, 'uploadimage/MIUI06.jpg', 'final title updated', 'this is for the code to final test for lin yinan the computer and then to test --- for updated check', '', ''),
(12, 'uploadimage/transportion.png', 'What contribution does transportation mode make to', 'Transportation is a significant contributor to greenhouse gas emissions, primarily through the burning of fossil fuels. Eco-friendly transportation options, such as electric vehicles (EVs) and public transportation systems, help to reduce carbon emissions, thereby mitigating climate change.', '', 'transportation'),
(13, 'uploadimage/transportionbus.jpg', 'Public Transportation', 'Although some buses and other public transportation have raised concerns in the past, using these modes of transportation still may help out the environment. Public transportation typically follows the same model as carpooling. It could be beneficial to leave your car home sometimes and take the bus. ', '', 'transportation'),
(14, 'uploadimage/CO2 .png', 'Why eco-Energy ?', 'Still in 2012, the main source of electric energy is produced by burning fossil fuels.There is a movement encouraging their replacement with less polluting alternatives such as with renewable energy sources.', '', 'energy'),
(15, 'uploadimage/CO2.png', 'tese none function', 'nothing', '', ''),
(16, 'uploadimage/Diet.jpg', 'Diet for earth', 'Plant-based diets rely on locally-sourced and seasonal produce, which can have a lower environmental impact.', '', 'diet');

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `pwd`, `email`, `contactno`, `commute`, `energy`, `diet`, `admin`) VALUES
(1, 'Passport', '123', 'PassportPioneer@gmail.com', '123453232', '', '', '', 1),
(2, 'Journey', '123', 'JourneyQuester@gmail.com', '12789657', '', '', '', 0),
(3, 'Vagabond', '123', 'VagabondVentures@gmail.com', '125678542', '', '', '', 0),
(11, 'test', 'pwd12345', 'justinleeontheclock@gmail.com', '0147326532', 'public', 'electricity', 'vegan', 0),
(12, 'undercover', 'default', 'dikaunlee@gmail.com', '67141424214', 'personal', 'electricity', 'vegetarian', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `activity_responses`
--
ALTER TABLE `activity_responses`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `uploadcontent`
--
ALTER TABLE `uploadcontent`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `activity_responses`
--
ALTER TABLE `activity_responses`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用表AUTO_INCREMENT `uploadcontent`
--
ALTER TABLE `uploadcontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
