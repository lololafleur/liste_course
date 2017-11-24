-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 24 nov. 2017 à 04:03
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `liste_course`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`nom`, `quantite`, `unite`, `coche`) VALUES
('chocolat', 2, 'unité', 0),
('semoule', 1, 'unité', 0),
('sucre', 2, 'unité', 0),
('eau', 2, 'unité', 0),
('beurre', 2, 'unité', 0),
('orange', 2, 'unité', 0),
('bannane', 2, 'unité', 0),
('sel fin',  2, 'unité', 0),
('gros sel', 2, 'unité', 0),
('bouillon', 2, 'unité', 0),
('sauce tomate', 2, 'unité', 0),
('rhum', 2, 'unité', 0),
('courgette', 2, 'unité', 0),
('vinaigre', 2, 'unité', 0),
('huile d''olive', 2, 'unité', 0),
('huile', 2, 'unité', 0),
('farine', 2, 'unité', 0),
('oeufs', 6, 'unité', 0);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
