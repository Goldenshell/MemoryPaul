-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 12 fév. 2018 à 12:59
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `choisir`
--

DROP TABLE IF EXISTS `choisir`;
CREATE TABLE IF NOT EXISTS `choisir` (
  `numImage` int(10) NOT NULL,
  `numPartie` int(10) NOT NULL,
  PRIMARY KEY (`numImage`,`numPartie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`idImage`, `chemin`) VALUES
(1, 'src/Images/salon2.jpg'),
(2, 'src/Images/salon.jpg'),
(3, 'src/Images/rafaleQuatar.jpg'),
(4, 'src/Images/rafaleCouchant.jpg'),
(5, 'src/Images/looping.jpg'),
(6, 'src/Images/hangar.jpg'),
(7, 'src/Images/falconGauche.jpg'),
(8, 'src/Images/falconFace.jpg'),
(9, 'src/Images/falconCouchant.jpg'),
(10, 'src/Images/NeuronCouchant.jpg'),
(11, 'src/Images/MirageInde.jpg'),
(12, 'src/Images/FormationDassault.jpg'),
(13, 'src/Images/FCAS.jpg'),
(14, 'src/Images/3avions.jpg'),
(15, 'src/Images/2Rafale.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `idJoueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`idJoueur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`idJoueur`, `pseudo`) VALUES
(2, 'Doe'),
(12, 'Jimmy');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `idPartie` int(11) NOT NULL AUTO_INCREMENT,
  `nbCoups` int(10) NOT NULL,
  `idJoueur` int(11) NOT NULL,
  PRIMARY KEY (`idPartie`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`idPartie`, `nbCoups`, `idJoueur`) VALUES
(2, 8, 2),
(5, 16, 12),
(6, 14, 12),
(7, 11, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
