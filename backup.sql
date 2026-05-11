-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Lamborghini','2026-05-09 00:05:39','2026-05-09 00:05:39'),(2,'Ferrari','2026-05-09 00:05:39','2026-05-09 00:05:39'),(3,'Porsche','2026-05-09 00:05:39','2026-05-09 00:05:39'),(4,'McLaren','2026-05-09 00:05:39','2026-05-09 00:05:39'),(5,'Rolls-Royce','2026-05-09 00:05:39','2026-05-09 00:05:39'),(6,'Bentley','2026-05-09 00:05:39','2026-05-09 00:05:39'),(7,'BMW','2026-05-09 00:05:39','2026-05-09 00:05:39'),(8,'Mercedes-Benz','2026-05-09 00:05:39','2026-05-09 00:05:39'),(9,'Audi','2026-05-09 00:05:39','2026-05-09 00:05:39'),(10,'Aston Martin','2026-05-09 00:05:39','2026-05-09 00:05:39');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'2026_04_21_013917_create_categories_table',1),(3,'2026_04_21_013917_create_products_table',1),(4,'2026_04_21_013918_create_orders_table',1),(5,'2026_04_21_013919_create_order_details_table',1),(6,'2026_05_09_070419_add_type_to_products_table',2),(7,'2026_05_09_073157_add_name_and_dob_to_users_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,1,2,1,8500000000.00,'2026-04-22 01:21:14','2026-04-22 01:21:14'),(2,1,1,1,15000000000.00,'2026-04-22 01:21:14','2026-04-22 01:21:14'),(3,1,13,1,8800000000.00,'2026-04-22 01:21:14','2026-04-22 01:21:14'),(4,2,1,1,15000000000.00,'2026-04-22 01:29:26','2026-04-22 01:29:26'),(5,3,20,1,6800000000.00,'2026-04-22 01:32:41','2026-04-22 01:32:41'),(6,4,1,1,15000000000.00,'2026-04-22 01:35:28','2026-04-22 01:35:28'),(7,5,1,1,15000000000.00,'2026-04-22 01:53:34','2026-04-22 01:53:34'),(8,6,1,1,15000000000.00,'2026-04-22 02:22:13','2026-04-22 02:22:13'),(9,7,4,1,22000000000.00,'2026-04-22 02:22:31','2026-04-22 02:22:31'),(10,8,1,1,15000000000.00,'2026-05-09 01:10:23','2026-05-09 01:10:23'),(11,8,4,1,22000000000.00,'2026-05-09 01:10:23','2026-05-09 01:10:23'),(12,9,23,1,8800000000.00,'2026-05-09 01:13:41','2026-05-09 01:13:41');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_code_unique` (`code`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'ORD-8F8919C0','completed',3,'2026-04-22 01:21:14','2026-05-09 01:15:20'),(2,'ORD-672F5321','completed',4,'2026-04-22 01:29:26','2026-05-09 01:15:18'),(3,'ORD-66EDC199','completed',5,'2026-04-22 01:32:41','2026-05-09 01:15:16'),(4,'ORD-5C54D7BC','completed',6,'2026-04-22 01:35:28','2026-05-09 00:57:40'),(5,'ORD-9FC2B1E9','completed',5,'2026-04-22 01:53:34','2026-05-09 01:15:15'),(6,'ORD-A70F2933','cancelled',7,'2026-04-22 02:22:13','2026-05-09 00:57:31'),(7,'ORD-B03E55A0','completed',7,'2026-04-22 02:22:31','2026-05-09 00:57:24'),(8,'ORD-45253DF9','completed',8,'2026-05-09 01:10:23','2026-05-09 01:15:10'),(9,'ORD-9FC94ED8','completed',8,'2026-05-09 01:13:41','2026-05-09 01:14:25');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int DEFAULT NULL,
  `price` decimal(15,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `technical_specs` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'COUPE','Aventador SVJ','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Aventador SVJ. LP 770-4 đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1544636331-e26879cd4d9b?auto=format&fit=crop&q=80&w=800','LP 770-4',2023,15000000000.00,1,'{\"engine\": \"6.5L V12\", \"mileage\": 1200, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed ISR\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(2,1,'PERFORMANCE','Huracán Sterrato','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Huracán Sterrato. All-Terrain đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1511919884226-fd3cad34687c?auto=format&fit=crop&q=80&w=800','All-Terrain',2024,9500000000.00,0,'{\"engine\": \"5.2L V10\", \"mileage\": 500, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed LDF\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(3,1,'SUV','Urus Performante','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Urus Performante. Super SUV đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1621135802920-133df287f89c?auto=format&fit=crop&q=80&w=800','Super SUV',2024,7800000000.00,0,'{\"engine\": \"4.0L V8 Twin-Turbo\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(4,1,'COUPE','Revuelto','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Revuelto. HPEV đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1632243542379-373266e74dfb?auto=format&fit=crop&q=80&w=800','HPEV',2024,22000000000.00,1,'{\"engine\": \"6.5L V12 Hybrid\", \"mileage\": 0, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(5,2,'PERFORMANCE','SF90 Stradale','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe SF90 Stradale. PHEV đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1592198084033-aade902d1aae?auto=format&fit=crop&q=80&w=800','PHEV',2023,18000000000.00,1,'{\"engine\": \"4.0L V8 Hybrid\", \"mileage\": 850, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(6,2,'CONVERTIBLE','Roma Spider','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Roma Spider. Spider đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1583121274602-3e2820c69888?auto=format&fit=crop&q=80&w=800','Spider',2024,12500000000.00,0,'{\"engine\": \"3.9L V8 Twin-Turbo\", \"mileage\": 100, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(7,2,'COUPE','296 GTB','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe 296 GTB. Assetto Fiorano đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?auto=format&fit=crop&q=80&w=800','Assetto Fiorano',2023,11000000000.00,0,'{\"engine\": \"2.9L V6 Hybrid\", \"mileage\": 300, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(8,2,'SUV','Purosangue','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Purosangue. V12 SUV đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1707255106263-00994348a0a0?auto=format&fit=crop&q=80&w=800','V12 SUV',2024,16000000000.00,1,'{\"engine\": \"6.5L V12\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(9,3,'PERFORMANCE','911 GT3 RS','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe 911 GT3 RS. 992 đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&q=80&w=800','992',2024,8500000000.00,1,'{\"engine\": \"4.0L Flat-6\", \"mileage\": 200, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed PDK\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(10,3,'SEDAN','Taycan Turbo S','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Taycan Turbo S. Electric đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1614200024993-9d609249e097?auto=format&fit=crop&q=80&w=800','Electric',2024,6200000000.00,0,'{\"engine\": \"Dual Electric Motors\", \"mileage\": 0, \"fuel_type\": \"Electric\", \"transmission\": \"2-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(11,3,'SEDAN','Panamera Turbo','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Panamera Turbo. Sport Turismo đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1611859328053-3cbc9f9399f4?auto=format&fit=crop&q=80&w=800','Sport Turismo',2024,5800000000.00,0,'{\"engine\": \"4.0L V8 Hybrid\", \"mileage\": 150, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed PDK\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(12,4,'CONVERTIBLE','750S Spider','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe 750S Spider. Super Series đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1597404294360-fedeca4d9300?auto=format&fit=crop&q=80&w=800','Super Series',2024,10500000000.00,1,'{\"engine\": \"4.0L V8 Twin-Turbo\", \"mileage\": 50, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed SSG\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(13,4,'COUPE','Artura Hybrid','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Artura Hybrid. High-Performance Hybrid đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1597404294360-fedeca4d9300?auto=format&fit=crop&q=80&w=800','High-Performance Hybrid',2023,8800000000.00,0,'{\"engine\": \"3.0L V6 Hybrid\", \"mileage\": 450, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed Seamless Shift\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(14,4,'COUPE','McLaren GT','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe McLaren GT. Grand Tourer đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1627282891910-b83d7195456b?auto=format&fit=crop&q=80&w=800','Grand Tourer',2023,7500000000.00,0,'{\"engine\": \"4.0L V8 Twin-Turbo\", \"mileage\": 1200, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed SSG\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(15,5,'SEDAN','Phantom VIII','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Phantom VIII. Series II đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1631214500115-598fc2cb882e?auto=format&fit=crop&q=80&w=800','Series II',2024,45000000000.00,1,'{\"engine\": \"6.75L V12\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(16,5,'SUV','Cullinan Black','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Cullinan Black. Black Badge đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1563720223185-11003d516935?auto=format&fit=crop&q=80&w=800','Black Badge',2023,38000000000.00,0,'{\"engine\": \"6.75L V12 Twin-Turbo\", \"mileage\": 2500, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(17,5,'COUPE','Spectre Electric','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Spectre Electric. Full Electric đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1711202863765-7eanf8kRpJI?auto=format&fit=crop&q=80&w=800','Full Electric',2024,32000000000.00,1,'{\"engine\": \"Dual Electric Motors\", \"mileage\": 0, \"fuel_type\": \"Electric\", \"transmission\": \"Single Speed\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(18,6,'COUPE','Continental Speed','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Continental Speed. Mulliner đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1621359953476-b1645f063f60?auto=format&fit=crop&q=80&w=800','Mulliner',2024,18000000000.00,1,'{\"engine\": \"6.0L W12 TSI\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Dual-Clutch\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(19,6,'SUV','Bentayga EWB','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Bentayga EWB. Azure đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1549399542-7e3f8b79c3d8?auto=format&fit=crop&q=80&w=800','Azure',2024,14500000000.00,0,'{\"engine\": \"4.0L V8 Twin-Turbo\", \"mileage\": 500, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(20,7,'SEDAN','M8 Competition','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe M8 Competition. Gran Coupe đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1555215695-3004980ad54e?auto=format&fit=crop&q=80&w=800','Gran Coupe',2024,6800000000.00,0,'{\"engine\": \"4.4L V8 M TwinPower\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed M Steptronic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(21,7,'SUV','XM Label Red','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe XM Label Red. Label Red đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1617531653332-bd46c24f2068?auto=format&fit=crop&q=80&w=800','Label Red',2024,12000000000.00,1,'{\"engine\": \"4.4L V8 PHEV\", \"mileage\": 0, \"fuel_type\": \"Hybrid\", \"transmission\": \"8-speed M Steptronic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(22,7,'COUPE','M4 CSL Edition','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe M4 CSL Edition. Limited Edition đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1607853202273-797f1c22a38e?auto=format&fit=crop&q=80&w=800','Limited Edition',2023,5500000000.00,0,'{\"engine\": \"3.0L M TwinPower Turbo\", \"mileage\": 1500, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed M Steptronic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(23,8,'PERFORMANCE','AMG GT 63','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe AMG GT 63. E Performance đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1541899481282-d53bffe3c35d?auto=format&fit=crop&q=80&w=800','E Performance',2024,8800000000.00,1,'{\"engine\": \"4.0L V8 Biturbo Hybrid\", \"mileage\": 0, \"fuel_type\": \"Hybrid\", \"transmission\": \"9-speed AMG SPEEDSHIFT\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(24,8,'SUV','G 63 Edition','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe G 63 Edition. Grand Edition đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1520031441872-265e4ff70366?auto=format&fit=crop&q=80&w=800','Grand Edition',2024,11500000000.00,0,'{\"engine\": \"4.0L V8 Biturbo\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"9-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(25,8,'SEDAN','Maybach S 680','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe Maybach S 680. V12 Luxury đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1622193552434-6309859f8164?auto=format&fit=crop&q=80&w=800','V12 Luxury',2024,16500000000.00,1,'{\"engine\": \"6.0L V12 Biturbo\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"9-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(26,9,'PERFORMANCE','R8 Performance','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe R8 Performance. GT RWD đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1603553323145-3162b2d07119?auto=format&fit=crop&q=80&w=800','GT RWD',2023,6500000000.00,0,'{\"engine\": \"5.2L V10 FSI\", \"mileage\": 3200, \"fuel_type\": \"Petrol\", \"transmission\": \"7-speed S tronic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(27,9,'COUPE','RS e-tron GT','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe RS e-tron GT. Quattro đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e?auto=format&fit=crop&q=80&w=800','Quattro',2024,5900000000.00,0,'{\"engine\": \"Dual Electric Motors\", \"mileage\": 0, \"fuel_type\": \"Electric\", \"transmission\": \"2-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(28,9,'PERFORMANCE','RS 6 Performance','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe RS 6 Performance. Performance đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1616422285623-13ff0167c958?auto=format&fit=crop&q=80&w=800','Performance',2024,4800000000.00,0,'{\"engine\": \"4.0L V8 Biturbo\", \"mileage\": 100, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Tiptronic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(29,10,'COUPE','DBS 770','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe DBS 770. V12 Coupe đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1605515298946-d062f2e9da53?auto=format&fit=crop&q=80&w=800','V12 Coupe',2024,18500000000.00,1,'{\"engine\": \"5.2L V12 Twin-Turbo\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"8-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39'),(30,10,'COUPE','DB12 Coupe','Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe DB12 Coupe. Grand Tourer đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.','https://images.unsplash.com/photo-1627282891910-b83d7195456b?auto=format&fit=crop&q=80&w=800','Grand Tourer',2024,12800000000.00,0,'{\"engine\": \"4.0L V8 Twin-Turbo\", \"mileage\": 0, \"fuel_type\": \"Petrol\", \"transmission\": \"9-speed Automatic\"}','2026-05-09 00:05:39','2026-05-09 00:05:39');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'admin@veloxauto.vn',NULL,'$2y$12$fLsp0mPEJUsrPzCjAgYynOWQzMxoRKYec2/BkjN2tLau5J6qO5o2K','admin','2026-04-22 00:25:48','2026-04-22 00:25:48'),(2,NULL,'test@example.com',NULL,'$2y$12$N04MpWwAS/Sgb3DJU4kMYO9x0x4LQgq0//W39IkbndgB8cxyA7JRS','user','2026-04-22 00:25:48','2026-04-22 00:25:48'),(3,NULL,'tuan@gmail.com',NULL,'$2y$12$qgwuieG2n2lY5.rk7doq/eV6E439hc7QzfM3r0.NM5y61dUDKEu/W','user','2026-04-22 00:45:42','2026-04-22 00:45:42'),(4,NULL,'tuan_test@gmail.com',NULL,'$2y$12$dK8HJN81bRi40BaymFEmReO.N6oCKaBaSbyFfILRRNjiviM/iU5US','user','2026-04-22 01:27:12','2026-04-22 01:27:12'),(5,NULL,'fix_test@gmail.com',NULL,'$2y$12$dwbyjXOsp7jJFhMXVX9nF.Kxc0xXv2qSSXEQNfASONFqUOd296ATG','user','2026-04-22 01:30:57','2026-04-22 01:30:57'),(6,NULL,'mvantuan18@gmail.com',NULL,'$2y$12$UK.4xbUyaT8Aepl6X7PdlusDFEAtVdgHff3zaQ90iSsapq4wc4Hoi','user','2026-04-22 01:35:09','2026-04-22 01:35:09'),(7,NULL,'thiet@gmail.com',NULL,'$2y$12$1W8GWgrHvsCwfMh9qhrduOK8DZ.EbVSpQpcAXQ73xOhqAPT0NUo3O','user','2026-04-22 01:56:40','2026-04-22 01:56:40'),(8,NULL,'tuanok@gmail.com',NULL,'$2y$12$H76zPMcb3RD8rxYBUxELgOZeAsJNDkHn6NxXm03.j.FuDA.WyvFDi','user','2026-05-08 23:58:47','2026-05-08 23:58:47'),(9,'Admin Test','admin@velox.auto','1990-01-01','$2y$12$nM20zI77y6BQ1kOOQUoxx.T.xuLVwpW2p979sSL1C89RhUSLCZEYu','user','2026-05-09 00:39:36','2026-05-09 00:39:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-09 16:12:13
