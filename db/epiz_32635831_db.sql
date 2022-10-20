/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.24-MariaDB : Database - epiz_32635831_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`epiz_32635831_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `epiz_32635831_db`;

/*Table structure for table `configuration` */

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `master_checkout_charge_perc` float DEFAULT NULL,
  `sale_ex_tax_perc` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `configuration` */

insert  into `configuration`(`id`,`master_checkout_charge_perc`,`sale_ex_tax_perc`) values (1,0.06,0.086);

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

/*Table structure for table `lib_cc_type` */

DROP TABLE IF EXISTS `lib_cc_type`;

CREATE TABLE `lib_cc_type` (
  `card_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_type` varchar(50) DEFAULT NULL,
  `starts_with` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`card_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lib_cc_type` */

insert  into `lib_cc_type`(`card_type_id`,`card_type`,`starts_with`) values (1,'Visa','4'),(2,'Mastercard','5'),(3,'American Express','3'),(4,'Discover','6');

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
  `store_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `store_info` */

insert  into `store_info`(`store_id`,`store_name`,`address`,`phone1`,`email`,`state`,`phone2`) values ('104643403242055778893','Iron Admin, Inc.','795 Freedom Ave, Suite 600',' (804) 123-9876','support@ironadmin.com','New York, CA 94107',NULL);

/*Table structure for table `tbl_carts` */

DROP TABLE IF EXISTS `tbl_carts`;

CREATE TABLE `tbl_carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` varchar(21) NOT NULL,
  `qnt` int(11) NOT NULL DEFAULT 1,
  `date_added` datetime NOT NULL,
  `login_oauth_uid` varchar(21) NOT NULL,
  `order_id` int(11) DEFAULT 0,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_carts` */

insert  into `tbl_carts`(`cart_id`,`upc`,`qnt`,`date_added`,`login_oauth_uid`,`order_id`) values (3,'6327316ccf721',2,'2022-09-19 00:00:00','104643403242055778893',6),(4,'63280f199bcf4',1,'2022-09-19 00:00:00','104643403242055778893',6),(8,'63291317ebb2b',1,'2022-10-15 06:20:55','104643403242055778893',6),(9,'632831a19bc9b',1,'2022-10-16 07:56:13','104643403242055778893',6),(10,'63290fa61c6ee',1,'2022-10-16 11:04:01','104643403242055778893',6),(11,'632912c2884c0',1,'2022-10-20 10:23:21','104643403242055778893',7),(12,'6329132ec35f6',1,'2022-10-20 10:23:53','104643403242055778893',7),(13,'632831a19bc9b',1,'2022-10-20 10:23:58','104643403242055778893',7),(14,'6327316ccf721',1,'2022-10-20 10:33:55','104643403242055778893',8),(15,'63291317ebb2b',1,'2022-10-20 10:54:03','104643403242055778893',9),(16,'632912c2884c0',1,'2022-10-20 10:54:58','104643403242055778893',10),(17,'63291317ebb2b',1,'2022-10-20 10:56:56','104643403242055778893',11),(18,'6329132ec35f6',1,'2022-10-20 10:58:22','104643403242055778893',12),(19,'63290fa61c6ee',1,'2022-10-20 10:59:35','104643403242055778893',13),(20,'632912c2884c0',1,'2022-10-20 11:01:33','104643403242055778893',14),(21,'632912c2884c0',1,'2022-10-20 11:02:15','104643403242055778893',15),(22,'63291317ebb2b',1,'2022-10-20 11:04:36','104643403242055778893',16),(23,'63291317ebb2b',1,'2022-10-20 11:22:11','104643403242055778893',17),(24,'63290fa61c6ee',1,'2022-10-20 11:27:30','104643403242055778893',18),(25,'6329132ec35f6',1,'2022-10-20 11:46:16','104643403242055778893',19),(26,'632912c2884c0',1,'2022-10-20 11:47:43','104643403242055778893',20);

/*Table structure for table `tbl_cc_info` */

DROP TABLE IF EXISTS `tbl_cc_info`;

CREATE TABLE `tbl_cc_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_oauth_uid` varchar(50) DEFAULT NULL,
  `exp_month` int(2) DEFAULT NULL,
  `exp_year` int(4) DEFAULT NULL,
  `cc_brand` varchar(100) DEFAULT NULL,
  `cc_issuer` varchar(100) DEFAULT NULL,
  `cc_holder` varchar(100) DEFAULT NULL,
  `cc_number` varchar(16) DEFAULT NULL,
  `cc_cvv` varchar(3) DEFAULT NULL,
  `cc_type` int(11) DEFAULT NULL,
  `default` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_cc_info` */

insert  into `tbl_cc_info`(`id`,`login_oauth_uid`,`exp_month`,`exp_year`,`cc_brand`,`cc_issuer`,`cc_holder`,`cc_number`,`cc_cvv`,`cc_type`,`default`) values (1,'104643403242055778893',11,2024,'LBP CARD','LBP - KORONADAL','JUAN DELA CRUZ','4175315603725493','000',1,0),(2,'104643403242055778893',12,2024,'BANKARD','RCBC - KORONADAL','JUAN DELA CRUZ','5175315603725493','001',2,1);

/*Table structure for table `tbl_courier` */

DROP TABLE IF EXISTS `tbl_courier`;

CREATE TABLE `tbl_courier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courier` varchar(100) DEFAULT NULL,
  `courier_fee` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_courier` */

insert  into `tbl_courier`(`id`,`courier`,`courier_fee`) values (1,'FedEx',3),(2,'USPS',4),(3,'UPS',3),(4,'Aramex',4),(5,'ShipBob',6),(6,'DHL',3.4);

/*Table structure for table `tbl_items` */

DROP TABLE IF EXISTS `tbl_items`;

CREATE TABLE `tbl_items` (
  `item_caption` varchar(200) DEFAULT NULL,
  `item_desc` text DEFAULT NULL,
  `item_specs` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `store_id` varchar(21) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `is_bidding` tinyint(1) DEFAULT NULL,
  `status_id` tinyint(1) DEFAULT NULL,
  `status_change_date` datetime DEFAULT NULL,
  `discount` float(2,2) DEFAULT 0.00,
  `upc` varchar(50) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `weight_lb` float DEFAULT NULL,
  `courier_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`upc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_items` */

insert  into `tbl_items`(`item_caption`,`item_desc`,`item_specs`,`cat_id`,`store_id`,`unit_price`,`sku`,`stock`,`date_updated`,`is_bidding`,`status_id`,`status_change_date`,`discount`,`upc`,`brand`,`weight_lb`,`courier_id`) values ('A Universal for 12V/24V battery','aa Lorem ipsum dolor sit amet, aa consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','Features:Universal for 12V/24V battery12V/24V Intelligent pulse recognitionWith manual mode automatically for chooseLED DisplayVoltage IndicatorOverheat protectionShort circuit protectionReverse connection protectionLow voltage protection',1,'104643403242055778893','120.00','sk1234567890',2,'2022-09-13 00:00:00',0,1,'2022-09-13 00:00:00',0.10,'6327316ccf721','no brand',3,1),('Sample Product 1','bb Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','13.99',NULL,4,NULL,0,1,'2022-09-19 02:43:50',0.00,'63280f199bcf4','sample_data2',4,2),('Sample Product 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,3,NULL,0,1,'2022-09-19 05:08:56',0.00,'632831a19bc9b','sample_data2',5,3),('Sample Product 3','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,2,NULL,0,1,NULL,0.50,'63290fa61c6ee','sample_data2',4,4),('Sample Product 4','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,5,NULL,0,1,NULL,0.40,'632910769b3fe','sample_data2',3,5),('Sample Product 6','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,0,NULL,0,1,'2022-09-19 09:09:31',0.00,'632912c2884c0','sample_data2',4,6),('Sample Product 7','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,0,NULL,0,1,'2022-09-19 09:11:02',0.00,'63291317ebb2b','sample_data2',5,1),('Sample Product 8','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,2,NULL,0,1,'2022-09-19 09:13:57',0.12,'6329132ec35f6','sample_data2',4,2),('Sample Product 9','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,5,NULL,0,0,'2022-09-19 09:15:26',0.00,'632913decab22','sample_data2',4.5,3),('Sample Product 10','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,5,NULL,NULL,1,'2022-10-16 03:27:51',0.00,'634c0432767f1','sample_data2',4,4);

/*Table structure for table `tbl_orders` */

DROP TABLE IF EXISTS `tbl_orders`;

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) NOT NULL,
  `date_posted` datetime NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `date_due` datetime NOT NULL,
  `cancelled` int(11) NOT NULL DEFAULT 0,
  `ex_tax_rate` float NOT NULL,
  `master_charge_rate` float NOT NULL,
  `ex_tax_fee` float NOT NULL,
  `master_charge_fee` float NOT NULL,
  `shipment_fee` float NOT NULL,
  `Note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_orders` */

insert  into `tbl_orders`(`id`,`shipment_id`,`date_posted`,`payment_id`,`date_due`,`cancelled`,`ex_tax_rate`,`master_charge_rate`,`ex_tax_fee`,`master_charge_fee`,`shipment_fee`,`Note`) values (6,1,'2022-10-20 02:54:40',NULL,'1970-01-01 01:00:00',0,0.086,0.06,27.5191,19.1994,17,'asdsad'),(7,1,'2022-10-20 10:25:03',NULL,'2022-10-21 22:25:03',0,0.086,0.06,3.21984,2.2464,10.4,''),(8,1,'2022-10-20 10:33:59',NULL,'2022-10-21 22:33:59',0,0.086,0.06,11.352,7.92,3,''),(9,1,'2022-10-20 10:54:10',NULL,'2022-10-21 22:54:10',0,0.086,0.06,1.032,0.72,3,''),(10,1,'2022-10-20 10:55:02',NULL,'2022-10-21 22:55:02',0,0.086,0.06,1.032,0.72,3.4,''),(11,1,'2022-10-20 10:57:00',NULL,'2022-10-21 22:57:00',0,0.086,0.06,1.032,0.72,3,''),(12,1,'2022-10-20 10:58:26',NULL,'2022-10-21 22:58:26',0,0.086,0.06,1.15584,0.8064,4,''),(13,1,'2022-10-20 10:59:39',NULL,'2022-10-21 22:59:39',0,0.086,0.06,1.548,1.08,4,''),(14,1,'2022-10-20 11:01:39',NULL,'2022-10-21 23:01:39',0,0.086,0.06,1.032,0.72,3.4,''),(15,1,'2022-10-20 11:02:19',NULL,'2022-10-21 23:02:19',0,0.086,0.06,1.032,0.72,3.4,''),(16,1,'2022-10-20 11:04:40',NULL,'2022-10-21 23:04:40',0,0.086,0.06,1.032,0.72,3,''),(17,1,'2022-10-20 11:22:19',NULL,'2022-10-21 23:22:19',0,0.086,0.06,1.032,0.72,3,''),(18,1,'2022-10-20 11:27:38',NULL,'2022-10-21 23:27:38',0,0.086,0.06,1.548,1.08,4,''),(19,1,'2022-10-20 11:46:21',NULL,'2022-10-21 23:46:21',0,0.086,0.06,1.15584,0.8064,4,''),(20,1,'2022-10-20 11:47:47',NULL,'2022-10-21 23:47:47',0,0.086,0.06,1.032,0.72,3.4,'');

/*Table structure for table `tbl_shipment_addresses` */

DROP TABLE IF EXISTS `tbl_shipment_addresses`;

CREATE TABLE `tbl_shipment_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_oauth_uid` varchar(50) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `phone1` varchar(20) DEFAULT NULL,
  `phone2` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `default` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_shipment_addresses` */

insert  into `tbl_shipment_addresses`(`id`,`login_oauth_uid`,`fullname`,`address1`,`address2`,`phone1`,`phone2`,`email`,`default`) values (1,'104643403242055778893','Jose Potacio Rizal','794 Freedom Ave, Suite 600','New York, CA 94107','(804) 123-9876','(804) 123-9877','jprizal@ironadmin.com',1);

/*Table structure for table `tbl_wishlist` */

DROP TABLE IF EXISTS `tbl_wishlist`;

CREATE TABLE `tbl_wishlist` (
  `wl_id` int(11) NOT NULL AUTO_INCREMENT,
  `upc` varchar(21) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `login_oauth_uid` varchar(21) DEFAULT NULL,
  PRIMARY KEY (`wl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_wishlist` */

insert  into `tbl_wishlist`(`wl_id`,`upc`,`date_added`,`login_oauth_uid`) values (1,'6327316ccf721','2022-10-16 10:27:12','104643403242055778893'),(2,'63280f199bcf4','2022-10-16 10:27:12','104643403242055778893'),(8,'632831a19bc9b','2022-10-16 10:53:26','104643403242055778893'),(9,'63291317ebb2b','2022-10-17 01:07:00','104643403242055778893');

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

insert  into `users`(`oauth_provider`,`login_oauth_uid`,`first_name`,`last_name`,`email_address`,`gender`,`locale`,`profile_picture`,`link`,`created_at`,`updated_at`) values ('','103522247494752001839','Roxanne Eve','Guibone - Quiñones','roxy.guibone@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrZ72ZCpNr_uYjyfDzL6bUPjD-6wV-SzX6WZ3nDCQ=s96-c','','2022-09-16 09:54:54','0000-00-00 00:00:00'),('','104643403242055778893','Alden','Quiñones','alden.roxy@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a/ALm5wu1bDC9GCRhpQ3jEdypJ8uiSheu9ggWziKxYr_rLnw=s96-c','','2022-09-09 10:01:13','2022-10-20 22:15:08'),('','116679270454783929350','Alden A','Quiñones','aaquinones.fo12@dswd.gov.ph',NULL,NULL,'https://lh3.googleusercontent.com/a-/ACNPEu_gXfFTohYOkNOZDqtrFr571rhMKrMEFtFxtK72=s96-c','','2022-09-16 08:15:55','2022-09-18 20:03:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
