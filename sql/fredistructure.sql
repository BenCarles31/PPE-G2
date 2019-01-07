-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 11 déc. 2018 à 11:34
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `newfredi`
--
CREATE DATABASE IF NOT EXISTS `testfredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `testfredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `num_license` int(12) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `sexe` varchar(50) COLLATE utf8_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `ID_club` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`num_license`),
  KEY `Adherent_Club_FK` (`ID_club`),
  KEY `Adherent_utilisateur0_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Structure de la table `bordereau`
--

DROP TABLE IF EXISTS `bordereau`;
CREATE TABLE IF NOT EXISTS `bordereau` (
  `ID_bordereau` int(11) NOT NULL AUTO_INCREMENT,
  `date_bordereau` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_bordereau`),
  KEY `Bordereau_utilisateur_FK` (`id_user`),
  KEY `Bordereau_statut1_FK` (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `ID_club` int(11) NOT NULL AUTO_INCREMENT,
  `nom_club` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse_club` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` varchar(50) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `sigle` varchar(50) COLLATE utf8_bin NOT NULL,
  `nom_president` varchar(50) COLLATE utf8_bin NOT NULL,
  `ID_ligue` int(11) NOT NULL,
  PRIMARY KEY (`ID_club`),
  KEY `Club_Ligue_FK` (`ID_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Structure de la table `indemnite`
--

DROP TABLE IF EXISTS `indemnite`;
CREATE TABLE IF NOT EXISTS `indemnite` (
  `annee` date NOT NULL,
  `tarif_kilometrique` float NOT NULL,
  PRIMARY KEY (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Structure de la table `ligne_frais`
--

DROP TABLE IF EXISTS `ligne_frais`;
CREATE TABLE IF NOT EXISTS `ligne_frais` (
  `id_ligne` int(11) NOT NULL AUTO_INCREMENT,
  `date_frais` date NOT NULL,
  `trajet` varchar(50) COLLATE utf8_bin NOT NULL,
  `KM` int(11) NOT NULL,
  `cout_peages` float NOT NULL,
  `cout_repas` float NOT NULL,
  `cout_hebergement` float NOT NULL,
  `idMotif` int(11) NOT NULL,
  `ID_bordereau` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne`),
  KEY `ligne_frais_Motif_FK` (`idMotif`),
  KEY `ligne_frais_Bordereau0_FK` (`ID_bordereau`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE IF NOT EXISTS `ligue` (
  `ID_ligue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ligue` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ligue`
--


--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE IF NOT EXISTS `motif` (
  `idMotif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idMotif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



--
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `rue` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` int(11) NOT NULL,
  `Ville` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `mdp` varchar(100) COLLATE utf8_bin NOT NULL,
  `ID_type` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `utilisateur_type_utilisateur_FK` (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `Adherent_Club_FK` FOREIGN KEY (`ID_club`) REFERENCES `club` (`ID_club`),
  ADD CONSTRAINT `Adherent_utilisateur0_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `bordereau`
--
ALTER TABLE `bordereau`
  ADD CONSTRAINT `Bordereau_statut1_FK` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id_statut`),
  ADD CONSTRAINT `Bordereau_utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `Club_Ligue_FK` FOREIGN KEY (`ID_ligue`) REFERENCES `ligue` (`ID_ligue`);

--
-- Contraintes pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD CONSTRAINT `ligne_frais_Bordereau0_FK` FOREIGN KEY (`ID_bordereau`) REFERENCES `bordereau` (`ID_bordereau`),
  ADD CONSTRAINT `ligne_frais_Motif_FK` FOREIGN KEY (`idMotif`) REFERENCES `motif` (`idMotif`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_type_utilisateur_FK` FOREIGN KEY (`ID_type`) REFERENCES `type_utilisateur` (`ID_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
