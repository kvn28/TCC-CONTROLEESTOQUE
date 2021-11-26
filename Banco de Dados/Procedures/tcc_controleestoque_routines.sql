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
-- Dumping routines for database 'tcc_controleestoque'
--
/*!50003 DROP PROCEDURE IF EXISTS `alteraMovimento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `alteraMovimento`(IN IDITEM INT(6) , IN QUANT DECIMAL(15,2), IN DTCOMPRA DATE,IN DTVENCT DATE,IN PROD INT(6),IN USERID INT(6),IN IDMOV INT(6),IN TIPO VARCHAR(1),IN FORNECEDOR VARCHAR(254),IN VALCOMPRA DECIMAL(14,2),IN VALUNIT DECIMAL(14,2),IN VALVENDA DECIMAL(14,2))
BEGIN 
        INSERT INTO itens ( IDITEM, QUANT, DTCOMPRA, DTVENCT, PROD,USERID,FORNEC,VLCOMP,VLUNIT,VLVEND) VALUES (IDITEM, QUANT, DTCOMPRA, DTVENCT,PROD,USERID,FORNECEDOR,VALCOMPRA,VALUNIT,VALVENDA);
        INSERT INTO movimentos ( IDMOV,PROD,QUANT,DTMOV,TIPO,USERID) VALUES (IDMOV,PROD,QUANT,DTCOMPRA,TIPO,USERID);
        UPDATE saldo
        SET QUANT = saldo.QUANT + QUANT
        WHERE IDPROD = PROD;
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `alteraSaldo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `alteraSaldo`(IN IDMOV INT(6) , IN QUANT DECIMAL(15,2), IN DTMOV DATE,IN PROD INT(6),IN USERID INT(6),IN TIPO VARCHAR(1), IN ITEM INT(6))
BEGIN 
        INSERT INTO movimentos ( IDMOV,PROD,QUANT,DTMOV,TIPO,USERID,ITEM) VALUES (IDMOV,PROD,QUANT,DTMOV,TIPO,USERID,ITEM);
        UPDATE saldo
        SET QUANT =	 CASE
					WHEN TIPO ='E' THEN saldo.QUANT + QUANT
                    WHEN TIPO ='S' THEN saldo.QUANT - QUANT
                    END
		WHERE saldo.IDPROD = PROD;

	UPDATE itens
        SET QUANT = CASE 
        WHEN TIPO = 'E' THEN itens.QUANT + QUANT
        WHEN TIPO = 'S' THEN itens.QUANT - QUANT
        END 
		WHERE itens.IDITEM = ITEM AND D_E_L_E_T_ IS NULL;
  
		UPDATE itens
        SET ENCERR = CASE
        WHEN itens.QUANT > 0 THEN ''
        WHEN  itens.QUANT <= 0 THEN 'E'
        END
		WHERE itens.IDITEM = ITEM AND D_E_L_E_T_ IS NULL;
	  END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insereMovimentos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `insereMovimentos`(IN IDITEM INT(6) , IN QUANT DECIMAL(15,2), IN DTCOMPRA DATE,IN DTVENCT DATE,IN PROD INT(6),IN USERID INT(6),IN IDMOV INT(6),IN TIPO VARCHAR(1),FORNECEDOR VARCHAR(254), VALCOMPRA DECIMAL(14,2), VALUNIT DECIMAL(14,2), VALVENDA DECIMAL(14,2))
BEGIN 
        INSERT INTO itens ( IDITEM, QUANT, DTCOMPRA, DTVENCT, PROD,USERID,FORNEC,VLCOMP,VLUNIT,VLVEND) VALUES (IDITEM, QUANT, DTCOMPRA, DTVENCT,PROD,USERID,FORNECEDOR,VALCOMPRA,VALUNIT,VALVENDA);
        INSERT INTO movimentos ( IDMOV,PROD,QUANT,DTMOV,TIPO,USERID) VALUES (IDMOV,PROD,QUANT,DTCOMPRA,TIPO,USERID);
        INSERT INTO saldo (IDPROD,QUANT) VALUES (PROD,QUANT);
	END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-26 14:37:24
