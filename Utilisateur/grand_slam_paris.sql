-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 fév. 2025 à 00:57
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `grand_slam_paris`
--

-- --------------------------------------------------------

--
-- Structure de la table `combat`
--

CREATE TABLE `combat` (
  `id_combat` int(11) NOT NULL,
  `num_tatami` int(11) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `id_jdk1` int(11) NOT NULL,
  `id_jdk2` int(11) NOT NULL,
  `score_j1` int(11) DEFAULT 0,
  `score_j2` int(11) DEFAULT 0,
  `shidos_j1` int(11) DEFAULT 0,
  `shidos_j2` int(11) DEFAULT 0,
  `vainqueur` int(11) DEFAULT NULL,
  `statut` enum('en cours','termine','a venir') NOT NULL,
  `duree` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentateur`
--

CREATE TABLE `commentateur` (
  `id_commentateur` int(11) NOT NULL,
  `id_combat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commenter`
--

CREATE TABLE `commenter` (
  `id_commentaire` int(11) NOT NULL,
  `id_combat` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `judoka`
--

CREATE TABLE `judoka` (
  `id_judoka` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nationalite` varchar(100) NOT NULL,
  `categorie_poids` varchar(10) NOT NULL,
  `sexe` enum('F','M') NOT NULL,
  `club` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

CREATE TABLE `statistique` (
  `id_judoka` int(11) NOT NULL,
  `id_tournoi` int(11) NOT NULL,
  `nbr_ippons` int(11) NOT NULL DEFAULT 0,
  `nbr_waza` int(11) NOT NULL DEFAULT 0,
  `nbr_shidos` int(11) NOT NULL DEFAULT 0,
  `temps_moyen_combat` time NOT NULL,
  `nbr_victoires` int(11) NOT NULL DEFAULT 0,
  `nbr_defaites` int(11) NOT NULL DEFAULT 0,
  `trophees` varchar(255) NOT NULL,
  `classement_mondial` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE `tournoi` (
  `id_tournoi` int(11) NOT NULL,
  `edition` year(4) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` enum('a venir','en cours','termine') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` enum('inscrit','commentateur','administrateur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `combat`
--
ALTER TABLE `combat`
  ADD PRIMARY KEY (`id_combat`),
  ADD KEY `jdk` (`id_jdk1`,`id_jdk2`,`vainqueur`);

--
-- Index pour la table `commentateur`
--
ALTER TABLE `commentateur`
  ADD PRIMARY KEY (`id_commentateur`),
  ADD KEY `id_combat` (`id_combat`);

--
-- Index pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`id_commentaire`,`id_combat`,`id_utilisateur`),
  ADD KEY `id_combat` (`id_combat`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `judoka`
--
ALTER TABLE `judoka`
  ADD PRIMARY KEY (`id_judoka`);

--
-- Index pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD PRIMARY KEY (`id_judoka`),
  ADD KEY `tournoi` (`id_tournoi`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`id_tournoi`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `combat`
--
ALTER TABLE `combat`
  MODIFY `id_combat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commenter`
--
ALTER TABLE `commenter`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `judoka`
--
ALTER TABLE `judoka`
  MODIFY `id_judoka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tournoi`
--
ALTER TABLE `tournoi`
  MODIFY `id_tournoi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `combat`
--
ALTER TABLE `combat`
  ADD CONSTRAINT `combat_ibfk_1` FOREIGN KEY (`id_jdk1`) REFERENCES `judoka` (`id_judoka`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combat_ibfk_2` FOREIGN KEY (`id_jdk2`) REFERENCES `judoka` (`id_judoka`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `combat_ibfk_3` FOREIGN KEY (`vainqueur`) REFERENCES `judoka` (`id_judoka`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentateur`
--
ALTER TABLE `commentateur`
  ADD CONSTRAINT `commentateur_ibfk_1` FOREIGN KEY (`id_combat`) REFERENCES `combat` (`id_combat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`id_combat`) REFERENCES `combat` (`id_combat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD CONSTRAINT `statistique_ibfk_1` FOREIGN KEY (`id_tournoi`) REFERENCES `tournoi` (`id_tournoi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `statistique_ibfk_2` FOREIGN KEY (`id_judoka`) REFERENCES `judoka` (`id_judoka`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
