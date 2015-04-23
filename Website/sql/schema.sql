-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2015 at 01:23 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ttu`
--

-- --------------------------------------------------------

--
-- Table structure for table `Instructors`
--

CREATE TABLE `Instructors` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `join_date` text NOT NULL,
  `type` text NOT NULL,
  `tenure` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Instructors`
--

INSERT INTO `Instructors` (`id`, `name`, `join_date`, `type`, `tenure`) VALUES
  (1, 'name', 'date', 'type', 'tt'),
  (2, 'name', 'date', 'type', 'tt'),
  (3, 'name', 'value', 'Professor', 'Not Applicable'),
  (4, 'Professor Name', 'today', 'FTI', 'Tenured');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Instructors`
--
ALTER TABLE `Instructors`
ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Instructors`
--
ALTER TABLE `Instructors`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;