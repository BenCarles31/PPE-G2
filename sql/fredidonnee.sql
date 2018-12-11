

INSERT INTO `indemnite` (`annee`, `tarif_kilometrique`) VALUES
('0000-00-00', 1);

-- --------------------------------------------------------


INSERT INTO `ligue` (`ID_ligue`, `nom_ligue`) VALUES
(1, 'Football'),
(2, 'Basket'),
(4, 'Golf'),
(5, 'FootUS'),
(6, 'Tennis');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`ID_club`, `nom_club`, `adresse_club`, `cp`, `ville`, `sigle`, `nom_president`, `ID_ligue`) VALUES
(1, 'Toulouse Football Club', 'Stadium', '31200', 'Toulouse', 'TFC', 'Olivier Sadran', 1),
(2, 'Olympique Lyonnais', 'Groupama Stadium', '69150', 'Lyon', 'OL', 'Jean-Michel Aulas', 1),
(3, 'Club Tennis Toulousain', 'Gymnase de l\'hers', '31250', 'Balma', 'CTT', 'Jhon Doe', 6),
(4, 'Golf Club de l\'Escalet', 'Golf de l\'Escalet', '31820', 'Saint-Pierre', 'GolfdeL\'Escal', 'Michel Marchand', 4),
(5, 'Golf Club de labastide', 'Golf de Labastidet', '82370', 'Labastide-Saint-Pierre', 'GdL', 'Vincent Estieu', 4),
(6, 'Los Angeles Lakers', 'Staple Center', '99999', 'Los Angeles', 'LAL', 'Lebron James', 2),
(7, 'Cleveland Cavaliers', 'Quicken Loans Arena', '99999', 'Clevland', 'CC', 'Lebron Aussi', 2);


--
-- Déchargement des données de la table `type_utilisateur`
--

INSERT INTO `type_utilisateur` (`ID_type`, `libelle`) VALUES
(1, 'utilisateur'),
(2, 'Trésorier'),
(3, 'CRIB');

-- --------------------------------------------------------
-- --------------------------------------------------------
--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `rue`, `cp`, `Ville`, `email`, `mdp`, `ID_type`) VALUES
(1, 'Vinso', 'vinz', 'Tacos Avenue', 31100, 'Toulouse', 'vinz@email.com', 'vinzvinz', 1),
(3, 'Bernardo', 'Bernard', 'campbell', 31100, 'Toulouse', 'Bernard@mail.com', 'bed1f8891424cd749d22a3166b11f00418631f2c280580f6a81b3e08cf561e89', 1),
(5, 'vincent', 'estieu', '', 82370, 'Toulouse', 'vincent@mail.com', 'vinzvinz', 1),
(6, 'crib', 'vinz', 'Charette', 82370, 'Labastide', 'vinzCrib@mail.com', 'vinzvinz', 3),
(7, 'ben', 'carles', '', 82370, 'Toulouse', 'benCarles@mail.com', 'vinzvinz', 1),
(8, 'Pages', 'Fabien', '', 82370, 'Labastide Saint Pierre', 'fabPages@mail.com', 'vinzvinz', 1),
(9, 'Bouchir', 'otho', '', 31100, 'toulouse', 'othoBouchir@mail.com', 'vinzvinz', 1);


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
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `libelle`) VALUES
(1, 'En attente'),
(2, 'Cloturer'),
(3, 'Valider');

-- --------------------------------------------------------

--
-- Déchargement des données de la table `bordereau`
--

INSERT INTO `bordereau` (`ID_bordereau`, `date_bordereau`, `id_user`, `id_statut`) VALUES
(5, '2017-11-05', 1, 1),
(6, '2018-10-12', 7, 1),
(8, '2017-12-10', 9, 1),
(10, '2018-12-10', 1, 1);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `ligne_frais`
--

INSERT INTO `ligne_frais` (`id_ligne`, `date_frais`, `trajet`, `KM`, `cout_peages`, `cout_repas`, `cout_hebergement`, `idMotif`, `ID_bordereau`) VALUES
(1, '2018-11-09', 'tlse balma ', 25, 0, 0, 0, 5, 5),
(2, '2018-11-05', 'paris tls', 650, 0, 0, 0, 2, 5),
(3, '2018-11-19', 'Toulouse-Bressols', 42, 5.5, 12.6, 17, 4, 5),
(6, '2018-12-05', 'Toulouse-Montauban', 100, 10, 10, 10, 2, 5),
(7, '2018-12-15', 'Toulouse-Montauban', 70, 0, 0, 0, 4, 6),
(8, '2018-12-15', 'Toulouse-Montauban', 70, 0, 0, 0, 4, 6),
(9, '2018-12-10', 'Montauban-Toulouse', 45, 12.3, 0, 0, 3, 10);

-- --------------------------------------------------------







