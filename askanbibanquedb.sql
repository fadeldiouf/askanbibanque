-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 juin 2021 à 20:47
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
  `datecreation` date DEFAULT NULL,
  PRIMARY KEY (`idagence`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agence`
--

INSERT INTO `agence` (`idagence`, `nomagence`, `adresse`, `datecreation`) VALUES
(1, 'ToubaToul', 'Touba toul', '2021-06-03'),
(2, 'keur Massar', 'Keur Massar', '2021-06-06'),
(3, 'Guediawaye', 'Guediawaye', '2021-06-06'),
(7, 'dakar', 'dakar', '2021-06-16'),
(8, 'bbb', 'bbb', '2021-06-16'),
(9, 'PIKINE', 'PIKINE', '2021-06-15');

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
  `genre` varchar(64) NOT NULL,
  `civilite` varchar(64) NOT NULL,
  PRIMARY KEY (`idagent`),
  KEY `FK_Agence_Agent` (`Idagence`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`idagent`, `Idagence`, `nom`, `prenom`, `adresse`, `datenaissance`, `telephone`, `email`, `genre`, `civilite`) VALUES
(1, 1, 'Diouf', 'Fadel', 'Cite colobane', '2020-02-11', '77777777777', 'diouf@fallou', '', ''),
(4, 1, 'Niang', 'Matar', 'guediawaye', '2021-06-04', '765444444', 'matar@gmail.com', '', ''),
(5, 1, 'Ndiongue', 'Maps', 'maps@gmail.com', '2021-06-05', '76654433333', 'maps@gmail.com', '', ''),
(6, 1, 'fadji', 'diop', 'toul', '2021-06-04', '', 'fadel@fadji', '', ''),
(7, 2, 'diong', 'maps', 'keur massar', '2021-06-16', '765555555', 'mapenda@gmail.com', 'mascilun', 'Marie'),
(8, 3, 'Niang', 'Makhtar', 'Guediwaye', '2021-06-11', '78888888', 'matar@com', 'mas', 'celibataire'),
(9, 2, 'mapenda', 'sokhna', 'keur massar', '2021-06-15', NULL, NULL, '', ''),
(10, 1, 'ggggh', 'douf', 'toul', '2021-06-16', '777777', 'diouf@fallou', 'masculin', 'MariÃ©');

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
  `genre` varchar(25) NOT NULL,
  `cni` bigint(20) NOT NULL,
  PRIMARY KEY (`idclient`),
  KEY `FK_Agent_client` (`idagent`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idclient`, `idagent`, `nom`, `prenom`, `adresse`, `datenaissance`, `telephone`, `email`, `genre`, `cni`) VALUES
(1, 1, 'Mboup', 'Modou', 'colobane', '2020-12-08', '7677777777', 'mboup@modou', '0', 0),
(17, 7, 'kmsar', 'kmasssar', 'keur massar', '1794', '7777777', NULL, '0', 0),
(18, 7, 'kmassar', 'ffhbx', 'fvzhh', 'aasc', '77777', NULL, '0', 0),
(20, 8, 'guediayea', 'guediayea', 'guediayea', 'guediayea', NULL, NULL, '0', 0),
(26, 1, 'diouf', 'douf', 'diouf', '000000', 'ooooo', '000000', '0', 0),
(34, 1, 'ccccccc', 'ccc', 'ccc', '2021-06-09', '77777', NULL, 'ccc', 0),
(53, 1, 'aaaa', 'aaaaaa', 'aaaa', '2021-06-09', 'aaaa', NULL, 'masculin', 0),
(54, 1, 'bb', 'bb', 'bb', '2021-06-09', 'b', NULL, 'feminine', 0),
(55, 1, 'c', 'c', 'c', '2021-06-08', 'c', NULL, 'feminine', 0),
(56, 1, 'a', 'a', 'a', '2021-06-09', 'aaaa', NULL, 'feminine', 0),
(57, 1, 'ccc', 'ccc', 'cc', '2021-06-08', 'cccccc', NULL, 'feminine', 0),
(59, 1, '11111', 'q', 'q', '2021-06-14', 'q', NULL, 'feminine', 0),
(60, 1, 'diouf', 'fadel', 'colobane', '11-06-21', '776531212', NULL, 'masculin', 1234577),
(62, 1, 'diouf', 'diouf', 'bambey', '2021-06-16', '777777', 'fdelll@fa', 'feminine', 18),
(63, 1, 'seck', 'elzzzz', 'keur massar', '2021-06-16', '777777', 'seck@seck', 'masculin', 199999);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `idcompte` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` int(11) NOT NULL,
  `num_compte` varchar(254) DEFAULT NULL,
  `solde` double DEFAULT NULL,
  `datecreation` varchar(64) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `type_compte` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idcompte`),
  KEY `FK_Client_compte` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`idcompte`, `idclient`, `num_compte`, `solde`, `datecreation`, `active`, `type_compte`) VALUES
(9, 1, '9643778771', 100008454442, '2021-06-09', NULL, '5555'),
(28, 53, '1121115803', 51000, '2021-06-23', NULL, 'credit'),
(29, 53, '4038439303', 1000, '2021-06-16', NULL, 'credit'),
(35, 59, '4237416008', 2018777, '2021-06-16', NULL, 'credit'),
(36, 60, '4352056655', 50000, NULL, NULL, 'credit'),
(38, 62, '9499068227', 500001000, '14-06-21 ', NULL, 'Courant'),
(39, 63, '4489200624', 3383333, '15-06-21 ', NULL, 'Courant');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `idoperation` int(11) NOT NULL AUTO_INCREMENT,
  `idagent` int(11) NOT NULL,
  `idtype` int(11) NOT NULL,
  `idcompte` int(11) NOT NULL,
  `dateoperation` varchar(64) DEFAULT NULL,
  `credit` double DEFAULT NULL,
  `debite` double DEFAULT NULL,
  `envoie` double DEFAULT NULL,
  `recue` double DEFAULT NULL,
  PRIMARY KEY (`idoperation`),
  KEY `FK_Agent_Operation` (`idagent`),
  KEY `FK_Association_9` (`idtype`),
  KEY `FK_Compte_Opreration` (`idcompte`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`idoperation`, `idagent`, `idtype`, `idcompte`, `dateoperation`, `credit`, `debite`, `envoie`, `recue`) VALUES
(5, 1, 1, 9, '10-06-21 05:03:16', 100000, NULL, 0, 0),
(6, 1, 1, 9, '10-06-21 05:04:42', 1000000, NULL, 0, 0),
(7, 1, 1, 9, '10-06-21 05:29:35', 1000000, NULL, 0, 0),
(8, 1, 2, 9, '10-06-21 05:38:49', NULL, 100000, 0, 0),
(9, 1, 2, 9, '10-06-21 05:39:03', NULL, 100000, 0, 0),
(10, 1, 2, 9, '10-06-21 05:39:16', NULL, 100000, 0, 0),
(11, 1, 2, 9, '10-06-21 05:40:45', NULL, 500000, 0, 0),
(12, 1, 2, 9, '10-06-21 06:38:18', NULL, 240000, NULL, NULL),
(15, 1, 1, 9, '10-06-21 09:26:41', 1000000, NULL, NULL, NULL),
(16, 1, 2, 9, '10-06-21 09:29:11', NULL, 150000, NULL, NULL),
(17, 1, 2, 9, '10-06-21 09:29:11', NULL, 150000, NULL, NULL),
(18, 1, 2, 9, '10-06-21 09:32:04', NULL, NULL, 50000, NULL),
(19, 1, 2, 9, '10-06-21 09:32:04', NULL, NULL, NULL, 50000),
(20, 1, 2, 9, '10-06-21 09:36:16', NULL, NULL, 50000, NULL),
(21, 1, 2, 9, '10-06-21 09:36:16', NULL, NULL, NULL, 50000),
(22, 1, 3, 9, '10-06-21 09:40:30', NULL, NULL, 50000, NULL),
(23, 1, 3, 35, '10-06-21 09:40:30', NULL, NULL, NULL, 50000),
(24, 1, 3, 9, '10-06-21 06:20:35', NULL, NULL, 50000, NULL),
(25, 1, 3, 35, '10-06-21 06:20:35', NULL, NULL, NULL, 50000),
(26, 1, 3, 9, '10-06-21 06:24:22', NULL, NULL, 50000, NULL),
(27, 1, 3, 35, '10-06-21 06:24:22', NULL, NULL, NULL, 50000),
(28, 1, 3, 9, '10-06-21 06:25:52', NULL, NULL, 400000, NULL),
(29, 1, 3, 35, '10-06-21 06:25:52', NULL, NULL, NULL, 400000),
(30, 1, 3, 9, '10-06-21 06:29:41', NULL, NULL, 1000000, NULL),
(31, 1, 3, 35, '10-06-21 06:29:41', NULL, NULL, NULL, 1000000),
(32, 1, 1, 9, '11-06-21 11:26:29', 50000, NULL, NULL, NULL),
(33, 1, 1, 9, '11-06-21 11:26:46', 100000, NULL, NULL, NULL),
(34, 1, 1, 9, '11-06-21 11:29:41', 100000000000, NULL, NULL, NULL),
(35, 1, 1, 9, '12-06-21 05:20:39', 50000, NULL, NULL, NULL),
(36, 1, 1, 9, '12-06-21 05:38:10', 500000, NULL, NULL, NULL),
(37, 1, 1, 9, '12-06-21 05:39:10', 500000, NULL, NULL, NULL),
(38, 1, 1, 9, '12-06-21 05:42:27', 500000, NULL, NULL, NULL),
(39, 1, 1, 9, '12-06-21 05:43:17', 500000, NULL, NULL, NULL),
(40, 1, 1, 9, '12-06-21 06:42:30', 50000, NULL, NULL, NULL),
(41, 1, 2, 9, '12-06-21 06:53:30', NULL, 500000, NULL, NULL),
(42, 1, 2, 9, '12-06-21 06:54:13', NULL, 500000, NULL, NULL),
(43, 4, 2, 9, '12-06-21 06:58:18', NULL, 66666, NULL, NULL),
(44, 4, 2, 9, '12-06-21 12:40:15', NULL, 50000, NULL, NULL),
(45, 4, 1, 9, '12-06-21 01:05:59', 50000, NULL, NULL, NULL),
(46, 4, 1, 9, '12-06-21 01:11:36', 800000, NULL, NULL, NULL),
(47, 4, 1, 9, '12-06-21 01:12:40', 5000000, NULL, NULL, NULL),
(48, 4, 1, 9, '12-06-21 01:12:57', 300000, NULL, NULL, NULL),
(49, 4, 1, 9, '12-06-21 01:13:29', 2000, NULL, NULL, NULL),
(50, 4, 1, 9, '12-06-21 01:26:00', 2000, NULL, NULL, NULL),
(51, 4, 1, 9, '12-06-21 01:26:33', 4000, NULL, NULL, NULL),
(52, 4, 1, 9, '12-06-21 01:27:27', 40000, NULL, NULL, NULL),
(53, 4, 1, 9, '12-06-21 01:28:39', 3444, NULL, NULL, NULL),
(54, 4, 2, 9, '12-06-21 01:29:32', NULL, 444, NULL, NULL),
(55, 4, 1, 9, '12-06-21 01:33:05', 5000, NULL, NULL, NULL),
(56, 4, 1, 9, '12-06-21 01:33:39', 333, NULL, NULL, NULL),
(57, 4, 2, 9, '12-06-21 01:35:06', NULL, 333, NULL, NULL),
(58, 4, 3, 9, '12-06-21 01:43:21', NULL, NULL, 6000, NULL),
(59, 4, 3, 35, '12-06-21 01:43:21', NULL, NULL, NULL, 6000),
(60, 4, 3, 9, '12-06-21 01:44:21', NULL, NULL, 50000, NULL),
(61, 4, 3, 35, '12-06-21 01:44:21', NULL, NULL, NULL, 50000),
(62, 4, 3, 9, '12-06-21 01:45:54', NULL, NULL, 4444, NULL),
(63, 4, 3, 35, '12-06-21 01:45:54', NULL, NULL, NULL, 4444),
(64, 4, 2, 9, '12-06-21 01:46:20', NULL, 56, NULL, NULL),
(65, 4, 2, 9, '12-06-21 01:47:47', NULL, 500, NULL, NULL),
(66, 4, 1, 9, '12-06-21 01:48:04', 3333, NULL, NULL, NULL),
(67, 1, 3, 9, '12-06-21 03:00:32', NULL, NULL, 8333, NULL),
(68, 1, 3, 35, '12-06-21 03:00:32', NULL, NULL, NULL, 8333),
(69, 1, 1, 9, '12-06-21 06:33:25', 99999, NULL, NULL, NULL),
(71, 8, 1, 9, '14-06-21 05:03:39', 50000, NULL, NULL, NULL),
(72, 8, 1, 9, '14-06-21 05:34:23', 3333, NULL, NULL, NULL),
(73, 1, 1, 38, '15-06-21 10:42:11', 500000000, NULL, NULL, NULL),
(74, 8, 1, 9, '15-06-21 10:45:56', 7777777, NULL, NULL, NULL),
(75, 1, 1, 39, '15-06-21 08:20:24', 3333333, NULL, NULL, NULL),
(76, 1, 3, 39, '15-06-21 08:22:33', NULL, NULL, 50000, NULL),
(77, 1, 3, 28, '15-06-21 08:22:33', NULL, NULL, NULL, 50000);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`idrole`, `role`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'agent'),
(4, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `idtype` int(11) NOT NULL AUTO_INCREMENT,
  `typeoperation` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`idtype`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`idtype`, `typeoperation`) VALUES
(1, 'depot'),
(2, 'retrait'),
(3, 'virement');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `idrole` int(11) NOT NULL,
  `idagent` int(11) DEFAULT NULL,
  `idclient` int(64) DEFAULT NULL,
  `username` varchar(254) DEFAULT NULL,
  `password` varchar(254) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `FK_Role_User` (`idrole`),
  KEY `FK_User_Agent` (`idagent`),
  KEY `FK_user_client` (`idclient`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `idrole`, `idagent`, `idclient`, `username`, `password`, `active`) VALUES
(3, 1, 4, NULL, 'Matar@niang', 'passer', NULL),
(4, 2, 5, NULL, 'Maps@diongue', 'passer', NULL),
(5, 3, 1, NULL, 'fadel@diouf', 'passer', NULL),
(6, 3, 1, NULL, 'passer', 'passer1234', NULL),
(7, 1, 6, NULL, 'passer', 'passer', NULL),
(8, 1, 6, NULL, 'passer', 'passer', NULL),
(9, 2, 8, NULL, 'mahtar@matar', 'passer', NULL),
(12, 2, 9, NULL, 'maps', 'passer', NULL),
(13, 3, NULL, NULL, 'passer', 'passer', NULL),
(14, 3, NULL, 26, 'passer', 'passer', NULL),
(34, 4, NULL, 56, 'aaaaa', NULL, NULL),
(35, 4, NULL, 57, 'cccc', NULL, NULL),
(37, 4, NULL, 59, 'qqq', NULL, NULL),
(38, 4, NULL, 60, 'fadel@diouf', NULL, NULL),
(40, 4, NULL, 62, 'paseerrr', 'rrrrrrrrr', NULL),
(41, 4, NULL, 62, 'passer@passer', 'rrrrrrrrr', NULL),
(42, 3, 6, NULL, 'passer', 'passer', NULL),
(43, 4, NULL, 63, 'passer@passer', 'passer', NULL),
(44, 2, 10, NULL, 'llllll', 'lllllll', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `FK_Agence_Agent` FOREIGN KEY (`Idagence`) REFERENCES `agence` (`idagence`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Agent_client` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_Client_compte` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `FK_Agent_Operation` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Association_9` FOREIGN KEY (`idtype`) REFERENCES `type` (`idtype`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Compte_Opreration` FOREIGN KEY (`idcompte`) REFERENCES `compte` (`idcompte`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_Role_User` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_User_Agent` FOREIGN KEY (`idagent`) REFERENCES `agent` (`idagent`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_client` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
