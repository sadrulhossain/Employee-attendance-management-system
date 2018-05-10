-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2016 at 08:11 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `attend_id` int(12) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attend_id`, `emp_id`, `date`, `status`) VALUES
(16, '131-15-2402', '2016-12-04', 1),
(17, '143-15-4537', '2016-12-04', 1),
(18, '143-15-4537', '2016-11-30', 2),
(19, '143-15-4537', '2016-12-01', 2),
(20, '143-15-4537', '2016-12-02', 2),
(21, '143-15-4537', '2016-12-03', 2),
(22, '143-15-4537', '2016-12-05', 2),
(23, '143-15-4537', '2016-12-06', 2),
(24, '143-15-4537', '2016-12-07', 2),
(25, '131-15-2402', '2016-12-05', 2),
(26, '131-15-2402', '2016-12-06', 2),
(27, '131-15-2402', '2016-12-07', 2),
(28, '131-15-2402', '2016-12-08', 2),
(29, '131-15-2402', '2016-12-09', 2),
(30, '143-15-4537', '2016-12-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_tbl`
--

CREATE TABLE IF NOT EXISTS `emp_tbl` (
  `emp_id` varchar(20) NOT NULL,
  `fullname` text NOT NULL,
  `designation` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` int(3) NOT NULL,
  `dob` date NOT NULL,
  `nationality` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_tbl`
--

INSERT INTO `emp_tbl` (`emp_id`, `fullname`, `designation`, `username`, `password`, `gender`, `dob`, `nationality`, `contact`, `email`, `address`, `photo`) VALUES
('131-15-2402', 'S. Sadrul Hossain', 'CEO', 'admin', 'admin', 0, '1994-09-04', 'Bangladeshi', '+8801797557541', 'hossainsadrul@gmail.com', '114/2, Hassan Lane, Dattapara, Tongi, Gazipur', 'sadrulhossain.jpg'),
('143-15-4537', 'Mohabbat Hossain Sarker', 'Manager', 'mohabbatmunna', '12345', 0, '1995-05-06', 'Bangladeshi', '+8801711141119', 'monna3233@gmail.com', '59/A, West Rajabazar, Dhaka-1207', 'munna.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `permit_leave`
--

CREATE TABLE IF NOT EXISTS `permit_leave` (
  `l_id` int(12) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `cause` text NOT NULL,
  `duration` int(12) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `l_status` int(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permit_leave`
--

INSERT INTO `permit_leave` (`l_id`, `emp_id`, `cause`, `duration`, `from_date`, `to_date`, `l_status`) VALUES
(12, '143-15-4537', 'Sickness', 4, '2016-11-30', '2016-12-03', 1),
(13, '143-15-4537', 'Sickness', 3, '2016-12-05', '2016-12-07', 1),
(14, '131-15-2402', 'Others....', 5, '2016-12-05', '2016-12-09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `emp_tbl`
--
ALTER TABLE `emp_tbl`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `permit_leave`
--
ALTER TABLE `permit_leave`
  ADD PRIMARY KEY (`l_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attend_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `permit_leave`
--
ALTER TABLE `permit_leave`
  MODIFY `l_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
