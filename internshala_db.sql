-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 01:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internshala_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `no` int(11) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `employerEmail` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`no`, `studentEmail`, `employerEmail`, `company`, `jobTitle`) VALUES
(1, 'abc@abc.com', 'careers@codebuckets.in', 'Codebuckets', 'Intern'),
(3, 'raj.anshu66@gmail.com', 'careers@codebuckets.in', 'Codebuckets', 'Intern'),
(6, 'raj.anshu66@gmail.com', 'careers@codebuckets.in', 'Codebuckets', 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `organisation` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `mobileNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`organisation`, `email`, `password`, `firstName`, `lastName`, `mobileNo`) VALUES
('Codebuckets', 'careers@codebuckets.in', 'codebuckets', 'Code', 'Buckets', '1876543210');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `employerName` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `jobTitle` varchar(100) NOT NULL,
  `stipend` int(11) NOT NULL,
  `startBy` date NOT NULL,
  `duration` varchar(100) NOT NULL,
  `description` varchar(50000) NOT NULL,
  `postedOn` date NOT NULL,
  `applyBy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`no`, `email`, `employerName`, `location`, `jobTitle`, `stipend`, `startBy`, `duration`, `description`, `postedOn`, `applyBy`) VALUES
(1, 'careers@codebuckets.in', 'Codebuckets', 'Patna', 'Intern', 5000, '2018-04-30', '2 Months', 'Work as an intern', '2018-04-24', '2018-04-27'),
(3, 'careers@codebuckets.in', 'Codebuckets', 'Kochi', 'Web Development', 3000, '2018-04-30', '2 Months', 'Hard working people required.', '2018-04-26', '2018-04-28'),
(4, 'careers@codebuckets.in', 'Codebuckets', 'Kochi', 'Android Development', 5000, '2018-04-29', '1 Month', 'Should know Kotlin.', '2018-04-26', '2018-04-27'),
(5, 'careers@codebuckets.in', 'Codebuckets', 'Kochi', 'Competitive Programming', 1000, '2018-05-25', '2 Months', 'Should have good coding skills.', '2018-04-28', '2018-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `mobileNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `password`, `firstName`, `lastName`, `mobileNo`) VALUES
('abc@abc.com', 'abc', 'abc', 'abc', '9876545678'),
('anshu@anshu.com', 'anshu', 'Anshu', 'Raj', '8765456789'),
('raj.anshu66@gmail.com', 'anshu', 'Anshu', 'Raj', '7654345678'),
('sumit@gmail.com', 'sumit', 'Sumit', 'Singh', '9876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`no`),
  ADD KEY `email` (`studentEmail`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied`
--
ALTER TABLE `applied`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applied`
--
ALTER TABLE `applied`
  ADD CONSTRAINT `applied_ibfk_1` FOREIGN KEY (`studentEmail`) REFERENCES `student` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
