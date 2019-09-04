-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 04 sep. 2019 à 22:40
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `Id_absence` int(11) NOT NULL,
  `Id_etudiant` int(11) NOT NULL,
  `Id_module` int(11) NOT NULL,
  `Nombre_absence` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_absence`),
  KEY `Id_etudiant` (`Id_etudiant`),
  KEY `Id_module` (`Id_module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`Id_absence`, `Id_etudiant`, `Id_module`, `Nombre_absence`) VALUES
(1, 1, 2, 0),
(2, 3, 2, 0),
(3, 1, 11, 1),
(6, 1, 15, 0),
(7, 1, 12, 0),
(4, 1, 13, 0),
(5, 1, 14, 0),
(8, 2, 11, 0),
(9, 2, 12, 0),
(10, 2, 13, 0),
(11, 2, 14, 0),
(12, 2, 15, 0),
(13, 3, 11, 0),
(14, 3, 12, 0),
(15, 3, 13, 0),
(16, 3, 14, 0),
(17, 3, 15, 0),
(18, 4, 11, 0),
(19, 4, 12, 0),
(20, 4, 13, 0),
(21, 4, 14, 0),
(22, 4, 15, 0),
(23, 5, 11, 1),
(24, 5, 12, 0),
(25, 5, 13, 0),
(26, 5, 14, 0),
(27, 5, 15, 0),
(28, 6, 11, 0),
(29, 6, 12, 0),
(30, 6, 13, 0),
(31, 6, 14, 0),
(32, 6, 15, 0),
(33, 7, 11, 0),
(34, 7, 12, 0),
(35, 7, 13, 0),
(36, 7, 14, 0),
(37, 7, 15, 0),
(38, 8, 11, 0),
(39, 8, 12, 0),
(40, 8, 13, 0),
(41, 8, 14, 0),
(42, 8, 15, 0),
(43, 9, 11, 0),
(44, 9, 12, 0),
(45, 9, 13, 0),
(46, 9, 14, 0),
(47, 9, 15, 0),
(48, 10, 11, 0),
(49, 10, 12, 0),
(50, 10, 13, 0),
(51, 10, 14, 0),
(52, 10, 15, 0),
(53, 11, 11, 0),
(54, 11, 12, 0),
(55, 11, 13, 0),
(56, 11, 14, 0),
(57, 11, 15, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etude`
--

DROP TABLE IF EXISTS `etude`;
CREATE TABLE IF NOT EXISTS `etude` (
  `Id_etude` int(11) NOT NULL,
  `Id_etudiant` int(11) NOT NULL,
  `Id_module` int(11) NOT NULL,
  PRIMARY KEY (`Id_etude`),
  KEY `Id_etudiant` (`Id_etudiant`),
  KEY `Id_module` (`Id_module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etude`
--

INSERT INTO `etude` (`Id_etude`, `Id_etudiant`, `Id_module`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 1, 11),
(6, 1, 15),
(7, 1, 12),
(4, 1, 13),
(5, 1, 14),
(8, 2, 11),
(9, 2, 12),
(10, 2, 13),
(11, 2, 14),
(12, 2, 15),
(13, 3, 11),
(14, 3, 12),
(15, 3, 13),
(16, 3, 14),
(17, 3, 15),
(18, 4, 11),
(19, 4, 12),
(20, 4, 13),
(21, 4, 14),
(22, 4, 15),
(23, 5, 11),
(24, 5, 12),
(25, 5, 13),
(26, 5, 14),
(27, 5, 15),
(28, 6, 11),
(29, 6, 12),
(30, 6, 13),
(31, 6, 14),
(32, 6, 15),
(33, 7, 11),
(34, 7, 12),
(35, 7, 13),
(36, 7, 14),
(37, 7, 15),
(38, 8, 11),
(39, 8, 12),
(40, 8, 13),
(41, 8, 14),
(42, 8, 15),
(43, 9, 11),
(44, 9, 12),
(45, 9, 13),
(46, 9, 14),
(47, 9, 15),
(48, 10, 11),
(49, 10, 12),
(50, 10, 13),
(51, 10, 14),
(52, 10, 15),
(53, 11, 11),
(54, 11, 12),
(55, 11, 13),
(56, 11, 14),
(57, 11, 15);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Id_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_etudiant` varchar(45) DEFAULT NULL,
  `Prenom_etudiant` varchar(45) DEFAULT NULL,
  `Adr_mail` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Id_etudiant`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Id_etudiant`, `Nom_etudiant`, `Prenom_etudiant`, `Adr_mail`) VALUES
(1, 'maachi', 'bassma', 'bassma@gmail.com'),
(2, 'charjane', 'fatimazahra', 'charjane@gmail.com'),
(3, 'aasila', 'zineb', 'zineb@gmail.com'),
(4, 'maachi', 'abdelah', 'abdelah@gmail.com'),
(5, 'khlifi_taghzouti', 'yasmine', 'yasmine@gmail.com'),
(6, 'ziyani', 'zineb', 'zineb@gmail.com'),
(7, 'lmghaber', 'Chaimaa', 'chaimaa@gmail.com'),
(8, 'laarrassi', 'Asmae', 'Asmae@gmail.com'),
(9, 'Lgnaoui', 'manal', 'manal@gmail.com'),
(10, 'Basbasi', 'iman', 'iman@gmail.com'),
(11, 'Dakkak', 'omar', 'omar@gmail.com'),
(12, 'Badouj', 'abdelsalam', 'abdelsalam@gmail.com'),
(13, 'Felouach', 'abdsamad', 'abdsamad@gmail.com'),
(14, 'Camara', 'mory_moussa', 'camara@gmail.com'),
(15, 'Benjelloun_jbina', 'bouchra', 'bouchra@gmail.com'),
(16, 'Batta', 'salwa', 'salwa@gmail.com'),
(17, 'Chlihfan', 'bouchra', 'bouchra@gmail.com'),
(18, 'Lmkadmi', 'touriya', 'touriya@gmail.com'),
(19, 'oundouh', 'chaimaa', 'chaimaa@gmail.com'),
(20, 'jouadi', 'khadija', 'khadija@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `Id_module` int(8) NOT NULL AUTO_INCREMENT,
  `Intitulé` text NOT NULL,
  `Idresponsable` int(8) NOT NULL,
  `Id_personne` int(8) NOT NULL,
  `Semestre` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_module`),
  KEY `Id_personne` (`Id_personne`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`Id_module`, `Intitulé`, `Idresponsable`, `Id_personne`, `Semestre`) VALUES
(1, 'structure de données et programmation avancée en C', 1, 1, 'S1'),
(3, 'méthode numérique pour l ingénieur', 3, 3, 'S1'),
(2, 'architecture des ordinateurs', 2, 7, 'S1'),
(4, 'analyse des données', 3, 3, 'S1'),
(6, 'système d information et bases de données', 4, 4, 'S1'),
(7, 'réseaux informatiques', 7, 7, 'S1'),
(8, 'expression et communication en francais', 6, 10, 'S1'),
(9, 'expression en anglais', 6, 9, 'S1'),
(10, 'espagnole', 6, 1, 'S1'),
(11, 'programmation orienté objet en C++', 1, 1, 'S2'),
(12, 'algorithme avancé et complexité', 7, 7, 'S2'),
(13, 'UML', 4, 4, 'S2'),
(14, 'recherche opérationnelle', 8, 9, 'S2'),
(15, 'développement d application Web', 9, 7, 'S2'),
(16, 'comptabilité générale', 6, 4, 'S2'),
(17, 'management général', 6, 6, 'S2'),
(18, 'programmation JAVA', 1, 1, 'S3'),
(19, 'XML et applications', 4, 5, 'S3'),
(20, 'framework PHP MVC', 4, 5, 'S3'),
(21, 'technologies serviet,JSP et framework de présentation', 4, 5, 'S3'),
(22, 'génie logiciel', 9, 9, 'S4'),
(23, 'IHM', 7, 9, 'S4'),
(24, 'apprentissage statique', 2, 8, 'S4'),
(25, 'administration systéme linux', 2, 8, 'S4'),
(26, 'controle de gestion', 8, 6, 'S4'),
(27, 'marketing fondamental', 6, 6, 'S3'),
(28, 'Interconnexion et Administration des réseaux', 5, 5, 'S4'),
(29, 'CRM/ERP', 4, 4, 'S5');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `Id_note` int(11) NOT NULL,
  `Id_etudiant` int(11) NOT NULL,
  `Id_module` int(11) NOT NULL,
  `Valeur_finale` int(11) DEFAULT NULL,
  `Valeur_apres_rat` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_note`),
  KEY `Id_etudiant` (`Id_etudiant`),
  KEY `Id_module` (`Id_module`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `note`
--

INSERT INTO `note` (`Id_note`, `Id_etudiant`, `Id_module`, `Valeur_finale`, `Valeur_apres_rat`) VALUES
(1, 1, 2, 0, 0),
(2, 3, 2, 0, 0),
(3, 1, 11, 20, 0),
(6, 1, 15, 0, 0),
(7, 1, 12, 0, 0),
(4, 1, 13, 0, 0),
(5, 1, 14, 0, 0),
(8, 2, 11, 0, 0),
(9, 2, 12, 0, 0),
(10, 2, 13, 0, 0),
(11, 2, 14, 0, 0),
(12, 2, 15, 0, 0),
(13, 3, 11, 15, 0),
(14, 3, 12, 0, 0),
(15, 3, 13, 0, 0),
(16, 3, 14, 0, 0),
(17, 3, 15, 0, 0),
(18, 4, 11, 0, 0),
(19, 4, 12, 0, 0),
(20, 4, 13, 0, 0),
(21, 4, 14, 0, 0),
(22, 4, 15, 0, 0),
(23, 5, 11, 0, 0),
(24, 5, 12, 0, 0),
(25, 5, 13, 0, 0),
(26, 5, 14, 0, 0),
(27, 5, 15, 0, 0),
(28, 6, 11, 0, 0),
(29, 6, 12, 0, 0),
(30, 6, 13, 0, 0),
(31, 6, 14, 0, 0),
(32, 6, 15, 0, 0),
(33, 7, 11, 0, 0),
(34, 7, 12, 0, 0),
(35, 7, 13, 0, 0),
(36, 7, 14, 0, 0),
(37, 7, 15, 0, 0),
(38, 8, 11, 0, 0),
(39, 8, 12, 0, 0),
(40, 8, 13, 0, 0),
(41, 8, 14, 0, 0),
(42, 8, 15, 0, 0),
(43, 9, 11, 0, 0),
(44, 9, 12, 0, 0),
(45, 9, 13, 0, 0),
(46, 9, 14, 0, 0),
(47, 9, 15, 0, 0),
(48, 10, 11, 0, 0),
(49, 10, 12, 0, 0),
(50, 10, 13, 0, 0),
(51, 10, 14, 0, 0),
(52, 10, 15, 0, 0),
(53, 11, 11, 0, 0),
(54, 11, 12, 0, 0),
(55, 11, 13, 0, 0),
(56, 11, 14, 0, 0),
(57, 11, 15, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `Id_personne` int(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Adr_mail` varchar(100) NOT NULL,
  `Role` varchar(100) NOT NULL,
  `login_personne` varchar(100) NOT NULL,
  `Password_personne` varchar(100) NOT NULL,
  `photoProfil` varchar(200) NOT NULL,
  `Département` varchar(100) NOT NULL,
  `spécialité` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `Nomprenom` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`Id_personne`, `Nom`, `Prenom`, `Adr_mail`, `Role`, `login_personne`, `Password_personne`, `photoProfil`, `Département`, `spécialité`, `grade`, `Nomprenom`) VALUES
(1, 'Ahmad', 'ALLAOUI', 'ALLAOUI@gmail.com', 'Responsable de filiére', 'Ahmad', 'ALLAOUI', '1561326827_7.jpg', 'Mathematique et Informatique', 'Informatique', 'PA', 'ALLAOUI Ahmad'),
(2, 'MESSAOUDI', 'Abdelhafid', 'MESSAOUDI@gmail.com', 'professeur', 'MESSAOUDI', 'Abdelhafid', '1560989697_Penguins.jpg', 'Mathematique Informatique', 'Traitement de signal et informatique ', 'PA ', 'MESSAOUDI Abdelhafid'),
(3, 'Mohamed', 'HEYOUNI', 'HEYOUNI@gmail.com', 'professeur', 'MOHAMED', 'HEYOUNI', '1559378935_Jellyfish.jpg', 'Mathématiques Informatique', 'Analyse numérique ', 'PA', 'Mohamed HEYOUNI'),
(4, 'MOUSSA', 'ABDELILAH', 'MOUSSA@gmail.com', 'professeur', 'ABDELILAH', 'MOUSSA', '4.jpg', 'Mathématiques Informatique', 'Physique et applications  ', 'PA', 'MOUSSA ABDELILAH'),
(5, 'MESSAOUDI ', 'Abdelhafid ', 'Abdelhafid@gmail.com', 'professeur', 'Abdelhafid ', 'MESSAOUDI ', '1560939242_Penguins.jpg', 'Mathématiques Informatique', 'Traitement de signal et informatique ', 'PA', 'MESSAOUDI Abdelhafid '),
(6, 'Le coordonateur de la filière', '', '', 'professeur', '', '', '6.jpg', 'Mathématiques Informatique', '', 'PA', 'Le coordonateur de la filière'),
(7, 'DADI', 'El Wardani', 'DADI@gmail.com', 'professeur', 'DADI', 'El Wardan', '1561159709_Lighthouse.jpg', 'Mathématiques Informatique ', 'Informatique', 'PA', 'DADI El Wardani'),
(8, 'EL MOUTAOUAKIL ', 'Karim', 'ELMOUTAOUAKIL@gmail.com', 'professeur', 'MOUTAOUAKIL ', 'Karim', '8.jpg', 'Mathématiques Informatique', 'Informatique et recherche opérationnelle', 'PA', 'EL MOUTAOUAKIL Karim'),
(9, 'HADOUCH ', 'Khalid ', 'HADOUCH@gmail.com', 'professeur', 'HADOUCH ', 'Khalid ', '9.jpg', 'Mathématiques Informatique', 'Informatique', 'PA', 'HADOUCH Khalid '),
(10, 'EL HADDADI ', 'Anass', 'HADDADI@gmail.com', 'chef de département', 'HADDADI ', 'Anass', '10.jpg', 'Mathématiques Informatique ', 'Informatique décisionnelle', 'PA', 'EL HADDADI Anass'),
(11, 'Addam ', 'Mohamed', 'Addam@gmail.com', 'professeur', 'Addam', 'Mohamed', '1559345445_Penguins.jpg', 'Mathématiques Informatique', 'Mathématiques Appliqués', 'PA', 'Addam Mohamed');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
