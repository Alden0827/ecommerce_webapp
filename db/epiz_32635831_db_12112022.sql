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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lib_cc_type` */

insert  into `lib_cc_type`(`card_type_id`,`card_type`,`starts_with`) values (0,'PAYPAL','0'),(1,'Visa','4'),(2,'Mastercard','5'),(3,'American Express','3'),(4,'Discover','6');

/*Table structure for table `lib_item_category` */

DROP TABLE IF EXISTS `lib_item_category`;

CREATE TABLE `lib_item_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lib_item_category` */

insert  into `lib_item_category`(`cat_id`,`category`) values (1,'Home Care'),(2,'Home Appliances'),(3,'Gadgets'),(4,'Furnitures/Fixture'),(5,'Toys and baby Equipment'),(6,'Electronics'),(7,'Books, CDs, and Other Phisical Media'),(8,'Grocery Food and Drinks'),(9,'Fashion, Clothos, and Accessories'),(10,'Health and Beauty'),(11,'Car Accessories');

/*Table structure for table `lib_order_status` */

DROP TABLE IF EXISTS `lib_order_status`;

CREATE TABLE `lib_order_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `lib_order_status` */

insert  into `lib_order_status`(`id`,`status`) values (1,'Awaiting for bank wire transfer'),(2,'Cancelled by the consumer'),(3,'Cancelled by the seller due to lack of stock'),(4,'Cancelled - No payment made'),(5,'Paid - For Delivery'),(6,'Delivered');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_carts` */

insert  into `tbl_carts`(`cart_id`,`upc`,`qnt`,`date_added`,`login_oauth_uid`,`order_id`) values (3,'6327316ccf721',2,'2022-09-19 00:00:00','104643403242055778893',10),(4,'63280f199bcf4',3,'2022-09-19 00:00:00','104643403242055778893',10),(8,'63291317ebb2b',3,'2022-10-15 06:20:55','104643403242055778893',11),(9,'632831a19bc9b',1,'2022-10-16 07:56:13','104643403242055778893',11),(10,'63290fa61c6ee',1,'2022-10-16 11:04:01','104643403242055778893',13),(11,'632910769b3fe',1,'2022-10-20 12:20:24','104643403242055778893',16),(12,'634c0432767f1',3,'2022-10-20 12:24:54','104643403242055778893',18),(13,'63280f199bcf4',1,'2022-10-20 02:47:37','104643403242055778893',17),(14,'63280f199bcf4',1,'2022-10-20 04:55:58','104643403242055778893',18),(15,'63291317ebb2b',1,'2022-10-20 05:11:21','104643403242055778893',19),(16,'63280f199bcf4',2,'2022-10-20 05:11:27','104643403242055778893',19),(17,'632831a19bc9b',1,'2022-10-22 11:14:25','104643403242055778893',25),(18,'63290fa61c6ee',1,'2022-10-22 11:14:30','104643403242055778893',25),(19,'63291317ebb2b',1,'2022-10-22 11:54:57','104643403242055778893',32),(20,'63291317ebb2b',1,'2022-10-23 12:04:12','104643403242055778893',33),(21,'6327316ccf721',2,'2022-10-23 12:13:55','104643403242055778893',34),(22,'63280f199bcf4',1,'2022-10-23 12:13:59','104643403242055778893',34),(23,'632912c2884c0',1,'2022-10-23 12:20:49','104643403242055778893',35),(24,'6327316ccf721',1,'2022-10-23 06:17:49','104643403242055778893',35),(25,'63291317ebb2b',1,'2022-10-23 06:23:25','104643403242055778893',36),(26,'6327316ccf721',1,'2022-10-23 06:23:33','104643403242055778893',36),(27,'632910769b3fe',1,'2022-10-23 06:23:37','104643403242055778893',36),(28,'632912c2884c0',1,'2022-10-23 08:06:54','104643403242055778893',37),(29,'6327316ccf721',1,'2022-10-23 08:48:55','104643403242055778893',38),(30,'634c0432767f1',1,'2022-11-21 05:46:46','104643403242055778893',39),(31,'6329132ec35f6',1,'2022-11-21 10:25:59','104643403242055778893',40),(32,'6329132ec35f6',1,'2022-11-21 10:39:53','104643403242055778893',41),(33,'634c0432767f1',1,'2022-11-21 10:51:30','104643403242055778893',42),(34,'6329132ec35f6',1,'2022-11-26 08:54:57','104643403242055778893',0);

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

insert  into `tbl_items`(`item_caption`,`item_desc`,`item_specs`,`cat_id`,`store_id`,`unit_price`,`sku`,`stock`,`date_updated`,`is_bidding`,`status_id`,`status_change_date`,`discount`,`upc`,`brand`,`weight_lb`,`courier_id`) values ('A Universal for 12V/24V battery','aa Lorem ipsum dolor sit amet, aa consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','Features:Universal for 12V/24V battery12V/24V Intelligent pulse recognitionWith manual mode automatically for chooseLED DisplayVoltage IndicatorOverheat protectionShort circuit protectionReverse connection protectionLow voltage protection',1,'104643403242055778893','120.00','sk1234567890',3,'2022-09-13 00:00:00',0,1,'2022-09-13 00:00:00',0.10,'6327316ccf721','no brand',3,1),('Sample Product 1','bb Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','13.99',NULL,4,NULL,0,1,'2022-09-19 02:43:50',0.00,'63280f199bcf4','sample_data2',4,2),('Sample Product 2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,8,NULL,0,1,'2022-09-19 05:08:56',0.00,'632831a19bc9b','sample_data2',5,3),('Sample Product 3','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,7,NULL,0,1,NULL,0.50,'63290fa61c6ee','sample_data2',4,4),('Sample Product 4','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,6,NULL,0,1,NULL,0.40,'632910769b3fe','sample_data2',3,5),('Sample Product 6','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,8,NULL,0,1,'2022-09-19 09:09:31',0.00,'632912c2884c0','sample_data2',4,6),('Sample Product 7','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,5,NULL,0,1,'2022-09-19 09:11:02',0.00,'63291317ebb2b','sample_data2',5,1),('Sample Product 8','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,8,NULL,0,1,'2022-09-19 09:13:57',0.12,'6329132ec35f6','sample_data2',4,2),('Sample Product 9','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,10,NULL,0,0,'2022-09-19 09:15:26',0.00,'632913decab22','sample_data2',4.5,3),('Sample Product 10','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil ad, ex eaque fuga minus reprehendeim soluta omnis ','adasdad\r\n                              ',1,'104643403242055778893','12.00',NULL,5,NULL,NULL,1,'2022-10-16 03:27:51',0.00,'634c0432767f1','sample_data2',4,4);

/*Table structure for table `tbl_orders` */

DROP TABLE IF EXISTS `tbl_orders`;

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shipment_id` int(11) DEFAULT NULL,
  `date_posted` datetime DEFAULT NULL,
  `payment_id` int(11) DEFAULT 0,
  `date_due` datetime DEFAULT NULL,
  `cancelled` int(11) DEFAULT 0,
  `ex_tax_rate` float DEFAULT NULL,
  `master_charge_rate` float DEFAULT NULL,
  `ex_tax_fee` float DEFAULT NULL,
  `master_charge_fee` float DEFAULT NULL,
  `shipment_fee` float DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_orders` */

insert  into `tbl_orders`(`id`,`shipment_id`,`date_posted`,`payment_id`,`date_due`,`cancelled`,`ex_tax_rate`,`master_charge_rate`,`ex_tax_fee`,`master_charge_fee`,`shipment_fee`,`Note`,`status_id`) values (10,1,'2022-10-20 12:08:56',0,'2022-10-21 12:08:56',0,0.086,0.06,23.9071,16.6794,7,'',1),(11,1,'2022-10-20 12:16:36',0,'2022-10-21 12:16:36',0,0.086,0.06,2.064,1.44,6,'',1),(12,1,'2022-10-20 12:18:51',0,'2022-10-21 12:18:51',0,0.086,0.06,1.548,1.08,4,'',1),(13,1,'2022-10-20 12:19:25',0,'2022-10-21 12:19:25',0,0.086,0.06,1.548,1.08,4,'',1),(14,1,'2022-10-20 12:20:30',0,'2022-10-21 12:20:30',0,0.086,0.06,1.4448,1.008,6,'',1),(15,1,'2022-10-20 12:20:39',0,'2022-10-21 12:20:39',0,0.086,0.06,1.4448,1.008,6,'',1),(16,1,'2022-10-20 12:20:47',0,'2022-10-21 12:20:47',0,0.086,0.06,1.4448,1.008,6,'',1),(17,1,'2022-10-20 04:18:07',0,'2022-10-21 16:18:07',0,0.086,0.06,1.20314,0.8394,4,'',1),(18,1,'2022-10-20 04:58:07',0,'2022-10-21 16:58:07',0,0.086,0.06,4.29914,2.9994,8,'',1),(19,1,'2022-10-20 05:11:43',0,'2022-10-21 17:11:43',0,0.086,0.06,3.43828,2.3988,7,'',1),(32,1,'2022-10-22 11:55:42',0,'2022-10-23 23:55:42',0,0.086,0.06,1.032,0.72,3,'',1),(33,1,'2022-10-23 12:09:46',0,'2022-10-24 00:09:46',0,0.086,0.06,1.032,0.72,3,'',1),(34,1,'2022-10-23 12:14:05',0,'2022-10-24 00:14:05',0,0.086,0.06,23.9071,16.6794,7,'',1),(35,1,'2022-10-23 06:21:40',0,'2022-10-24 06:21:40',0,0.086,0.06,12.384,8.64,6.4,'',1),(36,1,'2022-10-23 06:23:44',0,'2022-10-24 06:23:44',0,0.086,0.06,13.8288,9.648,12,'',1),(37,1,'2022-10-23 08:09:36',0,'2022-10-24 20:09:36',0,0.086,0.06,1.032,0.72,3.4,'',1),(38,1,'2022-10-23 08:49:00',0,'2022-10-24 20:49:00',0,0.086,0.06,11.352,7.92,3,'',1),(39,1,'2022-11-21 05:46:58',0,'2022-11-22 17:46:58',0,0.086,0.06,1.032,0.72,4,'',1),(40,1,'2022-11-21 10:27:14',0,'2022-11-22 22:27:14',0,0.086,0.06,1.15584,0.8064,4,'',1),(41,1,'2022-11-21 10:39:59',0,'2022-11-22 22:39:59',0,0.086,0.06,1.15584,0.8064,4,'',1),(42,1,'2022-11-21 10:51:35',0,'2022-11-22 22:51:35',0,0.086,0.06,1.032,0.72,4,'',1);

/*Table structure for table `tbl_payments` */

DROP TABLE IF EXISTS `tbl_payments`;

CREATE TABLE `tbl_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `payer_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_street` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_state` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_country_code` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_zip` int(11) DEFAULT NULL,
  `residence_country` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_currency` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mc_fee` float DEFAULT NULL,
  `mc_gross` float DEFAULT NULL,
  `protection_eligibility` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_fee` float DEFAULT NULL,
  `payment_gross` float DEFAULT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `handling_amount` float DEFAULT NULL,
  `shipping` float DEFAULT NULL,
  `item_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_number` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `txn_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notify_version` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verify_sign` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `tbl_payments` */

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_wishlist` */

insert  into `tbl_wishlist`(`wl_id`,`upc`,`date_added`,`login_oauth_uid`) values (8,'632831a19bc9b','2022-10-16 10:53:26','104643403242055778893'),(9,'63291317ebb2b','2022-10-17 01:07:00','104643403242055778893'),(10,'6327316ccf721','2022-10-23 08:48:50','104643403242055778893'),(11,'6329132ec35f6','2022-11-26 08:55:00','104643403242055778893');

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

insert  into `users`(`oauth_provider`,`login_oauth_uid`,`first_name`,`last_name`,`email_address`,`gender`,`locale`,`profile_picture`,`link`,`created_at`,`updated_at`) values ('','103522247494752001839','Roxanne Eve','Guibone - Quiñones','roxy.guibone@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a-/AFdZucrZ72ZCpNr_uYjyfDzL6bUPjD-6wV-SzX6WZ3nDCQ=s96-c','','2022-09-16 09:54:54','0000-00-00 00:00:00'),('','104643403242055778893','Alden','Quiñones','alden.roxy@gmail.com',NULL,NULL,'https://lh3.googleusercontent.com/a/AEdFTp4oWJbYZjm4Og86k75cCey5K8mDd7ytSEa-dmZkMQ=s96-c','','2022-09-09 10:01:13','2022-12-11 04:52:09'),('','116679270454783929350','Alden A','Quiñones','aaquinones.fo12@dswd.gov.ph',NULL,NULL,'https://lh3.googleusercontent.com/a-/ACNPEu_gXfFTohYOkNOZDqtrFr571rhMKrMEFtFxtK72=s96-c','','2022-09-16 08:15:55','2022-09-18 20:03:41');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
