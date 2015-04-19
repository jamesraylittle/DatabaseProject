-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 12:31 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `DB_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assigned_to`
--

CREATE TABLE IF NOT EXISTS `Assigned_to` (
  `crn` int(5) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
  `code` int(5) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Course_Sections`
--

CREATE TABLE IF NOT EXISTS `Course_Sections` (
  `code` int(5) NOT NULL,
  `crn` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE IF NOT EXISTS `Instructors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `join_date` text NOT NULL,
  `type` text NOT NULL,
  `tenure` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`id`, `name`, `join_date`, `type`, `tenure`) VALUES
(1, 'e', 'e', '1', '1'),
(1, 'Yuanlin Zhang', 'Spring 2010', '1', '2'),
(1, 'namin', 'd', '1', 'not applicable'),
(1, 'name', 'sem', 'FTI', 'Untenured'),
(0, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(0, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(0, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(0, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(56, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(56, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(56999, 'me', 'spring 2015', 'GPTI', 'Not Applicable'),
(56999, 'me', 'spring 2015', 'Professor', 'Tenured'),
(56999, 'me', 'spring 2015', 'Professor', 'Untenured'),
(56999, 'me', 'spring 2015', 'FTI', 'Not Applicable');

-- --------------------------------------------------------

--
-- Table structure for table `Sections`
--

CREATE TABLE IF NOT EXISTS `Sections` (
  `crn` int(5) NOT NULL,
  `type` text NOT NULL,
  `time` text NOT NULL,
  `enrolled` int(3) NOT NULL,
  `max_enrolled` int(3) NOT NULL,
  `section_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TAs`
--

CREATE TABLE IF NOT EXISTS `TAs` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `hours` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TA_Assigned_to`
--

CREATE TABLE IF NOT EXISTS `TA_Assigned_to` (
  `crn` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
