-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2018 a las 22:28:39
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urbe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datospersonales`
--

CREATE TABLE `datospersonales` (
  `id_persona` int(8) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datospersonales`
--

INSERT INTO `datospersonales` (`id_persona`, `nombre`, `apellido`, `correo`, `telefono`, `cedula`, `fecha`, `genero`) VALUES
(1, 'Jackson Kilso', 'kele', 'jkilso@gmail.com', '04246305840', 26070666, '24-12-2007', 'Masculino'),
(2, 'gerardo', 'etv', 'gerardoepp@gmail.com', '04146441712', 25660835, '12-52-1994', 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id_orden` int(20) NOT NULL,
  `id_usuario_emisor` int(20) NOT NULL,
  `id_usuario_receptor` int(20) NOT NULL,
  `tipo_mantenimiento` varchar(20) NOT NULL,
  `usuario_equipo` varchar(50) NOT NULL,
  `mecanico_asignado` varchar(50) NOT NULL,
  `fecha_reporte` varchar(50) NOT NULL,
  `hora_reporte` varchar(20) NOT NULL,
  `fecha_inicio` varchar(20) NOT NULL,
  `hora_inicio` varchar(20) NOT NULL,
  `fecha_culminacion` varchar(20) NOT NULL,
  `hora_culminacion` varchar(20) NOT NULL,
  `km` int(50) NOT NULL,
  `unidad_equipo` varchar(50) NOT NULL,
  `placa_equipo` varchar(50) NOT NULL,
  `ultima_actividad` varchar(100) NOT NULL,
  `taller_externo` varchar(100) NOT NULL,
  `fecha_inicio_taller` varchar(50) NOT NULL,
  `fecha_culminacion_taller` varchar(50) NOT NULL,
  `hora_taller` varchar(20) NOT NULL,
  `garantia` varchar(20) NOT NULL,
  `descripcion_falla` varchar(200) NOT NULL,
  `estado_orden` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `id_usuario_emisor`, `id_usuario_receptor`, `tipo_mantenimiento`, `usuario_equipo`, `mecanico_asignado`, `fecha_reporte`, `hora_reporte`, `fecha_inicio`, `hora_inicio`, `fecha_culminacion`, `hora_culminacion`, `km`, `unidad_equipo`, `placa_equipo`, `ultima_actividad`, `taller_externo`, `fecha_inicio_taller`, `fecha_culminacion_taller`, `hora_taller`, `garantia`, `descripcion_falla`, `estado_orden`) VALUES
(1, 1, 2, 'preventivo', 'Jose B', 'mecanico 2', '0012-12-21', '12:12', '0212-11-12', '12:12', '1212-01-12', '12:12', 121, '12:12', 'placa 1', 'asd', 'asdasd', '1123-02-11', '0012-12-12', '11:02', 'garantizado', 'falla en la bomba', 'Aprobado'),
(2, 1, 2, 'predictivo', 'Anthony', 'mecanico 3', '0012-12-21', '12:12', '0212-11-12', '12:12', '1212-01-12', '12:12', 200, '12:12', 'placa 2', 'actividad 3', 'taller2', '1123-02-11', '0012-12-12', '11:02', 'garantizado', 'falla en la bomba nueva', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id_reparacion` int(100) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `procedencia` varchar(100) NOT NULL,
  `req_mant_no` varchar(100) NOT NULL,
  `precio_unit` int(50) NOT NULL,
  `precio_total` int(100) NOT NULL,
  `id_orden` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparaciones`
--

INSERT INTO `reparaciones` (`id_reparacion`, `cantidad`, `codigo`, `descripcion`, `procedencia`, `req_mant_no`, `precio_unit`, `precio_total`, `id_orden`) VALUES
(1, 123, '1f', '1sdfsdf', '1sdfsdf', '1dfsgsd', 13, 1599, 1),
(2, 23, '2ssdf', 'sddsdf', '2fsdf', '2dfg', 2312, 53176, 1),
(3, 543, '3sdfsfsdf', 'fsdds', '3sdfsd', 'fgd3sdfg', 3213, 1744659, 1),
(4, 12346, 'sdfsdf4', '4sdf', '4fsdf', 'sfgdfg4', 123, 1518558, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones_realizadas`
--

CREATE TABLE `reparaciones_realizadas` (
  `id_reparacion` int(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_orden` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparaciones_realizadas`
--

INSERT INTO `reparaciones_realizadas` (`id_reparacion`, `descripcion`, `id_orden`) VALUES
(1, 'mantequilla1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` int(50) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `procedencia` varchar(100) NOT NULL,
  `req_mant_no` varchar(100) NOT NULL,
  `precio_unit` int(100) NOT NULL,
  `precio_total` int(100) NOT NULL,
  `id_orden` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuesto`, `cantidad`, `codigo`, `descripcion`, `procedencia`, `req_mant_no`, `precio_unit`, `precio_total`, `id_orden`) VALUES
(1, 10, 'code1', 'desc1', 'proce1', 'reqmant1', 10, 100, 1),
(2, 20, 'code2', 'desc2', 'proce2', 'reqmant2', 20, 400, 1),
(3, 30, 'code3', '3', '3', '3', 3, 90, 1),
(4, 40, 'code4', '4', '4', '4', 4, 160, 1),
(5, 50, 'code5', '5', '5', '5', 5, 250, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(50) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `monto_repuesto` double NOT NULL,
  `monto_reparaciones` double NOT NULL,
  `total_facturado` double NOT NULL,
  `fecha_respuesta` varchar(50) NOT NULL,
  `hora_respuesta` varchar(50) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_orden`, `observacion`, `monto_repuesto`, `monto_reparaciones`, `total_facturado`, `fecha_respuesta`, `hora_respuesta`, `tipo`) VALUES
(1, 1, 'observer', 55, 970, 1940, '18-04-05', '22:23:13', 'ActualizaciÃ³n'),
(2, 1, 'observer', 70, 55, 110, '18-04-05', '22:24:09', 'ActualizaciÃ³n'),
(3, 1, 'observer', 70, 85, 170, '18-04-05', '22:24:30', 'ActualizaciÃ³n'),
(4, 1, 'observer', 1000, 85, 170, '18-04-05', '22:25:39', 'ActualizaciÃ³n'),
(5, 1, 'observer', 1000, 66571673, 133143346, '18-04-05', '22:26:11', 'ActualizaciÃ³n'),
(6, 1, 'observer', 1000, 3317992, 6635984, '18-04-05', '22:26:31', 'ActualizaciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(8) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `cargo` int(1) NOT NULL,
  `id_persona` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `cargo`, `id_persona`) VALUES
(1, 'operaciones', '1234', 2, 1),
(2, 'mantenimiento', '1234', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  ADD PRIMARY KEY (`id_persona`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_orden`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id_reparacion`);

--
-- Indices de la tabla `reparaciones_realizadas`
--
ALTER TABLE `reparaciones_realizadas`
  ADD PRIMARY KEY (`id_reparacion`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuesto`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datospersonales`
--
ALTER TABLE `datospersonales`
  MODIFY `id_persona` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id_orden` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id_reparacion` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reparaciones_realizadas`
--
ALTER TABLE `reparaciones_realizadas`
  MODIFY `id_reparacion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_repuesto` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
