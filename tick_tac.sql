-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 15 juil. 2019 à 22:04
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tick&tac`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `del` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `del`) VALUES
(1, 'Monoprix', 0),
(2, 'SFR', 0),
(3, 'Carrefour', 0),
(4, 'Wifirst', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comm`
--

DROP TABLE IF EXISTS `comm`;
CREATE TABLE IF NOT EXISTS `comm` (
  `id_mess` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_tick` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mess`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comm`
--

INSERT INTO `comm` (`id_mess`, `user`, `id_tick`, `text`, `del`) VALUES
(1, 'yaya', 1, 'lourd', 0),
(2, 'yaya', 1, 'grave', 0),
(3, 'joss', 1, 'hkfsd', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

DROP TABLE IF EXISTS `etat`;
CREATE TABLE IF NOT EXISTS `etat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `etat`
--

INSERT INTO `etat` (`id`, `statut`) VALUES
(1, 'Nouveau'),
(2, 'Ouvert'),
(3, 'Planifié'),
(4, 'Livré'),
(5, 'Validé informatique'),
(6, 'Validé Métier'),
(7, 'Terminé');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `code_projet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `client` int(11) NOT NULL,
  `del` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code_projet`),
  KEY `client` (`client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`code_projet`, `nom`, `description`, `client`, `del`) VALUES
('double_entrepot_V1', 'Manhattan', 'Ajout dans le WMS des fonctionnalités permettant le traitement de commandes web', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `etat` int(11) NOT NULL,
  `client` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `application` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drec` date DEFAULT NULL,
  `dmep` date DEFAULT NULL,
  `rapporteur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `responsable` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nobody',
  `dcre` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dmaj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `del` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `etat` (`etat`),
  KEY `rapporteur` (`rapporteur`),
  KEY `responsable` (`responsable`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `nom`, `description`, `etat`, `client`, `application`, `drec`, `dmep`, `rapporteur`, `responsable`, `dcre`, `dmaj`, `del`) VALUES
(1, 'Optimisation picking mezzanine', 'Le calcul de l\'itinéraire lors du picking article n\'est pas optimal et oblige les opérateurs à monter et descendre.', 7, 'Monoprix', 'Logidrive', '2019-07-13', '2019-08-03', 'joss', 'joss', '2019-07-11 19:04:39', '2019-07-15 14:41:28', 0),
(2, 'deuxième', 'kfgdshlwkjgfbvc,bd,hbgdsjhf', 1, 'Monoprix', 'Manhattan', NULL, NULL, 'joss', 'nobody', '2019-07-13 19:07:07', '2019-07-13 19:07:07', 1),
(3, 'Citadine', 'dfvxbv', 1, 'Monoprix', 'Logidrive', NULL, NULL, 'joss', 'nobody', '2019-07-13 22:26:45', '2019-07-13 22:26:45', 1),
(4, 'POMME', 'jkfkj,hc', 1, 'Monoprix', 'Logidrive', NULL, NULL, 'joss', 'nobody', '2019-07-15 08:29:42', '2019-07-15 08:29:42', 1),
(5, 'dd', 'ddfds', 1, 'Monoprix', 'JSP', NULL, NULL, 'joss', 'joss', '2019-07-15 08:31:13', '2019-07-15 08:31:13', 1),
(6, 'Cr&eacute;ation interface user', 'Cr&eacute;ation interface user', 1, 'SFR', 'Espace client', NULL, NULL, 'joss', 'Yaya', '2019-07-15 20:19:09', '2019-07-15 20:19:09', 0),
(7, 'Block Chain du poulet', 'Block Chain du poulet', 2, 'Carrefour', 'LEA', '2019-07-22', NULL, 'yaya', 'Leo', '2019-07-15 21:36:17', '2019-07-15 21:42:14', 0),
(8, 'Bug dans le sch&eacute;ma du r&eacute;seau', 'Bug dans le sch&eacute;ma du r&eacute;seau', 4, 'Wifirst', 'Topologie', '2019-07-02', '2019-07-17', 'joss', 'lulu', '2019-07-15 21:44:06', '2019-07-15 21:44:38', 0),
(9, 'Ajout r&eacute;f&eacute;rentiel serveur', 'Ajout r&eacute;f&eacute;rentiel serveur', 3, 'Carrefour', 'CTT', '2019-07-19', NULL, 'joss', 'Leo', '2019-07-15 21:47:00', '2019-07-15 21:47:11', 0),
(10, 'Erreur dans send_stk sur Clesud', 'Le champ qte de la table out_stock_histo est trop petit, ce qui a emp&eacute;ch&eacute; le bon fonctionnement du batch send_stk', 5, 'Monoprix', 'Logidrive', '2019-05-23', '2019-07-27', 'joss', 'joss', '2019-07-15 21:49:36', '2019-07-15 21:49:48', 0),
(11, 'Création de la table publication stock central', 'Création de la table publication stock central', 6, 'Monoprix', 'BI TML', '2019-07-01', '2019-07-22', 'joss', 'joss', '2019-07-15 21:56:19', '2019-07-15 21:56:55', 0),
(12, 'Purge table de r&eacute;servation logique', 'Programmer une purge des r&eacute;sa logique avec un d&eacute;lai de 20 jours &agrave; partir de la date de fin de manif', 1, 'Monoprix', 'Cockpit REA', NULL, NULL, 'joss', 'nobody', '2019-07-15 21:58:26', '2019-07-15 21:58:26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profil` text COLLATE utf8_unicode_ci NOT NULL,
  `del` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user`, `mdp`, `prenom`, `nom`, `mail`, `profil`, `del`) VALUES
('joss', '$2y$10$0WPVZVryur/NXfOmCKgqIuvelOlklSe.B7dH0.D5t6Ak.UNnd.p2m', 'Josselyn', 'Poir&eacute;', 'josselyn.poire@efrei.net', 'Developpeur', 0),
('Leo', '$2y$10$r0Lk3aBeRBuYErt6ac87ne2r6wukbr48vakAzfyEBAP8w9Z8I2yUC', 'L&eacute;onard', 'Capillon', 'lc@leo.fr', 'Developpeur', 0),
('lulu', '$2y$10$MUWTrP4B7A1Ajk0Ew9uB4uplZeKYyr2Y0BFpsNmN69y1zXwoFSz3m', 'Lucas', 'Janet', 'lj@lulu.fr', 'Developpeur', 0),
('nobody', '  ', 'Non', 'assigné', '   ', '   ', 0),
('Yaya', '$2y$10$KGTZeeomF87an6xVnJn2wOmj.bJKnLpiItuodpOlfCRl9FYVcko2K', 'Yasmine', 'Dahak', 'yd@yaya.al', 'Developpeur', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
