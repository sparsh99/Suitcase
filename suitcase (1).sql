-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2015 at 02:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suitcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`Category_id` int(4) NOT NULL,
  `Category_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_id`, `Category_name`) VALUES
(8, 'UPSC'),
(9, 'Maths'),
(10, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`file_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `filename` varchar(25) NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `post_id`, `filename`, `type`) VALUES
(49, 53, 'SYLLABUS.pdf', 'pdf'),
(50, 54, '', ''),
(51, 55, '', ''),
(52, 56, '', ''),
(53, 57, '', ''),
(54, 58, '', ''),
(55, 59, 'apache_pb.gif', 'gif');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subcategory_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `linkname` varchar(30) NOT NULL,
  `link` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `time`, `subcategory_id`, `title`, `linkname`, `link`, `description`) VALUES
(53, '2015-01-11 22:30:46', 8, 'Economics', 'www.insights.com', 'Insights', ''),
(54, '2015-01-14 16:36:32', 8, 'car', 'www.google.com', 'Google', ''),
(55, '2015-01-14 16:37:35', 8, 'car', 'google', 'www.google.com', ''),
(56, '2015-01-14 16:38:11', 8, 'car', 'http://www.google.com', 'http://www.google.com', ''),
(57, '2015-01-14 16:38:54', 8, 'Google', 'https://www.google,com', 'https://www.google,com', ''),
(58, '2015-01-14 16:39:27', 8, '', 'http://www.facebook.com', 'http://www.facebook.com', ''),
(59, '2015-01-14 17:43:17', 8, '', 'search engine', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
`subcategory_id` int(4) NOT NULL,
  `category_id` int(4) NOT NULL,
  `subcategory_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(8, 8, 'GS1'),
(9, 8, 'GS2'),
(10, 8, 'GS3'),
(11, 8, 'Optional: Maths'),
(12, 8, ''),
(13, 8, 'GS1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `size_used` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`, `size_used`) VALUES
('sparshsaurabh', 'sparsh95', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
 ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `Category_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
MODIFY `subcategory_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
