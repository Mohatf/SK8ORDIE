-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tiendaskate
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `idCarrito` int NOT NULL,
  `idUsuarios` int NOT NULL,
  `PrecioTotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idCarrito`),
  UNIQUE KEY `idCarrito_UNIQUE` (`idCarrito`),
  UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`),
  CONSTRAINT `idUsuarios` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `NombreCategoria_UNIQUE` (`NombreCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idProductos` int NOT NULL AUTO_INCREMENT,
  `NombreProducto` varchar(90) NOT NULL,
  `Stock` int NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Descripcion` longtext NOT NULL,
  `Imagen` blob NOT NULL,
  `Logo` varchar(2048) DEFAULT NULL,
  `idCategoriaFK` int NOT NULL,
  `NombreCategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `idCategoriaFK_idx` (`idCategoriaFK`),
  CONSTRAINT `idCategoriaFK` FOREIGN KEY (`idCategoriaFK`) REFERENCES `categoria` (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `productoscarrito`
--

DROP TABLE IF EXISTS `productoscarrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productoscarrito` (
  `idProductosCarrito` int NOT NULL AUTO_INCREMENT,
  `Cantidad` int NOT NULL,
  `PrecioProducto` decimal(10,2) NOT NULL,
  `idCarrito_TC` int NOT NULL,
  `idProductos_TP` int NOT NULL,
  PRIMARY KEY (`idProductosCarrito`),
  UNIQUE KEY `idProductosCarrito_UNIQUE` (`idProductosCarrito`),
  KEY `idProductos_TP_idx` (`idProductos_TP`),
  KEY `idCarrito_TC_idx` (`idCarrito_TC`),
  CONSTRAINT `idCarrito_TC` FOREIGN KEY (`idCarrito_TC`) REFERENCES `carrito` (`idCarrito`),
  CONSTRAINT `idProductos_TP` FOREIGN KEY (`idProductos_TP`) REFERENCES `productos` (`idProductos`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuarios` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(40) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `PrimerApellido` varchar(45) NOT NULL,
  `SegundoApellido` varchar(45) DEFAULT NULL,
  `Dni` varchar(9) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Rol` varchar(15) NOT NULL,
  `FotoPerfil` longblob,
  `Direccion` varchar(45) DEFAULT NULL,
  `ComunidadAutonoma` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `CodigoPostal` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`),
  UNIQUE KEY `idUsuarios_UNIQUE` (`idUsuarios`),
  UNIQUE KEY `Usuario_UNIQUE` (`Usuario`),
  UNIQUE KEY `Dni_UNIQUE` (`Dni`),
  UNIQUE KEY `Email_UNIQUE` (`Email`),
  UNIQUE KEY `Telefono_UNIQUE` (`Telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-03 16:13:02
