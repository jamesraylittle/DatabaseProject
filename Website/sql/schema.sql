-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 06, 2015 at 04:52 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ttu2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assigned_to`
--

CREATE TABLE `Assigned_to` (
  `id` int(11) NOT NULL,
  `course_section_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Assigned_to`
--

INSERT INTO `Assigned_to` (`id`, `course_section_id`, `instructor_id`) VALUES
  (35, 34, 7),
  (36, 35, 6),
  (37, 36, 15),
  (38, 37, 6),
  (39, 38, 12),
  (40, 39, 7),
  (41, 40, 14),
  (42, 41, 6),
  (43, 42, 6),
  (44, 43, 14);

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `description` text,
  `crn` int(11) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `special` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43325 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`id`, `subject`, `level`, `description`, `crn`, `required`, `special`) VALUES
  (14111, 'CS', 1411, 'Programmin Principles I', 14111, 1, 0),
  (14121, 'CS', 1412, 'Programmin Principles II', 14121, 1, 0),
  (43311, 'CS', 3368, 'Artificial Intelligence.', 43311, 0, 1),
  (43312, 'CS', 5379, 'Parallel processing', 43312, 1, 0),
  (43313, 'CS', 4397, 'Game design', 43313, 0, 1),
  (43314, 'CS', 4331, 'Special Topics', 43314, 0, 0),
  (43315, 'CS', 4000, 'Cyber Security', 43315, 0, 1),
  (43316, 'CS', 5433, 'Unity game development', 43316, 0, 1),
  (43322, 'CS', 5448, 'Some CS Course', 12324, 0, 1),
  (43323, 'ECE', 2401, 'Some ECE Class', 23413, 0, 0),
  (43324, 'ENGR', 3000, 'co-op', 34643, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Course_Sections`
--

CREATE TABLE `Course_Sections` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course_Sections`
--

INSERT INTO `Course_Sections` (`id`, `course_id`, `section_id`) VALUES
  (35, 14111, 16),
  (39, 14111, 20),
  (40, 14111, 21),
  (41, 14111, 22),
  (34, 43311, 15),
  (38, 43312, 19),
  (42, 43312, 23),
  (36, 43315, 17),
  (37, 43322, 18),
  (43, 43324, 24);

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE `Instructors` (
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

CREATE TABLE `Instructor_preference` (
  `preference_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `loads` text
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructor_preference`
--

INSERT INTO `Instructor_preference` (`preference_id`, `instructor_id`, `course_id`, `year`, `loads`) VALUES
  (2, 9, 14111, 2015, 'Spring'),
  (3, 6, 43311, 2015, 'Fall'),
  (4, 16, 43322, 2014, 'Fall'),
  (5, 6, 43322, 2015, 'equal');

-- --------------------------------------------------------

--
-- Table structure for table `Sections`
--

CREATE TABLE `Sections` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `number` text NOT NULL,
  `time` text,
  `enrolled` int(11) DEFAULT NULL,
  `max_enrolled` int(11) DEFAULT NULL,
  `room_no` text
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sections`
--

INSERT INTO `Sections` (`id`, `semester_id`, `number`, `time`, `enrolled`, `max_enrolled`, `room_no`) VALUES
  (15, 1, '001', '9:00 AM', 15, 25, '001'),
  (16, 1, 'D01', '10:00AM', 124, 200, 'CS 205'),
  (17, 12, '001', '9:00AM', 16, 20, 'CS 205'),
  (18, 13, 'D01', '11:00AM', 12, 24, 'EC201'),
  (19, 14, 'D01', '12:30PM', 26, 30, 'EC205'),
  (20, 1, '002', '9:00AM', 22, 24, 'EC201'),
  (21, 2, '003', '1:23AM', 2, 40, 'EC300'),
  (22, 3, '004', '1:00PM', 12, 20, 'EC205'),
  (23, 15, 'D03', '9:00AM', 5, 15, 'AG101'),
  (24, 15, '001', '2:34pm', 2, 90, 'MATH302');

-- --------------------------------------------------------

--
-- Table structure for table `Semesters`
--

CREATE TABLE `Semesters` (
  `id` int(11) NOT NULL,
  `season` varchar(255) NOT NULL,
  `year` int(11) NOT NULL DEFAULT '2015'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Semesters`
--

INSERT INTO `Semesters` (`id`, `season`, `year`) VALUES
  (1, 'Fall', 2015),
  (2, 'Spring', 2013),
  (3, 'Spring', 2014),
  (11, 'Spring', 2015),
  (12, 'Summer I', 2015),
  (13, 'Summer I', 2009),
  (14, 'Spring', 2005),
  (15, 'Summer II', 2012);

-- --------------------------------------------------------

--
-- Table structure for table `Special_Request`
--

CREATE TABLE `Special_Request` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `arguments` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Special_Request`
--

INSERT INTO `Special_Request` (`id`, `instructor_id`, `course_id`, `title`, `arguments`) VALUES
  (3, 6, 14111, 'New Request', 'Here are my arguments');

-- --------------------------------------------------------

--
-- Table structure for table `TAs`
--

CREATE TABLE `TAs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `hours` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TAs`
--

INSERT INTO `TAs` (`id`, `name`, `hours`) VALUES
  (2, 'nick', 20),
  (4, 'Sam Rain', 40),
  (5, 'Mr Lu', 40),
  (6, 'Xei Xei', 40),
  (7, 'Nick', 40),
  (8, 'Tom Brady', 40),
  (9, 'ToM Brady', 40),
  (11, 'James', 25);

-- --------------------------------------------------------

--
-- Table structure for table `TA_Assigned_to`
--

CREATE TABLE `TA_Assigned_to` (
  `id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `ta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TA_Assigned_to`
--

INSERT INTO `TA_Assigned_to` (`id`, `section_id`, `ta_id`) VALUES
  (1, 8, 0),
  (2, 1, 0),
  (3, 2, 0),
  (4, 3, 0),
  (5, 4, 5),
  (6, 1, 2),
  (7, 2, 3),
  (8, 1, 4),
  (9, 16, 11);

-- --------------------------------------------------------

--
-- Table structure for table `Textbook`
--

CREATE TABLE `Textbook` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `book_title` text NOT NULL,
  `author` text NOT NULL,
  `edition` text NOT NULL,
  `isbn` text NOT NULL,
  `publisher` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Textbook`
--

INSERT INTO `Textbook` (`id`, `instructor_id`, `course_id`, `book_title`, `author`, `edition`, `isbn`, `publisher`) VALUES
  (5, 6, 14111, 'How To Read', 'James Little', '1', '23409238E94', 'MoneyHolder'),
  (6, 7, 14121, 'What is a Computer?', 'Dr. Puter', '6', '823923EEF344', 'MoneyBags'),
  (7, 6, 43312, 'Horton Hears a CPU', 'Me', '3', '23423SS52', 'Give Us Money'),
  (8, 6, 43312, 'Process Me, Process Me Real Good', 'Dirty Hairy', '90', '234230340EEG123', 'Fake Books for Money');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assigned_to`
--
ALTER TABLE `Assigned_to`
ADD PRIMARY KEY (`id`), ADD KEY `section_id` (`course_section_id`,`instructor_id`);

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `course_id` (`id`), ADD UNIQUE KEY `course_id_2` (`id`);

--
-- Indexes for table `Course_Sections`
--
ALTER TABLE `Course_Sections`
ADD PRIMARY KEY (`id`), ADD KEY `course_id` (`course_id`,`section_id`);

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
ADD PRIMARY KEY (`instructor_id`), ADD UNIQUE KEY `instructor_id` (`instructor_id`), ADD KEY `id` (`instructor_id`);

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
-- Indexes for table `Semesters`
--
ALTER TABLE `Semesters`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Special_Request`
--
ALTER TABLE `Special_Request`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TAs`
--
ALTER TABLE `TAs`
ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `TA_Assigned_to`
--
ALTER TABLE `TA_Assigned_to`
ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Textbook`
--
ALTER TABLE `Textbook`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assigned_to`
--
ALTER TABLE `Assigned_to`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43325;
--
-- AUTO_INCREMENT for table `Course_Sections`
--
ALTER TABLE `Course_Sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `Instructor_preference`
--
ALTER TABLE `Instructor_preference`
MODIFY `preference_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Sections`
--
ALTER TABLE `Sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `Semesters`
--
ALTER TABLE `Semesters`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `Special_Request`
--
ALTER TABLE `Special_Request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `TAs`
--
ALTER TABLE `TAs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `TA_Assigned_to`
--
ALTER TABLE `TA_Assigned_to`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Textbook`
--
ALTER TABLE `Textbook`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;