-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 28 Mai 2021 à 20:37
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `askanbibanquedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

CREATE TABLE IF NOT EXISTS `agence` (
  `IdAgence` int(11) NOT NULL AUTO_INCREMENT,
  `NomAgence` varchar(254) DEFAULT NULL,
  `Adresse` varchar(254) DEFAULT NULL,
  `DateCreation` datetime DEFAULT NULL,
  PRIMARY KEY (`IdAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `IdAgent` int(11) NOT NULL AUTO_INCREMENT,
  `IdAgence` int(11) NOT NULL,
  `Nom` varchar(254) DEFAULT NULL,
  `Prenom` varchar(254) DEFAULT NULL,
  `Adresse` varchar(254) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`IdAgent`),
  UNIQUE KEY `Email` (`Email`),
  KEY `FK_Agence_Agent` (`IdAgence`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `IdClient` int(11) NOT NULL AUTO_INCREMENT,
  `IdAgent` int(11) NOT NULL,
  `Nom` varchar(254) DEFAULT NULL,
  `Prenom` varchar(254) DEFAULT NULL,
  `Adress` varchar(254) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `Emaill` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`IdClient`),
  UNIQUE KEY `Emaill` (`Emaill`),
  KEY `FK_Agent_client` (`IdAgent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `IdCompte` int(11) NOT NULL AUTO_INCREMENT,
  `IdClient` int(11) NOT NULL,
  `NumeroCompte` varchar(254) DEFAULT NULL,
  `Solde` decimal(8,0) DEFAULT NULL,
  `DateCreation` date DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdCompte`),
  UNIQUE KEY `NumeroCompte` (`NumeroCompte`),
  KEY `FK_Client_compte` (`IdClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comptecourant`
--

CREATE TABLE IF NOT EXISTS `comptecourant` (
  `IdCompte` int(11) NOT NULL AUTO_INCREMENT,
  `AutorisationCouvertir` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compteepargne`
--

CREATE TABLE IF NOT EXISTS `compteepargne` (
  `IdCompte` int(11) NOT NULL AUTO_INCREMENT,
  `MontantRenumeration` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`IdCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `opreation`
--

CREATE TABLE IF NOT EXISTS `opreation` (
  `IdOpreration` int(11) NOT NULL AUTO_INCREMENT,
  `IdAgent` int(11) NOT NULL,
  `IdType` int(11) NOT NULL,
  `IdCompte` int(11) NOT NULL,
  `Montant` varchar(254) DEFAULT NULL,
  `DateOperation` datetime DEFAULT NULL,
  PRIMARY KEY (`IdOpreration`),
  KEY `FK_Agent_Operation` (`IdAgent`),
  KEY `FK_Association_9` (`IdType`),
  KEY `FK_Compte_Opreration` (`IdCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `IdRole` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`IdRole`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `IdType` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`IdType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `IdRole` int(11) NOT NULL,
  `IdClient` int(11) NOT NULL,
  `IdAgent` int(11) NOT NULL,
  `UserName` varchar(254) DEFAULT NULL,
  `Password` varchar(254) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `FK_Role_User` (`IdRole`),
  KEY `FK_User_Agent` (`IdAgent`),
  KEY `FK_User_client` (`IdClient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_Agence_Agent` FOREIGN KEY (`IdAgence`) REFERENCES `agence` (`IdAgence`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Agent_client` FOREIGN KEY (`IdAgent`) REFERENCES `agent` (`IdAgent`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_Client_compte` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`);

--
-- Contraintes pour la table `comptecourant`
--
ALTER TABLE `comptecourant`
  ADD CONSTRAINT `FK_Generalization_2` FOREIGN KEY (`IdCompte`) REFERENCES `compte` (`IdCompte`);

--
-- Contraintes pour la table `compteepargne`
--
ALTER TABLE `compteepargne`
  ADD CONSTRAINT `FK_Generalization_1` FOREIGN KEY (`IdCompte`) REFERENCES `compte` (`IdCompte`);

--
-- Contraintes pour la table `opreation`
--
ALTER TABLE `opreation`
  ADD CONSTRAINT `FK_Compte_Opreration` FOREIGN KEY (`IdCompte`) REFERENCES `compte` (`IdCompte`),
  ADD CONSTRAINT `FK_Agent_Operation` FOREIGN KEY (`IdAgent`) REFERENCES `agent` (`IdAgent`),
  ADD CONSTRAINT `FK_Association_9` FOREIGN KEY (`IdType`) REFERENCES `type` (`IdType`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_client` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`),
  ADD CONSTRAINT `FK_Role_User` FOREIGN KEY (`IdRole`) REFERENCES `role` (`IdRole`),
  ADD CONSTRAINT `FK_User_Agent` FOREIGN KEY (`IdAgent`) REFERENCES `agent` (`IdAgent`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
