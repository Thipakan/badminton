-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 15 mars 2025 à 11:47
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `badminton_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

DROP TABLE IF EXISTS `inscriptions`;
CREATE TABLE IF NOT EXISTS `inscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_tournoi` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_tournoi` (`id_tournoi`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `id_utilisateur`, `id_tournoi`) VALUES
(1, 5, 1),
(2, 6, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_reservation` date NOT NULL,
  `heure` time NOT NULL,
  `duration` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tournois`
--

DROP TABLE IF EXISTS `tournois`;
CREATE TABLE IF NOT EXISTS `tournois` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom_tournoi` varchar(100) NOT NULL,
  `date_tournoi` date NOT NULL,
  `inscrits` text,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `places_max` int NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tournois`
--

INSERT INTO `tournois` (`id`, `nom_tournoi`, `date_tournoi`, `inscrits`, `description`, `image`, `places_max`) VALUES
(1, 'Smash Open', '2025-06-21', '[\r\n    {\"nom\":\"Dupont\",\"prenom\":\"Pierre\",\"email\":\"pierre.dupont@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Lemoine\",\"prenom\":\"Sophie\",\"email\":\"sophie.lemoine@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Martin\",\"prenom\":\"Luc\",\"email\":\"luc.martin@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Durand\",\"prenom\":\"Julien\",\"email\":\"julien.durand@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Garnier\",\"prenom\":\"Claire\",\"email\":\"claire.garnier@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Bernard\",\"prenom\":\"Michel\",\"email\":\"michel.bernard@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Lemoine\",\"prenom\":\"Marc\",\"email\":\"marc.lemoine@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Blanc\",\"prenom\":\"Emilie\",\"email\":\"emilie.blanc@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Charpentier\",\"prenom\":\"Théo\",\"email\":\"theo.charpentier@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Roux\",\"prenom\":\"Catherine\",\"email\":\"catherine.roux@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Dufresne\",\"prenom\":\"Valentin\",\"email\":\"valentin.dufresne@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Fournier\",\"prenom\":\"Isabelle\",\"email\":\"isabelle.fournier@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Moulin\",\"prenom\":\"David\",\"email\":\"david.moulin@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Boucher\",\"prenom\":\"Hélène\",\"email\":\"helene.boucher@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Simon\",\"prenom\":\"Alexandre\",\"email\":\"alexandre.simon@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Pires\",\"prenom\":\"Lucie\",\"email\":\"lucie.pires@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Martin\",\"prenom\":\"Frédéric\",\"email\":\"frederic.martin@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Petit\",\"prenom\":\"Juliette\",\"email\":\"juliette.petit@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Meyer\",\"prenom\":\"Henri\",\"email\":\"henri.meyer@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Hernandez\",\"prenom\":\"Anaïs\",\"email\":\"anais.hernandez@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},   {\"nom\":\"Gautier\",\"prenom\":\"Nicolas\",\"email\":\"nicolas.gautier@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Roche\",\"prenom\":\"Chloé\",\"email\":\"chloe.roche@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Leclerc\",\"prenom\":\"Paul\",\"email\":\"paul.leclerc@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Faure\",\"prenom\":\"Alice\",\"email\":\"alice.faure@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Lefevre\",\"prenom\":\"Antoine\",\"email\":\"antoine.lefevre@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Bailly\",\"prenom\":\"François\",\"email\":\"francois.bailly@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Legrand\",\"prenom\":\"Julie\",\"email\":\"julie.legrand@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Vidal\",\"prenom\":\"Maxime\",\"email\":\"maxime.vidal@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Collin\",\"prenom\":\"Amélie\",\"email\":\"amelie.collin@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Joly\",\"prenom\":\"Gabriel\",\"email\":\"gabriel.joly@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Martin\",\"prenom\":\"Inès\",\"email\":\"ines.martin@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Boucher\",\"prenom\":\"Sébastien\",\"email\":\"sebastien.boucher@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Perrin\",\"prenom\":\"Céline\",\"email\":\"celine.perrin@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Giraud\",\"prenom\":\"Louis\",\"email\":\"louis.giraud@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Simple Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Meyer\",\"prenom\":\"Nathalie\",\"email\":\"nathalie.meyer@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Double Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Morin\",\"prenom\":\"Victor\",\"email\":\"victor.morin@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Bertin\",\"prenom\":\"Clément\",\"email\":\"clement.bertin@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Homme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Leblanc\",\"prenom\":\"Marie\",\"email\":\"marie.leblanc@example.com\",\"niveau\":\"Débutant\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Dumas\",\"prenom\":\"Thibault\",\"email\":\"thibault.dumas@example.com\",\"niveau\":\"Intermédiaire\",\"categories\":[\"Double Mixte\"],\"tournoi\":\"Smash Open\"},\r\n    {\"nom\":\"Robert\",\"prenom\":\"Aurélie\",\"email\":\"aurelie.robert@example.com\",\"niveau\":\"Avancé\",\"categories\":[\"Simple Femme\"],\"tournoi\":\"Smash Open\"}\r\n]\r\n', 'La Maison du Badminton organise son tout premier tournoi en juin ! Que vous soyez joueur débutant ou compétiteur aguerri, venez tester vos réflexes et affronter d\'autres passionnés lors du Smash Open. Une journée placée sous le signe du sport, du fair-play et du plaisir du jeu !', NULL, 40),
(2, 'Badminton Summer Challenge', '2025-07-05', '', 'Rejoignez-nous pour le Badminton Summer Challenge, un tournoi excitant qui marque le début de l’été ! Que vous soyez amateur ou compétiteur, venez défier les meilleurs joueurs dans une ambiance conviviale et dynamique. Ce tournoi se déroulera sur deux jours et offrira des matchs pour tous les niveaux, avec des récompenses et des moments de partage entre passionnés de badminton. Profitez de l’été pour affronter vos adversaires dans une compétition pleine de fun et de fair-play !', NULL, 48);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `niveau` enum('débutant','intermédiaire','avancé') NOT NULL,
  `disponibilites` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
