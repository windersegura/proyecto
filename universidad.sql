-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2018 a las 10:36:21
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
(2, 'FREDY', 'fredy@gmail.com', '222222', 'Admin'),
(3, 'WINDER', 'winder@hotmail.com', '333333', 'Admin'),
(4, 'SHIRLEY MAYLETH PENADOS', 'shir@gmail.com', '444444', 'Secretario');

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
  `TipoUsuario` varchar(10) NOT NULL,
  `CantidadCursos` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `Nombre`, `Edad`, `Direccion`, `Telefono`, `Sexo`, `DPI`, `Password`, `Correo`, `TipoUsuario`, `CantidadCursos`) VALUES
(1, 'JOSE FRANCISCO BARRIOS ROQUE', 23, 'san benito peten', 31465812, 'Masculino', 2154318259745, '111111', 'jose@gmail.com', 'Alumno', 5),
(2, 'ELI NO SANCHEZ SALGUERO', 22, 'carretera a melchor peten', 64851395, 'Masculino', 79843186549725, '222222', 'eli@gmail.com', 'Alumno', 0),
(13, 'MARIA ANGELES MARTIN LEAL', 19, 'San Luis', 12340999, 'Femenino', 8967454152678, '122334', 'doamari@gmail.com', 'Alumno', 0),
(14, 'CARLOS JOSUE CHAMALE RAMIREZ', 19, 'poptun, peten', 79278154, 'Masculino', 79461346765, '916465', 'carl@gmail.com', 'Alumno', 0),
(15, 'FREDY HENRY SUAREZ CERON', 20, 'San Benito', 50786922, 'Masculino', 3245678909123, '135955', 'suarez@gmail.com', 'Alumno', 0),
(16, 'ROSA MARGARITA LOPEZ PEREZ', 22, 'San Francisco', 56788900, 'Femenino', 5555566678222, '141104', 'rosita@gmail.com', 'Alumno', 0),
(17, 'CARLOS DIAZ CRUZ', 23, 'San Andres', 55556790, 'Masculino', 3456789012345, '255113', 'carlosdc@gmail.com', 'Alumno', 0),
(18, 'DELIA ESPINOSA HERNANDEZ', 19, 'Puerto Barrios', 45678902, 'Femenino', 1234567890098, '790767', 'hernandez45@gmail.com', 'Alumno', 0),
(19, 'CLAUDIA VALERIA DAVILA MONTERO', 22, 'San Francisco', 12567800, 'Femenino', 6777778900034, '544178', 'valeriac@gmail.com', 'Alumno', 0),
(20, 'JULIO ROGELIO CORONADO MEDINA', 25, 'San Benito', 45678903, 'Masculino', 2356789055678, '102488', 'julio@gmail.com', 'Alumno', 0),
(21, 'CARLOS LUIS ERAZO BERNAL', 26, 'Santa Ana', 53483517, 'Masculino', 6720710843801, '587782', 'caslosle@gmail.com', 'Alumno', 0),
(22, 'MARIA YOLANDA ASCENCIO LOPEZ', 19, 'San Andres', 54550426, 'Femenino', 4258705552667, '995784', 'lopezmaria@gmail.com', 'Alumno', 0),
(23, 'JUANA PATRICIA CADENA PALACIOS', 18, 'San Jose', 66697455, 'Femenino', 7262580830603, '652184', 'juanapatricia@gmail.com', 'Alumno', 0),
(24, 'YULIANA ESPINOZA ARANA', 18, 'Poptun', 55536680, 'Femenino', 1395608380436, '277090', 'espinoza@gmail.com', 'Alumno', 0),
(25, 'PRUDENCIANO CABALLERO VALLE', 24, 'San Luis', 16970074, 'Masculino', 7916698012501, '166089', 'pruden@gmail.com', 'Alumno', 0),
(26, 'PERLA CANTU TREVINO', 21, 'La Libertad', 71772428, 'Femenino', 1085561998188, '569272', 'perlacantu@gmail.com', 'Alumno', 0),
(27, 'CECILIA HERRERA CARBAJAL', 22, 'Rio Dulce', 59990868, 'Femenino', 5041408400982, '736244', 'donacecilia@gmail.com', 'Alumno', 0),
(28, 'MARCO ANTONIO CARDENAS CORNEJO', 26, 'Rio Dulce', 12103826, 'Masculino', 5114833854138, '976311', 'cardenasmarco@gmail.com', 'Alumno', 0),
(29, 'GONZALO CARRERA MOLINA', 20, 'Las Cruces', 42089266, 'Masculino', 7325787581503, '510435', 'gonzalo445@gmail.com', 'Alumno', 0),
(30, 'JOSE MARTIN CORCUERA CESPEDES', 24, 'Las Cruces', 11273856, 'Masculino', 909507866948, '905969', 'martincespedes@gmail.com', 'Alumno', 0),
(31, 'SUSAN MEJIA REVOLLEDO', 19, 'San Benito', 30322422, 'Femenino', 142375305294, '696657', 'susan@gmail.com', 'Alumno', 0),
(32, 'VICTOR EMILIO ZUNIGA SALAS', 18, 'San Benito', 58900554, 'Masculino', 1450943585485, '610007', 'victor66@gmail.com', 'Alumno', 0),
(33, 'VICTOR EMILIO ZUNIGA SALAS', 18, 'San Benito', 58900554, 'Masculino', 1450943585485, '610007', 'victor66@gmail.com', 'Alumno', 0),
(34, 'CARLOS ALFONSO LUQUE VILLAVICENCIO', 26, 'Santa Ana', 35143850, 'Masculino', 5934783179312, '955681', 'carlosalfonso66@gmail.com', 'Alumno', 0),
(35, 'JAVIER GUTIERREZ VELEZ', 19, 'San Benito', 64631650, 'Masculino', 7898018538951, '595311', 'javier@gmail.com', 'Alumno', 0),
(36, 'ROGER DIAZ ROJAS', 20, 'Santa Elena', 61673022, 'Masculino', 7459319766610, '385693', 'rogerdr@gmail.com', 'Alumno', 0),
(37, 'ELENA CARPIO SALAZAR', 19, 'Santa Elena', 31501377, 'Femenino', 7887360554188, '599484', 'elenacarpio@gmail.com', 'Alumno', 0),
(38, 'PATRICIO RIVERA OCHOA', 23, 'Poptun', 96233426, 'Masculino', 1644069910049, '113858', 'riveraochoa@hotmail.com', 'Alumno', 0),
(39, 'PATRICIO RIVERA OCHOA', 23, 'Poptun', 96233426, 'Masculino', 1644069910049, '113858', 'riveraochoa@hotmail.com', 'Alumno', 0),
(40, 'LUZ MARIA MENESES', 27, 'San Luis', 97139462, 'Femenino', 7081310417503, '124545', 'luzma@gmail.com', 'Alumno', 0),
(41, 'DAGOBERTO BARRERA ARISTA', 25, 'San Jose', 64562356, 'Masculino', 1901183586567, '978783', 'dagob@gmail.com', 'Alumno', 0),
(42, 'MIGUEL LOPEZ CHORRES', 18, 'Flores', 48653907, 'Masculino', 5426739662885, '676906', 'miguellopez@hotmail.com', 'Alumno', 0),
(43, 'GLADYS PLASENCIA UGAZ', 18, 'Flores', 89293996, 'Femenino', 3302513416856, '236260', 'gladys@hotmail.com', 'Alumno', 0),
(44, 'MARTHA CRESPIN ZAMORA', 21, 'El Chal', 12827440, 'Femenino', 6920157425105, '470008', 'crespin@gmail.com', 'Alumno', 0),
(45, 'ELIZABETH CABALLERO LA MADRID', 23, 'Poptun', 14268014, 'Femenino', 1574590638279, '696734', 'caballero@hotmail.com', 'Alumno', 0),
(46, 'GIRALDO HERRERA MONZON', 21, 'Santa Ana', 21224532, 'Masculino', 3898499038070, '823254', 'monzonherrera@outlook.com', 'Alumno', 0),
(47, 'BETTY ROSELIA TORRES RIVERA', 19, 'Melchor', 39802899, 'Femenino', 3534047681838, '625148', 'torresbr@outlook.com', 'Alumno', 0),
(48, 'LUIS MURIEL RENDON', 23, 'San Benito', 29325241, 'Masculino', 2197287850081, '967114', 'luismuriel@yahoo.com', 'Alumno', 0),
(49, 'MARIAN MURIEL RENDON', 21, 'San Benito', 54168845, 'Femenino', 6361762035638, '843958', 'mmrendon@outlook.com', 'Alumno', 0),
(50, 'JULIA MONROY ROJAS', 18, 'San Francisco', 58705096, 'Femenino', 5563417933881, '271871', 'juliamrojas@outlook.com', 'Alumno', 0),
(51, 'ANDRES HUAMAN LOPEZ', 21, 'San Luis', 84732442, 'Masculino', 5023107297718, '625816', 'huaman@gmail.com', 'Alumno', 0),
(52, 'ANDRES HUAMAN LOPEZ', 21, 'San Luis', 84732442, 'Masculino', 5023107297718, '625816', 'huaman@gmail.com', 'Alumno', 0),
(53, 'JORGE LUIS CHAUCA TORRES', 18, 'Poptun', 15400326, 'Masculino', 5741854492574, '317667', 'jorgeluis@yahoo.com', 'Alumno', 0),
(54, 'JORGE VIGIL MATTOS', 20, 'San Benito', 42328443, 'Masculino', 6309979595243, '912062', 'mattos@yahoo.com', 'Alumno', 0),
(55, 'APOLONIO NAVARRO SERRANO', 20, 'Santa Ana', 88611595, 'Masculino', 6309979595243, '970451', 'serrano@outlook.com', 'Alumno', 0),
(56, 'SONIA SANTILLANA DE GARAY', 28, 'San Francisco', 59314723, 'Femenino', 1199984055012, '177805', 'degaray@gmail.com', 'Alumno', 0),
(57, 'CHRISTIAN MADRID HERBOZO', 19, 'San Benito', 89882441, 'Masculino', 6106088008731, '609876', 'herbozo@yahoo.com', 'Alumno', 0),
(58, 'JOSE ANTONIO LUNA BAZO', 25, 'Melchor', 53503541, 'Masculino', 5960182722657, '813783', 'lunabazo@yahoo.com', 'Alumno', 0),
(59, 'CONSUELO ISABEL CASAS PONCE', 23, 'San Benito', 83023880, 'Femenino', 7125494670122, '900958', 'casasponce@outlook.com', 'Alumno', 0),
(60, 'REBECA LUQUE DE VASQUEZ', 25, 'Poptun', 62068250, 'Femenino', 4691655423492, '697757', 'luquevasquez@outlook.com', 'Alumno', 0);

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
  `idCarrera3` int(11) NOT NULL,
  `CursoSuperado` tinyint(1) NOT NULL,
  `idHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignacioncursos`
--

INSERT INTO `asignacioncursos` (`idAsignacion`, `IdAlumno4`, `IdCurso2`, `Solvencia`, `idSemestre2`, `idCarrera3`, `CursoSuperado`, `idHorario`) VALUES
(37, 1, 8, 0, 6, 7, 0, 0),
(38, 1, 11, 0, 6, 7, 0, 0),
(39, 1, 12, 0, 6, 7, 0, 0),
(40, 1, 13, 0, 6, 7, 0, 0),
(41, 1, 14, 0, 6, 7, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE `asignatura` (
  `idAsignatura` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `PrimerPar` int(2) NOT NULL,
  `SegundoPar` int(2) NOT NULL,
  `Tareas` int(2) NOT NULL,
  `ParcialFinal` int(2) NOT NULL,
  `idAlumno` int(7) DEFAULT NULL,
  `idProfesor` int(7) DEFAULT NULL,
  `idCarrera` int(7) DEFAULT NULL,
  `idSemestre` int(7) DEFAULT NULL,
  `idHorario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`idAsignatura`, `idCurso`, `PrimerPar`, `SegundoPar`, `Tareas`, `ParcialFinal`, `idAlumno`, `idProfesor`, `idCarrera`, `idSemestre`, `idHorario`) VALUES
(17, 8, 0, 0, 0, 0, 1, 1, 7, 6, 0),
(18, 13, 0, 0, 0, 0, 1, 1, 7, 6, 0),
(19, 11, 0, 0, 0, 0, 1, 1, 7, 6, 0);

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
(8, 'INGENIERIA EN ELECTRONICA', 6, 1770),
(9, 'CONTADURIA PUBLICA Y AUDITORIA', 5, 325);

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
  `idCarrera` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `Nombre`, `Creditos`, `Semestre`, `idCarrera`) VALUES
(1, 'METODOS NUMERICOS', 5, '5', 7),
(2, 'PROGRAMACION III', 5, '5', 7),
(3, 'ESTADISTICA II', 5, '5', 7),
(4, 'ELECTRONICA ANALOGICA', 5, '5', 7),
(5, 'COMPILADORES', 5, '7', 7),
(8, 'INTRODUCCION A LOS SISTEMAS DE COMPUTO', 5, '1', 7),
(10, 'PROGRAMACION I', 5, '3', 7),
(11, 'DESARROLLO HUMANO Y PROFESIONAL', 4, '1', 7),
(12, 'METODOLOGIA DE LA INVESTIGACION', 5, '1', 7),
(13, 'CONTABILIDAD I', 5, '1', 7),
(14, 'LOGICA DE SISTEMAS', 5, '1', 7),
(15, 'PRECALCULO', 5, '2', 7),
(17, 'ALGEBRA LINEAL', 5, '2', 7),
(18, 'DESARROLLO WEB', 5, '8', 7),
(19, 'ALGORITMOS', 5, '2', 7),
(20, 'CONTABILIDAD II', 5, '2', 7),
(21, 'MATEMATICA DISCRETA', 5, '2', 7),
(22, 'FISICA I', 5, '3', 7),
(23, 'PROGRAMACION I', 5, '3', 7),
(24, 'CALCULO I', 5, '3', 7),
(25, 'PROCESO ADMINISTRATIVO', 5, '3', 7),
(26, 'DERECHO INFORMATICO', 5, '3', 7),
(27, 'EMPRENDEDORES DE NEGOCIOS', 5, '5', 7),
(28, 'MICROECONOMIA', 5, '4', 7),
(29, 'PROGRAMACION II', 5, '4', 7),
(30, 'CALCULO II', 5, '4', 7),
(31, 'ESTADISTICA I', 5, '4', 7),
(32, 'FISICA II', 5, '4', 7),
(33, 'INVESTIGACION DE OPERACIONES', 5, '6', 7),
(34, 'BASE DE DATOS I', 5, '6', 7),
(35, 'AUTOMATAS Y LENGUAJES FORMALES', 5, '6', 7),
(36, 'SISTEMAS OPERATIVOS I', 5, '6', 7),
(37, 'ELECTRONICA DIGITAL', 5, '6', 7),
(38, 'BASE DE DATOS II', 5, '7', 7);

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

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`idFacultad`, `Nombre`) VALUES
(1, 'FACULTAD DE CIENCIAS ECONOMICAS'),
(2, 'FACULTAD DE ARQUITECTURA'),
(4, 'FACULTAD DE ODONTOLOGIA'),
(5, 'FACULTAD DE NUTRICION'),
(6, 'FACULTAD DE INGENIERIA EN SISTEMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL,
  `Hora` varchar(11) NOT NULL,
  `Periodo` varchar(6) NOT NULL,
  `Jornada` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`idHorario`, `Hora`, `Periodo`, `Jornada`) VALUES
(1, '07:00-08:10', '1ro', 'Temprano'),
(2, '08:10-09:20', '2do', 'Temprano'),
(3, '09:20-09:40', 'Receso', 'Temprano'),
(4, '09:40-10:50', '3ro', 'Temprano'),
(5, '10:50-12:00', '4to', 'Temprano'),
(6, '13:00-14:10', '1ro', 'Tarde'),
(7, '14:10-15:20', '2do', 'Tarde'),
(8, '15:20-15:40', 'Receso', 'Tarde'),
(9, '15:40-16:50', '3ro', 'Tarde'),
(10, '16:50-18:00', '4to', 'Tarde'),
(11, '07:00-09:00', '1ro', 'Sabados'),
(12, '09:00-11:00', '2do', 'Sabados'),
(13, '11:00-13:00', '3ro', 'Sabados'),
(14, '14:00-16:00', '4to', 'Sabados'),
(15, '16:00-18:00', '5to', 'Sabados'),
(16, '07:00-09:00', '1ro', 'Domingos'),
(17, '09:00-11:00', '2do', 'Domingos'),
(18, '11:00-13:00', '3ro', 'Domingos'),
(19, '14:00-16:00', '4to', 'Domingos'),
(20, '16:00-18:00', '5to', 'Domingos');

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
  `TipoUsuario` varchar(10) NOT NULL,
  `CantidadCursos` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `Nombre`, `Direccion`, `Telefono`, `Password`, `DPI`, `Correo`, `TipoUsuario`, `CantidadCursos`) VALUES
(1, 'JORGE RAMIRO IBARRA MONRY', 'ciudad de guatemala', 31582674, '111111', 3164792587416, 'jorge@gmail.com', 'Maestro', 4),
(5, 'JORGE ALAN CAMEY', 'ciudad capital', 13468259, '121212', 134628645297, 'jorge@gmail.com', 'Maestro', 0),
(6, 'LUIS FELIPE MORALES HERRERA', 'San Benito', 80502778, '818415', 4097444228826, 'luismorales@yahoo.com', 'Maestro', 0),
(7, 'GILDA BEATRIZ RUIZ CASTILLO', 'Flores', 35849960, '810482', 2762446012347, 'gildacastillo@yahoo.com', 'Maestro', 0),
(8, 'ROSA GARAY SANCHEZ', 'San Francisco', 94952660, '395267', 2756189879029, 'garayrs@gmail.com', 'Maestro', 0),
(9, 'JUAN NOE UCEDA SOTO', 'Santa Ana', 83023345, '158507', 2867853414267, 'sotojuan@yahoo.com', 'Maestro', 0),
(11, 'JUAN NOE UCEDA SOTO', 'quetin', 4679458, '666', 666, 'quetin@gmail.com', 'Maestro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

CREATE TABLE `semestre` (
  `idSemestre` int(11) NOT NULL,
  `NoSemestre` varchar(2) DEFAULT NULL,
  `idCarrera` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`idSemestre`, `NoSemestre`, `idCarrera`) VALUES
(4, '10', 2),
(5, '1', 2),
(6, '1', 7),
(7, '2', 7),
(8, '3', 7),
(9, '4', 7),
(10, '5', 7),
(11, '6', 7),
(12, '7', 7),
(13, '8', 7),
(14, '9', 7),
(15, '10', 7),
(19, '2', 2),
(20, '3', 2);

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
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`idAsignatura`);

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
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`idHorario`);

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
  MODIFY `idAdministracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `asignacioncursos`
--
ALTER TABLE `asignacioncursos`
  MODIFY `idAsignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `idAsignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idCarrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
  MODIFY `idFacultad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `idProfesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `semestre`
--
ALTER TABLE `semestre`
  MODIFY `idSemestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
