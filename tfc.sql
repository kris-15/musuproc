-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 14 août 2023 à 19:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tfc`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `acces`
--

INSERT INTO `acces` (`id`, `code`, `mdp`) VALUES
(1, 'Etudiant', 'EtudiantUpc');

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `code`, `mdp`) VALUES
(1, 'Musuproc', 'MusUpc1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `postnom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `sexe` enum('MASCULIN','FEMININ') NOT NULL DEFAULT 'MASCULIN',
  `matricule` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `promotion` varchar(30) NOT NULL,
  `faculte` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `lieu` varchar(30) NOT NULL,
  `ddn` date NOT NULL,
  `statut` enum('ACCEPTE','REJETE','ATTENTE') NOT NULL DEFAULT 'ATTENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `matricule`, `nationalite`, `promotion`, `faculte`, `adresse`, `telephone`, `lieu`, `ddn`, `statut`) VALUES
(1, 'Minimbu', 'Bam\'s', 'Keren', 'FEMININ', 'SI20203', 'Congolaise', 'G3', 'FASI', '24 Novembre Lingwala', '+243827387041', 'Kinshasa', '2002-05-07', 'ACCEPTE'),
(2, 'Makedika', 'Matondo', 'David', 'MASCULIN', 'SI20205', 'Congolaise', 'G2', 'FASI', 'Kinshasa 34 Kinshasa', '+243827387034', 'Matadi', '2004-05-03', 'ACCEPTE'),
(4, 'Matodo', 'Matondo', 'Derick', 'MASCULIN', 'SI20225', 'Congolaise', 'G3 DF', 'DROIT', 'Matumona 52 Barumbu', '+243827687034', 'Kikwit', '2002-06-02', 'ATTENTE'),
(5, 'Muolo', 'Muolo', 'Mardoché', 'MASCULIN', 'SI20212', 'Congolaise', 'G3 GI', 'FASI', 'Kinshasa', '+243827387041', 'Kinshasa', '2004-12-12', 'ATTENTE'),
(6, 'Kasongo', 'Kalawu', 'Dhanis', 'MASCULIN', 'EM20203', 'congolaise', 'L1 LMD', 'FASE', 'Mbuyu 65 Kinkole Nsele', '+243844478383', 'Kinshasa', '2003-07-01', 'ATTENTE'),
(9, 'Kabeya', 'Kamwanga', 'Joseph', 'MASCULIN', 'ED20242', 'Congolaise', 'G2', 'FASE', 'Lumumba 12 Kinshasa ', '+243827777777', 'Mbuji-Mayi', '2000-09-02', 'ATTENTE'),
(10, 'Kanku', 'Kabeya', 'Josue', 'MASCULIN', 'DR20203', 'congolaise', 'L1 LMD', 'DROIT', 'Popokabaka 32 Congo kasavubu', '+243844444444', 'Kananga', '2004-08-21', 'ACCEPTE');

-- --------------------------------------------------------

--
-- Structure de la table `livrets`
--

CREATE TABLE `livrets` (
  `id` int(11) NOT NULL,
  `statut_livret` enum('RECUPERE','ATTENTE') DEFAULT 'ATTENTE',
  `statut_impression` enum('IMPRIME','ATTENTE') NOT NULL DEFAULT 'ATTENTE',
  `etudiant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livrets`
--

INSERT INTO `livrets` (`id`, `statut_livret`, `statut_impression`, `etudiant_id`) VALUES
(1, 'ATTENTE', 'IMPRIME', 1),
(2, 'ATTENTE', 'ATTENTE', 10),
(3, 'ATTENTE', 'IMPRIME', 2);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `heure` varchar(30) NOT NULL,
  `date_soin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricule` (`matricule`);

--
-- Index pour la table `livrets`
--
ALTER TABLE `livrets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`etudiant_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acces`
--
ALTER TABLE `acces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `livrets`
--
ALTER TABLE `livrets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livrets`
--
ALTER TABLE `livrets`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
