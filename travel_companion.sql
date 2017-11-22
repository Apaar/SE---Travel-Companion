-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 03:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel_companion`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`username`, `password`, `first_name`, `last_name`, `email`) VALUES
('Aniket', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Aniket', 'Udaykumar', 'aniket.udaykumar@gmail.com'),
('xyz', '66b27417d37e024c46526c2f6d358a754fc552f3', 'xyz', 'qwe', 'xyz@xyz.com'),
('abc', 'a9993e364706816aba3e25717850c26c9cd0d89d', 'abc', 'rty', 'abc@abc.com'),
('qwe', '056eafe7cf52220de2df36845b8ed170c67e23e3', 'qwe', 'zxc', 'qwe@qwe.com'),
('apaar', 'c5094fbdc366aff26c4337e0ea0f1e1ea67db24e', 'apaar', 'apaar', 'apaar');

-- --------------------------------------------------------

--
-- Table structure for table `friends_list`
--

CREATE TABLE `friends_list` (
  `friend1` varchar(10) NOT NULL,
  `friend2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_list`
--

INSERT INTO `friends_list` (`friend1`, `friend2`) VALUES
('Aniket', 'xyz'),
('xyz', 'Aniket'),
('Aniket', 'abc'),
('abc', 'Aniket');

-- --------------------------------------------------------

--
-- Table structure for table `last_seen`
--

CREATE TABLE `last_seen` (
  `username` varchar(30) NOT NULL,
  `last_seen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `last_seen`
--

INSERT INTO `last_seen` (`username`, `last_seen`) VALUES
('xyz', '2017-11-22 20:18:32'),
('aniket', '2017-11-22 20:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `username` varchar(10) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`username`, `lat`, `lng`) VALUES
('aniket', 12.964755, 77.639999),
('xyz', 12.964758, 77.639999),
('apaar', 12.935593, 77.534042);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
