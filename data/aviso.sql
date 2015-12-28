-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2015 a las 08:59:23
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso`
--

CREATE TABLE `aviso` (
  `id` int(11) NOT NULL,
  `aviso` text NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `tipo_aviso` tinytext NOT NULL,
  `tipo_img` tinytext NOT NULL,
  `imagen` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aviso`
--

INSERT INTO `aviso` (`id`, `aviso`, `titulo`, `tipo_aviso`, `tipo_img`, `imagen`) VALUES
(22, '<p>Te deseo una Navidad llena de matem&aacute;ticas: adicta al placer, restada de dolor, multiplicada de felicidad y dividida en el amor con las personas que m&aacute;s te importan.<br />\r\n<br />\r\nLa pureza de la Navidad, se pinta de blanco.<br />\r\nLa serenidad de la Navidad, se pinta de azul.<br />\r\nLa pasi&oacute;n de la Navidad, se pinta de rojo.<br />\r\nLa felicidad de la Navidad&hellip; &iexcl;Toma el pincel y pinta tu vida!</p>\r\n\r\n<p>Ingredientes para pasar unas buenas navidades: amigos en abundancia, frio lo suficiente (Por otra parte, un poco de imaginaci&oacute;n;) resultado&hellip; &iexcl;La alegr&iacute;a de la Navidad!</p>\r\n\r\n<p>Ingredientes para pasar unas buenas navidades: amigos en abundancia, frio lo suficiente (Por otra parte, un poco de imaginaci&oacute;n;) resultado&hellip; &iexcl;La alegr&iacute;a de la Navidad!</p>', 'Feliz Navidad', 'panel panel-primary', 'img-thumbnail', 'images.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
