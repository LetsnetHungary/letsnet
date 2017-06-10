-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2017. Jún 08. 17:17
-- Kiszolgáló verziója: 5.6.30
-- PHP verzió: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `products`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `prod_categories` varchar(1000) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `category_position`
--

CREATE TABLE IF NOT EXISTS `category_position` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `category` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) NOT NULL,
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
-- Tábla szerkezet ehhez a táblához `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `label_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `main_categories`
--

CREATE TABLE IF NOT EXISTS `main_categories` (
  `id` int(255) NOT NULL,
  `category_name` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `category_from` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `category_visible` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `main_categories`
--

INSERT INTO `main_categories` (`id`, `category_name`, `category_id`, `category_from`, `category_visible`) VALUES
(1, 'Minden termék', 'all', '---', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `main_labels`
--

CREATE TABLE IF NOT EXISTS `main_labels` (
  `id` int(255) NOT NULL,
  `label_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `label_name` varchar(400) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
-- Tábla szerkezet ehhez a táblához `prods`
--

CREATE TABLE IF NOT EXISTS `prods` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `prod_name` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `prod_price` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `outofstock` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `prod_images`
--

CREATE TABLE IF NOT EXISTS `prod_images` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `type` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `data` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(255) NOT NULL,
  `prod_id` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `p_id` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `property_id` varchar(400) COLLATE utf8_hungarian_ci NOT NULL,
  `property_value` varchar(10000) COLLATE utf8_hungarian_ci NOT NULL,
  `position` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `prod_id` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `stock` int(255) NOT NULL,
  `webshopstock` int(255) NOT NULL,
  `webshopsold` int(255) NOT NULL,
  `marketsold` int(255) NOT NULL,
  `friendlysold` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_categories` (`prod_categories`(255)),
  ADD KEY `prod_categories_2` (`prod_categories`(255)),
  ADD KEY `prod_categories_3` (`prod_categories`(255)),
  ADD KEY `prod_categories_4` (`prod_categories`(255)),
  ADD KEY `prod_categories_5` (`prod_categories`(255)),
  ADD KEY `prod_categories_6` (`prod_categories`(255)),
  ADD KEY `prod_categories_7` (`prod_categories`(255));

--
-- A tábla indexei `category_position`
--
ALTER TABLE `category_position`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`(255));

--
-- A tábla indexei `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `label_id` (`label_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- A tábla indexei `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `main_labels`
--
ALTER TABLE `main_labels`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `neworders`
--
ALTER TABLE `neworders`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `prods`
--
ALTER TABLE `prods`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `prod_images`
--
ALTER TABLE `prod_images`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`(255)),
  ADD KEY `prod_id` (`prod_id`(255));

--
-- A tábla indexei `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`prod_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `category_position`
--
ALTER TABLE `category_position`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT a táblához `main_labels`
--
ALTER TABLE `main_labels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `neworders`
--
ALTER TABLE `neworders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `prods`
--
ALTER TABLE `prods`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `prod_images`
--
ALTER TABLE `prod_images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT a táblához `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
