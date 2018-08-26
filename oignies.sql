-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 26 Août 2018 à 19:22
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `oignies`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceuil`
--

CREATE TABLE `acceuil` (
  `id_acceuil` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `soustitre` text NOT NULL,
  `path_photo` varchar(256) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `horaires` text NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `commentaires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `acceuil`
--

INSERT INTO `acceuil` (`id_acceuil`, `titre`, `soustitre`, `path_photo`, `tel`, `fax`, `adresse`, `horaires`, `visible`, `commentaires`) VALUES
(1, 'Le service accueil de la mairie de Oignies', 'Sans aucun doute le service avec lequel les usagers sont le plus en contact', 'assets/site/img/about/Accueil-de-la-Mairie.jpg', '03 21 74 80 50', '03 21 37 32 59', 'Mairie de Oignies<br>\r\n                  Place de la IVème République<br>\r\n                  62590 Oignies<br>', 'Du lundi au vendredi :<br>\r\n                  de 8 H 30 à 12 H 00 et de 13 H 30 à 17 H 30<br>\r\n                  Le samedi :<br>\r\n                  de 9H 00 à 12 H 00<br>\r\n                  (Permanences des Adjoints – sur RDV)', 1, 'Les agents du service accueil sont chargés de répondre au téléphone, d’orienter les demandes vers le service concerné et sont également responsables de l’accueil physique des visiteurs de la mairie.');

-- --------------------------------------------------------

--
-- Structure de la table `arretes_municipaux`
--

CREATE TABLE `arretes_municipaux` (
  `id_muni` int(11) NOT NULL,
  `path` varchar(256) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `arretes_municipaux`
--

INSERT INTO `arretes_municipaux` (`id_muni`, `path`, `annee`) VALUES
(1, '/ressources/uploads/arretes/2018/Arrêté-signalisation_-rue-des-Tulipes-.pdf', 2018),
(2, '/ressources/uploads/arretes/2018/Arrêté-signalisation_-rue-V.-Hugo-.pdf', 2018),
(3, '/ressources/uploads/arretes/2018/Arrêté-trvx-BHNS.pdf', 2018),
(4, '/ressources/uploads/arretes/2018/CMCF-28-juillet-au-27-août-2018-.pdf', 2018),
(5, '/ressources/uploads/arretes/2017/Parcours-du-coeur_animations-place-Poste.pdf', 2017),
(6, '/ressources/uploads/arretes/2017/Marché-Puces-APE-Pasteur-.pdf', 2017),
(7, '/ressources/uploads/arretes/2017/Terrasse-café-Le-Bellevue-.pdf', 2017),
(8, '/ressources/uploads/arretes/2017/Occupation-temporaire-domaine-public_Assemblée-Générale-Crédit-Mutuel.pdf', 2017),
(9, '/ressources/uploads/arretes/2016/Marché-aux-Puces_-Amicale-du-Personnel.pdf', 2016),
(10, '/ressources/uploads/arretes/2016/Depôt-de-gerbe-Journée-Nationale-du-Souvenir.pdf', 2016),
(11, '/ressources/uploads/arretes/2016/Fête-foraine_Pâques.pdf', 2016),
(12, '/ressources/uploads/arretes/2016/Terrasse_CHAMARI-Bar-.pdf', 2016),
(13, '/ressources/uploads/arretes/2015/EFS-annonces.pdf', 2015),
(14, '/ressources/uploads/arretes/2015/EFS-Statt-camion-rue-Renan.pdf', 2015),
(15, '/ressources/uploads/arretes/2015/EFS-Statt-car-sur-la-Place.pdf', 2015),
(16, '/ressources/uploads/arretes/2015/Stationnement-camion-OUTIROR_16-mars-2015.pdf', 2015);

-- --------------------------------------------------------

--
-- Structure de la table `deliberations`
--

CREATE TABLE `deliberations` (
  `id_deliberations` int(11) NOT NULL,
  `date` varchar(60) NOT NULL,
  `path_photo` varchar(256) NOT NULL,
  `path_cr` varchar(256) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `deliberations`
--

INSERT INTO `deliberations` (`id_deliberations`, `date`, `path_photo`, `path_cr`, `annee`) VALUES
(1, '22 mars', 'assets/img/portfolio/mars.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Mars-2018-intervention-sign%C3%A9e.pdf', 2018),
(2, '23 janvier', 'assets/img/portfolio/janvier.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Janvier-2017.pdf', 2017),
(3, '4 avril ', 'assets/img/portfolio/avril.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Avril-2017.pdf', 2017),
(4, '30 mai ', 'assets/img/portfolio/mai.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Mai-2017.pdf', 2017),
(6, '30 juin', 'assets/img/portfolio/juin.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Juin-2017.pdf', 2017),
(7, '14 octobre', 'assets/img/portfolio/octobre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-octobre-2017-Election-Maire.pdf', 2017),
(8, '19 octobre', 'assets/img/portfolio/octobre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Octobre-2017-Election-Adjoints.pdf', 2017),
(9, '13 novembre', 'assets/img/portfolio/novembre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-novembre-2017.pdf', 2017),
(10, '19 decembre', 'assets/img/portfolio/decembre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Décembre-2017.pdf', 2017),
(11, '12 fevrier', 'assets/img/portfolio/fevrier.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-12-février-2014.pdf', 2014),
(12, '29 mars', 'assets/img/portfolio/mars.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-29-MARS-2014.pdf', 2014),
(13, '15 avril', 'assets/img/portfolio/avril.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-15-avril-2014', 2014),
(14, '5 juin', 'assets/img/portfolio/juin.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-5-juin-2014.pdf', 2014),
(15, '25 septembre', 'assets/img/portfolio/septembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-CM-du-25-septembre-2013.pdf', 2013),
(16, '27 novembre', 'assets/img/portfolio/novembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-27-novembre-20131.pdf', 2013),
(17, '12 décembre', 'assets/img/portfolio/decembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-12-décembre-2013.pdf', 2013);

-- --------------------------------------------------------

--
-- Structure de la table `elus`
--

CREATE TABLE `elus` (
  `id_elus` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `path_photo` varchar(256) NOT NULL,
  `fonction` text NOT NULL,
  `delegue` tinyint(1) NOT NULL,
  `municipaux` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `elus`
--

INSERT INTO `elus` (`id_elus`, `nom`, `prenom`, `path_photo`, `fonction`, `delegue`, `municipaux`) VALUES
(1, 'Dupuis', 'Fabienne', '/assets/img/about/Fabienne-Dupuis.gif', 'Maire de Oignies', 0, 0),
(2, 'Boigelot', 'Alain', '/assets/img/about/Boigelot-Alain.gif', '1er Adjoint aux finances et à la sécurité publique et la prévention', 0, 0),
(3, 'Secci', 'Louis-Pierre', '/assets/img/about/Louis-Pierre-Secci.gif', 'Adjoint chargé de la pratique sportive et à la jeunesse', 0, 0),
(4, 'Hnat', 'Arlette', '/assets/img/about/Arlette-Hnat.gif', 'Adjointe au logement', 0, 0),
(5, 'Hugot', 'Jean-Pierre', '/assets/img/about/Jean-Pierre-Hugot.gif', 'Adjoint aux travaux et à la rénovation des cités minières', 0, 0),
(6, 'Lutz', 'Corinne', '/assets/img/about/Corinne-Lutz.gif', 'Adjointe chargé de la démocratie culturelle', 0, 0),
(7, 'Duparcq', 'Brigitte', '/assets/img/about/Brigitte-Duparcq.gif', 'Adjointe aux affaires scolaires et périscolaires, à la petite enfance et aux fêtes et cérémonies', 0, 0),
(8, 'Desprez', 'Jean-Marc', '/assets/img/about/Jean-Marc-Desprez.gif', 'Adjoint au CCAS, chargé de l’insertion et de la formation professionnelle et à l’emploi', 0, 0),
(9, 'Ladevez', 'Nadine', '', 'Déléguée à l’amélioration du cadre de vie et à la rénovation des cités minières', 1, 0),
(10, 'Callot', 'Patrick', '', 'Délégué aux relations extérieures et à la pratique sportive', 1, 0),
(11, 'Pilarczyk', 'Fabien', '', 'Délégué au développement commercial et à la sécurité publique', 1, 0),
(12, 'Berlik', 'Dominique', '', 'Déléguée à la solidarité et au handicap', 1, 0),
(13, 'Szrama', 'Jean-Claude', '', 'Délégué aux liens intergénérationnels', 1, 0),
(14, 'Goeusse', 'Camille', '', 'Déléguée à l’éco-citoyenneté et au développement durable', 1, 0),
(15, 'Corbisez', 'Jean-Pierre', '', '', 0, 1),
(16, 'Ziane', 'Nadine ', '', '', 0, 1),
(17, 'Ferahtia', 'Saad ', '', '', 0, 1),
(18, 'Deleau', 'Mélanie ', '', '', 0, 1),
(19, 'Burgeat', 'Bernard ', '', '', 0, 1),
(20, 'Lemoine', 'Nadine ', '', '', 0, 1),
(21, 'Chekroun', 'Habib ', '', '', 0, 1),
(22, 'Przybyla', 'Nathalie ', '', '', 0, 1),
(23, 'Flanquart', 'Arnaud ', '', '', 0, 1),
(24, 'Vial', 'François ', '', '', 0, 1),
(25, 'Ypreeuw', 'Sylvie ', '', '', 0, 1),
(26, 'Goetinck', 'Sabrina ', '', '', 0, 1),
(27, 'Cecini', 'Carole ', '', '', 0, 1),
(28, 'Wojdowski', 'David ', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `environnement`
--

CREATE TABLE `environnement` (
  `id_environnement` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `article` text NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `environnement`
--

INSERT INTO `environnement` (`id_environnement`, `titre`, `article`, `ordre`) VALUES
(1, 'titre', 'Conscient que l’enjeu environnemental prend de plus en plus d’importance dans notre société et qu’il est nécessaire d’envisager l’avenir dans une optique de développement durable la municipalité a mis en place une politique\r\n    environnementale forte, s’articulant autour de différents thèmes : Le recyclage des déchets, l’amélioration du cadre de vie et l’économie d’énergie, l’atelier nature et les actions de sensibilisation ponctuelles.', 1),
(2, 'Cadre de vie :', 'L’amélioration du cadre de vie des habitants s’effectue avec les rénovations de logements dans les cités…<br>\r\n      Côté électrique, on note l’enfouissement des réseaux haute tension et l’installation d’ampoules à économie d’énergie sur l’éclairage public.<br>\r\n      Concernant l’eau, des efforts ont été faits pour récupérer les eaux pluviales, pour que celles-ci ne soient plus envoyées vers la station d’épuration mais qu’elles soient infiltrées sur place, permettant une réduction des coûts.<br>\r\n      Une réflexion a également été menée pour aménager de façon durable et efficace les espaces verts, notamment dans le quartier n°1 qui bénéficie d’une gestion écologique du site (taille décorative des plantes, aucun produit chimique\r\n      utilisé…).', 2),
(3, 'Recyclage des déchets :', 'Cette thématique est un point important sur lequel l’équipe municipale oeuvre depuis plusieurs années.<br>\r\n      Nécessaire pour économiser les matières premières et l’argent ainsi que pour ne pas trop solliciter l’usine d’incinération, Oignies et l’ensemble de la communauté d’agglomération d’Hénin-Carvin, pratiquent le tri sélectif.<br>\r\n      Les citoyens de la ville disposent donc de poubelles différentes, une jaune et une bordeaux, correspondant aux différents types de déchets ménagers.<br>\r\n      Pour les déchets particuliers (verres et verts) la mairie procède a des ramassages périodiques.<br>\r\n      Concernant les bouteilles en verre, il est également possible de les déposer dans l’un des cuboverres répartis sur l’ensemble de la ville.', 3),
(4, 'Actions ponctuelles :', 'Elles visent à sensibiliser la population aux enjeux de la préservation de l’environnement.<br>\r\n      Une centaine d’enfants des écoles primaires et maternelles de la commune ont par exemple participé à un grand nettoyage de printemps.<br>\r\n      Une action « Ville propre » a été menée au cours de l’année par la population encadrée par des élus et des employés municipaux.<br>\r\n      Chaque année également, les pêcheurs nettoyent le bras-mort.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `histoire`
--

CREATE TABLE `histoire` (
  `id_histoire` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `article` text NOT NULL,
  `ordre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `histoire`
--

INSERT INTO `histoire` (`id_histoire`, `titre`, `article`, `ordre`) VALUES
(1, 'Situation géographique :', '« Oignies, bouge la vie », telle est la devise qui a été choisie par le conseil municipal des jeunes, en 1996, pour symboliser la ville.<br>\r\n      Oignies, ville de l’ancien bassin minier, est située dans la région Nord Pas de Calais (environ 25 kilomètres au sud de Lille) et plus précisément dans l’arrondissement de Lens (environ 20 kilomètres) à la croisée de grands axes européens.<br>\r\n      Elle bénéficie d’une situation géographique et économique tout à fait privilégiée.<br>\r\n      C’est un véritable poumon vert à 2 heures de Bruxelles et Paris et à 3 heures de Londres, desservie directement par un échangeur sur l’autoroute A1, passage incontournable des flux entre les pays du Nord et du Sud.<br>\r\n      Elle fait partie de la Communauté d’agglomération Hénin-Carvin (CAHC) qui regroupe 14 communes, soit 125 000 habitants. La commune dépend du canton de Courrières.<br>\r\n      La population oigninoise (environ 10 000 habitants) est historiquement et culturellement marquée par l’industrie minière, et est en grande partie issue des immigrations successives.<br>', 1),
(2, 'Histoire générale :', 'La ville de Oignies semble avoir été habitée dès les premiers siècles de l’ère chrétienne.<br>\r\n      Son nom était alors Ongniacume. Le nom de la ville apparaît sous son vocable actuel en 1184.<br>\r\n      Aux mains des seigneurs au Moyen-Âge, plusieurs familles se succèdent à la tête de la commune qui compte 60 feux soit environ 250 personnes.<br>\r\n      Jusqu’en 1565 le Seigneur DONGNIES règne sur la ville avant que Richard de MERODE ne lui succède jusqu’en 1611 date à laquelle la famille d’ISENGHIEN prendra la tête de la ville.<br>\r\n      À la révolution les échevins seront remplacés par une municipalité. Jean-Baptiste Rohaut est élu premier maire de Oignies le 8 février 1790.<br>\r\n      Le château de Oignies, sous son aspect actuel, fut le fruit de la construction de Mme de Lauragais avant d’appartenir à Mme De Clercq.<br>', 2),
(3, 'Histoire minière :', 'C’est dans le parc du château de Mme De Clercq que le charbon est découvert le 7 juin 1842 par l’ingénieur Mulot qui construisait un puits artésien. C’est la première découverte du charbon dans le Pas-de-Calais.<br>\r\n      L’exploitation du charbon sur Oignies commence au milieu du 19è siècle dans les fosses 1 et 2. En 1930, Oignies voit apparaître les fosses 9 / 9 bis et 10.<br>\r\n      Le 21 décembre 1990 la fosse 9 est la dernière mine du Nord-Pas-de-Calais à fermer ses portes. Le site de la fosse 9 / 9 bis a été inscrit en 1994 à l’inventaire des monuments historiques.<br>\r\n      À Oignies, la vie quotidienne a été marquée par la culture minière pendant 150 ans, aussi bien au niveau culturel, sportif, des relations sociales qu’au niveau de l’habitat.<br>\r\n      L’enjeu actuel, et ce depuis une dizaine d’années, est de mettre la ville sur les rails de la reconversion industrielle.<br>', 3),
(4, 'Oignies et la guerre :', 'Durant la guerre 1914-1918, Oignies est occupée par les allemands et les bombardements sont fréquents. La ville est en grande partie détruite et les allemands saccagent les mines en octobre 1918 juste avant leur retrait.<br>\r\n      Du 28 mai 1940 au 2 septembre 1944, Oignies est aux mains des nazis qui, le premier jour de leur occupation, ont incendié 380 maisons et fusillé 80 civils en représailles de la défense héroïque des habitants sur le pont de la Batterie\r\n      (massacre du 28 mai 1940).<br>\r\n      Au vingtième siècle la commune a reçu la visite de deux Présidents de la République en fonction. En 1919, c’est Georges Clémenceau qui vient remettre la Croix de Guerre à la ville.<br>\r\n      En 1948, Vincent Auriol, Président en fonction, accompagné de François Mitterrand, Secrétaire d’Etat aux Anciens Combattants remet à nouveau la Croix de Guerre à la ville et inaugure le Mausolée en mémoire des 80 fusillés du 28 mai 1940 et\r\n      déclare Oignies « Ville Martyre ».<br>', 4),
(5, 'Oignies de nos jours :', 'La ville de Oignies se sert de son passé pour se tourner vers l’avenir, elle met en avant son histoire et son patrimoine tout en se modernisant.<br>\r\n      Ainsi, la fosse du 9-9 bis accueille en son sein : <a href="">le Métaphone</a> (salle de spectacle et concert), des salles dédiées à l’apprentissage de la musique et de la danse, des studios d’enregistrement, une brasserie et bien d’autres\r\n      services.<br>\r\n      L’ensemble de ses éléments donne un souffle nouveau à la ville. À la fosse du 9-9bis le patrimoine minier et la création artistique se rencontrent pour permettre aux visiteurs de découvrir dans un cadre moderne et musical l’histoire de la\r\n      ville et des mines.<br>\r\n      Cet essor est encouragé récemment par l’inscription du bassin minier à l’UNESCO.<br>\r\n      Oignies est également une ville tournée vers l’avenir. Avec son emplacement géographique, très prisé dans le Nord- Pas de Calais, elle se développe au quotidien : nouvelles infrastructures, réhabilitation et embellissement des quartiers\r\n      miniers, construction de nouvelles habitations, développement économique, etc. à Oignies, demain est une priorité d’aujourd’hui.<br>', 5);

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `path` varchar(100) NOT NULL,
  `couleur` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom`, `ordre`, `visible`, `path`, `couleur`) VALUES
(1, 'Votre Mairie', 2, 1, '', '#00E000'),
(2, 'Vos Services', 5, 1, '', '#0060D0'),
(6, 'Nous contacter', 6, 1, '', 'grey'),
(4, 'Vie locale', 4, 1, '', '#C000E0'),
(3, 'Actualités', 1, 1, '', '#E00010'),
(5, 'Infos pratiques', 3, 1, '', '#E06000');

-- --------------------------------------------------------

--
-- Structure de la table `rapide`
--

CREATE TABLE `rapide` (
  `id_rapide` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `rapide`
--

INSERT INTO `rapide` (`id_rapide`, `nom`, `path`, `ordre`, `visible`) VALUES
(3, 'Parents', '', 1, 1),
(4, 'Bel-âge', '', 2, 1),
(5, 'Professionnels', '', 3, 1),
(6, 'Jeunes', '', 4, 1),
(7, 'Nouveaux arrivants', '', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sousmenu`
--

CREATE TABLE `sousmenu` (
  `id_sousmenu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `path` varchar(100) NOT NULL,
  `no3level` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sousmenu`
--

INSERT INTO `sousmenu` (`id_sousmenu`, `nom`, `menu`, `ordre`, `visible`, `path`, `no3level`) VALUES
(1, 'L\'Acceuil de la Mairie', 'Votre Mairie', 1, 1, 'index.php/acceuil/', 1),
(2, 'Démocratie Locale', 'Votre Mairie', 2, 1, '', 0),
(3, 'Vivre à Oignies', 'Votre Mairie', 3, 1, '', 0),
(5, 'Les services techniques', 'Vos Services', 2, 1, '', 1),
(6, 'La police municipale', 'Vos Services', 3, 1, '', 1),
(7, 'Scolaire et périscolaire', 'Vos Services', 4, 1, '', 1),
(8, 'Social et santé', 'Vos Services', 5, 1, '', 0),
(9, 'Culture', 'Vos Services', 6, 1, '', 0),
(10, 'Le journal Municipal', 'Actualités', 1, 1, '', 1),
(11, 'Les actus de la ville', 'Actualités', 3, 1, '', 1),
(12, 'la ville se modernise (nouvelle page Facebook)', 'Actualités', 2, 1, '', 1),
(13, 'Abonnement newsletter', 'Votre Mairie', 4, 1, '', 1),
(14, 'Vie associative', 'Vie locale', 1, 1, '', 0),
(15, 'Vie économique', 'Vie locale', 1, 1, '', 0),
(16, 'Transport en commun et scolaires', 'Infos pratiques', 2, 1, '', 1),
(17, 'Collecte des déchets', 'Infos pratiques', 4, 1, '', 1),
(18, 'Location de salle', 'Infos pratiques', 1, 1, '', 1),
(19, 'En cas d\'urgence...', 'Infos pratiques', 3, 0, '', 1),
(20, 'Sécurité, secours et santé', 'Infos pratiques', 5, 1, '', 0),
(4, 'Etat civil', 'Vos Services', 1, 1, '', 1),
(31, 'test', 'sans', 1, 0, '', 1),
(34, 'essai', 'Infos pratiques', 6, 0, '', 0),
(35, 'Roussel', 'Actualités', 4, 0, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `third_level`
--

CREATE TABLE `third_level` (
  `id_third` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `sousmenu` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `third_level`
--

INSERT INTO `third_level` (`id_third`, `nom`, `menu`, `sousmenu`, `ordre`, `visible`, `path`) VALUES
(1, 'Vos Elus', 'Votre Mairie', 'Démocratie Locale', 1, 1, 'index.php/elus/'),
(2, 'Les arrêtés municipaux', 'Votre Mairie', 'Démocratie Locale', 2, 1, 'index.php/ArretesMunicipaux/'),
(3, 'Les délibérations du conseil municipal', 'Votre Mairie', 'Démocratie Locale', 3, 1, 'index.php/deliberations/'),
(5, 'La maison d\'acceuil et d\'aide à l\'insertion (MAI)', 'Vos Services', 'Social et santé', 2, 1, ''),
(6, 'La Roseraie foyer de personnes agées', 'Vos Services', 'Social et santé', 3, 1, ''),
(7, 'Le béguinage Camille Delabre', 'Vos Services', 'Social et santé', 4, 1, ''),
(8, 'Les locaux de quartier', 'Vos Services', 'Social et santé', 5, 1, ''),
(9, 'Histoire locale', 'Votre Mairie', 'Vivre à Oignies', 3, 1, 'index.php/histoire/'),
(10, 'Environnement', 'Votre Mairie', 'Vivre à Oignies', 1, 1, 'index.php/environnement/'),
(11, 'Urbanisme et logement', 'Votre Mairie', 'Vivre à Oignies', 2, 1, 'index.php/urbanisme-et-logement/'),
(12, 'Le centre Mozart (école de musique)', 'Vos Services', 'Culture', 4, 1, ''),
(13, 'La bibliothèque municipale', 'Vos Services', 'Culture', 3, 1, ''),
(14, 'Le centre Denis Papin', 'Vos Services', 'Culture', 1, 1, ''),
(15, 'Le Métaphone', 'Vos Services', 'Culture', 2, 1, ''),
(16, 'Associations culturelles', 'Vie locale', 'Vie associative', 2, 1, ''),
(17, 'Associations sportives', 'Vie locale', 'Vie associative', 1, 1, ''),
(18, 'Associations loisirs et autres', 'Vie locale', 'Vie associative', 3, 1, ''),
(19, 'Les commerçants', 'Vie locale', 'Vie économique', 2, 1, ''),
(20, 'Professions médicales et paramédicales', 'Vie locale', 'Vie économique', 1, 1, ''),
(21, 'L\'opération tranquilité vacances', 'Infos pratiques', 'Sécurité, secours et santé', 1, 1, ''),
(22, 'Le centre des Hautois', 'Infos pratiques', 'Sécurité, secours et santé', 2, 1, ''),
(4, 'Le centre social d\'action communale (CCAS)', 'Vos Services', 'Social et santé', 1, 1, ''),
(41, 'test', 'sans', 'sans', 1, 1, ''),
(45, 'test d\'enregistrement', 'sans', 'sans', 2, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id_travaux` int(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `date_enregistrement` date NOT NULL,
  `date_debut` varchar(50) NOT NULL,
  `date_fin` varchar(50) NOT NULL,
  `société` varchar(100) NOT NULL,
  `commenditaires` varchar(100) NOT NULL,
  `contact` varchar(256) DEFAULT NULL,
  `commentaires` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `travaux`
--

INSERT INTO `travaux` (`id_travaux`, `adresse`, `latitude`, `longitude`, `date_enregistrement`, `date_debut`, `date_fin`, `société`, `commenditaires`, `contact`, `commentaires`) VALUES
(1, '\'Rue du Docteur René BROUSSES\'', 50.47, 3.01417, '2018-07-01', '\' 9 juillet 2018\'', '\' 17 août 2018\'', '\'ENEDIS\'', '\'ERDF\'', '\'03.00.00.00.00\'', '\'Coupure de courant pour les logements du 4 au 9 de la rue entre 8h00 et 16h30\' '),
(2, '\'Rue Emile Zola\'', 50.4681, 2.99423, '2018-08-05', '\' 8 août 2018\'', '\' 14 septembre 2018\'', '\'Veolia\'', '\'Mairie de Oignies\'', '\'03.00.00.00.00\'', '\'Travaux du croisement de la rue Pasteur au rond point rue du 1er mai. Voie fermée à la circulation.\''),
(6, '\'rue andre ampere\'', 50.4576, 3.00043, '0000-00-00', '\'25 septembre 2018\'', '\'30 septembre 2018\'', '\'moi\'', '\'test\'', '\'0300020508\'', '\'bla bla bla \''),
(7, '\'rue lamendin\'', 50.4664, 2.99146, '0000-00-00', '\'Lundi 13 Août\'', '\'Vendredi 31 Août (selon aléas)\'', '\'Goupe Colas\'', '\'La mairie\'', '"<a href=\'https://www.facebook.com/GroupeColas/\' onclick=\'window.open(this.href); return false;\'> facebook Colas</a>"', '\'Pour faciliter l’exécution des travaux, la circulation et le stationnement seront interdits sur le parking de 7h00 à 18h00. \''),
(8, '\'mairie\'', 50.4685, 2.9918, '0000-00-00', '\'25 septembre 2018\'', '\'30 septembre 2018\'', '\'moi\'', '\'test\'', '\'0300020508\'', '\'bla bla bla \''),
(9, '\'18 rue ferdinand pantigny\'', 50.4651, 2.99197, '0000-00-00', '\'Lundi 13 Août\'', '\'Vendredi 31 Août (selon aléas)\'', '\'Goupe Colas\'', '\'test\'', '\'0300020508\'', '\'pour voir\'');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acceuil`
--
ALTER TABLE `acceuil`
  ADD PRIMARY KEY (`id_acceuil`);

--
-- Index pour la table `arretes_municipaux`
--
ALTER TABLE `arretes_municipaux`
  ADD PRIMARY KEY (`id_muni`);

--
-- Index pour la table `deliberations`
--
ALTER TABLE `deliberations`
  ADD PRIMARY KEY (`id_deliberations`);

--
-- Index pour la table `elus`
--
ALTER TABLE `elus`
  ADD PRIMARY KEY (`id_elus`);

--
-- Index pour la table `environnement`
--
ALTER TABLE `environnement`
  ADD PRIMARY KEY (`id_environnement`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id_histoire`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `rapide`
--
ALTER TABLE `rapide`
  ADD PRIMARY KEY (`id_rapide`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  ADD PRIMARY KEY (`id_sousmenu`);

--
-- Index pour la table `third_level`
--
ALTER TABLE `third_level`
  ADD PRIMARY KEY (`id_third`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id_travaux`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `acceuil`
--
ALTER TABLE `acceuil`
  MODIFY `id_acceuil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `arretes_municipaux`
--
ALTER TABLE `arretes_municipaux`
  MODIFY `id_muni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `deliberations`
--
ALTER TABLE `deliberations`
  MODIFY `id_deliberations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `elus`
--
ALTER TABLE `elus`
  MODIFY `id_elus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `environnement`
--
ALTER TABLE `environnement`
  MODIFY `id_environnement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `rapide`
--
ALTER TABLE `rapide`
  MODIFY `id_rapide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  MODIFY `id_sousmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `third_level`
--
ALTER TABLE `third_level`
  MODIFY `id_third` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id_travaux` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
