-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 26 jan. 2023 à 00:00
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

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
  `Prenom` varchar(50) DEFAULT NULL,
  `Photo` varchar(50) DEFAULT NULL,
  `NumLicence` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Taille` decimal(15,2) DEFAULT NULL,
  `Poids` decimal(15,2) DEFAULT NULL,
  `Poste_pref` text NOT NULL,
  `Statut` smallint(6) DEFAULT NULL,
  `Commentaire` text NOT NULL,
  PRIMARY KEY (`Id_Joueurs`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueurs`
--

INSERT INTO `joueurs` (`Id_Joueurs`, `Nom`, `Prenom`, `Photo`, `NumLicence`, `DateNaissance`, `Taille`, `Poids`, `Poste_pref`, `Statut`, `Commentaire`) VALUES
(18, 'Pomies', 'Guillaume', 'test', '56156', '2023-01-20', '194.00', '92.00', 'Pivot', 1, 'Ã§a va'),
(25, 'Clotaire', 'Sylvestre', 'test', '648849', '2002-02-24', '181.00', '70.00', 'Ailier', 1, 'test'),
(26, '2eme', 'Clodomir', 'test', '46584654564', '0495-11-06', '160.00', '70.00', 'Roi', 1, 'test');

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
