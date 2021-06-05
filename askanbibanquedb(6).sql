-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juin 2021 à 13:52
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
-- Base de données : `askanbibanquedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `agence`
--

DROP TABLE IF EXISTS `agence`;
CREATE TABLE IF NOT EXISTS `agence` (
  `idagence` int(11) NOT NULL AUTO_INCREMENT,
  `nomagence` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `datecreation` datetime DEFAULT NULL,
  PRIMARY KEY (`idagence`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idagence`, `nomagence`, `adresse`, `datecreation`) VALUES
(1, 'AgenceToubaToul', 'Touba toul', '2021-06-03 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `idagent` int(11) NOT NULL AUTO_INCREMENT,
  `Idagence` int(11) DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idagent`),
  KEY `FK_Agence_Agent` (`Idagence`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`idagent`, `Idagence`, `nom`, `prenom`, `adresse`, `datenaissance`, `telephone`, `email`) VALUES
(1, 1, 'Diouf', 'Fadel', 'Cite colobane', '2020-02-11', '77777777777', 'diouf@fallou'),
(4, 1, 'Niang', 'Matar', 'guediawaye', '2021-06-04', '765444444', 'matar@gmail.com'),
(5, 1, 'Ndiongue', 'Maps', 'maps@gmail.com', '2021-06-05', '76654433333', 'maps@gmail.com'),
(6, 1, 'fadji', 'fadji', 'toul', '2021-06-04', NULL, 'fadel@fadji');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idclient` int(11) NOT NULL AUTO_INCREMENT,
  `idagent` int(11) DEFAULT NULL,
  `nom` varchar(254) DEFAULT NULL,
  `prenom` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `datenaissance` varchar(255) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idclient`),
  KEY `FK_Agent_client` (`idagent`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `idagent`, `nom`, `prenom`, `adresse`, `datenaissance`, `telephone`, `email`) VALUES
(1, 1, 'Mboup', 'Modou', 'colobane', '2020-12-08', '7677777777', 'mboup@modou'),
(2, NULL, 'faye', 'sokhna', 'colobane', NULL, '767589999', 'sokhna@gmail.com'),
(4, NULL, 'faye', 'sokhna', 'colobane', NULL, '767589999', 'sokhna@gmail.com'),
(5, NULL, 'faye', 'sokhna', 'colobane', '24-04-2018', '767589999', 'sokhna@gmail.com'),
(12, NULL, 'hh', 'xxxx', 'ggz', '2021-06-16', 'azxcc', 'xsccx');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idcompte` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `num_compte` varchar(254) DEFAULT NULL,
  `solde` decimal(8,0) DEFAULT NULL,
  `datecreation` date DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `type_compte` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idcompte`),
  KEY `FK_Client_compte` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `idclient`, `num_compte`, `solde`, `datecreation`, `active`, `type_compte`) VALUES
(1, 1, '1234567', '99999999', '2021-06-03', 0, 'epargne');

-- --------------------------------------------------------

--
-- Structure de la table `opreation`
--

DROP TABLE IF EXISTS `opreation`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'agent');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idtypecompte` int(11) NOT NULL AUTO_INCREMENT,
  `compte` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idtypecompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idrole` int(11) NOT NULL,
  `idagent` int(11) NOT NULL,
  `username` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `idclient` int(64) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `FK_Role_User` (`idrole`),
  KEY `FK_User_Agent` (`idagent`),
  KEY `FK_user_client` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `idrole`, `idagent`, `username`, `password`, `active`, `idclient`) VALUES
(3, 1, 4, 'Matar@niang', 'passer', NULL, NULL),
(4, 2, 5, 'Maps@diongue', 'passer', NULL, NULL),
(5, 3, 1, 'fadel@diouf', 'passer', NULL, NULL),
(6, 3, 1, 'passer', 'passer1234', NULL, NULL),
(7, 1, 6, 'passer', 'passer', NULL, NULL),
(8, 1, 6, 'passer', 'passer', NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_Agence_Agent` FOREIGN KEY (`Idagence`) REFERENCES `agence` (`idagence`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Agent_client` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`);

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_Client_compte` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
-- Contraintes pour la table `opreation`
--
ALTER TABLE `opreation`
  ADD CONSTRAINT `FK_Agent_Operation` FOREIGN KEY (`IdAgent`) REFERENCES `agent` (`idagent`),
  ADD CONSTRAINT `FK_Association_9` FOREIGN KEY (`IdType`) REFERENCES `type` (`idtypecompte`),
  ADD CONSTRAINT `FK_Compte_Opreration` FOREIGN KEY (`IdCompte`) REFERENCES `compte` (`idcompte`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Role_User` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`),
  ADD CONSTRAINT `FK_User_Agent` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`),
  ADD CONSTRAINT `FK_user_client` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
