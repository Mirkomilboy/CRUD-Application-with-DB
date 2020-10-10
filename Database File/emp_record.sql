-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 04:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employeerecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_record`
--

CREATE TABLE IF NOT EXISTS `emp_record` (
`id` int(100) NOT NULL,
  `ename` varchar(50) NOT NULL,
  `ssn` varchar(15) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `salary` int(10) NOT NULL,
  `homeaddress` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_record`
--

INSERT INTO `emp_record` (`id`, `ename`, `ssn`, `dept`, `salary`, `homeaddress`) VALUES
(12, 'Mirkomilboy', '12345678', 'Computer Science', 5000, 'Andijon'),
(13, 'Abdushukur', '12345678', 'Web Designer', 5000, 'Andijon'),
(14, 'Shohjahon', '12345678', 'HR', 5000, 'Bo''ston'),
(15, 'Farohiddin', '12345678', 'Management', 5000, 'Izboskan'),
(16, 'Dilmurod', '12345678', 'Taxi', 5000, 'Andijon'),
(17, 'Abdulloh', '12345678', 'Business', 5000, 'Fargona');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_record`
--
ALTER TABLE `emp_record`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_record`
--
ALTER TABLE `emp_record`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
