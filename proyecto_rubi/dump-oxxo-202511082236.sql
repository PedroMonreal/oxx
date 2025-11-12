-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: oxxo
-- ------------------------------------------------------
-- Server version	8.4.3

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `categoria` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Cerveza Lata Lager','Modelo Especial',22.50,'Cerveza'),(2,'Bolsa de Papas Sabor Queso','Sabritas',18.00,'Botanas/Frituras'),(3,'Refresco de Cola 600ml','Coca-Cola',17.00,'Bebidas'),(4,'Agua Purificada 1L','Ciel',12.50,'Bebidas'),(5,'Hot Dog Clásico','O\'Sabor',20.00,'Comida Rápida'),(6,'Café Americano Grande','Andatti',24.00,'Bebidas/Café'),(7,'Chocolatina con Leche','Snickers',15.00,'Dulces/Chocolates'),(8,'Leche Entera Tetrapack 1L','Lala',28.50,'Lácteos/Refrigerados'),(9,'Paquete de Galletas Surtidas','Gamesa',25.00,'Galletas'),(10,'Caja de Chicles Menta','Trident',12.00,'Dulces'),(11,'Bolsa de Cacahuates Salados','Mafer',19.50,'Botanas'),(12,'Cerveza Lata Clara Premium','Corona Extra',24.00,'Cerveza'),(13,'Sopa Instantánea Pollo','Maruchan',16.50,'Abarrotes'),(14,'Caja de Cigarros (Cajetilla)','Marlboro',78.00,'Cigarros'),(15,'Energizante Lata','Red Bull',45.00,'Bebidas Energéticas'),(16,'Pan Blanco Rebanado','Bimbo',38.00,'Abarrotes'),(17,'Queso Amarillo Americano','Fud',32.00,'Lácteos/Refrigerados'),(18,'Bolsa de Tostitos','Tostitos',20.50,'Botanas/Frituras'),(19,'Yogurt Bebible Frutas','Danone',15.50,'Lácteos/Refrigerados'),(20,'Hielo en Bolsa 2kg','Simsa',28.00,'Hogar'),(21,'Jabón de Tocador 150g','Zote',10.00,'Abarrotes/Hogar'),(22,'Papel Higiénico 4 rollos','Regio',35.00,'Abarrotes/Hogar'),(23,'Pila Alcalina AA (Par)','Duracell',55.00,'Mercancías Generales'),(24,'Recarga Tiempo Aire (simulado)','Telcel',50.00,'Servicios'),(25,'Vino Tinto Joven 750ml','Riunite',120.00,'Vinos y Licores'),(26,'Refresco Lima-Limón 600ml','Sprite',17.00,'Bebidas'),(27,'Barra de Chocolate Oscuro','Carlos V',10.00,'Dulces/Chocolates'),(28,'Paquete de Salchichas','Oscar Mayer',45.00,'Lácteos/Refrigerados'),(29,'Cerveza Botella Lager','Tecate',28.00,'Cerveza'),(30,'Paleta de Hielo Limón','Holanda',14.00,'Helados'),(31,'Pan para Hot Dog','Bimbo',25.00,'Abarrotes'),(32,'Crema Corporal Mini','Nivea',30.00,'Higiene Personal'),(33,'Cepillo Dental','Colgate',22.00,'Higiene Personal'),(34,'Ensalada de Atún (Preparada)','O\'Sabor',35.00,'Comida Rápida'),(35,'Jugo de Naranja 500ml','Jumex',18.00,'Bebidas'),(36,'Bolsa de Fritos','Sabritas',18.00,'Botanas/Frituras'),(37,'Cerveza Six-Pack Light','Coors Light',95.00,'Cerveza'),(38,'Café Capuchino Vainilla','Andatti',28.00,'Bebidas/Café'),(39,'Barra de Cereal','Nature Valley',14.00,'Galletas'),(40,'Doritos Nacho','Sabritas',20.50,'Botanas/Frituras'),(41,'Cereal Pequeño (Caja)','Kellogg\'s',15.00,'Abarrotes'),(42,'Refresco Naranja 600ml','Fanta',17.00,'Bebidas'),(43,'Gel Antibacterial Mini','Sanitiza',15.00,'Higiene Personal'),(44,'Vaso Térmico Reutilizable','OXXO',80.00,'Mercancías Generales'),(45,'Cubeta Cerveza (12 botellas)','Heineken',250.00,'Cerveza'),(46,'Atún en Agua (Lata)','Dolores',19.00,'Abarrotes'),(47,'Mayonesa Mini','Hellmann\'s',18.00,'Abarrotes'),(48,'Chorizo (Paquete)','Sabori',38.00,'Lácteos/Refrigerados'),(49,'Bolsa de Cheetos','Sabritas',18.00,'Botanas/Frituras'),(50,'Te Helado Limón','Fuze Tea',16.00,'Bebidas'),(51,'Muffin de Chocolate','Marinela',14.50,'Reposteria'),(52,'Pastelito Chocovainilla','Gansito',16.00,'Reposteria'),(53,'Leche Saborizada Fresa','Santa Clara',15.00,'Lácteos/Refrigerados'),(54,'Rasuradora Desechable','Gillette',40.00,'Higiene Personal'),(55,'Cerveza Lata Oscura','Indio',22.50,'Cerveza'),(56,'Refresco Toronja 600ml','Squirt',17.00,'Bebidas'),(57,'Salsa Picante Roja','Valentina',15.00,'Abarrotes'),(58,'Barra Proteína','Gatorade',35.00,'Dulces/Energéticos'),(59,'Plátanos (pieza - simulada)','Genérica',6.00,'Frutas'),(60,'Vaso de Fruta (Jícama/Pepino)','O\'Sabor',25.00,'Comida Rápida'),(61,'Botella de Agua Mineral','Topo Chico',15.00,'Bebidas'),(62,'Paquete de Arroz (1kg)','Verde Valle',30.00,'Abarrotes'),(63,'Gel para Cabello Mini','Garnier',20.00,'Higiene Personal'),(64,'Chocolate en Polvo (Bolsa)','Chocomilk',40.00,'Abarrotes'),(65,'Cerveza Sin Alcohol','Corona Cero',18.00,'Cerveza'),(66,'Pringles Originales (Chica)','Pringles',28.00,'Botanas/Frituras'),(67,'Cigarros Menta (Cajetilla)','Lucky Strike',75.00,'Cigarros'),(68,'Bebida Isotónica Uva','Gatorade',25.00,'Bebidas'),(69,'Chocolatina Blanca','Kit Kat',15.00,'Dulces/Chocolates'),(70,'Servilletas (Paquete)','Kleenex',18.00,'Abarrotes/Hogar'),(71,'Vino Blanco (Botella)','Frascati',110.00,'Vinos y Licores'),(72,'Café Soluble (Sobre)','Nescafé',5.00,'Abarrotes'),(73,'Curitas (Caja Pequeña)','Band-Aid',28.00,'Mercancías Generales'),(74,'Juego de Lotería','Genérica',50.00,'Mercancías Generales'),(75,'Sándwich de Jamón y Queso','O\'Sabor',32.00,'Comida Rápida'),(76,'Bolsa de Doritos Flamin\' Hot','Sabritas',20.50,'Botanas/Frituras'),(77,'Refresco Manzana 600ml','Sidral Mundet',17.00,'Bebidas'),(78,'Jugo de Tomate (Lata)','Clamato',22.00,'Bebidas'),(79,'Leche Condensada (Lata)','La Lechera',25.00,'Abarrotes'),(80,'Cerveza Artesanal IPA','Minerva',55.00,'Cerveza'),(81,'Gelatina Individual','Danone',12.00,'Lácteos/Refrigerados'),(82,'Miel de Abeja Mini','Clementina',35.00,'Abarrotes'),(83,'Libreta Pequeña','Scribe',20.00,'Papelería'),(84,'Pluma Bic','Bic',8.00,'Papelería'),(85,'Antipañalitis (Crema)','Bebé',45.00,'Higiene Personal'),(86,'Vodka (Botella Pequeña)','Smirnoff',60.00,'Vinos y Licores'),(87,'Paquete de Tortillas de Harina','Tía Rosa',25.00,'Abarrotes'),(88,'Palomitas para Microondas','ACT II',16.00,'Botanas'),(89,'Tostadas Horizontales','Salmas',20.00,'Galletas/Botanas'),(90,'Cerveza Ultra Light','Michelob Ultra',26.00,'Cerveza'),(91,'Refresco de Uva 600ml','Mirinda',17.00,'Bebidas'),(92,'Shampoo Dosis Personal','Pantene',12.00,'Higiene Personal'),(93,'Queso Panela Pequeño','Cacique',40.00,'Lácteos/Refrigerados'),(94,'Donas Azucaradas (Paquete)','Bimbo',22.00,'Reposteria'),(95,'Aceite Comestible Mini','Capullo',30.00,'Abarrotes/Hogar'),(96,'Botella de Ponche','Boing!',18.00,'Bebidas'),(97,'Té Caliente (Preparado)','Andatti',15.00,'Bebidas/Café'),(98,'Chicharrón de Cerdo','Bitz',25.00,'Botanas/Frituras'),(99,'Encendedor Desechable','Bic',18.00,'Mercancías Generales'),(100,'Recarga de Internet Móvil (simulado)','AT&T',100.00,'Servicios');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'oxxo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-08 22:36:16
