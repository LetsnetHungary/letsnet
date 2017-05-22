-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 28. 21:54
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `rastaclat_Visitors`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `banned`
--

CREATE TABLE IF NOT EXISTS `banned` (
  `id` int(255) NOT NULL,
  `ip` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `lastattempt` int(40) NOT NULL,
  `attempts` int(3) NOT NULL,
  `banned` int(2) NOT NULL,
  `bannedtime` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bannedusers`
--

CREATE TABLE IF NOT EXISTS `bannedusers` (
  `id` int(255) NOT NULL,
  `ip` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `bantime` int(10) NOT NULL,
  `banday` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `useragent` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `banned`
--
ALTER TABLE `banned`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `bannedusers`
--
ALTER TABLE `bannedusers`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `banned`
--
ALTER TABLE `banned`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `bannedusers`
--
ALTER TABLE `bannedusers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
