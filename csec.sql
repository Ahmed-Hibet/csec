-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 03:35 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csec`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` varchar(200) NOT NULL,
  `eventTitle` varchar(200) NOT NULL,
  `division` enum('dd','cpd','cbd') NOT NULL,
  `present` enum('yes','no') NOT NULL,
  `attendanceDate` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `eventTitle`, `division`, `present`, `attendanceDate`) VALUES
('A/UR13886/10', 'Annual Meeting', 'cpd', 'no', '2021-02-22'),
('A/UR14586/10', 'Annual Meeting', 'cpd', 'yes', '2021-02-22'),
('A/UR14586/10', 'Annual Meeting', 'dd', 'yes', '2021-02-22'),
('R/123456/08', 'Annual Meeting', 'cpd', 'yes', '2021-02-22'),
('UGR/98765/11', 'Annual Meeting', 'cpd', 'yes', '2021-02-22'),
('UGR/98765/11', 'Annual Meeting', 'cbd', 'yes', '2021-02-22'),
('A/UR13886/10', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('A/UR14586/10', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('A/UR14586/10', 'Annual Meeting', 'dd', 'yes', '2021-02-23'),
('R/123456/08', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('UGR/98765/11', 'Annual Meeting', 'cpd', 'no', '2021-02-23'),
('UGR/98765/11', 'Annual Meeting', 'cbd', 'no', '2021-02-23'),
('A/UR12345/10', 'Tutorial', 'cpd', 'yes', '2021-02-23'),
('A/UR13886/10', 'Tutorial', 'cpd', 'yes', '2021-02-23'),
('R/123456/08', 'Tutorial', 'cpd', 'no', '2021-02-23'),
('UGR/98765/11', 'Tutorial', 'cpd', 'yes', '2021-02-23'),
('A/UR12345/10', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('A/UR12345/10', 'Annual Meeting', 'cbd', 'yes', '2021-02-23'),
('A/UR12345/10', 'Annual Meeting', 'dd', 'yes', '2021-02-23'),
('A/UR13886/10', 'Annual Meeting', 'cpd', 'no', '2021-02-23'),
('A/UR14586/10', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('A/UR14586/10', 'Annual Meeting', 'dd', 'yes', '2021-02-23'),
('R/123456/08', 'Annual Meeting', 'cpd', 'yes', '2021-02-23'),
('UGR/98765/11', 'Annual Meeting', 'cpd', 'no', '2021-02-23'),
('UGR/98765/11', 'Annual Meeting', 'cbd', 'no', '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `visibleFor` enum('all','cpd','cbd','dd','any') NOT NULL DEFAULT 'any',
  `dates` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `title`, `description`, `visibleFor`, `dates`) VALUES
(2, 'Annual Meeting', 'urgent meeting', 'all', '2021-02-23'),
(3, 'Seminar', 'ks.anxc', 'any', '2021-02-25'),
(4, 'Tutorial', 'bmasncbmx', 'cpd', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `cpd` enum('opened','closed') NOT NULL DEFAULT 'closed',
  `cbd` enum('opened','closed') NOT NULL DEFAULT 'closed',
  `dd` enum('opened','closed') NOT NULL DEFAULT 'closed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `cpd`, `cbd`, `dd`) VALUES
(1, 'closed', 'closed', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `education` enum('undergraduate','postgraduate') NOT NULL,
  `academicYear` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `CPD` enum('yes','no','append') DEFAULT 'no',
  `CBD` enum('yes','no','append') DEFAULT 'no',
  `DD` enum('yes','no','append') DEFAULT 'no',
  `entryYear` date DEFAULT NULL,
  `roll` enum('president','vice president','cpd head','cbd head','dd head','member','not member') DEFAULT 'not member',
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `id`, `gender`, `education`, `academicYear`, `department`, `email`, `phone`, `CPD`, `CBD`, `DD`, `entryYear`, `roll`, `password`) VALUES
('Mebatsion', 'Sahle', 'A/UR12345/10', 'Female', 'undergraduate', 4, 'CSE', 'meba@gmail.com', '0911121315', 'yes', 'yes', 'yes', '2018-07-02', 'cpd head', '123456'),
('Ahmed', 'Hibet', 'A/UR13886/10', 'Male', 'undergraduate', 4, 'CSE', 'ahmedhibet@gmail.com', '0933806521', 'yes', 'no', 'no', '2018-07-02', 'president', '123456'),
('Heyru', 'Nejmu', 'A/UR14444/10', 'Male', 'undergraduate', 4, 'CSE', 'heyru@gmail.com', '0911223344', 'no', 'no', 'no', NULL, 'not member', 'abc123'),
('Siraj', 'Yesuf', 'A/UR14586/10', 'Male', 'undergraduate', 4, 'CSE', 'sitajyesuf@gmail.com', '0924836179', 'yes', 'no', 'yes', '2016-08-23', 'member', 'abcdef'),
('Temkin', 'Mengistu', 'A/UR54321/10', 'Male', 'undergraduate', 4, 'CSE', 'temkin@gmail.com', '0987654321', 'no', 'no', 'no', NULL, 'not member', '123456'),
('Mukerem', 'Ali', 'R/123456/08', 'Male', 'postgraduate', 1, 'CSE', 'muke@gmail.com', '0923234343', 'yes', 'no', 'no', '2016-08-23', 'member', 'abcdef'),
('Wenderad', 'Abnos', 'UGR/98765/11', 'Male', 'undergraduate', 3, 'CSE', 'wende@gmail.com', '0987654321', 'yes', 'yes', 'no', '2018-07-02', 'vice president', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
