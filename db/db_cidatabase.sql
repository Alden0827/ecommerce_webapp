/*
SQLyog Ultimate v8.55 
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

/*Table structure for table `stores` */

DROP TABLE IF EXISTS `stores`;

CREATE TABLE `stores` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `stores` */

insert  into `stores`(`store_id`,`name`,`user_id`) values (1,'store name',1);

/*Table structure for table `tbl_item_category` */

DROP TABLE IF EXISTS `tbl_item_category`;

CREATE TABLE `tbl_item_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_item_category` */

insert  into `tbl_item_category`(`cat_id`,`category`) values (1,'prod cat');

/*Table structure for table `tbl_items` */

DROP TABLE IF EXISTS `tbl_items`;

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_title` varchar(255) DEFAULT NULL,
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
  `uid` varchar(50) DEFAULT NULL,
  `discount` float(2,2) DEFAULT 0.00,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_items` */

insert  into `tbl_items`(`item_id`,`item_title`,`item_desc`,`item_specs`,`cat_id`,`store_id`,`unit_price`,`sku`,`stock`,`date_updated`,`is_bidding`,`is_posted`,`date_posted`,`uid`,`discount`) values (1,'12v 100A Car Battery Charger','Sample description of the product! Sample description of the product! Sample description of the product!','Features:Universal for 12V/24V battery12V/24V Intelligent pulse recognitionWith manual mode automatically for chooseLED DisplayVoltage IndicatorOverheat protectionShort circuit protectionReverse connection protectionLow voltage protection',1,1,'120','sk1234567890',3,'2022-09-13 00:00:00',1,1,'2022-09-13 00:00:00','5ea4cfaa-f7dc-4a15-9acf-c9757192ebb1',0.71);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`oauth_provider`,`login_oauth_uid`,`first_name`,`last_name`,`email_address`,`gender`,`locale`,`profile_picture`,`link`,`created_at`,`updated_at`) values (1,'','104643403242055778893','Alden','Quiñones','alden.roxy@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrCP2k7FUd0HFIdpVY-zBP4y6uOws40msTU-njNdA=s96-c','','2022-09-09 10:01:13','2022-09-13 03:38:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
