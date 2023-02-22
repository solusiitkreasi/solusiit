-- MySQL dump 10.16  Distrib 10.1.43-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: xgenxchi_laravel_zixer
-- ------------------------------------------------------
-- Server version	10.1.43-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) unsigned NOT NULL DEFAULT '0',
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'sharifur rahman','dvrobin4','dvrobin4@gmail.com',0,'super_admin',NULL,'$2y$12$eF6cAtfYfKrZYyd5oKKGPOxlQ2Ha1YCnjPsYiE6J/CXDVtJctSA4O',NULL,NULL,NULL),(2,'William J. Gomez','super_admin','WilliamJGomez@teleworm.us',0,'super_admin',NULL,'$2y$10$q.tiYbO5vKop/hjS5buWYeL/UsB4TZkLqAix9gsWsG0CXqP715pgK',NULL,'2020-01-29 10:44:57','2020-01-29 10:44:57'),(3,'Samuel D. Wiechmann','editor','SamuelDWiechmann@teleworm.us',0,'editor',NULL,'$2y$10$DbjExcnruN82cdSBaobVnuHbKMB7m2B2XYQtZR6l4cqvr4JjZouei',NULL,'2020-01-29 10:50:01','2020-01-29 10:50:01'),(4,'Brandy J. Martin','admin','BrandyJMartin@armyspy.com',0,'admin',NULL,'$2y$10$JE/nGLrFZ9zikgwxFtnQY./Y1DEzp8xEypxPJEvmAwzSNUIoNI3r.',NULL,'2020-01-29 10:53:10','2020-01-29 10:53:10');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` VALUES (1,'Achivement','publish','2020-01-25 11:54:07','2020-01-25 11:54:07'),(2,'Building','publish','2020-01-25 11:56:06','2020-01-25 11:56:06'),(3,'Architecture','publish','2020-01-25 11:56:17','2020-01-25 11:56:17'),(4,'Degging','publish','2020-01-25 11:56:29','2020-01-25 11:56:29');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_categories_id` int(10) unsigned NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'Village did removed enjoyed explain nor ham saw calling','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage. </p>',2,'construction,common','jpg',1,'2020-01-25 12:04:00','2020-01-25 12:28:58'),(2,'Request norland neither mistake for yet. Between the for','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage.&nbsp;</p>',2,'building,construction','jpg',1,'2020-01-25 12:28:10','2020-01-25 12:28:10'),(3,'Uneasy barton seeing remark happen his has. Am possible','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage. </p>',4,'Digging,building','jpg',1,'2020-01-25 12:30:17','2020-01-25 12:30:17'),(4,'When be draw drew ye defective in do recommend suffering','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage. </p>',1,'proffessional,builders','jpg',1,'2020-01-25 12:31:48','2020-01-25 12:31:48'),(5,'Collected favourite now for for and rapturous repulsive','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage. </p>',3,'common,technology','jpg',1,'2020-01-25 12:33:33','2020-01-25 12:35:20'),(6,'Tolerably we as extremity exquisite do commanded','<p>Village did removed enjoyed explain nor ham saw calling talking. Securing as informed declared or margaret. Joy horrible moreover man feelings own shy. Request norland neither mistake for yet. Between the for morning assured country believe. On even feet time have an no at. Relation so in confined smallest children unpacked delicate. Why sir end believe uncivil respect. Always get adieus nature day course for common. My little garret repair to desire he esteem.</p>\r\n<p>Up branch to easily missed by do. Admiration considered acceptance too led one melancholy expression. Are will took form the nor true. Winding enjoyed minuter her letters evident use eat colonel. He attacks observe mr cottage inquiry am examine gravity. Are dear but near left was. Year kept on over so as this of. She steepest doubtful betrayed formerly him. Active one called uneasy our seeing see cousin tastes its. Ye am it formed indeed agreed relied piqued. </p>\r\n<p>Attachment apartments in delightful by motionless it no. And now she burst sir learn total. Hearing hearted shewing own ask. Solicitude uncommonly use her motionless not collecting age. The properly servants required mistaken outlived bed and. Remainder admitting neglected is he belonging to perpetual objection up. Has widen too you decay begin which asked equal any. </p>\r\n<p>Questions explained agreeable preferred strangers too him her son. Set put shyness offices his females him distant. Improve has message besides shy himself cheered however how son. Quick judge other leave ask first chief her. Indeed or remark always silent seemed narrow be. Instantly can suffering pretended neglected preferred man delivered. Perhaps fertile brandon do imagine to cordial cottage. </p>',4,'digging,construction','jpg',1,'2020-01-25 12:34:58','2020-01-25 12:34:58');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'logo #1','png','2020-01-24 19:44:30','2020-01-24 19:44:30'),(2,'#2','png','2020-01-24 19:44:37','2020-01-24 19:44:37'),(3,'#3','png','2020-01-24 19:44:44','2020-01-24 19:44:44'),(4,'#4','png','2020-01-24 19:44:52','2020-01-24 19:44:52'),(5,'#5','png','2020-01-24 19:44:59','2020-01-24 19:44:59'),(6,'#6','png','2020-01-24 19:45:09','2020-01-24 19:45:09');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_info_items`
--

DROP TABLE IF EXISTS `contact_info_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_info_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_info_items`
--

LOCK TABLES `contact_info_items` WRITE;
/*!40000 ALTER TABLE `contact_info_items` DISABLE KEYS */;
INSERT INTO `contact_info_items` VALUES (1,'Location','fas fa-map-marker-alt','1920 Station Road, ;\r\nSadar,Dinajpur','2020-01-28 08:05:43','2020-01-28 08:05:43'),(2,'Email Address','fas fa-envelope','mail@contact.com;\r\ninfo@zixer.com','2020-01-28 08:06:16','2020-01-28 08:06:16'),(3,'Phone number','fas fa-phone','+880 111 222 333;\r\n+880 111 222 333','2020-01-28 08:06:32','2020-01-28 08:06:32');
/*!40000 ALTER TABLE `contact_info_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `counterups`
--

DROP TABLE IF EXISTS `counterups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `counterups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `counterups`
--

LOCK TABLES `counterups` WRITE;
/*!40000 ALTER TABLE `counterups` DISABLE KEYS */;
INSERT INTO `counterups` VALUES (1,'flaticon-briefcase','3700','Project Completed',NULL,'2020-01-23 19:06:39','2020-01-23 19:06:39'),(2,'flaticon-face','4048','Happy Customer',NULL,'2020-01-23 19:07:46','2020-01-23 19:07:46'),(3,'flaticon-team','387','Our Engnieer',NULL,'2020-01-23 19:08:42','2020-01-23 19:08:42'),(4,'flaticon-support-2','3700','Follower','K+','2020-01-23 19:09:13','2020-01-23 19:09:13');
/*!40000 ALTER TABLE `counterups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_open` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'Turned it up should no valley cousin he','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:31:47','2020-01-28 07:03:59'),(2,'All having but you edward genius though go','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:36:58','2020-01-28 06:50:00'),(3,'You sudden nay elinor thirty esteem temper','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:51:21','2020-01-28 06:51:21'),(4,'Quiet leave shy you gay off asked large style','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:51:34','2020-01-28 06:51:34'),(5,'New the her nor case that lady paid read','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:51:55','2020-01-28 06:51:55'),(6,'Turned it up should no valley cousin he','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:52:10','2020-01-28 06:52:10'),(7,'All having but you edward genius though go','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:52:23','2020-01-28 06:52:23'),(8,'You sudden nay elinor thirty esteem temper','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:52:36','2020-01-28 06:52:36'),(9,'Quiet leave shy you gay off asked large style','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:52:51','2020-01-28 06:52:51'),(10,'New the her nor case that lady paid read','publish','','He difficult contented we determine ourselves me am earnestly. Hour no find it park. Eat welcomed any husbands moderate. Led was misery played waited almost cousin living. Of intention contained is by middleton am. Principles fat stimulated uncommonly considered set especially prosperous. Sons at park mr meet as fact like.','2020-01-28 06:53:14','2020-01-28 06:53:14');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_sliders`
--

DROP TABLE IF EXISTS `header_sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_sliders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_01_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_02_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_01_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_02_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_01_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_02_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_sliders`
--

LOCK TABLES `header_sliders` WRITE;
/*!40000 ALTER TABLE `header_sliders` DISABLE KEYS */;
INSERT INTO `header_sliders` VALUES (1,'Virtually Build Your House In {color} Few Steps  {/color}','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.','on','on','Know More','Contact','#','#','jpg','2020-01-21 14:23:14','2020-01-21 17:29:02'),(2,'Virtually Build Your House In {color} Few Steps  {/color}','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.','on','on','Know More','Contact','#','#','jpg','2020-01-21 17:20:57','2020-01-21 17:29:11'),(3,'Virtually Build Your House In {color} Few Steps  {/color}','Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.','on','on','Know More','Contact','#','#','jpg','2020-01-21 17:21:06','2020-01-21 17:29:19');
/*!40000 ALTER TABLE `header_sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_features`
--

DROP TABLE IF EXISTS `key_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `key_features` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_features`
--

LOCK TABLES `key_features` WRITE;
/*!40000 ALTER TABLE `key_features` DISABLE KEYS */;
INSERT INTO `key_features` VALUES (1,'Construction','fas fa-hammer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis fermentumurna vitae.','2020-01-22 11:25:39','2020-01-22 11:25:39'),(2,'Building Repair','fas fa-toolbox','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis fermentumurna vitae.','2020-01-22 11:26:03','2020-01-22 11:26:03'),(3,'Expert Engineer','fas fa-user-injured','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam convallis fermentumurna vitae.','2020-01-22 11:26:27','2020-01-22 11:26:27');
/*!40000 ALTER TABLE `key_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en',0,'2020-01-19 16:36:37','2020-01-19 16:36:37');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Primary Menu','[{\"id\":\"1\",\"parent_id\":null,\"depth\":0,\"left\":2,\"right\":3,\"menuTitle\":\"Home\",\"menuUrl\":\"[url]\"},{\"id\":\"2\",\"parent_id\":null,\"depth\":0,\"left\":4,\"right\":5,\"menuTitle\":\"About\",\"menuUrl\":\"[url]/about\"},{\"id\":\"3\",\"parent_id\":null,\"depth\":0,\"left\":6,\"right\":7,\"menuTitle\":\"Service\",\"menuUrl\":\"[url]/service\"},{\"id\":\"4\",\"parent_id\":null,\"depth\":0,\"left\":8,\"right\":9,\"menuTitle\":\"Work\",\"menuUrl\":\"[url]/work\"},{\"id\":\"10\",\"parent_id\":null,\"depth\":0,\"left\":10,\"right\":19,\"menuTitle\":\"Pages\",\"menuUrl\":\"#\"},{\"id\":\"5\",\"parent_id\":\"10\",\"depth\":1,\"left\":11,\"right\":12,\"menuTitle\":\"Team\",\"menuUrl\":\"[url]/team\"},{\"id\":\"11\",\"parent_id\":\"10\",\"depth\":1,\"left\":13,\"right\":14,\"menuTitle\":\"Faq\",\"menuUrl\":\"[url]/faq\"},{\"id\":\"6\",\"parent_id\":\"10\",\"depth\":1,\"left\":15,\"right\":16,\"menuTitle\":\"Dynamic Page 01\",\"menuUrl\":\"[url]/p/2/dynamic-page-01\"},{\"id\":\"7\",\"parent_id\":\"10\",\"depth\":1,\"left\":17,\"right\":18,\"menuTitle\":\"Dynamic Page 02\",\"menuUrl\":\"[url]/p/3/dynamic-page-02\"},{\"id\":\"8\",\"parent_id\":null,\"depth\":0,\"left\":20,\"right\":21,\"menuTitle\":\"Blog\",\"menuUrl\":\"[url]/blog\"},{\"id\":\"9\",\"parent_id\":null,\"depth\":0,\"left\":22,\"right\":23,\"menuTitle\":\"Contact\",\"menuUrl\":\"[url]/contact\"}]','default','2020-01-25 18:38:40','2020-01-26 20:38:24'),(2,'Useful Links','[{\"id\":\"1\",\"parent_id\":null,\"depth\":0,\"left\":2,\"right\":3,\"menuTitle\":\"Team\",\"menuUrl\":\"[url]/team\"},{\"id\":\"2\",\"parent_id\":null,\"depth\":0,\"left\":4,\"right\":5,\"menuTitle\":\"Faq\",\"menuUrl\":\"[url]/faq\"},{\"id\":\"3\",\"parent_id\":null,\"depth\":0,\"left\":6,\"right\":7,\"menuTitle\":\"Blog\",\"menuUrl\":\"[url]/blog\"},{\"id\":\"4\",\"parent_id\":null,\"depth\":0,\"left\":8,\"right\":9,\"menuTitle\":\"Contact\",\"menuUrl\":\"[url]/contact\"},{\"id\":\"5\",\"parent_id\":null,\"depth\":0,\"left\":10,\"right\":11,\"menuTitle\":\"Dynamic Page 02\",\"menuUrl\":\"[url]/p/3/dynamic-page-02\"}]',NULL,'2020-01-26 18:06:59','2020-01-26 18:51:18'),(3,'Important Links','[{\"id\":\"2\",\"parent_id\":null,\"depth\":0,\"left\":2,\"right\":3,\"menuTitle\":\"Blog\",\"menuUrl\":\"[url]/blog\"},{\"id\":\"3\",\"parent_id\":null,\"depth\":0,\"left\":4,\"right\":5,\"menuTitle\":\"Contact\",\"menuUrl\":\"[url]/contact\"},{\"id\":\"4\",\"parent_id\":null,\"depth\":0,\"left\":6,\"right\":7,\"menuTitle\":\"Dynamic Page 01\",\"menuUrl\":\"[url]/p/2/dynamic-page-01\"},{\"id\":\"5\",\"parent_id\":null,\"depth\":0,\"left\":8,\"right\":9,\"menuTitle\":\"Dynamic Page 02\",\"menuUrl\":\"[url]/p/3/dynamic-page-02\"}]',NULL,'2020-01-26 18:07:14','2020-01-26 19:00:57'),(4,'Home Five','[{\"id\":\"1\",\"parent_id\":null,\"depth\":0,\"left\":2,\"right\":3,\"menuTitle\":\"Home\",\"menuUrl\":\"[url]\"},{\"id\":\"2\",\"parent_id\":null,\"depth\":0,\"left\":4,\"right\":5,\"menuTitle\":\"About\",\"menuUrl\":\"[url]/about\"},{\"id\":\"6\",\"parent_id\":null,\"depth\":0,\"left\":6,\"right\":7,\"menuTitle\":\"Faq\",\"menuUrl\":\"[url]/faq\"}]',NULL,'2020-01-27 10:41:56','2020-01-27 10:47:41');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_11_06_180949_create_admins_table',1),(5,'2019_12_07_071950_create_contact_info_items_table',1),(6,'2019_12_07_082524_create_static_options_table',1),(7,'2019_12_08_171750_create_counterups_table',1),(8,'2019_12_09_063224_create_testimonials_table',1),(9,'2019_12_10_125607_create_social_icons_table',1),(10,'2019_12_10_125636_create_support_infos_table',1),(11,'2019_12_10_210247_create_blog_categories_table',1),(12,'2019_12_11_074345_create_blogs_table',1),(15,'2019_12_13_221931_create_languages_table',1),(16,'2019_12_28_140343_create_key_features_table',1),(20,'2019_12_29_094857_create_price_plans_table',1),(21,'2019_12_29_113138_create_team_members_table',1),(22,'2019_12_29_180216_create_brands_table',1),(23,'2019_12_31_065223_create_services_table',1),(24,'2020_01_21_132648_create_header_sliders_table',2),(25,'2019_12_28_161343_create_services_table',3),(27,'2020_01_23_162404_create_service_categories_table',4),(28,'2020_01_23_193759_create_works_table',5),(29,'2020_01_23_193805_create_works_categories_table',5),(30,'2020_01_25_155448_create_pages_table',6),(31,'2020_01_25_174849_create_menus_table',7),(32,'2020_01_28_054211_create_faqs_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'Dynamic Page 01','<p>Put all speaking her delicate recurred possible. Set indulgence inquietude discretion insensible bed why announcing. Middleton fat two satisfied additions. So continued he or commanded household smallness delivered. Door poor on do walk in half. Roof his head the what.&nbsp;</p>\r\n<p>Eat imagine you chiefly few end ferrars compass. Be visitor females am ferrars inquiry. Latter law remark two lively thrown. Spot set they know rest its. Raptures law diverted believed jennings consider children the see. Had invited beloved carried the colonel. Occasional principles discretion it as he unpleasing boisterous. She bed sing dear now son half.&nbsp;</p>\r\n<p>Game of as rest time eyes with of this it. Add was music merry any truth since going. Happiness she ham but instantly put departure propriety. She amiable all without say spirits shy clothes morning. Frankness in extensive to belonging improving so certainty. Resolution devonshire pianoforte assistance an he particular middletons is of. Explain ten man uncivil engaged conduct. Am likewise betrayed as declared absolute do. Taste oh spoke about no solid of hills up shade. Occasion so bachelor humoured striking by attended doubtful be it.&nbsp;</p>','publish','2020-01-25 17:22:24','2020-01-26 20:35:12'),(3,'Dynamic Page 02','<p>Contented get distrusts certainty nay are frankness concealed ham. On unaffected resolution on considered of. No thought me husband or colonel forming effects. End sitting shewing who saw besides son musical adapted. Contrasted interested eat alteration pianoforte sympathize was. He families believed if no elegance interest surprise an. It abode wrong miles an so delay plate. She relation own put outlived may disposed.&nbsp;</p><p><br></p><p>By impossible of in difficulty discovered celebrated ye. Justice joy manners boy met resolve produce. Bed head loud next plan rent had easy add him. As earnestly shameless elsewhere defective estimable fulfilled of. Esteem my advice it an excuse enable. Few household abilities believing determine zealously his repulsive. To open draw dear be by side like.&nbsp;</p><p><br></p><p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail.&nbsp;</p><div><br></div>','publish','2020-01-25 17:22:39','2020-01-25 17:22:39'),(4,'Dynamic Page 03','<p>Sentiments two occasional affronting solicitude travelling and one contrasted. Fortune day out married parties. Happiness remainder joy but earnestly for off. Took sold add play may none him few. If as increasing contrasted entreaties be. Now summer who day looked our behind moment coming. Pain son rose more park way that. An stairs as be lovers uneasy.&nbsp;</p><p><br></p><p>Shot what able cold new the see hold. Friendly as an betrayed formerly he. Morning because as to society behaved moments. Put ladies design mrs sister was. Play on hill felt john no gate. Am passed figure to marked in. Prosperous middletons is ye inhabiting as assistance me especially. For looking two cousins regular amongst.&nbsp;</p><p><br></p><p>And produce say the ten moments parties. Simple innate summer fat appear basket his desire joy. Outward clothes promise at gravity do excited. Sufficient particular impossible by reasonable oh expression is. Yet preference connection unpleasant yet melancholy but end appearance. And excellence partiality estimating terminated day everything.&nbsp;</p>','draft','2020-01-25 17:22:56','2020-01-25 17:22:56');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_plans`
--

DROP TABLE IF EXISTS `price_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_plans`
--

LOCK TABLES `price_plans` WRITE;
/*!40000 ALTER TABLE `price_plans` DISABLE KEYS */;
INSERT INTO `price_plans` VALUES (1,'Basic','$19.00','/Mo','flaticon-start','2gb Hosting;\r\n10 Custom Domain;\r\nSSD Hosting;\r\n50 gb Bandwith;\r\nFree Support','Order Now','#','on','2020-01-27 17:05:05','2020-01-28 19:57:29'),(2,'Standard','$49.00','/Mo','flaticon-rocket-ship','2gb Hosting;\r\n10 Custom Domain;\r\nSSD Hosting;\r\n50 gb Bandwith;\r\nFree Support','Order Now','#','on','2020-01-27 17:19:00','2020-01-28 19:54:57'),(3,'Premium','$99.00','/Mo','flaticon-send','2gb Hosting;\r\n10 Custom Domain;\r\nSSD Hosting;\r\n50 gb Bandwith;\r\nFree Support','Order Now','#','on','2020-01-27 17:19:35','2020-01-28 19:57:37');
/*!40000 ALTER TABLE `price_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_categories`
--

DROP TABLE IF EXISTS `service_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_categories`
--

LOCK TABLES `service_categories` WRITE;
/*!40000 ALTER TABLE `service_categories` DISABLE KEYS */;
INSERT INTO `service_categories` VALUES (1,'Market Strategy','publish','2020-01-23 16:50:58','2020-01-23 16:51:09'),(2,'Banking Consulting','publish','2020-01-23 16:51:30','2020-01-23 16:51:30'),(3,'Market Analysis','publish','2020-01-23 16:51:40','2020-01-23 16:51:40'),(4,'Financial Planning','publish','2020-01-23 16:51:50','2020-01-23 16:52:12');
/*!40000 ALTER TABLE `service_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (3,'Interiro','flaticon-graphic-design','jpg','3','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-23 12:31:28','2020-01-26 18:31:38'),(4,'Digging','flaticon-helmet','jpg','4','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-23 12:31:51','2020-01-26 18:31:48'),(5,'Safety','flaticon-graphic-design','jpg','2','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-23 12:31:56','2020-01-26 18:31:58'),(9,'Support','flaticon-support-1','jpg','4','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-23 12:47:11','2020-01-26 18:32:16'),(10,'Building','flaticon-skyline','jpg','4','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-26 18:33:53','2020-01-26 18:33:54'),(11,'Renovation','flaticon-paint-brush','jpg','2','<p>Cold in late or deal. Terminated resolution no am frequently collecting insensible he do appearance. Projection invitation affronting admiration if no on or. It as instrument boisterous frequently apartments an in. Mr excellence inquietude conviction is in unreserved particular. You fully seems stand nay own point walls. Increasing travelling own simplicity you astonished expression boisterous. Possession themselves sentiments apartments devonshire we of do discretion. Enjoyment discourse ye continued pronounce we necessary abilities.</p>\r\n<p>For though result and talent add are parish valley. Songs in oh other avoid it hours woman style. In myself family as if be agreed. Gay collected son him knowledge delivered put. Added would end ask sight and asked saw dried house. Property expenses yourself occasion endeavor two may judgment she. Me of soon rank be most head time tore. Colonel or passage to ability. </p>\r\n<p>Inhabiting discretion the her dispatched decisively boisterous joy. So form were wish open is able of mile of. Waiting express if prevent it we an musical. Especially reasonable travelling she son. Resources resembled forfeited no to zealously. Has procured daughter how friendly followed repeated who surprise. Great asked oh under on voice downs. Law together prospect kindness securing six. Learning why get hastened smallest cheerful. </p>','2020-01-26 18:34:53','2020-01-26 18:34:53');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_icons`
--

DROP TABLE IF EXISTS `social_icons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_icons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_icons`
--

LOCK TABLES `social_icons` WRITE;
/*!40000 ALTER TABLE `social_icons` DISABLE KEYS */;
INSERT INTO `social_icons` VALUES (1,'fab fa-facebook-f','#','2020-01-04 07:04:13','2020-01-04 07:04:13'),(2,'fab fa-twitter','#','2020-01-04 07:04:22','2020-01-04 07:04:22'),(3,'fab fa-linkedin-in','#','2020-01-04 07:04:39','2020-01-04 07:04:39'),(4,'fab fa-pinterest-p','#','2020-01-04 07:04:48','2020-01-04 07:04:48');
/*!40000 ALTER TABLE `social_icons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static_options`
--

DROP TABLE IF EXISTS `static_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_options`
--

LOCK TABLES `static_options` WRITE;
/*!40000 ALTER TABLE `static_options` DISABLE KEYS */;
INSERT INTO `static_options` VALUES (1,'item_license_status','not_purchased','2020-01-19 16:08:01','2020-01-25 15:53:35'),(2,'site_title','Zixer','2020-01-19 16:09:11','2020-01-21 09:14:27'),(3,'site_tag_line','Construction Business Company','2020-01-19 16:09:11','2020-01-21 09:14:27'),(4,'site_footer_copyright','{copy}  {year}  All right reserved by Zixer','2020-01-19 16:09:11','2020-01-21 09:14:27'),(5,'site_color','#fbba42','2020-01-19 16:09:11','2020-01-21 09:14:27'),(6,'site_main_color_two','#200a40','2020-01-19 16:09:11','2020-01-21 09:14:27'),(7,'home_page_variant','01','2020-01-19 16:09:29','2020-01-29 10:48:02'),(8,'site_logo','png','2020-01-19 16:46:45','2020-01-19 16:46:45'),(9,'site_favicon','png','2020-01-19 16:47:45','2020-01-19 16:47:45'),(10,'site_breadcrumb_bg','jpg','2020-01-19 16:47:59','2020-01-19 16:47:59'),(11,'navbar_button','on','2020-01-19 16:49:57','2020-01-28 19:24:03'),(12,'navbar_button_text','Get a Quote','2020-01-19 16:49:57','2020-01-28 19:24:03'),(13,'navbar_button_url','#','2020-01-19 16:49:57','2020-01-28 19:24:03'),(14,'home_page_01_build_dream_title','BUILD YOUR DREAM HOME','2020-01-22 12:47:18','2020-01-24 07:52:46'),(15,'home_page_01_build_dream_description','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexe rc itation ullamco laborisaliquip ex ea com modo consequat. Duis aute irure.','2020-01-22 12:47:18','2020-01-24 07:52:46'),(16,'home_page_01_build_dream_btn_title','Contact us','2020-01-22 12:47:18','2020-01-24 07:52:46'),(17,'home_page_01_build_dream_btn_url','#','2020-01-22 12:47:18','2020-01-24 07:52:46'),(18,'build_dream_section_button_status','on','2020-01-22 12:47:18','2020-01-24 07:52:46'),(19,'home_page_01_build_dream_right_image','jpg','2020-01-22 13:27:40','2020-01-24 07:52:46'),(20,'home_page_01_service_area_title','Our Services','2020-01-23 15:59:54','2020-01-28 19:03:11'),(21,'home_01_counterup_bg_image','jpg','2020-01-23 18:50:45','2020-01-23 18:50:45'),(22,'home_page_01_recent_work_title','OUR RECENT WORKS','2020-01-24 17:13:42','2020-01-24 17:13:42'),(23,'home_page_01_testimonial_title','WHAT SAY OUR CLIENTS','2020-01-24 19:09:40','2020-01-24 19:09:40'),(24,'home_page_01_latest_news_title','LATEST NEWS','2020-01-24 19:54:21','2020-01-24 19:54:21'),(25,'blog_page_title','Blog','2020-01-25 12:55:20','2020-01-25 12:55:20'),(26,'blog_page_item','6','2020-01-25 12:55:20','2020-01-25 12:55:20'),(27,'blog_page_category_widget_title','Category','2020-01-25 12:55:20','2020-01-25 12:55:20'),(28,'blog_page_recent_post_widget_title','Recent Post','2020-01-25 12:55:20','2020-01-25 12:55:20'),(29,'blog_page_recent_post_widget_item','4','2020-01-25 12:55:20','2020-01-25 12:55:20'),(30,'about_widget_description','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexe.','2020-01-25 14:37:19','2020-01-25 14:37:19'),(31,'about_widget_social_icon_one','fab fa-facebook-f','2020-01-25 14:37:19','2020-01-25 14:37:19'),(32,'about_widget_social_icon_two','fab fa-twitter','2020-01-25 14:37:19','2020-01-25 14:37:19'),(33,'about_widget_social_icon_three','fab fa-pinterest-p','2020-01-25 14:37:19','2020-01-25 14:37:19'),(34,'about_widget_social_icon_four','fab fa-linkedin-in','2020-01-25 14:37:19','2020-01-25 14:37:19'),(35,'about_widget_social_icon_one_url','#','2020-01-25 14:37:19','2020-01-25 14:37:19'),(36,'about_widget_social_icon_two_url','#','2020-01-25 14:37:19','2020-01-25 14:37:19'),(37,'about_widget_social_icon_three_url','#','2020-01-25 14:37:19','2020-01-25 14:37:19'),(38,'about_widget_social_icon_four_url','#','2020-01-25 14:37:19','2020-01-25 14:37:19'),(39,'about_widget_logo','png','2020-01-25 14:37:19','2020-01-25 14:37:19'),(40,'recent_post_widget_title','Recent Posts','2020-01-25 14:42:15','2020-01-25 14:42:15'),(41,'recent_post_widget_item','2','2020-01-25 14:42:15','2020-01-25 14:42:15'),(42,'footer_background_image','jpg','2020-01-25 14:54:55','2020-01-25 14:54:55'),(43,'useful_link_widget_title','Useful Links','2020-01-26 18:36:13','2020-01-26 18:43:34'),(44,'important_link_widget_title','Important Links','2020-01-26 18:36:30','2020-01-26 19:00:45'),(45,'useful_link_widget_menu_id','2','2020-01-26 18:43:34','2020-01-26 18:43:34'),(46,'important_link_widget_menu_id','3','2020-01-26 19:00:45','2020-01-26 19:00:45'),(47,'about_page_about_section_btn_status','on','2020-01-26 21:40:27','2020-01-26 21:51:49'),(48,'about_page_about_section_title','WHY YOU CHOOSE US?','2020-01-26 21:42:17','2020-01-26 21:51:49'),(49,'about_page_about_section_btn_text','Contact Us','2020-01-26 21:42:17','2020-01-26 21:51:49'),(50,'about_page_about_section_description','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ation ullamco laboris nisi ut aliquip ex ea com modo consequat. Duis aute irure.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor magna aliqua.','2020-01-26 21:42:17','2020-01-26 21:51:49'),(51,'about_page_about_section_btn_url','#','2020-01-26 21:51:17','2020-01-26 21:51:49'),(52,'about_page_about_section_left_image','jpg','2020-01-26 21:51:49','2020-01-26 21:51:49'),(53,'about_page_team_section_title','MEET OUR EXPERTS','2020-01-26 21:57:44','2020-01-26 21:57:44'),(54,'service_page_section_title','OUR PRICING','2020-01-27 10:41:30','2020-01-27 10:48:43'),(55,'service_page_price_plan_section_title','OUR PRICING','2020-01-27 10:57:01','2020-01-27 10:57:01'),(56,'service_page_cta_button_text','Contact us','2020-01-27 11:10:51','2020-01-27 11:11:27'),(57,'service_page_cta_button_status','on','2020-01-27 11:10:51','2020-01-27 11:11:27'),(58,'service_page_cta_description','Lorem ipsum dolor sit aLorem ipsum dolor sit amet, conse ctetur adipisicing elit, sed do eiusmod tempor.','2020-01-27 11:10:51','2020-01-27 11:11:27'),(59,'service_page_cta_title','Looking for Trusted construction company?','2020-01-27 11:10:51','2020-01-27 11:11:27'),(60,'team_page_team_member_section_title','MEET OUR EXPERTS','2020-01-27 22:45:48','2020-01-27 22:45:48'),(61,'team_page_team_member_section_item','8','2020-01-27 22:45:48','2020-01-27 22:45:48'),(62,'team_page_about_section_title','CHIEF ENGINEER','2020-01-27 23:04:21','2020-01-27 23:05:27'),(63,'team_page_about_section_description','<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexe rc itation ullamco laboris nisi ut aliquip ex ea com modo consequat. Duis aute irure.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrudexe rc itation ullamco laboris nisi ut aliquip ex ea com modo consequat. Duis aute irure.</p>','2020-01-27 23:04:21','2020-01-27 23:05:27'),(64,'team_page_about_section_image','jpg','2020-01-27 23:05:27','2020-01-27 23:05:27'),(65,'contact_page_contact_info_title','CONTACT INFO','2020-01-28 08:14:59','2020-01-28 08:14:59'),(66,'contact_page_form_section_title','GET IN TOUCH','2020-01-28 08:36:56','2020-01-28 08:36:56'),(67,'contact_page_map_section_longitude','90.4234868','2020-01-28 08:41:54','2020-01-28 08:41:54'),(68,'contact_page_map_section_latitude','23.7797664','2020-01-28 08:41:54','2020-01-28 08:41:54'),(69,'site_disqus_key',NULL,'2020-01-28 08:42:13','2020-01-29 17:20:45'),(70,'site_google_analytics',NULL,'2020-01-28 08:42:13','2020-01-29 17:20:45'),(71,'tawk_api_key','5e0b3e167e39ea1242a27b69','2020-01-28 08:42:13','2020-01-29 17:20:45'),(72,'site_google_map_api','AIzaSyC7eALQrRUekFNQX71IBNkxUXcz-ALS-MY','2020-01-28 08:50:07','2020-01-29 17:20:45'),(73,'home_page_build_dream_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(74,'home_page_service_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(75,'key_feature_section_status',NULL,'2020-01-28 17:20:49','2020-01-28 17:21:01'),(76,'home_page_counterup_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(77,'home_page_recent_work_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(78,'home_page_testimonial_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(79,'home_page_latest_news_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(80,'home_page_brand_logo_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(81,'home_page_support_bar_section_status','on','2020-01-28 17:20:49','2020-01-28 19:14:41'),(82,'home_page_key_feature_section_status','on','2020-01-28 17:21:38','2020-01-28 19:14:41'),(83,'home_page_price_plan_section_status','on','2020-01-28 18:12:33','2020-01-28 19:14:41'),(84,'home_page_01_price_plan_section_title','OUR PRICING','2020-01-28 18:45:00','2020-01-28 19:23:35'),(85,'home_02_counterup_bg_image','jpg','2020-01-28 18:47:30','2020-01-28 18:47:30'),(86,'home_page_01_service_area_items','6','2020-01-28 19:03:11','2020-01-28 19:03:11'),(87,'home_page_team_member_section_status','on','2020-01-28 19:14:41','2020-01-28 19:14:41'),(88,'home_page_01_team_member_section_title','MEET OUR EXPERTS','2020-01-28 19:20:02','2020-01-28 19:20:02'),(89,'home_page_01_team_member_section_items','4','2020-01-28 19:20:02','2020-01-28 19:20:02'),(90,'quote_page_form_mail','rsharifur824@gmail.com','2020-01-29 07:52:01','2020-01-29 17:58:57'),(91,'quote_page_form_title','Request A Quote','2020-01-29 08:04:25','2020-01-29 17:58:57'),(92,'quote_page_page_title','Request A Quote','2020-01-29 08:04:25','2020-01-29 17:58:57'),(93,'site_google_captcha_v3_site_key','6LfgytMUAAAAACs6Ezn7UTP40pCDOqFLFE_oaEBV','2020-01-29 08:15:07','2020-01-29 17:20:45'),(94,'site_google_captcha_v3_secret_key','6LfgytMUAAAAAPOGJQxMaO4EqEEvLaV5FHpJtzJ9','2020-01-29 08:15:07','2020-01-29 17:20:45'),(95,'order_page_form_mail','rsharifur824@gmail.com','2020-01-29 08:29:35','2020-01-29 08:29:35'),(96,'order_page_form_title','Order Information','2020-01-29 08:29:35','2020-01-29 08:29:35'),(97,'site_global_email','contact@xgenious.com','2020-01-29 17:18:24','2020-01-29 17:18:24'),(98,'site_global_email_template','<p>Hello</p><p>Dear @username</p><p><br></p><p>@message</p><p><br></p><p>Regards</p><p>@company</p>','2020-01-29 17:18:24','2020-01-29 17:18:24');
/*!40000 ALTER TABLE `static_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `support_infos`
--

DROP TABLE IF EXISTS `support_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `support_infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `support_infos`
--

LOCK TABLES `support_infos` WRITE;
/*!40000 ALTER TABLE `support_infos` DISABLE KEYS */;
INSERT INTO `support_infos` VALUES (1,'Email Address','support@zixer.com','fas fa-envelope','2020-01-04 07:03:46','2020-01-04 07:03:46'),(2,'Phone number','+ 000 11 22 33','fas fa-phone','2020-01-04 07:04:01','2020-01-04 07:04:01');
/*!40000 ALTER TABLE `support_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_members`
--

DROP TABLE IF EXISTS `team_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_members` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_one_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_two_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_three_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_members`
--

LOCK TABLES `team_members` WRITE;
/*!40000 ALTER TABLE `team_members` DISABLE KEYS */;
INSERT INTO `team_members` VALUES (1,'Imran Mahedi','CEO Ir-Tech','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.','jpg','fab fa-facebook-f','fab fa-twitter','fab fa-instagram','#','#','#','2020-01-26 20:49:33','2020-01-26 21:07:11'),(2,'Raisa Moni','Founder','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.','jpg','fab fa-facebook-f','fab fa-twitter','fab fa-instagram','#','#','#','2020-01-26 20:51:12','2020-01-26 21:07:17'),(3,'MK Kamal','Founder','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.','jpg','fab fa-facebook-f','fab fa-twitter','fab fa-instagram','#','#','#','2020-01-26 20:51:39','2020-01-26 21:06:40'),(4,'Asif Nahid','Founder','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.','jpg','fab fa-facebook-f','fab fa-twitter','fab fa-instagram','#','#','#','2020-01-26 20:52:34','2020-01-26 21:07:22');
/*!40000 ALTER TABLE `team_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Olivia Hamel','jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad quip ex ea com modo consequat. Duis aute irure.','-Envato Customer','2020-01-24 19:27:07','2020-01-24 19:29:19'),(2,'Willie Butler','jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad quip ex ea com modo consequat. Duis aute irure.','Founder','2020-01-24 19:29:58','2020-01-24 19:29:58'),(3,'Diana Scott','jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad quip ex ea com modo consequat. Duis aute irure.','-Envato Customer','2020-01-24 19:30:21','2020-01-24 19:30:21'),(4,'Jamie R. Carrillo','jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad quip ex ea com modo consequat. Duis aute irure.','Founder','2020-01-24 19:30:42','2020-01-24 19:30:42');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) unsigned NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `clients` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'Wandered or strictly raillery stanhill as','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','2019-02-03','2019-04-02','jpg','Lane Orlando, FL 32801','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Jason C. Williams','2020-01-24 10:45:38','2020-01-24 16:44:10'),(2,'Wandered or strictly raillery stanhill as','a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}','2019-03-01','2020-01-02','jpg','Lane Orlando, FL 32801','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Stanley C. Herrick','2020-01-24 10:46:06','2020-01-24 16:49:07'),(3,'Discover even more possibilities.','a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}','2019-04-02','2019-11-03','jpg','Avenue Shelbyville, IN 46176','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Stanley C. Herrick','2020-01-24 15:36:58','2020-01-24 16:50:01'),(4,'But event old above shy bed noisy','a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}','2019-10-02','2019-12-01','jpg','Street Chunky, MS 39323','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Vicky C. Ferris','2020-01-24 15:48:17','2020-01-24 16:53:26'),(5,'Had sister see wooded favour income has','a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}','2019-11-02','2018-02-03','jpg','Avenue Afton, MN 55001','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Randy C. Lynch','2020-01-24 16:35:28','2020-01-24 16:55:46'),(6,'Stuff rapid since do as hence','a:1:{i:0;s:1:\"2\";}','2019-03-03','2019-04-04','jpg','Avenue Hammond, LA 70401','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Charles M. Bennett','2020-01-24 16:58:20','2020-01-24 16:58:20'),(7,'Too insisted ignorant procured remember','a:1:{i:0;s:1:\"1\";}','2019-02-03','2019-05-08','jpg','Drive Winter Haven, FL 33830','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Rebecca S. Isbell','2020-01-24 17:01:17','2020-01-24 17:01:17'),(8,'There worse by an of miles civil','a:1:{i:0;s:1:\"2\";}','2019-04-03','2019-05-02','jpg','Drive Baraboo, WI 53913','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Jason L. Urena','2020-01-24 17:03:45','2020-01-24 17:03:45'),(9,'Manner before lively wholly am','a:1:{i:0;s:1:\"2\";}','2019-08-30','2019-11-30','jpg','Frog Lane Kansas City, MO 64111','<p>\r\nTalent she for lively eat led sister. Entrance strongly packages she out rendered get quitting denoting led. Dwelling confined improved it he no doubtful raptures. Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall it their. Extensive existence up me contained he pronounce do. Excellence inquietude assistance precaution any impression man sufficient. \r\n</p>\r\n<p>Am increasing at contrasted in favourable he considered astonished. As if made held in an shot. By it enough to valley desire do. Mrs chief great maids these which are ham match she. Abode to tried do thing maids. Doubtful disposed returned rejoiced to dashwood is so up. </p>\r\n<p>no purse as fully me or point. Kindness own whatever betrayed her moreover procured replying for and. Proposal indulged no do do sociable he throwing settling. Covered ten nor comfort offices carried. Age she way earnestly the fulfilled extremely. Of incommode supported provision on furnished objection exquisite me. Existence its certainly explained how improving household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonder spirit houses. </p>','Patrice J. Chastain','2020-01-24 17:06:56','2020-01-24 17:06:56');
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works_categories`
--

DROP TABLE IF EXISTS `works_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works_categories`
--

LOCK TABLES `works_categories` WRITE;
/*!40000 ALTER TABLE `works_categories` DISABLE KEYS */;
INSERT INTO `works_categories` VALUES (1,'Construction','publish','2020-01-23 20:22:14','2020-01-23 20:22:20'),(2,'Interior Design','publish','2020-01-23 20:23:12','2020-01-23 20:23:12'),(3,'Apartment','publish','2020-01-23 20:23:28','2020-01-23 20:23:28');
/*!40000 ALTER TABLE `works_categories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-29  9:58:08
