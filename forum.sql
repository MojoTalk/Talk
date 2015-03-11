-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Mars 2015 à 16:05
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudos` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `biliet` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `nomp` varchar(255) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `nom` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
