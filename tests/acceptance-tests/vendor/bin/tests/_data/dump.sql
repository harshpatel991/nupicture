-- MySQL dump 10.13  Distrib 5.6.22, for osx10.8 (x86_64)
--
-- Host: 192.168.55.55    Database: homestead
-- ------------------------------------------------------
-- Server version	5.6.19-1~exp1ubuntu2

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_28_211035_create_notifications_table',1),('2015_05_28_211312_create_posts_table',1),('2015_06_07_005408_add_post_category',1),('2015_06_09_214151_add_thumbnail_column',1),('2015_06_20_222637_create_payouts_table',1),('2015_07_10_223805_create_sections_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `notifications_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payouts`
--

DROP TABLE IF EXISTS `payouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payouts` (
  `content_type` enum('image','short_text','list','article') COLLATE utf8_unicode_ci NOT NULL,
  `base` int(11) NOT NULL,
  `per_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payouts`
--

LOCK TABLES `payouts` WRITE;
/*!40000 ALTER TABLE `payouts` DISABLE KEYS */;
INSERT INTO `payouts` VALUES ('image',40,1),('short_text',40,1),('list',200,2),('article',400,3);
/*!40000 ALTER TABLE `payouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `status` enum('pending_post','saved','rejected','posted') COLLATE utf8_unicode_ci NOT NULL,
  `admin_message` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'pending_post',NULL,'A Pending Post','post-1',0,'2015-05-27 05:32:22','2015-05-28 01:25:43','art','super-computer-1.jpg'),(2,1,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','post-2',0,'2015-05-23 05:28:43','2015-05-26 03:25:43','cute','2.jpg'),(3,1,'posted',NULL,'The most powerful supercomputer in Spain, the MareNostrum','the-most-powerful-supercomputer-in-',123,'2015-05-21 04:25:43','2015-05-22 03:25:43','woah','super-computer-1.jpg'),(4,1,'posted',NULL,'Street Art in Busan, South Korea','street-art-busan-south-korea',100,'2015-05-19 03:25:43','2015-05-26 03:25:43','interesting','street-art.jpg'),(5,2,'posted',NULL,'3D Metal Printed Faucets','3d-metal-printed-faucets',200,'2015-05-15 03:25:43','2015-05-26 03:25:43','photograph','sink-1.jpg'),(6,2,'posted',NULL,'10 Awesome Cinemagraphs','10-awesome-cinemagraphs',200,'2015-05-15 03:25:43','2015-05-26 03:25:43','photograph','cinemagraph-thumb.jpg'),(7,2,'posted',NULL,'White Northern Lights','white-northern-lights',200,'2015-05-15 03:25:43','2015-05-26 03:25:43','photograph','northern-1.jpg'),(8,2,'posted',NULL,'WIRED\'s beautifully redesigned San Francisco office','wireds-beautifully-redesigned-san-f',200,'2015-05-15 03:25:43','2015-05-26 03:25:43','photograph','wired-1.jpg'),(10,3,'pending_post',NULL,'A Pending Post','post-10',16000,'2015-05-27 05:32:22','2015-05-28 01:25:43','art','super-computer-1.jpg'),(11,3,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','post-11',18000,'2015-05-23 05:28:43','2015-05-26 03:25:43','cute','2.jpg'),(12,3,'posted',NULL,'The most powerful supercomputer in Spain, the MareNostrum','post-12',4000,'2015-05-21 04:25:43','2015-05-22 03:25:43','funny','super-computer-1.jpg'),(13,3,'posted',NULL,'Street Art Found in Busan, South Korea','post-13',3000,'2015-05-19 03:25:43','2015-05-26 03:25:43','interesting','2.jpg'),(15,4,'pending_post',NULL,'A Pending Post','post-15',0,'2015-05-27 05:32:22','2015-05-28 01:25:43','art','super-computer-1.jpg'),(16,4,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','post-16',0,'2015-05-23 05:28:43','2015-05-26 03:25:43','cute','2.jpg'),(17,4,'posted',NULL,'The most powerful supercomputer in Spain, the MareNostrum','post-17',123,'2015-05-21 04:25:43','2015-05-22 03:25:43','funny','super-computer-1.jpg'),(18,4,'posted',NULL,'Street Art Found in Busan, South Korea','post-18',100,'2015-05-19 03:25:43','2015-05-26 03:25:43','interesting','2.jpg'),(19,4,'posted',NULL,'3D Metal Printed Faucets','post-19',200,'2015-05-15 03:25:43','2015-05-26 03:25:43','photograph','sink-1.jpg');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `type` enum('section-text','section-image','section-listnumber','section-youtube','section-source') COLLATE utf8_unicode_ci NOT NULL,
  `optional_content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `sections_post_id_foreign` (`post_id`),
  CONSTRAINT `sections_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,5,'section-text','','American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. These faucets are expected to begin to ready for production by June 2016.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,'section-text','','<i>The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction. -American Standard</i>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,5,'section-image','','sink-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,5,'section-image','','sink-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,5,'section-image','','sink-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,5,'section-image','','sink-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,5,'section-image','','sink-5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,6,'section-image','http://www.reddit.com/user/relevant__comment','cinemagraph-1.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,6,'section-image','http://bonvallet.deviantart.com','cinemagraph-2.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,7,'section-text','','These white Northern Lights appeared in Finland. The Northern Lights are a beautiful display caused by emissions from the sun hitting the Earth\'s atmosphere. These images reveal a fairly common display of the Aurora Borealis. Usually images of the Aurora Borealis are captured on images as having a very vibrant appearance while in reality, your eyes would see a grey-ish image closer to what you see below.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,7,'section-image','','northern-super-computer-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,7,'section-image','','northern-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,7,'section-image','','northern-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,8,'section-text','','Scott Dadich, the editor in chief at WIRED ordered the San Francisco office of the tech news super giant to be redesigned. <br><br>WIRED hired Gensler to give their office a new, modern look. They followed the approach taken by many Silicon Valley tech companies: open floor plans allowing for easy team communication. Some have critizied these types floor plans. Citing that these plans serve only to reduce costs of cubical walls and increase the amount of distractions that employees are faced with.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,8,'section-image','','wired-super-computer-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,8,'section-image','','wired-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'section-image','','wired-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,8,'section-image','','wired-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,8,'section-source','','https://www.trnk-nyc.com/stories/scott-dadich-wired/','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,1,'section-image','','super-computer-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,4,'section-image','','street-art.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,4,'section-source','','http://www.reddit.com/user/CrimsonLiquid','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('good','warning','unconfirmed') COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publisher_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1','email1@gmail.com','$2y$10$ifg0z2pM3HvoBVSt8vTe6unfha/3tSPVZItN4.CESUNmhaWAK8dVC','good','1234567890ABCDE1','pub-1111111111111111',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'user2','email2@gmail.com','$2y$10$AR.s9V6Basqfp0FmaCg7Ie0dOS4nKd5nSg0DzfybQ4eQ925.vtIuy','good','1234567890ABCDE2','pub-2222222222222222',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'user3','email3@gmail.com','$2y$10$Ta2WLEMqVsiNPdFf6Lf6/.5Mo//5d9eq7V.Lj0RKDnB4ItqMv.fUG','unconfirmed','1234567890ABCDE3','pub-3333333333333333',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'user4','email4@gmail.com','$2y$10$bQr1gThr0LJJlbb05tzyiOfLNXJmfzdbXIhKzIf9xtr4gvYhIJAQ2','warning','1234567890ABCDE4','pub-4444444444444444',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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

-- Dump completed on 2015-07-24 22:25:55
