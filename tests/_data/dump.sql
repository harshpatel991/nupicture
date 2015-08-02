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
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `views` int(10) unsigned NOT NULL,
  `posted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
INSERT INTO `posts` VALUES (1,1,'pending_post',NULL,'A Pending Post','art','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','post-1',0,NULL,'2015-05-27 05:32:22','2015-05-28 01:25:43'),(2,1,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-2',0,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(3,1,'posted',NULL,'The most powerful supercomputer in Spain, the MareNostrum','woah','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','the-most-powerful-supercomputer-in-',123,'2015-07-22 03:54:23','2015-05-21 04:25:43','2015-05-22 03:25:43'),(4,1,'posted',NULL,'Street Art in Busan, South Korea','interesting','This beautiful street art found in South Korea on the side of a building.','street-art.jpg','street-art-busan-south-korea',100,'2015-07-23 01:36:11','2015-05-19 03:25:43','2015-05-26 03:25:43'),(5,2,'posted',NULL,'3D Metal Printed Faucets','photograph','Believe it or not, these are actual functioning faucets that will soon be aviable for purchase.','sink-1.jpg','3d-metal-printed-faucets',200,'2015-07-24 02:34:23','2015-05-15 03:25:43','2015-05-26 03:25:43'),(6,2,'posted',NULL,'10 Awesome Cinemagraphs','photograph','Cinemagraphs are GIFs that have a very particular set of looping and stillness properties.','cinemagraph-thumb.jpg','10-awesome-cinemagraphs',200,'2015-07-25 03:43:23','2015-05-15 03:25:43','2015-05-26 03:25:43'),(7,2,'posted',NULL,'White Northern Lights','photograph','Rare white Northern Lights captured on photography.','northern-1.jpg','white-northern-lights',200,'2015-07-20 05:43:12','2015-05-15 03:25:43','2015-05-26 03:25:43'),(8,2,'posted',NULL,'WIRED\'s beautifully redesigned San Francisco office','photograph','The tech magazine giant WIRED has recently redesigned their San Francisco office into a beautiful, modern workplace. This post summary is actually very very long.','wired-1.jpg','wireds-beautifully-redesigned-san-f',200,'2015-07-21 10:34:35','2015-05-15 03:25:43','2015-05-26 03:25:43'),(10,3,'pending_post',NULL,'A Pending Post','art','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','post-10',16000,NULL,'2015-05-27 05:32:22','2015-05-28 01:25:43'),(11,3,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-11',18000,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(12,3,'posted',NULL,'Two Students Film Amazing 4K Video of Iceland','photography','Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured some very beautiful shots.','two-students-film-amazing-4k-1.jpg','post-12',4234,'2015-06-26 21:31:34','2015-06-21 04:25:43','2015-06-22 03:25:43'),(13,3,'posted',NULL,'Street Art Found in Busan, South Korea','interesting','A very powerful computer in Spain is stored in a beautiful location.','2.jpg','post-13',3000,'2015-07-27 20:44:43','2015-05-19 03:25:43','2015-05-26 03:25:43'),(15,4,'pending_post',NULL,'A Pending Post','art','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','post-15',0,NULL,'2015-05-27 05:32:22','2015-05-28 01:25:43'),(16,4,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-16',0,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(17,4,'posted',NULL,'The most powerful supercomputer in Spain, the MareNostrum','funny','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','post-17',123,'2015-07-26 12:33:24','2015-05-21 04:25:43','2015-05-22 03:25:43'),(18,4,'posted',NULL,'Street Art Found in Busan, South Korea','interesting','A very powerful computer in Spain is stored in a beautiful location.','2.jpg','post-18',100,'2015-07-25 21:43:32','2015-05-19 03:25:43','2015-05-26 03:25:43'),(19,4,'posted',NULL,'3D Metal Printed Faucets','photograph','Believe it or not, these are actual functioning faucets that will soon be aviable for purchase.','sink-1.jpg','post-19',200,'2015-07-25 10:42:32','2015-05-15 03:25:43','2015-05-26 03:25:43');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,5,'section-text','','American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. These faucets are expected to begin to ready for production by June 2016.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,'section-text','','<i>The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction. -American Standard</i>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,5,'section-image','','sink-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,5,'section-image','','sink-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,5,'section-image','','sink-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,5,'section-image','','sink-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,5,'section-image','','sink-5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,6,'section-image','http://www.reddit.com/user/relevant__comment','cinemagraph-1.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,6,'section-image','http://bonvallet.deviantart.com','cinemagraph-2.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,7,'section-text','','These white Northern Lights appeared in Finland. The Northern Lights are a beautiful display caused by emissions from the sun hitting the Earth\'s atmosphere. These images reveal a fairly common display of the Aurora Borealis. Usually images of the Aurora Borealis are captured on images as having a very vibrant appearance while in reality, your eyes would see a grey-ish image closer to what you see below.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,7,'section-image','','northern-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,7,'section-image','','northern-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,7,'section-image','','northern-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,8,'section-text','','Scott Dadich, the editor in chief at WIRED ordered the San Francisco office of the tech news super giant to be redesigned. <br><br>WIRED hired Gensler to give their office a new, modern look. They followed the approach taken by many Silicon Valley tech companies: open floor plans allowing for easy team communication. Some have critizied these types floor plans. Citing that these plans serve only to reduce costs of cubical walls and increase the amount of distractions that employees are faced with.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,8,'section-image','','wired-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,8,'section-image','','wired-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'section-image','','wired-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,8,'section-image','','wired-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,8,'section-source','','https://www.trnk-nyc.com/stories/scott-dadich-wired/','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,1,'section-image','','super-computer-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,4,'section-image','','street-art.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,4,'section-source','','http://www.reddit.com/user/CrimsonLiquid','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,12,'section-text','','Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured amazing 4K footage of the landscape and wildlife of Ireland.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,12,'section-youtube','','U3r62Np_pxY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,12,'section-text','','The project, titled Eylenda, was shot over two weeks across the landscape of Ireland.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,12,'section-image','https://vimeo.com/132602913','two-students-film-amazing-4k-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,12,'section-image','https://vimeo.com/132602913','two-students-film-amazing-4k-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,12,'section-image','https://vimeo.com/132602913','two-students-film-amazing-4k-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00');
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
INSERT INTO `users` VALUES (1,'MudMatter1','email1@gmail.com','$2y$10$L0CXcnHEYxQ0xinMCpg/1ulthQXQj.xpVCK6g0WaG6C.XSaFeT7w.','good','1234567890ABCDE1','pub-1111111111111111',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'2eadaliz','email2@gmail.com','$2y$10$0QKcWgEgEHG2HymFnL5O.enMxtmesullEjVUCFaKb6k3eyd7/1TyW','good','1234567890ABCDE2','pub-2222222222222222',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Network3Dipity','email3@gmail.com','$2y$10$Vw7TJiRlSFkRbmWlBu/Lh.KgBzTt9B4wa9NK0f5BFVKs9Msx4isTS','unconfirmed','1234567890ABCDE3','pub-3333333333333333',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'MamaJama04','email4@gmail.com','$2y$10$uZSb143/MHNpkCFXIz2Ubu2nQimlLIvufB0a9oy4HdiUiBxLFbxQq','warning','1234567890ABCDE4','pub-4444444444444444',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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

-- Dump completed on 2015-07-29 21:15:30
