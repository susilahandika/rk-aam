/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - mm_checklist
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mm_checklist` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mm_checklist`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`category_name`,`dept_id`,`region_id`) values 
(1,'TAMPAK / IMAGE STORE',3006,1000),
(2,'ADMINISTRASI',3006,1000),
(3,'PRODUCT',3006,1000),
(4,'PEOPLE',3006,1000),
(5,'MAINTENANCE',3006,1000),
(6,'casad',3005,1000),
(7,'qeqweqwe',3003,1000);

/*Table structure for table `item_checklist` */

DROP TABLE IF EXISTS `item_checklist`;

CREATE TABLE `item_checklist` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `order` int(4) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_checklist` */

insert  into `item_checklist`(`id`,`item_name`,`category_id`,`dept_id`,`status`,`order`,`region_id`) values 
(1,'TAMPAK SIGN / NEON BOX 1 & 2 SISI',1,3006,'A',1,1000),
(2,'TAMPAK PACADE STORE',1,3006,'A',2,1000),
(3,'KEBERSIHAN & KERPIAN HALAMAN PARKIR SISI DEPAN KANAN & KIRI',3,3006,'A',3,1000),
(4,'KEBERSIHAN KACA PINTU & SEMUA SISI STORE',1,3006,'A',4,1000),
(5,'KEBERSIHAN & KERAPIAN LANTAI STORE',5,3006,'A',5,1000),
(6,'asdasd',1,3005,'A',1,1000),
(7,'qwerty',4,3005,'A',1,1001);

/*Table structure for table `matriks_app_detail` */

DROP TABLE IF EXISTS `matriks_app_detail`;

CREATE TABLE `matriks_app_detail` (
  `matriks_id` int(11) DEFAULT NULL,
  `position_id` varchar(20) DEFAULT NULL,
  `level` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matriks_app_detail` */

insert  into `matriks_app_detail`(`matriks_id`,`position_id`,`level`) values 
(1,'504404699218647276',1),
(1,'504404572895534935',2);

/*Table structure for table `matriks_app_head` */

DROP TABLE IF EXISTS `matriks_app_head`;

CREATE TABLE `matriks_app_head` (
  `id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `count_app` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matriks_app_head` */

insert  into `matriks_app_head`(`id`,`region_id`,`dept_id`,`count_app`) values 
(1,1000,3005,2),
(2,1001,3006,1);

/*Table structure for table `region` */

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `region` */

insert  into `region`(`id`,`region_name`) values 
(1000,'Bali'),
(1001,'Lombok'),
(1002,'Makassar');

/*Table structure for table `schedule_app` */

DROP TABLE IF EXISTS `schedule_app`;

CREATE TABLE `schedule_app` (
  `schedule_id` bigint(20) NOT NULL,
  `app_id` varchar(20) NOT NULL,
  `app_date` datetime DEFAULT NULL,
  PRIMARY KEY (`schedule_id`,`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_app` */

insert  into `schedule_app`(`schedule_id`,`app_id`,`app_date`) values 
(1,'219003901','2019-01-18 10:10:23');

/*Table structure for table `schedule_detail` */

DROP TABLE IF EXISTS `schedule_detail`;

CREATE TABLE `schedule_detail` (
  `schedule_id` bigint(20) DEFAULT NULL,
  `store` int(4) DEFAULT NULL,
  `checklist_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_detail` */

/*Table structure for table `schedule_head` */

DROP TABLE IF EXISTS `schedule_head`;

CREATE TABLE `schedule_head` (
  `id` bigint(20) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `created_id` varchar(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_head` */

insert  into `schedule_head`(`id`,`region_id`,`dept_id`,`month`,`year`,`created_id`,`created_date`,`status`) values 
(1,1000,3005,1,2019,'123','2019-01-18 09:52:57','A'),
(2,1001,3006,1,2019,'123','2019-01-18 09:53:47','A');

/*Table structure for table `vw_item` */

DROP TABLE IF EXISTS `vw_item`;

/*!50001 DROP VIEW IF EXISTS `vw_item` */;
/*!50001 DROP TABLE IF EXISTS `vw_item` */;

/*!50001 CREATE TABLE  `vw_item`(
 `id` int(11) ,
 `category_id` int(11) ,
 `dept_id` bigint(20) ,
 `region_id` int(11) ,
 `category_name` varchar(30) ,
 `item_name` varchar(100) ,
 `order` int(4) ,
 `status` char(2) 
)*/;

/*View structure for view vw_item */

/*!50001 DROP TABLE IF EXISTS `vw_item` */;
/*!50001 DROP VIEW IF EXISTS `vw_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_item` AS select `a`.`id` AS `id`,`a`.`category_id` AS `category_id`,`a`.`dept_id` AS `dept_id`,`a`.`region_id` AS `region_id`,`b`.`category_name` AS `category_name`,`a`.`item_name` AS `item_name`,`a`.`order` AS `order`,`a`.`status` AS `status` from (`item_checklist` `a` join `category` `b` on((`a`.`category_id` = `b`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
