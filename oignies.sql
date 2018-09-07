-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 07 Septembre 2018 à 14:20
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
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `id_articlespage` int(11) NOT NULL,
  `photo` varchar(256) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `id_articlespage`, `photo`, `titre`, `text`) VALUES
(1, 54, 'assets/site/img/articles/semimolle.JPG', 'le titre', 'e pensais,il a menti en chaque mot,\nL\'hideux infirme,de son œil qu\'il disait voilé par le songe\nDe biais contemplait l\'effet de ses mensonges\nSur moi,et sa bouche,incapable de masquer les cahots\nDe sa liesse,qui secouait et tordait son corps bot\nDevant l\'agonie de la victime que la mort ronge.\n\n\nII\nQuel autre dessin eût pu animer ce menteur diabolique?\nDe son bâton dressé tel un attrape-foudre furieux\nIl leurre,menace, et séduit le curieux\nQui demande son chemin. Et ce rire satanique\nGraverait je n\'en dout l\'épitaphe véridique \nRelatant ma venue en ces maudits lieux.\n\nIII\nSi fort de ses conseils je devais me détourner\nDe ma route pour m\'engager dans le sinistre chemin,où,\nComme chacun le sait,se cache la Tour Noire,\nc\'est pourtant sans remous,\nEt dicuke,que je m\'y aventurai. Sans nulle fierté\nNi impatience ravivée de jamaiis entrevoir mon but tant convoité \nNi même aucune fin-je n\'avais pas cet espoir fou.\n\nIV\nCar après avoir silloné le vasre monde,en entier \nEt cherché en vain toutes ces longues années,qu\'étail-il advenu \nDe ma quête,de ma foi déclinantes,ces fantômes abattus,\nN\'eussent pu porter le poids de cet espoir trop vif,plein de témérité\nEt c\'est à peine si je sus rémrimer le bond enchanté \nQue fit mon cœur,sentant la défaite venue.\n\nV\nEt lorsque le malade approchant du trépas\nSent comencer et finir \nLes larmes de peine,et qu\'adieu aux amis il doit dire\nIl entend l\'un supplier l\'autre de partir,retenr son souffle las,\nPlus librement dehos (« puisque tout esr achevé,que la fin est là\nEt que le coup porté,aucun chagrin ne viendra adoucir »)\n\nVI\nQuand d\'aucuns débattent,cherchant si place ils trouveront\nEntre les tombes moussues,pour celle de ce vaillant\nEt si pour porter sa dépouille il est jour plus clément\nEt si,ayant soin des bannières,des écharpes \net des tristes chansons\nL\'homme toujours entend tout\net une seule soif berce son cœur si bon\nCelle de ne pas faillir et trahir un amour si tendre,en demeurant.\n\nVII\nAinsi,depuis si longtemps,j\'endurais cette quête insensée\nEt voyais mon échec chanté dans poèmes et prophéties\nTant de fois,parmi la troupe,de ceux qui ont choisit cet exil inouï,\nCes chevaliers qui à la Tour adressèrent leurs pas\net leurs rêves éthérés\nQu\'échouer comme eux me paraissait galvaudé\nMais certain-car qui pourrait lutter contre ce doute assassin:\net sij\'étais honni?\n\nVIII\nEt muet comme le désespoir qui m\'étreignait,je me détournai\nDe cet odieux estropié,je quittai son chemin\nPour porter mes pas dans celui qu\'il vantait. Car ce jour sans fin\nM\'avait été bien lugubre,et avant que de voir le soir tomber\nEt le clore,je souffris le regard écarlate et mauvais\nQui ensanglante la plaine,d\'un mavabre et malin.\n\nIX\nQu\'on m\'entende! À peine m\'étais-je promis le cœur loyal \nÀ la plaine,au bout d\'un pas ou deux\nAlors que je me retournai pour lancer un regard d\'adieu\nSur la route bien sûre qui m\'avait mené en ce songe sans égal \nElle avait disparu;plus rien d\'autre que les plaines griss et étales\nÀ perte de vue:je ne pus que poursuivre,car quoi faire en ces\nlieux?\n\nX\nAussi je marchai. Je ne crois pas avoir jamais \nentrevu de mes yeux\nNature plus affamée et ignoble ,rien n\' y prospérait guère\nPas une fleur-comment rêver d\'une cédrière!\nTandis que l\'euphorbe et la chienlit,comme la loi le veut\nSe propageaient à l\'envi,si bien qu\'au cœur ainsi un peu\nDe bardane égarée eût été une heureuse surprise,et bien légère\n\nXI\nPoint! Pénurie,langueur et grimace,\nBien étrange était le lot de cette affreuse terre.\n« Vois ou femre les yeux »,disait Mère Nature,de son air\nMaussade: « Rien ne veut fleurir,je ne puis même saiver la face:\nC\'est le Jugement Dernier qui de ses flammes\nlavera cette place\nQui en calcinera les mottes de mes prisonniers\nrompra les fers. »\n\nXII\nEt si un chardon tout éplumé poussait là par hasard,\nSe dressant au-dessus du lot,c\'était décapité,\ncar l\'agrostide était jalouse ici.\nQui avait creusé ces trous et ces crevasses dans les orties\nEt les feuilles bistrées et rêches de la patience,qui avait tout réduit\nen friche chaotique,tuant tout espoir\nDe verdure? Une brute,à n\'en point douter,à l\'âme noire\nSoufflant toute vie comme une chandelle,\ntelle une bête sans merci.\n\nXIII\nQuant à l\'herbe,elle poussait il est vrai aussi maigre\nque son pelage\nFrappé de lèpre;des brins épars perçaient la boue\nQui paraissait pétrie de sang par-dessous\nUne rosse aveugle,dont chaqe os saillait comme\naprès le carnage\nSe tenait en stupeur,frappée par un mirage,\nChassée du haras du Diable même à grand renfort de coups!\n\nXIV\nVivant? L\'anial à mes yeux pouvait avoir \npéri sans un pleur\nDécharné,la carcasse saignant,et d\'un spectre ayant l\'air\nIl gardait les yeux clos sous une immonde crinière\nAlliance incongrue du ridicule et de pareille douleur\nJamais je ne vis brute auss digne d\'être frappée de malheur\nIl fallait bien qu\'il fût maléfique pour mériter tel salaire.\n\nXV\nJe fermai les yeux et les ouvris sur mon cœur\nComme un homme commandant le vin avant d\'aller guerroyer\nJ\'appelai de mes vœux une rasade de visions\nplus heureuse du passé\nAfin de retrouver l\'espoir de jouer mon rôle en vainqueur.\nPenser d\'abord,et puis combattre tout l\'art du soldat,sa valeur,\nCar le goût furtif des temps anciens guérit de tout,vrai!\n\nXVI\nPas cela! Je ne pus détacher mon regard incertain\nDe la face rougie de Cuthbert,sous les boucles d\'or\nCher compagnon,qui jadis fâché dans un ultime effort,\nGlissa,je le sentis,son beau bras sous le mien\nCar ainsi il était,tout sourrire,même quand périt le Bien\nEt avec lui mon cœur à peine éveillé,dans le souffle du cor.\n\nXVII\nEt donc,l\'âme de l\'honneur-le voici debout là,si beau\nAussi franc que dix ans plus tôt,alors jeune chevalier,\nQu\'un hommer loyal vînt le défier (dit-il) il saurait l\'affronter\nDans les bonnes règles -mais voilà que glisse la scène- pouah!\nQuel bourreau\nA cloué sur son sein un vil parchemin? Et ses propres compa-\ngnons de fourreau\nDe le lire. Pauvre traître,jouet des crachats et des quolibets!\n\nXVIII\nPlutôt ce présent qu\'un passé qui s\'offre tel:\nMe voilà de retour sur ma route assombrie!\nAucun son,nulle vision aussi loin que l\'œil s\'enquît,\nUn hibou ou une chauve-souris,la nuit m\'enverra-t-elle?\nImplorais-je;quand soudain sur la terre plane\net lugubre une image nouvelle\nArrêta mes pensées et le cours j\'en perdis.\n\nXIX\nEn travers de ma route,soudain,une rivière,\nTel le serpent surgit par surprise\nMais point de marrée paresseuse et douce,dans les ténèbres grises.\nCelle-là écumait et eût pu satisfaire\nLe démon venu y baigner son sabot rougeoyant-à voir l\'ardente\ncolère,\nDes ses remours noirs éclaboussés d\'écaillures et de mousse,où l\'on \ns\'enlise.\n\nXX\nSi insignifiante,et pourtant si venimeuse,sur ses berges austères\nDe bas aulnes rabougris venaient s\'agenouiller\nprès de l\'eau agitée\nEt saules détrempés les jetant tête baissée\nEn n mouvement de muet désespoir,foule suicidaire:\nEt le courant qui les torturait ainsi,\nnullement ému par leur calvaire\nSuivait sa route,pas un instant perturbé.\n\nXXI\nEt tandis que je passais à gué-par tous les saints,\ncomme jecraignais\nDe poser pied sur la joue de quelque cadavre ou moribond\nÀ chaque pas,ou de sentir la lance de laquelle je sondais les fonds\nPrévenant les écueils,prisonier de sa chevelure\nou de sa barbe serrée\nUn rat d\'eau sns doute,que de mon bâton je réveillai\nMais Die! Combien son cri rappelait le hurlement d\'un nourrisson.\n\nXXII\nEt je fus trop heureux de gagner la berge opposée\nLe pays parraissait plus clément. Vain présage!\nQui étaient les combattants,quelle guerre menaient-ils,\nquel en était le visage\nQuel piétinement sauvage était venu écraser le sol détrempé\nEn un frais clapotis?Crapauds en leur cuve empoisonnée\nOu chats sauvages dans ler rougeoyante cage-\n\nXXIII\nAinsi paraissaient les traces d\'un antique combat\nen ce décor sauvage\nQui les confiniat là,quand toute la plaine s\'offrait à eux?\nNulle trace de pas ne menait à ce miaulement vénéneux\nAucune ne s\'en éloignait. Immonde saumure à l\'ouvrage\nLeur cerveau,nul doute, comme le Turc son galérien,\nqu\'il a fait esclave\nAppelle son divertissement,Chrétiens contre Juifs,\nen un combat odieux.\n\nXXIV\nEt plus que cela-à un furlong-si près,juste là,vraiment!\nÀ quel funeste usage ce moteur,cette roue étaient-ils réservés?\nOu plutôt ce frein-cett herse faite pour tourner,\nPour rouler et filer les cadavres comme la soie,\navec l\'air insouciant\nDe l\'outil du Tophet,laissé sur terre comme par égarement\nOu pour affûter ces dents rouillées d\'acier.\n\nXXV\nPuis apparut une lande piétinée,jadis un bois étrange,\nPuis marécage semblait-il,et enfin simple terre désolée\nEt stérile (l\'idiot y trouvera une raison de se gausser\nÀ créer une chose,puis à la gâter,\njusqu\'à ce que d\'humeur il change\nEt le voilà reparti!);en un quart d\'arpent,sombre mélange\nDe marais,d\'argile et de décombres,\net de désolation amère et dépeuplée.\n\nXXVI\nD\'imprudentes taches,d\'un gris sinistre colorées\nDes aplats où le sol ras,maigre pitance\nLaissait place à la mousse,pareille à des furoncles,\nabjectes substances\nPuis surgit un chêne paralysé,en son sein\nune profonde fissure creusée\nTelle une bouche distordue,fendue,déchirée\nSuffoquant,aspirant la mort,et mourant dans une ultime transe.\n\nXXVII\nEt toujours aussi loin de la fin!\nRien d\'autre à l\'horizon que le crépuscule,\nrien qui vienne l\'œil rassurer\nOu le pas guider! À cette pensée,\nJe vis un grand corbeau,ami du cœur d\'Apollyon,');

-- --------------------------------------------------------

--
-- Structure de la table `articlespage`
--

CREATE TABLE `articlespage` (
  `id_articlespage` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articlespage`
--

INSERT INTO `articlespage` (`id_articlespage`, `text`) VALUES
(54, '<p>c&#39;est un test</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `bulle`
--

CREATE TABLE `bulle` (
  `id_bulle` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `soustitre` varchar(100) NOT NULL,
  `tx1` text NOT NULL,
  `photo1` varchar(256) NOT NULL,
  `tx2` text,
  `photo2` varchar(256) DEFAULT NULL,
  `tx3` text,
  `photo3` varchar(256) DEFAULT NULL,
  `tx4` text,
  `photo4` varchar(256) DEFAULT NULL,
  `tx5` text,
  `photo5` varchar(256) DEFAULT NULL,
  `tx6` text,
  `photo6` varchar(256) DEFAULT NULL,
  `tx7` text,
  `photo7` varchar(256) DEFAULT NULL,
  `tx8` text,
  `photo8` varchar(256) DEFAULT NULL,
  `tx9` text,
  `photo9` varchar(256) DEFAULT NULL,
  `tx10` text,
  `photo10` varchar(256) DEFAULT NULL,
  `sup` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bulle`
--

INSERT INTO `bulle` (`id_bulle`, `id_pages`, `titre`, `soustitre`, `tx1`, `photo1`, `tx2`, `photo2`, `tx3`, `photo3`, `tx4`, `photo4`, `tx5`, `photo5`, `tx6`, `photo6`, `tx7`, `photo7`, `tx8`, `photo8`, `tx9`, `photo9`, `tx10`, `photo10`, `sup`) VALUES
(1, 4, 'Le service accueil de la mairie de Oignies', 'Sans aucun doute le service avec lequel les usagers sont le plus en contact', '<p>Les agents du service accueil sont charg&eacute;s de r&eacute;pondre au t&eacute;l&eacute;phone, d&rsquo;orienter les demandes vers le service concern&eacute; et sont &eacute;galement responsables de l&rsquo;accueil physique des visiteurs de la mairie.</p><br><br>\r\n\r\n<h2 style="background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px;">Adresse :&nbsp;</h2>\r\n\r\n<p>Mairie de Oignies :</p>\r\n\r\n<p>Place de la IV&egrave;me R&eacute;publique</p>\r\n\r\n<p>62590 Oignies</p>\r\n\r\n<p>Tel :&nbsp;03 21 74 80 50</p>\r\n\r\n<p>Fax :&nbsp;03 21 37 32 59</p><br><br>\r\n\r\n<h2 style="background: rgb(238, 238, 238); border: 1px solid rgb(204, 204, 204); padding: 5px 10px;">Horaires d&rsquo;ouverture des services administratifs :</h2>\r\n\r\n<p>Du lundi au vendredi :&nbsp;</p>\r\n\r\n<p>de 8 h 30 &agrave; 12 h 00 et de 13 h 30 &agrave; 17 h 30</p>\r\n\r\n<p>Le samedi :&nbsp;</p>\r\n\r\n<p>de 9 h 00 &agrave; 12 h 00</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/site/img/about/Accueil-de-la-Mairie.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 3, '', '', '<h1>Fabienne Dupuis</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>Maire de oignies</h5>\r\n', '/assets/site/img/about/Fabienne-Dupuis.gif', '<h1>Alain Boigelot</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>1er adjoint aux finances et à la sécurité publique</h5>', '/assets/site/img/about/Boigelot-Alain.gif', '<h1>Louis-Pierre Secci</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>Adjoint chargé de la pratique sportive et à la jeunesse</h5>', '/assets/site/img/about/Louis-Pierre-Secci.gif', '<h1>Arlette Hnat</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>Adjointe au logement</h5>', '/assets/site/img/about/Arlette-Hnat.gif', '<h1>Brigitte Duparcq</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h5>Adjointe aux affaires scolaires et périscolaires, à la petite enfance et aux fêtes et cérémonies</h5>', '/assets/site/img/about/Brigitte-Duparcq.gif', '', '', '', '', '', '', '', '', '', '', '<h3>Les conseillers d&eacute;l&eacute;gu&eacute;s :</h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Nadine Ladevez :</strong></p>\r\n\r\n<p>&nbsp;D&eacute;l&eacute;gu&eacute;e &agrave; l&rsquo;am&eacute;lioration du cadre de vie et &agrave; la r&eacute;novation des cit&eacute;s mini&egrave;res</p>\r\n\r\n<p><strong>Patrick Callot :</strong></p>\r\n\r\n<p>D&eacute;l&eacute;gu&eacute; aux relations ext&eacute;rieures et &agrave; la pratique sportive</p>\r\n\r\n<p><strong>Jean-Claude Szrama</strong></p>\r\n\r\n<p>D&eacute;l&eacute;gu&eacute; aux liens interg&eacute;n&eacute;rationnels</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<h3>Les conseillers municipaux :</h3>\r\n\r\n<p>Nadine Ziane&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nathalie Przybyla&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Arnaud Flanquart&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;Fran&ccedil;ois Vial&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sylvie Ypreeuw&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sabrina Goetinck</p>\r\n\r\n<p>Carole Cecini&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;David Wojdowski&nbsp;</p>\r\n'),
(11, 45, '', '', '<p>ggg</p>\r\n', 'assets/site/img/about/Jellyfish.jpg', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '<p>ggggg</p>\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `carroussel`
--

CREATE TABLE `carroussel` (
  `id_carroussel` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `titre` text NOT NULL,
  `soustritre` text NOT NULL,
  `photocar1` varchar(256) NOT NULL,
  `text1` varchar(256) NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '22 mars', 'assets/site/img/portfolio/mars.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Mars-2018-intervention-sign%C3%A9e.pdf', 2018),
(2, '23 janvier', 'assets/site/img/portfolio/janvier.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Janvier-2017.pdf', 2017),
(3, '4 avril ', 'assets/site/img/portfolio/avril.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Avril-2017.pdf', 2017),
(4, '30 mai ', 'assets/site/img/portfolio/mai.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Mai-2017.pdf', 2017),
(6, '30 juin', 'assets/site/img/portfolio/juin.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Juin-2017.pdf', 2017),
(7, '14 octobre', 'assets/site/img/portfolio/octobre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-octobre-2017-Election-Maire.pdf', 2017),
(8, '19 octobre', 'assets/site/img/portfolio/octobre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Octobre-2017-Election-Adjoints.pdf', 2017),
(9, '13 novembre', 'assets/site/img/portfolio/novembre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-novembre-2017.pdf', 2017),
(10, '19 decembre', 'assets/site/img/portfolio/decembre.JPG', '/ressources/uploads/cr/Compte-rendu-CM-Décembre-2017.pdf', 2017),
(11, '12 fevrier', 'assets/site/img/portfolio/fevrier.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-12-février-2014.pdf', 2014),
(12, '29 mars', 'assets/site/img/portfolio/mars.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-29-MARS-2014.pdf', 2014),
(13, '15 avril', 'assets/site/img/portfolio/avril.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-15-avril-2014', 2014),
(14, '5 juin', 'assets/site/img/portfolio/juin.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-5-juin-2014.pdf', 2014),
(15, '25 septembre', 'assets/site/img/portfolio/septembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-CM-du-25-septembre-2013.pdf', 2013),
(16, '27 novembre', 'assets/site/img/portfolio/novembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-27-novembre-20131.pdf', 2013),
(17, '12 décembre', 'assets/site/img/portfolio/decembre.JPG', '/ressources/uploads/cr/COMPTE-RENDU-C-M-du-12-décembre-2013.pdf', 2013);

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
(1, 'Situation géographique :', '« Oignies, bouge la vie », telle est la devise qui a été choisie par le conseil municipal des jeunes, en 1996, pour symboliser la ville.<br>      Oignies, ville de l’ancien bassin minier, est située dans la région Nord Pas de Calais (environ 25 kilomètres au sud de Lille) et plus précisément dans l’arrondissement de Lens (environ 20 kilomètres) à la croisée de grands axes européens.<br>      Elle bénéficie d’une situation géographique et économique tout à fait privilégiée.<br>      C’est un véritable poumon vert à 2 heures de Bruxelles et Paris et à 3 heures de Londres, desservie directement par un échangeur sur l’autoroute A1, passage incontournable des flux entre les pays du Nord et du Sud.<br>      Elle fait partie de la Communauté d’agglomération Hénin-Carvin (CAHC) qui regroupe 14 communes, soit 125 000 habitants. La commune dépend du canton de Courrières.<br>      La population oigninoise (environ 10 000 habitants) est historiquement et culturellement marquée par l’industrie minière, et est en grande partie issue des immigrations successives.<br>', 1),
(2, 'Histoire générale :', 'La ville de Oignies semble avoir été habitée dès les premiers siècles de l’ère chrétienne.<br>      Son nom était alors Ongniacume. Le nom de la ville apparaît sous son vocable actuel en 1184.<br>      Aux mains des seigneurs au Moyen-Âge, plusieurs familles se succèdent à la tête de la commune qui compte 60 feux soit environ 250 personnes.<br>      Jusqu’en 1565 le Seigneur DONGNIES règne sur la ville avant que Richard de MERODE ne lui succède jusqu’en 1611 date à laquelle la famille d’ISENGHIEN prendra la tête de la ville.<br>      À la révolution les échevins seront remplacés par une municipalité. Jean-Baptiste Rohaut est élu premier maire de Oignies le 8 février 1790.<br>      Le château de Oignies, sous son aspect actuel, fut le fruit de la construction de Mme de Lauragais avant d’appartenir à Mme De Clercq.<br>', 2),
(3, 'Histoire minière :', 'C’est dans le parc du château de Mme De Clercq que le charbon est découvert le 7 juin 1842 par l’ingénieur Mulot qui construisait un puits artésien. C’est la première découverte du charbon dans le Pas-de-Calais.<br>      L’exploitation du charbon sur Oignies commence au milieu du 19è siècle dans les fosses 1 et 2. En 1930, Oignies voit apparaître les fosses 9 / 9 bis et 10.<br>      Le 21 décembre 1990 la fosse 9 est la dernière mine du Nord-Pas-de-Calais à fermer ses portes. Le site de la fosse 9 / 9 bis a été inscrit en 1994 à l’inventaire des monuments historiques.<br>      À Oignies, la vie quotidienne a été marquée par la culture minière pendant 150 ans, aussi bien au niveau culturel, sportif, des relations sociales qu’au niveau de l’habitat.<br>      L’enjeu actuel, et ce depuis une dizaine d’années, est de mettre la ville sur les rails de la reconversion industrielle.<br>', 3),
(4, 'Oignies et la guerre :', 'Durant la guerre 1914-1918, Oignies est occupée par les allemands et les bombardements sont fréquents. La ville est en grande partie détruite et les allemands saccagent les mines en octobre 1918 juste avant leur retrait.<br>      Du 28 mai 1940 au 2 septembre 1944, Oignies est aux mains des nazis qui, le premier jour de leur occupation, ont incendié 380 maisons et fusillé 80 civils en représailles de la défense héroïque des habitants sur le pont de la Batterie      (massacre du 28 mai 1940).<br>      Au vingtième siècle la commune a reçu la visite de deux Présidents de la République en fonction. En 1919, c’est Georges Clémenceau qui vient remettre la Croix de Guerre à la ville.<br>      En 1948, Vincent Auriol, Président en fonction, accompagné de François Mitterrand, Secrétaire d’Etat aux Anciens Combattants remet à nouveau la Croix de Guerre à la ville et inaugure le Mausolée en mémoire des 80 fusillés du 28 mai 1940 et      déclare Oignies « Ville Martyre ».<br>', 4),
(5, 'Oignies de nos jours :', 'La ville de Oignies se sert de son passé pour se tourner vers l’avenir, elle met en avant son histoire et son patrimoine tout en se modernisant.<br>      Ainsi, la fosse du 9-9 bis accueille en son sein : <a href="">le Métaphone</a> (salle de spectacle et concert), des salles dédiées à l’apprentissage de la musique et de la danse, des studios d’enregistrement, une brasserie et bien d’autres      services.<br>      L’ensemble de ses éléments donne un souffle nouveau à la ville. À la fosse du 9-9bis le patrimoine minier et la création artistique se rencontrent pour permettre aux visiteurs de découvrir dans un cadre moderne et musical l’histoire de la      ville et des mines.<br>      Cet essor est encouragé récemment par l’inscription du bassin minier à l’UNESCO.<br>      Oignies est également une ville tournée vers l’avenir. Avec son emplacement géographique, très prisé dans le Nord- Pas de Calais, elle se développe au quotidien : nouvelles infrastructures, réhabilitation et embellissement des quartiers      miniers, construction de nouvelles habitations, développement économique, etc. à Oignies, demain est une priorité d’aujourd’hui.<br>', 5);

-- --------------------------------------------------------

--
-- Structure de la table `home`
--

CREATE TABLE `home` (
  `id_home` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `soustitre` text NOT NULL,
  `photo1` varchar(256) NOT NULL,
  `path1` varchar(256) NOT NULL,
  `title1` varchar(256) NOT NULL,
  `p1` text NOT NULL,
  `photo2` varchar(256) NOT NULL,
  `path2` varchar(256) NOT NULL,
  `title2` varchar(256) NOT NULL,
  `p2` text NOT NULL,
  `photo3` varchar(256) NOT NULL,
  `path3` varchar(256) NOT NULL,
  `title3` varchar(256) NOT NULL,
  `p3` text NOT NULL,
  `photo4` varchar(256) NOT NULL,
  `path4` varchar(256) NOT NULL,
  `title4` varchar(256) NOT NULL,
  `p4` text NOT NULL,
  `photo5` varchar(256) NOT NULL,
  `path5` varchar(256) NOT NULL,
  `title5` varchar(256) NOT NULL,
  `p5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `home`
--

INSERT INTO `home` (`id_home`, `id_pages`, `titre`, `soustitre`, `photo1`, `path1`, `title1`, `p1`, `photo2`, `path2`, `title2`, `p2`, `photo3`, `path3`, `title3`, `p3`, `photo4`, `path4`, `title4`, `p4`, `photo5`, `path5`, `title5`, `p5`) VALUES
(1, 1, 'Nos actualités ', 'Afin que le site ai de la gueule on a claqué un carroussel de photo sur la page d\'acceuil !<br>\r\nY\'a plus qu\'à cliquer sur la photo qui t\'interèsse et t\'arrive sur la page qui va bien.<br>\r\nC\'est pas beau la vie ?', '\\assets\\site\\img\\home_page\\bandeau-travaux-660x320.jpg', '', 'Parking rue Lamendin', 'C\'est des travaux', 'assets\\site\\img\\home_page\\quartier.png', '', 'Le Rendez-vous des habitants', 'Devenez acteurs de votre ville !', 'assets\\site\\img\\home_page\\pont.jpg', '', 'Point sur les travaux du pont de Courrières', 'C\'est fini!!', '', '', '', '', '', '', '', '');

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
(2, 'Vos Services', 5, 1, 'pages/home/', '#663399'),
(4, 'Vie locale', 4, 1, '', '#FF33CC'),
(3, 'Actualités', 2, 1, '', '#FF0000'),
(5, 'Infos pratiques', 3, 1, '', '#006666'),
(6, 'Nous contacter', 6, 0, '', '#330033'),
(1, 'Votre Mairie', 1, 1, '', '#CC9933');

-- --------------------------------------------------------

--
-- Structure de la table `pages`
--

CREATE TABLE `pages` (
  `id_pages` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `soustitre` varchar(100) NOT NULL,
  `background` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pages`
--

INSERT INTO `pages` (`id_pages`, `nom`, `titre`, `soustitre`, `background`, `type`) VALUES
(1, 'home', 'Bienvenue sur le nouveau site de la ville de Oignies !', 'Oignies : Dynamique avec vous', 'assets/site/img/background/chevaler.jpg', 'home'),
(2, 'urbanisme-et-logement', 'Urbanisme et logement', '', 'assets/site/img/background/Urbanisme-logement-plan.jpg', 'text'),
(3, 'elus', 'Vos Elus', '', 'assets/site/img/background/elus.jpg', 'bulle'),
(4, 'acceuil', 'L\'Acceuil', '', 'assets/site/img/background/mairie.jpg', 'bulle'),
(5, 'arretes_municipaux', 'Les arrêtés municipaux', '', 'assets/site/img/background/Arrêtés-municipaux.jpg', 'sans'),
(6, 'deliberations', 'Comptes-rendus du conseil municipal', '', 'assets/site/img/background/Délibérations-du-conseil-municipal.jpg', 'sans'),
(7, 'environnement', 'Environnement', '', 'assets/site/img/background/Environnement.jpg', 'text'),
(8, 'histoire', 'L\'histoire locale', '', 'assets/site/img/background/Histoire-locale.jpg', 'text'),
(9, 'seniors', 'Bel-âge', '', '', 'sans'),
(20, 'loremipsum', 'ma 1ère page !!!', 'et bim!!! Semimolle', 'assets/site/img/background/Jellyfish.jpg', 'text'),
(21, 'test article', 'test article', '', '', 'article'),
(32, 'testdesans', 'bla', 'lmjgdfgjdfljg', 'assets/site/img/background/Chrysanthemum.jpg', 'sans'),
(45, 'testbulle', 'bla', 'lmjgdfgjdfljg', 'assets/site/img/background/Chrysanthemum.jpg', 'bulle'),
(53, 'testdesuppressionpoursmenu', 'bla', '', 'assets/site/img/background/Chrysanthemum.jpg', 'text'),
(54, 'lesactus', 'Nos actus', 'lmjgdfgjdfljg', 'assets/site/img/background/pense.JPG', 'article');

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
(4, 'Bel-âge', 'pages/seniors', 2, 1),
(5, 'Professionnels', '', 3, 1),
(6, 'Jeunes', '', 4, 1),
(7, 'Nouveaux arrivants', '', 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sans`
--

CREATE TABLE `sans` (
  `id_sans` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `pg1` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sans`
--

INSERT INTO `sans` (`id_sans`, `id_pages`, `pg1`) VALUES
(1, 32, '<p>dsfdfldfgljfghjdfghmjdfghlkfghkfg</p>\r\n');

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
(1, 'L\'Acceuil de la Mairie', 'Votre Mairie', 1, 1, 'pages/acceuil/', 1),
(2, 'Démocratie Locale', 'Votre Mairie', 2, 1, '', 0),
(3, 'Vivre à Oignies', 'Votre Mairie', 3, 1, '', 0),
(5, 'Les services techniques', 'Vos Services', 2, 1, '', 1),
(6, 'La police municipale', 'Vos Services', 3, 0, '', 1),
(7, 'Scolaire et périscolaire', 'Vos Services', 4, 0, '', 1),
(8, 'Social et santé', 'Vos Services', 5, 1, '', 0),
(9, 'Culture', 'Vos Services', 6, 0, '', 0),
(10, 'Le journal Municipal', 'Actualités', 1, 1, '', 1),
(11, 'Les actus de la ville', 'Actualités', 3, 1, 'pages/lesactus/', 1),
(12, 'la ville se modernise (nouvelle page Facebook)', 'Actualités', 2, 1, '', 1),
(13, 'Abonnement newsletter', 'Votre Mairie', 4, 1, '', 1),
(14, 'Vie associative', 'Vie locale', 1, 1, '', 0),
(15, 'Vie économique', 'Vie locale', 1, 1, '', 0),
(16, 'Transport en commun et scolaires', 'Infos pratiques', 2, 1, 'pages/testbulle/', 1),
(17, 'Collecte des déchets', 'Infos pratiques', 4, 1, 'pages/testbulle/', 1),
(18, 'location de salle 2', 'Votre Mairie', 1, 0, '', 1),
(19, 'En cas d\'urgence...', 'Infos pratiques', 3, 0, '', 1),
(20, 'Sécurité, secours et santé', 'Infos pratiques', 5, 1, '', 0),
(4, 'Etat civil', 'Vos Services', 1, 1, '', 1),
(34, 'essai 2', 'Infos pratiques', 6, 0, '', 0),
(35, 'Roussel', 'Actualités', 4, 0, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `text`
--

CREATE TABLE `text` (
  `id_text` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `t1` varchar(256) NOT NULL,
  `pg1` text NOT NULL,
  `t2` varchar(256) DEFAULT NULL,
  `pg2` text,
  `t3` varchar(256) DEFAULT NULL,
  `pg3` text,
  `t4` varchar(256) DEFAULT NULL,
  `pg4` text,
  `t5` varchar(256) DEFAULT NULL,
  `pg5` text,
  `t6` varchar(256) DEFAULT NULL,
  `pg6` text,
  `t7` varchar(256) DEFAULT NULL,
  `pg7` text,
  `t8` varchar(256) DEFAULT NULL,
  `pg8` text,
  `t9` varchar(256) DEFAULT NULL,
  `pg9` text,
  `t10` varchar(256) DEFAULT NULL,
  `pg10` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `text`
--

INSERT INTO `text` (`id_text`, `id_pages`, `t1`, `pg1`, `t2`, `pg2`, `t3`, `pg3`, `t4`, `pg4`, `t5`, `pg5`, `t6`, `pg6`, `t7`, `pg7`, `t8`, `pg8`, `t9`, `pg9`, `t10`, `pg10`) VALUES
(1, 7, '', 'Conscient que l’enjeu environnemental prend de plus en plus d’importance dans notre société et qu’il est nécessaire d’envisager l’avenir dans une optique de développement durable la municipalité a mis en place une politique\r\n    environnementale forte, s’articulant autour de différents thèmes : Le recyclage des déchets, l’amélioration du cadre de vie et l’économie d’énergie, l’atelier nature et les actions de sensibilisation ponctuelles.', 'Cadre de vie :', 'L’amélioration du cadre de vie des habitants s’effectue avec les rénovations de logements dans les cités…<br>      Côté électrique, on note l’enfouissement des réseaux haute tension et l’installation d’ampoules à économie d’énergie sur l’éclairage public.<br>      Concernant l’eau, des efforts ont été faits pour récupérer les eaux pluviales, pour que celles-ci ne soient plus envoyées vers la station d’épuration mais qu’elles soient infiltrées sur place, permettant une réduction des coûts.<br>      Une réflexion a également été menée pour aménager de façon durable et efficace les espaces verts, notamment dans le quartier n°1 qui bénéficie d’une gestion écologique du site (taille décorative des plantes, aucun produit chimique      utilisé…).', 'Recyclage des déchets :', 'Cette thématique est un point important sur lequel l’équipe municipale oeuvre depuis plusieurs années.<br>      Nécessaire pour économiser les matières premières et l’argent ainsi que pour ne pas trop solliciter l’usine d’incinération, Oignies et l’ensemble de la communauté d’agglomération d’Hénin-Carvin, pratiquent le tri sélectif.<br>      Les citoyens de la ville disposent donc de poubelles différentes, une jaune et une bordeaux, correspondant aux différents types de déchets ménagers.<br>      Pour les déchets particuliers (verres et verts) la mairie procède a des ramassages périodiques.<br>      Concernant les bouteilles en verre, il est également possible de les déposer dans l’un des cuboverres répartis sur l’ensemble de la ville.', 'Actions ponctuelles :', 'Elles visent à sensibiliser la population aux enjeux de la préservation de l’environnement.<br>      Une centaine d’enfants des écoles primaires et maternelles de la commune ont par exemple participé à un grand nettoyage de printemps.<br>      Une action « Ville propre » a été menée au cours de l’année par la population encadrée par des élus et des employés municipaux.<br>      Chaque année également, les pêcheurs nettoyent le bras-mort.', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 8, 'Situation géographique :', '« Oignies, bouge la vie », telle est la devise qui a été choisie par le conseil municipal des jeunes, en 1996, pour symboliser la ville.<br>      Oignies, ville de l’ancien bassin minier, est située dans la région Nord Pas de Calais (environ 25 kilomètres au sud de Lille) et plus précisément dans l’arrondissement de Lens (environ 20 kilomètres) à la croisée de grands axes européens.<br>      Elle bénéficie d’une situation géographique et économique tout à fait privilégiée.<br>      C’est un véritable poumon vert à 2 heures de Bruxelles et Paris et à 3 heures de Londres, desservie directement par un échangeur sur l’autoroute A1, passage incontournable des flux entre les pays du Nord et du Sud.<br>      Elle fait partie de la Communauté d’agglomération Hénin-Carvin (CAHC) qui regroupe 14 communes, soit 125 000 habitants. La commune dépend du canton de Courrières.<br>      La population oigninoise (environ 10 000 habitants) est historiquement et culturellement marquée par l’industrie minière, et est en grande partie issue des immigrations successives.<br>', 'Histoire générale :', 'La ville de Oignies semble avoir été habitée dès les premiers siècles de l’ère chrétienne.<br>      Son nom était alors Ongniacume. Le nom de la ville apparaît sous son vocable actuel en 1184.<br>      Aux mains des seigneurs au Moyen-Âge, plusieurs familles se succèdent à la tête de la commune qui compte 60 feux soit environ 250 personnes.<br>      Jusqu’en 1565 le Seigneur DONGNIES règne sur la ville avant que Richard de MERODE ne lui succède jusqu’en 1611 date à laquelle la famille d’ISENGHIEN prendra la tête de la ville.<br>      À la révolution les échevins seront remplacés par une municipalité. Jean-Baptiste Rohaut est élu premier maire de Oignies le 8 février 1790.<br>      Le château de Oignies, sous son aspect actuel, fut le fruit de la construction de Mme de Lauragais avant d’appartenir à Mme De Clercq.<br>', 'Histoire minière :', 'C’est dans le parc du château de Mme De Clercq que le charbon est découvert le 7 juin 1842 par l’ingénieur Mulot qui construisait un puits artésien. C’est la première découverte du charbon dans le Pas-de-Calais.<br>      L’exploitation du charbon sur Oignies commence au milieu du 19è siècle dans les fosses 1 et 2. En 1930, Oignies voit apparaître les fosses 9 / 9 bis et 10.<br>      Le 21 décembre 1990 la fosse 9 est la dernière mine du Nord-Pas-de-Calais à fermer ses portes. Le site de la fosse 9 / 9 bis a été inscrit en 1994 à l’inventaire des monuments historiques.<br>      À Oignies, la vie quotidienne a été marquée par la culture minière pendant 150 ans, aussi bien au niveau culturel, sportif, des relations sociales qu’au niveau de l’habitat.<br>      L’enjeu actuel, et ce depuis une dizaine d’années, est de mettre la ville sur les rails de la reconversion industrielle.<br>', 'Oignies et la guerre :', 'Durant la guerre 1914-1918, Oignies est occupée par les allemands et les bombardements sont fréquents. La ville est en grande partie détruite et les allemands saccagent les mines en octobre 1918 juste avant leur retrait.<br>      Du 28 mai 1940 au 2 septembre 1944, Oignies est aux mains des nazis qui, le premier jour de leur occupation, ont incendié 380 maisons et fusillé 80 civils en représailles de la défense héroïque des habitants sur le pont de la Batterie      (massacre du 28 mai 1940).<br>      Au vingtième siècle la commune a reçu la visite de deux Présidents de la République en fonction. En 1919, c’est Georges Clémenceau qui vient remettre la Croix de Guerre à la ville.<br>      En 1948, Vincent Auriol, Président en fonction, accompagné de François Mitterrand, Secrétaire d’Etat aux Anciens Combattants remet à nouveau la Croix de Guerre à la ville et inaugure le Mausolée en mémoire des 80 fusillés du 28 mai 1940 et      déclare Oignies « Ville Martyre ».<br>', 'Oignies de nos jours ', 'La ville de Oignies se sert de son passé pour se tourner vers l’avenir, elle met en avant son histoire et son patrimoine tout en se modernisant.<br>      Ainsi, la fosse du 9-9 bis accueille en son sein : <a href="">le Métaphone</a> (salle de spectacle et concert), des salles dédiées à l’apprentissage de la musique et de la danse, des studios d’enregistrement, une brasserie et bien d’autres      services.<br>      L’ensemble de ses éléments donne un souffle nouveau à la ville. À la fosse du 9-9bis le patrimoine minier et la création artistique se rencontrent pour permettre aux visiteurs de découvrir dans un cadre moderne et musical l’histoire de la      ville et des mines.<br>      Cet essor est encouragé récemment par l’inscription du bassin minier à l’UNESCO.<br>      Oignies est également une ville tournée vers l’avenir. Avec son emplacement géographique, très prisé dans le Nord- Pas de Calais, elle se développe au quotidien : nouvelles infrastructures, réhabilitation et embellissement des quartiers      miniers, construction de nouvelles habitations, développement économique, etc. à Oignies, demain est une priorité d’aujourd’hui.<br>', '', '', '', '', '', '', '', '', '', ''),
(14, 20, 'lorem ipsum', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', 'dolor sit amet', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', 'consectetur', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 30, '1', '<p>location de\\salle les/tiret?</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 53, 'lorem ipsum', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'Vos Elus', 'Votre Mairie', 'Démocratie Locale', 1, 1, 'pages/elus/'),
(2, 'Les arrêtés municipaux', 'Votre Mairie', 'Démocratie Locale', 2, 1, 'pages/arretes_municipaux/'),
(3, 'Les délibérations du conseil municipal', 'Votre Mairie', 'Démocratie Locale', 3, 1, 'pages/deliberations/'),
(5, 'La maison d\'acceuil et d\'aide à l\'insertion (MAI)', 'Vos Services', 'Social et santé', 2, 1, ''),
(6, 'La Roseraie foyer de personnes agées', 'Vos Services', 'Social et santé', 3, 1, ''),
(7, 'Le béguinage Camille Delabre', 'Vos Services', 'Social et santé', 4, 1, ''),
(8, 'Les locaux de quartier', 'Vos Services', 'Social et santé', 5, 1, ''),
(9, 'Histoire locale', 'Votre Mairie', 'Vivre à Oignies', 3, 1, 'pages/histoire/'),
(10, 'Environnement', 'Votre Mairie', 'Vivre à Oignies', 1, 1, 'pages/environnement/'),
(11, 'Urbanisme et logement', 'Votre Mairie', 'Vivre à Oignies', 2, 1, 'pages/urbanisme-et-logement/'),
(12, 'Le centre Mozart (école de musique)', 'Vos Services', 'Culture', 4, 1, ''),
(13, 'La bibliothèque municipale', 'Vos Services', 'Culture', 3, 1, ''),
(14, 'Le centre Denis Papin', 'Vos Services', 'Culture', 1, 1, 'pages/test/'),
(15, 'Le Métaphone', 'Vos Services', 'Culture', 2, 1, 'pages/test/'),
(16, 'Associations culturelles', 'Vie locale', 'Vie associative', 2, 1, ''),
(17, 'Associations sportives', 'Vie locale', 'Vie associative', 1, 1, ''),
(18, 'Associations loisirs et autres', 'Vie locale', 'Vie associative', 3, 1, ''),
(19, 'Les commerçants', 'Vie locale', 'Vie économique', 2, 0, ''),
(20, 'Professions médicales et paramédicales', 'Vie locale', 'Vie économique', 1, 1, ''),
(21, 'L\'opération tranquilité vacances', 'Infos pratiques', 'Sécurité, secours et santé', 2, 1, ''),
(22, 'Le centre des Hautois', 'Infos pratiques', 'Sécurité, secours et santé', 1, 1, ''),
(4, 'Le centre social d\'action communale (CCAS)', 'Vos Services', 'Social et santé', 1, 1, '');

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
-- Index pour la table `arretes_municipaux`
--
ALTER TABLE `arretes_municipaux`
  ADD PRIMARY KEY (`id_muni`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_articles`);

--
-- Index pour la table `articlespage`
--
ALTER TABLE `articlespage`
  ADD PRIMARY KEY (`id_articlespage`);

--
-- Index pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD PRIMARY KEY (`id_bulle`),
  ADD KEY `id_pages` (`id_pages`);

--
-- Index pour la table `carroussel`
--
ALTER TABLE `carroussel`
  ADD PRIMARY KEY (`id_carroussel`),
  ADD KEY `id_pages` (`id_pages`);

--
-- Index pour la table `deliberations`
--
ALTER TABLE `deliberations`
  ADD PRIMARY KEY (`id_deliberations`);

--
-- Index pour la table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id_histoire`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_home`),
  ADD KEY `id_pages` (`id_pages`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id_pages`);

--
-- Index pour la table `rapide`
--
ALTER TABLE `rapide`
  ADD PRIMARY KEY (`id_rapide`),
  ADD UNIQUE KEY `ordre` (`ordre`);

--
-- Index pour la table `sans`
--
ALTER TABLE `sans`
  ADD PRIMARY KEY (`id_sans`),
  ADD KEY `id_pages` (`id_pages`);

--
-- Index pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  ADD PRIMARY KEY (`id_sousmenu`);

--
-- Index pour la table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id_text`),
  ADD KEY `id_pages` (`id_pages`);

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
-- AUTO_INCREMENT pour la table `arretes_municipaux`
--
ALTER TABLE `arretes_municipaux`
  MODIFY `id_muni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `articlespage`
--
ALTER TABLE `articlespage`
  MODIFY `id_articlespage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `bulle`
--
ALTER TABLE `bulle`
  MODIFY `id_bulle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `carroussel`
--
ALTER TABLE `carroussel`
  MODIFY `id_carroussel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `deliberations`
--
ALTER TABLE `deliberations`
  MODIFY `id_deliberations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id_histoire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `home`
--
ALTER TABLE `home`
  MODIFY `id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT pour la table `rapide`
--
ALTER TABLE `rapide`
  MODIFY `id_rapide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sans`
--
ALTER TABLE `sans`
  MODIFY `id_sans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  MODIFY `id_sousmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT pour la table `text`
--
ALTER TABLE `text`
  MODIFY `id_text` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `third_level`
--
ALTER TABLE `third_level`
  MODIFY `id_third` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id_travaux` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `bulle`
--
ALTER TABLE `bulle`
  ADD CONSTRAINT `bulle_ibfk_1` FOREIGN KEY (`id_pages`) REFERENCES `pages` (`id_pages`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
