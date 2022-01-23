CREATE DATABASE  IF NOT EXISTS `bioloOnline` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bioloOnline`;
-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: bioloOnline
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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Masculinas'),(2,'Femeninas'),(3,'Infantis');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contacto` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `contacto_UNIQUE` (`contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'António Gabriel','antoniocamposgabriel@gmail.com',991653315),(2,'Kelvin Domingos','kelvindomingos20@hotmail.com',992565444);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_compra` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente_id` int DEFAULT NULL,
  `fornecedor_id` int DEFAULT NULL,
  `produto_id` int NOT NULL,
  `quantidade` int NOT NULL,
  `total` varchar(40) NOT NULL,
  PRIMARY KEY (`id`,`produto_id`),
  KEY `fk_compra_cliente_idx` (`cliente_id`),
  KEY `fk_compra_fornecedor1_idx` (`fornecedor_id`),
  KEY `fk_compra_produto1_idx` (`produto_id`),
  CONSTRAINT `fk_compra_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_compra_fornecedor1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_compra_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conta` (
  `id` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) NOT NULL,
  `fotocapa` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fornecedor_id` int NOT NULL,
  PRIMARY KEY (`id`,`fornecedor_id`),
  KEY `fk_conta_fornecedor1_idx` (`fornecedor_id`),
  CONSTRAINT `fk_conta_fornecedor1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conta`
--

LOCK TABLES `conta` WRITE;
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` VALUES (1,'photo1637502366.jpeg','capa.png','$2y$10$7Vf1kcsg94/MFZOErWAhXO4QXMmJqQvVdhkhyg0JYldXPmiHMK3ne',1),(2,'product.png','capa.png','$2y$10$3T.5V9yanU1biSrFTtZB8evCLQmDbJ5a1FSscrNyM5WWfcqs3AYuq',2);
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fornecedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `contacto` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `contacto_UNIQUE` (`contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'António Gabriel',991653315,'antoniocamposgabriel@gmail.com','Zamba-4','Cazenga','Luanda'),(2,'Herlander Bento',912323444,'herlanderbento19@gmail.com','Zona verde','Viana','Luanda');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `preco` varchar(40) NOT NULL,
  `estado` int NOT NULL,
  `descricao` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `categoria_id` int NOT NULL,
  PRIMARY KEY (`id`,`categoria_id`),
  KEY `fk_produto_categoria1_idx` (`categoria_id`),
  CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (1,'Casaco Amarelo','15.000,00',1,'Casaco Amarelo','casaco-amarelo.jpg',1),(2,'Calças estravagantes','12.000,00',1,'Calça numa','calca1.jpg',1),(3,'Turque Preta','12.000,00',1,'Turque da polo','casaco-preto.jpg',1),(4,'Ténis da Adidas','6.000,00',1,'Tenis timbrado com a série La casa de papel','piso2.jpg',1),(5,'Manjuco calça','13.000,00',1,'Novo modelo de manjucos','calca2.jpg',2),(6,'Calças Femenina Jins','5.000,00',1,'Da barbie','calca3.jpg',2),(7,'Chuteiras da nike','25.000,00',1,'Esponjosas e confortáveis para poder jogar qualquer tipo de jogo...','piso3.jpg',1),(8,'Casaco','35.000,00',1,'Bom casaco','casaco3.jpg',1),(9,'Ténis da Vans','10.000,00',1,'Novo modelo','piso1.jpg',1);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtofornecedor`
--

DROP TABLE IF EXISTS `produtofornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtofornecedor` (
  `produto_id` int NOT NULL,
  `fornecedor_id` int NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`produto_id`,`fornecedor_id`),
  KEY `fk_produto_has_fornecedor_fornecedor1_idx` (`fornecedor_id`),
  KEY `fk_produto_has_fornecedor_produto1_idx` (`produto_id`),
  CONSTRAINT `fk_produto_has_fornecedor_fornecedor1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_produto_has_fornecedor_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtofornecedor`
--

LOCK TABLES `produtofornecedor` WRITE;
/*!40000 ALTER TABLE `produtofornecedor` DISABLE KEYS */;
INSERT INTO `produtofornecedor` VALUES (1,1,'2022-01-19 15:32:50'),(2,2,'2022-01-19 15:47:28'),(3,1,'2022-01-20 02:22:26'),(4,1,'2022-01-23 14:14:10'),(5,1,'2022-01-23 14:15:02'),(6,1,'2022-01-23 14:15:37'),(7,1,'2022-01-23 14:16:29'),(8,2,'2022-01-23 14:19:01'),(9,2,'2022-01-23 14:19:31');
/*!40000 ALTER TABLE `produtofornecedor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-23 15:53:02
