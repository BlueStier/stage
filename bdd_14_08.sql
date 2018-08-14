-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Août 2018 à 14:22
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `oignies`
--

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id_menu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`id_menu`, `nom`, `ordre`, `visible`) VALUES
(1, 'Votre Mairie', 1, 1),
(2, 'Vos Services', 2, 1),
(3, 'Actualités', 3, 1),
(4, 'Vie locale', 4, 1),
(5, 'Infos pratiques', 5, 1),
(6, 'Nous contacter', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sousmenu`
--

CREATE TABLE IF NOT EXISTS `sousmenu` (
`id_sousmenu` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `sousmenu`
--

INSERT INTO `sousmenu` (`id_sousmenu`, `nom`, `menu`, `ordre`, `visible`) VALUES
(1, 'L''Acceuil de la Mairie', 'Votre Mairie', 1, 1),
(2, 'Démocratie Locale', 'Votre Mairie', 2, 1),
(3, 'Vivre à Oignies', 'Votre Mairie', 3, 1),
(4, 'Etat civil', 'Vos Services', 1, 1),
(5, 'Les services techniques', 'Vos Services', 2, 1),
(6, 'La police municipale', 'Vos Services', 3, 1),
(7, 'Scolaire et périscolaire', 'Vos Services', 4, 1),
(8, 'Social et santé', 'Vos Services', 5, 1),
(9, 'Culture', 'Vos Services', 6, 1),
(10, 'Le journal Municipal', 'Actualités', 1, 1),
(11, 'Les actus de la ville', 'Actualités', 2, 1),
(12, 'la ville se modernise (nouvelle page Facebook)', 'Actualités', 3, 1),
(13, 'Abonnement newsletter', 'Actualités', 4, 1),
(14, 'Vie associative', 'Vie locale', 1, 1),
(15, 'Vie économique', 'Vie locale', 2, 1),
(16, 'Transport en commun et scolaires', 'Infos pratiques', 1, 1),
(17, 'Collecte des déchets', 'Infos pratiques', 2, 1),
(18, 'Location de salle', 'Infos pratiques', 3, 1),
(19, 'En cas d''urgence...', 'Infos pratiques', 4, 1),
(20, 'Sécurité, santé, secours', 'Infos pratiques', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `third_level`
--

CREATE TABLE IF NOT EXISTS `third_level` (
`id_third` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `sousmenu` varchar(100) NOT NULL,
  `ordre` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `third_level`
--

INSERT INTO `third_level` (`id_third`, `nom`, `sousmenu`, `ordre`, `visible`, `path`) VALUES
(1, 'Vos Elus', 'Démocratie locale', 1, 1, 'index.php/elus/'),
(2, 'Les arrêtés municipaux', 'Démocratie locale', 2, 1, 'index.php/ArretesMunicipaux/'),
(3, 'Les délibérations du conseil municipal', 'Démocratie locale', 3, 1, 'index.php/deliberations/');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`), ADD UNIQUE KEY `ordre` (`ordre`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
MODIFY `id_sousmenu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `third_level`
--
ALTER TABLE `third_level`
MODIFY `id_third` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
