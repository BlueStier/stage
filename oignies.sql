-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 03 Octobre 2018 à 16:26
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
(1, 'assets/uploads/arretes/2018/Arrêté-signalisation_-rue-des-Tulipes-.pdf', 2018),
(2, 'assets/uploads/arretes/2018/Arrêté-signalisation_-rue-V.-Hugo-.pdf', 2018),
(3, 'assets/uploads/arretes/2018/Arrêté-trvx-BHNS.pdf', 2018),
(4, 'assets/uploads/arretes/2018/CMCF-28-juillet-au-27-août-2018-.pdf', 2018),
(5, 'assets/uploads/arretes/2017/Parcours-du-coeur_animations-place-Poste.pdf', 2017),
(6, 'assets/uploads/arretes/2017/Marché-Puces-APE-Pasteur-.pdf', 2017),
(7, 'assets/uploads/arretes/2017/Terrasse-café-Le-Bellevue-.pdf', 2017),
(8, '/ressources/uploads/arretes/2017/Occupation-temporaire-domaine-public_Assemblée-Générale-Crédit-Mutuel.pdf', 2017),
(9, 'assets/uploads/arretes/2016/Marché-aux-Puces_-Amicale-du-Personnel.pdf', 2016),
(10, 'assets/uploads/arretes/2016/Depôt-de-gerbe-Journée-Nationale-du-Souvenir.pdf', 2016),
(11, 'assets/uploads/arretes/2016/Fête-foraine_Pâques.pdf', 2016),
(12, 'assets/uploads/arretes/2016/Terrasse_CHAMARI-Bar-.pdf', 2016),
(13, 'assets/uploads/arretes/2015/EFS-annonces.pdf', 2015),
(14, 'assets/uploads/arretes/2015/EFS-Statt-camion-rue-Renan.pdf', 2015),
(15, 'assets/uploads/arretes/2015/EFS-Statt-car-sur-la-Place.pdf', 2015),
(16, 'assets/uploads/arretes/2015/Stationnement-camion-OUTIROR_16-mars-2015.pdf', 2015);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_articles` int(11) NOT NULL,
  `id_articlespage` int(11) NOT NULL,
  `jour` date NOT NULL,
  `photo` varchar(256) NOT NULL,
  `titre` varchar(256) NOT NULL,
  `text` text NOT NULL,
  `alerte` date DEFAULT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `id_articlespage`, `jour`, `photo`, `titre`, `text`, `alerte`, `visible`) VALUES
(1, 54, '2018-09-27', 'assets/site/img/articles/semimolle.JPG', 'le titre', '<p>Je pensais,il a menti en chaque mot, L&#39;hideux infirme,de son &oelig;il qu&#39;il disait voil&eacute; par le songe</p>\r\n\r\n<p>De biais contemplait l&#39;effet de ses mensonges Sur moi,et sa bouche,incapable de masquer les cahots</p>\r\n\r\n<p>De sa liesse,qui secouait et tordait son corps bot</p>\r\n\r\n<p>Devant l&#39;agonie de la victime que la mort ronge.</p>\r\n\r\n<p>Quel autre dessin e&ucirc;t pu animer ce menteur diabolique?</p>\r\n\r\n<p>De son b&acirc;ton dress&eacute; tel un attrape-foudre furieux Il leurre,menace, et s&eacute;duit le curieux Qui demande son chemin. Et ce rire satanique Graverait je n&#39;en dout l&#39;&eacute;pitaphe v&eacute;ridique Relatant ma venue en ces maudits lieux. III Si fort de ses conseils je devais me d&eacute;tourner De ma route pour m&#39;engager dans le sinistre chemin,o&ugrave;, Comme chacun le sait,se cache la Tour Noire, c&#39;est pourtant sans remous, Et dicuke,que je m&#39;y aventurai. Sans nulle fiert&eacute; Ni impatience raviv&eacute;e de jamaiis entrevoir mon but tant convoit&eacute; Ni m&ecirc;me aucune fin-je n&#39;avais pas cet espoir fou. IV Car apr&egrave;s avoir sillon&eacute; le vasre monde,en entier Et cherch&eacute; en vain toutes ces longues ann&eacute;es,qu&#39;&eacute;tail-il advenu De ma qu&ecirc;te,de ma foi d&eacute;clinantes,ces fant&ocirc;mes abattus, N&#39;eussent pu porter le poids de cet espoir trop vif,plein de t&eacute;m&eacute;rit&eacute; Et c&#39;est &agrave; peine si je sus r&eacute;mrimer le bond enchant&eacute; Que fit mon c&oelig;ur,sentant la d&eacute;faite venue. V Et lorsque le malade approchant du tr&eacute;pas Sent comencer et finir Les larmes de peine,et qu&#39;adieu aux amis il doit dire Il entend l&#39;un supplier l&#39;autre de partir,retenr son souffle las, Plus librement dehos (&laquo; puisque tout esr achev&eacute;,que la fin est l&agrave; Et que le coup port&eacute;,aucun chagrin ne viendra adoucir &raquo;) VI Quand d&#39;aucuns d&eacute;battent,cherchant si place ils trouveront Entre les tombes moussues,pour celle de ce vaillant Et si pour porter sa d&eacute;pouille il est jour plus cl&eacute;ment Et si,ayant soin des banni&egrave;res,des &eacute;charpes et des tristes chansons L&#39;homme toujours entend tout et une seule soif berce son c&oelig;ur si bon Celle de ne pas faillir et trahir un amour si tendre,en demeurant. VII Ainsi,depuis si longtemps,j&#39;endurais cette qu&ecirc;te insens&eacute;e Et voyais mon &eacute;chec chant&eacute; dans po&egrave;mes et proph&eacute;ties Tant de fois,parmi la troupe,de ceux qui ont choisit cet exil inou&iuml;, Ces chevaliers qui &agrave; la Tour adress&egrave;rent leurs pas et leurs r&ecirc;ves &eacute;th&eacute;r&eacute;s Qu&#39;&eacute;chouer comme eux me paraissait galvaud&eacute; Mais certain-car qui pourrait lutter contre ce doute assassin: et sij&#39;&eacute;tais honni? VIII Et muet comme le d&eacute;sespoir qui m&#39;&eacute;treignait,je me d&eacute;tournai De cet odieux estropi&eacute;,je quittai son chemin Pour porter mes pas dans celui qu&#39;il vantait. Car ce jour sans fin M&#39;avait &eacute;t&eacute; bien lugubre,et avant que de voir le soir tomber Et le clore,je souffris le regard &eacute;carlate et mauvais Qui ensanglante la plaine,d&#39;un mavabre et malin. IX Qu&#39;on m&#39;entende! &Agrave; peine m&#39;&eacute;tais-je promis le c&oelig;ur loyal &Agrave; la plaine,au bout d&#39;un pas ou deux Alors que je me retournai pour lancer un regard d&#39;adieu Sur la route bien s&ucirc;re qui m&#39;avait men&eacute; en ce songe sans &eacute;gal Elle avait disparu;plus rien d&#39;autre que les plaines griss et &eacute;tales &Agrave; perte de vue:je ne pus que poursuivre,car quoi faire en ces lieux? X Aussi je marchai. Je ne crois pas avoir jamais entrevu de mes yeux Nature plus affam&eacute;e et ignoble ,rien n&#39; y prosp&eacute;rait gu&egrave;re Pas une fleur-comment r&ecirc;ver d&#39;une c&eacute;dri&egrave;re! Tandis que l&#39;euphorbe et la chienlit,comme la loi le veut Se propageaient &agrave; l&#39;envi,si bien qu&#39;au c&oelig;ur ainsi un peu De bardane &eacute;gar&eacute;e e&ucirc;t &eacute;t&eacute; une heureuse surprise,et bien l&eacute;g&egrave;re XI Point! P&eacute;nurie,langueur et grimace, Bien &eacute;trange &eacute;tait le lot de cette affreuse terre. &laquo; Vois ou femre les yeux &raquo;,disait M&egrave;re Nature,de son air Maussade: &laquo; Rien ne veut fleurir,je ne puis m&ecirc;me saiver la face: C&#39;est le Jugement Dernier qui de ses flammes lavera cette place Qui en calcinera les mottes de mes prisonniers rompra les fers. &raquo; XII Et si un chardon tout &eacute;plum&eacute; poussait l&agrave; par hasard, Se dressant au-dessus du lot,c&#39;&eacute;tait d&eacute;capit&eacute;, car l&#39;agrostide &eacute;tait jalouse ici. Qui avait creus&eacute; ces trous et ces crevasses dans les orties Et les feuilles bistr&eacute;es et r&ecirc;ches de la patience,qui avait tout r&eacute;duit en friche chaotique,tuant tout espoir De verdure? Une brute,&agrave; n&#39;en point douter,&agrave; l&#39;&acirc;me noire Soufflant toute vie comme une chandelle, telle une b&ecirc;te sans merci. XIII Quant &agrave; l&#39;herbe,elle poussait il est vrai aussi maigre que son pelage Frapp&eacute; de l&egrave;pre;des brins &eacute;pars per&ccedil;aient la boue Qui paraissait p&eacute;trie de sang par-dessous Une rosse aveugle,dont chaqe os saillait comme apr&egrave;s le carnage Se tenait en stupeur,frapp&eacute;e par un mirage, Chass&eacute;e du haras du Diable m&ecirc;me &agrave; grand renfort de coups! XIV Vivant? L&#39;anial &agrave; mes yeux pouvait avoir p&eacute;ri sans un pleur D&eacute;charn&eacute;,la carcasse saignant,et d&#39;un spectre ayant l&#39;air Il gardait les yeux clos sous une immonde crini&egrave;re Alliance incongrue du ridicule et de pareille douleur Jamais je ne vis brute auss digne d&#39;&ecirc;tre frapp&eacute;e de malheur Il fallait bien qu&#39;il f&ucirc;t mal&eacute;fique pour m&eacute;riter tel salaire. XV Je fermai les yeux et les ouvris sur mon c&oelig;ur Comme un homme commandant le vin avant d&#39;aller guerroyer J&#39;appelai de mes v&oelig;ux une rasade de visions plus heureuse du pass&eacute; Afin de retrouver l&#39;espoir de jouer mon r&ocirc;le en vainqueur. Penser d&#39;abord,et puis combattre tout l&#39;art du soldat,sa valeur, Car le go&ucirc;t furtif des temps anciens gu&eacute;rit de tout,vrai! XVI Pas cela! Je ne pus d&eacute;tacher mon regard incertain De la face rougie de Cuthbert,sous les boucles d&#39;or Cher compagnon,qui jadis f&acirc;ch&eacute; dans un ultime effort, Glissa,je le sentis,son beau bras sous le mien Car ainsi il &eacute;tait,tout sourrire,m&ecirc;me quand p&eacute;rit le Bien Et avec lui mon c&oelig;ur &agrave; peine &eacute;veill&eacute;,dans le souffle du cor. XVII Et donc,l&#39;&acirc;me de l&#39;honneur-le voici debout l&agrave;,si beau Aussi franc que dix ans plus t&ocirc;t,alors jeune chevalier, Qu&#39;un hommer loyal v&icirc;nt le d&eacute;fier (dit-il) il saurait l&#39;affronter Dans les bonnes r&egrave;gles -mais voil&agrave; que glisse la sc&egrave;ne- pouah! Quel bourreau A clou&eacute; sur son sein un vil parchemin? Et ses propres compa- gnons de fourreau De le lire. Pauvre tra&icirc;tre,jouet des crachats et des quolibets! XVIII Plut&ocirc;t ce pr&eacute;sent qu&#39;un pass&eacute; qui s&#39;offre tel: Me voil&agrave; de retour sur ma route assombrie! Aucun son,nulle vision aussi loin que l&#39;&oelig;il s&#39;enqu&icirc;t, Un hibou ou une chauve-souris,la nuit m&#39;enverra-t-elle? Implorais-je;quand soudain sur la terre plane et lugubre une image nouvelle Arr&ecirc;ta mes pens&eacute;es et le cours j&#39;en perdis. XIX En travers de ma route,soudain,une rivi&egrave;re, Tel le serpent surgit par surprise Mais point de marr&eacute;e paresseuse et douce,dans les t&eacute;n&egrave;bres grises. Celle-l&agrave; &eacute;cumait et e&ucirc;t pu satisfaire Le d&eacute;mon venu y baigner son sabot rougeoyant-&agrave; voir l&#39;ardente col&egrave;re, Des ses remours noirs &eacute;clabouss&eacute;s d&#39;&eacute;caillures et de mousse,o&ugrave; l&#39;on s&#39;enlise. XX Si insignifiante,et pourtant si venimeuse,sur ses berges aust&egrave;res De bas aulnes rabougris venaient s&#39;agenouiller pr&egrave;s de l&#39;eau agit&eacute;e Et saules d&eacute;tremp&eacute;s les jetant t&ecirc;te baiss&eacute;e En n mouvement de muet d&eacute;sespoir,foule suicidaire: Et le courant qui les torturait ainsi, nullement &eacute;mu par leur calvaire Suivait sa route,pas un instant perturb&eacute;. XXI Et tandis que je passais &agrave; gu&eacute;-par tous les saints, comme jecraignais De poser pied sur la joue de quelque cadavre ou moribond &Agrave; chaque pas,ou de sentir la lance de laquelle je sondais les fonds Pr&eacute;venant les &eacute;cueils,prisonier de sa chevelure ou de sa barbe serr&eacute;e Un rat d&#39;eau sns doute,que de mon b&acirc;ton je r&eacute;veillai Mais Die! Combien son cri rappelait le hurlement d&#39;un nourrisson. XXII Et je fus trop heureux de gagner la berge oppos&eacute;e Le pays parraissait plus cl&eacute;ment. Vain pr&eacute;sage! Qui &eacute;taient les combattants,quelle guerre menaient-ils, quel en &eacute;tait le visage Quel pi&eacute;tinement sauvage &eacute;tait venu &eacute;craser le sol d&eacute;tremp&eacute; En un frais clapotis?Crapauds en leur cuve empoisonn&eacute;e Ou chats sauvages dans ler rougeoyante cage- XXIII Ainsi paraissaient les traces d&#39;un antique combat en ce d&eacute;cor sauvage Qui les confiniat l&agrave;,quand toute la plaine s&#39;offrait &agrave; eux? Nulle trace de pas ne menait &agrave; ce miaulement v&eacute;n&eacute;neux Aucune ne s&#39;en &eacute;loignait. Immonde saumure &agrave; l&#39;ouvrage Leur cerveau,nul doute, comme le Turc son gal&eacute;rien, qu&#39;il a fait esclave Appelle son divertissement,Chr&eacute;tiens contre Juifs, en un combat odieux. XXIV Et plus que cela-&agrave; un furlong-si pr&egrave;s,juste l&agrave;,vraiment! &Agrave; quel funeste usage ce moteur,cette roue &eacute;taient-ils r&eacute;serv&eacute;s? Ou plut&ocirc;t ce frein-cett herse faite pour tourner, Pour rouler et filer les cadavres comme la soie, avec l&#39;air insouciant De l&#39;outil du Tophet,laiss&eacute; sur terre comme par &eacute;garement Ou pour aff&ucirc;ter ces dents rouill&eacute;es d&#39;acier. XXV Puis apparut une lande pi&eacute;tin&eacute;e,jadis un bois &eacute;trange, Puis mar&eacute;cage semblait-il,et enfin simple terre d&eacute;sol&eacute;e Et st&eacute;rile (l&#39;idiot y trouvera une raison de se gausser &Agrave; cr&eacute;er une chose,puis &agrave; la g&acirc;ter, jusqu&#39;&agrave; ce que d&#39;humeur il change Et le voil&agrave; reparti!);en un quart d&#39;arpent,sombre m&eacute;lange De marais,d&#39;argile et de d&eacute;combres, et de d&eacute;solation am&egrave;re et d&eacute;peupl&eacute;e. XXVI D&#39;imprudentes taches,d&#39;un gris sinistre color&eacute;es Des aplats o&ugrave; le sol ras,maigre pitance Laissait place &agrave; la mousse,pareille &agrave; des furoncles, abjectes substances Puis surgit un ch&ecirc;ne paralys&eacute;,en son sein une profonde fissure creus&eacute;e Telle une bouche distordue,fendue,d&eacute;chir&eacute;e Suffoquant,aspirant la mort,et mourant dans une ultime transe. XXVII Et toujours aussi loin de la fin! Rien d&#39;autre &agrave; l&#39;horizon que le cr&eacute;puscule, rien qui vienne l&#39;&oelig;il rassurer Ou le pas guider! &Agrave; cette pens&eacute;e, Je vis un grand corbeau,ami du c&oelig;ur d&#39;Apollyon,</p>\r\n', '2018-12-11', 1),
(6, 54, '2018-09-27', 'assets/site/img/articles/Lighthouse.jpg', 'un titre ?', '<p>lorem ipsum.............................................................</p>\r\n\r\n<p>..............................................................................................</p>\r\n\r\n<p>.............................................................................................</p>\r\n\r\n<p>etc etc et bla bla...............................................................</p>\r\n\r\n<p>lorem ipsum.............................................................</p>\r\n\r\n<p>..............................................................................................</p>\r\n\r\n<p>.............................................................................................</p>\r\n\r\n<p>etc etc et bla bla...............................................................</p>\r\n\r\n<p>lorem ipsum.............................................................</p>\r\n\r\n<p>..............................................................................................</p>\r\n\r\n<p>.............................................................................................</p>\r\n\r\n<p>etc etc et bla bla...............................................................</p>\r\n\r\n<p>lorem ipsum.............................................................</p>\r\n\r\n<p>..............................................................................................</p>\r\n\r\n<p>.............................................................................................</p>\r\n\r\n<p>etc etc et bla bla...............................................................</p>\r\n', '2018-09-10', 1),
(8, 56, '2018-09-28', 'assets/site/img/articles/Hydrangeas.jpg', 'bon on voit ça', '<p>En l&#39;an 2100, la Terre, &eacute;touff&eacute;e par une population grandissante, envoie onze immenses&nbsp;<a href="https://fr.wikipedia.org/wiki/Vaisseau_g%C3%A9n%C3%A9rationnel">vaisseaux g&eacute;n&eacute;rationnels</a>&nbsp;pour coloniser l&#39;espace.</p>\r\n\r\n<p>Trois si&egrave;cles plus tard, ils sont d&eacute;couverts par les Ildirans, un ancien peuple ma&icirc;trisant le&nbsp;<a href="https://fr.wikipedia.org/wiki/Vitesse_supraluminique_dans_la_science-fiction">voyage spatial supra-luminique</a>.</p>\r\n\r\n<p>Les extraterrestres bienveillants offrent aux humains cette technologie, permettant la colonisation rapide de tout le bras spiral.</p>\r\n\r\n<p>Apr&egrave;s la d&eacute;couverte d&#39;une arme cr&eacute;&eacute;e par une civilisation &eacute;teinte, les Klikiss, les humains enflamment une g&eacute;ante gazeuse, Oncier, sans se douter qu&#39;ils r&eacute;veillent par l&agrave; une ancienne guerre d&rsquo;ampleur galactique et tac</p>\r\n', NULL, 1);

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
(54, '<p>c&#39;est un test pour voir si j&#39;arrive &agrave; faire le update de la page article.</p>\r\n\r\n<p>OUI ?</p>\r\n\r\n<h1>c bon &ccedil;a !!!!!</h1>\r\n'),
(55, '<p>loremipsum</p>\r\n'),
(56, '<p>c pour voir ou on en est</p>\r\n');

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
  `trt1` varchar(256) NOT NULL,
  `tx2` text,
  `photo2` varchar(256) DEFAULT NULL,
  `trt2` varchar(256) NOT NULL,
  `tx3` text,
  `photo3` varchar(256) DEFAULT NULL,
  `trt3` varchar(256) NOT NULL,
  `tx4` text,
  `photo4` varchar(256) DEFAULT NULL,
  `trt4` varchar(256) NOT NULL,
  `tx5` text,
  `photo5` varchar(256) DEFAULT NULL,
  `trt5` varchar(256) NOT NULL,
  `tx6` text,
  `photo6` varchar(256) DEFAULT NULL,
  `trt6` varchar(256) NOT NULL,
  `tx7` text,
  `photo7` varchar(256) DEFAULT NULL,
  `trt7` varchar(256) NOT NULL,
  `tx8` text,
  `photo8` varchar(256) DEFAULT NULL,
  `trt8` varchar(256) NOT NULL,
  `tx9` text,
  `photo9` varchar(256) DEFAULT NULL,
  `trt9` varchar(256) NOT NULL,
  `tx10` text,
  `photo10` varchar(256) DEFAULT NULL,
  `trt10` varchar(256) NOT NULL,
  `sup` text,
  `trtsup` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bulle`
--

INSERT INTO `bulle` (`id_bulle`, `id_pages`, `titre`, `soustitre`, `tx1`, `photo1`, `trt1`, `tx2`, `photo2`, `trt2`, `tx3`, `photo3`, `trt3`, `tx4`, `photo4`, `trt4`, `tx5`, `photo5`, `trt5`, `tx6`, `photo6`, `trt6`, `tx7`, `photo7`, `trt7`, `tx8`, `photo8`, `trt8`, `tx9`, `photo9`, `trt9`, `tx10`, `photo10`, `trt10`, `sup`, `trtsup`) VALUES
(1, 4, 'Le service accueil de la mairie de Oignies', 'Sans aucun doute le service avec lequel les usagers sont le plus en contact', '<p>Les agents du service accueil sont charg&eacute;s de r&eacute;pondre au t&eacute;l&eacute;phone, d&rsquo;orienter les demandes vers le service concern&eacute; et sont &eacute;galement responsables de l&rsquo;accueil physique des visiteurs de la mairie.</p>\r\n\r\n<h2>Adresse :</h2>\r\n\r\n<p>Mairie de Oignies :</p>\r\n\r\n<p>Place de la IV&egrave;me R&eacute;publique</p>\r\n\r\n<p>62590 Oignies</p>\r\n\r\n<p>Tel :&nbsp;03 21 74 80 50</p>\r\n\r\n<p>Fax :&nbsp;03 21 37 32 59</p>\r\n\r\n<h2>Horaires d&rsquo;ouverture des services administratifs :</h2>\r\n\r\n<p>Du lundi au vendredi :&nbsp;</p>\r\n\r\n<p>de 8 h 30 &agrave; 12 h 00 et de 13 h 30 &agrave; 17 h 30</p>\r\n\r\n<p>Le samedi :&nbsp;</p>\r\n\r\n<p>de 9 h 00 &agrave; 12 h 00</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'assets/site/img/about/Accueil-de-la-Mairie.jpg', 'Accueil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 3, '', '', '<h1>Fabienne Dupuis&nbsp;</h1>\r\n\r\n<h2>Maire de oignies</h2>\r\n', '/assets/site/img/about/Fabienne-Dupuis.gif', 'Le Maire', '<h1>test</h1>\r\n\r\n<h2>1er adjoint aux finances et &agrave; la s&eacute;curit&eacute; publique</h2>\r\n', '/assets/site/img/about/Boigelot-Alain.gif', '1er adjoint aux finances et à la sécurité publique', '<p>Harlette</p>\r\n', 'assets/site/img/about/Arlette-Hnat.gif', 'test', '', '/assets/site/img/about/Brigitte-Duparcq.gif', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '<h3>Les conseillers d&eacute;l&eacute;gu&eacute;s :</h3>\r\n\r\n<p><strong>Nadine Ladevez :</strong></p>\r\n\r\n<p>&nbsp;D&eacute;l&eacute;gu&eacute;e &agrave; l&rsquo;am&eacute;lioration du cadre de vie et &agrave; la r&eacute;novation des cit&eacute;s mini&egrave;res</p>\r\n\r\n<p><strong>Patrick Callot :</strong></p>\r\n\r\n<p>D&eacute;l&eacute;gu&eacute; aux relations ext&eacute;rieures et &agrave; la pratique sportive</p>\r\n\r\n<p><strong>Jean-Claude Szrama</strong></p>\r\n\r\n<p>D&eacute;l&eacute;gu&eacute; aux liens interg&eacute;n&eacute;rationnels</p>\r\n\r\n<h3>Les conseillers municipaux :</h3>\r\n\r\n<p>Nadine Ziane&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nathalie Przybyla&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Arnaud Flanquart&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;Fran&ccedil;ois Vial&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sylvie Ypreeuw&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sabrina Goetinck</p>\r\n\r\n<p>Carole Cecini&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;David Wojdowski&nbsp;</p>\r\n', 'Les conseillers délégués et les conseillers municipaux           '),
(11, 45, '', '', '<p>ggg</p>\r\n', 'assets/site/img/about/Hydrangeas.jpg', '', '<p>la la la</p>\r\n', 'assets/site/img/about/Jellyfish.jpg', '', '<p>bla bla bla</p>\r\n', 'assets/site/img/about/haaa.JPG', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '<p>ggggg</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>PUTAIN &ccedil;a va marcher ??? Me faut un canard ?</p>\r\n', '');

-- --------------------------------------------------------

--
-- Structure de la table `carroussel`
--

CREATE TABLE `carroussel` (
  `id_carroussel` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `text` text NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `carroussel`
--

INSERT INTO `carroussel` (`id_carroussel`, `id_pages`, `text`, `path`) VALUES
(40, 61, '<p>on est bo!!!!</p>\r\n', 'assets/site/img/carroussel/sport');

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
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `id_pages` int(11) NOT NULL,
  `text` text NOT NULL,
  `path` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `document`
--

INSERT INTO `document` (`id_document`, `id_pages`, `text`, `path`) VALUES
(12, 74, '', 'assets/uploads/test-de-doc-2');

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
  `intro` text NOT NULL,
  `photo1` varchar(256) NOT NULL,
  `path1` varchar(256) NOT NULL,
  `title1` varchar(256) NOT NULL,
  `p1` text NOT NULL,
  `type1` tinyint(1) DEFAULT NULL,
  `assos_id1` int(10) DEFAULT NULL,
  `photo2` varchar(256) NOT NULL,
  `path2` varchar(256) NOT NULL,
  `title2` varchar(256) NOT NULL,
  `p2` text NOT NULL,
  `type2` tinyint(1) DEFAULT NULL,
  `assos_id2` int(10) DEFAULT NULL,
  `photo3` varchar(256) NOT NULL,
  `path3` varchar(256) NOT NULL,
  `title3` varchar(256) NOT NULL,
  `p3` text NOT NULL,
  `type3` tinyint(1) DEFAULT NULL,
  `assos_id3` int(10) DEFAULT NULL,
  `photo4` varchar(256) NOT NULL,
  `path4` varchar(256) NOT NULL,
  `title4` varchar(256) NOT NULL,
  `p4` text NOT NULL,
  `type4` tinyint(1) DEFAULT NULL,
  `assos_id4` int(10) DEFAULT NULL,
  `photo5` varchar(256) NOT NULL,
  `path5` varchar(256) NOT NULL,
  `title5` varchar(256) NOT NULL,
  `p5` text NOT NULL,
  `type5` tinyint(1) DEFAULT NULL,
  `assos_id5` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `home`
--

INSERT INTO `home` (`id_home`, `id_pages`, `intro`, `photo1`, `path1`, `title1`, `p1`, `type1`, `assos_id1`, `photo2`, `path2`, `title2`, `p2`, `type2`, `assos_id2`, `photo3`, `path3`, `title3`, `p3`, `type3`, `assos_id3`, `photo4`, `path4`, `title4`, `p4`, `type4`, `assos_id4`, `photo5`, `path5`, `title5`, `p5`, `type5`, `assos_id5`) VALUES
(1, 1, '<p>Afin que le site ai de la gueule on a claqu&eacute; un carroussel de photo sur la page d&#39;acceuil !<br />\r\nY&#39;a plus qu&#39;&agrave; cliquer sur la photo qui t&#39;inter&egrave;sse et t&#39;arrive sur la page qui va bien.<br />\r\nC&#39;est pas beau la vie ? et l&agrave;</p>\r\n', 'assets/site/img/background/elus.jpg', 'pages/elus/', 'un test de modif du carroussel2', 'et bim ça marche!!! enfin je crois', 1, 3, 'assets/site/img/articles/semimolle.JPG', 'pages/lesactus/#le-titre', '2eme photo', '', 0, 1, 'assets/site/img/articles/Hydrangeas.jpg', 'pages/testdepagearticle/#bon-on-voit-ça', 'Point sur les travaux du pont de Courrières', 'C\'est fini!!', 0, 8, '', '', '', '', NULL, NULL, '', '', '', '', NULL, NULL);

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
(5, 'Ma démocratie', 3, 1, 'pages/elus/', '#006666'),
(2, 'Vos Services', 5, 0, '', '#663399'),
(4, 'Mon portail famille', 4, 1, '', '#FF33CC'),
(3, 'Mes temps libres', 2, 1, '', '#FF0000'),
(1, 'Ma ville', 1, 1, '', '#CC9933'),
(6, 'Nous contacter', 6, 0, '', '#330033');

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
(1, 'home', 'Ville de Oignies !', 'Dynamique avec vous ', 'assets/site/img/background/chevaler.jpg', 'home'),
(2, 'urbanisme-et-logement', 'Urbanisme et logement', '', 'assets/site/img/background/Urbanisme-logement-plan.jpg', 'text'),
(3, 'elus', 'Vos Elus', '', 'assets/site/img/background/elus.jpg', 'bulle'),
(4, 'accueil', 'L\'Accueil', '', 'assets/site/img/background/mairie.jpg', 'bulle'),
(5, 'arretes-municipaux', 'Les arrêtés municipaux', '', 'assets/site/img/background/Arrêtés-municipaux.jpg', 'arretes-municipaux'),
(6, 'deliberations', 'Comptes-rendus du conseil municipal', '', 'assets/site/img/background/Délibérations-du-conseil-municipal.jpg', 'deliberations'),
(7, 'environnement', 'Environnement', '', 'assets/site/img/background/Environnement.jpg', 'text'),
(8, 'histoire', 'L\'histoire locale', '', 'assets/site/img/background/Histoire-locale.jpg', 'text'),
(9, 'seniors', 'Bel-âge', '', '', 'document'),
(20, 'loremipsum', 'ma 1ère page !!!', 'et bim!!! Semimolle', 'assets/site/img/background/Jellyfish.jpg', 'text'),
(45, 'testouillebull', 'bla', 'lmjgdfgjdfljg', 'assets/site/img/background/Chrysanthemum.jpg', 'bulle'),
(53, 'testouille', 'bla', '', 'assets/site/img/background/Chrysanthemum.jpg', 'text'),
(54, 'lesactus', 'Nos actus', 'lmjgdfgjdfljg', 'assets/site/img/background/pense.JPG', 'article'),
(56, 'testdepagearticle', 'bla', 'lmjgdfgjdfljg', 'assets/site/img/background/Desert.jpg', 'article'),
(58, 'test-de-sans', 'bla', '', 'assets/site/img/background/Hydrangeas.jpg', 'sans'),
(61, 'sport', 'bla', '', 'assets/site/img/background/IMG_0799.JPG', 'carroussel'),
(74, 'test-de-doc-2', 'bla', 'lmjgdfgjdfljg', 'assets/site/img/background/haaa.JPG', 'document');

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
(3, 58, '<p>lorem ipsum et de la merde ou pas</p>\r\n');

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
(1, 'Accueil de la mairie', 'Ma ville', 1, 1, 'pages/accueil/', 1),
(2, 'Démocratie Locale', 'Votre Mairie', 2, 1, '', 0),
(3, 'Vivre à Oignies', 'Votre Mairie', 3, 1, '', 0),
(5, 'Les services techniques', 'Ma ville', 2, 1, '', 1),
(6, 'La police municipale', 'Ma ville', 6, 1, '', 1),
(7, 'Scolaire et périscolaire', 'Ma ville', 4, 1, '', 1),
(8, 'Social et santé', 'Ma ville', 5, 1, '', 0),
(9, 'Culture', 'Ma ville', 3, 1, '', 0),
(10, 'Le journal Municipal', 'Actualités', 1, 0, '', 1),
(11, 'Les actus de la ville', 'Actualités', 3, 1, 'pages/lesactus/', 1),
(12, 'la ville se modernise (nouvelle page Facebook)', 'Actualités', 2, 0, '', 1),
(13, 'Abonnement newsletter', 'Votre Mairie', 4, 1, '', 1),
(14, 'Vie associative', 'Vie locale', 1, 1, 'pages/testouillebull/', 0),
(15, 'Vie économique', 'Vie locale', 1, 1, '', 0),
(16, 'Transport en commun et scolaires', 'Infos pratiques', 2, 0, '', 1),
(17, 'Collecte des déchets', 'Infos pratiques', 4, 0, '', 1),
(18, 'location de salle 2', 'Votre Mairie', 1, 0, '', 1),
(19, 'En cas d\'urgence...', 'Infos pratiques', 3, 0, '', 1),
(20, 'Sécurité, secours et santé', 'Infos pratiques', 5, 1, '', 0),
(4, 'Etat civil', 'Ma ville', 0, 1, '', 1),
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
(14, 20, 'lorem ipsum :-)', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', 'dolor sit amet', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'consectetur', '<p>&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 30, '1', '<p>location de\\salle les/tiret?</p>\r\n', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 53, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
(1, 'Vos Elus', 'Votre Mairie', 'Démocratie Locale', 1, 0, ''),
(2, 'Les arrêtés municipaux', 'Votre Mairie', 'Démocratie Locale', 2, 1, 'pages/arretes-municipaux/'),
(3, 'Les délibérations du conseil municipal', 'Votre Mairie', 'Démocratie Locale', 3, 1, 'pages/deliberations/'),
(5, 'La maison d\'acceuil et d\'aide à l\'insertion (MAI)', 'Ma ville', 'Social et santé', 2, 0, ''),
(6, 'La Roseraie foyer de personnes agées', 'Ma ville', 'Social et santé', 3, 1, ''),
(7, 'Le béguinage Camille Delabre', 'Ma ville', 'Social et santé', 4, 1, ''),
(8, 'Les locaux de quartier', 'Ma ville', 'Social et santé', 5, 1, ''),
(9, 'Histoire locale', 'Votre Mairie', 'Vivre à Oignies', 3, 1, 'pages/histoire/'),
(10, 'Environnement', 'Votre Mairie', 'Vivre à Oignies', 1, 1, 'pages/environnement/'),
(11, 'Urbanisme et logement', 'Votre Mairie', 'Vivre à Oignies', 2, 1, 'pages/urbanisme-et-logement/'),
(12, 'Le centre Mozart (école de musique)', 'Ma ville', 'Culture', 4, 1, ''),
(13, 'La bibliothèque municipale', 'Ma ville', 'Culture', 3, 1, ''),
(14, 'Le centre Denis Papin', 'Ma ville', 'Culture', 1, 1, 'pages/test-de-doc-2/'),
(15, 'Le Métaphone', 'Ma ville', 'Culture', 2, 0, ''),
(16, 'Associations culturelles', 'Vie locale', 'Vie associative', 2, 0, ''),
(17, 'Associations sportives', 'Vie locale', 'Vie associative', 1, 1, 'pages/sport/'),
(18, 'Associations loisirs et autres', 'Vie locale', 'Vie associative', 3, 1, ''),
(19, 'Les commerçants', 'Vie locale', 'Vie économique', 2, 0, ''),
(20, 'Professions médicales et paramédicales', 'Vie locale', 'Vie économique', 1, 0, ''),
(21, 'L\'opération tranquilité vacances', 'Infos pratiques', 'Sécurité, secours et santé', 1, 1, ''),
(22, 'Le centre des Hautois', 'Infos pratiques', 'essai 2', 1, 0, ''),
(4, 'Le centre social d\'action communale (CCAS)', 'Ma ville', 'Social et santé', 1, 1, '');

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
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`);

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
  MODIFY `id_articles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `articlespage`
--
ALTER TABLE `articlespage`
  MODIFY `id_articlespage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT pour la table `bulle`
--
ALTER TABLE `bulle`
  MODIFY `id_bulle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `carroussel`
--
ALTER TABLE `carroussel`
  MODIFY `id_carroussel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT pour la table `deliberations`
--
ALTER TABLE `deliberations`
  MODIFY `id_deliberations` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `pages`
--
ALTER TABLE `pages`
  MODIFY `id_pages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT pour la table `rapide`
--
ALTER TABLE `rapide`
  MODIFY `id_rapide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sans`
--
ALTER TABLE `sans`
  MODIFY `id_sans` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `sousmenu`
--
ALTER TABLE `sousmenu`
  MODIFY `id_sousmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
