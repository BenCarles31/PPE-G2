-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 10 déc. 2018 à 13:19
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.1.23

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
CREATE DATABASE IF NOT EXISTS `newfredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `newfredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE IF NOT EXISTS `adherent` (
  `num_license` int(11) NOT NULL,
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
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`num_license`, `nom`, `prenom`, `sexe`, `date_naissance`, `ID_club`, `id_user`) VALUES
(666, 'Diablo', 'Diablo', '0', '2018-11-14', 2, 1),
(1234, 'vinz', 'vinso', '0', '2018-10-25', 1, 1),
(6548, 'nique', 'ta mere le batiment f', '0', '2018-10-13', 2, 1),
(456987, 'benjamin', 'carles', '1', '2000-12-21', 1, 5),
(63524178, 'vincent', 'estieu', '1', '1996-12-11', 2, 5),
(987654321, 'Vinso', 'adherentVinz', '1', '2018-11-14', 2, 1),
(1234567891, 'Centvingt', 'Jean', '1', '1998-01-21', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bordereau`
--

CREATE TABLE IF NOT EXISTS `bordereau` (
  `ID_bordereau` int(11) NOT NULL AUTO_INCREMENT,
  `date_bordereau` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_statut` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_bordereau`),
  KEY `Bordereau_utilisateur_FK` (`id_user`),
  KEY `Bordereau_statut1_FK` (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `bordereau`
--

INSERT INTO `bordereau` (`ID_bordereau`, `date_bordereau`, `id_user`, `id_statut`) VALUES
(5, '2018-11-05', 1, 1),
(6, '2018-10-12', 7, 1);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`ID_club`, `nom_club`, `adresse_club`, `cp`, `ville`, `sigle`, `nom_president`, `ID_ligue`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Déchargement des données de la table `ligne_frais`
--

INSERT INTO `ligne_frais` (`id_ligne`, `date_frais`, `trajet`, `KM`, `cout_peages`, `cout_repas`, `cout_hebergement`, `idMotif`, `ID_bordereau`) VALUES
(1, '2018-11-09', 'tlse balma ', 25, 0, 0, 0, 5, 5),
(2, '2018-11-05', 'paris tls', 650, 0, 0, 0, 2, 5),
(3, '2018-11-19', 'Toulouse-Bressols', 42, 5.5, 12.6, 17, 4, 5),
(6, '2018-12-05', 'Toulouse-Montauban', 100, 10, 10, 10, 2, 5),
(7, '2018-12-15', 'Toulouse-Montauban', 70, 0, 0, 0, 4, 6),
(8, '2018-12-15', 'Toulouse-Montauban', 70, 0, 0, 0, 4, 6);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

CREATE TABLE IF NOT EXISTS `ligue` (
  `ID_ligue` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ligue` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_ligue`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`ID_ligue`, `nom_ligue`) VALUES
(1, 'ligue_1');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE IF NOT EXISTS `motif` (
  `idMotif` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idMotif`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`idMotif`, `libelle`) VALUES
(1, 'Réunion'),
(2, 'Compétition régionale'),
(3, 'Compétition nationale'),
(4, 'Compétition internationnale'),
(5, 'Stage');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `libelle`) VALUES
(1, 'En attente'),
(2, 'Cloturer');

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateur`
--

CREATE TABLE IF NOT EXISTS `type_utilisateur` (
  `ID_type` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `rue`, `cp`, `Ville`, `email`, `mdp`, `ID_type`) VALUES
(1, 'Vinso', 'vinz', 'Tacos Avenue', 31100, 'Toulouse', 'vinz@email.com', 'vinzvinz', 1),
(3, 'Bernardo', 'Bernard', 'campbell', 31100, 'Toulouse', 'Bernard@mail.com', 'bed1f8891424cd749d22a3166b11f00418631f2c280580f6a81b3e08cf561e89', 1),
(5, 'vincent', 'estieu', '', 82370, 'Toulouse', 'vincent@mail.com', 'vinzvinz', 1),
(6, 'crib', 'vinz', 'Charette', 82370, 'Labastide', 'vinzCrib@mail.com', 'vinzvinz', 3),
(7, 'ben', 'carles', '', 82370, 'Toulouse', 'benCarles@mail.com', 'vinzvinz', 1),
(8, 'Pages', 'Fabien', '', 82370, 'Labastide Saint Pierre', 'fabPages@mail.com', 'vinzvinz', 1);

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
