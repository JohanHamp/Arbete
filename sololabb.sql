-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1:3306
-- Tid vid skapande: 14 jun 2018 kl 00:34
-- Serverversion: 5.7.19
-- PHP-version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `sololabb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `PkMessageId` int(11) NOT NULL AUTO_INCREMENT,
  `Message` varchar(500) NOT NULL,
  `FkSenderId` varchar(255) NOT NULL,
  PRIMARY KEY (`PkMessageId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `messages`
--

INSERT INTO `messages` (`PkMessageId`, `Message`, `FkSenderId`) VALUES
(40, 'gfdsa', 'test2@hotmail.com'),
(41, 'Skriv ditt meddelande!', 'test2@hotmail.com'),
(39, 'asdffdas', 'test2@hotmail.com'),
(38, 'awsedfasdfewa', 'test2@hotmail.com'),
(37, 'FDSA ', 'test2@hotmail.com'),
(36, ' FDSA FDSAF', 'test2@hotmail.com'),
(30, 'testar', 'test2@hotmail.com'),
(31, 'testar igen', 'test2@hotmail.com'),
(32, 'TESTAR 123', 'test2@hotmail.com'),
(33, 'FASDFDSA', 'test2@hotmail.com'),
(34, 'DSA FDS AF ', 'test2@hotmail.com'),
(35, 'FDSA F', 'test2@hotmail.com'),
(42, 'Skriv ditt meddelande!', 'test2@hotmail.com'),
(43, 'asdf', 'test2@hotmail.com'),
(44, 'Skriv ditt meddelande!', 'test2@hotmail.com'),
(45, 'hej!!', 'test2@hotmail.com');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `salt` varchar(10) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`UserId`, `Email`, `Password`, `salt`) VALUES
(7, 'test@hotmail.com', 'b94d61146ae10dd63a978bf0ca515c92', 'oCdF49I89t'),
(8, 'test2@hotmail.com', '298ab4ea1bc011c4d751f13c62f7666f', 'IM45tzrpZT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
