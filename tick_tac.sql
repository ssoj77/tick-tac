-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 08 Juillet 2019 à 07:33
-- Version du serveur :  5.5.59-0+deb8u1
-- Version de PHP :  5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `tick&tac`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

/*CREATE USER 'tick' IDENTIFIED BY 'tac';
GRANT select,insert,update on 'tick&tac'.* to 'tick';*/

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `code_projet` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
`id` int(11) NOT NULL,
  `code_projet` varchar(50) DEFAULT NULL,
  `etat` enum('Nouveau','Ouvert','Planifié','Livré','Validé Informatique','Validé Métier','Terminé') NOT NULL DEFAULT 'Nouveau',
  `responsable` varchar(20) NOT NULL DEFAULT 'Non assigné',
  `rapporteur` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `drec` date DEFAULT NULL,
  `dmep` date DEFAULT NULL,
  `application` varchar(50) NOT NULL,
  `dcre` date NOT NULL,
  `dmaj` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(20) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `profil` enum('Développeur','Rapporteur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user`, `mdp`, `prenom`, `nom`, `mail`, `profil`) VALUES
('joss', '$2y$10$7HC3FH2Ocw91ytgmGnbHrOAY/pBZ7ByHdMkRYGB7h6cyGsDtd9CuW', 'Josselyn', 'Poiré', 'josselyn.poire@efrei.net', 'Développeur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
 ADD PRIMARY KEY (`code_projet`), ADD KEY `client` (`client`);

--
-- Index pour la table `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`id`), ADD KEY `rapporteur` (`rapporteur`), ADD KEY `code_projet` (`code_projet`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ticket`
--
ALTER TABLE `ticket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `ticket`
--
ALTER TABLE `ticket`
ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`code_projet`) REFERENCES `projet` (`code_projet`),
ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`rapporteur`) REFERENCES `user` (`user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
