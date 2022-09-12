/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.24-MariaDB : Database - db_ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_ecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_ecommerce`;

/*Table structure for table `optiongroups` */

DROP TABLE IF EXISTS `optiongroups`;

CREATE TABLE `optiongroups` (
  `OptionGroupID` int(11) NOT NULL AUTO_INCREMENT,
  `OptionGroupName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`OptionGroupID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `optiongroups` */

insert  into `optiongroups`(`OptionGroupID`,`OptionGroupName`) values (1,'color'),(2,'size');

/*Table structure for table `options` */

DROP TABLE IF EXISTS `options`;

CREATE TABLE `options` (
  `OptionID` int(11) NOT NULL AUTO_INCREMENT,
  `OptionGroupID` int(11) DEFAULT NULL,
  `OptionName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`OptionID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `options` */

insert  into `options`(`OptionID`,`OptionGroupID`,`OptionName`) values (1,1,'red'),(2,1,'blue'),(3,1,'green'),(4,2,'S'),(5,2,'M'),(6,2,'L'),(7,2,'XL'),(8,2,'XXL');

/*Table structure for table `orderdetails` */

DROP TABLE IF EXISTS `orderdetails`;

CREATE TABLE `orderdetails` (
  `DetailID` int(11) NOT NULL AUTO_INCREMENT,
  `DetailOrderID` int(11) NOT NULL,
  `DetailProductID` int(11) NOT NULL,
  `DetailName` varchar(250) COLLATE latin1_german2_ci NOT NULL,
  `DetailPrice` float NOT NULL,
  `DetailSKU` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `DetailQuantity` int(11) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `orderdetails` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderUserID` int(11) NOT NULL,
  `OrderAmount` float NOT NULL,
  `OrderShipName` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `OrderShipAddress` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `OrderShipAddress2` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `OrderCity` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `OrderState` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `OrderZip` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderCountry` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `OrderPhone` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderFax` varchar(20) COLLATE latin1_german2_ci NOT NULL,
  `OrderShipping` float NOT NULL,
  `OrderTax` float NOT NULL,
  `OrderEmail` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `OrderShipped` tinyint(1) NOT NULL DEFAULT 0,
  `OrderTrackingNumber` varchar(80) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `orders` */

/*Table structure for table `productcategories` */

DROP TABLE IF EXISTS `productcategories`;

CREATE TABLE `productcategories` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `productcategories` */

insert  into `productcategories`(`CategoryID`,`CategoryName`) values (1,'Running'),(2,'Walking'),(3,'HIking'),(4,'Track and Trail'),(5,'Short Sleave'),(6,'Long Sleave');

/*Table structure for table `productoptions` */

DROP TABLE IF EXISTS `productoptions`;

CREATE TABLE `productoptions` (
  `ProductOptionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductID` int(10) unsigned NOT NULL,
  `OptionID` int(10) unsigned NOT NULL,
  `OptionPriceIncrement` double DEFAULT NULL,
  `OptionGroupID` int(11) NOT NULL,
  PRIMARY KEY (`ProductOptionID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `productoptions` */

insert  into `productoptions`(`ProductOptionID`,`ProductID`,`OptionID`,`OptionPriceIncrement`,`OptionGroupID`) values (1,1,1,0,1),(2,1,2,0,1),(3,1,3,0,1),(4,1,4,0,2),(5,1,5,0,2),(6,1,6,0,2),(7,1,7,2,2),(8,1,8,2,2);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `ProductID` int(12) NOT NULL AUTO_INCREMENT,
  `ProductSKU` varchar(50) COLLATE latin1_german2_ci NOT NULL,
  `ProductName` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductPrice` float NOT NULL,
  `ProductWeight` float NOT NULL,
  `ProductCartDesc` varchar(250) COLLATE latin1_german2_ci NOT NULL,
  `ProductShortDesc` varchar(1000) COLLATE latin1_german2_ci NOT NULL,
  `ProductLongDesc` text COLLATE latin1_german2_ci NOT NULL,
  `ProductThumb` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductImage` varchar(100) COLLATE latin1_german2_ci NOT NULL,
  `ProductCategoryID` int(11) DEFAULT NULL,
  `ProductUpdateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ProductStock` float DEFAULT NULL,
  `ProductLive` tinyint(1) DEFAULT 0,
  `ProductUnlimited` tinyint(1) DEFAULT 1,
  `ProductLocation` varchar(250) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`ProductID`)
) ENGINE=MyISAM AUTO_INCREMENT=991 DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `products` */

insert  into `products`(`ProductID`,`ProductSKU`,`ProductName`,`ProductPrice`,`ProductWeight`,`ProductCartDesc`,`ProductShortDesc`,`ProductLongDesc`,`ProductThumb`,`ProductImage`,`ProductCategoryID`,`ProductUpdateDate`,`ProductStock`,`ProductLive`,`ProductUnlimited`,`ProductLocation`) values (1,'000-0001','Cotton T-Shirt',9.99,3,'Light Cotton T-Shirt','A light cotton T-Shirt made with 100% real cotton.','A light cotton T-Shirt made with 100% real cotton.\r\n\r\nMade right here in the USA for over 15 years, this t-shirt is lightweight and durable.','','',5,'2013-06-13 09:00:50',100,1,0,NULL),(2,'000-0004','Los Angeles',179.99,8,'Track and Trail','A rugged track and trail athletic shoe','A rugged track and trail athletic shoe','','',4,'2013-07-26 03:04:36',NULL,0,1,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(500) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPassword` varchar(500) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserFirstName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserLastName` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserCity` varchar(90) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserState` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserZip` varchar(12) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserEmailVerified` tinyint(1) DEFAULT 0,
  `UserRegistrationDate` timestamp NULL DEFAULT current_timestamp(),
  `UserVerificationCode` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserIP` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserPhone` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserFax` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserCountry` varchar(20) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress` varchar(100) COLLATE latin1_german2_ci DEFAULT NULL,
  `UserAddress2` varchar(50) COLLATE latin1_german2_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
