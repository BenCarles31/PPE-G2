-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 05 nov. 2018 à 15:16
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
-- Base de données :  `fredi`
--
CREATE DATABASE IF NOT EXISTS `fredi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredi`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE `adherent` (
  `num_license` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` tinyint(1) NOT NULL,
  `date_naissance` date NOT NULL,
  `ID_club` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`num_license`, `nom`, `prenom`, `sexe`, `date_naissance`, `ID_club`, `id_user`) VALUES
('1234', 'vinz', 'vinso', 0, '2018-10-25', 1, 1),
('6548', 'nique', 'ta mere le batiment f', 0, '2018-10-13', 2, 1),
('666', 'Diablo', 'Diablo', 0, '2018-11-14', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `bordereau`
--

DROP TABLE IF EXISTS `bordereau`;
CREATE TABLE `bordereau` (
  `ID_bordereau` int(11) NOT NULL,
  `date_bordereau` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bordereau`
--

INSERT INTO `bordereau` (`ID_bordereau`, `date_bordereau`, `id_user`) VALUES
(5, '2018-11-05', 1);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE `club` (
  `ID_club` int(11) NOT NULL,
  `nom_club` varchar(50) NOT NULL,
  `adresse_club` varchar(50) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `sigle` varchar(50) NOT NULL,
  `nom_president` varchar(50) NOT NULL,
  `id_ligue` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `indemnite`;
CREATE TABLE `indemnite` (
  `annee` date NOT NULL,
  `tarif_kilometrique` float NOT NULL
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

DROP TABLE IF EXISTS `ligne_frais`;
CREATE TABLE `ligne_frais` (
  `id_ligne` int(11) NOT NULL,
  `date_frais` date NOT NULL,
  `trajet` varchar(50) DEFAULT NULL,
  `KM` int(11) DEFAULT NULL,
  `cout_peages` float DEFAULT NULL,
  `cout_repas` float DEFAULT NULL,
  `cout_hebergement` float DEFAULT NULL,
  `idMotif` int(11) NOT NULL,
  `ID_bordereau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligne_frais`
--

INSERT INTO `ligne_frais` (`id_ligne`, `date_frais`, `trajet`, `KM`, `cout_peages`, `cout_repas`, `cout_hebergement`, `idMotif`, `ID_bordereau`) VALUES
(1, '2018-11-09', 'tlse balma ', 25, 0, 0, 0, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ligue`
--

DROP TABLE IF EXISTS `ligue`;
CREATE TABLE `ligue` (
  `id_ligue` int(11) NOT NULL,
  `nom_ligue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligue`
--

INSERT INTO `ligue` (`id_ligue`, `nom_ligue`) VALUES
(1, 'ligue_1');

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

DROP TABLE IF EXISTS `motif`;
CREATE TABLE `motif` (
  `idMotif` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Structure de la table `type_utilisateur`
--

DROP TABLE IF EXISTS `type_utilisateur`;
CREATE TABLE `type_utilisateur` (
  `ID_type` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE `utilisateur` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `rue` varchar(100) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `ID_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `rue`, `cp`, `Ville`, `email`, `mdp`, `ID_type`) VALUES
(1, 'Vinso', 'Vinz', 'Charette', '31100', 'TLS', 'Vinso.vinz@mail.com', 'vinzvinz', 1),
(3, 'Bernardo', 'Bernard', 'campbell', '31100', 'Toulouse', 'Bernard@mail.com', 'bed1f8891424cd749d22a3166b11f00418631f2c280580f6a81b3e08cf561e89', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`num_license`),
  ADD KEY `Adherent_Club_FK` (`ID_club`),
  ADD KEY `Adherent_utilisateur0_FK` (`id_user`);

--
-- Index pour la table `bordereau`
--
ALTER TABLE `bordereau`
  ADD PRIMARY KEY (`ID_bordereau`),
  ADD KEY `Bordereau_utilisateur_FK` (`id_user`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`ID_club`),
  ADD KEY `Club_ligue_FK` (`id_ligue`);

--
-- Index pour la table `indemnite`
--
ALTER TABLE `indemnite`
  ADD PRIMARY KEY (`annee`);

--
-- Index pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  ADD PRIMARY KEY (`id_ligne`),
  ADD KEY `ligne_frais_Motif_FK` (`idMotif`),
  ADD KEY `ligne_frais_Bordereau0_FK` (`ID_bordereau`);

--
-- Index pour la table `ligue`
--
ALTER TABLE `ligue`
  ADD PRIMARY KEY (`id_ligue`);

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`idMotif`);

--
-- Index pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  ADD PRIMARY KEY (`ID_type`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `utilisateur_type_utilisateur_FK` (`ID_type`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bordereau`
--
ALTER TABLE `bordereau`
  MODIFY `ID_bordereau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `ID_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ligne_frais`
--
ALTER TABLE `ligne_frais`
  MODIFY `id_ligne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `ligue`
--
ALTER TABLE `ligue`
  MODIFY `id_ligue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `idMotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `type_utilisateur`
--
ALTER TABLE `type_utilisateur`
  MODIFY `ID_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
