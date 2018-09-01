-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-08-2018 a las 15:49:01
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

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
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `apellido`, `telefono1`, `telefono2`) VALUES
(10, 'asdf', 'asdf', 'asdf', 'sadf'),
(11, 'fgds', 'adfg', 'agd', 'asdg'),
(12, 'sadf', 'sadf', 'sadf', 'sadf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo`
--

DROP TABLE IF EXISTS `costo`;
CREATE TABLE IF NOT EXISTS `costo` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(45) DEFAULT NULL,
  `pmin` int(11) DEFAULT NULL,
  `phoras` int(11) DEFAULT NULL,
  `pdias` int(11) DEFAULT NULL,
  `pmensual` int(11) DEFAULT NULL,
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
  `id` int(11) NOT NULL,
  `vehiculo` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`id`, `vehiculo`, `cantidad`) VALUES
(1, 'moto', 60),
(2, 'bicicleta', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

DROP TABLE IF EXISTS `detallefactura`;
CREATE TABLE IF NOT EXISTS `detallefactura` (
  `fechafactura` datetime DEFAULT NULL,
  `horaingreso` datetime DEFAULT NULL,
  `horasalida` datetime DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `iva` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `factura_idFactura` int(11) NOT NULL,
  PRIMARY KEY (`factura_idFactura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`fechafactura`, `horaingreso`, `horasalida`, `duracion`, `precio`, `iva`, `total`, `factura_idFactura`) VALUES
('2018-08-31 10:45:19', '2018-08-31 10:30:05', '2018-08-31 10:45:19', '00:15:14', 3000, 145, 762, 10),
('2018-08-31 10:48:17', '2018-08-31 10:39:14', '2018-08-31 10:48:17', '00:09:03', 1500, 43, 226, 11),
('2018-08-31 10:48:08', '2018-08-31 10:41:42', '2018-08-31 10:48:08', '00:06:26', 260000, 7, 38, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

DROP TABLE IF EXISTS `estacionamiento`;
CREATE TABLE IF NOT EXISTS `estacionamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `cupos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cupos_id`),
  KEY `fk_estacionamiento_cupos2` (`cupos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estacionamiento`
--

INSERT INTO `estacionamiento` (`id`, `numero`, `cupos_id`) VALUES
(13, NULL, 1),
(14, NULL, 2),
(15, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `vehiculo_cliente_cedula` int(11) NOT NULL,
  `usuario_cedula` int(11) NOT NULL,
  `usuario_rol_idrol` int(11) NOT NULL,
  `costo_id` int(11) NOT NULL,
  `estacionamiento_id` int(11) NOT NULL,
  PRIMARY KEY (`idFactura`,`vehiculo_cliente_cedula`,`usuario_cedula`,`usuario_rol_idrol`,`costo_id`,`estacionamiento_id`),
  KEY `fk_factura_vehiculo1` (`vehiculo_cliente_cedula`),
  KEY `fk_factura_usuario1` (`usuario_cedula`,`usuario_rol_idrol`),
  KEY `fk_factura_costo2` (`costo_id`),
  KEY `fk_factura_estacionamiento2` (`estacionamiento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `vehiculo_cliente_cedula`, `usuario_cedula`, `usuario_rol_idrol`, `costo_id`, `estacionamiento_id`) VALUES
(10, 10, 2, 2, 1, 13),
(11, 11, 2, 2, 2, 14),
(12, 12, 2, 2, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `idrol` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idtipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `vehiculo_cliente_cedula` int(11) NOT NULL,
  PRIMARY KEY (`idtipo`,`vehiculo_cliente_cedula`),
  KEY `fk_tipo_vehiculo2` (`vehiculo_cliente_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `tipo`, `descripcion`, `vehiculo_cliente_cedula`) VALUES
(11, 'moto', 'sadf', 10),
(12, 'bicicleta', 'asdgdsa', 11),
(13, 'moto', 'asdfas', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `rol_idrol` int(11) NOT NULL,
  PRIMARY KEY (`cedula`,`rol_idrol`),
  KEY `fk_usuario_rol2` (`rol_idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `matricula` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `cliente_cedula` int(11) NOT NULL,
  PRIMARY KEY (`cliente_cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `marca`, `modelo`, `cliente_cedula`) VALUES
('sadf', 'asdf', 'sadf', 10),
('asdg', 'sadg', 'asdg', 11),
('sadf', 'sadf', 'sadf', 12);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistaparqueados`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vistaparqueados`;
CREATE TABLE IF NOT EXISTS `vistaparqueados` (
`id` int(11)
,`numero` int(11)
,`cantidad` int(11)
,`vehiculo` varchar(45)
,`idFactura` int(11)
,`vehiculo_cliente_cedula` int(11)
,`usuario_cedula` int(11)
,`usuario_rol_idrol` int(11)
,`costo_id` int(11)
,`estacionamiento_id` int(11)
,`matricula` varchar(45)
,`marca` varchar(45)
,`modelo` varchar(45)
,`cliente_cedula` int(11)
,`fechafactura` datetime
,`horaingreso` datetime
,`horasalida` datetime
,`duracion` time
,`precio` int(11)
,`iva` int(11)
,`total` int(11)
,`factura_idFactura` int(11)
,`cedula` int(11)
,`nombre` varchar(45)
,`apellido` varchar(45)
,`telefono1` varchar(45)
,`telefono2` varchar(45)
,`idtipo` int(11)
,`tipo` varchar(45)
,`descripcion` varchar(45)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vistaparqueados`
--
DROP TABLE IF EXISTS `vistaparqueados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistaparqueados`  AS  select `estacionamiento`.`id` AS `id`,`estacionamiento`.`numero` AS `numero`,`cupos`.`cantidad` AS `cantidad`,`cupos`.`vehiculo` AS `vehiculo`,`factura`.`idFactura` AS `idFactura`,`factura`.`vehiculo_cliente_cedula` AS `vehiculo_cliente_cedula`,`factura`.`usuario_cedula` AS `usuario_cedula`,`factura`.`usuario_rol_idrol` AS `usuario_rol_idrol`,`factura`.`costo_id` AS `costo_id`,`factura`.`estacionamiento_id` AS `estacionamiento_id`,`vehiculo`.`matricula` AS `matricula`,`vehiculo`.`marca` AS `marca`,`vehiculo`.`modelo` AS `modelo`,`vehiculo`.`cliente_cedula` AS `cliente_cedula`,`detallefactura`.`fechafactura` AS `fechafactura`,`detallefactura`.`horaingreso` AS `horaingreso`,`detallefactura`.`horasalida` AS `horasalida`,`detallefactura`.`duracion` AS `duracion`,`detallefactura`.`precio` AS `precio`,`detallefactura`.`iva` AS `iva`,`detallefactura`.`total` AS `total`,`detallefactura`.`factura_idFactura` AS `factura_idFactura`,`cliente`.`cedula` AS `cedula`,`cliente`.`nombre` AS `nombre`,`cliente`.`apellido` AS `apellido`,`cliente`.`telefono1` AS `telefono1`,`cliente`.`telefono2` AS `telefono2`,`tipo`.`idtipo` AS `idtipo`,`tipo`.`tipo` AS `tipo`,`tipo`.`descripcion` AS `descripcion` from ((((((`estacionamiento` join `factura` on((`estacionamiento`.`id` = `factura`.`estacionamiento_id`))) join `vehiculo` on((`factura`.`vehiculo_cliente_cedula` = `vehiculo`.`cliente_cedula`))) join `tipo` on((`vehiculo`.`cliente_cedula` = `tipo`.`vehiculo_cliente_cedula`))) join `detallefactura` on((`factura`.`idFactura` = `detallefactura`.`factura_idFactura`))) join `cliente` on((`vehiculo`.`cliente_cedula` = `cliente`.`cedula`))) join `cupos` on((`estacionamiento`.`cupos_id` = `cupos`.`id`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `fk_detallefactura_factura1` FOREIGN KEY (`factura_idFactura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  ADD CONSTRAINT `fk_estacionamiento_cupos2` FOREIGN KEY (`cupos_id`) REFERENCES `cupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_costo2` FOREIGN KEY (`costo_id`) REFERENCES `costo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_estacionamiento2` FOREIGN KEY (`estacionamiento_id`) REFERENCES `estacionamiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_usuario1` FOREIGN KEY (`usuario_cedula`,`usuario_rol_idrol`) REFERENCES `usuario` (`cedula`, `rol_idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_vehiculo1` FOREIGN KEY (`vehiculo_cliente_cedula`) REFERENCES `vehiculo` (`cliente_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `fk_tipo_vehiculo2` FOREIGN KEY (`vehiculo_cliente_cedula`) REFERENCES `vehiculo` (`cliente_cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol2` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_vehiculo_cliente2` FOREIGN KEY (`cliente_cedula`) REFERENCES `cliente` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
