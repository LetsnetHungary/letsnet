-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 31. 21:29
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `mvc`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(255) NOT NULL,
  `devicekey` varchar(400) NOT NULL,
  `uniquekey` varchar(400) NOT NULL,
  `devicename` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `devices`
--

INSERT INTO `devices` (`id`, `devicekey`, `uniquekey`, `devicename`) VALUES
(1, 'ALL', 'l885fg643d', 'ALL'),
(4, 'ALL', 'pguve4x3lf', 'ALL'),
(5, 'ALL', 'o1egyjhui3', 'ALL');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `littlemodules`
--

CREATE TABLE IF NOT EXISTS `littlemodules` (
  `id` int(255) NOT NULL,
  `uniquekey` varchar(400) NOT NULL,
  `view` varchar(40) NOT NULL,
  `module` varchar(400) NOT NULL,
  `little` varchar(400) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `littlemodules`
--

INSERT INTO `littlemodules` (`id`, `uniquekey`, `view`, `module`, `little`, `type`) VALUES
(1, 'Admin', 'Index', 'viewers', '---', 'pagesection'),
(2, 'ALL', 'Index', 'serverstatus', '---', 'pagesection');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `logged_users`
--

CREATE TABLE IF NOT EXISTS `logged_users` (
  `devicekey` varchar(255) NOT NULL,
  `uniquekey` varchar(10) NOT NULL,
  `time` varchar(80) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `useragent` varchar(100) NOT NULL,
  `lalo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modulesstore`
--

CREATE TABLE IF NOT EXISTS `modulesstore` (
  `id` int(255) NOT NULL,
  `name` varchar(400) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `redirect` varchar(400) NOT NULL,
  `lmodule` varchar(400) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `icon` varchar(400) NOT NULL,
  `allow` varchar(400) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `modulesstore`
--

INSERT INTO `modulesstore` (`id`, `name`, `redirect`, `lmodule`, `icon`, `allow`) VALUES
(1, 'Felhasználók', '/Users', '---', '', 'admin'),
(2, 'Főoldal', '/Index', '---', 'glyph-icon icon-bank', 'all'),
(3, 'Bizományi rendszer', '/Commission', '---', 'glyph-icon icon-calculator', 'admin'),
(4, 'CMS', '/CMS', '{"Főoldal" : "/CMS/ViewPage/Index", "Shop" : "/CMS/Viewpage/Shop"}', 'glyph-icon icon-gears', 'admin'),
(5, 'Eladások', '/Sells', '---', 'glyph-icon icon-cc-visa', 'admin'),
(6, 'Rendelések', '/Orders', '---', 'glyph-icon icon-line-chart', 'admin');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(255) NOT NULL,
  `sitekey` varchar(255) NOT NULL,
  `adminkey` varchar(400) NOT NULL,
  `allow` varchar(40) NOT NULL,
  `name` varchar(400) NOT NULL,
  `redirect` varchar(400) NOT NULL,
  `icon` varchar(400) NOT NULL,
  `lmodule` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `pages`
--

INSERT INTO `pages` (`id`, `sitekey`, `adminkey`, `allow`, `name`, `redirect`, `icon`, `lmodule`) VALUES
(1, 'letsnet', 'jhvs7h6269lsh3nx3hags2', 'admin', 'Felhasználók', '/Users', '', '---'),
(2, 'rastaclat', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'Főoldal', '/Index', 'glyph-icon icon-bank', '---'),
(3, 'rastaclat', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'Bizományi rendszer', '/Commission', 'glyph-icon icon-calculator', '---'),
(4, 'rastaclat', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'CMS', '/CMS', 'glyph-icon icon-gears', '{"Főoldal" : "/CMS/ViewPage/Index", "Shop" : "/CMS/Viewpage/Shop"}'),
(5, 'rastaclat', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'Eladások', '/Sells', 'glyph-icon icon-cc-visa', '---'),
(6, 'rastaclat', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'Rendelések', '/Orders', 'glyph-icon icon-line-chart', '---'),
(7, 'letspack', '1xn74ziwoas5dk6u30jmpqflt8bv9e', 'Admin', 'CMS', '/CMS', 'glyph-icon icon-gears', '{ "Index" : "/CMS/Viewpage/Index"}');

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
('l885fg643d', 'Letsnet', 'Ákos', 'Hegel', '1998.06.23', 'Tulajdonos', 'Users'),
('o1egyjhui3', 'letsnet', 'Letspack', 'Letsnet', '2017.03.22', 'Tulajdonos', 'Index'),
('pguve4x3lf', 'rastaclat', 'Rastaclat', 'Letsnet', '2017.03.13', 'Tulajdonos', 'Index');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(400) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `uniquekey` varchar(10) NOT NULL,
  `adminkey` varchar(400) NOT NULL,
  `allow` varchar(40) NOT NULL,
  `sitekey` varchar(400) NOT NULL,
  `webshopdb` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`, `uniquekey`, `adminkey`, `allow`, `sitekey`, `webshopdb`) VALUES
(1, 'akos@letsnet.hu', '$2y$10$YHRwubgT8bshxCbh.MdPuOHIADZOwyCS8unRJCjxn6LrIhhsuBUom', 'Ákos', 'Hegel', 'l885fg643d', 'jhvs7h6269lsh3nx3hags2', 'Admin', 'letsnet', 'letsnet'),
(5, 'rastaclat@letsnet.hu', '$2y$12$0Zv1R5UxRc6NLLIBPIOYbO7nhHCIfIorhT4w/ihA65ca18hE2P5p2', 'Rastaclat', 'Letsnet', 'pguve4x3lf', 'uiqpdwzr1s4n6lyhvxbc35mt7oj02a', 'Admin', 'rastaclat', 'rastaclat'),
(6, 'letspack@letsnet.hu', '$2y$12$ZBr.K6t4002CX1qdcI22NupqyhJ4/YEwMum5YxgGaZ6IhJ799IoOy', 'Letspack', 'Letsnet', 'o1egyjhui3', '1xn74ziwoas5dk6u30jmpqflt8bv9e', 'Admin', 'letspack', 'letspack');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `littlemodules`
--
ALTER TABLE `littlemodules`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `logged_users`
--
ALTER TABLE `logged_users`
  ADD PRIMARY KEY (`devicekey`);

--
-- A tábla indexei `modulesstore`
--
ALTER TABLE `modulesstore`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `userData`
--
ALTER TABLE `userData`
  ADD PRIMARY KEY (`uniquekey`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniquekey` (`email`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT a táblához `littlemodules`
--
ALTER TABLE `littlemodules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `modulesstore`
--
ALTER TABLE `modulesstore`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
