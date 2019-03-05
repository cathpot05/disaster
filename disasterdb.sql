-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2019 at 10:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disasterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `dateCreated`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2019-02-28 01:56:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `videoID` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` varchar(150) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `videoID`, `question`, `answer`, `dateCreated`, `status`) VALUES
(1, 1, 'question 1', 'answer', '2019-03-05 00:00:00', 1),
(2, 1, 'question 2', 'answer', '2019-03-05 00:00:00', 1),
(3, 1, 'question 3', 'answer', '2019-03-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_choices`
--

CREATE TABLE `evaluation_choices` (
  `id` int(11) NOT NULL,
  `evaluationID` int(11) NOT NULL,
  `choice` varchar(150) NOT NULL,
  `isCorrect` bit(1) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation_choices`
--

INSERT INTO `evaluation_choices` (`id`, `evaluationID`, `choice`, `isCorrect`, `dateCreated`, `status`) VALUES
(1, 1, 'choice 1', b'0', '2019-03-05 00:00:00', 1),
(2, 1, 'choice 2', b'1', '2019-03-05 00:00:00', 1),
(3, 1, 'choice 3', b'0', '2019-03-05 00:00:00', 1),
(4, 2, 'choice 1', b'0', '2019-03-05 00:00:00', 1),
(5, 2, 'choice 2', b'0', '2019-03-05 00:00:00', 1),
(6, 2, 'choice 3', b'1', '2019-03-05 00:00:00', 1),
(7, 3, 'choice 1', b'1', '2019-03-05 00:00:00', 1),
(8, 3, 'choice 2', b'0', '2019-03-05 00:00:00', 1),
(9, 3, 'choice 3', b'0', '2019-03-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `videoID` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `studNo` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `studNo`, `username`, `password`, `name`, `email`, `dateCreated`, `status`) VALUES
(1, 'S2019123456', 'test123', 'cc03e747a6afbbcbf8be7668acfebee5', 'John Doe', 'john.doe@gmail.com', '2019-02-28 10:56:24', 1),
(2, '1', 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', '2019-03-04 10:32:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_certificates`
--

CREATE TABLE `user_certificates` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `videoID` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `isWatch` int(11) NOT NULL,
  `scoreStatus` int(11) DEFAULT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_certificates`
--

INSERT INTO `user_certificates` (`id`, `userID`, `videoID`, `year`, `isWatch`, `scoreStatus`, `dateCreated`, `status`) VALUES
(6, 2, 1, 2019, 1, 2, '2019-03-05 20:50:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_certificates_detail`
--

CREATE TABLE `user_certificates_detail` (
  `id` int(11) NOT NULL,
  `userCertID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_certificates_detail`
--

INSERT INTO `user_certificates_detail` (`id`, `userCertID`, `score`, `dateCreated`) VALUES
(1, 6, 2, '2019-03-05 20:57:41'),
(2, 6, 2, '2019-03-05 20:58:27'),
(3, 6, 1, '2019-03-05 20:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `fileDir` varchar(150) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `thumbnail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `name`, `description`, `fileDir`, `dateCreated`, `status`, `thumbnail`) VALUES
(1, 'Fire Disaster Preparedness', 'Fire is one of the most common disasters. Fire causes more deaths than any other type of disaster. But fire doesn''t have to be deadly if you have early warning from a smoke detector and everyone in your family and friends knows how to escape calmly. Watch the video for more information.', 'video/fire.swf', '2019-03-05 00:00:00', 1, 'video/thumb/fire.gif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_choices`
--
ALTER TABLE `evaluation_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_certificates`
--
ALTER TABLE `user_certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_certificates_detail`
--
ALTER TABLE `user_certificates_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `evaluation_choices`
--
ALTER TABLE `evaluation_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_certificates`
--
ALTER TABLE `user_certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_certificates_detail`
--
ALTER TABLE `user_certificates_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
