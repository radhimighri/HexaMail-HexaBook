-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 10 avr. 2019 à 19:41
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `poly1.3`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcom` int(50) NOT NULL,
  `idpub` int(50) NOT NULL,
  `idp` int(50) NOT NULL,
  `textecom` longtext NOT NULL,
  `datecomm` varchar(50) NOT NULL,
  `heure3` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`idcom`, `idpub`, `idp`, `textecom`, `datecomm`, `heure3`) VALUES
(75, 53, 29, 'coool', '09-04-2019', '23:06'),
(76, 54, 31, 'ok', '09-04-2019', '23:10'),
(77, 53, 31, 'super', '09-04-2019', '23:10'),
(78, 53, 30, 'Allah Allah ya salem', '09-04-2019', '23:11'),
(79, 53, 30, 'jaw jaw', '09-04-2019', '23:13'),
(80, 54, 32, 'Je suis partant', '10-04-2019', '00:02'),
(82, 53, 29, 'lol', '10-04-2019', '18:54');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idimg` int(10) NOT NULL,
  `idmem` int(10) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`idimg`, `idmem`, `chemin`, `type`) VALUES
(47, 29, 'img/me.jpg', '5'),
(48, 31, 'img/ghanouchi.jpg', '5'),
(49, 30, 'img/polylogo.png', '5'),
(50, 32, 'img/polylogo.png', '5'),
(51, 29, 'img/me.jpg', '5'),
(52, 29, 'img/me.jpg', '5'),
(53, 29, 'img/me.jpg', '5'),
(54, 29, 'img/me.jpg', '5'),
(55, 29, 'img/me.jpg', '5'),
(56, 29, 'img/me.jpg', '5'),
(57, 29, 'img/me.jpg', '5'),
(58, 29, 'img/me.jpg', '5'),
(59, 29, 'img/me.jpg', '5');

-- --------------------------------------------------------

--
-- Structure de la table `imgprofil`
--

CREATE TABLE `imgprofil` (
  `idmp` int(50) NOT NULL,
  `idp` int(50) NOT NULL,
  `chemin` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pass` varchar(12) NOT NULL,
  `pass_confirm` varchar(12) NOT NULL,
  `datenais` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `login`, `pass`, `pass_confirm`, `datenais`, `email`, `nom`, `prenom`, `sex`, `country`) VALUES
(29, 'radhi', '111111', '111111', '1991-02-28', 'radhi.mighri@polytechnicien.tn', 'MIGHRI', 'RADHI', 'M', 'TUNISIA'),
(30, 'Wajih', '111111', '111111', '1997-07-25', 'aw@polytechnicien.tn', 'WAJIH', 'GHALI', 'M', 'Tunisia'),
(31, 'HACHEM', '111111', '111111', '1990-01-26', 'HACHEM.BEN@polytechnicien.tn', 'BEN AMOR', 'Hachem', 'M', 'Tunisia'),
(32, 'Imed', '111111', '111111', '1982-06-26', 'IMED.BOUDRIGA@polytechnicien.tn', 'BOUDRIGA', 'IMED', 'M', 'Tunisia');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL DEFAULT '0',
  `id_destinataire` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `titre` text NOT NULL,
  `message` longtext NOT NULL,
  `lu` int(1) NOT NULL,
  `trash` int(1) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_expediteur`, `id_destinataire`, `date`, `titre`, `message`, `lu`, `trash`, `picture`) VALUES
(291, 29, 31, '2019-03-23 23:44:39', 'BONJOUR', 'APPEL MOI C URGENT', 1, 1, 'img/'),
(292, 29, 30, '2019-03-23 23:44:53', 'BONJOUR', 'APPEL MOI C URGENT', 1, 0, 'img/'),
(293, 30, 29, '2019-03-23 23:47:11', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Puis-je avoir l\'horaire de la 2Ã¨me semestre ?</div><div>Bav</div><div><br></div><div>Med Ali</div><div><br></div><div>EPS-3Ã¨me INFO-Grp1</div>', 1, 0, 'img/'),
(294, 29, 30, '2019-03-23 23:48:34', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div><div><br></div>', 1, 0, 'img/horaire.png'),
(295, 30, 31, '2019-03-23 23:49:33', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div><div><br></div>', 1, 1, 'img/'),
(296, 29, 30, '2019-03-23 23:57:44', 'Horaire 2eme semestre', 'UGKJGKGKIKJ', 0, 0, 'img/'),
(297, 31, 30, '2019-03-23 23:58:55', 'Horaire 2eme semestre', 'UJKJKJHKJKLJ', 0, 0, 'img/'),
(298, 31, 29, '2019-03-23 23:59:17', 'BONJOUR', 'JKKJJKHKJN', 1, 0, 'img/'),
(299, 31, 30, '2019-03-23 23:59:59', 'Horaire 2eme semestre', 'KLJLKHHKJHKJ', 0, 0, 'img/'),
(300, 31, 29, '2019-03-24 00:00:12', 'BONJOUR', 'JIHKJGKJJK', 1, 0, 'img/'),
(301, 29, 31, '2019-03-24 00:47:33', 'BONJOUR', 'OK', 1, 1, 'img/'),
(302, 32, 29, '2019-03-24 00:50:12', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Puis-je avoir l\'horaire de la 2Ã¨me semestre ?</div><div>Bav<br>BOUDRIGA IMED<br>EPS</div>', 1, 0, 'img/'),
(303, 29, 32, '2019-03-24 00:51:05', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div>', 1, 0, 'img/horaire.png'),
(304, 32, 31, '2019-03-24 00:52:08', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div>', 1, 1, 'img/'),
(305, 29, 31, '2019-03-26 12:46:54', 'OKOKO', '.?DSFL?DS/', 0, 0, 'img/');

-- --------------------------------------------------------

--
-- Structure de la table `msg_sent`
--

CREATE TABLE `msg_sent` (
  `id` int(10) NOT NULL,
  `id_expediteur` int(10) NOT NULL,
  `id_destinataire` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `titre` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `lu` int(1) NOT NULL,
  `trash` int(1) NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `msg_sent`
--

INSERT INTO `msg_sent` (`id`, `id_expediteur`, `id_destinataire`, `date`, `titre`, `message`, `lu`, `trash`, `picture`) VALUES
(184, 29, 30, '2019-03-23 23:57:44', 'Horaire 2eme semestre', 'UGKJGKGKIKJ', 0, 1, 'img/'),
(189, 29, 31, '2019-03-24 00:47:33', 'BONJOUR', 'OK', 0, 1, 'img/'),
(191, 29, 32, '2019-03-24 00:51:05', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div>', 0, 0, 'img/horaire.png'),
(192, 32, 31, '2019-03-24 00:52:08', 'Horaire 2eme semestre', '<div>Bonsoir,</div><div><br></div><div>Veuillez trouver ci-joint la derniÃ¨re version de votre emploi de temps.</div><div><br></div><div>Cette version est opÃ©rationnelle Ã  partir du lundi 25/03/2019.</div><div><br></div><div>Le dÃ©marrage des cours des langues sera Ã  partir de la semaine prochaine</div><div><br></div><div>Votre enseignant de Prog Phyton 2 Mr Ghazi Blaiech sera absent demain.</div><div><br></div><div>Veuillez SVP partager lâ€™information avec vos collÃ¨gues.</div><div><br></div><div>Bonne chance.</div><div><br></div><div>MIGHRI Radhi</div><div>EPS-Service ScolaritÃ©</div>', 0, 0, 'img/'),
(193, 29, 31, '2019-03-26 12:46:54', 'OKOKO', '.?DSFL?DS/', 0, 0, 'img/');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `idpub` int(50) NOT NULL,
  `idp` int(50) NOT NULL,
  `titre` varchar(1000) NOT NULL,
  `datepub` varchar(50) NOT NULL,
  `heure` varchar(50) DEFAULT NULL,
  `target` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `publication`
--

INSERT INTO `publication` (`idpub`, `idp`, `titre`, `datepub`, `heure`, `target`) VALUES
(36, 29, 'Offre Speciale Pour les Gamers les plus doue ! Profitez de la Reduction Exclusive sur le Pc Gaming DELL G3 3579, dote d\'un processeur Intel Core I7-8750H, une carte GRAPHIQUE NVIDIA GTX 1050Ti 4Go et une capacite de stockage de 1To + 128Go SSD.\r\nDisponible dans les magasins WIKI.', '09-04-2019', '21:45', 'upload_image/pc.jpg'),
(44, 29, 'Une meteo perturbee devrait nous concerner jusqu\'a jeudi. A partir de vendredi, si le temps devient plus calme, les temperatures vont fortement baisser et repasseront bien en-dessous des temperatures de saison.', '09-04-2019', '22:20', 'upload_image/meteo.jpg'),
(53, 29, 'Coming soon !!!', '09-04-2019', '23:04', 'upload_image/local.png'),
(54, 29, 'Soyez les bienvenus', '09-04-2019', '23:07', 'upload_image/event.png'),
(55, 31, 'lol', '10-04-2019', '18:45', 'upload_image/lol.jpg'),
(57, 29, 'Reconnaissants aux martyrs de la nation.\r\nVive la Tunisie ðŸ‡¹ðŸ‡³ðŸ‡¹ðŸ‡³\r\n#PolytecSousse #Tunisie #fÃªtedesmartyrs\r\n', '10-04-2019', '18:53', 'upload_image/martyr.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcom`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idimg`);

--
-- Index pour la table `imgprofil`
--
ALTER TABLE `imgprofil`
  ADD PRIMARY KEY (`idmp`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `msg_sent`
--
ALTER TABLE `msg_sent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`idpub`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcom` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idimg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `imgprofil`
--
ALTER TABLE `imgprofil`
  MODIFY `idmp` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT pour la table `msg_sent`
--
ALTER TABLE `msg_sent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `idpub` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
