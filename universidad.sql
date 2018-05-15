-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2018 a las 04:12:40
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

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
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idAdministracion` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `TipoUsuario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idAdministracion`, `Nombre`, `Correo`, `Password`, `TipoUsuario`) VALUES
(1, 'GERSON RODOLFO CHAMALE MEJIA', 'parkour100gerson@gmail.com', '111111', 'Admin'),
(2, 'FREDY', 'fredy@gmail.com', '222222', 'Secretario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Edad` int(13) NOT NULL,
  `Direccion` tinytext NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `DPI` double NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `TipoUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `Nombre`, `Edad`, `Direccion`, `Telefono`, `Sexo`, `DPI`, `Password`, `Correo`, `TipoUsuario`) VALUES
(1, 'JOSE FRANCISCO BARRIOS ROQUE', 23, 'san benito peten', 31465812, 'Masculino', 2154318259745, '111111', 'jose@gmail.com', 'Alumno'),
(2, 'ELI NO SANCHEZ SALGUERO', 22, 'carretera a melchor peten', 64851395, 'Masculino', 79843186549725, '222222', 'eli@gmail.com', 'Alumno'),
(13, 'CAROLIN', 1, '1', 1, 'Masculino', 1, '1', '1', 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacioncursos`
--

CREATE TABLE `asignacioncursos` (
  `idAsignacion` int(11) NOT NULL,
  `IdAlumno4` int(11) NOT NULL,
  `IdCurso2` int(11) NOT NULL,
  `Solvencia` tinyint(4) NOT NULL,
  `idSemestre2` int(11) NOT NULL,
  `idCarrera3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idCarrera` int(11) NOT NULL,
  `NombreCarrera` varchar(50) NOT NULL,
  `Duracion` int(11) NOT NULL,
  `CodCarrera` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `NombreCarrera`, `Duracion`, `CodCarrera`) VALUES
(2, 'CRIMINOLOGIA', 5, 3311),
(3, 'CRIMINALISTICA', 5, 3481),
(4, 'ENFERMERIA', 5, 9485),
(6, 'ARQUITECTURA', 6, 3169),
(7, 'INGENIERIA EN SISTEMAS DE INFORMACION', 5, 1690),
(8, 'INGENIERIA EN ELECTRONICA', 6, 1770);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedra`
--

CREATE TABLE `catedra` (
  `IdAlumno2` int(11) NOT NULL,
  `IdProfesor2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Creditos` int(11) NOT NULL,
  `Semestre` varchar(2) DEFAULT NULL,
  `Carrera` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `Nombre`, `Creditos`, `Semestre`, `Carrera`) VALUES
(1, 'METODOS NUMERICOS', 5, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(2, 'PROGRAMACION III', 5, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(3, 'ESTADISTICA II', 5, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(4, 'ELECTRONICA ANALOGICA', 5, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(5, 'COMPILADORES', 5, '7', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(6, 'PROCESO ADMINISTRATIVO', 5, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(8, 'INTRODUCCION A LOS SISTEMAS DE COMPUTO', 5, '1', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(9, 'BASE DE DATOS I', 5, '6', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(10, 'PROGRAMACION I', 5, '2', 'INGENIERIA EN SISTEMAS DE INFORMACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_car`
--

CREATE TABLE `est_car` (
  `idAlumno5` int(11) NOT NULL,
  `idCarrera1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `idFacultad` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `IdCurso1` int(11) NOT NULL,
  `IdAlumno3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprofs`
--

CREATE TABLE `materiaprofs` (
  `idCurso3` int(11) NOT NULL,
  `idProfesor1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `idMes` int(11) NOT NULL,
  `NombreMes` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`idMes`, `NombreMes`) VALUES
(1, 'FEBRERO'),
(2, 'MARZO'),
(3, 'ABRIL'),
(4, 'MAYO'),
(5, 'JUNIO'),
(6, 'JULIO'),
(7, 'AGOSTO'),
(8, 'SEPTIEMBRE'),
(9, 'OCTUBRE'),
(10, 'NOVIEMBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagomensualidad`
--

CREATE TABLE `pagomensualidad` (
  `idPagoMensualidad` int(11) NOT NULL,
  `idAlumno1` int(11) NOT NULL,
  `idCarrera2` int(11) NOT NULL,
  `idCurso4` int(11) NOT NULL,
  `idFacultad1` int(11) NOT NULL,
  `idSemestre1` int(11) NOT NULL,
  `Mes` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `idProfesor` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `DPI` double NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `TipoUsuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `Nombre`, `Direccion`, `Telefono`, `Password`, `DPI`, `Correo`, `TipoUsuario`) VALUES
(1, 'JORGE RAMIRO IBARRA MONRY', 'ciudad de guatemala', 31582674, '111111', 3164792587416, 'jorge@gmail.com', 'Maestro'),
(5, 'JORGE ALAN CAMEY', 'ciudad capital', 13468259, '121212', 134628645297, 'jorge@gmail.com', 'Maestro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `idSemestre` int(11) NOT NULL,
  `NoSemestre` varchar(2) DEFAULT NULL,
  `Carrera` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`idSemestre`, `NoSemestre`, `Carrera`) VALUES
(4, '10', 'CRIMINOLOGIA'),
(5, '1', 'CRIMINOLOGIA'),
(6, '1', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(7, '2', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(8, '3', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(9, '4', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(10, '5', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(11, '6', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(12, '7', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(13, '8', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(14, '9', 'INGENIERIA EN SISTEMAS DE INFORMACION'),
(15, '10', 'INGENIERIA EN SISTEMAS DE INFORMACION');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`idAdministracion`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indices de la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  ADD PRIMARY KEY (`idAsignacion`),
  ADD KEY `IdAlumno2_idx` (`IdAlumno4`),
  ADD KEY `IdCurso2_idx` (`IdCurso2`),
  ADD KEY `idSemestre2_idx` (`idSemestre2`),
  ADD KEY `idCarrera1_idx` (`idCarrera3`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idCarrera`);

--
-- Indices de la tabla `catedra`
--
ALTER TABLE `catedra`
  ADD KEY `IdAlumno1_idx` (`IdAlumno2`),
  ADD KEY `IdProfesor1_idx` (`IdProfesor2`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Indices de la tabla `est_car`
--
ALTER TABLE `est_car`
  ADD KEY `idAlumno1_idx` (`idAlumno5`),
  ADD KEY `idCarrera1_idx` (`idCarrera1`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`idFacultad`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD KEY `IdCurso1_idx` (`IdCurso1`),
  ADD KEY `IdAlumno2_idx` (`IdAlumno3`);

--
-- Indices de la tabla `materiaprofs`
--
ALTER TABLE `materiaprofs`
  ADD KEY `idCurso1_idx` (`idCurso3`),
  ADD KEY `idProfesor1_idx` (`idProfesor1`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`idMes`);

--
-- Indices de la tabla `pagomensualidad`
--
ALTER TABLE `pagomensualidad`
  ADD PRIMARY KEY (`idPagoMensualidad`),
  ADD KEY `idAlumno1_idx` (`idAlumno1`),
  ADD KEY `idCarrera1_idx` (`idCarrera2`),
  ADD KEY `idCurso1_idx` (`idCurso4`),
  ADD KEY `idFacultad1_idx` (`idFacultad1`),
  ADD KEY `idSemestre1_idx` (`idSemestre1`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`idProfesor`);

--
-- Indices de la tabla `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`idSemestre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `idAdministracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  MODIFY `idAsignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `idFacultad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `idMes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pagomensualidad`
--
ALTER TABLE `pagomensualidad`
  MODIFY `idPagoMensualidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  ADD CONSTRAINT `IdAlumno4` FOREIGN KEY (`IdAlumno4`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdCurso2` FOREIGN KEY (`IdCurso2`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCarrera3` FOREIGN KEY (`idCarrera3`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSemestre2` FOREIGN KEY (`idSemestre2`) REFERENCES `semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catedra`
--
ALTER TABLE `catedra`
  ADD CONSTRAINT `IdAlumno2` FOREIGN KEY (`IdAlumno2`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdProfesor2` FOREIGN KEY (`IdProfesor2`) REFERENCES `profesor` (`idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `est_car`
--
ALTER TABLE `est_car`
  ADD CONSTRAINT `idAlumno_6` FOREIGN KEY (`idAlumno5`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCarrera_1` FOREIGN KEY (`idCarrera1`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `IdAlumno3` FOREIGN KEY (`IdAlumno3`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `IdCurso1` FOREIGN KEY (`IdCurso1`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materiaprofs`
--
ALTER TABLE `materiaprofs`
  ADD CONSTRAINT `idCurso_3` FOREIGN KEY (`idCurso3`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idProfesor_1` FOREIGN KEY (`idProfesor1`) REFERENCES `profesor` (`idProfesor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagomensualidad`
--
ALTER TABLE `pagomensualidad`
  ADD CONSTRAINT `idAlumno_1` FOREIGN KEY (`idAlumno1`) REFERENCES `alumnos` (`idAlumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCarrera_2` FOREIGN KEY (`idCarrera2`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCurso_4` FOREIGN KEY (`idCurso4`) REFERENCES `curso` (`idCurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idFacultad_1` FOREIGN KEY (`idFacultad1`) REFERENCES `facultad` (`idFacultad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSemestre_1` FOREIGN KEY (`idSemestre1`) REFERENCES `semestre` (`idSemestre`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
