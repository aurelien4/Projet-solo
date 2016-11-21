-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 19 Novembre 2016 à 19:29
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blogphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `auteurs` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `nbCom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`ID`, `titre`, `contenu`, `auteurs`, `image`, `date_creation`, `nbCom`) VALUES
(1, 'Testtest', 'zaezaezaiomk,dsqmk,lezdsqlkm;fdslk;dskodsqoilk,dsqipmlk,dsmlkdxkml;,fdscxml;', 'Chibisan', 'world-1138035_960_720.jpg', '2016-11-19 15:51:13', 8);

-- --------------------------------------------------------

--
-- Structure de la table `ban`
--

CREATE TABLE `ban` (
  `id_ban` int(11) NOT NULL,
  `banni` tinyint(1) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `timing` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ban`
--

INSERT INTO `ban` (`id_ban`, `banni`, `ID_user`, `timing`) VALUES
(9, 1, 9, '2016-11-15 15:34:00'),
(8, 1, 8, '2016-11-16 05:05:00');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `ID_commentaire` int(11) NOT NULL,
  `ID_article` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`ID_commentaire`, `ID_article`, `pseudo`, `commentaire`, `date_commentaire`) VALUES
(8, 1, 'Chibisan', 'zaerterze', '2016-11-19 20:10:57'),
(9, 1, 'Chibisan', 'zaearez', '2016-11-19 20:11:02'),
(10, 1, 'Zaeboos', 'zaezatrzds\r\n', '2016-11-19 20:11:19');

-- --------------------------------------------------------

--
-- Structure de la table `super_users`
--

CREATE TABLE `super_users` (
  `ID` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `super_users`
--

INSERT INTO `super_users` (`ID`, `ID_user`, `pseudo`, `date_creation`) VALUES
(1, 3, 'Chibisan', '2016-11-07 14:12:19');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID_user`, `email`, `pseudo`, `password`, `date_inscription`) VALUES
(3, 'aurelmoreau@outlook.fr', 'Chibisan', '$2y$10$dHL2Kw5z4rFLmBq06TKmJeYSuo5D.q6YVvMTWrU2qBN6qFP5FMgUy', '2016-11-07 16:50:09'),
(5, 'akimitchi@hotmail.fr', 'Zaeboos', '$2y$10$JyVDHlMNqyvl4fK.CrqkOenzt4jpYn14kxnd6HM3ESxIbSAdMPvlG', '2016-11-14 14:28:26'),
(8, 'azerty@gmail.com', 'azerty', '$2y$10$KyHOZwc05tUyiTqXW0Wcf..maRa6P.F7ayje6xs3xSfXkfDdL.MN6', '2016-11-14 15:04:14'),
(9, 'qwerty@hotmail.fr', 'qwerty', '$2y$10$5bsC4DKIVcs55vUCWzK/m.gy/GQ.2K7p.OTdFKYiN0wR9K8P7I0jy', '2016-11-14 15:08:03');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `titre` (`titre`);
ALTER TABLE `articles` ADD FULLTEXT KEY `contenu` (`contenu`);
ALTER TABLE `articles` ADD FULLTEXT KEY `titre_2` (`titre`);
ALTER TABLE `articles` ADD FULLTEXT KEY `contenu_2` (`contenu`,`titre`);

--
-- Index pour la table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id_ban`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`ID_commentaire`);

--
-- Index pour la table `super_users`
--
ALTER TABLE `super_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ban`
--
ALTER TABLE `ban`
  MODIFY `id_ban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `ID_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `super_users`
--
ALTER TABLE `super_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
