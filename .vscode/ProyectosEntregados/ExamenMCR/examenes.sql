-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: examenes
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `examenes`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `examenes` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `examenes`;

--
-- Table structure for table `examenes`
--

DROP TABLE IF EXISTS `examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examenes` (
  `codExamen` varchar(10) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `duracion` time NOT NULL,
  PRIMARY KEY (`codExamen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes`
--

LOCK TABLES `examenes` WRITE;
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
INSERT INTO `examenes` VALUES ('E1INF','2020-11-18 19:00:00','2021-12-19 22:55:30','00:40:00'),('E2INF','2020-11-11 12:00:00','2020-11-12 14:00:00','00:40:00'),('E3INF','2020-11-19 10:00:00','2020-11-20 14:00:00','00:40:00'),('E4INF','2021-05-18 09:00:00','2021-05-18 15:00:00','00:20:00');
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examenes_tiene_preguntas`
--

DROP TABLE IF EXISTS `examenes_tiene_preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `examenes_tiene_preguntas` (
  `examenes_codExamen` varchar(10) NOT NULL,
  `preguntas_idpreguntas` varchar(45) NOT NULL,
  `posicion` int NOT NULL,
  PRIMARY KEY (`examenes_codExamen`,`preguntas_idpreguntas`),
  KEY `fk_examenes_has_preguntas_preguntas1_idx` (`preguntas_idpreguntas`),
  KEY `fk_examenes_has_preguntas_examenes1_idx` (`examenes_codExamen`),
  CONSTRAINT `fk_examenes_has_preguntas_examenes1` FOREIGN KEY (`examenes_codExamen`) REFERENCES `examenes` (`codExamen`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_examenes_has_preguntas_preguntas1` FOREIGN KEY (`preguntas_idpreguntas`) REFERENCES `preguntas` (`idpreguntas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examenes_tiene_preguntas`
--

LOCK TABLES `examenes_tiene_preguntas` WRITE;
/*!40000 ALTER TABLE `examenes_tiene_preguntas` DISABLE KEYS */;
INSERT INTO `examenes_tiene_preguntas` VALUES ('E1INF','12INF',4),('E1INF','1INF',3),('E1INF','3INF',1),('E1INF','6INF',2),('E1INF','7INF',5),('E2INF','10INF',1),('E2INF','1INF',3),('E2INF','2INF',5),('E2INF','4INF',2),('E2INF','9INF',4),('E3INF','11INF',3),('E3INF','1INF',1),('E3INF','2INF',5),('E3INF','6INF',2),('E3INF','9INF',4);
/*!40000 ALTER TABLE `examenes_tiene_preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `preguntas` (
  `idpreguntas` varchar(45) NOT NULL,
  `tituloPregunta` varchar(500) NOT NULL,
  `respuesta1` varchar(500) NOT NULL,
  `respuesta2` varchar(500) NOT NULL,
  `respuesta3` varchar(500) NOT NULL,
  `respuesta4` varchar(500) NOT NULL,
  `respuestaCorrecta` varchar(45) NOT NULL,
  PRIMARY KEY (`idpreguntas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES ('10INF','UNA MEMORIA RAM ES UNA “MEMORIA DE SOLO LECTURA”','A.Cierto','B.Falso','C.Es probable','D.Todas son ciertas','B'),('11INF','¿QUÉ ES UN PROGRAMA?','A.Un conjunto de instrucciones redactadas en un lenguaje de programación que después de ser combinadas se instalan en la RAM y se ejecutan por el procesador del ordenador','B.Una tabla de datos compuesta por registros y campos','C.Una tabla de datos compuesta por instrucciones de ordenador en el lenguaje Fortran','D.Un conjunto de instrucciones escritas en inglés que después de ser compiladas se ejecutan por el procesador de la computadora tras leerlas en el disco duro','A'),('12INF','SE LLAMA “CÓDIGO FUENTE” A','A.Un diagrama de flujos realizado por un analista de sistemas','B.Un programa escrito por un programador en cualquier lenguaje de programación','C.Un código objeto después de ser compilado','D.Una tabla de una base de datos','B'),('13INF','EL PROCESO DE ADAPTAR AL MEDIO LA INFORMACIÓN A TRANSMITIR SE LE DENOMINA','A.Criptación','B.Codificación','C.Actualización','D.Activación','C'),('1INF','Cual de las siguientes opciones corresponden a tipos de Sistemas Operativos Existentes en el mercado','A.Windows, Mac Os, Linux','B.Office, Word, Excel','C.Mother Board, Mouse, Teclado','D.Internet, Servidor, Conexión FTP','A'),('2INF','EN UNA VISIÓN GENERAL EL ORDENADOR SE COMPONE DE','A.Una memoria central que contiene programas y datos','B.Canales de entrada / salida para los intercambios de información con el exterior','C.Mother Board, Mouse, Teclado','D.Todas las respuesta','D'),('3INF','POR ASOCIACIÓN: A LAS CELDAS SE LES DENOMINA','A.Direcciones','B.Información','C.Unidad de trabajo','D.Todas las respuestas','A'),('4INF','1 MEGABIT TIENE','A.1024 byte','B.1024 kbit','C.1024 bits','D.Todas son ciertas','B'),('5INF','PARA QUE LA UNIDAD CENTRAL DE PROCESO PUEDA LEER EL CONTENIDO DE UNA DIRECCIÓN BASTA INDICARLE A LA MEMORIA','A.El número de la misma','B.El nombre del programa','C.El bus correspondiente','D.Todas las respuestas','A'),('6INF','UN NANOSEGUNDO ES','A.La millonésima parte de un segundo','B.La milmillonésima parte de un segundo','C.La milésima parte de un segundo','D.Ninguna es cierta','B'),('7INF','LA CPU ES','A.El cerebro del ordenador','B.Es el circuito que se encarga de interpretar y ejecutar las instrucciones del programa o encargar de su ejecución a otro dispositivo','C.Actualmente la CPU es un chip que recibe el nombre de micro procesador o microprocesador','D.Todas las respuestas','D'),('8INF','UNA CPU DE 32 BITS	PUEDE PROCESAR LOS BYTES DE','A.4 en 4','B.8 en 8','C.16 en 16','D.Todas las respuestas','B'),('9INF','UN MEGAHERTZIO EQUIVALE A','A.10 elevado a 6 hertzios','B.1024 hertzios','C.1000 hertzios','D.Ninguna de las respuestas','C');
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idusuarios` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('marcosCruz','Marcos','Cruz','Rascon','marcoscruzrascon@gmail.com','1234','');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_hace_examenes`
--

DROP TABLE IF EXISTS `usuarios_hace_examenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios_hace_examenes` (
  `usuarios_idusuarios` varchar(45) NOT NULL,
  `examenes_codExamen` varchar(10) NOT NULL,
  `fechahora_inicioUsuario` datetime NOT NULL,
  `fechahora_finUsuario` datetime DEFAULT NULL,
  `respuestas` varchar(500) NOT NULL,
  PRIMARY KEY (`usuarios_idusuarios`,`examenes_codExamen`),
  KEY `fk_usuarios_has_examenes_examenes1_idx` (`examenes_codExamen`),
  KEY `fk_usuarios_has_examenes_usuarios1_idx` (`usuarios_idusuarios`),
  CONSTRAINT `fk_usuarios_has_examenes_examenes1` FOREIGN KEY (`examenes_codExamen`) REFERENCES `examenes` (`codExamen`),
  CONSTRAINT `fk_usuarios_has_examenes_usuarios1` FOREIGN KEY (`usuarios_idusuarios`) REFERENCES `usuarios` (`idusuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_hace_examenes`
--

LOCK TABLES `usuarios_hace_examenes` WRITE;
/*!40000 ALTER TABLE `usuarios_hace_examenes` DISABLE KEYS */;
INSERT INTO `usuarios_hace_examenes` VALUES ('marcosCruz','E3INF','2020-11-19 23:56:51','2020-11-19 23:57:24','ABDC ');
/*!40000 ALTER TABLE `usuarios_hace_examenes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-20  0:40:32
