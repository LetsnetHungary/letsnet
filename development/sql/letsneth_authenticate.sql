-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jún 15. 11:57
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `letsneth_authenticate`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admingroups`
--

CREATE TABLE IF NOT EXISTS `admingroups` (
  `id` int(255) NOT NULL,
  `fr` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `adminkey` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `adminname` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admingroups`
--

INSERT INTO `admingroups` (`id`, `fr`, `adminkey`, `adminname`) VALUES
(1, '---', '3bd2-07a1-8d6d-87c9', 'Superadmin'),
(2, '3bd2-07a1-8d6d-87c9', '74b6-c8b0-b669-9d3e', 'Aladmin'),
(3, '74b6-c8b0-b669-9d3e', 'asdfbljhasbdfjbasdhflj', 'Aladmin2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `id` int(255) NOT NULL,
  `devicekey` varchar(400) NOT NULL,
  `uniquekey` varchar(400) NOT NULL,
  `devicename` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `devices`
--

INSERT INTO `devices` (`id`, `devicekey`, `uniquekey`, `devicename`) VALUES
(1, '52e4ceec7c8f3ce37fa7cb898d52b501', 'l885fg643d', 'Macbook');

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
-- Tábla szerkezet ehhez a táblához `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(255) NOT NULL,
  `admingroup` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `module` varchar(400) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modules`
--

INSERT INTO `modules` (`id`, `admingroup`, `module`) VALUES
(1, '3bd2-07a1-8d6d-87c9', 'Index'),
(3, '3bd2-07a1-8d6d-87c9', 'Users'),
(4, '3bd2-07a1-8d6d-87c9', '1e6f-2051-ae42-2763'),
(5, '3bd2-07a1-8d6d-87c9', '1e6f-2051-ae42-27b9'),
(6, '3bd2-07a1-8d6d-87c9', 'ujfrontend');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modulesstore`
--

CREATE TABLE IF NOT EXISTS `modulesstore` (
  `id` int(255) NOT NULL,
  `modulename` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `module` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `fr` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `redirect` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modulesstore`
--

INSERT INTO `modulesstore` (`id`, `modulename`, `module`, `fr`, `type`, `redirect`, `icon`) VALUES
(1, 'Főoldal', 'Index', '---', 'page', '/Index', 'glyph-icon icon-linecons-tv'),
(2, 'Táblázatok', '1e6f-2051-ae42-27b9', 'Index', 'pagemodule', '---', '---'),
(3, 'Felhasználók', 'Users', '---', 'page', '/Users', 'glyph-icon icon-group'),
(4, 'Kísérletek', '1e6f-2051-ae42-2763', 'Index', 'pagemodule', '---', '---'),
(6, 'Fő / első header', 'mainHeader', 'page', 'everypage', '---', '---'),
(7, 'Oldalsáv / Page Modulok', 'mainSidebar', 'page', 'everypage', '---', '---'),
(9, 'valami fancy frontend kéne', 'ujfrontend', 'Users', 'pagemodule', '---', '---');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(4000) NOT NULL,
  `uniquekey` varchar(20) NOT NULL,
  `admingroup` varchar(400) NOT NULL,
  `fingerprint` varchar(5) NOT NULL,
  `sitekey` varchar(400) NOT NULL,
  `database` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `uniquekey`, `admingroup`, `fingerprint`, `sitekey`, `database`) VALUES
(1, 'letsnet@letsnet.hu', '$2y$10$YHRwubgT8bshxCbh.MdPuOHIADZOwyCS8unRJCjxn6LrIhhsuBUom', 'l885fg643d', '3bd2-07a1-8d6d-87c9', 'off', 'letsnet', 'letsnet');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `visits`
--

CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(255) NOT NULL,
  `uniquekey` varchar(100) NOT NULL,
  `conntime` int(40) NOT NULL,
  `connday` varchar(40) NOT NULL,
  `url` varchar(100) NOT NULL,
  `useragent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `wrong_try`
--

CREATE TABLE IF NOT EXISTS `wrong_try` (
  `id` int(11) NOT NULL,
  `email` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `devicekey` varchar(4000) COLLATE utf8_hungarian_ci NOT NULL,
  `POST` varchar(10000) COLLATE utf8_hungarian_ci NOT NULL,
  `time` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admingroups`
--
ALTER TABLE `admingroups`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `logged_users`
--
ALTER TABLE `logged_users`
  ADD PRIMARY KEY (`devicekey`);

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
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniquekey` (`email`);

--
-- A tábla indexei `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `wrong_try`
--
ALTER TABLE `wrong_try`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admingroups`
--
ALTER TABLE `admingroups`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT a táblához `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `modulesstore`
--
ALTER TABLE `modulesstore`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `wrong_try`
--
ALTER TABLE `wrong_try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
