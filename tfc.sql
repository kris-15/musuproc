-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 17 août 2023 à 01:47
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
  `code` varchar(10) DEFAULT 'CODE123',
  `statut` enum('ACCEPTE','REJETE','ATTENTE') NOT NULL DEFAULT 'ATTENTE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `postnom`, `prenom`, `sexe`, `matricule`, `nationalite`, `promotion`, `faculte`, `adresse`, `telephone`, `lieu`, `ddn`, `code`, `statut`) VALUES
(1, 'Minimbu', 'Bam\'s', 'Keren', 'FEMININ', 'SI20203', 'Congolaise', 'G3', 'FASI', '24 Novembre Lingwala', '+243827387041', 'Kinshasa', '2002-05-07', 'CODE123', 'ACCEPTE'),
(2, 'Makedika', 'Matondo', 'David', 'MASCULIN', 'SI20205', 'Congolaise', 'G2', 'FASI', 'Kinshasa 34 Kinshasa', '+243827387034', 'Matadi', '2004-05-03', 'CODE123', 'ACCEPTE'),
(4, 'Matodo', 'Matondo', 'Derick', 'MASCULIN', 'SI20225', 'Congolaise', 'G3 DF', 'DROIT', 'Matumona 52 Barumbu', '+243827687034', 'Kikwit', '2002-06-02', 'CODE123', 'ATTENTE'),
(5, 'Muolo', 'Muolo', 'Mardoché', 'MASCULIN', 'SI20212', 'Congolaise', 'G3 GI', 'FASI', 'Kinshasa', '+243827387041', 'Kinshasa', '2004-12-12', 'CODE123', 'ATTENTE'),
(6, 'Kasongo', 'Kalawu', 'Dhanis', 'MASCULIN', 'EM20203', 'congolaise', 'L1 LMD', 'FASE', 'Mbuyu 65 Kinkole Nsele', '+243844478383', 'Kinshasa', '2003-07-01', 'CODE123', 'ATTENTE'),
(9, 'Kabeya', 'Kamwanga', 'Joseph', 'MASCULIN', 'ED20242', 'Congolaise', 'G2', 'FASE', 'Lumumba 12 Kinshasa ', '+243827777777', 'Mbuji-Mayi', '2000-09-02', 'CODE123', 'ATTENTE'),
(10, 'Kanku', 'Kabeya', 'Josue', 'MASCULIN', 'DR20203', 'congolaise', 'L1 LMD', 'DROIT', 'Popokabaka 32 Congo kasavubu', '+243844444444', 'Kananga', '2004-08-21', 'CODE123', 'ACCEPTE'),
(11, 'Kunga', 'Kombo', 'Ketsia', 'FEMININ', 'DR0098', 'Congolaise', 'G3', 'DROIT', 'Kinshasa Lingwala 24 Novembre', '0000000000', 'Kinshasa', '2001-10-10', 'MUPC510CE4', 'ATTENTE'),
(13, 'Kalomo', 'Musoma', 'Patrick', 'MASCULIN', 'EM38483', 'Congolaise', 'L2 LMD', 'FASE', 'Kinshsasa Ngaliema Macampagne ', '0000000000', 'Kinshasa', '2004-01-30', 'MUPC529356', 'ATTENTE'),
(14, 'Minimbu', 'Bambedila', 'Keren', 'FEMININ', 'SI00023', 'Congolaise', 'G3', 'FASI', 'Lufungula 9 Macampagne Notre-dame Ngaliema', '0000000000', 'Matadi', '2004-05-05', 'MUPC148DF0', 'ACCEPTE');

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
(3, 'ATTENTE', 'IMPRIME', 2),
(4, 'ATTENTE', 'ATTENTE', 14);

-- --------------------------------------------------------

--
-- Structure de la table `photo_sensibilisation`
--

CREATE TABLE `photo_sensibilisation` (
  `id` int(11) NOT NULL,
  `nom_image` varchar(50) NOT NULL,
  `sensibilisation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `photo_sensibilisation`
--

INSERT INTO `photo_sensibilisation` (`id`, `nom_image`, `sensibilisation_id`) VALUES
(1, '64dd5d119c520.jpg', 3);

-- --------------------------------------------------------

--
-- Structure de la table `sensibilisations`
--

CREATE TABLE `sensibilisations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `statut` enum('ACTIVE','DESACTIVE') DEFAULT 'ACTIVE',
  `date_creation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sensibilisations`
--

INSERT INTO `sensibilisations` (`id`, `titre`, `message`, `statut`, `date_creation`) VALUES
(1, 'Le titre', 'Le contenu de mon message', 'ACTIVE', '2023-08-17 00:32:10'),
(2, 'Le titre', 'Je partage mon message', 'ACTIVE', '2023-08-17 00:33:54'),
(3, 'Le titre 2', 'Le contenu de mon message', 'ACTIVE', '2023-08-17 00:34:41');

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
-- Index pour la table `photo_sensibilisation`
--
ALTER TABLE `photo_sensibilisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sensibilisation_id` (`sensibilisation_id`);

--
-- Index pour la table `sensibilisations`
--
ALTER TABLE `sensibilisations`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `livrets`
--
ALTER TABLE `livrets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `photo_sensibilisation`
--
ALTER TABLE `photo_sensibilisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sensibilisations`
--
ALTER TABLE `sensibilisations`
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

--
-- Contraintes pour la table `photo_sensibilisation`
--
ALTER TABLE `photo_sensibilisation`
  ADD CONSTRAINT `photo_sensibilisation_ibfk_1` FOREIGN KEY (`sensibilisation_id`) REFERENCES `sensibilisations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
