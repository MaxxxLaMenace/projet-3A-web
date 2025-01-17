-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 17 jan. 2025 à 14:00
-- Version du serveur :  10.4.12-MariaDB-log
-- Version de PHP : 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e2405459`
--

-- --------------------------------------------------------

--
-- Structure de la table `score_reflexe`
--

CREATE TABLE `score_reflexe` (
  `id_score` int(8) NOT NULL,
  `id_utilisateur` int(8) NOT NULL,
  `score` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score_reflexe`
--

INSERT INTO `score_reflexe` (`id_score`, `id_utilisateur`, `score`) VALUES
(1, 1, 419),
(3, 4, 380);

-- --------------------------------------------------------

--
-- Structure de la table `score_sequence`
--

CREATE TABLE `score_sequence` (
  `id_score` int(8) NOT NULL,
  `id_utilisateur` int(8) NOT NULL,
  `score` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score_sequence`
--

INSERT INTO `score_sequence` (`id_score`, `id_utilisateur`, `score`) VALUES
(3, 1, 2),
(4, 4, 9),
(5, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `score_visuel`
--

CREATE TABLE `score_visuel` (
  `id_score` int(8) NOT NULL,
  `id_utilisateur` int(8) NOT NULL,
  `score` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `score_visuel`
--

INSERT INTO `score_visuel` (`id_score`, `id_utilisateur`, `score`) VALUES
(3, 1, 3),
(4, 4, 8);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(8) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `age` varchar(50) CHARACTER SET latin1 NOT NULL,
  `pays` varchar(50) CHARACTER SET latin1 NOT NULL,
  `couleur_pref` varchar(100) CHARACTER SET latin1 NOT NULL,
  `numero_tel` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `username`, `password`, `age`, `pays`, `couleur_pref`, `numero_tel`) VALUES
(1, 'a', 'a', 'DÃ©cÃ©dÃ©', 'Lune', 'Spider-man', '03 86 07 59 49'),
(2, 'b', 'b', '2', 'Atlantide', 'Spider-man', '05 82 27 84 80'),
(3, 'Maxence le naz', '1234', 'Embryon', 'Atlantide', 'Pizza', '03 80 37 97 46'),
(4, 'Leo1080p', 'gaialaplusbelle', 'Embryon', 'Mordor', 'Spider-man', '06 51 89 89 59'),
(6, 'aaaa', 'A1aaaa', '2', 'Mordor', 'Banane', '07 99 99 99 99');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `score_reflexe`
--
ALTER TABLE `score_reflexe`
  ADD PRIMARY KEY (`id_score`);

--
-- Index pour la table `score_sequence`
--
ALTER TABLE `score_sequence`
  ADD PRIMARY KEY (`id_score`);

--
-- Index pour la table `score_visuel`
--
ALTER TABLE `score_visuel`
  ADD PRIMARY KEY (`id_score`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `score_reflexe`
--
ALTER TABLE `score_reflexe`
  MODIFY `id_score` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `score_sequence`
--
ALTER TABLE `score_sequence`
  MODIFY `id_score` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `score_visuel`
--
ALTER TABLE `score_visuel`
  MODIFY `id_score` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
