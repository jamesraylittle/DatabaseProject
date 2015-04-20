-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2015 at 07:45 AM
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

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`code`, `name`, `description`, `required`) VALUES
(1411, 'Programming Principles I', 'Prerequisite: Department approval. Procedural programming. Discipline of computer science; analysis, design, implementation, debugging, and testing of software. Introduction to field for majors.', 1),
(1412, 'Programming Principles II', 'Prerequisite: CS 1411 or ECE 1304. Advanced procedural programming. Topics include recursive functions, parameter passing, structures, records, memory allocation, exception handling, and abstract data types. Fulfills Core Technology and Applied Science requirement.', 1),
(2350, 'Computer Organization and Assembly Language Programming', 'Prerequisites: CS 1412, ECE 2372. Introduction to the organization of single-processor computer systems via Assembly Language. Topics addressed include basic concepts of computer architecture and organization, assembly programming, interfacing assembly with High Level Languages, sub-procedures and macros, I/O devices, interrupts, and multitasking issues.', 1),
(2365, 'Object-Oriented Programming', 'Introduction to object-oriented programming. Topics include object-oriented design and analysis, classes, inheritance, polymorph data abstraction, and user interface design principles.', 1),
(2413, 'Data Structures', 'Prerequisite: CS 1412. Comparative study of the interaction of data and procedural abstractions. Data structures, lists, stacks, queues, trees, graphs. Algorithms: searching, sorting, parsing, hashing, graph traversals.', 1),
(3361, 'Concepts of Programming Languages', 'Prerequisite: CS 2413. Study of programming language design. The investigation and comparison of different programming language paradigms.', 1),
(3364, 'Design and Analysis of Algorithms ', 'Prerequisites: CS 2413, 1382 and MATH 2360. A theoretical course focusing on the design and analysis of computer algorithms.', 1),
(3365, 'Software Engineering I', 'Prerequisite: CS 2365 or 2413, MATH 3342, or equivalent. Introduces theory and practice for software engineering. Topics include software life cycle, requirements, specification and analysis, software architecture and detailed design, and testing. (Writing Intensive)', 1),
(3375, 'Computer Architecture', 'Prerequisite: CS 2350 or ECE 3362. Introduction to the functional components of computer systems; their hardware implementation and management at different levels; their interaction, characteristics, and performance as well as their practical implications for computer programming.', 1),
(3383, 'Theory of Automata', 'Prerequisite: CS 1382. The relationship between language, grammars, and automata. Deterministic and nondeterministic machines. Pushdown automata and Turing machines. Limits of computability.', 1),
(4352, 'Operating System', 'Prerequisites: CS 3364 and 3375. Concepts and design of different components of operating systems. Topics addressed include process management, scheduling and resource management, file systems, I/O, and security issues.\r\n', 1),
(4354, 'Concepts of Database Systems', 'Prerequisite: CS 3364. Overview of a database system and its components; physical organization of data; data models; relational databases; and query processing.', 1),
(4365, 'Software Engineering II', 'Prerequisite: CS 3365. Advanced theory and practice for software engineering. Topics include project management, configuration management, process improvement, software security, software reuse, and quality management.', 1),
(4366, 'Senior Capstone Project', 'Prerequisite: CS 4365. Project-oriented overview of software engineering concepts emphasizing teamwork and communication skills. Projects are formulated, formally proposed, designed, implemented, tested, documented, and demonstrated. (Writing Intensive)', 1),
(4379, 'Parallel and Concurrent Programming', 'Prerequisites: CS 3364 and 3375. Introduction to multi-threaded programming, data parallelisms, and message passing techniques. Topics include concurrent and parallel execution environments, user-programmed parallelism, and compiler-based parallelism. Applications addressed involve numerical algorithms familiar to senior-level students.', 0),
(4391, 'Special Topics in A I', 'Prerequisite: Senior standing. In-depth treatment of one or more topics in artificial intelligence. Such topics include robotics, knowledge representation, or automated reasoning.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Course_Sections`
--

CREATE TABLE IF NOT EXISTS `Course_Sections` (
  `code` int(5) NOT NULL,
  `crn` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course_Sections`
--

INSERT INTO `Course_Sections` (`code`, `crn`) VALUES
(1411, 14111),
(1411, 14112),
(1411, 14113),
(1412, 114121),
(1411, 14112),
(1412, 14121);

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
(56999, 'me', 'spring 2015', 'FTI', 'Not Applicable'),
(45, '5', '4', 'Professor', 'Not Applicable'),
(56, '4565', 'fgf', 'Professor', 'Not Applicable'),
(56, '4565', 'fgf', 'Professor', 'Not Applicable'),
(56, '4565', 'fgf', 'Professor', 'Not Applicable'),
(56, '4565', 'fgf', 'Professor', 'Not Applicable'),
(56, 'wow', 'wow', 'FTI', 'Tenured'),
(78956, 'susma basel', 'spring 2015', 'Professor', 'Tenured');

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

--
-- Dumping data for table `Sections`
--

INSERT INTO `Sections` (`crn`, `type`, `time`, `enrolled`, `max_enrolled`, `section_number`) VALUES
(14111, 'Programming Principles I', '9:00 AM', 25, 30, '12312'),
(14112, 'Programming Principles I', '11:00 AM', 30, 32, '12313'),
(14113, 'Programming Principles I', '2:00 PM', 13, 25, '12315'),
(14121, 'Programming Principles II', '11:00 AM', 22, 25, '114119'),
(14122, 'Programming Principles II', '2:00 PM', 22, 30, '14128');

-- --------------------------------------------------------

--
-- Table structure for table `TAs`
--

CREATE TABLE IF NOT EXISTS `TAs` (
  `id` int(5) NOT NULL,
  `name` text NOT NULL,
  `hours` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TAs`
--

INSERT INTO `TAs` (`id`, `name`, `hours`) VALUES
(5434, 'Hwang Lee', 20);

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
