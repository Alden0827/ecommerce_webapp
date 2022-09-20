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
  `store_id` varchar(21) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `store_info` */

insert  into `store_info`(`store_id`,`name`) values ('104643403242055778893','store name');

/*Table structure for table `tbl_carts` */

DROP TABLE IF EXISTS `tbl_carts`;

CREATE TABLE `tbl_carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` varchar(21) DEFAULT NULL,
  `qnt` int(11) DEFAULT 1,
  `date_added` datetime DEFAULT NULL,
  `login_oauth_uid` varchar(21) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_carts` */

insert  into `tbl_carts`(`cart_id`,`upc`,`qnt`,`date_added`,`login_oauth_uid`) values (3,'6327316ccf721',2,'2022-09-19 00:00:00','104643403242055778893'),(4,'63280f199bcf4',1,'2022-09-19 00:00:00','104643403242055778893');

/*Table structure for table `tbl_items` */

DROP TABLE IF EXISTS `tbl_items`;

CREATE TABLE `tbl_items` (
  `item_caption` varchar(200) DEFAULT NULL,
  `item_desc` text DEFAULT NULL,
  `item_specs` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `store_id` varchar(21) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_bidding` tinyint(1) DEFAULT NULL,
  `status_id` tinyint(1) DEFAULT NULL,
  `status_change_date` datetime DEFAULT NULL,
  `discount` float(2,2) DEFAULT 0.00,
  `upc` varchar(50) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`upc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_items` */

insert  into `tbl_items`(`item_caption`,`item_desc`,`item_specs`,`cat_id`,`store_id`,`unit_price`,`sku`,`stock`,`date_updated`,`is_bidding`,`status_id`,`status_change_date`,`discount`,`upc`,`brand`) values ('A Universal for 12V/24V battery','aa Lorem ipsum dolor sit amet, aa consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','Features:Universal for 12V/24V battery12V/24V Intelligent pulse recognitionWith manual mode automatically for chooseLED DisplayVoltage IndicatorOverheat protectionShort circuit protectionReverse connection protectionLow voltage protection',1,'104643403242055778893','120','sk1234567890',3,'2022-09-13 00:00:00',1,1,'2022-09-13 00:00:00',0.10,'6327316ccf721','no brand'),('sample_data1','bb Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 02:43:50',0.00,'63280f199bcf4','sample_data2'),('sample_data1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 05:08:56',0.00,'632831a19bc9b','sample_data2'),('sample_data1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,NULL,0.99,'63290fa61c6ee','sample_data2'),('aaaa','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,NULL,0.99,'632910769b3fe','sample_data2'),('aaa','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 09:08:49',0.99,'63291123bf965','sample_data2'),('bbbb','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 09:09:31',0.00,'632912c2884c0','sample_data2'),('hh','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 09:11:02',0.00,'63291317ebb2b','sample_data2'),('sample_data1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,1,'2022-09-19 09:13:57',0.12,'6329132ec35f6','sample_data2'),('sample_data1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12',NULL,1,NULL,NULL,0,'2022-09-19 09:15:26',0.00,'632913decab22','sample_data2');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
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
  PRIMARY KEY (`login_oauth_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`oauth_provider`,`login_oauth_uid`,`first_name`,`last_name`,`email_address`,`gender`,`locale`,`profile_picture`,`link`,`created_at`,`updated_at`) values ('','103522247494752001839','Roxanne Eve','Guibone - Quiñones','roxy.guibone@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrZ72ZCpNr_uYjyfDzL6bUPjD-6wV-SzX6WZ3nDCQ=s96-c','','2022-09-16 09:54:54','0000-00-00 00:00:00'),('','104643403242055778893','Alden','Quiñones','alden.roxy@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/ACNPEu9P7Q2rMr__fRYXeEfCpvPHabKcOPRniUeR-K7kJg=s96-c','','2022-09-09 10:01:13','2022-09-19 20:55:53'),('','116679270454783929350','Alden A','Quiñones','aaquinones.fo12@dswd.gov.ph',NULL,NULL,'https://lh3.googleusercontent.com/a-/ACNPEu_gXfFTohYOkNOZDqtrFr571rhMKrMEFtFxtK72=s96-c','','2022-09-16 08:15:55','2022-09-18 20:03:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
