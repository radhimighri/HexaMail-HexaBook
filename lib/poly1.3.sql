-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2019 at 04:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poly`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idimg` int(10) NOT NULL,
  `idmem` int(10) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idimg`, `idmem`, `chemin`, `type`) VALUES
(32, 16, 'img/ghanouchi.jpg', '5'),
(33, 16, 'img/ghanouchi.jpg', '5'),
(34, 71, 'img/ghanouchi.jpg', '5');

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `pass_confirm` varchar(12) NOT NULL,
  `datenais` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id`, `login`, `pass`, `pass_confirm`, `datenais`, `email`, `nom`, `prenom`, `sex`, `country`) VALUES
(10, 'Radhi', '100', '100', '1990-04-04', 'mgii.radhi@gmail.com', 'Radhi', 'rtesttest', '', ''),
(16, 'Hachem', '1234', '1234', '1996-07-22', 'hachem.benamor@polytechnicien.tn', 'Hachem', 'Ben Amor', 'M', ''),
(25, 'najem', '100', '100', '1991-02-02', 'najem@sdsq.Fr', 'najemeeds', 'Mighri', '', ''),
(56, 'riadh', 'qqq', 'qqq', '2000-10-29', 'riadh.mighri@dsfs.fr', 'riadh', 'Mighri', '', ''),
(75, '2233', '333', '2233', '0002-02-22', '2@polytechnicien.tn', '55', '5454', 'M', 'Afghanistan'),
(76, '2233', '333', '2233', '0002-02-22', '2@polytechnicien.tn', '55', '5454', 'M', 'Afghanistan'),
(77, 'ee', 'aze', 'zae', '0002-02-22', 'aeaze@polytechnicien.tn', 'aze', 'aze', 'M', 'Afghanistan'),
(78, 'ee', 'aze', 'zae', '0002-02-22', 'aeaze@polytechnicien.tn', 'aze', 'aze', 'M', 'Afghanistan'),
(79, 'ee', 'rr', 'ee', '0022-02-22', 'aze@polytechnicien.tn', 'ee', 'aze', 'M', 'Afghanistan'),
(80, 'ee', 'rr', 'ee', '0022-02-22', 'aze@polytechnicien.tn', 'ee', 'aze', 'M', 'Afghanistan'),
(81, 'aze', 'etete', 'et', '0002-02-22', 'aze@polytechnicien.tn', 'dsqd', 'qds', 'M', 'Afghanistan'),
(82, 'eee', 'r', 'r', '0022-02-22', 'aze@polytechnicien.tn', 'aze', 'aze', 'M', 'Afghanistan'),
(83, 'eee', 'r', 'r', '0022-02-22', 'aze@polytechnicien.tn', 'aze', 'aze', 'M', 'Afghanistan'),
(84, 'az', 'az', 'az', '0002-02-22', 'bebe@polytechnicien.tn', 'qsd', 'aa', 'M', 'Afghanistan'),
(85, 'aaa', '22', '22', '0002-02-22', 'bebe@polytechnicien.tn', 'dsqd', 'qd', 'M', 'Afghanistan');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL DEFAULT '0',
  `id_destinataire` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `titre` text NOT NULL,
  `message` text NOT NULL,
  `lu` int(1) NOT NULL,
  `trash` int(1) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `date`, `titre`, `message`, `lu`, `trash`, `picture`) VALUES
(86, 16, 10, '2019-03-19 14:43:50', 'teteeeeeeeee', 'teeeeeeeeeeeee', 0, 0, ''),
(89, 16, 61, '2019-03-19 14:45:53', 'ttttttttttttttt', 'tttttttttttttttt', 0, 0, 'polylogo.png'),
(90, 16, 61, '2019-03-19 14:48:07', 'dsq', 'dsq', 0, 0, 'polylogo.png'),
(91, 16, 61, '2019-03-19 14:49:15', 'dsqd', 'dsq', 0, 0, 'me.jpg'),
(92, 16, 61, '2019-03-19 14:49:28', 'dqsaaa', 'dsq', 0, 0, 'polylogo.png'),
(93, 16, 61, '2019-03-19 14:51:00', 'dsq', 'dsq', 0, 0, ''),
(94, 16, 61, '2019-03-19 14:52:22', 'dsqsd', 'dsq', 0, 0, 'img/weather.jpg'),
(95, 16, 61, '2019-03-19 14:54:36', 'dsq', 'dsq', 0, 0, 'img/me.jpg'),
(96, 16, 61, '2019-03-19 14:54:49', 'dsq', 'dsq', 0, 0, 'img/4.png'),
(97, 16, 61, '2019-03-19 15:07:44', 'dsqd', 'dsq', 0, 1, 'img/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idimg`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idimg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
