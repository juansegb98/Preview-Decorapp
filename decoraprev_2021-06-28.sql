# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.32)
# Database: decoraprev
# Generation Time: 2021-06-28 13:21:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table arts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `arts`;

CREATE TABLE `arts` (
  `art_gallery` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `art_src` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `art_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `art_pn` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `arts` WRITE;
/*!40000 ALTER TABLE `arts` DISABLE KEYS */;

INSERT INTO `arts` (`art_gallery`, `art_id`, `art_src`, `art_description`, `art_pn`)
VALUES
	('Assorted Gallery',1,'ASAQT-LC-190327-02082R300_Woman_in_Red_by_Renoir-min.jpg','Image #AQT-LC-190327-02082 | Title: Woman in Red in a Landscape | Artist: Renoir','AS2082R300'),
	('Assorted Gallery',2,'ASDAE-91007957R300_Jockeys_in_front_of_the_Grandstand_by_Degas-min.jpg','Image #DAE-91007957 | Title: Jockeys in front of the Grandstand | Artist: Degas','AS7957R300'),
	('Assorted Gallery',3,'ASMPN-186344R300_A_road_in_Louveciennes_by_Renoir-min.jpg','Image #MPN-186344 | Title: A road in Louveciennes | Artist: Renoir','AS6344R300'),
	('Assorted Gallery',4,'ASMPN-291597R300_Dancers_in_the_Foyer_by_Degas-min.jpg','Image #MPN-291597 | Title: Dancers in the Foyer | Artist: Degas','AS1597R300');

/*!40000 ALTER TABLE `arts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table autors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `autors`;

CREATE TABLE `autors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `autor_name` varchar(155) NOT NULL DEFAULT '',
  `autor_description` longtext NOT NULL,
  `autor_src` varchar(155) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `autors` WRITE;
/*!40000 ALTER TABLE `autors` DISABLE KEYS */;

INSERT INTO `autors` (`id`, `autor_name`, `autor_description`, `autor_src`)
VALUES
	(1,'Derick Crenshaw','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut gravida metus. Duis congue lorem nec interdum hendrerit. Curabitur lobortis risus dui. Donec maximus at ex at ornare. Curabitur lobortis sit amet nisl a interdum. Donec molestie felis vel tellus volutpat pulvinar. Donec pulvinar, nunc a malesuada fringilla, arcu tellus ultricies elit, ut fringilla enim turpis sit amet nibh. Aliquam et felis tempor, suscipit odio viverra, euismod nisi.','user.png'),
	(2,'Designer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut gravida metus. Duis congue lorem nec interdum hendrerit. Curabitur lobortis risus dui. Donec maximus at ex at ornare. Curabitur lobortis sit amet nisl a interdum. Donec molestie felis vel tellus volutpat pulvinar. Donec pulvinar, nunc a malesuada fringilla, arcu tellus ultricies elit, ut fringilla enim turpis sit amet nibh. Aliquam et felis tempor, suscipit odio viverra, euismod nisi.','user.png'),
	(3,'Howard Behrens','Howard Behrens (August 20, 1933 – April 14, 2014) was American popular artist whose original works of art are sold in fine art galleries, at auction on cruise ships and internationally.\n\nHoward Behrens approach was experiential in terms of his involvement with the formal aspects of painting, brushwork, composition, and color. The artist\'s process creates a lush \"skin\" of paint using a combination of brush and most often a \"spatula,\" a palette knife, in the spirit of the vigorous palette knife technique adopted by the master realist, Gustave Courbet.  He has spawned an entire industry of emulators, but few, if any, capture the emotional breadth of this man in love with love, life and the sun.','howard-behrens.png'),
	(4,'Michael Shaffer','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ut gravida metus. Duis congue lorem nec interdum hendrerit. Curabitur lobortis risus dui. Donec maximus at ex at ornare. Curabitur lobortis sit amet nisl a interdum. Donec molestie felis vel tellus volutpat pulvinar. Donec pulvinar, nunc a malesuada fringilla, arcu tellus ultricies elit, ut fringilla enim turpis sit amet nibh. Aliquam et felis tempor, suscipit odio viverra, euismod nisi.','user.png'),
	(5,'Carlos De Soto','Carlos De Soto is a noted photographer from the Dominican Republic. His passion is teaching photography of unexplored and untouched nature and fauna biodiversity. He has conducted many classes and seminars in Macrophotography, Monochrome Photography and Light painting. He is constantly working, with the consent of the Dominican Republic’s Ministry of the Environment, on a personal study of the day and night life cycle of butterflies in the Dominican Republic. He has been a guide for scientists and foreign students that study the varied species of animals in the Dominican Republic. Carlos has participated as an author, co-author, and photographer in the following books: “Natural Wonders of Our Land”, “Butterflies of the Dominican Republic and Haiti” and others.','Carlos De Soto copy.jpeg');

/*!40000 ALTER TABLE `autors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table frames
# ------------------------------------------------------------

DROP TABLE IF EXISTS `frames`;

CREATE TABLE `frames` (
  `frame_id` int(11) NOT NULL AUTO_INCREMENT,
  `frame_src_preview` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `frame_src` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `frame_pn` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `frame_group` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `frame_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `frame_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`frame_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `frames` WRITE;
/*!40000 ALTER TABLE `frames` DISABLE KEYS */;

INSERT INTO `frames` (`frame_id`, `frame_src_preview`, `frame_src`, `frame_pn`, `frame_group`, `frame_creation_date`, `frame_description`)
VALUES
	(25,'GroupA_FBW96069_Catalogue_Honey_preview.png','GroupA_FBW96069_Catalogue_Honey.png','FBW96069','A','2021-05-03 23:35:04','Catalogue Honey'),
	(26,'GroupA_FBW96273_Black_Satin_preview.png','GroupA_FBW96273_Black_Satin.png','FBW96273','A','2021-05-03 23:35:58','Black Satin'),
	(27,'GroupB_DB8000_Distressed_White_preview.png','GroupB_DB8000_Distressed_White.png','DB8000','B','2021-05-04 12:05:09','Distressed White'),
	(32,'GroupC_A1287_Gold_Emb_Mahogany_preview.png','GroupC_A1287_Gold_Emb_Mahogany.png','A1287','C','2021-05-08 17:03:29','Gold Emb Mahogany'),
	(39,'GroupC_U058-3438_Dark_Walnut_Pasadena_preview.png','GroupC_U058-3438_Dark_Walnut_Pasadena.png','U058-3438','D','2021-05-10 09:45:41','Dark Walnut Pasadena'),
	(40,'GroupC_L822831_Classic_Biltmore_Black_-_Flat_preview.png','GroupC_L822831_Classic_Biltmore_Black_-_Flat.png','L822831','E','2021-05-10 09:51:54','Classic Biltmore Black - Flat');

/*!40000 ALTER TABLE `frames` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table liners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `liners`;

CREATE TABLE `liners` (
  `liner_id` int(11) NOT NULL AUTO_INCREMENT,
  `liner_src_preview` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `liner_src` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `liner_pn` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `liner_group` varchar(11) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `liner_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `liner_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`liner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `liners` WRITE;
/*!40000 ALTER TABLE `liners` DISABLE KEYS */;

INSERT INTO `liners` (`liner_id`, `liner_src_preview`, `liner_src`, `liner_pn`, `liner_group`, `liner_creation_date`, `liner_description`)
VALUES
	(11,'GroupA_FBW65099_Oatmeal_preview.png','GroupA_FBW65099_Oatmeal.png','FBW65099','A','2021-06-07 16:50:14','Oatmeal'),
	(10,'GroupA_FBW65079_Black_preview.png','GroupA_FBW65079_Black.png','FBW65079','A','2021-06-07 16:50:14','Black'),
	(8,'GroupBC_VWD07B_Black_preview.png','GroupBC_VWD07B_Black.png','VWD07B','B','2021-06-07 16:50:14','Black'),
	(9,'GroupBC_VWD07N_Natural_preview.png','GroupBC_VWD07N_Natural.png','VWD07N','B','2021-06-07 16:50:14','Natural');

/*!40000 ALTER TABLE `liners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_100000_create_password_resets_table',1),
	(2,'2019_08_19_000000_create_failed_jobs_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table wp_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_users`;

CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime DEFAULT NULL,
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`)
VALUES
	(59,'testuser@mail.com','$P$B5VW/g.RRevRvPDrtK..innJIvcSqr.','testuser','testuser@mail.com','','2021-06-24 17:51:50','',0,'testuser');

/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wp_wp_eMember_members_tbl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_wp_eMember_members_tbl`;

CREATE TABLE `wp_wp_eMember_members_tbl` (
  `member_id` int(12) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(128) NOT NULL,
  `first_name` varchar(32) DEFAULT '',
  `last_name` varchar(32) DEFAULT '',
  `password` varchar(64) NOT NULL,
  `member_since` date NOT NULL DEFAULT '0000-00-00',
  `membership_level` smallint(6) NOT NULL,
  `more_membership_levels` text,
  `more_membership_levels_start_date` text,
  `account_state` enum('active','inactive','expired','pending','unsubscribed') DEFAULT 'pending',
  `last_accessed` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_accessed_from_ip` varchar(64) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `address_street` varchar(255) DEFAULT NULL,
  `address_city` varchar(255) DEFAULT NULL,
  `address_state` varchar(255) DEFAULT NULL,
  `address_zipcode` varchar(255) DEFAULT NULL,
  `home_page` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `gender` enum('male','female','not specified') DEFAULT 'not specified',
  `referrer` varchar(255) DEFAULT NULL,
  `extra_info` text,
  `reg_code` varchar(255) DEFAULT NULL,
  `subscription_starts` date DEFAULT NULL,
  `autoupgrade_starts` date DEFAULT NULL,
  `initial_membership_level` smallint(6) DEFAULT NULL,
  `txn_id` varchar(64) DEFAULT '',
  `subscr_id` varchar(32) DEFAULT '',
  `company_name` varchar(100) DEFAULT '',
  `notes` text,
  `flags` int(11) DEFAULT '0',
  `profile_image` varchar(255) DEFAULT '',
  `expiry_1st` date NOT NULL DEFAULT '0000-00-00',
  `expiry_2nd` date NOT NULL DEFAULT '0000-00-00',
  `title` enum('Mr','Mrs','Miss','Ms','Dr','not specified') DEFAULT 'not specified',
  `ip_to_country` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `wp_wp_eMember_members_tbl` WRITE;
/*!40000 ALTER TABLE `wp_wp_eMember_members_tbl` DISABLE KEYS */;

INSERT INTO `wp_wp_eMember_members_tbl` (`member_id`, `user_name`, `first_name`, `last_name`, `password`, `member_since`, `membership_level`, `more_membership_levels`, `more_membership_levels_start_date`, `account_state`, `last_accessed`, `last_accessed_from_ip`, `email`, `phone`, `address_street`, `address_city`, `address_state`, `address_zipcode`, `home_page`, `country`, `gender`, `referrer`, `extra_info`, `reg_code`, `subscription_starts`, `autoupgrade_starts`, `initial_membership_level`, `txn_id`, `subscr_id`, `company_name`, `notes`, `flags`, `profile_image`, `expiry_1st`, `expiry_2nd`, `title`, `ip_to_country`)
VALUES
	(45,'testuser@mail.com','testuser','','$P$B5VW/g.RRevRvPDrtK..innJIvcSqr.','2021-06-24',2,NULL,NULL,'active','2021-06-24 17:51:50','::1','testuser@mail.com','+13181718766','4900 Mauris. Ave','Hunstville','AL','35801',NULL,'United States','not specified',NULL,NULL,NULL,NULL,NULL,NULL,'','','gr',NULL,0,'','2021-06-24','2021-06-24','not specified',NULL);

/*!40000 ALTER TABLE `wp_wp_eMember_members_tbl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wp_wp_eMember_membership_tbl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_wp_eMember_membership_tbl`;

CREATE TABLE `wp_wp_eMember_membership_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(127) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `permissions` tinyint(4) NOT NULL DEFAULT '0',
  `subscription_period` int(11) NOT NULL DEFAULT '-1',
  `subscription_unit` varchar(20) DEFAULT NULL,
  `loginredirect_page` text,
  `category_list` longtext,
  `page_list` longtext,
  `post_list` longtext,
  `comment_list` longtext,
  `attachment_list` longtext,
  `custom_post_list` longtext,
  `disable_bookmark_list` longtext,
  `options` longtext,
  `protect_older_posts` tinyint(1) NOT NULL DEFAULT '0',
  `campaign_name` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `wp_wp_eMember_membership_tbl` WRITE;
/*!40000 ALTER TABLE `wp_wp_eMember_membership_tbl` DISABLE KEYS */;

INSERT INTO `wp_wp_eMember_membership_tbl` (`id`, `alias`, `role`, `permissions`, `subscription_period`, `subscription_unit`, `loginredirect_page`, `category_list`, `page_list`, `post_list`, `comment_list`, `attachment_list`, `custom_post_list`, `disable_bookmark_list`, `options`, `protect_older_posts`, `campaign_name`)
VALUES
	(1,'Content Protection','administrator',63,0,NULL,NULL,'N;','a:0:{}','N;','N;','N;','N;',NULL,NULL,0,''),
	(2,'Admin','administrator',63,0,'','avisp.co/wp-admin','N;','a:0:{}','N;','N;','N;','N;',NULL,NULL,0,''),
	(3,'Dealer','subscriber',63,0,'','','N;','a:0:{}','N;','N;','N;','N;',NULL,NULL,0,''),
	(4,'Customer','subscriber',63,0,'','','N;','a:0:{}','N;','N;','N;','N;',NULL,NULL,0,'');

/*!40000 ALTER TABLE `wp_wp_eMember_membership_tbl` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table wp_wp_members_meta_tbl
# ------------------------------------------------------------

DROP TABLE IF EXISTS `wp_wp_members_meta_tbl`;

CREATE TABLE `wp_wp_members_meta_tbl` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `wp_wp_members_meta_tbl` WRITE;
/*!40000 ALTER TABLE `wp_wp_members_meta_tbl` DISABLE KEYS */;

INSERT INTO `wp_wp_members_meta_tbl` (`umeta_id`, `user_id`, `meta_key`, `meta_value`)
VALUES
	(34,43,'custom_field','a:7:{s:26:\"How_Did_you_hear_about_us_\";s:10:\"Trade Show\";s:16:\"Date_established\";s:0:\"\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:16:\"Type_of_business\";s:14:\"Home Theater, \";s:8:\"Showroom\";s:2:\"No\";s:30:\"Member_of_a_trade_organization\";s:7:\"AVIXA, \";}'),
	(30,39,'custom_field','a:7:{s:26:\"How_Did_you_hear_about_us_\";s:14:\"Recommendation\";s:16:\"Date_established\";s:10:\"2021-06-09\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:16:\"Type_of_business\";s:13:\"Commercial AV\";s:8:\"Showroom\";s:3:\"Yes\";s:30:\"Member_of_a_trade_organization\";s:5:\"CEDIA\";}'),
	(35,44,'custom_field','a:7:{s:26:\"How_Did_you_hear_about_us_\";s:10:\"Trade Show\";s:16:\"Date_established\";s:0:\"\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:16:\"Type_of_business\";s:0:\"\";s:8:\"Showroom\";s:0:\"\";s:30:\"Member_of_a_trade_organization\";s:0:\"\";}'),
	(27,36,'custom_field','a:7:{s:16:\"Date_established\";s:0:\"\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:26:\"How_Did_you_hear_about_us_\";s:15:\"Internet Search\";s:16:\"Type_of_business\";s:0:\"\";s:8:\"Showroom\";s:0:\"\";s:30:\"Member_of_a_trade_organization\";s:0:\"\";}'),
	(25,34,'custom_field','a:7:{s:26:\"How_Did_you_hear_about_us_\";s:15:\"Internet Search\";s:16:\"Date_established\";s:0:\"\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:16:\"Type_of_business\";s:0:\"\";s:8:\"Showroom\";s:0:\"\";s:30:\"Member_of_a_trade_organization\";s:0:\"\";}'),
	(36,45,'custom_field','a:7:{s:26:\"How_Did_you_hear_about_us_\";s:15:\"Internet Search\";s:16:\"Date_established\";s:0:\"\";s:6:\"Tax_ID\";s:0:\"\";s:22:\"Managing_Director_Name\";s:0:\"\";s:16:\"Type_of_business\";s:15:\"Commercial AV, \";s:8:\"Showroom\";s:2:\"No\";s:30:\"Member_of_a_trade_organization\";s:7:\"CEDIA, \";}');

/*!40000 ALTER TABLE `wp_wp_members_meta_tbl` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
