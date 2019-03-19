
INSERT INTO `indemnite` (`annee`, `tarif_kilometrique`) VALUES
('2018-00-00' ,1),
('2000-01-01' ,1),
('2002-01-01' ,2),
('2019-01-01' ,10);

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
(1, 'Toulouse Football Club' , 'Stadium' , '31200' , 'Toulouse' , 'TFC' , 'Olivier Sadran' , 1),
(2, 'Olympique Lyonnais' , 'Groupama Stadium' , '69150' , 'Lyon' , 'OL' , 'Jean-Michel Aulas' , 1),
(3, 'Club Tennis Toulousain' , "Gymnase de l\'hers" , '31250' , 'Balma' , 'CTT' , 'Jhon Doe' , 6),
(4, ,"Golf Club de l\'Escalet", "Golf de l\'Escalet" , '31820' , 'Saint-Pierre' , "GolfdeL\'Escal" , 'Michel Marchand' , 4),
(5, 'Golf Club de labastide' , 'Golf de Labastidet' , '82370' , 'Labastide-Saint-Pierre' , 'GdL' , 'Vincent Estieu' , 4),
(6, 'Los Angeles Lakers' , 'Staple Center' , '99999' , 'Los Angeles' , 'LAL' , 'Lebron James' , 2),
(7, 'Cleveland Cavaliers' , 'Quicken Loans Arena' , '99999' , 'Clevland' , 'CC' , 'Lebron Aussi' , 2);


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
(1, 'Vinso' , 'vinz' , 'Tacos Avenue' , 31100, 'Toulouse' , 'vinz@email.com' , 'vinzvinz' , 1),
(2, 'Bernardo' , 'Bernard' , 'campbell' , 31100, 'Toulouse' , 'Bernard@mail.com' , 'bed1f8891424cd749d22a3166b11f00418631f2c280580f6a81b3e08cf561e89' , 1),
(3, 'vincent' , 'estieu' , '' , 82370, 'Toulouse' , 'vincent@mail.com' , 'vinzvinz' , 1),
(4, 'crib' , 'vinz' , 'Charette' , 82370, 'Labastide' , 'vinzCrib@mail.com' , 'vinzvinz' , 3),
(5, 'ben' , 'carles' , '' , 82370, 'Toulouse' , 'benCarles@mail.com' , 'vinzvinz' , 1),
(6, 'Pages' , 'Fabien' , '' , 82370, 'Labastide Saint Pierre' , 'fabPages@mail.com' , 'vinzvinz' , 1),
(7, 'Bouchir' , 'otho' , '' , 31100, 'toulouse' , 'othoBouchir@mail.com' , 'vinzvinz' , 1),
(8,'BANDILELLA' ,'CLEMENT' ,'30 rue Widric 1er' ,54600,'Villers lès Nancy' ,'bandilella.clement@gmail.com' ,'ppe_g2' ,1),
(9,'BERBIER' ,'LUCILLE' ,'12 rue de Marron' ,54600,'Villers lès Nancy' ,'berbier.lucille@gmail.com' ,'ppe_g2' ,1),
(10,'BERBIER' ,'THEO' ,'12 rue de Marron' ,54600,'Villers lès Nancy' ,'berbier.theo@gmail.com' ,'ppe_g2' ,1),
(11,'BECKER' ,'ROMAIN' ,'1 rue des Mésanges' ,54600,'Villers lès Nancy' ,'becker.romain@gmail.com' ,'ppe_g2' ,1),
(12,'BIACQUEL' ,'VERONIQUE' ,'27 rue de Santifontaine' ,54000,'Nancy' ,'biacquel.veronique@gmail.com' ,'ppe_g2' ,1),
(13,'BIDELOT' ,'BRIGITTE' ,'5 rue des trois épis' ,54600,'Villers lès Nancy' ,'biacquel.veronique@gmail.com' ,'ppe_g2' ,1),
(14,'BIDELOT' ,'JULIE' ,'5 rue des trois épis' ,54600,'Villers lès Nancy' ,'bidelot.julie@gmail.com' ,'ppe_g2' ,1),
(15,'BILLOT' ,'DIDIER' ,'6 rue de la Sapinière' ,54600,'Villers lès Nancy' ,'billot.didier@gmail.com' ,'ppe_g2' ,1),
(16,'BILLOT' ,'CLAIRE' ,'6 rue de la Sapinière' ,54600,'Villers lès Nancy' ,'billot.claire@gmail.com' ,'ppe_g2' ,1),
(17,'BILLOT' ,'MARIANNE' ,'6 rue de la Sapinière' ,54600,'Villers lès Nancy' ,'binnet.marius@gmail.com' ,'ppe_g2' ,1),
(18,'BINNET' ,'MARIUS' ,'12 rue Edouard Grosjean' ,54520,'Laxou' ,'binnet.marius@gmail.com' ,'ppe_g2' ,1),
(19,'CALDI' ,'THOMAS' ,'12 rue de Malzéville' ,54000,'Nancy' ,'caldi.thomas@gmail.com' ,'ppe_g2' ,1),
(20,'CASTEL' ,'TIMOTHE' ,"26 rue de l'abbé Didelot" ,54600,'Villers lès Nancy' ,'castel.timothe@gmail.com' ,'ppe_g2' ,1),
(21,'CHEOLLE' ,'NICOLAS' ,"46 rue de l'abbé Didelot" ,54520,'Laxou' ,'cheolle.nicolas@gmail.com' ,'ppe_g2' ,1),
(22,'CHERPION' ,'UGO' ,'63 rue Français' ,54000,'Nancy' ,'cherpion.ugo@gmail.com' ,'ppe_g2' ,1),
(23,'CHEVOITINE' ,'LOUIS' ,'40 rue de la république' ,54320,'Maxéville' ,'chevoitine.louis@gmail.com' ,'ppe_g2' ,1),
(24,'CHOUARNO' ,'TOM' ,'168 avenue de Boufflers' ,54000,'Nancy' ,'chouarno.tom@gmail.com' ,'ppe_g2' ,1),
(25,'COTIN' ,'FLORIAN' ,'14 route de Toul' ,54113,'Blenod les toul' ,'cotin.florian@gmail.com' ,'ppe_g2' ,1),
(26,'DEPERRIN' ,'ARNAUD' ,'40 rue Paul Bert' ,54600,'Villers lès Nancy' ,'deperrin.arnaud@gmail.com' ,'ppe_g2' ,1),
(27,'DEPRETRE' ,'BEATRICE' ,'26 rue du petit étang' ,54110,'Buissoncourt' ,'depretre.beatrice@gmail.com' ,'ppe_g2' ,1),
(28,'DUCRICK' ,'AUGUSTIN' ,'31 rue du chanoine Pierron' ,54600,'Villers lès nancy' ,'ducrik.augustin@gmail.com' ,'ppe_g2' ,1),
(29,'GARBILLON' ,'GILLES' ,'31 avenue de Marron' ,54600,'Villers lès Nancy' ,'garbrillon.gilles@gmail.com' ,'ppe_g2' ,1),
(30,'GARBILLON' ,'YANN' ,'31 avenue de Marron' ,54600,'Villers lès Nancy' ,'garbrillon.yann@gmail.com' ,'ppe_g2' ,1),
(31,'HAGENBACH' ,'CLEMENTINE' ,'19 rue de Lavaux' ,54520,'Laxou' ,'hagenbach.clementine@gmail.com' ,'ppe_g2' ,1),
(32,'HASFELD' ,'AUXANE' ,"32 allée de l'observatoire" ,54520,'Laxou', 'hasfeld.auxane@gmail.com' ,'ppe_g2' ,1),
(33,'HUMERT' ,'ISABELLE' ,'4 rue du maréchal Galliéni' ,54600,'Villers lès Nancy' ,'humert.isabelle@gmail.com' ,'ppe_g2' ,1),
(34,'LAFIEGLON' ,'CLEMENT' ,'62 avenue Paul Déroulède' ,54600,'Villers lès Nancy' ,'lafieglon.clement@gmail.com' ,'ppe_g2' ,1),
(35,'LAMOINE' ,'GREGOIRE' ,'65 rue de la sivrite' ,54600,'Villers lès Nancy' ,'lamoine.gregoire@gmail.com' ,'ppe_g2' ,1),
(36,'LANIELLE' ,'NICOLAS' ,'10 rue des orchidées' ,54600,'Villers les Nancy' ,'lanielle.nicolas@gmail.com' ,'ppe_g2' ,1),
(37,'LIEVIN' ,'NATHAN' ,'42 rue de la commanderie' ,54840,'Sexey les bois' ,'lievin.nathan@gmail.com' ,'ppe_g2' ,1),
(38,'LOTANG' ,'CYPRIEN' ,'16 rue de Gerbéviller' ,54000,'Nancy' ,'lotang.cyprien@gmail.com' ,'ppe_g2' ,1),
(39,'LUQUE' ,'ETIENNE' ,'1 rue de Normandie' ,54500,'Vandoeuvre' ,'luque.etienne@gmail.com' ,'ppe_g2' ,1),
(40,'PERNOT' ,'PAUL' ,'6 rue Winston Churchill' ,54000,'Nancy' ,'pernot.paul@gmail.com' ,'ppe_g2' ,1),
(41,'REMILLON' ,'ELIOT' ,"3 rue de l'Embanie" ,54520,'Laxou' ,'remillon.eliot@gmail.com' ,'ppe_g2' ,1),
(42,'SILBERT' ,'GILLES' ,'2 grande rue' ,54210,'Azelot' ,'silbert.gilles@gmail.com' ,'ppe_g2' ,1),
(43,'SILBERT' ,'LEA' ,'1 allée du cénacle' ,54520,'Laxou' ,'silbert.lea@gmail.com' ,'ppe_g2' ,1),
(44,'TORTEMANN' ,'PIERRE' ,'34 rue de Badonviller' ,54000,'Nancy' ,'tortemann.pierre@gmail.com' ,'ppe_g2' ,1),
(45,'ZOECKEL' ,'MATHIEU' ,'15 rue de la Seille' ,54320,'Maxéville' ,'zoeckel.mathieu@gmail.com' ,'ppe_g2' ,1),
(46,'ZUEL' ,'STEPHANIE' ,'8 sentier de Saint-Arriant' ,54520,'Laxou' ,'zuel.stephanie@gmail.com' ,'ppe_g2' ,1),
(47,'ZUERO' ,'THOMAS' ,'immeuble Savoie' ,54520,'Laxou' ,'zuero.thomas@gmail.com' ,'ppe_g2' ,1);

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`num_license`, `nom`, `prenom`, `sexe`, `date_naissance`, `ID_club`, `id_user`) VALUES
(666, 'Diablo' , 'Diablo' , '0' , '2018-11-14' , 2, 1),
(1234, 'vinz' , 'vinso' , '0' , '2018-10-25' , 1, 1),
(6548, 'nique' , 'ta mere le batiment f' , '0' , '2018-10-13' , 2, 1),
(456987, 'benjamin' , 'carles' , '1' , '2000-12-21' , 1, 5),
(63524178, 'vincent' , 'estieu' , '1' , '1996-12-11' , 2, 5),
(987654321, 'Vinso' , 'adherentVinz' , '1' , '2018-11-14' , 2, 1),
(1234567891, 'Centvingt' , 'Jean' , '1' , '1998-01-21' , 1, 1),
(1705401443,'BANDILELLA' ,'CLEMENT' ,'M' ,'1998-07-26' ,1,8),
(1754000340,'BERBIER' ,'LUCILLE' ,'F' ,'1998-03-24' ,1,9),
(1704010338,'BERBIER' ,'THEO' ,'M' ,'1998-03-24' ,1,10),
(1705010309,'BECKER' ,'ROMAIN' ,'M' ,'1998-03-28' ,1,11),
(1705010334,'BIACQUEL' ,'VERONIQUE' ,'F' ,'1962-12-09' ,1,12),
(1705401039,'BIDELOT' ,'BRIGITTE' ,'F' ,'1958-09-20' ,1,13),
(1705400042,'BIDELOT' ,'JULIE' ,'F' ,'1991-11-30' ,1,14),
(1705400108,'BILLOT' ,'DIDIER' ,'M' ,'1962-09-24' ,1,15),
(1705400139,'BILLOT' ,'CLAIRE' ,'F' ,'1963-06-07' ,1,16),
(1705400025,'BILLOT' ,'MARIANNE' ,'F' ,'1986-09-28' ,1,17),
(1705410407,'BINNET' ,'MARIUS' ,'M' ,'1997-08-21' ,1,18),
(1754010444,'CALDI' ,'THOMAS' ,'M' ,'1998-09-22' ,1,19),
(1700010431,'CASTEL' ,'TIMOTHE' ,'M' ,'1998-06-10' ,1,20),
(1704010428,'CHEOLLE' ,'NICOLAS' ,'M' ,'1983-04-19' ,1,21),
(1705401041,'CHERPION' ,'UGO' ,'M' ,'1999-09-24' ,1,22),
(1705401841,'CHEVOITINE' ,'LOUIS' ,'M' ,'1998-03-29' ,1,23),
(1705400040,'CHOUARNO' ,'TOM' ,'M' ,'1999-08-02' ,1,24),
(1705400102,'COTIN' ,'FLORIAN' ,'M' ,'1995-04-15' ,1,25),
(1705400031,'DEPERRIN' ,'ARNAUD' ,'M' ,'1982-12-31' ,1,26),
(1705401040,'DEPRETRE' ,'BEATRICE' ,'F' ,'1998-01-27' ,1,27),
(1704010446,'DUCRICK' ,'AUGUSTIN' ,'M' ,'1996-12-03' ,1,28),
(1705010395,'GARBILLON' ,'GILLES' ,'M' ,'1963-07-08' ,1,39),
(1704010337,'GARBILLON' ,'YANN' ,'M' ,'1994-03-21' ,1,30),
(1754000382,'HAGENBACH' ,'CLEMENTINE' ,'F' ,'1997-11-26' ,1,31),
(1754001042,'HASFELD' ,'AUXANE' ,'F' ,'1999-03-08' ,1,32),
(1704001031,'HUMERT' ,'ISABELLE' ,'F' ,'1976-06-04' ,1,33),
(1705001032,'LAFIEGLON' ,'CLEMENT' ,'M' ,'2002-11-16' ,1,34),
(1705401429,'LAMOINE' ,'GREGOIRE' ,'M' ,'1993-07-23' ,1,35),
(1705400419,'LANIELLE' ,'NICOLAS' ,'M' ,'1998-09-02' ,1,36),
(1705401401,'LIEVIN' ,'NATHAN' ,'M' ,'1997-01-24' ,1,37),
(1705401439,'LOTANG' ,'CYPRIEN' ,'M' ,'1999-09-30' ,1,38),
(1700010834,'LUQUE' ,'ETIENNE' ,'M' ,'1951-12-26' ,1,39),
(1754001033,'PERNOT' ,'PAUL' ,'M' ,'1996-04-26' ,1,40),
(1780010438,'REMILLON' ,'ELIOT' ,'M' ,'2001-11-13' ,1,41),
(1705001011,'SILBERT' ,'GILLES' ,'M' ,'1957-01-03' ,1,42),
(1705401047,'SILBERT' ,'LEA' ,'F' ,'2000-04-14' ,1,43),
(1705401405,'TORTEMANN' ,'PIERRE' ,'M' ,'1997-10-13' ,1,44),
(1705400437,'ZOECKEL' ,'MATHIEU' ,'M' ,'2000-06-02' ,1,45),
(1705401018,'ZUEL' ,'STEPHANIE' ,'F' ,'1970-09-25' ,1,46),
(1705401048,'ZUERO' ,'THOMAS' ,'M' ,'2000-08-14' ,1,47);
-----------------------------------------------------------



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
(5, '2017-11-05' , 1, 1),
(6, '2018-10-12' , 7, 1),
(8, '2017-12-10' , 9, 1),
(10, '2018-12-10' , 1, 1);

-- --------------------------------------------------------
--
-- Déchargement des données de la table `ligne_frais`
--

INSERT INTO `ligne_frais` (`id_ligne`, `date_frais`, `trajet`, `KM`, `cout_peages`, `cout_repas`, `cout_hebergement`, `idMotif`, `ID_bordereau`) VALUES
(1, '2018-11-09' , 'tlse balma ' , 25, 0, 0, 0, 5, 5),
(2, '2018-11-05' , 'paris tls' , 650, 0, 0, 0, 2, 5),
(3, '2018-11-19' , 'Toulouse-Bressols' , 42, 5.5, 12.6, 17, 4, 5),
(6, '2018-12-05' , 'Toulouse-Montauban' , 100, 10, 10, 10, 2, 5),
(7, '2018-12-15' , 'Toulouse-Montauban' , 70, 0, 0, 0, 4, 6),
(8, '2018-12-15' , 'Toulouse-Montauban' , 70, 0, 0, 0, 4, 6),
(9, '2018-12-10' , 'Montauban-Toulouse' , 45, 12.3, 0, 0, 3, 10);

-- --------------------------------------------------------
