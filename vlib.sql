-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 05:55 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vlib`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `counter` ()  BEGIN
SELECT gid,COUNT((gid)) AS owners FROM OWNS GROUP by gid ORDER BY owners DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `devid` varchar(20) NOT NULL,
  `devpass` varchar(20) NOT NULL,
  `devname` varchar(20) NOT NULL,
  `devaddr` varchar(20) NOT NULL,
  `support` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`devid`, `devpass`, `devname`, `devaddr`, `support`) VALUES
('601', 'blizz', 'Blizzard', 'california', 123123123),
('602', 'pugb', 'BlueHole', 'Seoul', 414141414),
('603', 'server', 'Ubisoft', 'Rennes', 6068586),
('604', 'time', 'Valve', 'Bellevue', 987654321),
('605', 'dark', 'Bandai Namco', 'tokyo', 5893624),
('606', 'arma', 'Bohemia', 'usa', 78956123),
('607', 'cyber', 'CDPR', 'poland', 401234567);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dev` varchar(20) NOT NULL,
  `released` date NOT NULL,
  `client` varchar(20) NOT NULL,
  `players` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gid`, `title`, `dev`, `released`, `client`, `players`) VALUES
(55001, 'Player Unknown\'s Battle Grounds', 'BlueHole', '2017-03-27', 'Steam', 2403784),
(55002, 'Dota2', 'Valve', '2017-07-09', 'Steam', 655000),
(55003, 'Tekken 7', 'Bandai Namco', '2017-06-02', 'Steam', 30000),
(55004, 'South Park: The Fractured but Whle', 'Ubisoft', '2017-10-17', 'Steam', 100000),
(55005, 'Team Fortress 2', 'Valve', '2009-03-05', 'Steam', 65000),
(55006, 'Overwatch', 'Blizzard', '2016-04-15', 'Battle.net', 19000000),
(55014, 'Counter Strike Global Offensive', 'Valve', '2012-08-21', 'Steam', 0),
(55015, 'Dayz', 'Bohemia', '2013-12-17', 'Steam', 0),
(66002, 'Need For Speed', 'EA', '2016-04-18', 'Origin', 500),
(66007, 'Battlefield 1', 'EA', '2015-11-08', 'Origin', 16000),
(77001, 'Starcraft2', 'Blizzard', '2011-07-07', 'Battle.net', 0),
(88001, 'Witcher 3:Wild Hunt', 'CDPR', '2015-05-19', 'GOG', 0);

--
-- Triggers `game`
--
DELIMITER $$
CREATE TRIGGER `backup` AFTER DELETE ON `game` FOR EACH ROW BEGIN
INSERT INTO ghistory(gid,title,released,client)
SELECT old.gid,old.title,old.released,old.client
FROM game;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ghistory`
--

CREATE TABLE `ghistory` (
  `gid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `released` date NOT NULL,
  `client` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ghistory`
--

INSERT INTO `ghistory` (`gid`, `title`, `released`, `client`) VALUES
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam'),
(55055, 'arma', '2011-11-11', 'Steam');

-- --------------------------------------------------------

--
-- Table structure for table `imager`
--

CREATE TABLE `imager` (
  `gid` int(10) NOT NULL,
  `path` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imager`
--

INSERT INTO `imager` (`gid`, `path`) VALUES
(55001, '/vlib/img/PUBG.jpg'),
(55002, '/vlib/img/dota2.jpeg'),
(55003, '/vlib/img/tekken7.png'),
(55004, '/vlib/img/sp.png'),
(55005, '/vlib/img/tf2.jpg'),
(55006, '/vlib/img/ow.jpg'),
(55014, '/vlib/img/csgo.png'),
(55015, '/vlib/img/dayz.jpg'),
(66002, '/vlib/img/nfs.jpg'),
(66007, '/vlib/img/bf1.png'),
(77001, '/vlib/img/sc22.jpg'),
(88001, '/vlib/img/w3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `uid` varchar(25) NOT NULL,
  `gid` int(10) NOT NULL,
  `client` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `owns`
--

INSERT INTO `owns` (`uid`, `gid`, `client`) VALUES
('andy', 66007, 'Origin'),
('andy', 88001, 'GOG'),
('idk', 66002, 'Origin'),
('neo', 66007, 'Origin'),
('neo', 88001, 'GOG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `pass`) VALUES
('andy', 'andy@andy.com', 'aabbccdd'),
('idk', 'idk@gmail.com', 'idk'),
('neo', 'neo@gmail.com', 'neo1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`devid`),
  ADD KEY `devname` (`devname`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `dev` (`dev`),
  ADD KEY `client` (`client`);

--
-- Indexes for table `imager`
--
ALTER TABLE `imager`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `gid` (`gid`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`uid`,`gid`,`client`),
  ADD KEY `gid` (`gid`),
  ADD KEY `client` (`client`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imager`
--
ALTER TABLE `imager`
  ADD CONSTRAINT `imager_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `game` (`gid`) ON DELETE CASCADE;

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`gid`) REFERENCES `game` (`gid`) ON DELETE CASCADE,
  ADD CONSTRAINT `owns_ibfk_3` FOREIGN KEY (`client`) REFERENCES `game` (`client`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
