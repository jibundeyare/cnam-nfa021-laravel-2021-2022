-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 03 mars 2022 à 16:36
-- Version du serveur :  10.5.9-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cnam_nfa021_laravel_2021_2022`
--

--
-- Déchargement des données de la table `etiquette`
--

INSERT INTO `etiquette` (`id`, `nom`, `description`, `created_at`, `updated_at`) VALUES
(1, 'végétarien', '', NULL, NULL),
(2, 'poulet', '', NULL, NULL),
(3, 'bœuf', '', NULL, NULL),
(4, 'épicé', '', NULL, NULL),
(5, 'chaud', '', NULL, NULL),
(6, 'froid', '', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
