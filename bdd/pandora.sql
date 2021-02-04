-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 04 fév. 2021 à 13:34
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pandora`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `idAnnoce` int(11) NOT NULL,
  `typeAnnonce` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `numContact` int(11) NOT NULL,
  `numAdresse` int(11) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `idUti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`idAnnoce`, `typeAnnonce`, `titre`, `description`, `numContact`, `numAdresse`, `rue`, `codePostal`, `idUti`) VALUES
(71, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(72, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(73, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(74, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(76, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(77, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(78, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(79, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(80, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(81, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(82, 'immobilier', 'Appartement 50m²', 'Superbe appartement.', 123456789, 25, '0', 59700, 14),
(83, 'immobilier', 'Maison 100m²', 'Superbe maison.', 123456789, 17, '0', 59000, 14),
(84, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(85, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(86, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(87, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(88, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(89, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(90, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(91, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(92, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(93, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(94, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(95, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(96, 'travail', 'Développeur web', 'Devient développeur web', 123456789, 17, '0', 59000, 14),
(97, 'travail', 'Comptable', 'Recherche expert comptable.', 123456789, 17, '0', 59000, 14),
(98, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(99, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(100, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(101, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(102, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(103, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(104, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(105, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(106, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(107, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(108, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(109, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(110, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(111, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(112, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(113, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14),
(114, 'loisir', 'Accrobranche', 'Accrobranche', 123456789, 17, '0', 59000, 14),
(115, 'loisir', 'Piscine', 'Piscine', 123456789, 17, '0', 59000, 14);

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

CREATE TABLE `billet` (
  `numeroDeBillet` int(11) NOT NULL,
  `dateEmb` date NOT NULL,
  `idUti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `billet`
--

INSERT INTO `billet` (`numeroDeBillet`, `dateEmb`, `idUti`) VALUES
(5, '2021-02-19', 14),
(7, '2021-07-22', 16);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idCom` int(11) NOT NULL,
  `contCom` varchar(1000) NOT NULL,
  `datePubCom` date NOT NULL,
  `idUti` int(11) NOT NULL,
  `idAnnoce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commentairefurum`
--

CREATE TABLE `commentairefurum` (
  `idcommSujet` int(11) NOT NULL,
  `pseudoUt` varchar(255) NOT NULL,
  `dateComSuj` date NOT NULL,
  `contComSuj` varchar(1000) NOT NULL,
  `idSujetTh` int(11) NOT NULL,
  `idUti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentairefurum`
--

INSERT INTO `commentairefurum` (`idcommSujet`, `pseudoUt`, `dateComSuj`, `contComSuj`, `idSujetTh`, `idUti`) VALUES
(14, 'test', '2021-02-02', 'Salut 20°C en moyenne.', 31, 14);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `Id` int(11) NOT NULL,
  `NomFichier` varchar(100) NOT NULL,
  `TailleFichier` int(11) NOT NULL,
  `PathFile` varchar(100) NOT NULL,
  `TypeImage` varchar(10) NOT NULL,
  `idUti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`Id`, `NomFichier`, `TailleFichier`, `PathFile`, `TypeImage`, `idUti`) VALUES
(14, 'annonce_Id71.jpg', 104002, '../../view/profil/imageAnnonce/annonce_Id71.jpg', 'jpg', 14),
(15, 'annonce_Id85.jpeg', 8628, '../../view/profil/imageAnnonce/annonce_Id85.jpeg', 'jpeg', 14),
(16, 'annonce_Id98.jpg', 126843, '../../view/profil/imageAnnonce/annonce_Id98.jpg', 'jpg', 14),
(17, 'profil_Id16.png', 15076, '../../view/profil/imageProfil/profil_Id16.png', 'png', 16),
(18, 'annonce_Id116.jpg', 104002, '../../view/profil/imageAnnonce/annonce_Id116.jpg', 'jpg', 16);

-- --------------------------------------------------------

--
-- Structure de la table `repondre`
--

CREATE TABLE `repondre` (
  `idCom` int(11) NOT NULL,
  `idCom_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `sujetfurum`
--

CREATE TABLE `sujetfurum` (
  `idSujetTh` int(11) NOT NULL,
  `typeSujetTh` varchar(255) NOT NULL,
  `questionSujet` varchar(255) NOT NULL,
  `dateAjoutSujet` date NOT NULL,
  `idUti` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sujetfurum`
--

INSERT INTO `sujetfurum` (`idSujetTh`, `typeSujetTh`, `questionSujet`, `dateAjoutSujet`, `idUti`) VALUES
(12, 'Travail', 'Quel travail peut-on trouver sur place ?', '2021-02-01', 14),
(13, 'Loisirs', 'Quel loisir peut-on trouver sur place ?', '2021-02-01', 14),
(14, 'Immobilier', 'Quel type de maison peut-on trouver sur place ?', '2021-02-01', 14),
(15, 'Discusions générales', 'Quel temps fait-il sur place ?', '2021-02-01', 14),
(16, 'Travail', 'Quel travail peut-on trouver sur place ?', '2021-02-01', 14),
(17, 'Loisirs', 'Quel loisir peut-on trouver sur place ?', '2021-02-01', 14),
(18, 'Immobilier', 'Quel type de maison peut-on trouver sur place ?', '2021-02-01', 14),
(19, 'Discusions générales', 'Quel temps fait-il sur place ?', '2021-02-01', 14),
(20, 'Travail', 'Quel travail peut-on trouver sur place ?', '2021-02-01', 14),
(21, 'Loisirs', 'Quel loisir peut-on trouver sur place ?', '2021-02-01', 14),
(22, 'Immobilier', 'Quel type de maison peut-on trouver sur place ?', '2021-02-01', 14),
(23, 'Discusions générales', 'Quel temps fait-il sur place ?', '2021-02-01', 14),
(24, 'Travail', 'Quel travail peut-on trouver sur place ?', '2021-02-01', 14),
(25, 'Loisirs', 'Quel loisir peut-on trouver sur place ?', '2021-02-01', 14),
(26, 'Immobilier', 'Quel type de maison peut-on trouver sur place ?', '2021-02-01', 14),
(27, 'Discusions générales', 'Quel temps fait-il sur place ?', '2021-02-01', 14),
(28, 'Travail', 'Quel travail peut-on trouver sur place ?', '2021-02-01', 14),
(29, 'Loisirs', 'Quel loisir peut-on trouver sur place ?', '2021-02-01', 14),
(30, 'Immobilier', 'Quel type de maison peut-on trouver sur place ?', '2021-02-01', 14),
(31, 'Discusions générales', 'Quel temps fait-il sur place ?', '2021-02-01', 14),
(32, 'Discusions générales', 'salut', '2021-02-02', 16);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUti` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `numeroTel` varchar(11) NOT NULL,
  `passWord` varchar(255) NOT NULL,
  `profil` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUti`, `nom`, `prenom`, `pseudo`, `email`, `numeroTel`, `passWord`, `profil`, `dateNaissance`, `sex`) VALUES
(14, 'test', 'test', 'test', 'test.test00@gmail.com', '0123456789', '$2y$10$72FRyK75fbR2ZVVKNNZefe0rcCMhi1tczQL2Q9ff3k0AR2GdupFmK', 'user', '1997-12-20', 'Monsieur'),
(16, 'mertens', 'florent', 'florent00', 'mertens.florent00@gmail.com', '0613621223', '$2y$10$6LsaQMSBsFV1W2DDaUWghe9FQTNnTjUzZdThMEgcgArxczWwUQJym', 'user', '1998-02-14', 'Monsieur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`idAnnoce`),
  ADD KEY `annonces_Utilisateur_FK` (`idUti`);

--
-- Index pour la table `billet`
--
ALTER TABLE `billet`
  ADD PRIMARY KEY (`numeroDeBillet`),
  ADD KEY `BILLET_Utilisateur_FK` (`idUti`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `commentaire_Utilisateur_FK` (`idUti`),
  ADD KEY `commentaire_annonces0_FK` (`idAnnoce`);

--
-- Index pour la table `commentairefurum`
--
ALTER TABLE `commentairefurum`
  ADD PRIMARY KEY (`idcommSujet`),
  ADD KEY `commentaireFurum_sujetFurum_FK` (`idSujetTh`),
  ADD KEY `commentaireFurum_Utilisateur0_FK` (`idUti`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IMAGE_Utilisateur_FK` (`idUti`);

--
-- Index pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD PRIMARY KEY (`idCom`,`idCom_commentaire`),
  ADD KEY `repondre_commentaire0_FK` (`idCom_commentaire`);

--
-- Index pour la table `sujetfurum`
--
ALTER TABLE `sujetfurum`
  ADD PRIMARY KEY (`idSujetTh`),
  ADD KEY `sujetFurum_Utilisateur_FK` (`idUti`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUti`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `idAnnoce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `billet`
--
ALTER TABLE `billet`
  MODIFY `numeroDeBillet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentairefurum`
--
ALTER TABLE `commentairefurum`
  MODIFY `idcommSujet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `sujetfurum`
--
ALTER TABLE `sujetfurum`
  MODIFY `idSujetTh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_Utilisateur_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `BILLET_Utilisateur_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_Utilisateur_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`),
  ADD CONSTRAINT `commentaire_annonces0_FK` FOREIGN KEY (`idAnnoce`) REFERENCES `annonces` (`idAnnoce`);

--
-- Contraintes pour la table `commentairefurum`
--
ALTER TABLE `commentairefurum`
  ADD CONSTRAINT `commentaireFurum_Utilisateur0_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`),
  ADD CONSTRAINT `commentaireFurum_sujetFurum_FK` FOREIGN KEY (`idSujetTh`) REFERENCES `sujetfurum` (`idSujetTh`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `IMAGE_Utilisateur_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`);

--
-- Contraintes pour la table `repondre`
--
ALTER TABLE `repondre`
  ADD CONSTRAINT `repondre_commentaire0_FK` FOREIGN KEY (`idCom_commentaire`) REFERENCES `commentaire` (`idCom`),
  ADD CONSTRAINT `repondre_commentaire_FK` FOREIGN KEY (`idCom`) REFERENCES `commentaire` (`idCom`);

--
-- Contraintes pour la table `sujetfurum`
--
ALTER TABLE `sujetfurum`
  ADD CONSTRAINT `sujetFurum_Utilisateur_FK` FOREIGN KEY (`idUti`) REFERENCES `utilisateur` (`idUti`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
