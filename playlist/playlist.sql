-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 10:21 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playlist`
--
CREATE DATABASE IF NOT EXISTS `playlist` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `playlist`;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(5) NOT NULL,
  `category` int(5) NOT NULL,
  `username` varchar(250) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `videoLink` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `category`, `username`, `title`, `description`, `videoLink`) VALUES
(51, 3, 'moshe', 'The dreamer song', 'this is such a nice song ', 'https://www.youtube.com/watch?v=SuGro7TWR_s'),
(53, 7, 'moshe', 'i wish i knew how to invest', 'be carefull of capital market', 'https://www.youtube.com/watch?v=ujLFsZfa_MY'),
(54, 5, 'moshe', 'action movie', 'nice action movie', 'https://www.youtube.com/watch?v=NzWZd0oPU9c'),
(55, 1, 'moshe', 'javascript', 'great lesson in javascript', 'https://www.youtube.com/watch?v=BWaSLaNVry4'),
(56, 9, 'moshe', 'nice trance', 'such a nice trance', 'https://www.youtube.com/watch?v=3vvt6Yl5rPU'),
(57, 8, 'moshe', 'php', 'great lesson in php', 'https://www.youtube.com/watch?v=gdEpUPMh63s'),
(58, 4, 'moshe', 'Just Perfect', 'Just perfect short 4k movie', 'https://www.youtube.com/watch?v=2MpUj-Aua48'),
(59, 4, 'avi', 'my first movie', 'intresting movie', 'https://www.youtube.com/watch?v=pQZmX5SnIDc'),
(60, 7, 'avi', 'the ca[otal market', 'capital marketlesson', 'https://www.youtube.com/watch?v=XKjYgVyGFcw'),
(61, 2, 'avi', 'HD short movie', 'nice HD movie', 'https://www.youtube.com/watch?v=OsJSwGc4lsA'),
(62, 11, 'avi', 'uplifting trance chillout', 'nice uplifting trance chillout', 'https://www.youtube.com/watch?v=u-camtz821s'),
(63, 10, 'avi', 'eCommerce lesson', 'The best wau to earnmoney', 'https://www.youtube.com/watch?v=aG6UR8dbYPs'),
(64, 6, 'avi', 'relax music', 'relax music for sleeping', 'https://www.youtube.com/watch?v=6xDyPcJrl0c'),
(65, 9, 'cristina', 'great travel story', 'nice video traveling around the world..', 'https://www.youtube.com/watch?v=RcmrbNRK-jY'),
(66, 12, 'cristina', 'small business ideas', 'what not to do when opening a smal bussiness', 'https://www.youtube.com/watch?v=9dN2wZ-KorM'),
(67, 1, 'cristina', 'wordpress secret', 'how to create nice wordpress site', 'https://www.youtube.com/watch?v=2cbvZf1jIJM'),
(68, 4, 'cristina', ' Mortal Engines - Official Trailer (HD)', 'Mortal Engines', 'https://www.youtube.com/watch?v=IRsFc2gguEg'),
(69, 5, 'natali1', 'action movie', 'nice action movie', 'https://www.youtube.com/watch?v=NzWZd0oPU9c&t=1s'),
(70, 1, 'natali1', 'great ideas', 'how great ideas inspire action', 'https://www.youtube.com/watch?v=qp0HIF3SfI4'),
(71, 3, 'jj12', 'great song', 'grear song for the morning, or actually cgreat for the evning tooo', 'https://www.youtube.com/watch?v=HDDfpfkIqMo'),
(72, 3, 'jj12', 'memories song', 'memories memories..', 'https://www.youtube.com/watch?v=OOevVQwQ-LM'),
(73, 8, 'israel', 'learn python', 'how to code -- python\r\nfull course  for beginners', 'https://www.youtube.com/watch?v=rfscVS0vtbw'),
(74, 1, 'israel', 'math studies', 'great math lessone', 'https://www.youtube.com/watch?v=mpISzAvjWdw'),
(75, 11, 'dani1', 'uplift set', 'such a anice trance', 'https://www.youtube.com/watch?v=u-camtz821s&t=2603s'),
(76, 10, 'dani1', 'eeCommerce sales', 'wanna be a milioner', 'https://www.youtube.com/watch?v=_8I8B5eT294'),
(77, 7, 'patri123', 'gbp - usd', 'how to trade in the capital market', 'https://www.youtube.com/watch?v=GPOT-1xMhko'),
(78, 11, 'patri123', 'goa trance', 'for more energies', 'https://www.youtube.com/watch?v=dVHiAOQHn9g&t=53s');

-- --------------------------------------------------------

--
-- Table structure for table `moviescategories`
--

CREATE TABLE `moviescategories` (
  `id` int(5) NOT NULL,
  `categoryName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `moviescategories`
--

INSERT INTO `moviescategories` (`id`, `categoryName`) VALUES
(5, 'action'),
(12, 'Business'),
(7, 'capital market'),
(8, 'code'),
(10, 'eCommerce'),
(2, 'fun'),
(4, 'Movies'),
(6, 'relax'),
(3, 'Songs'),
(1, 'Studies'),
(9, 'travels'),
(11, 'Uplifting Trance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `firstName` varchar(200) NOT NULL,
  `lastName` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `password`) VALUES
(22, 'avi', 'levy', 'avi', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(25, 'cristina', 'agilera', 'cristina', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(23, 'dani', 'rabinovitch', 'dani1', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(21, 'israel', 'cohen', 'israel', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(24, 'JJ', 'kalmenson', 'jj12', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(20, 'moshe', 'oz', 'moshe', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(26, 'natali', 'davidson', 'natali1', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(27, 'patricia', 'glun', 'patri123', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `category_2` (`category`),
  ADD KEY `category_3` (`category`),
  ADD KEY `userID` (`username`);

--
-- Indexes for table `moviescategories`
--
ALTER TABLE `moviescategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categoryName` (`categoryName`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `moviescategories`
--
ALTER TABLE `moviescategories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`category`) REFERENCES `moviescategories` (`id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
