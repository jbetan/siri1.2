-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2015 a las 16:29:03
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
(13, 'otro');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `atencionreportes`
--

INSERT INTO `atencionreportes` (`id`, `idreporte`, `idusuarioOrigen`, `idstatus`, `fechaTerm`, `horaTerm`, `solucionado`, `idusuarioDestino`) VALUES
(1, 4, 31, 2, '0001-09-15', '05:04:02', 'SI', 19),
(6, 6, 19, 3, '2015-08-15', '02:54:36', 'SI', 19);

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
(7, 'Especilista', 4),
(8, 'Call Center', 1),
(9, 'Administrador', 7),
(10, 'Jefe de oficina', 6),
(11, 'nulo', 100);

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
  `idreporte` int(14) unsigned NOT NULL DEFAULT '0',
  `cuenta` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `idmarca` int(14) unsigned DEFAULT NULL,
  `idmodelo` varchar(100) DEFAULT NULL,
  `mac` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idreporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`),
  KEY `idmarca` (`idmarca`),
  KEY `idtipo` (`idtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `idtipo`, `idmarca`, `modelo`, `numdeserie`, `etiqueta`) VALUES
(1, 2, 5, '8888', '8888', '8888'),
(2, 5, 22, 'Modificado', '0120384', 'COMPAQ 6005 PRO BUSI'),
(5, 3, 3, 'DELL', '0120384', 'OPTIPLEX 780'),
(6, 5, 3, 'HEWLETT PACKARD', '0120384', 'COMPAQ DC5850 BUSINE'),
(7, 4, 9, '777', '7777', '7777'),
(8, 5, 12, 'yuuuuu', 'juujjjj', 'uuuuu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equiposrecibidos`
--

CREATE TABLE IF NOT EXISTS `equiposrecibidos` (
  `idequipo` int(14) unsigned NOT NULL,
  `idreporte` int(14) unsigned NOT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `idreporte` (`idreporte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equiposrecibidos`
--

INSERT INTO `equiposrecibidos` (`idequipo`, `idreporte`) VALUES
(1, 4),
(2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialatencion`
--

CREATE TABLE IF NOT EXISTS `historialatencion` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idreporte` int(14) unsigned NOT NULL,
  `idatencionreportes` int(14) unsigned NOT NULL,
  `idactividades` int(14) unsigned NOT NULL,
  `comentario` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idactividades` (`idactividades`),
  KEY `idatencionreportes` (`idatencionreportes`),
  KEY `FK_historialatencion_reporte` (`idreporte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `historialatencion`
--

INSERT INTO `historialatencion` (`id`, `idreporte`, `idatencionreportes`, `idactividades`, `comentario`) VALUES
(1, 4, 1, 1, 'hhh');

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
  `extencion` varchar(5) NOT NULL,
  `correo` varchar(25) NOT NULL,
  `contraCorreo` varchar(25) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id`, `idtiporeporte`, `idClase`, `idusuario`, `ipcaptura`, `telefono`, `extencion`, `correo`, `contraCorreo`, `prioridad`, `fechaRecep`, `horaRecep`, `folio`, `clasificacion`, `id_unidad`, `idarea`, `personaquereporta`, `equiporecibido`, `problema`, `recibido`, `fechaEnt`, `horaEnt`) VALUES
(4, 1, 1, 19, '192.56.45.32', 3, '', '', '', 'Unidad', '2015-08-04', '10:55:00', 'A15', 'Reporte', 35, 1, 'Juan Perez', 'PC', 'No enciende', 'eerrrrrr', '2015-06-07', '18:30:58'),
(6, 1, 2, 19, '192.67.89.65', 0, '', '', '', 'Hospital', '2015-08-17', '10:55:00', 'A15', '', 1, 3, 'Juan Perez', 'PC', 'No encioende', '', '0000-00-00', '00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `contrasena`, `matricula`, `tipo`, `idunidad`, `idSubUnidad`, `idcategoria`, `subcategoria`, `esCDI`, `esCOORDINAD`, `valor`) VALUES
(0, 'Ocampo Roman Cesar Augusto', 'prueba', 'prueba', 'soporte', 201, 201, 1, 5, 'SI', 'SI', 0),
(19, 'prueba', 'prueba', 'prueba', 'prureba tipo', 1, 1, 1, 11, 'NO', 'NO', 0),
(20, 'Esquivel Molina Brian Albert', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 0),
(22, 'Lizama Canto David Amilcar', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 0),
(23, 'Aguilar Manzanero Irving Rene', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 0),
(24, 'Perez Ucan Weyler Alonso', 'prueba', 'prueba', 'soporte', 197, 201, 1, 11, 'NO', 'NO', 0),
(26, 'Figueroa Bolio Otto Alejanadro', 'prueba', 'prueba', 'soporte', 204, 201, 1, 1, 'NO', 'NO', 0),
(27, 'Marin Blanco Mariel Alejandrina', 'prueba', 'prueba', 'soporte', 204, 39, 1, 11, 'NO', 'NO', 0),
(28, 'Lara Nuñes Carlos Adonay', 'prueba', 'prueba', 'soporte', 40, 201, 1, 11, 'NO', 'NO', 0),
(29, 'Sosa Aldana Walter Jose', 'prueba', 'prueba', 'soporte', 40, 201, 2, 11, 'NO', 'NO', 0),
(30, 'Barrera Lara Jorge Rey', 'prueba', 'prueba', 'soporte', 58, 201, 2, 11, 'NO', 'NO', 0),
(31, 'Viana Ortegon Lizbeth del Carmen', 'prueba', 'prueba', 'soporte', 35, 36, 3, 11, 'NO', 'NO', 1),
(32, 'Koh Carrillo Ricardo de Jesus', 'prueba', 'prueba', 'soporte', 35, 36, 3, 11, 'NO', 'NO', 0),
(33, 'Ribbon Conde Maria del Carmen', 'prueba', 'prueba', 'soporte', 26, 201, 3, 11, 'NO', 'NO', 0),
(34, 'Diaz Barcelo Fabian Roberto', 'prueba', 'prueba', 'soporte', 26, 201, 1, 11, 'NO', 'NO', 0),
(35, 'Martines Villalobos Willian Abel', 'prueba', 'prueba', 'soporte', 12, 201, 1, 11, 'NO', 'NO', 0),
(36, 'Ancona Quintal Patricia Eugenia', 'prueba', 'prueba', 'soporte', 17, 28, 1, 11, 'NO', 'NO', 0),
(37, 'Gonzales Moreno ricardo Emmanuel', 'prueba', 'prueba', 'soporte', 17, 28, 1, 11, 'NO', 'NO', 0),
(38, 'Chacon Lugo Alma Beatriz', 'prueba', 'prueba', 'soporte', 206, 201, 1, 11, 'NO', 'NO', 0),
(39, 'Ramirez Gongora Jorge', 'prueba', 'prueba', 'soporte', 206, 201, 1, 11, 'NO', 'NO', 0),
(40, 'Perez Carcaño Yara Cristina', 'prueba', 'prueba', 'soporte', 37, 201, 1, 11, 'NO', 'NO', 0),
(41, 'Baas Quiñonez Braulio Raymundo', 'prueba', 'prueba', 'soporte', 37, 201, 1, 11, 'NO', 'NO', 0),
(42, 'Ocampo Roman Cesar Augusto', 'prueba', 'prueba', 'soporte', 201, 201, 1, 11, 'SI', 'SI', 0);

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
-- Filtros para la tabla `equiporep`
--
ALTER TABLE `equiporep`
  ADD CONSTRAINT `equiporep_ibfk_1` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`idmarca`) REFERENCES `marca` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equiposrecibidos`
--
ALTER TABLE `equiposrecibidos`
  ADD CONSTRAINT `equiposrecibidos_ibfk_2` FOREIGN KEY (`idreporte`) REFERENCES `reporte` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equiposrecibidos_ibfk_3` FOREIGN KEY (`idequipo`) REFERENCES `equipos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `historialatencion`
--
ALTER TABLE `historialatencion`
  ADD CONSTRAINT `historialatencion_ibfk_1` FOREIGN KEY (`idactividades`) REFERENCES `actividades` (`id`),
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
