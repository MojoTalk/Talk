-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Mars 2015 à 10:00
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
  `administrateur` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `logs`
--

INSERT INTO `logs` (`ID`, `pseudos`, `mdp`, `mail`, `administrateur`) VALUES
(36, 'Administrateur', '7cc0aedeb280ebe3e40425c3f7b75de8ce27db06', 'youhou', 2);

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
  `rang` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`biliet`, `ID`, `topic`, `nomp`, `dates`, `rang`) VALUES
('Pour acceder au compte Administrateur Utilisez les logs\r\n</br></br>\r\nAdministrateur</br>\r\njesuislechef</br></br>\r\npensez a supprimer ce message une fois fais.</br></br>\r\n\r\nPour faire passer un profil en administrateur de rang 2 (le plus haut niveau) faites le grace Ã  la base de donnÃ© en transformant le champ administrateur de 0 a 2', 116, 'Reglement interieur', 'Admin', '2015-03-12 20:19:04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `nom` text NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`nom`, `id`, `rang`) VALUES
('Reglement interieur', 60, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
