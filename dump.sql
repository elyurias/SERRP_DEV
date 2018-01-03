-- MySQL dump 10.15  Distrib 10.0.31-MariaDB, for debian-linux-gnueabihf (armv7l)
--
-- Host: localhost    Database: serrp_dev
-- ------------------------------------------------------
-- Server version	10.0.31-MariaDB-0ubuntu0.16.04.2

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
-- Current Database: `serrp_dev`
--

/*!40000 DROP DATABASE IF EXISTS `serrp_dev`*/;

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `serrp_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `serrp_dev`;

--
-- Table structure for table `alumno_data`
--

DROP TABLE IF EXISTS `alumno_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_data` (
  `id_alumno` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cg` (`id_cg`),
  CONSTRAINT `alumno_data_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`VidentiQR_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alumno_data_ibfk_2` FOREIGN KEY (`id_cg`) REFERENCES `cgeneracion` (`id_cg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_data`
--

LOCK TABLES `alumno_data` WRITE;
/*!40000 ALTER TABLE `alumno_data` DISABLE KEYS */;
INSERT INTO `alumno_data` VALUES (1,'201414015',2),(2,'2583',2),(3,'51261351',2),(4,'2512',3),(5,'12312',1),(6,'2017048063',2),(7,'2017048064',2),(8,'2017048065',2),(9,'2017048066',2),(10,'2017048067',2),(11,'2017048068',2),(12,'2017048069',2),(13,'2017048070',2),(14,'2017048071',2),(15,'2017048072',2),(16,'2017048073',2),(17,'2017048074',2),(18,'2017048075',2),(19,'2017048076',2),(20,'2017048077',2),(21,'2017048078',2),(22,'2017048079',2),(23,'2017048080',2),(24,'2017048081',2),(25,'2017048082',2),(26,'2017048083',2),(27,'2017048084',2),(28,'2017048085',2),(29,'2017048086',2),(30,'2017048087',2),(31,'2017048088',2),(32,'2017048089',2),(33,'2017048090',2),(34,'2017048091',2),(35,'2017048092',2),(36,'2017048093',2),(37,'2017048094',2),(38,'2017048095',2),(39,'2017048096',2),(40,'2017048097',2),(41,'2017048098',2),(42,'2017048099',2),(43,'2017048100',2),(44,'2017048101',2),(45,'2017048102',2),(46,'2017048103',2),(47,'2017048104',2),(48,'2017048105',2),(49,'2017048106',2),(50,'2017048107',2),(51,'2017048108',2),(52,'2017048109',2),(53,'2017048110',2),(54,'2017048111',2),(55,'2017048112',2),(56,'2017048113',2),(57,'2017048114',2),(58,'2017048115',2),(59,'2017048116',2),(60,'2017048117',2),(61,'2017048118',2),(62,'2017048119',2),(63,'2017048120',2),(64,'2017048121',2),(65,'2017048122',2),(66,'2017048123',2),(67,'2017048124',2),(68,'2017048125',2),(69,'2017048126',2),(70,'2017048127',2),(71,'2017048128',2),(72,'2017048129',2),(73,'2017048130',2),(74,'2017048131',2),(75,'2017048132',2),(76,'2017048133',2),(77,'2017048134',2),(78,'2017048135',2),(79,'2017048136',2),(80,'2017048137',2),(81,'2017048138',2),(82,'2017048139',2),(83,'2017048140',2),(84,'2017048141',2),(85,'2017048142',2),(86,'2017048143',2),(87,'2017048144',2),(88,'2017048145',2),(89,'2017048146',2),(90,'2017048147',2),(91,'2017048148',2),(92,'2017048149',2),(93,'2017048150',2),(94,'2017048151',2),(95,'2017048152',2),(96,'2017048153',2),(97,'2017048154',2),(98,'2017048155',2),(99,'2017048156',2),(100,'2017048157',2),(101,'2017048158',2),(102,'2017048159',2),(103,'2017048160',2),(104,'2017048161',2),(105,'2017048162',2),(106,'2017048163',2),(107,'2017048164',2),(108,'2017048165',2),(109,'2017048166',2),(110,'2017048167',2),(111,'2017048168',2),(112,'2017048169',2),(113,'2017048170',2),(114,'2017048171',2),(115,'2017048172',2),(116,'2017048173',2),(117,'2017048174',2),(118,'2017048175',2),(119,'2017048176',2),(120,'2017048177',2),(121,'2017048178',2),(122,'2017048179',2),(123,'2017048180',2),(124,'2017048181',2),(125,'2017048182',2),(126,'2017048183',2),(127,'2017048184',2),(128,'2017048185',2),(129,'2017048186',2),(130,'2017048187',2),(131,'2017048188',2);
/*!40000 ALTER TABLE `alumno_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asesor_alumno`
--

DROP TABLE IF EXISTS `asesor_alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesor_alumno` (
  `id_pa` int(11) NOT NULL AUTO_INCREMENT,
  `Iestado_pa` int(11) DEFAULT NULL,
  `Dregistro_pa` date DEFAULT NULL,
  `Dinicio_pa` date DEFAULT NULL,
  `Dfin_pa` date DEFAULT NULL,
  `Iprogreso_pa` int(11) DEFAULT NULL,
  `Irestriccion_pa` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_asesor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pa`),
  KEY `id_asesor` (`id_asesor`),
  KEY `fk_asesor_alumno_1_idx` (`id_alumno`),
  CONSTRAINT `asesor_alumno_ibfk_2` FOREIGN KEY (`id_asesor`) REFERENCES `asesor_data` (`id_asesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_asesor_alumno_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno_data` (`id_alumno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesor_alumno`
--

LOCK TABLES `asesor_alumno` WRITE;
/*!40000 ALTER TABLE `asesor_alumno` DISABLE KEYS */;
INSERT INTO `asesor_alumno` VALUES (1,6,NULL,'2017-06-01','2017-08-01',100,1,1,6),(2,6,NULL,'2017-06-01','2017-08-01',100,1,2,6),(3,1,NULL,NULL,NULL,100,1,3,4),(4,6,NULL,'2017-06-01','2017-12-01',100,1,4,5),(5,1,NULL,NULL,NULL,100,1,5,6),(6,0,NULL,NULL,NULL,100,1,5,6),(10,6,NULL,'2017-06-01','2017-12-01',100,1,12,10),(11,3,NULL,'2017-06-01','2017-12-01',100,1,13,10),(12,3,NULL,'2017-06-01','2017-08-01',100,1,14,9),(16,6,'2018-01-02','2017-06-08','2018-01-01',0,1,62,27),(17,6,'2018-01-02','2017-01-01','2017-03-01',100,1,18,27),(18,9,'2017-06-01','2017-06-01','2017-10-01',12,1,90,29),(19,9,'2017-06-01','2017-06-01','2017-10-01',15,1,91,29),(20,9,'2017-06-01','2017-06-01','2017-10-01',18,1,92,29),(21,9,'2017-06-01','2017-06-01','2017-10-01',12,1,93,29),(22,9,'2017-06-01','2017-06-01','2017-10-01',66,1,94,29);
/*!40000 ALTER TABLE `asesor_alumno` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER maxdocentedisp BEFORE UPDATE
    ON asesor_alumno FOR EACH ROW 
    BEGIN
    DECLARE VidentiQR VARCHAR(255);
		IF NEW.Iestado_pa = 1 THEN
			IF(SELECT Ilimite_asesor FROM asesor_data WHERE asesor_data.id_asesor = NEW.id_asesor) = 0 THEN
				SET NEW.Iestado_pa = 8;
            ELSE
				UPDATE asesor_data SET asesor_data.Ilimite_asesor = asesor_data.Ilimite_asesor - 1
					WHERE asesor_data.id_asesor = NEW.id_asesor;
            END IF;    
        END IF;
        IF NEW.Iestado_pa >= 3 AND NEW.Iestado_pa <= 5 THEN
			UPDATE asesor_data SET asesor_data.Ilimite_asesor = asesor_data.Ilimite_asesor + 1
					WHERE asesor_data.id_asesor = NEW.id_asesor;
        END IF;
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `asesor_data`
--

DROP TABLE IF EXISTS `asesor_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asesor_data` (
  `id_asesor` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ilimite_asesor` int(11) DEFAULT NULL,
  `id_cg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_asesor`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cg` (`id_cg`),
  CONSTRAINT `asesor_data_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`VidentiQR_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `asesor_data_ibfk_2` FOREIGN KEY (`id_cg`) REFERENCES `cgeneracion` (`id_cg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asesor_data`
--

LOCK TABLES `asesor_data` WRITE;
/*!40000 ALTER TABLE `asesor_data` DISABLE KEYS */;
INSERT INTO `asesor_data` VALUES (1,'152',6,2),(2,'152',4,1),(3,'1251',4,2),(4,'135251',10,2),(5,'12517',8,2),(6,'20072296005',2,2),(7,'201414049',5,2),(8,'32135423',10,2),(9,'2017048061',1,2),(10,'222',4,1),(11,'223',4,2),(12,'224',4,2),(13,'225',4,2),(14,'226',4,2),(15,'227',4,2),(16,'228',4,2),(17,'229',4,2),(18,'230',4,2),(19,'231',4,2),(20,'232',4,2),(21,'233',4,2),(22,'234',4,2),(23,'235',4,2),(24,'236',4,2),(25,'237',4,2),(26,'238',4,2),(27,'239',2,2),(28,'240',4,2),(29,'241',4,2);
/*!40000 ALTER TABLE `asesor_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cgeneracion`
--

DROP TABLE IF EXISTS `cgeneracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cgeneracion` (
  `id_cg` int(11) NOT NULL AUTO_INCREMENT,
  `Vnombre_cg` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dfecha_inicio` date DEFAULT NULL,
  `Dfecha_fin` date DEFAULT NULL,
  `Iestado_cg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cgeneracion`
--

LOCK TABLES `cgeneracion` WRITE;
/*!40000 ALTER TABLE `cgeneracion` DISABLE KEYS */;
INSERT INTO `cgeneracion` VALUES (1,'2017-1','2017-05-01','2017-05-01',0),(2,'2017-2','2017-09-01','2018-01-26',1),(3,'2016-2','2016-07-01','2016-08-01',0);
/*!40000 ALTER TABLE `cgeneracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_avance`
--

DROP TABLE IF EXISTS `documento_avance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento_avance` (
  `id_da` int(11) NOT NULL AUTO_INCREMENT,
  `Vdescripcion_da` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vlink_da` varchar(895) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VdocumentoDOC_DA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VdocumentoPDF_DA` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Iestado_da` int(11) DEFAULT NULL,
  `Ivalidar_da` int(11) DEFAULT NULL,
  `Dfecha_inicio` date DEFAULT NULL,
  `Dfecha_fin` date DEFAULT NULL,
  `Vcomentar_da` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_asesor_alumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_da`),
  KEY `id_asesor_alumno` (`id_asesor_alumno`),
  CONSTRAINT `documento_avance_ibfk_1` FOREIGN KEY (`id_asesor_alumno`) REFERENCES `asesor_alumno` (`id_pa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_avance`
--

LOCK TABLES `documento_avance` WRITE;
/*!40000 ALTER TABLE `documento_avance` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_avance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Vnombre_especialidad` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1,'Ingeniería en Sistemas Computacionales'),(2,'Mecatronica');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `Vnombre_evento` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vdescripcion_evento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipo_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_tipo_evento` (`id_tipo_evento`),
  CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_tipo_evento`) REFERENCES `tipo_evento` (`id_te`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_docavance`
--

DROP TABLE IF EXISTS `evento_docavance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_docavance` (
  `id_eda` int(11) NOT NULL AUTO_INCREMENT,
  `id_da` int(11) DEFAULT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `Iestado_eda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_eda`),
  KEY `id_da` (`id_da`),
  KEY `id_evento` (`id_evento`),
  CONSTRAINT `evento_docavance_ibfk_1` FOREIGN KEY (`id_da`) REFERENCES `documento_avance` (`id_da`),
  CONSTRAINT `evento_docavance_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_docavance`
--

LOCK TABLES `evento_docavance` WRITE;
/*!40000 ALTER TABLE `evento_docavance` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_docavance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `get_alumnos_y_docentes_4_meses_finalizado`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_4_meses_finalizado` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_alumnos_y_docentes_4_meses_finalizado_Femenino`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Femenino`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Femenino`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_4_meses_finalizado_Femenino` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_alumnos_y_docentes_4_meses_finalizado_Masculino`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Masculino`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Masculino`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_4_meses_finalizado_Masculino` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_alumnos_y_docentes_6_meses_finalizado`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_6_meses_finalizado` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_alumnos_y_docentes_6_meses_finalizado_Femenino`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Femenino`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Femenino`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_6_meses_finalizado_Femenino` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_alumnos_y_docentes_6_meses_finalizado_Masculino`
--

DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Masculino`;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Masculino`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_alumnos_y_docentes_6_meses_finalizado_Masculino` (
  `Vnombre_cg` tinyint NOT NULL,
  `Contador` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_profesores_alm_finaliza`
--

DROP TABLE IF EXISTS `get_profesores_alm_finaliza`;
/*!50001 DROP VIEW IF EXISTS `get_profesores_alm_finaliza`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_profesores_alm_finaliza` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL,
  `numSolicitud` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `get_profesores_solicitados`
--

DROP TABLE IF EXISTS `get_profesores_solicitados`;
/*!50001 DROP VIEW IF EXISTS `get_profesores_solicitados`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `get_profesores_solicitados` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL,
  `numSolicitud` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getalumno`
--

DROP TABLE IF EXISTS `getalumno`;
/*!50001 DROP VIEW IF EXISTS `getalumno`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getalumno` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Vcorreo_usuario` tinyint NOT NULL,
  `VtelefonoC_usuario` tinyint NOT NULL,
  `VtelefonoH_usuario` tinyint NOT NULL,
  `Iestado_usuario` tinyint NOT NULL,
  `Itipo_usuario` tinyint NOT NULL,
  `id_especialidad` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL,
  `id_alumno` tinyint NOT NULL,
  `id_usuario` tinyint NOT NULL,
  `id_cg` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getdataadmin`
--

DROP TABLE IF EXISTS `getdataadmin`;
/*!50001 DROP VIEW IF EXISTS `getdataadmin`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getdataadmin` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Vcorreo_usuario` tinyint NOT NULL,
  `VtelefonoC_usuario` tinyint NOT NULL,
  `VtelefonoH_usuario` tinyint NOT NULL,
  `Iestado_usuario` tinyint NOT NULL,
  `Itipo_usuario` tinyint NOT NULL,
  `id_especialidad` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getdatausuario`
--

DROP TABLE IF EXISTS `getdatausuario`;
/*!50001 DROP VIEW IF EXISTS `getdatausuario`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getdatausuario` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Vcorreo_usuario` tinyint NOT NULL,
  `VtelefonoC_usuario` tinyint NOT NULL,
  `VtelefonoH_usuario` tinyint NOT NULL,
  `Iestado_usuario` tinyint NOT NULL,
  `Itipo_usuario` tinyint NOT NULL,
  `id_especialidad` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getdocentes`
--

DROP TABLE IF EXISTS `getdocentes`;
/*!50001 DROP VIEW IF EXISTS `getdocentes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getdocentes` (
  `periodos_regs` tinyint NOT NULL,
  `VidentiQR_usuario` tinyint NOT NULL,
  `Vnombre_usuario` tinyint NOT NULL,
  `Vpaterno_usuario` tinyint NOT NULL,
  `Vmaterno_usuario` tinyint NOT NULL,
  `Vcorreo_usuario` tinyint NOT NULL,
  `VtelefonoC_usuario` tinyint NOT NULL,
  `VtelefonoH_usuario` tinyint NOT NULL,
  `Iestado_usuario` tinyint NOT NULL,
  `Itipo_usuario` tinyint NOT NULL,
  `id_especialidad` tinyint NOT NULL,
  `Csexo_usuario` tinyint NOT NULL,
  `id_asesor` tinyint NOT NULL,
  `id_usuario` tinyint NOT NULL,
  `Ilimite_asesor` tinyint NOT NULL,
  `id_cg` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getespecialidad`
--

DROP TABLE IF EXISTS `getespecialidad`;
/*!50001 DROP VIEW IF EXISTS `getespecialidad`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getespecialidad` (
  `id_especialidad` tinyint NOT NULL,
  `Vnombre_especialidad` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getperiodo`
--

DROP TABLE IF EXISTS `getperiodo`;
/*!50001 DROP VIEW IF EXISTS `getperiodo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getperiodo` (
  `id_cg` tinyint NOT NULL,
  `Vnombre_cg` tinyint NOT NULL,
  `Dfecha_inicio` tinyint NOT NULL,
  `Dfecha_fin` tinyint NOT NULL,
  `Iestado_cg` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `getperiododocenteis`
--

DROP TABLE IF EXISTS `getperiododocenteis`;
/*!50001 DROP VIEW IF EXISTS `getperiododocenteis`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `getperiododocenteis` (
  `VidentiQR_usuario` tinyint NOT NULL,
  `id_asesor` tinyint NOT NULL,
  `Vnombre_cg` tinyint NOT NULL,
  `Iestado_cg` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tipo_evento`
--

DROP TABLE IF EXISTS `tipo_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_evento` (
  `id_te` int(11) NOT NULL AUTO_INCREMENT,
  `Vdescripcion_tevento` varchar(125) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_te`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_evento`
--

LOCK TABLES `tipo_evento` WRITE;
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `VidentiQR_usuario` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `Vnombre_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vpaterno_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vmaterno_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Vcorreo_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VtelefonoC_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VtelefonoH_usuario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Iestado_usuario` int(11) DEFAULT NULL,
  `Itipo_usuario` int(11) DEFAULT NULL COMMENT '1 Administrador, 2 Docente, 3 Alumno',
  `id_especialidad` int(11) DEFAULT NULL,
  `Csexo_usuario` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`VidentiQR_usuario`),
  KEY `id_especialidad` (`id_especialidad`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `especialidad` (`id_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('12312','jca','asd','dac','asd@fsd.es','123123','12312',1,3,1,'M'),('1251','Juan','Carlos','Meja','Moreno@gmail.com','251521','5121651',1,2,1,'M'),('12517','Juan','Carlos','Mejia','irving@gmail.com','25454','215121',1,2,1,'F'),('135251','1234','2','2','1234@gmail.com','1234','2',1,2,2,'M'),('152','Manuel','Montolla','Minessota','tescha@edu.net','5512400061','17371124',1,2,2,'M'),('20072296005','ADAN','LOPEZ','sanchez','ingadamls09@hotmail.com','5561616263','0754545',0,2,1,'M'),('201414015','Juan','Medina','Mora','juanmedi@gmail.es','5512400061','55124066685',1,3,1,'M'),('201414049','Irving','Moncada','Lucio','irving2323@gmail.com','5512400061','5512400061',1,2,1,'F'),('2017048061','Thiago','Abrica','Abonce','2017048061user@gmail.com','55555555','55555555',1,2,2,'F'),('2017048063','Matías','Aboites','Acencio','2017048063user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048064','Samuel','Aboites','Aceves','2017048064user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048065','Lucas','Acevedo','Acencio','2017048065user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048066','Nicolás','Aceves','Abrego','2017048066user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048067','Gabriel','Abundis','Abendano','2017048067user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048068','Santiago','Acevedo','Acero','2017048068user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048069','Daniel','Abad','Acebes','2017048069user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048070','Daniel','Abrigo','Aceves','2017048070user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048071','Bruno','Acencio','Abonce','2017048071user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048072','Adrián','Acencio','Abad','2017048072user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048073','Diego','Abrica','Abarca','2017048073user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048074','Leonardo','Abendano','Abarca','2017048074user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048075','Emiliano','Abitua','Abalos','2017048075user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048076','Diego','Aboites','Acero','2017048076user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048077','Lucas','Abundis','Abad','2017048077user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048078','Benjamín','Abrica','Acencio','2017048078user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048079','Adrián','Abitua','Abendano','2017048079user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048080','Alejandro','Acebedo','Abrica','2017048080user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048081','Santiago','Abitua','Abina','2017048081user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048082','Samuel','Abonce','Abendano','2017048082user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048083','Daniel','Abitua','Abarca','2017048083user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048084','Daniel','Aboites','Abundis','2017048084user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048085','Alejandro','Acebedo','Aboites','2017048085user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048086','Bruno','Acebedo','Aceves','2017048086user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048087','Diego','Aceves','Abalos','2017048087user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048088','Joaquín','Aboites','Abonce','2017048088user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048089','Daniel','Abrego','Abrica','2017048089user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048090','Sebastián','Abad','Aceves','2017048090user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048091','Alejandro','Abina','Abalos','2017048091user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048092','Thiago','Abundis','Acebedo','2017048092user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048093','Santiago','Abendano','Acero','2017048093user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048094','Gabriel','Aburto','Acebedo','2017048094user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048095','Leonardo','Acevedo','Aceves','2017048095user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048096','Samuel','Abrigo','Aboites','2017048096user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048097','Lucas','Abila','Acebes','2017048097user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048098','Bruno','Acero','Aboites','2017048098user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048099','Nicolás','Abrego','Abitua','2017048099user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048100','Diego','Abrego','Abonce','2017048100user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048101','Benjamín','Abila','Acevedo','2017048101user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048102','Santiago','Acencio','Abrigo','2017048102user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048103','Martín','Aburto','Abonce','2017048103user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048104','Bruno','Aceves','Abrica','2017048104user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048105','Santiago','Acebedo','Abendano','2017048105user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048106','Gabriel','Abendano','Abitua','2017048106user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048107','Samuel','Acencio','Acero','2017048107user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048108','Iker','Acero','Abundis','2017048108user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048109','Thiago','Abalos','Abarca','2017048109user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048110','Matías','Acebes','Abrigo','2017048110user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048111','Samuel','Abila','Abonce','2017048111user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048112','Daniel','Abrigo','Abrigo','2017048112user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048113','Emiliano','Acero','Acencio','2017048113user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048114','Joaquín','Abendano','Abina','2017048114user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048115','Mateo','Abrica','Acevedo','2017048115user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048116','Matías','Abarca','Abrego','2017048116user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048117','Lucas','Abina','Abonce','2017048117user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048118','Adrián','Abalos','Abundis','2017048118user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048119','Diego','Abalos','Abrigo','2017048119user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048120','Diego','Aboites','Aboites','2017048120user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048121','Matías','Abrica','Abendano','2017048121user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048122','Joaquín','Abalos','Abina','2017048122user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048123','Diego','Aboites','Abad','2017048123user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048124','Benjamín','Aboites','Abrica','2017048124user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048125','Leonardo','Acebes','Abitua','2017048125user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048126','Emiliano','Aburto','Abendano','2017048126user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048127','Daniel','Acencio','Acebedo','2017048127user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048128','Joaquín','Abrigo','Abina','2017048128user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048129','Martín','Aboites','Abrigo','2017048129user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048130','Alejandro','Abundis','Abarca','2017048130user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048131','Lucas','Acevedo','Aceves','2017048131user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048132','Daniel','Abrigo','Aburto','2017048132user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048133','Gabriel','Abad','Abalos','2017048133user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048134','Benjamín','Abendano','Aburto','2017048134user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048135','Nicolás','Aceves','Abrica','2017048135user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048136','Leonardo','Abrigo','Acevedo','2017048136user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048137','Mateo','Aceves','Acero','2017048137user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048138','Leonardo','Aboites','Abrica','2017048138user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048139','Gabriel','Acero','Acebedo','2017048139user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048140','Gabriel','Acebes','Abarca','2017048140user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048141','Alejandro','Acevedo','Abitua','2017048141user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048142','Bruno','Abila','Acencio','2017048142user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048143','Lucas','Abrego','Acero','2017048143user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048144','Diego','Abarca','Abitua','2017048144user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048145','Benjamín','Aboites','Acero','2017048145user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048146','Joaquín','Acero','Abundis','2017048146user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048147','Emiliano','Abendano','Abalos','2017048147user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048148','Iker','Abundis','Abad','2017048148user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048149','Martín','Abrego','Abonce','2017048149user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048150','Matías','Acevedo','Abad','2017048150user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048151','Mateo','Abina','Abonce','2017048151user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048152','Diego','Abrego','Acevedo','2017048152user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048153','Matías','Abundis','Abrego','2017048153user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048154','Gabriel','Acencio','Aburto','2017048154user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048155','Santiago','Abendano','Abrego','2017048155user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048156','Adrián','Aboites','Abrigo','2017048156user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048157','Diego','Acebes','Aceves','2017048157user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048158','Emiliano','Abundis','Acencio','2017048158user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048159','Emiliano','Acebedo','Aburto','2017048159user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048160','Martín','Abila','Aboites','2017048160user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048161','Adrián','Acevedo','Abrigo','2017048161user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048162','Bruno','Abendano','Acero','2017048162user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048163','Martín','Abina','Abrica','2017048163user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048164','Nicolás','Abonce','Aboites','2017048164user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048165','Gabriel','Acero','Abundis','2017048165user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048166','Sebastián','Abrigo','Abonce','2017048166user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048167','Santiago','Abina','Aburto','2017048167user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048168','Bruno','Acebedo','Abina','2017048168user@gmail.com','55555555','55555555',1,3,2,'F'),('2017048169','Matías','Abalos','Abarca','2017048169user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048170','Benjamín','Acevedo','Aboites','2017048170user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048171','Benjamín','Abarca','Abrica','2017048171user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048172','Diego','Abina','Abrica','2017048172user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048173','Emiliano','Aceves','Abalos','2017048173user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048174','Diego','Abrigo','Abitua','2017048174user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048175','Mateo','Aceves','Abina','2017048175user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048176','Martín','Acencio','Abundis','2017048176user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048177','Daniel','Abrica','Abrica','2017048177user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048178','Sebastián','Abendano','Aceves','2017048178user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048179','Gabriel','Abrigo','Aburto','2017048179user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048180','Iker','Abendano','Acero','2017048180user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048181','Alejandro','Abonce','Abila','2017048181user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048182','Bruno','Abad','Abila','2017048182user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048183','Adrián','Aceves','Abitua','2017048183user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048184','Nicolás','Acero','Abundis','2017048184user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048185','Lucas','Aboites','Abrego','2017048185user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048186','Emiliano','Acebes','Abrica','2017048186user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048187','Bruno','Acebedo','Abila','2017048187user@gmail.com','55555555','55555555',1,3,2,'M'),('2017048188','Leonardo','Acebes','Abrego','2017048188user@gmail.com','55555555','55555555',1,3,2,'M'),('222','Martín','Abonce','Abundis','222user@gmail.com','55555555','55555555',1,2,2,'M'),('223','Martín','Abrica','Acevedo','223user@gmail.com','55555555','55555555',1,2,2,'M'),('224','Daniel','Acencio','Acencio','224user@gmail.com','55555555','55555555',1,2,2,'M'),('225','Thiago','Abitua','Acevedo','225user@gmail.com','55555555','55555555',1,2,2,'M'),('226','Samuel','Abonce','Abendano','226user@gmail.com','55555555','55555555',1,2,2,'M'),('227','Samuel','Abendano','Abitua','227user@gmail.com','55555555','55555555',1,2,2,'M'),('228','Samuel','Acebedo','Abalos','228user@gmail.com','55555555','55555555',1,2,2,'M'),('229','Diego','Acebes','Abitua','229user@gmail.com','55555555','55555555',1,2,2,'M'),('230','Matías','Aburto','Abarca','230user@gmail.com','55555555','55555555',1,2,2,'M'),('231','Sebastián','Abonce','Abad','231user@gmail.com','55555555','55555555',1,2,2,'M'),('232','Thiago','Abad','Abundis','232user@gmail.com','55555555','55555555',1,2,2,'M'),('233','Benjamín','Abad','Abina','233user@gmail.com','55555555','55555555',1,2,2,'M'),('234','Nicolás','Acencio','Abonce','234user@gmail.com','55555555','55555555',1,2,2,'M'),('235','Benjamín','Acevedo','Acebes','235user@gmail.com','55555555','55555555',1,2,2,'M'),('236','Emiliano','Aboites','Abrigo','236user@gmail.com','55555555','55555555',1,2,2,'M'),('237','Emiliano','Acebes','Abalos','237user@gmail.com','55555555','55555555',1,2,2,'M'),('238','Leonardo','Aboites','Acero','238user@gmail.com','55555555','55555555',1,2,2,'M'),('239','Mateo','Acevedo','Aburto','239user@gmail.com','55555555','55555555',1,2,2,'M'),('240','Alejandro','Aburto','Acebes','240user@gmail.com','55555555','55555555',1,2,2,'M'),('241','Bruno','Acero','Acebes','241user@gmail.com','55555555','55555555',1,2,2,'M'),('2512','Eleuterio','Mendoza','Sandivar','sandivar@gmaiol.com','551240006235','2563256',1,3,1,'M'),('2583','Juan','Medin','Meridillin','55@es.es','5512400061','5512400061',1,3,1,'M'),('32135423','2131','321','32','13@g.c','51','3',1,2,1,'M'),('51261351','31321','651','3','51@testes.es','351','321315',1,3,1,'M'),('528','Med','Moncada','Lucio','irving2323@gmail.com','5512400061','5512400062',1,1,1,'M'),('6232953','Juan','Mora','Mora','junito@gmail.es','5512400061','5512400061',1,1,1,'M');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_ignore`
--

DROP TABLE IF EXISTS `usuario_ignore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_ignore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qr` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_ignore`
--

LOCK TABLES `usuario_ignore` WRITE;
/*!40000 ALTER TABLE `usuario_ignore` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_ignore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'serrp_dev'
--

--
-- Dumping routines for database 'serrp_dev'
--
/*!50003 DROP FUNCTION IF EXISTS `addusuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `addusuario`(`pqr` VARCHAR(255), `pnombre` VARCHAR(255), `ppaterno` VARCHAR(255), `pmaterno` VARCHAR(255), `pcorreo` VARCHAR(255), `ptelefonoc` VARCHAR(255), `ptelefonoh` VARCHAR(255), `pestado` INT, `pespecialidad` INT, `psexo` CHAR(1), `tiṕo` INT, `limite` INT) RETURNS int(11)
BEGIN
DECLARE recurso VARCHAR(233);
DECLARE CG_id INT;
SELECT id_cg FROM cgeneracion WHERE cgeneracion.Iestado_cg = 1 LIMIT 1 INTO CG_id;
IF CG_id IS NULL THEN
	return 10;
END IF;
IF (SELECT usuario.VidentiQR_usuario FROM usuario WHERE usuario.VidentiQR_usuario = pqr) IS NULL THEN
INSERT INTO `usuario`(`VidentiQR_usuario`,`Vnombre_usuario`,`Vpaterno_usuario`,`Vmaterno_usuario`,`Vcorreo_usuario`,`VtelefonoC_usuario`,`VtelefonoH_usuario`,`Iestado_usuario`,`Itipo_usuario`,`id_especialidad`, `Csexo_usuario`) VALUES (pqr, pnombre, ppaterno, pmaterno, pcorreo, ptelefonoc, ptelefonoh, pestado,tipo, pespecialidad, psexo);
	IF tipo = 2 THEN
    	INSERT INTO asesor_data VALUEs (0,pqr,limite,CG_id);
        RETURN 1;     END IF;     IF tipo = 3 THEN
    	INSERT INTO alumno_data VALUES (0,pqr,CG_id);
    	RETURN 2;     END IF;     RETURN 4; ELSE
	return 3; END IF; END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `add_or_upd_asesor_alumno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `add_or_upd_asesor_alumno`(
			FtipoOperacion VARCHAR(15),
			FvalorEstado INT,
            FfechaInicio date,
            FfechaFin date,
            Falumno INT,
            Fasesor INT,
            Fid_asesor_alumno INT
		) RETURNS int(11)
BEGIN
			DECLARE Fid_pa INT;
			CASE FtipoOperacion
				WHEN 'regAsesorAlumno'
					THEN
						IF(SELECT asesor_alumno.id_pa FROM asesor_alumno
								WHERE asesor_alumno.id_asesor = Fasesor 
								AND asesor_alumno.id_alumno = Falumno
                                LIMIT 1) IS NULL THEN
								INSERT INTO asesor_alumno VALUES (0,FvalorEstado,CURDATE(),FfechaInicio,FfechaFin,0,1,Falumno,Fasesor);
							RETURN 1; -- se ha registrado el asesor con alumno, falta confirmar (periodo actual) 
                        ELSE
							RETURN 2; -- el alumno ya esta registrado y fue aceptado, por lo tanto no necesita registrar otro
                        END IF;
				WHEN 'actualizaEstado'
					THEN
					IF Fid_asesor_alumno IS NULL THEN
						RETURN 3;-- no esta registrado
					ELSE
						UPDATE asesor_alumno SET asesor_alumno.Iestado_pa = FvalorEstado, asesor_alumno.DFin_pa = FfechaFin WHERE asesor_alumno.id_pa = Fid_asesor_alumno;
                        RETURN 4;-- estado registrado
                    END IF;
            END CASE;			
        END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getusuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getusuario`(`Fqr` VARCHAR(120)) RETURNS int(11)
BEGIN
	DECLARE tipo INT;
    SELECT Itipo_usuario FROM usuario WHERE VidentiQR_usuario = Fqr INTO tipo;
    IF tipo is null THEN
		return -1;
    ELSE
    	return tipo;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `getusuarioestado` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `getusuarioestado`(`qr` VARCHAR(260)) RETURNS int(11)
BEGIN
	declare estado int;
    select Iestado_usuario from usuario where VidentiQR_usuario = qr into estado;
    return estado;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_mes_count_asesor` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_mes_count_asesor`(INICIO INT, FIN INT) RETURNS int(11)
BEGIN
		RETURN FIN - INICIO;
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_periodo_actual` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_periodo_actual`() RETURNS varchar(255) CHARSET utf8mb4
BEGIN
	DECLARE sesionActualPeriodo VARCHAR(255);
    DECLARE integro INT;
    SELECT isperiodo_acc() INTO integro;
    SELECT CONCAT('Periodo actual activo de Residencias Profesionales: ',Vnombre_cg,'	Registro: Inicia(',Dfecha_inicio,')	Termina: (',Dfecha_fin,')') INTO sesionActualPeriodo FROM cgeneracion
		WHERE Iestado_cg = 1 LIMIT 1;
	RETURN sesionActualPeriodo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_periodo_actual_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_periodo_actual_id`() RETURNS int(11)
BEGIN
DECLARE rmDataId INT;
SELECT id_cg INTO rmDataId FROM cgeneracion WHERE cgeneracion.Iestado_cg = 1 LIMIT 1;
RETURN rmDataId;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `isperiodo_acc` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `isperiodo_acc`() RETURNS int(11)
BEGIN
	IF(SELECT COUNT(id_cg) FROM cgeneracion) = 0 THEN
		INSERT INTO cgeneracion VALUES(0,CONCAT(YEAR(CURDATE()),'-1'),'','',0);
        RETURN 1;
    END IF;
    RETURN 2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `istiposession` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `istiposession`(`Fqr` VARCHAR(120), `Fdescripcion` VARCHAR(120)) RETURNS int(11)
BEGIN
	DECLARE tipo INT;
    SELECT Itipo_usuario FROM usuario WHERE VidentiQR_usuario = qr INTO tipo;
    IF tipo is null THEN
		INSERT INTO usuario_ignore(qr, descripcion) VALUES (Fqr, Fdescripcion);
        return -1;
    ELSE
    	return tipo;
    end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `mod_usuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `mod_usuario`(
 Fnombre varchar(255),
 Fpaterno varchar(255),
 Fmaterno varchar(255),
 Fcorreo varchar(255),
 FtelefonoC varchar(255),
 FtelefonoH varchar(255),
 Fid_especialidad int,
 FCsexo char(1),
 FVidenti varchar(255)
) RETURNS int(11)
BEGIN
IF (SELECT VidentiQR_usuario FROM usuario WHERE VidentiQR_usuario = FVidenti) IS NULL THEN
	RETURN 1;
ELSE
UPDATE usuario
SET
Vnombre_usuario = Fnombre,
Vpaterno_usuario = Fpaterno,
Vmaterno_usuario = Fmaterno,
Vcorreo_usuario = Fcorreo,
VtelefonoC_usuario = FtelefonoC,
VtelefonoH_usuario = FtelefonoH,
id_especialidad = Fid_especialidad,
Csexo_usuario = FCsexo
WHERE usuario.VidentiQR_usuario = FVidenti;
	RETURN 0;
END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `setespecialidad` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `setespecialidad`(`nombre` VARCHAR(120)) RETURNS int(11)
begin
	INSERT INTO especialidad values(0,nombre);
    return 0;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Current Database: `serrp_dev`
--

USE `serrp_dev`;

--
-- Final view structure for view `get_alumnos_y_docentes_4_meses_finalizado`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_4_meses_finalizado` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) <= 4)) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_alumnos_y_docentes_4_meses_finalizado_Femenino`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Femenino`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Femenino`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_4_meses_finalizado_Femenino` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) <= 4) and (`u`.`Csexo_usuario` = 'F')) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_alumnos_y_docentes_4_meses_finalizado_Masculino`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Masculino`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_4_meses_finalizado_Masculino`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_4_meses_finalizado_Masculino` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) <= 4) and (`u`.`Csexo_usuario` = 'M')) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_alumnos_y_docentes_6_meses_finalizado`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_6_meses_finalizado` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) >= 4)) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_alumnos_y_docentes_6_meses_finalizado_Femenino`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Femenino`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Femenino`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_6_meses_finalizado_Femenino` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) >= 4) and (`u`.`Csexo_usuario` = 'F')) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_alumnos_y_docentes_6_meses_finalizado_Masculino`
--

/*!50001 DROP TABLE IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Masculino`*/;
/*!50001 DROP VIEW IF EXISTS `get_alumnos_y_docentes_6_meses_finalizado_Masculino`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_alumnos_y_docentes_6_meses_finalizado_Masculino` AS select `cg`.`Vnombre_cg` AS `Vnombre_cg`,count(`cg`.`Vnombre_cg`) AS `Contador` from (((`asesor_alumno` `aa` join `alumno_data` `ad` on((`aa`.`id_alumno` = `ad`.`id_alumno`))) join `usuario` `u` on((`ad`.`id_usuario` = `u`.`VidentiQR_usuario`))) join `cgeneracion` `cg` on((`ad`.`id_cg` = `cg`.`id_cg`))) where ((`aa`.`Iestado_pa` = 6) and (timestampdiff(MONTH,`aa`.`Dinicio_pa`,`aa`.`Dfin_pa`) > 4) and (`u`.`Csexo_usuario` = 'M')) group by `cg`.`Vnombre_cg` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_profesores_alm_finaliza`
--

/*!50001 DROP TABLE IF EXISTS `get_profesores_alm_finaliza`*/;
/*!50001 DROP VIEW IF EXISTS `get_profesores_alm_finaliza`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_profesores_alm_finaliza` AS select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Csexo_usuario` AS `Csexo_usuario`,count(`aa`.`id_asesor`) AS `numSolicitud` from ((`asesor_alumno` `aa` join `asesor_data` `ada` on((`aa`.`id_asesor` = `ada`.`id_asesor`))) join `usuario` `u` on((`u`.`VidentiQR_usuario` = `ada`.`id_usuario`))) where (`aa`.`id_asesor` in (select `asesor_data`.`id_asesor` from `asesor_data` group by `asesor_data`.`id_usuario`) and (`aa`.`Iestado_pa` = 6)) group by `aa`.`id_asesor` order by count(`aa`.`id_asesor`) desc limit 12 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `get_profesores_solicitados`
--

/*!50001 DROP TABLE IF EXISTS `get_profesores_solicitados`*/;
/*!50001 DROP VIEW IF EXISTS `get_profesores_solicitados`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `get_profesores_solicitados` AS select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Csexo_usuario` AS `Csexo_usuario`,count(`aa`.`id_asesor`) AS `numSolicitud` from ((`asesor_alumno` `aa` join `asesor_data` `ada` on((`aa`.`id_asesor` = `ada`.`id_asesor`))) join `usuario` `u` on((`u`.`VidentiQR_usuario` = `ada`.`id_usuario`))) where `aa`.`id_asesor` in (select `asesor_data`.`id_asesor` from `asesor_data` group by `asesor_data`.`id_usuario`) group by `aa`.`id_asesor` order by count(`aa`.`id_asesor`) desc limit 12 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getalumno`
--

/*!50001 DROP TABLE IF EXISTS `getalumno`*/;
/*!50001 DROP VIEW IF EXISTS `getalumno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getalumno` AS select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`u`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`u`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`u`.`Iestado_usuario` AS `Iestado_usuario`,`u`.`Itipo_usuario` AS `Itipo_usuario`,`u`.`id_especialidad` AS `id_especialidad`,`u`.`Csexo_usuario` AS `Csexo_usuario`,`ad`.`id_alumno` AS `id_alumno`,`ad`.`id_usuario` AS `id_usuario`,`ad`.`id_cg` AS `id_cg` from (`usuario` `u` join `alumno_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) where (`u`.`Itipo_usuario` = 3) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getdataadmin`
--

/*!50001 DROP TABLE IF EXISTS `getdataadmin`*/;
/*!50001 DROP VIEW IF EXISTS `getdataadmin`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getdataadmin` AS select `usuario`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`usuario`.`Vnombre_usuario` AS `Vnombre_usuario`,`usuario`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`usuario`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`usuario`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`usuario`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`usuario`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`usuario`.`Iestado_usuario` AS `Iestado_usuario`,`usuario`.`Itipo_usuario` AS `Itipo_usuario`,`usuario`.`id_especialidad` AS `id_especialidad`,`usuario`.`Csexo_usuario` AS `Csexo_usuario` from `usuario` where (`usuario`.`Itipo_usuario` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getdatausuario`
--

/*!50001 DROP TABLE IF EXISTS `getdatausuario`*/;
/*!50001 DROP VIEW IF EXISTS `getdatausuario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getdatausuario` AS select `usuario`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`usuario`.`Vnombre_usuario` AS `Vnombre_usuario`,`usuario`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`usuario`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`usuario`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`usuario`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`usuario`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`usuario`.`Iestado_usuario` AS `Iestado_usuario`,`usuario`.`Itipo_usuario` AS `Itipo_usuario`,`usuario`.`id_especialidad` AS `id_especialidad`,`usuario`.`Csexo_usuario` AS `Csexo_usuario` from `usuario` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getdocentes`
--

/*!50001 DROP TABLE IF EXISTS `getdocentes`*/;
/*!50001 DROP VIEW IF EXISTS `getdocentes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getdocentes` AS select `ad`.`id_asesor` AS `periodos_regs`,`u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`u`.`Vnombre_usuario` AS `Vnombre_usuario`,`u`.`Vpaterno_usuario` AS `Vpaterno_usuario`,`u`.`Vmaterno_usuario` AS `Vmaterno_usuario`,`u`.`Vcorreo_usuario` AS `Vcorreo_usuario`,`u`.`VtelefonoC_usuario` AS `VtelefonoC_usuario`,`u`.`VtelefonoH_usuario` AS `VtelefonoH_usuario`,`u`.`Iestado_usuario` AS `Iestado_usuario`,`u`.`Itipo_usuario` AS `Itipo_usuario`,`u`.`id_especialidad` AS `id_especialidad`,`u`.`Csexo_usuario` AS `Csexo_usuario`,`ad`.`id_asesor` AS `id_asesor`,`ad`.`id_usuario` AS `id_usuario`,`ad`.`Ilimite_asesor` AS `Ilimite_asesor`,`ad`.`id_cg` AS `id_cg` from (`usuario` `u` join `asesor_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) where (`u`.`Itipo_usuario` = 2) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getespecialidad`
--

/*!50001 DROP TABLE IF EXISTS `getespecialidad`*/;
/*!50001 DROP VIEW IF EXISTS `getespecialidad`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getespecialidad` AS select `especialidad`.`id_especialidad` AS `id_especialidad`,`especialidad`.`Vnombre_especialidad` AS `Vnombre_especialidad` from `especialidad` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getperiodo`
--

/*!50001 DROP TABLE IF EXISTS `getperiodo`*/;
/*!50001 DROP VIEW IF EXISTS `getperiodo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getperiodo` AS select `cgeneracion`.`id_cg` AS `id_cg`,`cgeneracion`.`Vnombre_cg` AS `Vnombre_cg`,`cgeneracion`.`Dfecha_inicio` AS `Dfecha_inicio`,`cgeneracion`.`Dfecha_fin` AS `Dfecha_fin`,`cgeneracion`.`Iestado_cg` AS `Iestado_cg` from `cgeneracion` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `getperiododocenteis`
--

/*!50001 DROP TABLE IF EXISTS `getperiododocenteis`*/;
/*!50001 DROP VIEW IF EXISTS `getperiododocenteis`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `getperiododocenteis` AS select `u`.`VidentiQR_usuario` AS `VidentiQR_usuario`,`ad`.`id_asesor` AS `id_asesor`,`cg`.`Vnombre_cg` AS `Vnombre_cg`,`cg`.`Iestado_cg` AS `Iestado_cg` from ((`usuario` `u` join `asesor_data` `ad` on((`u`.`VidentiQR_usuario` = `ad`.`id_usuario`))) join `cgeneracion` `cg` on((`cg`.`id_cg` = `ad`.`id_cg`))) */;
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

-- Dump completed on 2018-01-03 17:15:15
