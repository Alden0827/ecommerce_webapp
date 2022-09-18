/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.24-MariaDB : Database - db_cidatabase
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_cidatabase` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_cidatabase`;

/*Table structure for table `configuration` */

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_checkout_charge_perc` float DEFAULT NULL,
  `sale_ex_tax_perc` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `configuration` */

insert  into `configuration`(`id`,`master_checkout_charge_perc`,`sale_ex_tax_perc`) values (1,0.06,0.12);

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `cover_photo` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `image6` varchar(255) DEFAULT NULL,
  `image7` varchar(255) DEFAULT NULL,
  `image8` varchar(255) DEFAULT NULL,
  `size_chart` varchar(255) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `images` */

insert  into `images`(`img_id`,`cover_photo`,`image1`,`image2`,`image3`,`image4`,`image5`,`image6`,`image7`,`image8`,`size_chart`,`item_id`) values (0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(1,'5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1_cp.jpg',NULL,'123.jpg',1);

/*Table structure for table `lib_item_category` */

DROP TABLE IF EXISTS `lib_item_category`;

CREATE TABLE `lib_item_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lib_item_category` */

insert  into `lib_item_category`(`cat_id`,`category`) values (1,'Home Care'),(2,'Home Appliances'),(3,'Gadgets'),(4,'Furnitures/Fixture'),(5,'Toys and baby Equipment'),(6,'Electronics'),(7,'Books, CDs, and Other Phisical Media'),(8,'Grocery Food and Drinks'),(9,'Fashion, Clothos, and Accessories'),(10,'Health and Beauty'),(11,'Car Accessories');

/*Table structure for table `store_info` */

DROP TABLE IF EXISTS `store_info`;

CREATE TABLE `store_info` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `store_info` */

insert  into `store_info`(`store_id`,`name`,`user_id`) values (1,'store name',1);

/*Table structure for table `tbl_items` */

DROP TABLE IF EXISTS `tbl_items`;

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_caption` varchar(200) DEFAULT NULL,
  `item_desc` text DEFAULT NULL,
  `item_specs` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_bidding` tinyint(1) DEFAULT NULL,
  `is_posted` tinyint(1) DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL,
  `discount` float(2,2) DEFAULT 0.00,
  `upc` varchar(50) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_items` */

insert  into `tbl_items`(`item_id`,`item_caption`,`item_desc`,`item_specs`,`cat_id`,`store_id`,`unit_price`,`sku`,`stock`,`date_updated`,`is_bidding`,`is_posted`,`date_posted`,`discount`,`upc`,`brand`) values (1,'A Universal for 12V/24V battery','sample desc','Features:Universal for 12V/24V battery12V/24V Intelligent pulse recognitionWith manual mode automatically for chooseLED DisplayVoltage IndicatorOverheat protectionShort circuit protectionReverse connection protectionLow voltage protection',1,1,'120','sk1234567890',3,'2022-09-13 00:00:00',1,1,'2022-09-13 00:00:00',0.71,'6327316ccf721',NULL),(19,'sample_data1','sample_data1','adasdad\r\n                              ',1,NULL,'12',NULL,1,NULL,NULL,1,'2022-09-18 10:57:38',0.99,'6327316ccf723','sample_data2'),(20,'sample_data1','sample_data1','adasdad\r\n                              ',1,NULL,'12',NULL,1,NULL,NULL,1,'2022-09-18 10:59:39',0.99,'6327316ccf722','sample_data2');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `login_oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`oauth_provider`,`login_oauth_uid`,`first_name`,`last_name`,`email_address`,`gender`,`locale`,`profile_picture`,`link`,`created_at`,`updated_at`) values (1,'','104643403242055778893','Alden','Quiñones','alden.roxy@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/ACNPEu9P7Q2rMr__fRYXeEfCpvPHabKcOPRniUeR-K7kJg=s96-c','','2022-09-09 10:01:13','2022-09-18 11:23:49'),(2,'','116679270454783929350','Alden A','Quiñones','aaquinones.fo12@dswd.gov.ph',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrJ2vFPDKX7VWWuSA1cJtIKZ7_1WWGZVJ-74yzj=s96-c','','2022-09-16 08:15:55','2022-09-16 08:16:41'),(3,'','103522247494752001839','Roxanne Eve','Guibone - Quiñones','roxy.guibone@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrZ72ZCpNr_uYjyfDzL6bUPjD-6wV-SzX6WZ3nDCQ=s96-c','','2022-09-16 09:54:54','0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
