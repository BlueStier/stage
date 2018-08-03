-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 02 Août 2018 à 19:38
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

--
-- Index pour les tables exportées
--

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
-- AUTO_INCREMENT pour les tables exportées
--

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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
