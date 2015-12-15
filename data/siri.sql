-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2015 a las 18:36:26
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `siri`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `descripcion`) VALUES
(1, 'Limpieza'),
(2, 'Formateo'),
(3, 'Configuracion de correo'),
(4, 'Restauracion del sistema'),
(5, 'Personalizar'),
(6, 'Instalcion de antivirus'),
(7, 'Configuracion de office'),
(8, 'Instalacion de paqueteria'),
(9, 'Instalacion de aplicativos IMSS'),
(10, 'Configuracion de aplicativos IMSS'),
(11, 'Limpieza de virus'),
(12, 'Configuracion de impresora'),
(13, 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicativos`
--

CREATE TABLE IF NOT EXISTS `aplicativos` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`) VALUES
(1, 'Personal'),
(2, 'Recursos Humanos'),
(3, 'Afiliacion'),
(4, 'Juridicos'),
(5, 'Servcios Adminsitrativos'),
(6, 'Consultorias'),
(7, 'Auditoria'),
(8, 'Prestaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atencionreportes`
--

CREATE TABLE IF NOT EXISTS `atencionreportes` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(14) unsigned NOT NULL,
  `idusuarioOrigen` int(14) unsigned DEFAULT NULL,
  `idstatus` int(14) unsigned NOT NULL,
  `fechaTerm` date DEFAULT NULL,
  `horaTerm` time DEFAULT NULL,
  `solucionado` varchar(100) DEFAULT NULL,
  `idusuarioDestino` int(14) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idstatus` (`idstatus`),
  KEY `idreporte` (`idreporte`),
  KEY `FK_atencionreportes_usuario` (`idusuarioOrigen`),
  KEY `FK_atencionreportes_usuario_2` (`idusuarioDestino`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Volcado de datos para la tabla `atencionreportes`
--

INSERT INTO `atencionreportes` (`id`, `idreporte`, `idusuarioOrigen`, `idstatus`, `fechaTerm`, `horaTerm`, `solucionado`, `idusuarioDestino`) VALUES
(1, 4, 31, 2, '0001-09-15', '05:04:02', 'SI', 19),
(153, 153, 0, 4, '0000-00-00', '00:00:00', 'NO', 22),
(154, 154, 0, 4, NULL, NULL, NULL, NULL),
(155, 155, 20, 4, NULL, NULL, NULL, NULL),
(158, 158, 0, 4, '2020-11-15', '17:56:26', 'SI', NULL),
(159, 159, 0, 4, '2020-11-15', '06:59:40', 'SI', NULL),
(160, 160, NULL, 6, NULL, NULL, NULL, NULL),
(161, 161, NULL, 6, NULL, NULL, NULL, NULL),
(162, 162, 0, 3, '2020-11-15', '18:28:33', 'SI', NULL),
(163, 163, NULL, 6, NULL, NULL, NULL, NULL),
(164, 164, NULL, 6, NULL, NULL, NULL, NULL),
(165, 165, 0, 1, '2020-11-15', '19:03:43', 'NO', 29),
(166, 166, NULL, 6, NULL, NULL, NULL, NULL),
(167, 167, NULL, 3, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriau`
--

CREATE TABLE IF NOT EXISTS `categoriau` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `nivel` int(14) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categoriau`
--

INSERT INTO `categoriau` (`id`, `nombre`, `nivel`) VALUES
(1, 'Responsable de unidad', 0),
(2, 'Mesa de recepcion', 1),
(3, 'Auxiliar', 2),
(4, 'Oficial', 3),
(5, 'Coordinador ', 6),
(6, 'Garantia', 5),
(7, 'Especialista', 4),
(8, 'Call Center', 1),
(9, 'Administrador', 7),
(10, 'Jefe de oficina', 6),
(11, 'Sin Categoria', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE IF NOT EXISTS `clase` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idTipoReporte` int(14) unsigned NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idTipoReporte` (`idTipoReporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id`, `idTipoReporte`, `descripcion`) VALUES
(1, 2, 'Instalación y configuración de antivirus Institucional'),
(2, 2, 'Instalación y configuración de antivirus Institucional'),
(3, 2, 'Actualización del servicio de antivirus Institucional'),
(4, 2, 'Atención a reportes del servicio de antivirus Institucional'),
(5, 2, 'Generar procedimientos para la instalación, configuración y actualización del antivirus Institucional para equipos con cuentas locales y/o sin red'),
(6, 2, 'Atención de reportes de spam'),
(7, 2, 'Atención a reportes del servicio de actualizaciones automáticas del antivirus Institucional (WSUS)'),
(8, 1, 'Instalación y configuración de cuentas locales y cuentas personalizadas'),
(9, 1, 'Instalación y configuración de servicios de transferencia de archivos (FTP)'),
(10, 1, 'Mantenimiento correctivo de  equipo de cómputo'),
(11, 1, 'Mantenimiento correctivo de impresoras'),
(12, 1, 'Mantenimiento preventivo de equipo de cómputo'),
(13, 1, 'Mantenimiento preventivo de impresoras'),
(14, 1, 'Vacunación y limpieza de equipos con antivirus Institucional'),
(15, 1, 'Instalación y configuración servidores Windows Server'),
(16, 1, 'Mantenimiento preventivo y correctivo de servidores Windows  Server'),
(17, 1, 'Atención a reportes de sistemas institucionales (SIMF, SCASE, ACCEDER, etc.)'),
(18, 1, 'Atención a reportes en los Sistemas Operativos Windows XP, Vista y 7'),
(19, 1, 'Atención a reportes en equipos y/o servicios de TI en sitio'),
(20, 1, 'Atención a reportes en equipos y/o servicios de TI vía remota'),
(21, 1, 'Configuración de sistemas Institucionales en sitios web'),
(22, 1, 'Diagnóstico de errores y daños en equipo de cómputo'),
(23, 1, 'Instalación y configuración de servicios de Intranet'),
(24, 1, 'Atención a reportes del servicio de configuración de equipos Windows'),
(25, 1, 'Atención de reportes de bases de datos'),
(26, 1, 'Atención de reportes de programación web'),
(27, 1, 'Atención de reportes de sitios web Institucionales'),
(28, 1, 'Atención de reportes en aplicaciones web '),
(29, 1, 'Configuración de aplicaciones web'),
(30, 1, 'Configuración de sitios web'),
(31, 1, 'Instalación y configuración de cuentas locales y cuentas personalizadas'),
(32, 1, 'Administrar el inventario de datos lógicos del equipo de cómputo'),
(33, 1, '* Mantenimiento preventivo y correctivo de equipos de comunicaciones'),
(34, 1, '* Diagnóstico y solución de problemas en equipos de telecomunicaciones'),
(35, 1, '* Apoyo en la realización de respaldos de servidores'),
(36, 1, '* Atención a reportes del servicio de mensajería institucional Microsoft Lync'),
(37, 1, '* Atención de incidentes de correo electrónico del usuario'),
(38, 1, 'Atención de fallos del servicio de videoconferencia'),
(39, 6, 'Configuración de servicios de videoconferencia'),
(40, 6, 'Agendar y confirmar calendario de visitas a las unidades con el director o encargado'),
(41, 5, 'Documentar visitas a unidades, actividades realizadas (concretadas y pendientes)'),
(42, 5, 'Realizar calendario de visitas a las unidades locales y foráneas'),
(43, 5, 'Realizar plan de trabajo para unidades locales y foráneas'),
(44, 5, 'Apoyo en trámites de recursos humanos'),
(45, 5, 'Delegar y gestionar actividades a los encargados de unidad'),
(46, 5, 'Seguimiento del mantenimiento de infraestructura y equipo de cómputo'),
(47, 5, 'Atención de solicitudes y trámites de control patrimonial y bajas'),
(48, 5, 'Reunión para análisis de requerimientos de servicios'),
(49, 5, 'Apoyo en trámites de recursos humanos'),
(60, 3, 'Atención de reportes de fallos de red'),
(61, 3, 'Atención de reportes de monitoreo de servicios de telecomunicaciones'),
(62, 3, 'Atención de reportes de equipos de comunicaciones en funcionamiento'),
(63, 3, 'Atención de reportes del servicio de telefonía IP'),
(64, 3, 'Atención de reportes del servicio de cableado / nodo'),
(65, 3, 'Instalación y configuración del servicio de cableado / nodo'),
(66, 3, 'Instalación y configuración de sistema de telefonía IP'),
(67, 3, 'Instalación y configuración de equipo de telecomunicaciones'),
(68, 4, 'Atención de solicitudes de cambio de contraseña'),
(69, 4, 'Atención de solicitudes de reseteo de contraseña'),
(70, 4, 'Atención de solicitudes de eliminación de cuentas de correo electrónico'),
(71, 4, 'Atención de solicitudes del servicio de mensajería institucional Microsoft Lync'),
(72, 4, 'Atención de solicitudes de creación de cuenta de correo electrónico'),
(73, 4, 'Atención a reportes del servicio de directorio activo (Active Directory)'),
(74, 4, 'Solicitar el uso de cuentas locales y cuentas personalizadas'),
(75, 7, 'Información general'),
(76, 7, 'Asesoría para la atención de reportes en sitios'),
(77, 7, 'Asesoría para la atención de reportes vía remota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiporep`
--

CREATE TABLE IF NOT EXISTS `equiporep` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(15) unsigned NOT NULL,
  `cuenta` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `idmarca` int(14) unsigned DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `mac` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=156 ;

--
-- Volcado de datos para la tabla `equiporep`
--

INSERT INTO `equiporep` (`id`, `idreporte`, `cuenta`, `contrasena`, `idmarca`, `modelo`, `mac`) VALUES
(4, 0, 'qwer', 'qwerty', 5, 'werty', 'wertyu'),
(9, 21, 'qwert', 'qwert', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(10, 22, 'qwer', 'wer', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(11, 23, 'asd', 'sdg', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(12, 24, 'asd', 'rewq', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(13, 25, 'aasd', 'qwe', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(14, 26, 'aasd', 'qwe', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(15, 27, 'asdf', 'qwe', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(16, 28, 'aasd', 'qwe', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(17, 29, 'aasd', 'qwe', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(18, 30, 'dfg', 'rewq', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(19, 31, 'qwert', '234567', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(20, 32, 'qwert', '234567', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(21, 33, 'qwr', 'of', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(22, 34, 'qwr', 'of', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(23, 35, 'qefwqwg', 'qwef', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(24, 36, 'ojdos', 'sdmfg', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(25, 37, 'sdfg', '1345', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(26, 38, 'Director', 'ert', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(27, 39, 'hu', 'v', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(28, 40, 'AdminTropi', NULL, 5, 'avabaab', NULL),
(29, 41, 'sadkbvqsj', NULL, 5, 'u', NULL),
(31, 43, 'sAVSDVA', 'asdf', 5, 'HP Compaq 6005 Pro SFF PC', 'D4:85:64:B6:FC:C4'),
(32, 44, 'enrique.lopezm', 'vvbds', 5, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(33, 45, 'enrique.lopezm', NULL, 5, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(34, 46, 'enrique.lopezm', NULL, 5, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(35, 47, 'enrique.lopezm', NULL, 12, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(36, 48, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(37, 49, 'iuytrewdvh', NULL, 18, 'jrtmtrmtrm', NULL),
(38, 50, 'enrique.lopezm', NULL, 9, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(39, 51, 'enrique.lopezm', 's', 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(40, 52, 'enrique.lopezm', NULL, 3, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(41, 53, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(42, 54, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(43, 55, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(44, 56, 'enrique.lopezm', NULL, 1, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(45, 57, 'enrique.lopezm', NULL, 11, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(46, 58, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(47, 59, 'enrique.lopezm', NULL, 10, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(48, 60, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(49, 61, 'enrique.lopezm', NULL, 11, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(50, 62, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(51, 63, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(52, 64, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(53, 65, 'enrique.lopezm', 'ddddddd', 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(54, 66, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(55, 67, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(56, 68, 'enrique.lopezm', NULL, 10, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(57, 69, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(58, 70, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(59, 71, 'enrique.lopezm', NULL, 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(60, 72, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(63, 75, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(64, 76, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(65, 77, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(66, 78, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(68, 80, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(70, 82, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(71, 83, 'dsfa', NULL, 6, 'sdvv98687', NULL),
(72, 84, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(73, 85, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(74, 86, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(75, 87, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(76, 88, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(77, 89, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(78, 90, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(79, 91, 'enrique.lopezm', NULL, 5, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(80, 92, 'enrique.lopezm', NULL, 5, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(82, 94, 'enrique.lopezm', NULL, 3, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(83, 95, 'enrique.lopezm', NULL, 3, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(85, 97, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(86, 98, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(87, 99, 'enrique.lopezm', NULL, 14, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(88, 100, 'enrique.lopezm', NULL, 14, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(89, 101, 'enrique.lopezm', NULL, 14, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(90, 102, 'enrique.lopezm', NULL, 14, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(91, 103, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(92, 104, 'enrique.lopezm', NULL, 23, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(93, 105, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(94, 106, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(96, 108, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(97, 109, 'enrique.lopezm', NULL, 4, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(98, 110, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(99, 111, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(101, 113, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(102, 114, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(103, 115, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(104, 116, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(105, 117, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(106, 118, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(107, 119, 'enrique.lopezm', NULL, 2, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(108, 120, 'enrique.lopezm', NULL, 2, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(109, 121, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(110, 122, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(111, 123, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(112, 124, 'enrique.lopezm', NULL, 19, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(113, 125, 'enrique.lopezm', NULL, 9, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(114, 126, 'enrique.lopezm', NULL, 9, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(115, 127, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(116, 128, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(117, 129, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(118, 130, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(119, 131, 'enrique.lopezm', NULL, 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(120, 132, 'enrique.lopezm', NULL, 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(121, 133, 'enrique.lopezm', NULL, 3, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(122, 134, 'enrique.lopezm', NULL, 3, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(123, 135, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(124, 136, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(126, 138, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(127, 139, 'enrique.lopezm', NULL, 18, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(128, 140, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(129, 141, 'enrique.lopezm', NULL, 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(130, 142, 'enrique.lopezm', '8765432', 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(131, 143, 'enrique.lopezm', '8765432', 13, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(132, 144, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(133, 145, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(134, 146, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(135, 147, 'enrique.lopezm', NULL, 17, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(140, 152, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(141, 153, 'enrique.lopezm', NULL, 8, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(142, 154, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(143, 155, 'enrique.lopezm', NULL, 16, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(146, 158, 'enrique.lopezm', NULL, 7, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(147, 159, 'enrique.lopezm', NULL, 7, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(148, 160, 'afghj', NULL, 17, 'hfgnfbs', NULL),
(149, 161, 'afghj', NULL, 17, 'hfgnfbs', NULL),
(150, 162, 'enrique.lopezm', NULL, 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(151, 163, 'enrique.lopezm', NULL, 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(152, 164, 'enrique.lopezm', 'qwerty', 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(153, 165, 'enrique.lopezm', 'qwerty', 6, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(154, 166, 'enrique.lopezm', 'ert', 1, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37'),
(155, 167, 'enrique.lopezm', 'ert', 1, 'HP Compaq 6005 Pro SFF PC', '2C:41:38:AC:EA:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idtipo` int(14) unsigned NOT NULL,
  `idmarca` int(14) unsigned NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `numdeserie` varchar(100) NOT NULL,
  `etiqueta` varchar(100) NOT NULL,
  `id_reporte` int(14) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmarca` (`idmarca`),
  KEY `idtipo` (`idtipo`),
  KEY `id` (`id`),
  KEY `id_reporte` (`id_reporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `idtipo`, `idmarca`, `modelo`, `numdeserie`, `etiqueta`, `id_reporte`) VALUES
(1, 2, 5, '8888', '8888', '8888', 0),
(2, 5, 22, 'Modificado', '0120384', 'COMPAQ 6005 PRO BUSI', 0),
(5, 3, 3, 'DELL', '0120384', 'OPTIPLEX 780', 0),
(6, 5, 3, 'HEWLETT PACKARD', '0120384', 'COMPAQ DC5850 BUSINE', 0),
(7, 4, 9, '777', '7777', '7777', 0),
(8, 5, 12, 'yuuuuu', 'juujjjj', 'uuuuu', 0),
(23, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'proximamente', 0),
(24, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'proximamente', 0),
(25, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(26, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(27, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(28, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(29, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(30, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(31, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(32, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(33, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(34, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(35, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(36, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(37, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(38, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(39, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(40, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(41, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(42, 5, 5, 'avabaab', 'nher242', 'no definido', 0),
(43, 5, 5, 'u', 'gsoi', 'no definido', 0),
(44, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL0481M00', 'no definido', 0),
(45, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(46, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(47, 5, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(48, 9, 12, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(49, 13, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(50, 6, 18, 'jrtmtrmtrm', 'nhewrtwntn', 'no definido', 0),
(51, 2, 9, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(52, 9, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(53, 3, 3, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(54, 1, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(55, 1, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(56, 1, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(57, 11, 1, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(58, 6, 11, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(59, 4, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(60, 4, 10, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(61, 2, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(62, 1, 11, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(63, 10, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(64, 8, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(65, 8, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(66, 13, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(67, 4, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(68, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(69, 2, 10, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(70, 1, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(71, 1, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(72, 11, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(73, 4, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(74, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(75, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(76, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(77, 2, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(78, 6, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(79, 5, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(80, 1, 6, 'sdvv98687', 'asfgas', 'no definido', 0),
(81, 13, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(82, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(83, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(84, 2, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(85, 2, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(86, 8, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(87, 8, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(88, 4, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(89, 4, 5, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(90, 2, 3, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(91, 2, 3, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(92, 14, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(93, 14, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(94, 3, 14, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(95, 3, 14, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(96, 3, 14, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(97, 3, 14, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 0),
(98, 8, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 103),
(99, 8, 23, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 104),
(100, 11, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 105),
(101, 11, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 106),
(102, 6, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 108),
(103, 6, 4, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 109),
(104, 2, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 110),
(105, 2, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 111),
(106, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 113),
(107, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 114),
(108, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 115),
(109, 4, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 116),
(110, 9, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 117),
(111, 9, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 118),
(112, 10, 2, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 119),
(113, 10, 2, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 120),
(114, 11, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 121),
(115, 11, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 122),
(116, 11, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 123),
(117, 11, 19, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 124),
(118, 11, 9, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 125),
(119, 11, 9, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 126),
(120, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 127),
(121, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 128),
(122, 8, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 129),
(123, 8, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 130),
(124, 1, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 131),
(125, 1, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 132),
(126, 4, 3, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 133),
(127, 4, 3, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 134),
(128, 8, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 135),
(129, 8, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 136),
(130, 8, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 138),
(131, 8, 18, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 139),
(132, 2, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 140),
(133, 2, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 141),
(134, 2, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 142),
(135, 2, 13, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 143),
(136, 8, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 144),
(137, 8, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 145),
(138, 8, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 146),
(139, 8, 17, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 147),
(140, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 152),
(141, 2, 8, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 153),
(142, 4, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 154),
(143, 4, 16, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 155),
(144, 8, 7, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 158),
(145, 8, 7, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 159),
(146, 2, 17, 'hfgnfbs', 'ffdgsdsdf', 'no definido', 160),
(147, 2, 17, 'hfgnfbs', 'ffdgsdsdf', 'no definido', 161),
(148, 2, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 162),
(149, 2, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 163),
(150, 5, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 164),
(151, 5, 6, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 165),
(152, 5, 1, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 166),
(153, 5, 1, 'HP Compaq 6005 Pro SFF PC', 'MXL1490PLB', 'no definido', 167);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposrecibidos`
--

CREATE TABLE IF NOT EXISTS `equiposrecibidos` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idequipo` int(14) unsigned NOT NULL,
  `idreporte` int(14) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=135 ;

--
-- Volcado de datos para la tabla `equiposrecibidos`
--

INSERT INTO `equiposrecibidos` (`id`, `idequipo`, `idreporte`) VALUES
(1, 1, 4),
(2, 2, 6),
(4, 23, 21),
(5, 24, 22),
(6, 25, 23),
(7, 26, 24),
(8, 27, 25),
(9, 28, 26),
(10, 29, 27),
(11, 30, 28),
(12, 31, 29),
(13, 32, 30),
(14, 33, 31),
(15, 34, 32),
(16, 35, 33),
(17, 36, 34),
(18, 37, 35),
(19, 38, 36),
(20, 39, 37),
(21, 40, 38),
(22, 41, 39),
(23, 42, 40),
(24, 43, 41),
(25, 44, 43),
(26, 45, 44),
(27, 46, 45),
(28, 47, 46),
(29, 48, 47),
(30, 49, 48),
(31, 50, 49),
(32, 51, 50),
(33, 52, 51),
(34, 53, 52),
(35, 54, 53),
(36, 55, 54),
(37, 56, 55),
(38, 57, 56),
(39, 58, 57),
(40, 59, 58),
(41, 60, 59),
(42, 61, 60),
(43, 62, 61),
(44, 63, 62),
(45, 64, 63),
(46, 65, 64),
(47, 66, 65),
(48, 67, 66),
(49, 68, 67),
(50, 69, 68),
(51, 70, 69),
(52, 71, 70),
(53, 72, 71),
(54, 73, 72),
(55, 74, 75),
(56, 75, 76),
(57, 76, 77),
(58, 77, 78),
(59, 78, 80),
(60, 79, 82),
(61, 80, 83),
(62, 81, 84),
(63, 82, 85),
(64, 83, 86),
(65, 84, 87),
(66, 85, 88),
(67, 86, 89),
(68, 87, 90),
(69, 88, 91),
(70, 89, 92),
(71, 90, 94),
(72, 91, 95),
(73, 92, 97),
(74, 93, 98),
(75, 94, 99),
(76, 95, 100),
(77, 96, 101),
(78, 97, 102),
(79, 98, 103),
(80, 99, 104),
(81, 100, 105),
(82, 101, 106),
(83, 102, 108),
(84, 103, 109),
(85, 104, 110),
(86, 105, 111),
(87, 106, 113),
(88, 107, 114),
(89, 108, 115),
(90, 109, 116),
(91, 110, 117),
(92, 111, 118),
(93, 112, 119),
(94, 113, 120),
(95, 114, 121),
(96, 115, 122),
(97, 116, 123),
(98, 117, 124),
(99, 118, 125),
(100, 119, 126),
(101, 120, 127),
(102, 121, 128),
(103, 122, 129),
(104, 123, 130),
(105, 124, 131),
(106, 125, 132),
(107, 126, 133),
(108, 127, 134),
(109, 128, 135),
(110, 129, 136),
(111, 130, 138),
(112, 131, 139),
(113, 132, 140),
(114, 133, 141),
(115, 134, 142),
(116, 135, 143),
(117, 136, 144),
(118, 137, 145),
(119, 138, 146),
(120, 139, 147),
(121, 140, 152),
(122, 141, 153),
(123, 142, 154),
(124, 143, 155),
(125, 144, 158),
(126, 145, 159),
(127, 146, 160),
(128, 147, 161),
(129, 148, 162),
(130, 149, 163),
(131, 150, 164),
(132, 151, 165),
(133, 152, 166),
(134, 153, 167);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialatencion`
--

CREATE TABLE IF NOT EXISTS `historialatencion` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(14) unsigned NOT NULL,
  `idatencionreportes` int(14) unsigned NOT NULL,
  `idactividad_uno` int(14) unsigned NOT NULL,
  `idactividad_dos` int(11) NOT NULL,
  `idactividad_tres` int(11) NOT NULL,
  `comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idactividades` (`idactividad_uno`),
  KEY `idatencionreportes` (`idatencionreportes`),
  KEY `FK_historialatencion_reporte` (`idreporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `historialatencion`
--

INSERT INTO `historialatencion` (`id`, `idreporte`, `idatencionreportes`, `idactividad_uno`, `idactividad_dos`, `idactividad_tres`, `comentario`) VALUES
(1, 4, 1, 1, 0, 0, 'hhh'),
(2, 153, 153, 1, 0, 0, 'qwerty'),
(3, 153, 153, 1, 0, 0, 'asdfghj'),
(4, 158, 158, 1, 3, 3, 'prueba'),
(5, 162, 162, 1, 13, 13, 'prueba'),
(6, 165, 165, 1, 13, 13, 'qwwertt'),
(7, 165, 165, 1, 13, 13, 'qwyyy'),
(8, 165, 165, 1, 13, 13, 'prueba 165');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresorarep`
--

CREATE TABLE IF NOT EXISTS `impresorarep` (
  `idreporte` int(14) unsigned NOT NULL,
  `ip` varchar(100) NOT NULL,
  `idmarca` int(14) unsigned NOT NULL,
  `idmodelo` int(14) unsigned NOT NULL,
  PRIMARY KEY (`idreporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`) VALUES
(1, 'BOXLIGHT'),
(2, 'CANON '),
(3, 'DELL'),
(4, 'ZEBRA'),
(5, 'HP'),
(6, 'HP COMPAQ'),
(7, 'IBM'),
(8, 'ISB SOLA BASIC '),
(9, 'LANIX'),
(10, 'LENOVO'),
(11, 'LEXMARK '),
(12, 'LG'),
(13, 'LIVERDOL'),
(14, 'NEC'),
(15, 'OKI'),
(16, 'SAMSUNG '),
(17, 'TOSHIBA '),
(18, 'TRIPP LITE'),
(19, 'UNITECH'),
(20, 'XEROX'),
(21, 'BENQ'),
(22, 'EPSON'),
(23, 'VIEW SONIC'),
(24, 'PHILLIPS'),
(25, 'KEMEX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idtiporeporte` int(14) unsigned DEFAULT NULL,
  `idClase` int(14) unsigned DEFAULT NULL,
  `idusuario` int(14) unsigned DEFAULT NULL,
  `ipcaptura` varchar(15) NOT NULL,
  `telefono` int(12) unsigned NOT NULL,
  `extencion` varchar(5) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL,
  `contraCorreo` varchar(25) DEFAULT NULL,
  `prioridad` varchar(50) DEFAULT NULL,
  `fechaRecep` date NOT NULL,
  `horaRecep` time NOT NULL,
  `folio` varchar(25) NOT NULL,
  `clasificacion` varchar(25) DEFAULT NULL,
  `id_unidad` int(14) unsigned NOT NULL,
  `idarea` int(14) unsigned NOT NULL,
  `personaquereporta` varchar(100) NOT NULL,
  `equiporecibido` varchar(100) DEFAULT NULL,
  `problema` char(100) NOT NULL,
  `recibido` varchar(30) DEFAULT NULL,
  `fechaEnt` date DEFAULT NULL,
  `horaEnt` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idtiporeporte` (`idtiporeporte`),
  KEY `idarea` (`idarea`),
  KEY `idusuario` (`idusuario`),
  KEY `id_unidad` (`id_unidad`),
  KEY `idClase` (`idClase`),
  KEY `idClase_2` (`idClase`),
  KEY `idClase_3` (`idClase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=168 ;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id`, `idtiporeporte`, `idClase`, `idusuario`, `ipcaptura`, `telefono`, `extencion`, `correo`, `contraCorreo`, `prioridad`, `fechaRecep`, `horaRecep`, `folio`, `clasificacion`, `id_unidad`, `idarea`, `personaquereporta`, `equiporecibido`, `problema`, `recibido`, `fechaEnt`, `horaEnt`) VALUES
(4, 1, 1, 19, '192.56.45.32', 3, '', '', '', 'Unidad', '2015-08-04', '10:55:00', 'A15', 'Reporte', 35, 1, 'Juan Perez', 'PC', 'No enciende', 'eerrrrrr', '2015-06-07', '18:30:58'),
(6, 1, 2, 19, '192.67.89.65', 0, '', '', '', 'Hospital', '2015-08-17', '10:55:00', 'A15', '', 1, 3, 'Juan Perez', 'PC', 'No encioende', '', '0000-00-00', '00:00:00'),
(21, NULL, NULL, NULL, '11.105.33.32', 0, 'ertyu', 'werty', 'qwerty', NULL, '0000-00-00', '00:00:00', 'E15', NULL, 5, 5, 'werty', NULL, 'SE APAGA', NULL, NULL, NULL),
(22, NULL, NULL, NULL, '11.105.33.32', 65432, '4321', 'asdqwerg@fgb', '234th', NULL, '0000-00-00', '00:00:00', 'E15', NULL, 5, 5, 'yo', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(23, NULL, NULL, NULL, '11.105.33.32', 54321, '12345', 'ad@wdfgh', '2345234', NULL, '2015-11-02', '07:37:19', 'E15-23', NULL, 5, 5, 'yo 2 veces', NULL, 'SE APAGA', NULL, NULL, NULL),
(24, NULL, NULL, NULL, '11.105.33.32', 43213456, '1234', 'sdf@wert', '654321', NULL, '2015-11-02', '07:52:21', 'E15-24', NULL, 5, 5, 'yo 3', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(25, NULL, NULL, NULL, '11.105.33.32', 123456, '23456', '654@ergh', '234567', NULL, '2015-11-02', '08:05:05', 'E15-25', NULL, 5, 5, 'ytrewqazxc', NULL, 'SE APAGA', NULL, NULL, NULL),
(26, NULL, NULL, NULL, '11.105.33.32', 123456, '23456', '654@ergh', '234567', NULL, '2015-11-02', '08:05:09', 'E15-26', NULL, 5, 5, 'ytrewqazxc', NULL, 'SE APAGA', NULL, NULL, NULL),
(27, NULL, NULL, NULL, '11.105.33.32', 0, '65432', 'qwerty@wer', '23456', NULL, '2015-11-02', '08:06:20', 'E15-27', NULL, 5, 5, '34567', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(28, NULL, NULL, NULL, '11.105.33.32', 123456, '23456', '654@ergh', '234567', NULL, '2015-11-02', '08:07:39', 'E15-28', NULL, 5, 5, 'ytrewqazxc', NULL, 'SE APAGA', NULL, NULL, NULL),
(29, NULL, NULL, NULL, '11.105.33.32', 123456, '23456', '654@ergh', '234567', NULL, '2015-11-02', '08:07:39', 'E15-29', NULL, 5, 5, 'ytrewqazxc', NULL, 'SE APAGA', NULL, NULL, NULL),
(30, NULL, NULL, NULL, '11.105.33.32', 1234567654, '23456', 'sdf@wergh', '234567', NULL, '2015-11-02', '08:12:23', 'E15-30', NULL, 5, 5, 'htrew', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(31, NULL, NULL, NULL, '11.105.33.32', 543, '23456', 'asd@hgf', '234568', NULL, '2015-11-02', '08:16:10', 'E15-31', NULL, 5, 5, 'yuiogfd', NULL, 'SE APAGA', NULL, NULL, NULL),
(32, NULL, NULL, NULL, '11.105.33.32', 543, '23456', 'asd@hgf', '234568', NULL, '2015-11-02', '08:16:17', 'E15-32', NULL, 5, 5, 'yuiogfd', NULL, 'SE APAGA', NULL, NULL, NULL),
(33, NULL, NULL, NULL, '11.105.33.32', 234567, '123', 'asd@sdf', 'adfr4', NULL, '2015-11-05', '22:25:21', 'E15-33', NULL, 5, 5, 'yo', NULL, 'SE APAGA', NULL, NULL, NULL),
(34, NULL, NULL, NULL, '11.105.33.32', 234567, '123', 'asd@sdf', 'adfr4', NULL, '2015-11-05', '22:25:38', 'E15-34', NULL, 5, 5, 'yo', NULL, 'SE APAGA', NULL, NULL, NULL),
(35, NULL, NULL, NULL, '11.105.33.32', 2345678, '12345', 'gfd@jk', 'qwertu', NULL, '2015-11-05', '22:28:07', 'E15-35', NULL, 5, 5, 'jhgfds', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(36, NULL, NULL, NULL, '11.105.33.32', 2345, '23456', 'gds@sdfg', 'sdfgy3', NULL, '2015-11-06', '20:16:48', 'E15-36', NULL, 5, 5, 'ytrdv', NULL, 'SE APAGA', NULL, NULL, NULL),
(37, NULL, NULL, NULL, '11.105.33.32', 6543, '543', 'qwe@werg', '34567', NULL, '2015-11-06', '20:20:53', 'E15-37', NULL, 5, 5, 'bvcxz', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(38, NULL, NULL, NULL, '11.105.33.32', 876543, '6trew', 'sdf@sdfg|', 'wertyu', NULL, '2015-11-08', '19:07:45', 'E15-38', NULL, 5, 5, 'prueba form1', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(39, NULL, NULL, NULL, '11.105.33.32', 0, '23456', 'adsdf@d', 'vyuck', NULL, '2015-11-08', '19:29:35', 'E15-39', NULL, 5, 5, 'oidoohw', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(40, NULL, NULL, NULL, '11.105.33.32', 123456789, '12345', 'zxcfre@ft', 'sdfty64', NULL, '2015-11-08', '20:01:26', 'E15-40', NULL, 5, 5, 'prueba form2', NULL, 'fallla', NULL, NULL, NULL),
(41, NULL, NULL, NULL, '11.105.33.32', 987654, '1234', 'SKNVS@DFMVGN', 'CKH9VSDB', NULL, '2015-11-08', '20:15:07', 'E15-41', NULL, 5, 5, 'oypyoypyo', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(43, NULL, NULL, NULL, '11.105.33.32', 9765432, '12345', 'xcwa@sdfg', 'w23fg', NULL, '2015-11-08', '20:43:11', 'E15-43', NULL, 5, 5, 'bnb', NULL, 'cccccccccccccccccccc', NULL, NULL, NULL),
(44, NULL, NULL, NULL, '11.43.33.190', 123456, 'qwert', 'dfwg@dfgh', '34rtyh', NULL, '2015-11-09', '01:59:01', 'E15-44', NULL, 5, 5, 'sdfg', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(45, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '03:36:25', 'E15-45', NULL, 9, 5, 'id unidad', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(46, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '03:41:57', 'E15-46', NULL, 7, 8, 'id_area', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(47, NULL, NULL, NULL, '11.43.33.190', 987654324, NULL, NULL, NULL, NULL, '2015-11-09', '03:49:07', 'E15-47', NULL, 7, 5, 'id_tipo y marca', NULL, 'un problemita', NULL, NULL, NULL),
(48, NULL, NULL, NULL, '11.43.33.190', 987654, NULL, NULL, NULL, NULL, '2015-11-09', '05:32:46', 'E15-48', NULL, 7, 5, 'err', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(49, NULL, NULL, NULL, '11.105.33.32', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '05:35:24', 'E15-49', NULL, 9, 3, 'yuiji', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(50, NULL, NULL, NULL, '11.43.33.190', 8765467, NULL, NULL, NULL, NULL, '2015-11-09', '05:39:37', 'E15-50', NULL, 13, 5, 'yujg', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(51, NULL, NULL, NULL, '11.43.33.190', 34567543, NULL, NULL, NULL, NULL, '2015-11-09', '05:43:15', 'E15-51', NULL, 8, 4, 'trew', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(52, NULL, NULL, NULL, '11.43.33.190', 9833478, NULL, NULL, NULL, NULL, '2015-11-09', '05:51:16', 'E15-52', NULL, 6, 4, 'sddddd', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(53, NULL, NULL, NULL, '11.43.33.190', 4347832, NULL, NULL, NULL, NULL, '2015-11-09', '05:54:03', 'E15-53', NULL, 9, 4, 'css', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(54, NULL, NULL, NULL, '11.43.33.190', 983678999, NULL, NULL, NULL, NULL, '2015-11-09', '05:58:56', 'E15-54', NULL, 36, 3, 'qwertyu', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(55, NULL, NULL, NULL, '11.43.33.190', 23462456, NULL, NULL, NULL, NULL, '2015-11-09', '06:01:10', 'E15-55', NULL, 39, 5, 'ddddd', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(56, NULL, NULL, NULL, '11.43.33.190', 0, NULL, NULL, NULL, NULL, '2015-11-09', '06:02:57', 'E15-56', NULL, 12, 3, 'bnbbnm', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(57, NULL, NULL, NULL, '11.43.33.190', 87654321, NULL, 'qwerty@wer', 'ddfrdfg', NULL, '2015-11-09', '06:09:14', 'E15-57', NULL, 6, 5, 'erter', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(58, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '06:12:44', 'E15-58', NULL, 50, 4, 'rewww', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(59, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '06:25:31', 'E15-59', NULL, 14, 2, 'eeeeeeee', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(60, NULL, NULL, NULL, '11.43.33.190', 9876543, NULL, NULL, NULL, NULL, '2015-11-09', '06:29:07', 'E15-60', NULL, 169, 4, 'bngggg', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(61, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-09', '06:31:12', 'E15-61', NULL, 20, 2, '23456', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(62, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-09', '06:40:17', 'E15-62', NULL, 20, 2, 'eefght', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(63, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-09', '06:41:52', 'E15-63', NULL, 13, 4, 'sasa', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(64, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-09', '06:43:51', 'E15-64', NULL, 13, 4, 'sasa', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(65, NULL, NULL, NULL, '11.43.33.190', 765432, NULL, NULL, NULL, NULL, '2015-11-09', '06:45:35', 'E15-65', NULL, 14, 6, 'xfscfesxcfre', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(66, NULL, NULL, NULL, '11.43.33.190', 87654356, NULL, NULL, NULL, NULL, '2015-11-09', '06:51:54', 'E15-66', NULL, 6, 2, 'rewww', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(67, NULL, NULL, NULL, '11.43.33.190', 87654324, NULL, NULL, NULL, NULL, '2015-11-09', '06:55:56', 'E15-67', NULL, 5, 2, 'rrrr', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(68, NULL, NULL, NULL, '11.43.33.190', 876543, NULL, NULL, NULL, NULL, '2015-11-09', '07:02:29', 'E15-68', NULL, 5, 2, 'tup', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(69, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '07:04:26', 'E15-69', NULL, 8, 7, 'xcfrews', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(70, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '07:08:41', 'E15-70', NULL, 36, 4, 'sddddd', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(71, NULL, NULL, NULL, '11.43.33.190', 9765453, NULL, NULL, NULL, NULL, '2015-11-09', '07:19:00', 'E15-71', NULL, 10, 5, 'dsafasfa', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(72, NULL, NULL, NULL, '11.43.33.190', 76543, NULL, NULL, NULL, NULL, '2015-11-09', '07:26:24', 'E15-72', NULL, 9, 7, 'aa', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(75, NULL, NULL, NULL, '11.43.33.190', 63346, NULL, NULL, NULL, NULL, '2015-11-09', '08:03:51', 'E15-75', NULL, 36, 7, 'savsas', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(76, NULL, NULL, NULL, '11.43.33.190', 63346, NULL, NULL, NULL, NULL, '2015-11-09', '08:03:56', 'E15-76', NULL, 36, 7, 'savsas', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(77, NULL, NULL, NULL, '11.43.33.190', 63346, NULL, NULL, NULL, NULL, '2015-11-09', '08:03:58', 'E15-77', NULL, 36, 7, 'savsas', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(78, NULL, NULL, NULL, '11.43.33.190', 85634523, NULL, NULL, NULL, NULL, '2015-11-09', '08:05:53', 'E15-78', NULL, 36, 5, 'safsa', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(80, NULL, NULL, NULL, '11.43.33.190', 654378, NULL, NULL, NULL, NULL, '2015-11-09', '08:07:17', 'E15-80', NULL, 39, 5, 'VDVDA', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(82, NULL, NULL, NULL, '11.43.33.190', 3126325775, NULL, NULL, NULL, NULL, '2015-11-09', '08:20:27', 'E15-82', NULL, 7, 4, 'dasdA', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(83, NULL, NULL, NULL, '11.105.33.32', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '08:24:52', 'E15-83', NULL, 10, 6, 'sfs', NULL, 'NO INICIA SESION', NULL, NULL, NULL),
(84, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '15:54:56', 'E15-84', NULL, 6, 5, 'dasdas', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(85, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '15:57:30', 'E15-85', NULL, 12, 3, 'csc', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(86, NULL, NULL, NULL, '11.43.33.190', 987654356, NULL, NULL, NULL, NULL, '2015-11-09', '16:25:16', 'E15-86', NULL, 6, 5, 'fdsfaf', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(87, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '16:27:28', 'E15-87', NULL, 9, 2, 'hfdshs', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(88, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '16:27:28', 'E15-88', NULL, 9, 2, 'hfdshs', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(89, NULL, NULL, NULL, '11.43.33.190', 87467, NULL, NULL, NULL, NULL, '2015-11-09', '16:31:23', 'E15-89', NULL, 8, 2, 'gdfshs', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(90, NULL, NULL, NULL, '11.43.33.190', 87467, NULL, NULL, NULL, NULL, '2015-11-09', '16:31:23', 'E15-90', NULL, 8, 2, 'gdfshs', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(91, NULL, NULL, NULL, '11.43.33.190', 654334, NULL, NULL, NULL, NULL, '2015-11-09', '16:33:57', 'E15-91', NULL, 5, 1, 'wrorw', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(92, NULL, NULL, NULL, '11.43.33.190', 654334, NULL, NULL, NULL, NULL, '2015-11-09', '16:33:58', 'E15-92', NULL, 5, 1, 'wrorw', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(94, NULL, NULL, NULL, '11.43.33.190', 763754745, NULL, NULL, NULL, NULL, '2015-11-09', '16:36:12', 'E15-94', NULL, 5, 5, 'fgewgw', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(95, NULL, NULL, NULL, '11.43.33.190', 763754745, NULL, NULL, NULL, NULL, '2015-11-09', '16:36:12', 'E15-95', NULL, 5, 5, 'fgewgw', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(97, NULL, NULL, NULL, '11.43.33.190', 876543, NULL, NULL, NULL, NULL, '2015-11-09', '16:39:57', 'E15-97', NULL, 62, 1, 'pooo', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(98, NULL, NULL, NULL, '11.43.33.190', 876543, NULL, NULL, NULL, NULL, '2015-11-09', '16:39:57', 'E15-98', NULL, 62, 1, 'pooo', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(99, NULL, NULL, NULL, '11.43.33.190', 9876543, NULL, NULL, NULL, NULL, '2015-11-09', '17:23:49', 'E15-99', NULL, 11, 3, 'ccccc', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(100, NULL, NULL, NULL, '11.43.33.190', 9876543, NULL, NULL, NULL, NULL, '2015-11-09', '17:23:50', 'E15-100', NULL, 11, 3, 'ccccc', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(101, NULL, NULL, NULL, '11.43.33.190', 9876543, NULL, NULL, NULL, NULL, '2015-11-09', '17:23:50', 'E15-101', NULL, 11, 3, 'ccccc', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(102, NULL, NULL, NULL, '11.43.33.190', 9876543, NULL, NULL, NULL, NULL, '2015-11-09', '17:23:50', 'E15-102', NULL, 11, 3, 'ccccc', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(103, NULL, NULL, NULL, '11.43.33.190', 8732, NULL, NULL, NULL, NULL, '2015-11-09', '17:43:19', 'E15-103', NULL, 9, 3, 'dasda', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(104, NULL, NULL, NULL, '11.43.33.190', 8732, NULL, NULL, NULL, NULL, '2015-11-09', '17:43:20', 'E15-104', NULL, 9, 3, 'dasda', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(105, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '17:54:43', 'E15-105', NULL, 6, 4, 'sds', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(106, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '17:54:43', 'E15-106', NULL, 6, 4, 'sds', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(108, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:04:38', 'E15-108', NULL, 6, 3, 'vdsfawgjt', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(109, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:04:39', 'E15-109', NULL, 6, 3, 'vdsfawgjt', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(110, 3, 63, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, 'Oficina', '2015-11-09', '18:06:48', 'E15-110', 'Reporte', 5, 6, 'xzvx', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(111, NULL, NULL, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, NULL, '2015-11-09', '18:06:48', 'E15-111', NULL, 5, 6, 'xzvx', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(113, NULL, NULL, NULL, '11.43.33.190', 73234678, NULL, NULL, NULL, NULL, '2015-11-09', '18:09:09', 'E15-113', NULL, 10, 5, 'sdvd', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(114, NULL, NULL, NULL, '11.43.33.190', 73234678, NULL, NULL, NULL, NULL, '2015-11-09', '18:09:09', 'E15-114', NULL, 10, 5, 'sdvd', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(115, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:11:17', 'E15-115', NULL, 21, 1, '98765432', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(116, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:11:18', 'E15-116', NULL, 21, 1, '98765432', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(117, 1, 10, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, 'Unidad', '2015-11-09', '18:16:53', 'E15-117', 'Reporte', 14, 4, 'ccxzcxz', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(118, NULL, NULL, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, NULL, '2015-11-09', '18:16:53', 'E15-118', NULL, 14, 4, 'ccxzcxz', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(119, NULL, NULL, NULL, '11.43.33.190', 543543465, NULL, NULL, NULL, NULL, '2015-11-09', '18:18:50', 'E15-119', NULL, 7, 3, 'dsada', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(120, NULL, NULL, NULL, '11.43.33.190', 543543465, NULL, NULL, NULL, NULL, '2015-11-09', '18:18:50', 'E15-120', NULL, 7, 3, 'dsada', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(121, NULL, NULL, NULL, '11.43.33.190', 65495978, NULL, NULL, NULL, NULL, '2015-11-09', '18:21:45', 'E15-121', NULL, 73, 4, 'dasdas', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(122, NULL, NULL, NULL, '11.43.33.190', 65495978, NULL, NULL, NULL, NULL, '2015-11-09', '18:21:46', 'E15-122', NULL, 73, 4, 'dasdas', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(123, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:41:00', 'E15-123', NULL, 35, 6, 'poikj', NULL, 'plpkpj', NULL, NULL, NULL),
(124, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '18:41:01', 'E15-124', NULL, 35, 6, 'poikj', NULL, 'plpkpj', NULL, NULL, NULL),
(125, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '19:57:03', 'E15-125', NULL, 9, 5, 'fgdfgsd', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(126, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-09', '19:57:03', 'E15-126', NULL, 9, 5, 'fgdfgsd', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(127, NULL, NULL, NULL, '11.43.33.190', 96574375, NULL, NULL, NULL, NULL, '2015-11-09', '19:58:29', 'E15-127', NULL, 22, 2, 'czx<cz', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(128, NULL, NULL, NULL, '11.43.33.190', 96574375, NULL, NULL, NULL, NULL, '2015-11-09', '19:58:30', 'E15-128', NULL, 22, 2, 'czx<cz', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(129, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:40:49', 'E15-129', NULL, 6, 2, 'fvbhyfcvb', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(130, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:40:50', 'E15-130', NULL, 6, 2, 'fvbhyfcvb', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(131, NULL, NULL, NULL, '11.43.33.190', 86543524, NULL, NULL, NULL, NULL, '2015-11-10', '05:42:22', 'E15-131', NULL, 7, 1, 'vvvxgcfgvm', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(132, NULL, NULL, NULL, '11.43.33.190', 86543524, NULL, NULL, NULL, NULL, '2015-11-10', '05:42:22', 'E15-132', NULL, 7, 1, 'vvvxgcfgvm', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(133, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-10', '05:46:58', 'E15-133', NULL, 7, 1, 'vbndfrg', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(134, NULL, NULL, NULL, '11.43.33.190', 4294967295, NULL, NULL, NULL, NULL, '2015-11-10', '05:46:58', 'E15-134', NULL, 7, 1, 'vbndfrg', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(135, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:51:44', 'E15-135', NULL, 5, 4, 'nedbhryf', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(136, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:51:44', 'E15-136', NULL, 5, 4, 'nedbhryf', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(138, NULL, NULL, NULL, '11.43.33.190', 3456789, NULL, NULL, NULL, NULL, '2015-11-10', '05:53:07', 'E15-138', NULL, 9, 2, 'pkjhgf', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(139, NULL, NULL, NULL, '11.43.33.190', 3456789, NULL, NULL, NULL, NULL, '2015-11-10', '05:53:07', 'E15-139', NULL, 9, 2, 'pkjhgf', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(140, NULL, NULL, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, NULL, '2015-11-10', '05:54:41', 'E15-140', NULL, 50, 8, 'bdfn', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(141, NULL, NULL, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, NULL, '2015-11-10', '05:54:42', 'E15-141', NULL, 50, 8, 'bdfn', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(142, NULL, NULL, NULL, '11.43.33.190', 8765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:55:46', 'E15-142', NULL, 6, 2, 'ymynyit', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(143, NULL, NULL, NULL, '11.43.33.190', 8765432, NULL, NULL, NULL, NULL, '2015-11-10', '05:55:46', 'E15-143', NULL, 6, 2, 'ymynyit', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(144, NULL, NULL, NULL, '11.43.33.190', 34567890, NULL, NULL, NULL, NULL, '2015-11-10', '05:57:11', 'E15-144', NULL, 197, 2, 'vdfbsd', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(145, NULL, NULL, NULL, '11.43.33.190', 34567890, NULL, NULL, NULL, NULL, '2015-11-10', '05:57:11', 'E15-145', NULL, 28, 2, 'vdfbsd', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(146, NULL, NULL, NULL, '11.43.33.190', 87654321, NULL, NULL, NULL, NULL, '2015-11-10', '05:58:19', 'E15-146', NULL, 9, 2, 'tjeyjte', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(147, NULL, NULL, NULL, '11.43.33.190', 87654321, NULL, NULL, NULL, NULL, '2015-11-10', '05:58:19', 'E15-147', NULL, 9, 2, 'tjeyjte', NULL, 'NO SIRVE EL CD', NULL, NULL, NULL),
(152, NULL, NULL, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, NULL, '2015-11-10', '18:32:49', 'E15-152', NULL, 8, 2, 'prueba de fuego', NULL, 'fjsdjaaoh', NULL, NULL, NULL),
(153, 1, 8, NULL, '11.43.33.190', 98765432, NULL, NULL, NULL, 'Oficina', '2015-11-10', '18:32:49', 'E15-153', 'Reporte', 8, 2, 'prueba de fuego', NULL, 'fjsdjaaoh', 'Yoony', NULL, '06:26:01'),
(154, 1, 11, NULL, '11.43.33.190', 987654321, NULL, NULL, NULL, 'Oficina', '2015-11-11', '06:00:42', 'E15-154', 'Reporte', 7, 1, 'prueba oficial', NULL, 'NO SIRVE EL CD', 'Prueba 154', NULL, '06:57:33'),
(155, 2, 1, 20, '11.43.33.190', 987654321, NULL, NULL, NULL, 'Unidad', '2015-11-11', '06:00:43', 'E15-155', 'Reporte', 197, 1, 'prueba oficial', NULL, 'NO SIRVE EL CD', 'prueba otro', '2024-11-15', '07:03:30'),
(158, 1, 9, 0, '11.43.33.190', 4567890, NULL, NULL, NULL, 'Oficina', '2015-11-11', '07:34:40', 'E15-158', 'Reporte', 7, 2, 'yyg', NULL, 'NO SIRVE EL CD', 'qwerty', '2024-11-15', '07:06:00'),
(159, 1, 8, 0, '11.43.33.190', 4567890, NULL, NULL, NULL, 'Unidad', '2015-11-11', '07:34:41', 'E15-159', 'Reporte', 7, 2, 'yyg', NULL, 'NO SIRVE EL CD', 'qwertyu', '2015-11-24', '07:09:36'),
(160, NULL, NULL, NULL, '192.168.59.1', 34567890, NULL, NULL, NULL, NULL, '2015-11-11', '07:36:06', 'E15-160', NULL, 8, 2, 'brayan', NULL, 'NO ENCIENDE', NULL, NULL, NULL),
(161, NULL, NULL, NULL, '192.168.59.1', 34567890, NULL, NULL, NULL, NULL, '2015-11-11', '07:36:06', 'E15-161', NULL, 8, 2, 'brayan', NULL, 'NO ENCIENDE', NULL, NULL, NULL),
(162, 1, 8, 0, '11.43.33.190', 663464643, NULL, NULL, NULL, 'Unidad', '2015-11-11', '15:35:31', 'E15-162', 'Reporte', 9, 6, 'bvbss', NULL, 'PROBLEMA OFFICE', 'qwertyu', '2015-11-24', '07:11:14'),
(163, NULL, NULL, NULL, '11.43.33.190', 663464643, NULL, NULL, NULL, NULL, '2015-11-11', '15:35:31', 'E15-163', NULL, 9, 6, 'bvbss', NULL, 'PROBLEMA OFFICE', NULL, NULL, NULL),
(164, NULL, NULL, NULL, '11.43.33.190', 1234567, '123', 'dark_@hotmail.com', 'qwerty', NULL, '2015-11-14', '00:26:55', 'E15-164', NULL, 6, 1, 'qwweerr', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(165, 1, 8, 29, '11.43.33.190', 1234567, '123', 'dark_@hotmail.com', 'qwerty', 'Unidad', '2015-11-14', '00:26:55', 'E15-165', 'Reporte', 6, 1, 'qwweerr', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(166, NULL, NULL, NULL, '11.43.33.190', 4567, '56', 'da@hotmail.com', 'dasfg', NULL, '2015-11-17', '05:28:41', 'E15-166', NULL, 6, 1, '2345', NULL, 'TIENE VIRUS', NULL, NULL, NULL),
(167, NULL, NULL, NULL, '11.43.33.190', 4567, '56', 'da@hotmail.com', 'dasfg', NULL, '2015-11-17', '05:28:41', 'E15-167', NULL, 6, 1, '2345', NULL, 'TIENE VIRUS', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemasrep`
--

CREATE TABLE IF NOT EXISTS `sistemasrep` (
  `idreporte` int(14) unsigned NOT NULL,
  `ipusuario` varchar(50) NOT NULL,
  `idaplicativo` int(14) unsigned NOT NULL,
  PRIMARY KEY (`idreporte`),
  KEY `idaplicativo` (`idaplicativo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `nombre`, `descripcion`) VALUES
(1, 'En reparacion', ''),
(2, 'Garantia', ''),
(3, 'Listo', ''),
(4, 'Entregado', ''),
(5, 'Otro', ''),
(6, 'Nuevo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `matricula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tecnico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`id_tecnico`, `nombre`, `usuario`, `contrasena`, `tipo`, `matricula`) VALUES
(1, 'jjjg', 'ADMIN', '12345', '40', 'jjjjg'),
(2, 'CHACON LUGO ALMA BEATRIZ', 'RECEPCION', '3ebddf9804c556ddfd0e86eb23f59f51', 'RECEPCION', 'RECEPCION'),
(3, 'TAMAYO GOMEZ ERIKA ALEJANDRA', 'IMSS0003', '827ccb0eea8a706c4c34a16891f84e7b', 'SOPORTEB', 'IMSS0003'),
(4, 'KING MARIN EMMA DE LAS MERCEDES', 'IMSS0004', 'ba2c952edc280434d020bfe0120f5852', 'SOPORTEA', 'IMSS0004'),
(5, 'PEREZ UCAN WEYLER ALONSO', 'IMSS0005', '6cc4ac2d1599eadbb58588e6b5723670', 'SOPORTEA', 'IMSS0005'),
(6, 'ORTIZ BACELIS JORGE JESUS', 'IMSS0006', '9e3a1a534b0c3db609d3b9fb0c77d412', 'SOPORTEB', 'IMSS0006'),
(7, 'ARCEO MEDINA ROUSVELT JESUS', 'IMSS0007', '604b9a3ba30177843b392c47686eddda', 'SOPORTEA', 'IMSS0007'),
(8, 'PEREZ CARCAÑO YARA CRISTINA', 'IMSS0008', '91a2aab4ee676a108c26313d07991379', 'SOPORTEA', 'IMSS0008'),
(9, 'FIGUEROA BOLIO OTTO ALEJANDRO', 'IMSS0009', 'ec70e27362010ff877d8bcfc09286a78', 'SOPORTEB', 'IMSS0009'),
(10, 'ROSALES ROSADO IRMA GUADALUPE', 'IMSS0010', '5e04b1ac433e495ec14408854cfa7d20', 'SOPORTEB', 'IMSS0010'),
(11, 'GONZALEZ CETINA MARIA GERTRUDIS', 'IMSS0011', '39fbeeafb0534d09c4fa1e5e0bfc8733', 'SOPORTEB', 'IMSS0011'),
(12, 'LARA NUÑEZ CARLOS ADONAY', 'IMSS0012', '979f8b31f1a2e79a3b0589edc473736b', 'SOPORTEA', 'IMSS0012'),
(13, 'VIANA ORTEGON LIZBETH DEL CARMEN', 'IMSS0013', '7f8f8af359c6cf12049f13953f9c6f63', 'SOPORTEA', 'IMSS0013'),
(14, 'RIBBON CONDE MAURICIA DEL CARMEN', 'IMSS0014', '28cf8d56ebfb1b1638e884207627eb4f', 'SOPORTEB', 'IMSS0014'),
(15, 'ESQUIVEL MOLINA BRIAN ALBERT', 'IMSS0015', 'c40013b93ff7b37a68866cc539c01e94', 'SOPORTEB', 'IMSS0015'),
(16, 'SOSA ALDANA WALTER JOSE', 'IMSS0016', '557db61f3c2bdc940f661276a82d2437', 'SOPORTEB', 'IMSS0016'),
(17, 'CASTILLO CHI MARIA DEL CARMEN', 'IMSS0017', 'da1ac434daaec70f982f6ffc9450b3b3', 'SOPORTEA', 'IMSS0017'),
(18, 'BARRERA LARA JORGE REY', 'IMSS0018', '99e963c3abf75ea2d7c006752d920565', 'SOPORTEA', 'IMSS0018'),
(19, 'DIAZ BARCELO FABIAN', 'IMSS0019', 'e9522e74bcf4c7f3bd733a2c0d03accf', 'SOPORTEB', 'IMSS0019'),
(20, 'AGUILAR BLAS LORENA', 'IMSS0020', 'e52d92ab7f5512bf26b7a283ee1e3a93', 'TELECOM', 'IMSS0020'),
(21, 'GONZALVEZ MORENO RICARDO EMMANUEL', 'IMSS0021', '032cfc13ec791a57a8103a30efbd5df2', 'TELECOM', 'IMSS0021'),
(24, 'KOH CARRILLO RICARDO DE JESUS', 'IMSS0024', '4bc880a85bbee51bd49987daf333c73c', 'TELECOM', 'IMSS0024'),
(25, 'MARTINEZ VILLALOBOS WILLIAM ABEL', 'IMSS0025', '567988cacf395f3c3c237a18a8835181', 'TELECOM', 'IMSS0025'),
(26, 'ECHEVERRIA ACOSTA MIRIAM DEL ROSARIO', 'IMSS0026', 'bee7e7b4f7e2036eda03621883735bc0', 'TELECOM', 'IMSS0026'),
(29, 'TILAN CAUICH CAMILO', 'IMSS0029', 'f0eb521231cdabedf88460ab7baa04cc', 'SOPORTEA', 'IMSS0029'),
(31, 'MORENO HERRERA BENITO', 'IMSS0031', 'b81dcf308e1840f319674c2ac9c4b38b', 'OTRO', 'IMSS0031'),
(32, 'MONTERO VARELA FREDDY JOSE', 'IMSS0032', 'c4ca4238a0b923820dcc509a6f75849b', 'OTRO', 'IMSS0032'),
(34, 'BASTARRACHEA DELVAL IVAN JESUS', 'IMSS0034', '68ce2ca5bb192c84ade6d1e9888aa9e5', 'OTRO', 'IMSS0034'),
(35, 'AGUILAR US VICTOR MANUEL', 'IMSS0035', '91928536216b1cb0d3ecb59b03f3a91f', 'SOPORTEA', 'IMSS0035'),
(38, '*** SOPORTE A', 'SOPORTE A', '7b916ac90d38c311ee00de3a44ddb8c4', 'SOPORTEA', 'SOPORTE A'),
(39, '*** SOPORTE B', 'SOPORTE B', '7B916AC90D38C311EE00DE3A44DDB8C4', 'SOPORTEB', 'SOPORTE B'),
(41, 'RENAN ROSADO ALDANA', 'IMSS0023', '477315a26dda7ca63acb0780a9c5e5a8', 'OTRO', 'IMSS0023'),
(42, 'LUGO TRUJILLO ALEJANDRO', 'IMSS0022', '244EBE07B648FBAF77EEBA39AD07E504', 'ADMIN', 'IMSS0022'),
(43, 'RIBBON CONDE MAURICIA DEL CARMEN', 'GARANTIA', '28cf8d56ebfb1b1638e884207627eb4f', 'GARANTIA', 'GARANTIA'),
(44, 'ANCONA QUINTAL PATRICIA EUGENIA', 'IMSS0030', '4aa12bbe211f9377aba176865a6e2251', 'TELECOM', 'IMSS0030'),
(45, '*** TELECOMYSEG', 'TELECOMYSEG', '7b916ac90d38c311ee00de3a44ddb8c4', 'TELECOM', 'TELECOMYSEG'),
(46, 'NAH GONZALEZ ROLANDO JAVIER', 'IMSS0036', '2ae362002f9aa52b198eaaca683f2ed6', 'TELECOM', 'IMSS0036'),
(47, 'MANRIQUE MARIEL BLANCO', 'IMSS0028', 'e730e68962edec943d82dc3272885817', 'SOPORTEB', 'IMSS0028'),
(48, 'BAAS QUIÑONES BRAULIO', 'IMSS0027', '86da0d83422e8737f8544ab006850572', 'OTRO', 'IMSS0027'),
(49, 'ALEJANDRO GONZALEZ VAZQUEZ', 'IMSS0037', '17ec8218396b8f512b7ca22faa8106a7', 'TELECOM', 'IMSS0037'),
(50, 'MIGUEL MARRUFO PINZON', 'IMSS0038', 'e46e06c2d4b274181bb7468cfa97476c', 'TELECOM', 'IMSS0038'),
(52, 'JOSSUE  BETANCOURT', 'asignacion', '8606b80c44b0ebb62d4bdbdb3dc62ae9', 'ASIGNACION', '000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telecom`
--

CREATE TABLE IF NOT EXISTS `telecom` (
  `idreporte` int(14) unsigned NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`idreporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`) VALUES
(1, 'CAJA DE TIENDA'),
(2, 'CARGADOR'),
(3, 'CPU'),
(4, 'IMPRESORA'),
(5, 'LAPTOP'),
(6, 'LECTOR DE CÓDIGO'),
(7, 'MONITOR'),
(8, 'MOUSE'),
(9, 'PROYECTOR'),
(10, 'REGULADOR'),
(11, 'SCANNER'),
(12, 'TECLADO'),
(13, 'UPS'),
(14, 'ETIQUETADORA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeporte`
--

CREATE TABLE IF NOT EXISTS `tiporeporte` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tiporeporte`
--

INSERT INTO `tiporeporte` (`id`, `nombreTipo`) VALUES
(1, 'Soporte Tecnico'),
(2, 'Antivirus y Seguridad'),
(3, 'Telecomunicaciones'),
(4, 'Correo/Cuenta'),
(5, 'Informacion General'),
(6, 'VideoConferencia'),
(7, 'Call Center');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `posiciong` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=207 ;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id`, `nombre`, `direccion`, `posiciong`) VALUES
(1, 'H.G.R.1', 'Nueva direccion', ''),
(5, 'U.M.F. 02 PROGRESO', 'Calle 27 No. 129 X 27 Y 74  Col. Centro C.P. 97320, Progreso, YucatÃ¡n', 'SOPORTE B'),
(6, 'H.G.S.Z./MF 03 MOTUL', 'Calle 26 No. 319 x 15 y 13 Col.Felipe Carrillo Puerto C.P. 97430, Motul, YucatÃ¡n', 'SOPORTE B'),
(7, 'U.M.F. 04 VALLADOLID', 'Calle 41 No. 256  Col. Bacalar C.P. 97780,Valladolid, YucatÃ¡n', 'SOPORTE B'),
(8, 'H.G.S.Z./MF 05 TIZIMIN', 'Calle 47 X 43 S/N  Col. Centro C.P. 97700,TizimÃ­n, YucatÃ¡n', 'SOPORTE B'),
(9, 'U.M.F. 07 COLORADAS', 'Domicilio Conocido C.P. 9772,Las Coloradas, YucatÃ¡n', 'SOPORTE A'),
(10, 'U.M.F. 06 COLONIA', 'Av. De los Cedros S/N C.P. 97710. Col. YucatÃ¡n, YucatÃ¡n', 'SOPORTE A'),
(11, 'U.M.F. 08 TZUCACAB', 'Calle 31 No. 104 X 32 Y 34  Col. Centro C.P. 97960, Tzucacab, YucatÃ¡n', 'SOPORTE B'),
(12, 'U.M.F. 13 CHUBURNA', 'Calle 22 X 19  Col. ChuburnÃ¡ De Hidalgo C.P. 97200, MÃ©rida, YucatÃ¡n', 'SOPORTE B'),
(13, 'U.M.F. 14 KANASIN', 'Calle 19 S/N Carretera AcancÃ©h C.P. 97370, KanasÃ­n, YucatÃ¡n', 'SOPORTE A'),
(14, 'U.M.F. 16 KOMCHEN', 'Domicilio Conocido C.P. 97300, KomchÃ©n, YucatÃ¡n', 'SOPORTE A'),
(15, 'U.M.F. 17 MAXCANU', 'Calle 16 No. 99 X 21  Col. Centro C.P. 97800, MaxcanÃº, YucatÃ¡n', 'SOPORTE B'),
(16, 'U.M.F. 19 HUNUCMA', 'Calle 31 No. 280 Carretera MÃ©rida - Sisal C.P. 97350, HunucmÃ¡, YucatÃ¡n', 'SOPORTE A'),
(17, 'U.M.F. 20 CAUCEL', 'Calle 80 No. 663 Esquina 51-A, Complejo Habitacional Ciudad Caucel, C.P. 97314, MÃ©rida, YucatÃ¡n', 'SOPORTE B'),
(18, 'U.M.F. 21 SAMAHIL', 'Calle 18 X 21 C.P. 97810, Samahil, YucatÃ¡n', 'SOPORTE B'),
(19, 'U.M.F. 31 IZAMAL', 'Calle 24 No. 313 X 37  Col. San Marcos C.P. 97540, Izamal, YucatÃ¡n', 'SOPORTE A'),
(20, 'U.M.F. 41 ACANCEH', 'Calle 21 No. 177 X 30 Y 32 C.P. 97380, AcancÃ©h, YucatÃ¡n', 'SOPORTE A'),
(21, 'H.G.S.Z./MF 46 UMAN', 'Calle 29 No. 116 X 18 Y 20  Col. Centro C.P. 97390, UmÃ¡n, YucatÃ¡n', 'SOPORTE B'),
(22, 'U.M.F. 49 TIXKOKOB', 'Calle 21 No. 50 X  23  Col. Centro C.P. 97470, Tixkokob, YucatÃ¡n', 'SOPORTE B'),
(23, 'U.M.F. 50 CONKAL', 'Calle 29 No. 205 C.P. 97345, Conkal, YucatÃ¡n', 'SOPORTE A'),
(24, 'U.M.F. 54 TICUL', 'Calle 24 x 13 Col. Barrio de Guadalupe, C.P. 97860, Ticul, YucatÃ¡n', 'SOPORTE B'),
(25, 'U.M.F. 55 TEKAX', 'Calle 43 No. 245 X 56 C.P. 97970, Tekax, YucatÃ¡n', 'SOPORTE B'),
(26, 'U.M.F. 57 CEIBA', 'Calle 7 No. 247 X 38 Y 40  Col. Pensiones C.P. 97219, MÃ©rida, YucatÃ¡n', 'SOPORTE B'),
(27, 'U.M.F. 58', 'Calle 42 Sur No.999 x 127-A y 131, Col. Serapio RendÃ³n, C.P. 97285, MÃ©rida, ', 'SOPORTE B'),
(28, 'U.M.F. 60 JUAN PABLO', 'Calle 22 No. 397 X 31 Y 35 Fracc. Juan Pablo Ii Col. XoclÃ¡n C.P. ', 'SOPORTE B'),
(30, 'CRESCAP', 'BUNKER', 'SOPORTE B'),
(35, 'U.M.F. 52 CASA PALOMEQUE', 'Calle 64 No. 491 X 59  Col. Centro C.P. 97000,     MÃ©rida, YucatÃ¡n', 'SOPORTE A'),
(36, 'U.M.F. 56 (GUARDERÍA)', 'Calle 65 No. 403 X 44 Y 46  Col. Centro C.P. 97000, MÃ©rida, YucatÃ¡n Dr. Juan Pablo Angli Montero. ', 'SOPORTE A'),
(37, 'U.M.F. 59', 'Calle 55 X 16 No. 726 Fracc. Del Parque C.P. 97167, MÃ©rida, YucatÃ¡n', 'SOPORTE A'),
(39, 'SUBDELEGACION NORTE', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(40, 'SUBDELEGACION SUR', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(41, 'VELATORIO', 'CONOCIDO', 'SOPORTE A'),
(42, 'COORD DE ABASTO', 'CONOCIDO', 'SOPORTE A'),
(44, 'COORD OPORTUNIDADES', 'CONOCIDO', 'SOPORTE A'),
(45, 'CONTRALORIA DELEGACIONAL', 'CONOCIDO', 'SOPORTE A'),
(46, 'COORD DE CALIDAD', 'DOM CON', 'SOPORTE B'),
(48, 'U.M.R. 47 CHOCHOLA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(49, 'U.M.R. 11 TIXMEHUAC', 'TIXMEHUAC', 'SOPORTE B'),
(50, 'U.M.R. 17 MAYAPAN', 'MAYAPAN', 'SOPORTE A'),
(51, 'U.M.R. 12 AKIL', 'AKIL', 'SOPORTE A'),
(52, 'U.M.R. 13 TZUCACAB', 'TZUCACAB', 'SOPORTE B'),
(53, 'U.M.R. 14 SACALUM', 'SACALUM', 'SOPORTE B'),
(54, 'U.M.R. 23 OXKUTZCAB', 'OXKUTZCAB', 'SOPORTE B'),
(55, 'U.M.R. 25 PETO', 'PETO', 'SOPORTE B'),
(56, 'U.M.R. 26 TEKAX', 'TEKAX', 'SOPORTE B'),
(57, 'U.M.R. 37 HOCABA', 'MANI', 'SOPORTE A'),
(58, 'U.M.R. 35 TEKAL DE VENEGA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(59, 'U.M.R. 45 MUNA', 'DOMICILIO  CONOCIDO', 'SOPORTE A'),
(60, 'U.M.R. 48 MAMA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(62, 'U.M.R. 42 SEYE', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(63, 'U.M.R. 54 CORRAL', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(64, 'U.M.R. 01 KAUA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(65, 'U.M.R. 02 TIXCACALCUPUL', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(66, 'U.M.R. 03 TINUM', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(67, 'U.M.R. 60 HALACHO', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(69, 'U.M.R. 05 CHANKOM', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(71, 'U.M.R. 08 TEMOZON', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(73, 'U.M.R. 22 CHEMAX', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(74, 'U.M.R. 24 PANABA', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(75, 'U.M.R. 31 CALOTMUL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(76, 'U.M.R. 22 CENOTILLO', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(77, 'U.M.R. 34 CHICHIMILA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(78, 'U.M.R. 36 ESPITA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(79, 'U.M.R. 34 CACALCHEN', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(80, 'U.M.R. 33 CHANKOM', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(84, 'U.M.R. 27 VALLADOLID', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(85, 'U.M.R. 44 TIZIMIN ', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(86, 'U.M.R. 18 HALACHO', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(87, 'U.M.R. 19 MAXCANU', 'DOMILICILIO CONOCIDO', 'SOPORTE B'),
(88, 'U.M.R. 20 OPICHEN', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(89, 'U.M.R. 21 ABALA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(91, 'U.M.R. 55  KOPOMA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(92, 'U.M.R. 83 KINCHIL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(93, 'U.M.R. 76 CHOCHOLA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(94, 'U.M.R. 57 TETIZ', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(95, 'U.M.R. 58 TIXPEHUAL', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(96, 'U.M.R. 70 TIMUCUY', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(97, 'U.M.R. 56 CUZAMA', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(98, 'U.M.R. 19 KOCHOL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(99, 'U.M.R. 18 CEPEDA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(100, 'COORD DE INFORMATICA', 'DOM. CON.', 'OTRO'),
(101, 'TIENDA IMSS', 'DOMICILIO CONOCIDO', 'OTRO'),
(103, 'DEPTO DE TRAMITE', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(104, 'DELEG. ARCHIVO Y COR', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(105, 'H.R. 62 IZAMAL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(106, 'U.M.R. 21 UAYALCEH', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(107, 'H.R. 59 ACANCEH', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(109, 'OFICINA REL LABORALES', 'DOMICILIO CONOCIDO', 'SEGURIDAD'),
(110, 'U.M.R. 52 MOTUL', 'DOM.CONOCIDO', 'SOPORTE A'),
(111, 'U.M.R. 49 TIXKOKOB', 'DOM. CON.', 'SOPORTE B'),
(112, 'U.M.R. 22 KINCHIL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(113, 'FUERZA DE TRABAJO', 'DOMICILIO CONOCIDO', 'SEGURIDAD'),
(114, 'H.R. 63 MAXCANU', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(115, 'C.I.E.F.', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(116, 'U.M.U. 03 LA CEIBA', 'DOMILICILIO CONOCIDO', 'SOPORTE A'),
(117, 'CONSERVACION DELEGACIONAL', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(118, 'ESCUELA DE ENFERMERIA', 'DOMICILIO CONOCIDO', 'SOPORTE A'),
(119, 'U.M.R. 38 TIXCACALTUYUB', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(120, 'U.M.R. 86 TAHMEK', 'DOMICILIO CONOCIDO', 'SOPORTE B'),
(121, 'DELEGACION', 'DOM CON', 'SOPORTE A'),
(122, 'U.M.R. 13 CATMIS', 'DOM CON', 'SOPORTE A'),
(123, 'U.M.R. 26 BECANCHEN', 'DOM. CON', 'SOPORTE A'),
(124, 'U.M.F. 44 TECOH', 'DOM. CON.', 'SOPORTE B'),
(125, 'U.M.R. 24 DZEMUL', 'DOM. CON.', 'SOPORTE A'),
(126, 'U.M.R. 78 DZIDZANTUN', 'DOM. CON.', 'SOPORTE A'),
(127, 'U.M.R. 16 KANCABDZON', 'DOM. CON.', 'SOPORTE A'),
(129, 'DEPTO SISTEMA DE INF', 'DOM. CON.', 'SEGURIDAD'),
(130, 'U.M.U. HUNUCMA', 'DOM. CON.', 'SOPORTE A'),
(131, 'U.M.R. 15 TIHOLOP', 'DOM.CON.', 'SOPORTE A'),
(132, 'U.M.U. CONKAL', 'DOM. CON.', 'SOPORTE B'),
(133, 'U.M.R. 27 XTOHBIL', 'DOM. CON.', 'SOPORTE B'),
(134, 'U.M.U. PACABTUN', 'DOM.CON.', 'SOPORTE B'),
(135, 'U.M.R. 34 CHAN XCAIL', 'DOM.CON', 'SOPORTE A'),
(136, 'U.M.R. 53 HUNUCMA', 'DOM. CON', 'SOPORTE A'),
(137, 'C.I.A.E', 'DOM. CON', 'soporteA'),
(138, 'U.M.R. 03 XCALACOOP', 'DOM CON', 'soporteA'),
(139, 'U.M.R. 33 TEKANTO', 'DOM. CON.', 'soporteA'),
(140, 'U.M.R. 23 XUL', 'DOM. CON.', 'soporteA'),
(141, 'U.M.R. 39 HOMUN', 'DOM CON', 'soporteA'),
(142, 'U.M.R. 73 CACALCHEN', 'DOM. CON.', 'soporteA'),
(143, 'U.M.R. 07 TIXCACAL', 'DOM CON', 'soporteA'),
(144, 'U.M.R. 06 DZONOT CAR', 'DOM. CON.', 'soporteA'),
(145, 'U.M.R. 45 TEKIT', 'DOM. CON.', 'soporteA'),
(146, 'H.R. 39 OXKUTZCAB', 'DOM. CON.', 'soporteA'),
(147, 'CENTRO DE CAPACITACION', 'DOM. CON.', 'soporteA'),
(148, 'U.M.R. 87 TEMAX', 'DOM. CON.', 'soporteA'),
(149, 'DEPTO DELEG. DE PERS', 'DOM. CON', 'SEGURIDAD'),
(150, 'COORD PREVENCION Y ', 'DOM. CON', 'soporteA'),
(151, 'U.M.R. 46 DZILAM BRAVO', 'DOM. CON.', 'soporteA'),
(152, 'DEPTO DE SISTEMAS D', 'DOM. CON.', 'soporteA'),
(153, 'U.M.U.S.', 'DOM. CON.', 'soporteA'),
(154, 'U.M.R. 41 SINANCHE', 'DOM. CON.', 'soporteA'),
(155, 'U.M.R. 26 CANSAHCAB', 'DOM. CON.', 'soporteA'),
(156, 'U.M.R. 35 ICHMUL', 'DOM. CON', 'soporteA'),
(158, '', '', ''),
(159, 'U.M.R. 48 ABALA', 'DOM. CON.', 'soporteA'),
(160, 'U.M.R. 30 TEMAX', 'DOM. CON', 'soporteA'),
(161, 'CONTRALORIA INTERNA', 'DOM. CON.', 'soporteA'),
(162, 'U.M.F. 15 SAN JOSE TZAL', 'DOM. CON', 'soporteA'),
(163, 'U.M.F. 07 TIZIMIN', 'DOM. CON', 'soporteA'),
(164, 'U.M.R. 27 DZILAM GONZALEZ', 'DOM. CON.', 'soporteA'),
(165, 'U.M.R. 25 BACA', 'DOM. CON', 'soporteA'),
(166, 'U.M.R. 49 TELCHAC PU', 'DOM. CON', 'soporteA'),
(167, 'COORD AUX. DE SALUD', 'DOM. CON', 'soporteB'),
(168, 'U.M.R. 65 TECOH', 'DOM CON', 'SOPORTE B'),
(169, 'U.M.R. QUINTANA ROO', 'DOM.CON.', 'SOPORTE A'),
(170, 'U.M.R. 29 SUMA DE HIDALGO', 'DOM CON', 'SOPORTE A'),
(171, 'GUARDERIA', 'DOM.CON', 'soporteA'),
(173, 'COORD. DE PLANEACION  Y E', 'DOM  CON', 'soporteA'),
(175, 'U.M.F. 23 SINANCHE', 'DOM. CON', 'soporteA'),
(176, 'DEPTO DE GUARDERIAS', 'DOM CON', 'soporteA'),
(177, 'PRESTACIONES SOCIALES', 'DOM CON', 'soporteA'),
(178, 'U.M.R. EL EDEN', 'DOM CON', 'soporteA'),
(179, 'OFICINA SOCIALES INGRESO', 'DOM CON', 'soporteA'),
(180, 'OFNA SOCIALES INGRESO', 'DOM. CON.', 'soporteA'),
(181, 'OFICINA ACTAS Y ACUERDOS', 'DOM. CON', 'soporteA'),
(182, 'COORD. DELEG. ATENCION Y ', 'DOM. CON.', 'soporteA'),
(183, 'SUPERVISION DE PREST ECON', 'DOM. CON.', 'soporteA'),
(184, 'U.M.U. IZAMAL', 'DOM. CON.', 'soporteA'),
(185, 'U.M.R. 28 DZIDZANTUN', 'DOM. CON', 'soporteA'),
(186, 'U.M.U TIZIMIN', 'DOM. CON.', 'soporteB'),
(187, 'COORD.DELEG.COMPETITIVIDA', 'DOM CON', 'soporteA'),
(188, 'U.M.F. 43 TIMUCUY', 'DOM. CON.', 'soporteB'),
(189, 'JEFATURA DE SERVICIOS DE ', 'DOM. CON', 'soporteA'),
(190, 'DEPTO. DE CONTENCIOSO', 'DOM. CON.', 'soporteA'),
(191, 'AREA DE AUDITORIA QUEJAS ', 'DOM.CON', 'telecom'),
(192, 'U.M.R. LOCHE', 'DOM.CON', 'soporteA'),
(193, 'U.M.R. SAMARIA', 'DOM. CON.', 'soporteA'),
(194, 'SERVICIOS BASICOS', '', 'soporteA'),
(196, 'Nueva', 'Nueva', ''),
(197, 'H.G.R.1', 'sin direcion', 'sin posicion'),
(201, 'no tiene', 'sin direccion', 'sin poscion'),
(203, 'H.G.R. 12 ', 'Ave. ColÃ³n por Ave. Itzaes sin nÃºmero cp 97070 colonia garcÃ­a gineres', 'sin posicion'),
(204, 'H.G.R. 12 ', 'Ave. ColÃ³n por Ave. Itzaes sin nÃºmero cp 97070 colonia garcÃ­a gineres', 'sin posicion'),
(205, 'U.M.A.A.', '', ''),
(206, 'U.M.A.A.', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `contrasena` varchar(1000) NOT NULL,
  `matricula` varchar(100) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `idunidad` int(14) unsigned NOT NULL,
  `idSubUnidad` int(14) unsigned NOT NULL,
  `idcategoria` int(14) unsigned NOT NULL,
  `subcategoria` int(14) unsigned NOT NULL,
  `esCDI` varchar(100) NOT NULL,
  `esCOORDINAD` varchar(100) NOT NULL,
  `valor` int(14) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idcategoria` (`idcategoria`),
  KEY `idcategoria_2` (`idcategoria`,`idunidad`),
  KEY `idunidad` (`idunidad`),
  KEY `subcategoria` (`subcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contrasena`, `matricula`, `tipo`, `idunidad`, `idSubUnidad`, `idcategoria`, `subcategoria`, `esCDI`, `esCOORDINAD`, `valor`) VALUES
(0, 'Ocampo Roman Cesar Augusto', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 201, 201, 1, 5, 'SI', 'SI', 0),
(19, 'prueba', 'prueba', 'prueba', 'prureba tipo', 1, 1, 8, 11, 'NO', 'NO', 0),
(20, 'Esquivel Molina Brian Albert', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 197, 201, 6, 11, 'NO', 'NO', 1),
(22, 'Lizama Canto David Amilcar', 'prueba', 'prueba', 'soporte', 197, 201, 10, 11, 'NO', 'NO', 1),
(23, 'Aguilar Manzanero Irving Rene', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 0),
(24, 'Perez Ucan Weyler Alonso', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 1),
(26, 'Figueroa Bolio Otto Alejanadro', 'prueba', 'prueba', 'soporte', 204, 201, 1, 1, 'NO', 'NO', 0),
(27, 'Marin Blanco Mariel Alejandrina', 'prueba', 'prueba', 'soporte', 204, 39, 1, 11, 'NO', 'NO', 0),
(28, 'Lara Nuñes Carlos Adonay', 'prueba', 'prueba', 'soporte', 40, 201, 1, 11, 'NO', 'NO', 0),
(29, 'Sosa Aldana Walter Jose', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 40, 201, 4, 11, 'NO', 'NO', 0),
(30, 'Barrera Lara Jorge Rey', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 58, 201, 5, 11, 'NO', 'NO', 0),
(31, 'Viana Ortegon Lizbeth del Carmen', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 35, 36, 2, 11, 'NO', 'NO', 1),
(32, 'Koh Carrillo Ricardo de Jesus', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 35, 36, 3, 11, 'NO', 'NO', 0),
(33, 'Ribbon Conde Maria del Carmen', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'soporte', 26, 201, 3, 11, 'NO', 'NO', 0),
(34, 'Diaz Barcelo Fabian Roberto', 'prueba', 'prueba', 'soporte', 26, 201, 1, 11, 'NO', 'NO', 0),
(35, 'Martines Villalobos Willian Abel', 'prueba', 'prueba', 'soporte', 12, 201, 1, 11, 'NO', 'NO', 0),
(36, 'Ancona Quintal Patricia Eugenia', 'prueba', 'prueba', 'soporte', 17, 28, 1, 11, 'NO', 'NO', 0),
(37, 'Gonzales Moreno ricardo Emmanuel', 'prueba', 'prueba', 'soporte', 17, 28, 1, 11, 'NO', 'NO', 0),
(38, 'Chacon Lugo Alma Beatriz', 'prueba', 'prueba', 'soporte', 206, 201, 1, 11, 'NO', 'NO', 0),
(39, 'Ramirez Gongora Jorge', 'prueba', 'prueba', 'soporte', 206, 201, 1, 11, 'NO', 'NO', 0),
(40, 'Perez Carcaño Yara Cristina', 'prueba', 'prueba', 'soporte', 37, 201, 1, 11, 'NO', 'NO', 0),
(41, 'Baas Quiñonez Braulio Raymundo', 'prueba', 'prueba', 'soporte', 37, 201, 1, 11, 'NO', 'NO', 0),
(42, 'Ocampo Roman Cesar Augusto', 'prueba', 'prueba', 'soporte', 201, 201, 1, 11, 'SI', 'SI', 0),
(43, 'ESCAMILLA PERERA BALTAZAR', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'ADMIN', 1, 1, 9, 11, 'SI', 'SI', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaasignacion`
--
CREATE TABLE IF NOT EXISTS `vistaasignacion` (
`idr` int(14) unsigned
,`idat` int(14) unsigned
,`ipcaptura` varchar(15)
,`folio` varchar(25)
,`finicio` date
,`unidad` varchar(100)
,`area` varchar(100)
,`modelo` varchar(250)
,`serie` varchar(100)
,`marca` text
,`tipoC` text
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vistaasignacion`
--
DROP TABLE IF EXISTS `vistaasignacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaasignacion` AS select `r`.`id` AS `idr`,`at`.`id` AS `idat`,`r`.`ipcaptura` AS `ipcaptura`,`r`.`folio` AS `folio`,`r`.`fechaRecep` AS `finicio`,`u`.`nombre` AS `unidad`,`a`.`nombre` AS `area`,`e`.`modelo` AS `modelo`,`e`.`numdeserie` AS `serie`,`m`.`descripcion` AS `marca`,`tp`.`descripcion` AS `tipoC` from ((((((((((`reporte` `r` join `atencionreportes` `at` on((`r`.`id` = `at`.`idreporte`))) join `area` `a` on((`r`.`idarea` = `a`.`id`))) join `unidad` `u` on((`r`.`id_unidad` = `u`.`id`))) join `equiposrecibidos` `er` on((`r`.`id` = `er`.`idreporte`))) join `equipos` `e` on((`er`.`idequipo` = `e`.`id`))) join `status` `st` on((`at`.`idstatus` = `st`.`id`))) join `marca` `m` on((`e`.`idmarca` = `m`.`id`))) join `tipo` `tp` on((`e`.`idtipo` = `tp`.`id`))) join `usuario` `us` on((`r`.`idusuario` = `us`.`id`))) join `tiporeporte` `tr` on((`r`.`idtiporeporte` = `tr`.`id`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atencionreportes`
--
ALTER TABLE `atencionreportes`
  ADD CONSTRAINT `atencionreportes_ibfk_1` FOREIGN KEY (`idstatus`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `atencionreportes_ibfk_2` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_atencionreportes_usuario` FOREIGN KEY (`idusuarioOrigen`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_atencionreportes_usuario_2` FOREIGN KEY (`idusuarioDestino`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`idTipoReporte`) REFERENCES `tiporeporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historialatencion`
--
ALTER TABLE `historialatencion`
  ADD CONSTRAINT `historialatencion_ibfk_1` FOREIGN KEY (`idactividad_uno`) REFERENCES `actividades` (`id`),
  ADD CONSTRAINT `historialatencion_ibfk_3` FOREIGN KEY (`idatencionreportes`) REFERENCES `atencionreportes` (`id`),
  ADD CONSTRAINT `historialatencion_ibfk_4` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `impresorarep`
--
ALTER TABLE `impresorarep`
  ADD CONSTRAINT `impresorarep_ibfk_1` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`idtiporeporte`) REFERENCES `tiporeporte` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_3` FOREIGN KEY (`idarea`) REFERENCES `area` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_4` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_5` FOREIGN KEY (`idClase`) REFERENCES `clase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sistemasrep`
--
ALTER TABLE `sistemasrep`
  ADD CONSTRAINT `sistemasrep_ibfk_1` FOREIGN KEY (`idaplicativo`) REFERENCES `aplicativos` (`id`),
  ADD CONSTRAINT `sistemasrep_ibfk_2` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `telecom`
--
ALTER TABLE `telecom`
  ADD CONSTRAINT `telecom_ibfk_1` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idunidad`) REFERENCES `unidad` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoriau` (`id`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`subcategoria`) REFERENCES `categoriau` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
