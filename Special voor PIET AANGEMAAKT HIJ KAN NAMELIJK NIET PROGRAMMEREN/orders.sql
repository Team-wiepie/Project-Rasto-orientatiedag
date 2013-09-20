-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 20 sep 2013 om 11:49
-- Serverversie: 5.5.25a
-- PHP-versie: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `orders`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customersid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `ordernummer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `streetnr` int(11) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `telhome` varchar(255) NOT NULL,
  PRIMARY KEY (`customersid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `DeliveryID` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_time` datetime NOT NULL,
  `order_state_index` int(11) NOT NULL,
  `remoteaddress` int(11) NOT NULL,
  `time` time NOT NULL,
  `deliveryactive` int(11) NOT NULL,
  `deliveryaddress` int(11) NOT NULL,
  `deliveryaddress_subtype` int(11) NOT NULL,
  PRIMARY KEY (`DeliveryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `delivery`
--

INSERT INTO `delivery` (`DeliveryID`, `date`, `date_time`, `order_state_index`, `remoteaddress`, `time`, `deliveryactive`, `deliveryaddress`, `deliveryaddress_subtype`) VALUES
(1, '2013-09-02', '2013-09-02 00:00:00', 12, 12, '00:00:00', 11, 11, 11);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `OrderID` int(11) NOT NULL,
  `emailvendor` varchar(255) NOT NULL,
  `emailvendor_reply` varchar(255) NOT NULL,
  `extendedVAT` varchar(255) NOT NULL,
  `order_shopnumber` varchar(255) NOT NULL,
  `shopnumber` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `amount-inc-vat` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `amountvalue` int(255) NOT NULL,
  `percentage` int(255) NOT NULL,
  `subtotal` int(255) NOT NULL,
  `subtotalvalue` int(255) NOT NULL,
  `articleID` int(255) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `orders`
--

INSERT INTO `orders` (`OrderID`, `emailvendor`, `emailvendor_reply`, `extendedVAT`, `order_shopnumber`, `shopnumber`, `active`, `amount-inc-vat`, `amount`, `amountvalue`, `percentage`, `subtotal`, `subtotalvalue`, `articleID`, `CustomerID`) VALUES
(0, 'jack', 'jack', '123', '2134', '2134', '3142', '324342', 342, 342, 12312, 12213, 213312, 1, 1),
(1, 'sadf', 'sadf', 'fads', 'fds', '2020o2w0', 'asd', 'asd', 10100101, 10010010, 213, 123, 213, 213, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
