-- MySQL dump 10.13  Distrib 8.0.16, for Linux (x86_64)
--
-- Host: localhost    Database: redes3proj
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Dispositivo`
--

DROP TABLE IF EXISTS `Dispositivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Dispositivo` (
  `idDispositivo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) NOT NULL,
  `sistemaOperativo` varchar(45) NOT NULL,
  `numeroSerie` varchar(45) NOT NULL,
  `fabricante` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Dispositivo`
--

LOCK TABLES `Dispositivo` WRITE;
/*!40000 ALTER TABLE `Dispositivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `Dispositivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Interfaz`
--

DROP TABLE IF EXISTS `Interfaz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Interfaz` (
  `idInterfaz` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(4) NOT NULL,
  `nombre` varchar(45) NOT NULL DEFAULT '0',
  `tipo` varchar(20) NOT NULL,
  `macAddr` varchar(19) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Dispositivo_idDispositivo` int(11) NOT NULL,
  PRIMARY KEY (`idInterfaz`,`Dispositivo_idDispositivo`),
  KEY `fk_Interfaz_Dispositivo_idx` (`Dispositivo_idDispositivo`),
  CONSTRAINT `fk_Interfaz_Dispositivo` FOREIGN KEY (`Dispositivo_idDispositivo`) REFERENCES `Dispositivo` (`idDispositivo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Interfaz`
--

LOCK TABLES `Interfaz` WRITE;
/*!40000 ALTER TABLE `Interfaz` DISABLE KEYS */;
/*!40000 ALTER TABLE `Interfaz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Inventario`
--

DROP TABLE IF EXISTS `Inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Inventario` (
  `idinventario` int(11) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(25) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL,
  `pid` varchar(30) DEFAULT NULL,
  `vid` varchar(30) DEFAULT NULL,
  `ns` varchar(30) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Dispositivo_idDispositivo` int(11) NOT NULL,
  PRIMARY KEY (`idinventario`),
  KEY `fk_inventario_Dispositivo_idx` (`Dispositivo_idDispositivo`),
  CONSTRAINT `fk_inventario_Dispositivo` FOREIGN KEY (`Dispositivo_idDispositivo`) REFERENCES `Dispositivo` (`idDispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Inventario`
--

LOCK TABLES `Inventario` WRITE;
/*!40000 ALTER TABLE `Inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IpAddr`
--

DROP TABLE IF EXISTS `IpAddr`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `IpAddr` (
  `idIpAddr` int(11) NOT NULL AUTO_INCREMENT,
  `direccionIP` varchar(17) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Interfaz_Dispositivo_idDispositivo` int(11) NOT NULL,
  `Interfaz_idInterfaz` int(11) NOT NULL,
  PRIMARY KEY (`idIpAddr`),
  KEY `fk_IpAddr_Interfaz1_idx` (`Interfaz_idInterfaz`,`Interfaz_Dispositivo_idDispositivo`),
  CONSTRAINT `fk_IpAddr_Interfaz1` FOREIGN KEY (`Interfaz_idInterfaz`, `Interfaz_Dispositivo_idDispositivo`) REFERENCES `Interfaz` (`idInterfaz`, `Dispositivo_idDispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IpAddr`
--

LOCK TABLES `IpAddr` WRITE;
/*!40000 ALTER TABLE `IpAddr` DISABLE KEYS */;
/*!40000 ALTER TABLE `IpAddr` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Notificacion`
--

DROP TABLE IF EXISTS `Notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Notificacion` (
  `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `mensaje` varchar(45) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Dispositivo_idDispositivo` int(11) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '0',
  `tipo` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idnotificacion`),
  KEY `fk_Notificacion_Dispositivo1_idx` (`Dispositivo_idDispositivo`),
  CONSTRAINT `fk_Notificacion_Dispositivo1` FOREIGN KEY (`Dispositivo_idDispositivo`) REFERENCES `Dispositivo` (`idDispositivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Notificacion`
--

LOCK TABLES `Notificacion` WRITE;
/*!40000 ALTER TABLE `Notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Registro`
--

DROP TABLE IF EXISTS `Registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Registro` (
  `fechaHora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(4) NOT NULL,
  `temperatura` int(11) DEFAULT NULL,
  `usoCPU` int(11) DEFAULT NULL,
  `usoRAM` int(11) DEFAULT NULL,
  `cambioConf` tinyint(4) DEFAULT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Dispositivo_idDispositivo` int(11) NOT NULL,
  KEY `fk_Registro_Dispositivo1_idx` (`Dispositivo_idDispositivo`),
  CONSTRAINT `fk_Registro_Dispositivo1` FOREIGN KEY (`Dispositivo_idDispositivo`) REFERENCES `Dispositivo` (`idDispositivo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Registro`
--

LOCK TABLES `Registro` WRITE;
/*!40000 ALTER TABLE `Registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `Registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Users` (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` tinyint(1) NOT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-08-13 15:05:25
