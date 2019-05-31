-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 31 mai 2019 à 06:07
-- Version du serveur :  5.7.24-log
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `herocorp`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(3) NOT NULL,
  `id_post` int(3) NOT NULL,
  `auteur_commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu_commentaire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_commentaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likepost`
--

CREATE TABLE `likepost` (
  `id` int(3) NOT NULL,
  `id_postLike` int(11) NOT NULL,
  `user_postLike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `like_postLike` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `titre_post` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contenu_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_post` datetime NOT NULL,
  `user_post` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `like_post` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `titre_post`, `contenu_post`, `date_post`, `user_post`, `like_post`) VALUES
(18, 'I\'am IronMan !!', 'What a badass answer to Thanos ! I\'am very sad than Tony died, but he will be in my heart forever <3', '2019-05-31 08:02:47', 'Ironman', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(3) NOT NULL,
  `name_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pseudo_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `name_user`, `surname_user`, `pseudo_user`, `email_user`, `password_user`) VALUES
(10, 'Kichenamourty', 'Benjamin', 'Stark', 'saisoundar@gmail.fr', '$2y$10$os2RkKIYV66z54DAkx7z1eJuLsT52KD/tBmV2lN4Yuvs48wRPRnXS'),
(11, 'Kichenamourty', 'Benjamin', 'Ironman', 'ksaisoundar@gmail.com', '$2y$10$F4C1NuLmc6/UgyIlEnvpkO86buGKbzrmKHo.PkYNT0EiYa6Ls5hDu');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likepost`
--
ALTER TABLE `likepost`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `likepost`
--
ALTER TABLE `likepost`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
