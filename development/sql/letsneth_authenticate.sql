-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jún 14. 11:00
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admingroups`
--

INSERT INTO `admingroups` (`id`, `fr`, `adminkey`, `adminname`) VALUES
(1, '---', '3bd2-07a1-8d6d-87c9', 'Superadmin'),
(2, '3bd2-07a1-8d6d-87c9', '74b6-c8b0-b669-9d3e', 'Aladmin');

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

--
-- A tábla adatainak kiíratása `logged_users`
--

INSERT INTO `logged_users` (`devicekey`, `uniquekey`, `time`, `ip`, `useragent`, `lalo`) VALUES
('52e4ceec7c8f3ce37fa7cb898d52b501', 'l885fg643d', '1497423792', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3', '0'),
('bef2571c09f4de7b02e1245b6542fded', 'l885fg643d', '1497426101', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1', '0');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(255) NOT NULL,
  `admingroup` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `module` varchar(400) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modules`
--

INSERT INTO `modules` (`id`, `admingroup`, `module`) VALUES
(1, '3bd2-07a1-8d6d-87c9', '7ae9-e6a9-1266-5f6d'),
(2, '3bd2-07a1-8d6d-87c9', '1e6f-2051-ae42-27b9'),
(3, '3bd2-07a1-8d6d-87c9', 'felhasznalok');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `modulesstore`
--

INSERT INTO `modulesstore` (`id`, `modulename`, `module`, `fr`, `type`, `redirect`, `icon`) VALUES
(1, 'Főoldal', '7ae9-e6a9-1266-5f6d', '---', 'page', '/Index', 'glyph-icon icon-linecons-tv'),
(2, 'Táblázatok', '1e6f-2051-ae42-27b9', '7ae9-e6a9-1266-5f6d', 'pagemodule', '---', '---'),
(3, 'Felhasználók', 'felhasznalok', '---', 'page', '/Users', 'glyph-icon icon-group');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `visits`
--

INSERT INTO `visits` (`id`, `uniquekey`, `conntime`, `connday`, `url`, `useragent`) VALUES
(1, '127.0.0.1', 1497424653, 'June 14, 2017, 7:17 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(2, '127.0.0.1', 1497424653, 'June 14, 2017, 7:17 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(3, 'l885fg643d', 1497424754, 'June 14, 2017, 7:19 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(4, 'l885fg643d', 1497424755, 'June 14, 2017, 7:19 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(5, 'l885fg643d', 1497424801, 'June 14, 2017, 7:20 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(6, 'l885fg643d', 1497424801, 'June 14, 2017, 7:20 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(7, 'l885fg643d', 1497424819, 'June 14, 2017, 7:20 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(8, 'l885fg643d', 1497424819, 'June 14, 2017, 7:20 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(9, 'l885fg643d', 1497424910, 'June 14, 2017, 7:21 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(10, 'l885fg643d', 1497424911, 'June 14, 2017, 7:21 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(11, 'l885fg643d', 1497424921, 'June 14, 2017, 7:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(12, 'l885fg643d', 1497424921, 'June 14, 2017, 7:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(13, 'l885fg643d', 1497424923, 'June 14, 2017, 7:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(14, 'l885fg643d', 1497424923, 'June 14, 2017, 7:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(15, 'l885fg643d', 1497424936, 'June 14, 2017, 7:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(16, 'l885fg643d', 1497424937, 'June 14, 2017, 7:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(17, 'l885fg643d', 1497424938, 'June 14, 2017, 7:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(18, 'l885fg643d', 1497424938, 'June 14, 2017, 7:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(19, 'l885fg643d', 1497424953, 'June 14, 2017, 7:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(20, 'l885fg643d', 1497424953, 'June 14, 2017, 7:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(21, 'l885fg643d', 1497424968, 'June 14, 2017, 9:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(22, 'l885fg643d', 1497424968, 'June 14, 2017, 9:22 am', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(23, 'l885fg643d', 1497424973, 'June 14, 2017, 9:22 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(24, 'l885fg643d', 1497424986, 'June 14, 2017, 9:23 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(25, '127.0.0.1', 1497426093, 'June 14, 2017, 9:41 am', '/AuthTest', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4'),
(26, '127.0.0.1', 1497426101, 'June 14, 2017, 9:41 am', '/Auth/login', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4'),
(27, 'l885fg643d', 1497426103, 'June 14, 2017, 9:41 am', '/AuthTest', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4'),
(28, 'l885fg643d', 1497426103, 'June 14, 2017, 9:41 am', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/603.2.4 (KHTML, like Gecko) Version/10.1.1 Safari/603.2.4'),
(29, 'l885fg643d', 1497434783, 'June 14, 2017, 12:06 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(30, 'l885fg643d', 1497436179, 'June 14, 2017, 12:29 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(31, 'l885fg643d', 1497436179, 'June 14, 2017, 12:29 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(32, 'l885fg643d', 1497436191, 'June 14, 2017, 12:29 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(33, 'l885fg643d', 1497436192, 'June 14, 2017, 12:29 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(34, 'l885fg643d', 1497436223, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(35, 'l885fg643d', 1497436223, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(36, 'l885fg643d', 1497436232, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(37, 'l885fg643d', 1497436232, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(38, 'l885fg643d', 1497436239, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(39, 'l885fg643d', 1497436239, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(40, 'l885fg643d', 1497436243, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(41, 'l885fg643d', 1497436243, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(42, 'l885fg643d', 1497436245, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(43, 'l885fg643d', 1497436245, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(44, 'l885fg643d', 1497436248, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(45, 'l885fg643d', 1497436248, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(46, 'l885fg643d', 1497436248, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(47, 'l885fg643d', 1497436250, 'June 14, 2017, 12:30 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(48, 'l885fg643d', 1497436250, 'June 14, 2017, 12:30 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(49, 'l885fg643d', 1497436262, 'June 14, 2017, 12:31 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(50, 'l885fg643d', 1497436263, 'June 14, 2017, 12:31 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(51, 'l885fg643d', 1497436273, 'June 14, 2017, 12:31 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(52, 'l885fg643d', 1497436273, 'June 14, 2017, 12:31 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(53, 'l885fg643d', 1497436274, 'June 14, 2017, 12:31 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(54, 'l885fg643d', 1497436274, 'June 14, 2017, 12:31 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(55, 'l885fg643d', 1497436360, 'June 14, 2017, 12:32 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(56, 'l885fg643d', 1497436360, 'June 14, 2017, 12:32 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(57, 'l885fg643d', 1497436378, 'June 14, 2017, 12:32 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(58, 'l885fg643d', 1497436378, 'June 14, 2017, 12:32 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(59, 'l885fg643d', 1497436427, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(60, 'l885fg643d', 1497436427, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(61, 'l885fg643d', 1497436428, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(62, 'l885fg643d', 1497436431, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(63, 'l885fg643d', 1497436431, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(64, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(65, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(66, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(67, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(68, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(69, 'l885fg643d', 1497436432, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(70, 'l885fg643d', 1497436433, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(71, 'l885fg643d', 1497436436, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(72, 'l885fg643d', 1497436436, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(73, 'l885fg643d', 1497436436, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(74, 'l885fg643d', 1497436436, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(75, 'l885fg643d', 1497436436, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(76, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(77, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(78, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(79, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(80, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(81, 'l885fg643d', 1497436437, 'June 14, 2017, 12:33 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(82, 'l885fg643d', 1497436456, 'June 14, 2017, 12:34 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(83, 'l885fg643d', 1497436456, 'June 14, 2017, 12:34 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(84, 'l885fg643d', 1497436456, 'June 14, 2017, 12:34 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(85, 'l885fg643d', 1497436457, 'June 14, 2017, 12:34 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(86, 'l885fg643d', 1497436507, 'June 14, 2017, 12:35 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(87, 'l885fg643d', 1497436532, 'June 14, 2017, 12:35 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(88, 'l885fg643d', 1497436532, 'June 14, 2017, 12:35 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(89, 'l885fg643d', 1497436532, 'June 14, 2017, 12:35 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(90, 'l885fg643d', 1497436578, 'June 14, 2017, 12:36 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(91, 'l885fg643d', 1497436603, 'June 14, 2017, 12:36 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(92, 'l885fg643d', 1497436603, 'June 14, 2017, 12:36 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(93, 'l885fg643d', 1497436719, 'June 14, 2017, 12:38 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(94, 'l885fg643d', 1497436730, 'June 14, 2017, 12:38 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(95, 'l885fg643d', 1497436737, 'June 14, 2017, 12:38 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(96, 'l885fg643d', 1497436785, 'June 14, 2017, 12:39 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(97, 'l885fg643d', 1497436826, 'June 14, 2017, 12:40 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(98, 'l885fg643d', 1497436849, 'June 14, 2017, 12:40 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(99, 'l885fg643d', 1497436854, 'June 14, 2017, 12:40 pm', '/Users', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(100, 'l885fg643d', 1497436854, 'June 14, 2017, 12:40 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(101, 'l885fg643d', 1497436856, 'June 14, 2017, 12:40 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(102, 'l885fg643d', 1497436932, 'June 14, 2017, 12:42 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(103, 'l885fg643d', 1497436946, 'June 14, 2017, 12:42 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(104, 'l885fg643d', 1497436959, 'June 14, 2017, 12:42 pm', '/Users', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(105, 'l885fg643d', 1497436959, 'June 14, 2017, 12:42 pm', '/favicon.ico', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(106, 'l885fg643d', 1497436960, 'June 14, 2017, 12:42 pm', '/Index', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(107, 'l885fg643d', 1497436961, 'June 14, 2017, 12:42 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(108, 'l885fg643d', 1497437132, 'June 14, 2017, 12:45 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(109, 'l885fg643d', 1497437139, 'June 14, 2017, 12:45 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36'),
(110, 'l885fg643d', 1497437158, 'June 14, 2017, 12:45 pm', '/', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `wrong_try`
--

INSERT INTO `wrong_try` (`id`, `email`, `devicekey`, `POST`, `time`, `date`) VALUES
(1, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371495', '2017-06-13 18:31:35'),
(2, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371503', '2017-06-13 18:31:43'),
(3, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371555', '2017-06-13 18:32:35'),
(4, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371584', '2017-06-13 18:33:04'),
(5, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371604', '2017-06-13 18:33:24'),
(6, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371637', '2017-06-13 18:33:57'),
(7, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371654', '2017-06-13 18:34:14'),
(8, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371689', '2017-06-13 18:34:49'),
(9, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497371734', '2017-06-13 18:35:34'),
(10, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497372061', '2017-06-13 18:41:01'),
(11, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497372201', '2017-06-13 18:43:21'),
(12, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497372270', '2017-06-13 18:44:30'),
(13, 'letsnet@letsnet.hu', '52e4ceec7c8f3ce37fa7cb898d52b501', '{"l":"true","d":{"ema":"letsnet@letsnet.hu","passw":"password","dk":"52e4ceec7c8f3ce37fa7cb898d52b501","lalo":"0"}}', '1497372310', '2017-06-13 18:45:10');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT a táblához `modulesstore`
--
ALTER TABLE `modulesstore`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT a táblához `wrong_try`
--
ALTER TABLE `wrong_try`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
