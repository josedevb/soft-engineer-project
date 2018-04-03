-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 01:13 am
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `urbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `datospersonales`
--

CREATE TABLE IF NOT EXISTS `datospersonales` (
  `id_persona` int(8) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  PRIMARY KEY (`id_persona`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `datospersonales`
--

INSERT INTO `datospersonales` (`id_persona`, `nombre`, `apellido`, `correo`, `telefono`, `cedula`, `fecha`, `genero`) VALUES
(1, 'Jackson Kilso', 'kele', 'jkilso@gmail.com', '04246305840', 26070666, '24-12-2007', 'Masculino'),
(2, 'gerardo', 'etv', 'gerardoepp@gmail.com', '04146441712', 25660835, '12-52-1994', 'Femenino');

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE IF NOT EXISTS `ordenes` (
  `id_orden` int(20) NOT NULL AUTO_INCREMENT,
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
  `estado_orden` varchar(20) NOT NULL,
  PRIMARY KEY (`id_orden`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ordenes`
--

INSERT INTO `ordenes` (`id_orden`, `id_usuario_emisor`, `id_usuario_receptor`, `tipo_mantenimiento`, `usuario_equipo`, `mecanico_asignado`, `fecha_reporte`, `hora_reporte`, `fecha_inicio`, `hora_inicio`, `fecha_culminacion`, `hora_culminacion`, `km`, `unidad_equipo`, `placa_equipo`, `ultima_actividad`, `taller_externo`, `fecha_inicio_taller`, `fecha_culminacion_taller`, `hora_taller`, `garantia`, `descripcion_falla`, `estado_orden`) VALUES
(1, 1, 2, 'preventivo', 'Jose B', 'mecanico 2', '0012-12-21', '12:12', '0212-11-12', '12:12', '1212-01-12', '12:12', 121, '12:12', 'placa 1', 'asd', 'asdasd', '1123-02-11', '0012-12-12', '11:02', 'garantizado', 'falla en la bomba', 'Pendiente'),
(2, 1, 2, 'predictivo', 'Anthony', 'mecanico 3', '0012-12-21', '12:12', '0212-11-12', '12:12', '1212-01-12', '12:12', 200, '12:12', 'placa 2', 'actividad 3', 'taller2', '1123-02-11', '0012-12-12', '11:02', 'garantizado', 'falla en la bomba nueva', 'Pendiente');

-- --------------------------------------------------------

--
-- Table structure for table `reparaciones`
--

CREATE TABLE IF NOT EXISTS `reparaciones` (
  `id_reparacion` int(100) NOT NULL AUTO_INCREMENT,
  `cantidad` int(100) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `procedencia` varchar(100) NOT NULL,
  `req_mant_no` varchar(100) NOT NULL,
  `precio_unit` int(50) NOT NULL,
  `precio_total` int(100) NOT NULL,
  `id_orden` int(100) NOT NULL,
  PRIMARY KEY (`id_reparacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `repuestos`
--

CREATE TABLE IF NOT EXISTS `repuestos` (
  `id_repuesto` int(100) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `codigo` int(100) NOT NULL,
  `descripcion` int(100) NOT NULL,
  `req_mant_no` varchar(100) NOT NULL,
  `precio_unit` int(100) NOT NULL,
  `precio_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `observacion` varchar(200) NOT NULL,
  `hora_respuesta` int(50) NOT NULL,
  `fecha_respuesta` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(8) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `cargo` int(1) NOT NULL,
  `id_persona` int(10) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `cargo`, `id_persona`) VALUES
(1, 'operaciones', '1234', 2, 1),
(2, 'mantenimiento', '1234', 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
