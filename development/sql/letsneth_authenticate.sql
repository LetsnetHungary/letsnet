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
-- Adatbázis: `letsneth_authenticate`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `devices`
--

INSERT INTO `devices` (`id`, `devicekey`, `uniquekey`, `devicename`) VALUES
(1, 'ALL', '2ur7tjmi4a', 'ALL'),
(2, 'ALL', 'l885fg643d', 'ALL');

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
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(4000) NOT NULL,
  `uniquekey` varchar(20) NOT NULL,
  `adminkey` varchar(400) NOT NULL,
  `allow` varchar(40) NOT NULL,
  `sitekey` varchar(400) NOT NULL,
  `database` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `uniquekey`, `adminkey`, `allow`, `sitekey`, `database`) VALUES
(1, 'letsnet@letsnet.hu', '$2y$10$YHRwubgT8bshxCbh.MdPuOHIADZOwyCS8unRJCjxn6LrIhhsuBUom', 'l885fg643d', 'jhvs7h6269lsh3nx3hags2', 'admin', 'letsnet', 'letsnet'),
(2, 'graphed@letsnet.hu', '$2y$14$JH2tndV9xRwYgZB2YQ2Qy.K0eMCXYrVw/G1hP5Jlo.rUke.EtPaF2', '2ur7tjmi4a', 'vu8da1z3l4kcefsx7tq90wi5bjnmhp', 'admin', 'graphed', 'a.graphed');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `wrong_try`
--

INSERT INTO `wrong_try` (`id`, `email`, `devicekey`, `POST`, `time`, `date`) VALUES
(1, 'graphed@letsnet.hu', 'bef2571c09f4de7b02e1245b6542fded', '{"l":"true","d":{"ema":"graphed@letsnet.hu","passw":"password","dk":"bef2571c09f4de7b02e1245b6542fded","lalo":"0"}}', '1496940222', '2017-06-08 18:43:42'),
(2, 'graphed@letsnet.hu', 'bef2571c09f4de7b02e1245b6542fded', '{"l":"true","d":{"ema":"graphed@letsnet.hu","passw":"password","dk":"bef2571c09f4de7b02e1245b6542fded","lalo":"0"}}', '1496940230', '2017-06-08 18:43:50');

--
-- Indexek a kiírt táblákhoz
--

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
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniquekey` (`email`);

--
-- A tábla indexei `wrong_try`
--
ALTER TABLE `wrong_try`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `wrong_try`
--
ALTER TABLE `wrong_try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
