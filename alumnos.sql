-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-05-2018 a las 21:05:29
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
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `idAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Edad` int(13) NOT NULL,
  `Direccion` tinytext NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `DPI` double NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Correo` varchar(40) NOT NULL,
  `TipoUsuario` varchar(10) NOT NULL,
  PRIMARY KEY (`idAlumno`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `Nombre`, `Edad`, `Direccion`, `Telefono`, `Sexo`, `DPI`, `Password`, `Correo`, `TipoUsuario`) VALUES
(1, 'JOSE FRANCISCO BARRIOS ROQUE', 23, 'san benito peten', 31465812, 'Masculino', 2154318259745, '111111', 'jose@gmail.com', 'Alumno'),
(2, 'ELINO SANCHEZ SALGUERO', 22, 'carretera a melchor peten', 64851395, 'Masculino', 7984318654972, '222222', 'eli@gmail.com', 'Alumno'),
(13, 'MARIA ANGELES MARTIN LEAL', 19, 'San Luis', 12340999, 'Femenino', 8967454152678, '122334', 'doÃ±amari@gmail.com', 'Alumno'),
(14, 'ALVARO SANCHEZ MARTINEZ', 20, 'Santa Ana', 34567890, 'Masculino', 2356789023456, '123456', 'alvarito2@gmail.com', 'Alumno'),
(15, 'FREDY HENRY SUAREZ CERON', 20, 'San Benito', 50786922, 'Masculino', 3245678909123, '135955', 'suarez@gmail.com', 'Alumno'),
(16, 'ROSA MARGARITA LOPEZ PEREZ', 22, 'San Francisco', 56788900, 'Femenino', 5555566678222, '141104', 'rosita@gmail.com', 'Alumno'),
(17, 'CARLOS DIAZ CRUZ', 23, 'San Andres', 55556790, 'Masculino', 3456789012345, '255113', 'carlosdc@gmail.com', 'Alumno'),
(18, 'DELIA ESPINOSA HERNANDEZ', 19, 'Puerto Barrios', 45678902, 'Femenino', 1234567890098, '790767', 'hernandez45@gmail.com', 'Alumno'),
(19, 'CLAUDIA VALERIA DAVILA MONTERO', 22, 'San Francisco', 12567800, 'Femenino', 6777778900034, '544178', 'valeriac@gmail.com', 'Alumno'),
(20, 'JULIO ROGELIO CORONADO MEDINA', 25, 'San Benito', 45678903, 'Masculino', 2356789055678, '102488', 'julio@gmail.com', 'Alumno'),
(21, 'CARLOS LUIS ERAZO BERNAL', 26, 'Santa Ana', 53483517, 'Masculino', 6720710843801, '587782', 'caslosle@gmail.com', 'Alumno'),
(22, 'MARIA YOLANDA ASCENCIO LOPEZ', 19, 'San Andres', 54550426, 'Femenino', 4258705552667, '995784', 'lopezmaria@gmail.com', 'Alumno'),
(23, 'JUANA PATRICIA CADENA PALACIOS', 18, 'San Jose', 66697455, 'Femenino', 7262580830603, '652184', 'juanapatricia@gmail.com', 'Alumno'),
(24, 'YULIANA ESPINOZA ARANA', 18, 'Poptun', 55536680, 'Femenino', 1395608380436, '277090', 'espinoza@gmail.com', 'Alumno'),
(25, 'PRUDENCIANO CABALLERO VALLE', 24, 'San Luis', 16970074, 'Masculino', 7916698012501, '166089', 'pruden@gmail.com', 'Alumno'),
(26, 'PERLA CANTU TREVINO', 21, 'La Libertad', 71772428, 'Femenino', 1085561998188, '569272', 'perlacantu@gmail.com', 'Alumno'),
(27, 'CECILIA HERRERA CARBAJAL', 22, 'Rio Dulce', 59990868, 'Femenino', 5041408400982, '736244', 'doÃ±acecilia@gmail.com', 'Alumno'),
(28, 'MARCO ANTONIO CARDENAS CORNEJO', 26, 'Rio Dulce', 12103826, 'Masculino', 5114833854138, '976311', 'cardenasmarco@gmail.com', 'Alumno'),
(29, 'GONZALO CARRERA MOLINA', 20, 'Las Cruces', 42089266, 'Masculino', 7325787581503, '510435', 'gonzalo445@gmail.com', 'Alumno'),
(30, 'JOSE MARTIN CORCUERA CESPEDES', 24, 'Las Cruces', 11273856, 'Masculino', 909507866948, '905969', 'martincespedes@gmail.com', 'Alumno'),
(31, 'SUSAN MEJIA REVOLLEDO', 19, 'San Benito', 30322422, 'Femenino', 142375305294, '696657', 'susan@gmail.com', 'Alumno'),
(32, 'VICTOR EMILIO ZUNIGA SALAS', 18, 'San Benito', 58900554, 'Masculino', 1450943585485, '610007', 'victor66@gmail.com', 'Alumno'),
(33, 'VICTOR EMILIO ZUNIGA SALAS', 18, 'San Benito', 58900554, 'Masculino', 1450943585485, '610007', 'victor66@gmail.com', 'Alumno'),
(34, 'CARLOS ALFONSO LUQUE VILLAVICENCIO', 26, 'Santa Ana', 35143850, 'Masculino', 5934783179312, '955681', 'carlosalfonso66@gmail.com', 'Alumno'),
(35, 'JAVIER GUTIERREZ VELEZ', 19, 'San Benito', 64631650, 'Masculino', 7898018538951, '595311', 'javier@gmail.com', 'Alumno'),
(36, 'ROGER DIAZ ROJAS', 20, 'Santa Elena', 61673022, 'Masculino', 7459319766610, '385693', 'rogerdr@gmail.com', 'Alumno'),
(37, 'ELENA CARPIO SALAZAR', 19, 'Santa Elena', 31501377, 'Femenino', 7887360554188, '599484', 'elenacarpio@gmail.com', 'Alumno'),
(38, 'PATRICIO RIVERA OCHOA', 23, 'Poptun', 96233426, 'Masculino', 1644069910049, '113858', 'riveraochoa@hotmail.com', 'Alumno'),
(39, 'PATRICIO RIVERA OCHOA', 23, 'Poptun', 96233426, 'Masculino', 1644069910049, '113858', 'riveraochoa@hotmail.com', 'Alumno'),
(40, 'LUZ MARIA MENESES', 27, 'San Luis', 97139462, 'Femenino', 7081310417503, '124545', 'luzma@gmail.com', 'Alumno'),
(41, 'DAGOBERTO BARRERA ARISTA', 25, 'San Jose', 64562356, 'Masculino', 1901183586567, '978783', 'dagob@gmail.com', 'Alumno'),
(42, 'MIGUEL LOPEZ CHORRES', 18, 'Flores', 48653907, 'Masculino', 5426739662885, '676906', 'miguellopez@hotmail.com', 'Alumno'),
(43, 'GLADYS PLASENCIA UGAZ', 18, 'Flores', 89293996, 'Femenino', 3302513416856, '236260', 'gladys@hotmail.com', 'Alumno'),
(44, 'MARTHA CRESPIN ZAMORA', 21, 'El Chal', 12827440, 'Femenino', 6920157425105, '470008', 'crespin@gmail.com', 'Alumno'),
(45, 'ELIZABETH CABALLERO LA MADRID', 23, 'Poptun', 14268014, 'Femenino', 1574590638279, '696734', 'caballero@hotmail.com', 'Alumno'),
(46, 'GIRALDO HERRERA MONZON', 21, 'Santa Ana', 21224532, 'Masculino', 3898499038070, '823254', 'monzonherrera@outlook.com', 'Alumno'),
(47, 'BETTY ROSELIA TORRES RIVERA', 19, 'Melchor', 39802899, 'Femenino', 3534047681838, '625148', 'torresbr@outlook.com', 'Alumno'),
(48, 'LUIS MURIEL RENDON', 23, 'San Benito', 29325241, 'Masculino', 2197287850081, '967114', 'luismuriel@yahoo.com', 'Alumno'),
(49, 'MARIAN MURIEL RENDON', 21, 'San Benito', 54168845, 'Femenino', 6361762035638, '843958', 'mmrendon@outlook.com', 'Alumno'),
(50, 'JULIA MONROY ROJAS', 18, 'San Francisco', 58705096, 'Femenino', 5563417933881, '271871', 'juliamrojas@outlook.com', 'Alumno'),
(51, 'ANDRES HUAMAN LOPEZ', 21, 'San Luis', 84732442, 'Masculino', 5023107297718, '625816', 'huaman@gmail.com', 'Alumno'),
(52, 'ANDRES HUAMAN LOPEZ', 21, 'San Luis', 84732442, 'Masculino', 5023107297718, '625816', 'huaman@gmail.com', 'Alumno'),
(53, 'JORGE LUIS CHAUCA TORRES', 18, 'Poptun', 15400326, 'Masculino', 5741854492574, '317667', 'jorgeluis@yahoo.com', 'Alumno'),
(54, 'JORGE VIGIL MATTOS', 20, 'San Benito', 42328443, 'Masculino', 6309979595243, '912062', 'mattos@yahoo.com', 'Alumno'),
(55, 'APOLONIO NAVARRO SERRANO', 20, 'Santa Ana', 88611595, 'Masculino', 6309979595243, '970451', 'serrano@outlook.com', 'Alumno'),
(56, 'SONIA SANTILLANA DE GARAY', 28, 'San Francisco', 59314723, 'Femenino', 1199984055012, '177805', 'degaray@gmail.com', 'Alumno'),
(57, 'CHRISTIAN MADRID HERBOZO', 19, 'San Benito', 89882441, 'Masculino', 6106088008731, '609876', 'herbozo@yahoo.com', 'Alumno'),
(58, 'JOSE ANTONIO LUNA BAZO', 25, 'Melchor', 53503541, 'Masculino', 5960182722657, '813783', 'lunabazo@yahoo.com', 'Alumno'),
(59, 'CONSUELO ISABEL CASAS PONCE', 23, 'San Benito', 83023880, 'Femenino', 7125494670122, '900958', 'casasponce@outlook.com', 'Alumno'),
(60, 'REBECA LUQUE DE VASQUEZ', 25, 'Poptun', 62068250, 'Femenino', 4691655423492, '697757', 'luquevasquez@outlook.com', 'Alumno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
