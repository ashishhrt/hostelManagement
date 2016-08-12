-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 06:16 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_authenticator`
--

CREATE TABLE IF NOT EXISTS `admin_authenticator` (
  `id` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_authenticator`
--

INSERT INTO `admin_authenticator` (`id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
  `hostel_id` int(2) DEFAULT NULL,
  `facility_name` varchar(20) DEFAULT NULL,
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`hostel_id`, `facility_name`) VALUES
(1, '24*7 running water'),
(1, 'inverter available'),
(1, 'cooler on demand'),
(2, '24*7 running water'),
(2, 'inverter available'),
(2, 'ac/cooler on demand'),
(3, '24*7 running water'),
(3, 'inverter available'),
(3, 'ac/cooler on demand');

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE IF NOT EXISTS `hostel` (
  `hostel_id` int(2) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(20) DEFAULT NULL,
  `location` varchar(15) DEFAULT NULL,
  `owner_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`hostel_id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`hostel_id`, `hostel_name`, `location`, `owner_id`) VALUES
(1, 'radha krishan hostel', 'modinagar,(UP)', 1),
(2, 'Shyam hostel', 'south delhi', 1),
(3, 'Pragya hostel', 'kota', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_owner`
--

CREATE TABLE IF NOT EXISTS `hostel_owner` (
  `owner_id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `phone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hostel_owner`
--

INSERT INTO `hostel_owner` (`owner_id`, `name`, `age`, `sex`, `phone_no`) VALUES
(1, 'radhe yadav', 43, 'male', '9876543210'),
(2, 'Shubham sharma', 34, 'male', '9876508745');

-- --------------------------------------------------------

--
-- Table structure for table `owner_authenticator`
--

CREATE TABLE IF NOT EXISTS `owner_authenticator` (
  `email` varchar(40) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  `owner_id` int(2) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`email`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `owner_authenticator`
--

INSERT INTO `owner_authenticator` (`email`, `password`, `owner_id`) VALUES
('radhe.yadav@example.com', 'radheyadav', 1),
('subham.sharma@example.com', 'subhamshar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `hostel_id` int(2) NOT NULL,
  `room_no` int(3) NOT NULL,
  `price` int(6) DEFAULT NULL,
  `availability` int(1) DEFAULT '0',
  `student_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`hostel_id`,`room_no`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`hostel_id`, `room_no`, `price`, `availability`, `student_id`) VALUES
(1, 1, 2000, 1, 123),
(1, 2, 2000, 1, 124),
(1, 3, 2000, 1, 125),
(1, 4, 2000, 0, NULL),
(1, 5, 2000, 0, NULL),
(1, 6, 2000, 0, NULL),
(1, 7, 2000, 0, NULL),
(1, 8, 2000, 0, NULL),
(1, 9, 2000, 0, NULL),
(1, 10, 2000, 0, NULL),
(2, 1, 2000, 1, 127),
(2, 2, 2000, 0, NULL),
(2, 3, 2000, 0, NULL),
(2, 4, 2000, 0, NULL),
(2, 5, 2000, 0, NULL),
(2, 6, 2000, 0, NULL),
(2, 7, 2000, 0, NULL),
(2, 8, 2000, 0, NULL),
(2, 9, 2000, 0, NULL),
(2, 10, 2000, 0, NULL),
(3, 1, 2000, 1, 126),
(3, 2, 2000, 1, 128),
(3, 3, 2000, 0, NULL),
(3, 4, 2000, 0, NULL),
(3, 5, 2000, 0, NULL),
(3, 6, 2000, 0, NULL),
(3, 7, 2000, 0, NULL),
(3, 8, 2000, 0, NULL),
(3, 9, 2000, 0, NULL),
(3, 10, 2000, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `student_id` int(4) NOT NULL AUTO_INCREMENT,
  `student_name` varchar(20) DEFAULT NULL,
  `age` int(2) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `age`, `sex`) VALUES
(123, 'Ashish Kumar', 21, 'm'),
(124, 'rashid', 22, 'm'),
(125, 'ketan', 22, 'm'),
(126, 'Kaleshwar', 19, 'm'),
(127, 'Abhay', 20, 'm'),
(128, 'Arjun', 21, 'm');

-- --------------------------------------------------------

--
-- Table structure for table `student_authenticator`
--

CREATE TABLE IF NOT EXISTS `student_authenticator` (
  `email` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `student_id` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`email`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `student_authenticator`
--

INSERT INTO `student_authenticator` (`email`, `password`, `student_id`) VALUES
('abhay@example.com', 'abhay', 127),
('arjun@example.com', 'arjun', 128),
('ashish@example.com', 'ashish', 123),
('kaleshwar@example.com', 'kaleshwar', 126),
('ketan@example.com', 'ketan', 125),
('rashid@example.com', 'rashid', 124);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`);

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `hostel_owner` (`owner_id`);

--
-- Constraints for table `owner_authenticator`
--
ALTER TABLE `owner_authenticator`
  ADD CONSTRAINT `owner_authenticator_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `hostel_owner` (`owner_id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel` (`hostel_id`),
  ADD CONSTRAINT `rooms_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `student_authenticator`
--
ALTER TABLE `student_authenticator`
  ADD CONSTRAINT `student_authenticator_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
