-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: fotos
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `intIdRegistro` int NOT NULL AUTO_INCREMENT,
  `vchIP` varchar(30) NOT NULL,
  `vchCurrencyCode` varchar(5) DEFAULT NULL,
  `vchCountryName` varchar(45) DEFAULT NULL,
  `vchCity` varchar(45) DEFAULT NULL,
  `vchLat` varchar(45) NOT NULL,
  `vchLng` varchar(45) NOT NULL,
  `dtmFechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`intIdRegistro`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (1,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:25:00'),(2,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:33:09'),(3,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:34:01'),(4,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:34:36'),(5,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:35:13'),(6,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:35:17'),(7,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:35:21'),(8,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:35:22'),(9,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:36:42'),(10,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:37:08'),(11,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 22:37:09'),(12,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:21'),(13,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:25'),(14,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:37'),(15,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:41'),(16,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:45'),(17,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:05:45'),(18,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:06:01'),(19,'201.160.159.200','MXN','Mexico','Cuernavaca','18.93593','-99.23882','2023-09-02 23:06:05');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-03 11:41:58
