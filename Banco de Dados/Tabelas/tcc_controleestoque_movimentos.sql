-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: tcc_controleestoque
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `movimentos`
--

DROP TABLE IF EXISTS `movimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `movimentos` (
  `IDMOV` int NOT NULL,
  `PROD` int DEFAULT NULL,
  `QUANT` decimal(15,2) DEFAULT NULL,
  `DTMOV` date DEFAULT NULL,
  `TIPO` varchar(1) DEFAULT NULL,
  `USERID` int DEFAULT NULL,
  `ITEM` int DEFAULT NULL,
  PRIMARY KEY (`IDMOV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimentos`
--

LOCK TABLES `movimentos` WRITE;
/*!40000 ALTER TABLE `movimentos` DISABLE KEYS */;
INSERT INTO `movimentos` VALUES (1,1,60.00,'2021-11-26','E',2,NULL),(2,1,5.00,'2021-11-26','S',2,1),(3,1,5.00,'2021-11-26','S',2,1),(4,1,1.00,'2021-11-26','S',2,1),(5,1,29.00,'2021-11-26','S',2,1),(6,1,10.00,'2021-11-26','S',2,1),(7,1,15.00,'2021-11-15','E',2,NULL),(8,1,15.00,'2021-11-26','S',2,2),(9,1,10.00,'2021-11-18','E',2,NULL),(10,1,15.00,'2021-12-15','E',2,NULL),(11,1,10.00,'2021-11-26','S',2,3),(12,1,10.00,'2021-11-26','S',2,1);
/*!40000 ALTER TABLE `movimentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-26 14:37:23
