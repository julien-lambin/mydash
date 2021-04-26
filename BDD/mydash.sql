-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 26 avr. 2021 à 05:35
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydash`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(75) NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `tel` int(10) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `date_creation` varchar(10) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `mail`, `tel`, `adresse`, `code_postal`, `date_creation`) VALUES
(1, 'aa', 'julien', 'julien59155@gmail.com', 750415911, '7 RUE DU MARECHAL FOCH', 59155, '17/04/2021'),
(2, 'nollet', 'thomas', 'minefire@gmail.com', 630834201, '7 RUE DU MARECHAL FOCH', 59155, '17/04/2021'),
(3, 'aa', 'Thomas', 'tnlt-59@outlook.fr', 654831597, '7 RUE DU MARECHAL FOCH', 59155, '17/04/2021'),
(4, 'Dupont', 'Paul', 'pauldupont@outlook.fr', 647895249, '47 rue des fleurs', 59000, '17/04/2021'),
(14, 'aa', 'julien', 'julien59155@gmail.com', 684651265, '7 RUE DU MARECHAL FOCH', 59155, '19/04/2021'),
(13, 'as', 'sa', 'ad', 56, 'azd', 50, '17/04/2021'),
(12, 'as', 'sa', 'ad', 56, 'azd', 50, '17/04/2021'),
(15, 'Lambin', 'Philippe', 'philippe.lambin@numericable.fr', 620704569, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(16, 'Lambin', 'Philippe', 'philippe.lambin@numericable.fr', 620704569, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(17, 'Lambin', 'Philippe', 'philippe.lambin@numericable.fr', 620704569, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(18, 'Lambin', 'Philippe', 'philippe.lambin@numericable.fr', 620704569, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(19, 'aa', 'ihzaduiayhd', 'oizaddo', 656484846, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(20, 'aa', 'ihzaduiayhd', 'oizaddo', 656484846, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(21, 'bb', 'daa', 'oijad', 645875479, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(22, 'bb', 'daa', 'oijad', 645875479, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(23, 'bb', 'azdf', 'azdaz', 478998894, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(24, 'dsq', 'fsdd', 'zefe', 645545445, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(25, 'adazd', 'dsqs', 'sqdqsdq', 545454554, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(26, 'adazd', 'dsqs', 'sqdqsdq', 545454554, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(27, 'adazd', 'dsqs', 'sqdqsdq', 545454554, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(28, 'azd', 'azd', 'zad', 656556564, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(29, 'azd', 'azdzda', 'azddzadaz', 565655565, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(30, 'adzdazdaz', 'qsdqdsqd', 'qsdsqdaz', 545454545, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(31, 'adzdazdaz', 'qsdqdsqd', 'qsdsqdaz', 545454545, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(32, 'azddza', 'dqsqsd', 'azddaz', 545544554, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(33, 'azddza', 'dqsqsd', 'azddaz', 545544554, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(34, 'azdzad', 'zaddza', 'julien59155@gmail.com', 555665565, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(35, 'azdzad', 'zaddza', 'julien59155@gmail.com', 555665565, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(36, 'adzzad', 'azdazd', 'julien59155@gmail.com', 565655665, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(37, 'adzzad', 'azdazd', 'julien59155@gmail.com', 565655665, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(38, 'aa', 'azddza', 'julien59155@gmail.com', 565656556, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(39, 'azdazd', 'zaddza', 'azddza', 445544545, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(40, 'adzzda', 'azddza', 'azdadz', 556656565, '7 RUE DU MARECHAL FOCH', 59155, '22/04/2021'),
(41, 'Plouy', 'Thomas', 'plouplou@gmail.com', 656481265, '12 rue des fleurs', 59000, '24/04/2021'),
(42, 'cea', 'dazd', 'crabie@gmail.com', 548465413, '7 RUE DU MARECHAL FOCH', 59155, '24/04/2021');

-- --------------------------------------------------------

--
-- Structure de la table `pec`
--

DROP TABLE IF EXISTS `pec`;
CREATE TABLE IF NOT EXISTS `pec` (
  `id_pec` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `elements_fournis` text DEFAULT NULL,
  `code_unlock` varchar(255) DEFAULT NULL,
  `code_sim` varchar(4) DEFAULT NULL,
  `imei` bigint(20) DEFAULT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `infos_supp` text DEFAULT NULL,
  `type_reparation` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `etat` int(1) NOT NULL DEFAULT 0,
  `date_creation` varchar(10) NOT NULL,
  `reparateur` int(11) DEFAULT NULL,
  `date_fin` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_pec`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `pec`
--

INSERT INTO `pec` (`id_pec`, `id_client`, `type`, `marque`, `modele`, `elements_fournis`, `code_unlock`, `code_sim`, `imei`, `serial`, `infos_supp`, `type_reparation`, `prix`, `etat`, `date_creation`, `reparateur`, `date_fin`) VALUES
(31, 3, 'Delaware', 'Alaska', 'Alaska', 'California;Texas', '5456', '0000', 789456418946316, '84844884844', 'C CASSE', '3', 31, 0, '24/04/2021', NULL, NULL),
(30, 1, 'California', 'Washington', 'Texas', 'un pare-brise', '5749', '1894', 485784231546445, '867489415641', 'aucune', '2', 20, 0, '24/04/2021', NULL, NULL),
(32, 1, 'Alaska', 'Alabama', 'Alabama', 'Delaware', '', '', 123148942315465, '', '', '2', 20, 0, '25/04/2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_reparation`
--

DROP TABLE IF EXISTS `type_reparation`;
CREATE TABLE IF NOT EXISTS `type_reparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reparation` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_reparation`
--

INSERT INTO `type_reparation` (`id`, `reparation`, `prix`) VALUES
(1, 'Remplacement de l\'écran', 45),
(2, 'Installation OS', 20),
(3, 'Installation de RAM', 31);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `droits` varchar(255) NOT NULL,
  `dark_mode` int(1) NOT NULL DEFAULT 0,
  `date_creation` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `identifiant`, `nom`, `prenom`, `mail`, `password`, `droits`, `dark_mode`, `date_creation`) VALUES
(1, 'Admin', 'test', 'test', 'admin@my-dash.com', '$2y$10$LcM7cop4r81peCvOfSRQgOOSslAz7vR.igmZ7zIclQX5B0mlCMjxe', '999', 1, '17/04/2021');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
