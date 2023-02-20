-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2023 a las 04:23:29
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test_inv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_categories`
--

CREATE TABLE IF NOT EXISTS `invento_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `descrp` varchar(400) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `invento_categories`
--

INSERT INTO `invento_categories` (`id`, `name`, `place`, `descrp`, `date_added`) VALUES
(1, 'TODO FRITOS', '1', 'TODA COMIDA FRITA', '2022-03-01'),
(2, 'Accesorios', '2', 'accesorios del hogar', '2023-02-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_items`
--

CREATE TABLE IF NOT EXISTS `invento_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `descrp` varchar(400) NOT NULL,
  `category` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `invento_items`
--

INSERT INTO `invento_items` (`id`, `name`, `descrp`, `category`, `qty`, `price`, `date_added`) VALUES
(2, 'refresco cola', 'cola de hoja de colas', 1, 100, '2.00', '2022-03-06'),
(3, 'casabes', 'frito', 1, 100, '8.00', '2022-03-09'),
(4, 'Salsas Free', 'Salsa picante', 1, 55, '2.00', '2023-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_logs`
--

CREATE TABLE IF NOT EXISTS `invento_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL,
  `item` int(11) NOT NULL,
  `fromqty` int(11) NOT NULL,
  `toqty` int(11) NOT NULL,
  `fromprice` decimal(15,2) NOT NULL,
  `toprice` decimal(15,2) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `invento_logs`
--

INSERT INTO `invento_logs` (`id`, `type`, `item`, `fromqty`, `toqty`, `fromprice`, `toprice`, `date_added`, `user`) VALUES
(1, 3, 2, 0, 0, '2.00', '2.00', '2022-03-08', 1),
(2, 3, 3, 0, 0, '8.00', '8.00', '2022-03-11', 1),
(3, 1, 4, 50, 55, '10.00', '0.00', '2023-02-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_pays`
--

CREATE TABLE IF NOT EXISTS `invento_pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `fechain` date NOT NULL DEFAULT '0000-00-00',
  `hash` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `invento_pays`
--

INSERT INTO `invento_pays` (`id`, `name`, `monto`, `fechain`, `hash`) VALUES
(2, 'FerrerArca', 1562.68, '2022-03-01', 'plo125'),
(3, 'Drogercas', 152.32, '2022-02-23', 'dro123'),
(4, 'Gatakalax', 15258, '2022-03-08', 'tre3455'),
(5, 'Orbitaa CompaÃ±ia', 10008, '2022-03-07', 'traea123'),
(6, 'Eclipse', 258, '2022-03-21', '542324re');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_pays_items`
--

CREATE TABLE IF NOT EXISTS `invento_pays_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpays` int(11) DEFAULT NULL,
  `iditems` int(11) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idpays` (`idpays`),
  KEY `idpays_2` (`idpays`),
  KEY `idpays_3` (`idpays`),
  KEY `iditems` (`iditems`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_question`
--

CREATE TABLE IF NOT EXISTS `invento_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `preg_1` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `preg_2` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `invento_question`
--

INSERT INTO `invento_question` (`id`, `id_user`, `username`, `preg_1`, `preg_2`) VALUES
(11, 1, 'Obed Alvarado', 'patron', 'marron'),
(12, 1, 'Obed Alvarado', 'gato', 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_settings`
--

CREATE TABLE IF NOT EXISTS `invento_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `invento_settings`
--

INSERT INTO `invento_settings` (`id`, `name`, `val`) VALUES
(1, 'site_title', 'Invento - %page%'),
(2, 'site_logo', 'media/img/logo3x.png'),
(3, 'allow_userchange', 'y'),
(4, 'allow_namechange', 'y'),
(5, 'allow_emailchange', 'y'),
(6, 'installed', 'n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invento_users`
--

CREATE TABLE IF NOT EXISTS `invento_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(1) NOT NULL,
  `date_added` date DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `invento_users`
--

INSERT INTO `invento_users` (`id`, `username`, `password`, `name`, `email`, `role`, `date_added`) VALUES
(1, 'admin', 'e00cf25ad42683b3df678c61f42c6bda', 'Obed Alvarado', 'admin@admin.com', 1, '2017-04-01'),
(2, 'vende', 'e00cf25ad42683b3df678c61f42c6bda', 'Vendedor', 'de@gmail.com', 4, NULL),
(3, 'SGen', 'e00cf25ad42683b3df678c61f42c6bda', 'Jhons', 'c@gmail.com', 2, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `invento_pays_items`
--
ALTER TABLE `invento_pays_items`
  ADD CONSTRAINT `invento_pays_items_ibfk_1` FOREIGN KEY (`idpays`) REFERENCES `invento_pays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invento_pays_items_ibfk_2` FOREIGN KEY (`iditems`) REFERENCES `invento_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invento_question`
--
ALTER TABLE `invento_question`
  ADD CONSTRAINT `invento_question_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `invento_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
