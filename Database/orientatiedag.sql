-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Genereertijd: 06 sep 2013 om 12:04
-- Serverversie: 5.5.32
-- PHP-versie: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `orientatiedag`
--
CREATE DATABASE IF NOT EXISTS `orientatiedag` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `orientatiedag`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `accounttype` int(1) NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `decanen`
--

CREATE TABLE IF NOT EXISTS `decanen` (
  `decaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(25) DEFAULT NULL,
  `tussenvoegsel` varchar(12) DEFAULT NULL,
  `achternaam` varchar(25) DEFAULT NULL,
  `postcode_cijf` int(4) DEFAULT NULL,
  `postcode_let` varchar(2) DEFAULT NULL,
  `stad_dorp` varchar(25) DEFAULT NULL,
  `straatnaam` varchar(25) DEFAULT NULL,
  `straatnummer` int(5) DEFAULT NULL,
  `straattoev` int(5) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefoon` int(15) DEFAULT NULL,
  PRIMARY KEY (`decaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leerling`
--

CREATE TABLE IF NOT EXISTS `leerling` (
  `leerling_id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(25) DEFAULT NULL,
  `tussenvoegsel` varchar(12) DEFAULT NULL,
  `achternaam` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefoon` int(15) DEFAULT NULL,
  `opleidingnaam` varchar(40) DEFAULT NULL,
  `decaan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`leerling_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `opleiding`
--

CREATE TABLE IF NOT EXISTS `opleiding` (
  `opleiding_id` int(11) NOT NULL AUTO_INCREMENT,
  `opleidingnaam` varchar(40) DEFAULT NULL,
  `opleidingcode` varchar(15) DEFAULT NULL,
  `locatie` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`opleiding_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
