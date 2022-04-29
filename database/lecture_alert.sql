-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2022 at 03:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecture_alert`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(10) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `emailAddress` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `firstName`, `lastName`, `emailAddress`, `password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '11111'),
(3, 'admin2', 'admin2', 'admin2@admin.com', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(10) NOT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `courseCode` varchar(10) DEFAULT NULL,
  `courseLevel` varchar(10) DEFAULT NULL,
  `courseUnit` varchar(10) DEFAULT NULL,
  `dateCreated` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `courseName`, `courseCode`, `courseLevel`, `courseUnit`, `dateCreated`) VALUES
(1, 'Introduction to Programming', 'COM111', 'ND1', '3', '2022-04-09 13:52:46'),
(3, 'Introduction to Computing', 'COM112', 'ND1', '2', '2022-04-09 13:53:58'),
(4, 'Computer Architecture', 'COM123', 'ND2', '3', '2022-04-09 16:00:39');

-- --------------------------------------------------------

--
-- Table structure for table `day_tbl`
--

CREATE TABLE `day_tbl` (
  `id` int(10) NOT NULL,
  `dayName` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_tbl`
--

INSERT INTO `day_tbl` (`id`, `dayName`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_tbl`
--

CREATE TABLE `lecturer_tbl` (
  `id` int(10) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phoneNo` varchar(20) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dateCreated` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer_tbl`
--

INSERT INTO `lecturer_tbl` (`id`, `firstName`, `lastName`, `gender`, `phoneNo`, `emailAddress`, `password`, `dateCreated`) VALUES
(2, 'Ajose', 'Sewanu', 'Male', '09088997762', 'Ahmedsodiq7@gmail.com', '11111', '2022-04-09 13:41:35'),
(3, 'Adewale', 'Omoba', 'Male', '09099889930', 'Adewaleomoba33@yahoo.com', '11111', '2022-04-09 13:41:53'),
(5, 'Funmilayo', 'Olawale', 'Male', '07065903222', 'funmilayoolawale222@gmail.com', '11111', '2022-04-09 16:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `timetable_tbl`
--

CREATE TABLE `timetable_tbl` (
  `id` int(10) NOT NULL,
  `lecturerId` varchar(10) DEFAULT NULL,
  `courseId` varchar(10) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `dayOfWeek` varchar(10) DEFAULT NULL,
  `classTime` varchar(100) DEFAULT NULL,
  `dateCreated` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable_tbl`
--

INSERT INTO `timetable_tbl` (`id`, `lecturerId`, `courseId`, `level`, `dayOfWeek`, `classTime`, `dateCreated`) VALUES
(3, '3', '3', 'ND1', 'Sunday', '07:10 PM - 08:00 PM', '2022-04-09 15:58:53'),
(4, '5', '4', 'ND2', 'Sunday', '07:00 AM - 08:00 AM', '2022-04-09 16:02:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_tbl`
--
ALTER TABLE `day_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer_tbl`
--
ALTER TABLE `lecturer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable_tbl`
--
ALTER TABLE `timetable_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `day_tbl`
--
ALTER TABLE `day_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturer_tbl`
--
ALTER TABLE `lecturer_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timetable_tbl`
--
ALTER TABLE `timetable_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
