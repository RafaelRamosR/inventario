-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2020 a las 05:11:25
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre`) VALUES
(1, 'Pagador_almacenista'),
(2, 'Rector'),
(3, 'Docente'),
(4, 'Aseador'),
(5, 'Pdsad'),
(6, 'dasda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chance`
--

CREATE TABLE `chance` (
  `id_chance` int(11) NOT NULL,
  `valor_chance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `ciudad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id_contenido` int(11) NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id_contenido`, `modulo`, `titulo`, `contenido`) VALUES
(10, 'vision', 'vision', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>VISION</p>\n<p>En un per&iacute;odo de diez a&ntilde;os, La Instituci&oacute;n Educativa &ldquo;JOS&Eacute; DEL CARMEN CUESTA RENTER&Iacute;A&rdquo; de Quibd&oacute;, ser&aacute; reconocida y posicionada entre las mejores del Departamento del Choc&oacute; y Colombia, por la fortaleza de su Proyecto Educativo, el cual est&aacute; orientado a la formaci&oacute;n integral de ni&ntilde;os, ni&ntilde;as, j&oacute;venes y adultos con &eacute;nfasis en Educaci&oacute;n Ambiental.</p>\n</body>\n</html>'),
(11, 'mision', 'Mision', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<h1>MISION</h1>\n<h1><img src=\"https://imgcdn.larepublica.co/i/336/2017/12/05165632/Zapatos.jpg\" alt=\"\" width=\"336\" height=\"280\" /></h1>\n<h1>Somos un<strong>a Inst</strong>ituci&oacute;n Educativa que propende por la formaci&oacute;n de ni&ntilde;os, ni&ntilde;as, j&oacute;venes y adultos en forma integral, para que sean capaces de interactuar activamente en las comunidades donde la orientaci&oacute;n, utilizaci&oacute;n y manejo de los recursos del medio, promuevan la conservaci&oacute;n de la salud e impulsen el desarrollo humano, habilidades art&iacute;sticas y expresiones culturales tendientes a mejorar el nivel de vida de la comunidad correspondiente.</h1>\n<p>&nbsp;</p>\n</body>\n</html>'),
(12, 'objetivos', 'objetivos', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<h1>OBJETIVOS</h1>\n<p>Construir una estrategia de paz y convivencia ciudadana, mediante un proyecto educativo institucional y desarrollo local, con el fin de responder a las necesidades m&aacute;s urgentes de las familias en situaci&oacute;n de desplazamiento, asentadas en el sector norte de Quibd&oacute;.&Ccedil;</p>\n<p>&nbsp;</p>\n<p>ACTUALMENTE LA INSTITUCION CUENTA&nbsp; CON LAS SIGUIENTES DEPENDECIA:</p>\n<p>&nbsp;</p>\n<p>&bull; Rector&iacute;a</p>\n<p>&bull; Coordinador</p>\n<p>&bull; Secretaria</p>\n<p>&bull; Docentes</p>\n<p>&bull; Pagador almacenista</p>\n</body>\n</html>'),
(13, 'resena', 'reseÃ±a historia', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<h1>RESE&Ntilde;A HISTORICA</h1>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>En diciembre de 1964 el Gimnasio El Lago abri&oacute; sus puertas con el nombre de JOS&Eacute; DEL CARMEN CUESTA RENTERIA orientaba a los niveles, preescolar, B&aacute;sica primaria, B&aacute;sica secundaria, Media acad&eacute;mica con &eacute;nfasis en Medio Ambiente</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n<p>En el a&ntilde;o 1995 por razones de legalizaci&oacute;n ante la Secretar&iacute;a de Educaci&oacute;n, cambi&oacute; su nombre a Gimnasio Psicopedag&oacute;gico El Lago de la Fantas&iacute;a, nombre con el cual funcion&oacute; hasta el a&ntilde;o 1999</p>\n<p>&nbsp;</p>\n<p>En 1997 JOS&Eacute; DEL CARMEN CUESTA RENTERIA ampli&oacute; su jornada, y en 1998 garantiz&oacute; la continuidad de estudios a sus estudiantes abriendo la varias sedes las Sedes como; San Vicente de Paul, Nicol&aacute;s Rojas Mena, San Mart&iacute;n y Aurora... Gracias a la aceptaci&oacute;n que tuvo en la comunidad, decidi&oacute; ampliar sus servicios educativos al bachillerato, y en el a&ntilde;o 2000 -por razones de ampliaci&oacute;n a la atenci&oacute;n a estudiantes de m&aacute;s edad.</p>\n<p>&nbsp;</p>\n<p>En sus tres etapas siempre ha tenido como base de formaci&oacute;n el desarrollo de valores con &eacute;nfasis en Educaci&oacute;n Ambiental; ha buscado que sus estudiantes sean capaces de enfrentarse con madurez a la realidad social que les correspondi&oacute; vivir, ha desarrollado planes educativos de avanzada, mediante estrategias pedag&oacute;gicas modernas, y ha privilegiado la formaci&oacute;n de l&iacute;deres y emprendedores</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n</body>\n</html>'),
(16, 'Z-Prueba1', 'Z-Prueba1', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba1</p>\n</body>\n</html>'),
(17, 'Z-Prueba2', 'Z-Prueba2', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba2</p>\n</body>\n</html>'),
(18, 'Z-Prueba3', 'Z-Prueba3', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba3</p>\n</body>\n</html>'),
(19, 'Z-Prueba4', 'Z-Prueba4', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba4</p>\n</body>\n</html>'),
(20, 'Z-Prueba5', 'Z-Prueba5', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba5</p>\n</body>\n</html>'),
(21, 'Z-Prueba6', 'Z-Prueba6', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba6</p>\n</body>\n</html>'),
(22, 'Z-Prueba7', 'Z-Prueba7', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba7</p>\n</body>\n</html>'),
(23, 'Z-Prueba8', 'Z-Prueba8', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba8</p>\n</body>\n</html>'),
(24, 'Z-Prueba9', 'Z-Prueba9', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba9</p>\n</body>\n</html>'),
(26, 'Z-Prueba99', 'Z-Prueba99', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba99</p>\n</body>\n</html>'),
(27, 'Z-Prueba999', 'Z-Prueba999', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<p>Z-Prueba999</p>\n</body>\n</html>'),
(28, 'coro', 'coro', '<!DOCTYPE html>\n<html>\n<head>\n</head>\n<body>\n<h1 style=\"text-align: center;\"><strong>CORO</strong></h1>\n<p>Sean bienvenidos al coro.</p>\n</body>\n</html>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_chance`
--

CREATE TABLE `datos_chance` (
  `id_datos_chance` int(11) NOT NULL,
  `numero` date NOT NULL,
  `nombre_chance` varchar(60) NOT NULL,
  `numero_documento` date NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_chance` int(11) NOT NULL,
  `valor_chance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, '(SIN ESPECIFICAR)'),
(5, 'ANTIOQUIA'),
(8, 'ATLANTICO'),
(11, 'BOGOTA D.C'),
(13, 'BOLIVAR'),
(15, 'BOYACA'),
(17, 'CALDAS'),
(18, 'CAQUETA'),
(19, 'CAUCA'),
(20, 'CESAR'),
(23, 'CORDOBA'),
(25, 'CUNDINAMARCA'),
(27, 'CHOCO'),
(41, 'HUILA'),
(44, 'LA GUAJIRA'),
(47, 'MAGDALENA'),
(50, 'META'),
(52, 'NARINO'),
(54, 'NORTE DE SANTANDER'),
(63, 'QUINDIO'),
(66, 'RISARALDA'),
(68, 'SANTANDER'),
(70, 'SUCRE'),
(73, 'TOLIMA'),
(76, 'VALLE DEL CAUCA'),
(81, 'ARAUCA'),
(85, 'CASANARE'),
(86, 'PUTUMAYO'),
(88, 'SAN ANDRES Y PROVIDENCIA'),
(91, 'AMAZONAS'),
(94, 'GUAINIA'),
(95, 'GUAVIARE'),
(97, 'VAUPES'),
(99, 'VICHADA'),
(1000, 'CASTILLA - MANCHA (ESPAÑA)'),
(1001, 'PANAMA'),
(1002, 'nn'),
(1003, 'nn'),
(1004, 'GGG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `id_devolucion` int(11) NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `responsable` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Is_entregado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`id_entrega`, `id_producto`, `fecha_adquisicion`, `fecha_entrega`, `referencia`, `responsable`, `cantidad`, `Is_entregado`) VALUES
(5, 3479, '2019-11-16', '2019-11-06', '3466', 'Oscar H', 9, 0),
(7, 3462, '2019-12-13', '0000-00-00', '3460', 'vn vb', 0, 0),
(8, 3462, '2019-12-13', '2020-01-09', '3460', 'vn vb', 0, 0),
(10, 3465, '0000-00-00', '0000-00-00', '3463', 'Polo', 23, 0),
(12, 3465, '0000-00-00', '0000-00-00', '', '32323323232', 0, 0),
(13, 3464, '2020-01-10', '2020-01-17', '3485', 'Radeon', 456, 0),
(15, 3464, '2020-01-04', '2020-01-23', '3463', 'Nice', 21312, 0),
(18, 3462, '2019-12-12', '2019-12-12', '3468', 'Rafa', 56, 0),
(19, 3466, '2019-12-20', '2019-12-19', '3463', 'Stiwar', 45, 0),
(20, 3468, '2020-01-17', '2020-01-16', '3478', 'dasda', 432, 0),
(21, 3484, '2019-04-04', '2019-04-09', '3486', 'Harley', 6, 0),
(22, 3482, '2020-01-18', '2020-01-23', '3484', 'Sony', 45, 0),
(23, 3461, '2019-10-06', '2019-10-01', '3483', 'Arlex', 8, 0),
(24, 3488, '2020-01-08', '2019-12-11', '3463', 'Arlex', 3, 0),
(25, 3465, '2020-01-11', '2020-01-10', '3484', 'Facebook', 34, 0),
(26, 3488, '2019-11-07', '2020-01-08', '3464', 'Hamlet', 7, 0),
(29, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(30, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(31, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(32, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(33, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(34, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(35, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(36, 0, '0000-00-00', '0000-00-00', '', '', 0, 0),
(37, 0, '0000-00-00', '0000-00-00', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'bueno'),
(2, 'malo'),
(3, 'regular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_estado_civil` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado_civil`, `nombre`) VALUES
(1, 'SOLTERO(A)'),
(2, 'CASADO(A)'),
(3, 'DIVORSIADO(A)'),
(4, 'VIUDO(A)'),
(5, 'UNION LIBRE'),
(7, 'FOR EVER ALONE'),
(8, 'FEO(A)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id_examen` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `municipio` varchar(45) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id_examen`, `nombre`, `municipio`, `edad`) VALUES
(1, '', 'dsad', 213),
(2, '', 'asdas', 123),
(3, '', 'asdas', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id_ingreso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `motivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id_ingreso`, `id_producto`, `fecha_ingreso`, `id_proveedor`, `cantidad`, `motivo`) VALUES
(1, 3479, '2019-09-07', 0, 0, 'Ninguno'),
(2, 3462, '2020-09-25', 0, 0, 'Ninguno'),
(3, 3468, '2019-09-14', 0, 0, 'Ninguno'),
(4, 3469, '2019-09-15', 0, 0, 'Ninguno'),
(5, 3465, '2019-09-29', 0, 0, 'Ninguno'),
(6, 3480, '2019-12-07', 0, 0, 'Ninguno'),
(7, 3479, '2019-12-12', 0, 0, 'Ninguno'),
(8, 3468, '2020-01-17', 0, 0, 'Ninguno'),
(9, 3463, '2222-02-12', 0, 0, 'Ninguno'),
(10, 3465, '2020-01-22', 0, 0, 'Ninguno'),
(11, 3466, '2020-01-10', 0, 0, 'Ninguno'),
(12, 3464, '2020-01-10', 0, 0, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `nombre_libro` varchar(60) NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `nombre_autor` varchar(60) NOT NULL,
  `id_pais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `nombre_libro`, `fecha_publicacion`, `nombre_autor`, `id_pais`) VALUES
(2, 'el leon', '2020-02-02', 'ramir', 1),
(3, 'jota', '2020-02-07', 'juanito', 1),
(4, 'jjj', '2020-02-06', 'ffff', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_accion`
--

CREATE TABLE `modulo_accion` (
  `id_modulo_accion` int(11) NOT NULL,
  `modulo` varchar(80) NOT NULL,
  `accion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulo_accion`
--

INSERT INTO `modulo_accion` (`id_modulo_accion`, `modulo`, `accion`) VALUES
(81, 'cargo', 'agregar'),
(84, 'cargo', 'datos'),
(83, 'cargo', 'eliminar'),
(80, 'cargo', 'listar'),
(82, 'cargo', 'modificar'),
(79, 'cargo', 'ver'),
(117, 'contenido', 'agregar'),
(120, 'contenido', 'datos'),
(119, 'contenido', 'eliminar'),
(116, 'contenido', 'listar'),
(118, 'contenido', 'modificar'),
(115, 'contenido', 'ver'),
(87, 'departamento', 'agregar'),
(90, 'departamento', 'datos'),
(89, 'departamento', 'eliminar'),
(86, 'departamento', 'listar'),
(88, 'departamento', 'modificar'),
(85, 'departamento', 'ver'),
(45, 'entrega', 'agregar'),
(48, 'entrega', 'datos'),
(47, 'entrega', 'eliminar'),
(44, 'entrega', 'listar'),
(46, 'entrega', 'modificar'),
(43, 'entrega', 'ver'),
(75, 'estado_civil', 'agregar'),
(78, 'estado_civil', 'datos'),
(77, 'estado_civil', 'eliminar'),
(74, 'estado_civil', 'listar'),
(76, 'estado_civil', 'modificar'),
(73, 'estado_civil', 'ver'),
(39, 'ingreso', 'agregar'),
(42, 'ingreso', 'datos'),
(41, 'ingreso', 'eliminar'),
(38, 'ingreso', 'listar'),
(40, 'ingreso', 'modificar'),
(37, 'ingreso', 'ver'),
(145, 'libro', 'ver'),
(141, 'modulo_accion', 'agregar'),
(144, 'modulo_accion', 'datos'),
(143, 'modulo_accion', 'eliminar'),
(140, 'modulo_accion', 'listar'),
(142, 'modulo_accion', 'modificar'),
(139, 'modulo_accion', 'ver'),
(93, 'municipio', 'agregar'),
(96, 'municipio', 'datos'),
(95, 'municipio', 'eliminar'),
(92, 'municipio', 'listar'),
(94, 'municipio', 'modificar'),
(91, 'municipio', 'ver'),
(99, 'permiso', 'agregar'),
(102, 'permiso', 'datos'),
(101, 'permiso', 'eliminar'),
(98, 'permiso', 'listar'),
(100, 'permiso', 'modificar'),
(97, 'permiso', 'ver'),
(129, 'permiso_rol', 'agregar'),
(132, 'permiso_rol', 'datos'),
(131, 'permiso_rol', 'eliminar'),
(128, 'permiso_rol', 'listar'),
(130, 'permiso_rol', 'modificar'),
(127, 'permiso_rol', 'ver'),
(27, 'persona', 'agregar'),
(30, 'persona', 'datos'),
(29, 'persona', 'eliminar'),
(26, 'persona', 'listar'),
(28, 'persona', 'modificar'),
(25, 'persona', 'ver'),
(135, 'persona_rol', 'agregar'),
(138, 'persona_rol', 'datos'),
(137, 'persona_rol', 'eliminar'),
(134, 'persona_rol', 'listar'),
(136, 'persona_rol', 'modificar'),
(133, 'persona_rol', 'ver'),
(33, 'producto', 'agregar'),
(36, 'producto', 'datos'),
(35, 'producto', 'eliminar'),
(32, 'producto', 'listar'),
(34, 'producto', 'modificar'),
(31, 'producto', 'ver'),
(111, 'proveedores', 'agregar'),
(114, 'proveedores', 'datos'),
(113, 'proveedores', 'eliminar'),
(110, 'proveedores', 'listar'),
(112, 'proveedores', 'modificar'),
(109, 'proveedores', 'ver'),
(2, 'reporte1', 'mostrar'),
(1, 'reporte1', 'ver'),
(4, 'reporte2', 'mostrar'),
(3, 'reporte2', 'ver'),
(6, 'reporte3', 'mostrar'),
(5, 'reporte3', 'ver'),
(8, 'reporte4', 'mostrar'),
(7, 'reporte4', 'ver'),
(10, 'reporte5', 'mostrar'),
(9, 'reporte5', 'ver'),
(12, 'reporte6', 'mostrar'),
(11, 'reporte6', 'ver'),
(14, 'reporte7', 'mostrar'),
(13, 'reporte7', 'ver'),
(16, 'reporte8', 'mostrar'),
(15, 'reporte8', 'ver'),
(18, 'reporte_estadistico', 'mostrar'),
(17, 'reporte_estadistico', 'ver'),
(20, 'reporte_estadistico1', 'mostrar'),
(19, 'reporte_estadistico1', 'ver'),
(22, 'reporte_estadistico2', 'mostrar'),
(21, 'reporte_estadistico2', 'ver'),
(24, 'reporte_estadistico3', 'mostrar'),
(23, 'reporte_estadistico3', 'ver'),
(123, 'rol', 'agregar'),
(126, 'rol', 'datos'),
(125, 'rol', 'eliminar'),
(122, 'rol', 'listar'),
(124, 'rol', 'modificar'),
(121, 'rol', 'ver'),
(51, 'sexo', 'agregar'),
(54, 'sexo', 'datos'),
(53, 'sexo', 'eliminar'),
(50, 'sexo', 'listar'),
(52, 'sexo', 'modificar'),
(49, 'sexo', 'ver'),
(57, 'tipo_identidad', 'agregar'),
(60, 'tipo_identidad', 'datos'),
(59, 'tipo_identidad', 'eliminar'),
(56, 'tipo_identidad', 'listar'),
(58, 'tipo_identidad', 'modificar'),
(55, 'tipo_identidad', 'ver'),
(69, 'tipo_producto', 'agregar'),
(72, 'tipo_producto', 'datos'),
(71, 'tipo_producto', 'eliminar'),
(68, 'tipo_producto', 'listar'),
(70, 'tipo_producto', 'modificar'),
(67, 'tipo_producto', 'ver'),
(105, 'zona_de_residencia', 'agregar'),
(108, 'zona_de_residencia', 'datos'),
(107, 'zona_de_residencia', 'eliminar'),
(104, 'zona_de_residencia', 'listar'),
(106, 'zona_de_residencia', 'modificar'),
(103, 'zona_de_residencia', 'ver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosaldo`
--

CREATE TABLE `movimientosaldo` (
  `id_msaldo` int(11) NOT NULL,
  `id_msaldo_id_saldo` int(11) NOT NULL,
  `cantida_msaldo` int(11) NOT NULL,
  `fecha_msaldo` datetime NOT NULL,
  `motivo_msaldo` varchar(500) NOT NULL,
  `movimiento_emisor` int(11) DEFAULT NULL,
  `tipo_mmovimiento` varchar(100) NOT NULL COMMENT 'tipo de movimiento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `departamento`, `nombre`) VALUES
(1, 91, 'EL ENCANTO'),
(2, 91, 'LA CHORRERA'),
(3, 91, 'LA PEDRERA'),
(4, 91, 'LA VICTORIA'),
(5, 91, 'LETICIA'),
(6, 91, 'MIRITI - PARANA'),
(7, 91, 'PUERTO ALEGRIA'),
(8, 91, 'PUERTO ARICA'),
(9, 91, 'PUERTO NARIÑO'),
(10, 91, 'PUERTO SANTANDER'),
(11, 91, 'TARAPACA'),
(12, 5, 'ABEJORRAL'),
(13, 5, 'ABRIAQUI'),
(14, 5, 'ALEJANDRIA'),
(15, 5, 'AMAGA'),
(16, 5, 'AMALFI'),
(17, 5, 'ANDESX'),
(18, 5, 'ANGELOPOLIS'),
(19, 5, 'ANGOSTURA'),
(20, 5, 'ANORI'),
(21, 5, 'ANZA'),
(22, 5, 'APARTADO'),
(23, 5, 'ARBOLETES'),
(24, 5, 'ARGELIA'),
(25, 5, 'ARMENIA'),
(26, 5, 'BARBOSA'),
(27, 5, 'BELLO'),
(28, 5, 'BELMIRA'),
(29, 5, 'BETANIA'),
(30, 5, 'BETULIA'),
(31, 5, 'BRICEÑO'),
(32, 5, 'BURITICA'),
(33, 5, 'CACERES'),
(34, 5, 'CAICEDO'),
(35, 5, 'CALDAS'),
(36, 5, 'CAMPAMENTO'),
(37, 5, 'CAÑASGORDAS'),
(38, 5, 'CARACOLI'),
(39, 5, 'CARAMANTA'),
(40, 5, 'CAREPA'),
(41, 5, 'CHIGORODO'),
(42, 70, 'LOS PALMITOS'),
(43, 70, 'MAJAGUAL'),
(44, 70, 'MORROA'),
(45, 70, 'OVEJAS'),
(46, 70, 'PALMITO'),
(47, 70, 'SAMPUES'),
(48, 70, 'SAN BENITO ABAD'),
(49, 70, 'SAN JUAN DE BETULIA'),
(50, 70, 'SAN MARCOS'),
(51, 70, 'SAN ONOFRE'),
(52, 70, 'SAN PEDRO'),
(53, 70, 'SANTIAGO DE TOLU'),
(54, 70, 'SINCE'),
(55, 70, 'SINCELEJO'),
(56, 70, 'SUCRE'),
(57, 70, 'TOLU VIEJO'),
(58, 73, 'ALPUJARRA'),
(59, 73, 'ALVARADO'),
(60, 1004, 'AMBALEMA'),
(61, 73, 'ANZOATEGUI'),
(62, 73, 'ARMERO'),
(63, 73, 'ATACO'),
(64, 73, 'CAJAMARCA'),
(65, 73, 'CARMEN DE APICALA'),
(66, 73, 'CASABIANCA'),
(67, 73, 'CHAPARRAL'),
(68, 73, 'COELLO'),
(69, 73, 'COYAIMA'),
(70, 73, 'CUNDAY'),
(71, 73, 'DOLORES'),
(72, 73, 'ESPINAL'),
(73, 73, 'FALAN'),
(74, 41, 'HOBO'),
(75, 5, 'CISNEROS'),
(76, 68, 'TONA'),
(77, 5, 'DABEIBA'),
(78, 5, 'DON MATIAS'),
(79, 5, 'EBEJICO'),
(80, 5, 'EL BAGRE'),
(81, 5, 'EL CARMEN DE VIBORAL'),
(82, 5, 'EL SANTUARIO'),
(83, 5, 'ENTRERRIOS'),
(84, 5, 'ENVIGADO'),
(85, 5, 'FREDONIA'),
(86, 5, 'FRONTINO'),
(87, 5, 'GIRALDO'),
(88, 5, 'GIRARDOTA'),
(89, 5, 'GOMEZ PLATA'),
(90, 5, 'GRANADA'),
(91, 5, 'GUADALUPE'),
(92, 5, 'GUARNE'),
(93, 5, 'GUATAPE'),
(94, 5, 'HELICONIA'),
(95, 5, 'HISPANIA'),
(96, 5, 'ITAGUI'),
(97, 5, 'ITUANGO'),
(98, 5, 'JARDIN'),
(99, 5, 'JERICO'),
(100, 5, 'LA CEJA'),
(101, 5, 'LA ESTRELLA'),
(102, 5, 'LA PINTADA'),
(103, 5, 'LA UNION'),
(104, 5, 'LIBORINA'),
(105, 5, 'MACEO'),
(106, 5, 'MARINILLA'),
(107, 5, 'MEDELLIN'),
(108, 5, 'MONTEBELLO'),
(109, 5, 'MURINDO'),
(110, 5, 'MUTATA'),
(111, 5, 'NARIÑO'),
(112, 5, 'NECHI'),
(113, 5, 'NECOCLI'),
(114, 5, 'OLAYA'),
(115, 5, 'PEÑOL'),
(116, 5, 'PEQUE'),
(117, 5, 'PUEBLORRICO'),
(118, 5, 'PUERTO BERRIO'),
(119, 5, 'PUERTO NARE'),
(120, 5, 'PUERTO TRIUNFO'),
(121, 5, 'REMEDIOS'),
(122, 5, 'RETIRO'),
(123, 5, 'RIONEGRO'),
(124, 5, 'SABANALARGA'),
(125, 5, 'SABANETA'),
(126, 5, 'SALGAR'),
(127, 5, 'SAN ANDRES'),
(128, 5, 'SAN CARLOS'),
(129, 5, 'SAN FRANCISCO'),
(130, 5, 'SAN JERONIMO'),
(131, 5, 'SAN JOSE DE LA MONTAÑA'),
(132, 5, 'SAN JUAN DE URABA'),
(133, 5, 'SAN LUIS'),
(134, 5, 'SAN PEDRO'),
(135, 5, 'SAN PEDRO DE URABA'),
(136, 5, 'SAN RAFAEL'),
(137, 5, 'SAN ROQUE'),
(138, 5, 'SAN VICENTE'),
(139, 5, 'SANTA BARBARA'),
(140, 5, 'SANTA ROSA DE OSOS'),
(141, 5, 'SANTAFE DE ANTIOQUIA'),
(142, 5, 'SANTO DOMINGO'),
(143, 5, 'SEGOVIA'),
(144, 5, 'SONSON'),
(145, 5, 'SOPETRAN'),
(146, 5, 'TAMESIS'),
(147, 5, 'TARAZA'),
(148, 5, 'TARSO'),
(149, 5, 'TITIRIBI'),
(150, 5, 'TOLEDO'),
(151, 5, 'TURBO'),
(152, 5, 'URAMITA'),
(153, 5, 'URRAO'),
(154, 5, 'VALDIVIA'),
(155, 5, 'VALPARAISO'),
(156, 5, 'VEGACHI'),
(157, 5, 'VENECIA'),
(158, 5, 'VIGIA DEL FUERTE'),
(159, 5, 'YALI'),
(160, 5, 'YARUMAL'),
(161, 5, 'YOLOMBO'),
(162, 5, 'YONDO'),
(163, 5, 'ZARAGOZA'),
(164, 81, 'ARAUCA'),
(165, 81, 'ARAUQUITA'),
(166, 81, 'CRAVO NORTE'),
(167, 81, 'FORTUL'),
(168, 81, 'PUERTO RONDON'),
(169, 81, 'SARAVENA'),
(170, 81, 'TAME'),
(171, 88, 'PROVIDENCIA'),
(172, 88, 'SAN ANDRES'),
(173, 8, 'BARANOA'),
(174, 8, 'BARRANQUILLA'),
(175, 8, 'CAMPO DE LA CRUZ'),
(176, 8, 'CANDELARIA'),
(177, 8, 'GALAPA'),
(178, 8, 'JUAN DE ACOSTA'),
(179, 8, 'LURUACO'),
(180, 8, 'MALAMBO'),
(181, 8, 'MANATI'),
(182, 8, 'PALMAR DE VARELA'),
(183, 8, 'PIOJO'),
(184, 8, 'POLONUEVO'),
(185, 8, 'PONEDERA'),
(186, 8, 'PUERTO COLOMBIA'),
(187, 8, 'REPELON'),
(188, 8, 'SABANAGRANDE'),
(189, 8, 'SABANALARGA'),
(190, 8, 'SANTA LUCIA'),
(191, 8, 'SANTO TOMAS'),
(192, 8, 'SOLEDAD'),
(193, 8, 'SUAN'),
(194, 8, 'TUBARA'),
(195, 8, 'USIACURI'),
(196, 11, 'BOGOTA'),
(197, 13, 'ACHI'),
(198, 13, 'ALTOS DEL ROSARIO'),
(199, 13, 'ARENAL'),
(200, 13, 'ARJONA'),
(201, 13, 'ARROYOHONDO'),
(202, 13, 'BARRANCO DE LOBA'),
(203, 13, 'CALAMAR'),
(204, 13, 'CANTAGALLO'),
(205, 13, 'CARTAGENA'),
(206, 13, 'CICUCO'),
(207, 13, 'CLEMENCIA'),
(208, 13, 'CORDOBA'),
(209, 13, 'EL CARMEN DE BOLIVAR'),
(210, 13, 'EL GUAMO'),
(211, 13, 'EL PEÑON'),
(212, 13, 'HATILLO DE LOBA'),
(213, 13, 'MAGANGUE'),
(214, 13, 'MAHATES'),
(215, 13, 'MARGARITA'),
(216, 13, 'MARIA LA BAJA'),
(217, 13, 'MOMPOS'),
(218, 13, 'MONTECRISTO'),
(219, 13, 'MORALES'),
(220, 13, 'PINILLOS'),
(221, 13, 'REGIDOR'),
(222, 13, 'RIO VIEJO'),
(223, 13, 'SAN CRISTOBAL'),
(224, 13, 'SAN ESTANISLAO'),
(225, 13, 'SAN FERNANDO'),
(226, 13, 'SAN JACINTO'),
(227, 13, 'SAN JACINTO DEL CAUCA'),
(228, 13, 'SAN JUAN NEPOMUCENO'),
(229, 13, 'SAN MARTIN DE LOBA'),
(230, 13, 'SAN PABLO'),
(231, 13, 'SANTA CATALINA'),
(232, 13, 'SANTA ROSA'),
(233, 13, 'SANTA ROSA DEL SUR'),
(234, 13, 'SIMITI'),
(235, 13, 'SOPLAVIENTO'),
(236, 13, 'TALAIGUA NUEVO'),
(237, 13, 'TIQUISIO'),
(238, 13, 'TURBACO'),
(239, 13, 'TURBANA'),
(240, 13, 'VILLANUEVA'),
(241, 13, 'ZAMBRANO'),
(242, 15, 'ALMEIDA'),
(243, 15, 'AQUITANIA'),
(244, 15, 'ARCABUCO'),
(245, 15, 'BELEN'),
(246, 15, 'BERBEO'),
(247, 15, 'BETEITIVA'),
(248, 15, 'BOAVITA'),
(249, 15, 'BOYACA'),
(250, 15, 'BRICEÑO'),
(251, 15, 'BUENAVISTA'),
(252, 15, 'BUSBANZA'),
(253, 15, 'CALDAS'),
(254, 15, 'CAMPOHERMOSO'),
(255, 15, 'CERINZA'),
(256, 15, 'CHINAVITA'),
(257, 15, 'CHIQUINQUIRA'),
(258, 15, 'CHIQUIZA'),
(259, 15, 'CHISCAS'),
(260, 15, 'CHITA'),
(261, 15, 'CHITARAQUE'),
(262, 15, 'CHIVATA'),
(263, 15, 'CHIVOR'),
(264, 15, 'CIENEGA'),
(265, 15, 'COMBITA'),
(266, 15, 'COPER'),
(267, 15, 'CORRALES'),
(268, 15, 'COVARACHIA'),
(269, 15, 'CUBARA'),
(270, 15, 'CUCAITA'),
(271, 15, 'CUITIVA'),
(272, 15, 'DUITAMA'),
(273, 15, 'EL COCUY'),
(274, 15, 'EL ESPINO'),
(275, 15, 'FIRAVITOBA'),
(276, 15, 'FLORESTA'),
(277, 15, 'GACHANTIVA'),
(278, 15, 'GAMEZA'),
(279, 15, 'GARAGOA'),
(280, 15, 'GUACAMAYAS'),
(281, 15, 'GUATEQUE'),
(282, 15, 'GUAYATA'),
(283, 15, 'GÜICAN'),
(284, 15, 'JENESANO'),
(285, 15, 'JERICO'),
(286, 15, 'LA CAPILLA'),
(287, 15, 'LA UVITA'),
(288, 15, 'LA VICTORIA'),
(289, 15, 'LABRANZAGRANDE'),
(290, 15, 'MACANAL'),
(291, 15, 'MARIPI'),
(292, 15, 'MIRAFLORES'),
(293, 15, 'MONGUA'),
(294, 15, 'MONGUI'),
(295, 15, 'MONIQUIRA'),
(296, 15, 'MOTAVITA'),
(297, 15, 'MUZO'),
(298, 15, 'NOBSA'),
(299, 15, 'NUEVO COLON'),
(300, 15, 'OICATA'),
(301, 15, 'OTANCHE'),
(302, 15, 'PACHAVITA'),
(303, 15, 'PAEZ'),
(304, 15, 'PAIPA'),
(305, 15, 'PAJARITO'),
(306, 15, 'PANQUEBA'),
(307, 15, 'PAUNA'),
(308, 15, 'PAYA'),
(309, 15, 'PAZ DE RIO'),
(310, 15, 'PESCA'),
(311, 15, 'PISBA'),
(312, 15, 'PUERTO BOYACA'),
(313, 15, 'QUIPAMA'),
(314, 15, 'RAMIRIQUI'),
(315, 15, 'RAQUIRA'),
(316, 15, 'RONDON'),
(317, 15, 'SABOYA'),
(318, 15, 'SACHICA'),
(319, 15, 'SAMACA'),
(320, 15, 'SAN EDUARDO'),
(321, 15, 'SAN JOSE DE PARE'),
(322, 15, 'SAN LUIS DE GACENO'),
(323, 15, 'SAN MATEO'),
(324, 15, 'SAN MIGUEL DE SEMA'),
(325, 15, 'SAN PABLO DE BORBUR'),
(326, 15, 'SANTA MARIA'),
(327, 15, 'SANTA ROSA DE VITERBO'),
(328, 15, 'SANTA SOFIA'),
(329, 15, 'SANTANA'),
(330, 15, 'SATIVANORTE'),
(331, 15, 'SATIVASUR'),
(332, 15, 'SIACHOQUE'),
(333, 15, 'SOATA'),
(334, 15, 'SOCHA'),
(335, 15, 'SOCOTA'),
(336, 15, 'SOGAMOSO'),
(337, 15, 'SOMONDOCO'),
(338, 15, 'SORA'),
(339, 15, 'SORACA'),
(340, 15, 'SOTAQUIRA'),
(341, 15, 'SUSACON'),
(342, 15, 'SUTAMARCHAN'),
(343, 15, 'SUTATENZA'),
(344, 15, 'TASCO'),
(345, 15, 'TENZA'),
(346, 15, 'TIBANA'),
(347, 15, 'TIBASOSA'),
(348, 15, 'TINJACA'),
(349, 15, 'TIPACOQUE'),
(350, 15, 'TOCA'),
(351, 15, 'TOGÜI'),
(352, 15, 'TOPAGA'),
(353, 15, 'TOTA'),
(354, 15, 'TUNJA'),
(355, 15, 'TUNUNGUA'),
(356, 15, 'TURMEQUE'),
(357, 15, 'TUTA'),
(358, 15, 'TUTAZA'),
(359, 15, 'UMBITA'),
(360, 15, 'VENTAQUEMADA'),
(361, 15, 'VILLA DE LEYVA'),
(362, 15, 'VIRACACHA'),
(363, 15, 'ZETAQUIRA'),
(364, 17, 'AGUADAS'),
(365, 17, 'ANSERMA'),
(366, 17, 'ARANZAZU'),
(367, 17, 'BELALCAZAR'),
(368, 17, 'CHINCHINA'),
(369, 17, 'FILADELFIA'),
(370, 17, 'LA DORADA'),
(371, 17, 'LA MERCED'),
(372, 17, 'MANIZALES'),
(373, 17, 'MANZANARES'),
(374, 17, 'MARMATO'),
(375, 17, 'MARQUETALIA'),
(376, 17, 'MARULANDA'),
(377, 17, 'NEIRA'),
(378, 17, 'NORCASIA'),
(379, 17, 'PACORA'),
(380, 17, 'PALESTINA'),
(381, 17, 'PENSILVANIA'),
(382, 17, 'RIOSUCIO'),
(383, 17, 'RISARALDA'),
(384, 17, 'SALAMINA'),
(385, 17, 'SAMANA'),
(386, 17, 'SAN JOSE'),
(387, 17, 'SUPIA'),
(388, 17, 'VICTORIA'),
(389, 17, 'VILLAMARIA'),
(390, 17, 'VITERBO'),
(391, 18, 'ALBANIA'),
(392, 18, 'BELEN DE LOS ANDAQUIES'),
(393, 18, 'CARTAGENA DEL CHAIRA'),
(394, 18, 'CURILLO'),
(395, 18, 'EL DONCELLO'),
(396, 18, 'EL PAUJIL'),
(397, 18, 'FLORENCIA'),
(398, 18, 'LA MONTAÑITA'),
(399, 18, 'MILAN'),
(400, 18, 'MORELIA'),
(401, 18, 'PUERTO RICO'),
(402, 18, 'SAN JOSE DEL FRAGUA'),
(403, 18, 'SAN VICENTE DEL CAGUAN'),
(404, 18, 'SOLANO'),
(405, 18, 'SOLITA'),
(406, 18, 'VALPARAISO'),
(407, 85, 'AGUAZUL'),
(408, 85, 'CHAMEZA'),
(409, 85, 'HATO COROZAL'),
(410, 85, 'LA SALINA'),
(411, 85, 'MANI'),
(412, 85, 'MONTERREY'),
(413, 85, 'NUNCHIA'),
(414, 85, 'OROCUE'),
(415, 85, 'PAZ DE ARIPORO'),
(416, 85, 'PORE'),
(417, 85, 'RECETOR'),
(418, 85, 'SABANALARGA'),
(419, 85, 'SACAMA'),
(420, 85, 'SAN LUIS DE PALENQUE'),
(421, 85, 'TAMARA'),
(422, 85, 'TAURAMENA'),
(423, 85, 'TRINIDAD'),
(424, 85, 'VILLANUEVA'),
(425, 85, 'YOPAL'),
(426, 19, 'ALMAGUER'),
(427, 19, 'ARGELIA'),
(428, 19, 'BALBOA'),
(429, 19, 'BOLIVAR'),
(430, 19, 'BUENOS AIRES'),
(431, 19, 'CAJIBIO'),
(432, 19, 'CALDONO'),
(433, 19, 'CALOTO'),
(434, 19, 'CORINTO'),
(435, 19, 'EL TAMBO'),
(436, 19, 'FLORENCIA'),
(437, 19, 'GUAPI'),
(438, 19, 'INZA'),
(439, 19, 'JAMBALO'),
(440, 19, 'LA SIERRA'),
(441, 19, 'LA VEGA'),
(442, 19, 'LOPEZ'),
(443, 19, 'MERCADERES'),
(444, 19, 'MIRANDA'),
(445, 19, 'MORALES'),
(446, 19, 'PADILLA'),
(447, 19, 'PAEZ'),
(448, 19, 'PATIA'),
(449, 19, 'PIAMONTE'),
(450, 19, 'PIENDAMO'),
(451, 19, 'POPAYAN'),
(452, 19, 'PUERTO TEJADA'),
(453, 19, 'PURACE'),
(454, 19, 'ROSAS'),
(455, 19, 'SAN SEBASTIAN'),
(456, 19, 'SANTA ROSA'),
(457, 19, 'SANTANDER DE QUILICHAO'),
(458, 19, 'SILVIA'),
(459, 19, 'SOTARA'),
(460, 19, 'SUAREZ'),
(461, 19, 'SUCRE'),
(462, 19, 'TIMBIO'),
(463, 19, 'TIMBIQUI'),
(464, 19, 'TORIBIO'),
(465, 19, 'TOTORO'),
(466, 19, 'VILLA RICA'),
(467, 20, 'AGUACHICA'),
(468, 20, 'AGUSTIN CODAZZI'),
(469, 20, 'ASTREA'),
(470, 20, 'BECERRIL'),
(471, 20, 'BOSCONIA'),
(472, 20, 'CHIMICHAGUA'),
(473, 20, 'CHIRIGUANA'),
(474, 20, 'CURUMANI'),
(475, 20, 'EL COPEY'),
(476, 20, 'EL PASO'),
(477, 20, 'GAMARRA'),
(478, 20, 'GONZALEZ'),
(479, 20, 'LA GLORIA'),
(480, 20, 'LA JAGUA DE IBIRICO'),
(481, 20, 'LA PAZ'),
(482, 20, 'MANAURE'),
(483, 20, 'PAILITAS'),
(484, 20, 'PELAYA'),
(485, 20, 'PUEBLO BELLO'),
(486, 20, 'RIO DE ORO'),
(487, 20, 'SAN ALBERTO'),
(488, 20, 'SAN DIEGO'),
(489, 20, 'SAN MARTIN'),
(490, 20, 'TAMALAMEQUE'),
(491, 20, 'VALLEDUPAR'),
(492, 27, 'ACANDI'),
(493, 27, 'ALTO BAUDO'),
(494, 27, 'ATRATO'),
(495, 27, 'BAGADO'),
(496, 27, 'BAHIA SOLANO'),
(497, 27, 'BAJO BAUDO'),
(498, 27, 'BELEN DE BAJIRA'),
(499, 27, 'BOJAYA'),
(500, 27, 'CARMEN DEL DARIEN'),
(501, 27, 'CERTEGUI'),
(502, 27, 'CONDOTO'),
(503, 27, 'EL CANTON DEL SAN PABLO'),
(504, 27, 'EL CARMEN DE ATRATO'),
(505, 27, 'EL LITORAL DEL SAN JUAN'),
(506, 27, 'ISTMINA'),
(507, 27, 'JURADO'),
(508, 27, 'LLORO'),
(509, 27, 'MEDIO ATRATO'),
(510, 27, 'MEDIO BAUDO'),
(511, 27, 'MEDIO SAN JUAN'),
(512, 27, 'NOVITA'),
(513, 27, 'NUQUI'),
(514, 27, 'QUIBDO'),
(515, 27, 'RIO IRO'),
(516, 27, 'RIO QUITO'),
(517, 27, 'RIOSUCIO'),
(518, 27, 'SAN JOSE DEL PALMAR'),
(519, 27, 'SIPI'),
(520, 27, 'TADO'),
(521, 27, 'UNGUIA'),
(522, 27, 'UNION PANAMERICANA'),
(523, 23, 'AYAPEL'),
(524, 23, 'BUENAVISTA'),
(525, 23, 'CANALETE'),
(526, 23, 'CERETE'),
(527, 23, 'CHIMA'),
(528, 23, 'CHINU'),
(529, 23, 'CIENAGA DE ORO'),
(530, 23, 'COTORRA'),
(531, 23, 'LA APARTADA'),
(532, 23, 'LORICA'),
(533, 23, 'LOS CORDOBAS'),
(534, 23, 'MOMIL'),
(535, 23, 'MONTELIBANO'),
(536, 23, 'MONTERIA'),
(537, 23, 'MOÑITOS'),
(538, 23, 'PLANETA RICA'),
(539, 23, 'PUEBLO NUEVO'),
(540, 23, 'PUERTO ESCONDIDO'),
(541, 23, 'PUERTO LIBERTADOR'),
(542, 23, 'PURISIMA'),
(543, 23, 'SAHAGUN'),
(544, 23, 'SAN ANDRES SOTAVENTO'),
(545, 23, 'SAN ANTERO'),
(546, 23, 'SAN BERNARDO DEL VIENTO'),
(547, 23, 'SAN CARLOS'),
(548, 23, 'SAN PELAYO'),
(549, 23, 'TIERRALTA'),
(550, 23, 'VALENCIA'),
(551, 25, 'AGUA DE DIOS'),
(552, 25, 'ALBAN'),
(553, 25, 'ANAPOIMA'),
(554, 25, 'ANOLAIMA'),
(555, 25, 'APULO'),
(556, 25, 'ARBELAEZ'),
(557, 25, 'BELTRAN'),
(558, 25, 'BITUIMA'),
(559, 25, 'BOJACA'),
(560, 25, 'CABRERA'),
(561, 25, 'CACHIPAY'),
(562, 25, 'CAJICA'),
(563, 25, 'CAPARRAPI'),
(564, 25, 'CAQUEZA'),
(565, 25, 'CARMEN DE CARUPA'),
(566, 25, 'CHAGUANI'),
(567, 25, 'CHIA'),
(568, 25, 'CHIPAQUE'),
(569, 25, 'CHOACHI'),
(570, 25, 'CHOCONTA'),
(571, 25, 'COGUA'),
(572, 25, 'COTA'),
(573, 25, 'CUCUNUBA'),
(574, 25, 'EL COLEGIO'),
(575, 25, 'EL PEÑON'),
(576, 25, 'EL ROSAL'),
(577, 25, 'FACATATIVA'),
(578, 25, 'FOMEQUE'),
(579, 25, 'FOSCA'),
(580, 25, 'FUNZA'),
(581, 25, 'FUQUENE'),
(582, 25, 'FUSAGASUGA'),
(583, 25, 'GACHALA'),
(584, 25, 'GACHANCIPA'),
(585, 25, 'GACHETA'),
(586, 25, 'GAMA'),
(587, 25, 'GIRARDOT'),
(588, 25, 'GRANADA'),
(589, 25, 'GUACHETA'),
(590, 25, 'GUADUAS'),
(591, 25, 'GUASCA'),
(592, 25, 'GUATAQUI'),
(593, 25, 'GUATAVITA'),
(594, 25, 'GUAYABAL DE SIQUIMA'),
(595, 25, 'GUAYABETAL'),
(596, 25, 'GUTIERREZ'),
(597, 25, 'JERUSALEN'),
(598, 25, 'JUNIN'),
(599, 25, 'LA CALERA'),
(600, 25, 'LA MESA'),
(601, 25, 'LA PALMA'),
(602, 25, 'LA PEÑA'),
(603, 25, 'LA VEGA'),
(604, 25, 'LENGUAZAQUE'),
(605, 25, 'MACHETA'),
(606, 25, 'MADRID'),
(607, 25, 'MANTA'),
(608, 25, 'MEDINA'),
(609, 25, 'MOSQUERA'),
(610, 25, 'NARIÑO'),
(611, 25, 'NEMOCON'),
(612, 25, 'NILO'),
(613, 25, 'NIMAIMA'),
(614, 25, 'NOCAIMA'),
(615, 25, 'PACHO'),
(616, 25, 'PAIME'),
(617, 25, 'PANDI'),
(618, 25, 'PARATEBUENO'),
(619, 25, 'PASCA'),
(620, 25, 'PUERTO SALGAR'),
(621, 25, 'PULI'),
(622, 25, 'QUEBRADANEGRA'),
(623, 25, 'QUETAME'),
(624, 25, 'QUIPILE'),
(625, 25, 'RICAURTE'),
(626, 25, 'SAN ANTONIO DEL TEQUENDAMA'),
(627, 25, 'SAN BERNARDO'),
(628, 25, 'SAN CAYETANO'),
(629, 25, 'SAN FRANCISCO'),
(630, 25, 'SAN JUAN DE RIO SECO'),
(631, 25, 'SASAIMA'),
(632, 25, 'SESQUILE'),
(633, 25, 'SIBATE'),
(634, 25, 'SILVANIA'),
(635, 25, 'SIMIJACA'),
(636, 25, 'SOACHA'),
(637, 25, 'SOPO'),
(638, 25, 'SUBACHOQUE'),
(639, 25, 'SUESCA'),
(640, 25, 'SUPATA'),
(641, 25, 'SUSA'),
(642, 25, 'SUTATAUSA'),
(643, 25, 'TABIO'),
(644, 25, 'TAUSA'),
(645, 25, 'TENA'),
(646, 25, 'TENJO'),
(647, 25, 'TIBACUY'),
(648, 25, 'TIBIRITA'),
(649, 25, 'TOCAIMA'),
(650, 25, 'TOCANCIPA'),
(651, 25, 'TOPAIPI'),
(652, 25, 'UBALA'),
(653, 25, 'UBAQUE'),
(654, 25, 'UNE'),
(655, 25, 'UTICA'),
(656, 25, 'VENECIA'),
(657, 25, 'VERGARA'),
(658, 25, 'VIANI'),
(659, 25, 'VILLA DE SAN DIEGO DE UBATE'),
(660, 25, 'VILLAGOMEZ'),
(661, 25, 'VILLAPINZON'),
(662, 25, 'VILLETA'),
(663, 25, 'VIOTA'),
(664, 25, 'YACOPI'),
(665, 25, 'ZIPACON'),
(666, 25, 'ZIPAQUIRA'),
(667, 94, 'BARRANCO MINAS'),
(668, 94, 'CACAHUAL'),
(669, 94, 'INIRIDA'),
(670, 94, 'LA GUADALUPE'),
(671, 94, 'MAPIRIPANA'),
(672, 94, 'MORICHAL'),
(673, 94, 'PANA PANA'),
(674, 94, 'PUERTO COLOMBIA'),
(675, 94, 'SAN FELIPE'),
(676, 95, 'CALAMAR'),
(677, 95, 'EL RETORNO'),
(678, 95, 'MIRAFLORES'),
(679, 95, 'SAN JOSE DEL GUAVIARE'),
(680, 41, 'ACEVEDO'),
(681, 41, 'AGRADO'),
(682, 41, 'AIPE'),
(683, 41, 'ALGECIRAS'),
(684, 41, 'ALTAMIRA'),
(685, 41, 'BARAYA'),
(686, 41, 'CAMPOALEGRE'),
(687, 41, 'COLOMBIA'),
(688, 41, 'ELIAS'),
(689, 41, 'GARZON'),
(690, 41, 'GIGANTE'),
(691, 41, 'GUADALUPE'),
(692, 41, 'IQUIRA'),
(693, 41, 'ISNOS'),
(694, 41, 'LA ARGENTINA'),
(695, 41, 'LA PLATA'),
(696, 41, 'NATAGA'),
(697, 41, 'NEIVA'),
(698, 41, 'OPORAPA'),
(699, 41, 'PAICOL'),
(700, 41, 'PALERMO'),
(701, 41, 'PALESTINA'),
(702, 41, 'PITAL'),
(703, 41, 'PITALITO'),
(704, 41, 'RIVERA'),
(705, 41, 'SALADOBLANCO'),
(706, 41, 'SAN AGUSTIN'),
(707, 41, 'SANTA MARIA'),
(708, 41, 'SUAZA'),
(709, 41, 'TARQUI'),
(710, 41, 'TELLO'),
(711, 41, 'TERUEL'),
(712, 41, 'TESALIA'),
(713, 41, 'TIMANA'),
(714, 41, 'VILLAVIEJA'),
(715, 41, 'YAGUARA'),
(716, 44, 'ALBANIA'),
(717, 44, 'BARRANCAS'),
(718, 44, 'DIBULLA'),
(719, 44, 'DISTRACCION'),
(720, 44, 'EL MOLINO'),
(721, 44, 'FONSECA'),
(722, 44, 'HATONUEVO'),
(723, 44, 'LA JAGUA DEL PILAR'),
(724, 44, 'MAICAO'),
(725, 44, 'MANAURE'),
(726, 44, 'RIOHACHA'),
(727, 44, 'SAN JUAN DEL CESAR'),
(728, 44, 'URIBIA'),
(729, 44, 'URUMITA'),
(730, 44, 'VILLANUEVA'),
(731, 47, 'ALGARROBO'),
(732, 47, 'ARACATACA'),
(733, 47, 'ARIGUANI'),
(734, 47, 'CERRO SAN ANTONIO'),
(735, 47, 'CHIBOLO'),
(736, 47, 'CIENAGA'),
(737, 47, 'CONCORDIA'),
(738, 47, 'EL BANCO'),
(739, 47, 'EL PIÑON'),
(740, 47, 'EL RETEN'),
(741, 47, 'FUNDACION'),
(742, 47, 'GUAMAL'),
(743, 47, 'NUEVA GRANADA'),
(744, 47, 'PEDRAZA'),
(745, 47, 'PIJIÑO DEL CARMEN'),
(746, 47, 'PIVIJAY'),
(747, 47, 'PLATO'),
(748, 47, 'PUEBLOVIEJO'),
(749, 47, 'REMOLINO'),
(750, 47, 'SABANAS DE SAN ANGEL'),
(751, 47, 'SALAMINA'),
(752, 47, 'SAN SEBASTIAN DE BUENAVISTA'),
(753, 47, 'SAN ZENON'),
(754, 47, 'SANTA ANA'),
(755, 47, 'SANTA BARBARA DE PINTO'),
(756, 47, 'SANTA MARTA'),
(757, 47, 'SITIONUEVO'),
(758, 47, 'TENERIFE'),
(759, 47, 'ZAPAYAN'),
(760, 47, 'ZONA BANANERA'),
(761, 50, 'ACACIAS'),
(762, 50, 'BARRANCA DE UPIA'),
(763, 50, 'CABUYARO'),
(764, 50, 'CASTILLA LA NUEVA'),
(765, 50, 'CUBARRAL'),
(766, 50, 'CUMARAL'),
(767, 50, 'EL CALVARIO'),
(768, 50, 'EL CASTILLO'),
(769, 50, 'EL DORADO'),
(770, 50, 'FUENTE DE ORO'),
(771, 50, 'GRANADA'),
(772, 50, 'GUAMAL'),
(773, 50, 'LA MACARENA'),
(774, 50, 'LEJANIAS'),
(775, 50, 'MAPIRIPAN'),
(776, 50, 'MESETAS'),
(777, 50, 'PUERTO CONCORDIA'),
(778, 50, 'PUERTO GAITAN'),
(779, 50, 'PUERTO LLERAS'),
(780, 50, 'PUERTO LOPEZ'),
(781, 50, 'PUERTO RICO'),
(782, 50, 'RESTREPO'),
(783, 50, 'SAN CARLOS DE GUAROA'),
(784, 50, 'SAN JUAN DE ARAMA'),
(785, 50, 'SAN JUANITO'),
(786, 50, 'SAN MARTIN'),
(787, 50, 'URIBE'),
(788, 50, 'VILLAVICENCIO'),
(789, 50, 'VISTAHERMOSA'),
(790, 52, 'ALBAN'),
(791, 52, 'ALDANA'),
(792, 52, 'ANCUYA'),
(793, 52, 'ARBOLEDA'),
(794, 52, 'BARBACOAS'),
(795, 52, 'BELEN'),
(796, 52, 'BUESACO'),
(797, 52, 'CHACHAGÜI'),
(798, 52, 'COLON'),
(799, 52, 'CONSACA'),
(800, 52, 'CONTADERO'),
(801, 52, 'CORDOBA'),
(802, 52, 'CUASPUD'),
(803, 52, 'CUMBAL'),
(804, 52, 'CUMBITARA'),
(805, 52, 'EL CHARCO'),
(806, 52, 'EL PEÑOL'),
(807, 52, 'EL ROSARIO'),
(808, 52, 'EL TABLON DE GOMEZ'),
(809, 52, 'EL TAMBO'),
(810, 52, 'FRANCISCO PIZARRO'),
(811, 52, 'FUNES'),
(812, 52, 'GUACHUCAL'),
(813, 52, 'GUAITARILLA'),
(814, 52, 'GUALMATAN'),
(815, 52, 'ILES'),
(816, 52, 'IMUES'),
(817, 52, 'IPIALES'),
(818, 52, 'LA CRUZ'),
(819, 52, 'LA FLORIDA'),
(820, 52, 'LA LLANADA'),
(821, 52, 'LA TOLA'),
(822, 52, 'LA UNION'),
(823, 52, 'LEIVA'),
(824, 52, 'LINARES'),
(825, 52, 'LOS ANDES'),
(826, 52, 'MAGÜI'),
(827, 52, 'MALLAMA'),
(828, 52, 'MOSQUERA'),
(829, 52, 'NARIÑO'),
(830, 52, 'OLAYA HERRERA'),
(831, 52, 'OSPINA'),
(832, 52, 'PASTO'),
(833, 52, 'POLICARPA'),
(834, 52, 'POTOSI'),
(835, 52, 'PROVIDENCIA'),
(836, 52, 'PUERRES'),
(837, 52, 'PUPIALES'),
(838, 52, 'RICAURTE'),
(839, 52, 'ROBERTO PAYAN'),
(840, 52, 'SAMANIEGO'),
(841, 52, 'SAN BERNARDO'),
(842, 52, 'SAN LORENZO'),
(843, 52, 'SAN PABLO'),
(844, 52, 'SAN PEDRO DE CARTAGO'),
(845, 52, 'SANDONA'),
(846, 52, 'SANTA BARBARA'),
(847, 52, 'SANTACRUZ'),
(848, 52, 'SAPUYES'),
(849, 52, 'TAMINANGO'),
(850, 52, 'TANGUA'),
(851, 52, 'TUMACO'),
(852, 52, 'TUQUERRES'),
(853, 52, 'YACUANQUER'),
(854, 54, 'ABREGO'),
(855, 54, 'ARBOLEDAS'),
(856, 54, 'BOCHALEMA'),
(857, 54, 'BUCARASICA'),
(858, 54, 'CACHIRA'),
(859, 54, 'CACOTA'),
(860, 54, 'CHINACOTA'),
(861, 54, 'CHITAGA'),
(862, 54, 'CONVENCION'),
(863, 54, 'CUCUTA'),
(864, 54, 'CUCUTILLA'),
(865, 54, 'DURANIA'),
(866, 54, 'EL CARMEN'),
(867, 54, 'EL TARRA'),
(868, 54, 'EL ZULIA'),
(869, 54, 'GRAMALOTE'),
(870, 54, 'HACARI'),
(871, 54, 'HERRAN'),
(872, 54, 'LA ESPERANZA'),
(873, 54, 'LA PLAYA'),
(874, 54, 'LABATECA'),
(875, 54, 'LOS PATIOS'),
(876, 54, 'LOURDES'),
(877, 54, 'MUTISCUA'),
(878, 54, 'OCAÑA'),
(879, 54, 'PAMPLONA'),
(880, 54, 'PAMPLONITA'),
(881, 54, 'PUERTO SANTANDER'),
(882, 54, 'RAGONVALIA'),
(883, 54, 'SALAZAR'),
(884, 54, 'SAN CALIXTO'),
(885, 54, 'SAN CAYETANO'),
(886, 54, 'SANTIAGO'),
(887, 54, 'SARDINATA'),
(888, 54, 'SILOS'),
(889, 54, 'TEORAMA'),
(890, 54, 'TIBU'),
(891, 54, 'TOLEDO'),
(892, 54, 'VILLA CARO'),
(893, 54, 'VILLA DEL ROSARIO'),
(894, 86, 'COLON'),
(895, 86, 'LEGUIZAMO'),
(896, 86, 'MOCOA'),
(897, 86, 'ORITO'),
(898, 86, 'PUERTO ASIS'),
(899, 86, 'PUERTO CAICEDO'),
(900, 86, 'PUERTO GUZMAN'),
(901, 86, 'SAN FRANCISCO'),
(902, 86, 'SAN MIGUEL'),
(903, 86, 'SANTIAGO'),
(904, 86, 'SIBUNDOY'),
(905, 86, 'VALLE DEL GUAMUEZ'),
(906, 86, 'VILLAGARZON'),
(907, 63, 'ARMENIA'),
(908, 63, 'BUENAVISTA'),
(909, 63, 'CALARCA'),
(910, 63, 'CIRCASIA'),
(911, 63, 'CORDOBA'),
(912, 63, 'FILANDIA'),
(913, 63, 'GENOVA'),
(914, 63, 'LA TEBAIDA'),
(915, 63, 'MONTENEGRO'),
(916, 63, 'PIJAO'),
(917, 63, 'QUIMBAYA'),
(918, 63, 'SALENTO'),
(919, 66, 'APIA'),
(920, 66, 'BALBOA'),
(921, 66, 'BELEN DE UMBRIA'),
(922, 66, 'DOSQUEBRADAS'),
(923, 66, 'GUATICA'),
(924, 66, 'LA CELIA'),
(925, 66, 'LA VIRGINIA'),
(926, 66, 'MARSELLA'),
(927, 66, 'MISTRATO'),
(928, 66, 'PEREIRA'),
(929, 66, 'PUEBLO RICO'),
(930, 66, 'QUINCHIA'),
(931, 66, 'SANTA ROSA DE CABAL'),
(932, 66, 'SANTUARIO'),
(933, 68, 'AGUADA'),
(934, 68, 'ALBANIA'),
(935, 68, 'ARATOCA'),
(936, 68, 'BARBOSA'),
(937, 68, 'BARICHARA'),
(938, 68, 'BARRANCABERMEJA'),
(939, 68, 'BETULIA'),
(940, 68, 'BOLIVAR'),
(941, 68, 'BUCARAMANGA'),
(942, 68, 'CABRERA'),
(943, 68, 'CALIFORNIA'),
(944, 68, 'CAPITANEJO'),
(945, 68, 'CARCASI'),
(946, 68, 'CEPITA'),
(947, 68, 'CERRITO'),
(948, 68, 'CHARALA'),
(949, 68, 'CHARTA'),
(950, 68, 'CHIMA'),
(951, 68, 'CHIPATA'),
(952, 68, 'CIMITARRA'),
(953, 68, 'CONCEPCION'),
(954, 68, 'CONFINES'),
(955, 68, 'CONTRATACION'),
(956, 68, 'COROMORO'),
(957, 68, 'CURITI'),
(958, 68, 'EL CARMEN DE CHUCURI'),
(959, 5, 'CAROLINA'),
(960, 5, 'CAUCASIA'),
(961, 68, 'EL GUACAMAYO'),
(962, 68, 'EL PEÑON'),
(963, 68, 'EL PLAYON'),
(964, 68, 'ENCINO'),
(965, 68, 'ENCISO'),
(966, 68, 'FLORIAN'),
(967, 68, 'FLORIDABLANCA'),
(968, 68, 'GALAN'),
(969, 68, 'GAMBITA'),
(970, 68, 'GIRON'),
(971, 68, 'GUACA'),
(972, 68, 'GUADALUPE'),
(973, 68, 'GUAPOTA'),
(974, 68, 'GUAVATA'),
(975, 68, 'GÜEPSA'),
(976, 68, 'HATO'),
(977, 68, 'JESUS MARIA'),
(978, 68, 'JORDAN'),
(979, 68, 'LA BELLEZA'),
(980, 68, 'LA PAZ'),
(981, 68, 'LANDAZURI'),
(982, 68, 'LEBRIJA'),
(983, 68, 'LOS SANTOS'),
(984, 68, 'MACARAVITA'),
(985, 68, 'MALAGA'),
(986, 68, 'MATANZA'),
(987, 68, 'MOGOTES'),
(988, 68, 'MOLAGAVITA'),
(989, 68, 'OCAMONTE'),
(990, 68, 'OIBA'),
(991, 68, 'ONZAGA'),
(992, 68, 'PALMAR'),
(993, 68, 'PALMAS DEL SOCORRO'),
(994, 68, 'PARAMO'),
(995, 68, 'PIEDECUESTA'),
(996, 68, 'PINCHOTE'),
(997, 68, 'PUENTE NACIONAL'),
(998, 68, 'PUERTO PARRA'),
(999, 68, 'PUERTO WILCHES'),
(1000, 68, 'RIONEGRO'),
(1001, 68, 'SABANA DE TORRES'),
(1002, 68, 'SAN ANDRES'),
(1003, 68, 'SAN BENITO'),
(1004, 68, 'SAN GIL'),
(1005, 68, 'VALLE DE SAN JOSE'),
(1006, 68, 'VELEZ'),
(1007, 68, 'VETAS'),
(1008, 68, 'VILLANUEVA'),
(1009, 68, 'ZAPATOCA'),
(1010, 70, 'BUENAVISTA'),
(1011, 70, 'CAIMITO'),
(1012, 70, 'CHALAN'),
(1013, 70, 'COLOSO'),
(1014, 70, 'COROZAL'),
(1015, 70, 'COVEÑAS'),
(1016, 70, 'EL ROBLE'),
(1017, 70, 'GALERAS'),
(1018, 70, 'GUARANDA'),
(1019, 70, 'LA UNION'),
(1020, 73, 'FLANDES'),
(1021, 73, 'FRESNO'),
(1022, 73, 'GUAMO'),
(1023, 73, 'HERVEO'),
(1024, 73, 'HONDA'),
(1025, 73, 'IBAGUE'),
(1026, 73, 'ICONONZO'),
(1027, 73, 'LERIDA'),
(1028, 73, 'LIBANO'),
(1029, 73, 'MARIQUITA'),
(1030, 73, 'MELGAR'),
(1031, 73, 'MURILLO'),
(1032, 73, 'NATAGAIMA'),
(1033, 73, 'ORTEGA'),
(1034, 73, 'PALOCABILDO'),
(1035, 73, 'PIEDRAS'),
(1036, 73, 'PLANADAS'),
(1037, 73, 'PRADO'),
(1038, 73, 'PURIFICACION'),
(1039, 73, 'RIOBLANCO'),
(1040, 73, 'RONCESVALLES'),
(1041, 73, 'ROVIRA'),
(1042, 73, 'SALDAÑA'),
(1043, 73, 'SAN ANTONIO'),
(1044, 73, 'SAN LUIS'),
(1045, 73, 'SANTA ISABEL'),
(1046, 73, 'SUAREZ'),
(1047, 73, 'VALLE DE SAN JUAN'),
(1048, 73, 'VENADILLO'),
(1049, 73, 'VILLAHERMOSA'),
(1050, 73, 'VILLARRICA'),
(1051, 76, 'ALCALA'),
(1052, 76, 'ANDALUCIA'),
(1053, 76, 'ANSERMANUEVO'),
(1054, 76, 'ARGELIA'),
(1055, 76, 'BOLIVAR'),
(1056, 76, 'BUENAVENTURA'),
(1057, 76, 'BUGALAGRANDE'),
(1058, 76, 'CAICEDONIA'),
(1059, 76, 'CALI'),
(1060, 76, 'CALIMA'),
(1061, 76, 'CANDELARIA'),
(1062, 76, 'CARTAGO'),
(1063, 76, 'DAGUA'),
(1064, 76, 'EL AGUILA'),
(1065, 76, 'EL CAIRO'),
(1066, 76, 'EL CERRITO'),
(1067, 76, 'EL DOVIO'),
(1068, 76, 'FLORIDA'),
(1069, 76, 'GINEBRA'),
(1070, 76, 'GUACARI'),
(1071, 76, 'GUADALAJARA DE BUGA'),
(1072, 76, 'JAMUNDI'),
(1073, 76, 'LA CUMBRE'),
(1074, 76, 'LA UNION'),
(1075, 76, 'LA VICTORIA'),
(1076, 76, 'OBANDO'),
(1077, 76, 'PALMIRA'),
(1078, 76, 'PRADERA'),
(1079, 76, 'RESTREPO'),
(1080, 76, 'RIOFRIO'),
(1081, 76, 'ROLDANILLO'),
(1082, 76, 'SAN PEDRO'),
(1083, 76, 'SEVILLA'),
(1084, 76, 'TORO'),
(1085, 76, 'TRUJILLO'),
(1086, 76, 'TULUA'),
(1087, 76, 'ULLOA'),
(1088, 76, 'VERSALLES'),
(1089, 76, 'VIJES'),
(1090, 76, 'YOTOCO'),
(1091, 76, 'YUMBO'),
(1092, 76, 'ZARZAL'),
(1093, 97, 'CARURU'),
(1094, 97, 'MITU'),
(1095, 97, 'PACOA'),
(1096, 97, 'PAPUNAUA'),
(1097, 97, 'TARAIRA'),
(1098, 97, 'YAVARATE'),
(1099, 99, 'CUMARIBO'),
(1100, 99, 'LA PRIMAVERA'),
(1101, 99, 'PUERTO CARREÑO'),
(1102, 99, 'SANTA ROSALIA'),
(1103, 15, 'IZA'),
(1104, 5, 'CIUDAD BOLIVAR'),
(1105, 5, 'COCORNA'),
(1106, 5, 'CONCEPCION'),
(1107, 5, 'CONCORDIA'),
(1108, 5, 'COPACABANA'),
(1109, 68, 'SAN JOAQUIN'),
(1110, 68, 'SAN JOSE DE MIRANDA'),
(1111, 68, 'SAN MIGUEL'),
(1112, 68, 'SAN VICENTE DE CHUCURI'),
(1113, 68, 'SANTA BARBARA'),
(1114, 68, 'SANTA HELENA DEL OPON'),
(1115, 68, 'SIMACOTA'),
(1116, 68, 'SOCORRO'),
(1117, 68, 'SUAITA'),
(1118, 68, 'SUCRE'),
(1119, 68, 'SURATA'),
(2000, 1, 'SIN ESPECIFICAR'),
(2006, 68, 'UUUIOUIOUI'),
(2007, 1000, 'CIUDAD REAL'),
(2008, 1001, 'PANAMA'),
(2009, 8, 'dsad'),
(2010, 5, 'Zurutuza'),
(2011, 8, 'asdasd'),
(2012, 27, 'nn'),
(2013, 81, 'GGG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'peru'),
(2, 'colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `nombre`, `descripcion`) VALUES
(4, 'rol-modificar', 'Rol: Modificar'),
(5, 'rol-eliminar', 'Rol: Eliminar'),
(6, 'persona', 'Persona: Ver'),
(7, 'persona-agregar', 'Persona: Agregar'),
(8, 'persona-modificar', 'Persona: Modficar'),
(9, 'persona-eliminar', 'Persona: Eliminar'),
(11, 'asignar-rol\r\n', 'Asignar Rol: Ver'),
(12, 'asignar-rol-agregar\r\n', 'Asignar Rol: Agregar'),
(13, 'asignar-rol-modificar', 'Asignar Rol: Modificar'),
(14, 'asignar-rol-eliminar', 'Asignar Rol: Eliminar'),
(15, 'municipio', 'Municipio: Ver'),
(16, 'municipio-agregar', 'Municipio: Agregar'),
(17, 'municipio-modificar', 'Municipio: Modificar'),
(18, 'municipio-eliminar', 'Municipio: Eliminar'),
(19, 'departamento', 'Departamento: Ver'),
(20, 'departamento-agregar', 'Departamento: Agregar'),
(21, 'departamento-modificar', 'Departamento: Modificar'),
(22, 'departamento-eliminar', 'Departamento: Eliminar'),
(23, 'asignar-permiso', 'Asignar Permiso: Ver'),
(24, 'asignar-permiso-agregar', 'Asignar Permiso: Agregar'),
(26, 'asignar-permiso-eliminar', 'Asignar Permiso: Eliminar'),
(27, 'categoria', 'Cartegoria: Ver'),
(28, 'categoria-agregar', 'Cartegoria: Agregar'),
(29, 'categoria-modificar', 'Cartegoria: Modificar'),
(30, 'categoria-eliminar', 'Cartegoria: Eliminar'),
(31, 'marca', 'Marca: Ver'),
(32, 'marca-agregar', 'Marca: Agregar'),
(33, 'marca-modificar', 'Marca: Modificar'),
(34, 'marca-eliminar', 'Marca: Eliminar'),
(35, 'proveedores', 'Proveedores: Ver'),
(36, 'proveedores-agregar', 'Proveedores: Agregar'),
(37, 'proveedores-modificar', 'Proveedores: Modificar'),
(38, 'proveedores-eliminar', 'Proveedores: Eliminar'),
(39, 'ingreso', 'Ingreso: Ver'),
(40, 'ingreso-agregar', 'Ingreso: Agregar'),
(41, 'ingreso-modificar', 'Ingreso: Modificar'),
(42, 'ingreso-eliminar', 'Ingreso: Eliminar'),
(45, 'categoria-eliminar', 'categoria-eliminar'),
(50, 'categoria', 'categoria: Ver'),
(51, 'categoria-agregar', 'categoria: Agregar'),
(52, 'categoria-modificar', 'categoria-Modificar'),
(53, 'rol para el examen', 'Rol para el examen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `id_permiso_rol` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `modulo` varchar(80) NOT NULL,
  `accion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`id_permiso_rol`, `id_rol`, `modulo`, `accion`) VALUES
(1, 1, 'persona', 'ver'),
(2, 1, 'persona', 'listar'),
(3, 1, 'persona', 'agregar'),
(4, 1, 'persona', 'modificar'),
(5, 1, 'persona', 'eliminar'),
(6, 1, 'persona', 'datos'),
(7, 1, 'producto', 'ver'),
(8, 1, 'producto', 'listar'),
(9, 1, 'producto', 'agregar'),
(10, 1, 'producto', 'modificar'),
(11, 1, 'producto', 'eliminar'),
(12, 1, 'producto', 'datos'),
(13, 1, 'ingreso', 'ver'),
(14, 1, 'ingreso', 'listar'),
(15, 1, 'ingreso', 'agregar'),
(16, 1, 'ingreso', 'modificar'),
(17, 1, 'ingreso', 'eliminar'),
(18, 1, 'ingreso', 'datos'),
(19, 1, 'entrega', 'ver'),
(20, 1, 'entrega', 'listar'),
(21, 1, 'entrega', 'agregar'),
(22, 1, 'entrega', 'modificar'),
(23, 1, 'entrega', 'eliminar'),
(24, 1, 'entrega', 'datos'),
(25, 1, 'sexo', 'ver'),
(26, 1, 'sexo', 'listar'),
(27, 1, 'sexo', 'agregar'),
(28, 1, 'sexo', 'modificar'),
(29, 1, 'sexo', 'eliminar'),
(30, 1, 'sexo', 'datos'),
(31, 1, 'tipo_identidad', 'ver'),
(32, 1, 'tipo_identidad', 'listar'),
(33, 1, 'tipo_identidad', 'agregar'),
(34, 1, 'tipo_identidad', 'modificar'),
(35, 1, 'tipo_identidad', 'eliminar'),
(36, 1, 'tipo_identidad', 'datos'),
(37, 1, 'tipo_producto', 'ver'),
(38, 1, 'tipo_producto', 'listar'),
(39, 1, 'tipo_producto', 'agregar'),
(40, 1, 'tipo_producto', 'modificar'),
(41, 1, 'tipo_producto', 'eliminar'),
(42, 1, 'tipo_producto', 'datos'),
(43, 1, 'estado_civil', 'ver'),
(44, 1, 'estado_civil', 'listar'),
(45, 1, 'estado_civil', 'agregar'),
(46, 1, 'estado_civil', 'modificar'),
(47, 1, 'estado_civil', 'eliminar'),
(48, 1, 'estado_civil', 'datos'),
(49, 1, 'cargo', 'ver'),
(50, 1, 'cargo', 'listar'),
(51, 1, 'cargo', 'agregar'),
(52, 1, 'cargo', 'modificar'),
(53, 1, 'cargo', 'eliminar'),
(54, 1, 'cargo', 'datos'),
(55, 1, 'departamento', 'ver'),
(56, 1, 'departamento', 'listar'),
(57, 1, 'departamento', 'agregar'),
(58, 1, 'departamento', 'modificar'),
(59, 1, 'departamento', 'eliminar'),
(60, 1, 'departamento', 'datos'),
(61, 1, 'municipio', 'ver'),
(62, 1, 'municipio', 'listar'),
(63, 1, 'municipio', 'agregar'),
(64, 1, 'municipio', 'modificar'),
(65, 1, 'municipio', 'eliminar'),
(66, 1, 'municipio', 'datos'),
(67, 1, 'permiso', 'ver'),
(68, 1, 'permiso', 'listar'),
(69, 1, 'permiso', 'agregar'),
(70, 1, 'permiso', 'modificar'),
(71, 1, 'permiso', 'eliminar'),
(72, 1, 'permiso', 'datos'),
(73, 1, 'zona_de_residencia', 'ver'),
(74, 1, 'zona_de_residencia', 'listar'),
(75, 1, 'zona_de_residencia', 'agregar'),
(76, 1, 'zona_de_residencia', 'modificar'),
(77, 1, 'zona_de_residencia', 'eliminar'),
(78, 1, 'zona_de_residencia', 'datos'),
(79, 1, 'proveedores', 'ver'),
(80, 1, 'proveedores', 'listar'),
(81, 1, 'proveedores', 'agregar'),
(82, 1, 'proveedores', 'modificar'),
(83, 1, 'proveedores', 'eliminar'),
(84, 1, 'proveedores', 'datos'),
(85, 1, 'contenido', 'ver'),
(86, 1, 'contenido', 'listar'),
(87, 1, 'contenido', 'agregar'),
(88, 1, 'contenido', 'modificar'),
(89, 1, 'contenido', 'eliminar'),
(90, 1, 'contenido', 'datos'),
(91, 1, 'rol', 'ver'),
(92, 1, 'rol', 'listar'),
(93, 1, 'rol', 'agregar'),
(94, 1, 'rol', 'modificar'),
(95, 1, 'rol', 'eliminar'),
(96, 1, 'rol', 'datos'),
(97, 1, 'permiso_rol', 'ver'),
(98, 1, 'permiso_rol', 'listar'),
(99, 1, 'permiso_rol', 'agregar'),
(100, 1, 'permiso_rol', 'modificar'),
(101, 1, 'permiso_rol', 'eliminar'),
(102, 1, 'permiso_rol', 'datos'),
(103, 1, 'modulo_accion', 'ver'),
(104, 1, 'modulo_accion', 'listar'),
(105, 1, 'modulo_accion', 'agregar'),
(106, 1, 'modulo_accion', 'modificar'),
(107, 1, 'modulo_accion', 'eliminar'),
(108, 1, 'modulo_accion', 'datos'),
(109, 1, 'persona_rol', 'ver'),
(110, 1, 'persona_rol', 'listar'),
(111, 1, 'persona_rol', 'agregar'),
(112, 1, 'persona_rol', 'modificar'),
(113, 1, 'persona_rol', 'eliminar'),
(114, 1, 'persona_rol', 'datos'),
(115, 1, 'reporte1', 'ver'),
(116, 1, 'reporte1', 'mostrar'),
(117, 1, 'reporte2', 'ver'),
(118, 1, 'reporte2', 'mostrar'),
(119, 1, 'reporte3', 'ver'),
(120, 1, 'reporte3', 'mostrar'),
(121, 1, 'reporte4', 'ver'),
(122, 1, 'reporte4', 'mostrar'),
(123, 1, 'reporte5', 'ver'),
(124, 1, 'reporte5', 'mostrar'),
(125, 1, 'reporte6', 'ver'),
(126, 1, 'reporte6', 'mostrar'),
(127, 1, 'reporte7', 'ver'),
(128, 1, 'reporte7', 'mostrar'),
(129, 1, 'reporte8', 'ver'),
(130, 1, 'reporte8', 'mostrar'),
(131, 1, 'reporte_estadistico', 'ver'),
(132, 1, 'reporte_estadistico', 'mostrar'),
(133, 1, 'reporte_estadistico1', 'ver'),
(134, 1, 'reporte_estadistico1', 'mostrar'),
(135, 1, 'reporte_estadistico2', 'ver'),
(136, 1, 'reporte_estadistico2', 'mostrar'),
(137, 1, 'reporte_estadistico3', 'ver'),
(138, 1, 'reporte_estadistico3', 'mostrar'),
(139, 1, 'libro', 'ver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL,
  `id_tipo_de_identificacion` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_municipio_expedicion` int(11) NOT NULL,
  `id_municipio_de_nacimiento` int(11) NOT NULL,
  `id_estado_civil` int(11) NOT NULL,
  `id_municipio_de_residencia` int(11) NOT NULL,
  `id_zona_residencia` int(11) NOT NULL,
  `num_Identificacion` varchar(15) CHARACTER SET utf8 NOT NULL,
  `fecha_expedicion` date NOT NULL,
  `primer_nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `correo_principal` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `correo_alternativo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_principal` int(11) NOT NULL,
  `telefono_alternativo` int(11) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `id_tipo_de_identificacion`, `id_sexo`, `id_municipio_expedicion`, `id_municipio_de_nacimiento`, `id_estado_civil`, `id_municipio_de_residencia`, `id_zona_residencia`, `num_Identificacion`, `fecha_expedicion`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `fecha_nacimiento`, `direccion`, `correo_principal`, `correo_alternativo`, `telefono_principal`, `telefono_alternativo`, `id_cargo`, `clave`) VALUES
(1, 2, 1, 12, 1, 2, 2, 2, '67890', '2019-05-15', 'Oscar', 'Mena', 'Copete', 'Sandoval', '2019-05-01', 'LAVICTORY', 'usuario2@mail.com', '2usuario@mail.com', 6716548, 7672342, 1, '67890'),
(5, 2, 1, 1, 1, 2, 1, 2, '1077464694', '2019-05-15', 'diego', 'zapata', 'mena', 'alex', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 3, ''),
(6, 2, 1, 7, 4, 4, 15, 1, '1087658777', '2019-05-16', 'luiz ', 'ramirez', 'Mobejarano', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 4, ''),
(9, 2, 1, 7, 4, 4, 15, 1, '1075432673', '2019-05-16', 'Ana', 'Yisley', 'Perea', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 2147483647, 8764532, 3, ''),
(11, 2, 1, 1, 0, 3, 2, 2, '10733297654', '2019-05-15', 'sandoval', 'piti', 'cacerz', 'copete', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 1, ''),
(12, 2, 1, 6, 1, 2, 1, 2, '1077463443', '2019-05-15', 'zulia', 'renteria', 'gonzales', 'sala', '2019-05-01', 'LAVICTORY', 'heylerty14@gmail.com', 'heylerti7@gmail.com', 6716548, 7672342, 2, ''),
(14, 2, 1, 6, 1, 2, 1, 2, '107642964', '2019-05-15', 'stiwar', 'copete', 'renteria', 'gonzalesx', '2019-05-01', 'LAVICTORY', 'heylerty14@gmail.com', 'heylerti7@gmail.com', 6716548, 7672342, 1, ''),
(15, 2, 1, 1, 0, 2, 2, 2, '10774646951', '2019-05-15', 'jose', 'valbu', 'mena', 'alex', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 2, ''),
(16, 2, 1, 1, 1, 2, 1, 2, '1077464064', '2019-05-15', 'fernando', 'gutierre', 'mena', 'mena', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 3, ''),
(18, 2, 1, 1, 1, 2, 1, 2, '1077566774', '2019-05-15', 'vilvi', 'renteria', 'mena', 'mena', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 3, ''),
(19, 2, 1, 1, 1, 2, 1, 2, '1077475343', '2019-05-15', 'margarito', 'mena', 'copete', 'sala', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 2, ''),
(23, 15, 1, 7, 4, 4, 15, 1, '10736252565', '2019-05-16', 'mariela', '', 'cordoba', 'chaverra', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 4, ''),
(24, 2, 1, 1, 1, 2, 1, 2, '10774640732', '2019-05-15', 'yessica', 'viviana', 'bejarano', 'ramires', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 3, ''),
(26, 2, 1, 7, 0, 4, 1, 1, '107663432290', '2019-05-16', 'cecilia', 'alexandra', 'Mosquera', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 3, 'hola'),
(27, 2, 1, 1, 1, 2, 1, 2, '1076548958', '2019-05-15', 'yobin', 'alex', 'copete', 'sala', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 1, ''),
(28, 2, 1, 7, 0, 4, 1, 1, '1077835432', '2019-05-16', 'Ramon', 'alicio', 'gonzales', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 3, ''),
(33, 2, 2, 7, 4, 4, 15, 1, '10736258521', '2019-05-16', 'nidia', 'liliana', 'venitez', 'bejarano', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 4, ''),
(34, 2, 2, 1, 1, 2, 1, 2, '1077553738', '2019-05-15', 'mariela', 'valbu', 'mosquera', 'mena', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 1, ''),
(35, 2, 1, 7, 4, 4, 15, 1, '1075432079', '2019-05-16', 'epifanio', 'sad', 'chaverra', 'bejarano', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 2, '1075432079'),
(37, 2, 2, 7, 4, 4, 15, 1, '10754326743', '2019-05-16', 'patricia', 'alexandra', 'chaverra', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 4, ''),
(39, 2, 2, 7, 4, 4, 15, 1, '108765538', '2019-05-16', 'yenifer', 'lina', 'chaverra', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 4, ''),
(40, 2, 2, 7, 4, 4, 15, 1, '1087658703', '2019-05-16', 'luiza', 'mosquera', 'gonzalez', 'Cordoba', '2019-05-09', 'lacaverna', 'idbdh@nuxhbx', 'snxhkjc@jixn', 543678, 8764532, 3, ''),
(42, 2, 1, 1, 1, 2, 1, 2, '1077463960', '2019-05-10', 'carlos', 'valbu', 'copete', 'sala', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 3, ''),
(44, 2, 1, 1, 1, 2, 1, 2, '1077475325', '2019-05-15', 'marizol', 'rio', 'copete', 'sala', '2019-05-01', 'LAVICTORY', 'fkfkkfk@nchc', 'heyler6ty@jdhdg', 6716548, 7672342, 4, ''),
(45, 2, 1, 10, 1, 1, 1, 1, '12345', '2019-11-13', 'Hamlet', 'Stiwar', 'Mendoza', 'Nandez', '2019-11-16', 'Crr 8 #20-45', 'hamletsito@hotmail.com', 'hamletsito@gmail.com', 2147483647, 2147483647, 3, '12345'),
(51, 4, 1, 364, 197, 1, 682, 2, '3214324', '2020-01-10', 'dsada', 'ghjk', 'hjk', 'ghjnm', '2020-01-17', 'dfghj', 'dfghbjn', 'fghjnkm', 312312, 32123, 1, ''),
(52, 3, 1, 492, 790, 1, 468, 2, '13213123', '2020-01-11', 'Kobe', 'dasd', 'Brayan', 'sad', '2020-01-03', 'calsad', 'arl@gmail.com', 'arl@gmail.com', 31231, 423432, 1, ''),
(57, 3, 4, 682, 197, 1, 492, 1, '123456', '2020-01-18', 'Misionero', 'asda', 'Vacan', 'asda', '2020-01-29', 'csajkada', 'casda', 'sdada', 3213, 432423, 6, ''),
(59, 15, 2, 680, 682, 3, 790, 8, '567888877', '2020-01-09', 'kljgybh', 'gbuyg', '456789', '45678', '2020-12-31', 'lknyugbu', 'niubguygb', 'uyvbvyuvbu', 778, 0, 6, ''),
(61, 7, 1, 682, 682, 2, 12, 9, '0987654321', '2020-12-31', 'klhgbuih', 'ihbuikhn', 'ihubiuhnijk', 'huihiu', '2020-12-31', 'lkiuigyvbuio', 'kjbiohugyvuhj', '456789876', 567890987, 56789098, 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_rol`
--

CREATE TABLE `persona_rol` (
  `id_persona_rol` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_rol`
--

INSERT INTO `persona_rol` (`id_persona_rol`, `id_persona`, `id_rol`) VALUES
(3, 45, 1),
(4, 35, 3),
(6, 9, 6),
(7, 19, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `id_provedore` int(11) NOT NULL,
  `referencia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `id_tipo_producto`, `modelo`, `stock`, `fecha_adquisicion`, `id_provedore`, `referencia`) VALUES
(3460, 'rescojedor ', 1, '455', 555, '2017-10-30', 1, '5455'),
(3461, 'cepillos', 2, '455', 555, '2017-10-30', 1, '5455'),
(3462, 'computador', 3, '2016', 4, '2019-07-12', 7, '74543356'),
(3463, 'sillla', 2, '2014', 4, '2019-07-24', 5, '0001111'),
(3464, 'escoba   ', 2, '2014', 3, '2019-07-18', 5, '011222'),
(3466, 'portatil', 3, '2014', 2, '2019-07-10', 5, '04444'),
(3468, 'tableros ', 4, 'AAAAA', 2, '2019-10-23', 8, '05555'),
(3469, 'lÃ¡piz ', 1, '2016', 3, '2019-07-19', 7, '05555'),
(3478, 'Sillas', 4, 'rimax', 5, '2019-10-12', 7, 'sdadsad'),
(3479, 'oscar', 2, '3123', 8, '2019-10-04', 7, '3213'),
(3480, 'Trapero', 2, '432', 4, '2019-12-12', 7, '32324'),
(3482, 'da', 5, '43', 456, '0000-00-00', 4, '45'),
(3492, 'aaaa', 4, 'svfsfv', 12, '0000-00-00', 1, 'e3e3'),
(3497, 'AA', 2, 'AAAAA', 1, '2020-12-30', 6, 'AAAA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(19) NOT NULL,
  `dir` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `telefono`, `dir`, `correo`) VALUES
(1, 'ASEO', '313698891', 'cll 22', 'arleiner@hotmail.com'),
(2, 'MEDA', '3747444', 'cll 34', 'dkjdis@gmail.com'),
(3, 'nombre', '12345', 'dir', 'correo@mail.com'),
(5, 'dasd', '3123', 'dasd', 'sdasda'),
(8, 'AFA', '3145678098', 'calle 25-50', 'afa@gmail.com'),
(9, 'Berskha', '3002048749', 'NiÃ±o jesus', 'berskha@gmail.com'),
(10, 'Valenzuela', '321485038', 'El caraÃ±o', 'valenzuela@hotmail.com'),
(11, 'Polo', '0348291029', 'Calle 30 #30-14', 'polo.polo@hotmail.com'),
(12, 'lljoihu', '90876689', 'jiniuhb', 'kjbbiubiu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre`) VALUES
(1, 'Grupo Gal'),
(2, 'VIDRIO GLASS S.A.C.'),
(3, 'RESID VIAL'),
(4, 'MELIA SA'),
(5, 'ZERIA LINE'),
(6, 'BIN ZAM'),
(7, 'PAPELERIA UNIVERSO'),
(8, 'RESI VAL'),
(11, 'ff');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'RECTOR'),
(3, 'DOCENTE'),
(4, 'ASEADORA'),
(5, 'USUARIO BASICO'),
(6, 'CONTADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `nombre` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `nombre`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO'),
(4, 'HOMOSEXUAL'),
(5, 'BISEXUAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identidad`
--

CREATE TABLE `tipo_identidad` (
  `id_tipo_identidad` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_identidad`
--

INSERT INTO `tipo_identidad` (`id_tipo_identidad`, `nombre`) VALUES
(1, 'TARJETA DE IDENTIDAD'),
(2, 'CEDULA DE CIUDADANIA'),
(3, 'CEDULA DE EXTRANJERIA'),
(4, 'NIT: NUMERO DE IDENTIFICACION TRIBUTARIA'),
(6, 'Cedula de la norte'),
(7, 'DNI'),
(8, 'Permiso para morir'),
(9, 'Pase de conducir'),
(10, 'Registro civil'),
(11, 'Nit'),
(13, 'Carnet de residencia'),
(14, 'MAMBA'),
(15, 'CARNET'),
(16, 'sisben'),
(17, 'Penitencia'),
(18, 'KLIHBIU'),
(19, 'MUNDO HOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipo_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_producto`, `nombre`) VALUES
(1, 'EQUIPOS TECNOLOGICOS'),
(2, 'ASEO'),
(3, 'TROFEO'),
(4, 'MOBLAJE'),
(5, 'ESCOLARES'),
(7, 'BELLEZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(300) NOT NULL,
  `last_name_user` varchar(300) NOT NULL,
  `mail_user` varchar(300) NOT NULL,
  `phone_user` int(11) NOT NULL,
  `pw_user` varchar(300) NOT NULL,
  `direccion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `last_name_user`, `mail_user`, `phone_user`, `pw_user`, `direccion`) VALUES
(8, 'yon', 'cacadsd', 'y@y.com', 424762061, '123456', 'calle 12 carrera 9-10'),
(11, 'Ner', 'ortiz', 'wew@gmail.com', 313698891, '123456789', '6-59'),
(12, 'dasda', 'sdsd', 'qwerty@gmail.com', 11345345, '123456789', '231we');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `Num_Identificacion` varchar(15) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Num_Identificacion`, `id_rol`) VALUES
(0, '10733297654', 1),
(1, '67890', 1),
(2, '108765538', 3),
(3, '1075432079', 3),
(4, '1075432673', 1),
(5, '1076548958', 3),
(6, '1077463443', 1),
(7, '1077463960', 1),
(8, '1077464064', 2),
(10, '1077475343', 3),
(11, '1077835432', 2),
(12, '107663432290', 2),
(13, '10736258521', 3),
(14, '10774640732', 1),
(15, '10736258521', 3),
(16, '1077475325', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_de_residencia`
--

CREATE TABLE `zona_de_residencia` (
  `id_zona_de_residencia` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `zona_de_residencia`
--

INSERT INTO `zona_de_residencia` (`id_zona_de_residencia`, `nombre`) VALUES
(1, 'URBANA'),
(2, 'RURAL'),
(4, 'MAMBA'),
(6, 'UNION PANAMERICANA'),
(7, 'BASEL'),
(8, 'EGIPTO'),
(9, 'ALEDAÃ‘OS'),
(10, 'CALLE'),
(11, 'ZOOLOGICO'),
(12, 'ZONA PORTUARIA'),
(13, 'VENECIA'),
(14, 'APA'),
(15, 'LEJANIAS '),
(16, 'LOCALIDAD '),
(17, 'RUSIA'),
(18, 'VALLE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `chance`
--
ALTER TABLE `chance`
  ADD PRIMARY KEY (`id_chance`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id_contenido`);

--
-- Indices de la tabla `datos_chance`
--
ALTER TABLE `datos_chance`
  ADD PRIMARY KEY (`id_datos_chance`),
  ADD KEY `id_chance` (`id_chance`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`id_devolucion`),
  ADD KEY `producto` (`id_producto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`id_entrega`),
  ADD KEY `producto` (`id_producto`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id_examen`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `producto` (`id_producto`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `modulo_accion`
--
ALTER TABLE `modulo_accion`
  ADD PRIMARY KEY (`id_modulo_accion`),
  ADD UNIQUE KEY `index2` (`modulo`,`accion`);

--
-- Indices de la tabla `movimientosaldo`
--
ALTER TABLE `movimientosaldo`
  ADD PRIMARY KEY (`id_msaldo`),
  ADD UNIQUE KEY `fecha_msaldo` (`fecha_msaldo`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento` (`departamento`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`id_permiso_rol`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`) USING BTREE,
  ADD UNIQUE KEY `index9` (`num_Identificacion`),
  ADD KEY `fk_tipo_de_identificacion_idx` (`id_tipo_de_identificacion`),
  ADD KEY `fk_id_sexo_idx` (`id_sexo`),
  ADD KEY `fk_id_municipio_expedicion_idx` (`id_municipio_expedicion`),
  ADD KEY `fk_municipio_de_nacimiento_idx` (`id_municipio_de_nacimiento`),
  ADD KEY `fk_municipio_de_residencia_idx` (`id_municipio_de_residencia`),
  ADD KEY `fk_estado_civil_idx` (`id_estado_civil`),
  ADD KEY `fk_zona_residencia_idx` (`id_zona_residencia`),
  ADD KEY `fk_cargo` (`id_cargo`);

--
-- Indices de la tabla `persona_rol`
--
ALTER TABLE `persona_rol`
  ADD PRIMARY KEY (`id_persona_rol`),
  ADD KEY `persona_rol_fk1_idx` (`id_rol`),
  ADD KEY `persona_rol_fk2_idx` (`id_persona`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `marca` (`id_tipo_producto`),
  ADD KEY `provedores` (`id_provedore`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipo_identidad`
--
ALTER TABLE `tipo_identidad`
  ADD PRIMARY KEY (`id_tipo_identidad`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `usuario_ibfk_1` (`id_rol`),
  ADD KEY `Num_Identificacion` (`Num_Identificacion`);

--
-- Indices de la tabla `zona_de_residencia`
--
ALTER TABLE `zona_de_residencia`
  ADD PRIMARY KEY (`id_zona_de_residencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `chance`
--
ALTER TABLE `chance`
  MODIFY `id_chance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id_contenido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `datos_chance`
--
ALTER TABLE `datos_chance`
  MODIFY `id_datos_chance` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id_examen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modulo_accion`
--
ALTER TABLE `modulo_accion`
  MODIFY `id_modulo_accion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `movimientosaldo`
--
ALTER TABLE `movimientosaldo`
  MODIFY `id_msaldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2015;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  MODIFY `id_permiso_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `persona_rol`
--
ALTER TABLE `persona_rol`
  MODIFY `id_persona_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3498;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_identidad`
--
ALTER TABLE `tipo_identidad`
  MODIFY `id_tipo_identidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `zona_de_residencia`
--
ALTER TABLE `zona_de_residencia`
  MODIFY `id_zona_de_residencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos_chance`
--
ALTER TABLE `datos_chance`
  ADD CONSTRAINT `datos_chance_ibfk_1` FOREIGN KEY (`id_chance`) REFERENCES `chance` (`id_chance`) ON UPDATE CASCADE,
  ADD CONSTRAINT `datos_chance_ibfk_2` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`id_devolucion`) REFERENCES `entrega` (`id_entrega`) ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
