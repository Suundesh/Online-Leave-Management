-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 08:52 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`admin_id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'demo', 'demo@gmail.com', '9066606131', 'demo'),
(3, 'Madan', 'mad@gmail.com', '90666', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `alternatefaculty`
--

CREATE TABLE `alternatefaculty` (
  `id` int(11) NOT NULL,
  `applicantid` int(11) NOT NULL,
  `presentdata_id` int(11) NOT NULL,
  `alternatefacultyid` int(11) NOT NULL,
  `date` date NOT NULL,
  `hour` varchar(15) NOT NULL,
  `alternate_status` varchar(10) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facultydetails`
--

CREATE TABLE `facultydetails` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(20) NOT NULL,
  `faculty_department` varchar(10) NOT NULL,
  `faculty_leavetaken` int(11) NOT NULL,
  `faculty_leaveleft` int(11) NOT NULL DEFAULT 7,
  `faculty_phone` varchar(10) NOT NULL,
  `faculty_email` varchar(30) NOT NULL,
  `faculty_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultydetails`
--

INSERT INTO `facultydetails` (`faculty_id`, `faculty_name`, `faculty_department`, `faculty_leavetaken`, `faculty_leaveleft`, `faculty_phone`, `faculty_email`, `faculty_password`) VALUES
(6, 'Madan', '', 0, 7, '', 'dmadan29@gmail.com', 'Password'),
(14, 'Suundesh', '', 0, 7, '', 'suundesh@gmail.com', 'Pass@12'),
(15, 'Sanya', '', 0, 7, '', 'srai.blr@gmail.com', 'Pass123'),
(22, 'Sonam ', '', 0, 7, '', 'goswamisonam8765@gmail.com', 'Pass64'),
(23, 'Shubh', '', 0, 7, '', 'gupta.shubh1999@gmail.com', 'Pass@me');

-- --------------------------------------------------------

--
-- Table structure for table `facultytimetable`
--

CREATE TABLE `facultytimetable` (
  `timetable_id` int(11) NOT NULL,
  `facultyid` int(11) NOT NULL,
  `s1subject` varchar(10) NOT NULL,
  `s1section` varchar(10) NOT NULL,
  `s2subject` varchar(10) NOT NULL,
  `s2section` varchar(10) NOT NULL,
  `s3subject` varchar(10) NOT NULL,
  `s3section` varchar(10) NOT NULL,
  `s4subject` varchar(10) NOT NULL,
  `s4section` varchar(10) NOT NULL,
  `s5subject` varchar(10) NOT NULL,
  `s5section` varchar(10) NOT NULL,
  `s6subject` varchar(10) NOT NULL,
  `s6section` varchar(10) NOT NULL,
  `s7subject` varchar(10) NOT NULL,
  `s7section` varchar(10) NOT NULL,
  `s8subject` varchar(10) NOT NULL,
  `s8section` varchar(10) NOT NULL,
  `day` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultytimetable`
--

INSERT INTO `facultytimetable` (`timetable_id`, `facultyid`, `s1subject`, `s1section`, `s2subject`, `s2section`, `s3subject`, `s3section`, `s4subject`, `s4section`, `s5subject`, `s5section`, `s6subject`, `s6section`, `s7subject`, `s7section`, `s8subject`, `s8section`, `day`) VALUES
(3, 6, 'Free', 'Free', 'Free', 'Free', 'CSE2009', '4COM3', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Mon'),
(4, 6, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE2009', '4CSE11', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE235', '6COM3', 'Tue'),
(5, 6, 'CSE2009', '4CSE11', 'Free', 'Free', 'Free', 'Free', 'CSE2009', '4COM3', 'CSE235', '6COM3', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Wed'),
(6, 6, 'CSE2009', '4COM3', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', '2BCG', 'BCA1005L', '2BCG', 'BCA1005L', 'Free', 'Free', 'Free', 'Free', 'Thu'),
(7, 6, 'Free', 'Free', 'CSE2009', '4CSE11', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE235', '6COM3', 'Free', 'Free', 'Free', 'Free', 'Fri'),
(8, 14, 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE11', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE248L', '6CSE5', 'CSE248L', '6CSE5', 'Mon'),
(9, 14, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE5', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Tue'),
(10, 14, 'CSE248', '6CSE5', 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE11', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Wed'),
(11, 14, 'CSE248', '6CSE11', 'Free', 'Free', 'CSE248L', '6CSE11', 'CSE248L', '6CSE11', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Thu'),
(12, 14, 'Free', 'Free', 'CSE248', '6CSE5', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Fri'),
(13, 15, 'CSE2074L', '2CSE17', 'CSE2074L', '2CSE17', 'BCA1006', '2BCAARVR', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Mon'),
(14, 15, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Tue'),
(15, 15, 'BCA258L', '4BCAARVR', 'BCA258L', '4BCAARVR', 'Free', 'Free', 'BCA1006', '2BCAARVR', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Wed'),
(16, 15, 'BCA1006', '2BCAARVR', 'Free', 'Free', 'Free', 'Free', 'BCA258', '4BCAARVR', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Thu'),
(17, 15, 'Free', 'Free', 'Free', 'Free', 'BCA258L', '4BCAARVR', 'BCA258L', '4BCAARVR', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Fri'),
(18, 22, 'BCA206', '4BCA1', 'Free', 'Free', 'CSE2008L', '4CSE10', 'CSE2008L', '4CSE10', 'Free', 'Free', 'Free', 'Free', 'CSE2008L', '4CSE5', 'CSE2008L', '4CSE5', 'Mon'),
(19, 22, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'BCA206L', '4BCA1', 'BCA206L', '4BCA1', 'Tue'),
(20, 22, 'Free', 'Free', 'BCA206', '4BCA1', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Wed'),
(21, 22, 'CSE2008L', '4CSE10', 'CSE2008L', '4CSE10', 'Free', 'Free', 'Free', 'Free', 'CSE2008L', '4CSE5', 'CSE2008L', '4CSE5', 'Free', 'Free', 'Free', 'Free', 'Thu'),
(22, 22, 'Free', 'Free', 'Free', 'Free', 'BCA206', '4BCA1', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Fri'),
(23, 23, 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE13', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Mon'),
(24, 23, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE2', 'Tue'),
(25, 23, 'CSE248L', '6CSE13', 'CSE248L', '6CSE13', 'Free', 'Free', 'CSE248', '6CSE13', 'CSE248', '6CSE2', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Wed'),
(26, 23, 'CSE248', '6CSE13', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE248L', '6CSE2', 'CSE248L', '6CSE2', 'Free', 'Free', 'Free', 'Free', 'Thu'),
(27, 23, 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'Free', 'CSE248', '6CSE2', 'Free', 'Free', 'Free', 'Free', 'Fri');

-- --------------------------------------------------------

--
-- Table structure for table `presentleavedata`
--

CREATE TABLE `presentleavedata` (
  `presentdataid` int(11) NOT NULL,
  `facul_id` int(11) NOT NULL,
  `leavefrom` date NOT NULL,
  `leaveto` date NOT NULL,
  `numofdays` int(11) NOT NULL,
  `leavetype` varchar(15) NOT NULL,
  `leavereason` varchar(100) NOT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `alternatefaculty` varchar(100) NOT NULL DEFAULT 'Pending',
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `adminremark` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presentleavedata`
--

INSERT INTO `presentleavedata` (`presentdataid`, `facul_id`, `leavefrom`, `leaveto`, `numofdays`, `leavetype`, `leavereason`, `documents`, `alternatefaculty`, `status`, `adminremark`) VALUES
(6, 6, '2022-06-06', '2022-06-08', 0, 'Casual Leave', 'Marraige', '1.pdf', 'Pending', 'Pending', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alternatefaculty`
--
ALTER TABLE `alternatefaculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentleavedataid` (`presentdata_id`),
  ADD KEY `linkfacultyid` (`alternatefacultyid`);

--
-- Indexes for table `facultydetails`
--
ALTER TABLE `facultydetails`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `facultytimetable`
--
ALTER TABLE `facultytimetable`
  ADD PRIMARY KEY (`timetable_id`),
  ADD KEY `faculty_id` (`facultyid`);

--
-- Indexes for table `presentleavedata`
--
ALTER TABLE `presentleavedata`
  ADD PRIMARY KEY (`presentdataid`),
  ADD UNIQUE KEY `presentdataid` (`presentdataid`),
  ADD KEY `test_id` (`facul_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alternatefaculty`
--
ALTER TABLE `alternatefaculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facultydetails`
--
ALTER TABLE `facultydetails`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `facultytimetable`
--
ALTER TABLE `facultytimetable`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `presentleavedata`
--
ALTER TABLE `presentleavedata`
  MODIFY `presentdataid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatefaculty`
--
ALTER TABLE `alternatefaculty`
  ADD CONSTRAINT `linkfacultyid` FOREIGN KEY (`alternatefacultyid`) REFERENCES `facultydetails` (`faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presentleavedataid` FOREIGN KEY (`presentdata_id`) REFERENCES `presentleavedata` (`presentdataid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facultytimetable`
--
ALTER TABLE `facultytimetable`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`facultyid`) REFERENCES `facultydetails` (`faculty_id`);

--
-- Constraints for table `presentleavedata`
--
ALTER TABLE `presentleavedata`
  ADD CONSTRAINT `test_id` FOREIGN KEY (`facul_id`) REFERENCES `facultydetails` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
