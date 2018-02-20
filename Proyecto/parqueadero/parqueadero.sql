-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2018 a las 17:17:28
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL COMMENT 'Identificacion dueño del vehiculo',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre dueño vehiculo a ingresar',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido dueño del vehiculo a ingresar',
  `telefono1` varchar(45) NOT NULL COMMENT 'Primer numero de telefono del cliente',
  `telefono2` varchar(45) DEFAULT NULL COMMENT 'Segundo numero de telefono del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `nombre`, `apellido`, `telefono1`, `telefono2`) VALUES
(1, 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj'),
(2, 'DFSG', 'DFSG', 'DSFG', 'DFSG'),
(3, 'dfgdsf', 'dfsg', 'dfsg', 'dfg'),
(4, 'dfgh', 'fgh', 'fgh', 'f'),
(5, 'fgh', 'fdh', 'fh', 'fgh'),
(6, 'gfds', 'gdsfg', 'dfsg', 'fdsg'),
(7, 'dfgsd', 'dfg', 'dfsg', 'dfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo`
--

CREATE TABLE `costo` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(11) NOT NULL,
  `precio` int(11) NOT NULL DEFAULT '60'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `costo`
--

INSERT INTO `costo` (`id`, `vehiculo`, `precio`) VALUES
(1, 'moto', 60),
(2, 'bicicleta', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `fechafactura` datetime NOT NULL COMMENT 'Fecha y hora de  ingreso  del vehiculo ',
  `horaingreso` datetime DEFAULT NULL COMMENT 'Hora ingreso del vehiculo',
  `horasalida` datetime DEFAULT NULL COMMENT 'Fecha y hora de salida del vehiculo',
  `duracion` time DEFAULT NULL COMMENT 'Permanencia del vehiculo en el parqueadero',
  `precio` int(11) DEFAULT NULL COMMENT 'Precio por el tiempo permanecido en el parqueadero',
  `iva` int(11) DEFAULT NULL COMMENT 'Impuesto del iva a cobrar en la factura',
  `total` int(11) DEFAULT NULL COMMENT 'Total detallado en la factura a cancelar',
  `factura_idFactura` int(11) NOT NULL COMMENT 'Identificacion de numero de factura a cancelar por el servicio de parqueo al vehiculo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`fechafactura`, `horaingreso`, `horasalida`, `duracion`, `precio`, `iva`, `total`, `factura_idFactura`) VALUES
('2017-12-14 16:06:08', '2017-12-01 22:08:23', '2017-12-14 16:03:47', '305:55:24', 1101324, 176212, 1277536, 46),
('2017-12-01 22:11:31', '2017-12-01 22:11:31', NULL, NULL, NULL, NULL, NULL, 47),
('2017-12-01 22:12:28', '2017-12-01 22:12:28', NULL, NULL, NULL, NULL, NULL, 49),
('2017-12-14 15:28:22', '2017-12-06 13:56:57', '2017-12-08 11:30:34', '45:33:37', 164017, 26243, 190260, 50),
('2017-12-08 11:23:12', '2017-12-08 11:23:12', NULL, NULL, NULL, NULL, NULL, 52),
('2017-12-09 17:28:02', '2017-12-09 17:28:02', NULL, NULL, NULL, NULL, NULL, 55),
('2017-12-14 16:08:52', '2017-12-14 16:08:35', '2017-12-14 16:08:47', '00:00:12', 12, 2, 14, 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL COMMENT 'Identificacion del numero de factura',
  `vehiculo_cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente',
  `usuario_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla usuario',
  `usuario_rol_idrol` int(11) NOT NULL COMMENT 'Identificacion del rol de la tabla rol',
  `costo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `vehiculo_cliente_cedula`, `usuario_cedula`, `usuario_rol_idrol`, `costo_id`) VALUES
(46, 3, 1, 1, 1),
(47, 4, 1, 1, 1),
(49, 5, 1, 1, 1),
(50, 1, 1, 1, 1),
(52, 7, 1, 1, 2),
(55, 2, 1, 1, 2),
(57, 6, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicofacturado`
--

CREATE TABLE `historicofacturado` (
  `id` int(11) NOT NULL,
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
  `total` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historicofacturado`
--

INSERT INTO `historicofacturado` (`id`, `nomusu`, `apeusu`, `fechafacturado`, `cedulaclie`, `nomclie`, `apeclie`, `telclie1`, `telclie2`, `matricula`, `marca`, `modelo`, `tipo`, `descripcion`, `horaingreso`, `horasalida`, `duracion`, `precio`, `iva`, `total`) VALUES
(7, 'administrador', 'parqueadero', '2017-11-30 22:35:16', '1', 'kjhjk', 'kjhjk', 'kjh', 'khj', 'kjhk', 'kjlh', 'kjh', 'moto', 'kjhk', '2017-11-30 22:32:21', '2017-11-30 22:35:16', '00:02:55', '175', '28', '203'),
(8, 'administrador', 'parqueadero', '2017-11-30 22:36:57', '1', 'kjhjk', 'kjhjk', 'kjh', 'khj', 'kjhk', 'kjlh', 'kjh', 'bicicleta', 'kjhk', '2017-11-30 22:35:38', '2017-11-30 22:36:57', '00:01:19', '79', '13', '92'),
(9, 'administrador', 'parqueadero', '2017-11-30 22:58:04', '1', 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj', 'kjhk', 'kjhklj', 'khkl', 'moto', 'kjhl', '2017-11-30 22:38:27', '2017-11-30 22:58:04', '00:19:37', '1177', '188', '1365'),
(10, 'administrador', 'parqueadero', '2017-11-30 23:10:12', '1', 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj', 'kjhk', 'kjhklj', 'khkl', 'moto', 'kjhl', '2017-11-30 23:10:02', '2017-11-30 23:10:12', '00:00:10', '10', '2', '12'),
(11, 'administrador', 'parqueadero', '2017-11-30 23:10:36', '3', 'dfgdsf', 'dfsg', 'dfsg', 'dfg', 'dfg', 'fdsg', 'dsfg', 'moto', 'dfg', '2017-11-30 23:10:29', '2017-11-30 23:10:36', '00:00:07', '7', '1', '8'),
(12, 'administrador', 'parqueadero', '2017-12-01 22:12:06', '1', 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj', 'kjhk', 'kjhklj', 'khkl', 'moto', 'kjhl', '2017-12-01 22:06:04', '2017-12-01 22:12:06', '00:06:02', '362', '58', '420'),
(13, 'administrador', 'parqueadero', '2017-12-06 13:56:46', '1', 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj', 'kjhk', 'kjhklj', 'khkl', 'moto', 'kjhl', '2017-12-01 22:12:13', '2017-12-06 13:56:46', '111:44:33', '402273', '64364', '466637'),
(14, 'administrador', 'parqueadero', '2017-12-08 11:30:34', '1', 'kjhkh', 'kjhkjlh', 'kjhjkl', 'khkj', 'kjhk', 'kjhklj', 'khkl', 'moto', 'fghfgh', '2017-12-06 13:56:57', '2017-12-08 11:30:34', '45:33:37', '164017', '26243', '190260'),
(15, 'administrador', 'parqueadero', '2017-12-08 11:32:23', '6', 'dfsg', 'dfsg', 'dfg', 'dfg', 'dfg', 'fdg', 'fdg', 'bicicleta', 'dfgfdsg', '2017-12-08 11:17:07', '2017-12-08 11:32:23', '00:15:16', '916', '147', '1063'),
(16, 'administrador', 'parqueadero', '2017-12-09 17:04:49', '2', 'gfdsgdfsg', 'kjhk', 'dsfg', 'dfsg', 'dfg', 'dfg', 'dfsgsfd', 'moto', 'dsfgfdsg', '2017-11-30 22:39:36', '2017-12-09 17:04:49', '210:25:13', '757513', '121202', '878715'),
(17, 'administrador', 'parqueadero', '2017-12-09 17:20:01', '2', 'g', 'fdsgsdsfg', 'dfsg', 'dfsg', 'dsfg', 'fdsg', 'dfg', 'bicicleta', 'fdsg', '2017-12-09 17:19:50', '2017-12-09 17:20:01', '00:00:11', '11', '2', '13'),
(18, 'administrador', 'parqueadero', '2017-12-09 17:24:08', '2', 'GSDF', 'DFSG', 'DFSG', 'DFG', 'SDFG', 'DSFG', 'DSFG', 'bicicleta', 'DSFG', '2017-12-09 17:24:03', '2017-12-09 17:24:08', '00:00:05', '5', '1', '6'),
(19, 'administrador', 'parqueadero', '2017-12-14 16:03:47', '3', 'dfgdsf', 'dfsg', 'dfsg', 'dfg', 'dfg', 'fdsg', 'dsfg', 'moto', 'dfg', '2017-12-01 22:08:23', '2017-12-14 16:03:47', '305:55:24', '1101324', '176212', '1277536'),
(20, 'administrador', 'parqueadero', '2017-12-14 16:07:06', '6', 'gfds', 'gdsfg', 'dfsg', 'fdsg', 'dsfg', 'dfsg', 'dfsg', 'moto', 'dsfg', '2017-12-14 16:06:52', '2017-12-14 16:07:06', '00:00:14', '14', '2', '16'),
(21, 'administrador', 'parqueadero', '2017-12-14 16:08:47', '6', 'gfds', 'gdsfg', 'dfsg', 'fdsg', 'dsfg', 'dfsg', 'dfsg', 'moto', 'dsfg', '2017-12-14 16:08:35', '2017-12-14 16:08:47', '00:00:12', '12', '2', '14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL COMMENT 'Identificacion del cargo desempeñado en el parqueadero',
  `descripcion` varchar(45) NOT NULL COMMENT 'Descripcion del cargo que desempeña en el parqueadero\n'
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

CREATE TABLE `tipo` (
  `idtipo` int(11) NOT NULL COMMENT 'Numero de identificacion de la tabla tipo',
  `tipo` varchar(45) NOT NULL COMMENT 'Tipo de vehiculo',
  `descripcion` varchar(45) NOT NULL COMMENT 'Descripcion del vehiculo',
  `marca` varchar(45) NOT NULL COMMENT 'Marca del vehiculo',
  `modelo` varchar(45) NOT NULL COMMENT 'Modelo del vehiculo',
  `vehiculo_cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idtipo`, `tipo`, `descripcion`, `marca`, `modelo`, `vehiculo_cliente_cedula`) VALUES
(49, 'moto', 'dfg', 'fdsg', 'dsfg', 3),
(50, 'moto', 'hg', 'fgh', 'h', 4),
(52, 'moto', 'fdh', 'fgh', 'fgh', 5),
(53, 'moto', 'fghfgh', 'kjhklj', 'khkl', 1),
(55, 'bicicleta', 'dfsg', 'dfg', 'dfsg', 7),
(58, 'bicicleta', 'DSFG', 'DSFG', 'DSFG', 2),
(60, 'moto', 'dsfg', 'dfsg', 'dfsg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL COMMENT 'Numero de cedula del dueño de vehiculo',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre del usuario del vehiculo',
  `apellido` varchar(45) NOT NULL COMMENT 'Apellido del usuario del vehiculo',
  `contrasena` varchar(255) NOT NULL COMMENT 'Contraseña del usuario del vehiculo',
  `rol_idrol` int(11) NOT NULL COMMENT 'Identificacion de la tabla rol que se encuentra en la tabla usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `apellido`, `contrasena`, `rol_idrol`) VALUES
(1, 'administrador', 'parqueadero', 'adcd7048512e64b48da55b027577886ee5a36350', 1),
(2, 'usuario', 'parqueadero', 'adcd7048512e64b48da55b027577886ee5a36350', 2),
(50, 'Noratos', 'Parking', '06b78bd46c4b272ed9a11d5f96b208646339e478', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(45) NOT NULL COMMENT 'Matricula o identificacion del vehiculo',
  `marca` varchar(45) NOT NULL COMMENT 'Marca del vehiculo',
  `modelo` varchar(45) NOT NULL COMMENT 'Modelo del vehiculo',
  `cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `marca`, `modelo`, `cliente_cedula`) VALUES
('kjhk', 'kjhklj', 'khkl', 1),
('DSFG', 'DSFG', 'DSFG', 2),
('dfg', 'fdsg', 'dsfg', 3),
('fgh', 'fgh', 'h', 4),
('fgh', 'fgh', 'fgh', 5),
('dsfg', 'dfsg', 'dfsg', 6),
('dfsg', 'dfg', 'dfsg', 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `costo`
--
ALTER TABLE `costo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`factura_idFactura`),
  ADD KEY `fk_Detalle_factura_Factura1_idx` (`factura_idFactura`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`,`vehiculo_cliente_cedula`,`usuario_cedula`,`usuario_rol_idrol`,`costo_id`),
  ADD KEY `fk_Factura_vehiculo1_idx` (`vehiculo_cliente_cedula`),
  ADD KEY `fk_Factura_usuario1_idx` (`usuario_cedula`,`usuario_rol_idrol`),
  ADD KEY `fk_factura_costo1_idx` (`costo_id`);

--
-- Indices de la tabla `historicofacturado`
--
ALTER TABLE `historicofacturado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idtipo`,`vehiculo_cliente_cedula`),
  ADD KEY `fk_tipo_vehiculo1_idx` (`vehiculo_cliente_cedula`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`,`rol_idrol`),
  ADD KEY `fk_usuario_rol1_idx` (`rol_idrol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`cliente_cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del numero de factura', AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `historicofacturado`
--
ALTER TABLE `historicofacturado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de identificacion de la tabla tipo', AUTO_INCREMENT=61;
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
  ADD CONSTRAINT `fk_factura_costo1` FOREIGN KEY (`costo_id`) REFERENCES `costo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
