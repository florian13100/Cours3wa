-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 02 déc. 2020 à 13:12
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `siforum`
--

DROP TABLE IF EXISTS `siforum`;
CREATE TABLE IF NOT EXISTS `siforum` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `ordre` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `siforum`
--

INSERT INTO `siforum` (`id`, `titre`, `date_creation`, `ordre`) VALUES
(1, 'Catégorie 1', '2020-12-02 12:06:20', 1),
(2, 'Catégorie 2', '2020-12-02 12:06:20', 2);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_forum` int(255) NOT NULL,
  `titre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_user` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `id_forum`, `titre`, `contenu`, `date_creation`, `id_user`) VALUES
(1, 1, 'Sujet 1.1', 'Mon contenu', '2020-12-02 13:53:19', 15),
(2, 1, 'sujet 1.2', 'Mon autre contenu', '2020-12-02 13:53:19', 15),
(3, 1, 'Sujet 1.3', 'Mon sujet', '2020-12-02 13:55:36', 15),
(4, 2, 'sujet 2.1', 'mon contenu blablabla', '2020-12-02 13:55:36', 15);

-- --------------------------------------------------------

--
-- Structure de la table `topic_commentaire`
--

DROP TABLE IF EXISTS `topic_commentaire`;
CREATE TABLE IF NOT EXISTS `topic_commentaire` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_topic` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation_compte` datetime NOT NULL,
  `n_mdp` int(1) NOT NULL DEFAULT '0',
  `avatar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mail`, `mdp`, `date_creation_compte`, `n_mdp`, `avatar`) VALUES
(15, 'Gobin', 'Florian', 'floflogobin@gmail.com', '$6$rounds=5000$hd25jskd48fnyuzk$uRGOH5rcjtOM5noQ33nRNCzBBQ/vh2DrOD2/88Y/ANrnqnp9l73CUz5W4uuMweRx1yfsggsBcJJ.FRtfYrrcM0', '2020-11-30 13:27:22', 0, NULL),
(19, 'Palacci', 'Patrick', 'ttt@ttt.com', '$6$rounds=5000$hd25jskd48fnyuzk$xhY5GX37YaacHX5N90cCGehkGOSarH1YajCT0JOCueI/rn75gDmkaprqRWYAtDSuEBSj0lHJ9G5Ir5hc7OqtR1', '2020-12-01 08:31:19', 0, NULL),
(20, 'Denglos', 'Ludovic', 'zzz@zzz.com', '$6$rounds=5000$hd25jskd48fnyuzk$9DpPk78/mq.BfsBC5e/aBkfd/KgJbaBc5fJ97QeOmunr.dfcNKHFc9NlBPBB4GsVyZKjUK056q39iNVGZq49E0', '2020-12-01 08:38:53', 0, NULL),
(21, 'Gardella', 'Jean Pierre', 'nnn@nnn.com', '$6$rounds=5000$hd25jskd48fnyuzk$704QKyPowP4RqBiHod70MCFz6Onis5vOFVZt.toCxBUoxuMSRGtGYPwubNgUJ1EqxCcs2DvBGlE8e9SGu7BMq1', '2020-12-01 08:39:20', 0, NULL),
(22, 'Nathan', 'Thierry', 'jjj@jjj.com', '$6$rounds=5000$hd25jskd48fnyuzk$hedrIMZExjtLPQq7t6cFMM3Mfq7D2biC8MPEUzt9qodf13TgFWVPDm9umJAKku1TrIez1O5OhaOIkaojpaj6l1', '2020-12-01 08:39:49', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
