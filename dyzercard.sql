-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2017 at 03:57 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dyzercard`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `iduser` varchar(50) NOT NULL,
  `passwd` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`iduser`, `passwd`, `role`) VALUES
('m@x.fr', 'd44efa425cdb73444b44b8665ca72435e0aea6893847bf480d8f3de717c796aea0c8a36d1f4b9279008d2f9a12a1766b801a6897f52b52e47343a253bbcf761c ', 'admin'),
('maxime.chareyron@gmail.com', 'e05af1399f4f4beb7934c9f12ba5a9c88f7ee1e8ef3fe7a167be4b979c515d24102ad90d3a0754d48fc5930f6369a3087e686e9732ef3460e6439a95089b4800', 'visitor'),
('maxx@google.fr', 'e05af1399f4f4beb7934c9f12ba5a9c88f7ee1e8ef3fe7a167be4b979c515d24102ad90d3a0754d48fc5930f6369a3087e686e9732ef3460e6439a95089b4800', 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `idalbum` int(11) NOT NULL,
  `titre` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`idalbum`, `titre`) VALUES
(1, 'American Beauty'),
(2, 'Zanaka'),
(3, 'J\'irais ou tu iras'),
(4, 'En attendant l\'album'),
(5, 'Stay Right'),
(6, 'Love in the future');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idmusique` int(11) NOT NULL,
  `iduser` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `datemodif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idmusique`, `iduser`, `content`, `datemodif`) VALUES
(6, 'maxime.chareyron@gmail.com', 'Amazing song and voice !', '2017-01-11 12:23:55'),
(6, 'maxx@google.fr', 'I love this artist !', '2017-01-11 12:28:10');

-- --------------------------------------------------------

--
-- Table structure for table `jaime`
--

CREATE TABLE `jaime` (
  `idmusique` int(11) NOT NULL,
  `iduser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jaimepas`
--

CREATE TABLE `jaimepas` (
  `idmusique` int(11) NOT NULL,
  `iduser` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `musique`
--

CREATE TABLE `musique` (
  `idmusique` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `artiste` varchar(200) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `album_id` int(11) NOT NULL,
  `datemaj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musique`
--

INSERT INTO `musique` (`idmusique`, `titre`, `artiste`, `annee`, `album_id`, `datemaj`) VALUES
(2, 'Irresistible', 'Fall Out Boy', 2015, 1, '2017-01-11 11:56:31'),
(4, 'Makeba', 'Jain', 2015, 2, '2017-01-11 12:04:14'),
(5, 'Come', 'Jain', 2015, 2, '2017-01-11 12:04:40'),
(6, 'All of me', 'John Legend', 2014, 6, '2017-01-11 12:15:31'),
(7, 'Summer 2015', 'LEJ', 2015, 4, '2017-01-11 12:15:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idalbum`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idmusique`,`iduser`,`datemodif`),
  ADD KEY `fk_auteur` (`iduser`);

--
-- Indexes for table `jaime`
--
ALTER TABLE `jaime`
  ADD PRIMARY KEY (`idmusique`,`iduser`),
  ADD KEY `fk_like_auteur` (`iduser`);

--
-- Indexes for table `jaimepas`
--
ALTER TABLE `jaimepas`
  ADD PRIMARY KEY (`idmusique`,`iduser`),
  ADD KEY `fk_nlike_auteur` (`iduser`);

--
-- Indexes for table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`idmusique`),
  ADD KEY `fk_album` (`album_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `idalbum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `musique`
--
ALTER TABLE `musique`
  MODIFY `idmusique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_auteur` FOREIGN KEY (`iduser`) REFERENCES `admin` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_musique` FOREIGN KEY (`idmusique`) REFERENCES `musique` (`idmusique`) ON DELETE CASCADE;

--
-- Constraints for table `jaime`
--
ALTER TABLE `jaime`
  ADD CONSTRAINT `fk_like_auteur` FOREIGN KEY (`iduser`) REFERENCES `admin` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_like_musique` FOREIGN KEY (`idmusique`) REFERENCES `musique` (`idmusique`) ON DELETE CASCADE;

--
-- Constraints for table `jaimepas`
--
ALTER TABLE `jaimepas`
  ADD CONSTRAINT `fk_nlike_auteur` FOREIGN KEY (`iduser`) REFERENCES `admin` (`iduser`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_nlike_musique` FOREIGN KEY (`idmusique`) REFERENCES `musique` (`idmusique`) ON DELETE CASCADE;

--
-- Constraints for table `musique`
--
ALTER TABLE `musique`
  ADD CONSTRAINT `fk_album` FOREIGN KEY (`album_id`) REFERENCES `album` (`idalbum`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
