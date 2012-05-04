-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2012 at 05:04 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `forest`
--

-- --------------------------------------------------------

--
-- Table structure for table `1`
--

CREATE TABLE IF NOT EXISTS `1` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) NOT NULL,
  `Author` varchar(32) NOT NULL DEFAULT 'Anonymous',
  `Content` varchar(1024) NOT NULL,
  `rNum` int(4) NOT NULL,
  `rTotal` int(4) NOT NULL,
  `pID` int(8) NOT NULL,
  `cNum` int(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `1`
--

INSERT INTO `1` (`ID`, `Title`, `Author`, `Content`, `rNum`, `rTotal`, `pID`, `cNum`) VALUES
(1, 'herro there!', 'Anonymous', 'Herro there!', 5, 3, 0, 2),
(2, 'hello to you, gina!', 'Kyle', 'Hello to you, Gina!', 2, 2, 1, 0),
(3, 'good-bye.', 'Anonymous', 'Good-bye.', 0, 0, 1, 1),
(4, 'daww. Good bye!', 'Anonymous', 'daww. Good bye!', 10, 10, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `1~1`
--

CREATE TABLE IF NOT EXISTS `1~1` (
  `cID` int(8) NOT NULL,
  PRIMARY KEY (`cID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1~1`
--

INSERT INTO `1~1` (`cID`) VALUES
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `1~3`
--

CREATE TABLE IF NOT EXISTS `1~3` (
  `cID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `1~3`
--

INSERT INTO `1~3` (`cID`) VALUES
(4);

-- --------------------------------------------------------

--
-- Table structure for table `46`
--

CREATE TABLE IF NOT EXISTS `46` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) DEFAULT NULL,
  `Author` varchar(32) DEFAULT 'Anonymous',
  `Content` varchar(1024) DEFAULT NULL,
  `rNum` int(4) DEFAULT NULL,
  `rTotal` int(4) DEFAULT NULL,
  `pID` int(8) DEFAULT NULL,
  `cNum` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `46`
--

INSERT INTO `46` (`ID`, `Title`, `Author`, `Content`, `rNum`, `rTotal`, `pID`, `cNum`) VALUES
(1, 'The Matrix', 'Gina', 'Here is how the matrix went. Bang Bang Agent down good triumphs yay!', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forest`
--

CREATE TABLE IF NOT EXISTS `forest` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) NOT NULL,
  `Image` varchar(512) NOT NULL,
  `Updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `forest`
--

INSERT INTO `forest` (`ID`, `Name`, `Image`, `Updated`) VALUES
(1, 'Test Story', 'https://encrypted-tbn3.google.com/images?q=tbn:ANd9GcRu7bOH7kBGtdsyv-L7IqAi2yYDYTi4b35y064G98RYtsw449j6', '0000-00-00 00:00:00'),
(46, 'The Matrix', '', '2012-05-04 02:56:09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
