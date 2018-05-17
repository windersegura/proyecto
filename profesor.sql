-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2018 a las 21:09:24
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
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `idProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `DPI` double NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `TipoUsuario` varchar(10) NOT NULL,
  PRIMARY KEY (`idProfesor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `Nombre`, `Direccion`, `Telefono`, `Password`, `DPI`, `Correo`, `TipoUsuario`) VALUES
(1, 'JORGE RAMIRO IBARRA', 'Ciudad de Guatemala', 31582674, '111111', 3164792587416, 'jorgeibarra@gmail.com', 'Maestro'),
(5, 'JORGE ALAN CAMEY', 'Ciudad de Guatemala', 13468259, '121212', 134628645297, 'jorgecamey@gmail.com', 'Maestro'),
(6, 'Luis Felipe Morales Herrera', 'San Benito', 80502778, '818415', 4097444228826, 'luismorales@yahoo.com', 'Maestro'),
(7, 'Gilda Beatriz Ruiz Castillo', 'Flores', 35849960, '810482', 2762446012347, 'gildacastillo@yahoo.com', 'Maestro'),
(8, 'Rosa Garay Sanchez', 'San Francisco', 94952660, '395267', 2756189879029, 'garayrs@gmail.com', 'Maestro'),
(9, 'Juan Noe Uceda Soto', 'Santa Ana', 83023345, '158507', 2867853414267, 'sotojuan@yahoo.com', 'Maestro');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
