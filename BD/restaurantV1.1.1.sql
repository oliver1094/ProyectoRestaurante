-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2016 a las 00:11:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant`
--
CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `restaurant`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_classification`
--

DROP TABLE IF EXISTS `inp_classification`;
CREATE TABLE `inp_classification` (
  `idClassification` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_group`
--

DROP TABLE IF EXISTS `inp_group`;
CREATE TABLE `inp_group` (
  `idGroup` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idClassification` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_input`
--

DROP TABLE IF EXISTS `inp_input`;
CREATE TABLE `inp_input` (
  `idInput` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastCost` decimal(13,3) NOT NULL,
  `averageCost` decimal(13,3) NOT NULL,
  `iva` decimal(13,3) NOT NULL DEFAULT '0.000',
  `costWithTax` decimal(13,3) NOT NULL,
  `stockable` tinyint(1) NOT NULL DEFAULT '0',
  `wasteRate` decimal(13,3) NOT NULL,
  `lastCostWaste` decimal(13,3) NOT NULL,
  `idGroup` int(10) UNSIGNED DEFAULT NULL,
  `idUnit` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_preparedinput`
--

DROP TABLE IF EXISTS `inp_preparedinput`;
CREATE TABLE `inp_preparedinput` (
  `idPreparedInput` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `performanceRecipe` decimal(13,3) NOT NULL,
  `unitCost` decimal(13,3) NOT NULL,
  `averageCost` decimal(13,3) NOT NULL,
  `investable` tinyint(1) NOT NULL,
  `idGroup` int(10) UNSIGNED DEFAULT NULL,
  `idUnit` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_preparedinput_has_inp_input`
--

DROP TABLE IF EXISTS `inp_preparedinput_has_inp_input`;
CREATE TABLE `inp_preparedinput_has_inp_input` (
  `idPreparedInput` int(10) UNSIGNED NOT NULL,
  `idInput` int(10) UNSIGNED NOT NULL,
  `quantity` decimal(13,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_presentation`
--

DROP TABLE IF EXISTS `inp_presentation`;
CREATE TABLE `inp_presentation` (
  `idPresentation` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastCost` decimal(13,3) NOT NULL,
  `averageCost` decimal(13,3) NOT NULL,
  `iva` decimal(13,3) NOT NULL,
  `costWithTaxes` decimal(13,3) NOT NULL,
  `provider` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `performance` decimal(13,3) NOT NULL,
  `status` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minimumStock` decimal(13,3) NOT NULL,
  `maximumStock` decimal(13,3) NOT NULL,
  `idGroup` int(10) UNSIGNED DEFAULT NULL,
  `idInput` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inp_unit`
--

DROP TABLE IF EXISTS `inp_unit`;
CREATE TABLE `inp_unit` (
  `idUnit` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` decimal(13,3) DEFAULT NULL,
  `unitId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1467151393),
('m130524_201442_init', 1467151437);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prd_group`
--

DROP TABLE IF EXISTS `prd_group`;
CREATE TABLE `prd_group` (
  `idGroup` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requestAutorization` tinyint(1) NOT NULL,
  `idClassification` int(10) UNSIGNED DEFAULT NULL,
  `groupId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prd_product`
--

DROP TABLE IF EXISTS `prd_product`;
CREATE TABLE `prd_product` (
  `idProduct` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costWithTaxes` decimal(13,3) NOT NULL,
  `costWithoutTaxes` decimal(13,3) NOT NULL,
  `taxFreeProduct` tinyint(1) NOT NULL,
  `iva` decimal(13,3) NOT NULL,
  `idGroup` int(10) UNSIGNED DEFAULT NULL,
  `idUnit` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'josa', 'XGSao7EpjcBtlV_GCpDvPdLuSFHyw7dQ', '$2y$13$l.q0EYnbNrch3UYRNY.zhO2NwawDHQmswqKeQor76HjmeKDV.mWbe', 'v7_vCm9iKI4HtVrWYVPGnXK2hGbNiLir_1468722642', 'futpiz_5678@hotmail.com', 10, 1467152021, 1468722643);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `inp_classification`
--
ALTER TABLE `inp_classification`
  ADD PRIMARY KEY (`idClassification`);

--
-- Indices de la tabla `inp_group`
--
ALTER TABLE `inp_group`
  ADD PRIMARY KEY (`idGroup`),
  ADD KEY `fk_INP_Group_INP_Classification1_idx` (`idClassification`);

--
-- Indices de la tabla `inp_input`
--
ALTER TABLE `inp_input`
  ADD PRIMARY KEY (`idInput`),
  ADD KEY `fk_INP_Input_INP_Group1_idx` (`idGroup`),
  ADD KEY `fk_INP_Input_INP_Unit1_idx` (`idUnit`);

--
-- Indices de la tabla `inp_preparedinput`
--
ALTER TABLE `inp_preparedinput`
  ADD PRIMARY KEY (`idPreparedInput`),
  ADD KEY `fk_INP_PreparedInput_INP_Group1_idx` (`idGroup`),
  ADD KEY `fk_INP_PreparedInput_INP_Unit1_idx` (`idUnit`);

--
-- Indices de la tabla `inp_preparedinput_has_inp_input`
--
ALTER TABLE `inp_preparedinput_has_inp_input`
  ADD PRIMARY KEY (`idPreparedInput`,`idInput`),
  ADD KEY `fk_INP_PreparedInput_has_INP_Input_INP_Input1_idx` (`idInput`),
  ADD KEY `fk_INP_PreparedInput_has_INP_Input_INP_PreparedInput1_idx` (`idPreparedInput`);

--
-- Indices de la tabla `inp_presentation`
--
ALTER TABLE `inp_presentation`
  ADD PRIMARY KEY (`idPresentation`),
  ADD KEY `fk_INP_Presentation_INP_Group1_idx` (`idGroup`),
  ADD KEY `fk_INP_Presentation_INP_Input1_idx` (`idInput`);

--
-- Indices de la tabla `inp_unit`
--
ALTER TABLE `inp_unit`
  ADD PRIMARY KEY (`idUnit`),
  ADD KEY `fk_INP_Unit_INP_Unit_idx` (`unitId`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `prd_group`
--
ALTER TABLE `prd_group`
  ADD PRIMARY KEY (`idGroup`),
  ADD KEY `fk_PRD_Group_INP_Classification1_idx` (`idClassification`),
  ADD KEY `fk_PRD_Group_PRD_Group1_idx` (`groupId`);

--
-- Indices de la tabla `prd_product`
--
ALTER TABLE `prd_product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_PRD_Product_INP_Unit1_idx` (`idUnit`),
  ADD KEY `fk_PRD_Product_PRD_Group1_idx` (`idGroup`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inp_classification`
--
ALTER TABLE `inp_classification`
  MODIFY `idClassification` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inp_group`
--
ALTER TABLE `inp_group`
  MODIFY `idGroup` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inp_input`
--
ALTER TABLE `inp_input`
  MODIFY `idInput` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inp_preparedinput`
--
ALTER TABLE `inp_preparedinput`
  MODIFY `idPreparedInput` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inp_presentation`
--
ALTER TABLE `inp_presentation`
  MODIFY `idPresentation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inp_unit`
--
ALTER TABLE `inp_unit`
  MODIFY `idUnit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prd_group`
--
ALTER TABLE `prd_group`
  MODIFY `idGroup` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `prd_product`
--
ALTER TABLE `prd_product`
  MODIFY `idProduct` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inp_group`
--
ALTER TABLE `inp_group`
  ADD CONSTRAINT `fk_INP_Group_INP_Classification1` FOREIGN KEY (`idClassification`) REFERENCES `inp_classification` (`idClassification`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `inp_input`
--
ALTER TABLE `inp_input`
  ADD CONSTRAINT `fk_INP_Input_INP_Group1` FOREIGN KEY (`idGroup`) REFERENCES `inp_group` (`idGroup`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_INP_Input_INP_Unit1` FOREIGN KEY (`idUnit`) REFERENCES `inp_unit` (`idUnit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `inp_preparedinput`
--
ALTER TABLE `inp_preparedinput`
  ADD CONSTRAINT `fk_INP_PreparedInput_INP_Group1` FOREIGN KEY (`idGroup`) REFERENCES `inp_group` (`idGroup`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_INP_PreparedInput_INP_Unit1` FOREIGN KEY (`idUnit`) REFERENCES `inp_unit` (`idUnit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `inp_preparedinput_has_inp_input`
--
ALTER TABLE `inp_preparedinput_has_inp_input`
  ADD CONSTRAINT `fk_INP_PreparedInput_has_INP_Input_INP_PreparedInput1` FOREIGN KEY (`idPreparedInput`) REFERENCES `inp_preparedinput` (`idPreparedInput`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_INP_PreparedInput_has_INP_Input_INP_Input1` FOREIGN KEY (`idInput`) REFERENCES `inp_input` (`idInput`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inp_presentation`
--
ALTER TABLE `inp_presentation`
  ADD CONSTRAINT `fk_INP_Presentation_INP_Group1` FOREIGN KEY (`idGroup`) REFERENCES `inp_group` (`idGroup`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_INP_Presentation_INP_Input1` FOREIGN KEY (`idInput`) REFERENCES `inp_input` (`idInput`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `inp_unit`
--
ALTER TABLE `inp_unit`
  ADD CONSTRAINT `fk_INP_Unit_INP_Unit` FOREIGN KEY (`unitId`) REFERENCES `inp_unit` (`idUnit`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `prd_group`
--
ALTER TABLE `prd_group`
  ADD CONSTRAINT `fk_PRD_Group_INP_Classification1` FOREIGN KEY (`idClassification`) REFERENCES `inp_classification` (`idClassification`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_PRD_Group_PRD_Group1` FOREIGN KEY (`groupId`) REFERENCES `prd_group` (`idGroup`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `prd_product`
--
ALTER TABLE `prd_product`
  ADD CONSTRAINT `fk_PRD_Product_INP_Unit1` FOREIGN KEY (`idUnit`) REFERENCES `inp_unit` (`idUnit`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_PRD_Product_PRD_Group1` FOREIGN KEY (`idGroup`) REFERENCES `prd_group` (`idGroup`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
