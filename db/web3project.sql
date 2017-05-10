-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 10, 2017 at 11:30 AM
-- Server version: 10.0.20-MariaDB
-- PHP Version: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web3project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bib`
--

CREATE TABLE IF NOT EXISTS `bib` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userId` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `textSummary` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bib`
--

INSERT INTO `bib` (`id`, `name`, `userId`, `status`, `textSummary`) VALUES
(1, 'Interactive web design', 5, 'public', 'List of resources on designing web pages using HTML, PHP, MySQL and JavaScript'),
(2, 'AJAX technologies, studies and possible uses', 4, 'pending', 'List of resources examining AJAX technologies, the benefits and issues involved, and possible future uses');

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE IF NOT EXISTS `ref` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `placeOfPub` varchar(255) NOT NULL,
  `pages` varchar(255) DEFAULT NULL,
  `textSummary` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `userId`, `authors`, `title`, `year`, `publisher`, `placeOfPub`, `pages`, `textSummary`, `status`, `created`, `lastUpdated`) VALUES
(1, 2, 'Nixon, R.', 'Learning PHP, MySQL & JavaScript: with jQuery, CSS & HTML5', 2015, 'O''Reilly Media Inc', 'California', '', 'Book introducing the basics of designing and developing dynamic web pages', 'public', '2017-03-03', '2017-03-17'),
(2, 3, 'Sayar, A., Aydin, G., Pierce, M., Fox, G.', 'Integrating AJAX approach into GIS visualization web services.', 2006, 'IEEE', 'Telecommunications, 2006. AICT-ICIW''06. International Conference on Internet and Web Applications and Services/Advanced International Conference on', 'pp 169-169', 'Paper on using AJAX to create Geographic Information Systems based web services such as Google maps.', 'pending', '2017-03-17', '2017-03-17'),
(3, 3, 'Zepeda, J.S., Chapa, S.V.', 'From desktop applications towards AJAX web applications.', 2007, 'IEEE', 'In Electrical and Electronics Engineering, 2007, ICEEE 2007 4th International Conference on', 'pp 193-196', 'Paper on the move from desktop based applications to web based applications for business applications.', 'pending', '2017-03-17', '2017-03-17'),
(4, 4, 'Coyle, K.', 'FRBR, Before and After: A Look at Our Bibliographic Models.', 2015, 'American Library Association', 'U.S.A.', '', 'Book on the Functional Requirements for\r\nBibliographic Records concept, how it works and how it can be used to create cataloging systems.', 'public', '2017-03-08', '2017-03-15'),
(5, 5, 'Robbins, J.N.', 'Learning web design: a beginner''s guide to HTML, CSS, JavaScript and web graphics, Fourth Edition.', 2012, 'O''Reilly Media, Inc', 'California', '', 'Book on designing webpages suitable for a beginner.  Uses HTML5, CSS3 and JavaScript in exercises that can be followed along to create a demonstration project.', 'public', '2017-03-06', '2017-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `score` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `status`, `score`) VALUES
(1, 'PHP', 'public', 55),
(2, 'Ajax', 'public', 63),
(3, 'catalogue', 'pending', 18),
(4, 'MySQL', 'public', 74),
(5, 'web development', 'public', 82),
(6, 'java', 'pending', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json_array)'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstName`, `lastName`, `roles`) VALUES
(7, 'fred', '$2y$13$2i4k985ezUDB6r4K0vcWvOkzI7Ce0vJ57Y2mYZucsqy8KM3jgzA1G', 'Fred', 'Smith', '["ROLE_ADMIN"]'),
(8, 'janeDoe', '$2y$13$Mesy3JE5TSvlEF6S/EaOVeioH4BOXCkk5u9uej7xvMsLr/TlL1aK.', 'Jane', 'Doe', '["ROLE_USER","ROLE_STUDENT"]'),
(9, 'tiff', '$2y$13$Ld.uAHK0Ym2Ex1vAKwocmOhK8LHfqURio441YCXlqpkK8zEWJzS16', 'Tiffany', 'Aching', '["ROLE_USER","ROLE_STUDENT"]'),
(10, 'dentArthurDent', '$2y$13$fuUlmdG6eueouQ.8yn8LDu3I9M0BuC/J9VnkURmTtzUDIASGcTUOC', 'Arthur', 'Dent', '["ROLE_USER","ROLE_LECTURER"]'),
(11, 'dgently', '$2y$13$oMS6fPHNLnQQK9ez3ncTwObJrBLNc/z4qITdb38S/GrJ8spT1u7xm', 'Dirk', 'Gently', '["ROLE_USER","ROLE_LECTURER"]'),
(12, 'sherlock', '$2y$13$/jKLA.nn2d6PYYnNFW1oSe/Dk4iPkQsrUvggxiS1AxLYINlrLwgA.', 'Sherlock', 'Holmes', '["ROLE_USER","ROLE_STUDENT"]'),
(13, 'sam', '$2y$13$Lt1WSvpoeF4gzRblo9Hg/uxOt215RMRFp1epxZ/m6GQnnS1Nf0mIG', 'Samantha', 'Blackcrow', '["ROLE_USER","ROLE_LECTURER"]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bib`
--
ALTER TABLE `bib`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bib`
--
ALTER TABLE `bib`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
