-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2017 at 10:28 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `galerie01`
--

CREATE TABLE `galerie01` (
  `id_im` int(11) NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `legende` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galerie01`
--

INSERT INTO `galerie01` (`id_im`, `debut`, `fin`, `legende`) VALUES
(1, '2016-07-04', '2016-07-10', '4 - 10 juillet'),
(2, '2016-07-11', '2016-07-17', '11 - 17 juillet'),
(3, '2016-07-18', '2016-07-24', '18 - 24 juillet'),
(4, '2016-07-25', '2016-07-31', '25 - 31 juillet'),
(5, '2016-08-01', '2016-08-07', '1 - 7 aout'),
(6, '2016-08-08', '2016-08-14', '8 - 14 aout');

-- --------------------------------------------------------

--
-- Table structure for table `jamsession`
--

CREATE TABLE `jamsession` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `chant` varchar(255) DEFAULT NULL,
  `piano` varchar(255) DEFAULT NULL,
  `guitare` varchar(255) DEFAULT NULL,
  `cuivre` varchar(255) DEFAULT NULL,
  `contrebasse` varchar(255) DEFAULT NULL,
  `batterie` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jamsession`
--

INSERT INTO `jamsession` (`id`, `titre`, `chant`, `piano`, `guitare`, `cuivre`, `contrebasse`, `batterie`, `date`) VALUES
(1, 'Mr Sandman', '', '', '', 'exampe@domain.com', '', '', '2017-06-30'),
(2, 'Rockin\' chair', '', '', '', '', 'exampe@domain.com', '', '2017-06-30'),
(3, 'Black Betty', '', '', '', '', '', '', NULL),
(4, 'Crossroads', '', '', '', '', '', '', NULL),
(5, 'Team', '', '', '', '', '', '', NULL),
(6, 'Car Radio', '', '', '', '', '', '', NULL),
(7, 'City of Dreams', '', '', '', '', '', '', NULL),
(9, 'Hey', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membres01`
--

CREATE TABLE `membres01` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `instru` int(11) NOT NULL,
  `accomp` tinyint(1) DEFAULT NULL,
  `navette` tinyint(1) DEFAULT NULL,
  `lvl` int(11) NOT NULL,
  `dinscri` date DEFAULT NULL,
  `valid` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membres01`
--

INSERT INTO `membres01` (`id`, `mail`, `mdp`, `nom`, `prenom`, `adr`, `tel`, `instru`, `accomp`, `navette`, `lvl`, `dinscri`, `valid`) VALUES
(1, 'example@domain.com', 'mdpexample', 'Robot', 'Wall-E', '', '', 0, 0, 0, 0, NULL, NULL),
(2, 'robert@jazz.com', 'rob789', 'Dupont', 'Robert', '', '', 0, 0, 0, 0, NULL, NULL),
(4, 'email@email.com', 'mdp', 'nom', 'prenom', 'adr', '06510', 1, 1, 0, 1, NULL, NULL),
(5, 'm@g.fr', 'mdp', 'b', 'j', 'rue', '05213', 1, 0, 0, 2, NULL, NULL),
(6, 'h@g.fr', 'mdp', 'b', 'j', 'rue', '05213', 1, 0, 0, 2, NULL, NULL),
(7, 'r@g.fr', 'mdp', 'b', 'j', 'rue', '05213', 1, 0, 0, 2, '2017-01-16', NULL),
(8, 'b@g.fr', 'mdp', 'b', 'j', 'rue', '05213', 1, 0, 1, 2, '2017-01-16', NULL),
(9, 'd@g.fr', 'mdp', 'b', 'j', 'rue', '05213', 1, 1, 1, 2, '2017-01-16', NULL),
(10, 'q@g.fr', '00d70c561892a94980befd12a400e26aeb4b8599', 'b', 'j', 'rue', '05213', 1, 1, 1, 2, '2017-01-16', NULL),
(11, 'j@ge.fr', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'sdf', 'f', 's', 'ff', 0, 0, 0, 0, '2017-01-16', NULL),
(12, 'exampe@domain.com', '00d70c561892a94980befd12a400e26aeb4b8599', 'Bricot', 'Juda', 'aDRESSE', '1254789630', 4, 0, 0, 2, '2017-01-16', NULL),
(13, 'osr@urzvg.fr', '58ad983135fe15c5a8e2e15fb5b501aedcf70dc2', 'Nanas', 'Juda', '3 rue du jus', '0600000000', 2, 1, 0, 2, '2017-02-04', NULL),
(14, 'e@t.com', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'h', 'h', 'a', 'd', 1, 0, 1, 2, '2017-02-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos01`
--

CREATE TABLE `videos01` (
  `id` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `titre` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos01`
--

INSERT INTO `videos01` (`id`, `year`, `lien`, `min`, `titre`) VALUES
(2, 2014, '//www.youtube.com/embed/zH3ZohGnjcg', 1, 'KUMRU BALLAD'),
(3, 2015, '//player.vimeo.com/video/26890275', 2, 'KUMRU ORCHESTRAL'),
(4, 2015, '//www.youtube.com/embed/paG__3FBLzI', 3, 'MESOPOTAMIA'),
(5, 2016, '//www.youtube.com/embed/OF9fneQ50Us', 4, 'KREUTZER'),
(6, 2016, '//www.youtube.com/embed/1swsXJuclGM', 5, 'BODRUM'),
(7, 2016, '//www.youtube.com/embed/WQ3Gf9PLUO8', 6, 'MESOPOTAMIA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galerie01`
--
ALTER TABLE `galerie01`
  ADD PRIMARY KEY (`id_im`);

--
-- Indexes for table `jamsession`
--
ALTER TABLE `jamsession`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres01`
--
ALTER TABLE `membres01`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos01`
--
ALTER TABLE `videos01`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galerie01`
--
ALTER TABLE `galerie01`
  MODIFY `id_im` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jamsession`
--
ALTER TABLE `jamsession`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `membres01`
--
ALTER TABLE `membres01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `videos01`
--
ALTER TABLE `videos01`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
