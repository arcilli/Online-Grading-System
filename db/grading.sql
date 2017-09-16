-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2017 at 11:42 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(11) NOT NULL,
  `classname` varchar(20) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `yearlevelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `classname`, `schoolyearid`, `yearlevelid`) VALUES
(3, 'BT701E', 24, 4),
(5, 'BT704P', 24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolyear`
--

CREATE TABLE `tblschoolyear` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblschoolyear`
--

INSERT INTO `tblschoolyear` (`id`, `schoolyear`, `status`) VALUES
(4, '2017-2018', 0),
(24, '2016-2017', 1),
(25, '2018-2019', 1),
(26, '2020-2021', 1),
(27, '2022-2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentclass`
--

CREATE TABLE `tblstudentclass` (
  `id` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentclass`
--

INSERT INTO `tblstudentclass` (`id`, `classid`, `studentid`, `subjectid`) VALUES
(3, 3, 1, 1),
(4, 5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudentgrade`
--

CREATE TABLE `tblstudentgrade` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `schoolyearid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `adviserid` int(11) NOT NULL,
  `1stgrading` int(11) NOT NULL,
  `2ndgrading` int(11) NOT NULL,
  `3rdgrading` int(11) NOT NULL,
  `4thgrading` int(11) NOT NULL,
  `gradeaverage` int(11) NOT NULL,
  `remarks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudentgrade`
--

INSERT INTO `tblstudentgrade` (`id`, `studentid`, `schoolyearid`, `subjectid`, `classid`, `adviserid`, `1stgrading`, `2ndgrading`, `3rdgrading`, `4thgrading`, `gradeaverage`, `remarks`) VALUES
(1, 1, 4, 1, 3, 1, 23, 23, 45, 4, 24, 'Failed'),
(5, 1, 24, 1, 3, 1, 79, 89, 78, 88, 84, 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `yearlevelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `subjectname`, `description`, `yearlevelid`) VALUES
(1, 'IT1', 'Fundamentals of Computer', 4),
(2, 'IT122', 'Articial Intelligence', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblteacheradvisory`
--

CREATE TABLE `tblteacheradvisory` (
  `id` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `subjectid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblteacheradvisory`
--

INSERT INTO `tblteacheradvisory` (`id`, `teacherid`, `classid`, `subjectid`) VALUES
(7, 4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblyearlevel`
--

CREATE TABLE `tblyearlevel` (
  `id` int(11) NOT NULL,
  `yearlevel` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblyearlevel`
--

INSERT INTO `tblyearlevel` (`id`, `yearlevel`, `description`) VALUES
(4, '1st', 'Section 1'),
(5, '2nd', 'Section 2');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(11) NOT NULL,
  `username` varchar(140) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(140) NOT NULL,
  `mname` varchar(140) NOT NULL,
  `lname` varchar(140) NOT NULL,
  `contact` varchar(140) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `username`, `password`, `fname`, `mname`, `lname`, `contact`, `usertype`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', '09173302328', 'admin', 0),
(3, 'student', 'student123', 'student', 'student', 'student', '00988', 'student', 1),
(4, 'teachers', 'teacher123', 'teacher', 'teacher', 'teacher', '2424', 'teacher', 0),
(5, 'asdsad', 'student123', 'dsadas', 'dsadas', 'dsadas', 'dsadas', 'student', 0),
(6, 'dasdas', 'teacher123', 'dsadas', 'dsadas', 'dsadsa', 'dasdsa', 'teacher', 0),
(7, 'po', 'teacher123', 'po', 'po', 'po', 'po', 'teacher', 0),
(8, 'Kaloy', 'admin123', 'Karlo', 'Juanitas', 'Bonayon', '09266493010', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schoolyear` (`schoolyear`);

--
-- Indexes for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classid` (`classid`),
  ADD KEY `studentid` (`studentid`);

--
-- Indexes for table `tblstudentgrade`
--
ALTER TABLE `tblstudentgrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblteacheradvisory`
--
ALTER TABLE `tblteacheradvisory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacherid` (`teacherid`,`classid`),
  ADD KEY `classid` (`classid`);

--
-- Indexes for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblschoolyear`
--
ALTER TABLE `tblschoolyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tblstudentclass`
--
ALTER TABLE `tblstudentclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblstudentgrade`
--
ALTER TABLE `tblstudentgrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblteacheradvisory`
--
ALTER TABLE `tblteacheradvisory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblyearlevel`
--
ALTER TABLE `tblyearlevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
