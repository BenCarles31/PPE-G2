-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 15 oct. 2018 à 14:07
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE IF NOT EXISTS `adherent` (
  `num_license` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `ID_club` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`num_license`),
  KEY `Adherent_Club_FK` (`ID_club`),
  KEY `Adherent_utilisateur0_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`num_license`, `nom`, `prenom`, `sexe`, `date_naissance`, `ID_club`, `id_user`) VALUES
('1234', 'vinz', 'vinso', 0, '2018-10-25', 1, 1),
('6548', 'nique', 'ta mere le batiment f', 0, '2018-10-13', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bordereau`
--

CREATE TABLE IF NOT EXISTS `bordereau` (
  `ID_bordereau` int(11) NOT NULL AUTO_INCREMENT,
  `date_bordereau` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`ID_bordereau`),
  KEY `Bordereau_utilisateur_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `ID_club` int(11) NOT NULL AUTO_INCREMENT,
  `nom_club` varchar(50) NOT NULL,
  `adresse_club` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `nom_president` varchar(50) NOT NULL,
  `id_ligue` int(11) NOT NULL,
  PRIMARY KEY (`ID_club`),
  KEY `Club_ligue_FK` (`id_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`ID_club`, `nom_club`, `adresse_club`, `cp`, `ville`, `sigle`, `nom_president`, `id_ligue`) VALUES
(1, 'CLUB_1', 'adresse_club_1', 'cp_club_1', 'ville_club_1', 'sigle_1', 'president_club_1', 1),
(2, 'CLUB_2', 'adresse_club_2', 'cp_club_2', 'ville_club_2', 'sigle_2', 'president_club_2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `indemnite`
--

CREATE TABLE IF NOT EXISTS `indemnite` (
  `annee` date NOT NULL,
  `tarif_kilometrique` float NOT NULL,
  PRIMARY KEY (`annee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `indemnite`
--

INSERT INTO `indemnite` (`annee`, `tarif_kilometrique`) VALUES
('0000-00-00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_frais`
--

CREATE TABLE IF NOT EXISTS `ligne_frais` (
  `id_ligne` int(11) NOT NULL AUTO_INCREMENT,
  `date_frais` date NOT NULL,
  `trajet` varchar(50) DEFAULT NULL,
  `KM` int(11) DEFAULT NULL,
  `cout_peages` float DEFAULT NULL,
  `cout_repas` float DEFAULT NULL,
  `cout_hebergement` float DEFAULT NULL,
  `idMotif` int(11) NOT NULL,
  `ID_bordereau` int(11) NOT NULL,
  PRIMARY KEY (`id_ligne`),
  KEY `ligne_frais_Motif_FK` (`idMotif`),
  KEY `ligne_frais_Bordereau0_FK` (`ID_bordereau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE IF NOT EXISTS `ligue` (
  `id_ligue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ligue` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `nom_ligue`) VALUES
(1, 'ligue_1');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE IF NOT EXISTS `motif` (
  `idMotif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idMotif`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`idMotif`, `libelle`) VALUES
(1, 'motif_1'),
(2, 'motif_2'),
(3, 'motif_3');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID_type`, `libelle`) VALUES
(1, 'utilisateur'),
(2, 'Trésorier'),
(3, 'CRIB');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `ID_type` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `utilisateur_type_utilisateur_FK` (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `rue`, `cp`, `Ville`, `email`, `mdp`, `ID_type`) VALUES
(1, 'Vinso', 'Vinz', 'Charette', '31100', 'TLS', 'Vinso.vinz@mail.com', 'vinzvinz', 1),
(3, 'Bernardo', 'Bernard', 'campbell', '31100', 'Toulouse', 'Bernard@mail.com', 'bed1f8891424cd749d22a3166b11f00418631f2c280580f6a81b3e08cf561e89', 1);

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
  ADD CONSTRAINT `Bordereau_utilisateur_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `Club_ligue_FK` FOREIGN KEY (`id_ligue`) REFERENCES `ligue` (`id_ligue`);

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
