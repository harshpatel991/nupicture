-- MySQL dump 10.13  Distrib 5.6.25, for osx10.8 (x86_64)
--
-- Host: nupicture-dev-db.cwqtmomh10su.us-west-2.rds.amazonaws.com    Database: nupicture_dev_db
-- ------------------------------------------------------
-- Server version	5.6.23-log

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
  `category` enum('art','cute','design','funny','how-to','interesting','movies','news','photography','tech','tv') COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'pending_post',NULL,'A Pending Post','art','Test','test.jpg','post-1',0,NULL,'2015-05-27 05:32:22','2015-05-28 01:25:43'),(2,1,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-2',0,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(3,1,'posted',NULL,'The Most Powerful Supercomputer in Spain, the MareNostrum','interesting','A very powerful computer in Spain is stored in a beautiful location.','super-computer-thumb.jpg','the-most-powerful-supercomputer-in-',138,'2015-07-22 03:54:23','2015-05-21 04:25:43','2015-08-30 15:12:08'),(4,1,'posted',NULL,'Dad Creates Adorable Star Wars Speeder','cute','This adorable rocker was created by a father out of some simple materials.','star-wars-thumb.jpg','dad-creates-star-wars-speeder-for-d',390,'2015-08-19 01:36:11','2015-08-19 03:25:43','2015-08-30 16:17:01'),(5,2,'posted',NULL,'3D Metal Printed Faucets','interesting','Believe it or not, these are actual functioning faucets that will soon be available for purchase.','sink-1.jpg','3d-metal-printed-faucets',169,'2015-07-24 02:34:23','2015-05-15 03:25:43','2015-08-31 19:05:38'),(6,2,'posted',NULL,'7 Awesome Cinemagraphs','photography','Cinemagraphs are GIFs that have a very particular set of looping and stillness properties.','cinemagraph-thumb.jpg','7-awesome-cinemagraphs',375,'2015-07-25 03:43:23','2015-05-15 03:25:43','2015-09-01 01:46:29'),(7,2,'posted',NULL,'Rare White Northern Lights Captured In Finland','photography','Rare white Northern Lights captured on photography.','northern-thumb.jpg','white-northern-lights',446,'2015-07-20 05:43:12','2015-05-15 03:25:43','2015-08-30 16:01:55'),(8,2,'posted',NULL,'WIRED\'s beautifully redesigned San Francisco office','photography','The tech magazine giant WIRED has recently redesigned their San Francisco office into a beautiful, modern workplace.','wired-thumb.jpg','wireds-beautifully-redesigned-san-f',340,'2015-07-21 10:34:35','2015-05-15 03:25:43','2015-08-30 16:01:57'),(10,3,'pending_post',NULL,'A Pending Post','art','A very powerful computer in Spain is stored in a beautiful location.','super-computer-1.jpg','post-10',16000,NULL,'2015-05-27 05:32:22','2015-05-28 01:25:43'),(11,3,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-11',18000,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(12,3,'posted',NULL,'Two Students Film Amazing 4K Video of Iceland','photography','Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured some very beautiful shots.','two-students-film-amazing-4k-thumb.jpg','two-students-film-amazing-4k',1028,'2015-06-26 21:31:34','2015-06-21 04:25:43','2015-08-30 16:01:54'),(13,3,'posted',NULL,'11 Android Home Screens That Will Make Your Phone Standout','how-to','These great home screens can be duplicated on to your own phone by following the linked sources.','android-thumb.jpg','11-android-home-screens',1343,'2015-08-05 03:25:43','2015-08-03 03:25:43','2015-09-01 00:56:11'),(15,4,'pending_post',NULL,'Pending','art','','','post-15',0,NULL,'2015-08-06 05:32:22','2015-08-06 01:25:43'),(16,4,'rejected','Your post was rejected because abc def ghi jlkmnop ...','A Rejected Post Short Text','cute','This should NEVER be shown','2.jpg','post-16',0,NULL,'2015-05-23 05:28:43','2015-05-26 03:25:43'),(17,4,'posted',NULL,'Tesla Demos Prototype Automatic Charger','interesting','This robot arm automatically finds the charging port on Tesla vehicles.','tesla-thumb.jpg','telsa-demos-prototype-charger',416,'2015-08-06 12:33:24','2015-08-06 12:25:43','2015-08-30 15:12:07'),(18,4,'posted',NULL,'Create Your Own Personal Hologram Display','interesting','Using a CD case, an exacto knife and some pieces of page, you can create your own hologram display.','hologram-thumb.jpg','create-your-own-personal-hologram',212,'2015-08-04 13:27:32','2015-08-04 13:25:43','2015-08-31 19:05:43'),(19,4,'posted',NULL,'Game Of Polygons: Artist Recreates Characters in Low Poly','tv','An Israeli artist has recreated famous portraits of your favorite Game of Thrones characters in low poly.','got-thumb.jpg','game-of-polygons-artist',2413,'2015-08-07 20:34:12','2015-08-07 20:33:12','2015-08-31 12:06:32'),(20,4,'posted',NULL,'5 Things Every Man Should Know','how-to','Ever feel like there was a manual that you missed out on things guys should know about?','man-thumb.jpg','5-things-every-man-should-know',1123,'2015-08-07 20:44:12','2015-08-07 20:23:12','2015-08-30 15:12:09'),(21,4,'posted',NULL,'5 Videos That Will Infect You With Their Laughter','funny','','laugh-thumb.jpg','10-videos-that-will-have-you-crying',1064,'2015-08-09 14:44:12','2015-08-09 14:34:12','2015-08-30 15:12:10'),(23,1,'posted',NULL,'25 Perfectly Minimalistic Bedrooms','photography','Hopefully, these minimalistic bedrooms will give you inspiration for designing your own sleeping areas.','25-perfectly-minimalistic-bedroom-59.jpg','25-perfectly-minimalistic-bedroom-5',44,'2015-08-26 04:29:20','2015-08-26 04:28:15','2015-08-31 19:06:31'),(24,4,'posted',NULL,'Newly Weds Film Giant Music Video In One Take','cute','Guests at the wedding reception of Robert and Teresa were given 10 minutes notice organize a music video.','newly-weds-film-giant-music-video-77.jpg','newly-weds-film-giant-music-video-7',19,'2015-08-29 16:19:14','2015-08-29 16:18:38','2015-08-30 15:12:03'),(25,4,'posted',NULL,'Michael Jordan\'s Jersey from Space Jam up for Auction','movies','The jersey Michael Jordan wore during the 1996 hit film Space Jam is up for auction starting at $10,000.','michael-jordans-jersey-from-space-07.jpg','michael-jordans-jersey-from-space-0',20,'2015-08-29 19:45:38','2015-08-29 19:45:24','2015-08-31 12:00:20'),(26,1,'pending_post',NULL,'Test Post - Please Ignore','cute','Test Summary - Please Ignore','test-post-please-ignore-52.jpg','test-post-please-ignore-5',0,NULL,'2015-08-30 06:17:45','2015-08-30 06:17:45'),(27,1,'posted',NULL,'Inspiring Male Living Spaces','design','Eight living spaces that you can use to style your own home.','inspiring-male-living-spaces-93.jpg','inspiring-male-living-spaces-9',34,'2015-08-30 17:31:02','2015-08-30 17:30:15','2015-08-31 17:32:43'),(28,4,'posted',NULL,'Toddler and Little Gorilla Play Hide and Seek','cute','A toddler became part of an impromptu game of hide-and-seek with a gorilla.','toddler-and-little-gorilla-play-h-34.jpg','toddler-and-little-gorilla-play-h-3',1,'2015-09-01 00:34:26','2015-09-01 00:33:54','2015-09-01 00:34:26');
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
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,5,'section-text','','American Standard has created these beautiful 3D printed faucets. The faucets are created by way of a computer guided laser which fuses powered metal into these incredible shapes. They are expected to begin to ready for production by June 2016.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,5,'section-text','','<i>The [SLS] process democratizes design and decentralizes manufacturing, which will eventually upend the design and construction industry, along with many others. A new, more efficient business model for bespoke design could be on the horizon. This would reduce the inventory pressures that arise from mass production of personalized products, while opening up a new world for both design and construction. -American Standard</i>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,5,'section-image','','sink-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,5,'section-image','','sink-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,5,'section-image','','sink-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,5,'section-image','','sink-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,5,'section-image','','sink-5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,6,'section-text','','Cinemagraphs are animated images created by looping a video such that it cycles perfectly without seam between last frame and first frame. Additionally, to be considered a cinemagraph, every frame of the animation must be able to stand on it\'s own as a still frame image. Artists have created cinemagraphs from scenes from movies, self-shot videos, and even pixel art.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,7,'section-text','','These white Northern Lights were captured in Finland. The Northern Lights are a beautiful display caused by emissions from the sun hitting the Earth\'s atmosphere. Even though these images look different from most Northern Lights images you\'ve seen, these images reveal a fairly common display of the Aurora Borealis. Usually, images of the Aurora Borealis are captured as having a very vibrant appearance while in reality, your eyes would see a grey-ish image closer to what you see below.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,7,'section-image','','northern-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,7,'section-image','','northern-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,7,'section-image','','northern-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,8,'section-text','','Scott Dadich, the editor in chief at WIRED magazine, ordered the San Francisco office of the tech news super giant to be redesigned. <br><br>WIRED hired Gensler to give their office a new, modern look. They followed the approach taken by many Silicon Valley tech companies: open floor plans allowing for easy team communication. Some have critizied these types floor plans. Citing that these plans serve only to reduce costs of cubical walls and increase the amount of distractions that employees are faced with. Either way, we think this redesign is incredibly pleasing to look at.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,8,'section-image','','wired-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,8,'section-image','','wired-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(17,8,'section-image','','wired-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(18,8,'section-image','','wired-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(19,8,'section-source','','https://www.trnk-nyc.com/stories/scott-dadich-wired/','0000-00-00 00:00:00','0000-00-00 00:00:00'),(20,3,'section-text','','This beautiful monster can found in Barcelona, Spain. It was assembled inside of a former chapel. Named after \"Mare Nostrum\", the Roman name for the Mediterranean Sea.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(21,3,'section-image','','super-computer-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(22,3,'section-text','','The setup has been updated multiple times throughout it\'s 10 year history. Currently, it features 48,896 Intel Sandy Bridge processors. In each of it\'s 36 racks, there are a total of a total of 1,344 cores and 2,688GB of memory. Unfortunately, you won\'t be able play many games on it as it runs on sSUSE Linux. <br><br>The supercomputer is primarily used for reasearch: genomes, protiens and weather simulations.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(23,12,'section-text','','Studying at the Stuttgart Media University in Germany, Marcus Sies and Florian Nick have captured amazing 4K footage of the landscape and wildlife of Ireland.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(24,12,'section-youtube','','U3r62Np_pxY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(25,12,'section-text','','The project, titled Eylenda, was shot over two weeks across the landscape of Ireland.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(26,12,'section-text','Bonus Video','Check out this time lapse of Patagonia filmed in mind-blowing 8K.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(27,12,'section-youtube','','ChOhcHD8fBA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(28,13,'section-text','','If you\'re looking to customize your smart phone, here is some inspiration to get you started. Click on the image source links for instructions on how you can make your own Android device look like the screenshots.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(29,13,'section-listnumber','Untitled','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(30,13,'section-image','https://www.reddit.com/r/androidthemes/comments/3gd66m/untitled/','android-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(32,13,'section-listnumber','Moon and Circles','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(33,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2r9491/misc_moon_and_circles/','android-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(34,13,'section-listnumber','NightLife','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(35,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2z0xji/barebones_nightlife/','android-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(36,13,'section-listnumber','Feeling Like Spring','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(37,13,'section-image','https://www.reddit.com/r/androidthemes/comments/32gjxm/nature_feeling_like_spring/','android-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(38,13,'section-listnumber','Going To Beach','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(39,13,'section-image','https://www.reddit.com/r/androidthemes/comments/36d4vm/nature_going_to_beach/','android-5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(40,13,'section-listnumber','Google Now Inspired Fall Theme','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(41,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2li0db/functional_google_now_inspired_fall_theme_files/','android-6.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(42,13,'section-listnumber','Simply Blue','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(43,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2ylo5b/barebones_simply_blue/','android-7.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(44,13,'section-listnumber','Pine Forest','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(45,13,'section-image','https://www.reddit.com/r/androidthemes/comments/3fc0hv/pine_forest/','android-8.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(46,13,'section-listnumber','Blue Earth','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(47,13,'section-image','https://www.reddit.com/r/androidthemes/comments/30ayyo/naturebarebones_blue_earth/','android-9.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(48,13,'section-listnumber','Frosty','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(49,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2nyty1/nature_frosty/','android-10.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(50,13,'section-listnumber','Light Rectangles','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(51,13,'section-image','https://www.reddit.com/r/androidthemes/comments/2jls8d/nature_light_rectangles/','android-11.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(52,17,'section-text','','Telsa has taken yet another step into the future. This scary looking robotic arm, tweeted by Tesla Motors on Thursday displays a fully automatic arm that finds the charger port on the vehicle, plugs itself in, and begins charging. It almost reminds you of the sentinels from <i>The Matrix</i>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(53,17,'section-youtube','','uMM0lRfX6YI','0000-00-00 00:00:00','0000-00-00 00:00:00'),(54,17,'section-text','','As of yet, the technology has no definitive release date but we suspect that it will be used in conjunction with the <a href=\"http://jalopnik.com/tesla-will-run-a-public-beta-for-model-s-autopilot-1722371968\">self-driving firmware update.</a>','0000-00-00 00:00:00','0000-00-00 00:00:00'),(55,18,'section-text','','Using some commonly found household items, you can create your own hologram. You\'ll need: <ol><li>Graph Paper</li><li>A CD Case</li><li>Tape</li><li>Pen</li><li>Scissors</li><li>Exacto Knife</li></ol> Now just follow the instructions in this video.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(56,18,'section-youtube','','7YWTtCsvgvg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(57,18,'section-text','','As always, be careful when using sharp tools. <a href=\"https://www.youtube.com/watch?v=Wsg8KDKVNGE\">Here is one of the videos</a> you can use with your newly created hologram viewer.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(58,19,'section-text','','Israeli artist, Mordi Levi, has recreated famous portraits of Khal Drogo, Arya, Margaery, Tyrion, and Daenerys low poly.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(59,19,'section-listnumber','Khal Drogo','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(60,19,'section-image','','got-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(61,19,'section-listnumber','Arya','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(62,19,'section-image','','got-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(63,19,'section-listnumber','Margaery','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(64,19,'section-image','','got-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(65,19,'section-listnumber','Tyrion','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(66,19,'section-image','','got-4.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(67,19,'section-listnumber','Daenerys','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(68,19,'section-image','','got-5.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(69,19,'section-text','','Have a look at the artists page on <a href=\"https://www.behance.net/mdlv\">Behance</a> to see the entire process and other low poly creations.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(70,20,'section-text','','Ever feel like there was a manual that you missed out on things guys should know about? We can\'t possibly cover everything there is to know. But, let\'s get you started with these video guides. We\'ll cover basic food preparation, buying a used vehicle, public speaking, proper exercise, and grilling.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(71,20,'section-youtube','Making Healthy, Quick, and Filling Food','r0jWAbTWJQ8','0000-00-00 00:00:00','0000-00-00 00:00:00'),(72,20,'section-youtube','What To Look For When Buying A Used Car','zfKhUICmViw','0000-00-00 00:00:00','0000-00-00 00:00:00'),(73,20,'section-youtube','How To Captivate Groups Of People','rjoiVgCAD04','0000-00-00 00:00:00','0000-00-00 00:00:00'),(74,20,'section-youtube','Proper Push Ups','4dF1DOWzf20','0000-00-00 00:00:00','0000-00-00 00:00:00'),(75,20,'section-youtube','Grilling The Right Way','K5DRltODdSQ','0000-00-00 00:00:00','0000-00-00 00:00:00'),(76,21,'section-youtube','1. James May Looses It After Switching His GPS To Romanian','tND6WneJrgA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(77,21,'section-youtube','2. Pie In The Face Game','jVSj1WUZ7Zk','0000-00-00 00:00:00','0000-00-00 00:00:00'),(78,21,'section-youtube','3. Father Visits The Mall With His Son','Yx2YiMALbWY','0000-00-00 00:00:00','0000-00-00 00:00:00'),(79,21,'section-youtube','4. Weatherman Reads A Shout Out To A 10 Year Old','PfFoDc4NUZA','0000-00-00 00:00:00','0000-00-00 00:00:00'),(80,21,'section-youtube','5. Family Gets A Kick Out Of Daughters Gag Reflex','AFimq-NlmI0','0000-00-00 00:00:00','0000-00-00 00:00:00'),(81,6,'section-image','http://www.reddit.com/user/relevant__comment','cinemagraph-1.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(82,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(83,6,'section-image','http://bonvallet.deviantart.com','cinemagraph-2.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(84,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(85,6,'section-image','','cinemagraph-3.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(86,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(87,6,'section-image','','cinemagraph-4.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(88,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(89,6,'section-image','https://www.reddit.com/r/Cinemagraphs/comments/3grmr3/oc_dog_days/','cinemagraph-5.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(90,3,'section-image','','super-computer-2.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(91,3,'section-image','','super-computer-3.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(92,4,'section-text','','Father, Tez Gelmir, created this 74-Z Speeder Bike from Star Wars Return of the Jedi for his daughters first birthday. The construction is made from simple plywood, PVC pipes, and plastic mooulded via 3D printing for the curved pieces.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(93,4,'section-text','','He\'s also <a href=\"http://www.instructables.com/id/Rocking-Speeder-Bike/\">posted instructions</a> so you can create your own speeder.','0000-00-00 00:00:00','0000-00-00 00:00:00'),(94,4,'section-image','','star-wars-1.jpg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(95,4,'section-youtube','','NkL7DrGZtAg','0000-00-00 00:00:00','0000-00-00 00:00:00'),(96,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(97,6,'section-image','','cinemagraph-6.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(98,6,'section-listnumber','','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(99,6,'section-image','','cinemagraph-7.gif','0000-00-00 00:00:00','0000-00-00 00:00:00'),(102,23,'section-text','','If you\'re looking for some inspiration to modernize and minimize your bedroom, look no further. Here are 25 great examples of minimalistic bedrooms.','2015-08-26 04:28:19','2015-08-26 04:28:19'),(103,23,'section-image','','25-perfectly-minimalistic-bedroom-521.jpg','2015-08-26 04:28:15','2015-08-26 04:28:15'),(104,23,'section-image','','25-perfectly-minimalistic-bedroom-552.jpg','2015-08-26 04:28:15','2015-08-26 04:28:15'),(105,23,'section-image','','25-perfectly-minimalistic-bedroom-550.jpg','2015-08-26 04:28:15','2015-08-26 04:28:15'),(106,23,'section-image','','25-perfectly-minimalistic-bedroom-515.jpg','2015-08-26 04:28:15','2015-08-26 04:28:15'),(107,23,'section-image','','25-perfectly-minimalistic-bedroom-593.jpg','2015-08-26 04:28:15','2015-08-26 04:28:15'),(108,23,'section-image','','25-perfectly-minimalistic-bedroom-585.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(109,23,'section-image','','25-perfectly-minimalistic-bedroom-537.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(110,23,'section-image','','25-perfectly-minimalistic-bedroom-534.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(111,23,'section-image','','25-perfectly-minimalistic-bedroom-570.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(112,23,'section-image','','25-perfectly-minimalistic-bedroom-590.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(113,23,'section-image','','25-perfectly-minimalistic-bedroom-529.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(114,23,'section-image','','25-perfectly-minimalistic-bedroom-12.jpg','2015-08-26 04:28:16','2015-08-26 04:28:16'),(115,23,'section-image','','25-perfectly-minimalistic-bedroom-13.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(116,23,'section-image','','25-perfectly-minimalistic-bedroom-536.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(117,23,'section-image','','25-perfectly-minimalistic-bedroom-519.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(118,23,'section-image','','25-perfectly-minimalistic-bedroom-50.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(119,23,'section-image','','25-perfectly-minimalistic-bedroom-51.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(120,23,'section-image','','25-perfectly-minimalistic-bedroom-531.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(121,23,'section-image','','25-perfectly-minimalistic-bedroom-592.jpg','2015-08-26 04:28:17','2015-08-26 04:28:17'),(122,23,'section-image','','25-perfectly-minimalistic-bedroom-57.jpg','2015-08-26 04:28:18','2015-08-26 04:28:18'),(123,23,'section-image','','25-perfectly-minimalistic-bedroom-589.jpg','2015-08-26 04:28:18','2015-08-26 04:28:18'),(124,23,'section-image','','25-perfectly-minimalistic-bedroom-593.jpg','2015-08-26 04:28:18','2015-08-26 04:28:18'),(125,23,'section-image','','25-perfectly-minimalistic-bedroom-587.jpg','2015-08-26 04:28:18','2015-08-26 04:28:18'),(126,23,'section-image','','25-perfectly-minimalistic-bedroom-579.jpg','2015-08-26 04:28:19','2015-08-26 04:28:19'),(127,23,'section-image','','25-perfectly-minimalistic-bedroom-596.jpg','2015-08-26 04:28:19','2015-08-26 04:28:19'),(128,24,'section-youtube','','oi1syPvmAWg','2015-08-29 16:18:38','2015-08-29 16:18:38'),(129,24,'section-text','','250 guests at the wedding reception of Robert and Teresa were given (and delivered on) an epic task to star in a lip-sync music video.\r\n\r\nThe guests had 10 minutes to prepare and the entire video was filmed in one take.\r\n\r\nThis was not the only unconventional piece of the wedding, writes Robert. \n\r\n<i>If you know Robert & Teresa, it should be no surprise that this superhero-themed wedding turned into an epic mashup of all kinds of crazy. I mean, they do own a Ninja themed sushi restaurant so they quite enjoy crazy. </i> ','2015-08-29 16:18:38','2015-08-29 16:18:38'),(130,25,'section-image','','michael-jordans-jersey-from-space-037.jpg','2015-08-29 19:45:24','2015-08-29 19:45:24'),(131,25,'section-text','','If you\'re a nostalgic collector, you may want to break out your piggy bank.\r\n\r\nThe jersey Michael Jordan wore during the hit film Space Jam is up for auction on <a href=\"http://www.invaluable.com/auction-lot/michael-jordan-uniform-from-space-jam.-1715-c-ac445d5ae1\">invaluable</a>. The auction starts on October 1, 2015 and the bidding will begin at $10,000.\r\n\r\nIf you win, you\'ll receive the actual jersey and matching pair of size 38 shorts worn on set by Jordan during the filming of the 1996 film.','2015-08-29 19:45:24','2015-08-29 19:45:24'),(132,26,'section-text','','Test Content - Please Ignore','2015-08-30 06:17:45','2015-08-30 06:17:45'),(133,27,'section-text','','The design and attention that you put into your home says a lot about what you value as a person. We\'ve put together a list of actual male living spaces that will give you inspiration for your own home. \r\n\r\nMale living spaces are traditionally characterized by dark fabrics, light walls, and wooden floors. They have a bold and modern feel with a touch of coziness. ','2015-08-30 17:30:15','2015-08-30 17:30:15'),(155,27,'section-text','Senior year of undergrad studies for user <a href=\"https://www.reddit.com/user/madm0ney\">madm0ney</a>','','2015-08-30 17:30:16','2015-08-30 17:30:16'),(156,27,'section-image','','inspiring-male-living-spaces-929.jpg','2015-08-30 17:30:16','2015-08-30 17:30:16'),(157,27,'section-image','','inspiring-male-living-spaces-916.jpg','2015-08-30 17:30:15','2015-08-30 17:30:15'),(158,27,'section-text','Very cozy Indiana apartment owned by <a href=\"https://www.reddit.com/user/ad-liberation\">ad-liberation</a>','','2015-08-30 17:30:16','2015-08-30 17:30:16'),(159,27,'section-image','','inspiring-male-living-spaces-98.jpg','2015-08-30 17:30:16','2015-08-30 17:30:16'),(160,27,'section-text','Clean and modern look by <a href=\"https://www.reddit.com/user/elialitem\">elialitem</a>','','2015-08-30 17:30:17','2015-08-30 17:30:17'),(161,27,'section-image','','inspiring-male-living-spaces-911.jpg','2015-08-30 17:30:17','2015-08-30 17:30:17'),(162,27,'section-image','','inspiring-male-living-spaces-931.jpg','2015-08-30 17:30:17','2015-08-30 17:30:17'),(163,27,'section-text','Bedroom upgrade by <a href=\"https://www.reddit.com/user/Xyzzics\">Xyzzics</a>','','2015-08-30 17:30:18','2015-08-30 17:30:18'),(164,27,'section-image','','inspiring-male-living-spaces-938.jpg','2015-08-30 17:30:18','2015-08-30 17:30:18'),(165,27,'section-text','700 square foot modern Pittsburgh apartment owned by <a href=\"https://www.reddit.com/user/TheSaucyGinger\">TheSaucyGinger</a>','','2015-08-30 17:30:19','2015-08-30 17:30:19'),(166,27,'section-image','','inspiring-male-living-spaces-939.jpg','2015-08-30 17:30:19','2015-08-30 17:30:19'),(167,27,'section-image','','inspiring-male-living-spaces-941.jpg','2015-08-30 17:30:19','2015-08-30 17:30:19'),(168,27,'section-text','375 Square foot apartment in Toronto, Canada owned by <a href=\"https://www.reddit.com/user/bothsidesdoit\">bothsidesdoit</a>','','2015-08-30 17:30:20','2015-08-30 17:30:20'),(169,27,'section-image','','inspiring-male-living-spaces-917.jpg','2015-08-30 17:30:20','2015-08-30 17:30:20'),(170,27,'section-image','','inspiring-male-living-spaces-952.jpg','2015-08-30 17:30:19','2015-08-30 17:30:19'),(171,27,'section-text','Classic and cozy look by <a href=\"https://www.reddit.com/user/slktrx\">slktrx</a>','','2015-08-30 17:30:20','2015-08-30 17:30:20'),(172,27,'section-image','','inspiring-male-living-spaces-930.jpg','2015-08-30 17:30:20','2015-08-30 17:30:20'),(173,27,'section-text','Bachelor pad in Belgium owned by <a href=\"https://www.reddit.com/user/invzor\">invzor</a>','','2015-08-30 17:30:21','2015-08-30 17:30:21'),(174,27,'section-image','','inspiring-male-living-spaces-92.jpg','2015-08-30 17:30:21','2015-08-30 17:30:21'),(175,27,'section-image','','inspiring-male-living-spaces-927.jpg','2015-08-30 17:30:20','2015-08-30 17:30:20'),(176,27,'section-text','User <a href=\"https://www.reddit.com/user/Fandemonium\">Fandemonium\'s</a> first apartment','','2015-08-30 17:30:20','2015-08-30 17:30:20'),(177,27,'section-image','','inspiring-male-living-spaces-932.jpg','2015-08-30 17:30:20','2015-08-30 17:30:20'),(178,27,'section-image','','inspiring-male-living-spaces-933.jpg','2015-08-30 17:30:20','2015-08-30 17:30:20'),(179,28,'section-youtube','','q6XzwpYSmzY','2015-09-01 00:33:54','2015-09-01 00:33:54'),(180,28,'section-text','','Under the supervision of each of their parents, a toddler and young gorilla started a game of hide and seek at the Columbus Zoo in Powell, Ohio.','2015-09-01 00:33:54','2015-09-01 00:33:54');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'MudMatter1','email1@gmail.com','$2y$10$9GQTejVhZaNUJ51kZ4Nyfup9aWNh/tHdOCDYR2uOANG9rStfyXRCG','good','1234567890ABCDE1','pub-6621729644063575','mDQE6DVrqGs90jClvOx3ETxHDlkAIGwlySti2k5lTh0pfjSi5Nf9QYsXT7Gh','0000-00-00 00:00:00','2015-08-30 06:14:00'),(2,'2eadaliz','email2@gmail.com','$2y$10$5433UCVOF/JxwupuTLG4.u70BrjR6jdykWtQUnEf.rnLY6Z8jYgNO','good','1234567890ABCDE2','pub-6621729644063575',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Network3Dipity','email3@gmail.com','$2y$10$MFBjH5rHRb48HcrQy4JLuuxz4PN94EN8Y8K.DhnHceR5pKFgui3KS','unconfirmed','1234567890ABCDE3','pub-6621729644063575','6ebfWFv8JnJDD6RDCvqo2kT2J7NyQIi2PMDPkxRxSS70MVLG0XOxUn73rZx0','0000-00-00 00:00:00','2015-08-30 06:13:50'),(4,'MamaJama04','email4@gmail.com','$2y$10$DQBxjL7AMjmEF1sX34BDF.jBdSx0jI/X.rSgHYnhsYWn3skjfG3c6','warning','1234567890ABCDE4','pub-6621729644063575',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'deadfire56','***REMOVED***','$2y$10$/u4gbjYSRJztGxhw5qE6qOSZmja71ZPHqeQ8QD8r2eGUT2xN5D3Vi','good','CEFTUKeDBWDqG0t2','pub-1234567891111111',NULL,'2015-08-25 03:17:18','2015-08-25 03:18:43'),(7,'***REMOVED***','***REMOVED***','$2y$10$tlKG0dMXRsE/YxPRAkqz4exo0hRSWLBQF.Sw8iGU8WgOJRHcBZpjW','good','uGwLguQvMNfbKU98','pub-0317641938016380',NULL,'2015-08-25 14:08:13','2015-08-25 14:08:47'),(8,'mrdprince','***REMOVED***','$2y$10$HV11VoFt0jFS8Q8R4gShx.wm3nL6bEXLEnCxZb6j8d23Kg66jL5O2','good','jIQmHe2sLgl1XR58','pub-0785095430378559',NULL,'2015-08-30 03:48:02','2015-08-31 02:38:07'),(9,'deadfire55','***REMOVED***','$2y$10$ImmppEn.q7ZBtxv.TiRp8uc6NWH3yJ9rexx95GD2h9HEQ9rtsBOpq','good','99gIjlMVXzkfzgnx','pub-1234567891111111',NULL,'2015-08-30 21:36:52','2015-08-30 21:39:38');
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

-- Dump completed on 2015-08-31 22:27:47
