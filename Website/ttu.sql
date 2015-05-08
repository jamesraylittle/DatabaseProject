-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2015 at 02:09 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ttu`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assigned_to`
--

CREATE TABLE IF NOT EXISTS `Assigned_to` (
`id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `semester` text
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Assigned_to`
--

INSERT INTO `Assigned_to` (`id`, `section_id`, `instructor_id`, `semester`) VALUES
(6, 1, 6, 'Spring 2015'),
(7, 1, 6, 'Fall 2014'),
(8, 2, 6, 'Spring 2015'),
(9, 1, 7, 'Spring 2015'),
(10, 2, 7, 'Spring 2014'),
(11, 3, 7, 'Spring 2013'),
(12, 14113, 7, 'Summer 2015'),
(13, 1, 7, 'Summer 2015'),
(14, 1, 6, 'Spring 2013'),
(15, 1, 7, 'Spring 2014'),
(16, 2, 7, 'Spring 2014'),
(17, 2, 7, 'Spring 2015'),
(18, 2, 7, 'Spring 2015'),
(19, 1, 7, 'Spring 2015'),
(20, 1, 6, 'Spring 2015'),
(21, 2, 6, 'Spring 2015'),
(22, 1, 6, 'Spring 2015'),
(23, 1, 6, 'Spring 2015'),
(24, 1, 6, 'Spring 2015'),
(25, 1, 6, 'Spring 2015'),
(26, 1, 6, 'Spring 2015'),
(27, 1, 6, 'Spring 2015');

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE IF NOT EXISTS `Courses` (
`course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `required` varchar(255) DEFAULT NULL,
  `catalog_year` int(11) NOT NULL,
  `special` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43317 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`course_id`, `name`, `description`, `required`, `catalog_year`, `special`) VALUES
(14111, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2010, 'No'),
(14112, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2011, 'No'),
(14113, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2012, 'No'),
(14114, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2013, 'No'),
(14115, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2014, 'No'),
(14116, 'Programmin Principles I', 'Programmin Principles I', 'Yes', 2015, 'No'),
(14121, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2010, 'No'),
(14122, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2011, 'No'),
(14123, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2012, 'No'),
(14124, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2013, 'No'),
(14125, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2014, 'No'),
(14126, 'Programmin Principles II', 'Programmin Principles II', 'Yes', 2015, 'No'),
(43311, 'AI', 'Artificial Intelligence.', 'No', 2010, 'Yes'),
(43312, 'Parallel processing', 'Parallel processing', 'No', 2011, 'Yes'),
(43313, 'Game design', 'Game design', 'No', 2012, 'Yes'),
(43314, 'Special Topics', 'Special Topics', 'No', 2013, 'Yes'),
(43315, 'Cyber Security', 'Cyber Security', 'No', 2014, 'Yes'),
(43316, 'Unity game development', 'Unity game development', 'No', 2015, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `Course_Sections`
--

CREATE TABLE IF NOT EXISTS `Course_Sections` (
`id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course_Sections`
--

INSERT INTO `Course_Sections` (`id`, `course_id`, `section_id`, `semester`) VALUES
(5, 14111, 1, 'Spring 2015'),
(6, 14111, 1, 'Fall 2014'),
(7, 14111, 2, 'Spring 2015'),
(8, 14121, 1, 'Spring 2015'),
(9, 14122, 2, 'Spring 2014'),
(10, 14121, 3, 'Spring 2013'),
(12, 14122, 1, 'Summer 2015'),
(13, 43311, 1, 'Spring 2013'),
(14, 14412, 1, 'Spring 2014'),
(15, 43312, 2, 'Spring 2014'),
(16, 14122, 2, 'Spring 2015'),
(17, 14122, 2, 'Spring 2015'),
(18, 14121, 1, 'Spring 2015'),
(19, 14111, 1, 'Spring 2015'),
(20, 14112, 2, 'Spring 2015'),
(21, 43311, 1, 'Spring 2015'),
(22, 43321, 1, 'Spring 2015'),
(23, 43312, 1, 'Spring 2015'),
(24, 43313, 1, 'Spring 2015'),
(25, 43314, 1, 'Spring 2015'),
(26, 43315, 1, 'Spring 2015');

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE IF NOT EXISTS `Instructors` (
`instructor_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `join_date` text NOT NULL,
  `type` text NOT NULL,
  `tenure` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`instructor_id`, `name`, `join_date`, `type`, `tenure`) VALUES
(6, 'Yong Chen', 'Spring 2010', 'Professor', 'Non Tenured'),
(7, 'Michael Gelfond', 'Spring 2000', 'Professor', 'Tenured'),
(9, 'Rettikorn Hewett', 'Spring 2000', 'Professor', 'Tenured'),
(10, 'Sunho Lim', 'Spring 2011', 'Professor', 'Non Tenured'),
(11, 'Noe Lopez Benitez', 'Spring 2005', 'Professor', 'Tenured'),
(12, 'Susan Mengel', 'Fall 2005', 'Professor', 'Tenured'),
(13, 'Mahshid Naeina', 'Spring 2014', 'Professor', 'Non Tenured'),
(14, 'Nelson Rushton', 'Spring 2011', 'Professor', 'Tenured'),
(15, 'Yuanlin Zhang', 'Spring 2002', 'Professor', 'Tenured'),
(16, 'Akbar Namin', 'Fall 2010', 'Professor', 'Non Tenured');

-- --------------------------------------------------------

--
-- Table structure for table `Instructor_preference`
--

CREATE TABLE IF NOT EXISTS `Instructor_preference` (
`preference_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `loads` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructor_preference`
--

INSERT INTO `Instructor_preference` (`preference_id`, `instructor_id`, `course_id`, `year`, `loads`) VALUES
(1, 0, 0, 0, ''),
(2, 9, 89, 2015, 'Spring'),
(3, 6, 14111, 2015, 'Fall'),
(4, 6, 1412, 2014, 'Fall');

-- --------------------------------------------------------

--
-- Table structure for table `Sections`
--

CREATE TABLE IF NOT EXISTS `Sections` (
`id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `time` text,
  `enrolled` int(11) DEFAULT NULL,
  `max_enrolled` int(11) DEFAULT NULL,
  `room_no` text
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sections`
--

INSERT INTO `Sections` (`id`, `course_id`, `section_id`, `time`, `enrolled`, `max_enrolled`, `room_no`) VALUES
(2, 14122, 2, '11:00 AM', 22, 32, 'CS 201'),
(3, 14121, 1, '11:00 AM', 22, 32, 'CS 201'),
(4, 14111, 1, '11:00 AM', 22, 32, 'CS 201'),
(5, 14112, 2, '9:00 AM', 22, 32, 'CS 201'),
(6, 43311, 1, '3:00 AM', 22, 32, 'CS 201'),
(7, 43321, 1, '3:00 AM', 22, 32, 'CS 201'),
(8, 43312, 1, '3:00 AM', 22, 32, 'CS 201'),
(9, 43313, 1, '3:00 AM', 22, 32, 'CS 201'),
(10, 43314, 1, '3:00 AM', 22, 32, 'CS 201'),
(11, 43315, 1, '3:00 AM', 22, 32, 'CS 201');

-- --------------------------------------------------------

--
-- Table structure for table `Special_Request`
--

CREATE TABLE IF NOT EXISTS `Special_Request` (
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `arguments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Special_Request`
--

INSERT INTO `Special_Request` (`instructor_id`, `course_id`, `title`, `arguments`) VALUES
(89, 89, 'hi', ''),
(2342, 899, 'jdsfklj', 'EJLJRLKWEHRKJSNFKLSD');

-- --------------------------------------------------------

--
-- Table structure for table `TAs`
--

CREATE TABLE IF NOT EXISTS `TAs` (
`ta_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hours` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TAs`
--

INSERT INTO `TAs` (`ta_id`, `name`, `hours`) VALUES
(2, 'nick', 20),
(4, 'Sam Rain', 40),
(5, 'Mr Lu', 40),
(6, 'Xei Xei', 40),
(7, 'Nick', 40),
(8, 'Tom Brady', 40),
(9, 'ToM Brady', 40);

-- --------------------------------------------------------

--
-- Table structure for table `TA_Assigned_to`
--

CREATE TABLE IF NOT EXISTS `TA_Assigned_to` (
`id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `ta_id` int(11) DEFAULT NULL,
  `semester` text
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TA_Assigned_to`
--

INSERT INTO `TA_Assigned_to` (`id`, `section_id`, `ta_id`, `semester`) VALUES
(1, 8, 0, NULL),
(2, 1, 0, NULL),
(3, 2, 0, NULL),
(4, 3, 0, NULL),
(5, 4, 5, NULL),
(6, 1, 2, NULL),
(7, 2, 3, NULL),
(8, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Textbook`
--

CREATE TABLE IF NOT EXISTS `Textbook` (
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `author` text NOT NULL,
  `edition` text NOT NULL,
  `isbn` text NOT NULL,
  `publisher` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Textbook`
--

INSERT INTO `Textbook` (`instructor_id`, `course_id`, `book_title`, `author`, `edition`, `isbn`, `publisher`) VALUES
(0, 0, '', '', '', '', ''),
(4545, 4545, '34535', '234234', '123123', '3423423', '45345345'),
(0, 0, '', '', '', '', ''),
(6, 3, 'Book 1', 'Brad Nick', '2010', '001100110011', 'NT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assigned_to`
--
ALTER TABLE `Assigned_to`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
 ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `Course_Sections`
--
ALTER TABLE `Course_Sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
 ADD PRIMARY KEY (`instructor_id`), ADD KEY `id` (`instructor_id`);

--
-- Indexes for table `Instructor_preference`
--
ALTER TABLE `Instructor_preference`
 ADD PRIMARY KEY (`preference_id`);

--
-- Indexes for table `Sections`
--
ALTER TABLE `Sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TAs`
--
ALTER TABLE `TAs`
 ADD PRIMARY KEY (`ta_id`);

--
-- Indexes for table `TA_Assigned_to`
--
ALTER TABLE `TA_Assigned_to`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assigned_to`
--
ALTER TABLE `Assigned_to`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43317;
--
-- AUTO_INCREMENT for table `Course_Sections`
--
ALTER TABLE `Course_Sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Instructor_preference`
--
ALTER TABLE `Instructor_preference`
MODIFY `preference_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Sections`
--
ALTER TABLE `Sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `TAs`
--
ALTER TABLE `TAs`
MODIFY `ta_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `TA_Assigned_to`
--
ALTER TABLE `TA_Assigned_to`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
