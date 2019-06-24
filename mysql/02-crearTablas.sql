-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2019 a las 15:20:48
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `startondb`
--
CREATE DATABASE IF NOT EXISTS `startondb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `startondb`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `NombreEvento` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Contenido` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crea_evento`
--

CREATE TABLE `crea_evento` (
  `ID_Empresa` int(11) NOT NULL,
  `Nombre_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `ID_Empresa` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Sector` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Oficio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Fase` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Img_Empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cartaPresentacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ofrecemos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `buscamos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `numLikes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Img_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interaccion_emp_us`
--

CREATE TABLE `interaccion_emp_us` (
  `ID_Empresa` int(11) NOT NULL,
  `ID_Usuario` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_evento`
--

CREATE TABLE `tema_evento` (
  `Nombre_Evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Tema` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_apunta_evento`
--

CREATE TABLE `user_apunta_evento` (
  `ID_Usuario` int(11) NOT NULL,
  `Event_Name` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `Email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Localizacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Experiencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Pasiones` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `CartaPresentacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Img_Perfil` varchar(255) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Imagen',
  `Oficio` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Curriculum` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`NombreEvento`,`ID_Usuario`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `crea_evento`
--
ALTER TABLE `crea_evento`
  ADD PRIMARY KEY (`ID_Empresa`,`Nombre_Evento`),
  ADD KEY `Nombre_Evento` (`Nombre_Evento`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`ID_Empresa`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `interaccion_emp_us`
--
ALTER TABLE `interaccion_emp_us`
  ADD PRIMARY KEY (`ID_Empresa`,`ID_Usuario`),
  ADD KEY `ID_Usuario` (`ID_Usuario`);

--
-- Indices de la tabla `tema_evento`
--
ALTER TABLE `tema_evento`
  ADD PRIMARY KEY (`Nombre_Evento`,`Tema`);

--
-- Indices de la tabla `user_apunta_evento`
--
ALTER TABLE `user_apunta_evento`
  ADD PRIMARY KEY (`ID_Usuario`,`Event_Name`),
  ADD KEY `Event_Name` (`Event_Name`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD UNIQUE KEY `email` (`Email`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `crea_evento`
--
ALTER TABLE `crea_evento`
  ADD CONSTRAINT `crea_evento_ibfk_1` FOREIGN KEY (`Nombre_Evento`) REFERENCES `evento` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crea_evento_ibfk_2` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresa` (`ID_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `interaccion_emp_us`
--
ALTER TABLE `interaccion_emp_us`
  ADD CONSTRAINT `interaccion_emp_us_ibfk_1` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresa` (`ID_Empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interaccion_emp_us_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema_evento`
--
ALTER TABLE `tema_evento`
  ADD CONSTRAINT `tema_evento_ibfk_1` FOREIGN KEY (`Nombre_Evento`) REFERENCES `evento` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_apunta_evento`
--
ALTER TABLE `user_apunta_evento`
  ADD CONSTRAINT `user_apunta_evento_ibfk_1` FOREIGN KEY (`Event_Name`) REFERENCES `evento` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_apunta_evento_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `usuario` (`ID_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
