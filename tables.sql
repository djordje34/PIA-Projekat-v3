-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 14, 2022 at 05:38 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_table`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `da`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `da`;
CREATE TABLE IF NOT EXISTS `da` (
`username` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`choice` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `komentari`
--

DROP TABLE IF EXISTS `komentari`;
CREATE TABLE IF NOT EXISTS `komentari` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `komentar` text COLLATE utf8mb4_unicode_ci,
  `imeKompanije` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocena` int(10) DEFAULT NULL,
  `korisnik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komentari`
--

INSERT INTO `komentari` (`id`, `komentar`, `imeKompanije`, `ocena`, `korisnik`) VALUES
(23, 'cestitke', 'Comtrade doo', 5, 'radnik'),
(20, 'pet', 'Comtrade doo', 5, 'radnik'),
(21, 'Odlicna kompanija. Sve pohvale.', 'Comtrade doo', 4, 'radnik'),
(22, 'cestitke', 'Comtrade doo', 5, 'radnik'),
(19, 'dva', 'Comtrade doo', 2, 'radnik'),
(16, 'Djordje', 'Comtrade doo', 4, 'radnik'),
(17, 'Aha', 'Comtrade doo', 1, 'radnik'),
(18, 'NESTO', 'Comtrade doo', 3, 'radnik');

-- --------------------------------------------------------

--
-- Table structure for table `ocene`
--

DROP TABLE IF EXISTS `ocene`;
CREATE TABLE IF NOT EXISTS `ocene` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocena` int(255) DEFAULT NULL,
  `brojOcena` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ocene`
--

INSERT INTO `ocene` (`id`, `ime`, `ocena`, `brojOcena`) VALUES
(1, 'Nordeus', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
CREATE TABLE IF NOT EXISTS `oglas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `firma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokacija` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sprema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rok` date NOT NULL,
  `struka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontakt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izdavac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oglas`
--

INSERT INTO `oglas` (`id`, `firma`, `lokacija`, `opis`, `sprema`, `rok`, `struka`, `kontakt`, `izdavac`) VALUES
(22, 'Comtrade doo', 'Kragujevac', 'QA Inzenjer', 'Osnovne studije', '2022-01-01', 'Softverski inženjering', '38169-500-1525', NULL),
(23, 'NORDEUS doo', 'Beograd', 'Dizajner neophodan ', 'Osnovne studije', '2022-01-01', 'Elektrotehnički inženjering', '+381-69-500-1525', NULL),
(24, 'Neka firma', 'Kragujevac', 'Neki posao', 'Viša škola', '2022-01-01', 'Mašinski inženjering', '+381-69-500-1525', NULL),
(25, 'Comtrade doo', 'Kragujevac', 'Razvoj softvera za avio-kompanije', 'Osnovne studije', '2022-04-29', 'Računarski inženjering', '+381-69-500-1525', NULL),
(26, 'Comtrade doo', 'Kragujevac', 'Halo dobar dan ovde Djordje Karisic ja sam Djordje Karisic', 'Osnovna Å¡kola', '2022-04-06', 'Računarski inženjering', '+381-69-500-1525', 'djordje'),
(27, 'Comtrade doo', 'Kragujevac', 'Traï¿½i se QA inï¿½enjer za rad na projektu u Javi i C++. Dodatne informacija moï¿½ete dobiti kontaktiranjem na broj ispod.', 'Osnovne studije', '2022-11-07', 'Računarski inženjering', '+381-69-500-1525', 'djordje'),
(30, 'Nordeus ', 'Jagodina', 'Ovo je posao u Jagodini dobar dan', 'Osnovne studije', '2022-08-17', 'Ra?unarski inženjering', '+381-69-500-1525', 'djordje'),
(31, 'Nordeus ', 'Å½orÅ¾e', 'aaaa', 'Doktorske studije', '2022-01-01', 'Ra?unarski inženjering', '+381-69-500-1525', 'djordje'),
(32, 'Nordeus ', 'Beograd Beograd', 'Beograd Beograd', 'Osnovna Å¡kola', '2022-01-01', 'Ra?unarski inženjering', '+381-69-500-1525', 'djordje');

-- --------------------------------------------------------

--
-- Table structure for table `poslodavac`
--

DROP TABLE IF EXISTS `poslodavac`;
CREATE TABLE IF NOT EXISTS `poslodavac` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `naziv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontakt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `struka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poslodavac`
--

INSERT INTO `poslodavac` (`id`, `username`, `email`, `password`, `naziv`, `kontakt`, `struka`) VALUES
(2, 'djordje', 'djordje00karisic@gmail.com', '7557c7e74887f9c232d63522d813a452', 'Nordeus', '+381-69-500-1525', 'MaÅ¡inski inÅ¾enjering'),
(3, 'a', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 'NORDEUS doo', '+381-69-500-1525', 'Softverski inženjering');

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

DROP TABLE IF EXISTS `prijava`;
CREATE TABLE IF NOT EXISTS `prijava` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `posaoId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prijavaId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radnik`
--

DROP TABLE IF EXISTS `radnik`;
CREATE TABLE IF NOT EXISTS `radnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obrazovanje` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `polozaj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iskustvo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `informacije` text COLLATE utf8mb4_unicode_ci,
  `kontaktRadnika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `radnik`
--

INSERT INTO `radnik` (`id`, `username`, `email`, `password`, `ime`, `obrazovanje`, `polozaj`, `iskustvo`, `informacije`, `kontaktRadnika`) VALUES
(3, 'olg', 'olg@gmail.com', '202cb962ac59075b964b07152d234b70', 'Olga Simunovic', 'Master akademske studije', 'Hemijski inženjering', NULL, 'dobar dan!', '+381-63-633-7399'),
(4, 'radnik', 'radnik@gmail.com', '202cb962ac59075b964b07152d234b70', 'Radnik Radnicevic', 'Osnovna Å¡kola', 'MaÅ¡inski inÅ¾enjering', '13', 'Ja sam aeronauticki inzenjer, sa iskustvom od dve godine u NASI. Bavim se projektovanjem aero-transportnih vozila. Volim League of Legends.', '+381-66-666-6666'),
(5, 'rad', '12333@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'robert III robinton rob', 'rob@gm.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'olga', 'olga@olga.olga', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `choice` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `choice`) VALUES
(9, 'djordje', 'djordje00karisic@gmail.com', '7557c7e74887f9c232d63522d813a452', 'employer'),
(10, 'olg', 'olg@gmail.com', '202cb962ac59075b964b07152d234b70', 'employee'),
(11, 'a', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 'employer'),
(12, 'radnik', 'radnik@gmail.com', '202cb962ac59075b964b07152d234b70', 'employee'),
(13, 'rad', '12333@gmail.com', '202cb962ac59075b964b07152d234b70', 'employee'),
(14, 'robert III robinton rob', 'rob@gm.com', '202cb962ac59075b964b07152d234b70', 'employee'),
(15, 'olga', 'olga@olga.olga', '202cb962ac59075b964b07152d234b70', 'employee');

-- --------------------------------------------------------

--
-- Structure for view `da`
--
DROP TABLE IF EXISTS `da`;

DROP VIEW IF EXISTS `da`;
CREATE ALGORITHM=UNDEFINED DEFINER=`djordje`@`localhost` SQL SECURITY DEFINER VIEW `da`  AS  select `users`.`username` AS `username`,`users`.`email` AS `email`,`users`.`password` AS `password`,`users`.`choice` AS `choice` from `users` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
