-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2021 a las 20:09:29
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `_pruebabd2`
--
CREATE DATABASE IF NOT EXISTS `_pruebabd2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `_pruebabd2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administra`
--
-- Creación: 31-05-2021 a las 18:05:42
--

DROP TABLE IF EXISTS `administra`;
CREATE TABLE `administra` (
  `idAdministra` int(11) NOT NULL,
  `numNomina` int(11) NOT NULL,
  `codBarras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--
-- Creación: 31-05-2021 a las 17:37:59
-- Última actualización: 31-05-2021 a las 17:38:21
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombre`) VALUES
(1, 'directivo'),
(2, 'encargado'),
(3, 'cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--
-- Creación: 31-05-2021 a las 17:31:43
-- Última actualización: 31-05-2021 a las 17:33:58
--

DROP TABLE IF EXISTS `departamento`;
CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`) VALUES
(1, 'Muebles'),
(2, 'Frutas y Verduras'),
(3, 'Electronica'),
(4, 'Hogar'),
(5, 'Jugueteria'),
(6, 'Deportes'),
(7, 'Papeleria'),
(8, 'Jardineria'),
(9, 'Ropa'),
(10, 'Cajas'),
(11, 'Direccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--
-- Creación: 31-05-2021 a las 18:05:26
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `numNomina` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apeP` varchar(30) NOT NULL,
  `apeM` varchar(30) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fechaContratacion` date NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numNomina`, `nombre`, `apeP`, `apeM`, `sexo`, `fechaContratacion`, `idCargo`, `idUsuario`) VALUES
(1, 'Derek Kaled', 'Barajas', 'Cuevas', 'M', '2021-05-31', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--
-- Creación: 31-05-2021 a las 17:50:02
-- Última actualización: 31-05-2021 a las 18:07:32
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `codBarras` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codBarras`, `nombre`, `precio`, `cantidad`, `idDepartamento`) VALUES
(1234, 'Prueba', 18300041, 18, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisa`
--
-- Creación: 31-05-2021 a las 18:05:08
--

DROP TABLE IF EXISTS `supervisa`;
CREATE TABLE `supervisa` (
  `idSupervisa` int(11) NOT NULL,
  `numNomina` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--
-- Creación: 31-05-2021 a las 14:52:38
-- Última actualización: 31-05-2021 a las 14:38:54
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` tinyint(4) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `tipo`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'basic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 31-05-2021 a las 17:44:38
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contrasenna` varchar(250) NOT NULL,
  `idTipoUsuario` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `username`, `contrasenna`, `idTipoUsuario`) VALUES
(1, 'derek', '8d9b2d4e61a903b1b6216bd3d0df6fc2', 1),
(2, 'cesar', '286f6ff9be8cca78598a17b402839909', 1),
(3, 'encargado1', '5351f27d2fc2f926ce33fc025ab51488', 2),
(4, 'encargado2', '925042dd70fc8a82839e9f8b021f3dd3', 2),
(5, 'encargado3', '3302c8d989262ba49fae5713c263196b', 2),
(6, 'encargado4', 'e0c92031f6147fa8826e66c0f1af38b8', 2),
(7, 'encargado5', 'b3754860cfa937e7f00a30d47dce6e05', 2),
(8, 'encargado6', '72417cc5c730c43e4192418fbdbd514e', 2),
(9, 'encargado7', '2cc1db2012cfadee053618360bfa7027', 2),
(10, 'encargado8', 'd9e0bdb2c2d23d93eb19b66a5c845170', 2),
(11, 'encargado9', '438c4401c5f58f89088aa097a0d155f9', 2),
(12, 'cajero1', '47cb309b82aa9284dc58e7833a2b80f9', 3),
(13, 'cajero2', '4f7b7501cc286e94169f0c3c712711fd', 3),
(14, 'cajero3', 'd77c670a50acee452397373ac6f40f8d', 3),
(15, 'cajero4', '624e8ea3bbf53b459c49bba9fa4eaa1d', 3),
(16, 'cajero5', '29cd23dccc6a9199e959eb891b14634b', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administra`
--
ALTER TABLE `administra`
  ADD PRIMARY KEY (`idAdministra`),
  ADD KEY `codBarras` (`codBarras`),
  ADD KEY `numNomina` (`numNomina`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`numNomina`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCargo` (`idCargo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codBarras`),
  ADD KEY `idDepartamento` (`idDepartamento`);

--
-- Indices de la tabla `supervisa`
--
ALTER TABLE `supervisa`
  ADD PRIMARY KEY (`idSupervisa`),
  ADD KEY `idDepartamento` (`idDepartamento`),
  ADD KEY `numNomina` (`numNomina`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idTipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administra`
--
ALTER TABLE `administra`
  MODIFY `idAdministra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `supervisa`
--
ALTER TABLE `supervisa`
  MODIFY `idSupervisa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idTipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administra`
--
ALTER TABLE `administra`
  ADD CONSTRAINT `administra_ibfk_1` FOREIGN KEY (`codBarras`) REFERENCES `producto` (`codBarras`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administra_ibfk_2` FOREIGN KEY (`numNomina`) REFERENCES `empleado` (`numNomina`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `supervisa`
--
ALTER TABLE `supervisa`
  ADD CONSTRAINT `supervisa_ibfk_1` FOREIGN KEY (`numNomina`) REFERENCES `empleado` (`numNomina`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisa_ibfk_2` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
