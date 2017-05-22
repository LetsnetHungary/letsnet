-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Már 28. 21:53
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `rastaclat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `picnum` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `collections`
--

INSERT INTO `collections` (`id`, `name`, `picnum`, `type`) VALUES
(1, 'asphalt', 4, 'classic'),
(2, 'fire', 4, 'classic'),
(3, 'forest camo', 4, 'classic'),
(4, 'merlot', 3, 'classic'),
(5, 'mint chip', 4, 'classic'),
(6, 'monkey business', 2, 'classic'),
(7, 'onyx II', 3, 'classic'),
(8, 'zion II', 6, 'classic'),
(9, 'aqua', 3, 'miniclat'),
(10, 'merlot', 5, 'miniclat'),
(11, 'onyx II', 3, 'miniclat'),
(12, 'zion', 6, 'miniclat');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(40) NOT NULL,
  `who` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `price` varchar(40) NOT NULL,
  `count` int(40) NOT NULL,
  `sold` int(40) NOT NULL,
  `about` varchar(10000) NOT NULL,
  `givedate` varchar(40) NOT NULL,
  `deadline` varchar(40) NOT NULL,
  `visible` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `neworders`
--

CREATE TABLE IF NOT EXISTS `neworders` (
  `id` int(11) NOT NULL,
  `buy_id` varchar(100) NOT NULL,
  `useragent` varchar(1000) NOT NULL,
  `datee` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `day` int(2) NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `birth` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `postcode` int(4) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `afa` int(1) NOT NULL,
  `afaname` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `afaaddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `afadata` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `pickpackdata` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `state` varchar(40) NOT NULL,
  `visible` int(2) NOT NULL,
  `cart` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `on_stock` int(11) NOT NULL,
  `webshop_stock` int(11) NOT NULL,
  `webshop_sold` int(40) NOT NULL,
  `friendly_sold` int(40) NOT NULL,
  `market_sold` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prod_prop`
--

CREATE TABLE IF NOT EXISTS `prod_prop` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `price` varchar(15) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prod_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop1` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop2` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop3` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop4` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop5` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `prop6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(255) NOT NULL,
  `datee` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subtime` varchar(40) NOT NULL,
  `url` varchar(40) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `useragent` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `neworders`
--
ALTER TABLE `neworders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`);

--
-- A tábla indexei `prod_prop`
--
ALTER TABLE `prod_prop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`);

--
-- A tábla indexei `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT a táblához `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `neworders`
--
ALTER TABLE `neworders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `prod_prop`
--
ALTER TABLE `prod_prop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
