-- MariaDB dump 10.19  Distrib 10.4.19-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: minisuper
-- ------------------------------------------------------
-- Server version	10.4.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administra`
--

DROP TABLE IF EXISTS `administra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administra` (
  `idAdministra` int(11) NOT NULL AUTO_INCREMENT,
  `numNomina` int(11) NOT NULL,
  `codBarras` int(11) NOT NULL,
  PRIMARY KEY (`idAdministra`),
  KEY `codBarras` (`codBarras`),
  KEY `numNomina` (`numNomina`),
  CONSTRAINT `administra_ibfk_1` FOREIGN KEY (`codBarras`) REFERENCES `producto` (`codBarras`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `administra_ibfk_2` FOREIGN KEY (`numNomina`) REFERENCES `empleado` (`numNomina`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administra`
--

LOCK TABLES `administra` WRITE;
/*!40000 ALTER TABLE `administra` DISABLE KEYS */;
/*!40000 ALTER TABLE `administra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'directivo'),(2,'encargado'),(3,'cajero');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Muebles'),(2,'Frutas y Verduras'),(3,'Electronica'),(4,'Hogar'),(5,'Jugueteria'),(6,'Deportes'),(7,'Papeleria'),(8,'Jardineria'),(9,'Ropa'),(10,'Cajas'),(11,'Direccion');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `numNomina` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apeP` varchar(30) NOT NULL,
  `apeM` varchar(30) NOT NULL,
  `sexo` char(1) NOT NULL,
  `fechaContratacion` date NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`numNomina`),
  KEY `idUsuario` (`idUsuario`),
  KEY `idCargo` (`idCargo`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Derek Kaled','Barajas','Cuevas','M','2021-05-31',1,1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `codBarras` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`codBarras`),
  KEY `idDepartamento` (`idDepartamento`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1234,'Prueba',18300041,18,3),(4321,'Arduino',500,2,3);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisa`
--

DROP TABLE IF EXISTS `supervisa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisa` (
  `idSupervisa` int(11) NOT NULL AUTO_INCREMENT,
  `numNomina` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  PRIMARY KEY (`idSupervisa`),
  KEY `idDepartamento` (`idDepartamento`),
  KEY `numNomina` (`numNomina`),
  CONSTRAINT `supervisa_ibfk_1` FOREIGN KEY (`numNomina`) REFERENCES `empleado` (`numNomina`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `supervisa_ibfk_2` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisa`
--

LOCK TABLES `supervisa` WRITE;
/*!40000 ALTER TABLE `supervisa` DISABLE KEYS */;
/*!40000 ALTER TABLE `supervisa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` tinyint(4) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'admin'),(2,'user'),(3,'basic');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `contrasenna` varchar(250) NOT NULL,
  `idTipoUsuario` tinyint(4) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `idTipoUsuario` (`idTipoUsuario`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'derek','8d9b2d4e61a903b1b6216bd3d0df6fc2',1),(2,'cesar','286f6ff9be8cca78598a17b402839909',1),(3,'encargado1','5351f27d2fc2f926ce33fc025ab51488',2),(4,'encargado2','925042dd70fc8a82839e9f8b021f3dd3',2),(5,'encargado3','3302c8d989262ba49fae5713c263196b',2),(6,'encargado4','e0c92031f6147fa8826e66c0f1af38b8',2),(7,'encargado5','b3754860cfa937e7f00a30d47dce6e05',2),(8,'encargado6','72417cc5c730c43e4192418fbdbd514e',2),(9,'encargado7','2cc1db2012cfadee053618360bfa7027',2),(10,'encargado8','d9e0bdb2c2d23d93eb19b66a5c845170',2),(11,'encargado9','438c4401c5f58f89088aa097a0d155f9',2),(12,'cajero1','47cb309b82aa9284dc58e7833a2b80f9',3),(13,'cajero2','4f7b7501cc286e94169f0c3c712711fd',3),(14,'cajero3','d77c670a50acee452397373ac6f40f8d',3),(15,'cajero4','624e8ea3bbf53b459c49bba9fa4eaa1d',3),(16,'cajero5','29cd23dccc6a9199e959eb891b14634b',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `v_empleado`
--

DROP TABLE IF EXISTS `v_empleado`;
/*!50001 DROP VIEW IF EXISTS `v_empleado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_empleado` (
  `numNomina` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `apeP` tinyint NOT NULL,
  `apeM` tinyint NOT NULL,
  `sexo` tinyint NOT NULL,
  `fechaContratacion` tinyint NOT NULL,
  `idCargo` tinyint NOT NULL,
  `idUser` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_producto`
--

DROP TABLE IF EXISTS `v_producto`;
/*!50001 DROP VIEW IF EXISTS `v_producto`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_producto` (
  `codBarras` tinyint NOT NULL,
  `nombre` tinyint NOT NULL,
  `precio` tinyint NOT NULL,
  `cantidad` tinyint NOT NULL,
  `idDepartamento` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `v_usuario`
--

DROP TABLE IF EXISTS `v_usuario`;
/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `v_usuario` (
  `idUsuario` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `contrasenna` tinyint NOT NULL,
  `idTipoUsuario` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_empleado`
--

/*!50001 DROP TABLE IF EXISTS `v_empleado`*/;
/*!50001 DROP VIEW IF EXISTS `v_empleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_empleado` AS select `empleado`.`numNomina` AS `numNomina`,`empleado`.`nombre` AS `nombre`,`empleado`.`apeP` AS `apeP`,`empleado`.`apeM` AS `apeM`,`empleado`.`sexo` AS `sexo`,`empleado`.`fechaContratacion` AS `fechaContratacion`,`cargo`.`nombre` AS `idCargo`,(select `tipousuario`.`tipo` AS `idUser` from (`usuario` join `tipousuario` on(`usuario`.`idUsuario` = `tipousuario`.`idTipoUsuario`)) where `empleado`.`idUsuario` = `usuario`.`idUsuario`) AS `idUser` from (`empleado` join `cargo` on(`empleado`.`numNomina` = `cargo`.`idCargo`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_producto`
--

/*!50001 DROP TABLE IF EXISTS `v_producto`*/;
/*!50001 DROP VIEW IF EXISTS `v_producto`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_producto` AS select `producto`.`codBarras` AS `codBarras`,`producto`.`nombre` AS `nombre`,`producto`.`precio` AS `precio`,`producto`.`cantidad` AS `cantidad`,`departamento`.`nombre` AS `idDepartamento` from (`producto` join `departamento` on(`producto`.`idDepartamento` = `departamento`.`idDepartamento`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `v_usuario`
--

/*!50001 DROP TABLE IF EXISTS `v_usuario`*/;
/*!50001 DROP VIEW IF EXISTS `v_usuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_usuario` AS select `usuario`.`idUsuario` AS `idUsuario`,`usuario`.`username` AS `username`,`usuario`.`contrasenna` AS `contrasenna`,`tipousuario`.`tipo` AS `idTipoUsuario` from (`usuario` join `tipousuario` on(`usuario`.`idTipoUsuario` = `tipousuario`.`idTipoUsuario`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-07  3:55:01
