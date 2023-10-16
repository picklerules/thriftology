-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 16 oct. 2023 à 16:51
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `thriftology`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'T-shirts'),
(2, 'Jeans'),
(3, 'Robes');

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `id_acheteur` int(11) DEFAULT NULL,
  `id_vetement` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`id`, `id_acheteur`, `id_vetement`, `date`) VALUES
(1, 2, 1, '2023-10-14'),
(2, 2, 2, '2023-10-15');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `motdepasse` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `motdepasse`) VALUES
(1, 'Jon Snow', 'jon.snow@winterfell.com', 'password123'),
(2, 'Daenerys Targaryen', 'daenerys@dragonqueen.com', 'dracarys'),
(3, 'Tyrion Lannister', 'tyrion@casterlyrock.com', 'wineLover'),
(6, 'Sansa Stark', 'sansa@winterfell.com', 'queenInTheNorth'),
(7, 'Brandon Stark', 'bran@threeeyedraven.com', 'raven123'),
(8, 'Jaime Lannister', 'jaime@casterlyrock.com', 'kingslayer');

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE `vendeur` (
  `id` int(11) NOT NULL,
  `notevendeur` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`id`, `notevendeur`) VALUES
(1, 4.5),
(2, 4.7);

-- --------------------------------------------------------

--
-- Structure de la table `vetement`
--

CREATE TABLE `vetement` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `description` text,
  `prix` float DEFAULT NULL,
  `id_vendeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetement`
--

INSERT INTO `vetement` (`id`, `nom`, `description`, `prix`, `id_vendeur`) VALUES
(1, 'T-shirt Blanc', 'Un t-shirt blanc simple', 19.99, 1),
(2, 'Jean Bleu', 'Jean bleu décontracté', 49.99, 2),
(3, 'Robe Noire', 'Robe noire élégante', 89.99, 1),
(9, 'Jupe', 'En cuir noire', 19.99, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vetement_categorie`
--

CREATE TABLE `vetement_categorie` (
  `id_vetement` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vetement_categorie`
--

INSERT INTO `vetement_categorie` (`id_vetement`, `id_categorie`) VALUES
(1, 1),
(2, 2),
(3, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ID_Vetement_UNIQUE` (`id_vetement`),
  ADD KEY `ID_Acheteur` (`id_acheteur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- Index pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vetement`
--
ALTER TABLE `vetement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Vendeur` (`id_vendeur`);

--
-- Index pour la table `vetement_categorie`
--
ALTER TABLE `vetement_categorie`
  ADD PRIMARY KEY (`id_vetement`,`id_categorie`),
  ADD KEY `ID_Categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `vetement`
--
ALTER TABLE `vetement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`id_acheteur`) REFERENCES `vintage`.`Utilisateurs` (`ID`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`id_vetement`) REFERENCES `vintage`.`Vetements` (`ID`);

--
-- Contraintes pour la table `vendeur`
--
ALTER TABLE `vendeur`
  ADD CONSTRAINT `vendeur_ibfk_1` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`ID`);

--
-- Contraintes pour la table `vetement`
--
ALTER TABLE `vetement`
  ADD CONSTRAINT `vetement_ibfk_1` FOREIGN KEY (`id_vendeur`) REFERENCES `vintage`.`Vendeurs` (`id`);

--
-- Contraintes pour la table `vetement_categorie`
--
ALTER TABLE `vetement_categorie`
  ADD CONSTRAINT `vetement_categorie_ibfk_1` FOREIGN KEY (`id_vetement`) REFERENCES `vetement` (`ID`),
  ADD CONSTRAINT `vetement_categorie_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
