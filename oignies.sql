-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 01 Août 2018 à 14:03
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

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
(1, 'Le service accueil de la mairie de Oignies', 'Sans aucun doute le service avec lequel les usagers sont le plus en contact', '/assets/img/about/Accueil-de-la-Mairie.jpg', '03 21 74 80 50', '03 21 37 32 59', 'Mairie de Oignies<br>\r\n                  Place de la IVème République<br>\r\n                  62590 Oignies<br>', 'Du lundi au vendredi :<br>\r\n                  de 8 H 30 à 12 H 00 et de 13 H 30 à 17 H 30<br>\r\n                  Le samedi :<br>\r\n                  de 9H 00 à 12 H 00<br>\r\n                  (Permanences des Adjoints – sur RDV)', 1, 'Les agents du service accueil sont chargés de répondre au téléphone, d’orienter les demandes vers le service concerné et sont également responsables de l’accueil physique des visiteurs de la mairie.');

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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
