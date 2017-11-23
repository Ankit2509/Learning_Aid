-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2017 at 12:55 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teachers`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `id` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `ph_no` varchar(20) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `password`, `Name`, `email`, `ph_no`, `photo`) VALUES
('teach123', '12345678', 'Teacher1', 'teach@gmail.com', '', ''),
('teacher123', '12345678', 'Teacher', 'teacher@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `cse cs301`
--

CREATE TABLE `cse cs301` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(40) NOT NULL,
  `links` varchar(100) NOT NULL,
  `Announcements` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ece ec147`
--

CREATE TABLE `ece ec147` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(40) NOT NULL,
  `links` varchar(100) NOT NULL,
  `Announcements` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ece ec147`
--

INSERT INTO `ece ec147` (`id`, `date`, `notes`, `links`, `Announcements`) VALUES
(1, '2017-11-20', 'Learning Aid Mobile Application.docx', 'www.google.com', 'WELCOME'),
(2, '2017-11-20', '', '', 'Class @ 11am on 21nov'),
(3, '2017-11-20', 'MATLAB.pdf', 'www.youtube.com', 'WELCOME TO ECE');

-- --------------------------------------------------------

--
-- Table structure for table `ece it415`
--

CREATE TABLE `ece it415` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `notes` varchar(40) NOT NULL,
  `links` varchar(100) NOT NULL,
  `Announcements` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teach123`
--

CREATE TABLE `teach123` (
  `branch` varchar(20) NOT NULL,
  `subject_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teach123`
--

INSERT INTO `teach123` (`branch`, `subject_code`) VALUES
('ece', 'it415');

-- --------------------------------------------------------

--
-- Table structure for table `teacher123`
--

CREATE TABLE `teacher123` (
  `branch` varchar(20) NOT NULL,
  `subject_code` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher123`
--

INSERT INTO `teacher123` (`branch`, `subject_code`) VALUES
('cse', 'cs301'),
('ece', 'ec147');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cse cs301`
--
ALTER TABLE `cse cs301`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ece ec147`
--
ALTER TABLE `ece ec147`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ece it415`
--
ALTER TABLE `ece it415`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teach123`
--
ALTER TABLE `teach123`
  ADD PRIMARY KEY (`branch`,`subject_code`);

--
-- Indexes for table `teacher123`
--
ALTER TABLE `teacher123`
  ADD PRIMARY KEY (`branch`,`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cse cs301`
--
ALTER TABLE `cse cs301`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ece ec147`
--
ALTER TABLE `ece ec147`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ece it415`
--
ALTER TABLE `ece it415`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
