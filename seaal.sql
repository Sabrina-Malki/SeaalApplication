-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 sep. 2018 à 11:51
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `seaal`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

DROP TABLE IF EXISTS `action`;
CREATE TABLE IF NOT EXISTS `action` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDCourrier` int(11) NOT NULL,
  `IDService` int(11) NOT NULL,
  `DateValidAction` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDCourrier` (`IDCourrier`),
  KEY `IDCourrier_2` (`IDCourrier`,`IDService`),
  KEY `IDService` (`IDService`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Mot de passe` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`ID`, `Nom`, `Mot de passe`) VALUES
(1, 'DG', 'DG'),
(2, 'service2', 'service2'),
(3, 'service3', 'service3'),
(4, 'service4', 'service4');

-- --------------------------------------------------------

--
-- Structure de la table `courrier`
--

DROP TABLE IF EXISTS `courrier`;
CREATE TABLE IF NOT EXISTS `courrier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DateArrive` datetime NOT NULL,
  `Expediteur` varchar(255) NOT NULL,
  `Objet` varchar(255) NOT NULL,
  `Commentaires` text,
  `DateSaisie` datetime NOT NULL,
  `DateValidAction` datetime DEFAULT NULL,
  `IDTypologie` int(11) NOT NULL,
  `Chemin` varchar(255) NOT NULL,
  `IDAuteur` int(11) NOT NULL,
  `DateLimite` date DEFAULT NULL,
  `Suivre` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDTypologie` (`IDTypologie`),
  KEY `IDAuteur` (`IDAuteur`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `courrier`
--

INSERT INTO `courrier` (`ID`, `DateArrive`, `Expediteur`, `Objet`, `Commentaires`, `DateSaisie`, `DateValidAction`, `IDTypologie`, `Chemin`, `IDAuteur`, `DateLimite`, `Suivre`) VALUES
(44, '2018-09-25 00:00:00', 'ministère1', 'objet1', 'a répondre le plûtot possible ', '2018-09-27 01:56:21', NULL, 1, 'files/instructions_utilisation.pdf', 1, '2018-09-28', 1),
(57, '2018-09-27 00:00:00', 'mouna', 'SABRINA', NULL, '2018-09-27 12:50:38', NULL, 1, 'files/instructions_utilisation.pdf', 1, NULL, NULL),
(58, '2018-09-27 00:00:00', 'service', 'service', 'commentaire', '2018-09-27 12:51:58', NULL, 2, 'files/instructions_utilisation.pdf', 1, '2018-09-28', 1);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `NSS` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `AdresseMail` varchar(255) NOT NULL,
  `IDCompte` int(11) DEFAULT NULL,
  `IDService` int(11) NOT NULL,
  `isDir` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`NSS`),
  KEY `IDCompte` (`IDCompte`),
  KEY `IDService` (`IDService`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`NSS`, `Nom`, `Prenom`, `AdresseMail`, `IDCompte`, `IDService`, `isDir`) VALUES
(1, 'Boutemine', 'mouna', 'boutemine@seaal.dz', 2, 2, 0),
(2, 'Malki', 'Sabrina', 'Malki@seaal.dz', 1, 1, 1),
(3, 'Boutemine', 'Salima', 'boutemineS@seaal.dz', 3, 3, 0),
(4, 'Malki', 'Malki', 'Malkim@seaal.dz', 1, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TextRep` text NOT NULL,
  `DateReponse` datetime NOT NULL,
  `IDCourrier` int(11) NOT NULL,
  `Valide` tinyint(1) NOT NULL DEFAULT '0',
  `DateValidRep` datetime DEFAULT NULL,
  `IDService` int(11) NOT NULL,
  `Commentaires` text,
  PRIMARY KEY (`ID`),
  KEY `IDcourrier` (`IDCourrier`),
  KEY `IDService` (`IDService`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`ID`, `Designation`) VALUES
(1, 'DG'),
(2, 'service2'),
(3, 'service3'),
(4, 'service4');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `IDCourrier` int(11) NOT NULL,
  `IDEmploye` int(11) NOT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IDEmploye`,`IDCourrier`),
  KEY `Designation` (`Designation`),
  KEY `IDCourrier` (`IDCourrier`,`IDEmploye`),
  KEY `IDCourrier_2` (`IDCourrier`,`IDEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typologie`
--

DROP TABLE IF EXISTS `typologie`;
CREATE TABLE IF NOT EXISTS `typologie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typologie`
--

INSERT INTO `typologie` (`ID`, `Designation`) VALUES
(1, 'type1'),
(2, 'type2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`IDCourrier`) REFERENCES `courrier` (`ID`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`IDService`) REFERENCES `service` (`ID`);

--
-- Contraintes pour la table `courrier`
--
ALTER TABLE `courrier`
  ADD CONSTRAINT `courrier_ibfk_1` FOREIGN KEY (`IDAuteur`) REFERENCES `compte` (`ID`),
  ADD CONSTRAINT `courrier_ibfk_2` FOREIGN KEY (`IDTypologie`) REFERENCES `typologie` (`ID`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`IDCompte`) REFERENCES `compte` (`ID`),
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`IDService`) REFERENCES `service` (`ID`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (`IDCourrier`) REFERENCES `courrier` (`ID`),
  ADD CONSTRAINT `reponse_ibfk_2` FOREIGN KEY (`IDService`) REFERENCES `service` (`ID`);

--
-- Contraintes pour la table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`IDCourrier`) REFERENCES `courrier` (`ID`),
  ADD CONSTRAINT `type_ibfk_2` FOREIGN KEY (`IDEmploye`) REFERENCES `employe` (`NSS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
