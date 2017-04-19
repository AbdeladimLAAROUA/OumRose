-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 20 Avril 2017 à 00:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `oumdev_leads`
--

-- --------------------------------------------------------

--
-- Structure de la table `baby`
--

CREATE TABLE IF NOT EXISTS `baby` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `naissance` date DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `sexe` varchar(15) DEFAULT NULL,
  `MATERNITE` varchar(255) DEFAULT NULL,
  `customer_id` int(50) NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=403 ;

--
-- Contenu de la table `baby`
--

INSERT INTO `baby` (`id`, `naissance`, `prenom`, `sexe`, `MATERNITE`, `customer_id`, `creationDate`, `updateDate`) VALUES
(301, '2017-02-15', '', 'G', 'Clinique Les Papillons', 116, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(302, '2017-02-06', '', 'F', 'Les Papillons', 117, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(303, '2016-04-27', 'Hassan', 'G', '', 118, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(304, '2016-10-06', 'Amir', 'G', '', 119, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(305, '2017-03-11', '', 'G', 'Nation Unie', 120, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(306, '2016-05-18', 'Ali', 'G', '', 121, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(307, '2017-01-23', 'Amir', 'G', 'Ghandi', 122, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(308, '2017-05-05', '', 'I', 'Oum Albanine', 123, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(309, '2017-01-21', '', 'G', 'Ghandi', 124, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(310, '2017-11-16', '', 'I', '', 125, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(311, '2017-01-25', '', 'G', '', 126, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(312, '2017-03-11', '', 'F', '', 127, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(313, '2017-01-25', '', 'G', '', 128, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(314, '2016-07-12', 'Suleymen', 'G', '', 129, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(315, '2017-03-10', '', 'G', '', 130, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(316, '2016-10-10', 'Ilyas', 'G', '', 131, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(317, '2017-05-05', '', 'G', 'L''Hermitage', 132, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(318, '2016-10-17', 'Mohamed', 'G', '', 133, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(319, '2016-10-11', 'Ismail', 'G', '', 134, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(320, '2017-04-21', '', 'F', 'Clinique Les Iris', 135, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(321, '2016-11-08', 'Med Jad', 'G', '', 136, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(322, '2017-05-26', '', 'G', '', 137, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(323, '2016-05-19', 'Dina', 'F', '', 138, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(324, '2016-11-22', 'Ali', 'G', '', 139, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(325, NULL, '', '', '', 140, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(326, '2016-11-06', 'Camil', 'G', '', 141, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(327, NULL, '', '', '', 142, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(328, '2017-02-15', '', 'G', '', 143, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(329, NULL, '', '', '', 144, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(330, NULL, '', '', '', 145, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(331, '2017-02-10', '', 'G', '', 146, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(332, '2017-01-02', 'Youssef', 'G', '', 147, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(333, '2016-10-17', 'Salma', 'F', '', 148, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(334, '2017-08-02', '', 'I', 'Les Papillons', 149, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(335, '2016-04-14', 'Mia Jellal', 'F', '', 150, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(336, NULL, '', '', '', 151, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(337, '2016-12-22', 'Hajar', 'F', '', 152, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(338, '2017-04-08', '', 'F', 'L''Hermitage', 153, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(339, NULL, '', '', '', 154, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(340, '2017-06-07', '', 'I', '', 155, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(341, '2016-12-16', 'Jad', 'G', '', 156, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(342, '2017-02-15', '', 'G', 'Les Papillons', 157, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(343, '2016-09-26', 'Yacout', 'F', '', 158, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(344, '2017-07-22', '', 'I', 'Salam', 159, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(345, '2017-02-24', '', 'F', 'Clinique Ghandi', 160, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(346, '2017-04-28', '', 'G', '', 161, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(347, '2016-07-15', 'Al Mahdi', 'G', '', 162, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(348, '2016-11-29', '', 'G', '', 163, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(349, '2017-08-05', '', 'I', '', 164, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(350, '2017-05-06', '', 'F', 'Clinique', 165, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(351, '2017-05-01', '', 'G', '', 166, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(352, '2016-04-13', 'Alia', 'F', '', 167, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(353, '2017-03-28', '', 'G', 'Les Iris', 168, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(354, '2017-04-28', '', 'G', 'Clinique', 169, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(355, '2016-03-21', 'Yasmine', 'F', '', 170, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(356, '2017-01-11', '', 'G', 'Clinique Les Papillons', 171, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(357, '2017-02-06', '', 'I', 'Clinique Les Iris Casablanca Maroc', 172, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(358, '2017-01-22', '', 'F', '', 173, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(359, '2017-02-03', '', 'F', 'Clinique', 174, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(360, '2017-05-10', '', 'I', 'Papillon', 175, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(361, '2016-10-16', 'Aïda', 'F', '', 176, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(362, '2016-12-09', 'Nour', 'F', '', 177, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(363, '2017-01-26', '', 'F', 'Clinique', 178, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(364, '2016-08-23', 'Firas', 'G', '', 179, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(365, '2016-10-20', 'Miya', 'F', '', 180, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(366, '2016-05-09', '', 'G', '', 181, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(367, '2017-01-05', '', 'F', '', 182, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(368, '2016-09-16', 'Majd', 'G', '', 183, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(369, '2016-08-09', 'Maha', 'F', '', 184, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(370, '2016-11-24', 'Nael', 'G', '', 185, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(371, '2017-02-22', '', 'G', 'Dar Essalam', 186, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(372, '2017-02-07', '', 'F', 'Tilila Agadir', 187, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(373, '2016-09-15', 'May', 'F', '', 188, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(374, '2016-10-18', 'Rayan', 'G', '', 189, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(375, '2016-09-08', 'Sara', 'F', '', 190, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(376, '2016-08-31', 'Taha', 'G', '', 191, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(377, '2016-05-27', 'Yacout', 'F', '', 192, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(378, '2016-09-16', 'Taha', 'G', '', 193, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(379, '2016-01-23', 'Lilia', 'F', '', 194, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(380, '2016-07-06', 'Zyad', 'G', '', 195, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(381, '2017-01-13', '', 'G', 'Les Iris', 196, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(382, '2016-08-01', 'Jad', 'G', '', 197, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(383, NULL, '', '', '', 198, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(384, '2016-08-08', 'Ghali', 'G', '', 199, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(385, '2016-08-19', 'Ali', 'G', '', 200, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(386, '2017-03-08', '', 'F', '', 201, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(387, '2016-11-13', 'Samia', 'F', '', 202, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(388, '2016-11-10', 'Ranya', 'F', '', 203, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(389, '2016-08-13', 'Ziad', 'G', '', 204, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(390, '2016-05-22', 'Haroun', 'G', '', 205, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(391, '2017-01-02', '', 'G', 'Les Papillons', 206, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(392, '2017-05-05', '', 'I', 'Clinie', 207, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(393, '2016-11-21', 'Maya', 'F', '', 208, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(394, '2016-04-23', 'Sofia', 'F', '', 209, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(395, '2016-10-24', 'Ines', 'F', '', 210, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(396, '2017-02-16', '', 'G', 'Cheikh Zayed', 211, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(397, '2016-12-09', 'Fahd', 'G', '', 212, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(398, '2017-03-10', '', 'F', 'Les Papillons', 213, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(399, '2017-03-27', '', 'G', 'Les Papillons', 214, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(400, '2017-09-04', '', 'I', '', 215, '2017-04-19 15:38:31', '2017-04-19 15:38:31'),
(402, '2017-04-03', NULL, NULL, NULL, 216, '2017-04-19 17:10:14', '2017-04-19 19:40:25');

-- --------------------------------------------------------

--
-- Structure de la table `box`
--

CREATE TABLE IF NOT EXISTS `box` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `refBox` int(50) NOT NULL,
  `Type` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `CreationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `upadateDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `customer_id` int(50) NOT NULL,
  `box_id` int(50) NOT NULL,
  `BC` int(10) NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_order_customer` (`customer_id`),
  KEY `fk_commande_box` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gsm` varchar(255) NOT NULL,
  `naissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `CP` int(10) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `Ville_id` int(11) NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_customer_Ville1_idx` (`Ville_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Contenu de la table `customer`
--

INSERT INTO `customer` (`id`, `nom`, `prenom`, `email`, `password`, `gsm`, `naissance`, `adresse`, `CP`, `type`, `Ville_id`, `creationDate`, `updateDate`) VALUES
(116, 'Assem', 'Sabrine', 'attiasabrine@gmail.com', '', '06 61 63 03 75', '1987-03-02', '10 rue le titien residence nadara etage 04 appt 14...', 20390, 'enceinte', 1, '2017-01-21 00:00:00', NULL),
(117, 'Alami', 'Laila', 'alaila37@yahoo.fr', '', '06 71 41 50 94', '1981-10-16', '', NULL, 'enceinte', 16, '2017-01-20 00:00:00', NULL),
(118, 'Bennani', 'Kenza', 'kenza.bennani@gmail.com', '', '06 62 26 77 83', '1984-12-03', '16 Route d''Azzemour, Résidence Yasmine', NULL, 'maman', 1, '2017-01-20 00:00:00', NULL),
(119, 'Loubaris', 'Rabab', 'rabab-loubaris@hotmail.com', '', '06 60 88 63 64', '1986-01-09', '23 rue amr bnou el jamouh,  lot dait moussa souiss...', 10170, 'maman', 2, '2017-01-20 00:00:00', NULL),
(120, 'Elghyati', 'Nibal', 'elghyati.nibal@gmail.com', '', '06 69 63 60 04', '1990-08-15', '40 avenue patrice lumumba', 10010, 'enceinte', 2, '2017-01-19 00:00:00', NULL),
(121, 'Mask', 'Safaa', 'msafaa4@yahoo.fr', '', '06 75 37 70 91', '1983-01-01', '', NULL, 'maman', 1, '2017-01-19 00:00:00', '2017-04-19 14:58:22'),
(122, 'Ajarrai', 'Houda', 'houdaajar@gmail.com', '', '06 66 96 83 15', '1987-08-31', 'Lot violette rue 4 n°5', 20150, 'enceinte', 1, '2017-01-19 00:00:00', '2017-04-19 14:58:22'),
(123, 'Boumediene', 'Ikbal', 'ikbalboum@hotmail.fr', '', '06 61 08 60 83', '1980-05-05', '8 bis Résidence yasmina bd tantan', NULL, 'enceinte', 1, '2017-01-17 00:00:00', '2017-04-19 14:58:22'),
(124, 'Alami', 'Sofia', 's.sofiaalami@gmail.com', '', '06 62 10 50 67', '2017-07-30', 'residence jnane californie immeuble yakout 9 appar...', 20470, 'enceinte', 1, '2017-01-17 00:00:00', '2017-04-19 14:58:22'),
(125, 'Laili', 'Kaoutar', 'lailikaoutar@gmail.com', '', '06 53 03 29 61', '1989-09-11', '', NULL, 'enceinte', 16, '2017-01-17 00:00:00', '2017-04-19 14:58:22'),
(126, 'Salim Elqalb', 'Fatima Zahra', 'salimelqalbfz@gmail.com', '', '06 49 90 94 74', '1985-11-09', 'Résidence Les Champs 1 Imm A Appt 11 5 ème étage N...', NULL, 'enceinte', 1, '2017-01-15 00:00:00', '2017-04-19 14:58:22'),
(127, 'Nacer', 'Hanaa', 'hanaa.nacer@gmail.com', '', '06 60 70 66 74', '1985-10-21', '', NULL, 'enceinte', 1, '2017-01-14 00:00:00', '2017-04-19 14:58:22'),
(128, 'Mannou', 'Mouna', 'amine.assabe@gmail.com', '', '06 66 20 10 65', '1988-03-08', '', 25000, 'enceinte', 1, '2017-01-14 00:00:00', '2017-04-19 14:58:22'),
(129, 'Serroukh', 'Hanane', 'hanane.ser@gmail.com', '', '06 77 03 39 74', '1987-11-12', '9 Avenue hassan II', 92000, 'maman', 3, '2017-01-14 00:00:00', '2017-04-19 14:58:22'),
(130, 'Houry', 'Afaf', 'h.3afaf@gmail.com', '', '06 22 20 08 47', '1991-02-05', '', NULL, 'enceinte', 16, '2017-01-14 00:00:00', '2017-04-19 14:58:22'),
(131, 'Kaziane', 'Oumniya', 'oumniya.kaziane@gmail.com', '', '06 61 96 62 60', '1987-02-10', '', NULL, 'maman', 4, '2017-01-14 00:00:00', '2017-04-19 14:58:22'),
(132, 'Chems', 'Sanaa', 'chemssanaa1@gmail.com', '', '06 14 95 24 10', '1991-11-11', 'Mebrouka rue 22 n 11', 20000, 'enceinte', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(133, 'Seffar', 'Najlae', 'njilatoune@gmail.com', '', '06 17 50 90 95', '1988-03-24', '', NULL, 'maman', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(134, 'Badre', 'Asmaa', 'asmaa_d@hotmail.com', '', '06 61 09 80 78', '1976-01-12', '', NULL, 'maman', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(135, 'Duclaux-Larive', 'Sofia', 'sofiaduclaux@hotmail.com', '', '06 60 26 62 67', '1979-12-22', '', NULL, 'enceinte', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(136, 'Elbouaychi', 'Zineb', 'elbouaychi_zineb@hotmail.com', '', '06 73 36 44 10', '1989-10-04', '', NULL, 'maman', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(137, 'Allabouch', 'Hind', 'hind.allab@gmail.com', '', '06 61 22 62 23', '1987-01-07', '7 rue racine résidence racine val fleuri', NULL, 'enceinte', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(138, 'Lazaare', 'Ghita', 'ghita.lazaare@gmail.com', '', '06 67 74 35 55', '1990-07-21', '7, Résidence la Perle de Nouaceur 2, Immeuble 2', 27000, 'maman', 5, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(139, 'Iraqi', 'Rita', 'alamidoc@gmail.com', '', '06 61 36 36 53', '1982-05-18', 'Résidence dar assalam A , 36 avenue Mohamed Triki,...', 21000, 'maman', 2, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(140, 'Ahlyel', 'Amal', 'aahlyel@gmail.com', '', '06 71 44 38 38', '1988-01-20', 'Res hammou', NULL, 'maman', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(141, 'Benjelloun Touimi', 'Yasmine', 'yasmine.benjelloun.touimi@gmail.com', '', '06 61 73 10 45', '1986-01-12', '', 20060, 'maman', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(142, 'Benhsinat', 'Chaimaa', 'chaimaa.benhsinat@gmail.com', '', '06 42 75 91 59', '1988-07-18', '', NULL, 'maman', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(143, 'El Abid', 'Khadija', 'kd.elabid@gmail.com', '', '06 61 19 85 50', '1989-10-26', '', NULL, 'enceinte', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(144, 'Mojtahid', 'Bouchra', 'mojtahid.bouchra@gmail.com', '', '06 74 34 09 72', '1988-02-01', '', NULL, 'maman', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(145, 'Domenech', 'Myriem', 'myriem.domenech@gmail.com', '', '06 61 43 13 16', '1985-04-29', 'Résidence le printemps, 25 rue Michel Ange', 20000, 'maman', 1, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(146, 'Agoujil', 'Imane', 'imane.agoujil@gmail.com', '', '06 66 17 15 40', '1985-06-14', '', NULL, 'enceinte', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(147, 'Jamai', 'Fatimzahra', 'jamai.fatiza@gmail.com', '', '06 50 18 39 40', '1989-06-28', 'Résidence khalidat imm b appt 11 9bibat  rabat', 20000, 'maman', 2, '2017-01-23 00:00:00', '2017-04-19 14:58:22'),
(148, 'Somoue', 'Zineb', 'zinebsomoue@gmail.com', '', '06 31 16 66 92', '1991-03-09', '', 24030, 'maman', 6, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(149, 'Sahnoun', 'Kenza', 'sahnoun.kenza@gmail.com', '', '06 66 30 48 38', '1991-04-05', '', NULL, 'enceinte', 16, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(150, 'Zerouali', 'Sahar', 'saharzerouali8@gmail.com', '', '06 61 98 83 86', '1988-09-28', '18 Rue Nice, guyville', 12040, 'maman', 7, '2017-01-13 00:00:00', '2017-04-19 14:58:22'),
(151, 'Houari', 'Salma', 'houari.salma5@gmail.com', '', '06 62 84 04 44', '1988-12-03', 'residence nassim appt 18 etage 5 rue vevey quartie...', NULL, 'maman', 1, '2017-01-12 00:00:00', '2017-04-19 14:58:22'),
(152, 'Khomri', 'Rajaa', 'relkhoussi@gmail.com', '', '06 60 05 71 68', '1985-04-18', '25 Av jordanie, res Bennis A 3eme etage', NULL, 'maman', 8, '2017-01-12 00:00:00', '2017-04-19 14:58:22'),
(153, 'Naitlho', 'Ghita', 'ghita_naitlho@hotmail.com', '', '06 20 38 66 14', '1982-12-06', 'Rue Ben Jilali Tajeddine, Résidence Yasmine Imm I ...', 20000, 'enceinte', 1, '2017-01-12 00:00:00', '2017-04-19 14:58:22'),
(154, 'Lebbat', 'Karima', 'karima.lebbat@gmail.com', '', '06 70 25 14 25', '1988-09-03', '', NULL, 'maman', 16, '2017-01-12 00:00:00', '2017-04-19 14:58:22'),
(155, 'Douieb', 'Najwa', 'najwa.douieb@gmail.com', '', '06 69 02 01 05', '1991-08-30', '', 20000, 'enceinte', 1, '2017-01-11 00:00:00', '2017-04-19 14:58:22'),
(156, 'Lamrani', 'Lamisse', 'lamisse.lamrani@gmail.com', '', '06 64 73 18 72', '1987-01-01', '342 bd bordeaux bourgogne  6eme étage', 20000, 'maman', 1, '2017-01-09 00:00:00', '2017-04-19 14:58:22'),
(157, 'El Mezouari', 'Kamilia', 'kamilia.elm@hotmail.fr', '', '06 65 89 67 07', '1987-01-09', 'Résidence  dari''s , immeuble marguerite', NULL, 'enceinte', 1, '2017-01-08 00:00:00', '2017-04-19 14:58:22'),
(158, 'Bez', 'Hiba', 'hebatellah@gmail.com', '', '21 26 23 75 70', '1995-01-23', '512 boulevard Al Qods', 20100, 'maman', 1, '2017-01-08 00:00:00', '2017-04-19 14:58:22'),
(159, 'Bouderka', 'Malika', 'malika.bouderka@gmail.com', '', '06 10 99 73 72', '1986-08-09', '42 Avenue mohamed slaoui', 30000, 'enceinte', 9, '2017-01-06 00:00:00', '2017-04-19 14:58:22'),
(160, 'Elmazili', 'Amina', 'amina.elmazili@gmail.com', '', '06 00 07 09 77', '1987-01-02', '26, residence andaloussia appt 4', NULL, 'enceinte', 1, '2017-01-06 00:00:00', '2017-04-19 14:58:22'),
(161, 'Moustaine', 'Nabila', 'moustaine.nabila@gmail.com', '', '06 93 07 83 51', '1988-02-10', '26 rue verdi residence akkid 5 appt5', 2000, 'enceinte', 1, '2017-01-05 00:00:00', '2017-04-19 14:58:22'),
(162, 'Bourouail', 'Manal', 'manalbourouail00@gmail.com', '', '06 66 60 48 33', '1988-06-18', 'Résidence Bel Air GH 1 Imm B', NULL, 'maman', 10, '2017-01-05 00:00:00', '2017-04-19 14:58:22'),
(163, 'Alaoui', 'Kenza', 'k.alaoui@mdjs.ma', '', '06 61 35 20 82', '1976-07-11', '', NULL, 'maman', 1, '2017-01-04 00:00:00', '2017-04-19 14:58:22'),
(164, 'Benyamina', 'Safaa', 'safaa.benyamina@hem.ac.ma', '', '06 38 39 94 14', '1989-07-04', '', NULL, 'enceinte', 16, '2017-01-03 00:00:00', '2017-04-19 14:58:22'),
(165, 'Mokhliss', 'Najoua', 'm.najouaharfi@gmail.com', '', '06 61 41 71 21', '2017-05-06', '', NULL, 'enceinte', 16, '2017-01-03 00:00:00', '2017-04-19 14:58:22'),
(166, 'Haggouch', 'Sara', 'haggouch.s@gmail.com', '', '06 70 33 13 87', '1988-07-11', '', NULL, 'enceinte', 16, '2017-01-02 00:00:00', '2017-04-19 14:58:22'),
(167, 'Nejmi', 'Oum Keltoum', 'o.nejmi@gmail.com', '', '06 61 07 10 94', '1985-08-28', 'Residence Bouskoura Golf City (Prestigia) Immeuble...', NULL, 'maman', 11, '2017-01-02 00:00:00', '2017-04-19 14:58:22'),
(168, 'El Karhat', 'Sara', 'sara.elkarhat@gmail.com', '', '06 04 20 81 52', '1988-07-11', '', NULL, 'enceinte', 1, '2017-01-02 00:00:00', '2017-04-19 14:58:22'),
(169, 'Jalal', 'Zineb', 'zineb.jl93@gmail.com', '', '06 45 75 44 14', '1993-01-22', 'rue 141', 22222, 'enceinte', 1, '2017-01-02 00:00:00', '2017-04-19 14:58:22'),
(170, 'Mtioui', 'Imane', 'imane.mtioui@hotmail.fr', '', '06 63 73 91 40', '1984-08-14', 'Rue des français résidence joud 4. 2 ème étage  ap...', 20000, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(171, 'Ghandour', 'Zineb', 'zineb.ghandour88@gmail.com', '', '06 69 49 29 68', '1988-09-30', 'Résidence L''Horizon 3, Imm GH4 A BIS, 18 AV Mehdi ...', 20000, 'enceinte', 1, '2017-01-02 00:00:00', '2017-04-19 14:58:22'),
(172, 'Sebbah', 'Amira', 'mira.sebbah@gmail.com', '', '06 62 74 05 80', '1983-08-14', '58 boulevard moulay ismail résidence nassima étage...', 20300, 'enceinte', 1, '2017-01-01 00:00:00', '2017-04-19 14:58:22'),
(173, 'Massaki', 'Fatima Zahra', 'massaki.fatimazahra@gmail.com', '', '06 06 24 83 48', '1990-06-03', '', NULL, 'enceinte', 16, '2017-01-01 00:00:00', '2017-04-19 14:58:22'),
(174, 'Giacomoni Najdi', 'Gioia', 'gioia.giacomoni@gmail.com', '', '06 41 18 71 40', '1986-10-09', '22 rue Vimy, Belvedere', 20000, 'enceinte', 1, '2017-01-01 00:00:00', '2017-04-19 14:58:22'),
(175, 'Benzakour', 'Fatima Zahra', 'zara2293@hotmail.com', '', '06 61 26 94 01', '1981-06-09', '3rue ibnou hajjaj 2mars etg5', 20460, 'enceinte', 1, '2017-01-01 00:00:00', '2017-04-19 14:58:22'),
(176, 'Kanaan', 'Miryam', 'kanaanmiryam@hotmail.com', '', '06 60 73 85 38', '1982-01-02', '', NULL, 'maman', 16, '2016-12-30 00:00:00', '2017-04-19 14:58:22'),
(177, 'Bouanani', 'Wafaa', 'wafaabouanani@gmail.com', '', '06 61 83 35 84', '1985-05-07', '', NULL, 'maman', 16, '2016-12-29 00:00:00', '2017-04-19 14:58:22'),
(178, 'Bennouna', 'Salma', 'salma.bennouna@gmail.com', '', '21 26 64 04 31', '1986-01-13', '22 B rue turgot quartier racine', 20100, 'enceinte', 1, '2016-12-29 00:00:00', '2017-04-19 14:58:22'),
(179, 'El Idrissi', 'Fatima Zohra', 'fatima_elidrissi@hotmail.it', '', '06 62 79 48 74', '1987-10-19', 'Résidence Chella', NULL, 'maman', 1, '2016-12-29 00:00:00', '2017-04-19 14:58:22'),
(180, 'Iguerwane', 'Sanaa', 'sanaa_iguerwane@yahoo.fr', '', '06 61 24 16 30', '1985-05-14', '', NULL, 'maman', 1, '2016-12-29 00:00:00', '2017-04-19 14:58:22'),
(181, 'Benazzouz', 'Leila', 'flissileila@gmail.com', '', '06 73 40 54 07', '1990-08-08', '26 rue madrid, résidence derfoufi, rdc, appt 2', 20550, 'maman', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(182, 'Benchekroun', 'Sarah', 's.benchekroun@hotmail.con', '', '06 61 21 61 32', '1986-04-15', 'Villa 18-20 rue 34 lot laimoune 2 rte jadida', 16002, 'enceinte', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(183, 'Errihani', 'Safaa', 'safaa.errihani@gmail.com', '', '06 70 23 49 65', '1986-01-30', '5, villa torres.village espagnol.plateau', 46000, 'maman', 12, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(184, 'Kaabour', 'Imane', 'imaneka66@gmail.com', '', '06 14 00 05 58', '1987-12-07', '4 rue arago résidence du palais 5ème étage', NULL, 'maman', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(185, 'Jeddi', 'Dallal', 'jeddidallal@hotmail.com', '', '06 61 47 37 02', '1980-04-02', '22 Route d''Azemmour residence addifaa', 20200, 'maman', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(186, 'Ahsnaoui', 'Zineb', 'zineb.ahsnaoui@gmail.com', '', '06 61 96 19 31', '1990-02-05', 'Hay chrifa', NULL, 'enceinte', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(187, 'Hammou Messaoud Ep El Allali', 'Meryem', 'meryemhm4@gmail.com', '', '06 62 13 75 95', '1989-11-21', 'av mly abdellah immeuble soupradir  1', 80000, 'enceinte', 13, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(188, 'Lemseffer', 'Malak', 'malaklemseffer@hotmail.com', '', '06 67 78 72 35', '1982-03-25', '', NULL, 'maman', 16, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(189, 'Khouadri', 'Samiha', 'kh.samiha@gmail.com', '', '06 20 11 03 58', '1991-12-28', '', NULL, 'maman', 16, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(190, 'Douhari', 'Warda', 'warda.douhari@gmail.com', '', '06 61 32 07 90', '1988-12-24', '', NULL, 'maman', 16, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(191, 'Messouber', 'Rania', 'rania.messouber@gmail.com', '', '06 72 06 71 52', '1987-09-10', '', NULL, 'maman', 16, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(192, 'Ghaiti', 'Zohra', 'z.ghaiti@gmail.com', '', '06 65 72 09 55', '1990-01-22', '11 Ryad sidi moumen, groupe 7, imm 10', 20232, 'maman', 1, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(193, 'Ghaboubi', 'Khadija', 'mona889@gmail.com', '', '06 53 56 60 25', '1988-08-29', 'Groupe el arar takaddoum', 10000, 'maman', 2, '2016-12-28 00:00:00', '2017-04-19 14:58:22'),
(194, 'Kabbaj', 'Zineb', 'kabbajz@gmail.com', '', '06 44 11 11 83', '1983-11-11', '', NULL, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(195, 'Azzouzo', 'Nada', 'azzouzinada@gmail.com', '', '06 61 24 99 31', '1984-02-29', '', NULL, 'maman', 14, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(196, 'Outalmoddante', 'Asmae', 'mlle_cocochannel@hotmail.com', '', '06 61 38 55 93', '1987-07-01', '', NULL, 'enceinte', 16, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(197, 'Houdi', 'Mahassine', 'h.mahassine@yahoo.com', '', '06 14 00 02 28', '1983-07-31', '19 rue Jules cesar, résidence assaadiyine appt 10 ...', 20200, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(198, 'Zaki', 'Soukayna', 'soukaynazaki21@gmail.com', '', '06 91 04 72 47', '1987-06-21', 'Drissia1 rue 36', NULL, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(199, 'Lahlou', 'Mariam', 'mari.lahlou@gmail.com', '', '06 61 30 78 56', '1981-01-15', '245 cawagreentown', 20000, 'maman', 1, '2017-01-23 00:00:00', '2017-04-19 14:58:22'),
(200, 'Bahat', 'Wafaa', 'bahat.wafaa0@gmail.com', '', '06 75 15 05 57', '1989-01-02', 'Hay el youssoufia rue 81 n95 casablanca', 20530, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(201, 'Lyamani', 'Nezha', 'nezhalyamani@gmail.com', '', '06 61 16 29 72', '1987-07-24', '', NULL, 'enceinte', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(202, 'Elhajji', 'Najat', 'najat---elhajji@hotmail.fr', '', '06 61 49 46 51', '1986-09-15', 'Résidence nour california, immeuble 28 - étage 4 -...', 20460, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(203, 'Elgharib', 'Siham', 'siham.elgharib@gmail.com', '', '06 61 26 93 38', '1986-03-23', '9', 80000, 'maman', 13, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(204, 'Lechguar', 'Najwa', 'najwa.lechguar2016@gmail.com', '', '06 61 23 60 73', '2016-08-13', 'résidence californie garden 2 numero 23', 20000, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(205, 'Bouizi', 'Sofia', 'bouizi.sofia@gmail.com', '', '06 62 77 05 74', '1990-06-10', '', NULL, 'maman', 16, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(206, 'Belachour', 'Lamyae', 'l.belachour@gmail.com', '', '06 71 41 48 72', '1984-06-18', '13 résidence les écoles', NULL, 'enceinte', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(207, 'Taouri', 'Salma', 'staouri@gmail.com', '', '06 64 89 05 89', '1984-11-08', '2, rue loubnane, immeuble oum rabii, app 11', 10000, 'enceinte', 2, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(208, 'Reyadh Jalil', 'Nermine', 'riadnermine@gmail.com', '', '06 60 29 15 43', '1993-09-09', 'Résidence Dan Hel bâtiment B 1er étage appartement...', 20000, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(209, 'Soussai', 'Lamiaa', 'lami_lamiaa@hotmail.com', '', '06 23 09 71 49', '1989-02-11', '1 bd moulay ismail impasse oncf', NULL, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(210, 'Amnay', 'Majda', 'ma.amnay@gmail.com', '', '06 53 16 16 31', '1989-05-10', '12 résidence soukaina A, rue mbarek bakkay kebibat...', NULL, 'maman', 2, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(211, 'Ouazri', 'Ouiam', 'ouiam.ouazri@gmail.com', '', '06 67 77 87 80', '1991-05-18', '', 26100, 'enceinte', 15, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(212, 'Kaldy', 'Ilham', 'ilhamkaldy@gmail.com', '', '06 15 69 70 09', '1990-11-20', '40, lotissement bachkou étage 2 numéro 9', 20500, 'maman', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(213, 'Rifkoune', 'Hasnaa', 'hasnaa.rifkoune@gmail.com', '', '06 62 89 40 12', '1987-04-06', '', NULL, 'enceinte', 16, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(214, 'El Hakimi', 'Raouia', 'rawia7@gmail.com', '', '06 73 74 61 66', '1986-10-27', '25 Al moulko lillah imm c 5eme etg apt', 20100, 'enceinte', 1, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(215, 'Maache', 'Sarah', 'm.sarah02@live.fr', '', '06 60 35 73 29', '1991-09-25', '', NULL, 'enceinte', 16, '2016-12-27 00:00:00', '2017-04-19 14:58:22'),
(216, 'essalhi', 'khalid', 'khalid.essalhi8@gmail.com', '123', '0656011827', '1992-10-11', 'hay sadri', 20650, 'enceinte', 1, '2017-04-19 16:24:47', '2017-04-19 16:24:47');

-- --------------------------------------------------------

--
-- Structure de la table `leads`
--

CREATE TABLE IF NOT EXISTS `leads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `EMAIL` varchar(60) NOT NULL,
  `NOM` varchar(50) NOT NULL,
  `PRENOM` varchar(50) NOT NULL,
  `GSM` varchar(20) NOT NULL,
  `DATE_NAISSANCE` date NOT NULL,
  `ADRESSE` varchar(150) NOT NULL,
  `VILLE` varchar(50) NOT NULL,
  `CP` char(5) NOT NULL,
  `TYPE` varchar(10) NOT NULL,
  `NAISSANCE_BEBE` date NOT NULL,
  `MATERNITE` varchar(50) NOT NULL,
  `GYNECO` varchar(50) NOT NULL,
  `PRENOM_BEBE` varchar(50) NOT NULL,
  `SEXE_BEBE` varchar(1) NOT NULL,
  `REF_BOX1` varchar(15) NOT NULL,
  `REF_BOX2` varchar(15) NOT NULL,
  `REF_BOX3` varchar(15) NOT NULL,
  `NAISSANCE_ENFANT` date NOT NULL,
  `PRENOM_ENFANT` varchar(50) NOT NULL,
  `SEXE_ENFANT` varchar(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EMAIL` (`EMAIL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateLivraison` varchar(45) DEFAULT NULL,
  `adresseLivraison` varchar(100) DEFAULT NULL,
  `shop_id` int(50) NOT NULL,
  `Ville_id` int(11) NOT NULL,
  `commande_id` int(50) NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_Livraison_shop1_idx` (`shop_id`),
  KEY `fk_Livraison_Ville1_idx` (`Ville_id`),
  KEY `fk_Livraison_commande1_idx` (`commande_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Ville_id` int(11) NOT NULL,
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_shop_Ville1_idx` (`Ville_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id`, `name`) VALUES
(1, 'Casablanca'),
(2, 'Rabat'),
(3, 'Larache'),
(4, 'Mohammdia'),
(5, 'Nouaceur'),
(6, 'El Jadida'),
(7, 'Harhoura'),
(8, 'Tanger'),
(9, 'Fes'),
(10, 'Ain Harrouda'),
(11, 'Bouskoura'),
(12, 'sSfi'),
(13, 'Agadir'),
(14, 'Temara'),
(15, 'Berrechid'),
(16, 'default');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `baby`
--
ALTER TABLE `baby`
  ADD CONSTRAINT `fk_baby_client` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_commande_box` FOREIGN KEY (`box_id`) REFERENCES `box` (`id`),
  ADD CONSTRAINT `fk_order_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Contraintes pour la table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_Ville1` FOREIGN KEY (`Ville_id`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `fk_Livraison_Ville1` FOREIGN KEY (`Ville_id`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Livraison_commande1` FOREIGN KEY (`commande_id`) REFERENCES `commande` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Livraison_shop1` FOREIGN KEY (`shop_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `shop`
--
ALTER TABLE `shop`
  ADD CONSTRAINT `fk_shop_Ville1` FOREIGN KEY (`Ville_id`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
