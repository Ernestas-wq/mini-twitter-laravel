CREATE DATABASE  IF NOT EXISTS `laravel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravel`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `tweets`
--

DROP TABLE IF EXISTS `tweets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tweets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tweets_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tweets`
--

LOCK TABLES `tweets` WRITE;
/*!40000 ALTER TABLE `tweets` DISABLE KEYS */;
INSERT INTO `tweets` VALUES (1,'2021-02-01 13:19:15','2021-02-01 13:19:15',1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','Tweet 1'),(2,'2021-02-01 13:19:34','2021-02-01 13:19:34',1,'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.','Some tweet'),(3,'2021-02-01 13:19:49','2021-02-01 13:19:49',1,'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','Le Tweet'),(4,'2021-02-01 13:20:35','2021-02-01 13:20:35',2,'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.','Very interesting title'),(5,'2021-02-01 13:20:53','2021-02-01 13:20:53',2,'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.','Where can I get some?'),(6,'2021-02-01 13:21:47','2021-02-01 13:21:47',3,'Mauris iaculis auctor nunc eget mollis. Phasellus porttitor rhoncus odio at lacinia. Sed eleifend sollicitudin ligula ut sodales. Morbi sit amet mi id eros fermentum viverra in vitae lectus. Duis et semper quam.','My first tweet'),(7,'2021-02-01 13:22:05','2021-02-01 13:22:05',3,'Sed risus nibh, dapibus eu ullamcorper iaculis, mattis in erat. Pellentesque fermentum quam et nulla molestie convallis. Donec venenatis, arcu nec congue dapibus, ipsum leo pulvinar dui, ut euismod dolor ipsum eget ex.','Another important title'),(8,'2021-02-01 13:22:53','2021-02-01 13:22:53',4,'Suspendisse id metus odio. Fusce erat quam, fermentum tincidunt velit vitae, tincidunt aliquam neque. Praesent eget pretium eros. Integer sit amet massa eros. Donec non dolor quis ante ornare consectetur.','The tweeterino'),(9,'2021-02-01 13:23:09','2021-02-01 13:23:09',4,'Mauris iaculis auctor nunc eget mollis. Phasellus porttitor rhoncus odio at lacinia. Sed eleifend sollicitudin ligula ut sodales. Morbi sit amet mi id eros fermentum viverra in vitae lectus. Duis et semper quam.','What is what?'),(10,'2021-02-01 13:23:54','2021-02-01 13:23:54',5,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam velit velit, vehicula eu pellentesque sed, convallis nec erat. Suspendisse eget tincidunt est. Sed consequat, tortor eu fringilla lobortis','What a tweet!'),(11,'2021-02-01 13:24:07','2021-02-01 13:24:07',5,'Mauris iaculis auctor nunc eget mollis. Phasellus porttitor rhoncus odio at lacinia. Sed eleifend sollicitudin ligula ut sodales. Morbi sit amet mi id eros fermentum viverra in vitae lectus.','This guy is something else');
/*!40000 ALTER TABLE `tweets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-01 17:40:34
