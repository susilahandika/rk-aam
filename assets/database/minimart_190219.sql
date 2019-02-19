/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - minimart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`minimart` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `minimart`;

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`id`,`dept_name`,`region_id`) values 
(1,'IT',1000),
(2,'OPR',1000);

/*Table structure for table `division` */

DROP TABLE IF EXISTS `division`;

CREATE TABLE `division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `division` */

/*Table structure for table `level1` */

DROP TABLE IF EXISTS `level1`;

CREATE TABLE `level1` (
  `user_lv1` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`user_lv1`,`store_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `level1` */

/*Table structure for table `level2` */

DROP TABLE IF EXISTS `level2`;

CREATE TABLE `level2` (
  `user_lv2` int(11) NOT NULL,
  `user_lv1` int(11) NOT NULL,
  PRIMARY KEY (`user_lv2`,`user_lv1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `level2` */

/*Table structure for table `level3` */

DROP TABLE IF EXISTS `level3`;

CREATE TABLE `level3` (
  `user_lv3` int(11) NOT NULL,
  `user_lv2` int(11) NOT NULL,
  PRIMARY KEY (`user_lv3`,`user_lv2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `level3` */

/*Table structure for table `position` */

DROP TABLE IF EXISTS `position`;

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `position` */

insert  into `position`(`id`,`position_name`) values 
(1000,'staff'),
(1001,'officer'),
(1002,'supervisor'),
(1003,'asst. manager'),
(1004,'area manager'),
(1005,'manager'),
(1006,'branch manager');

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

/*Table structure for table `store` */

DROP TABLE IF EXISTS `store`;

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `store_name` varchar(20) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `store` */

insert  into `store`(`id`,`store_name`,`region_id`) values 
(41,'RMY',1000),
(42,'RGH',1000),
(43,'KSV',1000),
(401,'SRW',1001);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`full_name`,`region_id`,`dept_id`,`position_id`) values 
(218700130,'Turmuji Muslim',1000,1,1003),
(219001287,'Susila Handika',1000,1,1003),
(219100604,'Soni',1000,1,1002);

/*Table structure for table `view_select_user` */

DROP TABLE IF EXISTS `view_select_user`;

/*!50001 DROP VIEW IF EXISTS `view_select_user` */;
/*!50001 DROP TABLE IF EXISTS `view_select_user` */;

/*!50001 CREATE TABLE  `view_select_user`(
 `id` int(11) ,
 `full_name` varchar(100) ,
 `region_id` int(11) ,
 `dept_id` int(11) ,
 `position_id` int(11) ,
 `region_name` varchar(20) ,
 `dept_name` varchar(20) ,
 `position_name` varchar(50) 
)*/;

/*View structure for view view_select_user */

/*!50001 DROP TABLE IF EXISTS `view_select_user` */;
/*!50001 DROP VIEW IF EXISTS `view_select_user` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_select_user` AS select `a`.`id` AS `id`,`a`.`full_name` AS `full_name`,`a`.`region_id` AS `region_id`,`a`.`dept_id` AS `dept_id`,`a`.`position_id` AS `position_id`,`b`.`region_name` AS `region_name`,`c`.`dept_name` AS `dept_name`,`d`.`position_name` AS `position_name` from (((`user` `a` join `region` `b` on((`a`.`region_id` = `b`.`id`))) join `department` `c` on(((`a`.`dept_id` = `c`.`id`) and (`c`.`region_id` = `b`.`id`)))) join `position` `d` on((`a`.`position_id` = `d`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
