-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 18 jan. 2019 à 02:43
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  web3d
--

-- --------------------------------------------------------

--
-- Structure de la table users
--

CREATE TABLE users (
  id int(10) NOT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  nom varchar(50) NOT NULL,
  prenom varchar(50) NOT NULL,
  visited int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table users
--

INSERT INTO users (id, email, password, nom, prenom, visited) VALUES
(1, 'admin@kcr.fr', '$2y$10$GpxYpqxHujQ4SZxCaVplauE7vw53byah6UkFLS9kYmPvEVS2d6h1q', 'BEN MAMAR', 'Koussaïla', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table users
--
ALTER TABLE users
  MODIFY id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
