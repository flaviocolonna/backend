-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2014 at 04:23 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `simple_bookmarks`
--

CREATE TABLE IF NOT EXISTS `simple_bookmarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(260) NOT NULL,
  `creatorUserId` int(11) DEFAULT NULL,
  `visibilityId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `bookmark_creator_fk_constraint` (`creatorUserId`),
  KEY `bookmark_visibility_fk_constraint` (`visibilityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `simple_bookmarks`
--

INSERT INTO `simple_bookmarks` (`id`, `name`, `url`, `creatorUserId`, `visibilityId`) VALUES
(1, 'Google', 'http://www.google.com', NULL, 1),
(2, 'Bing', 'http://www.bing.com', NULL, 1),
(4, 'Google', 'http://www.google.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `simple_users`
--

CREATE TABLE IF NOT EXISTS `simple_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(60) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `visibility`
--

CREATE TABLE IF NOT EXISTS `visibility` (
  `visibilityId` int(11) NOT NULL AUTO_INCREMENT,
  `visibility` varchar(20) NOT NULL,
  PRIMARY KEY (`visibilityId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `visibility`
--

INSERT INTO `visibility` (`visibilityId`, `visibility`) VALUES
(1, 'PRIVATE'),
(2, 'FRIENDS'),
(3, 'PUBLIC');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `simple_bookmarks`
--
ALTER TABLE `simple_bookmarks`
  ADD CONSTRAINT `bookmark_visibility_fk_constraint` FOREIGN KEY (`visibilityId`) REFERENCES `visibility` (`visibilityId`) ON DELETE NO ACTION,
  ADD CONSTRAINT `bookmark_creator_fk_constraint` FOREIGN KEY (`creatorUserId`) REFERENCES `simple_users` (`userId`) ON DELETE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
