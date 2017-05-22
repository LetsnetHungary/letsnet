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
-- Adatbázis: `rastaclat_cms`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_image`
--

CREATE TABLE IF NOT EXISTS `cms_image` (
  `id` int(255) NOT NULL,
  `view` varchar(40) NOT NULL,
  `section` varchar(40) NOT NULL,
  `image_id` varchar(40) NOT NULL,
  `position` int(10) NOT NULL,
  `type` varchar(40) CHARACTER SET ascii NOT NULL,
  `encode` varchar(40) NOT NULL,
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_items`
--

CREATE TABLE IF NOT EXISTS `cms_items` (
  `id` int(255) NOT NULL,
  `view` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `section` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `productkey` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_item_image`
--

CREATE TABLE IF NOT EXISTS `cms_item_image` (
  `id` int(255) NOT NULL,
  `view` varchar(40) NOT NULL,
  `section` varchar(40) NOT NULL,
  `image_id` varchar(40) NOT NULL,
  `position` int(10) NOT NULL,
  `type` varchar(40) CHARACTER SET ascii NOT NULL,
  `encode` varchar(40) NOT NULL,
  `data` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_item_prop`
--

CREATE TABLE IF NOT EXISTS `cms_item_prop` (
  `id` int(255) NOT NULL,
  `view` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `section` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `defaultkey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `innerkey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `value` varchar(40) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_map`
--

CREATE TABLE IF NOT EXISTS `cms_map` (
  `id` int(255) NOT NULL,
  `cms_map_url` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `cms_map_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `view` varchar(40) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `last_modified` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `cms_map`
--

INSERT INTO `cms_map` (`id`, `cms_map_url`, `cms_map_id`, `view`, `last_modified`) VALUES
(1, 'cms.Index.json', 'index_332', 'Index', '1'),
(2, 'cms.Shop.json', 'shop_332', 'Shop', '1');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cms_texts`
--

CREATE TABLE IF NOT EXISTS `cms_texts` (
  `id` int(255) NOT NULL,
  `view` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `section` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `defaultkey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `innerkey` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `value` varchar(10000) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `section_map`
--

CREATE TABLE IF NOT EXISTS `section_map` (
  `id` int(255) NOT NULL,
  `view` varchar(40) NOT NULL,
  `cms_map_id` varchar(40) NOT NULL,
  `section` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `uniquekey` varchar(10000) NOT NULL,
  `last_modified` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `section_map`
--

INSERT INTO `section_map` (`id`, `view`, `cms_map_id`, `section`, `type`, `uniquekey`, `last_modified`) VALUES
(1, 'Shop', 'shop_332', 'bracelets', 'itemset', 'pppp', ''),
(2, 'Index', 'index_332', 'mainslider', 'imageset', 'msl', ''),
(3, 'Index', 'index_332', 'featured_items', 'text', 'fi', ''),
(4, 'Index', 'index_332', 'social', 'text', 'so', ''),
(5, 'Index', 'index_332', 'promotion', 'text', 'pr', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `cms_image`
--
ALTER TABLE `cms_image`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cms_items`
--
ALTER TABLE `cms_items`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cms_item_image`
--
ALTER TABLE `cms_item_image`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cms_item_prop`
--
ALTER TABLE `cms_item_prop`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cms_map`
--
ALTER TABLE `cms_map`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `cms_texts`
--
ALTER TABLE `cms_texts`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `section_map`
--
ALTER TABLE `section_map`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `cms_image`
--
ALTER TABLE `cms_image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `cms_items`
--
ALTER TABLE `cms_items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `cms_item_image`
--
ALTER TABLE `cms_item_image`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `cms_item_prop`
--
ALTER TABLE `cms_item_prop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `cms_map`
--
ALTER TABLE `cms_map`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT a táblához `cms_texts`
--
ALTER TABLE `cms_texts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `section_map`
--
ALTER TABLE `section_map`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
