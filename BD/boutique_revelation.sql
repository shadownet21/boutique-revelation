-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 29 nov. 2022 à 12:39
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique_revelation`
--

-- --------------------------------------------------------

--
-- Structure de la table `approvisionnement`
--

DROP TABLE IF EXISTS `approvisionnement`;
CREATE TABLE IF NOT EXISTS `approvisionnement` (
  `id_appro` int(11) NOT NULL AUTO_INCREMENT,
  `code_appro` varchar(20) NOT NULL,
  PRIMARY KEY (`id_appro`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `approvisionnement`
--

INSERT INTO `approvisionnement` (`id_appro`, `code_appro`) VALUES
(6, '120223'),
(5, '120222'),
(4, '120221'),
(7, '120224'),
(8, '120225');

-- --------------------------------------------------------

--
-- Structure de la table `appro_articles`
--

DROP TABLE IF EXISTS `appro_articles`;
CREATE TABLE IF NOT EXISTS `appro_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_appro` int(11) NOT NULL,
  `qtte_appro` int(11) NOT NULL,
  `date_appro` datetime NOT NULL,
  `prix_article_appro` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appro_articles`
--

INSERT INTO `appro_articles` (`id`, `id_article`, `id_appro`, `qtte_appro`, `date_appro`, `prix_article_appro`) VALUES
(2, 78, 4, 2, '2022-11-15 12:39:13', 10000),
(3, 77, 4, 1, '2022-11-15 12:44:51', 5000),
(4, 38, 5, 5, '2022-11-15 12:49:53', 2000),
(5, 2, 6, 3, '2022-11-16 09:21:35', 2000),
(6, 38, 7, 3, '2022-11-16 09:22:40', 2000);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `code_article` varchar(10) NOT NULL,
  `libelle_article` varchar(100) NOT NULL,
  `prix_article` int(11) NOT NULL,
  `qtte_stock` int(11) NOT NULL,
  `photo` bigint(90) DEFAULT '0',
  `id_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_article`, `code_article`, `libelle_article`, `prix_article`, `qtte_stock`, `photo`, `id_categorie`) VALUES
(1, '1620221', 'HELIX HX8 5W-30 DIESEL AND GAZOLINE ENGINES 5L', 13000, 1, NULL, 4),
(2, '1620222', 'QUARTZ 15W-40 5L 9000 5L', 2000, 0, NULL, 4),
(3, '1620223', 'RUBIA SAE 50 5L', 1, 1, NULL, 4),
(4, '1620224', 'QUARTZ 15W-40 5L 4x4 5L', 1, 1, NULL, 4),
(5, '1620225', 'RUBIA SAE 50 20L', 1, 1, NULL, 4),
(6, '1620226', 'TRANSTEC 1L', 1, 1, NULL, 4),
(7, '1620227', 'BRAKE AND CLUTCH FLUID DOT4 ', 1, 1, NULL, 5),
(8, '1620228', 'AUTRE HUILE A FREIN 1/4 Bouchon bleu', 1, 1, NULL, 5),
(9, '1620229', 'TOTAL BRAKE FLUID 0,5L', 1, 1, NULL, 5),
(10, '1620230', 'EXTINCTEUR', 1, 1, NULL, 3),
(11, '1620231', 'PAPIER MOUCHOIR ', 1, 1, NULL, 3),
(12, '1620232', 'LAVE VITRE ABRO GOLD', 1, 1, NULL, 3),
(13, '1620233', 'BOITE A PHARMACIE', 1, 1, NULL, 3),
(14, '1620234', 'CIRAGE', 1, 1, NULL, 3),
(15, '1620235', ' COUVRE VOLANT', 1, 0, NULL, 3),
(16, '1620236', 'ANTENNE', 1, 1, NULL, 3),
(17, '1620237', 'CLEAN ALL ABRO FOAM CLEANER 650 ml', 1, 1, NULL, 3),
(18, '1620238', 'COMMANDE BLOCAGE MILANO', 1, 1, NULL, 3),
(19, '1620239', 'AIRLIFE DEO VOITURE GRAND', 1, 1, NULL, 3),
(20, '1620240', 'AIRLIFE DEO VOITURE PETIT', 1, 1, NULL, 3),
(21, '1620241', 'ABRO AIRFRESHNER ', 1, 0, NULL, 3),
(22, '1620242', 'AIRPRO INVENT', 1, 1, NULL, 3),
(23, '1620243', 'HANDWASH LEMON', 1, 1, NULL, 3),
(24, '1620244', 'HANDWASH PEACH', 1, 1, NULL, 3),
(25, '1620245', 'MYTONE GRACE DEO', 1, 1, NULL, 3),
(26, '1620246', 'CAR ALARME SYSTEM', 1, 1, NULL, 3),
(27, '1620247', 'DASHBORD POLISHING', 1, 1, NULL, 3),
(28, '1620248', 'USB MP3 PLAYER AND ADAPTER', 1, 1, NULL, 3),
(29, '1620249', 'ACCROCHE TELEPHONE', 1, 1, NULL, 3),
(30, '1620250', 'CONTRE SOLEIL KIA ', 1, 1, NULL, 3),
(31, '1620251', 'CONTRE SOLEIL PUMA', 1, 1, NULL, 3),
(32, '1620252', 'CONTRE SOLEIL HYNDAI', 1, 1, NULL, 3),
(33, '1620253', 'CONTRE SOLEIL OPEL', 1, 1, NULL, 3),
(34, '1620254', 'CONTRE SOLEIL BMW', 1, 1, NULL, 3),
(35, '1620255', 'CONTRE SOLEIL TOYOTA RAV4', 1, 1, NULL, 3),
(36, '1620256', 'CONTRE SLOLEIL NISSAN', 1, 1, NULL, 3),
(37, '1620257', 'CONTRE SOLEIL MAZDA', 1, 1, NULL, 3),
(38, '1620258', 'CONTRE SOLEIL VOLKSWAGEN', 2000, 6, NULL, 3),
(39, '1620259', 'TIGE', 1, 1, NULL, 3),
(40, '1620260', 'GP SYNCHROGEN ATF 1L', 1, 1, NULL, 2),
(41, '1620261', 'AMORTISSEUR AVANT ', 1, 1, NULL, 1),
(42, '1620262', 'AMORTISSEUR ARRIERE ', 1, 1, NULL, 1),
(43, '1620263', 'BOUGIE NG4', 1, 1, NULL, 1),
(44, '1620264', 'BOUGIE TOYOTA', 1, 1, NULL, 1),
(45, '1620265', 'KLAXON', 1, 1, NULL, 1),
(46, '1620266', 'COURROIE', 1, 1, NULL, 1),
(47, '1620267', 'POMPE ESSENCE SIMPLE ', 1, 1, NULL, 1),
(48, '1620268', 'POMPE ESSENCE V6', 1, 1, NULL, 1),
(49, '1620269', 'POMPE ESSENCE V8', 1, 1, NULL, 1),
(50, '1620270', 'DEMARREUR', 1, 1, NULL, 1),
(51, '1620271', 'FILTRE A ESSENCE ', 1, 1, NULL, 1),
(52, '1620272', 'AMPLOULE H4', 1, 1, NULL, 1),
(53, '1620273', 'AMPLOULE H7', 1, 0, NULL, 1),
(54, '1620274', 'AMPLOULE H1', 1, 1, NULL, 1),
(55, '1620275', 'AMPLOULE H11', 1, 1, NULL, 1),
(56, '1620276', 'AMPLOULE HB4', 1, 1, NULL, 1),
(57, '1620277', 'AMPLOULE HB3', 1, 1, NULL, 1),
(58, '1620278', 'AMPLOULE H7 VALEO', 1, 1, NULL, 1),
(59, '1620279', 'AMPLOULE H7 HELLA', 1, 1, NULL, 1),
(60, '1620280', 'AMPLOULE H4E1', 1, 1, NULL, 1),
(61, '1620281', 'AMPOULE DEUX PRO', 1, 1, NULL, 1),
(62, '1620282', 'PATIN FITNESS CARINA', 1, 1, NULL, 1),
(63, '1620283', 'PATIN ARRIERE MAZDA', 1, 1, NULL, 1),
(64, '1620284', 'PATIN AVANT MAZDA', 1, 1, NULL, 1),
(65, '1620285', 'AMORTISSEUR RAV 4', 1, 1, NULL, 1),
(66, '1620286', 'AMORTISSEUR JINBO', 1, 1, NULL, 1),
(67, '1620287', 'COUVRE TUYEAU ECHAPPEMENT SIMPLE', 1, 1, NULL, 1),
(68, '1620288', 'COUVRE TUYEAU ECHAPPEMENT TURBO', 1, 1, NULL, 1),
(69, '1620289', 'ALTERNATEUR', 1, 1, NULL, 1),
(70, '1620290', 'BATTERIE TNT, marche avec Amperage', 1, 1, NULL, 1),
(71, '1620291', 'BATTERIE MECON,  marche avec Amperage', 1, 1, NULL, 1),
(72, '1620292', 'BATTERIE DAD ,  marche avec Amperage', 1, 1, NULL, 1),
(73, '1620293', 'FILTRE A HUILE OPEL', 1, 1, NULL, 1),
(74, '1620294', 'FILTRE A HUILE MAZDA', 1, 1, NULL, 1),
(75, '1620295', 'FILTRE A HUILE 37010', 3000, 1, NULL, 1),
(76, '1620296', 'FIL A BOUGIE ', 1000, 3, NULL, 1),
(77, '1620297', 'TRIANGLE', 1, 2, NULL, 1),
(78, '1620298', 'GRAISSE', 1, 3, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_categorie` varchar(30) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `libelle_categorie`) VALUES
(1, 'PIECES'),
(2, 'HUILE A PONT'),
(3, 'ENTRETIEN ET ACCESSOIRES'),
(4, 'HUILE A MOTEUR '),
(5, 'HUILE A FREIN');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseurs`
--

DROP TABLE IF EXISTS `fournisseurs`;
CREATE TABLE IF NOT EXISTS `fournisseurs` (
  `id_fourn` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fourn` varchar(30) NOT NULL,
  PRIMARY KEY (`id_fourn`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseurs`
--

INSERT INTO `fournisseurs` (`id_fourn`, `nom_fourn`) VALUES
(1, 'AUTRE'),
(2, 'TOTAL'),
(3, 'SHELL');

-- --------------------------------------------------------

--
-- Structure de la table `historique_modif_stock`
--

DROP TABLE IF EXISTS `historique_modif_stock`;
CREATE TABLE IF NOT EXISTS `historique_modif_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_elmt` varchar(100) NOT NULL,
  `ancienne_valeur_qtte` int(11) NOT NULL,
  `nouvelle_valeur_qtte` int(11) NOT NULL,
  `ancienne_valeur_prix` int(11) NOT NULL,
  `nouvelle_valeur_prix` int(11) NOT NULL,
  `ancienne_categorie` varchar(20) NOT NULL,
  `nouvelle_categorie` varchar(20) NOT NULL,
  `date_modification` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historique_modif_stock`
--

INSERT INTO `historique_modif_stock` (`id`, `libelle_elmt`, `ancienne_valeur_qtte`, `nouvelle_valeur_qtte`, `ancienne_valeur_prix`, `nouvelle_valeur_prix`, `ancienne_categorie`, `nouvelle_categorie`, `date_modification`) VALUES
(1, 'FILTRE A HUILE 37010', 1, 3, 3000, 3000, 'PIECES', 'PIECES', '2022-11-15 14:15:45');

-- --------------------------------------------------------

--
-- Structure de la table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
CREATE TABLE IF NOT EXISTS `ventes` (
  `id_vente` int(11) NOT NULL AUTO_INCREMENT,
  `code_vente` varchar(12) NOT NULL,
  `date_vente` datetime NOT NULL,
  `nom_acheteur` varchar(30) NOT NULL,
  `montant_remise` int(11) NOT NULL,
  `code_facture` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_vente`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ventes`
--

INSERT INTO `ventes` (`id_vente`, `code_vente`, `date_vente`, `nom_acheteur`, `montant_remise`, `code_facture`) VALUES
(23, '202212', '2022-11-15 20:52:21', 'TITI', 3000, ''),
(22, '202211', '2022-11-15 20:52:04', 'ZOZO', 0, ''),
(24, '202213', '2022-11-16 08:34:07', 'SESE', 0, ''),
(25, '202214', '2022-11-16 09:04:48', 'COCO', 0, ''),
(26, '202215', '2022-11-16 09:05:17', 'VIVI', 500, ''),
(27, '202216', '2022-11-16 09:10:44', 'Benoit', 0, ''),
(28, '202217', '2022-11-16 09:33:29', 'aaa', 0, ''),
(29, '202218', '2022-11-16 09:38:35', 'NON DEFINI', 0, ''),
(30, '202219', '2022-11-16 09:39:04', 'NON DEFINI', 300, ''),
(31, '202220', '2022-11-17 07:53:47', 'KODJO', 1000, NULL),
(32, '202221', '2022-11-28 07:54:55', 'NON DEFINI', 0, NULL),
(33, '202222', '2022-11-29 11:28:16', 'EDEM', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vente_article`
--

DROP TABLE IF EXISTS `vente_article`;
CREATE TABLE IF NOT EXISTS `vente_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_vente` int(11) NOT NULL,
  `qtte_vendue` int(11) NOT NULL,
  `prix_vente` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vente_article`
--

INSERT INTO `vente_article` (`id`, `id_article`, `id_vente`, `qtte_vendue`, `prix_vente`) VALUES
(16, 38, 25, 1, 2000),
(15, 75, 24, 1, 3000),
(14, 1, 23, 2, 23000),
(13, 1, 22, 2, 26000),
(17, 38, 26, 2, 3500),
(18, 53, 27, 1, 1),
(19, 21, 28, 1, 1),
(20, 2, 29, 1, 2000),
(21, 2, 30, 1, 1700),
(22, 2, 31, 2, 3000),
(23, 75, 32, 1, 3000),
(24, 15, 33, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
