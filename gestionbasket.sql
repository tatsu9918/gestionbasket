-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 10:45
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestionbasket`
--

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `Id_Joueurs` int(11) NOT NULL,
  `Id_Matchs` int(11) NOT NULL,
  `Rôle` smallint(6) DEFAULT NULL,
  `Poste` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Joueurs`,`Id_Matchs`),
  KEY `Id_Matchs` (`Id_Matchs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `Id_Joueurs` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) DEFAULT NULL,
  `Prénom` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `NumLicence` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Taille` decimal(15,2) DEFAULT NULL,
  `Poids` decimal(15,2) DEFAULT NULL,
  `Statut` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`Id_Joueurs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

DROP TABLE IF EXISTS `matchs`;
CREATE TABLE IF NOT EXISTS `matchs` (
  `Id_Matchs` int(11) NOT NULL AUTO_INCREMENT,
  `DateM` date DEFAULT NULL,
  `Lieu` varchar(50) DEFAULT NULL,
  `Resultat` varchar(50) DEFAULT NULL,
  `NomEquipeAdverse` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Matchs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
