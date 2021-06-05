-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juin 2021 à 13:47
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
