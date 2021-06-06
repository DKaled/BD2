-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2021 a las 04:06:50
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

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

--
-- Volcado de datos para la tabla `administra`
--

INSERT INTO `administra` (`idAdministra`, `numNomina`, `codBarras`) VALUES
(7, 3, 4169820),
(8, 3, 4402026),
(9, 3, 9073831),
(10, 3, 3250453),
(11, 3, 8015407),
(12, 3, 8544131),
(13, 4, 4169820),
(14, 4, 4402026),
(15, 4, 9073831),
(16, 4, 7119324),
(17, 4, 9321840),
(18, 4, 9935274),
(19, 5, 2142141),
(20, 5, 8703132),
(21, 5, 9648700),
(22, 5, 7119324),
(23, 5, 9321840),
(24, 5, 9935274),
(25, 6, 2951705),
(26, 6, 4756482),
(27, 6, 7831534),
(28, 6, 4320348),
(29, 6, 5062562),
(30, 6, 6979552),
(31, 7, 2951705),
(32, 7, 4756482),
(33, 7, 7831534),
(34, 7, 2114443),
(35, 7, 8370447),
(36, 7, 9574172),
(37, 7, 2534265),
(38, 7, 3145314),
(39, 7, 8846873),
(40, 8, 3055420),
(41, 8, 5152570),
(42, 8, 5960129),
(43, 9, 2951705),
(44, 9, 4756482),
(45, 9, 7831534),
(46, 9, 3055420),
(47, 9, 5152570),
(48, 9, 5960129);

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `nombre`) VALUES
(1, 'directivo'),
(2, 'encargado'),
(3, 'cajero');

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

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`numNomina`, `nombre`, `apeP`, `apeM`, `sexo`, `fechaContratacion`, `idCargo`, `idUsuario`) VALUES
(1, 'Eduardo', 'Coronado', 'Meza', 'M', '2021-05-31', 1, 1),
(2, 'Paola Itzel', 'Lopez', 'Ramirez', 'F', '2021-05-31', 1, 2),
(3, 'Cesar Alejandro', 'Prieto', 'Franco', 'M', '2021-06-01', 2, 3),
(4, 'Derek Kaled', 'Barajas', 'Cuevas', 'M', '2021-06-01', 2, 4),
(5, 'David Gamaliel', 'Mares', 'Marquez', 'M', '2021-06-02', 2, 5),
(6, 'Gael Alejandro', 'Mares', 'Marquez', 'M', '2021-06-02', 2, 6),
(7, 'Fernanda Marlene', 'Gomez', 'Alvarez', 'F', '2021-06-02', 2, 7),
(8, 'Paulina', 'Ceja', 'Sanchez', 'F', '2021-06-02', 2, 8),
(9, 'Carlos Humberto', 'Gomez', 'Barrera', 'M', '2021-06-03', 2, 9),
(10, 'Adrian Arturo', 'Garcia', 'Lopez', 'M', '2021-06-03', 2, 10),
(11, 'David Alejandro', 'Lopez', 'Torres', 'M', '2021-06-03', 2, 11),
(12, 'Santiago', 'Monge', 'Bernat', 'M', '2021-06-04', 3, 12),
(13, 'Consuelo', 'Hermoso', 'Montesdeoca', 'F', '2021-06-04', 3, 13),
(14, 'Elena', 'Castells', 'Perea', 'F', '2021-06-04', 3, 14),
(15, 'Jorge', 'Sanchis', 'Corbacho', 'M', '2021-06-04', 3, 15),
(16, 'Maria Nieves', 'Caparros', 'Berbel', 'F', '2021-06-04', 3, 16);

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codBarras`, `nombre`, `precio`, `cantidad`, `idDepartamento`) VALUES
(2114443, 'Cómoda blanca', 5707, 6, 1),
(2142141, 'Plátano orgánico por kilo', 22, 42, 2),
(2534265, 'Friinder Bonito estuche telescópico', 199, 20, 7),
(2951705, 'Chaqueta casual para hombre', 949, 20, 9),
(3055420, 'bolsas de cultivo de 7 galones', 484.03, 62, 8),
(3145314, 'Kit Porta Notas Adhesivas', 229.99, 30, 7),
(3250453, 'Uno Cartas', 71.2, 10, 5),
(4169820, 'Audífonos Sennheiser para TV 195', 8999, 5, 3),
(4320348, ' Juego de sabanas de Microfibra', 788.03, 4, 4),
(4402026, 'K270 - Teclado Inalámbrico logitech', 423.9, 6, 3),
(4756482, '6 pares de calcetines de atletismo', 390.76, 28, 9),
(5062562, 'Juego de 6 Vasos de Vidrio Soplado', 310, 5, 4),
(5152570, 'Macetas colgantes para plantas de interior', 686.47, 12, 8),
(5960129, 'Umbra Trigg Hanging Planter', 419.99, 4, 8),
(6979552, 'CoWalkers Sujetadores de sábana', 279, 30, 4),
(7119324, 'HEAD Speed Junior Tennis Racquet', 602.57, 10, 6),
(7831534, 'Chaqueta impermeable para Mujer', 1355.98, 16, 9),
(8015407, 'Catan base Juego de Estrategia', 749, 30, 5),
(8370447, 'Sillón amarillo', 4048, 25, 1),
(8544131, 'Hasbro Gaming Risk', 797.85, 30, 5),
(8703132, 'Fresa Driscoll 454g', 69, 15, 2),
(8846873, 'Copic Markers Multiliner Sepia', 406, 25, 7),
(9073831, 'EVGA Fuente de Poder 500 W', 1080, 12, 3),
(9321840, 'DQST Mochila Impermeable', 659, 5, 6),
(9574172, 'Set de 4 sillas blancas', 2199, 15, 1),
(9648700, 'Toronja orgánica 1.2 kilos', 56, 23, 2),
(9935274, 'Voit V5 Bola de Voleibol', 257.63, 35, 6);

--
-- Volcado de datos para la tabla `supervisa`
--

INSERT INTO `supervisa` (`idSupervisa`, `numNomina`, `idDepartamento`) VALUES
(1, 1, 11),
(2, 2, 11),
(3, 3, 3),
(4, 3, 5),
(5, 4, 3),
(6, 4, 6),
(7, 5, 2),
(8, 5, 6),
(9, 6, 9),
(10, 6, 4),
(11, 7, 9),
(12, 7, 1),
(13, 7, 7),
(14, 8, 8),
(15, 9, 9),
(16, 9, 8),
(17, 12, 10),
(18, 13, 10),
(19, 14, 10),
(20, 15, 10),
(21, 16, 10);

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idTipoUsuario`, `tipo`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'basic');

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `username`, `contrasenna`, `idTipoUsuario`) VALUES
(1, 'eduardo', '8d9b2d4e61a903b1b6216bd3d0df6fc2', 1),
(2, 'paola', '286f6ff9be8cca78598a17b402839909', 1),
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
