-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2016 at 08:36 pm
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
-- Table structure for table `camiones`
--

CREATE TABLE IF NOT EXISTS `camiones` (
  `id_camion` int(100) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `disponible` int(100) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `id_persona` int(100) NOT NULL,
  PRIMARY KEY (`id_camion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `camiones`
--

INSERT INTO `camiones` (`id_camion`, `marca`, `cantidad`, `disponible`, `modelo`, `id_persona`) VALUES
(1, 'Caterpillar', 15, 1, 'ES2', 0);

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
-- Table structure for table `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id_estado` int(10) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id_estado`, `estado`) VALUES
(1, 'Aprobado'),
(2, 'Rechazado'),
(3, 'En espera');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
