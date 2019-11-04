-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2016 a las 21:16:28
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `uedrjosemanuelsisomartinez`
--

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `uedrjosemanuelsisomartinez`;
USE `uedrjosemanuelsisomartinez`;
-- Estructura de tabla para la tabla `anio`
--

CREATE TABLE IF NOT EXISTS `anio` (
  `id_anio` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_anio` int(11) NOT NULL,
  `nombre_anio` varchar(50) NOT NULL,
  `status_anio` varchar(20) NOT NULL,
  PRIMARY KEY (`id_anio`),
  UNIQUE KEY `codigo_anio` (`codigo_anio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `anio`
--

INSERT INTO `anio` (`id_anio`, `codigo_anio`, `nombre_anio`, `status_anio`) VALUES
(1, 1, 'Primer AÃ±o', 'Activo'),
(2, 2, 'Segundo AÃ±o', 'Activo'),
(3, 3, 'Tercer AÃ±o', 'Activo'),
(4, 41, 'Cuarto AÃ±o - Primero de Ciencias', 'Activo'),
(5, 42, 'Cuarto AÃ±o - Primero de Humanidades', 'Activo'),
(6, 51, 'Quinto AÃ±o - Segundo de Ciencias', 'Activo'),
(7, 52, 'Quinto AÃ±o - Segundo de Humanidades', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_docente`
--

CREATE TABLE IF NOT EXISTS `asignacion_docente` (
  `id_asignaciondocente` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id_asignaciondocente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `asignacion_docente`
--

INSERT INTO `asignacion_docente` (`id_asignaciondocente`, `id_periodo`, `id_anio`, `id_seccion`, `id_materia`, `id_docente`) VALUES
(1, 1, 1, 1, 1, 2),
(2, 1, 1, 1, 2, 1),
(3, 2, 2, 1, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `id_docente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre1` varchar(50) NOT NULL,
  `nombre2` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `telefono_habitacion` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_docente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `cedula`, `sexo`, `fecha_nacimiento`, `nacionalidad`, `celular`, `telefono_habitacion`, `correo`, `direccion`, `ruta`, `status`, `id_usuario`) VALUES
(1, 'Jose', 'Manuel', 'Perez', 'Mendez', '22350274', 'Masculino', '1968-03-02', 'Venezolano(a)', '02125462465', '04245672865', 'jose@gmail.com', 'Los Teques', 'img/Fotos de Docentes/122350274conocimiento3.png', 1, NULL),
(2, 'Jhon', 'Carlos', 'Ramirez', 'Velazquez', '12765432', 'Masculino', '1960-03-02', 'Venezolano(a)', '04127893653', '02123235628', 'jhoncarlos@hotmail.com', 'Los Teques', 'img/Fotos de Docentes/fayol.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id_estudiante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre1` varchar(50) NOT NULL,
  `nombre2` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `telefono_habitacion` varchar(20) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `id_inscripcion` int(11) NOT NULL,
  `plantel_procedencia` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `id_representante` int(11) NOT NULL,
  PRIMARY KEY (`id_estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `cedula`, `sexo`, `fecha_nacimiento`, `nacionalidad`, `celular`, `telefono_habitacion`, `correo`, `direccion`, `ruta`, `id_inscripcion`, `plantel_procedencia`, `status`, `id_representante`) VALUES
(1, 'Franklin', 'JosÃ©', 'Rivera', 'Almenar', '21468408', 'Masculino', '2002-08-07', 'Venezolano(a)', '04123907858', '02123831385', 'franklinjose07@hotmail.com', 'Los Teques', 'img/Fotos de Estudiantes/firma.jpg', 10, 'U E Victor Padilla', 1, 1),
(2, 'Angelys', 'Marianny', 'Rivera', 'Almenar', '27669823', 'Femenino', '2002-09-27', 'Venezolano(a)', '04127367147', '02123831385', 'angelysmarianny08@hotmail.com', 'Los Teques', 'img/Fotos de Estudiantes/images.jpg', 0, 'U E Victor Padilla', 0, 1),
(5, 'Douglimar', '', 'Rivera', '', '12345678', 'Femenino', '2000-03-02', 'Venezolano(a)', '04162396489', '02123831385', 'dougli@hotmail.com', 'Los Teques', 'img/Fotos de Estudiantes/IMG_20160529_065707_edit.jpg', 12, 'Victor Padilla', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

CREATE TABLE IF NOT EXISTS `historia` (
  `id_historia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`id_historia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `historia`
--

INSERT INTO `historia` (`id_historia`, `fecha`, `hora`, `id_periodo`, `id_anio`, `id_seccion`, `id_materia`, `id_docente`, `descripcion`, `id_estudiante`) VALUES
(1, '2016-06-15', '03:55:29', 1, 1, 1, 1, 1, 'Buen Trabajo en Clases. El Estudiante entregÃ³ la tarea en la hora estimada.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`id_inscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id_inscripcion`, `id_periodo`, `id_anio`, `id_seccion`, `id_estudiante`) VALUES
(1, 1, 1, 1, 1),
(10, 2, 2, 1, 1),
(12, 2, 4, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `cod_materia` varchar(100) NOT NULL,
  `nombre_materia` varchar(300) NOT NULL,
  `nota_minima` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `status_materia` int(11) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `cod_materia`, `nombre_materia`, `nota_minima`, `id_anio`, `status_materia`) VALUES
(1, 'Mat1', 'MatemÃ¡tica', 10, 1, 0),
(2, 'Cast', 'Castellano', 10, 1, 0),
(3, 'Ing', 'InglÃ©s', 10, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nota` float NOT NULL,
  `fecha_carga` date NOT NULL,
  `id_plan` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_usuariores` int(11) NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcar la base de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `nota`, `fecha_carga`, `id_plan`, `id_estudiante`, `id_usuariores`) VALUES
(1, 10, '2016-06-25', 3, 1, 1),
(2, 18, '2016-06-23', 10, 1, 1),
(3, 18, '2016-06-25', 9, 1, 1),
(4, 20, '2016-06-25', 11, 1, 1),
(5, 20, '2016-06-25', 12, 1, 1),
(6, 20, '2016-06-26', 13, 1, 1),
(7, 20, '2016-06-26', 14, 1, 1),
(8, 15, '2016-06-26', 15, 1, 1),
(9, 20, '2016-06-26', 16, 1, 1),
(10, 20, '2016-06-26', 17, 1, 1),
(11, 20, '2016-06-26', 18, 1, 1),
(12, 20, '2016-06-26', 21, 1, 1),
(13, 20, '2016-06-26', 22, 1, 1),
(14, 10, '2016-06-26', 23, 1, 1),
(15, 10, '2016-06-26', 24, 1, 1),
(16, 19, '2016-06-26', 25, 1, 1),
(17, 20, '2016-06-26', 28, 1, 1),
(18, 20, '2016-06-26', 29, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `noticias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_periodo` varchar(30) NOT NULL,
  `fecha_comienzo` date NOT NULL,
  `fecha_final` date NOT NULL,
  `status_periodo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `nombre_periodo`, `fecha_comienzo`, `fecha_final`, `status_periodo`) VALUES
(1, '2016-2017', '2016-06-26', '2017-06-26', 'Inactivo'),
(2, '2017-2018', '2017-06-26', '2018-06-26', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_evaluacion`
--

CREATE TABLE IF NOT EXISTS `plan_evaluacion` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `numero_evaluacion` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `escala` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_anio` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_lapso` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcar la base de datos para la tabla `plan_evaluacion`
--

INSERT INTO `plan_evaluacion` (`id_plan`, `numero_evaluacion`, `descripcion`, `escala`, `peso`, `id_periodo`, `id_anio`, `id_seccion`, `id_materia`, `id_lapso`, `id_docente`) VALUES
(3, 1, 'Prueba de Matrices', 20, 1, 1, 1, 1, 1, 1, 1),
(9, 2, 'Taller', 20, 4, 1, 1, 1, 1, 1, 1),
(10, 3, 'ExposiciÃ³n', 20, 6, 1, 1, 1, 1, 1, 1),
(21, 1, 'Prueba', 20, 15, 1, 1, 1, 2, 1, 1),
(22, 1, 'Prueba de Matrices', 20, 15, 1, 1, 1, 1, 2, 2),
(23, 1, 'Conversatorio', 20, 10, 1, 1, 1, 1, 3, 2),
(24, 1, 'Taller', 20, 10, 1, 1, 1, 2, 2, 1),
(28, 1, 'Prueba', 20, 8, 1, 1, 1, 2, 3, 1),
(29, 2, 'ParticipaciÃ³n', 20, 2, 1, 1, 1, 2, 3, 1),
(30, 1, 'Prueba', 20, 5, 2, 2, 1, 3, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE IF NOT EXISTS `representante` (
  `id_representante` int(11) NOT NULL AUTO_INCREMENT,
  `nombre1_representante` varchar(50) NOT NULL,
  `nombre2_representante` varchar(50) DEFAULT NULL,
  `apellido1_representante` varchar(50) NOT NULL,
  `apellido2_representante` varchar(50) DEFAULT NULL,
  `cedula_representante` varchar(20) NOT NULL,
  `sexo_representante` varchar(20) NOT NULL,
  `fechan_representante` date NOT NULL,
  `nacionalidad_representante` varchar(50) NOT NULL,
  `telefono_representante` varchar(20) NOT NULL,
  `correo_representante` varchar(50) NOT NULL,
  `direccion_representante` varchar(100) NOT NULL,
  `ruta_representante` varchar(200) NOT NULL,
  PRIMARY KEY (`id_representante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_representante`, `nombre1_representante`, `nombre2_representante`, `apellido1_representante`, `apellido2_representante`, `cedula_representante`, `sexo_representante`, `fechan_representante`, `nacionalidad_representante`, `telefono_representante`, `correo_representante`, `direccion_representante`, `ruta_representante`) VALUES
(1, 'JosÃ©', 'Gregorio', 'Rivera', 'Martinez', '12879923', 'Masculino', '1969-12-02', 'Venezolano(a)', '04162396489', 'moreno@gmail.com', 'Los Teques', 'img/Fotos de Representantes/JAMES MOONEY.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `cod_seccion` varchar(11) NOT NULL,
  `nombre_seccion` varchar(30) NOT NULL,
  `status_seccion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_seccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `cod_seccion`, `nombre_seccion`, `status_seccion`) VALUES
(1, 'A', 'SecciÃ³n A', 'Activo'),
(2, 'B', 'SecciÃ³n B', 'Activo'),
(3, 'C', 'SecciÃ³n C', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `status_solicitud` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `hora_solicitud` time NOT NULL,
  `anio` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `status_solicitud`, `fecha_solicitud`, `hora_solicitud`, `anio`, `id_estudiante`) VALUES
(5, 1, '2016-07-08', '08:33:53', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(50) NOT NULL,
  `clave_usuario` varchar(50) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `pregunta_seguridad` varchar(300) NOT NULL,
  `respuesta_seguridad` varchar(300) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `clave_usuario`, `tipo_usuario`, `status`, `estado`, `pregunta_seguridad`, `respuesta_seguridad`) VALUES
(1, 'drjosemanuelsm@gmail.com', '12345678', 'SuperUser', 1, 0, 'UE', 'DRJMSM'),
(2, 'jose@gmail.com', '12345678', 'Docente', 1, 1, 'Nombre de mi MamÃ¡', 'Maria'),
(3, 'jhoncarlos@hotmail.com', '12345678', 'Docente', 1, 0, 'Mama', 'Johana');
