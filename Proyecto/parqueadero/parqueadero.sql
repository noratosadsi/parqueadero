-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-03-2018 a las 23:31:29
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueadero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cedula` int(11) NOT NULL COMMENT 'Identificacion dueño del vehiculo',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre dueño vehiculo a ingresar',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido dueño del vehiculo a ingresar',
  `telefono1` varchar(45) NOT NULL COMMENT 'Primer numero de telefono del cliente',
  `telefono2` varchar(45) DEFAULT NULL COMMENT 'Segundo numero de telefono del cliente',
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo`
--

DROP TABLE IF EXISTS `costo`;
CREATE TABLE IF NOT EXISTS `costo` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(11) NOT NULL,
  `pmin` int(11) NOT NULL DEFAULT '60',
  `phoras` int(15) NOT NULL,
  `pdias` int(15) NOT NULL,
  `pmensual` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `costo`
--

INSERT INTO `costo` (`id`, `vehiculo`, `pmin`, `phoras`, `pdias`, `pmensual`) VALUES
(1, 'moto', 60, 3000, 15000, 260000),
(2, 'bicicleta', 30, 1500, 8000, 130000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupos`
--

DROP TABLE IF EXISTS `cupos`;
CREATE TABLE IF NOT EXISTS `cupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motos` varchar(45) NOT NULL,
  `bicicletas` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`id`, `motos`, `bicicletas`) VALUES
(1, '60', '60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

DROP TABLE IF EXISTS `detallefactura`;
CREATE TABLE IF NOT EXISTS `detallefactura` (
  `fechafactura` datetime NOT NULL COMMENT 'Fecha y hora de  ingreso  del vehiculo ',
  `horaingreso` datetime DEFAULT NULL COMMENT 'Hora ingreso del vehiculo',
  `horasalida` datetime DEFAULT NULL COMMENT 'Fecha y hora de salida del vehiculo',
  `duracion` time DEFAULT NULL COMMENT 'Permanencia del vehiculo en el parqueadero',
  `precio` int(11) DEFAULT NULL COMMENT 'Precio por el tiempo permanecido en el parqueadero',
  `iva` int(11) DEFAULT NULL COMMENT 'Impuesto del iva a cobrar en la factura',
  `total` int(11) DEFAULT NULL COMMENT 'Total detallado en la factura a cancelar',
  `factura_idFactura` int(11) NOT NULL COMMENT 'Identificacion de numero de factura a cancelar por el servicio de parqueo al vehiculo',
  PRIMARY KEY (`factura_idFactura`),
  KEY `fk_Detalle_factura_Factura1_idx` (`factura_idFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

DROP TABLE IF EXISTS `estacionamiento`;
CREATE TABLE IF NOT EXISTS `estacionamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del numero de factura',
  `vehiculo_cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente',
  `usuario_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla usuario',
  `usuario_rol_idrol` int(11) NOT NULL COMMENT 'Identificacion del rol de la tabla rol',
  `costo_id` int(11) NOT NULL,
  `estacionamiento_id` int(11) NOT NULL,
  PRIMARY KEY (`idFactura`,`vehiculo_cliente_cedula`,`usuario_cedula`,`usuario_rol_idrol`,`costo_id`,`estacionamiento_id`),
  KEY `fk_Factura_vehiculo1_idx` (`vehiculo_cliente_cedula`),
  KEY `fk_Factura_usuario1_idx` (`usuario_cedula`,`usuario_rol_idrol`),
  KEY `fk_factura_costo1_idx` (`costo_id`),
  KEY `fk_factura_estacionamiento1_idx` (`estacionamiento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicofacturado`
--

DROP TABLE IF EXISTS `historicofacturado`;
CREATE TABLE IF NOT EXISTS `historicofacturado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomusu` varchar(45) DEFAULT NULL,
  `apeusu` varchar(45) DEFAULT NULL,
  `fechafacturado` varchar(45) DEFAULT NULL,
  `cedulaclie` varchar(45) DEFAULT NULL,
  `nomclie` varchar(45) DEFAULT NULL,
  `apeclie` varchar(45) DEFAULT NULL,
  `telclie1` varchar(45) DEFAULT NULL,
  `telclie2` varchar(45) DEFAULT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `horaingreso` varchar(45) DEFAULT NULL,
  `horasalida` varchar(45) DEFAULT NULL,
  `duracion` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `iva` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historicofacturado`
--

INSERT INTO `historicofacturado` (`id`, `nomusu`, `apeusu`, `fechafacturado`, `cedulaclie`, `nomclie`, `apeclie`, `telclie1`, `telclie2`, `matricula`, `marca`, `modelo`, `tipo`, `descripcion`, `horaingreso`, `horasalida`, `duracion`, `precio`, `iva`, `total`) VALUES
(102, 'administrador', 'parqueadero', '2018-03-28 22:34:18', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'bicicleta', 'sdaf', '2018-03-28 22:30:13', '2018-03-28 22:34:18', '00:04:05', '123', '20', '143'),
(125, 'administrador', 'parqueadero', '2018-03-29 10:58:39', '121', 'sadf', 'asdf', 'sadf', 'sadf', 'sadf', 'sdaf', 'dsaf', 'moto', 'dsaf', '2018-03-29 10:47:37', '2018-03-29 10:58:39', '00:11:02', '115', '18', '133'),
(128, 'administrador', 'parqueadero', '2018-03-29 11:20:09', '123', 'dfads', 'dsaf', 'dsaf', 'dsaf', 'dsaf', 'dsaf', 'dsaf', 'bicicleta', 'sadfdsa', '2018-03-29 10:50:06', '2018-03-29 11:20:09', '00:30:03', '89', '14', '103'),
(138, 'administrador', 'parqueadero', '2018-03-29 12:41:10', '121', 'sadf', 'asdf', '', 'sadf', 'sadf', 'sdaf', 'dsaf', 'moto', 'dsaf', '2018-03-29 12:41:10', '2018-03-29 12:48:49', '00:07:39', '459', '73', '532'),
(149, 'administrador', 'parqueadero', '2018-03-29 15:39:57', '121', 'sadf', 'asdf', '', 'sadf', 'sadf', 'sdaf', 'dsaf', 'bicicleta', 'dsaf', '2018-03-29 15:39:57', '2018-03-29 15:40:19', '00:00:22', '9', '1', '10'),
(153, 'administrador', 'parqueadero', '2018-03-29 15:59:21', '122', 'sdaf', 'sdaf', '', 'dsaf', 'sadf', 'sdaf', 'sdaf', 'bicicleta', 'sdfasdf', '2018-03-29 15:59:21', '2018-03-29 15:59:25', '00:00:04', '2', '0', '2'),
(155, 'administrador', 'parqueadero', '2018-03-29 16:07:42', '126', 'dsaf', 'sadf', '', 'sdaf', 'sadf', 'dsaf', 'sdaf', 'bicicleta', 'sdaf', '2018-03-29 16:07:42', '2018-03-29 16:07:52', '00:00:10', '0', '0', '0'),
(160, 'administrador', 'parqueadero', '2018-03-29 17:04:33', '120', 'sadf', 'sdaf', '', 'dsaf', 'sadf', 'sdf', 'sadf', 'moto', 'sdaf', '2018-03-29 17:04:33', '2018-03-29 17:59:50', '00:55:17', '2764', '442', '3206');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueados`
--

DROP TABLE IF EXISTS `parqueados`;
CREATE TABLE IF NOT EXISTS `parqueados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomusu` varchar(45) DEFAULT NULL,
  `apeusu` varchar(45) DEFAULT NULL,
  `fechafacturado` varchar(45) DEFAULT NULL,
  `cedulaclie` varchar(45) DEFAULT NULL,
  `nomclie` varchar(45) DEFAULT NULL,
  `apeclie` varchar(45) DEFAULT NULL,
  `telclie1` varchar(45) DEFAULT NULL,
  `telclie2` varchar(45) DEFAULT NULL,
  `matricula` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `horaingreso` varchar(45) DEFAULT NULL,
  `horasalida` varchar(45) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `precio` int(15) DEFAULT NULL,
  `iva` int(15) DEFAULT NULL,
  `total` int(15) DEFAULT NULL,
  `estacionamiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL COMMENT 'Identificacion del cargo desempeñado en el parqueadero',
  `descripcion` varchar(45) NOT NULL COMMENT 'Descripcion del cargo que desempeña en el parqueadero\n',
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de identificacion de la tabla tipo',
  `tipo` varchar(45) NOT NULL COMMENT 'Tipo de vehiculo',
  `descripcion` varchar(45) NOT NULL COMMENT 'Descripcion del vehiculo',
  `marca` varchar(45) NOT NULL COMMENT 'Marca del vehiculo',
  `modelo` varchar(45) NOT NULL COMMENT 'Modelo del vehiculo',
  `vehiculo_cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente',
  PRIMARY KEY (`idtipo`,`vehiculo_cliente_cedula`),
  KEY `fk_tipo_vehiculo1_idx` (`vehiculo_cliente_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` int(11) NOT NULL COMMENT 'Numero de cedula del dueño de vehiculo',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del usuario del vehiculo',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido del usuario del vehiculo',
  `contrasena` varchar(255) NOT NULL COMMENT 'Contraseña del usuario del vehiculo',
  `rol_idrol` int(11) NOT NULL COMMENT 'Identificacion de la tabla rol que se encuentra en la tabla usuario',
  PRIMARY KEY (`cedula`,`rol_idrol`),
  KEY `fk_usuario_rol1_idx` (`rol_idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `contrasena`, `rol_idrol`) VALUES
(1, 'administrador', 'parqueadero', 'adcd7048512e64b48da55b027577886ee5a36350', 1),
(2, 'usuario', 'parqueadero', 'adcd7048512e64b48da55b027577886ee5a36350', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `matricula` varchar(45) NOT NULL COMMENT 'Matricula o identificacion del vehiculo',
  `marca` varchar(45) NOT NULL COMMENT 'Marca del vehiculo',
  `modelo` varchar(45) NOT NULL COMMENT 'Modelo del vehiculo',
  `cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente',
  PRIMARY KEY (`cliente_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `fk_Detalle_factura_Factura1` FOREIGN KEY (`factura_idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_Factura_usuario1` FOREIGN KEY (`usuario_cedula`,`usuario_rol_idrol`) REFERENCES `usuario` (`cedula`, `rol_idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Factura_vehiculo1` FOREIGN KEY (`vehiculo_cliente_cedula`) REFERENCES `vehiculo` (`cliente_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_costo1` FOREIGN KEY (`costo_id`) REFERENCES `costo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_estacionamiento1` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `fk_tipo_vehiculo1` FOREIGN KEY (`vehiculo_cliente_cedula`) REFERENCES `vehiculo` (`cliente_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_cliente1` FOREIGN KEY (`cliente_cedula`) REFERENCES `cliente` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
