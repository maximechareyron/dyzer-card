-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2017 at 06:01 PM
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
('maxime.chareyron@gmail.com', 'e05af1399f4f4beb7934c9f12ba5a9c88f7ee1e8ef3fe7a167be4b979c515d24102ad90d3a0754d48fc5930f6369a3087e686e9732ef3460e6439a95089b4800', 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `musique`
--

CREATE TABLE `musique` (
  `idmusique` int(11) NOT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `artiste` varchar(200) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `avisfav` int(11) NOT NULL,
  `avisdefav` int(11) NOT NULL,
  `album_id` int(11) DEFAULT NULL,
  `datemaj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `musique`
--

INSERT INTO `musique` (`idmusique`, `titre`, `artiste`, `annee`, `avisfav`, `avisdefav`, `album_id`, `datemaj`) VALUES
(1, 'all of me', 'john legend', 2014, 0, 0, 0, '2017-01-07 14:53:48'),
(2, 'wake me up', 'avicii', 2012, 0, 0, 1, '2017-01-07 14:53:48'),
(3, 'makeba', 'jain', 2015, 0, 0, 2, '2017-01-07 14:53:48'),
(4, 'formidable', 'stromae', 2013, 0, 0, 3, '2017-01-07 14:53:48'),
(5, 'alors on danse', 'stromae', 2013, 0, 0, 3, '2017-01-07 14:53:48'),
(6, 'ta fete', 'stromae', 2013, 0, 0, 3, '2017-01-07 14:53:48'),
(7, 'carmen', 'stromae', 2013, 0, 0, 3, '2017-01-07 14:53:48'),
(8, 'Waiting for love', 'Avicii', 2015, 0, 0, 1, '2017-01-07 18:34:48'),
(9, 'J\'irais ou tu iras', 'Celine Dion - Jean Jacques Goldman', 1995, 0, 0, 4, '2017-01-08 12:29:21'),
(10, 'Belle', 'Daniel Lavoie, Garou, Patrick Fiori', 1998, 0, 0, 5, '2017-01-08 12:28:32');


CREATE TABLE `comments` (
  `idmusique` int(11) NOT NULL,
  `iduser` varchar(50) DEFAULT NULL,
  `text` varchar(200) DEFAULT NULL,
  `datemaj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comment` (`idmusique`, `iduser`, `date`, `text`) VALUES
(1, 'm@x.fr', '2017-01-07 14:53:48', 'franchement cest bien'),
(1, 'maxime.chareyron@gmail.com', '2017-01-07 14:53:48', 'franchement cest bien'),
(2, 'maxime.chareyron@gmail.com', '2017-01-07 14:53:48', 'g vu mieu'),
(3, 'maxime.chareyron@gmail.com', '2017-01-07 14:53:48', 'allah akbar'),
(3, 'm@x.fr', '2017-01-07 14:53:48', 'wllh la tueri psartek'),
(5, 'm@x.fr', '2017-01-07 14:53:48', 'ivre');
--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `musique`
--
ALTER TABLE `musique`
  ADD PRIMARY KEY (`idmusique`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musique`
--
ALTER TABLE `musique`
  MODIFY `idmusique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
