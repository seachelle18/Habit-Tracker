-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 02:06 AM
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
-- Database: ` habit_tracker_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `userid` int(10) NOT NULL,
  `date` date NOT NULL,
  `question0` int(10) NOT NULL,
  `question1` int(10) NOT NULL,
  `question2` int(10) NOT NULL,
  `goal0` varchar(200) NOT NULL,
  `checkbox0` tinyint(1) NOT NULL,
  `goal1` varchar(200) NOT NULL,
  `checkbox1` tinyint(1) NOT NULL,
  `goal2` varchar(200) NOT NULL,
  `checkbox2` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`userid`, `date`, `question0`, `question1`, `question2`, `goal0`, `checkbox0`, `goal1`, `checkbox1`, `goal2`, `checkbox2`) VALUES
(1234, '2022-11-16', 1, 1, 1, '11', 1, '1', 1, '1', 1),
(3012, '2022-11-02', 1, 1, 1, '1', 1, '1', 1, '1', 1),
(1234, '2022-11-02', 11, 1, 1, '1', 1, '1', 1, '1', 1),
(3012, '2022-11-19', 1, 2, 3, 'Finish overdue assignment', 0, 'Get C- in the course ', 1, 'Sell drugs at city hall', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD KEY `date` (`date`),
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `login` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
