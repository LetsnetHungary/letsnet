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
-- Adatbázis: `letsneth_data`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `databasekeys`
--

CREATE TABLE IF NOT EXISTS `databasekeys` (
  `id` int(255) NOT NULL,
  `databasename` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `databasekey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `databasekeys`
--

INSERT INTO `databasekeys` (`id`, `databasename`, `databasekey`) VALUES
(1, 'Letsnet', 'letsnet'),
(2, 'Graphed Webshop adatbázis', 'graphed');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sitekeys`
--

CREATE TABLE IF NOT EXISTS `sitekeys` (
  `id` int(255) NOT NULL,
  `sitename` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `sitekey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `sitekeys`
--

INSERT INTO `sitekeys` (`id`, `sitename`, `sitekey`) VALUES
(1, 'Letsnet', 'letsnet'),
(2, 'Graphed Webshop', 'graphed');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `userData`
--

CREATE TABLE IF NOT EXISTS `userData` (
  `uniquekey` varchar(255) NOT NULL,
  `shopname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `birth` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `startpage` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `userData`
--

INSERT INTO `userData` (`uniquekey`, `shopname`, `firstname`, `lastname`, `birth`, `status`, `startpage`) VALUES
('2ur7tjmi4a', 'letsnet', 'Webshop', 'Graphed', '2017.03.15', 'Tulajdonos', 'Index'),
('l885fg643d', 'letsnet', 'Letsnet', 'Letsnet', '2017.05.21', 'Tulajdonos', 'Index');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `databasekeys`
--
ALTER TABLE `databasekeys`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `sitekeys`
--
ALTER TABLE `sitekeys`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`uniquekey`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `databasekeys`
--
ALTER TABLE `databasekeys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `sitekeys`
--
ALTER TABLE `sitekeys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
