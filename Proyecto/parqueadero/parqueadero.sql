-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2018 a las 18:24:51
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

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
(11, 'safdf', '', '', ''),
(12, 'njhv', 'vnb', 'v', 'nbv'),
(22, 'bhb', 'b', 'hjb', 'bjh'),
(25, 'mbnbmn', 'bmn', 'mnb', 'bb'),
(65, 'czgxbnfg', 'ngjgfy', 'ghfjht', 'hgkj'),
(66, 'jkn', 'nkj', 'kjn', 'nkj'),
(123, 'dsf', 'gdsfg', 'dfs', 'gdfsg'),
(124, 'sdaf', 'sdaf', 'sdaf', 'sdaf'),
(125, 'sdfg', 'dfsg', 'df', 'dsfg'),
(222, 'bhjvb', 'vjh', 'vjh', 'vj'),
(223, 'trew', 'ewrt', 'wer', 'erw'),
(225, 'sadf', 'sdaf', 'sdaf', 'sdaf'),
(2222, 'sadf', 'sdaf', 'sdaf', 'sdaf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo`
--

CREATE TABLE `costo` (
  `id` int(11) NOT NULL,
  `vehiculo` varchar(11) NOT NULL,
  `pmin` int(11) NOT NULL DEFAULT '60',
  `phoras` int(15) NOT NULL,
  `pdias` int(15) NOT NULL,
  `pmensual` int(15) NOT NULL
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

CREATE TABLE `cupos` (
  `id` int(11) NOT NULL,
  `motos` varchar(45) NOT NULL,
  `bicicletas` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cupos`
--

INSERT INTO `cupos` (`id`, `motos`, `bicicletas`) VALUES
(1, '60', '60');

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
('2018-03-17 12:51:25', '2018-03-17 12:50:08', '2018-03-17 12:51:25', '00:01:17', 77, 12, 89, 117),
('2018-03-18 09:17:59', '2018-03-18 08:26:01', '2018-03-18 09:17:59', '00:51:58', 3118, 499, 3617, 126),
('2018-03-18 08:43:17', '2018-03-18 08:31:23', '2018-03-18 08:43:17', '00:11:54', 714, 114, 828, 127),
('2018-03-18 09:27:58', '2018-03-18 09:27:58', NULL, NULL, NULL, NULL, NULL, 128),
('2018-03-18 09:29:02', '2018-03-18 09:29:02', NULL, NULL, NULL, NULL, NULL, 129);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacionamiento`
--

CREATE TABLE `estacionamiento` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estacionamiento`
--

INSERT INTO `estacionamiento` (`id`, `numero`) VALUES
(30, 2),
(31, 1),
(32, 80),
(33, 79),
(34, 36),
(35, 5),
(36, 5),
(37, 5),
(38, 5),
(39, 5),
(40, 5),
(41, 5),
(42, 1),
(43, 1),
(44, 2),
(45, 1),
(46, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `idFactura` int(11) NOT NULL COMMENT 'Identificacion del numero de factura',
  `vehiculo_cliente_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla cliente',
  `usuario_cedula` int(11) NOT NULL COMMENT 'Cedula de la tabla usuario',
  `usuario_rol_idrol` int(11) NOT NULL COMMENT 'Identificacion del rol de la tabla rol',
  `costo_id` int(11) NOT NULL,
  `estacionamiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`idFactura`, `vehiculo_cliente_cedula`, `usuario_cedula`, `usuario_rol_idrol`, `costo_id`, `estacionamiento_id`) VALUES
(128, 12, 1, 1, 1, 30),
(129, 25, 1, 1, 2, 30),
(127, 124, 1, 1, 2, 30),
(126, 125, 1, 1, 1, 30),
(117, 225, 1, 1, 1, 30);

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
(78, 'administrador', 'parqueadero', '2018-03-17 12:51:25', '225', 'sadf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sadf', 'moto', 'sdaf', '2018-03-17 12:50:08', '2018-03-17 12:51:25', '00:01:17', '77', '12', '89'),
(79, 'administrador', 'parqueadero', '2018-03-17 14:16:06', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'moto', 'sdaf', '2018-03-17 14:15:08', '2018-03-17 14:16:06', '00:00:58', '58', '9', '67'),
(80, 'administrador', 'parqueadero', '2018-03-17 14:27:08', '124', 'dfs', 'dsfg', 'dsfg', 'dsfg', 'dfsg', 'sdf', 'dsfg', 'moto', 'dfsg', '2018-03-17 14:17:17', '2018-03-17 14:27:08', '00:09:51', '591', '95', '686'),
(81, 'administrador', 'parqueadero', '2018-03-17 14:28:43', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'moto', 'sdaf', '2018-03-17 14:27:23', '2018-03-17 14:28:43', '00:01:20', '80', '13', '93'),
(82, 'administrador', 'parqueadero', '2018-03-17 14:31:22', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'moto', 'sdaf', '2018-03-17 14:30:06', '2018-03-17 14:31:22', '00:01:16', '76', '12', '88'),
(83, 'administrador', 'parqueadero', '2018-03-17 14:35:19', '124', 'tercero', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'moto', 'sdaf', '2018-03-17 14:31:33', '2018-03-17 14:35:19', '00:03:46', '226', '36', '262'),
(84, 'administrador', 'parqueadero', '2018-03-17 14:40:34', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'moto', 'sdaf', '2018-03-17 14:35:28', '2018-03-17 14:40:34', '00:05:06', '306', '49', '355'),
(85, 'administrador', 'parqueadero', '2018-03-18 08:11:30', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-17 15:04:12', '2018-03-18 08:11:30', '17:07:18', '61638', '9862', '71500'),
(86, 'administrador', 'parqueadero', '2018-03-18 08:13:02', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-18 08:11:46', '2018-03-18 08:13:02', '00:01:16', '76', '12', '88'),
(87, 'administrador', 'parqueadero', '2018-03-18 08:43:17', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'bicicleta', 'sdaf', '2018-03-18 08:31:23', '2018-03-18 08:43:17', '00:11:54', '714', '114', '828'),
(88, 'administrador', 'parqueadero', '2018-03-18 09:17:59', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-18 08:26:01', '2018-03-18 09:17:59', '00:51:58', '3118', '499', '3617');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueados`
--

CREATE TABLE `parqueados` (
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
  `total` varchar(45) DEFAULT NULL,
  `estacionamiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parqueados`
--

INSERT INTO `parqueados` (`id`, `nomusu`, `apeusu`, `fechafacturado`, `cedulaclie`, `nomclie`, `apeclie`, `telclie1`, `telclie2`, `matricula`, `marca`, `modelo`, `tipo`, `descripcion`, `horaingreso`, `horasalida`, `duracion`, `precio`, `iva`, `total`, `estacionamiento`) VALUES
(1, 'administrador', 'parqueadero', '2018-03-17 15:04:12', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-17 15:04:12', NULL, NULL, NULL, NULL, NULL, 5),
(2, 'administrador', 'parqueadero', '2018-03-18 08:11:46', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-18 08:11:46', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'administrador', 'parqueadero', '2018-03-18 08:26:00', '125', 'sdfg', 'dfsg', 'df', 'dsfg', 'dfsg', 'dfg', 'df', 'moto', 'df', '2018-03-18 08:26:00', NULL, NULL, NULL, NULL, NULL, 1),
(4, 'administrador', 'parqueadero', '2018-03-18 08:31:22', '124', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sdaf', 'sadf', 'sdfa', 'bicicleta', 'sdaf', '2018-03-18 08:31:22', NULL, NULL, NULL, NULL, NULL, 2),
(5, 'administrador', 'parqueadero', '2018-03-18 09:27:58', '12', 'njhv', 'vnb', 'v', 'nbv', 'dsa', 'vn', 'vnb', 'moto', 'nbv', '2018-03-18 09:27:58', NULL, NULL, NULL, NULL, NULL, 1),
(6, 'administrador', 'parqueadero', '2018-03-18 09:29:02', '25', 'mbnbmn', 'bmn', 'mnb', 'bb', 'njbn', 'bmn', 'b', 'bicicleta', 'nbnb', '2018-03-18 09:29:02', NULL, NULL, NULL, NULL, NULL, 3);

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
(124, 'moto', '', '', '', 11),
(125, 'moto', 'lkj', 'hjk', 'liu', 65),
(126, 'moto', 'hv', 'bvjhbvhj', 'vjh', 222),
(127, 'moto', 'bjh', 'hjbjh', 'jhb', 22),
(128, 'moto', 'nk', 'jnjk', 'n', 66),
(129, 'moto', 'sdaf', 'sdaf', 'dsaf', 2222),
(130, 'moto', 'dfsg', 'gf', 'dsf', 223),
(131, 'moto', 'sdaf', 'sadf', 'sadf', 225),
(132, 'moto', 'dfsg', 'dsfg', 'dfsg', 123),
(141, 'moto', 'df', 'dfg', 'df', 125),
(142, 'bicicleta', 'sdaf', 'sadf', 'sdfa', 124),
(143, 'moto', 'nbv', 'vn', 'vnb', 12),
(144, 'bicicleta', 'nbnb', 'bmn', 'b', 25);

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
(1, 'administrador', 'parqueadero', 'adcd7048512e64b48da55b027577886ee5a36350', 1);

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
('', '', '', 11),
('dsa', 'vn', 'vnb', 12),
('bhvghv', 'hjbjh', 'jhb', 22),
('njbn', 'bmn', 'b', 25),
('jhgk', 'hjk', 'liu', 65),
('mnjk', 'jnjk', 'n', 66),
('dsfg', 'dsfg', 'dfsg', 123),
('sdaf', 'sadf', 'sdfa', 124),
('dfsg', 'dfg', 'df', 125),
('', 'bvjhbvhj', 'vjh', 222),
('wert', 'gf', 'dsf', 223),
('sdaf', 'sadf', 'sadf', 225),
('sdaf', 'sdaf', 'dsaf', 2222);

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
-- Indices de la tabla `cupos`
--
ALTER TABLE `cupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`factura_idFactura`),
  ADD KEY `fk_Detalle_factura_Factura1_idx` (`factura_idFactura`);

--
-- Indices de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`idFactura`,`vehiculo_cliente_cedula`,`usuario_cedula`,`usuario_rol_idrol`,`costo_id`,`estacionamiento_id`),
  ADD KEY `fk_Factura_vehiculo1_idx` (`vehiculo_cliente_cedula`),
  ADD KEY `fk_Factura_usuario1_idx` (`usuario_cedula`,`usuario_rol_idrol`),
  ADD KEY `fk_factura_costo1_idx` (`costo_id`),
  ADD KEY `fk_factura_estacionamiento1_idx` (`estacionamiento_id`);

--
-- Indices de la tabla `historicofacturado`
--
ALTER TABLE `historicofacturado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parqueados`
--
ALTER TABLE `parqueados`
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
-- AUTO_INCREMENT de la tabla `cupos`
--
ALTER TABLE `cupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estacionamiento`
--
ALTER TABLE `estacionamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `idFactura` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificacion del numero de factura', AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT de la tabla `historicofacturado`
--
ALTER TABLE `historicofacturado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT de la tabla `parqueados`
--
ALTER TABLE `parqueados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Numero de identificacion de la tabla tipo', AUTO_INCREMENT=145;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
