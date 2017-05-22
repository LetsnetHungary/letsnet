-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 28. 21:55
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `rastaclat_admin`
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `devices`
--

INSERT INTO `devices` (`id`, `devicekey`, `uniquekey`, `devicename`) VALUES
(1, '9770d91bb53ed6dfcc73dde00842f81f', 'l885fg643d', 'Hegel Ákos''s MacBook Air Google Chrome'),
(2, '9770d91bb53ed6dfcc73dde00842f81f', 'pguve4x3lf', 'Hegel Ákos''s MacBook Air Google Chrome'),
(3, '4be1e1e41a472c1d2f4fc2f9da5d32b0', 'o1egyjhui3', 'Hegel Akos''s Macbook Air Google Chrome'),
(4, '4be1e1e41a472c1d2f4fc2f9da5d32b0', 'l885fg643d', 'Hegel Akos''s MacBook Air Google Chrome'),
(5, '9770d91bb53ed6dfcc73dde00842f81f', 'o1egyjhui3', 'Hegel Akos''s MacBook Air Google Chrome'),
(6, '4be1e1e41a472c1d2f4fc2f9da5d32b0', 'pguve4x3lf', 'Hegel Akos''s MacBook Air Google Chrome');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fname`, `lname`, `uniquekey`, `adminkey`, `allow`, `sitekey`, `webshopdb`) VALUES
(1, 'rastaclat@letsnet.hu', '$2y$10$YHRwubgT8bshxCbh.MdPuOHIADZOwyCS8unRJCjxn6LrIhhsuBUom', 'Letsnet', 'Admin', 'wxWvoWZ4CH', '', 'admin', 'rastaclat', 'rastaclat');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
