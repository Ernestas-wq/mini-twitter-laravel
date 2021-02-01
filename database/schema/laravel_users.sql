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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Clinton Macdonald','jyci@mailinator.com','gykuz',0,NULL,'$2y$10$PbZLbzNY6Cj68Y3Fh8s0l.ST01tGPf66EuqYVmzIQc1fEE0ycDEq.',NULL,NULL,NULL,'2021-02-01 13:18:51','2021-02-01 13:18:51'),(2,'Irma Kirkland','nefisufa@mailinator.com','togemy',0,NULL,'$2y$10$e0BY5/UG5gnhLy9Lt92jme0QWBer4xHXRQ/8nYr6FjcjZxNP8m996',NULL,NULL,NULL,'2021-02-01 13:20:10','2021-02-01 13:20:10'),(3,'Paki Melendez','goqosidaq@mailinator.com','sinyr',0,NULL,'$2y$10$9HH7H5ntSPXM.pOYbv5VAOw.HRdo6yxfS6jEe5q6ZDHlc6HEH0.Na',NULL,NULL,NULL,'2021-02-01 13:21:34','2021-02-01 13:21:34'),(4,'Whitney Berry','zycejuzysi@mailinator.com','xuzyt',0,NULL,'$2y$10$wrfvQM12seNBjOxqrIhmm.an3TG72SAmZZZVXAMBhfjcha2a6cKoK',NULL,NULL,NULL,'2021-02-01 13:22:35','2021-02-01 13:22:35'),(5,'Graham Head','bazohuge@mailinator.com','kybogisawe',0,NULL,'$2y$10$R2p045oor8ZO0gfCIooU/OZJjWLb4znEncBvUU/URZFU5fCinnrMC',NULL,NULL,NULL,'2021-02-01 13:23:38','2021-02-01 13:23:38'),(6,'test1','test@test.com','tester',0,NULL,'$2y$10$QEQx.Ax4yZzhYmvuvrXDuOAYJnpXYWDFKz/ml/TLVZyLHHlVAdBeC',NULL,NULL,NULL,'2021-02-01 13:24:48','2021-02-01 13:24:48');
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

-- Dump completed on 2021-02-01 17:40:34
