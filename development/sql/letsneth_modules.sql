-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jún 08. 16:45
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `letsneth_modules`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `apis`
--

CREATE TABLE IF NOT EXISTS `apis` (
  `id` int(255) NOT NULL,
  `uniquekey` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `api` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `function` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `apis`
--

INSERT INTO `apis` (`id`, `uniquekey`, `api`, `function`) VALUES
(1, 'l885fg643d', 'usersapi', 'newuser'),
(2, 'l885fg643d', 'usersapi', 'newDatabase'),
(3, 'l885fg643d', 'usersapi', 'newSite'),
(4, 'l885fg643d', 'usersapi', 'newDevicekey');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(255) NOT NULL,
  `viewid` varchar(40) NOT NULL,
  `sitekey` varchar(255) NOT NULL,
  `uniquekey` varchar(400) NOT NULL,
  `name` varchar(400) NOT NULL,
  `redirect` varchar(400) NOT NULL,
  `icon` varchar(400) NOT NULL,
  `lmodule` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `modules`
--

INSERT INTO `modules` (`id`, `viewid`, `sitekey`, `uniquekey`, `name`, `redirect`, `icon`, `lmodule`) VALUES
(1, 'Index', 'letsnet', 'l885fg643d', 'Főoldal', '/Index', 'glyph-icon icon-bank', '---'),
(2, 'Users', 'letsnet', 'l885fg643d', 'Felhasználók kezelése', '/Users', 'glyph-icon icon-group', '---'),
(10, 'Products', 'graphed', '2ur7tjmi4a', 'Termékkezelő', '/Products', 'glyph-icon icon-th', '---'),
(11, 'Sells', 'graphed', '2ur7tjmi4a', 'Eladások', '/Sells', 'glyph-icon icon-bar-chart', '---'),
(12, 'Orders', 'graphed', '2ur7tjmi4a', 'Rendelések', '/Orders', 'glyph-icon icon-book', '---'),
(13, 'Commission', 'graphed', '2ur7tjmi4a', 'Bizományi rendszer', '/Commission', 'glyph-icon icon-calendar', '---');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modulesstore`
--

CREATE TABLE IF NOT EXISTS `modulesstore` (
  `id` int(255) NOT NULL,
  `viewid` varchar(40) NOT NULL,
  `name` varchar(400) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `redirect` varchar(400) NOT NULL,
  `lmodule` varchar(400) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `icon` varchar(400) NOT NULL,
  `allow` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `modulesstore`
--

INSERT INTO `modulesstore` (`id`, `viewid`, `name`, `redirect`, `lmodule`, `icon`, `allow`) VALUES
(1, 'Users', 'Felhasználók', '/Users', '---', 'glyph-icon icon-group', 'admin'),
(2, 'Index', 'Főoldal', '/Index', '---', 'glyph-icon icon-bank', 'all'),
(3, 'Commission', 'Bizományi rendszer', '/Commission', '---', 'glyph-icon icon-calculator', 'admin'),
(4, 'CMS', 'CMS', '/CMS', '---', 'glyph-icon icon-gears', 'admin'),
(5, 'Sells', 'Eladások', '/Sells', '---', 'glyph-icon icon-cc-visa', 'admin'),
(6, 'Orders', 'Rendelések', '/Orders', '---', 'glyph-icon icon-line-chart', 'admin'),
(7, 'Products', 'Termékkezelő', '/Products', '---', 'glyph-icon icon-th', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pagemodules`
--

CREATE TABLE IF NOT EXISTS `pagemodules` (
  `id` int(255) NOT NULL,
  `uniquekey` varchar(400) NOT NULL,
  `viewid` varchar(40) NOT NULL,
  `module` varchar(400) NOT NULL,
  `little` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `pagemodules`
--

INSERT INTO `pagemodules` (`id`, `uniquekey`, `viewid`, `module`, `little`) VALUES
(1, 'l885fg643d', 'Users', 'newuser', '---'),
(2, 'l885fg643d', 'Users', 'newdatabase', '---'),
(3, 'l885fg643d', 'Index', 'usermodules', '---'),
(4, 'l885fg643d', 'Users', 'newsite', '---'),
(6, '2ur7tjmi4a', 'Orders', 'mainorders', '---'),
(7, '2ur7tjmi4a', 'Sells', 'mainsells', '---'),
(8, '2ur7tjmi4a', 'Commission', 'maincommission', '---');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `apis`
--
ALTER TABLE `apis`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `modulesstore`
--
ALTER TABLE `modulesstore`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pagemodules`
--
ALTER TABLE `pagemodules`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `apis`
--
ALTER TABLE `apis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT a táblához `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT a táblához `modulesstore`
--
ALTER TABLE `modulesstore`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT a táblához `pagemodules`
--
ALTER TABLE `pagemodules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
